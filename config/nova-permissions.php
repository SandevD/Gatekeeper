<?php

return [
    /*
    |--------------------------------------------------------------------------
    | User model class
    |--------------------------------------------------------------------------
    */

    'user_model' => 'App\Models\User',

    /*
    |--------------------------------------------------------------------------
    | Nova User resource tool class
    |--------------------------------------------------------------------------
    */

    'user_resource' => 'App\Nova\User',

    /*
    |--------------------------------------------------------------------------
    | The group associated with the resource
    |--------------------------------------------------------------------------
    */

    'role_resource_group' => 'Other',

    /*
    |--------------------------------------------------------------------------
    | Database table names
    |--------------------------------------------------------------------------
    | When using the "HasRoles" trait from this package, we need to know which
    | table should be used to retrieve your roles. We have chosen a basic
    | default value but you may easily change it to any table you like.
    */

    'table_names' => [
        'roles' => 'roles',

        'role_permission' => 'role_permission',

        'role_user' => 'role_user',

        'users' => 'users',
    ],


    /*
    |--------------------------------------------------------------------------
    | Application Permissions
    |--------------------------------------------------------------------------
    */

    'permissions' => [

        //User
        'view users' => [
            'display_name' => 'View users',
            'description'  => 'Can view users',
            'group'        => 'User',
        ],

        'create users' => [
            'display_name' => 'Create users',
            'description'  => 'Can create users',
            'group'        => 'User',
        ],

        'edit users' => [
            'display_name' => 'Edit users',
            'description'  => 'Can edit users',
            'group'        => 'User',
        ],

        'delete users' => [
            'display_name' => 'Delete users',
            'description'  => 'Can delete users',
            'group'        => 'User',
        ],

        //Roles
        'view roles' => [
            'display_name' => 'View roles',
            'description'  => 'Can view roles',
            'group'        => 'Role',
        ],

        'create roles' => [
            'display_name' => 'Create roles',
            'description'  => 'Can create roles',
            'group'        => 'Role',
        ],

        'edit roles' => [
            'display_name' => 'Edit roles',
            'description'  => 'Can edit roles',
            'group'        => 'Role',
        ],

        'delete roles' => [
            'display_name' => 'Delete roles',
            'description'  => 'Can delete roles',
            'group'        => 'Role',
        ],

        //Department - SBU
        'view department' => [
            'display_name' => 'View SBU',
            'description'  => 'Can view SBU',
            'group'        => 'SBU',
        ],

        'create department' => [
            'display_name' => 'Create SBU',
            'description'  => 'Can create SBU',
            'group'        => 'SBU',
        ],

        'edit department' => [
            'display_name' => 'Edit SBU',
            'description'  => 'Can edit SBU',
            'group'        => 'SBU',
        ],

        'delete department' => [
            'display_name' => 'Delete SBU',
            'description'  => 'Can delete SBU',
            'group'        => 'SBU',
        ],

        //Exit Pass
        'view exit pass' => [
            'display_name' => 'View Exit Pass',
            'description'  => 'Can view Exit Pass',
            'group'        => 'Exit Pass',
        ],

        'create exit pass' => [
            'display_name' => 'Create Exit Pass',
            'description'  => 'Can create Exit Pass',
            'group'        => 'Exit Pass',
        ],

        'edit exit pass' => [
            'display_name' => 'Edit Exit Pass',
            'description'  => 'Can edit Exit Pass',
            'group'        => 'Exit Pass',
        ],

        'delete exit pass' => [
            'display_name' => 'Delete Exit Pass',
            'description'  => 'Can delete Exit Pass',
            'group'        => 'Exit Pass',
        ],

        //Overtime
        'view overtime' => [
            'display_name' => 'View Overtime',
            'description'  => 'Can view Overtime',
            'group'        => 'Overtime',
        ],

        'create overtime' => [
            'display_name' => 'Create Overtime',
            'description'  => 'Can create Overtime',
            'group'        => 'Overtime',
        ],

        'edit overtime' => [
            'display_name' => 'Edit Overtime',
            'description'  => 'Can edit Overtime',
            'group'        => 'Overtime',
        ],

        'delete overtime' => [
            'display_name' => 'Delete Overtime',
            'description'  => 'Can delete Overtime',
            'group'        => 'Overtime',
        ],
    ],
];
