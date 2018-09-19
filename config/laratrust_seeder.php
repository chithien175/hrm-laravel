<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'dashboard' => 'r',
            'users'     => 'c,r,u,d',
            'acl'       => 'c,r,u,d',
            'profile'   => 'r,u',
            'nhan-su'   => 'c,r,u,d',
            'hop-dong'  => 'c,r,u,d'
        ],
        'administrator' => [
            'dashboard' => 'r',
            'users'     => 'c,r,u,d',
            'profile'   => 'r,u',
            'nhan-su'   => 'c,r,u,d',
            'hop-dong'  => 'c,r,u,d'
        ],
        'user' => [
            'dashboard' => 'r',
            'profile'   => 'r,u',
            'nhan-su'   => 'r',
            'hop-dong'  => 'r'
        ],
    ],
    'permission_structure' => [],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
