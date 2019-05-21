/**
 * The external dependencies.
 */
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');

/**
 * The internal dependencies.
 */
const config = require('./lib/config');
const svgSpritemap = require('./plugins/svgSpritemap');
const imagemin = require('./plugins/imagemin');
const miniCssExtract = require('./plugins/miniCssExtract');
const copyPlugin = require('./plugins/copy');
const uglifyJs = require('./plugins/uglify');

/**
 * Setup the env.
 */
const { env: envName } = config.detectEnv();

/**
 * Setup webpack plugins.
 */
const plugins = [
  new CleanWebpackPlugin(),

  miniCssExtract,

  copyPlugin,

  imagemin,

  svgSpritemap,
];

/**
 * Export the configuration.
 */
module.exports = {
  /**
   * The input.
   */
  entry: require('./webpack/entry'),

  /**
   * The output.
   */
  output: require('./webpack/output'),

  /**
   * Resolve utilities.
   */
  resolve: require('./webpack/resolve'),

  /**
   * Resolve the dependencies that are available in the global scope.
   */
  externals: require('./webpack/externals'),

  /**
   * Setup the transformations.
   */
  module: {
    rules: [
      /**
       * Handle scripts.
       */
      {
        test: config.tests.scripts,
        exclude: /node_modules/,
        use: 'babel-loader',
      },

      /**
       * Handle styles.
       */
      {
        test: config.tests.styles,
        exclude: /node_modules/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              sourceMap: true,
              url: false,
            },
          },
          {
            loader: 'postcss-loader',
            options: {
              sourceMap: true,
            },
          },
          {
            loader: 'sass-loader',
            options: {
              sourceMap: true,
            },
          },
        ],
      },

      /**
       * Handle images.
       */
      {
        test: config.tests.images,
        exclude: [/fonts/, /icons/, /node_modules/],
        use: [
          {
            loader: 'file-loader',
            options: {
              name: 'img/[name].[ext]',
            },
          },
        ],
      },
    ],
  },

  /**
   * Setup the transformations.
   */
  plugins,

  /**
   * Setup minification
   */
  optimization: {
    minimizer: [
      uglifyJs
    ],
  },

  /**
   * Setup the development tools.
   */
  mode: envName,
  cache: false,
  bail: false,
  watch: false,
  devtool: false,
};
