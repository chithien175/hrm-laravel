import {RecentItems} from '../Config/MediaConfig';
import {Helpers} from '../Helpers/Helpers';
import {MessageService} from '../Services/MessageService';
import {ActionsService} from '../Services/ActionsService';
import {ContextMenuService} from '../Services/ContextMenuService';
import {MediaList} from '../Views/MediaList';
import {MediaDetails} from '../Views/MediaDetails';

export class MediaService {
    constructor() {
        this.MediaList = new MediaList();
        this.MediaDetails = new MediaDetails();
        this.breadcrumbTemplate = $('#rv_media_breadcrumb_item').html();
    }

    getMedia(reload = false, is_popup = false, load_more_file = false) {
        if (typeof RV_MEDIA_CONFIG.pagination != 'undefined') {
            if (RV_MEDIA_CONFIG.pagination.in_process_get_media) {
                return;
            } else {
                RV_MEDIA_CONFIG.pagination.in_process_get_media = true;
            }
        }

        let _self = this;

        _self.getFileDetails({
            icon: 'fa fa-picture-o',
            nothing_selected: '',
        });

        let params = Helpers.getRequestParams();

        if (params.view_in === 'recent') {
            params.recent_items = RecentItems;
        }

        if (is_popup === true) {
            params.is_popup = true;
        } else {
            params.is_popup = undefined;
        }

        params.onSelectFiles = undefined;

        if (typeof params.search != 'undefined' && params.search != '' && typeof params.selected_file_id != 'undefined') {
            params.selected_file_id = undefined
        }

        params.load_more_file = load_more_file;
        if (typeof RV_MEDIA_CONFIG.pagination != 'undefined') {
            params.paged = RV_MEDIA_CONFIG.pagination.paged;
            params.posts_per_page = RV_MEDIA_CONFIG.pagination.posts_per_page;
        }
        $.ajax({
            url: RV_MEDIA_URL.get_media,
            type: 'GET',
            data: params,
            dataType: 'json',
            beforeSend: function () {
                Helpers.showAjaxLoading();
            },
            success: function (res) {
                _self.MediaList.renderData(res.data, reload, load_more_file);
                _self.fetchQuota();
                _self.renderBreadcrumbs(res.data.breadcrumbs);
                MediaService.refreshFilter();
                ActionsService.renderActions();

                if (typeof RV_MEDIA_CONFIG.pagination != 'undefined') {
                    if (typeof RV_MEDIA_CONFIG.pagination.paged != 'undefined') {
                        RV_MEDIA_CONFIG.pagination.paged += 1;
                    }

                    if (typeof RV_MEDIA_CONFIG.pagination.in_process_get_media != 'undefined') {
                        RV_MEDIA_CONFIG.pagination.in_process_get_media = false;
                    }

                    if (typeof RV_MEDIA_CONFIG.pagination.posts_per_page != 'undefined' && res.data.files.length < RV_MEDIA_CONFIG.pagination.posts_per_page && typeof RV_MEDIA_CONFIG.pagination.has_more != 'undefined') {
                        RV_MEDIA_CONFIG.pagination.has_more = false;
                    }
                }
            },
            complete: function (data) {
                Helpers.hideAjaxLoading();
            },
            error: function (data) {
                MessageService.handleError(data);
            }
        });
    }

    getFileDetails(data) {
        this.MediaDetails.renderData(data);
    }

    fetchQuota() {
        $.ajax({
            url: RV_MEDIA_URL.get_quota,
            type: 'GET',
            dataType: 'json',
            beforeSend: function () {

            },
            success: function (res) {
                let data = res.data;

                $('.rv-media-aside-bottom .used-analytics span').html(data.used + ' / ' + data.quota);
                $('.rv-media-aside-bottom .progress-bar').css({
                    width: data.percent + '%',
                });
            },
            error: function (data) {
                MessageService.handleError(data);
            }
        });
    }

    renderBreadcrumbs(breadcrumbItems) {
        let _self = this;
        let $breadcrumbContainer = $('.rv-media-breadcrumb .breadcrumb');
        $breadcrumbContainer.find('li').remove();

        _.each(breadcrumbItems, function (value, index) {
            let template = _self.breadcrumbTemplate;
            template = template
                .replace(/__name__/gi, value.name || '')
                .replace(/__icon__/gi, value.icon ? '<i class="' + value.icon + '"></i>' : '')
                .replace(/__folderId__/gi, value.id || 0);
            $breadcrumbContainer.append($(template));
        });
        $('.rv-media-container').attr('data-breadcrumb-count', _.size(breadcrumbItems));
    }

    static refreshFilter() {
        let $rvMediaContainer = $('.rv-media-container');
        let view_in = Helpers.getRequestParams().view_in;
        if (view_in !== 'all_media' && Helpers.getRequestParams().folder_id == 0) {
            $('.rv-media-actions .btn:not([data-type="refresh"]):not(label)').addClass('disabled');
            $rvMediaContainer.attr('data-allow-upload', 'false');
        } else {
            $('.rv-media-actions .btn:not([data-type="refresh"]):not(label)').removeClass('disabled');
            $rvMediaContainer.attr('data-allow-upload', 'true');
        }

        $('.rv-media-actions .btn.js-rv-media-change-filter-group').removeClass('disabled');

        let $empty_trash_btn = $('.rv-media-actions .btn[data-action="empty_trash"]');
        if (view_in === 'trash') {
            $empty_trash_btn.removeClass('hidden').removeClass('disabled');
            if (!_.size(Helpers.getItems())) {
                $empty_trash_btn.addClass('hidden').addClass('disabled');
            }
        } else {
            $empty_trash_btn.addClass('hidden');
        }

        ContextMenuService.destroyContext();
        ContextMenuService.initContext();

        $rvMediaContainer.attr('data-view-in', view_in);
    }
}