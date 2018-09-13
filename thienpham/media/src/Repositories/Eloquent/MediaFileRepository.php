<?php

namespace Botble\Media\Repositories\Eloquent;

use Botble\Media\Repositories\Interfaces\MediaFileInterface;
use Botble\Media\Repositories\Interfaces\MediaFolderInterface;
use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class MediaFileRepository
 * @package Botble\Media
 * @author Sang Nguyen
 * @since 19/08/2015 07:45 AM
 */
class MediaFileRepository extends RepositoriesAbstract implements MediaFileInterface
{

    /**
     * @return mixed
     * @author Sang Nguyen
     */
    public function getSpaceUsed()
    {
        $data = $this->model->withTrashed();

        return $data->sum('size');
    }

    /**
     * @return int
     * @author Sang Nguyen
     */
    public function getSpaceLeft()
    {
        return $this->getQuota() - $this->getSpaceUsed();
    }

    /**
     * @return int
     * @author Sang Nguyen
     */
    public function getQuota()
    {
        return config('media.max_quota');
    }

    /**
     * @return float
     * @author Sang Nguyen
     */
    public function getPercentageUsed()
    {
        if ($this->getQuota() === 0 || empty($this->getQuota())) {
            return round(100, 2);
        } else {
            return round(($this->getSpaceUsed() / $this->getQuota()) * 100, 2);
        }
    }

    /**
     * @param $name
     * @param $folder
     * @return mixed
     * @author Sang Nguyen
     */
    public function createName($name, $folder)
    {
        $index = 1;
        $baseName = $name;
        while ($this->checkIfExistsName($name, $folder)) {
            $name = $baseName . '-' . $index++;
        }
        return $name;
    }

    /**
     * @param $name
     * @param $folder
     * @return mixed
     * @author Sang Nguyen
     */
    protected function checkIfExistsName($name, $folder)
    {
        $count = $this->model->where('name', '=', $name)->where('folder_id', '=', $folder)->withTrashed();

        $count = $count->count();

        return $count > 0;
    }

    /**
     * @param $name
     * @param $extension
     * @param $folder_path
     * @return mixed
     * @author Sang Nguyen
     */
    public function createSlug($name, $extension, $folder_path)
    {
        $slug = str_slug($name);
        $index = 1;
        $baseSlug = $slug;
        while (file_exists($folder_path . '/' . $slug . '.' . $extension)) {
            $slug = $baseSlug . '-' . $index++;
        }

        if (empty($slug)) {
            $slug = $slug . '-' . time();
        }

        return $slug . '.' . $extension;
    }

    /**
     * @param $folderId
     * @param array $params
     * @param bool $withFolders
     * @param array $folderParams
     * @return mixed
     */
    public function getFilesByFolderId($folderId, array $params = [], $withFolders = true, $folderParams = [])
    {
        $params = array_merge([
            'order_by' => [
                'name' => 'ASC',
            ],
            'select' => [
                'media_files.id as id',
                'media_files.name as name',
                'media_files.url as url',
                'media_files.mime_type as mime_type',
                'media_files.size as size',
                'media_files.created_at as created_at',
                'media_files.updated_at as updated_at',
                'media_files.options as options',
                'media_files.folder_id as folder_id',
                DB::raw('0 as is_folder'),
                DB::raw('NULL as slug'),
                DB::raw('NULL as parent_id'),
            ],
            'condition' => [],
            'recent_items' => null,
            'paginate' => [
                'per_page' => null,
                'current_paged' => 1
            ],
            'selected_file_id' => null,
            'is_popup' => false,
            'filter' => 'everything',
            'take' => null,
            'with' => [

            ],
        ], $params);

        if ($withFolders) {
            $folderParams = array_merge([
                'condition' => [],
                'select' => [
                    'media_folders.id as id',
                    'media_folders.name as name',
                    DB::raw('NULL as url'),
                    DB::raw('NULL as mime_type'),
                    DB::raw('NULL as size'),
                    'media_folders.created_at as created_at',
                    'media_folders.updated_at as updated_at',
                    DB::raw('NULL as options'),
                    DB::raw('NULL as folder_id'),
                    DB::raw('1 as is_folder'),
                    'media_folders.slug as slug',
                    'media_folders.parent_id as parent_id',
                ],
            ], $folderParams);

            $folder = app(MediaFolderInterface::class)->getModel();

            $folder = $folder
                ->where('parent_id', '=', $folderId)
                ->select($folderParams['select']);

            $this->applyConditions($folderParams['condition'], $folder);

            $this->model = $this->model
                ->union($folder);
        }

        if ($folderId != -1) {
            if ($folderId == 0) {
                $this->model = $this->model
                    ->leftJoin('media_folders', 'media_folders.id', '=', 'media_files.folder_id')
                    ->where(function ($query) {
                        $query
                            ->where(function ($query) {
                                $query
                                    ->where('media_files.folder_id', '=', 0)
                                    ->whereNull('media_files.deleted_at');
                            })
                            ->orWhere(function ($query) {
                                $query
                                    ->whereNull('media_files.deleted_at')
                                    ->whereNotNull('media_folders.deleted_at');
                            })
                            ->orWhere(function ($query) {
                                $query
                                    ->whereNull('media_files.deleted_at')
                                    ->whereNull('media_folders.id');
                            });
                    })
                    ->withTrashed();
            } else {
                $this->model = $this->model->where('media_files.folder_id', '=', $folderId);
            }
        }

        if (isset($params['recent_items']) && is_array($params['recent_items']) && $params['recent_items']) {
            $this->model = $this->model->whereIn('media_files.id', array_get($params, 'recent_items', []));
        }

        if ($params['selected_file_id'] && $params['is_popup']) {
            $this->model = $this->model->where('media_files.id', '<>', $params['selected_file_id']);
        }

        $result = $this->getFile($params);

        if ($params['selected_file_id']) {
            if (!$params['paginate']['current_paged'] || $params['paginate']['current_paged'] == 1) {
                $current_file = $this->originalModel;

                $current_file = $current_file
                    ->where('media_files.folder_id', '=', $folderId)
                    ->where('id', '=', $params['selected_file_id'])
                    ->select($params['select'])
                    ->first();
            }
        }

        if (isset($current_file) && $params['is_popup']) {
            try {
                $result->prepend($current_file);
            } catch (Exception $exception) {
                info($exception->getMessage());
            }
        }

        return $result;
    }

    /**
     * @param $folderId
     * @param array $params
     * @return mixed
     */
    public function getTrashed($folderId, array $params = [], $withFolders = true, $folderParams = [])
    {
        $params = array_merge([
            'order_by' => [
                'name' => 'ASC',
            ],
            'select' => [
                'media_files.id as id',
                'media_files.name as name',
                'media_files.url as url',
                'media_files.mime_type as mime_type',
                'media_files.size as size',
                'media_files.created_at as created_at',
                'media_files.updated_at as updated_at',
                'media_files.options as options',
                'media_files.folder_id as folder_id',
                DB::raw('0 as is_folder'),
                DB::raw('NULL as slug'),
                DB::raw('NULL as parent_id'),
            ],
            'condition' => [],
            'paginate' => [
                'per_page' => null,
                'current_paged' => 1
            ],
            'filter' => 'everything',
            'take' => null,
            'with' => [

            ],
        ], $params);

        $this->model = $this->model->onlyTrashed();

        if ($withFolders) {
            $folderParams = array_merge([
                'condition' => [],
                'select' => [
                    'media_folders.id as id',
                    'media_folders.name as name',
                    DB::raw('NULL as url'),
                    DB::raw('NULL as mime_type'),
                    DB::raw('NULL as size'),
                    'media_folders.created_at as created_at',
                    'media_folders.updated_at as updated_at',
                    DB::raw('NULL as options'),
                    DB::raw('NULL as folder_id'),
                    DB::raw('1 as is_folder'),
                    'media_folders.slug as slug',
                    'media_folders.parent_id as parent_id',
                ],
            ], $folderParams);

            $folder = app(MediaFolderInterface::class)->getModel();

            $folder = $folder
                ->withTrashed()
                ->whereNotNull('media_folders.deleted_at')
                ->select($folderParams['select']);

            if ($folderId == 0) {
                $folder = $folder->leftJoin('media_folders as mf_parent', 'mf_parent.id', '=', 'media_folders.parent_id')
                    ->where(function ($query) {
                        $query
                            ->orWhere('media_folders.parent_id', '=', 0)
                            ->orWhere('mf_parent.deleted_at', '=', null);
                    })
                    ->withTrashed();
            } else {
                $folder = $folder->where('media_folders.parent_id', '=', $folderId);
            }

            $this->applyConditions($folderParams['condition'], $folder);

            $this->model = $this->model
                ->union($folder);
        }

        if ($folderId != -1) {
            if (!$folderId) {
                $this->model = $this->model
                    ->leftJoin('media_folders', 'media_folders.id', '=', 'media_files.folder_id')
                    ->where(function ($query) {
                        $query
                            ->where('media_files.folder_id', '=', 0)
                            ->orWhereNull('media_folders.deleted_at');
                    });
            } else {
                $this->model = $this->model->where('media_files.folder_id', '=', $folderId);
            }
        }

        $result = $this->getFile($params);

        return $result;
    }

    /**
     * @return mixed
     * @author Sang Nguyen
     */
    public function emptyTrash()
    {
        $files = $this->model->onlyTrashed();

        $files = $files->get();

        foreach ($files as $file) {
            $file->forceDelete();
        }
        return true;
    }

    /**
     * @param $params
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Support\Collection|null|static|static[]
     */
    protected function getFile($params)
    {
        $this->applyCriteria();

        $this->applyConditions($params['condition']);

        if ($params['filter'] != 'everything') {
            $this->model = $this->model->where(function ($query) use ($params) {
                $allMimes = [];
                foreach (config('media.mime_types') as $key => $value) {
                    if ($key == $params['filter']) {
                        return $query->whereIn('media_files.mime_type', $value);
                    } else {
                        $allMimes = array_unique(array_merge($allMimes, $value));
                    }
                }
                return $query->whereNotIn('media_files.mime_type', $allMimes);
            });
        }

        if ($params['select']) {
            $this->model = $this->model->select($params['select']);
        }

        foreach ($params['order_by'] as $column => $direction) {
            $this->model = $this->model->orderBy($column, $direction);
        }

        foreach ($params['with'] as $with) {
            $this->model = $this->model->with($with);
        }

        if ($params['take'] == 1) {
            $result = $this->model->first();
        } elseif ($params['take']) {
            $result = $this->model->take($params['take'])->get();
        } elseif ($params['paginate']['per_page']) {
            $paged = $params['paginate']['current_paged'] ?: 1;
            $result = $this->model
                ->skip(($paged - 1) * $params['paginate']['per_page'])
                ->limit($params['paginate']['per_page'])
                ->get();
        } else {
            $result = $this->model->get();
        }

        if (isset($current_file) && $params['is_popup']) {
            try {
                $result->prepend($current_file);
            } catch (Exception $exception) {
                info($exception->getMessage());
            }
        }

        $this->resetModel();

        return $result;
    }
}
