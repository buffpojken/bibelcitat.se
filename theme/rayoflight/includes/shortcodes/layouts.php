<?php
	add_shortcode('half-column-left', 'layout_handler');
	add_shortcode('half-column-right', 'layout_handler');
	add_shortcode('one-third-column-1', 'layout_handler');
	add_shortcode('one-third-column-2', 'layout_handler');
	add_shortcode('one-third-column-3', 'layout_handler');
	add_shortcode('one-fourth-column-1', 'layout_handler');
	add_shortcode('one-fourth-column-2', 'layout_handler');
	add_shortcode('one-fourth-column-3', 'layout_handler');
	add_shortcode('one-fourth-column-4', 'layout_handler');
	
	function layout_handler($atts, $content=null, $code="") {

		if($code == "half-column-left") {
			return '<div class="half-column-left">'.$content.'</div>';
		} elseif($code == "half-column-right") {
			return '<div class="half-column-right">'.$content.'</div>';
		} elseif($code == "one-third-column-1") {
			return '<div class="one-third-column-1">'.$content.'</div>';
		} elseif($code == "one-third-column-2") {
			return '<div class="one-third-column-2">'.$content.'</div>';
		} elseif($code == "one-third-column-3") {
			return '<div class="one-third-column-3">'.$content.'</div>';
		} elseif($code == "one-fourth-column-1") {
			return '<div class="one-fourth-column-1">'.$content.'</div>';
		} elseif($code == "one-fourth-column-2") {
			return '<div class="one-fourth-column-2">'.$content.'</div>';
		} elseif($code == "one-fourth-column-3") {
			return '<div class="one-fourth-column-3">'.$content.'</div>';
		} elseif($code == "one-fourth-column-4") {
			return '<div class="one-fourth-column-4">'.$content.'</div>';
		}
		
		return $content;
	}
?>