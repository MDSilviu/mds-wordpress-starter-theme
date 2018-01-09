//needs refactoring, made in a hurry
module.exports = function() {
    var themePath =  '../assets/theme/';
    
    return config = {
        //dev
        devFilesScssAppMain: './scss/*.scss',
        devFilesScssAppAll: './scss/**/*.scss',
        devFilesAppJs: './js/app/**/*.js',
        devFilesPluginsJs: './js/plugins/**/*.js',
        devFilesNotMergedJs: './js/not-merged/**/*.js',
        devFilesGroupedMergedJs: './js/group-merged/**/*.js',
        devFilesJs: './js/**/*.js',
        devPathPluginsJs: './js/plugins',
        devPathNotMergedJs: './js/not-merged',
        devPathGroupedMergedJs: './js/group-merged',
        devFilesFont: './font/**/*',

        //png icons
        devFilesImg: './img/**/*.{png,jpg,gif,svg}',
        devFilesIcons: './icon/*.png',

        //svg icons
        devFilesSvgIcons: './icons/*.svg',

        svgTemplateName: 'sprite-template.scss',
        svgSpriteScssName: '_sprite.scss',
        svgSpriteFileName: 'icons-sprite.svg',

        //theme
        themePath: themePath,
        themePathAppCss: themePath + 'css',
        themePathAppJs: themePath + 'js',
        themePathPluginsJs: themePath + 'js/plugins',
        themePathImg: themePath + 'img/',
        themePathFont: themePath + 'font/',

        //misc
        autoprefixerBrowserVersion: [
            'last 2 versions',
            '> 2%'
        ],

        browserSyncFiles: [
            '../assets/**/*.*',
            '../*.php',
            '../functions/**/*.php',
            '../page-templates/**/*.php',
            '../template-parts/**/*.php',
            '../woocommerce/**/*.php'
        ],
        browserSyncProxy: 'localhost/wordpress',

    };
};