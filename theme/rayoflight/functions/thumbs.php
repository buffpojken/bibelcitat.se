<?php

function get_post_thumb($post_id,$width,$height,$custom="image") {		//universal thumb function
	
	$show_no_image = get_option("theme_show_no_image_thumb");

	$custom_image = get_post_custom_values($custom,$post_id);	//get custom field value
	$custom_image = $custom_image[0];
	
	if($custom_image == "" && $custom != "image"  && $custom != "slider") {
		$custom = "big_image";
		$custom_image = get_post_custom_values($custom,$post_id);	//get custom field value
		$custom_image = $custom_image[0];
	}
	
	if($custom_image == "" && $custom != "image"  && $custom != "big_image") {
		$custom = "slider";
		$custom_image = get_post_custom_values($custom,$post_id);	//get custom field value
		$custom_image = $custom_image[0];
	}
	$meta = get_post_meta($post_id, "_thumbnail_id",true);		//get wordpress built in thumbnail value
	$first_from_post = get_first_image($post_id);				//get first image form post
	
	if($custom_image != "") {		//custom field value
		$file = $custom_image;
		if(strpos($file,"wp-content") !== false) {
			$pos = strpos($file,"/wp-content");
			$file = substr($file,$pos);
		}
		$src=get_template_directory_uri(); $src.="/timthumb.php?src=";
		$src.=$file; $src.="&amp;w=$width&amp;h=$height&amp;zc=1&amp;q=100";
		$show_image = true;
		
	} elseif($meta) {		//built in thumb
		$file = site_url()."/wp-content/uploads/".get_post_meta($meta, "_wp_attached_file",true);
		$src=get_template_directory_uri(); $src.="/timthumb.php?src=";
		$src.=$file; $src.="&amp;w=$width&amp;h=$height&amp;zc=1&amp;q=100";
		$show_image = true;		
		
	} elseif($first_from_post != false && $custom!="big_image" && $custom!="slider") {		//first attached image
		$file = $first_from_post;
		if(strpos($file,"wp-content") !== false) {
			$pos = strpos($file,"/wp-content");
			$file = substr($file,$pos);
		}
		$src=get_template_directory_uri(); $src.="/timthumb.php?src=";
		$src.=$file; $src.="&amp;w=$width&amp;h=$height&amp;zc=1&amp;q=100";
		$show_image = true;	
		
	} else {		//no image
		$src = get_bloginfo('template_url').'/images/no-image-'.$width.'x'.$height.'.jpg';
		
		if($show_no_image == "on") {
			$show_image = true;
		} else {
			$show_image = false;
		}
	}
	
	return array("src"=>$src,"show"=>$show_image);
}

function add_image_thumb($content)	//add thumb in the begining of the post
{
	global $post;
	$img = get_post_thumb($post->ID,130,130);
	if($img['show'] != false) {
		if($img['src'] != "") {
			$img = '<img src="'.$img['src'].'" alt="article-image" class="article-image" />';
			return $img." ".$content;
		} else {
			return $content;
		}
	} else {
		return $content;
	}
}


function get_first_image($post_id)  {		//retrieves first post attachment, check if is image
	
	$args = array(
		'post_type' => 'attachment',
		'numberposts' => null,
		'post_status' => null,
		'post_parent' => $post_id
	);
	
	$attachments = get_posts($args);
	if ($attachments) {
		foreach ($attachments as $attachment) {
			if(is_image($attachment->guid)) {
				return $attachment->guid;
			}
		}
	}
	
	return false;  
}


function is_image($src) {		//check if src extension is image like
	$extensions = array('.jpg','.gif','.png');
	if(in_array(substr($src,-4),$extensions)) {
		return true;
	} else {
		return false;
	}
}

?>