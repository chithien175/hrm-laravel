<?php

namespace Botble\Support\Services\Cache;

use File;
use Illuminate\Cache\CacheManager;

class Cache implements CacheInterface
{
    /**
     * @var CacheManager
     */
    protected $cache;

    /**
     * @var array
     */
    protected $config;

    /**
     * @var string
     */
    public $cacheGroup;

    /**
     * Cache constructor.
     * @param \Illuminate\Cache\Repository|CacheManager $cache
     * @param null $cacheGroup
     * @param array $config
     * @author Sang Nguyen
     */
    public function __construct(CacheManager $cache, $cacheGroup, $config = [])
    {
        $this->cache = $cache;
        $this->cacheGroup = $cacheGroup;
        $this->config = !empty($config) ? $config : [
            'cache_time' => 10,
            'stored_keys' => storage_path('cache_keys.json'),
        ];
    }

    public function generateCacheKey($key)
    {
        return md5($this->cacheGroup) . $key;
    }

    /**
     * Retrieve data from cache.
     *
     * @param string $key Cache item key
     * @return mixed
     * @author Sang Nguyen
     */
    public function get($key)
    {
        if (!file_exists($this->config['stored_keys'])) {
            return null;
        }
        return $this->cache->get($this->generateCacheKey($key));
    }

    /**
     * Add data to the cache.
     *
     * @param string $key Cache item key
     * @param mixed $value The data to store
     * @param boolean $minutes The number of minutes to store the item
     * @return mixed
     * @author Sang Nguyen
     */
    public function put($key, $value, $minutes = false)
    {
        if (!$minutes) {
            $minutes = $this->config['cache_time'];
        }

        $key = $this->generateCacheKey($key);

        $this->storeCacheKey($key);

        return $this->cache->put($key, $value, $minutes);
    }

    /**
     * Test if item exists in cache
     * Only returns true if exists && is not expired.
     *
     * @param string $key Cache item key
     * @return bool If cache item exists
     * @author Sang Nguyen
     */
    public function has($key)
    {
        if (!file_exists($this->config['stored_keys'])) {
            return false;
        }
        $key = $this->generateCacheKey($key);
        return $this->cache->has($key);
    }

    /**
     * Store cache key to file
     *
     * @param $key
     * @return void
     * @author Sang Nguyen, Tedozi Manson
     */
    public function storeCacheKey($key)
    {
        if (file_exists($this->config['stored_keys'])) {
            $cacheKeys = get_file_data($this->config['stored_keys']);
            if (!empty($cacheKeys) && !in_array($key, array_get($cacheKeys, $this->cacheGroup, []))) {
                $cacheKeys[$this->cacheGroup][] = $key;
            }
        } else {
            $cacheKeys = [];
            $cacheKeys[$this->cacheGroup][] = $key;
        }
        save_file_data($this->config['stored_keys'], $cacheKeys);
    }

    /**
     * Clear cache of an object
     *
     * @author Sang Nguyen, Tedozi Manson
     */
    public function flush()
    {
        $cacheKeys = [];
        if (file_exists($this->config['stored_keys'])) {
            $cacheKeys = get_file_data($this->config['stored_keys']);
        }
        if (!empty($cacheKeys)) {
            $caches = array_get($cacheKeys, $this->cacheGroup);
            if ($caches) {
                foreach ($caches as $cache) {
                    $this->cache->forget($cache);
                }
                unset($cacheKeys[$this->cacheGroup]);
            }
        }
        if (!empty($cacheKeys)) {
            save_file_data($this->config['stored_keys'], $cacheKeys);
        } else {
            File::delete($this->config['stored_keys']);
        }
    }
}
