<?php
/* Template Name: Ray Of Light Gallery */
?>
<?php get_header(); ?>
<?php include (THEME_INCLUDES . '/top.php'); ?>
<!-- BEGIN .content-wrapper -->
<div class="content-wrapper">
			
	<!-- BEGIN .content -->
	<div class="content">
		<!-- BEGIN .gallery -->
		<div class="gallery">

			<!-- BEGIN .title -->
			<div class="full-width-title">
				<a href="<?php echo home_url(); ?>" class="back"><b><?php printf ( __( 'back to Homepage' , 'rayoflight' ));?></b></a>
				<h2><a href="<?php echo get_page_link(get_gallery_page());?>"><?php printf ( __( 'Photo Gallery' , 'rayoflight' ));?></a></h2>
			<!-- END .title -->	
			</div>
			
			<!-- BEGIN .gallery-left-side -->
			<div class="gallery-left-side">				
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php 
					$g = get_the_ID();
					global $query_string;
					$query_vars = explode('&',$query_string);
					foreach($query_vars as $key) {
						if(strpos($key,'page=') !== false) {
							$i = substr($key,8,12);
							break;
						}
					}
					
					if($i == 0) $i=0;
								
					$gallery_page = get_option("theme_gallery_page");
					$page = get_post($gallery_page);
					$gallery_slug = $page->post_name;
					
					$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $g, 'order'=> 'ASC' ); 
					$attachments = get_posts($args);
					if ($attachments) {
						$file = $attachments[$i]->guid;
						$count = count($attachments);
					
					?>
						<!-- BEGIN .title -->
						<div class="open-title">
							<h1><?php the_title();?></h1>
						<!-- END .title -->
						</div>

						<!-- BEGIN .open-navigation -->
						<div class="open-navigation">
							<a href="<?php the_permalink(); if($i> 0) {echo $i-1;} elseif($i!=0) {echo $i;} ?>" class="btn-1 btn-align-left btn-previous"><i>&nbsp;</i><b><span><?php printf ( __( 'Previous photo' , 'rayoflight' ));?></span></b><u>&nbsp;</u></a>
							<a href="<?php the_permalink(); if($i+1 < $count) {echo $i + 1;} elseif($i!=0) {echo $i;} ?>" class="btn-1 btn-align-left btn-next"><i>&nbsp;</i><b><span><?php printf ( __( 'Next photo' , 'rayoflight' ));?></span></b><u>&nbsp;</u></a>
							<div>
							
								<a href="<?php echo get_page_link(get_gallery_page());?>" class="allgalleries"><?php printf ( __( 'show all photo galleries' , 'rayoflight' ));?></a>
							</div>
						<!-- END .open-navigation -->
						</div>
					
						<!-- BEGIN .open-image -->
						<table class="open-image">
							<tr>
								<td>
									<a href="<?php the_permalink(); if($i+1 < $count) {echo $i + 1;} elseif($i!=0) {echo $i;} ?>"><img src="<?php echo bloginfo('template_url'); ?>/timthumb.php?src=/<?php
						$imgs = explode("/wp-content/", $file); echo "wp-content/".$imgs[1];?>&amp;w=620&amp;h=404&amp;zc=1&amp;q=100" alt="<?php the_title();?>" /></a>
								</td>
							</tr>
						<!-- END .open-image -->
						</table>
						
						<!-- BEGIN .open-navigation -->
						<div class="open-navigation">
							<a href="<?php the_permalink(); if($i> 0) {echo $i-1;} elseif($i!=0) {echo $i;} ?>" class="btn-1 btn-align-left btn-previous"><i>&nbsp;</i><b><span><?php printf ( __( 'Previous photo' , 'rayoflight' ));?></span></b><u>&nbsp;</u></a>
							<a href="<?php the_permalink(); if($i+1 < $count) {echo $i + 1;} elseif($i!=0) {echo $i;} ?>" class="btn-1 btn-align-left btn-next"><i>&nbsp;</i><b><span><?php printf ( __( 'Next photo' , 'rayoflight' ));?></span></b><u>&nbsp;</u></a>
							<div>
								<s><?php printf ( __( 'Author' , 'rayoflight' ));?> <b><?php the_author(); ?></b>, <?php the_date("d.m.Y, H:i",'','');?></s>
							</div>
						<!-- END .open-navigation -->
						</div>
						<?php if (get_the_content() != "") { ?>
						<!-- BEGIN .open-description -->
						<div class="open-description">
								<?php
									add_filter('the_content','remove_images');
									add_filter('the_content','remove_objects');
									the_content();
								?>
						<!-- END .open-description -->
						</div>
						<?php } ?>
						
						<?php } else {
							echo ( __( 'This gallery has no pictures!' , 'rayoflight' ));
						} ?>	
						
						<!-- BEGIN .open-thumbnails -->
						<div class="open-thumbnails">
							<ul>
							<?php
							$c=0;
							foreach($attachments as $attachment)
							{
								$file = $attachment->guid;
								?>
									<li <?php if($c == $i) echo "class=\"active\""; ?>>
										<a href="<?php the_permalink(); echo $c.'/'; ?>"></a>
										<img src="<?php echo bloginfo('template_url'); ?>/timthumb.php?src=/<?php
							$imgs = explode("/wp-content/", $file); echo "wp-content/".$imgs[1];?>&amp;w=80&amp;h=80&amp;zc=1&amp;q=100" alt="<?php the_title();?>"/>
									</li>
								<?php
								$c++;
							}
							?>
							</ul>
						<!-- END .open-thumbnails -->
						</div>		
						

					
					<?php endwhile; ?>
					<?php endif;?>
			<!-- END .gallery-left-side -->
			</div>
			
			<!-- BEGIN .gallery-right-side -->
			<div class="gallery-right-side">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Gallery") ) : ?>
				<?php endif; ?>
			<!-- END .gallery-right-side -->
			</div>
		<!-- END .gallery -->	
		</div>
	<!-- END .content -->
	</div>	
<!-- END .content-wrapper -->
</div>
<?php get_footer(); ?>