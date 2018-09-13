<?php

namespace Botble\Media\Http\Controllers;

use Auth;
use Botble\Media\Http\Requests\MediaFolderRequest;
use Botble\Media\Repositories\Interfaces\MediaFileInterface;
use Botble\Media\Repositories\Interfaces\MediaFolderInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use RvMedia;

/**
 * Class FolderController
 * @package Botble\Media\Http\Controllers
 * @author Sang Nguyen
 * @since 19/08/2015 07:55 AM
 */
class MediaFolderController extends Controller
{
    /**
     * @var MediaFolderInterface
     */
    protected $folderRepository;

    /**
     * @var MediaFileInterface
     */
    protected $fileRepository;

    /**
     * FolderController constructor.
     * @param MediaFolderInterface $folderRepository
     * @param MediaFileInterface $fileRepository
     * @author Sang Nguyen
     */
    public function __construct(MediaFolderInterface $folderRepository, MediaFileInterface $fileRepository)
    {
        $this->folderRepository = $folderRepository;
        $this->fileRepository = $fileRepository;
    }

    /**
     * @param MediaFolderRequest $request
     * @return JsonResponse
     * @author Sang Nguyen
     */
    public function postCreate(MediaFolderRequest $request)
    {
        $name = $request->input('name');

        try {
            $parent_id = $request->input('parent_id');

            $folder = $this->folderRepository->getModel();
            $folder->user_id = Auth::user()->getKey();
            $folder->name = $this->folderRepository->createName($name, $parent_id);
            $folder->slug = $this->folderRepository->createSlug($name, $parent_id);
            $folder->parent_id = $parent_id;
            $this->folderRepository->createOrUpdate($folder);
            return RvMedia::responseSuccess([], trans('media::media.folder_created'));
        } catch (Exception $ex) {
            return RvMedia::responseError($ex->getMessage());
        }
    }
}
