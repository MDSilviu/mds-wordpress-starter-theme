var gulp = require('gulp');
var config = require('./gulp.config')();
var browserSync = require('browser-sync');
var mainBowerFiles = require('main-bower-files');
var $ = require('gulp-load-plugins')({lazy: true});

gulp.task('css',['scss-plugins'], function() {
    log('Generating app .css file.');
    return gulp
        .src(config.devFilesScssMain)
        .pipe($.plumber())
        .pipe($.sass().on('error', $.sass.logError))
        .pipe($.autoprefixer({browsers: config.autoprefixerBrowserVersion}))
        .pipe($.print())
        .pipe($.mergeMediaQueries({log: true}))
        .pipe(gulp.dest(config.themePathCss))
        .pipe($.csso())
        .pipe($.rename({suffix: '.min'}))
        .pipe(gulp.dest(config.themePathCss))
});

gulp.task('js', function() {
    log('Generating app .js file.');
    return gulp
        .src(config.devFilesJs)
        .pipe($.plumber())
        .pipe($.jscs())
        .pipe($.jscs.reporter())
        .pipe($.jshint())
        .pipe($.jshint.reporter('jshint-stylish', {verbose: true}))
        .pipe($.print())
        .pipe($.concat('mds-app.js'))
        .pipe(gulp.dest(config.themePathJs))
        .pipe($.uglify({preserveComments: "license"}))
        .pipe($.rename({suffix: '.min'}))
        .pipe(gulp.dest(config.themePathJs))
});

gulp.task('scss-plugins', function() {
    log('Generating plugins .scss file.');
    return gulp
        .src(mainBowerFiles({
            paths: config.bower
        }))
        .pipe($.plumber())
        .pipe($.filter('**/*.css'))
        .pipe($.print())
        .pipe($.concat('_plugins.scss'))
        .pipe(gulp.dest(config.devPathScssPartials));
});

gulp.task('js-plugins', function() {
    log('Generating plugins .js file.');
    return gulp
        .src(mainBowerFiles({
            paths: config.bower
        }))
        .pipe($.plumber())
        .pipe($.filter('**/*.js'))
        .pipe($.print())
        .pipe($.concat('mds-plugins.js'))
        .pipe(gulp.dest(config.themePathJs))
        .pipe($.uglify({preserveComments: "license"}))
        .pipe($.rename({ suffix: '.min' }))
        .pipe(gulp.dest(config.themePathJs))
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
//TODO:sprite task
//TODO:create zip file with theme and strip all node modules, files etc task
//TODO: task for fonts

gulp.task('default', ['js-plugins', 'css', 'js', 'optimize-img'], function () {
    gulp.watch(config.devFilesJs, ['js']);
    $.watch(config.devFilesScssAll, function() {
        gulp.start('css');
    });
    $.watch(config.devFilesImg, function() {
        gulp.start('optimize-img');
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