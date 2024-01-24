const TerserPlugin = require('terser-webpack-plugin');

module.exports = {
  entry: './assets/js/index.js',
  output: {
    filename: 'index.min.js',
    path: __dirname + '/dist',
  },
  optimization: {
    minimize: true,
    minimizer: [
        new TerserPlugin()
    ],
  }
};
