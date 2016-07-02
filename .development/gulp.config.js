//needs refactoring, made in a hurry
module.exports = function() {
    var themePath =  '../assets/theme/';
    
    return config = {
        //dev
        devFilesScssMain: './scss/*.scss',
        devFilesScssAll: './scss/**/*.scss',
        devFilesJs: './js/app/**/*.js',
        devFilesImg: './img/**/*.{png,jpg,gif}',
        devPathScssPartials: './scss/partials',
        
        //theme
        themePath: themePath,
        themePathCss: themePath + 'css/',
        themePathJs: themePath + 'js/',
        themePathImg: themePath + 'img/',

        //misc
        autoprefixerBrowserVersion: [
            'last 2 versions',
            '> 2%', 
            'ie >= 10'
        ],
        bower: {
            bowerDirectory: './js/plugins',
            bowerrc: './.bowerrc',
            bowerJson: './bower.json'
        },
        browserSyncFiles: [
            '../assets/**/*.*',
            '../*.php',
            '../functions/**/*.php',
            '../page-templates/**/*.php',
            '../template-parts/**/*.php'
        ],
        browserSyncProxy: 'localhost/'

        
    };
};