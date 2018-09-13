<?php

namespace Botble\Media\Supports;

use Auth;
use Eloquent;
use Exception;
use File;
use Request;

class Helper
{
    /**
     * Load module's helpers
     * @param $directory
     * @author Sang Nguyen
     * @since 2.0
     */
    public static function autoload($directory)
    {
        $helpers = File::glob($directory . '/*.php');
        foreach ($helpers as $helper) {
            File::requireOnce($helper);
        }
    }

    /**
     * @param Eloquent $object
     * @param string $session_name
     * @return bool
     * @author Sang Nguyen
     */
    public static function handleViewCount(Eloquent $object, $session_name)
    {
        $blank_array = [];
        if (!array_key_exists($object->id, session()->get($session_name, $blank_array))) {
            try {
                $object->increment('views');
                session()->put($session_name . '.' . $object->id, time());
                return true;
            } catch (Exception $ex) {
                return false;
            }
        }

        return false;
    }

    /**
     * Format Log data
     *
     * @param array $input
     * @param string $line
     * @param string $function
     * @param string $class
     * @return array
     * @author Sang Nguyen
     */
    public static function formatLog($input, $line = '', $function = '', $class = '')
    {
        return array_merge($input, [
            'user_id' => Auth::check() ? Auth::user()->getKey() : 'Testing',
            'ip' => Request::ip(),
            'line' => $line,
            'function' => $function,
            'class' => $class,
            'userAgent' => Request::header('User-Agent'),
        ]);
    }

    /**
     * @param $plugin
     * @author Sang Nguyen
     */
    public static function removePluginAssets($plugin)
    {
        $public_path = public_path('vendor/core/plugins/' . $plugin);
        $assets_path = resource_path('assets/plugins/' . $plugin);
        if (File::isDirectory($public_path)) {
            File::deleteDirectory($public_path);
        }
        if (File::isDirectory($assets_path)) {
            File::deleteDirectory($assets_path);
        }
    }
}
