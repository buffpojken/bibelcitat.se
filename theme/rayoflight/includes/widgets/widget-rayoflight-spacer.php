<?php
add_action('widgets_init', create_function('', 'return register_widget("rayoflight_spacer");'));

class rayoflight_spacer extends WP_Widget {
	function rayoflight_spacer() {
		 parent::WP_Widget(false, $name = 'Ray Of Light Sidebar spacer');	
	}

	function form($instance) {
		 $title = esc_attr($instance['title']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        ?>
	
				<!-- BEGIN .section-spacer -->
				<table class="section-spacer">
					<tr>
						<td class="left"></td>
						<td class="middle">
							<span><?php echo $title;?></span>
						</td>
						<td class="right"></td>
					</tr>
				<!-- END .section-spacer -->
				</table>

        <?php
	}
}
?>