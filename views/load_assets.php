<?php
defined( 'ABSPATH' ) || exit;
function sobex_tech_front_enqueue_scripts(){

  global $stsearch_get_opts;
  //------ START LOAD CSS & JS FILES ------\\

  /** Include the Style & Script file for the jQuery & jQuery Ui */
  wp_enqueue_script("jquery");
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script( 'jquery-ui-sortable');

  wp_enqueue_script('sobex-tech-nouislider', SOBEXTECH_PLUGIN_URL . SOBEXTECH_JS_DIR_FRONT .'/'. SOBEXTECH_DIR_BOTH . '/sobex-tech-nouislider-min.js', array(),'v8.3.0');
  wp_enqueue_script('sobex-tech-wNumb', SOBEXTECH_PLUGIN_URL . SOBEXTECH_JS_DIR_FRONT .'/'. SOBEXTECH_DIR_BOTH . '/sobex-tech-wNumb.min.js', array(),'v1.2.0');


  /*
  @ Filter Widget enqueue css
  @ Sidebar & Header
  @ SOBEXTECH_DIR_RTL & SOBEXTECH_DIR_LTR
  */
    /* unstyle & script sidebar if disabled in mobile */

    $display_widget_sidebar_in_mobile_tablet = sobextech_device_detect();
  /*----- LOAD CSS -----*/
    /*SOBEXTECH_DIR_RTL*/
  if(isset($stsearch_get_opts['menu_menu_type']) || !empty($stsearch_get_opts['menu_menu_type'])):
    if($stsearch_get_opts['menu_menu_type'] === 'off' || $stsearch_get_opts['menu_menu_type'] === 'merge'):
      if ( is_rtl() ) { 
        if($display_widget_sidebar_in_mobile_tablet !== 'hide'):
          wp_enqueue_style('sobex-tech-widet-sidebar-style', SOBEXTECH_PLUGIN_URL . SOBEXTECH_CSS_DIR_FRONT .'/'. SOBEXTECH_DIR_RTL . '/filter-widget/sobex-tech-sidebar-widget.css',array(),SOBEXTECH_DEFAULT_WIDGET_VERSION);
        endif;
      }else {
        /*SOBEXTECH_DIR_LTR*/
        if($display_widget_sidebar_in_mobile_tablet !== 'hide'):
          wp_enqueue_style('sobex-tech-widet-sidebar-style', SOBEXTECH_PLUGIN_URL . SOBEXTECH_CSS_DIR_FRONT .'/'. SOBEXTECH_DIR_LTR . '/filter-widget/sobex-tech-sidebar-widget.css',array(),SOBEXTECH_DEFAULT_WIDGET_VERSION); 
        endif;
      }
      /*----- LOAD JS -----*/
      if(isset($stsearch_get_opts['search_model']) || !empty($stsearch_get_opts['search_model'])):
        if($stsearch_get_opts['search_model'] === 'default_model'):
          if($display_widget_sidebar_in_mobile_tablet !== 'hide'):
            wp_enqueue_script('sobex-tech-widet-sidebar-script', SOBEXTECH_PLUGIN_URL . SOBEXTECH_JS_DIR_FRONT .'/'. SOBEXTECH_DIR_BOTH . '/filter-widget/sidebar/sobex-tech-default-model.js',array(),SOBEXTECH_DEFAULT_WIDGET_VERSION); 
          endif; 
        endif;
      endif;
    endif;
  endif;
          wp_enqueue_script('sobex-tech-main-filter-widget-script', SOBEXTECH_PLUGIN_URL . SOBEXTECH_JS_DIR_FRONT .'/'. SOBEXTECH_DIR_BOTH . '/main/sobex-tech-main-filter-widget-script.js',array(),SOBEXTECH_DEFAULT_WIDGET_VERSION);  
  /*
  @ Filter Menu Slide Widget enqueue css
  @ Menu Slie
  @ SOBEXTECH_DIR_RTL & SOBEXTECH_DIR_LTR
  */
  /*----- LOAD CSS -----*/
  /*SOBEXTECH_DIR_RTL*/
  if($display_widget_sidebar_in_mobile_tablet !== 'hide'):
    if ( is_rtl() ) {
      wp_enqueue_style('sobex-tech-widet-menu-slide-style', SOBEXTECH_PLUGIN_URL . SOBEXTECH_CSS_DIR_FRONT .'/'. SOBEXTECH_DIR_RTL . '/menu-slide/sobex-tech-menu-slide-widget.css',array(),SOBEXTECH_DEFAULT_MENU_VERSION);
    }else {
      /*SOBEXTECH_DIR_LTR*/
      wp_enqueue_style('sobex-tech-widet-menu-slide-style', SOBEXTECH_PLUGIN_URL . SOBEXTECH_CSS_DIR_FRONT .'/'. SOBEXTECH_DIR_LTR . '/menu-slide/sobex-tech-menu-slide-widget.css',array(),SOBEXTECH_DEFAULT_MENU_VERSION);  
    }  
    if(isset($stsearch_get_opts['search_model']) || !empty($stsearch_get_opts['search_model'])):
      if($stsearch_get_opts['search_model'] === 'default_model'):
        wp_enqueue_script('sobex-tech-widet-menu-slide-script', SOBEXTECH_PLUGIN_URL . SOBEXTECH_JS_DIR_FRONT .'/'. SOBEXTECH_DIR_BOTH . '/menu-slide/sobex-tech-dc-model.js',array(),SOBEXTECH_DEFAULT_MENU_VERSION);
      endif;
    endif;
  endif;

  /*
  @ Sobex Tech Assets
  @ Fonts 
  */
  /** Include Sobex Default front Fonts */

  wp_enqueue_style('sobex-tech-default-front-fonts', SOBEXTECH_PLUGIN_URL . SOBEXTECH_FONTS_DIR_FRONT . '/sobex-tech-default-front-fonts/style.css', array(), SOBEXTECH_VERSION);



}

add_action('wp_enqueue_scripts','sobex_tech_front_enqueue_scripts');

