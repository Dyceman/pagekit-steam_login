$(function(){

    var vm = new Vue({

        el: '#steam_login',

        data: {
            entries: window.$data.entries,
        },

        methods: {

            add: function(e) {
                // ...
            },

            toggle: function(entry) {
                entry.done = !entry.done;
            },

            remove: function(entry) {
                this.entries.$remove(entry);
            },

            save: function() {
                // ...
            }

        }

    });

});