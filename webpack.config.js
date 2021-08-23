//path モジュールの読み込み
const path = require('path');

//MiniCssExtractPlugin の読み込み
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

// production モード以外の場合、変数 enabledSourceMap は true
const enabledSourceMap = process.env.NODE_ENV !== 'production';

module.exports = {
	//エントリポイント（デフォルトと同じなので省略可）
	entry: './src/index.js',
	//出力先（デフォルトと同じなので省略可）
	output: {
		filename: 'js/main.js',
		path: path.resolve(__dirname, 'assets'),
	},
	module: {
		rules: [
			{
				// 対象となるファイルの拡張子(scss)
				test: /\.scss$/,
				// Sassファイルの読み込みとコンパイル
				use: [
					// CSSファイルを抽出するように MiniCssExtractPlugin のローダーを指定
					{
						loader: MiniCssExtractPlugin.loader,
					},
					// CSSをバンドルするためのローダー
					{
						loader: "css-loader",
						options: {
							//URL の解決を無効に
							url: false,
							// ソースマップを有効に
							sourceMap: enabledSourceMap,
						},
					},
					// Sass を CSS へ変換するローダー
					{
						loader: "sass-loader",
						options: {
							// dart-sass を優先
							implementation: require('sass'),
							sassOptions: {
								// fibers を使わない場合は以下で false を指定
								fiber: require('fibers'),
							},
							// ソースマップを有効に
							sourceMap: enabledSourceMap,
						},
					},
				],
			},
		],
	},
	//プラグインの設定
	plugins: [
		new MiniCssExtractPlugin({
			// 抽出する CSS のファイル名
			filename: "css/style.css",
		}),
	],
	//source-map タイプのソースマップを出力
	devtool: "source-map",
	// node_modules を監視（watch）対象から除外
	watchOptions: {
		ignored: /node_modules/  //正規表現で指定
	},
};
