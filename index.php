<?php

use Pagekit\Application;

// packages/pagekit/todo/index.php

return [

    'name' => 'steam_login',

    'type' => 'extension',

    // called when Pagekit initializes the module
    'main' => function (Application $app) {

    },

    'autoload' => [
        'Dyceman\\SteamLogin\\' => 'src'
    ],

    'config' => [
    	'steam_web_api_key' => "",
    	'domain' => "",
    	'steam_button_type' => ""
    ],

    'resources' => [
        'steam_login:' => ''
    ],

    'menu' => [

        'steam_login' => [
            'label' => 'Steam Login',
            'icon' => 'steam_login:assets/images/icon-steam.svg',
            'access' => 'system: access settings',
            'url' => '@steam_login/settings',
            'priority' => 120
        ],

        'steam_login: settings' => [
            'label' => 'Settings',
            'parent' => 'steam_login',
            'url' => '@steam_login/settings',
        ]

    ],

    'settings' => '@steam_login/settings',


    // array of routes
    'routes' => [

        // identifier to reference the route from your code
        '@steam_login' => [

            // which path this extension should be mounted to
            'path' => '/steam_login',

            // which controller to mount
            'controller' => 'Dyceman\\SteamLogin\\Controller\\SteamLoginController'
        ],
        // identifier to reference the route from your code
        '@steam_login/settings' => [

            // which path this extension should be mounted to
            'path' => '/steam_login/settings',

            // which controller to mount
            'controller' => 'Dyceman\\SteamLogin\\Controller\\SteamLoginSettingsController'
        ],
        // identifier to reference the route from your code
        '@steam_login/settings/save' => [

            // which path this extension should be mounted to
            'path' => '/steam_login/settings/save',

            // which controller to mount
            'controller' => 'Dyceman\\SteamLogin\\Controller\\SteamLoginSettingsController::saveAction'
        ]
    ],

    'widgets' => [

	    'widgets/steam_login_widget.php'

	]
];

?>