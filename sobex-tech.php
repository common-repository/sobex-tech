<?php 
/*
Plugin name: SOBEX TECH
Plugin URI: https://www.sobextech.com
Description: SOBEX TECH has multiple professional plugins to achieve your Woocommerce & WordPress with special abilities.
Author: Sobex
Version: 1.1.1
Text Domain: sobex-tech
Domain Path: /languages
Author URI: https://www.sobextech.com/aboutus
License: GPL
*/

defined( 'ABSPATH' ) || exit;


class STSEARCH
{
  public function __construct()
  {
    register_activation_hook(__FILE__, array(&$this, 'stsearch_activation') );
		add_action('plugins_loaded',array(&$this,'stsearch_defining_constants'), 1);
		add_action('activated_plugin', array(&$this, 'stsearch_activation_plugin'), 1);
   		add_action('plugins_loaded', array(&$this, 'stsearch_load_textdomain'), 1);
		add_action('plugins_loaded', array(&$this, 'stsearch_global_vars'), 1);
    	add_action('plugins_loaded', array(&$this, 'stsearch_set_includes'), 1);
    	add_action('plugins_loaded', array(&$this, 'stsearch_load_includes'), 1);
  }
	
	/* The Function is Excuted when the Plugin is Activated */
  public function stsearch_activation() {
    if(!get_option('stsearch_opts') ){
      add_option('stsearch_opts');
    }
	if(!get_option('stsearch_style_opts')){
      add_option('stsearch_style_opts');
	}
	
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();

		/** Create stsearch Table For Attributes */
		$table_name = $wpdb->prefix.'sobex_tech_widget_sidebar';
		$sql = "CREATE TABLE $table_name(
		id int(9) NOT NULL AUTO_INCREMENT,
		attribute_id varchar(50) NOT NULL,
		attribute_woo varchar(255) NOT NULL,
		label_name varchar(255) NOT NULL,
		display_mode int(9) NOT NULL,
		play_mode int(9) NOT NULL,
		rank_mode int(9) NOT NULL,
		device_mode int(100) NOT NULL,
		temp_name varchar(100) NOT NULL,
		widget_opt_1 int(100) NOT NULL,
		widget_opt_2 int(100) NOT NULL,
		widget_opt_3 varchar(150) NOT NULL,
		widget_opt_4 varchar(150) NOT NULL,
		PRIMARY KEY id (id),
   		UNIQUE KEY attribute_id (attribute_id)
		) $charset_collate;";
		require_once (ABSPATH.'wp-admin/includes/upgrade.php');
		dbDelta($sql);

		/** Create table For menu */
		$table_menu_name = $wpdb->prefix.'sobex_tech_widget_menu';
		$sql_widget = "CREATE TABLE $table_menu_name(
		id int(9) NOT NULL AUTO_INCREMENT,
		menu_id int(100) NOT NULL,
		menu_title varchar(255) NOT NULL,
		menu_url varchar(255) NOT NULL,
		menu_icon varchar(255) NOT NULL,
		menu_icon_color varchar(100) NOT NULL,
		device_mode int(100) NOT NULL,
		menu_temp_name varchar(255) NOT NULL,
		menu_opt_1 int(100) NOT NULL,
		menu_opt_2 int(100) NOT NULL,
		menu_opt_3 varchar(150) NOT NULL,
		menu_opt_4 varchar(150) NOT NULL,
		PRIMARY KEY id (id),
		UNIQUE KEY menu_id (menu_id)
		) $charset_collate;";
		require_once (ABSPATH.'wp-admin/includes/upgrade.php');
		dbDelta($sql_widget);
		

	}

	/* Redirect the user after click activate to the plugin Settings Page */
	public function stsearch_activation_plugin($plugin) {
		if($plugin == plugin_basename( __FILE__ ) ) {
			if(!get_option('sobextech_plugin_active')) {
				add_option('sobextech_plugin_active', '1');
			}
			exit(wp_redirect(admin_url('admin.php?page=sobex-tech') ) );
		}
	}

	/* Global Variables */
	public function stsearch_global_vars() {
		global $stsearch_get_opts;
		$stsearch_get_opts = get_option('stsearch_opts');

		global $stsearch_style_get_opts;
		$stsearch_style_get_opts = get_option('stsearch_style_opts');
	}

	/* Defining Constants */
  public function stsearch_defining_constants() {

		/** Start Plugin Global Variables */
		define('SOBEXTECH_VERSION','1.1.1'); // Plugin Version
		define('SOBEXTECH_PLUGIN_NAME','sobex-tech'); // Plugin Name 
		define('SOBEXTECH_BASE_PLUGIN_DIR',SOBEXTECH_PLUGIN_NAME.'/'.SOBEXTECH_PLUGIN_NAME.'.php'); // Plugin bacis File Dir
		define('SOBEXTECH_PLUGIN_URL',plugin_dir_url(__FILE__)); // Plugin URL
		define('SOBEXTECH_ADMIN','admin'); // Admin Backend
		define('SOBEXTECH_VIEWS','views'); // Views Frontend
		define('SOBEXTECH_LANGUAGES_DIR',SOBEXTECH_PLUGIN_NAME.'/languages'); // Languages
		define('SOBEXTECH_DIR_RTL','rtl'); // RTL DIR
		define('SOBEXTECH_DIR_LTR','ltr'); // LTR DIR
		define('SOBEXTECH_DIR_BOTH','both'); // BOTH
		
		
		/** Start Templates version Global Variables */
		define('SOBEXTECH_DEFAULT_MENU_VERSION','1.0');
		define('SOBEXTECH_DEFAULT_WIDGET_VERSION', '3.28');

		/** Start Backend Global Variables */
		define('SOBEXTECH_IMG_DIR_BACK',SOBEXTECH_ADMIN.'/assets/images'); // backend images
		define('SOBEXTECH_CSS_DIR_BACK',SOBEXTECH_ADMIN . '/assets/css'); // backend css files
		define('SOBEXTECH_JS_DIR_BACK',SOBEXTECH_ADMIN . '/assets/js'); // backend js files
		define('SOBEXTECH_FONTS_DIR_BACK', SOBEXTECH_ADMIN . '/assets/fonts'); // backend fonts
		define('SOBEXTECH_CLASSES_BACK', SOBEXTECH_ADMIN . '/classes'); // backend classes

		/** Start Frontend Global Variables */
		define('SOBEXTECH_ST_MODELS_FRONT',SOBEXTECH_VIEWS . 'widgets/sobex-filter-models'); // Fronted models files
		define('SOBEXTECH_TEMP_DIR', SOBEXTECH_VIEWS .'/templates'); // Fronted Templates
		define('SOBEXTECH_PUBLIC_DIR', SOBEXTECH_VIEWS . '/public'); // Fronted Public Assets
		define('SOBEXTECH_CLASSES_DIR', SOBEXTECH_VIEWS . '/classes'); // Fronted Classes & functions
		define('SOBEXTECH_IMG_DIR_FRONT',SOBEXTECH_VIEWS . '/assets/images'); // Fronted images
		define('SOBEXTECH_CSS_DIR_FRONT',SOBEXTECH_VIEWS .'/assets/css'); // Fronted Css
		define('SOBEXTECH_JS_DIR_FRONT',SOBEXTECH_VIEWS . '/assets/js'); // Fronted js files 
		define('SOBEXTECH_FONTS_DIR_FRONT', SOBEXTECH_VIEWS . '/assets/fonts'); // Fronted Fonts


	}

	/* Load Text Domain */
  public function stsearch_load_textdomain() {
    load_plugin_textdomain(SOBEXTECH_PLUGIN_NAME, false, SOBEXTECH_LANGUAGES_DIR);

  }
	
	/* Set Files For Includes */
  public function stsearch_set_includes() {
    $this->includes = array(
      'admin' => array(
        SOBEXTECH_ADMIN . '/load_assets.php',
        SOBEXTECH_ADMIN . '/page-settings.php',
				SOBEXTECH_ADMIN . '/page-style.php',
				SOBEXTECH_ADMIN . '/page-widget-settings.php',
				SOBEXTECH_ADMIN . '/sobex-tech-admin-ajax.php',
				SOBEXTECH_CLASSES_BACK . '/functions.php',
      ),
      'front' => array(
				SOBEXTECH_PUBLIC_DIR . '/sobex-filter-css.php',
				SOBEXTECH_CLASSES_DIR . '/functions.php',
				SOBEXTECH_CLASSES_DIR . '/sobex-device-detect.php',
				SOBEXTECH_CLASSES_DIR . '/sobex-ajax-filter-response.php',
				SOBEXTECH_VIEWS . '/sobex-tech-ajax.php',
				SOBEXTECH_VIEWS	. '/load_assets.php',
				SOBEXTECH_VIEWS . '/widgets.php',
				SOBEXTECH_TEMP_DIR . '/templates.php',
      )
    );
  }

	/* Load Plugin Files */
  public function stsearch_load_includes() {
		$includes = $this->includes;
		if(!empty($includes)):
		
			foreach($includes as $condition => $files):
				
				switch($condition):
					
					case 'admin':

						if ( is_admin() ) {
							foreach($files as $file){
								require_once $file;
							}
						}
						
					break;
						
					case 'fronted':
						
						foreach($files as $file){
							require_once $file;
						}

					break;
						
					default:
						
						foreach($files as $file){
							require_once $file;
						}
						
					break;
						
				endswitch;
				
			endforeach;
		
		endif;
  }

}

new STSEARCH;

/* load Admin Language */
$st_get_opts = get_option('stsearch_opts');
$plugin_domain = 'sobex-tech';

if(isset($st_get_opts['st_admin_language'])){

	if($st_get_opts['st_admin_language'] === 'english'):


		add_filter( 'locale', function( $locale ) {
			global $pagenow;
			$override_locale = 'en_US';
			if ( is_admin() && $pagenow === 'admin.php' && isset( $_GET['page'] ) && ( $_GET['page'] === 'sobex-tech' || $_GET['page'] === 'sobex-tech-widget' || $_GET['page'] === 'sobex-tech-style' ) ) {
				return $override_locale;
			}
			
			return $locale;
		});
	endif;
	if($st_get_opts['st_admin_language'] === 'persian'):

		add_filter( 'locale', function( $locale ) {
			global $pagenow;
			$override_locale = 'fa_IR';
			if ( is_admin() && $pagenow === 'admin.php' && isset( $_GET['page'] ) && ( $_GET['page'] === 'sobex-tech' || $_GET['page'] === 'sobex-tech-widget' || $_GET['page'] === 'sobex-tech-style' ) ) {
				return $override_locale;
			}
			
			return $locale;
		});
	endif;
	if($st_get_opts['st_admin_language'] === 'arabic'):

		add_filter( 'locale', function( $locale ) {
			global $pagenow;
			$override_locale = 'ar';
			if ( is_admin() && $pagenow === 'admin.php' && isset( $_GET['page'] ) && ( $_GET['page'] === 'sobex-tech' || $_GET['page'] === 'sobex-tech-widget' || $_GET['page'] === 'sobex-tech-style' ) ) {
				return $override_locale;
			}
			
			return $locale;
		});
	endif;

}	else{

	add_filter( 'locale', function( $locale ) {
		global $pagenow;
		$override_locale = 'fa_IR';
		if ( is_admin() && $pagenow === 'admin.php' && isset( $_GET['page'] ) && ( $_GET['page'] === 'sobex-tech' || $_GET['page'] === 'sobex-tech-widget' || $_GET['page'] === 'sobex-tech-style' ) ) {
			return $override_locale;
		}
		
		return $locale;
	});
}



	function sobex_tech_plugin_meta_links( $links, $file ) {
		if ( $file === plugin_basename( __FILE__ ) ) {
			$links[] = '<a href="https://www.sobextech.com/sobexdocs/" target="_blank" title="' . __( 'Docs', 'sobex-tech' ) . '">' . __( 'Docs', 'sobex-tech' ) . '</a>';
		}
		return $links;
	}
	add_filter( 'plugin_row_meta', 'sobex_tech_plugin_meta_links', 10, 2 );



?>