<?php
/*
Template Name: Homepage
*/	
?>
<?php get_header(); ?>
<?php include (THEME_INCLUDES . '/top.php'); ?>

<!-- BEGIN .content-wrapper -->
<div class="content-wrapper">

	<!-- BEGIN .content -->
	<div class="content">
		
		<!-- BEGIN .homepage-wrapper -->
		<div class="homepage-wrapper">
			
		
		<?php
			if(get_option("".$theme_name."_homepage_slider") != "off") { ?>
			
			<!-- BEGIN .homepage-slider -->
			<div class="homepage-slider">
			
				<?php if(get_option("".$theme_name."_show_featured_tag") == "on") { ?>
				<span class="tag">&nbsp;</span>
				<?php } ?>
				<span class="rounded-corners">&nbsp;</span>
				
				<?php if(get_option("theme_homepage_slider") == "on") { ?>
				<div id="aktuals_field" style="overflow:hidden; position:relative;width:900px;">
					<table style="overflow:hidden; position: relative;">
						<tr>
						<?php 
							$cat = get_option("".$theme_name."_homepage_slider_cat");
							$my_query = new WP_Query('cat='.$cat.'&showposts=5&orderby=menu_order&order=ASC');
							$counter=1;
						?>
						<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
							<td>
								<!-- BEGIN .homepage-slider-item -->
								<?php $image = get_post_thumb($post->ID,900,350,'big_image'); ?>
								<div class="homepage-slider-item" id="aktuals<?php echo $counter;?>" style="background: url(<?php echo $image['src']; ?>) 0 0 no-repeat;">
									<p><a href="<?php the_permalink();?>" class="title"><?php the_title(); ?></a></p>
									<p><a href="<?php the_permalink();?>" class="description"><?php the_excerpt(); ?></a></p>
									
									<div class="background"></div>
								<!-- END .homepage-slider-item -->
								</div>
							</td>
						<?php $counter = $counter+1; ?>
						<?php endwhile; else: ?>
						<?php endif; ?>		
						</tr>
					</table>
				</div>
				<?php } else { ?>
					<table>
						<tr>
							<td>
								<?php
									$homepage_image=get_option("".$theme_name."_homepage_image");
								?>
								<div class="homepage-slider-item"  style="background: url(<?php echo $homepage_image; ?>) 0 0 no-repeat;">
									<div class="background"></div>
								<!-- END .homepage-slider-item -->
								</div>
							</td>
						</tr>
					</table>
				<?php } ?>
				<!-- BEGIN .homepage-slider-image-shadow -->
				<div class="homepage-slider-image-shadow">
					&nbsp;
				<!-- END .homepage-slider-image-shadow -->
				</div>
				
				<?php if(get_option("theme_homepage_slider") == "on") { ?>
				<!-- BEGIN .navigation -->
				<div class="navigation">
					<a href="#" class="previous" onmouseover="set_hover_on();" onmouseout="set_hover_off();" onclick="scrollLefty(); return false;"></a>
					<a href="#" id="aktuals1_btn" onclick="scrollToElem(1); return false;" class="active"></a>
					<a href="#" id="aktuals2_btn" onclick="scrollToElem(2); return false;"></a>
					<a href="#" id="aktuals3_btn" onclick="scrollToElem(3); return false;"></a>
					<a href="#" id="aktuals4_btn" onclick="scrollToElem(4); return false;"></a>
					<a href="#" id="aktuals5_btn" onclick="scrollToElem(5); return false;"></a>
					<a href="#" class="next" onmouseover="set_hover_on();" onmouseout="set_hover_off();" onclick="scrollRight(); return false;"></a>
				<!-- END .navigation -->
				</div>
				<?php } ?>
			<!-- END .homepage-slider -->
			</div>
			
			<?php } ?>
			<?php
				$homepage_infoblocks_enabled = get_option("theme_homepage_infoblocks_enabled");
				$ib1_title = get_option("ib1_title");
				$ib1_image = get_option("ib1_image");
				$ib1_url = get_option("ib1_url");
				$ib1_text = get_option("ib1_text");
				
				$ib2_title = get_option("ib2_title");
				$ib2_image = get_option("ib2_image");
				$ib2_url = get_option("ib2_url");
				$ib2_text = get_option("ib2_text");
				
				$ib3_title = get_option("ib3_title");
				$ib3_image = get_option("ib3_image");
				$ib3_url = get_option("ib3_url");
				$ib3_text = get_option("ib3_text");
				
				$ib4_title = get_option("ib4_title");
				$ib4_image = get_option("ib4_image");
				$ib4_url = get_option("ib4_url");
				$ib4_text = get_option("ib4_text");
			?>
			<?php if($homepage_infoblocks_enabled == "on") { ?>
			<!-- BEGIN .homepage-columns -->
			<div class="homepage-columns">
				<!-- BEGIN .homepage-columns-item -->
				<div class="homepage-columns-item">
					<div class="title">
						<div style="background: url(<?php echo $ib1_image;?>) center left no-repeat;"><?php echo $ib1_title;?></div>
					</div>
					<div class="text">
						<p><?php echo $ib1_text;?></p><p><a href="<?php echo $ib1_url;?>" class="more-link"><?php printf ( __( 'Read more' , 'rayoflight' ));?></a></p>
					</div>
				<!-- END .homepage-columns-item -->
				</div>
				
				<!-- BEGIN .homepage-columns-item -->
				<div class="homepage-columns-item">
					<div class="title">
						<div style="background: url(<?php echo $ib2_image;?>) center left no-repeat;"><?php echo $ib2_title;?></div>
					</div>
					<div class="text">
						<p><?php echo $ib2_text;?></p><p><a href="<?php echo $ib2_url;?>" class="more-link"><?php printf ( __( 'Read more' , 'rayoflight' ));?></a></p>
					</div>
				<!-- END .homepage-columns-item -->
				</div>
				
				<!-- BEGIN .homepage-columns-item -->
				<div class="homepage-columns-item">
					<div class="title">
						<div style="background: url(<?php echo $ib3_image;?>) center left no-repeat;"><?php echo $ib3_title;?></div>
					</div>
					<div class="text">
						<p><?php echo $ib3_text;?></p><p><a href="<?php echo $ib3_url;?>" class="more-link"><?php printf ( __( 'Read more' , 'rayoflight' ));?></a></p>
					</div>
				<!-- END .homepage-columns-item -->
				</div>
				
				<!-- BEGIN .homepage-columns-item -->
				<div class="homepage-columns-item last">
					<div class="title">
						<div style="background: url(<?php echo $ib4_image;?>) center left no-repeat;"><?php echo $ib4_title;?></div>
					</div>
					<div class="text">
						<p><?php echo $ib4_text;?></p><p><a href="<?php echo $ib4_url;?>" class="more-link"><?php printf ( __( 'Read more' , 'rayoflight' ));?></a></p>
					</div>
				<!-- END .homepage-columns-item -->
				</div>
			
			<!-- END .homepage-columns -->
			</div>
			<?php } ?>
			
			<?php
				$homepage_footer = get_option("theme_homepage_footer");
				if($homepage_infoblocks_enabled == "on" && $homepage_footer == "on") {
			?>
				<!-- BEGIN .homepage-spacer -->
				<div class="homepage-spacer">
					&nbsp;
				<!-- END .homepage-spacer -->
				</div>
			<?php } ?>
			
			<?php if($homepage_footer == "on") { ?>
			
			<!-- BEGIN .homepage-footer -->
			<div class="homepage-footer">
			
				<!-- BEGIN .block-2 -->
				<div class="block-2 last">
				
						<?php
						$footer_post = get_option("theme_homepage_footer_post");
						$args=array(
						   'p' => $footer_post,
						   'post_type' => 'page'
						);
						$the_query = new WP_Query($args);
						global $more; $more = false;
						if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
												
						<h2><span><?php the_title();?></span></h2>
						<div class="block-2-content">
							
							<!-- BEGIN .homepage-about -->
							<div class="homepage-about">
							
								<?php add_filter('the_content','page_read_more');?>
								<?php add_filter('the_content', 'big_first_char', 5); ?>
								<?php the_content(); ?>
								<p><a href="<?php the_permalink();?>" class="more-link"><?php printf ( __( 'Read more' , 'rayoflight' ));?></a></p>
								
							
								
				
								<?php endwhile; else: ?>
								<p><?php printf ( __( 'No posts where found' , 'rayoflight' ));?></p>
								<?php endif; ?>
								
							<!-- END .homepage-about -->
							</div>	
									
						</div>
				<!-- END .block-2 -->
				</div>
							
							<?php $more = true; ?>
							
							<!-- BEGIN .block-1 -->
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Homepage footer") ) : ?>
								<?php endif; ?>
							<!-- END .block-1 -->
							

						<!-- END .homepage-footer -->
						</div>
						
						<?php } ?>
						
					<!-- END .homepage-wrapper -->
					</div>

				<!-- END .content -->
				</div>
			<!-- END .content-wrapper -->
			</div>
			<?php get_footer(); ?>