<?php

return [
    'USER_INDEX_SELECT' => "first_name,last_name,email",

    'USER_EMAIL' => "email",
    'USER_PASSWORD' => "password",
    'USER_TOKEN_ADMIN' => "admin_token",
    'USER_TOKEN_USER' => "web_token",
    'USER_TOKEN_NAME' => "token",
    'ADMIN_NAME' => "admin",
    'ROLE_NAME' => "role",

    'COLUMN_ID' => 'id',

    'UPDATE_USERS' => 'update-users',
    'UPDATE_COMPANIES' => 'update-companies',
    'STORE_USERS' => 'store_users',
    'STORE_COMPANIES' => 'store_companies',

    'ADMIN_ABILITIES' => ['update-users', 'update-companies', 'store_users', 'store_companies'],
    'USER_ABILITIES' => [''],

    'FORM_CREATE' => 'create',
    'FORM_UPDATE' => 'update',
    'FORM_DELETE' => 'destroy',
    'FORM_GET' => 'get',
];
