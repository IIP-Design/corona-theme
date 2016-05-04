---
layout: default
---

<section>
# Documentation

Corona doesn't really provide much in terms of visual styling; it primarily provides structure and some common, repeated functionality. Create a child theme for site-specific styles.
</section>

<section>
## Development Setup

### Build Tools

Corona uses NPM scripts to run its build process. Checkout the [`package.json`](package.json) file to see what's included and version numbers. Here are the highlights:

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

#### Modernizr

If you need to compile Modernizr for *development only*, you can run:

```bash
$ npm run modernizr:dev
```

It will generate `js/src/modernizr.dev.js` with all the options available in `node_modules/modernizr/lib/config-all.json`. which is why it's only suitable for in development. You'll have to run the following to add it to `js/dist/script.js`, which is already enqueued.

```bash
$ npm run js
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

<section>
## Theme Hooks

`google_tag_manager`
: Insert GTM code just after `<body>`.

`corona_posted_on`
: Change or remove 'Posted on \{\{date\}\} by \{\{author\}\}' output.

</section>

<section>
## Shortcodes

@todo
</section>

<section>
## Templates

Generally speaking, The [Visual Markup Guide](/markup/) explains how Corona's markup is structured.

The markup was heavily influenced by the [Genesis Framework](http://my.studiopress.com/themes/genesis/). The guide is forked from [Nathan Rice](http://www.nathanrice.net/)'s invaluable [Genesis Visual Markup Guide](http://www.genesisframework.com/markup.php). It has been updated to reflect Corona's structure.

`page_full.php`
: A full-width page template that doesn't include the primary and secondary sidebars.

</section>

<section>
## Media Queries

Corona is a mobile-first theme. Here are the SASS variables. The `em`s are calculated at the browser default font-size of 16px.

`$big-mobile`
: 25em; // 400px

`$tablet`
: 48em; // 768px

`$laptop`
: 64em; // 1024px

`$desktop`
: 75em; // 1200px

</section>
