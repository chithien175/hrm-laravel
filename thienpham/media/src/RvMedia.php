<?php

namespace Botble\Media;

use Auth;
use Botble\Media\Repositories\Interfaces\MediaFileInterface;
use Botble\Media\Repositories\Interfaces\MediaFolderInterface;
use Botble\Media\Services\UploadsManager;
use Botble\Media\Services\ThumbnailService;
use Exception;
use File;
use Illuminate\Http\UploadedFile;

class RvMedia
{

    /**
     * @var array
     */
    protected $permissions = [];

    /**
     * @var UploadsManager
     */
    protected $uploadManager;

    /**
     * @var MediaFileInterface
     */
    protected $fileRepository;

    /**
     * @var MediaFolderInterface
     */
    protected $folderRepository;

    /**
     * @var ThumbnailService
     */
    protected $thumbnailService;

    /**
     * @param MediaFileInterface $fileRepository
     * @param MediaFolderInterface $folderRepository
     * @param UploadsManager $uploadManager
     * @param ThumbnailService $thumbnailService
     * @author Sang Nguyen
     */
    public function __construct(
        MediaFileInterface $fileRepository,
        MediaFolderInterface $folderRepository,
        UploadsManager $uploadManager,
        ThumbnailService $thumbnailService
    )
    {
        $this->fileRepository = $fileRepository;
        $this->folderRepository = $folderRepository;
        $this->uploadManager = $uploadManager;
        $this->thumbnailService = $thumbnailService;

        $this->permissions = config('media.permissions', []);
    }

    /**
     * @return string
     * @author Sang Nguyen
     * @throws \Throwable
     */
    public function renderHeader()
    {
        $urls = $this->getUrls();
        return view('media::header', compact('urls'))->render();
    }

    /**
     * @return string
     * @author Sang Nguyen
     * @throws \Throwable
     */
    public function renderFooter()
    {
        return view('media::footer')->render();
    }

    /**
     * @return string
     * @author Sang Nguyen
     * @throws \Throwable
     */
    public function renderContent()
    {
        return view('media::content')->render();
    }

    /**
     * Get all urls
     *
     * @return array
     * @author Sang Nguyen
     */
    public function getUrls()
    {
        return [
            'base_url' => asset(''),
            'base' => url(config('media.route.prefix')),
            'get_media' => route('media.list'),
            'create_folder' => route('media.folders.create'),
            'get_quota' => route('media.quota'),
            'popup' => route('media.popup'),
            'download' => route('media.download'),
            'upload_file' => route('media.files.upload'),
            'add_external_service' => route('media.files.add_external_service'),
            'get_breadcrumbs' => route('media.breadcrumbs'),
            'global_actions' => route('media.global_actions'),
            'media_upload_from_editor' => route('media.files.upload.from.editor'),
        ];
    }

    /**
     * @param $data
     * @param null $message
     * @return \Illuminate\Http\JsonResponse
     * @author Sang Nguyen
     */
    public function responseSuccess($data, $message = null)
    {
        return response()->json([
            'error' => false,
            'data' => $data,
            'message' => $message,
        ]);
    }

    /**
     * @param $message
     * @param array $data
     * @param null $code
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     * @author Sang Nguyen
     */
    public function responseError($message, $data = [], $code = null, $status = 200)
    {
        return response()->json([
            'error' => true,
            'message' => $message,
            'data' => $data,
            'code' => $code,
        ], $status);
    }

    /**
     * @param $url
     * @return array|mixed
     */
    public function getAllImageSizes($url)
    {
        $images = [];
        foreach (config('media.sizes') as $size) {
            $readable_size = explode('x', $size);
            $images = get_image_url($url, $readable_size);
        }

        return $images;
    }

    /**
     * @param int $folder_id
     * @param $fileUpload
     * @return \Illuminate\Http\JsonResponse|array
     * @author Sang Nguyen
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handleUpload($fileUpload, $folder_id = 0, $path = '')
    {
        /**
         * @var UploadedFile $fileUpload
         */
        try {
            $file = $this->fileRepository->getModel();

            $path = $path . '/';

            $folder_path = str_finish($this->folderRepository->getFullPath($folder_id), $path);

            if ($fileUpload->getSize() / 1024 > (int)config('media.max_file_size_upload')) {
                return [
                    'error' => true,
                    'message' => trans('media::media.file_too_big', ['size' => config('media.max_file_size_upload')]),
                ];
            }

            $file_ext = $fileUpload->getClientOriginalExtension();

            $fileName = $this->fileRepository->createSlug(File::name($fileUpload->getClientOriginalName()), $file_ext, $this->uploadManager->uploadPath($folder_path));

            $path = $folder_path . $fileName;
            $content = File::get($fileUpload->getRealPath());

            $this->uploadManager->saveFile($path, $content);

            $data = $this->uploadManager->fileDetails($path);

            if (empty($data['mime_type'])) {
                return [
                    'error' => true,
                    'message' => trans('media::media.can_not_detect_file_type'),
                ];
            }

            $file->name = $this->fileRepository->createName(File::name($fileUpload->getClientOriginalName()), $folder_id);
            $file->url = $data['url'];
            $file->size = $data['size'];
            $file->mime_type = $data['mime_type'];

            $file->folder_id = $folder_id;
            $file->user_id = Auth::check() ? Auth::user()->getKey() : 0;
            $file->options = request()->get('options', []);
            $this->fileRepository->createOrUpdate($file);

            if (is_image($this->uploadManager->fileMimeType($path))) {
                foreach (config('media.sizes') as $size) {
                    $readable_size = explode('x', $size);
                    $this->thumbnailService
                        ->setImage($fileUpload->getRealPath())
                        ->setSize($readable_size[0], $readable_size[1])
                        ->setDestinationPath($folder_path)
                        ->setFileName(File::name($fileName) . '-' . $size . '.' . $file_ext)
                        ->save();
                }
            }

            return [
                'error' => false,
                'data' => $file,
            ];
        } catch (Exception $ex) {
            return [
                'error' => true,
                'message' => $ex->getMessage(),
            ];
        }
    }

    /**
     * @param array $permissions
     * @author Sang Nguyen
     */
    public function setPermissions(array $permissions)
    {
        $this->permissions = $permissions;
    }

    /**
     * @return array
     * @author Sang Nguyen
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @param $permission
     * @author Sang Nguyen
     */
    public function removePermission($permission)
    {
        array_forget($this->permissions, $permission);
    }

    /**
     * @param $permission
     * @author Sang Nguyen
     */
    public function addPermission($permission)
    {
        $this->permissions[] = $permission;
    }

    /**
     * @param $permission
     * @return bool
     * @author Sang Nguyen
     */
    public function hasPermission($permission)
    {
        return in_array($permission, $this->permissions);
    }

    /**
     * @param array $permissions
     * @return bool
     * @author Sang Nguyen
     */
    public function hasAnyPermission(array $permissions)
    {
        $has_permission = false;
        foreach ($permissions as $permission) {
            if (in_array($permission, $this->permissions)) {
                $has_permission = true;
                break;
            }
        }
        return $has_permission;
    }

    /**
     * Returns a file size limit in bytes based on the PHP upload_max_filesize and post_max_size
     * @return float|int
     * @author Sang Nguyen
     */
    public function getServerConfigMaxUploadFileSize()
    {
        // Start with post_max_size.
        $max_size = $this->parseSize(ini_get('post_max_size'));

        // If upload_max_size is less, then reduce. Except if upload_max_size is
        // zero, which indicates no limit.
        $upload_max = $this->parseSize(ini_get('upload_max_filesize'));
        if ($upload_max > 0 && $upload_max < $max_size) {
            $max_size = $upload_max;
        }

        return $max_size;
    }

    /**
     * @param $size
     * @return float - bytes
     * @author Sang Nguyen
     */
    public function parseSize($size)
    {
        $unit = preg_replace('/[^bkmgtpezy]/i', '', $size); // Remove the non-unit characters from the size.
        $size = preg_replace('/[^0-9\.]/', '', $size); // Remove the non-numeric characters from the size.
        if ($unit) {
            // Find the position of the unit in the ordered string which is the power of magnitude to multiply a kilobyte by.
            return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
        }
        return round($size);
    }
}
