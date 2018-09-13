<?php

namespace Botble\Media\Models;

use Botble\Media\Services\UploadsManager;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaFolder extends Eloquent
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'media_folders';

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
        'slug',
        'parent_id',
        'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @author Sang Nguyen
     */
    public function files()
    {
        /**
         * @var Model $this
         */
        return $this->hasMany(MediaFile::class, 'folder_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author Sang Nguyen
     */
    public function parentFolder()
    {
        /**
         * @var Model $this
         */
        return $this->hasOne(MediaFolder::class, 'id', 'parent');
    }

    /**
     * @author Sang Nguyen
     */
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($folder) {
            // called BEFORE delete()

            /**
             * @var MediaFolder $folder
             */
            if ($folder->isForceDeleting()) {
                $files = MediaFile::where('folder_id', '=', $folder->id)->onlyTrashed()->get();

                $uploadManager = new UploadsManager();

                foreach ($files as $file) {
                    $path = str_replace(config('media.driver.' . config('filesystems.default') . '.path'), '', $file->url);
                    $uploadManager->deleteFile($path);
                    $file->forceDelete();
                }
            } else {
                $files = MediaFile::where('folder_id', '=', $folder->id)->withTrashed()->get();

                foreach ($files as $file) {
                    $file->delete();
                }
            }
        });

        static::restoring(function ($folder) {
            MediaFile::where('folder_id', '=', $folder->id)->restore();
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
