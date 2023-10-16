<?php

return [
    'USER_INDEX_SELECT' => "first_name,last_name,email,id",

    'USER_TOKEN_ADMIN' => "admin_token",
    'USER_TOKEN_USER' => "web_token",
    'USER_PASSWORD' => "password",
    'USER_TOKEN_NAME' => "token",
    'ADMIN_NAME' => "admin",
    'USER_EMAIL' => "email",
    'ROLE_NAME' => "role",

    'COLUMN_ID' => 'id',

    'STORE_USERS' => 'store_users',
    'UPDATE_USERS' => 'update-users',
    'DESTROY_USERS' => 'destroy_users',
    'STORE_COMPANIES' => 'store_companies',
    'UPDATE_COMPANIES' => 'update-companies',
    'DESTROY_COMPANIES' => 'destroy-companies',

    'ADMIN_ABILITIES' => ['update-users', 'update-companies', 'destroy-users', 'destroy-companies', 'store_users', 'store_companies'],
    'USER_ABILITIES' => [''],

    'FORM_CREATE' => 'create',
    'FORM_UPDATE' => 'update',
    'FORM_DELETE' => 'destroy',
    'FORM_GET' => 'get',

    'STORE_LOGO' => 'logo',
    'LOGO_FILE_NAME' => 'image',
    'LOGO_DB_NAME' => 'image_path',

    'IMAGE_URL_DEV' => 'http://localhost',
    'IMAGE_PREFIX' => '/logo/'
];
