<!-- BEGIN .searchform -->
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>" class="searchform" name="searchform">
	<input type="text" class="input-text" value="<?php $sr = esc_html($s, 1); if($sr) echo $sr; else echo __('search here', 'rayoflight'); ?>"  onfocus="if (this.value == 'search here') {this.value = '';};" name="s" id="s" />
	<input type="image" class="input-button" onclick="document.forms.searchform.submit()" value="Search!" src="<?php bloginfo('template_url'); ?>/images/blank.png" />
<!-- END .searchform -->
</form>