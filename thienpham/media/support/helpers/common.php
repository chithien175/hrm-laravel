<?php

use Carbon\Carbon;

if (!function_exists('format_time')) {
    /**
     * @param DateTime $timestamp
     * @param $format
     * @return mixed
     * @author Sang Nguyen
     */
    function format_time(DateTime $timestamp, $format = 'j M Y H:i')
    {
        $first = Carbon::create(0000, 0, 0, 00, 00, 00);
        if ($timestamp->lte($first)) {
            return '';
        }

        return $timestamp->format($format);
    }
}

if (!function_exists('date_from_database')) {
    /**
     * @param $time
     * @param string $format
     * @return mixed
     * @author Sang Nguyen
     */
    function date_from_database($time, $format = 'Y-m-d')
    {
        if (empty($time)) {
            return $time;
        }
        return format_time(Carbon::parse($time), $format);
    }
}

if (!function_exists('human_file_size')) {
    /**
     * @param $bytes
     * @param int $precision
     * @return string
     * @author Sang Nguyen
     */
    function human_file_size($bytes, $precision = 2)
    {
        $units = ['B', 'kB', 'MB', 'GB', 'TB'];

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return number_format($bytes, $precision, ',', '.') . ' ' . $units[$pow];
    }
}

if (!function_exists('string_limit_words')) {
    /**
     * @param $string
     * @param $limit
     * @return string
     * @author Sang Nguyen
     */
    function string_limit_words($string, $limit)
    {
        $ext = null;
        if (strlen($string) > $limit) {
            $ext = '...';
        }
        $string = substr($string, 0, $limit);
        return $string . $ext;
    }
}

if (!function_exists('get_file_data')) {
    /**
     * @param $file
     * @param $convert_to_array
     * @return bool|mixed
     * @author Sang Nguyen
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    function get_file_data($file, $convert_to_array = true)
    {
        $file = File::get($file);
        if (!empty($file)) {
            if ($convert_to_array) {
                return json_decode($file, true);
            } else {
                return $file;
            }
        }
        if (!$convert_to_array) {
            return null;
        }
        return [];
    }
}

if (!function_exists('json_encode_prettify')) {
    /**
     * @param $data
     * @return string
     */
    function json_encode_prettify($data)
    {
        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}

if (!function_exists('save_file_data')) {
    /**
     * @param $path
     * @param $data
     * @param $json
     * @return bool|mixed
     * @author Sang Nguyen
     */
    function save_file_data($path, $data, $json = true)
    {
        try {
            if ($json) {
                $data = json_encode_prettify($data);
            }
            if (!File::isDirectory(dirname($path))) {
                File::makeDirectory(dirname($path), 493, true);
            }
            File::put($path, $data);
            return true;
        } catch (Exception $ex) {
            info($ex->getMessage());
            return false;
        }
    }
}

if (!function_exists('scan_folder')) {
    /**
     * @param $path
     * @param array $ignore_files
     * @return array
     * @author Sang Nguyen
     */
    function scan_folder($path, $ignore_files = [])
    {
        try {
            if (is_dir($path)) {
                $data = array_diff(scandir($path), array_merge(['.', '..'], $ignore_files));
                natsort($data);
                return $data;
            }
            return [];
        } catch (Exception $ex) {
            return [];
        }
    }
}
