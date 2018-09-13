/* ========================================================================
 * AddMedia.js v1.0
 * Requires Botble Media
 * ======================================================================== */

+function ($) {
    'use strict';

    /**
     * @param element
     * @param options
     * @constructor
     */
    var AddMedia = function (element, options) {
        this.options = options;
        $(element).rvMedia({
            multiple: true,
            onSelectFiles: function (files, $el) {
                if (typeof files !== 'undefined') {
                    switch ($el.data('editor')) {
                        case 'summernote':
                            handleInsertImagesForSummerNote($el, files);
                            break;
                        case 'wysihtml5':
                            var editor = $(options.target).data('wysihtml5').editor;
                            handleInsertImagesForWysihtml5Editor(editor, files);
                            break;
                        case 'ckeditor':
                            handleForCkeditor($el, files);
                            break;
                        case 'tinymce':
                            handleForTinyMce(files);
                            break;
                    }
                }
            }
        });
    };

    AddMedia.VERSION = '1.1.0';

    /**
     * Insert images to summernote editor
     * @param $el
     * @param files
     */
    function handleInsertImagesForSummerNote($el, files) {
        if (files.length === 0) {
            return;
        }

        var instance = $el.data('target');
        for (var i = 0; i < files.length; i++) {
            if (files[i].type === 'youtube' || files[i].type === 'video') {
                var link = files[i].full_url;
                link = link.replace('watch?v=', 'embed/');
                $(instance).summernote('pasteHTML', '<iframe width="420" height="315" src="' + link + '" frameborder="0" allowfullscreen></iframe>');
            } else if (files[i].type === 'image') {
                $(instance).summernote('insertImage', files[i].full_url, files[i].basename);
            } else {
                $(instance).summernote('pasteHTML', '<a href="' + files[i].full_url + '">' + files[i].full_url + '</a>');
            }
        }
    }

    /**
     * Insert images to Wysihtml5 editor
     * @param editor
     * @param files
     */
    function handleInsertImagesForWysihtml5Editor(editor, files) {
        if (files.length === 0) {
            return;
        }

        // insert images for the wysihtml5 editor
        let s = '';
        for (var i = 0; i < files.length; i++) {
            if (files[i].type === 'youtube' || files[i].type === 'video') {
                var link = files[i].full_url;
                link = link.replace('watch?v=', 'embed/');
                s += '<iframe width="420" height="315" src="' + link + '" frameborder="0" allowfullscreen></iframe>';
            } else if (files[i].type === 'image') {
                s += '<img src="' + files[i].full_url + '">';
            } else {
                s += '<a href="' + files[i].full_url + '">' + files[i].full_url + '</a>';
            }
        }

        if (editor.getValue().length > 0) {
            let length = editor.getValue();
            editor.composer.commands.exec('insertHTML', s);
            if (editor.getValue() === length) {
                editor.setValue(editor.getValue() + s);
            }
        } else {
            editor.setValue(editor.getValue() + s);
        }
    }

    /**
     * @param $el
     * @param files
     */
    function handleForCkeditor($el, files) {
        $.each(files, function (index, file) {
            var link = file.full_url;
            var instance = $el.data('target').replace('#', '');
            if (file.type === 'youtube' || file.type === 'video') {
                link = link.replace('watch?v=', 'embed/');
                CKEDITOR.instances[instance].insertHtml('<iframe width="420" height="315" src="' + link + '" frameborder="0" allowfullscreen></iframe>');
            } else if (file.type === 'image') {
                CKEDITOR.instances[instance].insertHtml('<img src="' + link + '" alt="' + file.name + '" />');
            } else {
                CKEDITOR.instances[instance].insertHtml('<a href="' + link + '">' + file.name + '</a>');
            }
        });
    }

    /**
     * @param files
     */
    function handleForTinyMce(files) {
        $.each(files, function (index, file) {
            var link = file.url;
            var html = '';
            if (file.type === 'youtube' || file.type === 'video') {
                link = link.replace('watch?v=', 'embed/');
                html = '<iframe width="420" height="315" src="' + link + '" frameborder="0" allowfullscreen></iframe>';
            } else if (file.type === 'image') {
                html = '<img src="' + link + '" alt="' + file.name + '" />';
            } else {
                html = '<a href="' + link + '">' + file.name + '</a>';
            }
            tinymce.activeEditor.execCommand('mceInsertContent', false, html);
        });
    }

    /**
     * @param option
     */
    function callAction(option) {
        return this.each(function () {
            var $this = $(this);
            var data = $this.data('bs.media');
            var options = $.extend({}, $this.data(), typeof option === 'object' && option);
            if (!data) $this.data('bs.media', (data = new AddMedia(this, options)))
        })
    }

    $.fn.addMedia = callAction;
    $.fn.addMedia.Constructor = AddMedia;

    $(window).on('load', function () {
        $('[data-type="rv-media"]').each(function () {
            var $addMedia = $(this);
            callAction.call($addMedia, $addMedia.data());
        });
    });

}(jQuery);
