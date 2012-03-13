<?php
add_action('widgets_init', create_function('', 'return register_widget("rayoflight_last_articles");'));

class rayoflight_last_articles extends WP_Widget {
	function rayoflight_last_articles() {
		 parent::WP_Widget(false, $name = 'Ray Of Light Last Articles');	
	}

	function form($instance) {
		 $title = esc_attr($instance['title']);
		 $cat = esc_attr($instance['cat']);
		 $count = esc_attr($instance['count']);
		 $type = esc_attr($instance['type']);
		 $lenght = esc_attr($instance['lenght']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e('Category:'); ?>
			<?php
			$args = array(
				'type'                     => 'post',
				'child_of'                 => 0,
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 1,
				'hierarchical'             => 1,
				'taxonomy'                 => 'category');
				$args = get_categories( $args ); 
			?> 	
			<select name="<?php echo $this->get_field_name('cat'); ?>" style="width: 100%; clear: both; margin: 0;">
				<?php foreach($args as $ar) { ?>
					<option value="<?php echo $ar->cat_name; ?>" <?php if($ar->cat_name==$cat)  {echo 'selected="selected"';} ?>><?php echo $ar->cat_name; ?></option>
				<?php } ?>
			</select>
			
			</label></p>
			
			<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Post count:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>
			
			<p><label for="<?php echo $this->get_field_id('type'); ?>"><?php _e('Type:'); ?>
				<select name="<?php echo $this->get_field_name('type'); ?>" style="width: 100%; clear: both; margin: 0;">
					<option value="1" <?php if($type==1)  {echo 'selected="selected"';} ?>>Image + Title</option>
					<option value="2" <?php if($type==2)  {echo 'selected="selected"';} ?>>Title + Excerpt</option>
				</select>
			</label></p>
			
			<?php if($type==2) { ?>
				<p><label for="<?php echo $this->get_field_id('lenght'); ?>"><?php _e('Exceprt lenght (words):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('lenght'); ?>" name="<?php echo $this->get_field_name('lenght'); ?>" type="text" value="<?php echo $lenght; ?>" /></label></p>
			<?php } ?>
			
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['cat'] = strip_tags($new_instance['cat']);
		$instance['count'] = strip_tags($new_instance['count']);
		$instance['type'] = strip_tags($new_instance['type']);
		$instance['lenght'] = strip_tags($new_instance['lenght']);
		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
		$cat = $instance['cat'];
		$count = $instance['count'];
		$type = $instance['type'];
		$lenght = $instance['lenght'];
        ?>
						<!-- BEGIN .block-1 -->
						<div class="block-1 last">
							<h2><span> <?php if ( $title ) { echo $title; } ?></span>
								<?php $category_id = get_cat_ID($cat);
									  $category_link = get_category_link( $category_id );
								?>
								<a href="<?php echo $category_link;?>"><b><?php printf ( __( 'show all' , 'rayoflight' ));?></b></a>
							</h2>
								
							<div class="block-1-content">
								<?php if($type==1 OR $type=="") { ?>		
								<!-- BEGIN .latest-articles -->
								<div class="latest-articles">
									<?php
										$args=array(
										   'category_name' => $cat,
										   'posts_per_page'=> $count
										);
										$the_query = new WP_Query($args);
									?>
									<?php $counter=1; ?>
									<?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
										<!-- BEGIN .latest-article-item -->
										<div class="latest-article-item <?php if($counter == $count) {echo "last";} ?>">
											<table>
												<tr>
													<td class="image">
														<?php $image = get_post_thumb($the_query->post->ID,50,50); ?>
														<a href="<?php the_permalink();?>"><img src="<?php if($image['src']) {echo $image['src'];} ?>" alt="<?php the_title(); ?>" /></a>
													</td>
													<td class="text">
														<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
														<a href="<?php the_permalink();?>" class="more-link"><?php printf ( __( 'Read more' , 'rayoflight' ));?></a>
													</td>
												</tr>
											</table>
										<!-- END .latest-article-item -->
										</div>
										<?php $counter++; ?>
									<?php endwhile; else: ?>
									<p><?php _e('No posts where found'); ?></p>
									<?php endif; ?>

								<!-- END .latest-articles -->
								</div>
								<?php } else { ?>
								<!-- BEGIN .latest-events -->
								<div class="latest-events">
									<?php
										$args=array(
										   'category_name' => $cat,
										   'posts_per_page'=> $count
										);
										$the_query = new WP_Query($args);
									?>
									<?php $counter=1; ?>
									<?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
										<div class="latest-event-item <?php if($counter == $count) { echo "last";} ?>">
											<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<?php add_filter('excerpt_more', 'new_excerpt_more'); ?>
											<p><?php echo word_trim(get_the_excerpt(),$lenght);?></p>
											<a href="<?php the_permalink();?>" class="more-link"><?php printf ( __( 'Read more' , 'rayoflight' ));?></a>
										<!-- END .latest-event-item -->
										</div>
									<?php $counter++; ?>
									<?php endwhile; else: ?>
									<p><?php _e('No posts where found.'); ?></p>
									<?php endif; ?>
									
								<!-- END .latest-events -->
								</div>								
								<?php } ?>
							</div>
						<!-- END .block-1 -->
						</div>
        <?php
	}
}
?>