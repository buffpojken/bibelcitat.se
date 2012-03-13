
 <script type="text/javascript" src="<?php echo THEME_JS_URL;?>jquery-ui-1.7.1.custom.min.js"></script>
 <script type="text/javascript">
$(document).ready(function(){ 


	$(function() {
		$(".settings ul").sortable({ opacity: 0.6, cursor: 'move', update: function() {
			var order = $(this).sortable("serialize") + '&action=update_slider';
			$.post("<?php echo admin_url("admin-ajax.php");?>", order, function(theResponse){
				$("#contentRight").html(theResponse);
			});
		}
		});
	});


});

</script> 

<!-- BEGIN .theme_homepage_slider_setting -->
							<div id="theme_homepage_slider_settings">
									<form method="post" action=""  id="homepage_slider_setting">
									<input type="hidden" name="action" value="homepage_slider_setting"/>
									<table>
									<?php
										$homepage_slider_radio = get_option("".$theme_name."_homepage_slider");
										$homepage_image = get_option("".$theme_name."_homepage_image");
										if($has_homepage) {
									?>
										<tr class="item">
										<?php if($homepage_slider_radio=="on") { ?>
											<td colspan="2">
												<div class="label">
													<span><b>Homepage slide sequence</b></span><a href="#" class="info"><img src="<?php echo THEME_IMAGE_URL; ?>control-panel-images/ico-info-1.png" alt="" width="10" height="11" /></a>
													<?php echo orange_themes_info_message("To sort the slides just drag and drop them!");?>

																	
												</div>
												<?php 
													$cat = get_option("".$theme_name."_homepage_slider_cat");
													$my_query = new WP_Query('cat='.$cat.'&showposts=5&orderby=menu_order&order=ASC');
													
												?>
												<div class="settings">
													<ul>
													<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
													<?php $image = get_post_thumb($post->ID,45,45,''.$theme_name.'_slider_image'); ?>
													<li id="recordsArray_<?php the_ID(); ?>">
														<div class="element last">
															<div class="content">
																<div class="image">
																	<a href="<?php the_permalink();?>"><img src="<?php echo $image['src']; ?>" alt="<?php the_title(); ?>" width="45" height="45" /></a>
																</div>
																<div class="text">
																	<p><b>Title:</b><?php the_title(); ?></p>
																	<p><b>Excerpt:</b><?php the_excerpt(); ?></p>
																</div>
															</div>
														</div>
													</li>
													<?php endwhile; else: ?>
													<?php endif; ?>			
													</ul>
												</div>
												
											</td>
										<?php } ?>
										</tr>
										<tr class="item">
											<td colspan="2">
												<div>
													<p class="label"><b>Custom Homepage slider</b></p>
												</div>
												<div>
													<p class="label"><span>Enable slider:</span></p>
													<div class="setting">
														 
														<input type="radio" name="homepage_slider" id="homepage_slider_radio_1" value="on" <?php if($homepage_slider_radio == "on") { echo 'checked="yes"'; } ?> class="styled"/>
													</div>
												</div>
												<div>
													<p class="label"><span>Use single image:</span></p>
													<div class="setting">
														 
														<input type="radio" name="homepage_slider" id="homepage_slider_radio_2" value="single" <?php if($homepage_slider_radio == "single") { echo 'checked="yes"'; } ?> class="styled" />
													</div>
												</div>								
												<div>
													<p class="label"><span>Disable slider:</span></p>
													<div class="setting">
														<input type="radio" name="homepage_slider" id="homepage_slider_radio_3" value="off" <?php if($homepage_slider_radio == "off") { echo 'checked="yes"'; } ?> class="styled" />
													</div>
												</div>	
											</td>
										</tr>												
												<?php if($homepage_slider_radio=="single") { ?>

										<tr class="item">
											<td colspan="2">
												<div>
													<p class="label"><b>Set Up The Image</b></p>
												</div>
												<div>
													<p class="label"><span>Url:</span></p>
													<div class="setting">
														<input class="upload input-text-2" type="text" name="homepage_image" id="homepage_image" value="<?php echo $homepage_image;?>" />
														<div id="homepage_image_button" class="upload-button upload-logo" style="padding: 10px 0 0 15px;"><a><img src="<?php echo THEME_IMAGE_CPANEL_URL;?>browse-1.png"/></a></div>
														<script type="text/javascript">
															jQuery(document).ready(function($){ rayoflight.loadUploader(jQuery("div#homepage_image_button"), "<?php echo THEME_FUNCTIONS_URL;?>upload-handler.php", "<?php echo THEME_UPLOADS_URL;?>");});
														</script>														</div>
												</div>
												<?php } ?>
											</td>
										</tr>
												<?php } else { ?>	

										<tr class="item">
											<td colspan="2">
												<div class="element">
													<div class="content">
														<div class="text">
															<p><b>You have NOT enabled homepage.</b></p>
															<p>To use homepage slider, you must first create two <a href="<?php  echo home_url();?>/wp-admin/post-new.php?post_type=page">new pages</a>, and one of them assign to "<b>Homepage</b>" template. Give each page a title, but avoid adding any text.</p>
															<p>Then enable homepage in <a href="<?php  echo home_url();?>/wp-admin/options-reading.php">wordpress reading settings</a> (See "Front page displays" option). Select your previously created pages from both dropdowns and save changes.</p>
														</div>
													</div>
												</div>
											</td>
										</tr>
												<?php } ?>

										<?php if($homepage_slider_radio == "on") { ?>
										<tr class="item">
											<td class="label">Show "Featured" tag</td>
											<td class="setting">
												<?php $show_featured_tag = get_option("".$theme_name."_show_featured_tag"); ?>
												<input type="checkbox" name="show_featured_tag" class="styled" value="on" <?php if($show_featured_tag == "on") { echo 'checked="yes"'; } ?>/>
											</td>
										</tr>
										<tr class="item">
											<td colspan="2">
												<div>
													<p class="label"><b>Slider Category</b></p>
												</div>
												
												<div style="margin-left:33px;">
													<?php
													global $wpdb;
													$cat = intval(get_option(''.$theme_name.'_homepage_slider_cat'));
													$table = $wpdb->prefix."term_taxonomy";
													$table2 = $wpdb->prefix."terms";
													$data = $wpdb->get_results("SELECT tt.term_id, t.name FROM $table as tt, $table2 as t WHERE tt.taxonomy = 'category' AND tt.term_id = t.term_id");
													$b_cat = intval(get_option(''.$theme_name.'_slider_cat'));
													if(count($data) > 0)
													{
														?>
														<select name="homepage_slider_cat" class="styled">
															<?php
															foreach($data as $d)
															{
																if($b_cat!=$d->term_id) { ?><option value="<?php echo $d->term_id;?>" <?php if($cat==$d->term_id) echo 'SELECTED';?>><?php echo $d->name;?></option><?php }
															}
															?>
														</select>
														<?php
													}
													?>
													<br/><br/>
													Select post category, that contains posts you wish to show in the homepage. It might be a good idea, to create a new specialized category for this purpose. Only the 5 latest posts will be shown.
													
												</div>
											</td>
										</tr>
										
										
										<?php } ?>
										<?php if($has_homepage) { ?>
										<tr class="item last">
											<td class="label"></td>
											<td class="setting"><p><a href="javascript:{}" onclick="document.getElementById('homepage_slider_setting').submit(); return false;" class="btn-2"><span>Save Changes</span></a></p></td>
										</tr>
										<?php } ?>
									</table>
								</form>	
								
							<!-- END .theme_homepage_slider_settings -->
							</div>