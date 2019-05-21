const CopyWebpackPlugin = require('copy-webpack-plugin');

const config = require('../lib/config');

const copyPluginConfig = [
    {
        from: config.srcFontsPath(),
        to: config.distFontsPath(),
        ignore: ['.gitkeep'],
    },
    {
        from: config.srcImagesPath(),
        to: config.distImagesPath(),
        ignore: ['.gitkeep'],
    },
    {
        from: `${config.srcNodeModulesPath('jquery/dist/jquery.min.js')}`,
        to: config.distScriptsPath('vendor'),
    },
];

module.exports = new CopyWebpackPlugin(copyPluginConfig);
