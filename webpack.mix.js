let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.setPublicPath('www');

mix.autoload({
    jquery: ['$', 'window.jQuery', 'jQuery'],
    tether: ['window.Tether', 'Tether'],
    'tether-shepherd': ['Shepherd'],
    'popper.js/dist/umd/popper.js': ['Popper'],
 })
    .webpackConfig(webpack => {
        return {
            plugins: [
                new webpack.DefinePlugin({
                    "require.specified": "require.resolve"
                })
            ],
            resolve: {
                alias: {
                    'CodeMirror': 'codemirror',
                }
            },
        };
    })
    .js('resources/assets/js/app.js', 'www/js')
    .sass('resources/assets/sass/app.scss', 'www/css')
    .options({
        postCss: [
            require('precss')()
        ],
        processCssUrls: false
    })
    .browserSync({
        proxy: 'mebel-dvd.loc'
    })
    .version()
    .sourceMaps()
    .disableNotifications();