<?php

namespace Botble\Media\Services;

use Carbon\Carbon;
use File;
use Mimey\MimeTypes;
use Storage;

class UploadsManager
{
    /**
     * @var mixed
     */
    protected $disk;

    /**
     * @var MimeTypes
     */
    protected $mime_type;

    /**
     * @author Sang Nguyen
     */
    public function __construct()
    {
        config()->set('filesystems.disks.local.root', config('media.driver.local.root'));

        $this->disk = Storage::disk(config('filesystems.default'));
        $this->mime_type = new MimeTypes();
    }

    /**
     * Sanitize the folder name
     *
     * @param $folder
     * @return string
     * @author Sang Nguyen
     */
    protected function cleanFolder($folder)
    {
        return DIRECTORY_SEPARATOR . trim(str_replace('..', '', $folder), DIRECTORY_SEPARATOR);
    }

    /**
     * Return an array of file details for a file
     *
     * @param $path
     * @return array
     * @author Sang Nguyen
     */
    public function fileDetails($path)
    {
        return [
            'filename' => basename($path),
            'url' => $this->uploadPath($path),
            'mime_type' => $this->fileMimeType($path),
            'size' => $this->fileSize($path),
            'modified' => $this->fileModified($path),
        ];
    }

    /**
     * Return the full web path to a file
     *
     * @param $path
     * @return string
     * @author Sang Nguyen
     */
    public function uploadPath($path)
    {
        return rtrim(config('media.driver.' . config('filesystems.default') . '.path'), '/') . '/' . ltrim($path, '/');
    }

    /**
     * Return the mime type
     *
     * @param $path
     * @return mixed|null|string
     * @author Sang Nguyen
     */
    public function fileMimeType($path)
    {
        return $this->mime_type->getMimeType(File::extension($this->uploadPath($path)));
    }

    /**
     * Return the file size
     *
     * @param $path
     * @return int
     * @author Sang Nguyen
     */
    public function fileSize($path)
    {
        return $this->disk->size($path);
    }

    /**
     * Return the last modified time
     *
     * @param $path
     * @return string
     * @author Sang Nguyen
     */
    public function fileModified($path)
    {
        return Carbon::createFromTimestamp(
            $this->disk->lastModified($path)
        );
    }

    /**
     * Create a new directory
     *
     * @param $folder
     * @return bool|string|\Symfony\Component\Translation\TranslatorInterface
     * @author Sang Nguyen
     */
    public function createDirectory($folder)
    {
        $folder = $this->cleanFolder($folder);

        if ($this->disk->exists($folder)) {
            return trans('media::media.folder_exists', ['folder' => $folder]);
        }

        return $this->disk->makeDirectory($folder);
    }

    /**
     * Delete a directory
     *
     * @param $folder
     * @return bool|string|\Symfony\Component\Translation\TranslatorInterface
     * @author Sang Nguyen
     */
    public function deleteDirectory($folder)
    {
        $folder = $this->cleanFolder($folder);

        $filesFolders = array_merge(
            $this->disk->directories($folder),
            $this->disk->files($folder)
        );
        if (!empty($filesFolders)) {
            return trans('media::media.directory_must_empty');
        }

        return $this->disk->deleteDirectory($folder);
    }

    /**
     * Delete a file
     *
     * @param $path
     * @return bool|string|\Symfony\Component\Translation\TranslatorInterface
     * @author Sang Nguyen
     */
    public function deleteFile($path)
    {
        $path = $this->cleanFolder($path);

        if (!$this->disk->exists($path)) {
            info(trans('media::media.file_not_exists'));
        }

        if (is_image($this->fileMimeType($path))) {
            $filename = pathinfo($path, PATHINFO_FILENAME);
            $files = [$path];
            foreach (config('media.sizes') as $size) {
                $files[] = str_replace($filename, $filename . '-' . $size, $path);
            }

            return $this->disk->delete($files);
        } else {
            return $this->disk->delete([$path]);
        }
    }

    /**
     * Save a file
     *
     * @param $path
     * @param $content
     * @return bool|string|\Symfony\Component\Translation\TranslatorInterface
     * @author Sang Nguyen
     */
    public function saveFile($path, $content)
    {
        $path = $this->cleanFolder($path);

        return $this->disk->put($path, $content);
    }
}
