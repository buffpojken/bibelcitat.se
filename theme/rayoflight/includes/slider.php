<!-- BEGIN .top-stories-slider -->
<div class="top-stories-slider">

	<?php $important_tag = get_option("theme_important_tag");
	if($important_tag == "on") { ?>
		<span class="tag">&nbsp;</span>
	<?php } ?>
	<span class="rounded-corners">&nbsp;</span>
	<div id="aktuals_field" style="overflow:hidden; position: relative;" onmouseover="set_hover_on()" onmouseout="set_hover_off()">
	<table>
		<tr>		
			<?php 
			global $post;
			$cat = get_option("".$theme_name."_slider_cat");
			$my_query = new WP_Query('cat='.$cat.'&showposts=5&orderby=menu_order&order=ASC');
			$counter=1;
			?>
			<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
				<td>
					<!-- BEGIN .top-stories-item -->
					<?php
						$image = get_post_thumb($post->ID,587,235,"slider");
					?>
					<div class="top-stories-item" id="aktuals<?php echo $counter;?>" style="background: url(<?php echo $image['src']; ?>) 0 0 no-repeat;">
							<p><a class="title" href="<?php the_permalink();?>"><?php the_title(); ?></a></p>
							<p><a class="description" href="#" ><?php the_content_rss('', TRUE, '', 12); ?></a></p>
					<!-- END .top-stories-item -->
					</div>
				</td>
			<?php $counter = $counter+1; ?>
			<?php endwhile; else: ?>
			<?php endif; ?>	
		</tr>
	</table>

	</div>
		<!-- BEGIN .top-stories-slider-image-shadow -->
		<div class="top-stories-slider-image-shadow">
		&nbsp;
		<!-- END .top-stories-slider-image-shadow -->
		</div>
	<div class="navigation" onmouseover="set_hover_on()" onmouseout="set_hover_off()">
					<a href="#" class="previous" onmouseover="set_hover_on();" onmouseout="set_hover_off();" onclick="scrollLefty(); return false;"></a>
					<a href="#" id="aktuals1_btn" onclick="scrollToElem(1); return false;" class="active"></a>
					<a href="#" id="aktuals2_btn" onclick="scrollToElem(2); return false;"></a>
					<a href="#" id="aktuals3_btn" onclick="scrollToElem(3); return false;"></a>
					<a href="#" id="aktuals4_btn" onclick="scrollToElem(4); return false;"></a>
					<a href="#" id="aktuals5_btn" onclick="scrollToElem(5); return false;"></a>
					<a href="#" class="next" onmouseover="set_hover_on();" onmouseout="set_hover_off();" onclick="scrollRight(); return false;"></a>
	</div>

<!-- END .top-stories-slider -->
</div>