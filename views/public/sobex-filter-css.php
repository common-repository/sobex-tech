<?php
defined( 'ABSPATH' ) || exit;
/** To Edit Widget Style */
function sobextech_style_widget_head(){
  global $stsearch_style_get_opts;
  global $stsearch_get_opts;

      /* unstyle & script sidebar if disabled in mobile */
      $display_widget_sidebar_in_mobile_tablet = sobextech_device_detect();
      // <!------------
      // @Sobex Tech Editor
      // @Edit All Widgets
      // ------------>
    if(isset($stsearch_style_get_opts) || !empty($stsearch_style_get_opts)): ?>

   
     
      <style>
        <?php /* Start Editor */ if(isset($stsearch_style_get_opts['sobex_css_customize_data']) || !empty($stsearch_style_get_opts['sobex_css_customize_data'])) echo esc_attr($stsearch_style_get_opts['sobex_css_customize_data']); else null;  ?>
        <?php 
        /* Start Clear Shop */
        if(isset($stsearch_style_get_opts['sobex_css_clear_shop_page']) || !empty($stsearch_style_get_opts['sobex_css_clear_shop_page'])):
          foreach($stsearch_style_get_opts['sobex_css_clear_shop_page'] as $sobex_css_clear_shop_page_array):
            echo esc_attr($sobex_css_clear_shop_page_array) . "{ display:none !important; }";
          endforeach;
        endif;?>
      </style>

      <?php 
          // <!------------
          // @Sobex Tech Template 1
          // @Widget Sidebar Style Settings
          // ------------>
      if($display_widget_sidebar_in_mobile_tablet !== true): ?>
  
      <style>
        <?php if(isset($stsearch_style_get_opts['widget_icon_color']) || !empty($stsearch_style_get_opts['widget_icon_color'])): ?>
        .widget-sobex-table-table-icon i {
          color: <?php echo esc_attr($stsearch_style_get_opts['widget_icon_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['widget_table_text_color']) || !empty($stsearch_style_get_opts['widget_table_text_color'])): ?>
        a.widget-sobex-table-text {
          color: <?php echo esc_attr($stsearch_style_get_opts['widget_table_text_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['widget_field_text_color']) || !empty($stsearch_style_get_opts['widget_field_text_color'])): ?>
        .sobex-widget-input-container span,.widget-sobex-content-container span,.widget-sobex-table-group .widget-sobex-box-container-style-price input {
          color: <?php echo esc_attr($stsearch_style_get_opts['widget_field_text_color']);  ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['widget_icon_slideup_color']) || !empty($stsearch_style_get_opts['widget_icon_slideup_color'])): ?>
        .sobex-hide-table i {
          color: <?php echo esc_attr($stsearch_style_get_opts['widget_icon_slideup_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['widget_icon_slidedown_color']) || !empty($stsearch_style_get_opts['widget_icon_slidedown_color'])): ?>
        .sobex-show-table i {
          color: <?php echo esc_attr($stsearch_style_get_opts['widget_icon_slidedown_color']);?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['widget_search_background_color']) || !empty($stsearch_style_get_opts['widget_search_background_color'])): ?>
        .widget-sobex-filter-button-before-content{
          background-color: <?php echo esc_attr($stsearch_style_get_opts['widget_search_background_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['widget_search_background_hover']) || !empty($stsearch_style_get_opts['widget_search_background_hover'])): ?>
        .widget-sobex-filter-button-before-content:hover{
          background-color: <?php  echo esc_attr($stsearch_style_get_opts['widget_search_background_hover']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['widget_search_title_color']) || !empty($stsearch_style_get_opts['widget_search_title_color'])): ?>
        .widget-sobex-filter-button.widget-sobex-filter-button-before-content a{
          color: <?php echo esc_attr($stsearch_style_get_opts['widget_search_title_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['widget_search_icon_color']) || !empty($stsearch_style_get_opts['widget_search_icon_color'])): ?>
        a.widet-sobex-filter-button-table-title > i {
          color: <?php echo esc_attr($stsearch_style_get_opts['widget_search_icon_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['widget_clear_icon_color']) || !empty($stsearch_style_get_opts['widget_clear_icon_color'])): ?>
        a.widet-sobex-clear-button-table-title > i {
          color: <?php echo esc_attr($stsearch_style_get_opts['widget_clear_icon_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['widget_table_radius']) || !empty($stsearch_style_get_opts['widget_table_radius'])): ?>
        .widget-sobex-table-group {
          border-radius: <?php echo esc_attr($stsearch_style_get_opts['widget_table_radius']); ?> !important;
          background-color: <?php if(isset($stsearch_style_get_opts['widget_table_background_color']) || !empty($stsearch_style_get_opts['widget_table_background_color'])) echo esc_attr($stsearch_style_get_opts['widget_table_background_color']); else echo '#ffff';  ?>;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['widget_table_background_color']) || !empty($stsearch_style_get_opts['widget_table_background_color'])): ?>
        .widget-sobex-table-group {
          background-color: <?php echo esc_attr($stsearch_style_get_opts['widget_table_background_color']) ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['filter_all_text_color']) || !empty($stsearch_style_get_opts['filter_all_text_color'])): ?>
        .widget-button-filter-now-container .widget-button-filter-part-text .widget-button-filter-text-label {
          color: <?php echo esc_attr($stsearch_style_get_opts['filter_all_text_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['filter_all_icon_color']) || !empty($stsearch_style_get_opts['filter_all_icon_color'])): ?>
        .widget-button-filter-image i  {
          color: <?php echo esc_attr($stsearch_style_get_opts['filter_all_icon_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['clear_all_text_color']) || !empty($stsearch_style_get_opts['clear_all_text_color'])): ?>
        .widget-button-clear-container .widget-button-clear-part-text .widget-button-clear-part-text-label {
          color: <?php echo esc_attr($stsearch_style_get_opts['clear_all_text_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['clear_all_icon_color']) || !empty($stsearch_style_get_opts['clear_all_icon_color'])): ?>
        .widget-button-clear-image i {
          color: <?php echo esc_attr($stsearch_style_get_opts['clear_all_icon_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['sidebar_scroll_color']) || !empty($stsearch_style_get_opts['sidebar_scroll_color'])): ?>
        .widget-sobex-content-scroll{
          scrollbar-color: <?php echo esc_attr($stsearch_style_get_opts['sidebar_scroll_color']); ?> <?php if(isset($stsearch_style_get_opts['widget_table_background_color']) || !empty($stsearch_style_get_opts['widget_table_background_color'])): echo esc_attr($stsearch_style_get_opts['widget_table_background_color']); else: echo '#f4f4f4'; endif; ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['sidebar_scroll_color']) || !empty($stsearch_style_get_opts['sidebar_scroll_color'])): ?>
        .widget-sobex-content-scroll::-webkit-scrollbar-thumb {
          background-color: <?php echo esc_attr($stsearch_style_get_opts['sidebar_scroll_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['widget_table_font_size']) || !empty($stsearch_style_get_opts['widget_table_font_size'])): ?>
        .widget-sobex-table-text {
          font-size: <?php echo esc_attr($stsearch_style_get_opts['widget_table_font_size']); ?>px !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['widget_field_font_size']) || !empty($stsearch_style_get_opts['widget_field_font_size'])): ?>
        .sobex-widget-input-container span {
          font-size: <?php echo esc_attr($stsearch_style_get_opts['widget_field_font_size']); ?>px !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['widget_table_buttons_font_size']) || !empty($stsearch_style_get_opts['widget_table_buttons_font_size'])): ?>
        .widget-sobex-buttons-container a,.widget-button-filter-now-container .widget-button-filter-part-text .widget-button-filter-text-label,.widget-button-clear-container .widget-button-clear-part-text .widget-button-clear-part-text-label { 
          font-size: <?php echo esc_attr($stsearch_style_get_opts['widget_table_buttons_font_size']); ?>px !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['h_header_template_in_each_row']) || !empty($stsearch_style_get_opts['h_header_template_in_each_row'])): ?>
        .widget-menu-sobex-group {
          <?php ?>
          width: <?php 
            $width = esc_attr($stsearch_style_get_opts['h_header_template_in_each_row']);
            if($width == '1') {
             echo 'calc(98% / 1);';
            }elseif($width == '2'){
              echo 'calc(96% / 2);';
            }
            elseif($width == '3'){
              echo 'calc(94% / 3);';
            }
            elseif($width == '4'){
              echo 'calc(92% / 4);';
            }
            elseif($width == '5'){
              echo 'calc(72% / 4);';
            }
        ?> !important;
        }
        <?php endif; ?>
        <?php if(isset($stsearch_style_get_opts['hide_sidebar_container_background_color']) || !empty($stsearch_style_get_opts['hide_sidebar_container_background_color'])):
        if(isset($stsearch_style_get_opts['sidebar_container_background_color']) || !empty($stsearch_style_get_opts['sidebar_container_background_color'])): 
        $hide_cotainer_color = $stsearch_style_get_opts['hide_sidebar_container_background_color'];
        if($hide_cotainer_color == 'unset'): $show_container_color = 'unset'; else: $show_container_color = $stsearch_style_get_opts['sidebar_container_background_color']; endif;
        ?>
        .widget-sobex-main-container{
          background-color: <?php echo esc_attr($show_container_color); ?> !important;
        }
        <?php endif; endif;?>
      </style> 
      <?php endif; ?>

      <?php 
            // <!------------
            // @Sobex Tech Template 1
            // @Widget Menu Style Settings
            // ------------>
      if($display_widget_sidebar_in_mobile_tablet !== true): ?>

      <style>
        <?php if(isset($stsearch_style_get_opts['menu_menu_buttons_title_color']) || !empty($stsearch_style_get_opts['menu_menu_buttons_title_color'])): ?>
        .sobex-menu-slide-clear-button, .sobex-menu-slide-filter-button {
          color: <?php echo esc_attr($stsearch_style_get_opts['menu_menu_buttons_title_color']);  ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_menu_buttons_background_color']) || !empty($stsearch_style_get_opts['menu_menu_buttons_background_color'])): ?>
        .sobex-menu-slide-clear-button, .sobex-menu-slide-filter-button {
          background-color: <?php echo esc_attr($stsearch_style_get_opts['menu_menu_buttons_background_color']);  ?> !important;
          }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_menu_z_index']) || !empty($stsearch_style_get_opts['menu_menu_z_index'])): ?>
        .sobex-menu-slide-clear-button, .sobex-menu-slide-filter-button {
          z-index: <?php echo esc_attr($stsearch_style_get_opts['menu_menu_z_index']);  ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_menu_buttons_background_hover']) || !empty($stsearch_style_get_opts['menu_menu_buttons_background_hover'])): ?>
        .sobex-menu-slide-clear-button:hover, .sobex-menu-slide-filter-button:hover {
          background-color: <?php echo esc_attr($stsearch_style_get_opts['menu_menu_buttons_background_hover']);?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_menu_buttons_icon_color']) || !empty($stsearch_style_get_opts['menu_menu_buttons_icon_color'])): ?>
        .sobex-menu-slide-clear-button i, .sobex-menu-slide-filter-button i{
          color: <?php echo esc_attr($stsearch_style_get_opts['menu_menu_buttons_icon_color']);  ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_menu_icon_color_slide']) || !empty($stsearch_style_get_opts['menu_menu_icon_color_slide'])): ?>
        #sobex-menu-arrow-slide {
          color: <?php echo esc_attr($stsearch_style_get_opts['menu_menu_icon_color_slide']);  ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_menu_z_index']) || !empty($stsearch_style_get_opts['menu_menu_z_index'])): ?>
        .sobex-menu-slide-menu {
          z-index: <?php echo esc_attr($stsearch_style_get_opts['menu_menu_z_index']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_get_opts['menu_menu_number_items']) || !empty($stsearch_get_opts['menu_menu_number_items'])): ?>
        .sobex-menu-slide-menu {
          height: <?php 
          if($stsearch_get_opts['menu_menu_number_items'] == '3'):
            echo '141px';
          elseif($stsearch_get_opts['menu_menu_number_items'] == '5'):
            echo '235px';
          elseif($stsearch_get_opts['menu_menu_number_items'] == '10'):
            echo '470px';
          endif; ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_menu_parent_icon_color']) || !empty($stsearch_style_get_opts['menu_menu_parent_icon_color'])): ?>
        .sobex-li-parent i {
          color: <?php echo esc_attr($stsearch_style_get_opts['menu_menu_parent_icon_color']);  ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_menu_child_icon_color']) || !empty($stsearch_style_get_opts['menu_menu_child_icon_color'])): ?>
        .sobex-li-child i {
          color: <?php  echo esc_attr($stsearch_style_get_opts['menu_menu_child_icon_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_menu_title_color']) || !empty($stsearch_style_get_opts['menu_menu_title_color'])): ?>
        .sobex-main-menu-names {
          color: <?php echo esc_attr($stsearch_style_get_opts['menu_menu_title_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_menu_checked_background_color']) || !empty($stsearch_style_get_opts['menu_menu_checked_background_color'])): ?>
        .sobex-menu-check-with-label:checked+.sobex-main-menu-names {
          background-color: <?php echo esc_attr($stsearch_style_get_opts['menu_menu_checked_background_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_menu_background_color']) || !empty($stsearch_style_get_opts['menu_menu_background_color'])): ?>
        .sobex-menu-slide-menu .sobex-accoslider-ul-filter {
          background-color: <?php echo esc_attr($stsearch_style_get_opts['menu_menu_background_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_menu_hover_color']) || !empty($stsearch_style_get_opts['menu_menu_hover_color'])): ?>
        .sobex-menu-slide-menu .sobex-accoslider-li-filter .sobex-main-menu-names:hover {
          background: <?php echo esc_attr($stsearch_style_get_opts['menu_menu_hover_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_breadcrumb_title_color']) || !empty($stsearch_style_get_opts['menu_breadcrumb_title_color'])): ?>
        .sobex-menu-breadcrumb .sobex-menu-breadcrumb-li .sobex-menu-breadcrumb-a {
          color:  <?php echo esc_attr($stsearch_style_get_opts['menu_breadcrumb_title_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_breadcrumb_background_title_color']) || !empty($stsearch_style_get_opts['menu_breadcrumb_background_title_color'])): ?>
        .sobex-menu-breadcrumb .sobex-menu-breadcrumb-li .sobex-menu-breadcrumb-a {
          background:  <?php echo esc_attr($stsearch_style_get_opts['menu_breadcrumb_background_title_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_breadcrumb_background_title_color']) || !empty($stsearch_style_get_opts['menu_breadcrumb_background_title_color'])): ?>
        .sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:before {
          border-top: 15px solid <?php echo esc_attr($stsearch_style_get_opts['menu_breadcrumb_background_title_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_breadcrumb_background_title_color']) || !empty($stsearch_style_get_opts['menu_breadcrumb_background_title_color'])): ?>
        .sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:after {
          border-bottom: 15px solid <?php echo esc_attr($stsearch_style_get_opts['menu_breadcrumb_background_title_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_breadcrumb_background_title_color']) || !empty($stsearch_style_get_opts['menu_breadcrumb_background_title_color'])): ?>
        .sobex-menu-breadcrumb .sobex-menu-breadcrumb-li .sobex-menu-breadcrumb-a:after {
          border-color: transparent transparent transparent <?php echo esc_attr($stsearch_style_get_opts['menu_breadcrumb_background_title_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_breadcrumb_background_hover_color']) || !empty($stsearch_style_get_opts['menu_breadcrumb_background_hover_color'])): ?>
        .sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:last-child {
          background-color: <?php echo esc_attr($stsearch_style_get_opts['menu_breadcrumb_background_hover_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_breadcrumb_background_hover_color']) || !empty($stsearch_style_get_opts['menu_breadcrumb_background_hover_color'])): ?>
        .sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:last-child:before,
        .sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:last-child:after,
        .sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:hover:before,
        .sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:hover:after {
          border-top-color: <?php echo esc_attr($stsearch_style_get_opts['menu_breadcrumb_background_hover_color']); ?> !important;
          border-bottom-color: <?php echo esc_attr($stsearch_style_get_opts['menu_breadcrumb_background_hover_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_breadcrumb_background_hover_color']) || !empty($stsearch_style_get_opts['menu_breadcrumb_background_hover_color'])): ?>
        .sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:last-child .sobex-menu-breadcrumb-a,
        .sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:hover .sobex-menu-breadcrumb-a {
          background: <?php echo esc_attr($stsearch_style_get_opts['menu_breadcrumb_background_hover_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_breadcrumb_background_hover_color']) || !empty($stsearch_style_get_opts['menu_breadcrumb_background_hover_color'])): ?>
        .sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:last-child .sobex-menu-breadcrumb-a:after,
        .sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:hover .sobex-menu-breadcrumb-a:after {
          border-left-color: <?php echo esc_attr($stsearch_style_get_opts['menu_breadcrumb_background_hover_color']);  ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_breadcrumb_background_hover_color']) || !empty($stsearch_style_get_opts['menu_breadcrumb_background_hover_color'])): ?>
        .sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:last-child + li {
          background: <?php echo esc_attr($stsearch_style_get_opts['menu_breadcrumb_background_hover_color']);  ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_scrollbar_color']) || !empty($stsearch_style_get_opts['menu_scrollbar_color'])): ?>
        .sobex-menu-slide-menu {
          scrollbar-color: <?php echo esc_attr($stsearch_style_get_opts['menu_scrollbar_color']);  ?><?php if(!empty($stsearch_style_get_opts['menu_menu_background_color'])): echo esc_attr($stsearch_style_get_opts['menu_menu_background_color']); else: 'white'; endif;  ?>!important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_scrollbar_color']) || !empty($stsearch_style_get_opts['menu_scrollbar_color'])): ?>
        .sobex-menu-slide-menu::-webkit-scrollbar-thumb {
          background-color: <?php echo esc_attr($stsearch_style_get_opts['menu_scrollbar_color']); ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_display_shadow']) && !empty($stsearch_style_get_opts['menu_display_shadow'])):
          if($stsearch_style_get_opts['menu_display_shadow'] == 'on'): ?>
        .sobex-menu-slide-main-container {
          box-shadow: 0px 0px 5px 1px <?php echo esc_attr($stsearch_style_get_opts['menu_background_shadow']);  ?> !important; 
          -webkit-box-shadow: 0px 0px 5px 1px <?php echo esc_attr($stsearch_style_get_opts['menu_background_shadow']);  ?> !important; 
          -moz-box-shadow: 0px 0px 5px 1px <?php echo esc_attr($stsearch_style_get_opts['menu_background_shadow']);  ?> !important; 
        }
        <?php 
            endif;
          endif;
        if(isset($stsearch_style_get_opts['menu_border_radius']) || !empty($stsearch_style_get_opts['menu_border_radius'])): ?>
        .sobex-menu-slide-main-container {
          border-radius: <?php echo esc_attr($stsearch_style_get_opts['menu_border_radius']); ?>px !important; 
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_border_radius']) || !empty($stsearch_style_get_opts['menu_border_radius'])): ?>
        .sobex-menu-breadcrumb {
          border-top-right-radius: <?php echo esc_attr($stsearch_style_get_opts['menu_border_radius']);  ?>px !important;
          -moz-border-radius-topright: <?php echo esc_attr($stsearch_style_get_opts['menu_border_radius']);  ?>px !important;
          border-top-left-radius: <?php echo esc_attr($stsearch_style_get_opts['menu_border_radius']);  ?>px !important;
          -moz-border-radius-topleft: <?php echo esc_attr($stsearch_style_get_opts['menu_border_radius']);  ?> !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_border_radius']) || !empty($stsearch_style_get_opts['menu_border_radius'])): ?>
        .sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:first-child .sobex-menu-breadcrumb-a{
          <?php if ( is_rtl() ): ?>
            border-top-right-radius: <?php echo esc_attr($stsearch_style_get_opts['menu_border_radius']); ?>px !important;
            -moz-border-radius-topright: <?php echo esc_attr($stsearch_style_get_opts['menu_border_radius']); ?>px !important; 
          <?php else: ?>
            border-top-left-radius: <?php echo esc_attr($stsearch_style_get_opts['menu_border_radius']); ?>px !important; 
            -moz-border-radius-topleft: <?php echo esc_attr($stsearch_style_get_opts['menu_border_radius']); ?>px !important; 
          <?php endif; ?>
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_menu_breadcrumb_font_size']) || !empty($stsearch_style_get_opts['menu_menu_breadcrumb_font_size'])): ?>
        .sobex-menu-breadcrumb .sobex-menu-breadcrumb-li .sobex-menu-breadcrumb-a{
          font-size: <?php echo esc_attr($stsearch_style_get_opts['menu_menu_breadcrumb_font_size']); ?>px !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_menu_buttons_font_size']) || !empty($stsearch_style_get_opts['menu_menu_buttons_font_size'])): ?>
        .sobex-menu-slide-clear-button,.sobex-menu-slide-filter-button{
          font-size: <?php echo esc_attr($stsearch_style_get_opts['menu_menu_buttons_font_size']); ?>px !important;
        }
        <?php endif; 
        if(isset($stsearch_style_get_opts['menu_menu_title_font_size']) || !empty($stsearch_style_get_opts['menu_menu_title_font_size'])): ?>
        .sobex-menu-slide-menu .sobex-accoslider-li-filter a{
          font-size: <?php echo esc_attr($stsearch_style_get_opts['menu_menu_title_font_size']); ?>px !important;
        }
        <?php endif; ?>
        


      </style>
      <?php endif; ?>

    <?php
    /* @End If Widget Was Classic */
    endif;

}
add_action('wp_head','sobextech_style_widget_head');