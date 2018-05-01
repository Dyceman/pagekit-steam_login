<?php

namespace Dyceman\SteamLogin\Controller;
use Dyceman\SteamLogin\OpenID\LightOpenID;
use Dyceman\SteamLogin\Steam\Steam as DyceSteam;

use Pagekit\Application as App;
use Pagekit\User\Model\User;
use Pagekit\Auth\Auth;
use Pagekit\Application\Exception;

class SteamLoginController
{

    public function indexAction()
    {
    	$module = App::module('steam_login');
    	$domain = (empty($module->config['domain'])) ? "localhost" : $module->config['domain'];
		try {
			$openid = new LightOpenID($domain); 
			
			if(!$openid->mode) {
				$openid->identity = 'https://steamcommunity.com/openid';
				return App::redirect($openid->authUrl());
			} elseif ($openid->mode == 'cancel') {
				return 'User has canceled authentication!';
			} else {
				if($openid->validate()) { 
					$id = $openid->identity;
					$ptn = "/^https?:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
					preg_match($ptn, $id, $matches);

					$steam = new DyceSteam($matches[1]);

					if(User::findByUsername($steam->get("steamid")) === null)
					{
						try
						{
							
							$user = User::create([
				                'registered' => new \DateTime,
				                'name' => $steam->get("personaname"),
				                'username' => $steam->get("steamid"),
				                'password' => App::get('auth.password')->hash(App::get('auth.random')->generateString(32)),
				                'email' => "steamlogin@".$domain,
				                'status' => User::STATUS_ACTIVE
				            ]);

				            $user->validate();
				            $user->save();
				            App::auth()->login(User::findByUsername($steam->get("steamid")), true);
						}
						catch (Exception $e) {
				            App::abort(400, $e->getMessage());
				        }
					}
					else
					{
						App::auth()->login(User::findByUsername($steam->get("steamid")), true);
					}

					return App::redirect();
				} else {
					return App::redirect();
				}
			}
		} catch(ErrorException $e) {
			App::abort(400, $e->getMessage());
		}
		return "";

    }
}