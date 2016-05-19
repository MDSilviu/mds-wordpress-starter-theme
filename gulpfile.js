var gulp = require('gulp');
var config = require('./gulp.config')();
var browserSync = require('browser-sync');
var mainBowerFiles = require('main-bower-files');
var $ = require('gulp-load-plugins')({lazy: true});

gulp.task('css', function() {
    log('Generating .css file.');
    return gulp
        .src(config.appScss)
        .pipe($.plumber())
        .pipe($.sass())
        .pipe($.autoprefixer({browsers: ['last 2 versions', '> 3%']}))
        .pipe($.print())
        .pipe($.mergeMediaQueries({log: true}))
        .pipe(gulp.dest(config.appProdCss))
        .pipe($.csso())
        .pipe($.rename({suffix: '.min'}))
        .pipe(gulp.dest(config.appProdCss))
});

gulp.task('js', function() {
    return gulp
        .src(config.appjs)
        .pipe($.jscs())
        .pipe($.jscs.reporter())
        .pipe($.jshint())
        .pipe($.jshint.reporter('jshint-stylish', {verbose: true}))
        .pipe($.jshint.reporter('fail'))
        .pipe($.jscs.reporter('fail'))
        .pipe($.print())
        .pipe($.concat('mds-app.js'))
        .pipe(gulp.dest(config.pluginsProdJs))
        .pipe($.uglify({preserveComments: "license"}))
        .pipe($.rename({suffix: '.min'}))
        .pipe(gulp.dest(config.pluginsProdJs))
});

gulp.task('scss-plugins', function() {
    log('Generating plugins .scss file.');
    return gulp
        .src(mainBowerFiles({
            paths: config.bower,
            includeDev: true
        }))
        .pipe($.plumber())
        .pipe($.filter('**/*.css'))
        .pipe($.print())
        .pipe($.concat('_plugins.scss'))
        .pipe(gulp.dest(config.pluginsConcatCss));
});

gulp.task('js-plugins', function() {
    log('Generating plugins .js file.');
    return gulp
        .src(mainBowerFiles({
            paths: config.bower,
            includeDev: true
        }))
        .pipe($.plumber())
        .pipe($.filter('**/*.js'))
        .pipe($.print())
        .pipe($.concat('mds-plugins.js'))
        .pipe(gulp.dest(config.pluginsProdJs))
        .pipe($.uglify({preserveComments: "license"}))
        .pipe($.rename({ suffix: '.min' }))
        .pipe(gulp.dest(config.pluginsProdJs))
});

gulp.task('img', function() {
    return gulp
        .src(config.imgDev)
        .pipe($.newer(config.imgProdPath))
        .pipe($.imagemin({ optimizationLevel: 7, progressive: true, interlaced: true }))
        .pipe(gulp.dest(config.imgProdPath));
});
//TODO:sprite task
//TODO:create zip file with theme and strip all node modules, files etc task
//TODO: task for fonts

gulp.task('default', ['scss-plugins', 'js-plugins', 'css', 'js', 'img'], function () {
    gulp.watch( config.appScssAll, ['css']);
    gulp.watch( config.appjs, ['js']);
    gulp.watch( config.imgDev, ['img']);
    startBrowserSync();
});

/////////////////////////
function startBrowserSync() {
    if(browserSync.active) {
        return;
    }
    log('Starting browser-sync.');
    var options = {
        proxy: 'localhost/wordpress47',
        port: 3000,
        files: [
            './assets/prod/**/*.*',
            './*.php',
            './functions/**/*.php',
            './page-templates/**/*.php',
            './template-parts/**/*.php'
        ],
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