<?php

return [
    'max_quota' => env('RV_MEDIA_MAX_QUOTA', 1024 * 1024 * 1024),
    'sizes' => [
        'thumb' => '150x150',
        'featured' => '560x380',
        'medium' => '540x360',
    ],
    'driver' => [
        'local' => [
            'root' => public_path('uploads'),
            'path' => env('RV_MEDIA_UPLOAD_PATH', '/uploads'),
        ],
        's3' => [
            'path' => env('AWS_SERVER_URL'),
        ],
    ],
    'route' => [
        'prefix' => env('ADMIN_DIR', 'admin') . '/media',
        'middleware' => ['web', 'auth'],
        'options' => [
            'permission' => 'media.index',
        ],
    ],
    'views' => [
        'index' => 'media::index',
    ],
    'permissions' => [
        'folders.create',
        'folders.edit',
        'folders.trash',
        'folders.delete',
        'files.create',
        'files.edit',
        'files.trash',
        'files.delete',
        'files.favorite',
        'folders.favorite',
    ],
    'cache' => [
        'enable' => env('RV_MEDIA_ENABLE_CACHE', false), // true or false
        'cache_time' => env('RV_MEDIA_CACHE_TIME', 10),
        'stored_keys' => storage_path('media_cache_keys.json'), // Cache config
    ],
    'allow_external_services' => env('RV_MEDIA_ALLOW_EXTERNAL_SERVICES', false),
    'external_services' => [
        'youtube',
        'vimeo',
        'dailymotion',
        'instagram',
        'vine',
    ],
    'libraries' => [
        'stylesheets' => [
            'vendor/core/media/packages/jquery-context-menu/jquery.contextMenu.min.css',
            'vendor/core/media/css/media.css?v=' . time(),
        ],
        'javascript' => [
            'vendor/core/media/packages/lodash/lodash.min.js',
            'vendor/core/media/packages/clipboard/clipboard.min.js',
            'vendor/core/media/packages/dropzone/dropzone.js',
            'vendor/core/media/packages/jquery-context-menu/jquery.ui.position.min.js',
            'vendor/core/media/packages/jquery-context-menu/jquery.contextMenu.min.js',
            'vendor/core/media/js/media.js?v=' . time(),
        ],
    ],
    'allowed_mime_types' => env('RV_MEDIA_ALLOWED_MIME_TYPES', 'jpg,jpeg,png,gif,txt,docx,zip,mp3,bmp,csv,xls,xlsx,ppt,pptx,pdf,mp4,doc'),
    'mime_types' => [
        'image' => [
            'image/png',
            'image/jpeg',
            'image/gif',
            'image/bmp',
        ],
        'video' => [
            'video/mp4',
        ],
        'document' => [
            'application/pdf',
            'application/excel',
            'application/x-excel',
            'application/x-msexcel',
            'text/plain',
            'application/msword',
            'text/csv',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.ms-powerpoint',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        ],
        'youtube' => [
            'youtube',
        ],
    ],
    'max_file_size_upload' => env('RV_MEDIA_MAX_FILE_SIZE_UPLOAD', 4 * 1024 * 1024), // Maximum size to upload
    'default-img' => env('RV_MEDIA_DEFAULT_IMAGE', '/vendor/core/images/placeholder.png'), // Default image
    'sidebar_display' => env('RV_MEDIA_SIDEBAR_DISPLAY', 'horizontal'), // Use "vertical" or "horizontal"
];
