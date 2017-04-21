const elixir = require('laravel-elixir');
 
require('laravel-elixir-vue-2');
require('laravel-elixir-browserify-official');
 
elixir(mix => {
  mix.sass('app.scss')
    .webpack('app.js');
});

elixir(mix => {
  mix.copy('./bower_components/foundation/js/vendor/jquery.js','public/js/jquery.min.js')
    .copy('./bower_components/foundation/js/vendor/modernizr.js','public/js/modernizr.js')
    .copy('./bower_components/foundation/js/foundation.min.js','public/js/foundation.min.js')
    .copy('./bower_components/foundation/js/foundation/foundation.tab.js','public/js/foundation.tabs.min.js')
    .copy('./bower_components/foundation/css/foundation.min.css','public/css/foundation.css')
    .copy('./bower_components/foundation/js/foundation/foundation.reveal.js','public/js/foundation.reveal.min.js');
});
