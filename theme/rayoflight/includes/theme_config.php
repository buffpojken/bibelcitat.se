<?php

function orange_themes_css() {
		
		echo '<link rel="stylesheet" href="'.THEME_CSS_URL.'orange-themes-control-panel.css" type="text/css" />';
		wp_enqueue_script('jquery');
		if($_GET['page']=="theme-configuration") {
			echo '<script src="'.THEME_JS_URL.'jquery.min.js" type="text/javascript"></script>';
			echo '<script src="'.THEME_JS_URL.'custom-form-elements.js" type="text/javascript"></script>'; 
			

		}
		echo '<script src="'.THEME_JS_URL.'options.js" type="text/javascript"></script>';
		echo '<script src="'.THEME_JS_URL.'ajaxupload.js" type="text/javascript"></script>';
		
		if(isset($_GET["page"]) && $_GET["page"]=="other-themes") {
			echo '<link rel="stylesheet" href="'.THEME_CSS_URL.'more-themes.css" type="text/css" />';
		}

	}

add_action('admin_head', 'orange_themes_css');

function wp_register_theme_activation_hook($code, $function) {
    $optionKey="theme_is_activated_" . $code;
    if(!get_option($optionKey)) {
        call_user_func($function);
        update_option($optionKey , 1);
    }
}

function wp_register_theme_deactivation_hook($code, $function) {
    $GLOBALS["wp_register_theme_deactivation_hook_function" . $code]=$function;
 
    $fn=create_function('$theme', ' call_user_func($GLOBALS["wp_register_theme_deactivation_hook_function' . $code . '"]); delete_option("theme_is_activated_' . $code. '");');

    add_action("switch_theme", $fn);
}

function ray_of_light_activate() {
 
 		global $wpdb;
		
		add_option("theme_footer_text","This is a sample text, which you can replace in theme configuration panel");
		$theme_logo = get_bloginfo('template_url')."/images/logo-rayoflight-1.png";
		add_option("theme_logo",$theme_logo);
		add_option("theme_cufon","on");
		add_option("theme_cross_hill","on");
		add_option("theme_rosary","on");


 }
  
function orange_themes_follow() {
		echo "<!-- BEGIN .follow -->";
		echo "<div class=\"follow\">";
			echo "<p>Follow Orange Themes</p>";
			echo "<a href=\"http://themeforest.net/user/orange-themes?ref=orange-themes\" class=\"themeforest\" target=\"blank\">Theme Forest</a>";
			echo "<a href=\"http://twitter.com/#!/orangethemes\" class=\"twitter\" target=\"blank\">Twitter</a>";
			echo "<a href=\"http://www.orange-themes.com/\" class=\"orangethemes\" target=\"blank\">Orange-Themes.com</a>";
		echo "<!-- END .follow -->";
		echo "</div>";
}	
	
function orange_themes_info_message($content) {
		echo "<table class=\"popup-help popup-help-hidden\">";
			echo "<tr><td class=\"tl\"></td><td class=\"tm\"></td><td class=\"tr\"><a class=\"close\"></a></td></tr>";
				echo "<tr>";
					echo "<td class=\"ml\"></td>";
					echo "<td class=\"mm\">";

						echo "<p>".$content."</p>";
					echo "</td>";
					echo "<td class=\"mr\"></td>";
				echo "</tr>";
			echo "<tr><td class=\"bl\"></td><td class=\"bm\"></td><td class=\"br\"></td></tr>";
	echo "</table>";
}
	
 wp_register_theme_activation_hook('ray_of_light', 'ray_of_light_activate');



add_action('admin_menu', 'theme_menu');

function theme_menu() {
	add_menu_page('Ray Of Light Management', 'Ray Of Light Management', 'administrator', 'theme-configuration', 'theme_configuration',get_template_directory_uri().'/images/control-panel-images/logo-orangethemes-1.png');

}

function theme_configuration() {
	global $theme_name;
	$pageURL= 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["SCRIPT_NAME"];

	$action = $_POST['action'];

	//////Theme General Settings//////
	
	if($action == "page_settings") 
	{
		//add theme logo
		$theme_logo = $_POST["logo_upload"];
		if($theme_logo) {
			update_option("".$theme_name."_logo",$theme_logo);
		}
		else delete_option("".$theme_name."_logo");
	
		//cufon settings
		$cufon = $_POST["cufon"];
		if($cufon == "on") {
			update_option("".$theme_name."_cufon",$cufon);
		}
		else {
			update_option("".$theme_name."_cufon","off");
		}
		
		
		//rosary settings
		$rosary = $_POST["rosary"];
		if($rosary == "on") {
			update_option("".$theme_name."_rosary",$rosary);
		}
		else {
			update_option("".$theme_name."_rosary","off");
		}
		
		//cross hills settings
		$cross_hill = $_POST["cross_hill"];
		if($cross_hill == "on") {
			update_option("".$theme_name."_cross_hill",$cross_hill);
		}
		else {
			update_option("".$theme_name."_cross_hill","off");
		}
		
		$p = "theme_general_settings";
		$pid = "theme_page_settings";
	
	}
	
	
	//add gallery pages
	if($action == "gallery_settings") 
	{
		$gallery_items = $_POST["show_gallery_items"];
		$ministries_items = $_POST["show_ministries_items"];
		update_option("".$theme_name."_show_gallery_items",$gallery_items);
		update_option("".$theme_name."_show_ministries_items",$ministries_items);

		$p = "theme_general_settings";
		$pid = "theme_gallery_settings";
	}
	
	//Post thumbnails
	if($action == "blog_settings")
	{
		$single_thumb = $_POST["show_single_thumb"];
		$no_image_thumb = $_POST["show_no_image_thumb"];
		$first_thumb = $_POST["show_first_thumb"];
		
		if($first_thumb == "on") {
			update_option("".$theme_name."_show_first_thumb",$first_thumb);
		}
		else {
			update_option("".$theme_name."_show_first_thumb","off");
		}
		
		if($single_thumb == "on") {
			update_option("".$theme_name."_show_single_thumb",$single_thumb);
		}
		else {
			update_option("".$theme_name."_show_single_thumb","off");
		}
		
		if($no_image_thumb == "on") {
			update_option("".$theme_name."_show_no_image_thumb",$no_image_thumb);
		}
		else {
			update_option("".$theme_name."_show_no_image_thumb","off");
		}

		///Post settings
		$show_first_pictures = $_POST["show_first_pictures"];
		$show_first_objects = $_POST["show_first_objects"];
		
		if($show_first_pictures == "on") {
			update_option("".$theme_name."_show_first_pictures",$show_first_pictures);
		}
		else {
			update_option("".$theme_name."_show_first_pictures","off");
		}
		
		if($show_first_objects == "on") {
			update_option("".$theme_name."_show_first_objects",$show_first_objects);
		}
		else {
			update_option("".$theme_name."_show_first_objects","off");
		}
		
		$p = "theme_general_settings";
		$pid = "theme_blog_settings";
	}
	
	if($action == "homepage_settings")  {
		
		///Add info block
		$homepage_infoblocks_enabled = $_POST["homepage_enable_infoblocks"];
		
		if($homepage_infoblocks_enabled == "on") {
			update_option("".$theme_name."_homepage_infoblocks_enabled",$homepage_infoblocks_enabled);
		} else {
			update_option("".$theme_name."_homepage_infoblocks_enabled","off");
		}
		
		if($homepage_infoblocks_enabled == "on" && isset($_POST["ib1_title"])) {
			$ib1_title = $_POST["ib1_title"];
			$ib1_image = $_POST["ib1_image"];
			$ib1_url = $_POST["ib1_url"];
			$ib1_text = $_POST["ib1_text"];
			
			$ib2_title = $_POST["ib2_title"];
			$ib2_image = $_POST["ib2_image"];
			$ib2_url = $_POST["ib2_url"];
			$ib2_text = $_POST["ib2_text"];
			
			$ib3_title = $_POST["ib3_title"];
			$ib3_image = $_POST["ib3_image"];
			$ib3_url = $_POST["ib3_url"];
			$ib3_text = $_POST["ib3_text"];
			
			$ib4_title = $_POST["ib4_title"];
			$ib4_image = $_POST["ib4_image"];
			$ib4_url = $_POST["ib4_url"];
			$ib4_text = $_POST["ib4_text"];
					
			update_option("ib1_title",$ib1_title);
			update_option("ib1_image",$ib1_image);
			update_option("ib1_url",$ib1_url);
			update_option("ib1_text",$ib1_text);
			
			update_option("ib2_title",$ib2_title);
			update_option("ib2_image",$ib2_image);
			update_option("ib2_url",$ib2_url);
			update_option("ib2_text",$ib2_text);
				
			update_option("ib3_title",$ib3_title);
			update_option("ib3_image",$ib3_image);
			update_option("ib3_url",$ib3_url);
			update_option("ib3_text",$ib3_text);	
			
			update_option("ib4_title",$ib4_title);
			update_option("ib4_image",$ib4_image);
			update_option("ib4_url",$ib4_url);
			update_option("ib4_text",$ib4_text);
			
		}
		
		
		///Add hemepage info block
		$homepage_footer = $_POST["homepage_enable_footer"];
		$homepage_footer_post = $_POST["homepage_footer_post"];
		
		if($homepage_footer == "on") {
			update_option("".$theme_name."_homepage_footer",$homepage_footer);
		} else {
			update_option("".$theme_name."_homepage_footer","off");
		}	
		
		if($homepage_footer_post != "") {
			update_option("".$theme_name."_homepage_footer_post",$homepage_footer_post);
		}
		
		$p = "theme_general_settings";
		$pid = "theme_homepage_settings";
	}
	
	if($action == "contact_settings") {
	
		//add share information
		$twitter = $_POST["twitter"];
		$facebook = $_POST["facebook"];
		$digg = $_POST["digg"];
		$rss = $_POST["rss"];
		$rss_icon = $_POST["show_rss_icon"];
				
		update_option("".$theme_name."_twitter_url",$twitter);
		update_option("".$theme_name."_facebook_url",$facebook);
		update_option("".$theme_name."_digg_url",$digg);
		if($rss != get_bloginfo("rss_url")) {
		update_option("".$theme_name."_rss_url",$rss);
		}
		update_option("show_rss_icon",$rss_icon);

		
		//add contacts
		$phone = $_POST["".$theme_name."_phone"];
		$mail = $_POST["".$theme_name."_mail"];

				
		update_option("".$theme_name."_phone",$phone);
		update_option("".$theme_name."_mail",$mail);

		$footer_text = $_POST["footer_text"];
		update_option("".$theme_name."_footer_text",$footer_text);
		
		
		$link_1 = $_POST["link_1"];
		$link_name_1 = $_POST["link_name_1"];
		$link_2 = $_POST["link_2"];
		$link_name_2 = $_POST["link_name_2"];		
		$link_3 = $_POST["link_3"];
		$link_name_3 = $_POST["link_name_3"];			
		$link_4 = $_POST["link_4"];
		$link_name_4 = $_POST["link_name_4"];		

	
		update_option("".$theme_name."_footer_link_1",$link_1);
		update_option("".$theme_name."_footer_link_name_1",$link_name_1);
		update_option("".$theme_name."_footer_link_2",$link_2);
		update_option("".$theme_name."_footer_link_name_2",$link_name_2);
		update_option("".$theme_name."_footer_link_3",$link_3);
		update_option("".$theme_name."_footer_link_name_3",$link_name_3);
		update_option("".$theme_name."_footer_link_4",$link_4);
		update_option("".$theme_name."_footer_link_name_4",$link_name_4);		
		
		$p = "theme_general_settings";
		$pid = "theme_contact_settings";
	
	}
	
	
	//////Theme Slider Settings//////
	if($action == "homepage_slider_setting") {
		
		//Homepage slider settings
		$homepage_slider = $_POST["homepage_slider"];
		if($homepage_slider != "") {
			update_option("".$theme_name."_homepage_slider",$homepage_slider);
		} else {
			update_option("".$theme_name."_homepage_slider","off");
		}
		
		$homepage_slider_cat = $_POST["homepage_slider_cat"];
		if($homepage_slider_cat != "") {
			update_option("".$theme_name."_homepage_slider_cat",$homepage_slider_cat);
		}
		
		$show_featured_tag = $_POST["show_featured_tag"];
		if($show_featured_tag != "" ) {
			update_option("".$theme_name."_show_featured_tag",$show_featured_tag);
		} else {
			update_option("".$theme_name."_show_featured_tag","off");
		}			
		
		//Homepage single image
		$homepage_image=$_POST['homepage_image'];
		update_option("".$theme_name."_homepage_image",$homepage_image);
		
		$p = "theme_slider_settings";
		$pid = "theme_homepage_slider_settings";
	}
	
	// Menu slider settings
	if($action == "blog_slider_settings") {

		$blog_slider = $_POST["blog_slider"];
		if($blog_slider != "") {
			update_option("".$theme_name."_slider_enabled", $blog_slider);
		} else {
			update_option("".$theme_name."_slider_enabled", "off");
		}
		

		$blog_slider_cat = $_POST["blog_slider_cat"];
		if($blog_slider_cat != "") {
			update_option("".$theme_name."_slider_cat",$blog_slider_cat);
		}

		$important_tag = $_POST["important_tag"];
		if($important_tag != "" ) {
			update_option("".$theme_name."_important_tag",$important_tag);
		} else {
			update_option("".$theme_name."_important_tag","off");
		}	
		
		$p = "theme_slider_settings";
		$pid = "theme_blog_slider_settings";
	}	
	





	?>
	
		<script type="text/javascript">
				jQuery(document).ready(function() {
				
				jQuery('.config_tab').click(function() {
				//General menu
					jQuery("#theme_general_settings").hide();
					jQuery("#theme_slider_settings").hide();
					jQuery("#theme_documentation_settings").hide();


				//General menu tabs	
					jQuery("#tab_theme_general_settings").removeClass("active");
					jQuery("#tab_theme_slider_settings").removeClass("active");
					jQuery("#tab_theme_documentation_settings").removeClass("active");

				//First tabs	
					jQuery("#tab_theme_homepage_slider_settings").addClass("active");
					jQuery("#tab_theme_page_settings").addClass("active");
					jQuery("#tab_theme_documentation").addClass("active");
					
					jQuery("#theme_page_settings").show();
					jQuery("#theme_homepage_slider_settings").show();
					jQuery("#theme_reservation").show();
					jQuery("#theme_documentation").show();
				
				//Other tabs
					jQuery("#theme_blog_slider_settings").hide();
					jQuery("#theme_blog_settings").hide();
					jQuery("#theme_gallery_settings").hide();
					jQuery("#theme_homepage_settings").hide();
					jQuery("#theme_contact_settings").hide();


					
					
					jQuery("#tab_theme_blog_slider_settings").removeClass("active");
					jQuery("#tab_theme_blog_settings").removeClass("active");
					jQuery("#tab_theme_homepage_settings").removeClass("active");
					jQuery("#tab_theme_gallery_settings").removeClass("active");
					jQuery("#tab_theme_contact_settings").removeClass("active");
					
					var id = jQuery(this).attr("id");
					id = id.substring(4);
					show(id);
					
					jQuery("#tab_"+id).addClass("active");
					return false;
				});
			
				function show(page) {
					jQuery("#theme_general_settings").hide();
					jQuery("#theme_slider_settings").hide();
					jQuery("#theme_reservation_settings").hide();

					jQuery("#"+page).show();
					
					jQuery("#tab_theme_general_settings").removeClass("active");
					jQuery("#tab_theme_slider_settings").removeClass("tab-active");

					jQuery("#tab_"+page).addClass("active");
					
				}
				var page = '<?php if($p == "") { $p = $_GET["p"]; } if($p=="") { echo "theme_general_settings"; } else { echo $p; } ?>';
				show(page);
			});
			
			jQuery(document).ready(function() {
				
				jQuery('.config_stab').click(function() {

					jQuery("#theme_homepage_slider_settings").hide();
					jQuery("#theme_blog_slider_settings").hide();
					jQuery("#theme_page_settings").hide();
					jQuery("#theme_blog_settings").hide();
					jQuery("#theme_contact_settings").hide();
					jQuery("#theme_gallery_settings").hide();


					jQuery("#theme_documentation_settings").hide();
					

					jQuery("#tab_theme_homepage_slider_settings").removeClass("active");
					jQuery("#tab_theme_blog_slider_settings").removeClass("active");
					jQuery("#tab_theme_page_settings").removeClass("active");
					jQuery("#tab_theme_blog_settings").removeClass("active");
					jQuery("#tab_theme_contact_settings").removeClass("active");
					jQuery("#tab_theme_gallery_settings").removeClass("active");

					jQuery("#tab_theme_documentation_settings").removeClass("active");
					
					var id = jQuery(this).attr("id");
					id = id.substring(4);
					show(id);
					
					jQuery("#tab_"+id).addClass("active");
					return false;
				});
			
				function show(sub_page) {
					jQuery("#theme_homepage_slider_settings").hide();
					jQuery("#theme_blog_slider_settings").hide();
					jQuery("#theme_page_settings").hide();
					jQuery("#theme_blog_settings").hide();
					jQuery("#theme_contact_settings").hide();
					jQuery("#theme_gallery_settings").hide();
					jQuery("#theme_homepage_settings").hide();

					jQuery("#theme_documentation_settings").hide();
					
					jQuery("#"+sub_page).show();
					
					jQuery("#tab_theme_homepage_slider_settings").removeClass("active");
					jQuery("#tab_theme_blog_slider_settings").removeClass("active");
					jQuery("#tab_theme_page_settings").removeClass("active");
					jQuery("#tab_theme_blog_settings").removeClass("active");
					jQuery("#tab_theme_contact_settingss").removeClass("active");
					jQuery("#tab_theme_gallery_settings").removeClass("active");
					jQuery("#tab_theme_homepage_settings").removeClass("active");


					jQuery("#tab_theme_documentation").removeClass("active");

					jQuery("#tab_"+sub_page).addClass("active");
					
				}
				
				var sub_page = '<?php if($pid == "") {$pid = $_GET["pid"];} if($pid=="") { echo "theme_page_settings"; } else { echo $pid; } ?>';
				show(sub_page);
			});
			
			var global_image_box = '';
			
			function show_pics(box) {
				if(box == 1) {
					global_image_box = document.getElementById("logo_box");
					document.getElementById("pic_list").style.display = "inline";
				} else if(box == 2) {
					global_image_box = document.getElementById("footer_image_box");
					document.getElementById("pic_list").style.display = "inline";
				} else {
					global_image_box = document.getElementById("homepage_single_image");
					document.getElementById("pic_list_homepage").style.display = "inline";
				}
				
			}
			
			function hide_pics() {
				document.getElementById("pic_list").style.display = "none";
			}
			
			function hide_pics_homepage() {
				document.getElementById("pic_list_homepage").style.display = "none";
			}
			
			function copy_src(obj) {
				var src = obj.getAttribute("src");
				global_image_box.value = src;
				hide_pics();
			}
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
				$(".info").toggle(
				  function () {
				    $(this).siblings('.popup-help').removeClass('popup-help-hidden');
				  },
				  function () {
				    $(this).siblings('.popup-help').addClass('popup-help-hidden');
				  }
				);

			});
			$(document).ready(function() {
				var height = $('.popup-help').height();
				$('.popup-help').css('margin-top',-height/2+9);

			});
			$(document).ready(function() {
				
				jQuery('.close').click(function() {
				jQuery(".popup-help").addClass('popup-help-hidden');
				});
			});
		</script>
		
		<div class="wrap">
			<!-- BEGIN .control-panel-wrapper -->
			<div class="control-panel-wrapper">
			
				<!-- BEGIN .header -->
				<div class="header">
					<a href="http://www.orange-themes.com" class="logo" target="blank">&nbsp;</a>
					<p><a href="http://www.themeforest.net/user/orange-themes/portfolio?ref=orange-themes" target="blank"><b>get more from Orange Themes!</b></a></p>
				<!-- END .header -->
				</div>
				
				<!-- BEGIN .content -->
				<div class="content">

					<!-- BEGIN .menu -->
					<div class="menu">
						<a href="#" class="general<?php if($_GET["p"] == "theme_general_settings" || $_GET["p"] == "") { ?> active<?php } ?> config_tab" id="tab_theme_general_settings"><span>General</span></a>
						<a href="#" class="slider<?php if($_GET["p"] == "theme_slider_settings") { ?> active<?php } ?> config_tab" id="tab_theme_slider_settings"><span>Slider Settings</span></a>
						
						<a href="#" class="documentation<?php if($_GET["p"] == "theme_documentation_settings") { ?> active<?php } ?> config_tab" id="tab_theme_documentation_settings"><span>Documentation</span></a>
					<!-- END .menu -->
					</div>
					
					<div id="theme_general_settings">
						<!-- BEGIN .settings -->
						<div class="settings">
						
							<!-- BEGIN .tabs -->
							<div class="tabs">
								<a href="#" class="<?php if($_GET["pid"] == "theme_page_settings" || $_GET["pid"] == "") { ?> active<?php } ?> config_stab" id="tab_theme_page_settings"><span>Page</span></a>
								<a href="#" class="<?php if($_GET["pid"] == "theme_blog_settings") { ?> active<?php } ?> config_stab" id="tab_theme_blog_settings"><span>Blog</span></a>
								<a href="#" class="<?php if($_GET["pid"] == "theme_homepage_settings") { ?> active<?php } ?> config_stab" id="tab_theme_homepage_settings"><span>Homepage</span></a>
								<a href="#" class="<?php if($_GET["pid"] == "theme_gallery_settings") { ?> active<?php } ?> config_stab" id="tab_theme_gallery_settings"><span>Gallery & Ministries </span></a>
								<a href="#" class="<?php if($_GET["pid"] == "theme_contact_settings") { ?> active<?php } ?> config_stab" id="tab_theme_contact_settings"><span>Contact</span></a>
								
							<!-- END .tabs -->
							</div>
					
							<?php include THEME_ADMIN_INCLUDES."page.php";?>
							<?php include THEME_ADMIN_INCLUDES."blog.php";?>
							<?php include THEME_ADMIN_INCLUDES."homepage.php";?>
							<?php include THEME_ADMIN_INCLUDES."gallery.php";?>
							<?php include THEME_ADMIN_INCLUDES."contact.php";?>
							<?php orange_themes_follow();?>

						<!-- END .settings -->		
						</div>	

					<!-- END .theme_general_settings -->
					</div>
					
					<div id="theme_slider_settings">
						<!-- BEGIN .settings -->
						<div class="settings">
						
							<!-- BEGIN .tabs -->
							<div class="tabs">
								<a href="#" class="<?php if($_GET["pid"] == "theme_homepage_slider_settings" || $_GET["pid"] == "") { ?> active<?php } ?> config_stab" id="tab_theme_homepage_slider_settings"><span>Homepage Slider</span></a>
								<a href="#" class="<?php if($_GET["pid"] == "theme_blog_slider_settings") { ?> active<?php } ?> config_stab" id="tab_theme_blog_slider_settings"><span>Blog Slider</span></a>
							<!-- END .tabs -->
							</div>
							
							<?php include THEME_ADMIN_INCLUDES."homepage-slider.php";?>
							<?php include THEME_ADMIN_INCLUDES."blog-slider.php";?>
							<?php orange_themes_follow();?>
							
						<!-- END .settings -->
						</div>
						
					</div>
				
					
					<div id="theme_documentation_settings">
						<!-- BEGIN .settings -->
						<div class="settings">
						
							<!-- BEGIN .tabs -->
							<div class="tabs">
								<a href="#" class="<?php if($_GET["pid"] == "theme_documentation" || $_GET["pid"] == "") { ?> active<?php } ?> config_stab" id="tab_theme_documentation"><span>Documentation</span></a>
							<!-- END .tabs -->
							</div>
							
							<?php include THEME_ADMIN_INCLUDES."documentation.php";?>
							<?php orange_themes_follow();?>
							
						<!-- END .settings -->
						</div>
						
					</div>
				<!-- END .content -->
				</div>
			
			<!-- END .control-panel-wrapper -->
			</div>

		</div>
	<?php
}


?>