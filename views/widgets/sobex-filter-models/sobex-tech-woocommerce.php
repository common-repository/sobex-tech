<?php
defined( 'ABSPATH' ) || exit;

  /* Widget Settings */
  global $stsearch_get_opts;
  
  $filter_widget_buttons = $stsearch_get_opts['filter_widget_buttons'];

  /* More Settings */
  $up = "up";
  $down = "down";
  $both = "both";

  /* Check if Widget On Category Page */
  $inside_category_page = get_queried_object();


  /* Check if Widget Not inside Category Page */
  $args_categories = array(
    'taxonomy'   => "product_cat",
    'fields' => 'ids',
  );
  $not_inside_category_page = get_terms($args_categories);

  /* Get Price Currency */
  
  $currency = get_woocommerce_currency_symbol();

  /* WP Variable */
  global $wpdb; //display_widget_sidebar_in_mobile_tablet


$display_widget_sidebar_in_mobile_tablet = sobextech_device_detect();
  /* Load Attribtes From database */

  $table_name =  $wpdb->prefix.'sobex_tech_widget_sidebar'; // Table Name
  $table_header_name =  $wpdb->prefix.'sobex_tech_widget_header'; // Table Name


  $rows = $wpdb->get_results( "SELECT * FROM  $table_name WHERE play_mode = 1 ORDER BY rank_mode ASC", ARRAY_A); // Call Turned On Attributes By Positions

  /* Display Style */
  $select_one = "1";
  $checkbox_one = "2";
  $checkbox_color_one = "3";
  $checkbox_box = "4";
  $radio_one = "5";
  $radio_color_one = "6";
  $radio_box = "7";
  $price_one_side = "8";
  $price_two_side = "9";

  /* Attributes Name */
  $categories = "product_cat";
  $tags = "product_tag";
  $default_woocommerce_filter = "default_woocommerce_filter";
  $price = "price_input";
  $search = "search_input";
  $color = "color";

  /* Arrays */
  $not_attributes = array($categories,$price,$search);
  $not_price = array($categories,$tags,$search,$default_woocommerce_filter);
  $not_search = array($categories,$tags,$price);

  /* Search Mode */
  $search_mode = $stsearch_get_opts['search_model'];
  $default_model = "default_model";
  
  $wpml = 'WPML';

//======== End <- Global Varibales For Widget =======||

  /* Header Widget For Wordpress Woocommers */

    /**
   * attribute_header = The Wordpress woocommers Attributes Name
   * display_mode  = The Style of selection
    *---------------Default----------------*
      * || 1 = Drop Checkbox Style 1 ||
      * || 2 = Drop Checkbox Style Color 1 ||
      * || 3 = Drop Checkbox Box 1 ||
      * || 4 = Drop Radio Style 1 ||
      * || 5 = Drop Radio Style 1 Color 1 ||
      * || 6 = Drop Radio Style Box 1 ||
    *----------Default Price & Search------*
      * || 7 = Drop Price Input First Style two side ||  <= ON SERVICES
      * || 8 = Drop Price Input Second Style one side||  <= ON SERVICES
   * play_mode = Turn on && Turn off
   * rank_mode = Ranking Set
   * widget_temp = 1 // Default
   **/

//======== Start -> Global Varibales For Header Widget =======||



  if(strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile') || strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'android')) {
    $h_rows = $wpdb->get_results( "SELECT * FROM  $table_header_name WHERE play_mode = 1  ORDER BY rank_mode ASC", ARRAY_A ); // Call Turned On Attributes By Positions
  }
  /* Display Style */
  $header_checkbox_one = "1";
  $header_checkbox_color_one = "2";
  $header_checkbox_box_one = "3";
  $header_radio_one = "4";
  $header_radio_color_one = "5";
  $header_radio_box_one = "6";
  $header_price_two_side = "8";

  /* Attributes Name */
  $filter_stock = 'filter_stock';
  $filter_sale  = 'filter_sale';
  $filter_widget = 'filte';
  $filter_rating = 'filter_rating';


  /* Arrays */
  $not_header_attributes = array($price);

  /* Admin Settings */
  $widget_header = $stsearch_get_opts['widget_header'];

  /* More Settings */
  $on   = 'on';   // Turned On
  $off  = 'off';  // Turned Off
  $filter_new = 0;
//======== End <- Global Varibales For Widget =======||


$check_if_asset_sidebar = array();
foreach($rows as $row){
  if($row['attribute_woo'] !== 'product_cat'){


    if($row['play_mode'] == '1'){
      $check_if_asset_sidebar[] = $row['play_mode'];
    }
  }
}
// include(PLUGIN_URL . TEMP_DIR . '/templates.php');

// START Widget FORM \\ 
  echo sobextech_widget_sidebar_form_start();

    if($display_widget_sidebar_in_mobile_tablet !== 'hide'):
      if(isset($stsearch_get_opts['menu_menu_type']) || !empty($stsearch_get_opts['menu_menu_type'])):
        if($stsearch_get_opts['menu_menu_type'] === 'merge' || $stsearch_get_opts['menu_menu_type'] === 'unmerge'):
        
          foreach($rows as $row): 
            /** Start Global Varibale For Table**/
            $Attributes = $row['attribute_woo'];
            $Display_mode = $row['display_mode'];
            /** End Global Varibale For Table**/
            // Start Fetch Categories Inside & OutSide \\
            if( $Attributes === $categories):
              if($Display_mode === $radio_one):
                echo sobextech_widget_AccoSlider();
                break;
              endif;
            endif;
            // EndFetch Categories Inside & OutSide  \\
          endforeach;
        elseif($stsearch_get_opts['menu_menu_type'] === 'off'):
          if(isset($inside_category_page->term_id)):
              echo sobextech_widget_menu_not_exists($inside_category_page->name);
          else:
              echo sobextech_widget_menu_not_exists(null);
          endif;
        endif;
    
      endif;
    elseif($display_widget_sidebar_in_mobile_tablet !== 'hide'):
      if(isset($inside_category_page->term_id)):
        echo sobextech_widget_menu_not_exists($inside_category_page->name);
      else:
          echo sobextech_widget_menu_not_exists(null);
      endif;
    endif; // end if if mobile off

    if(isset($stsearch_get_opts['menu_menu_type']) || !empty($stsearch_get_opts['menu_menu_type'])):
      if($stsearch_get_opts['menu_menu_type'] === 'off' || $stsearch_get_opts['menu_menu_type'] === 'merge'):

        if($display_widget_sidebar_in_mobile_tablet !== 'hide'):
          if(count($check_if_asset_sidebar) >0): // check if has sidebar

        // Start Buttons \\
        if(isset($stsearch_get_opts['filter_widget_buttons']) && !empty($stsearch_get_opts['filter_widget_buttons'])):
          if($stsearch_get_opts['filter_widget_buttons'] == $up || $stsearch_get_opts['filter_widget_buttons'] == $both):
            echo sobextech_widget_sobex_buttons_classic_model();
          endif;
        endif;
        // End Buttons \\

          echo sobextech_widget_sidebar_closed_text();
    
      echo sobextech_widget_sidebar_main_container_start();

          /* START Fetch Attributes */
          foreach($rows as $row): 

         
            /** Start Global Varibale For Table**/
            $Attributes = $row['attribute_woo'];
            $Attributes_label_name = $row['label_name'];
            $Display_mode = $row['display_mode'];
            $filter_new++;

            /** End Global Varibale For Table**/

            // Start Fetch Attributes Inside & OutSide \\
            if(isset($inside_category_page->term_id)):
              
              if( !in_array($Attributes, $not_attributes, true ) ):
              
                // Start Filer Widget if It Include Attributes & Widget \\
                  /* GET Ids of Attributes */
                  if($Attributes !== $default_woocommerce_filter) {
                    if($Attributes === $tags):
                      $taxonomy = "product_tag";
                    else:
                      $taxonomy = "pa_" . esc_attr($Attributes);
                    endif;
                    $Attr_ids = get_terms([
                      'taxonomy' => $taxonomy,
                      'fields' => 'ids'
                    ]);
                
                    $wp_query_attribute_check = new WP_Query(
                      array(
                        'post_type' => 'product',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                          'relation'=>'AND',
                          array(
                            'taxonomy'        => 'product_cat',
                            'field'           => 'term_id',
                            'terms'           => $inside_category_page->term_id,
                            'operator'        => 'IN',
                          ),
                          array(
                            'taxonomy'        => $taxonomy,
                            'field'           => 'term_id',
                            'terms'           => $Attr_ids,
                            'operator'        => 'IN',
                          ),
                        ),
                        'ignore_stickie_posts' => true,
                        'fields' => 'ids',
                      )
                    );
                    /* GET Products Ids */
                    $products_ids = get_posts( array( 
                      'post_type' => 'product',
                      'numberposts' => -1,
                      'post_status' => 'publish',
                      'fields' => 'ids',
                      'tax_query' => array(
                          array(
                              'taxonomy' => 'product_cat',
                              'field' => 'term_id',
                              'terms' => $inside_category_page->term_id,
                              'operator' => 'IN',
                              )
                          ),
                      ));
                    $products = wc_get_products( array( 'include' => $products_ids) ); // To Get Products By Ids
                    if($wp_query_attribute_check->post_count > 0) : $isset_products_in_category = true; endif;
                  }elseif($Attributes == $default_woocommerce_filter){
                    $products = null;
                    $taxonomy = 'default_woocommerce_filter';
                    $isset_products_in_category=true;
                  }
                // End Filer Widget if It Include Attributes & Widget \\

                if($Display_mode === $radio_one):

                  if(isset($isset_products_in_category) && $isset_products_in_category == true): // Start Check if The Attributes has Posts 
                    echo sobextech_widget_sobex_radio($Attributes, $Attributes_label_name,$products, $taxonomy,$checked=null);
                  endif; // End Check if The Attributes has Posts

                elseif($Display_mode === $radio_color_one):

                  if(isset($isset_products_in_category) && $isset_products_in_category == true): // Start Check if The Attributes has Posts 
                    echo sobextech_widget_sobex_radio_color($Attributes, $Attributes_label_name,$products, $taxonomy,$checked=null);
                  endif; // End Check if The Attributes has Posts

                elseif($Display_mode === $radio_box):

                  if(isset($isset_products_in_category) && $isset_products_in_category == true): // Start Check if The Attributes has Posts 
                    echo sobextech_widget_sobex_box_radio($Attributes, $Attributes_label_name,$products, $taxonomy,$checked=null);
                  endif; // End Check if The Attributes has Posts


                endif;
              elseif($Attributes === $price):
                $price_asc = sobextech_widget_get_price_min($inside_category_page->term_id);
                $price_max = sobextech_widget_get_price_max($inside_category_page->term_id);
                if($Display_mode === $price_two_side):
                  echo sobextech_widget_sidebar_sobex_price_two_side($Attributes, $Attributes_label_name, $currency,$price_asc, $price_max);
                elseif($Display_mode === $price_one_side):
                echo sobextech_widget_sidebar_sobex_price_one_side($Attributes, $Attributes_label_name, $currency,$price_asc, $price_max);
                endif;
              endif;
            else: // If Not Inside Specific Category Page
              if( !in_array($Attributes, $not_attributes, true ) ):
                // Start Filer Widget if It Include Attributes & Widget \\
                // var_dump($Attributes);
                  /* GET Ids of Attributes */
                  if($Attributes !== $default_woocommerce_filter) {
                    if($Attributes === $tags):
                      $taxonomy = "product_tag";
                    else:
                      $taxonomy = "pa_" . $Attributes;
                    endif;
                      $Attr_ids = get_terms([
                        'taxonomy' => $taxonomy,
                        'fields' => 'ids'
                    ]);
                   
                    $wp_query_attribute_check = new WP_Query(
                      array(
                        'post_type' => 'product',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                          'relation'=>'AND',
                          array(
                            'taxonomy'        => 'product_cat',
                            'field'           => 'term_id',
                            'terms'           => $not_inside_category_page,
                            'operator'        => 'IN',
                          ),
                          array(
                            'taxonomy'        => $taxonomy,
                            'field'           => 'term_id',
                            'terms'           => $Attr_ids,
                            'operator'        => 'IN',
                          ),
                        ),
                        'ignore_stickie_posts' => true,
                        'fields' => 'ids',
                      )
                    );
                    /* GET Products Ids */
                    $products_ids = get_posts( array( 
                      'post_type' => 'product',
                      'numberposts' => -1,
                      'post_status' => 'publish',
                      'fields' => 'ids',
                      'tax_query' => array(
                          array(
                              'taxonomy' => 'product_cat',
                              'field' => 'term_id',
                              'terms' => $not_inside_category_page,
                              'operator' => 'IN',
                              )
                          ),
                      ));
                    $products = wc_get_products( array( 'include' => $products_ids) ); // To Get Products By Ids
                    if($wp_query_attribute_check->post_count > 0) : $isset_products_in_category = true; endif;
                    }elseif($Attributes == $default_woocommerce_filter){
                      $products = null;
                      $taxonomy = 'default_woocommerce_filter';
                      $isset_products_in_category=true;
                    }
                // End Filer Widget if It Include Attributes & Widget \\
                if($Display_mode === $radio_one):

                  if(isset($isset_products_in_category) && $isset_products_in_category == true): // Start Check if The Attributes has Posts 
                    echo sobextech_widget_sobex_radio($Attributes, $Attributes_label_name,$products, $taxonomy,$checked=null);
                  endif; // End Check if The Attributes has Posts

                elseif($Display_mode === $radio_color_one && $Attributes === $color):

                  if(isset($isset_products_in_category) && $isset_products_in_category == true): // Start Check if The Attributes has Posts 
                    echo sobextech_widget_sobex_radio_color($Attributes, $Attributes_label_name,$products, $taxonomy,$checked=null);
                  endif; // End Check if The Attributes has Posts


                elseif($Display_mode === $radio_box):

                  if(isset($isset_products_in_category) && $isset_products_in_category == true): // Start Check if The Attributes has Posts 
                    echo sobextech_widget_sobex_box_radio($Attributes, $Attributes_label_name,$products, $taxonomy,$checked=null);
                  endif; // End Check if The Attributes has Posts

                endif;
              elseif($Attributes === $price):

                $price_asc = sobextech_widget_get_price_min('all');
                $price_max = sobextech_widget_get_price_max('all');
                if($Display_mode === $price_two_side):
                  echo sobextech_widget_sidebar_sobex_price_two_side($Attributes, $Attributes_label_name, $currency,$price_asc, $price_max);
                elseif($Display_mode === $price_one_side):
                echo sobextech_widget_sidebar_sobex_price_one_side($Attributes, $Attributes_label_name, $currency,$price_asc, $price_max);
                endif;
              endif;
            endif;
            if($filter_new >= strlen($filter_widget)){break;}
            // End Fetch Attributes Inside & OutSide \\
          endforeach; 
          /* End Fetch Attributes */ 

      echo sobextech_widget_sidebar_main_container_end(); 
        endif; // end if sidebar not in table or mobile
        endif;
        
    // Start Buttons \\
    if(isset($stsearch_get_opts['filter_widget_buttons']) && !empty($stsearch_get_opts['filter_widget_buttons'])):
      if($stsearch_get_opts['filter_widget_buttons'] == $down || $stsearch_get_opts['filter_widget_buttons'] == $both):
        echo sobextech_widget_sobex_buttons_classic_model();
      endif;
    endif;
    // End Buttons \\

  echo sobextech_widget_sidebar_form_end();
        // End Widget FORM \\

      endif;
    endif;

// End Header Form \\


    if(isset($stsearch_get_opts['menu_menu_type']) || !empty($stsearch_get_opts['menu_menu_type'])):
      if($stsearch_get_opts['menu_menu_type'] === 'off' || $stsearch_get_opts['menu_menu_type'] === 'merge'):
          // Load Widget Scripts \\ 
          echo sobextech_widget_sidebar_script($rows, $not_attributes);
          // Price Script
      endif;
    endif;

    if(isset($stsearch_get_opts['menu_menu_type']) || !empty($stsearch_get_opts['menu_menu_type'])):
      if($stsearch_get_opts['menu_menu_type'] !== 'off'):
        if( !empty( $stsearch_get_opts['menu_menu_specific_name'] ) ):
          // Menu Script
          echo sobextech_widget_AccoSlider_script();
        endif;

      endif;
    endif;


  // Send the Ajax Requests
  echo sobextech_widget_ajax_requests();




?>
