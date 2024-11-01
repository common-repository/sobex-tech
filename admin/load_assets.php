<?php
defined( 'ABSPATH' ) || exit;
/* Add The Page */
function sobextech_add_page() {
	
	/* Add The Menu Page Post Submitter */
	add_menu_page(
		__('Sobex Tech','sobex-tech'),
		__('Sobex Tech', 'sobex-tech'),
		'manage_options',
		'sobex-tech',
		'sobextech_settings_page',
		SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/admin_pages/sobex-tech-icon-18-18.png',
		99
	);
  // to add the settings page
  add_submenu_page(
		'sobex-tech',
		__('Sobex Tech','sobex-tech'),
		__('Settings','sobex-tech'),
		'manage_options',
		'sobex-tech',
		'sobextech_settings_page'
	);
	// to add settings of widget 
	add_submenu_page(
		'sobex-tech',
		__('Widget Settings','sobex-tech'),
		__('Widget Settings','sobex-tech'),
		'manage_options',
		'sobex-tech-widget',
		'sobextech_widget_settings_page'
	);
	
  	// to add settings style
	add_submenu_page(
		'sobex-tech',
		__('Style Settings','sobex-tech'),
		__('Style Settings','sobex-tech'),
		'manage_options',
		'sobex-tech-style',
		'sobextech_style_settings_page'
	);
}
add_action('admin_menu', 'sobextech_add_page');

// function for add settings button for the plugin
function sobextech_AddActionSettingsLinks( $links ) {
	
  $links[] = '<a href="'. esc_url( admin_url('admin.php?page='.SOBEXTECH_PLUGIN_NAME) ) .'">'.esc_html__('Settings', 'sobex-tech').'</a>';
  
  return $links;
}
add_filter( 'plugin_action_links_'. SOBEXTECH_BASE_PLUGIN_DIR , 'sobextech_AddActionSettingsLinks' );
function sobextech_AddActionPremiumLinks( $links ) {
	
	$links[] = '<a style="color: #ee2727;font-weight: bold;" href="https://www.sobextech.com/">'.esc_html__('Go Premium', 'sobex-tech').'</a>';
	
	return $links;
}
add_filter( 'plugin_action_links_'. SOBEXTECH_BASE_PLUGIN_DIR , 'sobextech_AddActionPremiumLinks' );
/* Settings Page Enqueue */
function sobextech_settings_page_enqueue( $hook_suffix ) {
	global $stsearch_get_opts;
	wp_enqueue_style( 'sobex-tech-global-style',SOBEXTECH_PLUGIN_URL . SOBEXTECH_CSS_DIR_BACK .'/'. SOBEXTECH_DIR_BOTH . '/sobex-tech-global-style.css', array(), SOBEXTECH_VERSION );
	wp_enqueue_script( 'sobex-tech-global-script',SOBEXTECH_PLUGIN_URL . SOBEXTECH_JS_DIR_BACK .'/'. SOBEXTECH_DIR_BOTH . '/sobex-tech-global-script.js', array('jquery'), SOBEXTECH_VERSION );

	// Only Include files in Plugin Pages
	
	$page_link = mb_substr($hook_suffix, -10);

	if($hook_suffix != 'toplevel_page_sobex-tech' && $page_link != 'tech-style' && $page_link != 'ech-widget' && $page_link != 'activation') return;

	wp_enqueue_script( 'st-search-admin-bootsrap',SOBEXTECH_PLUGIN_URL . SOBEXTECH_JS_DIR_BACK .'/'. SOBEXTECH_DIR_BOTH . '/boostrap.min.js', array(), '1.1.1' );

	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'sobex-tech-admin-live-editor',SOBEXTECH_PLUGIN_URL . SOBEXTECH_JS_DIR_BACK .'/'. SOBEXTECH_DIR_BOTH . '/admin-live-editor.js', array( 'wp-color-picker' ), false, true );
	wp_enqueue_script( 'sobex-tech-main-backend-script',SOBEXTECH_PLUGIN_URL . SOBEXTECH_JS_DIR_BACK .'/'. SOBEXTECH_DIR_BOTH . '/admin-sobex-tech-main-backend.js', array( 'wp-color-picker' ), false, true );
	

	//3.3.1
	wp_enqueue_script("jquery");
	wp_enqueue_script('st-search-admin-tabs-script', SOBEXTECH_PLUGIN_URL . SOBEXTECH_JS_DIR_BACK  .'/'. SOBEXTECH_DIR_BOTH  . '/admin-tabs.js', array(),SOBEXTECH_VERSION );
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script( 'jquery-ui-sortable');

	/*----- LOAD Menu CSS -----*/
	if ( isset($stsearch_get_opts['st_admin_language']) || !empty($stsearch_get_opts['st_admin_language']) ):
		if(empty($stsearch_get_opts['st_admin_language'])): $stsearch_get_opts['st_admin_language'] = 'persian'; endif;
		if($stsearch_get_opts['st_admin_language'] !== 'english'):
			/*SOBEXTECH_DIR_LTR*/
			wp_enqueue_script('sobex-tech-admin-main-script', SOBEXTECH_PLUGIN_URL . SOBEXTECH_JS_DIR_BACK  .'/'. SOBEXTECH_DIR_LTR  . '/sobex-admin-main-script.js', array(),SOBEXTECH_VERSION );
		else:
			/*SOBEXTECH_DIR_RTL*/
			wp_enqueue_script('sobex-tech-admin-main-script', SOBEXTECH_PLUGIN_URL . SOBEXTECH_JS_DIR_BACK  .'/'. SOBEXTECH_DIR_RTL  . '/sobex-admin-main-script.js', array(),SOBEXTECH_VERSION );
		endif;
	else:
	/*SOBEXTECH_DIR_RTL*/
	wp_enqueue_script('sobex-tech-admin-main-script', SOBEXTECH_PLUGIN_URL . SOBEXTECH_JS_DIR_BACK  .'/'. SOBEXTECH_DIR_RTL  . '/sobex-admin-main-script.js', array(),SOBEXTECH_VERSION );
	endif;
	$handle = 'stsearch_admin_ajax';
	wp_enqueue_script($handle, SOBEXTECH_PLUGIN_URL . SOBEXTECH_JS_DIR_BACK 	.'/'. SOBEXTECH_DIR_BOTH  . '/admin-ajax.js', array('jquery'), SOBEXTECH_VERSION);

  // Localize the script with a new data
	wp_localize_script($handle, $handle, [
		'ajax_url' => admin_url('admin-ajax.php')
	]);

	/********************************* enqueue CSS & OTHER FREAMWROKS FILES *********************************/

  	wp_enqueue_style( 'st-search-admin-bootstrap',SOBEXTECH_PLUGIN_URL . SOBEXTECH_CSS_DIR_BACK	.'/'.SOBEXTECH_DIR_BOTH  .'/boostrap.min.css', array(), SOBEXTECH_VERSION );

	wp_enqueue_style( 'st-search-admin-jquery-ui', SOBEXTECH_PLUGIN_URL . SOBEXTECH_CSS_DIR_BACK	.'/'. SOBEXTECH_DIR_BOTH  .'/admin-jquery-ui.css', array(), SOBEXTECH_VERSION );

	if(isset($stsearch_get_opts['st_admin_language']) && !empty($stsearch_get_opts['st_admin_language'])):
		
		if($stsearch_get_opts['st_admin_language'] === 'english'):
			/*SOBEXTECH_DIR_LTR*/
			wp_enqueue_style( 'st-search-admin-tabs-style', SOBEXTECH_PLUGIN_URL .SOBEXTECH_CSS_DIR_BACK	.'/'.SOBEXTECH_DIR_LTR  .'/admin-tabs-backend.css', array(), SOBEXTECH_VERSION );

			wp_enqueue_style( 'st-search-admin-main-back', SOBEXTECH_PLUGIN_URL .SOBEXTECH_CSS_DIR_BACK	.'/'.SOBEXTECH_DIR_LTR  .'/main-backend.css', array(), SOBEXTECH_VERSION );

			wp_enqueue_style( 'st-search-admin-home-page', SOBEXTECH_PLUGIN_URL .SOBEXTECH_CSS_DIR_BACK	.'/'.SOBEXTECH_DIR_LTR  .'/admin-home.css', array(), SOBEXTECH_VERSION );
		else:
			/*SOBEXTECH_DIR_RTL*/
			wp_enqueue_style( 'st-search-admin-tabs-style', SOBEXTECH_PLUGIN_URL .SOBEXTECH_CSS_DIR_BACK	.'/'.SOBEXTECH_DIR_RTL  .'/admin-tabs-backend.css', array(), SOBEXTECH_VERSION );

			wp_enqueue_style( 'st-search-admin-main-back', SOBEXTECH_PLUGIN_URL .SOBEXTECH_CSS_DIR_BACK	.'/'.SOBEXTECH_DIR_RTL  .'/main-backend.css', array(), SOBEXTECH_VERSION );

			wp_enqueue_style( 'st-search-admin-home-page', SOBEXTECH_PLUGIN_URL .SOBEXTECH_CSS_DIR_BACK	.'/'.SOBEXTECH_DIR_RTL  .'/admin-home.css', array(), SOBEXTECH_VERSION );
		endif;
	else: 
		/*SOBEXTECH_DIR_RTL*/
		wp_enqueue_style( 'st-search-admin-tabs-style', SOBEXTECH_PLUGIN_URL .SOBEXTECH_CSS_DIR_BACK	.'/'.SOBEXTECH_DIR_RTL  .'/admin-tabs-backend.css', array(), SOBEXTECH_VERSION );

		wp_enqueue_style( 'st-search-admin-main-back', SOBEXTECH_PLUGIN_URL .SOBEXTECH_CSS_DIR_BACK	.'/'.SOBEXTECH_DIR_RTL  .'/main-backend.css', array(), SOBEXTECH_VERSION );

		wp_enqueue_style( 'st-search-admin-home-page', SOBEXTECH_PLUGIN_URL .SOBEXTECH_CSS_DIR_BACK	.'/'.SOBEXTECH_DIR_RTL  .'/admin-home.css', array(), SOBEXTECH_VERSION );
	endif;
	

	/*----- LOAD Menu CSS -----*/
	if ( isset($stsearch_get_opts['st_admin_language']) || !empty($stsearch_get_opts['st_admin_language']) ):
		if($stsearch_get_opts['st_admin_language'] !== 'english'):
			/*SOBEXTECH_DIR_LTR*/
			wp_enqueue_style('sobex-tech-widet-menu-slide-style', SOBEXTECH_PLUGIN_URL . SOBEXTECH_CSS_DIR_FRONT .'/'. SOBEXTECH_DIR_RTL . '/menu-slide/sobex-tech-menu-slide-widget.css',array(),SOBEXTECH_DEFAULT_MENU_VERSION);
			wp_enqueue_style('sobex-tech-widet-sidebar-style', SOBEXTECH_PLUGIN_URL . SOBEXTECH_CSS_DIR_FRONT .'/'. SOBEXTECH_DIR_RTL . '/filter-widget/sobex-tech-sidebar-widget.css',array(),SOBEXTECH_DEFAULT_WIDGET_VERSION); 
		else:
			/*SOBEXTECH_DIR_RTL*/
			wp_enqueue_style('sobex-tech-widet-menu-slide-style', SOBEXTECH_PLUGIN_URL . SOBEXTECH_CSS_DIR_FRONT .'/'. SOBEXTECH_DIR_LTR . '/menu-slide/sobex-tech-menu-slide-widget.css',array(),SOBEXTECH_DEFAULT_MENU_VERSION);
			wp_enqueue_style('sobex-tech-widet-sidebar-style', SOBEXTECH_PLUGIN_URL . SOBEXTECH_CSS_DIR_FRONT .'/'. SOBEXTECH_DIR_LTR . '/filter-widget/sobex-tech-sidebar-widget.css',array(),SOBEXTECH_DEFAULT_WIDGET_VERSION); 
		endif; 
	else:
		/*SOBEXTECH_DIR_RTL*/
		wp_enqueue_style('sobex-tech-widet-menu-slide-style', SOBEXTECH_PLUGIN_URL . SOBEXTECH_CSS_DIR_FRONT .'/'. SOBEXTECH_DIR_RTL . '/menu-slide/sobex-tech-menu-slide-widget.css',array(),SOBEXTECH_DEFAULT_MENU_VERSION);
		wp_enqueue_style('sobex-tech-widet-sidebar-style', SOBEXTECH_PLUGIN_URL . SOBEXTECH_CSS_DIR_FRONT .'/'. SOBEXTECH_DIR_RTL . '/filter-widget/sobex-tech-sidebar-widget.css',array(),SOBEXTECH_DEFAULT_WIDGET_VERSION); 

	endif;
	
  

	/** Include Sobex Fonts */
	wp_enqueue_style('sobex-tech-default-admin-fonts', SOBEXTECH_PLUGIN_URL . SOBEXTECH_FONTS_DIR_BACK . '/sobex-default-admin-fonts/style.css', array(), SOBEXTECH_VERSION); // Default Front admin
	wp_enqueue_style('sobex-tech-default-front-fonts', SOBEXTECH_PLUGIN_URL . SOBEXTECH_FONTS_DIR_FRONT . '/sobex-tech-default-front-fonts/style.css', array(), SOBEXTECH_VERSION); // default front
	
	/** Addons Fonts */
	$icon_pack_path = plugin_dir_path(dirname( __FILE__ )) . '/views/assets/fonts/sobex-tech-default-front-fonts-full-pack/style.css';
	if ( file_exists($icon_pack_path) ) {
		wp_enqueue_style('sobex-tech-default-front-full-pack', SOBEXTECH_PLUGIN_URL . SOBEXTECH_FONTS_DIR_FRONT . '/sobex-tech-default-front-fonts-full-pack/style.css', array(), SOBEXTECH_VERSION); // default front full pack
	}

	
}
add_action( 'admin_enqueue_scripts', 'sobextech_settings_page_enqueue' );

// Function to Dequeue all styles except for sobex-tech plugin
function sobextech_dequeue_plugins_styles_scripts( $hook_suffix ) {

	$page_link = mb_substr($hook_suffix, -10);

	if($hook_suffix != 'toplevel_page_sobex-tech' && $page_link != 'tech-style' && $page_link != 'ech-widget' && $page_link != 'activation') return;

    // Dequeue all styles except for sobex-tech plugin
	$all_styles = wp_styles()->registered;
	foreach ($all_styles as $style_handle => $style) {
		$src = $style->src;
		if (strpos($src, '/plugins/') !== false && strpos($src, 'sobex-tech') === false) {
			wp_dequeue_style($style_handle);
		}
	}
    // Dequeue all scripts except for sobex-tech plugin
    $all_scripts = wp_scripts()->registered;
    foreach ($all_scripts as $script_handle => $script) {
        $src = $script->src;
        if (strpos($src, '/plugins/') !== false && strpos($src, 'sobex-tech') === false) {
            wp_dequeue_script($script_handle);
        }
    }
}
add_action('wp_enqueue_scripts', 'sobextech_dequeue_plugins_styles_scripts', 9999);
add_action( 'admin_enqueue_scripts', 'sobextech_dequeue_plugins_styles_scripts', 999 );

?>