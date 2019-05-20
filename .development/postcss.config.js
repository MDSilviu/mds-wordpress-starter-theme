const autoPrefixer = require('autoprefixer');
const cssMQPacker = require('css-mqpacker');
const sortMediaQueries = require('css-mqpacker-sort-mediaqueries');
const cssNano = require('cssnano');

const config = require('./webpack/config');

const plugins = [
  autoPrefixer,
  cssMQPacker({
    sort: sortMediaQueries
  })
];

module.exports = () => {
  if (config.env === 'production') {
    plugins.push(cssNano);
  }

  return { plugins };
};
