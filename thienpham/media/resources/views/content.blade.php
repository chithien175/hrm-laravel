<div class="rv-media-container">
    <div class="rv-media-wrapper">
        <input type="checkbox" id="media_aside_collapse" class="fake-click-event hidden">
        <input type="checkbox" id="media_details_collapse" class="fake-click-event hidden">
        <aside class="rv-media-aside @if (config('media.sidebar_display') != 'vertical') rv-media-aside-hide-desktop @endif">
            <label for="media_aside_collapse" class="collapse-sidebar">
                <i class="fa fa-sign-out"></i>
            </label>
            <div class="rv-media-block rv-media-filters">
                <div class="rv-media-block-title">
                    {{ trans('media::media.filter') }}
                </div>
                <div class="rv-media-block-content">
                    <ul class="rv-media-aside-list">
                        <li>
                            <a href="#" class="js-rv-media-change-filter" data-type="filter" data-value="everything">
                                <i class="fa fa-recycle"></i> {{ trans('media::media.everything') }}
                            </a>
                        </li>
                        @if (array_key_exists('image', config('media.mime_types', [])))
                            <li>
                                <a href="#" class="js-rv-media-change-filter" data-type="filter" data-value="image">
                                    <i class="fa fa-file-image-o"></i> {{ trans('media::media.image') }}
                                </a>
                            </li>
                        @endif
                        @if (array_key_exists('video', config('media.mime_types', [])))
                            <li>
                                <a href="#" class="js-rv-media-change-filter" data-type="filter" data-value="video">
                                    <i class="fa fa-file-video-o"></i> {{ trans('media::media.video') }}
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="#" class="js-rv-media-change-filter" data-type="filter" data-value="document">
                                <i class="fa fa-file-o"></i> {{ trans('media::media.document') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="rv-media-block rv-media-view-in">
                <div class="rv-media-block-title">
                    {{ trans('media::media.view_in') }}
                </div>
                <div class="rv-media-block-content">
                    <ul class="rv-media-aside-list">
                        <li>
                            <a href="#" class="js-rv-media-change-filter" data-type="view_in" data-value="all_media">
                                <i class="fa fa-globe"></i> {{ trans('media::media.all_media') }}
                            </a>
                        </li>
                        @if (RvMedia::hasAnyPermission(['folders.delete', 'files.delete']))
                            <li>
                                <a href="#" class="js-rv-media-change-filter" data-type="view_in" data-value="trash">
                                    <i class="fa fa-trash"></i> {{ trans('media::media.trash') }}
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="#" class="js-rv-media-change-filter" data-type="view_in" data-value="recent">
                                <i class="fa fa-clock-o"></i> {{ trans('media::media.recent') }}
                            </a>
                        </li>
                        <li>
                            <a href="#" class="js-rv-media-change-filter" data-type="view_in" data-value="favorites">
                                <i class="fa fa-star"></i> {{ trans('media::media.favorites') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="rv-media-aside-bottom">
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 0;"></div>
                </div>
                <div class="used-analytics"><span>...</span></div>
            </div>
        </aside>
        <div class="rv-media-main-wrapper">
            <header class="rv-media-header">
                <div class="rv-media-top-header">
                    <div class="rv-media-actions">
                        <label for="media_aside_collapse" class="btn btn-danger collapse-sidebar">
                            <i class="fa fa-bars"></i>
                        </label>
                        @if (RvMedia::hasPermission('files.create'))
                            <button class="btn btn-success js-dropzone-upload">
                                <i class="fa fa-cloud-upload"></i> {{ trans('media::media.upload') }}
                            </button>
                        @endif
                        @if (config('media.allow_external_services') && RvMedia::hasPermission('files.create'))
                            <div class="btn-group" role="group">
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">
                                        <i class="fa fa-plus"></i> {{ trans('media::media.add_from') }}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#modal_add_from_youtube">
                                                <i class="fa fa-youtube"></i> {{ trans('media::media.youtube') }}
                                            </a>
                                        </li>
                                        @if (app()->environment() == 'demo')
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#modal_coming_soon">
                                                    <i class="fa fa-vimeo"></i> {{ trans('media::media.vimeo') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#modal_coming_soon">
                                                    <i class="fa fa-vine"></i> {{ trans('media::media.vine') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#modal_coming_soon">
                                                    <i class="fa fa-youtube-play"></i> {{ trans('media::media.daily_motion') }}
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        @endif
                        @if (RvMedia::hasPermission('folders.create'))
                            <button class="btn btn-success" data-toggle="modal" data-target="#modal_add_folder">
                                <i class="fa fa-folder"></i> {{ trans('media::media.create_folder') }}
                            </button>
                        @endif
                        <button class="btn btn-success js-change-action" data-type="refresh">
                            <i class="fa fa-refresh"></i> {{ trans('media::media.refresh') }}
                        </button>

                        @if (config('media.sidebar_display') != 'vertical')
                            <div class="btn-group" role="group">
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle js-rv-media-change-filter-group" type="button" data-toggle="dropdown">
                                        <i class="fa fa-filter"></i> {{ trans('media::media.filter') }} <span class="js-rv-media-filter-current"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#" class="js-rv-media-change-filter" data-type="filter" data-value="everything">
                                                <i class="fa fa-recycle"></i> {{ trans('media::media.everything') }}
                                            </a>
                                        </li>
                                        @if (array_key_exists('image', config('media.mime_types', [])))
                                            <li>
                                                <a href="#" class="js-rv-media-change-filter" data-type="filter" data-value="image">
                                                    <i class="fa fa-file-image-o"></i> {{ trans('media::media.image') }}
                                                </a>
                                            </li>
                                        @endif
                                        @if (array_key_exists('video', config('media.mime_types', [])))
                                            <li>
                                                <a href="#" class="js-rv-media-change-filter" data-type="filter" data-value="video">
                                                    <i class="fa fa-file-video-o"></i> {{ trans('media::media.video') }}
                                                </a>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="#" class="js-rv-media-change-filter" data-type="filter" data-value="document">
                                                <i class="fa fa-file-o"></i> {{ trans('media::media.document') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="btn-group" role="group">
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle js-rv-media-change-filter-group" type="button" data-toggle="dropdown">
                                    <i class="fa fa-eye"></i> {{ trans('media::media.view_in') }} <span class="js-rv-media-filter-current"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#" class="js-rv-media-change-filter" data-type="view_in" data-value="all_media">
                                            <i class="fa fa-globe"></i> {{ trans('media::media.all_media') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="js-rv-media-change-filter" data-type="view_in" data-value="trash">
                                            <i class="fa fa-trash"></i> {{ trans('media::media.trash') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="js-rv-media-change-filter" data-type="view_in" data-value="recent">
                                            <i class="fa fa-clock-o"></i> {{ trans('media::media.recent') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="js-rv-media-change-filter" data-type="view_in" data-value="favorites">
                                            <i class="fa fa-star"></i> {{ trans('media::media.favorites') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endif

                        @if (RvMedia::hasAnyPermission(['folders.delete', 'files.delete']))
                            <button class="btn btn-danger js-files-action hidden" data-action="empty_trash">
                                <i class="fa fa-trash-o"></i> {{ trans('media::media.empty_trash') }}
                            </button>
                        @endif

                    </div>
                    <div class="rv-media-search">
                        <form class="input-search-wrapper" action="" method="GET">
                            <input type="text" class="form-control" placeholder="{{ trans('media::media.search_file_and_folder') }}">
                            <button class="btn btn-link" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="rv-media-bottom-header">
                    <div class="rv-media-breadcrumb">
                        <ul class="breadcrumb"></ul>
                    </div>
                    <div class="rv-media-tools">
                        <div class="btn-group" role="group">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle"
                                        type="button"
                                        data-toggle="dropdown">
                                    {{ trans('media::media.sort') }} <i class="fa fa-sort-alpha-desc"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="#"
                                           class="js-rv-media-change-filter"
                                           data-type="sort_by"
                                           data-value="name-asc">
                                            <i class="fa fa-sort-alpha-asc"></i> {{ trans('media::media.file_name_asc') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="js-rv-media-change-filter"
                                           data-type="sort_by"
                                           data-value="name-desc">
                                            <i class="fa fa-sort-alpha-desc"></i> {{ trans('media::media.file_name_desc') }}
                                        </a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="#"
                                           class="js-rv-media-change-filter"
                                           data-type="sort_by"
                                           data-value="created_at-asc">
                                            <i class="fa fa-sort-numeric-asc"></i> {{ trans('media::media.created_date_asc') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="js-rv-media-change-filter"
                                           data-type="sort_by"
                                           data-value="created_at-desc">
                                            <i class="fa fa-sort-numeric-desc"></i> {{ trans('media::media.created_date_desc') }}
                                        </a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="#"
                                           class="js-rv-media-change-filter"
                                           data-type="sort_by"
                                           data-value="updated_at-asc">
                                            <i class="fa fa-sort-numeric-asc"></i> {{ trans('media::media.uploaded_date_asc') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="js-rv-media-change-filter"
                                           data-type="sort_by"
                                           data-value="updated_at-desc">
                                            <i class="fa fa-sort-numeric-desc"></i> {{ trans('media::media.uploaded_date_desc') }}
                                        </a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="#"
                                           class="js-rv-media-change-filter"
                                           data-type="sort_by"
                                           data-value="size-asc">
                                            <i class="fa fa-sort-numeric-asc"></i> {{ trans('media::media.size_asc') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="js-rv-media-change-filter"
                                           data-type="sort_by"
                                           data-value="size-desc">
                                            <i class="fa fa-sort-numeric-desc"></i> {{ trans('media::media.size_desc') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown rv-dropdown-actions disabled">
                                <button class="btn btn-default dropdown-toggle"
                                        type="button" data-toggle="dropdown">
                                    {{ trans('media::media.actions') }} &nbsp;<i class="fa fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right"></ul>
                            </div>
                        </div>
                        <div class="btn-group js-rv-media-change-view-type" role="group">
                            <button class="btn btn-default" type="button" data-type="tiles">
                                <i class="fa fa-th-large"></i>
                            </button>
                            <button class="btn btn-default" type="button" data-type="list">
                                <i class="fa fa-th-list"></i>
                            </button>
                        </div>
                        <label for="media_details_collapse" class="btn btn-link collapse-panel">
                            <i class="fa fa-sign-out"></i>
                        </label>
                    </div>
                </div>
            </header>

            <main class="rv-media-main">
                <div class="rv-media-items"></div>
                <div class="rv-media-details hidden">
                    <div class="rv-media-thumbnail">
                        <i class="fa fa-picture-o"></i>
                    </div>
                    <div class="rv-media-description">
                        <div class="rv-media-name">
                            <p>{{ trans('media::media.nothing_is_selected') }}</p>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="rv-media-footer hidden">
                <button type="button" class="btn btn-danger btn-lg js-insert-to-editor">{{ trans('media::media.insert') }}</button>
            </footer>
        </div>
        <div class="rv-upload-progress hide-the-pane">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ trans('media::media.upload_progress') }}</h3>
                    <a href="javascript:void(0);" class="close-pane">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
                <div class="panel-body">
                    <ul class="rv-upload-progress-table"></ul>
                </div>
            </div>
        </div>
    </div>

    <div class="rv-modals">
        <div class="modal fade" tabindex="-1" role="dialog" id="modal_coming_soon">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss-modal="#modal_coming_soon" aria-label="{{ trans('media::media.close') }}">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">
                            <i class="fa fa-windows"></i> {{ trans('media::media.coming_soon') }}
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p>These features are on development</p>
                        <div class="modal-notice"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="modal_add_from_youtube">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss-modal="#modal_add_from_youtube" aria-label="{{ trans('media::media.close') }}">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">
                            <i class="fa fa-windows"></i> {{ trans('media::media.add_from_youtube') }}
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="input-group-addon custom-checkbox">
                                    <input type="checkbox">
                                    <span class="pull-left"></span>
                                    <small>{{ trans('media::media.playlist') }}</small>
                                </label>
                                <input type="text" class="form-control rv-youtube-url" placeholder="https://">
                                <div class="input-group-btn">
                                    <button class="btn btn-success rv-btn-add-youtube-url" type="button">{{ trans('media::media.add_url') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-notice"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="modal_add_folder">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss-modal="#modal_add_folder" aria-label="{{ trans('media::media.close') }}">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">
                            <i class="fa fa-windows"></i> {{ trans('media::media.create_folder') }}
                        </h4>
                    </div>
                    <div class="modal-body">
                        <form class="rv-form form-add-folder">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="{{ trans('media::media.folder_name') }}">
                                <div class="input-group-btn">
                                    <button class="btn btn-success rv-btn-add-folder" type="submit">{{ trans('media::media.create') }}</button>
                                </div>
                            </div>
                        </form>
                        <div class="modal-notice"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="modal_rename_items">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="rv-form form-rename">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss-modal="#modal_rename_items" aria-label="{{ trans('media::media.close') }}">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">
                                <i class="fa fa-windows"></i> {{ trans('media::media.rename') }}
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="rename-items"></div>
                            <div class="modal-notice"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss-modal="#modal_rename_items">{{ trans('media::media.close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ trans('media::media.save_changes') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="modal_trash_items">
            <div class="modal-dialog modal-danger" role="document">
                <div class="modal-content">
                    <form class="rv-form form-delete-items">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss-modal="#modal_trash_items" aria-label="{{ trans('media::media.close') }}">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">
                                <i class="fa fa-windows"></i> {{ trans('media::media.move_to_trash') }}
                            </h4>
                        </div>
                        <div class="modal-body">
                            <p>{{ trans('media::media.confirm_trash') }}</p>
                            <div class="modal-notice"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">{{ trans('media::media.confirm') }}</button>
                            <button type="button" class="btn btn-primary" data-dismiss-modal="#modal_trash_items">{{ trans('media::media.close') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="modal_delete_items">
            <div class="modal-dialog modal-danger" role="document">
                <div class="modal-content">
                    <form class="rv-form form-delete-items">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss-modal="#modal_delete_items" aria-label="{{ trans('media::media.close') }}">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">
                                <i class="fa fa-windows"></i> {{ trans('media::media.confirm_delete') }}
                            </h4>
                        </div>
                        <div class="modal-body">
                            <p>{{ trans('media::media.confirm_delete_description') }}</p>
                            <div class="modal-notice"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">{{ trans('media::media.confirm') }}</button>
                            <button type="button" class="btn btn-primary" data-dismiss-modal="#modal_delete_items">{{ trans('media::media.close') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="modal_empty_trash">
            <div class="modal-dialog modal-danger" role="document">
                <div class="modal-content">
                    <form class="rv-form form-empty-trash">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss-modal="#modal_empty_trash" aria-label="{{ trans('media::media.close') }}">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">
                                <i class="fa fa-windows"></i> {{ trans('media::media.empty_trash_title') }}
                            </h4>
                        </div>
                        <div class="modal-body">
                            <p>{{ trans('media::media.empty_trash_description') }}</p>
                            <div class="modal-notice"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">{{ trans('media::media.confirm') }}</button>
                            <button type="button" class="btn btn-primary" data-dismiss-modal="#modal_empty_trash">{{ trans('media::media.close') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <button class="hidden js-rv-clipboard-temp"></button>
</div>
<script type="text/x-custom-template" id="rv_media_loading">
    <div class="loading-wrapper">
        <div class="showbox">
            <div class="loader">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2"
                            stroke-miterlimit="10"/>
                </svg>
            </div>
        </div>
    </div>
</script>

<script type="text/x-custom-template" id="rv_action_item">
    <li>
        <a href="javascript:;" class="js-files-action" data-action="__action__">
            <i class="__icon__"></i> __name__
        </a>
    </li>
</script>

<script type="text/x-custom-template" id="rv_media_items_list">
    <div class="rv-media-list">
        <ul>
            <li class="no-items">
                <i class="fa fa-cloud-upload"></i>
                <h3>Drop files and folders here</h3>
                <p>Or use the upload button above.</p>
            </li>
            <li class="rv-media-list-title up-one-level js-up-one-level" title="{{ trans('media::media.up_level') }}">
                <div class="custom-checkbox"></div>
                <div class="rv-media-file-name">
                    <i class="fa fa-level-up"></i>
                    <span>...</span>
                </div>
                <div class="rv-media-file-size"></div>
                <div class="rv-media-created-at"></div>
            </li>
        </ul>
    </div>
</script>

<script type="text/x-custom-template" id="rv_media_items_tiles" class="hidden">
    <div class="rv-media-grid">
        <ul>
            <li class="no-items">
                <i class="__noItemIcon__"></i>
                <h3>__noItemTitle__</h3>
                <p>__noItemMessage__</p>
            </li>
            <li class="rv-media-list-title up-one-level js-up-one-level">
                <div class="rv-media-item" data-context="__type__" title="{{ trans('media::media.up_level') }}">
                    <div class="rv-media-thumbnail">
                        <i class="fa fa-level-up"></i>
                    </div>
                    <div class="rv-media-description">
                        <div class="title">...</div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</script>

<script type="text/x-custom-template" id="rv_media_items_list_element">
    <li class="rv-media-list-title js-media-list-title js-context-menu" data-context="__type__" title="__name__" data-id="__id__">
        <div class="custom-checkbox">
            <label>
                <input type="checkbox">
                <span></span>
            </label>
        </div>
        <div class="rv-media-file-name">
            __thumb__
            <span>__name__</span>
        </div>
        <div class="rv-media-file-size">__size__</div>
        <div class="rv-media-created-at">__date__</div>
    </li>
</script>

<script type="text/x-custom-template" id="rv_media_items_tiles_element">
    <li class="rv-media-list-title js-media-list-title js-context-menu" data-context="__type__" data-id="__id__">
        <input type="checkbox" class="hidden">
        <div class="rv-media-item" title="__name__">
            <div class="rv-media-thumbnail">
                __thumb__
            </div>
            <div class="rv-media-description">
                <div class="title title{{Request::get('file_id')}}">__name__</div>
            </div>
        </div>
    </li>
</script>

<script type="text/x-custom-template" id="rv_media_upload_progress_item">
    <li>
        <div class="rv-table-col">
            <span class="file-name">__fileName__</span>
            <div class="file-error"></div>
        </div>
        <div class="rv-table-col">
            <span class="file-size">__fileSize__</span>
        </div>
        <div class="rv-table-col">
            <span class="label label-__status__">__message__</span>
        </div>
    </li>
</script>

<script type="text/x-custom-template" id="rv_media_breadcrumb_item">
    <li>
        <a href="#" data-folder="__folderId__" class="js-change-folder">__icon__ __name__</a>
    </li>
</script>

<script type="text/x-custom-template" id="rv_media_rename_item">
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="__icon__"></i></span>
            <input class="form-control" placeholder="__placeholder__" value="__value__">
        </div>
    </div>
</script>
