/**
 * The internal dependencies.
 */
const config = require('../lib/config');

module.exports = {
  'scripts/theme': config.srcScriptsPath('theme/index.js'),
  'scripts/admin': config.srcScriptsPath('admin/index.js'),
};
