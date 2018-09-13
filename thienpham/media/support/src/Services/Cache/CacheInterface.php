<?php

namespace Botble\Support\Services\Cache;

interface CacheInterface
{
    /**
     * Retrieve data from cache.
     *
     * @param string : cache item key
     * @param string $key
     * @return mixed PHP data result of cache
     * @author Sang Nguyen
     */
    public function get($key);

    /**
     * Add data to the cache.
     *
     * @param string : cache item key
     * @param mixed : the data to store
     * @param int : the number of minutes to store the item
     * @param string $key
     * @return mixed $value variable returned for convenience
     * @author Sang Nguyen
     */
    public function put($key, $value, $minutes = null);

    /**
     * Test if item exists in cache
     * Only returns true if exists && is not expired.
     *
     * @param string : cache item key
     * @param string $key
     * @return bool If cache item exists
     * @author Sang Nguyen
     */
    public function has($key);

    /**
     * Flush cache
     *
     * @return bool If cache is flushed
     * @author Sang Nguyen
     */
    public function flush();
}
