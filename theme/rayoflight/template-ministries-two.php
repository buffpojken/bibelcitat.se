<?php
/*
Template Name: Ministries Two Columns
*/	
?>
<?php
get_header();
include (THEME_INCLUDES . '/top.php');
?>

			<!-- BEGIN .content-wrapper -->
			<div class="content-wrapper">
			
				<!-- BEGIN .content -->
				<div class="content">
				
					
					<!-- BEGIN .full-width-wrapper -->
					<div class="full-width-wrapper">
					
						<!-- BEGIN .title -->
						<div class="full-width-title">
							<a href="<?php echo home_url(); ?>" class="back"><b><?php printf ( __( 'back to Homepage' , 'rayoflight' ));?></b></a>
							<h2><?php the_title();?></h2>
						<!-- END .title -->	
						</div>
						
						
						<!-- BEGIN .ministries-wrapper -->
						<div class="ministries-wrapper ministries-two">
							<ul>
								<?php 
									$paged = get_query_string_paged();
									$counter = 1;
									$posts_per_page = get_option('theme_show_ministries_items');
									if($posts_per_page == "") {
										$posts_per_page = get_option('posts_per_page');
									}
									$my_query = new WP_Query(array('post_type' => 'ministries', 'paged' => $paged, 'posts_per_page' => $posts_per_page));
									$num_of_posts = $my_query->post_count;
									if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
									<?php $image = get_post_thumb($post->ID,435,250); ?>
									<li class="image">
										<a href="<?php the_permalink();?>"><img src="<?php echo $image['src'];?>" alt="<?php the_title();?>" /></a>
										<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
										<?php
											global $more;    // Declare global $more (before the loop).
											$more = 0;       // Set (inside the loop) to display content above the more tag.
										?>
										<?php add_filter('the_content', 'remove_images'); ?>
										<?php add_filter('the_content', 'remove_objects'); ?>
										<?php add_filter('the_content', 'blog_read_more'); ?>
										<?php the_content(__('Read More','rayoflight')); ?>
										<?php remove_filter('the_content', 'blog_read_more'); ?>
									</li>
									
									<?php if($counter%2 == 0 && $counter!=$posts_per_page && $counter!=$num_of_posts) { ?>
										<li class="spacer">&nbsp;</li>
									<?php } ?>
									<?php $counter++;?>
									
								<?php endwhile; else: ?>
								<?php endif; ?>	
							</ul>
						<!-- END .ministries-wrapper -->
						</div>
						
						<!-- BEGIN .pages -->
						<div class="pages">
							<?php gallery_nav_btns($paged, $my_query->max_num_pages); ?>
						<!-- END .pages -->
						</div>
						
					<!-- END .full-width-wrapper -->
					</div>


				<!-- END .content -->
				</div>
				
			<!-- END .content-wrapper -->
			</div>

<?php
get_footer();
?>