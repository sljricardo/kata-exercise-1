let mix = require('laravel-mix');

require('mix-tailwindcss');

mix.js('resources/app.js', 'public/')
    .sass('resources/style.scss', 'public/')
    .tailwind();