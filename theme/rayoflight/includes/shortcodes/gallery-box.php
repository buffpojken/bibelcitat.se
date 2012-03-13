<?php
remove_shortcode('gallery');
add_shortcode('gallery', 'gallery_handler');

function gallery_handler($atts, $content=null, $code="") {
	if(isset($atts['url'])) {
		if(substr($atts['url'],-1) == '/') {
			$atts['url'] = substr($atts['url'],0,-1);
		}
		$vars = explode('/',$atts['url']);
		$slug = $vars[count($vars)-1];
		$page = get_page_by_path($slug,'OBJECT','gallery');
		
		if(is_object($page)) {
			$id = $page->ID;
			if(is_numeric($id)) {
								
				$content.= '<div class="gallery-preview-box-wrapper">';
				$content.=	'<div class="gallery-preview-box">';
				$content.=		'<div class="gallery-preview-box-content">';
				$content.=		'<div class="gallery-preview-box-title"><b>'.__('Photo gallery','rayoflight').':</b><a href="'.$atts['url'].'">'.$page->post_title.'</a></div>';
				
					$args = array( 'post_type' => 'attachment', 'numberposts' => 4, 'post_status' => null, 'post_parent' => $id, 'order' => 'ASC' ); 
					$attachments = get_posts($args);
					$counter = 0;
					if ($attachments) {
						foreach($attachments as $attach) {
							$file = $attach->guid;
							$img = get_bloginfo('template_url').'/timthumb.php?src=/';
							$imgs = explode("/wp-content/", $file);
							$img.= 'wp-content/'.$imgs[1].'&amp;w=80&amp;h=80&amp;zc=1&amp;q=100';
							
							$content.=	'<a href="'.$atts['url'].'/'.$counter.'"><img src="'.$img.'" alt="'.$page->post_title.'" /></a>';
							$counter++;
						}
					} else {
						$content.= "Gallery is empty";
					}
				
				$content.=		'<table><tr><td><a href="'.$atts['url'].'">'.__('<b>show<br />all<br />photos</b>','rayoflight').'</a></td></tr></table>';
				$content.=		'</div>';
				$content.=	'</div>';
				$content.= '</div>';
					
			} else {
				$content.= "Incorrect URL attribute defined";
			}
		} else {
			$content.= "Incorrect URL attribute defined";
		}
		
	} else {
		$content.= "No url attribute defined!";
	
	}
	return $content;
}

?>