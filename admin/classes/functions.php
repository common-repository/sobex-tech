<?php
defined( 'ABSPATH' ) || exit;
global $wpdb;
global $stsearch_get_opts;
/*
==================
  Array_checked is a function to select the checked boxs
======================	 
*/
function array_checked( $checked, $current, $echo = true ) {
	if(is_array($checked)){
	
	foreach( $checked as $val ){
		if($val === $current){
			$result = 'checked="checked"';
			break;
		}
		else
			$result = '';
	}
	
	if ( $echo )
		echo esc_attr(esc_attr($result));

	return $result;
	
	}
}
/*
==================
	Function to Check If user has Activated Plugins Or not
======================	 
*/
function sobex_plugins_switch_check($plugin_name) {
	global $stsearch_get_opts;

	if( isset($stsearch_get_opts['menu_menu_type']) || !empty($stsearch_get_opts['menu_menu_type']) ):
		if($stsearch_get_opts['menu_menu_type'] === 'off' && $plugin_name === 'menu_slide' ):
			return 'sobex-plugin-deactivated';
		elseif($stsearch_get_opts['menu_menu_type'] === 'unmerge' && $plugin_name === 'widget_filter'):
			return 'sobex-plugin-deactivated';
		endif;
	endif;
}
/*
==================
	Display Style of the menu
======================	 
*/
  /* Load Attribtes From database */
  global $stsearch_get_opts;

  $table_name = $wpdb->prefix.'sobex_tech_widget_sidebar'; // Table Name

  $rows = $wpdb->get_results( "SELECT * FROM  $table_name", ARRAY_A);

	if(!empty($rows)):
		foreach($rows as $row):
			if(!empty($row)):
				if($row['attribute_woo'] === 'product_cat'):
					if(isset($stsearch_get_opts['menu_menu_display_style']) || !empty($stsearch_get_opts['menu_menu_display_style'])):
						if($stsearch_get_opts['menu_menu_display_style'] === 'radio'):
							$wpdb->update( $wpdb->prefix.'sobex_tech_widget_sidebar',
							array('display_mode'=>'5'),array( 'attribute_woo' => 'product_cat' ));
						endif;
					endif;
				endif;
			endif;
		endforeach;
	endif;
/*
==================
    @Function for Successed msg toast
======================	 
*/
function sobex_successed_toast($msg) {
	
	$result = '<div class="sobex-toast sobex-toast-success"><div class="sobex-toast-icon-container"><i class="sobex-checkbox-checked"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">'.esc_html_e('Successed', 'sobex-tech').'</p><p class="sobex-toast-msg">'. ($msg) .'</p></div><button class="sobex-toast-close">&times;</button></div>';

	return esc_html($result);
}
/*
==================
    @Function for Error msg toast
======================	 
*/
function sobex_error_toast($msg) {
	
	$result = '<div class="sobex-toast sobex-toast-error"><div class="sobex-toast-icon-container"><i class="sobex-cancel-circle"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">'.esc_html_e('Successed', 'sobex-tech').'</p><p class="sobex-toast-msg">'. esc_html($msg) .'</p></div><button class="sobex-toast-close">&times;</button></div>';
	return esc_html($result);
}

function sobextech_AdminDhasboard_header() {
	?>
 <div class="sobextechcontent">
    <section class="tabsebox-r-wrapper">
       <div class="tabsebox-r-container">
          <div class="admin-header-sobex" >
						
							<div class="admin-logo-sobex"> <a href="https://www.sobextech.com" target="_blank"><img src="<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/admin_pages/web_ogo_sobex_tech_with3.png' ?>"/></a> </div>
							<!-- admin-logo-sobex END  -->
				
						 
							<div class="left-header-text">
									<p><a><?php esc_html_e('Sobex Tech','sobex-tech')?></a></p>
									<p><a><?php esc_html_e('Sobex Tech Plugins Settings','sobex-tech')?></a></p>
									<div>
										<p><img src="<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/admin_pages/shape.svg' ?>" class="sohedsvg" /> <a>  <?php esc_html_e('Version','sobex-tech')?> : <?php echo SOBEXTECH_VERSION ?>  </a> </p>
									</div>
									<!-- versionplugins END  --> 
							</div>

								<!-- left-header-text END  --> 
							</div>
							<!-- admin-header-sobex END  -->

	<?php
}
function sobextech_AdminDhasboard_footer() {
	?>

			</div>
			 <div class="admin-footer-sobex" >
						<p><?php esc_html_e('All copyrights reserved to (Sobex Tech)','sobex-tech')?> </p>
						<a href="https://www.sobextech.com" target="_blank"> <?php esc_html_e('Our Products in Website','sobex-tech')?> </a> 
					</div>
					<!-- admin-footer-sobex END  -->
				</div>
				<!---- tabs-block END ---->
			</div>
			<!-- tabs-container END -->
			</section>
			<!---- tabs-wrapper END ---->
		</div>
		<!-- sobextechcontent END  -->
	<?php
}
/*
==================
	Function to Apply Woocommerce Attributes Into Plugin Table
======================	 
*/
function stsearch_insert_woo_into_plugin_table(){

    global $wpdb;

	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

        $table_sidebar_name = $wpdb->prefix."sobex_tech_widget_sidebar"; // sidebar table
        // insert woocommerce shortcodes into sidebar
        $wpdb->query("INSERT IGNORE INTO `$table_sidebar_name`
        (`attribute_id`,`attribute_woo`, `display_mode`, `play_mode`, `rank_mode`)
        VALUES
        ('product_cat','product_cat', '5', '1', '1'),
        ('product_tag','product_tag', '5', '0', '2'),
        ('search_input','search_input', '0', '0', '4'),
        ('price_input','price_input', '0', '0', '4'),
        ('default_woocommerce_filter','default_woocommerce_filter', '0', '0', '4')");		

        // insert woocommerce Attributes into Sidebar & header
        $woo_attributes = wc_get_attribute_taxonomies();

        if($woo_attributes):
            foreach($woo_attributes as $woo_attribute):
                // Add Woo Attribues to attribue section
                $attId = $woo_attribute->attribute_id;
                $tempName = null;
                $attrName     = $woo_attribute->attribute_name; //string value use: %s
                $none    = "0"; //string value use: %s
                $play    = "0"; //numeric value use: %d
                $rank    = "1";
                $sql_sidebar = $wpdb->prepare("INSERT IGNORE INTO `$table_sidebar_name` (`attribute_id`, `attribute_woo`, `display_mode`, `play_mode`, `rank_mode`, `temp_name`) values (%s, %s, %s, %s, %s, %s)",$attId, $attrName, $none, $play, $rank,$tempName);
				$wpdb->query($sql_sidebar);

            endforeach;
        endif;
	}
}
add_action( 'init','stsearch_insert_woo_into_plugin_table');

/*
==================
	Function to Apply Menu Data Into Plugin Table
======================	 
*/
function sobex_tech_insert_menu_into_plugin_table() {
	global $stsearch_get_opts;

	function wp_get_menu_array_insert($current_menu) {
	
			$menu_array = wp_get_nav_menu_items($current_menu);
	
			$menu = array();
	
			function populate_children_insert($menu_array, $menu_item)
			{
					$children = array();
					if (!empty($menu_array)){
							foreach ($menu_array as $k=>$m) {
									if ($m->menu_item_parent == $menu_item->ID) {
											$children[$m->ID] = array();
							
											$children[$m->ID]['ID'] = $m->ID;
											$children[$m->ID]['title'] = $m->title;
											$children[$m->ID]['url'] = $m->url;
											unset($menu_array[$k]);
											$children[$m->ID]['children'] = populate_children_insert($menu_array, $m);
									}
							}
					};
					return $children;
			}
	
			foreach ($menu_array as $m) {
					if (empty($m->menu_item_parent)) {
							$menu[$m->ID] = array();
							$menu[$m->ID]['ID'] = $m->ID;
							$menu[$m->ID]['title'] = $m->title;
							$menu[$m->ID]['url'] = $m->url;
							$menu[$m->ID]['children'] = populate_children_insert($menu_array, $m);
					}
			}
	
			return $menu;
	
	}
	
	function get_menu_html_insert( $menu_array, $level = 1 ){
	
		ob_start();


		global $stsearch_get_opts;
		if( !empty( $stsearch_get_opts['menu_menu_specific_name'] ) ) {
				foreach ($menu_array as $menu_id => $menu) {
					
				
					$current_menu = $stsearch_get_opts['menu_menu_specific_name'];
		
				
		
				
					global $wpdb;
					$table_name = $wpdb->prefix . "sobex_tech_widget_menu";    // Enter without prefix
					$default_icon = 'sobex-tech-favorite';
					$default_icon_color = '#16a27b';
					$sql = $wpdb->prepare("INSERT IGNORE INTO `$table_name` (`menu_id`, `menu_title`, `menu_url`, `menu_icon_color`, `menu_icon`,`menu_temp_name`) values (%s, %s, %s, %s, %s, %s)", $menu['ID'], $menu['title'], $menu['url'],$default_icon_color, $default_icon, $current_menu);
					$wpdb->query($sql);
					

		
					if( count($menu['children']) ){
						$new_level = $level + 1;
						echo get_menu_html_insert( $menu['children'], $new_level );
					}
					
		
				}


		$menu_html = ob_get_clean();
	
		return $menu_html;

		}
	}

	if( !empty( $stsearch_get_opts['menu_menu_specific_name'] ) ) {
		$current_menu = $stsearch_get_opts['menu_menu_specific_name'];
		$menu_arrays = wp_get_menu_array_insert($current_menu);
		echo get_menu_html_insert($menu_arrays); 
		
	}
}
add_action( 'init','sobex_tech_insert_menu_into_plugin_table');
/*
==================
	Function to get data first time while installing plugin
======================	 
*/
function sobex_tech_get_data_alert() {

	?>
		<!-- partial:alert -->
		<div class="sobex-tech-cookie-alert-container">
		<div class="sobex-tech-cookie-alert-card-body">
			<h5 class="sobex-tech-cookie-alert-card-title" style="font-size: 16px !important;"><img style=" background: #16a27b !important; border-radius: 50% !important;; width: 25px !important;" src="<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/admin_pages/sobex-tech-icon-18-18.png'; ?>"> <?php echo esc_html_e('A Quick Request!','sobex.tech');?></h5>
			<p class="sobex-tech-cookie-alert-card-text"><?php echo esc_html_e(' Thank you for choosing our');?><b style="color:#16a27b;"><?php echo esc_html_e(' Sobex tech ');?></b><?php echo esc_html_e('plugin! We would greatly appreciate your cooperation in providing us with your domain information. This will help us enhance our services and tailor our plugin to better suit your needs. Please understand that if you choose not to share your domain, we won\'t be able to offer full functionality of our plugin. Rest assured, any information you provide will be treated with utmost confidentiality and used solely for improving user ','sobex.tech');?></p>

			<p class="sobex-tech-cookie-alert-card-text sobex-tech-cookie-alert-card-title" style="color:#db1616;"><?php echo esc_html_e('Please accept our terms to continue using our plugin.','sobex.tech');?></p>

			<div class="sobex-tech-cookie-alert-btn-toolbar">
			<a href="#" class="sobex-tech-cookie-alert-btn sobex-tech-cookie-alert-btn-primary sobex-tech-cookie-alert-accept-cookies" style="text-decoration: none;"><?php echo esc_html_e('Accept','sobex.tech');?></a>
			</div>
		</div>
		</div>
		<!-- partial -->
	<?php
}