							<!-- BEGIN .theme_page_settings -->
							<div id="theme_page_settings">
								<form method="post" action=""  id="page_settings">
									<input type="hidden" name="action" value="page_settings"/>
									<table>
										<tr class="item">
											<td colspan="2">
												<div>
													<p class="label-wide"><b>Set up Your Homepage and post page!</b></p>
												</div>
												<div>
													<?php
														$homepage = get_option('show_on_front');
														$meta = get_post_custom_values("_wp_page_template",get_option( 'page_on_front'));
														if($homepage == "page" && $meta[0] == "template-homepage.php") { $has_homepage=true; } else { $has_homepage=false; }
														if($has_homepage) {
															?>
															<ul style="margin:0 0 0 33px;">
																<li>Front page: <a href="<?php echo get_permalink(get_option( 'page_on_front')); ?>"><?php echo get_the_title(get_option( 'page_on_front')); ?></a></li>
																<li>Blog page: <a href="<?php echo get_permalink(get_option( 'page_for_posts')); ?>"><?php echo get_the_title(get_option( 'page_for_posts')); ?></a></li>
															</ul>
															<?php
														}
														elseif($homepage == "page") {
															?>
															<div class="element">
																<div class="content">
																	<div class="text">
															<p><b>You have not selected the correct template page for homepage.</b></p>
															<p>Please make sure, you choose template "Homepage".</p>
															<br/>
															<ul>
																<li>Current front page: <a href="<?php echo get_permalink(get_option( 'page_on_front')); ?>"><?php echo get_the_title(get_option( 'page_on_front')); ?></a></li>
																<li>Current blog page: <a href="<?php echo get_permalink(get_option( 'page_for_posts')); ?>"><?php echo get_the_title(get_option( 'page_for_posts')); ?></a></li>
															</ul>
																	</div>
																</div>
															</div>
															<?php
															} else {
															?>
															<div class="element">
																<div class="content">
																	<div class="text">
																		<p><b>You have NOT enabled homepage.</b></p>
																		<p>To use custom homepage, you must first create two <a href="<?php  echo home_url();?>/wp-admin/post-new.php?post_type=page">new pages</a>, and one of them assign to "<b>Homepage</b>" template. Give each page a title, but avoid adding any text.</p>
																		<p>Then enable homepage  in <a href="<?php  echo home_url();?>/wp-admin/options-reading.php">wordpress reading settings</a> (See "Front page displays" option). Select your previously created pages from both dropdowns and save changes.</p>
																	</div>
																</div>
															</div>
															<?php
															}
															?>
												</div>
	
											</td>
										</tr>
										
										<tr class="item">
											<td class="label">
												<span>Add logo image</span>
												<a href="#" class="info"><img src="<?php echo THEME_IMAGE_URL; ?>control-panel-images/ico-info-1.png" alt="" width="10" height="11" /></a>
													<?php echo orange_themes_info_message("Suggested image size is 258x55px");?>

											</td>
											<td class="setting">
												<?php
													$theme_logo = get_option("theme_logo");
												?>
												<input class="upload input-text-2" type="text" name="logo_upload" id="logo_upload" value="<?php echo $theme_logo;?>" />
												<div id="logo_upload_button" class="upload-button upload-logo" style="padding: 10px 0 0 15px;"><a><img src="<?php echo THEME_IMAGE_CPANEL_URL;?>browse-1.png"/></a></div>
												<script type="text/javascript">
													jQuery(document).ready(function($){ rayoflight.loadUploader(jQuery("div#logo_upload_button"), "<?php echo THEME_FUNCTIONS_URL;?>upload-handler.php", "<?php echo THEME_UPLOADS_URL;?>");});
												</script>
											
											</td>
										</tr>
										<tr class="item">
											<td class="label">Use cufon</td>
											<td class="setting">
												<?php
												
													$cufon = get_option("".$theme_name."_cufon");
												?>
												<input type="checkbox" name="cufon" class="styled" value="on" <?php if($cufon == "on") { echo 'checked="yes"'; } ?>/>
											</td>
										</tr>
										<tr class="item">
											<td class="label">Show Rosary</td>
											<td class="setting">
												<?php
													$rosary = get_option("".$theme_name."_rosary");
												?>
												<input type="checkbox" name="rosary" class="styled" value="on" <?php if($rosary == "on") { echo 'checked="yes"'; } ?>/>
											</td>
										</tr>
										<tr class="item">
											<td class="label">Show Cross Hills</td>
											<td class="setting">
												<?php
													$cross_hill = get_option("".$theme_name."_cross_hill");
												?>
												<input type="checkbox" name="cross_hill" class="styled" value="on" <?php if($cross_hill == "on") { echo 'checked="yes"'; } ?>/>
											</td>
										</tr>
										<tr class="item last">
											<td class="label"></td>
											<td class="setting"><p><a href="javascript:{}" onclick="document.getElementById('page_settings').submit(); return false;" class="btn-2"><span>Save Changes</span></a></p></td>
										</tr>
										
									</table>
								</form>
								
							<!-- END .theme_page_settings -->	
							</div>