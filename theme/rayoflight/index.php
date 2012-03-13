<?php get_header(); ?>
<?php include (THEME_INCLUDES . '/top.php'); ?>
<?php 
	global $query_string;
	global $post;
	//print_r($post);
	
	$query = explode('%2',$query_string);
	
	if(in_array('pagename=gallery',$query)) {
		//echo "here";
	} 
	//print_r($query);
	
	//if($post_type=="gallery") {
	//	include (THEME_INCLUDES . '/gallery_single.php');
	//} else {
		include (THEME_INCLUDES . '/news.php');
	//}
?>
<?php include (THEME_INCLUDES . '/sidebar.php'); ?>
<?php get_footer(); ?>