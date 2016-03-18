angular.module('MaterialThemeApp', ['ngMaterial'])
    .config(function($mdThemingProvider) {
        $mdThemingProvider.theme('default')
        .primaryPalette(settings.primary_palette)
        .accentPalette(settings.accent_palette);
    })
    .controller('MenuCtrl', function(){
        var originatorEv;
        this.openMenu = function($mdOpenMenu, ev) {
            originatorEv = ev;
            $mdOpenMenu(ev);
        };
    });