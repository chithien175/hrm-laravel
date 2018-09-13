<?php

namespace Botble\Media\Models;

use Botble\Media\Services\UploadsManager;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaFile extends Eloquent
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'media_files';

    /**
     * The date fields for the model.clear
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'mime_type',
        'type',
        'size',
        'url',
        'options',
        'folder_id',
        'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author Sang Nguyen
     */
    public function folder()
    {
        /**
         * @var Model $this
         */
        return $this->belongsTo(MediaFolder::class, 'id', 'folder_id');
    }

    /**
     * @return string
     * @author Sang Nguyen
     */
    public function getTypeAttribute()
    {
        $type = 'document';
        if ($this->attributes['mime_type'] == 'youtube') {
            return 'video';
        }

        foreach (config('media.mime_types') as $key => $value) {
            if (in_array($this->attributes['mime_type'], $value)) {
                $type = $key;
                break;
            }
        }

        return $type;
    }

    /**
     * @return string
     * @author Sang Nguyen
     */
    public function getHumanSizeAttribute()
    {
        return human_file_size($this->attributes['size']);
    }

    /**
     * @return string
     * @author Sang Nguyen
     */
    public function getIconAttribute()
    {
        /**
         * @var Model $this
         */
        switch ($this->type) {
            case 'image':
                $icon = 'fa fa-file-image-o';
                break;
            case 'video':
                $icon = 'fa fa-file-video-o';
                break;
            case 'pdf':
                $icon = 'fa fa-file-pdf-o';
                break;
            case 'excel':
                $icon = 'fa fa-file-excel-o';
                break;
            case 'youtube':
                $icon = 'fa fa-youtube';
                break;
            default:
                $icon = 'fa fa-file-text-o';
                break;
        }
        return $icon;
    }

    /**
     * @param $value
     * @return mixed
     * @author Sang Nguyen
     */
    public function getOptionsAttribute($value)
    {
        return json_decode($value, true) ?: [];
    }

    /**
     * @author Sang Nguyen
     * @param $value
     */
    public function setOptionsAttribute($value)
    {
        $this->attributes['options'] = json_encode($value);
    }

    /**
     * @author Sang Nguyen
     */
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($file) {
            /**
             * @var MediaFile $file
             */
            if ($file->isForceDeleting()) {
                $uploadManager = new UploadsManager();
                $path = str_replace(config('media.driver.' . config('filesystems.default') . '.path'), '', $file->url);
                $uploadManager->deleteFile($path);
            }
        });
    }

    /**
     * @author Sang Nguyen
     */
    public function __wakeup()
    {
        parent::boot();
    }
}
