<?php
/*
Template Name: Full Width Page
*/
?>
<?php get_header(); ?>
<?php include (THEME_INCLUDES . '/top.php'); ?>

<!-- BEGIN .content-wrapper -->
<div class="content-wrapper">

	<!-- BEGIN .content -->
	<div class="content">
		
		<!-- BEGIN .full-width-wrapper -->
		<div class="full-width-wrapper">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<!-- BEGIN .title -->
			<div class="full-width-title">
				<a href="<?php echo home_url(); ?>" class="back"><b><?php printf ( __( 'back to Homepage' , 'rayoflight' ));?></b></a>
				<h2><?php the_title();?></h2>
			<!-- END .title -->	
			</div>
			
				
				<?php if(get_option("theme_show_single_thumb") == "on") { add_filter('the_content', 'add_image_thumb'); }?>
				<?php add_filter('the_content', 'wrap_img_tags'); ?>
				<?php add_filter('the_content', 'big_first_char', 5); ?>
				<?php the_content(); ?>
				<?php remove_filter('the_content', 'add_image_thumb'); ?>
			
			<?php endwhile; else: ?>
			<p><?php printf ( __( 'Sorry, no posts matched your criteria.' , 'rayoflight' ));?></p>
			<?php endif; ?>
		</div>
		<!-- END .full-width-wrapper -->
	
	</div>
	<!-- END .content -->
	
	</div>
	<!-- END .content-wrapper -->
	
	
</div>

<?php get_footer(); ?>