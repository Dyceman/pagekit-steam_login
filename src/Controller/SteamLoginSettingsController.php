<?php

namespace Dyceman\SteamLogin\Controller;

use Pagekit\Application as App;

/**
 * @Access(admin=true)
 */

class SteamLoginSettingsController
{

	protected $module;

	public function __construct()
	{
		$this->module = App::module('steam_login');
	}

    public function indexAction()
    {
    	return [
	        '$view' => [
	            'name' => 'steam_login:views/admin/index.php'
	        ],
	        '$data' => [
                'steam_login' => [
                    'steam_web_api_key' => $this->module->config['steam_web_api_key'],
                ]
            ]
	         
	    ];
    }

    /**
     * @Request({"steam_web_api_key": "string"}, csrf=true)
     */
    public function saveAction($steam_web_api_key = "")
    {
    	App::config('steam_login')->set('steam_web_api_key', $steam_web_api_key);

       	return ['message' => 'success'];
    }

}