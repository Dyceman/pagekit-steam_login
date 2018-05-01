window.SteamLogin = {

    el: '#settings',

    data: function () {
        return window.$data;
    },

    ready: function () {

        UIkit.tab(this.$els.tab, {connect: this.$els.content});

    },

    methods: {

        save: function () {
            this.$broadcast('save', this.$data);
            this.$resource('admin/steam_login/settings/save').save({steam_web_api_key: $data.steam_login.steam_web_api_key, domain: $data.steam_login.domain, steam_button_type: $data.steam_login.steam_button_type}).then(function () {
                        this.$notify('Settings saved.');
                    }, function (res) {
                        this.$notify(res.data, 'danger');
                    }
                );
        }

    }

};

Vue.ready(window.SteamLogin);
