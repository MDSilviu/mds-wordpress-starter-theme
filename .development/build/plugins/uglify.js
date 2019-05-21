const TerserPlugin = require('terser-webpack-plugin');

const uglifyConfig = {
    cache: true,
    parallel: true,
    sourceMap: true,
    extractComments: true,
    terserOptions: {
        output: {
            comments: /@license/i,
        },
        compress: {
            drop_console: true, // eslint-disable-line camelcase
        },
        safari10: true,
    },
};

module.exports = new TerserPlugin(uglifyConfig);
