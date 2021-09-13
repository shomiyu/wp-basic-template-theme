const path = require("path")
const MiniCssExtractPlugin = require("mini-css-extract-plugin")
const CopyPlugin = require("copy-webpack-plugin")

const dir = {
  src: "src",
  dist: "dist",
}

module.exports = (env, argv) => ({
  devtool: argv.mode === "development" ? "source-map" : false,
  entry: [`./${dir.src}/js/project.js`, `./${dir.src}/scss/project.scss`],
  output: {
    filename: `./${dir.dist}/js/project-bundle.js`,
    path: path.resolve(__dirname),
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/env"],
          },
        },
      },
      {
        test: /\.css$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: "css-loader",
            options: {
              url: false,
              sourceMap: argv.mode === "development",
            },
          },
        ],
      },
      {
        test: /\.(sass|scss)$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: "css-loader",
            options: {
              url: false,
              sourceMap: argv.mode === "development",
              importLoaders: 2,
            },
          },
          {
            loader: "postcss-loader",
            options: {
              sourceMap: argv.mode === "development",
            },
          },
          {
            loader: "sass-loader",
            options: {
              sourceMap: argv.mode === "development",
              sassOptions: {
                outputStyle: argv.mode === "development" ? "expanded" : "",
              },
            },
          },
        ],
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: `./${dir.dist}/css/project-bundle.css`,
    }),
    new CopyPlugin({
      patterns: [
        {
          from: `./src/img`,
          to: `./dist/img`,
        },
      ],
    }),
  ],
})
