import {Helpers} from '../Helpers/Helpers';
import {ExternalServiceConfig} from '../Config/ExternalServiceConfig';
import {MediaService} from '../Services/MediaService';
import {MessageService} from '../Services/MessageService';

export class Youtube {
    constructor() {
        this.MediaService = new MediaService();

        this.$body = $('body');

        this.$modal = $('#modal_add_from_youtube');

        let _self = this;

        this.setMessage(RV_MEDIA_CONFIG.translations.add_from.youtube.original_msg);

        this.$modal.on('hidden.bs.modal', () => {
            _self.setMessage(RV_MEDIA_CONFIG.translations.add_from.youtube.original_msg);
        });

        this.$body.on('click', '#modal_add_from_youtube .rv-btn-add-youtube-url', function (event) {
            event.preventDefault();

            _self.checkYouTubeVideo($(this).closest('#modal_add_from_youtube').find('.rv-youtube-url'));
        });
    }

    static validateYouTubeLink(url) {
        let p = /^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/;
        return (url.match(p)) ? RegExp.$1 : false;
    }

    static getYouTubeId(url) {
        let regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        let match = url.match(regExp);
        if (match && match[2].length === 11) {
            return match[2];
        }
        return null;
    }

    static getYoutubePlaylistId(url) {
        let regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?list=|\&list=)([^#\&\?]*).*/;
        let match = url.match(regExp);
        if (match) {
            return match[2];
        }
        return null;
    }

    setMessage(msg) {
        this.$modal.find('.modal-notice').html(msg);
    }

    checkYouTubeVideo($input) {
        let _self = this;
        if (!Youtube.validateYouTubeLink($input.val()) || !ExternalServiceConfig.youtube.api_key) {
            if (ExternalServiceConfig.youtube.api_key) {
                _self.setMessage(RV_MEDIA_CONFIG.translations.add_from.youtube.invalid_url_msg);
            } else {
                _self.setMessage(RV_MEDIA_CONFIG.translations.add_from.youtube.no_api_key_msg);
            }
        } else {
            let youtubeId = Youtube.getYouTubeId($input.val());
            let requestUrl = 'https://www.googleapis.com/youtube/v3/videos?id=' + youtubeId;
            let isPlaylist = _self.$modal.find('.custom-checkbox input[type="checkbox"]').is(':checked');

            if (isPlaylist) {
                youtubeId = Youtube.getYoutubePlaylistId($input.val());
                requestUrl = 'https://www.googleapis.com/youtube/v3/playlistItems?playlistId=' + youtubeId;
            }

            $.ajax({
                url: requestUrl + '&key=' + ExternalServiceConfig.youtube.api_key + '&part=snippet',
                type: "GET",
                success: function (data) {
                    if (isPlaylist) {
                        playlistVideoCallback(data, $input.val());
                    } else {
                        singleVideoCallback(data, $input.val());
                    }
                },
                error: function (data) {
                    _self.setMessage(RV_MEDIA_CONFIG.translations.add_from.youtube.error_msg);
                }
            });
        }

        function singleVideoCallback(data, url) {
            $.ajax({
                url: RV_MEDIA_URL.add_external_service,
                type: "POST",
                dataType: 'json',
                data: {
                    type: 'youtube',
                    name: data.items[0].snippet.title,
                    folder_id: Helpers.getRequestParams().folder_id,
                    url: url,
                    options: {
                        thumb: 'https://img.youtube.com/vi/' + data.items[0].id + '/maxresdefault.jpg'
                    }
                },
                success: function (res) {
                    if (res.error) {
                        MessageService.showMessage('error', res.message, RV_MEDIA_CONFIG.translations.message.error_header);
                    } else {
                        MessageService.showMessage('success', res.message, RV_MEDIA_CONFIG.translations.message.success_header);
                        _self.MediaService.getMedia(true);
                    }
                },
                error: function (data) {
                    MessageService.handleError(data);
                }
            });
            _self.$modal.modal('hide');
        }

        function playlistVideoCallback(data, url) {
            _self.$modal.modal('hide');
        }
    }
}
