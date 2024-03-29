# :warning: THIS REPO HAS BEEN ARCHIVED :warning:

This repository contains a custom parent WordPress theme used by sites managed by the IIP Design team. These sites were transitioned to another team for maintenance in October 2020. As such, this repository has been archived and is no longer being maintained. The code is preserved here as a reference.

# Corona Theme

## Build tools

Corona uses NPM Scripts to run its build process. Checkout the [`package.json`](package.json) file to see what's included and version numbers. Here are the highlights:

- [SASS](http://sass-lang.com/)
- [PostCSS](https://github.com/postcss/postcss) + [autoprefixer](https://github.com/postcss/autoprefixer). We autoprefix > 1%, last 3 IE versions, which currently includes [these browsers](http://browserl.ist/?q=%3E+1%25%2C+last+3+IE+versions).
- [ESLint](http://eslint.org/) + AirBnb's [JavaScript style guide](https://github.com/airbnb/javascript).
- [UglifyJS](https://github.com/mishoo/UglifyJS)
- [Imagemin](https://github.com/imagemin/imagemin)
- [BrowserSync](https://www.browsersync.io/)

In development, you should be able to watch for changes and recompile your assets by running:

```bash
$ npm run watch
```

For to compile for production, run:

```bash
$ npm run prod
```

If you need to compile Modernizr for _development only_, you can just run `npm run modernizr:dev` to run the development version.

## Documentation

See the complete [`documentation`](http://iip-design.github.io/corona-theme/).
