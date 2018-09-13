export class MessageService {
    static showMessage(type, message, messageHeader) {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-bottom-right',
            onclick: null,
            showDuration: 1000,
            hideDuration: 1000,
            timeOut: 10000,
            extendedTimeOut: 1000,
            showEasing: 'swing',
            hideEasing: 'linear',
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut'
        };
        toastr[type](message, messageHeader);
    }

    static handleError(data) {
        if (typeof (data.responseJSON) !== 'undefined') {
            if (typeof (data.responseJSON.message) !== 'undefined') {
                MessageService.showMessage('error', data.responseJSON.message, RV_MEDIA_CONFIG.translations.message.error_header);
            } else {
                $.each(data.responseJSON, function (index, el) {
                    $.each(el, function (key, item) {
                        MessageService.showMessage('error', item, RV_MEDIA_CONFIG.translations.message.error_header);
                    });
                });
            }
        } else {
            MessageService.showMessage('error', data.statusText, RV_MEDIA_CONFIG.translations.message.error_header);
        }
    }
}