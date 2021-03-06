const mix = require('laravel-mix');

mix.sass('./resources/scss/bootstrap.scss', './public/css/bootstrap.css');

/**
 * VENDOR
 */
mix.combine([
    './public/css/bootstrap.css',    
    './node_modules/@fortawesome/fontawesome-free/css/all.css',
    './node_modules/@fancyapps/fancybox/dist/jquery.fancybox.css'
], './public/css/vendor.css').minify('./public/css/vendor.css');

mix.combine([
    './node_modules/jquery/dist/jquery.js',
    './node_modules/bootstrap/dist/js/bootstrap.bundle.js',
    './node_modules/sortablejs/Sortable.js',
    './node_modules/@fancyapps/fancybox/dist/jquery.fancybox.js'
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
 * WebpackConfig
 */

mix.webpackConfig({
    stats: {
        children: false
    }
});

/**
 * BrowserSync
 */

// mix.browserSync('http://127.0.0.1:8000/');
