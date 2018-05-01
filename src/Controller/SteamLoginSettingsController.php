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
                    'domain' => $this->module->config['domain'],
                    'steam_button_type' => (empty($this->module->config['steam_button_type'])) ? "01" : $this->module->config['steam_button_type']
                ]
            ]
	         
	    ];
    }

    /**
     * @Request({"steam_web_api_key": "string", "domain": "string", "steam_button_type": "string"}, csrf=true)
     */
    public function saveAction($steam_web_api_key = "", $domain = "localhost", $steam_button_type = "01")
    {
    	App::config('steam_login')->set('steam_web_api_key', $steam_web_api_key);
        App::config('steam_login')->set('domain', $domain);
        App::config('steam_login')->set('steam_button_type', $steam_button_type);

       	return ['message' => 'success'];
    }

}