<?php

return [

    'name' => 'dyceman/steam_login',

    'label' => 'Steam Login Widget',

    'events' => [

        'view.scripts' => function ($event, $scripts) use ($app) {
            $scripts->register('widget-steam_login_widget', 'steam_login:js/widget.js', ['~widgets']);
        }

    ],

    'render' => function ($widget) use ($app) {

        // ...

        return $app->view('steam_login/widget.php');
    }

];

?>