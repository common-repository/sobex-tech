<?php
defined( 'ABSPATH' ) || exit;
if( get_option('sobextech_plugin_active') == '1' ):
  function sobextech_admin_notice_welcome_plugin() {
	?>
		<div class="notice notice-sucess is-dismissible">
		<p>
			<?php _e('Welcome to Sobex Tech-filter Plugin, Please Set Up The Options.', 'sobex-tech'); 
			?>
		</p>
		</div>


	<?php
		// echo sobex_tech_get_data_alert();
		delete_option( 'sobextech_plugin_active' );
  }
  add_action('admin_notices', 'sobextech_admin_notice_welcome_plugin');
endif;

/* custom option and settings */
function sobextech_settings_init() {
	global $stsearch_get_opts;
	/* Register Option Setting */
	register_setting( 'sobex-tech', 'stsearch_opts' );
	
	/******** Section 1 *********/
	
	/* Add Settings Section For Page */
	add_settings_section(
		'st-search-settings-section-1',
		'',
		'sobextech_settings_section_cb',
		'sobex-tech'
	);
	// START Menu SETTINGS \\ 
	/* Add Settings Field For Specific Menu */
	add_settings_field(
		'sobex-tech-specific-menu',
		__('Select your Menu', 'sobex-tech'),
		'sobextech_menu_specific_menu_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'menu_menu_specific_name',
			'id'        => 'st-specific-menu',
			'class'     => 'st-specific-menu',
			'options'   => $stsearch_get_opts,
		)
	);
	/* Add Settings Field For Menu Type */
	add_settings_field(
		'sobex-tech-menu-type',
		__('Select Menu Type', 'sobex-tech'),
		'sobextech_menu_type_menu_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'menu_menu_type',
			'id'        => 'st-menu-type',
			'class'     => 'st-menu-type',
			'options'   => $stsearch_get_opts,
		)
	);
	/* Add Settings Field For Hide Empty Category */
	add_settings_field(
		'sobex-tech-menu-display-type',
		__('Display Type', 'sobex-tech'),
		'sobextech_menu_menu_display_type_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'menu_menu_display_type',
			'id'        => 'st-menu-display-type',
			'class'     => 'st-menu-display-type',
			'options'   => $stsearch_get_opts,
		)
	);
	/* Add Settings Field For number of items in list */
	add_settings_field(
		'sobex-tech-menu-number-of-items',
		__('Number Of Items In Menu', 'sobex-tech'),
		'sobextech_menu_menu_number_items_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'menu_menu_number_items',
			'id'        => 'st-menu-number-of-items',
			'class'     => 'st-menu-number-of-items',
			'options'   => $stsearch_get_opts,
		)
	);
	/* Add Settings Field For Hide Empty Category */
	add_settings_field(
		'sobex-tech-menu-display-style',
		__('Display Style', 'sobex-tech'),
		'sobextech_menu_menu_display_style_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'menu_menu_display_style',
			'id'        => 'st-menu-display-style',
			'class'     => 'st-menu-display-style',
			'options'   => $stsearch_get_opts,
		)
	);


	// START FILTER SETTINGS \\ 
	
	/* Add Settings Field For Langauges Admin Dashboard */
	add_settings_field(
		'sobex-tech-admin-dashboard-language',
		__('Plugin Dashboard Language', 'sobex-tech'),
		'sobextech_dashboard_admin_language_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'st_admin_language',
			'id'        => 'st-admin-language',
			'class'     => 'st-admin-language',
			'options'   => $stsearch_get_opts,
		)
	);

	/* Add Settings Field for WordPress Mode*/
	add_settings_field(
		'st-search-wordpress-mode',
		__('Filter Mode', 'sobex-tech'),
		'sobextech_settings_mode_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'wordpress_mode',
			'id'        => 'st-search-settings-wordpress-mode',
			'class'     => 'st-search-settings-wordpress-mode',
			'options'   => $stsearch_get_opts,
		)
	);

	/* Add Settings Field For widget Header */
	add_settings_field(
		'st-search-widget-header',
		__('Widget Header', 'sobex-tech'),
		'sobextech_settings_widget_header_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'widget_header',
			'id'        => 'st-search-widget-header',
			'class'     => 'st-search-widget-header',
			'options'   => $stsearch_get_opts,
		)
	);

	/* Add Settings Field For widget sidebar mobile */
	add_settings_field(
		'st-search-display-widget-sidebar-in-mobile-tablet',
		__('Display Widget Sidebar in Mobile/Tablets', 'sobex-tech'),
		'sobextech_settings_display_widget_sidebar_in_mobile_tablet_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'display_widget_sidebar_in_mobile_tablet',
			'id'        => 'st-search-display-widget-sidebar-in-mobile-tablet',
			'class'     => 'st-search-display-widget-sidebar-in-mobile-tablet',
			'options'   => $stsearch_get_opts,
		)
	);

	/* Add Settings Field For Search Model */
	add_settings_field(
		'st-search-search-model',
		__('Search Model', 'sobex-tech'),
		'sobextech_settings_search_model_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'search_model',
			'id'        => 'st-search-search-model',
			'class'     => 'st-search-search-model',
			'options'   => $stsearch_get_opts,
		)
	);
	
	/* Add Settings Field For Filter widget buttons */
	add_settings_field(
		'st-search-quick-search',
		__('Wigdet Buttons For (Classic Model)', 'sobex-tech'),
		'sobextech_settings_filter_widget_buttons_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'filter_widget_buttons',
			'id'        => 'st-search-filter-widget_buttons',
			'class'     => 'st-search-filter-widget_buttons',
			'options'   => $stsearch_get_opts,
		)
	);

	/* Add Settings Field For Post Status */
	add_settings_field(
		'st-search-post-status',
		__('Post Status', 'sobex-tech'),
		'sobextech_settings_post_status_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'post_status',
			'id'        => 'st-search-post-status',
			'class'     => 'st-search-post-status',
			'options'   => $stsearch_get_opts,
		)
	);

	/* Add Settings Field For color plugin */
	add_settings_field(
		'st-search-post-status',
		__('Color variation Plugin', 'sobex-tech'),
		'sobextech_settings_color_plugin_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'color_plugin',
			'id'        => 'st-search-color-plugin',
			'class'     => 'st-search-color-plugin',
			'options'   => $stsearch_get_opts,
		)
	);

	/* Add Settings Field For Sobex Translator */
	add_settings_field(
		'st-search-plugin-translate',
		__('Website Multiple Languages', 'sobex-tech'),
		'sobextech_settings_plugin_translate_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'sobex_plugin_translate',
			'id'        => 'st-search-plugin-translate',
			'class'     => 'st-search-plugin-translate',
			'options'   => $stsearch_get_opts,
		)
	);
	/* Add Settings Field For product tag */
	add_settings_field(
		'st-search-product-tags-list',
		__('Product Tags list', 'sobex-tech'),
		'sobextech_settings_product_tags_list_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'stsearch_product_tags_list',
			'id'        => 'st-search-product-tags-list',
			'class'     => 'st-search-product-tags-list',
			'options'   => $stsearch_get_opts,
		)
	);
	/* Add Settings Field For default woocommerce filter list */
	add_settings_field(
		'st-search-default-woocommerce-filter-list',
		__('default woocommerce filter list', 'sobex-tech'),
		'sobextech_settings_default_woocommerce_filter_list_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'stsearch_default_woocommerce_filter_list',
			'id'        => 'st-search-default-woocommerce-filter-list',
			'class'     => 'st-search-default-woocommerce-filter-list',
			'options'   => $stsearch_get_opts,
		)
	);
	/* Add Settings Field Price min setting */
	add_settings_field(
		'st-search-price-filter-min-setting',
		__('Price filter min setting', 'sobex-tech'),
		'sobextech_settings_price_filter_min_setting_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'stsearch_price_filter_min_setting',
			'id'        => 'st-search-price-filter-min-setting',
			'class'     => 'st-search-price-filter-min-setting',
			'options'   => $stsearch_get_opts,
		)
	);
	/* Add Settings Field For rest-api security */
	add_settings_field(
		'st-search-rest-api-security',
		__('Rest Api Security', 'sobex-tech'),
		'sobextech_settings_rest_api_security_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'st_search_rest_api_security',
			'id'        => 'st-search-rest-api-security',
			'class'     => 'st-search-rest-api-security',
			'options'   => $stsearch_get_opts,
		)
	);
	/* Add Settings Field For domain */
	add_settings_field(
		'st-search-domain-setting',
		__('domain', 'sobex-tech'),
		'sobextech_settings_domain_setting_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'sobextech_activated_domain',
			'id'        => 'st-search-domain-setting',
			'class'     => 'st-search-domain-setting',
			'options'   => $stsearch_get_opts,
		)
	);
	/* Add Settings Field For rest-api timeout */
	add_settings_field(
		'st-search-rest-api-security-timeout',
		__('Timeout seconds', 'sobex-tech'),
		'sobextech_widget_rest_api_timeout_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'st_search_rest_api_security_timeout',
			'id'        => 'st-search-rest-api-security-timeout',
			'class'     => 'st-search-rest-api-security-timeout',
			'options'   => $stsearch_get_opts,
		)
	);
	/* Add Settings Field For rest-api timeout */
	add_settings_field(
		'st-search-widget-ajax-callback-timeout',
		__('Widget Ajax Timeout', 'sobex-tech'),
		'sobextech_widget_ajax_timeout_cb',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'st_search_widet_ajax_callback_timeout',
			'id'        => 'st-search-widget-ajax-callback-timeout',
			'class'     => 'st-search-widget-ajax-callback-timeout',
			'options'   => $stsearch_get_opts,
		)
	);


}
add_action( 'admin_init', 'sobextech_settings_init' );


/////////////////////// Start adding Input Fields \\\\\\\\\\\\\\\\\\\\\\\

// settings section HTML 
function sobextech_settings_section_cb(){
}
// for admin dashbaord traslator
function sobextech_dashboard_admin_language_cb(){
	global $stsearch_get_opts;
	?>
      <label for="sobex-persian-language">
        <input type="radio" name="stsearch_opts[st_admin_language]" value="persian" id="sobex-persian-language" 	<?php if(isset($stsearch_get_opts['st_admin_language'])){ if($stsearch_get_opts['st_admin_language'] == 'persian'){echo "checked"; }}?>>
        <a title="<?php echo esc_html_e('Persian', 'sobex-tech');?>" class="sobex-tech-languages-flag sobex-lang-ir"></a>
      </label>
      <label for="sobex-arabic-language">
        <input type="radio" name="stsearch_opts[st_admin_language]" value="arabic" id="sobex-arabic-language" 	<?php if(isset($stsearch_get_opts['st_admin_language'])){ if($stsearch_get_opts['st_admin_language'] == 'arabic'){echo "checked"; }}?>>
        <a title="<?php echo esc_html_e('Arabic', 'sobex-tech');?>" class="sobex-tech-languages-flag sobex-lang-ar"></a>
    	</label>
			<label for="sobex-english-language">
        <input type="radio" name="stsearch_opts[st_admin_language]" value="english" id="sobex-english-language" 	<?php if(isset($stsearch_get_opts['st_admin_language'])){ if($stsearch_get_opts['st_admin_language'] == 'english'){echo "checked"; }}?>>
        <a title="<?php echo esc_html_e('English', 'sobex-tech');?>" class="sobex-tech-languages-flag sobex-lang-en"></a>
      </label>
	<?php
}
// for menu name
function sobextech_menu_specific_menu_cb(){
	global $stsearch_get_opts;

	?>
	<div class="sobex-settings-container">
	<a class="sobex-title-settings"><?php esc_html_e('Select your Menu','sobex-tech'); ?></a>
	<label for="st-specific-menu">

			<?php
			
				if(!empty(wp_get_nav_menus())): ?>
						<select name="stsearch_opts[menu_menu_specific_name]" id="st-specific-menu" class="icon"> 
						<option value=""><?php echo esc_html_e('Select menu', 'sobex-tech'); ?></option><?php
					foreach(wp_get_nav_menus() as $menu):
					
						if(isset($menu->slug)) {
							?>
						
								<option value="<?php echo esc_attr($menu->slug); ?>" <?php selected(@$stsearch_get_opts['menu_menu_specific_name'],$menu->slug ); ?>><?php echo esc_attr($menu->name); ?></option>
							
							<?php
						}
					endforeach; ?>
						</select> <?php
					
				else:
					?>
					<?php echo esc_html_e('You Don\'t Have any menu in Archive.') ?>
					<?php
				endif;
				
			?>

	</label>

	<div class="st-search-description"><?php esc_html_e('Select your menu that you are created in the archive to display in Menu Slide Widget.','sobex-tech'); ?></div>
	</div>
	<?php
}
// for menu type
function sobextech_menu_type_menu_cb(){
	global $stsearch_get_opts;

	?>
	<div class="sobex-settings-container">
			<a class="sobex-title-settings"><?php esc_html_e('Select Menu Type','sobex-tech'); ?></a>
	<label for="st-menu-type">
		<select name="stsearch_opts[menu_menu_type]" id="st-menu-type" class="icon">
		<option value="off" <?php if(isset($stsearch_get_opts['menu_menu_type'])): selected($stsearch_get_opts['menu_menu_type'],'off'); endif; ?>><?php esc_html_e('Turn Off','sobex-tech');?></option>
			<option value="unmerge" <?php if(isset($stsearch_get_opts['menu_menu_type'])): selected($stsearch_get_opts['menu_menu_type'],'unmerge'); endif; ?>><?php esc_html_e('Use Only Menu','sobex-tech');?></option>
			<option value="merge" <?php if(isset($stsearch_get_opts['menu_menu_type'])): selected($stsearch_get_opts['menu_menu_type'],'merge'); endif; ?>><?php esc_html_e('Merge menu to Sobex Filter', 'sobex-tech');?></option>
		</select>
	</label>

	<div class="st-search-description"><?php esc_html_e('a-	The Menu Type is to merge or unmerge the menu slide with the filter Widget plugin if you selected to turn off the menu slide plugin the filter widget plugin will be activated only.','sobex-tech'); ?></div>
	</div>
	<?php
}
// for menu display type 
function sobextech_menu_menu_display_type_cb(){
	global $stsearch_get_opts;

	?>
	<div class="sobex-settings-container">
	<a class="sobex-title-settings"><?php esc_html_e('Display Type','sobex-tech'); ?></a>
	<label for="st-menu-display-type">
		<select name="stsearch_opts[menu_menu_display_type]" id="st-menu-display-type" class="icon">
			<option value="hide" <?php if(isset($stsearch_get_opts['menu_menu_display_type'])): selected(@$stsearch_get_opts['menu_menu_display_type'],'hide');  endif; ?>><?php esc_html_e('Hide Category Page','sobex-tech');?></option>
			<option value="unhide" <?php if(isset($stsearch_get_opts['menu_menu_display_type'])): selected(@$stsearch_get_opts['menu_menu_display_type'],'unhide');  endif; ?>><?php esc_html_e('Show Category Page', 'sobex-tech');?></option>
		</select>
	</label>

	<div class="st-search-description"><?php esc_html_e('Menu display type is to hide the category that doesn\'t has products.','sobex-tech'); ?></div>
	</div>
	<?php
}
// for menu number of items in list 
function sobextech_menu_menu_number_items_cb(){
	global $stsearch_get_opts;

	?>
	<div class="sobex-settings-container">
	<a class="sobex-title-settings"><?php esc_html_e('Number Of Items','sobex-tech'); ?></a>
	<label for="st-menu-number-of-items">
		<select name="stsearch_opts[menu_menu_number_items]" id="st-menu-number-of-items" class="icon">
			<option disabled><?php esc_html_e('3 items in menu','sobex-tech');?> <?php echo esc_html_e('(Pro)', 'sobex-tech');?></option>
			<option value="5" <?php if(isset($stsearch_get_opts['menu_menu_number_items'])): selected(@$stsearch_get_opts['menu_menu_number_items'],'5'); endif; ?>><?php echo esc_html_e('5 items in menu', 'sobex-tech');?></option>
			<option disabled><?php esc_html_e('10 items in menu', 'sobex-tech');?> <?php echo esc_html_e('(Pro)', 'sobex-tech');?></option>
			<option disabled><?php esc_html_e('(Open) Any items in menu', 'sobex-tech');?> <?php echo esc_html_e('(Pro)', 'sobex-tech');?></option>
		</select>
	</label>
	<div class="st-search-description"><?php echo esc_html_e('You can choose the number of items (Categories) that will appear in the first loop in the menu ','sobex-tech'); ?></div>
	</div>
	<?php
}
// for menu display style 
function sobextech_menu_menu_display_style_cb(){
	global $stsearch_get_opts;

	?>
	<div class="sobex-settings-container">
	<a class="sobex-title-settings"><?php esc_html_e('Display Style','sobex-tech'); ?></a>
	<label for="st-menu-display-style">
		<select name="stsearch_opts[menu_menu_display_style]" id="st-menu-display-style" class="icon">
			<option disabled><?php esc_html_e('Checkbox Style','sobex-tech');?> <?php echo esc_html_e('(Pro)', 'sobex-tech');?></option>
			<option value="radio" <?php if(isset($stsearch_get_opts['menu_menu_display_style'])): selected(@$stsearch_get_opts['menu_menu_display_style'],'radio'); endif; ?>><?php echo esc_html_e('Radio Style', 'sobex-tech');?></option>
		</select>
	</label>

	<div class="st-search-description"><?php esc_html_e('Select the filter type for your menu slide.','sobex-tech'); ?></div>
	</div>
	<?php
}
// for mode section
function sobextech_settings_mode_cb(){
	global $stsearch_get_opts;

	?>
	<div class="sobex-settings-container">
	<a class="sobex-title-settings"><?php esc_html_e('Filter Mode','sobex-tech'); ?></a>
	<label for="st-search-settings-wordpress-mode">
		<select name="stsearch_opts[wordpress_mode]" id="st-search-settings-wordpress-mode" class="icon">
			<option value="woocommerce_products" <?php if(isset($stsearch_get_opts['wordpress_mode'])): selected(@$stsearch_get_opts['wordpress_mode'],'woocommerce_products'); endif; ?>><?php esc_html_e('WooCommerce: Product Filter','sobex-tech'); ?></option>
			<option disabled value="wordpress_posts" <?php if(isset($stsearch_get_opts['wordpress_mode'])): selected(@$stsearch_get_opts['wordpress_mode'],'wordpress_posts'); endif; ?>><?php esc_html_e('WordPress: Posts Filter', 'sobex-tech'); ?></option>
		</select>
	</label>

	<div class="st-search-description"><?php esc_html_e('The WordPress Mode Filter Only Posts, And the WooCommerce Mode Filter Only Products.','sobex-tech'); ?></div>
	</div>
	<?php
}
// for widget header
function sobextech_settings_widget_header_cb(){
	global $stsearch_get_opts;
	?>
	<div class="sobex-settings-container">
	<a class="sobex-title-settings"><?php esc_html_e('Widget Header','sobex-tech'); ?></a>
	<label for="st-search-widget-header">
		<select name="stsearch_opts[widget_header]" id="st-search-widget-header" class="icon">
			<option value="off" <?php if(isset($stsearch_get_opts['widget_header'])): selected(@$stsearch_get_opts['widget_header'],'off'); endif; ?>><?php echo esc_html_e('Turn Off', 'sobex-tech');?></option>
			<option disabled ><?php esc_html_e('Turn On', 'sobex-tech');?> <?php echo esc_html_e('(Pro)', 'sobex-tech');?></option>
		</select>
	</label>

	<div class="st-search-description"><?php esc_html_e('This setting display the widget on the header Shop page.','sobex-tech'); ?></div>
	</div>
	<?php
}
// for display widget sidebar
function sobextech_settings_display_widget_sidebar_in_mobile_tablet_cb(){
	global $stsearch_get_opts;
	?>
	<div class="sobex-settings-container">
	<a class="sobex-title-settings"><?php esc_html_e('Display Widget Sidebar in Mobile/Tablets','sobex-tech'); ?></a>
	<label for="st-search-display-widget-sidebar-in-mobile-tablet">
		<select name="stsearch_opts[display_widget_sidebar_in_mobile_tablet]" id="st-search-display-widget-sidebar-in-mobile-tablet" class="icon">
			<option value="off" <?php if(isset($stsearch_get_opts['display_widget_sidebar_in_mobile_tablet'])): selected(@$stsearch_get_opts['display_widget_sidebar_in_mobile_tablet'],'off'); endif; ?>><?php esc_html_e('Hide widget sidebar', 'sobex-tech');?></option>
			<option value="mobile" <?php if(isset($stsearch_get_opts['display_widget_sidebar_in_mobile_tablet'])): selected(@$stsearch_get_opts['display_widget_sidebar_in_mobile_tablet'],'mobile'); endif; ?>><?php esc_html_e('Show sidebar in Mobile Only', 'sobex-tech');?></option>
			<option value="tablet" <?php if(isset($stsearch_get_opts['display_widget_sidebar_in_mobile_tablet'])): selected(@$stsearch_get_opts['display_widget_sidebar_in_mobile_tablet'],'tablet'); endif;  ?>><?php esc_html_e('Show sidebar in Tablet Only', 'sobex-tech');?></option>
			<option value="both" <?php if(isset($stsearch_get_opts['display_widget_sidebar_in_mobile_tablet'])): selected(@$stsearch_get_opts['display_widget_sidebar_in_mobile_tablet'],'both'); endif; ?>><?php esc_html_e('Show sidebar in Mobile & Tablet', 'sobex-tech');?></option>
		</select>
	</label>

	<div class="st-search-description"><?php esc_html_e('This setting show & hide the widget sidebar on mobile and tablet users.','sobex-tech'); ?></div>
	</div>
	<?php
}
// for widget Quick search
function sobextech_settings_search_model_cb(){
	global $stsearch_get_opts;
	?>
	<div class="sobex-settings-container">
	<a class="sobex-title-settings"><?php esc_html_e('Search Model','sobex-tech'); ?></a>
	<label for="st-search-search-model">
		<select name="stsearch_opts[search_model]" id="st-search-search-model" class="icon">
			<option value="default_model" <?php if(isset($stsearch_get_opts['search_model'])): selected(@$stsearch_get_opts['search_model'],'default_model'); endif; ?>><?php esc_html_e('Default model (Sobex-Tech)', 'sobex-tech');?></option>
			<option disabled ><?php esc_html_e('Combo model', 'sobex-tech');?> <?php esc_html_e('(Pro)', 'sobex-tech');?></option>
			<option disabled><?php esc_html_e('Classic Model', 'sobex-tech');?> <?php esc_html_e('(Pro)', 'sobex-tech');?></option>
		</select>
	</label>

	<div class="st-search-description"><?php esc_html_e('We Recommend you to use the default mode in the filter, Please Read the docs to see the difference between them.','sobex-tech'); ?></div>
	</div>
	<?php
}
// for widget Quick search
function sobextech_settings_filter_widget_buttons_cb(){
	global $stsearch_get_opts;
	?>
	<div class="sobex-settings-container st-search-filter-widget_buttons-container" style="display: none;">
	<a class="sobex-title-settings"><?php esc_html_e('Filter Search Button','sobex-tech'); ?></a>
	<label for="st-search-filter-widget_buttons">
		<select name="stsearch_opts[filter_widget_buttons]" id="st-search-filter-widget_buttons" class="icon">
			<option value="up" <?php if(isset($stsearch_get_opts['filter_widget_buttons'])): selected(@$stsearch_get_opts['filter_widget_buttons'],'up'); endif; ?>><?php esc_html_e('Show on Top of Widget.', 'sobex-tech');?></option>
			<option value="down" <?php if(isset($stsearch_get_opts['filter_widget_buttons'])): selected(@$stsearch_get_opts['filter_widget_buttons'],'down'); endif; ?>><?php esc_html_e('Show on Bottom of Widget.', 'sobex-tech');?></option>
			<option value="both" <?php if(isset($stsearch_get_opts['filter_widget_buttons'])): selected(@$stsearch_get_opts['filter_widget_buttons'],'both'); endif; ?>><?php esc_html_e('Show on Top & Bottom (both)', 'sobex-tech');?></option>
		</select>
	</label>

	<div class="st-search-description"><?php esc_html_e('Widget Buttons (Filter All & Clear All) For (Classic Model) Only.','sobex-tech'); ?></div>
	</div>
	<?php
}
// for widget Quick search
function sobextech_settings_post_status_cb(){
	global $stsearch_get_opts;
	?>
	<div class="sobex-settings-container">
	<a class="sobex-title-settings"><?php esc_html_e('Post Status','sobex-tech'); ?></a>
	<div class="st-search-post-type-container">
		<label for="st-search-post-status-all" id="stsearch-post-status">
					<input type="checkbox" disabled name="stsearch_opts[post_status][]" value="all" id="st-search-post-status-all" <?php if(isset($stsearch_get_opts['post_status'])){ if($stsearch_get_opts['post_status'] == 'all'){echo "checked"; }} ?>>
		</label>
		<label for="st-search-post-status-publish" id="stsearch-post-status">
					<input type="checkbox" checked name="stsearch_opts[post_status][]" value="publish" id="st-search-post-status-publish" ><?php echo esc_html("publish"); ?>
		</label>
		<label for="st-search-post-status-private" id="stsearch-post-status">
					<input type="checkbox" disabled name="stsearch_opts[post_status][]" value="private" id="st-search-post-status-private" ><?php echo esc_html("private"); ?>
		</label>
		<label for="st-search-post-status-pending" id="stsearch-post-status">
					<input type="checkbox" disabled name="stsearch_opts[post_status][]" value="pending" id="st-search-post-status-pending" ><?php echo esc_html("pending"); ?>
		</label>
		<label for="st-search-post-status-draft" id="stsearch-post-status">
					<input type="checkbox" disabled name="stsearch_opts[post_status][]" value="draft" id="st-search-post-status-draft" ><?php echo esc_html("draft"); ?>
		</label>
		<label for="st-search-post-status-auto-draft" id="stsearch-post-status">
					<input type="checkbox" disabled name="stsearch_opts[post_status][]" value="auto-draft" id="st-search-post-status-auto-draft"><?php echo esc_html("auto-draft"); ?>
		</label>
		<label for="st-search-post-status-future" id="stsearch-post-status">
					<input type="checkbox" disabled name="stsearch_opts[post_status][]" value="future" id="st-search-post-status-future" ><?php echo esc_html("future"); ?>
		</label>
		<label for="st-search-post-status-inherit" id="stsearch-post-status">
					<input type="checkbox" disabled name="stsearch_opts[post_status][]" value="inherit" id="st-search-post-status-inherit" ><?php echo esc_html("inherit"); ?>
		</label>
	</div>
	<div class="st-search-description"><?php esc_html_e('Select Which kind of post status you want to filter.','sobex-tech'); ?></div>
	</div>
	<?php
}
// for widget color plugin
function sobextech_settings_color_plugin_cb(){
	global $stsearch_get_opts;
	?>
	<div class="sobex-settings-container">
	<a class="sobex-title-settings"><?php esc_html_e('Color variation Plugin','sobex-tech'); ?></a>
	<label for="st-search-color-plugin">
		<input type="text" id="st-search-color-plugin" name="stsearch_opts[color_plugin]" value="<?php if(!empty($stsearch_get_opts['color_plugin'])){echo esc_attr($stsearch_get_opts['color_plugin']);}?>">
	</label>

	<div class="st-search-description"><?php esc_html_e('If you are using any color variation plugin that is not supported in our plugin please add the plugin variation code here.','sobex-tech'); ?></div>
	</div>
	<?php
}
// for widget transalte plugin
function sobextech_settings_plugin_translate_cb(){
	global $stsearch_get_opts;

	?>
	<div class="sobex-settings-container">
	<a class="sobex-title-settings"><?php esc_html_e('Website Multiple Languages','sobex-tech'); ?></a>
	<label for="st-search-plugin-translate">
		<select name="stsearch_opts[sobex_plugin_translate]" id="st-search-plugin-translate">
			<option value="off" <?php if(isset($stsearch_get_opts['sobex_plugin_translate'])): selected(@$stsearch_get_opts['sobex_plugin_translate'],'off'); endif; ?>><?php esc_html_e('Turn Off', 'sobex-tech');?></option>
			<option disabled value="WPML"><?php esc_html_e('WPML - The WordPress Multilingual Plugin', 'sobex-tech');?> <?php esc_html_e('(Pro)', 'sobex-tech');?></option>
		</select>
	</label>

	<div class="st-search-description"><?php esc_html_e('If you are using a multilingual plugin in your WordPress please select the supported one in our plugin.','sobex-tech'); ?></div>
	</div>
	<?php
}
function sobextech_settings_product_tags_list_cb(){
	global $stsearch_get_opts;

		if(isset($stsearch_get_opts['stsearch_product_tags_list']) && !empty($stsearch_get_opts['stsearch_product_tags_list'])):
			$tags = $stsearch_get_opts['stsearch_product_tags_list'];
			foreach ($tags as $tag):
	?>
		<input style="display:none;" type="checkbox" name="stsearch_opts[stsearch_product_tags_list][]" value="<?php echo esc_attr($tag); ?>" id="st-search-product-tags-list" checked>
	
	<?php
			endforeach;
		endif;
}
function sobextech_settings_default_woocommerce_filter_list_cb(){
	global $stsearch_get_opts;

		if(isset($stsearch_get_opts['stsearch_default_woocommerce_filter_list']) && !empty($stsearch_get_opts['stsearch_default_woocommerce_filter_list'])):
			$woo_lists = $stsearch_get_opts['stsearch_default_woocommerce_filter_list'];
			foreach ($woo_lists as $woo_list):
	?>
		<input style="display:none;" type="checkbox" name="stsearch_opts[stsearch_default_woocommerce_filter_list][]" value="<?php echo esc_attr($woo_list); ?>" id="st-search-default-woocommerce-filter-list" checked>
	
	<?php
			endforeach;
		endif;
}
function sobextech_settings_price_filter_min_setting_cb(){
	global $stsearch_get_opts;

		
	?>
			<select name="stsearch_opts[stsearch_price_filter_min_setting]" id="st-search-price-filter-min-setting" style="display:none !important;">
				<option value="on" <?php if(isset($stsearch_get_opts['stsearch_price_filter_min_setting'])): selected(@$stsearch_get_opts['stsearch_price_filter_min_setting'],'on'); endif; if(empty($stsearch_get_opts['stsearch_price_filter_min_setting'])): echo 'selected'; endif;?>></option>
				<option value="off" <?php if(isset($stsearch_get_opts['stsearch_price_filter_min_setting'])): selected(@$stsearch_get_opts['stsearch_price_filter_min_setting'],'off'); endif; ?>></option>
			</select>
	
	<?php

}



// for Rest Api Security
function sobextech_settings_rest_api_security_cb(){
	global $stsearch_get_opts;

	?>
	<div class="sobex-settings-container">
	<a class="sobex-title-settings"><?php esc_html_e('Rest Api Security','sobex-tech'); ?></a>
	<label for="st-search-rest-api-security">
		<select name="stsearch_opts[st_search_rest_api_security]" id="st-search-rest-api-security">
			<option value="off" <?php if(isset($stsearch_get_opts['st_search_rest_api_security'])): selected(@$stsearch_get_opts['st_search_rest_api_security'],'off'); endif; ?>><?php esc_html_e('Turn Off', 'sobex-tech');?></option>
			<option value="on" <?php if(isset($stsearch_get_opts['st_search_rest_api_security'])): selected(@$stsearch_get_opts['st_search_rest_api_security'],'on'); endif; ?>><?php esc_html_e('Turn On', 'sobex-tech');?></option>
		</select>
	</label>

	<div class="st-search-description"><?php esc_html_e('If the site server or the client has a weak Internet. You can activate this feature to set a deadline for the search process and to show an error message.','sobex-tech'); ?></div>
	</div>
	<?php
}
// for Rest Api Security
function sobextech_settings_domain_setting_cb(){
	global $stsearch_get_opts;
	?>
	<input type="hidden" name="stsearch_opts[sobextech_activated_domain]" value="<?php if(!empty($stsearch_get_opts['sobextech_activated_domain'])){echo esc_attr($stsearch_get_opts['sobextech_activated_domain']);}?>">
	<?php
}
// for Rest Api Security Timeout seconds
function sobextech_widget_rest_api_timeout_cb() {
	global $stsearch_get_opts;
	?>
	<div class="sobex-settings-container st-search-rest-api-security-timeout-hide">
	<a class="sobex-title-settings"><?php esc_html_e('Timeout seconds','sobex-tech'); ?></a>
	<label for="st-search-rest-api-security-timeout">
		<input type="number" name="stsearch_opts[st_search_rest_api_security_timeout]"  value="<?php if(isset($stsearch_get_opts['st_search_rest_api_security_timeout'])){echo esc_attr($stsearch_get_opts['st_search_rest_api_security_timeout']); }else{echo '6';}?>" id="st-search-rest-api-security-timeout" >
	</label>

	<div class="st-search-description"><?php esc_html_e('The REST API search process will be terminated if the command exceeds the specified.','sobex-tech'); ?></div>
	</div>
	<?php
}
// for Widget Ajax callback (Timeout)
function sobextech_widget_ajax_timeout_cb() {
	global $stsearch_get_opts;
	?>
	<div class="sobex-settings-container">
	<a class="sobex-title-settings"><?php esc_html_e('Widget Ajax Timeout','sobex-tech'); ?></a>
	<label for="st-search-widget-ajax-callback-timeout">
		<input type="number" name="stsearch_opts[st_search_widet_ajax_callback_timeout]"  value="<?php if(isset($stsearch_get_opts['st_search_widet_ajax_callback_timeout'])){echo esc_attr($stsearch_get_opts['st_search_widet_ajax_callback_timeout']); }else{echo '6000';}?>" id="st-search-widget-ajax-callback-timeout" >
	</label>

	<div class="st-search-description"><?php esc_html_e('The ajax Order will be terminated if the command exceeds the specified seconds. 1000/1s .','sobex-tech'); ?></div>
	</div>
	<?php
}
function sobextech_create_wpml_page_li() {
  global $stsearch_get_opts;
  $off = "off";
  $wpml = "WPML";
  if( !empty($stsearch_get_opts['sobex_plugin_translate']) ){ // Check if Option is Exists

    if( $stsearch_get_opts['sobex_plugin_translate'] === $wpml ) { // If Website Doesn't Support Multi Languages
		
			?>
			<li><a href="#tab-8" class="tabsebox-r-link"><span><?php esc_html_e('WPML','sobex-tech'); ?></span></a></li>
			<?php
    }
  }
}
function sobextech_handle_file_upload() {
	if (isset($_POST['upload_import_file'])) {
		sobex_tech_plugin_import();
	}
}



//////////////////////// End adding Input Fields \\\\\\\\\\\\\\\\\\\\\\\/

/* Render Page to Admin Panel */
function sobextech_settings_page() {
	// check user capabilities
	if ( ! current_user_can( 'manage_options' ) )
	return;

	?>
	
	<?php 
	echo sobextech_AdminDhasboard_header(); 
	echo sobextech_handle_file_upload();
	global $stsearch_get_opts;
	if(!isset($stsearch_get_opts['sobextech_activated_domain']) || empty($stsearch_get_opts['sobextech_activated_domain'])): echo sobex_tech_get_data_alert(); endif;
	
	var_dump($stsearch_get_opts['sobextech_activated_domain']);
	?>

	
          <div class="tabsebox-r-block">
             <div id="tabsebox-section" class="tabsebox-r">
					
									<ul class="tab-head">
										<li> <a href="#tab-1" class="tabsebox-r-link active"> <span><?php esc_html_e('Home','sobex-tech'); ?></span></a> </li>
											<li> <a href="#tab-2" class="tabsebox-r-link"> <span><?php esc_html_e('Menu Slide','sobex-tech'); ?></span></a> </li>
											<li> <a href="#tab-3" class="tabsebox-r-link"> <span><?php esc_html_e('Filter Widget','sobex-tech'); ?></span></a> </li>
											<li> <a href="#tab-4" class="tabsebox-r-link"> <span><?php esc_html_e('Attributes Selector','sobex-tech'); ?></span ></a> </li>
											<li> <a href="#tab-5" class="tabsebox-r-link"> <span><?php esc_html_e('Search Api','sobex-tech'); ?></span> </a> </li>
											<li> <a href="#tab-6" class="tabsebox-r-link"> <span><?php esc_html_e('ICore Settings','sobex-tech'); ?></span> </a> </li>
											<li> <a href="#tab-7" class="tabsebox-r-link"> <span><?php esc_html_e('Import/Export','sobex-tech'); ?></span></a> </li>
											<?php sobextech_create_wpml_page_li();?>
									</ul>
								<div class="section-content-left">
									<form action="options.php" method="post">
									<?php
																					settings_errors();
																					
																					settings_fields( 'sobex-tech' );
																					
																				
																					?>
									<section id="tab-1" class="tabsebox-r-body entry-content active active-content">

										
															<div class="tab-full" id="sobex-tab-header-home">
																	<div class="tabs-breadcrumbs-container" style="border-bottom: none;">
																		<ul id="st-tabs-breadcrumbs">
																			<li><a><?php esc_html_e('Home','sobex-tech'); ?></a><i class="sobex-tech-home"></i></i></li>
																		</ul>
																	</div>
																	<div class="sobex-tech-languages-switcher-container">	
																		<?php echo sobextech_dashboard_admin_language_cb(); ?>
																	</div>
															</div>

										<div class="sobex-home-body">
											<!-- Start Landing -->
											<div class="sobex-home-landing">
													<div class="sobex-home-container">
														<div class="sobex-home-text">
															<h1 class="sobex-home-h1"><?php esc_html_e('Welcome, To Sobex Tech Plugins','sobex-tech');?></h1>
															<p class="sobex-home-p"><?php esc_html_e('Let\'s achieve your Website with best capabilities To be in the Top','sobex-tech');?></p>
														</div>
														<div class="sobex-home-image">
															<img src="<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/home_page/landing-image.png' ?>" alt="" />
														</div>
													</div>
													<a href="#sobex-plugins" class="sobex-home-go-down" style="transform: rotate(90deg);">
													<i style="color:#05b71d;font-size: 40px;" class="sobex-tech-chevron-right-outline"></i>
													</a>
											</div>
											<!-- End Landing -->
											<div class="sobex-plugins" id="sobex-plugins" style="padding-bottom: 0% !important;">
												<h2 class="sobex-home-main-title"><?php esc_html_e('Tutorial','sobex-tech');?></h2>
												<div class="sobex-home-container" style="grid-template-columns: unset !important;">
											
												<div class="video-container">
													<video controls>
														<source src="https://sobextech.com/add/wordpress.org-img/sobextech-free-tutorial.mp4" type="video/mp4">
													</video>
												</div>
												</div>
											</div>
											<!-- Start Team -->
											<div class="sobex-plugins" id="sobex-plugins">
												<h2 class="sobex-home-main-title"><?php esc_html_e('Activated Plugins','sobex-tech');?></h2>
												<div class="sobex-home-container">
								
													<div class="sobex-plugin-box <?php echo sobex_plugins_switch_check('menu_slide');?>">
														<div class="sobex-plugin-data">
															<img src="<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/home_page/stickers/sobex-tech-menu-sticker.jpg' ?>" alt="" />
										
														</div>
														<div class="sobex-plugin-info">
															<h3 class="sobex-plugin-h3"><?php esc_html_e('Menu Slide', 'sobex-tech');?></h3>
															<p class="sobex-plugin-p"><?php esc_html_e('Menu to Browser and Filter your Website.', 'sobex-tech');?></p>
														</div>
													</div>
													<div class="sobex-plugin-box <?php echo sobex_plugins_switch_check('widget_filter'); ?>">
													<div class="sobex-plugin-data">
															<img src="<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/home_page/stickers/sobex-tech-filter-widget-sticker.jpg' ?>" alt="" />
														</div>
														<div class="sobex-plugin-info">
															<h3 class="sobex-plugin-h3"><?php esc_html_e('Filter Widget', 'sobex-tech');?></h3>
															<p class="sobex-plugin-p"><?php esc_html_e('Advanced Plugin To Filter Products & Posts', 'sobex-tech');?></p>
														</div>
													</div>
													<div class="sobex-plugin-box sobex-plugin-deactivated">
													<div class="sobex-plugin-data">
															<img src="<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/home_page/stickers/sobex-tech-api-sticker.jpg' ?>" alt="" />
										
														</div>
														<div class="sobex-plugin-info">
															<h3 class="sobex-plugin-h3"><?php esc_html_e('Product Search Api', 'sobex-tech');?></h3>
															<p class="sobex-plugin-p"><?php esc_html_e('Coming soon.', 'sobex-tech');?></p>
														</div>
													</div>
													<div class="sobex-plugin-box sobex-plugin-deactivated">
													<div class="sobex-plugin-data">
															<img src="<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/home_page/stickers/sobex-tech-selector-sticker.jpg' ?>" alt="" />
															
														</div>
														<div class="sobex-plugin-info">
															<h3 class="sobex-plugin-h3"><?php esc_html_e('Attributes Selector', 'sobex-tech');?></h3>
															<p class="sobex-plugin-p"><?php esc_html_e('Coming Soon.', 'sobex-tech');?></p>
														</div>
													</div>
												</div>
											</div>
											<!-- End Team -->
										</div>
									</section>
									<section id="tab-2" class="tabsebox-r-body entry-content">
										<!---------- top tag -------------->
										<div class="tabsobxup">
											<div class="tabs tabs-menu-settings stsearch">
													<nav class="stsearch-nav">
														<ul  id="myli">
															<li><a href="#section-menu-tab-1"><span><?php esc_html_e('Menu Settings','sobex-tech'); ?></span> <i class="sobex-tech-cog-outline"></i></a></li>
															<li><a href="#section-menu-tab-2"><span><?php esc_html_e('Menu Template','sobex-tech'); ?></span> <i class="sobex-tech-tabs-outline"></i></a></li>
														</ul>
													</nav>
													<div class="content-wrap">
														<section id="section-menu-tab-1">
															<div class="section-sobex-container">
															<div class="tab-full">
																	<div class="tabs-breadcrumbs-container">
																		<ul id="st-tabs-breadcrumbs">
																			<li><a href="#tab-1"><?php esc_html_e('Home','sobex-tech'); ?></a><i class="sobex-tech-home"></i></li>
																			<li><a><?php esc_html_e('Menu Slides','sobex-tech'); ?></a></li>
																			<li><a><?php esc_html_e('Widget Menu Settings', 'sobex-tech')?></a></li>
																		</ul>
																	</div>
			
																		<?php 
																		
																			echo sobextech_menu_specific_menu_cb();
																			echo sobextech_menu_type_menu_cb();
																			echo sobextech_menu_menu_display_type_cb();
																			echo sobextech_menu_menu_number_items_cb();
																			echo sobextech_menu_menu_display_style_cb();
																		?>
																		<?php	
																			global $stsearch_get_opts;
																			if(isset($stsearch_get_opts['sobextech_activated_domain']) || !empty($stsearch_get_opts['sobextech_activated_domain'])): if($stsearch_get_opts['sobextech_activated_domain'] !==0):
																				submit_button( __('Save settings', 'sobex-tech') );
																				endif;
																			else:
																				echo "<p style='color: #b00e0e !important; font-size: 15px !important;'>Please accept the term to save settings.</p>";
																			endif;
																		
																					?>
															</div>
														</section>
														<section id="section-menu-tab-2">
															<div class="section-sobex-container">
															<div class="tab-full">
																		<div class="tabs-breadcrumbs-container">
																			<ul id="st-tabs-breadcrumbs">
																				<li><a href="#tab-1"><?php esc_html_e('Home','sobex-tech'); ?></a><i class="sobex-tech-home"></i></li>
																				<li><a><?php esc_html_e('Sobex Menu','sobex-tech'); ?></a></li>
																				<li><a><?php esc_html_e('Menu Settings', 'sobex-tech')?></a></li>
																				<li><a><?php esc_html_e('Menu Template', 'sobex-tech')?></a></li>
																			</ul>
																		</div>
																<div class="st-template-container">
																	<div class="st-template-box-container">
																		<div class="st-temaplte-name">
																			<a><?php esc_html_e('Default Template','sobex-tech')?> v-<?php echo SOBEXTECH_DEFAULT_MENU_VERSION;?></a>
																		</div>
																		<div class="st-template-image">
																			<img style="" src='<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/templates/Menu-admin-fa.jpg'?>'/>
																		</div>
																		<div class="st-temaplte-edit">
																			<a href="<?php echo esc_url( admin_url('admin.php?page=sobex-tech-style#section-linemove-1') );?>" target="blank"><?php echo esc_html_e('Customize Template', 'sobex-tech'); ?></a>
																		</div>
																	</div>
																	
																	<div class="st-template-box-container">
																		<div class="st-temaplte-name">
																			<a><?php esc_html_e('Sobex Menu','sobex-tech')?> v-0.0</a>
																		</div>
																		<div class="st-template-image">
																			<p><?php esc_html_e('Coming Soon', 'sobex-tech'); ?></p>
																		</div>
																		<div class="st-temaplte-edit">
																			<a style="color:white;pointer-events:none;opacity: 0.3;"><?php esc_html_e('Customize Template','sobex-tech')?></a>
																		</div>
																	</div>
																</div>
															</div>
															</div>
														</section>
														
													</div><!-- /content -->
												</div><!-- /tabs -->
										</div>
										<!---- tabsobxup ---->
									</section>
									<section id="tab-3" class="tabsebox-r-body entry-content">
										<!---------- top tag -------------->
										<div class="tabsobxup">
											<div class="tabs tabs-style-linemove stsearch">
													<nav class="stsearch-nav">
														<ul  id="myli">
															<li><a href="#section-linemove-1"><span><?php esc_html_e('Filter Settings','sobex-tech'); ?></span> <i class="sobex-tech-cog-outline"></i></a></li>
															<li><a href="#section-linemove-2"><span><?php esc_html_e('Widget Templates','sobex-tech'); ?></span> <i class="sobex-tech-tabs-outline"></i></a></li>
														</ul>
													</nav>
													<div class="content-wrap">
														<section id="section-linemove-1">
															<div class="section-sobex-container">
															<div class="tab-full">
																	<div class="tabs-breadcrumbs-container">
																		<ul id="st-tabs-breadcrumbs">
																		<li><a href="#tab-1"><?php esc_html_e('Home','sobex-tech'); ?></a><i class="sobex-tech-home"></i></li>
																			<li><a ><?php esc_html_e('Filter Widget','sobex-tech'); ?></a></li>
																			<li><a><?php esc_html_e('Widget Settings', 'sobex-tech')?></a></li>
																		</ul>
																	</div>

																	<?php
																			echo sobextech_settings_mode_cb();
																			echo sobextech_settings_widget_header_cb();
																			echo sobextech_settings_display_widget_sidebar_in_mobile_tablet_cb();
																			echo sobextech_settings_search_model_cb();
																			echo sobextech_settings_filter_widget_buttons_cb();
																			echo sobextech_settings_post_status_cb();
																			echo sobextech_settings_color_plugin_cb();
																			echo sobextech_settings_plugin_translate_cb();
																			echo sobextech_settings_product_tags_list_cb();
																			echo sobextech_settings_default_woocommerce_filter_list_cb();
																					
																			global $stsearch_get_opts;
																			if(isset($stsearch_get_opts['sobextech_activated_domain']) || !empty($stsearch_get_opts['sobextech_activated_domain'])): if($stsearch_get_opts['sobextech_activated_domain'] !==0):
																				submit_button( __('Save settings', 'sobex-tech') );
																				endif;
																			else:
																				echo "<p style='color: #b00e0e !important; font-size: 15px !important;'>Please accept the term to save settings.</p>";
																			endif;
																			
																	?>
															
															</div>
															</div>
														</section>

														<section id="section-linemove-2">
															<div class="section-sobex-container">
																	<div class="tabs-breadcrumbs-container">
																		<ul id="st-tabs-breadcrumbs">
																		<li><a href="#tab-1"><?php esc_html_e('Home','sobex-tech'); ?></a><i class="sobex-tech-home"></i></li>
																			<li><a><?php esc_html_e('Filter Widget','sobex-tech'); ?></a></li>
																			<li><a ><?php esc_html_e('Widget Settings', 'sobex-tech')?></a></li>
																			<li><a><?php esc_html_e('Widget Templates', 'sobex-tech')?></a></li>
																		</ul>
																	</div>

															<div class="st-template-container">
																<div class="st-template-box-container">
																	<div class="st-temaplte-name">
																		<a><?php esc_html_e('Default Template','sobex-tech')?> v-<?php echo SOBEXTECH_DEFAULT_WIDGET_VERSION;?>
																	</div>
																	<div class="st-template-image">
																		<img style="" src='<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/templates/Widget-admin-fa.jpg'?>'/>
																	</div>
																	<div class="st-temaplte-edit">
																		<?php echo
																		'<a href="'. esc_url( admin_url('admin.php?page=st-search-style#section-linemove-1') ) .'"target="blank">'.esc_html__('Customize Template', 'sobex-tech').'</a>'; ?>
																	</div>
																</div>
																<div class="st-template-box-container">
																	<div class="st-temaplte-name">
																		<a><?php esc_html_e('Sobex Template','sobex-tech')?> v-0.0
																	</div>
																	<div class="st-template-image">
																		<p><?php esc_html_e('Coming soon','sobex-tech'); ?></p>
																	</div>
																	<div class="st-temaplte-edit">
																		<a style="color:white;pointer-events:none;opacity: 0.3;"><?php esc_html_e('Customize Template','sobex-tech')?></a>
																	</div>
																</div>
															</div>
															</div>
														</section>
													</div><!-- /content -->
												</div><!-- /tabs -->
										</div>
										<!---- tabsobxup ---->
										<!---------- top tag END -------------->
									</section>
									<section id="tab-4" class="tabsebox-r-body entry-content">
										<div class="sobex-product-api-container">
											<a href="#" class="coming-soon-title"><?php esc_html_e('Coming Soon', 'sobex-tech')?></a>
											<a href="#" class="coming-soon-description"><?php esc_html_e('Product variation swatches add style to your product presentation. It’s captivating enough to capture your visitors’ attention,More Details Coming next Versions...','sobex-tech');?></a>
											<img style="width:40% !Important;padding-top:2%" src='<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/admin_pages/color-swatcher.svg'?>'/>
										</div>
									</section>
									<section id="tab-5" class="tabsebox-r-body entry-content">
										<div class="sobex-product-api-container">
											<a href="#" class="coming-soon-title"><?php esc_html_e('Coming Soon', 'sobex-tech')?></a>
											<a href="#" class="coming-soon-description"><?php esc_html_e('More Details Coming next Versions...','sobex-tech');?></a>
											<img style="" src='<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/admin_pages/product-api.png'?>'/>
										</div>
									</section>
									<section id="tab-6" class="tabsebox-r-body entry-content">
										<!---------- top tag -------------->
										<div class="tabsobxup">
											<div class="tabs tabs-icore-settings stsearch">
													<nav class="stsearch-nav">
														<ul  id="myli">
															<li><a href="#section-icore-tab-1"><span><?php esc_html_e('Reset Settings','sobex-tech'); ?></span> <i class="sobex-tech-cog-outline"></i></a></li>
															<li><a href="#section-icore-tab-2"><span><?php esc_html_e('Security','sobex-tech'); ?></span> <i class="sobex-tech-tabs-outline"></i></a></li>
														</ul>
													</nav>
													<div class="content-wrap">
														<section id="section-icore-tab-1">
															<div class="section-sobex-container">
															<div class="tab-full">
																	<div class="tabs-breadcrumbs-container">
																		<ul id="st-tabs-breadcrumbs">
																			<li><a href="#tab-1"><?php esc_html_e('Home','sobex-tech'); ?></a><i class="sobex-tech-home"></i></li>
																			<li><a><?php esc_html_e('ICore Settings','sobex-tech'); ?></a></li>
																			<li><a><?php esc_html_e('Reset Settings', 'sobex-tech')?></a></li>
																		</ul>
																	</div>
															<div class="sobex-tech-icore-tab-container">
																<div class="sobex-tech-icore-note"><a><?php esc_html_e('In the event of the update or reset is done, it will be done only in the menu or widget template that was previously selected in the Sobex settings.','sobex-tech'); ?></a></div>
																<div class="sobex-tech-icore-box-container">
																	<div class="sobex-tech-icore-plugin-name"><?php echo esc_html_e('Menu Slide','sobex-tech');?></div>
																	<div class="sobex-tech-icore-plugin-buttons">
																		<div class="sobex-update-button-container">
																			<a class="sobex-button-update" type="button" id="sobex_icore_update_menu_widget" name="update" style="height: 35px;" ><?php esc_html_e('Update Menu','sobex-tech');?>
																				<div id='loadingmessage' style='display:none; float:right; '>
																					<img style="width:26px" src='<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/admin_gif/65x65.gif'?>'/>
																				</div>
																			</a>
																		</div>
																		<div class="sobex-update-button-container">
																			<a class="sobex-button-update" type="button" id="sobex_icore_reset_menu_slide_style" name="update" style="height: 35px;" ><?php esc_html_e('Reset Menu Template Style','sobex-tech');?>
																				<div id='loadingmessage' style='display:none; float:right; '>
																					<img style="width:26px" src='<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/admin_gif/65x65.gif'?>'/>
																				</div>
																			</a>
																		</div>
																		<div class="sobex-update-button-container">
																			<a class="sobex-button-update" type="button" id="sobex_icore_reset_menu_slide_icons_style" name="update" style="height: 35px;" ><?php esc_html_e('Reset Menu Icons Style','sobex-tech');?>
																				<div id='loadingmessage' style='display:none; float:right; '>
																					<img style="width:26px" src='<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/admin_gif/65x65.gif'?>'/>
																				</div>
																			</a>
																		</div>
																	</div>
																</div>
																<div class="sobex-tech-icore-box-container">
																	<div class="sobex-tech-icore-plugin-name"><?php echo esc_html_e('Filter Widget','sobex-tech');?></div>
																	<div class="sobex-tech-icore-plugin-buttons">
																		<div class="sobex-update-button-container">
																			<a class="sobex-button-update" type="button" id="sobex_icore_update_filter_widget" name="update" style="height: 35px;" ><?php esc_html_e('Update Attributes','sobex-tech');?>
																				<div id='loadingmessage' style='display:none; float:right; '>
																					<img style="width:26px" src='<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/admin_gif/65x65.gif'?>'/>
																				</div>
																			</a>
																		</div>
																		<div class="sobex-update-button-container">
																			<a class="sobex-button-update" type="button" id="sobex_icore_reset_filter_widget_sidebar_style" name="update" style="height: 35px;" ><?php esc_html_e('Reset Sidebar Style','sobex-tech');?>
																				<div id='loadingmessage' style='display:none; float:right; '>
																					<img style="width:26px" src='<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/admin_gif/65x65.gif'?>'/>
																				</div>
																			</a>
																		</div>
																	</div>
																</div>
															</div>
															</div>
														</section>
														<section id="section-icore-tab-2">
															<div class="section-sobex-container">
															<div class="tab-full">
																		<div class="tabs-breadcrumbs-container">
																			<ul id="st-tabs-breadcrumbs">
																				<li><a href="#tab-1"><?php esc_html_e('Home','sobex-tech'); ?></a><i class="sobex-tech-home"></i></li>
																				<li><a><?php esc_html_e('ICore Settings','sobex-tech'); ?></a></li>
																				<li><a><?php esc_html_e('Security', 'sobex-tech')?></a></li>
																			</ul>
																		</div>
																		<?php echo sobextech_settings_rest_api_security_cb(); 
																			  echo sobextech_widget_rest_api_timeout_cb();
																			  echo sobextech_settings_domain_setting_cb();
																			  echo sobextech_widget_ajax_timeout_cb();
																			  global $stsearch_get_opts;
																			  if(isset($stsearch_get_opts['sobextech_activated_domain']) || !empty($stsearch_get_opts['sobextech_activated_domain'])): if($stsearch_get_opts['sobextech_activated_domain'] !==0):
																				  submit_button( __('Save settings', 'sobex-tech') );
																				  endif;
																			  else:
																				  echo "<p style='color: #b00e0e !important; font-size: 15px !important;'>Please accept the term to save settings.</p>";
																			  endif;
																			  
																		?>
															
															</div>
															</div>
														</section>
														
													</div><!-- /content -->
												</div><!-- /tabs -->
										</div>
										<!---- tabsobxup ---->

									</section>
									<section id="tab-7" class="tabsebox-r-body entry-content">
																	<div class="tabs-breadcrumbs-container" style="padding-top: 20px;">
																		<ul id="st-tabs-breadcrumbs">
																		<li><a href="#tab-1"><?php esc_html_e('Home','sobex-tech'); ?></a><i class="sobex-tech-home"></i></li>
																			<li><a ><?php esc_html_e('Export & Emport', 'sobex-tech')?></a></li>
																		</ul>
																	</div>

										<div class="sobex-data-container">
											<form id="sobex-export-form">
											<div class="sobex-data-export-container">
												<div class="sobex-data-export-title">
													<a><?php esc_html_e('Export','sobex-tech');?></a> <i class="sobex-tech-cloud-download" style="color:#c71c1c"></i>
													<p class="sobex-data-export-warning"><?php esc_html_e('Warning: Please do not change, modify or delete any file that is inside This may cause the import of your data to fail.','sobex-tech')?></p>
												</div>
												<div class="sobex-plugin-data-box sobex-div-update-close">
													<label for="sobex-menu-data">
													<p class="sobex-plugin-name-data"><?php esc_html_e('Sobex Menu','sobex-tech'); ?></p>
												
													</label>
													<a class="sobex-button-data sobex-button-update-close"><?php esc_html_e('Coming Soon.','sobex-tech');?></a>
												</div>
												<div class="sobex-plugin-data-box sobex-div-update-close">
													<label for="sobex-filter-data">
													<p class="sobex-plugin-name-data"><?php esc_html_e('Sobex Filter','sobex-tech'); ?></p>
											
													</label>
													<a class="sobex-button-data sobex-button-update-close"><?php esc_html_e('Coming Soon.','sobex-tech');?></a>
												</div>
												<div class="sobex-plugin-data-box">
													<label for="sobex-all-data">
													<p class="sobex-plugin-name-data"><?php esc_html_e('All Plugins','sobex-tech'); ?></p>
													</label>
													<a class="sobex-button-data" href="<?php echo admin_url( 'admin-ajax.php' ); ?>?action=sobex_plugin_export&plugin-name=sobex-all-data"><?php esc_html_e('Download Now','sobex-tech');?></a>
												</div>
												<div class="sobex-data-export">
													</form>
												</div>
											</div>
											
											<div class="sobex-data-import-container">
												<div class="sobex-data-import-title">
													<a><?php esc_html_e('Import','sobex-tech');?></a> <i class="sobex-tech-cross" style="color:#c71c1c"></i>

											<form  method="post" id="sobex-import-form" enctype="multipart/form-data" >
													<div class="sobex-data-import-file">
														<label for="sobex-data-importing" id="sobex-data-import-label">
														<p class="sobex-plugin-import-file-title"><?php esc_html_e('Import File','sobex-tech'); ?>:</p>
														<input type="file" name="file" id="sobex-data-importing" required>
											
														</label>
															<!-- set action name -->
															<input class="sobex-button-data" id="sobex-button-import" style="height: 35px;" name="upload_import_file" type="submit" value="<?php esc_html_e('Upload','sobex-tech');?>">
													</div>
											</form>

											</div>
										</div>

									</section>
									
								</div>
								</form>
		<?php echo sobextech_AdminDhasboard_footer(); ?>


<script>
	// JavaScript Document
	! function () {
		var t = {
				611: function () {
					! function (t) {
						const e = t("#tabsebox-section .tabsebox-r-link"),
							r = t("#tabsebox-section .tabsebox-r-body");
						let n;
						const o = () => {
							e.off("click").on("click", (function (o) {
								o.preventDefault(), o.stopPropagation(), window.clearTimeout(n), e.removeClass("active "), r.removeClass("active "), r.removeClass("active-content"), t(this).addClass("active"), t(t(this).attr("href")).addClass("active"), n = setTimeout((() => {
									t(t(this).attr("href")).addClass("active-content")
								}), 50)
							}))
						};
						t((function () {
							o()
						}))
					}(jQuery)
				},
				221: function (t, e, r) {
					"use strict";
					t.exports = r.p + "<?php echo SOBEXTECH_PLUGIN_URL .SOBEXTECH_CSS_DIR_BACK.'/admin-tabs-backend.css'?>"
				}
			},
			e = {};

		function r(n) {
			var o = e[n];
			if (void 0 !== o) return o.exports;
			var i = e[n] = {
				exports: {}
			};
			return t[n](i, i.exports, r), i.exports
		}
		r.n = function (t) {
				var e = t && t.__esModule ? function () {
					return t.default
				} : function () {
					return t
				};
				return r.d(e, {
					a: e
				}), e
			}, r.d = function (t, e) {
				for (var n in e) r.o(e, n) && !r.o(t, n) && Object.defineProperty(t, n, {
					enumerable: !0,
					get: e[n]
				})
			}, r.g = function () {
				if ("object" == typeof globalThis) return globalThis;
				try {
					return this || new Function("return this")()
				} catch (t) {
					if ("object" == typeof window) return window
				}
			}(), r.o = function (t, e) {
				return Object.prototype.hasOwnProperty.call(t, e)
			},
			function () {
				"use strict";
				r(221), r(611)
			}()
	}();
</script>
<script>
			(function() {

				[].slice.call( document.querySelectorAll( '.stsearch' ) ).forEach( function( el ) {
					new CBPFWTabs( el );
				});

			})();
</script>

	<?php

}

