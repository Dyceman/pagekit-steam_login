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
		?>
			<a href='steam_login'><img src='https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_01.png'></a>
		<?php
	}
?>
