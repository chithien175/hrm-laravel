import {Helpers} from './App/Helpers/Helpers';
import {MediaConfig} from './App/Config/MediaConfig';

export class EditorService {
    static editorSelectFile(selectedFiles) {

        let is_ckeditor = Helpers.getUrlParam('CKEditor') || Helpers.getUrlParam('CKEditorFuncNum');

        if (window.opener && is_ckeditor) {
            let firstItem = _.first(selectedFiles);

            window.opener.CKEDITOR.tools.callFunction(Helpers.getUrlParam('CKEditorFuncNum'), firstItem.url);

            if (window.opener) {
                window.close();
            }
        } else {
            // No WYSIWYG editor found, use custom method.
        }
    }
}

class rvMedia {
    constructor(selector, options) {
        window.rvMedia = window.rvMedia || {};

        let $body = $('body');

        let defaultOptions = {
            multiple: true,
            type: '*',
            onSelectFiles: function (files, $el) {

            }
        };

        options = $.extend(true, defaultOptions, options);

        let clickCallback = function (event) {
            event.preventDefault();
            let $current = $(this);
            $('#rv_media_modal').modal();

            window.rvMedia.options = options;
            window.rvMedia.options.open_in = 'modal';

            window.rvMedia.$el = $current;

            MediaConfig.request_params.filter = 'everything';
            Helpers.storeConfig();

            let ele_options = window.rvMedia.$el.data('rv-media');
            if (typeof ele_options !== 'undefined' && ele_options.length > 0) {
                ele_options = ele_options[0];
                window.rvMedia.options = $.extend(true, window.rvMedia.options, ele_options || {});
                if (typeof ele_options.selected_file_id !== 'undefined') {
                    window.rvMedia.options.is_popup = true;
                } else if (typeof window.rvMedia.options.is_popup !== 'undefined') {
                    window.rvMedia.options.is_popup = undefined;
                }
            }

            if ($('#rv_media_body .rv-media-container').length === 0) {
                $('#rv_media_body').load(RV_MEDIA_URL.popup, function (data) {
                    if (data.error) {
                        alert(data.message);
                    }
                    $('#rv_media_body')
                        .removeClass('media-modal-loading')
                        .closest('.modal-content').removeClass('bb-loading');
                });
            } else {
                $(document).find('.rv-media-container .js-change-action[data-type=refresh]').trigger('click');
            }
        };

        if (typeof selector === 'string') {
            $body.on('click', selector, clickCallback);
        } else {
            selector.on('click', clickCallback);
        }
    }
}

window.RvMediaStandAlone = rvMedia;

$('.js-insert-to-editor').off('click').on('click', function (event) {
    event.preventDefault();
    let selectedFiles = Helpers.getSelectedFiles();
    if (_.size(selectedFiles) > 0) {
        EditorService.editorSelectFile(selectedFiles);
    }
});

$.fn.rvMedia = function (options) {
    let $selector = $(this);

    MediaConfig.request_params.filter = 'everything';
    if (MediaConfig.request_params.view_in === 'trash') {
        $(document).find('.js-insert-to-editor').prop('disabled', true);
    } else {
        $(document).find('.js-insert-to-editor').prop('disabled', false);
    }
    Helpers.storeConfig();

    new rvMedia($selector, options);
};
