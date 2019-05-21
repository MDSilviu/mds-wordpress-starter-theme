const config = require('./build/lib/config');

module.exports = (env, argv) => {
  const { mode } = argv;
  config.setEnv(mode);

  return require(`./build/webpack.${mode}.js`); // eslint-disable-line import/no-dynamic-require, global-require
};
