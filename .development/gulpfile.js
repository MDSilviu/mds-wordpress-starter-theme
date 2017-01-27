var gulp = require('gulp');
var config = require('./gulp.config')();
var fs = require('fs');
var path = require('path');
var merge2 = require('merge2');
var browserSync = require('browser-sync');
var $ = require('gulp-load-plugins')({lazy: true});

gulp.task('css-app', function() {
    log('Generating app .css files.');
    return gulp
        .src(config.devFilesScssAppMain)
        .pipe($.plumber())
        .pipe($.sass().on('error', $.sass.logError))
        .pipe($.sassUnicode())
        .pipe($.autoprefixer({browsers: config.autoprefixerBrowserVersion}))
        .pipe($.print())
        .pipe($.mergeMediaQueries({log: true}))
        .pipe(gulp.dest(config.themePathAppCss))
        .pipe($.csso())
        .pipe($.rename({suffix: '.min'}))
        .pipe(gulp.dest(config.themePathAppCss))
});

gulp.task('js-app', function() {
    log('Generating app .js file.');

    return merge2(
        gulp.src(config.devFilesPluginsJs)
            .pipe($.plumber())
            .pipe($.print())
            .pipe(gulp.dest(config.themePathPluginsJs)),
        gulp.src(config.devFilesAppJs)
            .pipe($.plumber())
            .pipe($.jscs())
            .pipe($.jscs.reporter())
            .pipe($.jshint())
            .pipe($.jshint.reporter('jshint-stylish', {verbose: true}))
            .pipe($.print())
            .pipe(gulp.dest(config.themePathAppJs))
        )
        .pipe($.concat('mds-theme.js'))
        .pipe(gulp.dest(config.themePathAppJs))
        .pipe($.uglify({preserveComments: "license"}))
        .pipe($.rename({suffix: '.min'}))
        .pipe(gulp.dest(config.themePathAppJs))
});

gulp.task('js-app-singles', function() {
    log('Generating app .js single files.');

    return gulp.src(config.devFilesNotMergedJs)
        .pipe($.plumber())
        .pipe($.print())
        .pipe($.uglify({preserveComments: "license"}))
        .pipe(gulp.dest(config.themePathPluginsJs))
});


gulp.task('optimize-img', function() {
    log('Optimizing images.');
    return gulp
        .src(config.devFilesImg)
        .pipe($.newer(config.themePathImg))
        .pipe($.print())
        .pipe($.imagemin({ optimizationLevel: 7, progressive: true, interlaced: true }))
        .pipe(gulp.dest(config.themePathImg));
});

gulp.task('font-app', function() {
    log('Copying fonts.');
    return gulp.src(config.devFilesFont)
        .pipe(gulp.dest(config.themePathFont));
});

gulp.task('svg-sprite', function () {
    return gulp
        .src(config.devFilesSvgIcons)
        .pipe($.svgmin())
        .pipe($.svgstore())
        .pipe(gulp.dest(config.themePathImg));
});

gulp.task('default', ['css-app', 'js-app', 'js-app-singles', 'optimize-img', 'font-app'], function () {
    $.watch(config.devFilesScssAppAll, function() {
        gulp.start('css-app');
    });

    $.watch(config.devFilesJs, function() {
        gulp.start('js-app');
    });

    $.watch(config.devFilesNotMergedJs, function() {
        gulp.start('js-app-singles');
    });

    $.watch(config.devFilesImg, function() {
        gulp.start('optimize-img');
    });

    $.watch(config.devFilesFont, function() {
        gulp.start('font-app');
    });

    startBrowserSync();
});


/////////////////////////
function startBrowserSync() {
    if(browserSync.active) {
        return;
    }
    log('Starting browser-sync.');
    var options = {
        proxy: config.browserSyncProxy,
        baseDir: "../",
        port: 3000,
        files: config.browserSyncFiles,
        injectChanges: true,
        notify: true,
        reloadDelay: 1000
    };
    browserSync(options);
}

function log(msg) {
    if (typeof(msg) === 'object') {
        for (var item in msg) {
            if (msg.hasOwnProperty(item)) {
                $.util.log($.util.colors.cyan(msg[item]));
            }
        }
    } else {
        $.util.log($.util.colors.cyan(msg));
    }
}


function getFolders(dir) {
    return fs.readdirSync(dir)
        .filter(function(file) {
            return fs.statSync(path.join(dir, file)).isDirectory();
        });
}