
<?php
$gnav_args = array(
	'theme_location' => 'global_navigation',
	'menu'=>'Global Navigation',
	'container' => true,
	'menu_class'=>"l-gnav-main",
	'fallback_cb' => 'tsbk_empty_menu',
	'echo' => true,
	'depth' => 0,
	'walker'  => new Tsbk_Global_Nav_Menu,
	'items_wrap' => '<ul class="%2$s">%3$s</ul>',
);
?>
<nav id="gnav" class="l-gnav" role="navigation" aria-hidden="true">
<?php wp_nav_menu($args_gnav); ?>
</nav>
