/**
 * The internal dependencies.
 */
const config = require('../lib/config');

module.exports = {
  modules: [config.srcScriptsPath(), 'node_modules'],
  extensions: ['.js', '.jsx', '.json', '.css', '.scss'],
  alias: {
    '@scripts': config.srcScriptsPath(),
    '@styles': config.srcStylesPath(),
    '@images': config.srcImagesPath(),
    '@vendor': config.srcVendorPath(),
    '@dist': config.distPath(),
    '~': config.srcPath('node_modules'),
  },
};
