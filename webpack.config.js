const path = require("path")
const RemoveEmptyScriptsPlugin = require("webpack-remove-empty-scripts")
const MiniCssExtractPlugin = require("mini-css-extract-plugin")
const CopyPlugin = require("copy-webpack-plugin")

const dir = {
  src: "src",
  dist: "dist",
}

module.exports = (env, argv) => ({
  devtool: argv.mode === "development" ? "source-map" : false,
  entry: {
    main: [`./${dir.src}/js/project.js`, `./${dir.src}/scss/project.scss`],
    editor: [`./${dir.src}/scss/editor-style.scss`],
  },
  output: {
    filename: `./${dir.dist}/js/[name].js`,
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
    new RemoveEmptyScriptsPlugin(),
    new MiniCssExtractPlugin({
      filename: `./${dir.dist}/css/[name].css`,
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
