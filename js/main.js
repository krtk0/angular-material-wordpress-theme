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

/*
 {
 'default': '400', // by default use shade 400 from the pink palette for primary intentions
 'hue-1': '100', // use shade 100 for the <code>md-hue-1</code> class
 'hue-2': '600', // use shade 600 for the <code>md-hue-2</code> class
 'hue-3': 'A100' // use shade A100 for the <code>md-hue-3</code> class
 }
 */