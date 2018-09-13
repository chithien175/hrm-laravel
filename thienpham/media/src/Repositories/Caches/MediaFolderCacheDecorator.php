<?php

namespace Botble\Media\Repositories\Caches;

use Botble\Media\Repositories\Interfaces\MediaFolderInterface;
use Botble\Support\Repositories\Caches\CacheAbstractDecorator;
use Botble\Support\Services\Cache\CacheInterface;

class MediaFolderCacheDecorator extends CacheAbstractDecorator implements MediaFolderInterface
{
    /**
     * @var MediaFolderInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * FolderCacheDecorator constructor.
     * @param MediaFolderInterface $repository
     * @param CacheInterface $cache
     * @author Sang Nguyen
     */
    public function __construct(MediaFolderInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    /**
     * @param $folder_id
     * @param array $params
     * @param bool $withTrash
     * @return mixed
     */
    public function getFolderByParentId($folder_id, array $params = [], $withTrash = false)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param $name
     * @param $parent_id
     * @return mixed
     * @author Sang Nguyen
     */
    public function createSlug($name, $parent_id)
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }

    /**
     * @param $name
     * @param $parent_id
     * @author Sang Nguyen
     * @return mixed
     */
    public function createName($name, $parent_id)
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }

    /**
     * @param $parent_id
     * @param array $breadcrumbs
     * @return array
     */
    public function getBreadcrumbs($parent_id, $breadcrumbs = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param $parent_id
     * @param array $params
     * @return mixed
     */
    public function getTrashed($parent_id, array $params = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param $folder_id
     * @param bool $force
     * @return mixed
     */
    public function deleteFolder($folder_id, $force = false)
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }

    /**
     * @param $parent_id
     * @param array $child
     * @return array
     * @internal param $folder_id
     */
    public function getAllChildFolders($parent_id, $child = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param $folder_id
     * @param string $path
     * @return string
     * @author Sang Nguyen
     */
    public function getFullPath($folder_id, $path = '')
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * @param $folder_id
     * @internal param bool $force
     * @author Sang Nguyen
     */
    public function restoreFolder($folder_id)
    {
        $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }

    /**
     * @return mixed
     * @author Sang Nguyen
     */
    public function emptyTrash()
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }
}
