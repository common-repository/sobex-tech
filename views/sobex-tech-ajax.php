<?php
defined( 'ABSPATH' ) || exit;
/**
 * Ajax callback To Filter Products.
 */
function sobextech_filter_products_ajax_callback() {
  $response = new SobexTechAjaxFilterResponse();

  //Start to Fetch attributes Data

    global $wpdb;
    $table_name =  $wpdb->prefix.'sobex_tech_widget_sidebar';
    $rows = $wpdb->get_results( "SELECT * FROM  $table_name ORDER BY rank_mode ASC", ARRAY_A);
  
    $paged = 1;
    if ( isset( $_POST['page'] ) ) {
      $paged = absint( sanitize_text_field( $_POST['page'] ) );
      if ( $paged < 1 ) {
        $paged = 1;
      }
    }
    $args = array(
      'post_type' => 'product',
      'post_status' => 'publish',
      'posts_per_page' => get_option( 'posts_per_page' ),
      'paged' => 1,
      );
    // Relation between All
    $args['tax_query'] = array( 'relation'=>'AND' );

    // Start Filter Search Bar
    if(!empty( $_POST['search-title'] )) {
      $args['s'] = sanitize_text_field( $_POST['search-title'] );
    }

    // Start Filter Categories
     if(!empty( $_POST['product_cat'] ) ){
      $product_category = explode(',',sanitize_text_field($_POST['product_cat']));
      $args['tax_query'][] = array(
          'taxonomy'  => 'product_cat',
          'field'  => 'name',
          'terms'  => $product_category,
      );
    }  

     // Start Filter Product tag
    if(!empty( $_POST['product_tag'] )){
      $args['tax_query'][] = array(
          'taxonomy'  => 'product_tag',
          'field'  => 'term_id',
          'terms'  => sanitize_text_field($_POST['product_tag']),
      );
    }

    // Filter By sort
    if(!empty( $_POST['default_woocommerce_filter'] ) ){
      if (sanitize_text_field($_POST['default_woocommerce_filter']) == '_sale_price'):
        $args['meta_query'][] = array(
          'key'     => '_sale_price',
          'value'   => 0,
          'compare' => '>',
          'type'    => 'numeric'
        );
      endif;
      if(sanitize_text_field($_POST['default_woocommerce_filter']) == '_backorders' ) {
        $args['meta_query'][] = array(
          'key' => '_backorders',
          'value' => 'no'
        );
      }
      if(sanitize_text_field($_POST['default_woocommerce_filter']) == 'instock' ) {
        $args['meta_query'][] = array(
          'key' => '_stock_status',
          'value' => 'instock',
        );
      }
      if(sanitize_text_field($_POST['default_woocommerce_filter']) == 'outofstock' ) {
        $args['meta_query'][] = array(
          'key' => '_stock_status',
          'value' => 'outofstock',
        );
      }
      if(sanitize_text_field($_POST['default_woocommerce_filter']) == 'popularity' ) {
        $args['orderby'] = 'meta_value_num';
        $args['meta_key'] = 'total_sales';
        $args['order'] = 'DESC';
      }
      if(sanitize_text_field($_POST['default_woocommerce_filter']) == 'rating' ) {
        $args['orderby'] = 'meta_value_num';
        $args['meta_key'] = '_wc_average_rating';
        $args['order'] = 'DESC';
      }
      if(sanitize_text_field($_POST['default_woocommerce_filter']) == 'date' ) {
        $args['meta_key'] = 'date';
        $args['order'] = 'DESC';
      }
      if(sanitize_text_field($_POST['default_woocommerce_filter']) == 'price-asc' ) {
        $args['orderby'] = 'meta_value_num';
        $args['meta_key'] = '_price';
        $args['order'] = 'ASC';
      }
      if(sanitize_text_field($_POST['default_woocommerce_filter']) == 'price-desc' ) {
        $args['orderby'] = 'meta_value_num';
        $args['meta_key'] = '_price';
        $args['order'] = 'DESC';
      }
    }

    // Start Filter Price
    if(isset( $_POST['min_price'] ) && '' !== trim( $_POST['min_price'] && $_POST['min_price'] !== null ) ){
      $args['meta_query']  = array(
        'relation' => 'OR',
        array(
            'relation' => 'AND',
            array(
                'key'     => '_price',
                'value'   => sanitize_text_field($_POST['min_price']),
                'compare' => '>=',
                'type' => 'DECIMAL',
            ),
            array(
                'key'     => '_price',
                'value' => sanitize_text_field($_POST['max_price']),
                'compare' => '<=',
                'type' => 'DECIMAL',
            ),
        ),
      );
    }

    // Start Filter Attirubtes
    foreach($rows as $row):
      if($row['attribute_woo'] !== 'search_input' && $row['attribute_woo'] !== 'product_cat' && $row['attribute_woo'] !== 'price_input' && $row['attribute_woo'] !== 'product_tag' && $row['attribute_woo'] !== 'default_woocommerce_filter'):
        if(!empty($_POST[$row['attribute_woo']])):
            $taxonomy = "pa_" . $row['attribute_woo'];
            $variable = $_POST[$row['attribute_woo']];

            if (is_array($variable)) {
              foreach ($variable as $key => $value) {
                $variable[$key] = intval(sanitize_text_field($value));
              }
            } else {
              $variable = intval(sanitize_text_field($variable));
            }
            $args['tax_query'][] = array(
              'taxonomy'  => $taxonomy,
              'field'     => 'term_id',
              'terms'     => $variable,
            );
        endif;
      endif;
    endforeach;

    // Now Call All Posts or Products that Related to filter
    ob_start();

    $query = new WP_Query($args);
    
      if ( $query->have_posts() ) :
    
        // do_action( 'woocommerce_before_shop_loop' );

        woocommerce_product_loop_start(); 

            while ( $query->have_posts() ) :

                $query->the_post();

                wc_get_template_part( 'content', 'product' );

            endwhile;

        woocommerce_product_loop_end(); 


        // do_action( 'woocommerce_after_shop_loop' ); 

    else :

    do_action( 'woocommerce_no_products_found' );

    endif; 
    
    remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
    wp_reset_postdata();
    
    $response->addData( 'products', ob_get_clean() );

    $link = home_url( '/shop/page/999999999/' ) . '#filter&';

    foreach($_POST as $key => $values)
    {

        if(is_array($values)){
          foreach($values as $value){
            $link .= $key.'[]='.$value.'&';
          }
        }
        else 
        {
          $link .= $key.'='.$values.'&';
        }
    }
 
    $paginate = paginate_links(
      apply_filters(
        'woocommerce_pagination_args',
        array( // WPCS: XSS ok.
          'base'      => str_replace( 999999999, '%#%', $link ),
          'format'    => '',
          'add_args'  => false,
          'current'   => max( 1, $paged ),
          'total'     => $query->max_num_pages,
          'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
          'next_text' => is_rtl() ? '&larr;' : '&rarr;',
          'type'      => 'list',
          'end_size'  => 3,
          'mid_size'  => 3,
        )
      )
    );

    $paginate = str_replace( 'wc-ajax=stsearch_products_filter', '', $paginate );
    $response->addData( 'paginate', $paginate );
    $response->addData( 'args', $args );
    $response->send( true );
}
add_action( 'wc_ajax_stsearch_products_filter', 'sobextech_filter_products_ajax_callback' );

/**
 * Ajax callback To Filter sidebar.
 */
function sobextech_ajax_sidebar_filter_callback($slug){

  if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest')
  {
    exit();
  }
  
  /* Widget Settings */
  global $stsearch_get_opts;
  
  if(isset($stsearch_get_opts['st_search_rest_api_security']) && !empty(['st_search_rest_api_security'])):
    $time_start = microtime(true);
  endif;
    $data = array( 'result' => 'error', 'sidebar' => 'No value sent.');


    //======== Start -> Global Varibales For Widget =======||

    /* WP Variable */
    global $wpdb;

    /* Load Attribtes From database */
    $table_name =  $wpdb->prefix.'sobex_tech_widget_sidebar'; // Table Name
    $rows = $wpdb->get_results( "SELECT * FROM  $table_name WHERE play_mode = 1 ORDER BY rank_mode ASC", ARRAY_A); // Call Turned On Attributes By Positions

    /* Display Style */
    $radio_one = "5";
    $radio_color_one = "6";
    $radio_box = "7";
    $price_one_side = "8";
    $price_two_side = "9";
    $filter_new = 0;

    /* Attributes Name */
    $categories = 'product_cat';
    $Attributes_sql_name = 'attribute_woo';
    $tags = 'product_tag';
    $price = 'price_input';
    $search = 'search_input';
    $filter_widget = 'filte';
    $default_woocommerce_filter = 'default_woocommerce_filter';
    $color = 'color';
    $currency = get_woocommerce_currency_symbol();

    /* Others */
    $display_mode = 'display_mode';

    /* Arrays */
    $not_attributes = array($categories,$price,$search);
    $not_functions_attributes = array($categories,$search);

    //======== End <- Global Varibales For Widget =======||
    
    //======== Start Filter Attributes By Post Type =======||
    $args = array(
      'post_type' => 'product',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'ignore_stickie_posts' => true,
      'fields' => 'ids',
      );
    //======== End Filter Attributes By Post Type =======||

    
    // Relation \\ 
    $args['tax_query'] = array( 'relation'=>'AND' );

    // Start Filter Categories
    if(!empty( $slug[$categories] ) ){
        $product_category = explode(',',sanitize_text_field($slug[$categories]));
        $args['tax_query'][] = array(
            'taxonomy'  => 'product_cat',
            'field'  => 'name',
            'terms'  => $product_category,
            'operator'        => 'IN',
        );
    } 

    // Start Filter Product tag
    if(!empty( $slug[$tags] )){
      $args['tax_query'][] = array(
          'taxonomy'  => 'product_tag',
          'field'  => 'term_id',
          'terms'  => sanitize_text_field($slug[$tags]),
      );
    }

    // Filter By Sale
    if(!empty( $slug[$default_woocommerce_filter] ) ){
      if (sanitize_text_field($slug[$default_woocommerce_filter]) == '_sale_price'):
        $args['meta_query'][] = array(
          'key'     => '_sale_price',
          'value'   => 0,
          'compare' => '>',
          'type'    => 'numeric'
        );
      endif;
    }
  
    // Filter By Stock
    if(!empty( $slug[$default_woocommerce_filter] ) ){
        if (sanitize_text_field($slug[$default_woocommerce_filter]) == '_backorders'):
          $args['meta_query'][] = array(
            'key' => '_backorders',
            'value' => 'no'
          );
        elseif(sanitize_text_field($slug[$default_woocommerce_filter]) == 'instock'):
          $args['meta_query'][] = array(
            'key' => '_stock_status',
            'value' => 'instock',
          );
        elseif(sanitize_text_field($slug[$default_woocommerce_filter]) == 'outofstock'):
          $args['meta_query'][] = array(
            'key' => '_stock_status',
            'value' => 'outofstock',
          );
        endif;
      }

    // Filter By sort
    if(!empty( $slug[$default_woocommerce_filter] ) ){
      switch (sanitize_text_field($slug[$default_woocommerce_filter])){
        case 'popularity':
          $args['orderby'] = 'meta_value_num';
          $args['meta_key'] = 'total_sales';
          $args['order'] = 'desc';
          break;

        case 'rating':
          $args['orderby'] = 'meta_value_num';
          $args['meta_key'] = '_wc_average_rating';
          $args['order'] = 'desc';
          break;

        case 'date':
          $args['meta_key'] = 'date';
          $args['order'] = 'desc';
          break;

        case 'price-asc':
            $args['orderby'] = 'meta_value_num';
            $args['meta_key'] = '_price';
            $args['order'] = 'asc';
            break;

        case 'price-desc':
            $args['orderby'] = 'meta_value_num';
            $args['meta_key'] = '_price';
            $args['order'] = 'desc';
            break;
      }
    }
    // Start Filter Price
    if(isset( $slug['min_price'] ) && '' !== trim( $slug['min_price'] ) ){
      $args['meta_query']  = array(
        'relation' => 'OR',
        array(
            'relation' => 'AND',
            array(
                'key'     => '_price',
                'value'   => sanitize_text_field($slug['min_price']),
                'compare' => '>=',
                'type' => 'DECIMAL',
            ),
            array(
                'key'     => '_price',
                'value' => sanitize_text_field($slug['max_price']),
                'compare' => '<=',
                'type' => 'DECIMAL',
            ),
        ),
      );
    }
    $price_min = sobextech_widget_get_price_min_callback($args);
    $price_max = sobextech_widget_get_price_max_callback($args);

    // Filter By Attributes
    if(isset($rows) && !empty($rows)):
      foreach($rows as $row):
        if( !in_array($row[$Attributes_sql_name], $not_attributes, true ) ):
            if(!empty($slug[$row[$Attributes_sql_name]])):
              if($row[$Attributes_sql_name] !== $default_woocommerce_filter):
                if($row[$Attributes_sql_name] === $tags): $taxonomy = $tags; else: $taxonomy = "pa_" . $row[$Attributes_sql_name]; endif;
                  $args['tax_query'][] = array(
                    'taxonomy'  => $taxonomy,
                    'field'     => 'term_id',
                    'terms'     => sanitize_text_field($slug[$row[$Attributes_sql_name]]),
                    'operator'        => 'IN',
                  );
              endif;
            endif;
        endif;
      endforeach;
    endif;

    //======== Start Check  =======\\
    if(isset($stsearch_get_opts['st_search_rest_api_security']) && !empty(['st_search_rest_api_security'])):
      $time_end = microtime(true);
      $execution_time = ($time_end - $time_start)/60;
      if(isset($stsearch_get_opts['st_search_rest_api_security_timeout']) || !empty($stsearch_get_opts['st_search_rest_api_security_timeout'])): $deadline_time =  esc_attr($stsearch_get_opts['st_search_rest_api_security_timeout']); else: $deadline_time =  6000; endif;
      if($execution_time >  $deadline_time ): $data = array( 'result' => 'error', 'sidebar' => 'error'); return $data; exit(); endif;
    endif;
    //======== End Check =======||

    $products_ids = get_posts($args);

    $products = wc_get_products( array( 'include' => $products_ids) ); // to get products 

    if ( ! empty( $products ) ) {
      ob_start();

      foreach($rows as $row):
        $Attributes = $row[$Attributes_sql_name];
        $filter_new++;

        $Attributes_label_name = $row['label_name'];

        if( !in_array($Attributes, $not_functions_attributes, true ) ): 

          $checked = $slug[$Attributes];

          // Start Taxnomay

            if($Attributes === $tags): 
              $taxonomy = $tags; 
            elseif($Attributes === $default_woocommerce_filter):

              $taxonomy = $default_woocommerce_filter; 
            elseif($Attributes === $price):

              $taxonomy = $price;
            else: 
              $taxonomy = "pa_" . $Attributes; 
            endif;
          
          
          // Start Find the Display Mode
            if($row[$display_mode] === $radio_one):

              echo sobextech_widget_sobex_radio($Attributes, $Attributes_label_name, $products, $taxonomy,$checked);

            elseif($row[$display_mode] === $radio_color_one):

              echo sobextech_widget_sobex_radio_color($Attributes, $Attributes_label_name, $products, $taxonomy,$checked);

            elseif($row[$display_mode] === $radio_box):

              echo sobextech_widget_sobex_box_radio($Attributes, $Attributes_label_name, $products, $taxonomy,$checked);

            elseif($row[$display_mode] === $price_one_side):

                echo sobextech_widget_sidebar_sobex_price_one_side($Attributes, $Attributes_label_name, $currency,$price_min, $price_max);
  
            elseif($row[$display_mode] === $price_two_side):
  
                echo sobextech_widget_sidebar_sobex_price_two_side($Attributes, $Attributes_label_name, $currency,$price_min, $price_max);

            endif;
        
          // End Find the Display Mode

        endif; // End Attributes Filterting
      if($filter_new >= strlen($filter_widget)){break;}
      endforeach; // End Row Foreach
     
      //======== Start Check  =======\\
      if(isset($stsearch_get_opts['st_search_rest_api_security']) && !empty(['st_search_rest_api_security'])):
        $time_end = microtime(true);
        $execution_time = ($time_end - $time_start)/60;
        if(isset($stsearch_get_opts['st_search_rest_api_security_timeout']) || !empty($stsearch_get_opts['st_search_rest_api_security_timeout'])): $deadline_time =  esc_attr($stsearch_get_opts['st_search_rest_api_security_timeout']); else: $deadline_time =  6000; endif;
        if($execution_time >  $deadline_time ): $data = array( 'result' => 'error', 'sidebar' => 'error'); return $data; exit(); endif;
      endif;
      //======== End Check =======||
      remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
      $content = ob_get_clean();

      $data = array(
        'result' => 'success',
        'sidebar'   => $content,
      );
    }

    return $data;
    exit();

}

add_action( 'rest_api_init', function () {
        register_rest_route( 'stsearch/v1', '/sidebar/', array(
                'methods'             => 'GET',
                'permission_callback' => '__return_true',
                'callback'            => 'sobextech_ajax_sidebar_filter_callback'
        ) );
} );



