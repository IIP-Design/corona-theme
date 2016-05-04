---
layout: default
---

<section>
# Documentation

## Development Setup

### Build Tools

Corona uses NPM Scripts to run its build process. Checkout the [`package.json`](package.json) file to see what's included and version numbers. Here are the highlights:

* [SASS](http://sass-lang.com/)
* [PostCSS](https://github.com/postcss/postcss) + [autoprefixer](https://github.com/postcss/autoprefixer). We support browsers that are >5%. See [Browserlists](https://github.com/ai/browserslist#queries).
* [ESLint](http://eslint.org/) + AirBnb's [JavaScript style guide](https://github.com/airbnb/javascript).
* [UglifyJS](https://github.com/mishoo/UglifyJS)
* [Imagemin](https://github.com/imagemin/imagemin)
* [BrowserSync](https://www.browsersync.io/)

In development, you should be able to watch for changes and recompile your assets by running:

```bash
$ npm run watch
```

If you need to compile Modernizr for *development only*, you can run:

```bash
npm run modernizr:dev
```
</section>

<section>
## Production

To compile the theme's assets for production, run:

```bash
$ npm run prod
```

</section>

<section>
## General Markup Structure

See the [Visual Markup Guide](/markup/) to see how Corona's markup is structured.

The markup structure was heavily influenced by the [Genesis Framework](http://my.studiopress.com/themes/genesis/), and the Visual Markup Guide is forked from [Nathan Rice](http://www.nathanrice.net/)'s invaluable [Genesis Visual Markup Guide](http://www.genesisframework.com/markup.php). It has been updated to reflect Corona's markup structure.
</section>

<section>
## Theme Hooks

@todo
</section>

<section>
## Shortcodes

@todo
</section>

<section>
## Templates

@todo
</section>
