<?php

namespace Dyceman\SteamLogin\Steam;

use Pagekit\Application as App;

class Steam
{
	protected $profile;

	function __construct($steamid)
	{
		$steam_web_api_key = App::module('steam_login')->config['steam_web_api_key'];
		$url = file_get_contents("https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=".$steam_web_api_key."&steamids=".$steamid); 
		$content = json_decode($url, true);
		$this->profile['steam_steamid'] = $content['response']['players'][0]['steamid'];
		$this->profile['steam_communityvisibilitystate'] = $content['response']['players'][0]['communityvisibilitystate'];
		$this->profile['steam_profilestate'] = $content['response']['players'][0]['profilestate'];
		$this->profile['steam_personaname'] = $content['response']['players'][0]['personaname'];
		$this->profile['steam_lastlogoff'] = $content['response']['players'][0]['lastlogoff'];
		$this->profile['steam_profileurl'] = $content['response']['players'][0]['profileurl'];
		$this->profile['steam_avatar'] = $content['response']['players'][0]['avatar'];
		$this->profile['steam_avatarmedium'] = $content['response']['players'][0]['avatarmedium'];
		$this->profile['steam_avatarfull'] = $content['response']['players'][0]['avatarfull'];
		$this->profile['steam_personastate'] = $content['response']['players'][0]['personastate'];
		if (isset($content['response']['players'][0]['realname'])) { 
			   $this->profile['steam_realname'] = $content['response']['players'][0]['realname'];
		   } else {
			   $this->profile['steam_realname'] = "Real name not given";
		}
		$this->profile['steam_primaryclanid'] = $content['response']['players'][0]['primaryclanid'];
		$this->profile['steam_timecreated'] = $content['response']['players'][0]['timecreated'];
		$this->profile['steam_uptodate'] = time();
	}


	function get($variable)
	{
		return (in_array($variable, $this->profile) ? $this->profile["steam_".$variable] : null);
	}
}
?>
    
