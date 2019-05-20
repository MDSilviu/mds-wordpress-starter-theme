const config = require('./config');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

const browserSyncConfig = {
  host: 'localhost',
  proxy: config.browserSync.proxy,
  port: 3000,
  open: 'external',
  files: config.browserSync.files,
  snippetOptions: {
    rule: {
      match: /<\/body>/i,
      fn: (snippet, match) => `${snippet}${match}`,
    },
  },
  injectChanges: true,
  notify: false,
  reloadThrottle: 100,
};

module.exports = new BrowserSyncPlugin(browserSyncConfig);
