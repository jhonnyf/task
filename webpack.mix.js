const mix = require('laravel-mix');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

/**
 * VENDOR
 */
mix.combine([
    './node_modules/bootstrap/dist/css/bootstrap-grid.css',
    './node_modules/@fortawesome/fontawesome-free/css/all.css',
], './public/css/vendor.css').minify('./public/css/vendor.css');

mix.combine([
    './node_modules/jquery/dist/jquery.js',
    './node_modules/bootstrap/dist/js/bootstrap.bundle.js',
    './node_modules/sortablejs/Sortable.js'    
], './public/js/vendor.js').minify('./public/js/vendor.js');

/**
 * MAIN
 */

mix.sass('./resources/scss/main.scss', './public/css/main.css').minify('./public/css/main.css');

mix.js([
    './resources/js/app.js'
], './public/js/main.js').minify('./public/js/main.js');

/**
 * COPY
 */

mix.copyDirectory('./node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');

/**
 * BrowserSync
 */

mix.browserSync();