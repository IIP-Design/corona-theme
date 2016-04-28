# Corona

## Build tools

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

For production, you can run:

```bash
$ npm run prod
```

If you need to compile Modernizr for *development only*, you can just run `npm run modernizr:dev` to run the development version.


## Documentation

See the complete [`documentation`](http://iip-design.github.io/corona/).
