<?php
	add_shortcode('spacer', 'spacer_handler');

	function spacer_handler($atts, $content=null, $code="") {
		if($atts['style'] == 'dashed') {
			return '<div class="spacer-dashed">&nbsp;</div>';
		} elseif($atts['style'] == 'thick-dashed') {
			return '<div class="spacer-thick-dashed">&nbsp;</div>';
		} elseif($atts['style'] == 'rope') {
			return '<div class="spacer-rope">&nbsp;</div>';
		} elseif($atts['style'] == 'cross') {
			return '<div class="spacer-cross">&nbsp;</div>';
		} elseif($atts['style'] == 'rope') {
			return '<div class="spacer-rope">&nbsp;</div>';
		} elseif($atts['style'] == 'chain') {
			return '<div class="spacer-chain">&nbsp;</div>';
		} elseif($atts['style'] == 'rosary') {
			return '<div class="spacer-rosary">&nbsp;</div>';
		} else {
			return '<div class="spacer-solid-dotted">&nbsp;</div>';
		}
	}
?>