# WordPress Starter Theme

Version: 1.0

## Author:

Silviu Manolache ( [mdsdev.eu](http://mdsdev.eu/) / [Hire Me](https://www.freelancer.com/u/MDSilviu.html?action=hireme&track-hireme-textlink=1&track-type=textLink&ft_prog=HML&ft_prog_id=12011265) / [wordpress.org](https://profiles.wordpress.org/mdsilviu/) )

## Summary

MDS WordPress Starter Theme for building custom themes. Uses Gulp, Bower, SCSS, AutoPrefixr, Browser Sync for workflow automation.

## Usage

The theme is setup to use [Gulp](http://gulpjs.com/) to:

- compile SCSS, run it through [AutoPrefixr](https://github.com/ai/autoprefixer) to prefix CSS for legacy browsers, [CSSO](https://github.com/css/csso) to minify and optimize.
- analyze your JavaScript code for errors and coding standard with [JSHint](http://jshint.com/) and [JSCS](http://jscs.info/), concatenate and minify,
- get your bower dependencies main files with [Main Bower Files](https://github.com/ck86/main-bower-files), concatenate and minify
- optimize images
- and automate browser reloading when changes are made to the files with [Browser Sync](https://www.browsersync.io/)

Rename folder to your theme name, change the `style.css` intro block to your theme information. Open the theme directory in terminal and run `npm install` to pull in all Gulp dependencies. Run `gulp` to execute tasks.

Theme includes:
- [OptionTree](https://wordpress.org/plugins/option-tree/) to create custom theme options and metaboxes
- [TGM Plugin Activation](http://tgmpluginactivation.com/) to be able to easy include your theme plugin dependencies
- basic functions to use in your theme development located in the "functions" directory

### Bower

Supports [bower](https://github.com/bower/bower) to install and manage JavaScript dependencies in the `assets/dev/js/plugins` folder.

### Image Optimization

To optimize images, run `grunt imagemin`. This was also included in the default `watch` task, but there are currently a few issues with processing images multiple times and removing their contents.

### Features

1. Normalized stylesheet for cross-browser compatibility using Normalize.css version 4
2. Easy to customize
3. Media Queries can be nested in each selector using SASS
4. Gulp for processing all SASS, JavaScript and images
5. Add custom theme options and metaboxes with OptionTree
6. Set theme plugin dependencies with TGM Plugin Activation
7. Common used WordPress functions

### Contributing:

Anyone and everyone is welcome to contribute!

### Contributors:

- [mdsilviu](http://mdsdev.eu/)

### Credits

Without these projects, this WordPress Starter Theme wouldn't be where it is today.

* [Underscores Theme](https://github.com/Automattic/_s)
* [OptionTree](https://wordpress.org/plugins/option-tree/)
* [TGM Plugin Activation](http://tgmpluginactivation.com/)
* [Normalize.css](http://necolas.github.com/normalize.css)
* [SASS / SCSS](http://sass-lang.com/)
* [AutoPrefixr](https://github.com/ai/autoprefixer)
* [Gulp](http://gulpjs.com/)
* [Bower](http://bower.io/)
