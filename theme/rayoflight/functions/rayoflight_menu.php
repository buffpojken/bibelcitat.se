<?php $prefix = '';
$image = '<img src="'.get_bloginfo('template_url').'/images/control-panel-images/logo-orangethemes-1.png" width="11" height="15" />';

$slider_image = array( 'id' => 'slider-image-box', 'title' => ''.$image.'Homepage Slider Image', 'page' => 'post', 'context' => 'side', 'priority' => 'high', 'fields' => array(array('name' => 'Image url', 'id' => $prefix. 'big_image', 'type'=> 'text' ) ) );
$b_slider_image = array( 'id' => 'blog-slider-image-box', 'title' => ''.$image.'Blog Slider Image', 'page' => 'post', 'context' => 'side', 'priority' => 'high', 'fields' => array(array('name' => 'Image url', 'id' => $prefix. 'slider', 'type'=> 'text' ) ) );


// Add meta box
function add_sticky_box() {

	global $slider_image, $b_slider_image;
	
	add_meta_box($slider_image['id'], $slider_image['title'], 'slider_image_box', $slider_image['page'], $slider_image['context'], $slider_image['priority']);
	add_meta_box($b_slider_image['id'], $b_slider_image['title'], 'blog_slider_image_box', $b_slider_image['page'], $b_slider_image['context'], $b_slider_image['priority']);

}



function slider_image_box() {
	global $slider_image, $post;
	
	echo '<input type="hidden" name="sticky_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

	echo '<table class="form-table">';
	foreach ($slider_image['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		$post_num = htmlentities($_GET['post']);
		echo '<tr>','<th style="width:60%"><label for="', $field['id'], '">', $field['name'], '</label></th>','<td>';
		switch ($field['type']) {
			case 'text':
				echo '<input class="upload input-text-1" type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" style="width: 140px;"/>
						<div id="', $field['id'], '_button" class="upload-button upload-logo" style="padding: 10px 0 0 15px;"><a class="pex-button"><img src="'.THEME_IMAGE_CPANEL_URL.'btn-browse-1.png"/></a></div>
						<script type="text/javascript">
							jQuery(document).ready(function($){ rayoflight.loadUploader(jQuery("div#', $field['id'], '_button"), "'.THEME_FUNCTIONS_URL.'upload-handler.php", "'.THEME_UPLOADS_URL.'");});
						</script>';
				break;
		}
		echo '<td>', '</tr>';
	}
	echo '</table>';
}

function blog_slider_image_box() {
	global $b_slider_image, $post;
	

	echo '<table class="form-table">';
	foreach ($b_slider_image['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		$post_num = htmlentities($_GET['post']);
		echo '<tr>','<th style="width:60%"><label for="', $field['id'], '">', $field['name'], '</label></th>','<td>';
		switch ($field['type']) {
			case 'text':
				echo '<input class="upload input-text-1" type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" style="width: 140px;"/>
						<div id="', $field['id'], '_button" class="upload-button upload-logo" style="padding: 10px 0 0 15px;"><a class="pex-button"><img src="'.THEME_IMAGE_CPANEL_URL.'btn-browse-1.png"/></a></div>
						<script type="text/javascript">
							jQuery(document).ready(function($){ rayoflight.loadUploader(jQuery("div#', $field['id'], '_button"), "'.THEME_FUNCTIONS_URL.'upload-handler.php", "'.THEME_UPLOADS_URL.'");});
						</script>';
				break;
		}
		echo '<td>', '</tr>';
	}
	echo '</table>';
}



// Save data from meta box
function save_sticky_data($post_id) {
	global $b_slider_image, $slider_image;
	
	// verify nonce
	if (!wp_verify_nonce($_POST['sticky_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}


	foreach ($slider_image['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}//else if closer
	}//foreach closer
	

	foreach ($b_slider_image['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}//else if closer
	}//foreach closer
	
} //function closer



	

	add_action('admin_menu', 'add_sticky_box');	
	add_action('save_post', 'save_sticky_data');



?>
