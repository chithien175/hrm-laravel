<?php

namespace Botble\Media\Http\Controllers;

use Auth;
use Botble\Media\Http\Requests\MediaFileRequest;
use Botble\Media\Repositories\Interfaces\MediaFileInterface;
use Botble\Media\Repositories\Interfaces\MediaFolderInterface;
use Botble\Media\Services\UploadsManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RvMedia;

/**
 * Class FileController
 * @package Botble\Media\Http\Controllers
 * @author Sang Nguyen
 * @since 19/08/2015 07:50 AM
 */
class MediaFileController extends Controller
{
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
     * @param MediaFileInterface $fileRepository
     * @param MediaFolderInterface $folderRepository
     * @param UploadsManager $uploadManager
     * @author Sang Nguyen
     */
    public function __construct(
        MediaFileInterface $fileRepository,
        MediaFolderInterface $folderRepository,
        UploadsManager $uploadManager
    )
    {
        $this->fileRepository = $fileRepository;
        $this->folderRepository = $folderRepository;
        $this->uploadManager = $uploadManager;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @author Sang Nguyen
     */
    public function postAddExternalService(Request $request)
    {
        $type = $request->input('type');
        if (!in_array($type, config('media.external_services'))) {
            return RvMedia::responseError(trans('media::media.invalid_request'));
        }

        $file = $this->fileRepository->getModel();
        $file->name = $this->fileRepository->createName($request->input('name'), $request->input('folder_id'));
        $file->url = $request->input('url');
        $file->size = 0;
        $file->mime_type = $type;
        $file->folder_id = $request->input('folder_id');
        $file->user_id = Auth::user()->getKey();
        $file->options = $request->input('options', []);
        $this->fileRepository->createOrUpdate($file);

        return RvMedia::responseSuccess(trans('media::media.add_success'));
    }

    /**
     * @param MediaFileRequest $request
     * @return JsonResponse
     * @author Sang Nguyen
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function postUpload(MediaFileRequest $request)
    {
        $result = RvMedia::handleUpload(array_first($request->file('file')), $request->input('folder_id', 0));

        if ($result['error'] == false) {
            return RvMedia::responseSuccess([
                'id' => $result['data']->id,
            ]);
        }

        return RvMedia::responseError($result['message']);
    }

    /**
     * @param MediaFileRequest $request
     * @return JsonResponse
     * @author Sang Nguyen
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function postUploadFromEditor(MediaFileRequest $request)
    {
        $result = RvMedia::handleUpload($request->file('upload'), 0, $request->input('upload_type'));

        if ($result['error'] == false) {
            $file = $result['data'];
            if ($request->input('upload_type') == 'tinymce') {
                return response('<script>parent.setImageValue("' . url($file->url) . '"); </script>')->header('Content-Type', 'text/html');
            } else {
                return response('<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("' . $request->input('CKEditorFuncNum') . '", "' . (config('filesystems.default') == 'local' ? '/' . ltrim($file->url, '/') : $file->url) . '", "");</script>')->header('Content-Type', 'text/html');
            }
        }
        return response('<script>alert("' . array_get($result, 'message') . '")</script>')->header('Content-Type', 'text/html');
    }
}
