<?php

if (!function_exists('is_image')) {
    /**
     * Is the mime type an image
     *
     * @param $mimeType
     * @return bool
     * @author Sang Nguyen
     */
    function is_image($mimeType)
    {
        return starts_with($mimeType, 'image/');
    }
}

if (!function_exists('get_image_url')) {
    /**
     * @param $url
     * @param $size
     * @param bool $relative_path
     * @param null $default
     * @return mixed
     * @author Sang Nguyen
     */
    function get_image_url($url, $size = null, $relative_path = false, $default = null)
    {
        if (empty($url)) {
            return $default;
        }

        if (array_key_exists($size, config('media.sizes'))) {
            $url = str_replace(File::name($url) . '.' . File::extension($url), File::name($url) . '-' . config('media.sizes.' . $size) . '.' . File::extension($url), $url);
        }

        if ($relative_path) {
            return $url;
        }

        if ($url == '__image__') {
            return url($default);
        }

        return url($url);
    }
}

if (!function_exists('get_object_image')) {
    /**
     * @param $image
     * @param null $size
     * @param bool $relative_path
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function get_object_image($image, $size = null, $relative_path = false)
    {
        if (!empty($image)) {
            if (empty($size) || $image == '__value__') {
                if ($relative_path) {
                    return $image;
                }
                return url($image);
            }
            return get_image_url($image, $size, $relative_path);
        } else {
            return get_image_url(config('media.default-img'), null, $relative_path);
        }
    }
}

if (!function_exists('rv_media_handle_upload')) {
    /**
     * @param $fileUpload
     * @param int $folder_id
     * @param string $path
     * @return array|\Illuminate\Http\JsonResponse
     * @author Sang Nguyen
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    function rv_media_handle_upload($fileUpload, $folder_id = 0, $path = '')
    {
        return RvMedia::handleUpload($fileUpload, $folder_id, $path);
    }
}

if (!function_exists('rv_get_image_list')) {
    /**
     * @param array $imagesList
     * @param array $sizes
     * @return array
     */
    function rv_get_image_list(array $imagesList, array $sizes)
    {
        $result = [];
        foreach ($sizes as $size) {
            $images = [];

            foreach ($imagesList as $url) {
                $images[] = get_image_url($url, $size);
            }

            $result[$size] = $images;
        }

        return $result;
    }
}
