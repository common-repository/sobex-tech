<?php 
defined( 'ABSPATH' ) || exit;
/* custom option and settings */
function sobextech_settings_init_style() {
	global $stsearch_style_get_opts;
	/* Register Option Setting */
	register_setting( 'st-search-style', 'stsearch_style_opts' );
	
	/******** Section 2 *********/
	
	/* Add Settings Section For Page */
	add_settings_section(
		'st-search-settings-section-2',
		'',
		'sobextech_settings_section_ca',
		'st-search-style'
	);

	/* Add Settings Field for Style Mode */
	add_settings_field(
		'st-search-style-mode-sidebar',
		__('Style Mode', 'sobex-tech'),
		'sobextech_style_mode_sidebar_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'style_mode_sidebar',
			'id'        => 'st-search-settings-style-mode-sidebar',
			'class'     => 'st-search-settings-style-mode-sidebar',
			'options'   => $stsearch_style_get_opts,
		)
	);

	/* Add Settings Field for widget-icon */
	add_settings_field(
		'st-search-widget-icon',
		__('Widget Icon', 'sobex-tech'),
		'sobextech_widget_icon_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'widget_sidebar_icon',
			'id'        => 'st-search-settings-widget-icon',
			'class'     => 'st-search-settings-widget-icon',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for widget-icon-color */
	add_settings_field(
		'st-search-widget-icon-color',
		__('Widget Icon Color', 'sobex-tech'),
		'sobextech_widget_icon_color_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'widget_icon_color',
			'id'        => 'st-search-settings-widget-icon-color',
			'class'     => 'st-search-settings-widget-icon-color',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for widget table text color */
	add_settings_field(
		'st-search-widget-table-text-color',
		__('Widget Tabel Text Color', 'sobex-tech'),
		'sobextech_widget_table_text_color_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'widget_table_text_color',
			'id'        => 'st-search-settings-widget-table-text-color',
			'class'     => 'st-search-settings-widget-table-text-color',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for widget table font size */
	add_settings_field(
		'st-search-widget-table-font-size',
		__('Widget Tabel Font Size', 'sobex-tech'),
		'sobextech_widget_table_font_size_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'widget_table_font_size',
			'id'        => 'st-search-settings-widget-table-font-size',
			'class'     => 'st-search-settings-widget-table-font-size',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for widget table buttons font size */
	add_settings_field(
		'st-search-widget-table-buttons-font-size',
		__('Buttons Font Size', 'sobex-tech'),
		'sobextech_widget_table_buttons_font_size_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'widget_table_buttons_font_size',
			'id'        => 'st-search-settings-widget-table-buttons-font-size',
			'class'     => 'st-search-settings-widget-table-buttons-font-size',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for widget field text color */
	add_settings_field(
		'st-search-widget-field-text-color',
		__('Widget field Text Color', 'sobex-tech'),
		'sobextech_widget_field_text_color_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'widget_field_text_color',
			'id'        => 'st-search-settings-field-text-color',
			'class'     => 'st-search-settings-field-text-color',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for widget field Font Size */
	add_settings_field(
		'st-search-widget-field-font-size',
		__('Widget field Font Size', 'sobex-tech'),
		'sobextech_widget_field_font_size_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'widget_field_font_size',
			'id'        => 'st-search-settings-field-font-size',
			'class'     => 'st-search-settings-field-font-size',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for widget widget icon slide up */
	add_settings_field(
		'st-search-widget-icon-slideup',
		__('Widget Slideup Icon', 'sobex-tech'),
		'sobextech_widget_icon_slideup_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'widget_icon_slideup',
			'id'        => 'st-search-settings-widget-icon-slideup',
			'class'     => 'st-search-settings-widget-icon-slideup',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for widget widget icon slide up color*/
	add_settings_field(
		'st-search-widget-icon-slideup-color',
		__('Widget Slideup Icon Color', 'sobex-tech'),
		'sobextech_widget_icon_slideup_color_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'widget_icon_slideup_color',
			'id'        => 'st-search-settings-widget-icon-slideup-color',
			'class'     => 'st-search-settings-widget-icon-slideup-color',
			'options'   => $stsearch_style_get_opts,
		)
	);
		/* Add Settings Field for widget widget icon slide down */
		add_settings_field(
			'st-search-widget-icon-slidedown',
			__('Widget Slidedown Icon', 'sobex-tech'),
			'sobextech_widget_icon_slidedown_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'widget_icon_slidedown',
				'id'        => 'st-search-settings-widget-icon-slidedown',
				'class'     => 'st-search-settings-widget-icon-slidedown',
				'options'   => $stsearch_style_get_opts,
			)
		);
		/* Add Settings Field for widget widget icon slide down color*/
		add_settings_field(
			'st-search-widget-icon-slidedown-color',
			__('Widget Slidedown Icon Color', 'sobex-tech'),
			'sobextech_widget_icon_slidedown_color_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'widget_icon_slidedown_color',
				'id'        => 'st-search-settings-widget-icon-slidedown-color',
				'class'     => 'st-search-settings-widget-icon-slidedown-color',
				'options'   => $stsearch_style_get_opts,
			)
		);
		/* Add Settings Field for widget widget search background-color */
		add_settings_field(
			'st-search-widget-search-backround-color',
			__('Widget Search Background color', 'sobex-tech'),
			'sobextech_widget_search_background_color_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'widget_search_background_color',
				'id'        => 'st-search-settings-widget-search-backround-color',
				'class'     => 'st-search-settings-widget-search-backround-color',
				'options'   => $stsearch_style_get_opts,
			)
		);
		/* Add Settings Field for widget widget search background-color */
		add_settings_field(
			'st-search-widget-search-backround-hover',
			__('Widget Search Background hover', 'sobex-tech'),
			'sobextech_widget_search_background_hover_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'widget_search_background_hover',
				'id'        => 'st-search-settings-widget-search-backround-hover',
				'class'     => 'st-search-settings-widget-search-backround-hover',
				'options'   => $stsearch_style_get_opts,
			)
		);
		add_settings_field(
			'st-search-widget-search-title-color',
			__('Widget Search Title Color', 'sobex-tech'),
			'sobextech_widget_search_title_color_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'widget_search_title_color',
				'id'        => 'st-search-settings-widget-search-title-color',
				'class'     => 'st-search-settings-widget-search-title-color',
				'options'   => $stsearch_style_get_opts,
			)
		);
		/* Add Settings Field for widget widget search-icon */
		add_settings_field(
			'st-search-widget-search-icon',
			__('Widget Search Icon', 'sobex-tech'),
			'sobextech_widget_search_icon_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'widget_search_icon',
				'id'        => 'st-search-settings-widget-search-icon',
				'class'     => 'st-search-settings-widget-search-icon',
				'options'   => $stsearch_style_get_opts,
			)
		);
		/* Add Settings Field for widget widget search-icon-color */
		add_settings_field(
			'st-search-widget-search-icon-color',
			__('Widget Search Icon Color', 'sobex-tech'),
			'sobextech_widget_search_icon_color_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'widget_search_icon_color',
				'id'        => 'st-search-settings-widget-search-icon-color',
				'class'     => 'st-search-settings-widget-search-icon-color',
				'options'   => $stsearch_style_get_opts,
			)
		);
		/* Add Settings Field for widget widget search-icon */
		add_settings_field(
			'st-search-widget-clear-icon',
			__('Widget clear Icon', 'sobex-tech'),
			'sobextech_widget_clear_icon_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'widget_clear_icon',
				'id'        => 'st-search-settings-widget-clear-icon',
				'class'     => 'st-search-settings-widget-clear-icon',
				'options'   => $stsearch_style_get_opts,
			)
		);
		/* Add Settings Field for widget widget clear-icon-color */
		add_settings_field(
			'st-search-widget-clear-icon-color',
			__('Widget clear Icon Color', 'sobex-tech'),
			'sobextech_widget_clear_icon_color_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'widget_clear_icon_color',
				'id'        => 'st-search-settings-widget-clear-icon-color',
				'class'     => 'st-search-settings-widget-clear-icon-color',
				'options'   => $stsearch_style_get_opts,
			)
		);
		/* Add Settings Field for widget Menu Border radius */
		add_settings_field(
			'st-search-widget-table-radius',
			__('Widget Table radius', 'sobex-tech'),
			'sobextech_widget_table_radius_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'widget_table_radius',
				'id'        => 'st-search-settings-widget-table-radius',
				'class'     => 'st-search-settings-widget-table-radius',
				'options'   => $stsearch_style_get_opts,
			)
		);
		/* Add Settings Field for widget widget table background color */
		add_settings_field(
			'st-search-widget-table-background-color',
			__('Widget Table Background Color', 'sobex-tech'),
			'sobextech_widget_table_background_color_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'widget_table_background_color',
				'id'        => 'st-search-settings-widget-table-background-color',
				'class'     => 'st-search-settings-widget-table-background-color',
				'options'   => $stsearch_style_get_opts,
			)
		);
		/* Add Settings Field for filter button text-color */
		add_settings_field(
			'st-search-filter-all-text-color',
			__('Filter All Text Color', 'sobex-tech'),
			'sobextech_filter_all_text_color_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'filter_all_text_color',
				'id'        => 'st-search-settings-filter-all-text-color',
				'class'     => 'st-search-settings-filter-all-text-color',
				'options'   => $stsearch_style_get_opts,
			)
		);
		/* Add Settings Field for filter button icon */
		add_settings_field(
			'st-search-filter-all-icon',
			__('Filter All Icon', 'sobex-tech'),
			'sobextech_filter_all_icon_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'filter_all_icon',
				'id'        => 'st-search-settings-filter-all-icon',
				'class'     => 'st-search-settings-filter-all-icon',
				'options'   => $stsearch_style_get_opts,
			)
		);
		/* Add Settings Field for filter button icon color */
		add_settings_field(
			'st-search-filter-all-icon-color',
			__('Filter All Icon Color', 'sobex-tech'),
			'sobextech_filter_all_icon_color_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'filter_all_icon_color',
				'id'        => 'st-search-settings-filter-all-icon-color',
				'class'     => 'st-search-settings-filter-all-icon-color',
				'options'   => $stsearch_style_get_opts,
			)
		);
		/* Add Settings Field for filter button text-color */
		add_settings_field(
			'st-search-clear-all-text-color',
			__('Clear All Text Color', 'sobex-tech'),
			'sobextech_clear_all_text_color_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'clear_all_text_color',
				'id'        => 'st-search-settings-clear-all-text-color',
				'class'     => 'st-search-settings-clear-all-text-color',
				'options'   => $stsearch_style_get_opts,
			)
		);
		/* Add Settings Field for clear button icon */
		add_settings_field(
			'st-search-clear-all-icon',
			__('Clear All Icon', 'sobex-tech'),
			'sobextech_clear_all_icon_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'clear_all_icon',
				'id'        => 'st-search-settings-clear-all-icon',
				'class'     => 'st-search-settings-clear-all-icon',
				'options'   => $stsearch_style_get_opts,
			)
		);
		/* Add Settings Field for clear button icon color */
		add_settings_field(
			'st-search-clear-all-icon-color',
			__('Clear All Icon Color', 'sobex-tech'),
			'sobextech_clear_all_icon_color_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'clear_all_icon_color',
				'id'        => 'st-search-settings-clear-all-icon-color',
				'class'     => 'st-search-settings-clear-all-icon-color',
				'options'   => $stsearch_style_get_opts,
			)
		);
		/* Add Settings Field for scroll type*/
		add_settings_field(
			'st-search-sidebar-scroll-type',
			__('Scroll Type', 'sobex-tech'),
			'sobextech_sidebar_scroll_type_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'sidebar_scroll_type',
				'id'        => 'st-search-settings-sidebar-scroll-type',
				'class'     => 'st-search-settings-sidebar-scroll-type',
				'options'   => $stsearch_style_get_opts,
			)
		);
		/* Add Settings Field for scroll color*/
		add_settings_field(
			'st-search-sidebar-scroll-color',
			__('Scroll Color', 'sobex-tech'),
			'sobextech_sidebar_scroll_color_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'sidebar_scroll_color',
				'id'        => 'st-search-settings-sidebar-scroll-color',
				'class'     => 'st-search-settings-sidebar-scroll-color',
				'options'   => $stsearch_style_get_opts,
			)
		);
		/* Add Settings Field for scroll height*/
		add_settings_field(
			'st-search-sidebar-scroll-height',
			__('Scroll height', 'sobex-tech'),
			'sobextech_sidebar_scroll_height_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'sidebar_scroll_height',
				'id'        => 'st-search-settings-sidebar-scroll-height',
				'class'     => 'st-search-settings-sidebar-scroll-height',
				'options'   => $stsearch_style_get_opts,
			)
		);
		/* Add Settings Field for hide sidebar container background color*/
		add_settings_field(
			'st-search-hide-sidebar-container-background-color',
			__('Hide Sidebar Container background', 'sobex-tech'),
			'sobextech_hide_sidebar_container_background_color_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'hide_sidebar_container_background_color',
				'id'        => 'st-search-settings-hide-sidebar-container-background-color',
				'class'     => 'st-search-settings-hide-sidebar-container-background-color',
				'options'   => $stsearch_style_get_opts,
			)
		);
		/* Add Settings Field for sidebar container background color*/
		add_settings_field(
			'st-search-sidebar-container-background-color',
			__('Sidebar Container background color', 'sobex-tech'),
			'sobextech_sidebar_container_background_color_ca',
			'st-search-style',
			'st-search-settings-section-2',
			array(
				'name'      => 'sidebar_container_background_color',
				'id'        => 'st-search-settings-sidebar-container-background-color',
				'class'     => 'st-search-settings-sidebar-container-background-color',
				'options'   => $stsearch_style_get_opts,
			)
		);
	// START Menu \\
	/* Add Settings Field for menu buttons title color */
	add_settings_field(
		'st-search-menu-buttons-title-color',
		__('Buttons title Color', 'sobex-tech'),
		'sobextech_menu_buttons_title_color_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_menu_buttons_title_color',
			'id'        => 'st-search-menu-buttons-title-color',
			'class'     => 'st-search-menu-buttons-title-color',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu buttons background color */
	add_settings_field(
		'st-search-menu-buttons-background-color',
		__('Buttons Background Color', 'sobex-tech'),
		'sobextech_menu_buttons_background_color_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_menu_buttons_background_color',
			'id'        => 'st-search-menu-buttons-background-color',
			'class'     => 'st-search-menu-buttons-background-color',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu buttons background hover */
	add_settings_field(
		'st-search-menu-buttons-background-hover',
		__('Buttons Background hover', 'sobex-tech'),
		'sobextech_menu_buttons_background_hover_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_menu_buttons_background_hover',
			'id'        => 'st-search-menu-buttons-background-hover',
			'class'     => 'st-search-menu-buttons-background-hover',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu clear all icon */
	add_settings_field(
		'st-search-menu-clear-all-icon',
		__('Clear All Icon', 'sobex-tech'),
		'sobextech_menu_clear_all_icon_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_menu_clear_all_icon',
			'id'        => 'st-search-menu-clear-all-icon',
			'class'     => 'st-search-menu-clear-all-icon',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu filter all icon */
	add_settings_field(
		'st-search-menu-filter-all-icon',
		__('Filter All Icon', 'sobex-tech'),
		'sobextech_menu_filter_all_icon_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_menu_filter_all_icon',
			'id'        => 'st-search-menu-filter-all-icon',
			'class'     => 'st-search-menu-filter-all-icon',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu buttons icon color */
	add_settings_field(
		'st-search-menu-buttons-icon-color',
		__('Buttons Icon color', 'sobex-tech'),
		'sobextech_menu_buttons_icon_color_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_menu_buttons_icon_color',
			'id'        => 'st-search-menu-buttons-icon-color',
			'class'     => 'st-search-menu-buttons-icon-color',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu icon slide */
	add_settings_field(
		'st-search-menu-icon-slide',
		__('Menu Icon Slide', 'sobex-tech'),
		'sobextech_menu_icon_slide_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_menu_icon_slide',
			'id'        => 'st-search-menu-icon-slide',
			'class'     => 'st-search-menu-icon-slide',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu icon color slide */
	add_settings_field(
		'st-search-menu-icon-color-slide',
		__('Menu Icon color Slide', 'sobex-tech'),
		'sobextech_menu_icon_color_slide_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_menu_icon_color_slide',
			'id'        => 'st-search-menu-icon-color-slide',
			'class'     => 'st-search-menu-icon-color-slide',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu breadcrumb font-size */
	add_settings_field(
		'st-search-menu-breadcrumb-font-size',
		__('Breadcrumb Font Size', 'sobex-tech'),
		'sobextech_menu_breadcrumb_font_size_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_menu_breadcrumb_font_size',
			'id'        => 'st-search-menu-breadcrumb-font-size',
			'class'     => 'st-search-menu-breadcrumb-font-size',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu buttons font-size */
	add_settings_field(
		'st-search-menu-buttons-font-size',
		__('Buttons Font Size', 'sobex-tech'),
		'sobextech_menu_buttons_font_size_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_menu_buttons_font_size',
			'id'        => 'st-search-menu-buttons-font-size',
			'class'     => 'st-search-menu-buttons-font-size',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu title font-size */
	add_settings_field(
		'st-search-menu-title-font-size',
		__('Title Font Size', 'sobex-tech'),
		'sobextech_menu_title_font_size_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_menu_title_font_size',
			'id'        => 'st-search-menu-title-font-size',
			'class'     => 'st-search-menu-title-font-size',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for title color */
	add_settings_field(
		'st-search-menu-title-color',
		__('Menu Title Color', 'sobex-tech'),
		'sobextech_menu_title_color_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_menu_title_color',
			'id'        => 'st-search-menu-title-color',
			'class'     => 'st-search-menu-title-color',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu checked background color */
	add_settings_field(
		'st-search-menu-menu-checked-background-color',
		__('Menu Checked Background Color', 'sobex-tech'),
		'sobextech_menu_checked_background_color_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_menu_checked_background_color',
			'id'        => 'st-search-menu-checked-background-color',
			'class'     => 'st-search-menu-checked-background-color',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu background color */
	add_settings_field(
		'st-search-menu-menu-background-color',
		__('Menu Background Color', 'sobex-tech'),
		'sobextech_menu_background_color_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_menu_background_color',
			'id'        => 'st-search-menu-background-color',
			'class'     => 'st-search-menu-background-color',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu hover color */
	add_settings_field(
		'st-search-menu-menu-hover-color',
		__('Menu Hover Color', 'sobex-tech'),
		'sobextech_menu_hover_color_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_menu_hover_color',
			'id'        => 'st-search-menu-hover-color',
			'class'     => 'st-search-menu-hover-color',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu breadcrumb title color */
	add_settings_field(
		'st-search-menu-breadcrumb-title-color',
		__('Menu breadcrumb title color', 'sobex-tech'),
		'sobextech_menu_breadcrumb_title_color_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_breadcrumb_title_color',
			'id'        => 'st-search-menu-breadcrumb-title-color',
			'class'     => 'st-search-menu-breadcrumb-title-color',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu breadcrumb background title color */
	add_settings_field(
		'st-search-menu-breadcrumb-background-title-color',
		__('Menu background title color', 'sobex-tech'),
		'sobextech_menu_breadcrumb_background_title_color_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_breadcrumb_background_title_color',
			'id'        => 'st-search-menu-breadcrumb-background-title-color',
			'class'     => 'st-search-menu-breadcrumb-background-title-color',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu breadcrumb background hover color */
	add_settings_field(
		'st-search-menu-breadcrumb-background-hover-color',
		__('Menu background hover color', 'sobex-tech'),
		'sobextech_menu_breadcrumb_background_hover_color_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_breadcrumb_background_hover_color',
			'id'        => 'st-search-menu-breadcrumb-background-hover-color',
			'class'     => 'st-search-menu-breadcrumb-background-hover-color',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu display shadow*/
	add_settings_field(
		'st-search-menu-display-shadow',
		__('Menu display shadow', 'sobex-tech'),
		'sobextech_menu_display_shadow_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_display_shadow',
			'id'        => 'st-search-menu-display-shadow',
			'class'     => 'st-search-menu-display-shadow',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu scrolbar color*/
	add_settings_field(
		'st-search-menu-scrollbar-color',
		__('Menu Scrollbar color', 'sobex-tech'),
		'sobextech_menu_scrollbar_color_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_scrollbar_color',
			'id'        => 'st-search-menu-scrollbar-color',
			'class'     => 'st-search-menu-scrollbar-color',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu background shadow */
	add_settings_field(
		'st-search-menu-background-shadow',
		__('Menu background shadow', 'sobex-tech'),
		'sobextech_menu_background_shadow_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_background_shadow',
			'id'        => 'st-search-menu-background-shadow',
			'class'     => 'st-search-menu-background-shadow',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu border radius */
	add_settings_field(
		'st-search-menu-border-radius',
		__('Menu Border radius', 'sobex-tech'),
		'sobextech_menu_border_radius_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_border_radius',
			'id'        => 'st-search-menu-border-radius',
			'class'     => 'st-search-menu-border-radius',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu z-index */
	add_settings_field(
		'st-search-menu-z-index',
		__('Menu z-index', 'sobex-tech'),
		'sobextech_menu_z_index_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_menu_z_index',
			'id'        => 'st-search-menu-z-index',
			'class'     => 'st-search-menu-z-index',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field for menu for home title */
	add_settings_field(
		'st-search-menu-home-title',
		__('Menu home title', 'sobex-tech'),
		'sobextech_menu_home_title_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'menu_menu_home_title',
			'id'        => 'st-search-menu-home-title',
			'class'     => 'st-search-menu-home-title',
			'options'   => $stsearch_style_get_opts,
		)
	);

	/* @ Start Css Customizing */
	add_settings_field(
		'sobex-tech-css-customize-data-field',
		__('Css Customize', 'sobex-tech'),
		'sobextech_css_customize_data_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'sobex_css_customize_data',
			'id'        => 'sobex-tech-css-customize-data',
			'class'     => 'sobex-tech-css-customize-data',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Header Widget position */
	add_settings_field(
		'st-search-widget-header-position-class',
		__('Header Widget Position', 'sobex-tech'),
		'sobextech_header_widget_position_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'header_widget_position_attr',
			'id'        => 'st-search-widget-header-position-class',
			'class'     => 'st-search-widget-header-position-class',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Clear Shop Page */
	add_settings_field(
		'sobex-tech-clear-shop-page',
		__('Clear Shop Page', 'sobex-tech'),
		'sobextech_clear_shop_page_ca',
		'st-search-style',
		'st-search-settings-section-2',
		array(
			'name'      => 'sobex_css_clear_shop_page',
			'id'        => 'sobex-tech-clear-shop-page',
			'class'     => 'sobex-tech-clear-shop-page',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field For save tables */
	add_settings_field(
		'sobex-tech-save-table',
		__('save table', 'sobex-tech'),
		'sobextech_save_table',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'sobextech_save_table',
			'id'        => 'sobex-tech-save-table',
			'class'     => 'sobex-tech-save-table',
			'options'   => $stsearch_style_get_opts,
		)
	);
	/* Add Settings Field For Icons */
	add_settings_field(
		'sobex-tech-check-packge-code',
		__('Packge Code', 'sobex-tech'),
		'sobextech_check_packge_code_a',
		'sobex-tech',
		'st-search-settings-section-1',
		array(
			'name'      => 'sobex_tech_check_packge_code',
			'id'        => 'sobex-tech-check-packge-code',
			'class'     => 'sobex-tech-check-packge-code',
			'options'   => $stsearch_style_get_opts,
		)
	);
	
}
add_action( 'admin_init', 'sobextech_settings_init_style' );


/**** Start adding Input Fields ****/


// settings section HTML 
function sobextech_settings_section_ca(){
  // echo _e("Page to edit widget Style", 'sobex-tech');
}

// For Style Mode
function sobextech_style_mode_sidebar_ca(){
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-style-mode-switch-container">
	<input type="radio" name="stsearch_style_opts[style_mode_sidebar]" value="all" id="st-search-settings-style-mode-sidebar-all" <?php if(isset($stsearch_get_opts['style_mode_sidebar'])){ if($stsearch_get_opts['style_mode_sidebar'] == 'all'){echo "checked"; }} ?>>
	<label for="st-search-settings-style-mode-sidebar-all"><a><?php echo esc_html_e("All",'sobex-tech'); ?></a></label>
	<input type="radio" name="stsearch_style_opts[style_mode_sidebar]" value="separted" id="st-search-settings-style-mode-sidebar-separted" <?php if(isset($stsearch_get_opts['style_mode_sidebar'])){ if($stsearch_get_opts['style_mode_sidebar'] == 'separted'){echo "checked"; }} ?>>
	<label for="st-search-settings-style-mode-sidebar-separted"><a><?php echo esc_html_e("Separted",'sobex-tech'); ?></a></label>
	</div>
	<?php
}
// For Widget sidebar icon
function sobextech_widget_icon_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Widget Icon','sobex-tech');?></a>
	<div class="all-settings-header-slide st-search-settings-widget-icon">
	<label for="st-search-settings-widget-icon">
				<input type="text" name="stsearch_style_opts[widget_sidebar_icon]" id="st-search-settings-widget-icon" value="<?php echo (isset($stsearch_style_get_opts['widget_sidebar_icon']) && !empty($stsearch_style_get_opts['widget_sidebar_icon']))? esc_attr($stsearch_style_get_opts['widget_sidebar_icon']) : 'sobex-tech-menu' ?>">
				<a  id="st-search-settings-widget-icon-choice" class='sobex-widget-menu-icon-details-choice-icon'><?php esc_html_e('Choice Icon');?></a>
	</label>
	</div>
	</div>
	<?php
}
function sobextech_widget_icon_color_ca() {
	global $stsearch_style_get_opts;
	?>
		<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Widget Icon Color','sobex-tech');?></a>
	<label for="st-search-settings-widget-icon-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[widget_icon_color]" value="<?php if(isset($stsearch_style_get_opts['widget_icon_color'])){echo esc_attr($stsearch_style_get_opts['widget_icon_color']); }else{echo '#16a27b';}?>" id="st-search-settings-widget-icon-color" >
	</label>
		</div>
	<?php
}
function sobextech_widget_table_text_color_ca() {
	global $stsearch_style_get_opts;
	?>
			<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Widget Tabel Text Color','sobex-tech');?></a>
	<label for="st-search-settings-widget-table-text-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[widget_table_text_color]" value="<?php if(isset($stsearch_style_get_opts['widget_table_text_color'])){echo esc_attr($stsearch_style_get_opts['widget_table_text_color']); }else{echo '#5d5d5d';}?>" id="st-search-settings-widget-table-text-color" >
	</label>
	</div>
	<?php
}
function sobextech_widget_table_font_size_ca() {
	global $stsearch_style_get_opts;
	?>
			<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Widget Tabel Font Size','sobex-tech');?></a>
	<label for="st-search-settings-widget-table-font-size">
				<input type="number" name="stsearch_style_opts[widget_table_font_size]" value="<?php if(isset($stsearch_style_get_opts['widget_table_font_size'])){echo esc_attr($stsearch_style_get_opts['widget_table_font_size']); }else{echo '14';}?>" id="st-search-settings-widget-table-font-size" >
	</label>
	</div>
	<?php
}
function sobextech_widget_table_buttons_font_size_ca() {
	global $stsearch_style_get_opts;
	?>
			<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Buttons Font Size','sobex-tech');?></a>
	<label for="st-search-settings-widget-table-buttons-font-size">
				<input type="number" name="stsearch_style_opts[widget_table_buttons_font_size]" value="<?php if(isset($stsearch_style_get_opts['widget_table_buttons_font_size'])){echo esc_attr($stsearch_style_get_opts['widget_table_buttons_font_size']); }else{echo '14';}?>" id="st-search-settings-widget-table-buttons-font-size" >
	</label>
	</div>
	<?php
}
function sobextech_widget_field_text_color_ca() {
	global $stsearch_style_get_opts;
	?>
				<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Widget field Text Color','sobex-tech');?></a>
	<label for="st-search-settings-field-text-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[widget_field_text_color]" value="<?php if(isset($stsearch_style_get_opts['widget_field_text_color'])){echo esc_attr($stsearch_style_get_opts['widget_field_text_color']); }else{echo '#5d5d5d';}?>" id="st-search-settings-field-text-color" >
	</label>
	</div>
	<?php
}
function sobextech_widget_field_font_size_ca() {
	global $stsearch_style_get_opts;
	?>
			<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Widget field Font Size','sobex-tech');?></a>
	<label for="st-search-settings-field-font-size">
				<input type="number" name="stsearch_style_opts[widget_field_font_size]" value="<?php if(isset($stsearch_style_get_opts['widget_field_font_size'])){echo esc_attr($stsearch_style_get_opts['widget_field_font_size']); }else{echo '14';}?>" id="st-search-settings-field-font-size" >
	</label>
	</div>
	<?php
}
function sobextech_widget_icon_slideup_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Widget Slideup Icon','sobex-tech');?></a>
	<div class="all-settings-header-slide st-search-settings-widget-icon-slideup">
	<label for="st-search-settings-widget-icon-slideup">
				<input type="text" name="stsearch_style_opts[widget_icon_slideup]" id="st-search-settings-widget-icon-slideup" value="<?php echo (isset($stsearch_style_get_opts['widget_icon_slideup']) && !empty($stsearch_style_get_opts['widget_icon_slideup']))? esc_attr($stsearch_style_get_opts['widget_icon_slideup']) : 'sobex-tech-up-arrow' ?>">
				<a  id="st-search-settings-widget-icon-slideup-choice" class='sobex-widget-menu-icon-details-choice-icon'><?php esc_html_e('Choice Icon');?></a>
	</label>
	</div>
	</div>
	<?php
}
function sobextech_widget_icon_slideup_color_ca() {
	global $stsearch_style_get_opts;
	?>
						<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Widget Icon Slideup Color','sobex-tech');?></a>
	<label for="st-search-settings-widget-icon-slideup-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[widget_icon_slideup_color]" value="<?php if(isset($stsearch_style_get_opts['widget_icon_slideup_color'])){echo esc_attr($stsearch_style_get_opts['widget_icon_slideup_color']); }else{echo '#16a27b';}?>" id="st-search-settings-widget-icon-slideup-color" >
	</label>
	</div>
	<?php
}
function sobextech_widget_icon_slidedown_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Widget Slidedown Icon','sobex-tech');?></a>
	<div class="all-settings-header-slide st-search-settings-widget-icon-slidedown">
	<label for="st-search-settings-widget-icon-slidedown">
				<input type="text" name="stsearch_style_opts[widget_icon_slidedown]" id="st-search-settings-widget-icon-slidedown" value="<?php echo (isset($stsearch_style_get_opts['widget_icon_slidedown']) && !empty($stsearch_style_get_opts['widget_icon_slidedown']))? esc_attr($stsearch_style_get_opts['widget_icon_slidedown']) : 'sobex-tech-arrow-down-sign-to-navigate' ?>">
				<a  id="st-search-settings-widget-icon-slidedown-choice" class='sobex-widget-menu-icon-details-choice-icon'><?php esc_html_e('Choice Icon');?></a>
	</label>
	</div>
	</div>
	<?php
}
function sobextech_widget_icon_slidedown_color_ca() {
	global $stsearch_style_get_opts;
	?>
			<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Widget Slidedown Icon Color','sobex-tech');?></a>
	<label for="st-search-settings-widget-icon-slidedown-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[widget_icon_slidedown_color]" value="<?php if(isset($stsearch_style_get_opts['widget_icon_slidedown_color'])){echo esc_attr($stsearch_style_get_opts['widget_icon_slidedown_color']); }else{echo '#16a27b';}?>" id="st-search-settings-widget-icon-slidedown-color" >
	</label>
	</div>
	<?php
}
function sobextech_widget_search_background_color_ca() {
	global $stsearch_style_get_opts;
	?>
				<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Widget Search Background color','sobex-tech');?></a>
	<label for="st-search-settings-widget-search-backround-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[widget_search_background_color]" value="<?php if(isset($stsearch_style_get_opts['widget_search_background_color'])){echo esc_attr($stsearch_style_get_opts['widget_search_background_color']); }else{echo '#f4f4f4';}?>" id="st-search-settings-widget-search-backround-color" >
	</label>
	</div>
	<?php
}
function sobextech_widget_search_background_hover_ca() {
	global $stsearch_style_get_opts;
	?>
				<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Widget Search Background hover','sobex-tech');?></a>
	<label for="st-search-settings-widget-search-backround-hover">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[widget_search_background_hover]" value="<?php if(isset($stsearch_style_get_opts['widget_search_background_hover'])){echo esc_attr($stsearch_style_get_opts['widget_search_background_hover']); }else{echo '#aae2d6';}?>" id="st-search-settings-widget-search-backround-hover" >
	</label>
	</div>
	<?php
}
function sobextech_widget_search_title_color_ca() {
	global $stsearch_style_get_opts;
	?>
				<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Widget Search Title Color','sobex-tech');?></a>
	<label for="st-search-settings-widget-search-title-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[widget_search_title_color]" value="<?php if(isset($stsearch_style_get_opts['widget_search_title_color'])){echo esc_attr($stsearch_style_get_opts['widget_search_title_color']); }else{echo '#636363';}?>" id="st-search-settings-widget-search-title-color" >
	</label>
	</div>
	<?php
}
function sobextech_widget_search_icon_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Widget Search Icon','sobex-tech');?></a>
	<div class="all-settings-header-slide st-search-settings-widget-search-icon">
	<label for="st-search-settings-widget-search-icon">
				<input type="text" name="stsearch_style_opts[widget_search_icon]" id="st-search-settings-widget-search-icon" value="<?php echo (isset($stsearch_style_get_opts['widget_search_icon']) && !empty($stsearch_style_get_opts['widget_search_icon']))? esc_attr($stsearch_style_get_opts['widget_search_icon']) : 'sobex-tech-checked-1' ?>">
				<a  id="st-search-settings-widget-search-icon-choice" class='sobex-widget-menu-icon-details-choice-icon'><?php esc_html_e('Choice Icon');?></a>
	</label>
	</div>
	</div>
	<?php
}
function sobextech_widget_search_icon_color_ca() {
	global $stsearch_style_get_opts;
	?>
						<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Widget Search Icon Color','sobex-tech');?></a>
	<label for="st-search-settings-widget-search-icon-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[widget_search_icon_color]" value="<?php if(isset($stsearch_style_get_opts['widget_search_icon_color'])){echo esc_attr($stsearch_style_get_opts['widget_search_icon_color']); }else{echo '#16a27b';}?>" id="st-search-settings-widget-search-icon-color" >
	</label>
	</div>
	<?php
}
function sobextech_widget_clear_icon_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Widget clear Icon Color','sobex-tech');?></a>
	<div class="all-settings-header-slide st-search-settings-widget-clear-icon">
	<label for="st-search-settings-widget-clear-icon">
				<input type="text" name="stsearch_style_opts[widget_clear_icon]" id="st-search-settings-widget-clear-icon" value="<?php echo (isset($stsearch_style_get_opts['widget_clear_icon']) && !empty($stsearch_style_get_opts['widget_clear_icon']))? esc_attr($stsearch_style_get_opts['widget_clear_icon']) : 'sobex-tech-unchecked' ?>">
				<a  id="st-search-settings-widget-clear-icon-choice" class='sobex-widget-menu-icon-details-choice-icon'><?php esc_html_e('Choice Icon');?></a>
	</label>
	</div>
	</div>
	<?php
}
function sobextech_widget_clear_icon_color_ca() {
	global $stsearch_style_get_opts;
	?>
						<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Widget clear Icon Color','sobex-tech');?></a>
	<label for="st-search-settings-widget-clear-icon-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[widget_clear_icon_color]" value="<?php if(isset($stsearch_style_get_opts['widget_clear_icon_color'])){echo esc_attr($stsearch_style_get_opts['widget_clear_icon_color']); }else{echo '#16a27b';}?>" id="st-search-settings-widget-clear-icon-color" >
	</label>
	</div>
	<?php
}
function sobextech_widget_table_radius_ca() {
	global $stsearch_style_get_opts;
	?>
							<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Widget Table radius','sobex-tech');?></a>
	<label for="st-search-settings-widget-table-radius">
		<select name="stsearch_style_opts[widget_table_radius]" id="st-search-settings-widget-table-radius" class="icon">
			<option value="0" <?php selected(!empty($stsearch_style_get_opts['menu_border_radius']) && $stsearch_style_get_opts['menu_display_shadow'] === '0', true); ?>><?php esc_html_e('none', 'sobex-tech');?></option>
			<option value="5" <?php selected(!empty($stsearch_style_get_opts['menu_border_radius']) && $stsearch_style_get_opts['menu_display_shadow'] === '5', true);  if (empty($stsearch_style_get_opts['widget_table_radius'])) { echo 'selected'; }?> ><?php esc_html_e('25%', 'sobex-tech'); ?> </option>
			<option value="10" <?php selected(!empty($stsearch_style_get_opts['menu_border_radius']) && $stsearch_style_get_opts['menu_display_shadow'] === '10', true); ?>><?php esc_html_e('50%', 'sobex-tech');?></option>
			<option value="15" <?php selected(!empty($stsearch_style_get_opts['menu_border_radius']) && $stsearch_style_get_opts['menu_display_shadow'] === '15', true); ?>><?php esc_html_e('75%', 'sobex-tech');?></option>
			<option value="20" <?php selected(!empty($stsearch_style_get_opts['menu_border_radius']) && $stsearch_style_get_opts['menu_display_shadow'] === '20', true); ?>><?php esc_html_e('100%', 'sobex-tech');?></option>
		</select>
	</label>
	</div>
	<?php
}
function sobextech_widget_table_background_color_ca() {
	global $stsearch_style_get_opts;
	?>
								<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Widget Table Background Color','sobex-tech');?></a>
	<label for="st-search-settings-widget-table-background-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[widget_table_background_color]" value="<?php if(isset($stsearch_style_get_opts['widget_table_background_color'])){echo esc_attr($stsearch_style_get_opts['widget_table_background_color']); }else{echo '#f4f4f4';}?>" id="st-search-settings-widget-table-background-color" >
	</label>
	</div>
	<?php
}
function sobextech_filter_all_text_color_ca() {
	global $stsearch_style_get_opts;
	?>
									<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Filter All Text Color','sobex-tech');?></a>
	<label for="st-search-settings-filter-all-text-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[filter_all_text_color]" value="<?php if(isset($stsearch_style_get_opts['filter_all_text_color'])){echo esc_attr($stsearch_style_get_opts['filter_all_text_color']); }else{echo '#3f3f3f';}?>" id="st-search-settings-filter-all-text-color" >
	</label>
	</div>
	<?php
}
function sobextech_filter_all_icon_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Filter All Icon','sobex-tech');?></a>
	<div class="all-settings-header-slide st-search-settings-filter-all-icon">
	<label for="st-search-settings-filter-all-icon">
				<input type="text" name="stsearch_style_opts[filter_all_icon]" id="st-search-settings-filter-all-icon" value="<?php echo (isset($stsearch_style_get_opts['filter_all_icon']) && !empty($stsearch_style_get_opts['filter_all_icon']))? esc_attr($stsearch_style_get_opts['filter_all_icon']) : 'sobex-tech-checked-1' ?>">
				<a  id="st-search-settings-filter-all-icon-choice" class='sobex-widget-menu-icon-details-choice-icon'><?php esc_html_e('Choice Icon');?></a>
	</label>
	</div>
	</div>
	<?php
}
function sobextech_filter_all_icon_color_ca() {
	global $stsearch_style_get_opts;
	?>
			<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Filter All Icon Color','sobex-tech');?></a>
	<label for="st-search-settings-filter-all-icon-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[filter_all_icon_color]" value="<?php if(isset($stsearch_style_get_opts['filter_all_icon_color'])){echo esc_attr($stsearch_style_get_opts['filter_all_icon_color']); }else{echo '#16a27b';}?>" id="st-search-settings-filter-all-icon-color" >
	</label>
	</div>
	<?php
}
function sobextech_clear_all_text_color_ca() {
	global $stsearch_style_get_opts;
	?>
				<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Clear All Text Color','sobex-tech');?></a>
	<label for="st-search-settings-clear-all-text-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[clear_all_text_color]" value="<?php if(isset($stsearch_style_get_opts['clear_all_text_color'])){echo esc_attr($stsearch_style_get_opts['clear_all_text_color']); }else{echo '#3f3f3f';}?>" id="st-search-settings-clear-all-text-color" >
	</label>
	</div>
	<?php
}
function sobextech_clear_all_icon_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Clear All Icon','sobex-tech');?></a>
	<div class="all-settings-header-slide st-search-settings-clear-all-icon">
	<label for="st-search-settings-clear-all-icon">
				<input type="text" name="stsearch_style_opts[clear_all_icon]" id="st-search-settings-clear-all-icon" value="<?php echo (isset($stsearch_style_get_opts['clear_all_icon']) && !empty($stsearch_style_get_opts['clear_all_icon']))? esc_attr($stsearch_style_get_opts['clear_all_icon']) : 'sobex-tech-unchecked' ?>">
				<a  id="st-search-settings-clear-all-icon-choice" class='sobex-widget-menu-icon-details-choice-icon'><?php esc_html_e('Choice Icon');?></a>
	</label>
	</div>
	</div>
	<?php
}
function sobextech_clear_all_icon_color_ca() {
	global $stsearch_style_get_opts;
	?>
						<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Clear All Icon Color','sobex-tech');?></a>
	<label for="st-search-settings-clear-all-icon-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[clear_all_icon_color]" value="<?php if(isset($stsearch_style_get_opts['clear_all_icon_color'])){echo esc_attr($stsearch_style_get_opts['clear_all_icon_color']); }else{echo '#16a27b';}?>" id="st-search-settings-clear-all-icon-color" >
	</label>
	
	<?php
	?>
	</div>
	<?php
}
// for scroll type
function sobextech_sidebar_scroll_type_ca () {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Scroll Type','sobex-tech');?></a>
	<label for="st-search-settings-sidebar-scroll-type">
		<select name="stsearch_style_opts[sidebar_scroll_type]" id="st-search-settings-sidebar-scroll-type" class="icon">
			<option value="scroll" <?php selected(!empty($stsearch_style_get_opts['sidebar_scroll_type']) && $stsearch_style_get_opts['sidebar_scroll_type'] === 'scroll', true); ?>><?php esc_html_e('Scroll Down(Mouse)', 'sobex-tech');?></option>
			<option value="button" disabled <?php selected(!empty($stsearch_style_get_opts['sidebar_scroll_type']) && $stsearch_style_get_opts['sidebar_scroll_type'] === 'button', true); ?>><?php esc_html_e('Button: Show(More&less)', 'sobex-tech');?></option>
		</select>
	</label>
	</div>
	<?php
}
// for scroll color
function sobextech_sidebar_scroll_color_ca () {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Scroll Color','sobex-tech');?></a>
	<label for="st-search-settings-sidebar-scroll-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[sidebar_scroll_color]" value="<?php if(isset($stsearch_style_get_opts['sidebar_scroll_color'])){echo esc_attr($stsearch_style_get_opts['sidebar_scroll_color']); }else{echo '#aae2d6';}?>" id="st-search-settings-sidebar-scroll-color" >
	</label>
	
	<?php
	?>
	</div>
	<?php
}
// for scroll height
function sobextech_sidebar_scroll_height_ca () {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Scroll Height','sobex-tech');?></a>
	<label for="st-search-settings-sidebar-scroll-height">
				<input type="number" name="stsearch_style_opts[sidebar_scroll_height]" value="<?php if(isset($stsearch_style_get_opts['sidebar_scroll_height'])){echo esc_attr($stsearch_style_get_opts['sidebar_scroll_height']); }else{echo '138';}?>" id="st-search-settings-sidebar-scroll-height" >
	</label>
	
	<?php
	?>
	</div>
	<?php
}
function sobextech_hide_sidebar_container_background_color_ca() {
	global $stsearch_style_get_opts;
	?>

							<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Hide Sidebar Container background','sobex-tech');?></a>
	<label for="st-search-settings-hide-sidebar-container-background-color">
		<select name="stsearch_style_opts[hide_sidebar_container_background_color]" id="st-search-settings-hide-sidebar-container-background-color" class="icon">
			<option value="unset" <?php selected(!empty($stsearch_style_get_opts['hide_sidebar_container_background_color']) && $stsearch_style_get_opts['hide_sidebar_container_background_color'] === 'none', true); ?>><?php esc_html_e('Hide', 'sobex-tech');?></option>
			<option value="show" <?php selected(!empty($stsearch_style_get_opts['hide_sidebar_container_background_color']) && $stsearch_style_get_opts['hide_sidebar_container_background_color'] === 'show', true); if (empty($stsearch_style_get_opts['hide_sidebar_container_background_color'])) { echo 'selected'; }?> ><?php esc_html_e('Show', 'sobex-tech');?></option>
		</select>
	</label>
	</div>
	<?php
}
function sobextech_sidebar_container_background_color_ca() {
	global $stsearch_style_get_opts;
	?>
					<div class="st-search-setting-container hide-st-search-settings-sidebar-container-background-color">
		<a class="st-search-setting-title"><?php esc_html_e('Sidebar Container background color','sobex-tech');?></a>
	<label for="st-search-settings-sidebar-container-background-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[sidebar_container_background_color]" value="<?php if(isset($stsearch_style_get_opts['sidebar_container_background_color'])){echo esc_attr($stsearch_style_get_opts['sidebar_container_background_color']); }else{echo '#FFFFFF';}?>" id="st-search-settings-sidebar-container-background-color" >
	</label>
	</div>
	<?php
}
// For menu Style
// For menu icon slide
function sobextech_menu_icon_slide_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Menu Icon Slide','sobex-tech');?></a>
	<div class="all-settings-header-slide st-search-menu-icon-slide">
	<label for="st-search-menu-icon-slide">
				<input type="text" name="stsearch_style_opts[menu_menu_icon_slide]" id="st-search-menu-icon-slide" value="<?php echo (isset($stsearch_style_get_opts['menu_menu_icon_slide']) && !empty($stsearch_style_get_opts['menu_menu_icon_slide']))? esc_attr($stsearch_style_get_opts['menu_menu_icon_slide']) : 'sobex-tech-plus-1' ?>">
				<a  id="st-search-menu-icon-slide-choice" class='sobex-widget-menu-icon-details-choice-icon'><?php esc_html_e('Choice Icon');?></a>
	</label>
	</div>
	</div>
	<?php
}
// For menu icon color slide
function sobextech_menu_icon_color_slide_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Menu Slide Icon Color','sobex-tech');?></a>
	<label for="st-search-menu-icon-color-slide">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[menu_menu_icon_color_slide]" value="<?php echo (isset($stsearch_style_get_opts['menu_menu_icon_color_slide']) && !empty($stsearch_style_get_opts['menu_menu_icon_color_slide']))? esc_attr($stsearch_style_get_opts['menu_menu_icon_color_slide']) : esc_attr('#c9c9c9'); ?>" id="st-search-menu-icon-color-slide" >
	</label>
	</div>
	<?php
}
function sobextech_menu_breadcrumb_font_size_ca() {
	global $stsearch_style_get_opts;
	?>
			<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Breadcrumb Font Size','sobex-tech');?></a>
	<label for="st-search-menu-breadcrumb-font-size">
				<input type="number" name="stsearch_style_opts[menu_menu_breadcrumb_font_size]" value="<?php if(isset($stsearch_style_get_opts['menu_menu_breadcrumb_font_size'])){echo esc_attr($stsearch_style_get_opts['menu_menu_breadcrumb_font_size']); }else{echo '12';}?>" id="st-search-menu-breadcrumb-font-size" >
	</label>
	</div>
	<?php
}
function sobextech_menu_buttons_font_size_ca() {
	global $stsearch_style_get_opts;
	?>
			<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Buttons Font Size','sobex-tech');?></a>
	<label for="st-search-menu-buttons-font-size">
				<input type="number" name="stsearch_style_opts[menu_menu_buttons_font_size]" value="<?php if(isset($stsearch_style_get_opts['menu_menu_buttons_font_size'])){echo esc_attr($stsearch_style_get_opts['menu_menu_buttons_font_size']); }else{echo '12';}?>" id="st-search-menu-buttons-font-size" >
	</label>
	</div>
	<?php
}
function sobextech_menu_title_font_size_ca() {
	global $stsearch_style_get_opts;
	?>
			<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Title Font Size','sobex-tech');?></a>
	<label for="st-search-menu-title-font-size">
				<input type="number" name="stsearch_style_opts[menu_menu_title_font_size]" value="<?php if(isset($stsearch_style_get_opts['menu_menu_title_font_size'])){echo esc_attr($stsearch_style_get_opts['menu_menu_title_font_size']); }else{echo '12';}?>" id="st-search-menu-title-font-size" >
	</label>
	</div>
	<?php
}
// For menu buttons title color
function sobextech_menu_buttons_title_color_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Buttons title Color','sobex-tech');?></a>
	<label for="st-search-menu-buttons-title-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[menu_menu_buttons_title_color]" value="<?php echo (isset($stsearch_style_get_opts['menu_menu_buttons_title_color']) && !empty($stsearch_style_get_opts['menu_menu_buttons_title_color']))? esc_attr($stsearch_style_get_opts['menu_menu_buttons_title_color']) : esc_attr('#8e8e8e'); ?>" id="st-search-menu-buttons-title-color" >
	</label>
	</div>
	<?php
}
// For menu buttons background color
function sobextech_menu_buttons_background_color_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Buttons Background Color','sobex-tech');?></a>
	<label for="st-search-menu-buttons-background-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[menu_menu_buttons_background_color]" value="<?php echo (isset($stsearch_style_get_opts['menu_menu_buttons_background_color']) && !empty($stsearch_style_get_opts['menu_menu_buttons_background_color']))? esc_attr($stsearch_style_get_opts['menu_menu_buttons_background_color']) : esc_attr('#f4f4f4'); ?>" id="st-search-menu-buttons-background-color" >
	</label>
	</div>
	<?php
}
// For menu buttons background hover
function sobextech_menu_buttons_background_hover_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Buttons Background hover','sobex-tech');?></a>
	<label for="st-search-menu-buttons-background-hover">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[menu_menu_buttons_background_hover]" value="<?php echo (isset($stsearch_style_get_opts['menu_menu_buttons_background_hover']) && !empty($stsearch_style_get_opts['menu_menu_buttons_background_hover']))? esc_attr($stsearch_style_get_opts['menu_menu_buttons_background_hover']) : esc_attr('#eaeaea'); ?>" id="st-search-menu-buttons-background-hover" >
	</label>
	</div>
	<?php
}
// For menu clear all icon
function sobextech_menu_clear_all_icon_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Clear All Icon','sobex-tech');?></a>
	<div class="all-settings-header-slide st-search-menu-clear-all-icon">
	<label for="st-search-menu-clear-all-icon">
				<input type="text" name="stsearch_style_opts[menu_menu_clear_all_icon]" id="st-search-menu-clear-all-icon" value="<?php echo (isset($stsearch_style_get_opts['menu_menu_clear_all_icon']) && !empty($stsearch_style_get_opts['menu_menu_clear_all_icon']))? esc_attr($stsearch_style_get_opts['menu_menu_clear_all_icon']) : 'sobex-tech-multiply' ?>">
				<a  id="st-search-menu-clear-all-icon-choice" class='sobex-widget-menu-icon-details-choice-icon'><?php esc_html_e('Choice Icon');?></a>
	</label>
	</div>
	</div>
	<?php
}
// For menu filter all icon
function sobextech_menu_filter_all_icon_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Filter All Icon','sobex-tech');?></a>
	<div class="all-settings-header-slide st-search-menu-filter-all-icon">
	<label for="st-search-menu-filter-all-icon">
				<input type="text" name="stsearch_style_opts[menu_menu_filter_all_icon]" id="st-search-menu-filter-all-icon" value="<?php echo (isset($stsearch_style_get_opts['menu_menu_filter_all_icon']) && !empty($stsearch_style_get_opts['menu_menu_filter_all_icon']))? esc_attr($stsearch_style_get_opts['menu_menu_filter_all_icon']) : 'sobex-tech-check-1' ?>">
				<a  id="st-search-menu-filter-all-icon-choice" class='sobex-widget-menu-icon-details-choice-icon'><?php esc_html_e('Choice Icon');?></a>
	</label>
	</div>
	</div>
	<?php
}
// For menu buttons icon color
function sobextech_menu_buttons_icon_color_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Buttons Icon color','sobex-tech');?></a>
	<label for="st-search-menu-buttons-icon-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[menu_menu_buttons_icon_color]" value="<?php echo (isset($stsearch_style_get_opts['menu_menu_buttons_icon_color']) && !empty($stsearch_style_get_opts['menu_menu_buttons_icon_color']))? esc_attr($stsearch_style_get_opts['menu_menu_buttons_icon_color']) : esc_attr('#00820f'); ?>" id="st-search-menu-buttons-icon-color" >
	</label>
	</div>
	<?php
}
function sobextech_menu_title_color_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Menu Title Color','sobex-tech');?></a>
	<label for="st-search-menu-title-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[menu_menu_title_color]" value="<?php echo (isset($stsearch_style_get_opts['menu_menu_title_color']) && !empty($stsearch_style_get_opts['menu_menu_title_color']))? esc_attr($stsearch_style_get_opts['menu_menu_title_color']) : esc_attr('#7a7a7a'); ?>" id="st-search-menu-title-color" >
	</label>
	</div>
	<?php
}
function sobextech_menu_checked_background_color_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Menu Checked Background Color','sobex-tech');?></a>
	<label for="st-search-menu-checked-background-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[menu_menu_checked_background_color]" value="<?php echo (isset($stsearch_style_get_opts['menu_menu_checked_background_color']) && !empty($stsearch_style_get_opts['menu_menu_checked_background_color']))? esc_attr($stsearch_style_get_opts['menu_menu_checked_background_color']) : esc_attr('#aae2d6'); ?>" id="st-search-menu-checked-background-color" >
	</label>
	</div>
	<?php
}
function sobextech_menu_background_color_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Menu Background Color','sobex-tech');?></a>
	<label for="st-search-menu-background-color">
			<input type="text" class="sobex-color-picker" name="stsearch_style_opts[menu_menu_background_color]" value="<?php echo (isset($stsearch_style_get_opts['menu_menu_background_color']) && !empty($stsearch_style_get_opts['menu_menu_background_color']))? esc_attr($stsearch_style_get_opts['menu_menu_background_color']) : esc_attr('#FFF'); ?>" id="st-search-menu-background-color" >
	</label>
	</div>
	<?php
}
function sobextech_menu_hover_color_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Menu Hover Color','sobex-tech');?></a>
	<label for="st-search-menu-hover-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[menu_menu_hover_color]" value="<?php echo (isset($stsearch_style_get_opts['menu_menu_hover_color']) && !empty($stsearch_style_get_opts['menu_menu_hover_color']))? esc_attr($stsearch_style_get_opts['menu_menu_hover_color']) : esc_attr('#d8d8d8'); ?>" id="st-search-menu-hover-color" >
	</label>
	</div>
	<?php
}
function sobextech_menu_breadcrumb_title_color_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Menu breadcrumb title color','sobex-tech');?></a>
	<label for="st-search-menu-breadcrumb-title-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[menu_breadcrumb_title_color]" value="<?php echo (isset($stsearch_style_get_opts['menu_breadcrumb_title_color']) && !empty($stsearch_style_get_opts['menu_breadcrumb_title_color']))? esc_attr($stsearch_style_get_opts['menu_breadcrumb_title_color']) : esc_attr('#6d6d6d'); ?>" id="st-search-menu-breadcrumb-title-color" >
			
	</label>
	</div>
	<?php
}
function sobextech_menu_breadcrumb_background_title_color_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Menu background title color','sobex-tech');?></a>
	<label for="st-search-menu-breadcrumb-background-title-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[menu_breadcrumb_background_title_color]" value="<?php echo (isset($stsearch_style_get_opts['menu_breadcrumb_background_title_color']) && !empty($stsearch_style_get_opts['menu_breadcrumb_background_title_color']))? esc_attr($stsearch_style_get_opts['menu_breadcrumb_background_title_color']) : esc_attr('#E6E6E6'); ?>" id="st-search-menu-breadcrumb-background-title-color" >
	</label>
	</div>
	<?php
}
function sobextech_menu_breadcrumb_background_hover_color_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Menu background Hover color','sobex-tech');?></a>
	<label for="st-search-menu-breadcrumb-background-hover-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[menu_breadcrumb_background_hover_color]" value="<?php echo (isset($stsearch_style_get_opts['menu_breadcrumb_background_hover_color']) && !empty($stsearch_style_get_opts['menu_breadcrumb_background_hover_color']))? esc_attr($stsearch_style_get_opts['menu_breadcrumb_background_hover_color']) : esc_attr('#aae2d6'); ?>" id="st-search-menu-breadcrumb-background-hover-color" >
	</label>
	</div>
	<?php
}
function sobextech_menu_scrollbar_color_ca() {
	global $stsearch_style_get_opts;
	?>
					<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Menu Scrollbar color','sobex-tech');?></a>
	<label for="st-search-menu-scrollbar-color">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[menu_scrollbar_color]" value="<?php if(isset($stsearch_style_get_opts['menu_scrollbar_color'])){echo esc_attr($stsearch_style_get_opts['menu_scrollbar_color']); }else{echo '#aae2d6';}?>" id="st-search-menu-scrollbar-color" >
	</label>
	</div>
	<?php
}
function sobextech_menu_display_shadow_ca() {
	global $stsearch_style_get_opts;
	
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Menu display shadow','sobex-tech');?></a>
	<label for="st-search-menu-display-shadow">
		<select name="stsearch_style_opts[menu_display_shadow]" id="st-search-menu-display-shadow" class="icon">
			<option value="on" <?php selected(!empty($stsearch_style_get_opts['menu_display_shadow']) && $stsearch_style_get_opts['menu_display_shadow'] === 'on', true); ?>><?php esc_html_e('Turn On', 'sobex-tech');?></option>
			<option value="off" <?php selected(!empty($stsearch_style_get_opts['menu_display_shadow']) && $stsearch_style_get_opts['menu_display_shadow'] === 'off', true); if (empty($stsearch_style_get_opts['menu_display_shadow'])) { echo 'selected'; }?> ><?php esc_html_e('Turn Off', 'sobex-tech');?></option>
		</select>
	</label>
	</div>
	<?php
}
function sobextech_menu_background_shadow_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container hide-menu-shadow">
		<a class="st-search-setting-title"><?php esc_html_e('Menu background shadow','sobex-tech');?></a>
	<label for="st-search-menu-background-shadow">
				<input type="text" class="sobex-color-picker" name="stsearch_style_opts[menu_background_shadow]" value="<?php echo (isset($stsearch_style_get_opts['menu_background_shadow']) && !empty($stsearch_style_get_opts['menu_background_shadow']))? esc_attr($stsearch_style_get_opts['menu_background_shadow']) : esc_attr('#B2AEAE'); ?>" id="st-search-menu-background-shadow" >
	</label>
	</div>
	<?php
}
function sobextech_menu_border_radius_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Menu Border radius','sobex-tech');?></a>
	<label for="st-search-menu-border-radius">
		<select name="stsearch_style_opts[menu_border_radius]" id="st-search-menu-border-radius" class="icon">
			<option value="0" <?php selected(!empty($stsearch_style_get_opts['menu_border_radius']) && $stsearch_style_get_opts['menu_display_shadow'] === '0', true); ?>><?php esc_html_e('none', 'sobex-tech');?></option>
			<option value="5" <?php selected(!empty($stsearch_style_get_opts['menu_border_radius']) && $stsearch_style_get_opts['menu_display_shadow'] === '5', true); ?>><?php esc_html_e('25%', 'sobex-tech');?></option>
			<option value="10" <?php selected(!empty($stsearch_style_get_opts['menu_border_radius']) && $stsearch_style_get_opts['menu_display_shadow'] === '10', true); ?>><?php esc_html_e('50%', 'sobex-tech');?></option>
			<option value="15" <?php selected(!empty($stsearch_style_get_opts['menu_border_radius']) && $stsearch_style_get_opts['menu_display_shadow'] === '15', true); ?>><?php esc_html_e('75%', 'sobex-tech');?></option>
			<option value="20" <?php selected(!empty($stsearch_style_get_opts['menu_border_radius']) && $stsearch_style_get_opts['menu_display_shadow'] === '20', true); ?>><?php esc_html_e('100%', 'sobex-tech');?></option>
		</select>
	</label>
	</div>
	<?php
}
function sobextech_menu_z_index_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Menu z-index','sobex-tech');?></a>
	<label for="st-search-menu-z-index">
	<input type="number" name="stsearch_style_opts[menu_menu_z_index]" id="st-search-menu-z-index" value="<?php echo (isset($stsearch_style_get_opts['menu_menu_z_index']) && !empty($stsearch_style_get_opts['menu_menu_z_index']))? esc_attr($stsearch_style_get_opts['menu_menu_z_index']) : '40'; ?>">
	</label>
	</div>
	<?php
}
function sobextech_menu_home_title_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="st-search-setting-container">
		<a class="st-search-setting-title"><?php esc_html_e('Menu home title','sobex-tech');?></a>
	<label for="st-search-menu-home-title">
	<input type="text" name="stsearch_style_opts[menu_menu_home_title]" id="st-search-menu-home-title" value="<?php echo (isset($stsearch_style_get_opts['menu_menu_home_title']) && !empty($stsearch_style_get_opts['menu_menu_home_title']))? esc_attr($stsearch_style_get_opts['menu_menu_home_title']) : esc_html_e('Home','sobex-tech'); ?>">
	</label>
	</div>
	<?php
}
// For css Customize
function sobextech_css_customize_data_ca() {
	global $stsearch_style_get_opts;
	?>
	<label for="sobex-tech-css-customize-data">
		<textarea name="stsearch_style_opts[sobex_css_customize_data]" id="sobex-tech-css-customize-data" cols="100" rows="10"><?php echo (isset($stsearch_style_get_opts['sobex_css_customize_data']) && !empty($stsearch_style_get_opts['sobex_css_customize_data']))? esc_attr($stsearch_style_get_opts['sobex_css_customize_data']) : null; ?></textarea>
	</label>
	<?php
}
// For Header widget class
function sobextech_header_widget_position_ca() {
	global $stsearch_style_get_opts;
	?>
	<label for="st-search-widget-header-position-class">
		<input type="text" name="stsearch_style_opts[header_widget_position_attr]" id="st-search-widget-header-position-class" value="<?php echo (isset($stsearch_style_get_opts['header_widget_position_attr']) && !empty($stsearch_style_get_opts['header_widget_position_attr']))? esc_attr($stsearch_style_get_opts['header_widget_position_attr']) : '.page-title'; ?>">
	</label>
	<?php
}
// For Clear Shop Page
function sobextech_clear_shop_page_ca() {
	global $stsearch_style_get_opts;
	?>
	<div class="sobex-tech-field-wrapper">
		<div class="sobex-tech-field-inputs">
			<input type="text" name="stsearch_style_opts[sobex_css_clear_shop_page][]" value="<?php echo (isset($stsearch_style_get_opts['sobex_css_clear_shop_page']) && !empty($stsearch_style_get_opts['sobex_css_clear_shop_page']))? esc_attr($stsearch_style_get_opts['sobex_css_clear_shop_page'][0]) : null; ?>"/>
			<a href="javascript:void(0);" class="sobex_clear_shop_add_button"><i class="sobex-tech-plus"></i></a>
		</div>
		<?php 
			$first_clear_shop = 0;
			
			if(isset($stsearch_style_get_opts['sobex_css_clear_shop_page']) || !empty($stsearch_style_get_opts['sobex_css_clear_shop_page'])):
				if((is_array($stsearch_style_get_opts['sobex_css_clear_shop_page']) && count($stsearch_style_get_opts['sobex_css_clear_shop_page']) > 1)):
					foreach($stsearch_style_get_opts['sobex_css_clear_shop_page'] as $sobex_css_clear_shop_page_array):
						$first_clear_shop++;
						if($first_clear_shop > 1):
								?>
								<div class="sobex-tech-field-inputs">
									<input type="text" name="stsearch_style_opts[sobex_css_clear_shop_page][]" value="<?php echo esc_attr($sobex_css_clear_shop_page_array); ?>"/>
									<a href="javascript:void(0);" class="sobex_clear_shop_remove_button"><i class="sobex-tech-minus"></i></a>
								</div>
								<?php
						endif;
					endforeach;
				endif;
			endif;?>
	</div>
	<?php
}
// For Free Icons
function sobextech_check_packge_code_a() {
	global $stsearch_style_get_opts;
	?>
	<label class="sobex-free-icon-field-label" for="sobex-tech-check-packge-code">
		<input type="text" id="sobex-tech-check-packge-code" name="stsearch_style_opts[sobex_tech_check_packge_code]"  value="<?php echo (isset($stsearch_style_get_opts['sobex_tech_check_packge_code']) && !empty($stsearch_style_get_opts['sobex_tech_check_packge_code']))? esc_attr($stsearch_style_get_opts['sobex_tech_check_packge_code']) : ''; ?>">
	</label>
	<?php
}

/** 
 * @ CREATE FUNCTIONS FOR SOBEX TECH ICONS
 */
function sobextech_create_icons_list($icon_list_name) {
	if($icon_list_name === 'default'): 
	$icons =<<<'_CSS'
	.sobex-tech-plus1{content: "\f24a"}.sobex-tech-minus-square-outlined-button{content: "\f24b"}.sobex-tech-minus-2{content: "\f24c"}.sobex-tech-minus-1{content: "\f24d"}.sobex-tech-minus1{content: "\f24e"}.sobex-tech-minus-sign{content: "\f24f"}.sobex-tech-search-2{content: "\f250"}.sobex-tech-search-11{content: "\f251"}.sobex-tech-transparency{content: "\f252"}.sobex-tech-search1{content: "\f253"}.sobex-tech-search-interface-symbol{content: "\f254"}.sobex-tech-cancel-2{content: "\f255"}.sobex-tech-unchecked{content: "\f256"}.sobex-tech-cancel-1{content: "\f257"}.sobex-tech-cancel1{content: "\f258"}.sobex-tech-multiply{content: "\f259"}.sobex-tech-shield-check{content: "\f25a"}.sobex-tech-check-1{content: "\f25b"}.sobex-tech-check-box-with-check-sign{content: "\f25c"}.sobex-tech-checked-1{content: "\f25d"}.sobex-tech-draw-check-mark-5{content: "\f25e"}.sobex-tech-check{content: "\f25f"}.sobex-tech-checked{content: "\f260"}.sobex-tech-down-arrow-3{content: "\f261"}.sobex-tech-down-arrow-2{content: "\f262"}.sobex-tech-down-arrow-1{content: "\f263"}.sobex-tech-down-arrow{content: "\f264"}.sobex-tech-arrow-down-sign-to-navigate{content: "\f265"}.sobex-tech-arrow-up1{content: "\f266"}.sobex-tech-up-arrow-3{content: "\f267"}.sobex-tech-up-arrow-2{content: "\f268"}.sobex-tech-up-arrow-1{content: "\f269"}.sobex-tech-up-arrow{content: "\f26a"}.sobex-tech-arrowheads-of-thin-outline-to-the-left{content: "\f26b"}.sobex-tech-left-arrow-1{content: "\f26c"}.sobex-tech-left-arrow{content: "\f26d"}.sobex-tech-arrow{content: "\f26e"}.sobex-tech-arrow-right1{content: "\f26f"}.sobex-tech-fast-forward{content: "\f270"}.sobex-tech-next{content: "\f271"}.sobex-tech-right-arrow{content: "\f272"}.sobex-tech-beautiful{content: "\f273"}.sobex-tech-menu{content: "\f274"}.sobex-tech-square{content: "\f275"}.sobex-tech-stop{content: "\f276"}.sobex-tech-button{content: "\f277"}.sobex-tech-favorite{content: "\f278"}.sobex-tech-circle{content: "\f279"}.sobex-tech-sharing{content: "\f27a"}.sobex-tech-add-1{content: "\f27b"}.sobex-tech-plus-2{content: "\f27c"}.sobex-tech-add{content: "\f27d"}.sobex-tech-plus-1{content: "\f27e"}
_CSS;
	endif;

	$matches = [];
	preg_match_all('/\.([\w\-]+)/', $icons, $matches);
	$array_icons = $matches[1];

		foreach($array_icons as $array_icon): 
			echo '<div class="sobex-icons-icon-box">';
			
				echo '<label>';
				echo '<input id="'.esc_attr($array_icon).'" type="radio" name="menu_icons" value="'.esc_attr($array_icon).'">';
					echo '<i class="'.esc_attr($array_icon).'"></i>';
				echo '</label>';
			echo '</div>';
 		endforeach;
}
function sobex_tech_select_icons_menu() {

	$open_package = null;
	
	/** Addons Fonts */
	$icon_pack_path = plugin_dir_path(dirname( __FILE__ )) . '/views/assets/fonts/sobex-tech-default-front-fonts-full-pack/style.css';
	if ( file_exists($icon_pack_path) ) {
		$open_package = true;
	}
	
	?>
		<div class="sobex-icons-accordion-main-container">
			<nav class="sobex-icons-accordion-container sobex-icons-arrows">
				<div class="sobex-icons-header-box">
					<label for="sobex-icons-acc-close" class="sobex-icons-box-title sobex-select-icon-for"><?php esc_html_e('Select Icon');?></label>
					<div id="sobex-icons-accordion-close-icons-accordion"><i class="sobex-tech-cancel-2"></i></div>
				</div>
				<input type="radio" name="sobex-icons-accordion" id="cb0" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb0"><?php esc_html_e('default', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('default'); ?>


					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb1" class="sobex-icons-input-content"/>
			<?php if($open_package == true):?>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb1"><?php esc_html_e('Clothes', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('clothes'); ?>


					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb2" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb2"><?php esc_html_e('accessories', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('accessories'); ?>

					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb3" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb3"><?php esc_html_e('Computer', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('computer'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb4" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb4"><?php esc_html_e('Construction tools', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('construction_tools'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb5" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb5"><?php esc_html_e('Electrician tools', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('electrician_tools'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb6" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb6"><?php esc_html_e('Mobile', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('mobile'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb7" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb7"><?php esc_html_e('Home electrical appliances', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('home_electrical_appliances'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb8" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb8"><?php esc_html_e('Fruits and Vegetables', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('fruits_and_vegetables'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb9" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb9"><?php esc_html_e('Home appliances', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('home_appliances'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb10" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb10"><?php esc_html_e('Kitchen', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('kitchen'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb11" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb11"><?php esc_html_e('Mechanics', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('mechanics'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb12" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb12"><?php esc_html_e('Make up', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('makeup'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb13" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb13"><?php esc_html_e('carpentry', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('carpentry'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb14" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb14"><?php esc_html_e('plumber', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('plumber'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb15" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb15"><?php esc_html_e('gym', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('gym'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb16" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb16"><?php esc_html_e('Sport', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('sport'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb17" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb17"><?php esc_html_e('Vechiles', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('vechiles'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="sobex-icons-acc-close" />
				<?php endif;?>
			</nav>
		</div>
	<?php
}
function sobextech_select_icons_widget() {

	$open_package = null;
	/** Addons Fonts */
	$icon_pack_path = plugin_dir_path(dirname( __FILE__ )) . '/views/assets/fonts/sobex-tech-default-front-fonts-full-pack/style.css';
	if ( file_exists($icon_pack_path) ) {
		$open_package = true;
	}
	?>
		<div class="sobex-icons-widget-accordion-main-container">
			<nav class="sobex-icons-accordion-container sobex-icons-arrows">
				<div class="sobex-icons-header-box">
					<label for="sobex-icons-acc-close" class="sobex-icons-box-title sobex-select-icon-for"><?php esc_html_e('Select Icon');?></label>
					<div id="sobex-icons-widget-accordion-close-icons-accordion"><i class="sobex-tech-cancel-2"></i></div>
				</div>
				<input type="radio" name="sobex-icons-accordion" id="cb0" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb0"><?php esc_html_e('default', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('default'); ?>


					</div>
				</section>
				<?php if($open_package == true):?>
				<input type="radio" name="sobex-icons-accordion" id="cb1" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb1"><?php esc_html_e('Clothes', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('clothes'); ?>


					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb2" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb2"><?php esc_html_e('accessories', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('accessories'); ?>

					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb3" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb3"><?php esc_html_e('Computer', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('computer'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb4" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb4"><?php esc_html_e('Construction tools', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('construction_tools'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb5" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb5"><?php esc_html_e('Electrician tools', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('electrician_tools'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb6" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb6"><?php esc_html_e('Mobile', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('mobile'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb7" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb7"><?php esc_html_e('Home electrical appliances', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('home_electrical_appliances'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb8" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb8"><?php esc_html_e('Fruits and Vegetables', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('fruits_and_vegetables'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb9" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb9"><?php esc_html_e('Home appliances', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('home_appliances'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb10" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb10"><?php esc_html_e('Kitchen', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('kitchen'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb11" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb11"><?php esc_html_e('Mechanics', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('mechanics'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb12" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb12"><?php esc_html_e('Make up', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('makeup'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb13" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb13"><?php esc_html_e('carpentry', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('carpentry'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb14" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb14"><?php esc_html_e('plumber', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('plumber'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb15" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb15"><?php esc_html_e('gym', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('gym'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb16" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb16"><?php esc_html_e('Sport', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('sport'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="cb17" class="sobex-icons-input-content"/>
				<section class="sobex-icons-box">
					<label class="sobex-icons-box-title" for="cb17"><?php esc_html_e('Vechiles', 'sobex-tech'); ?></label>
					<label class="sobex-icons-box-close" for="sobex-icons-acc-close"></label>
					<div class="sobex-icons-box-content">

						<div class="sobex-icons-icon-box-container">

						<?php echo sobextech_create_icons_list('vechiles'); ?>
						
					</div>
				</section>
				<input type="radio" name="sobex-icons-accordion" id="sobex-icons-acc-close" />
				<?php endif;?>
			</nav>
		</div>
	<?php
}
function sobex_tech_get_menu() {
	global $stsearch_get_opts;
    function printr_checkbox($data) {
    echo "
    <pre>";
     print_r($data);
    echo 
    "</pre>
    ";
    }
    function populate_children_icons($menu_array, $menu_item)
    {
      $children = array();
      if (!empty($menu_array)){
        foreach ($menu_array as $k=>$m) {
          if ($m->menu_item_parent == $menu_item->ID) {
            $children[$m->ID] = array();
            $children[$m->ID]['ID'] = $m->ID;
            $children[$m->ID]['title'] = $m->title;
            $children[$m->ID]['url'] = $m->url;
            $children[$m->ID]['slug'] = $m->post_name;
          
            unset($menu_array[$k]);
            $children[$m->ID]['children'] = populate_children_icons($menu_array, $m);
          }
        }
      };
      return $children;
    }
    
    function wp_get_menu_array_icons($current_menu) {
    
        $menu_array = wp_get_nav_menu_items($current_menu);
    
        $menu = array();
    
        foreach ($menu_array as $m) {
            if (empty($m->menu_item_parent)) {
                $menu[$m->ID] = array();
                $menu[$m->ID]['ID'] = $m->ID;
                $menu[$m->ID]['title'] = $m->title;
                $menu[$m->ID]['url'] = $m->url;
                $menu[$m->ID]['slug'] = $m->post_name;
                $menu[$m->ID]['children'] = populate_children_icons($menu_array, $m);
            }
        }
    
        return $menu;
    
    }
	function add_menu_class_from_db($id) {
		global $wpdb;
		global $stsearch_get_opts;
		 /* Load Menu From database */
		 $table_name = $wpdb->prefix.'sobex_tech_widget_menu'; // Table Name
		 if( !empty( $stsearch_get_opts['menu_menu_specific_name'] ) ) {
			$current_menu = esc_attr($stsearch_get_opts['menu_menu_specific_name']);
		
		 $rows = $wpdb->get_results( "SELECT * FROM  $table_name WHERE menu_temp_name = '$current_menu'", ARRAY_A);
		 if(isset($rows) && !empty($rows)):
			foreach($rows as $row):
				if($row['menu_id'] == $id):
					if(!empty($row['menu_icon'])):
						echo esc_attr($row['menu_icon']);
					else:
						echo 'sobex-tech-favorite';
					endif;
				endif;
			endforeach;
		 endif;
		}
	}
	function add_menu_color_id_from_db($id) {
		global $wpdb;
		global $stsearch_get_opts;
		 /* Load Menu From database */
		 $table_name = $wpdb->prefix.'sobex_tech_widget_menu'; // Table Name
		 if( !empty( $stsearch_get_opts['menu_menu_specific_name'] ) ) {
			$current_menu = esc_attr($stsearch_get_opts['menu_menu_specific_name']);
		
		 $rows = $wpdb->get_results( "SELECT * FROM  $table_name WHERE menu_temp_name = '$current_menu'", ARRAY_A);
		 if(isset($rows) && !empty($rows)):
			foreach($rows as $row):
				if($row['menu_id'] == $id):
					if(!empty($row['menu_icon_color'])):
						echo esc_attr($row['menu_icon_color']);
					else:
						echo '#16a27b';
					endif;
				endif;
			endforeach;
		 endif;
		}
	}
    function get_menu_html_icons( $menu_array, $level = 1 ){
		?>
			<style>
				details.sobex-widget-menu-slide-icon-details[open] .sobex-widget-menu-slide-icon-details-heading::after {
				content: "<?php echo esc_html_e('Click to Hide.','sobex-tech'); ?>";
				}
				details.sobex-widget-menu-slide-icon-details:not([open]) .sobex-widget-menu-slide-icon-details-heading::after {
				content: "<?php echo esc_html_e('Click to Show.','sobex-tech'); ?>";
				}
			</style>
		<?php
		global $stsearch_style_get_opts;
		$level_childcons = 1;
		$foreach = 0;
    ob_start();

        foreach ($menu_array as $menu_id => $menu) {
			if($level > $level_childcons) {
				echo '<details open class="sobex-widget-menu-slide-icon-details sobex-widget-fourth-child">';
				echo '<a class="sobex-widget-menu-slide-icon-details-link"></a>';
				echo '<summary>';
				echo '<div class="sobex-widget-menu-slide-icon-details-heading">';
				echo "<div class='sobex-widget-menu-slide-icon-details-icon'>";
				echo "<i id='currentchild' class='";
				$child_icon = add_menu_class_from_db($menu['ID']);
				if(!empty($child_icon)): echo esc_attr($child_icon); else: echo 'sobex-tech-left-arrow'; endif;
				echo "'></i>";
			
				
				echo '</div>';
				echo '</div>';
				echo '</summary><div class="sobex-widget-menu-slide-icon-details-body"><div class="sobex-widget-menu-slide-icon-details-info">';
				echo "<a id='currentnamechild' class='sobex-widget-menu-slide-icon-details-name'>"; echo esc_attr($menu['title']); echo"</a>";
				echo "</div>";
				echo "<a id='selected_icon_child' id-child-icon='"; echo esc_attr($menu['ID']); echo"' class='sobex-widget-menu-slide-icon-details-choice-icon'>";
				echo esc_html_e('Choice Icon For All', 'sobex-tech');
				echo "</a>";
				echo "<div class='sobex-widget-menu-slide-icon-choice-color'>";
				echo "<input type='text' class='sobex-color-picker' id='pickcolorforchild'";
				echo "value='";
					echo add_menu_color_id_from_db($menu['ID']);
				echo "'>";
				?><script>jQuery(document).ready(function($){
					
					jQuery('[id=currentchild]').css('color', $('#pickcolorforchild').val());
					jQuery('#pickcolorforchild').wpColorPicker({
						change: function(event, ui){
							var val = ui.color.toString();
							$('[id=currentchild]').css('color', val);
						} 
					});});
				   </script>
				<?php
				echo "</div>";
	
				echo "</div>";

			}else{
			echo '<details open class="sobex-widget-menu-slide-icon-details sobex-widget-first-child">';
			echo '<a class="sobex-widget-menu-slide-icon-details-link"></a>';
			echo '<summary>';
			echo '<div class="sobex-widget-menu-slide-icon-details-heading">';
			echo "<div class='sobex-widget-menu-slide-icon-details-icon'>";
			echo "<i id='current"; echo esc_attr($menu['ID']); echo"' class='";
			echo add_menu_class_from_db($menu['ID']);
			// echo (!empty(add_menu_class_from_db($menu['ID'])))?  add_menu_class_from_db($menu['ID']) : 'sobex-tech-favorite';
			echo "'></i>";
			echo '</div>';
			echo '</div>';
			echo '</summary><div class="sobex-widget-menu-slide-icon-details-body"><div class="sobex-widget-menu-slide-icon-details-info">';
			echo "<a id='currentname"; echo esc_attr($menu['ID']); echo"' class='sobex-widget-menu-slide-icon-details-name'>"; echo esc_attr($menu['title']); echo"</a>";
			echo "</div>";
			echo "<a id='"; echo esc_attr($menu['ID']); echo"' id-parent-icon='"; echo esc_attr($menu['ID']); echo"' class='sobex-widget-menu-slide-icon-details-choice-icon'>";
			echo esc_html_e('Choice Icon', 'sobex-tech');
			echo "</a>";
			echo "<div class='sobex-widget-menu-slide-icon-choice-color'>";
			echo "<input type='text' class='sobex-color-picker' id='pickcolor"; echo esc_attr($menu['ID']); echo "'";
			echo "value='";
				echo add_menu_color_id_from_db($menu['ID']);
			echo "'>";
			?><script>jQuery(document).ready(function($){
				
				jQuery('#current<?php echo esc_attr($menu['ID']); ?>').css('color', $('#pickcolor<?php echo esc_attr($menu['ID']); ?>').val());
				jQuery('#pickcolor<?php echo esc_attr($menu['ID']); ?>').wpColorPicker({
					change: function(event, ui){
						var val = ui.color.toString();
						$('#current<?php echo $menu['ID']; ?>').css('color', val);
					} 
				});});
			   </script>
			<?php
			echo "</div>";

			echo "</div>";
			}

			if ($menu['children']) {
				echo '<div class="sobex-widget-menu-slide-icon-details-replies">';
				if( count($menu['children']) ){
					$new_level = $level + 1;
					echo get_menu_html_icons( $menu['children'], $new_level );
					}

				echo '</div>';
			}
			
         
		
			echo '</details>';
        }


    $menu_html = ob_get_clean();
    return $menu_html;
    }

    // This function will return array of menu items esc_html_e('Filter Now', 'sobex-tech
    if( !empty( $stsearch_get_opts['menu_menu_specific_name'] ) ) {
      $current_menu = $stsearch_get_opts['menu_menu_specific_name'];
      $menu_arrays = wp_get_menu_array_icons($current_menu);
		echo '<div class="sobex-widget-menu-slide-icons-container">';
			  echo sobex_tech_select_icons_menu();
              echo get_menu_html_icons($menu_arrays); 
		echo '</div>';
        
    }else{
      esc_html_e('Please Select Menu First.', 'sobex-tech');
    }

    
}


	

/**** End adding Input Fields ****/

/* Render Page to Admin Panel */
function sobextech_style_settings_page() {
// check user capabilities
if ( ! current_user_can( 'manage_options' ) )
return; 

?>

	<style>
		.submit{
			position: relative;
		}
	</style>

 <form action="options.php" method="post"><!-- Start Form -->
 <?php echo sobextech_AdminDhasboard_header(); ?>
          <div class="tabsebox-r-block">
             <div id="tabsebox-section" class="tabsebox-r">
									<ul class="tab-head">
										<li> <a href="#tab-1" class="tabsebox-r-link active"> <span><?php esc_html_e('Menu Slide','sobex-tech'); ?></span></a></li>
										<li> <a href="#tab-2" class="tabsebox-r-link"> <span><?php esc_html_e('Widget Filter','sobex-tech'); ?></span></a></li>
										<li> <a href="#tab-3" class="tabsebox-r-link"> <span><?php esc_html_e('Css Customization','sobex-tech'); ?></span></a></li>
										<li> <a href="#tab-4" class="tabsebox-r-link"> <span><?php esc_html_e('Sobex Icons','sobex-tech'); ?></span></a></li>
									</ul>
								<div class="section-content-left">
								<?php  echo sobextech_select_icons_widget(); ?>
								<section id="tab-1" class="tabsebox-r-body entry-content active active-content">
											<!---------- top tag -------------->
											<div class="tabsobxup">
											<div class="tabs tabs-filter-linemove stsearch">
													<nav class="stsearch-nav">
														<ul  id="myli">
															<li><a href="#section-menu-style-1"><span><?php esc_html_e('Widget Menu Style','sobex-tech'); ?></span> <i class="sobex-tech-th-list-outline"></i></a></li>
															<li><a href="#section-menu-style-2"><span><?php esc_html_e('Widget Menu Icons','sobex-tech'); ?></span> <i class="sobex-tech-th-list-outline"></i></a></li>
														</ul>
													</nav>
													<div class="content-wrap">
														<section id="section-menu-style-1">
															<div class="section-sobex-container">
																	<div class="tabs-breadcrumbs-container">
																							<ul id="st-tabs-breadcrumbs">
																								<li><a href="<?php echo esc_url( admin_url('admin.php?page=sobex-tech') )?>" target="blank"><?php esc_html_e('Home','sobex-tech'); ?></a><i class="sobex-tech-home"></i></li>
																								<li><a><?php esc_html_e('Menu Slide Style','sobex-tech'); ?></a></li>
																							</ul>
																			</div>
																			<div class="widget-full-editor"></div>
																	
																	<?php
																	
																	settings_errors();

																	settings_fields( 'st-search-style' );
												
																	
																	?>

																		
																		<div class="style-container" style="margin-top:2%;">

																			<div class="st-widget-editor-main">
																				<ul class="st-widget-editor-container">

																					<li class="st-widget-editor-tab-container">
																						<input type="checkbox" checked>
																						<i class="icon-toggle-editor"></i>
																						<h2><?php esc_html_e('Menu Buttons & Icon','sobex-tech'); ?></h2>
																						<div class="widget-header-editor-container">
																							<div class="widget-header-remove-sidebar">
																							<?php 
																									echo sobextech_menu_buttons_title_color_ca();
																									echo sobextech_menu_buttons_background_color_ca();
																									echo sobextech_menu_buttons_background_hover_ca();
																									echo sobextech_menu_clear_all_icon_ca();
																									echo sobextech_menu_filter_all_icon_ca();
																									echo sobextech_menu_buttons_icon_color_ca();
																									echo sobextech_menu_icon_slide_ca();
																									echo sobextech_menu_icon_color_slide_ca();
																							?>
																							</div>
																						</div>
																					</li>
																					<li class="st-widget-editor-tab-container">
																						<input type="checkbox" checked>
																						<i class="icon-toggle-editor"></i>
																						<h2><?php esc_html_e('Font Size','sobex-tech'); ?></h2>
																						<div class="widget-header-editor-container">
																							<div class="widget-header-remove-sidebar">
																							<?php 
																									echo sobextech_menu_breadcrumb_font_size_ca();
																									echo sobextech_menu_buttons_font_size_ca();
																									echo sobextech_menu_title_font_size_ca();
																							?>
																							</div>
																						</div>
																					</li>
																					<li class="st-widget-editor-tab-container">
																						<input type="checkbox" checked>
																						<i class="icon-toggle-editor"></i>
																						<h2><?php esc_html_e('Menu Title','sobex-tech'); ?></h2>
																						<div class="widget-header-editor-container">
																							<div class="widget-slide-remove-sidebar">
																							<?php
																								echo sobextech_menu_title_color_ca();
																								echo sobextech_menu_checked_background_color_ca();
																								echo sobextech_menu_background_color_ca();
																								echo sobextech_menu_hover_color_ca();
																						
																							?>
																							</div>
																						</div>
																					</li>
																					<li class="st-widget-editor-tab-container">
																						<input type="checkbox" checked>
																						<i class="icon-toggle-editor"></i>
																						<h2><?php esc_html_e('Breadcrumb','sobex-tech','sobex-tech'); ?></h2>
																						<div class="widget-header-editor-container">
																							<div class="widget-widget-remove-sidebar">
																							<?php 
																									echo sobextech_menu_breadcrumb_title_color_ca();
																									echo sobextech_menu_breadcrumb_background_title_color_ca();
																									echo sobextech_menu_breadcrumb_background_hover_color_ca();
																								
																							?>
																							</div>
																						</div>
																					</li>
																					<li class="st-widget-editor-tab-container">
																						<input type="checkbox" checked>
																						<i class="icon-toggle-editor"></i>
																						<h2><?php esc_html_e('Other Settings','sobex-tech'); ?></h2>
																						<div class="widget-header-editor-container">
																							<div class="widget-other-remove-sidebar">
																							<?php
																										echo sobextech_menu_scrollbar_color_ca();
																										echo sobextech_menu_display_shadow_ca();
																										echo sobextech_menu_background_shadow_ca();
																										echo sobextech_menu_border_radius_ca();
																										echo sobextech_menu_z_index_ca();
																										echo sobextech_menu_home_title_ca();

																							?>
																							</div>
																						</div>
																					</li>
							
																				</ul>
																			</div>
																			<div class="widget-now">
																				<?php 
																				global $stsearch_get_opts;
																				if( !empty( $stsearch_get_opts['menu_menu_specific_name'] ) ) {
																					echo sobextech_widget_AccoSlider();
																				}else{
																					esc_html_e('Please Select Menu First.', 'sobex-tech');
																				}
																				?>
																			</div>
																		</div>
																	<div class="save-setting-widget-now">
																	<?php	
																						  global $stsearch_get_opts;
																						  if(isset($stsearch_get_opts['sobextech_activated_domain']) || !empty($stsearch_get_opts['sobextech_activated_domain'])): 
																							if($stsearch_get_opts['sobextech_activated_domain'] !==0):
																							  submit_button( __('Save settings', 'sobex-tech') );
																							  endif;
																						  else:
																							  echo "<p style='color: #b00e0e !important; font-size: 15px !important;'>Please accept the term to save settings.</p>";
																						  endif;
																	?>
																	</div>
															</div>
														</section>
														<section id="section-menu-style-2">
															<div class="section-sobex-container">
																			<div class="tabs-breadcrumbs-container">
																							<ul id="st-tabs-breadcrumbs">
																								<li><a href="<?php echo esc_url( admin_url('admin.php?page=sobex-tech') )?>" target="blank"><?php esc_html_e('Home','sobex-tech'); ?></a><i class="sobex-tech-home"></i></li>
																								<li><a><?php esc_html_e('Menu Slide Style','sobex-tech'); ?></a></li>
																								<li><a><?php esc_html_e('Widget Menu Icons','sobex-tech'); ?></a></li>
																							</ul>
																			</div>
															
															<?php
											
																
															echo sobex_tech_get_menu(); 
														
															?>
															<div class="sobex-update-button-container" style="margin-bottom: 6%;">
																						<a class="sobex-button-update" type="button" id="upd_menu_style_settings"><?php esc_html_e('Update','sobex-tech');?>
																							<div id='loadingmessage' style='display:none; float:right; '>
																								<img style="width:26px" src='<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/admin_gif/65x65.gif'?>'/>
																							</div>
																						</a>
															</div>
															</dvi>
														</section>
													</div><!-- /content -->
												</div><!-- /tabs -->
										</div>
										<!---- tabsobxup ---->
										<!---------- top tag END -------------->
														
								</section>
								<section id="tab-2" class="tabsebox-r-body entry-content">
										<!---------- top tag -------------->
										<div class="tabsobxup">
											<div class="tabs tabs-filter-linemove stsearch">
													<nav class="stsearch-nav">
														<ul  id="myli">
															<li><a href="#section-linemove-1"><span><?php esc_html_e('Widget Sibebar Style','sobex-tech'); ?></span> <i class="sobex-tech-th-list-outline"></i></a></li>
															<li><a href="#section-linemove-2"><span><?php esc_html_e('Widget Header Style','sobex-tech'); ?></span> <i class="sobex-tech-th-list-outline"></i></a></li>
														</ul>
													</nav>
													<div class="content-wrap">
														<section id="section-linemove-1">
															<div class="section-sobex-container">
																			<div class="tabs-breadcrumbs-container">
																				<ul id="st-tabs-breadcrumbs">
																					<li><a href="<?php echo esc_url( admin_url('admin.php?page=sobex-tech') )?>" target="blank"><?php esc_html_e('Home','sobex-tech'); ?></a><i class="sobex-tech-home"></i></li>
																					<li><a><?php esc_html_e('Widget Filter Style','sobex-tech'); ?></a></li>
																					<li><a><?php esc_html_e('Widget Sidebar Style', 'sobex-tech')?></a></li>
																				</ul>
																			</div>
																<div class="widget-full-editor"></div>
														
																		<?php
																		
																		settings_errors();

																		settings_fields( 'st-search-style' );

																		//  do_settings_sections( 'st-search-style' );
															
																
																		?>
																	<?php echo sobextech_style_mode_sidebar_ca(); ?>
																	<div id="all-sidebar" class="style-mode-tabs-sidebar">
																	
																			<div class="style-container">
																			<div class="st-widget-editor-main">
																				<ul class="st-widget-editor-container">

																					<li class="st-widget-editor-tab-container">
																						<input type="checkbox" checked>
																						<i class="icon-toggle-editor"></i>
																						<h2><?php esc_html_e('Widget Header','sobex-tech') ?></h2>
																						<div class="widget-header-editor-container">
																							<div class="widget-header-remove-sidebar">
																							<?php 
																							echo sobextech_widget_icon_ca();
																							echo sobextech_widget_icon_color_ca();
																							echo sobextech_widget_table_text_color_ca();
																							echo sobextech_widget_field_text_color_ca();
																							?>
																							</div>
																						</div>
																					</li>
																					<li class="st-widget-editor-tab-container">
																						<input type="checkbox" checked>
																						<i class="icon-toggle-editor"></i>
																						<h2><?php esc_html_e('Widget Font Size','sobex-tech') ?></h2>
																						<div class="widget-header-editor-container">
																							<div class="widget-header-remove-sidebar">
																							<?php 
																							echo sobextech_widget_table_font_size_ca();
																							echo sobextech_widget_table_buttons_font_size_ca();
																							echo sobextech_widget_field_font_size_ca();
																						
																							?>
																							</div>
																						</div>
																					</li>
																					<li class="st-widget-editor-tab-container">
																						<input type="checkbox" checked>
																						<i class="icon-toggle-editor"></i>
																						<h2><?php esc_html_e('Widget Slide','sobex-tech') ?></h2>
																						<div class="widget-header-editor-container">
																							<div class="widget-slide-remove-sidebar">
																							<?php
																							echo sobextech_widget_icon_slideup_ca();
																							echo sobextech_widget_icon_slideup_color_ca();
																							echo sobextech_widget_icon_slidedown_ca();
																							echo sobextech_widget_icon_slidedown_color_ca();

																							?>
																							</div>
																						</div>
																					</li>
																					<li class="st-widget-editor-tab-container">
																						<input type="checkbox" checked>
																						<i class="icon-toggle-editor"></i>
																						<h2><?php esc_html_e('Widget','sobex-tech') ?></h2>
																						<div class="widget-header-editor-container">
																							<div class="widget-widget-remove-sidebar">
																							<?php 

																								echo sobextech_widget_search_background_color_ca();
																								echo sobextech_widget_search_background_hover_ca();
																								echo sobextech_widget_search_title_color_ca();
																								echo sobextech_widget_search_icon_ca();
																								echo sobextech_widget_search_icon_color_ca();
																								echo sobextech_widget_clear_icon_ca();
																								echo sobextech_widget_clear_icon_color_ca();
																								echo sobextech_widget_table_radius_ca();
																								echo sobextech_widget_table_background_color_ca();
																							?>
																							</div>
																						</div>
																					</li>
																					<li class="st-widget-editor-tab-container">
																						<input type="checkbox" checked>
																						<i class="icon-toggle-editor"></i>
																						<h2><?php esc_html_e('Other Settings','sobex-tech');?></h2>
																						<div class="widget-header-editor-container">
																							<div class="widget-other-remove-sidebar">
																							<?php

																								echo sobextech_filter_all_text_color_ca();
																								echo sobextech_filter_all_icon_ca();
																								echo sobextech_filter_all_icon_color_ca();
																								echo sobextech_clear_all_text_color_ca();
																								echo sobextech_clear_all_icon_ca();
																								echo sobextech_clear_all_icon_color_ca();
																								echo sobextech_sidebar_scroll_type_ca();
																								echo sobextech_sidebar_scroll_color_ca();
																								echo sobextech_sidebar_scroll_height_ca();
																								echo sobextech_hide_sidebar_container_background_color_ca();
																								echo sobextech_sidebar_container_background_color_ca();

																							?>
																							</div>
																						</div>
																					</li>
							
																				</ul>
																			</div>
																			<div class="widget-now">
																			<div class="widget-sobex-main-container">
																			 <!-- Comment (Start Table widget Group Checkbox) start -->
																			<div class="widget-sobex-table-group">
																			
																				<!-- Comment (Sobex loading message) start -->
																			<div class="widget-sobex-loading-container">
																				<div class="widget-sobex-loading-content">
																					<img src="<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_FRONT . '/loading-widget.gif' ?>" />
																					<p><?php echo esc_html_e('Contents loading', 'sobex-tech')?></p>
																				</div> 
																				</div> <!-- Comment (Sobex loading message) end -->
																			
																				<!-- Comment (Sobex Header Content) start -->
																				<div class="widget-sobex-header-content">
																		
																				<!-- Comment Sobext Right Content header start-->
																				<div class="widget-sobex-table-title">
																					<div class="widget-sobex-table-table-icon">
																					<i class="sobex-rating"><span class="path1"></span><span class="path2"></span></i>
																					</div>
																					<a class="widget-sobex-table-text"><?php echo esc_html_e('Filter By Checkbox', 'sobex-tech')?></a>
																				</div> <!-- Comment Sobext Right Content header End-->
																		
																				<!-- Comment Sobext Left Content header start-->
																				<div class="widget-sobex-left-header">
																					<div class="widget-sobex-table-group-clicker content_click_checkbox">
																					<div class="sobex-hide-table"><i class="sobex-minus"></i></div><!--show in font-->
																					<div class="sobex-show-table widget-sobex-hidden-table"><i class="sobex-plus"></i></div> <!--hide in font-->
																					</div> <!-- Open & Close Tab Clicker -->
																				</div> <!-- Comment Sobext Left Content header End-->
																		
																				</div><!-- Comment (Sobex Header Content) start -->
																			
																				<div class="widget-sobex-header-line"></div> <!-- Sobex widget Line-->
																		
																				<!--Start Filter Button-->
																				<div class="widget-sobex-buttons-container">
																				<div class="widget-sobex-filter-button widget-sobex-filter-button-before-content">         
																					<div class="widget-sobex-filter-button-table" role="button"><a class="widet-sobex-filter-button-table-title"><i id="sidebar-icon-search" class="sobex-search2"></i> <?php echo esc_html_e('Filter Now', 'sobex-tech')?></a></div>
																					<div class="widget-sobex-clear-button-table" role="button"><a class="widet-sobex-clear-button-table-title"><i id="sidebar-icon-clear" class="sobex-cross"></i><?php echo esc_html_e('Clear All', 'sobex-tech')?></a></div>
																				</div>
																				</div>
																				<!--End Filter Button-->

																				<!-- Comment (widget-sobex-content-container) start -->
																				<div class="widget-sobex-content-container widget-sobex-checkbox content_checkbox widget-sobex-content-scroll">
																		
																					<!-- Comment widget-sobex-checkbox-container start -->
																																			<label class="sobex-widget-input-container st-input-count">
																																				<span><?php esc_html_e('Checkbox','sobex-tech') ?> 1</span>
																																				<input type="checkbox"
																																				value="1" 
																																				name="test"/>
																																				<div class="widget-sobex-fake-input"></div>
																																			</label>
																																			<label class="sobex-widget-input-container st-input-count">
																																				<span><?php esc_html_e('Checkbox','sobex-tech') ?> 2</span>
																																				<input type="checkbox"
																																				value="2" 
																																				name="test"/>
																																				<div class="widget-sobex-fake-input"></div>
																																			</label>
																																			<label class="sobex-widget-input-container st-input-count">
																																				<span><?php esc_html_e('Checkbox','sobex-tech') ?> 3</span>
																																				<input type="checkbox"
																																				value="3" 
																																				name="test"/>
																																				<div class="widget-sobex-fake-input"></div>
																																			</label>
																																			<label class="sobex-widget-input-container st-input-count">
																																				<span><?php esc_html_e('Checkbox','sobex-tech') ?> 4</span>
																																				<input type="checkbox"
																																				value="4" 
																																				name="test"/>
																																				<div class="widget-sobex-fake-input"></div>
																																			</label>
																																			<label class="sobex-widget-input-container st-input-count">
																																				<span><?php esc_html_e('Checkbox','sobex-tech') ?> 5</span>
																																				<input type="checkbox"
																																				value="5" 
																																				name="test"/>
																																				<div class="widget-sobex-fake-input"></div>
																																			</label>
																																			<label class="sobex-widget-input-container st-input-count">
																																				<span><?php esc_html_e('Checkbox','sobex-tech') ?> 6</span>
																																				<input type="checkbox"
																																				value="6" 
																																				name="test"/>
																																				<div class="widget-sobex-fake-input"></div>
																																			</label>
																																			

																				</div> <!-- Comment (widget-sobex-content-container) End -->
																							
																								</div> <!-- Comment (Start Table widget Group) End -->
																									<div class="widget-sobex-main-button-container">
      
																						<!-- Start Filter now Button-->
																						<a class="widget-button-filter-now-container">
																							<div class="widget-button-filter-now-row">
																							<div class="widget-button-filter-part-text">
																								<span class="widget-button-filter-text-label"><?php echo esc_html_e('Filter All','sobex-tech'); ?></span>
																							</div>
																							<div class="widget-button-filter-part-icon">
																								<div class="widget-button-filter-image">
																								<i class="sobex-zoom"></i>
																								</div>
																								
																							</div>
																							</div>
																						</a><!-- End Filter now Button-->

																						<!-- Start Clear All Button-->
																						<a class="widget-button-clear-container">
																							<div class="widget-button-clear-row">
																							<div class="widget-button-clear-part-text">
																								<span class="widget-button-clear-part-text-label"><?php echo esc_html_e('Clear All','sobex-tech'); ?></span>
																							</div>
																							<div class="widget-button-clear-part-icon">
																								<div class="widget-button-clear-image">
																								<i class="sobex-tech-minus"></i>
																								</div>
																							</div>
																							</div>
																						</a> <!-- End Clear All Button-->

																					</div>
																				</div>

																			</div>
															
																		
																			</div>
																	</div>
																	<div id="separted-sidebar" class="style-mode-tabs-sidebar">
																	
																		<div class="sobex-product-api-container">
																			<a href="#" class="coming-soon-title"><?php esc_html_e('Coming Soon', 'sobex-tech')?></a>
																			<a href="#" class="coming-soon-description"><?php esc_html_e('Customize Every Table in Widget','sobex-tech');?></a>
																			<img style="width: 32%;" src='<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/admin_pages/style-many.svg'?>'/>
																		</div>
																	</div>
																	<div class="save-setting-widget-now">
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
															</div>
														</section>
														<section id="section-linemove-2">
															<div class="section-sobex-container">
																	<div class="tabs-breadcrumbs-container">
																		<ul id="st-tabs-breadcrumbs">
																			<li><a href="<?php  echo esc_url( admin_url('admin.php?page=sobex-tech') )?>" target="blank"><?php esc_html_e('Home','sobex-tech'); ?></a><i class="sobex-tech-home"></i></li>
																			<li><a><?php esc_html_e('Widget Filter Style','sobex-tech'); ?></a></li>
																			<li><a><?php esc_html_e('Widget Sidebar Style', 'sobex-tech')?></a></li>
																			<li><a><?php esc_html_e('Widget Header Style', 'sobex-tech')?></a></li>
																		</ul>
																	</div>
															<div style="margin-top: 15%; color: #757577;"><?php esc_html_e('Header widget editor is only available in the Pro version','sobex-tech');?></div>
															<div id="separted-header" class="style-mode-tabs">
																<div class="sobex-product-api-container">
																		<a href="#" class="coming-soon-title"><?php esc_html_e('Coming Soon', 'sobex-tech')?></a>
																		<a href="#" class="coming-soon-description"><?php esc_html_e('Customize Every Table in Widget','sobex-tech');?></a>
																		<img style="width: 32%;" src='<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/admin_pages/style-many.svg'?>'/>
																</div>
															</div>
															<div class="save-setting-widget-now">
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
															</div>
														</section>
													</div><!-- /content -->
												</div><!-- /tabs -->
										</div>
										<!---- tabsobxup ---->
										<!---------- top tag END -------------->
								</section>
								<section id="tab-3" class="tabsebox-r-body entry-content">
														<div class="tabs-breadcrumbs-container">
																				<ul id="st-tabs-breadcrumbs">
																					<li><a href="<?php echo esc_url( admin_url('admin.php?page=sobex-tech') )?>" target="blank"><?php esc_html_e('Home','sobex-tech'); ?></a><i class="sobex-tech-home"></i></li>
																					<li><a><?php esc_html_e('Css Customization','sobex-tech'); ?></a></li>
																				
																				</ul>
														</div>
									<div class="sobex-style-page-customize-css-container">
										<div class="sobex-customize-container">
											<div class="sobex-cutomize-text">
												<a><?php esc_html_e('Css Customizing','sobex-tech');?></a>
												<span><?php esc_html_e('If css of widget is not compatible with your template, You can modify the CSS of the Widget by taking the name of the class Or Id and then adding !imporant in front of each change.','sobex-tech')?></span>
											</div>
											<div class="sobex-customize-field">
												<?php echo sobextech_css_customize_data_ca(); ?>
											</div>
										</div>
										<div class="sobex-style-page-customize-css-container">
											<div class="sobex-cutomize-text">
												<a><?php esc_html_e('Filter Widget (Header)','sobex-tech');?></a>
												<span><?php esc_html_e('Header widget are added to the page-title class as Default, If your template contains a different class, you can add your class here and the header widget will be added after it.','sobex-tech')?></span>
											</div>
											<div class="sobex-customize-field">
												<?php echo sobextech_header_widget_position_ca(); ?>
											</div>
										</div>
										<div class="sobex-style-page-customize-css-container">
											<div class="sobex-cutomize-text">
												<a><?php esc_html_e('Clear Shop Page','sobex-tech');?></a>
												<span><?php esc_html_e('If you want to hide some of the classes that appear on the shop page, you can add classes and they will be hidden automatically.','sobex-tech')?></span>
											</div>
											<div class="sobex-customize-field">
												<?php echo sobextech_clear_shop_page_ca(); ?>
											</div>
										</div>
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
								<section id="tab-4" class="tabsebox-r-body entry-content">
																<div class="tabs-breadcrumbs-container">
																				<ul id="st-tabs-breadcrumbs">
																					<li><a href="<?php echo esc_url( admin_url('admin.php?page=sobex-tech') )?>" target="blank"><?php esc_html_e('Home','sobex-tech'); ?></a><i class="sobex-tech-home"></i></li>
																					<li><a><?php esc_html_e('Sobex Icons','sobex-tech'); ?></a></li>
																				
																				</ul>
														</div>
									<div class="sobex-icon-container-tab">
										<div class="sobex-icon-free-icon-container">
											<a class="sobex-icon-free-icon-title"><?php esc_html_e('Sobex Free Icons','sobex-tech');?></a>
											<div class="sobex-free-icons-ticket-msg-container">
												<a><?php esc_html_e('If you have purchased the Icon Add-ons pack from our official platforms, Or If you have it in the Add-ons file, You can upload it here.','sobex-tech');?></a>
												<div style="color: #757577;"><?php esc_html_e('Only available in the Pro version.','sobex-tech');?></div>
													<div class="sobex-activate-icon-container">

													<form id="sobex-import-form">
													<div class="sobex-data-import-file">
														<label for="sobex-data-importing-icon-pack" id="sobex-data-import-label">
														<p class="sobex-plugin-import-file-title"><?php esc_html_e('Import File','sobex-tech'); ?>:</p>
														<input disabled type="file" name="data-plugin" id="sobex-data-importing-icon-pack">
											
														</label>
															<!-- set action name -->
														<a class="sobex-button-data" id="sobex-button-import-icon-pack" style="height: 35px;" ><?php esc_html_e('Upload','sobex-tech');?><div id='loadingmessage' style='display:none; float:right; '>
															<img style="width:26px" src='<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/admin_gif/65x65.gif'?>'/>
														</div></a>
											
													</div>
												</form>
												
													</div>
											</div>
						
											<div class="sobex-tech-packges-table-container">
													<!-- Responsive Table Section -->
													<table class="sobex-tech-packges-table-responsive-table">
														<!-- Responsive Table Header Section -->
														<thead class="sobex-tech-packges-table-responsive-table__head">
															<tr class="sobex-tech-packges-table-responsive-table__row">
																<th class="sobex-tech-packges-table-responsive-table__head__title responsive-table__head__title--name"><?php echo esc_html_e('Package Name','sobex-tech'); ?>
																	<svg version="1.1" class="up-arrow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
																		<path d="M374.176,110.386l-104-104.504c-0.006-0.006-0.013-0.011-0.019-0.018c-7.818-7.832-20.522-7.807-28.314,0.002c-0.006,0.006-0.013,0.011-0.019,0.018l-104,104.504c-7.791,7.829-7.762,20.493,0.068,28.285    c7.829,7.792,20.492,7.762,28.284-0.067L236,68.442V492c0,11.046,8.954,20,20,20c11.046,0,20-8.954,20-20V68.442l69.824,70.162c7.792,7.829,20.455,7.859,28.284,0.067C381.939,130.878,381.966,118.214,374.176,110.386z" />
																	</svg>
																</th>
																<th class="sobex-tech-packges-table-responsive-table__head__title responsive-table__head__title--country"><?php echo esc_html_e('Version','sobex-tech'); ?></th>
																<th class="sobex-tech-packges-table-responsive-table__head__title responsive-table__head__title--country"><?php echo esc_html_e('Uninstall','sobex-tech'); ?></th>
															</tr>
														</thead>
														<!-- Responsive Table Body Section -->

														<tbody class="sobex-tech-packges-table-responsive-table__body">
												
															<tr class="sobex-tech-packges-table-responsive-table__row">
																<?php
																	/** Addons Fonts */
																	$icon_pack_path = plugin_dir_path(dirname( __FILE__ )) . '/views/assets/fonts/sobex-tech-default-front-fonts-full-pack/style.css';
																	if ( file_exists($icon_pack_path) ) :
																	?>
																	<td class="responsive-table__body__text responsive-table__body__text--name">
																		sobex-tech-default-front-fonts-full-pack
																	</td>

																	
																	<td class="sobex-tech-packges-table-responsive-table__body__text responsive-table__body__text--types">v1.00</td>
																
																	<td class="sobex-tech-packges-table-responsive-table__body__text responsive-table__body__text--country"><i id="sobex-tech-uninstall-icon-package" style="color:red;" class="sobex-tech-cancel" data-package-name="sobex-tech-default-front-fonts-full-pack"></i></td>
																<?php endif;?>
															</tr>
													
													
														</tbody>
													</table>
											</div>
												<script>
												
														</script>
			
												
												
										</div>
										<div class="sobex-icon-premium-icon-container">
											<a class="sobex-icon-premium-icon-title"><?php esc_html_e('Sobex premium Icons','sobex-tech');?></a>
											<div class="sobex-premium-icons-ticket-msg-container">
												<a><?php esc_html_e('Premium icons is coming soon.','sobex-tech');?></a>
												<img src='<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/templates/premium-icon-pack.png'?>'/>
											
											</div>
										</div>
									</div>

								</section>
								</div>
		<?php echo sobextech_AdminDhasboard_footer(); ?>
 </form>

 <?php 
		global $stsearch_get_opts;
         if( !empty( $stsearch_get_opts['menu_menu_specific_name'] ) ):
			// Menu Script
			echo sobextech_widget_AccoSlider_script();
		  endif;
  ?>

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

