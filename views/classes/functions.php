<?php 
defined( 'ABSPATH' ) || exit;
global $stsearch_get_opts;
/*
==================
	Function to remove header shortcodes if widget_header is Turned On
======================	 
*/
if( isset($stsearch_get_opts['widget_header']) || !empty($stsearch_get_opts['widget_header']) ):
	if( $stsearch_get_opts['widget_header'] == 'on' ):
		remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 30 );
		function custom_remove_all_quantity_fields( $return, $product ) {return true;}
		add_filter( 'woocommerce_is_sold_individually','custom_remove_all_quantity_fields', 10, 2 );

		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
	endif;
endif;

/*
==================
	Function to Deceted Devices
======================	 
*/

function sobextech_device_detect() {
	global $stsearch_get_opts;
	$detect = new SobexTech_Device_Detect();
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'mobile') : 'computer');
	if(isset($stsearch_get_opts['display_widget_sidebar_in_mobile_tablet']) && !empty($stsearch_get_opts['display_widget_sidebar_in_mobile_tablet'])) :
		if($stsearch_get_opts['display_widget_sidebar_in_mobile_tablet'] == 'off'):
		  if( $deviceType == 'mobile' || $deviceType == 'tablet' ):
			 return 'hide';
		  
		  elseif( $deviceType == 'computer' ):
		  
			return 'show';
		  endif;
		elseif($stsearch_get_opts['display_widget_sidebar_in_mobile_tablet'] == 'mobile'):
		  if( $deviceType == 'mobile'):
			return 'show';
		  elseif( $deviceType == 'tablet' ):
		  
			return 'hide';
		  elseif( $deviceType == 'computer' ):
		  
			return 'show';
		  endif;
		elseif($stsearch_get_opts['display_widget_sidebar_in_mobile_tablet'] == 'tablet'):
		  if( $deviceType == 'tablet'):
			return 'show';
		  elseif( $deviceType == 'mobile' ):
		  
			return 'hide';
		  elseif( $deviceType == 'computer' ):
		  
			return 'show';
		  endif;
		elseif($stsearch_get_opts['display_widget_sidebar_in_mobile_tablet'] == 'both'):
		  if( $deviceType == 'mobile' || $deviceType == 'tablet' ):
			return 'show';
		  
		  elseif( $deviceType == 'computer' ):
		  
			return 'show';
		  endif;
		endif;
	  else:
		return 'show';
	  endif;
}