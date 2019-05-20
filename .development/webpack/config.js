const path = require('path');

// Create Theme/Plugin config variable.
// Define path to the project from the WordPress root. This is used to output the correct path to the manifest.json.
const configData = getConfig('wp-content/themes/mds-wordpress-starter-theme'); // eslint-disable-line no-use-before-define

// Export config to use in other Webpack files.
module.exports = {
  browserSync: {
    proxy: 'http://localhost/wordpress79',
    files: [
      '../assets/**/*.*',
      '../*.php',
      '../functions/**/*.php',
      '../page-templates/**/*.php',
      '../template-parts/**/*.php',
      '../woocommerce/**/*.php'
    ],
  },

  theme: {
    publicPath: configData.publicPath,
    assetsPath: configData.assetsPath,
    assetsEntry: configData.assetsEntry,
    // assetsAdminEntry: configData.assetsAdminEntry,
    output: configData.output,
    nodeModules: configData.nodeModules,
    appPath: configData.appPath,
  },
};

// Generate all paths required for Webpack build to work.
function getConfig(assetsPath) {
  const dataPath = assetsPath.replace(/^\/|\/$/g, '');
  const appPath = `${path.resolve(__dirname, '..')}`;

  const containerPath = `${dataPath}/.development`;
  const containerFullPath = `${appPath}`;


  return {
    containerPath,
    containerFullPath,
    publicPath: `../${containerPath}/assets/`,

    assetsPath: `${containerPath}`,
    assetsEntry: `${containerFullPath}/scripts/theme/mds-app.js`,
    // assetsAdminEntry: `${containerFullPath}/assets/application-admin.js`,

    output: `${appPath}/assets`,
    nodeModules: `${containerFullPath}/node_modules`,
    appPath,
  };
}
