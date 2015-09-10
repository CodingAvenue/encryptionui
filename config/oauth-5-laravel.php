<?php
/*
|--------------------------------------------------------------------------
| oAuth Config
|--------------------------------------------------------------------------
*/
return [ 
    'storage' => 'Session', 
    'consumers' => [
        'Google' => [
            'client_id'     => env('GOOGLE_CLIENT_ID'),
            'client_secret' => env('GOOGLE_CLIENT_SECRET'),
            'scope'         => ['userinfo_email', 'userinfo_profile'],
        ],      

    ]

];
?>
