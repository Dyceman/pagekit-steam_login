<?php $view->script('steam_login_settings', 'steam_login:app/bundle/settings.js', ['vue', 'uikit']) ?>

<form id="settings" class="uk-form uk-form-horizontal" @submit.prevent="save" v-cloak>

    <div class="uk-grid pk-grid-large" data-uk-grid-margin>
        <div class="pk-width-sidebar">

            <div class="uk-panel">

                <ul class="uk-nav uk-nav-side pk-nav-large" v-el:tab>
                    <li><a><i class="uk-icon-justify uk-icon-small uk-margin-right pk-icon-large-settings"></i> {{ 'Steam Login' | trans }}</a></li>
                </ul>

            </div>

        </div>
        <div class="pk-width-content">

            <ul class="uk-switcher uk-margin" v-el:content>
                <li>
                        <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
					        <div data-uk-margin>
					            <h2 class="uk-margin-remove">{{ 'Settings' | trans }}</h2>
					        </div>
					        <div data-uk-margin>
					            <button class="uk-button uk-button-primary" type="submit">{{ 'Save' | trans }}</button>
					        </div>
					    </div>

					    <div class="uk-form-row">
					        <label for="steam_login-steam_web_api_key" class="uk-form-label">{{ 'Steam Web API Key' | trans }}</label>
					        <div class="uk-form-controls">
					            <input id="steam_login-steam_web_api_key" class="uk-form-width-large" type="text" v-model="$data.steam_login.steam_web_api_key">
					        </div>
					    </div>

                         <div class="uk-form-row">
                            <label for="steam_login-domain" class="uk-form-label">{{ 'Steam Web API Domain' | trans }}</label>
                            <div class="uk-form-controls">
                                <input id="steam_login-domain" class="uk-form-width-large" type="text" v-model="$data.steam_login.domain">
                            </div>
                        </div>

                        <div class="uk-form-row">
                            <label for="steam_login-domain" class="uk-form-label">{{ 'Widget Button Type' | trans }}</label>
                            <div class="uk-form-controls">
                                <input class="uk-radio" type="radio" id="one" value="01" v-model="$data.steam_login.steam_button_type">
                                <label for="one"><img src="https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_01.png"/></label>
                                <br>
                                <br>
                                <input class="uk-radio" type="radio" id="two" value="02" v-model="$data.steam_login.steam_button_type">
                                <label for="two"><img src="https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_02.png"/></label>
                                <br>
                                <br>
                            </div>
                        </div>


                </li>
            </ul>

        </div>
    </div>

</form>
