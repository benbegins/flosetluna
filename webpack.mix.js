let mix = require('laravel-mix');

require('laravel-mix-tailwind');

mix
    .js("src/js/app.js", "dist/")
    .sass("src/sass/style.scss", "./")
    .tailwind("./tailwind.config.js");