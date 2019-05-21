const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports =  new MiniCssExtractPlugin({
  filename: (chunkData) => {
    const name = chunkData.chunk.name.replace('scripts/', 'styles/');

    return `${name}.css`;
  },
  chunkFilename: '[name].css',
});
