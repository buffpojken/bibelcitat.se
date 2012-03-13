<?php get_header(); ?>
<?php
$post_type = get_post_type();
if($post_type == "gallery") {
	include (THEME_INCLUDES . '/gallery-single.php');
} else {
	include (THEME_INCLUDES . '/top.php');
	include (THEME_INCLUDES . '/news_single.php');
	include (THEME_INCLUDES . '/sidebar_single.php');
	get_footer();
}