const mix = require('laravel-mix');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */


 /**
  * VENDOR
  */
mix.combine([
    './node_modules/bootstrap/dist/css/bootstrap-grid.css'
], './public/css/vendor.css').minify('vendor.css');

mix.combine([
    './node_modules/bootstrap/dist/js/bootstrap.bundle.js'
], './public/js/vendor.js').minify('vendor.js');

/**
 * MAIN
 */

mix.sass('./resources/scss/main.scss', './public/css/main.css').minify('./public/css/main.css');

mix.combine([
    './resources/js/app.js'
], './public/js/main.js').minify('./public/js/main.js');

mix.webpackConfig({
    plugins: [
        new BrowserSyncPlugin({
            port: 3000,
            files: [
                'app/**/*',
                'public/**/*',
                'resources/views/**/*',
                'routes/**/*'
            ]
        })
    ]
});