<?php
defined( 'ABSPATH' ) || exit;
class SOBEXTECH_WIDGET extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct(
		'SOBEXTECH_widget',
		__('Sobex tech Filter','sobex-tech'),
		array('description' => __('Sobex tech Filter','sobex-tech'))
		);
	}

	function widget( $args, $instance ) {

	global $stsearch_get_opts;

	/** Include The Settings for wordpress */
	if( isset($stsearch_get_opts['wordpress_mode']) || !empty($stsearch_get_opts['wordpress_mode']) ):

		if($stsearch_get_opts['wordpress_mode'] === 'wordpress_posts'): 
			
			require_once('sobex-filter-models/sobex-tech-wordpress.php');
			
		/** Include The Settings for wordpress Woocommers */
		elseif($stsearch_get_opts['wordpress_mode'] === 'woocommerce_products' ): 

			require_once('sobex-filter-models/sobex-tech-woocommerce.php');

		/** If User didn't Make the Settings After Lunch Plugin */
		else: 

			echo esc_html_e("Please Do the Plugin Settings First", 'sobex-tech');

		endif;
		
	endif;

	}

	function form( $instance ) {

	}
	function update( $new_instance, $old_instance ) {
		$instance = array();
		
		return $instance;
	}
}

function sobextech_register_widgets() {
	register_widget( 'SOBEXTECH_WIDGET' );
}

add_action( 'widgets_init', 'sobextech_register_widgets' );
?>