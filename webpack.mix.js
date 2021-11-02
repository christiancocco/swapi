const mix = require("laravel-mix");

mix
  .setPublicPath("public")
  .copy(
    "public",
    "../../../public/vendor/swapi"
  );

mix
  .js("resources/js/app.js", "public/js")
  .vue({ version: 2 })
  .postCss("resources/css/app.css", "public/css");

if (mix.inProduction()) {
  mix.version();
}
