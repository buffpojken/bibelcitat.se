
							<!-- BEGIN .theme_homepage_settings -->	
							<div id="theme_homepage_settings">
								<form method="post" action="" id="homepage_settings">
									<input type="hidden" name="action" value="homepage_settings"/>
									<table>
									
										<tr class="item">
											<td colspan="2">
												<div>
													<p class="label"><b>Homepage info blocks</b></p>
												</div>
												<?php
												
													$homepage_infoblocks_enabled = get_option("".$theme_name."_homepage_infoblocks_enabled");
													
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
												<div>
													<p class="label"><span>Enable info blocks:</span></p>
													<div class="setting">
														<input type="checkbox" name="homepage_enable_infoblocks" class="styled"  <?php if($homepage_infoblocks_enabled == "on") { echo 'checked="yes"'; } ?>/>
													</div>
												</div>
												
											</td>
										</tr>
										<?php if($homepage_infoblocks_enabled == "on") { ?>
										<tr class="item">
											<td colspan="2">
												<div>
													<p class="label"><b>Text block 1</b></p>
												</div>
												
												<div>
													<p class="label"><span>Title:</span></p>
													<div class="setting">
														<span class="input-text-1"><input type="text" name="ib1_title" value="<?php echo $ib1_title;?>" style="width: 261px;" /></span>
													</div>
												</div>
												
												<div>
													<p class="label"><span>Img URL:</span></p>
													<div class="setting">
														<input class="upload input-text-2" type="text" name="ib1_image" id="ib1_image" value="<?php echo $ib1_image;?>" />
														<div id="ib1_image_button" class="upload-button upload-logo" style="padding: 10px 0 0 15px;"><a><img src="<?php echo THEME_IMAGE_CPANEL_URL;?>browse-1.png"/></a></div>
														<script type="text/javascript">
															jQuery(document).ready(function($){ rayoflight.loadUploader(jQuery("div#ib1_image_button"), "<?php echo THEME_FUNCTIONS_URL;?>upload-handler.php", "<?php echo THEME_UPLOADS_URL;?>");});
														</script>	
													</div>
												</div>
												
												<div>
													<p class="label"><span>Read More URL:</span></p>
													<div class="setting">
														<span class="input-text-1"><input type="text" name="ib1_url" value="<?php echo $ib1_url;?>" style="width: 261px;" /></span>
													</div>
												</div>
												
												<div>
													<p class="label"><span>Text:</span></p>
													<div class="setting">
														<textarea name="ib1_text" class="text-area-1"><?php echo $ib1_text;?></textarea>
													</div>
												</div>												

											</td>
										</tr>	
										
										<tr class="item">
											<td colspan="2">
												<div>
													<p class="label"><b>Text block 2</b></p>
												</div>
												
												<div>
													<p class="label"><span>Title:</span></p>
													<div class="setting">
														<span class="input-text-1"><input type="text" name="ib2_title" value="<?php echo $ib2_title;?>" style="width: 261px;" /></span>
													</div>
												</div>
												
												<div>
													<p class="label"><span>Img URL:</span></p>
													<div class="setting">
														<input class="upload input-text-2" type="text" name="ib2_image" id="ib2_image" value="<?php echo $ib2_image;?>" />
														<div id="ib2_image_button" class="upload-button upload-logo" style="padding: 10px 0 0 15px;"><a><img src="<?php echo THEME_IMAGE_CPANEL_URL;?>browse-1.png"/></a></div>
														<script type="text/javascript">
															jQuery(document).ready(function($){ rayoflight.loadUploader(jQuery("div#ib2_image_button"), "<?php echo THEME_FUNCTIONS_URL;?>upload-handler.php", "<?php echo THEME_UPLOADS_URL;?>");});
														</script>	
													</div>
												</div>
												
												<div>
													<p class="label"><span>Read More URL:</span></p>
													<div class="setting">
														<span class="input-text-1"><input type="text" name="ib2_url" value="<?php echo $ib2_url;?>" style="width: 261px;" /></span>
													</div>
												</div>
												
												<div>
													<p class="label"><span>Text:</span></p>
													<div class="setting">
														<textarea name="ib2_text" class="text-area-1"><?php echo $ib2_text;?></textarea>
													</div>
												</div>												

											</td>
										</tr>	
										
										<tr class="item">
											<td colspan="2">
												<div>
													<p class="label"><b>Text block 3</b></p>
												</div>
												
												<div>
													<p class="label"><span>Title:</span></p>
													<div class="setting">
														<span class="input-text-1"><input type="text" name="ib3_title" value="<?php echo $ib3_title;?>" style="width: 261px;" /></span>
													</div>
												</div>
												
												<div>
													<p class="label"><span>Img URL:</span></p>
													<div class="setting">
														<input class="upload input-text-2" type="text" name="ib3_image" id="ib3_image" value="<?php echo $ib3_image;?>" />
														<div id="ib3_image_button" class="upload-button upload-logo" style="padding: 10px 0 0 15px;"><a><img src="<?php echo THEME_IMAGE_CPANEL_URL;?>browse-1.png"/></a></div>
														<script type="text/javascript">
															jQuery(document).ready(function($){ rayoflight.loadUploader(jQuery("div#ib3_image_button"), "<?php echo THEME_FUNCTIONS_URL;?>upload-handler.php", "<?php echo THEME_UPLOADS_URL;?>");});
														</script>	
													</div>
												</div>
												
												<div>
													<p class="label"><span>Read More URL:</span></p>
													<div class="setting">
														<span class="input-text-1"><input type="text" name="ib3_url" value="<?php echo $ib3_url;?>" style="width: 261px;" /></span>
													</div>
												</div>
												
												<div>
													<p class="label"><span>Text:</span></p>
													<div class="setting">
														<textarea name="ib3_text" class="text-area-1"><?php echo $ib3_text;?></textarea>
													</div>
												</div>												

											</td>
										</tr>
										<tr class="item">
											<td colspan="2">
												<div>
													<p class="label"><b>Text block 4</b></p>
												</div>
												
												<div>
													<p class="label"><span>Title:</span></p>
													<div class="setting">
														<span class="input-text-1"><input type="text" name="ib4_title" value="<?php echo $ib4_title;?>" style="width: 261px;" /></span>
													</div>
												</div>
												
												<div>
													<p class="label"><span>Img URL:</span></p>
													<div class="setting">
														<input class="upload input-text-2" type="text" name="ib4_image" id="ib4_image" value="<?php echo $ib4_image;?>" />
														<div id="ib4_image_button" class="upload-button upload-logo" style="padding: 10px 0 0 15px;"><a><img src="<?php echo THEME_IMAGE_CPANEL_URL;?>browse-1.png"/></a></div>
														<script type="text/javascript">
															jQuery(document).ready(function($){ rayoflight.loadUploader(jQuery("div#ib4_image_button"), "<?php echo THEME_FUNCTIONS_URL;?>upload-handler.php", "<?php echo THEME_UPLOADS_URL;?>");});
														</script>	
													</div>
												</div>
												
												<div>
													<p class="label"><span>Read More URL:</span></p>
													<div class="setting">
														<span class="input-text-1"><input type="text" name="ib4_url" value="<?php echo $ib4_url;?>" style="width: 261px;" /></span>
													</div>
												</div>
												
												<div>
													<p class="label"><span>Text:</span></p>
													<div class="setting">
														<textarea name="ib4_text" class="text-area-1"><?php echo $ib4_text;?></textarea>
													</div>
												</div>												

											</td>
										</tr>	
										<?php } ?>
										
										<tr class="item">
											<?php
												$homepage_footer = get_option("".$theme_name."_homepage_footer");
												$homepage_enable_popular_offerings = get_option("".$theme_name."_homepage_enable_popular_offerings");
												$footer_post = get_option("".$theme_name."_homepage_footer_post");
											?>
											<td colspan="2">
												<div>
													<p class="label"><b>Homepage info block</b></p>
												</div>
												
												<div>
													<p class="label"><span>Enable homepage info block:</span></p>
													<div class="setting">
														<input type="checkbox" name="homepage_enable_footer" class="styled" <?php if($homepage_footer == "on") { echo 'checked="yes"'; } ?>/>
													</div>
												</div>
												
												<?php if($homepage_footer == "on") { ?>

													
														<div style="margin-left:33px;">
														<p style="margin-bottom:15px;">Select "about" page you want to connect to homepage info block.</p>
														
														<select name="homepage_footer_post" class="styled">
															<?php 
																$pages = get_pages(); 
																foreach ($pages as $pagg) {
																$option = '<option value="'.$pagg->ID.'"';
																if($pagg->ID == $footer_post) { $option .= ' selected="selected" >'; } else { $option .= '>';} 
																$option .= $pagg->post_title;
																$option .= '</option>';
																echo $option;
																}
															?>
														</select>
														</div>

												<?php } ?>
											</td>
										</tr>
										

										<tr class="item last">
											<td class="label"></td>
											<td class="setting"><p><a href="javascript:{}" onclick="document.getElementById('homepage_settings').submit(); return false;" class="btn-2"><span>Save Changes</span></a></p></td>
										</tr>
										
									</table>
								</form>
								
							<!-- END .theme_homepage_settings -->	
							</div>