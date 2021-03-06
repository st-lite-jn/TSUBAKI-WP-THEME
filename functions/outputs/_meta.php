<?php
//======================================================================
// メタ要素生成し出力する関数
//======================================================================
if(!function_exists('tsbk_output_meta')) {
	function tsbk_output_meta() {

		//ディスクリプションとOGタイプはグローバル変数で取得
		global $tsbk_description;
		global $tsbk_ogtype;
		global $tsbk_title;
		global $tsbk_ogimg;

		$charset = get_bloginfo('charset');
		$site_name = get_bloginfo('name');
		$site_desc = get_bloginfo('description');
		$site_url = home_url();
		$site_icon = get_site_icon_url();

		//HTMLを初期化
		$html_meta = "";
		$html_meta .= "
			<meta charset=\"{$charset}\" />
			<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
			<title>{$tsbk_title['title-tag']}</title>
			<meta name=\"description\" content=\"{$tsbk_description}\" />
		";
		//Jetpackを使用していない場合のみ出力
		if(!class_exists('jetpack')) {
			$html_meta .= "
				<meta property=\"og:site_name\" content=\"{$site_name}\" />
				<meta property=\"og:title\" content=\"{$tsbk_title['title-tag']}\" />
				<meta property=\"og:description\" content=\"{$tsbk_description}\" />
				<meta property=\"og:type\" content=\"{$tsbk_ogtype}\" />
				<meta property=\"og:image\" content=\"{$tsbk_ogimg[0]}\" />
				<meta property=\"og:image:width\" content=\"{$tsbk_ogimg[1]}\" />
				<meta property=\"og:image:heighgt\" content=\"{$tsbk_ogimg[2]}\" />
				<meta name=\"twitter:description\" content=\"{$tsbk_description}\" />
				<meta name=\"twitter:card\" content=\"summary_large_image\" />
			";
		}
		echo preg_replace('/(\t|\r\n|\r|\n)/s', '', $html_meta);
	}
}
add_action( 'wp_head' , 'tsbk_output_meta' , 1);
