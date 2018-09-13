<?php

return [
    [
        'name' => 'Media',
        'flag' => 'media.index',
    ],
    [
        'name' => 'File',
        'flag' => 'files.list',
        'parent_flag' => 'media.index',
    ],
    [
        'name' => 'Create',
        'flag' => 'files.create',
        'parent_flag' => 'files.list',
    ],
    [
        'name' => 'Edit',
        'flag' => 'files.edit',
        'parent_flag' => 'files.list',
    ],
    [
        'name' => 'Trash',
        'flag' => 'files.trash',
        'parent_flag' => 'files.list',
    ],
    [
        'name' => 'Delete',
        'flag' => 'files.delete',
        'parent_flag' => 'files.list',
    ],

    [
        'name' => 'Folder',
        'flag' => 'folders.list',
        'parent_flag' => 'media.index',
    ],
    [
        'name' => 'Create',
        'flag' => 'folders.create',
        'parent_flag' => 'folders.list',
    ],
    [
        'name' => 'Edit',
        'flag' => 'folders.edit',
        'parent_flag' => 'folders.list',
    ],
    [
        'name' => 'Trash',
        'flag' => 'folders.trash',
        'parent_flag' => 'folders.list',
    ],
    [
        'name' => 'Delete',
        'flag' => 'folders.delete',
        'parent_flag' => 'folders.list',
    ],
];