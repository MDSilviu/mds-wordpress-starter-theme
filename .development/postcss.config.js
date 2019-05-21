const autoPrefixer = require('autoprefixer');
const cssMQPacker = require('css-mqpacker');
const sortMediaQueries = require('css-mqpacker-sort-mediaqueries');
const cssNano = require('cssnano');

const config = require('./build/lib/config');

const { isProduction } = config.detectEnv();

const plugins = [
  autoPrefixer,
  cssMQPacker({
    sort: sortMediaQueries
  })
];

module.exports = () => {
  if (isProduction) {
    plugins.push(cssNano);
  }

  return { plugins };
};
