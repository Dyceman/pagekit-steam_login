<?php
	use Pagekit\Application as App;

	if(App::user()->isAuthenticated())
	{
		?>
			Hello <?= App::user()->name ?> </br>
			<a href='user/logout'>Logout</a>

		<?php

	}
	else
	{
		$module = App::module('steam_login');
		?>
			<a href='steam_login'><img src='https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_<?= $module->config["steam_button_type"] ?>.png'></a>
		<?php
	}
?>
