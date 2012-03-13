<?php
	add_shortcode('list', 'list_handler');
	add_shortcode('item', 'list_handler');

	function list_handler($atts, $content=null, $code="") {
		if($code == "item") {
			return '<li>'.$content.'</li>';
		} elseif($code == "list") {
			if($atts['style'] == 'check') {
				$content = '<ul class="list-style-check">'.$content.'</ul>';
			} elseif($atts['style'] == "cross") {
				$content = '<ul class="list-style-cross">'.$content.'</ul>';
			} elseif($atts['style'] == "crossout") {
				$content = '<ul class="list-style-crossout">'.$content.'</ul>';
			} elseif($atts['style'] == "circle") {
				$content = '<ul class="list-style-circle">'.$content.'</ul>';
			} elseif($atts['style'] == "cubecross") {
				$content = '<ul class="list-style-cubecross">'.$content.'</ul>';
			} elseif($atts['style'] == "default") {
				$content = '<ul class="list-style-default">'.$content.'</ul>';
			} else {
				$content = '<ul class="list-style-default">'.$content.'</ul>';
			}
		}
		$content = do_shortcode($content);
		$content = remove_br($content);
		return $content;
	}
	
?>