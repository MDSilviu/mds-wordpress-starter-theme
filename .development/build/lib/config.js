const path = require('path');

/**
 * Paths
 */
module.exports.themeRootPath = (basePath = '', destPath = '') =>
  path.resolve(path.dirname(__dirname), '../../', basePath, destPath);

module.exports.srcPath = (basePath = '', destPath = '') =>
  path.resolve(path.dirname(__dirname), '../', basePath, destPath);

module.exports.distPath = (basePath = '', destPath = '') =>
  path.resolve(path.dirname(__dirname), '../../assets', basePath, destPath);


module.exports.srcScriptsPath = destPath =>
  exports.srcPath('scripts', destPath);

module.exports.srcStylesPath = destPath =>
  exports.srcPath('styles', destPath);

module.exports.srcImagesPath = destPath =>
  exports.srcPath('img', destPath);

module.exports.srcIconsPath = destPath =>
    exports.srcPath('icons', destPath);

module.exports.srcFontsPath = destPath =>
  exports.srcPath('fonts', destPath);

module.exports.srcVendorPath = destPath =>
  exports.srcPath('vendor', destPath);

module.exports.srcNodeModulesPath = destPath =>
  exports.srcPath('node_modules', destPath);



module.exports.distScriptsPath = destPath =>
  exports.distPath('scripts', destPath);

module.exports.distStylesPath = destPath =>
  exports.distPath('styles', destPath);

module.exports.distImagesPath = destPath =>
  exports.distPath('img', destPath);

module.exports.distFontsPath = destPath =>
  exports.distPath('fonts', destPath);

/**
 * Tests
 */
module.exports.tests = {
  scripts: /\.(js|jsx)$/,
  styles: /\.(css|scss)$/,
  images: /img[\\/].*\.(ico|jpg|jpeg|png|svg|gif)$/,
};

/**
 * BrowserSync config
 */
module.exports.browserSync = {
    proxy: 'http://localhost/wordpress47',
    files: [
      '../assets/**/*.*',
      '../*.php',
      '../functions/**/*.php',
      '../page-templates/**/*.php',
      '../template-parts/**/*.php',
      '../woocommerce/**/*.php'
    ],
};

let env = 'development';

module.exports.setEnv = (mode) => {
  env = mode;
};

module.exports.detectEnv = () => {
  const isDev = env === 'development';
  const isProduction = env === 'production';

  return {
    env,
    isDev,
    isProduction,
  };
};
