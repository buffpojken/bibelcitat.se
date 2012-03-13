<?php
add_action('widgets_init', create_function('', 'return register_widget("rayoflight_gallery");'));

class rayoflight_gallery extends WP_Widget {
	function rayoflight_gallery() {
		 parent::WP_Widget(false, $name = 'Latest Galeries');	
	}

	function form($instance) {
		 $title = esc_attr($instance['title']);
		 $count = esc_attr($instance['count']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Item shown:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>
		
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = strip_tags($new_instance['count']);
		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
		$count = $instance['count'];
        ?>
              <?php echo $before_widget; ?>
	
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
					$args = array( 'post_status' => null, 'numberposts' => $count, 'post_type' => 'gallery'); 
					$posts = get_posts($args);
					
						if(count($posts) > 0) {
							?>
								<!-- BEGIN .newest -->
								<div class="newest-galleries">
							<?php
							
							foreach($posts as $post) {
								$image = get_post_thumb($post->ID,55,55);
								?>
								<a href="<?php echo get_permalink($post->ID);?>">
									<img src="<?php echo $image['src']; ?>" alt="<?php echo $post->title;?>" />
								</a>
								<?php
							}
							
							?>
								<!-- END .newest -->
								</div>
							<?php
						}
				?>
				<?php echo $after_widget; ?>
        <?php
	}
}
?>