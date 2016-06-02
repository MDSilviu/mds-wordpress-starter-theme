//needs refactoring, made in a hurry
module.exports = function() {
    var prod =  './assets/prod/';
    var dev = './assets/dev/';

    return config = {
        appjs: dev + 'js/app/**/*.js',
        appScss: dev + 'scss/*.scss',
        appScssAll: dev + 'scss/**/*.scss',
        appProdCss: prod + 'css/',
        pluginsConcatCss: dev + 'scss/partials',
        pluginsProdJs: prod + 'js',
        bower: {
            bowerDirectory: dev + 'js/plugins',
            bowerrc: './.bowerrc',
            bowerJson: './bower.json'
        },
        imgDev: './assets/dev/img/**/*.{png,jpg,gif}',
        imgDevPath: './assets/dev/img/**/*',
        imgProdPath: './assets/prod/img/'

    };
};