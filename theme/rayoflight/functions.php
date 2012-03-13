<?php
	define("THEME_NAME", 'rayoflight');
	define("THEME_FULL_NAME", 'Ray Of Light');

	define("THEME_FUNCTIONS",TEMPLATEPATH."/functions/");
	define("THEME_INCLUDES",TEMPLATEPATH."/includes/");
	define("THEME_ADMIN_INCLUDES",THEME_INCLUDES."/admin/");
	define("THEME_CACHE",TEMPLATEPATH."/cache/");
	define("THEME_SCRIPTS",TEMPLATEPATH."/js/");

	define("THEME_URL", get_template_directory_uri());

	define("THEME_CSS_URL",THEME_URL."/css/");
	define("THEME_JS_URL",THEME_URL."/js/");
	define("THEME_IMAGE_URL",THEME_URL."/images/");
	define("THEME_IMAGE_CPANEL_URL",THEME_URL."/images/control-panel-images/");
	define("THEME_IMAGE_MTHEMES_URL",THEME_IMAGE_URL."/more-themes-images/");
	define("THEME_FUNCTIONS_URL",THEME_URL."/functions/");

	require_once(THEME_FUNCTIONS."init.php");
	require_once(THEME_INCLUDES."widgets/init.php");
	require_once(THEME_INCLUDES."shortcodes/init.php");
	require_once(THEME_INCLUDES."theme_config.php");

	$uploadsdir=wp_upload_dir();
	define("THEME_UPLOADS_URL", $uploadsdir[url]);

	$theme_name = "theme";
	
	get_template_part("includes/admin/notifier/update-notifier");
	get_template_part("includes/admin/notifier/theme-notifier");
?>