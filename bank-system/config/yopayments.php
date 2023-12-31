<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Yo! Payments Settings
    |--------------------------------------------------------------------------
    |
    | Obtain these values from Yo! Payments under Accessibility > API Access 
    | Details
    | 
    | api_username          is the API Username
    | api_password          is the API Password
    | mode                  Set this to production OR sandbox
    |
    */
    'api_username'=> "",
    'api_password'=>"",
    "mode"=>"sandbox"
];


return [
    'private_key_file' => storage_path('app/private_key.pem'), // Adjust the path as needed
];
