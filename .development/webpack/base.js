const webpack = require('webpack');
const merge = require('webpack-merge');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const ManifestPlugin = require('webpack-manifest-plugin');

const react = require('./react');

const plugins = [
  new webpack.ProvidePlugin({
    $: 'jquery',
    jQuery: 'jquery',
  }),

  new ManifestPlugin({
    seed: {},
  }),
];

const optimization = {
  runtimeChunk: false,
};

// All Loaders used in production and development build.
const loaders = {
  rules: [
    // {
    //   test: /\.(js|jsx)$/,
    //   exclude: /node_modules/,
    //   use: 'babel-loader',
    // },
    // {
    //   test: /\.(png|svg|jpg|jpeg|gif|ico)$/,
    //   exclude: [/fonts/, /node_modules/],
    //   use: 'file-loader?name=[name].[ext]',
    // },
    // {
    //   test: /\.(eot|otf|ttf|woff|woff2|svg)$/,
    //   exclude: [/images/, /node_modules/],
    //   use: 'file-loader?name=[name].[ext]',
    // },
    {
      test: /\.scss$/,
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
  ],
};

const base = {
  optimization,
  plugins,
  module: loaders,
};

module.exports = merge(base, react);
