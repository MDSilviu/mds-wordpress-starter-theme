const merge = require('webpack-merge');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const base = require('./base');
const project = require('./project');
const browserSync = require('./browserSync');

const plugins = [
    new MiniCssExtractPlugin({
        filename: '[name].css',
    }),

    browserSync
];

const developmentConfig = {
    plugins,

    devtool: false,
};

module.exports = merge(project, base, developmentConfig);
