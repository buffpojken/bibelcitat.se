<?php
if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
        'name' => 'Sidebar Home',
		'before_widget' => '<div class="block-1">',
        'after_widget' => '</div>',
        'before_title' => '<table class="section-spacer">
							<tr>
								<td class="left"></td>
								<td class="middle">
									<span>',
        'after_title' => 					'</span>
								</td>
								<td class="right"></td>
							</tr>
						</table>'
    ));	
}

if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
        'name' => 'Sidebar Single',
		'before_widget' => '<div class="block-1">',
        'after_widget' => '</div>',
        'before_title' => '<table class="section-spacer">
							<tr>
								<td class="left"></td>
								<td class="middle">
									<span>',
        'after_title' => 					'</span>
								</td>
								<td class="right"></td>
							</tr>
						</table>'
    ));	
}


$homepage = get_option( 'show_on_front');
$meta = get_post_custom_values("_wp_page_template",get_option( 'page_on_front'));
if($homepage == "page" && $meta[0] == "template-homepage.php") {$has_homepage=true;} else {$has_homepage=false;}

if ( function_exists('register_sidebar') && $has_homepage == true ) {
		register_sidebar(array(
        'name' => 'Homepage footer',
		'before_widget' => '<div class="block-1">',
        'after_widget' => '</div>',
        'before_title' => '<table class="section-spacer">
							<tr>
								<td class="left"></td>
								<td class="middle">
									<span>',
        'after_title' => 					'</span>
								</td>
								<td class="right"></td>
							</tr>
						</table>'
    ));	
}
	
if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
        'name' => 'Gallery',
		'before_widget' => '<div class="block-1">',
        'after_widget' => '</div>',
        'before_title' => '<table class="section-spacer">
							<tr>
								<td class="left"></td>
								<td class="middle">
									<span>',
        'after_title' => 					'</span>
								</td>
								<td class="right"></td>
							</tr>
						</table>'
    ));	
}	
	
function register_my_menus() {
	if ( function_exists( 'register_nav_menus' ) ) {
		register_nav_menus(
			array( 'top_menu' => __( 'Top Menu' ))
		);
	}	
}

function create_ministries() {
	$ministries_args = array(
    	'label' => __('Ministries'),
    	'singular_label' => __('Ministries'),
    	'public' => true,
    	'show_ui' => true,
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'rewrite' => true,
    	'supports' => array('title', 'editor', 'thumbnail')
    );
	register_post_type('ministries',$ministries_args);
}

function create_gallery() {
	$gallery_args = array(
    	'label' => __('Gallery'),
    	'singular_label' => __('Gallery'),
    	'public' => true,
    	'show_ui' => true,
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'rewrite' => true,
    	'supports' => array('title', 'editor', 'thumbnail')
    );
	register_post_type('gallery',$gallery_args);
}

add_action('init', 'create_gallery');
add_action('init', 'create_ministries');
add_action('init', 'register_my_menus' );
add_theme_support( 'post-thumbnails' );
?>