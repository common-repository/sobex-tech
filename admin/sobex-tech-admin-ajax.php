<?php
defined( 'ABSPATH' ) || exit;

/*
==================
  Export Function
======================	 
*/
add_action( "wp_ajax_sobex_plugin_export", "sobex_plugin_export" );
add_action( "wp_ajax_nopriv_sobex_plugin_export", "sobex_plugin_export" );

function sobex_plugin_export(){

  // if ( ! current_user_can( 'administrator' ) ) {
  //   wp_die();
  // }

  global $wpdb;
  // $wpdb->show_errors = TRUE;
  // $wpdb->suppress_errors = TRUE;

	if (isset($_GET)) {

    $widget_sidebar = $wpdb->prefix."sobex_tech_widget_sidebar";
    // START EXPORT SIDEBAR WIDGET
    $results = $wpdb->get_results("SELECT * FROM $table",ARRAY_A);

    if(!empty($results)):
      $sobex_tech_widget_sidebar = '"'.implode('";"',array_keys($results[0])).'";'."\n";;
      
      foreach ($results as $row) {
        $sobex_tech_widget_sidebar .= '"'.implode('";"',$row).'";'."\n";
      }
      $sobex_tech_widget_sidebar .= "\n";
    else:
      $sobex_tech_widget_sidebar = null;
    endif;
    // START EXPORT Menu WIDGET
    $widget_menu = $wpdb->prefix."sobex_tech_widget_menu";
    $results = $wpdb->get_results("SELECT * FROM $widget_menu",ARRAY_A);

    if(!empty($results)):
      $sobex_tech_widget_menu = '"'.implode('";"',array_keys($results[0])).'";'."\n";;
  
      foreach ($results as $row) {
        $sobex_tech_widget_menu .= '"'.implode('";"',$row).'";'."\n";
      }
      $sobex_tech_widget_menu .= "\n";
    else:
      $sobex_tech_widget_menu = null;
    endif;


    //===================================\\
      global $stsearch_get_opts;
      global $stsearch_style_get_opts;
        
      $plugin_options = json_encode($stsearch_get_opts);
      $plugin_style_options = json_encode($stsearch_style_get_opts);

      $zip = new ZipArchive;
      $zip_name = date('Y-m-d') . '-sobex_export.zip';
      if ($zip->open($zip_name, ZipArchive::CREATE) === TRUE)
      {
          $zip->addFile($wpdb->prefix.'sobex_tech_widget_sidebar.csv', 'sobex_tables/'.$wpdb->prefix.'sobex_tech_widget_sidebar.csv');
          $zip->addFile($wpdb->prefix.'sobex_tech_widget_menu.csv', 'sobex_tables/'.$wpdb->prefix.'sobex_tech_widget_menu.csv');
          $zip->addFile('sobex_tech_settings_options.json', 'sobex_options/sobex_tech_settings_options.json');
          $zip->addFile('sobex_tech_style_options.json', 'sobex_options/sobex_tech_style_options.json');
    

          $zip->addFromString('sobex_tables/'.$wpdb->prefix.'sobex_tech_widget_sidebar.csv', $sobex_tech_widget_sidebar);
          $zip->addFromString('sobex_tables/'.$wpdb->prefix.'sobex_tech_widget_menu.csv', $sobex_tech_widget_menu);
          $zip->addFromString('sobex_options/sobex_tech_settings_options.json', $plugin_options);
          $zip->addFromString('sobex_options/sobex_tech_style_options.json', $plugin_style_options);
          // All files are added, so close the zip file.
          $zip->close();

          header(sanitize_text_field($_SERVER['SERVER_PROTOCOL']) . ' 200 OK');
          header("Content-Type: application/zip");
          header("Content-Transfer-Encoding: Binary");    
          header("Content-Length: ".filesize($zip_name)); 
          header("Content-Disposition:attachment;filename=\"".basename($zip_name)."\"");
      
      
          while (ob_get_level()) 
          {
            ob_end_clean();
          }
          readfile($zip_name);   
          exit;
          ob_start ();
      }
    

}


}

/*
==================
  Import Function
======================	 
*/

function sobex_tech_plugin_import() {

  function delfolder($path) {
   $files = array_diff(scandir($path), array('.','..'));
    foreach ($files as $file) {
      (is_dir("$path/$file")) ? delfolder("$path/$file") : unlink("$path/$file");
    }
    return rmdir($path);
  } 

  function sobex_import_successed_toast(){
    echo '<div class="sobex-toast sobex-toast-success"><div class="sobex-toast-icon-container">'
    ;
    echo '<i class="sobex-tech-tick"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
    echo esc_html_e('Successed', 'sobex-tech');
    echo '</p><p class="sobex-toast-msg">';
    echo esc_html_e('Your zip file was uploaded and unpacked & Settings has been updated Successfully.!','sobex-tech');
    echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
  }

  function sobex_import_error_toast($msg) {

    echo '<div class="sobex-toast sobex-toast-error"><div class="sobex-toast-icon-container">';
    echo '<i class="sobex-tech-times"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
    echo esc_html_e('Error', 'sobex-tech').'</p><p class="sobex-toast-msg">';
    if($msg === 'zip_type'){
      echo esc_html_e('The file you are trying to upload is not a .zip file. Please try again.', 'sobex-tech');
    }elseif($msg === 'no_file'){
      echo esc_html_e('Error: File is not exists.', 'sobex-tech');
   }
    elseif('not_json'){
     echo esc_html_e('Error: Option File is not JSON.', 'sobex-tech');
    }elseif($msg === 'db_error_1') {
      echo esc_html_e('Failed to add to database wp_sobex_tech_widget_sidebar.', 'sobex-tech');
    }elseif($msg === 'db_error_2') {
      echo esc_html_e('Failed to add to database wp_sobex_tech_widget_header.', 'sobex-tech');
    }elseif($msg === 'db_error_3') {
      echo esc_html_e('Failed to add to database wp_sobex_tech_widget_menu.', 'sobex-tech');
    }elseif($msg === 'db_error_4') {
      echo esc_html_e('Failed to add to database wp_sobex_tech_user_packages.', 'sobex-tech');
    }elseif($msg === 'extract_faild') {
      echo esc_html_e('Extraced failed.', 'sobex-tech');
    }
    elseif($msg === 'upload_faild') {
      echo esc_html_e('There was a problem with the upload. Please try again.', 'sobex-tech');
    }
    
    echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
  }
  function rmdir_recursive($dir) {
    foreach(scandir($dir) as $file) {
       if ('.' === $file || '..' === $file) continue;
       if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
       else unlink("$dir/$file");
   }

   rmdir($dir);
  }

  if(isset($_FILES))  
  {  

    if(empty($_FILES["file"]["name"])) {
      echo sobex_import_error_toast('no_file');
      exit;
    }

    if($_FILES["file"]["name"]) {
      $filename = sanitize_file_name($_FILES["file"]["name"]);
      $source = sanitize_text_field($_FILES["file"]["tmp_name"]);
      $type = sanitize_mime_type($_FILES["file"]["type"]);
      $name = explode(".", $filename);
      $accepted_types = array('application/zip', 'application/x-zip-compressed', 
      'multipart/x-zip', 'application/x-compressed');
      foreach($accepted_types as $mime_type) {
          if($mime_type == $type) {
              $okay = true;
              break;
          } 
      }
  
      $continue = strtolower($name[1]) == 'zip' ? true : false;
      if(!$continue) {
          echo sobex_import_error_toast('zip_type');
          exit();
      }
  
    /* PHP current path */
    $path = dirname(__FILE__).'/packages/';  // absolute path to the directory where zipper.php is in
    $filenoext = basename ($filename, '.zip');  // absolute path to the directory where zipper.php is in (lowercase)
    $filenoext = basename ($filenoext, '.ZIP');  // absolute path to the directory where zipper.php is in (when uppercase)
    
    $targetdir = $path . $filenoext; // target directory
    $targetzip = $path . $filename; // target zip file

    /* create directory if not exists', otherwise overwrite */
    /* target directory is same as filename without extension */
  
    if (is_dir($targetdir))  rmdir_recursive ( $targetdir);
  
  
    mkdir($targetdir, 0775);
    /* here it is really happening */
      
      if(move_uploaded_file($source, $targetzip)) {
          $zip = new ZipArchive;          // create object
          $res = $zip->open($targetzip);   // open archive
          if($res===TRUE) {
            $zip->extractTo($targetdir);        // extract contents to destination directory
            $zip->close();  
            unlink($targetzip);  

            /* 
              @ Start Import sobex tech options into plugin
            */
            $sobex_tech_settings_options_dir = '/sobex_options/sobex_tech_settings_options.json';
            $sobex_tech_settings_options_string = file_get_contents($targetdir . $sobex_tech_settings_options_dir);
            if ($sobex_tech_settings_options_string === false) {
              echo sobex_import_error_toast('no_file');
              delfolder($targetdir);
              exit;
            }
            
            $sobex_tech_settings_options_json = json_decode($sobex_tech_settings_options_string, true);
              if ($sobex_tech_settings_options_json === null) {
                echo sobex_import_error_toast('not_json');
                delfolder($targetdir);
                exit;
              }
            
            if ( get_option( 'stsearch_opts' ) !== false ) {

                    update_option( 'stsearch_opts', $sobex_tech_settings_options_json );

            }

            /* 
              @ Start Import sobex tech Style options into plugin
            */
            $sobex_tech_style_options_dir = '/sobex_options/sobex_tech_style_options.json';
            $sobex_tech_style_options_string = file_get_contents($targetdir . $sobex_tech_style_options_dir);
            if ($sobex_tech_style_options_string === false) {
              echo sobex_import_error_toast('no_file');
              delfolder($targetdir);
              exit;
            }
            
            $sobex_tech_style_options_json = json_decode($sobex_tech_style_options_string, true);
             if ($sobex_tech_style_options_json == null) {
              echo sobex_import_error_toast('not_json');
              delfolder($targetdir);
              exit;
            }
            
            if ( get_option( 'stsearch_style_opts' ) !== false ) {

                    update_option( 'stsearch_style_opts', $sobex_tech_style_options_json );

            }

            global $wpdb;
            $sobex_tech_widget_sidebar_table_dir = $targetdir . '/sobex_tables/'. $wpdb->prefix.'sobex_tech_widget_sidebar.csv';
            $s = 0;
            global $wpdb;
            $handle = fopen($sobex_tech_widget_sidebar_table_dir, "r");
            while(($filesop = fgetcsv($handle, 1000, ";")) !== false){

              if($s == 1){

                $id = @$filesop[0];
                $attribute_id = @$filesop[1];
                $attribute_woo = @$filesop[2];
                $label_name = @$filesop[3];
                $display_mode = @$filesop[4];
                $play_mode = @$filesop[5];
                $rank_mode = @$filesop[6];
                $device_mode = @$filesop[7];
                $temp_name = @$filesop[8];
                $widget_opt_1 = @$filesop[9];
                $widget_opt_2 = @$filesop[10];
                $widget_opt_3 = @$filesop[11];
                $widget_opt_4 = @$filesop[12];

                if(!empty($attribute_id)) {

                  $widget_sidebar = $wpdb->prefix."sobex_tech_widget_sidebar";
                  $rows = $wpdb->get_results("SELECT * FROM $widget_sidebar",ARRAY_A);
                  $flag = true;
                  foreach($rows as $row){
                    if($row['attribute_id'] == $attribute_id){
                      $result = $wpdb->update( $wpdb->prefix.'sobex_tech_widget_sidebar',
                      array('attribute_id'=>$attribute_id,'attribute_woo'=>$attribute_woo,'label_name'=>$label_name,'display_mode'=>$display_mode,'play_mode'=>$play_mode, 'rank_mode' => $rank_mode,'device_mode'=>$device_mode,'temp_name'=>$temp_name,'widget_opt_1' => $widget_opt_1, 'widget_opt_2' => $widget_opt_2, 'widget_opt_3' => $widget_opt_3, 'widget_opt_4' => $widget_opt_4),array( 'id' => $id ));
                      $flag = false;
                    }
                  }
      
                  if($flag === true) {
                    $result = $wpdb->insert($wpdb->prefix.'sobex_tech_widget_sidebar', array(
                      'attribute_id' => $attribute_id,
                      'attribute_woo' => $attribute_woo,
                      'label_name' => $label_name,
                      'display_mode' => $display_mode,
                      'play_mode' => $play_mode,
                      'rank_mode' => $rank_mode,
                      'device_mode' => $device_mode,
                      'temp_name' => $temp_name,
                      'widget_opt_1' => $widget_opt_1,
                      'widget_opt_2' => $widget_opt_2,
                      'widget_opt_3' => $widget_opt_3,
                      'widget_opt_4' => $widget_opt_4,
                    ));

                  }
                }

                if($result  === FALSE ) {
                  echo sobex_import_error_toast('db_error_1');
                  delfolder($targetdir);
                  exit;
                }
              }
              $s = 1;
            }

            $sobex_tech_widget_menu_table_dir = $targetdir . '/sobex_tables/'. $wpdb->prefix.'sobex_tech_widget_menu.csv';
            $m = 0;
            global $wpdb;
            $handle = fopen($sobex_tech_widget_menu_table_dir, "r");
            while(($filesop = fgetcsv($handle, 1000, ";")) !== false){

              if($m == 1){

                $id = @$filesop[0];
                $menu_id = @$filesop[1];
                $menu_title = @$filesop[2];
                $menu_url = @$filesop[3];
                $menu_icon = @$filesop[4];
                $menu_icon_color = @$filesop[5];
                $menu_temp_name = @$filesop[6];
                $device_mode = @$filesop[7];
                $menu_temp_name =@$filesop[8];
                $menu_opt_1 = @$filesop[9];
                $menu_opt_2 = @$filesop[10];
                $menu_opt_3 = @$filesop[11];
                $menu_opt_4 = @$filesop[12];

                if(!empty($menu_id)) {
                  $widget_menu = $wpdb->prefix."sobex_tech_widget_menu";
                  $rows = $wpdb->get_results("SELECT * FROM $widget_menu",ARRAY_A);
                  $flag = true;
                  foreach($rows as $row){
                    if($row['menu_id'] == $menu_id){
                      $result = $wpdb->update( $wpdb->prefix.'sobex_tech_widget_menu',
                      array('menu_id'=>$menu_id,'menu_title'=>$menu_title,'menu_url'=>$menu_url,'menu_icon'=>$menu_icon, 'menu_icon_color' => $menu_icon_color, 'device_mode'=>$device_mode,'menu_temp_name' => $menu_temp_name, 'menu_opt_1' => $menu_opt_1, 'menu_opt_2' => $menu_opt_2, 'menu_opt_3' => $menu_opt_3, 'menu_opt_4' => $menu_opt_4),array( 'id' => $id ));
                      $flag = false;
                    }
                  }
                  if($flag === true) {
                    $result = $wpdb->insert($wpdb->prefix.'sobex_tech_widget_menu', array(
                      'menu_id' => $menu_id,
                      'menu_title' => $menu_title,
                      'menu_title' => $menu_title,
                      'menu_url' => $menu_url,
                      'menu_icon' => $menu_icon,
                      'menu_icon_color' => $menu_icon_color,
                      'menu_temp_name' => $menu_temp_name,
                      'temp_name' => $temp_name,
                      'menu_opt_1' => $menu_opt_1,
                      'menu_opt_2' => $menu_opt_2,
                      'menu_opt_3' => $menu_opt_3,
                      'menu_opt_4' => $menu_opt_4,
                    ));
                  }
                }

                if($result  === FALSE ) {
                  echo sobex_import_error_toast('db_error_3');
                  delfolder($targetdir);
                  exit;
                }
              }
              $m = 1;
            }

            delfolder($targetdir); // To Delete All Folders
              
          }else{
            echo sobex_import_error_toast('extract_faild');
            delfolder($targetdir);
            exit;
          }
      } else {    
            echo sobex_import_error_toast('upload_faild');
            exit;
      }

  }

  }  
  echo sobex_import_successed_toast();
  wp_die();
}

/*
==================
  Ajax Function For Save Sidebar Attributes
======================	 
*/
add_action( "wp_ajax_save_attributes", "save_attributes" );   //update_records is action
add_action( "wp_ajax_nopriv_save_attributes", "save_attributes" );

function save_attributes(){

  if ( ! current_user_can( 'administrator' ) ) {
    wp_die();
  }
  
  global $wpdb;

  $wpdb->hide_errors();

	if (isset($_POST['update'])) {

    if(isset( $_POST['positions'] ) || !empty( $_POST['positions'] )) {

      map_deep( $positions = $_POST['positions'], 'sanitize_text_field' );
      
      foreach ($positions as $key => $position) {
        $id = sanitize_text_field($position[0]);
        $attribute_woo = sanitize_text_field($position[1]);
        $rank_mode = sanitize_text_field($position[2]);
        $play_mode = sanitize_text_field($position[3]);
        $display_mode = sanitize_text_field($position[4]);

        if($position[1] === 'product_cat') {
          $result = $wpdb->update( $wpdb->prefix.'sobex_tech_widget_sidebar',
          array('rank_mode' => $rank_mode),array( 'id' => $id ));
        }else {
          $result = $wpdb->update( $wpdb->prefix.'sobex_tech_widget_sidebar',
          array('attribute_woo'=>$attribute_woo,'display_mode'=>$display_mode ,'play_mode'=>$play_mode, 'rank_mode' => $rank_mode),array( 'id' => $id ));
        }
      

      }
      if ( $result === FALSE) {
        echo '<div class="sobex-toast sobex-toast-error"><div class="sobex-toast-icon-container">';
        echo '<i class="sobex-tech-times"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
        echo esc_html_e('Error', 'sobex-tech').'</p><p class="sobex-toast-msg">';
        echo $wpdb->last_error;
        echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
        exit;
      } else {
        echo '<div class="sobex-toast sobex-toast-success"><div class="sobex-toast-icon-container">'
        ;
        echo '<i class="sobex-tech-tick"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
        echo esc_html_e('Successed', 'sobex-tech');
        echo '</p><p class="sobex-toast-msg">';
        echo esc_html_e('Your changes are saved successfully.!','sobex-tech');
        echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
      }
    }
	}

  if(isset( $_POST['tags'] )  && !empty( $_POST['tags']) ) {

    $tags_array = array();

    map_deep( $tags = $_POST['tags'], 'sanitize_text_field' );

    foreach($tags as $tag) {
      $tags_array[] = sanitize_text_field($tag[0]);
    }

    if (count($tags_array) === 0) {
      $tags_array = null;
    }

    if ( get_option( 'stsearch_opts' ) !== false ) {

      $tags_option = get_option( 'stsearch_opts' );
      $tags_option['stsearch_product_tags_list'] = $tags_array;
      update_option( 'stsearch_opts', $tags_option );

    }
  }

  if(isset( $_POST['woos'] )  && !empty( $_POST['woos']) ) {

    $woos_array = array();

    map_deep( $woos = $_POST['woos'], 'sanitize_text_field' );

    foreach($woos as $woo) {
      $woos_array[] = sanitize_text_field($woo[0]);
    }

    if (count($woos_array) === 0) {
      $woos_array = null;
    }

    if ( get_option( 'stsearch_opts' ) !== false ) {

      $woos_option = get_option( 'stsearch_opts' );
      $woos_option['stsearch_default_woocommerce_filter_list'] = $woos_array;
      update_option( 'stsearch_opts', $woos_option );

    }
  }

  if(isset( $_POST['price_setting'] )  && !empty( $_POST['price_setting']) ) {

    $price_setting_value = sanitize_text_field($_POST['price_setting']);

    if ( get_option( 'stsearch_opts' ) !== false ) {

      $price_setting = get_option( 'stsearch_opts' );
      $price_setting['stsearch_price_filter_min_setting'] = $price_setting_value;
      update_option( 'stsearch_opts', $price_setting );

    }
  }

  
  if(isset($_POST['update_names']) && isset($_POST['labels'])){

    map_deep( $labels = $_POST['labels'], 'sanitize_text_field' );

    foreach ($labels as $key => $label) {
      $id = sanitize_text_field($label[0]);
      $label_name = sanitize_text_field($label[1]);
      $result = $wpdb->update( $wpdb->prefix.'sobex_tech_widget_sidebar',
			array('label_name'=>$label_name),array( 'id' => $id ));
    }
    if ( $result === FALSE) {
      echo '<div class="sobex-toast sobex-toast-error"><div class="sobex-toast-icon-container">';
      echo '<i class="sobex-tech-times"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
      echo esc_html_e('Error', 'sobex-tech').'</p><p class="sobex-toast-msg">';
      echo $wpdb->last_error;
      echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
      exit;
    } else {
      echo '<div class="sobex-toast sobex-toast-success"><div class="sobex-toast-icon-container">'
      ;
      echo '<i class="sobex-tech-tick"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
      echo esc_html_e('Successed', 'sobex-tech');
      echo '</p><p class="sobex-toast-msg">';
      echo esc_html_e('Your changes are saved successfully.!','sobex-tech');
      echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
    }
  }
  wp_die();


}
add_action( "wp_ajax_save_widget_header", "save_widget_header" );   //update_records is action
add_action( "wp_ajax_nopriv_save_widget_header", "save_widget_header" );

/*
==================
  Ajax Function For Save Menu Settings
======================	 
*/
add_action( "wp_ajax_save_menu_style_settings", "save_menu_style_settings" );   //update_records is action
add_action( "wp_ajax_nopriv_save_menu_style_settings", "save_menu_style_settings" );

function save_menu_style_settings(){

  if ( ! current_user_can( 'administrator' ) ) {
    wp_die();
  }
  
  global $wpdb;

  $wpdb->hide_errors();

	if (isset($_POST['update'])) {

    if(isset( $_POST['parent_menus'] )  && !empty( $_POST['parent_menus']) ) {

      map_deep( $parent_menus = $_POST['parent_menus'], 'sanitize_text_field' );

      foreach ($parent_menus as $key => $parent_menu) {
        $id = sanitize_text_field($parent_menu[0]);
        $icon_class = sanitize_text_field($parent_menu[1]);
        $icon_color = sanitize_text_field($parent_menu[2]);
        $result = $wpdb->update( $wpdb->prefix.'sobex_tech_widget_menu',
        array('menu_icon'=>$icon_class ,'menu_icon_color'=>$icon_color),array( 'menu_id' => $id ));

      }
      if ( $result === FALSE) {
        echo '<div class="sobex-toast sobex-toast-error"><div class="sobex-toast-icon-container">';
        echo '<i class="sobex-tech-times"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
        echo esc_html_e('Error', 'sobex-tech').'</p><p class="sobex-toast-msg">';
        echo $wpdb->last_error;
        echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
        exit;
      } else {
        echo '<div class="sobex-toast sobex-toast-success"><div class="sobex-toast-icon-container">'
        ;
        echo '<i class="sobex-tech-tick"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
        echo esc_html_e('Successed', 'sobex-tech');
        echo '</p><p class="sobex-toast-msg">';
        echo esc_html_e('Your changes are saved successfully.!','sobex-tech');
        echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
      }
    }

    if(isset( $_POST['child_menus'] )  && !empty( $_POST['child_menus']) ) {

      map_deep( $child_menus = $_POST['child_menus'], 'sanitize_text_field' );
      
      foreach ($child_menus as $key => $child_menu) {
        $id = sanitize_text_field($child_menu[0]);
        $icon_class = sanitize_text_field($child_menu[1]);
        $icon_color = sanitize_text_field($child_menu[2]);
        $result = $wpdb->update( $wpdb->prefix.'sobex_tech_widget_menu',
        array('menu_icon'=>$icon_class ,'menu_icon_color'=>$icon_color),array( 'menu_id' => $id ));
      }
      if ( $result === FALSE) {
        echo '<div class="sobex-toast sobex-toast-error"><div class="sobex-toast-icon-container">';
        echo '<i class="sobex-tech-times"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
        echo esc_html_e('Error', 'sobex-tech').'</p><p class="sobex-toast-msg">';
        echo $wpdb->last_error;
        echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
        exit;
      } else {
        echo '<div class="sobex-toast sobex-toast-success"><div class="sobex-toast-icon-container">'
        ;
        echo '<i class="sobex-tech-tick"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
        echo esc_html_e('Successed', 'sobex-tech');
        echo '</p><p class="sobex-toast-msg">';
        echo esc_html_e('Your changes are saved successfully.!','sobex-tech');
        echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
      }
    }
	}

  wp_die();

}
/*
==================
  Ajax Function For Update filter widget Attributes
======================	 
*/
add_action( "wp_ajax_sobex_update_filter_widget", "sobex_update_filter_widget" );   //update_records is action
add_action( "wp_ajax_nopriv_sobex_update_filter_widget", "sobex_update_filter_widget" );

function sobex_update_filter_widget(){

  if ( ! current_user_can( 'administrator' ) ) {
    wp_die();
  }

  global $wpdb;

	if (isset($_POST['reset'])) {

    global $wpdb;

    /* Load Attribtes From database */
    $table_name = $wpdb->prefix.'sobex_tech_widget_sidebar'; // Table Name

    $table_header_name = $wpdb->prefix.'sobex_tech_widget_header'; // Table Name

    $table = $wpdb->prefix.'sobex_tech_widget_sidebar';
  
    $rows = $wpdb->get_results( "SELECT * FROM  $table_name", ARRAY_A);

    $not_attributes = array('product_cat','product_tag','price_input','search_input','default_woocommerce_filter');

    $woo_attributes = wc_get_attribute_taxonomies();

    if(isset($rows) && !empty($rows)) {

      foreach($rows as $row) {

        $sobex_attribute_name = $row['attribute_woo'];
        $sobex_attribute_id = $row['attribute_id'];

        if( in_array($sobex_attribute_id, $not_attributes )  == false )  {

          if(!empty($woo_attributes)) {

            $woo_attribute_id_array = array();
            $woo_attribute_name_array = array();

            foreach($woo_attributes as $woo_attribute):

              $woo_attribute_id_array[] = $woo_attribute->attribute_id;
              $woo_attribute_name_array[] = $woo_attribute->attribute_name;

            endforeach;

            if(!in_array($sobex_attribute_id, $woo_attribute_id_array)) {

              $wpdb->delete( $table_name, array( 'attribute_id' => $sobex_attribute_id ) );

            }
            else { // if inside array/ Now Check if has same name

              if(!in_array($sobex_attribute_name, $woo_attribute_name_array)) {

                $new_attribute_name = '';
                foreach($woo_attributes as $woo_attribute):
                    if( $woo_attribute->attribute_id == $sobex_attribute_id ) {
                      $new_attribute_name = $woo_attribute->attribute_name;
                      break;
                  
                    }
                endforeach;

                $wpdb->update( $wpdb->prefix.$table, array('attribute_woo'=>esc_attr($new_attribute_name)),array( 'attribute_id' => $sobex_attribute_id ));
  
              }

            }

          }

        }

      }
    }
   
    if($wpdb->last_error !== '') {
      echo '<div class="sobex-toast sobex-toast-error"><div class="sobex-toast-icon-container">';
      echo '<i class="sobex-tech-times"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
      echo esc_html_e('Error: While updating the data.', 'sobex-tech').'</p><p class="sobex-toast-msg">';
      echo $wpdb->last_error;
      echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
      exit;
    } else {
      echo '<div class="sobex-toast sobex-toast-success"><div class="sobex-toast-icon-container">'
      ;
      echo '<i class="sobex-tech-tick"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
      echo esc_html_e('Successed: The data has been updated', 'sobex-tech');
      echo '</p><p class="sobex-toast-msg">';
      echo esc_html_e('Your changes are saved successfully.!','sobex-tech');
      echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
    }
	}
  wp_die();
}
/*
==================
  Ajax Function For reset filter widget sidebar style
======================	 
*/
add_action( "wp_ajax_sobex_reset_filter_widget_sidebar_style", "sobex_reset_filter_widget_sidebar_style" );   //reset_records is action
add_action( "wp_ajax_nopriv_sobex_reset_filter_widget_sidebar_style", "sobex_reset_filter_widget_sidebar_style" );
function sobex_reset_filter_widget_sidebar_style(){

  if ( ! current_user_can( 'administrator' ) ) {
    wp_die();
  }

  global $wpdb;
	if (isset($_POST['reset'])) {

    if ( get_option( 'stsearch_style_opts' ) !== false ) {

      // Start Sidebar
      $widget_sidebar_styles = array(
        'widget_sidebar_icon',
        'widget_icon_color',
        'widget_table_text_color',
        'widget_table_font_size',
        'widget_table_buttons_font_size',
        'widget_field_text_color',
        'widget_field_font_size',
        'widget_icon_slideup',
        'widget_icon_slideup_color',
        'widget_icon_slidedown',
        'widget_icon_slidedown_color',
        'widget_search_background_color',
        'widget_search_background_hover',
        'widget_search_title_color',
        'widget_search_icon',
        'widget_search_icon_color',
        'widget_clear_icon',
        'widget_clear_icon_color',
        'widget_table_radius',
        'widget_table_background_color',
        'hide_sidebar_container_background_color',
        'sidebar_container_background_color',
        'filter_all_text_color',
        'filter_all_icon',
        'filter_all_icon_color',
        'clear_all_text_color',
        'clear_all_icon',
        'clear_all_icon_color',
        'sidebar_scroll_type',
        'sidebar_scroll_color',
        'sidebar_scroll_height',
      );
      
      $sidebar_option = get_option( 'stsearch_style_opts' );
      foreach($widget_sidebar_styles as $widget_sidebar_style) {

        if(isset($sidebar_option[$widget_sidebar_style]) || !empty($sidebar_option[$widget_sidebar_style])):
          $sidebar_option[$widget_sidebar_style] = null;
        endif;

        $result = update_option( 'stsearch_style_opts', $sidebar_option );
      }
      if ( $result === FALSE) {
        echo '<div class="sobex-toast sobex-toast-error"><div class="sobex-toast-icon-container">';
        echo '<i class="sobex-tech-times"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
        echo esc_html_e('Error', 'sobex-tech').'</p><p class="sobex-toast-msg">';
        echo esc_html_e('Error: While resetting sidebar Style. Or Already has been reset before.', 'sobex-tech');
        echo $wpdb->last_error;
        echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
        exit;
      } else {
        echo '<div class="sobex-toast sobex-toast-success"><div class="sobex-toast-icon-container">'
        ;
        echo '<i class="sobex-tech-tick"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
        echo esc_html_e('Successed: Sidebar Style has been reset', 'sobex-tech');
        echo '</p><p class="sobex-toast-msg">';
        echo esc_html_e('Your changes are saved successfully.!','sobex-tech');
        echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
      }


    }
   
	}
  wp_die();
}

/*
==================
  Ajax Function For Update menu widget
======================	 
*/
add_action( "wp_ajax_sobex_update_menu_widget", "sobex_update_menu_widget" );   //update_records is action
add_action( "wp_ajax_nopriv_sobex_update_menu_widget", "sobex_update_menu_widget" );

function sobex_update_menu_widget(){

  if ( ! current_user_can( 'administrator' ) ) {
    wp_die();
  }

  global $wpdb;
  global $stsearch_get_opts;
  // $wpdb->hide_errors();

	if (isset($_POST['reset'])) {

    if(isset($stsearch_get_opts['menu_menu_specific_name']) && !empty($stsearch_get_opts['menu_menu_specific_name'])) {

      $temp_name = $stsearch_get_opts['menu_menu_specific_name'];

      $menus = wp_get_nav_menu_items($temp_name);
      $widget_menu = $wpdb->prefix."sobex_tech_widget_menu";
      $rows = $wpdb->get_results( "SELECT * FROM $widget_menu ", ARRAY_A);

      $insert_again = False;
      foreach($rows as $row):
        if(empty($row['menu_temp_name'])):
          $insert_again = True;
          break;
        endif;
      endforeach;
      if($insert_again == True):
          $wpdb->query("TRUNCATE TABLE `wp_sobex_tech_widget_menu`");
          global $stsearch_get_opts;
          function wp_get_menu_array_insert_again($current_menu) {
    
            $menu_array = wp_get_nav_menu_items($current_menu);
        
            $menu = array();
        
            function populate_children_insert_again($menu_array, $menu_item)
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
                            $children[$m->ID]['children'] = populate_children_insert_again($menu_array, $m);
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
                    $menu[$m->ID]['children'] = populate_children_insert_again($menu_array, $m);
                }
            }
        
            return $menu;
        
        }
        
        function get_menu_html_insert_again( $menu_array, $level = 1 ){
        
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
                  echo get_menu_html_insert_again( $menu['children'], $new_level );
                }
                
          
              }
      
      
          $menu_html = ob_get_clean();
        
          return $menu_html;
      
          }
        }
      
        if( !empty( $stsearch_get_opts['menu_menu_specific_name'] ) ) {
          $current_menu = $stsearch_get_opts['menu_menu_specific_name'];
          $menu_arrays = wp_get_menu_array_insert_again($current_menu);
          echo get_menu_html_insert_again($menu_arrays); 
          
        }
      endif;

      $widget_menu = $wpdb->prefix."sobex_tech_widget_menu";
      $rows = $wpdb->get_results( "SELECT * FROM $widget_menu WHERE `menu_temp_name` = '$temp_name' ORDER BY `menu_id` ASC", ARRAY_A);
        $menu_id_array = array();
        $menu_title_array = array();
        $menu_url_array = array();
        foreach($menus as $menu) {
          $menu_id_array[] = $menu->ID;
          $menu_title_array[] = $menu->title;
          $menu_url_array[] = $menu->url;
        }

      foreach($rows as $row) {
        if( in_array($row['menu_id'], $menu_id_array ) == false ) {

          $wpdb->delete( 'wp_sobex_tech_widget_menu', array( 'menu_id' => esc_attr($row['menu_id']) ) );

        }else{

          if( in_array($row['menu_title'], $menu_title_array ) == false ) { 

            foreach($menus as $menu) {
              if($menu->ID == $row['menu_id']) {
                $new_menu_title = $menu->title;
              }
            }

            $wpdb->update( 'wp_sobex_tech_widget_menu', array('menu_title'=>esc_attr($new_menu_title)),array( 'menu_id' => esc_attr($row['menu_id']) ));

          }
          elseif( in_array($row['menu_url'], $menu_url_array ) == false ) {

            foreach($menus as $menu) {
              if($menu->ID == $row['menu_id']) {
                $new_menu_url = $menu->url;
              }
            }

              $wpdb->update( 'wp_sobex_tech_widget_menu', array('menu_url'=>esc_attr($new_menu_url)),array( 'menu_id' => esc_attr($row['menu_id']) ));

          }

        }
      }
      if($wpdb->last_error !== '') {
        echo '<div class="sobex-toast sobex-toast-error"><div class="sobex-toast-icon-container">';
        echo '<i class="sobex-tech-times"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
        echo esc_html_e('Error', 'sobex-tech').'</p><p class="sobex-toast-msg">';
        echo esc_html_e('While Updating Menu.', 'sobex-tech');
        echo $wpdb->last_error;
        echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
        exit;
      } else {
        echo '<div class="sobex-toast sobex-toast-success"><div class="sobex-toast-icon-container">'
        ;
        echo '<i class="sobex-tech-tick"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
        echo esc_html_e('Successed', 'sobex-tech');
        echo '</p><p class="sobex-toast-msg">';
        echo esc_html_e('Your Menu has been Updated!','sobex-tech');
        echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
      }
    }else {
      echo '<div class="sobex-toast sobex-toast-error"><div class="sobex-toast-icon-container">';
      echo '<i class="sobex-tech-times"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
      echo esc_html_e('Error', 'sobex-tech').'</p><p class="sobex-toast-msg">';
      echo esc_html_e('Please Select Menu First.', 'sobex-tech');
      echo $wpdb->last_error;
      echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
      exit;
    }
	}

}
/*
==================
  Ajax Function For reset menu slide style style
======================	 
*/
add_action( "wp_ajax_sobex_reset_menu_slide_style", "sobex_reset_menu_slide_style" );   //reset_records is action
add_action( "wp_ajax_nopriv_sobex_reset_menu_slide_style", "sobex_reset_menu_slide_style" );
function sobex_reset_menu_slide_style(){

  if ( ! current_user_can( 'administrator' ) ) {
    wp_die();
  }

  global $wpdb;
	if (isset($_POST['reset'])) {

    if ( get_option( 'stsearch_style_opts' ) !== false ) {

      // Start Menu
      $menu_slide_styles = array(
        'menu_menu_buttons_title_color',
        'menu_menu_buttons_background_color',
        'menu_menu_buttons_background_hover',
        'menu_menu_clear_all_icon',
        'menu_menu_filter_all_icon',
        'menu_menu_buttons_icon_color',
        'menu_menu_icon_slide',
        'menu_menu_icon_color_slide',
        'menu_menu_breadcrumb_font_size',
        'menu_menu_buttons_font_size',
        'menu_menu_title_font_size',
        'menu_menu_title_color',
        'menu_menu_checked_background_color',
        'menu_menu_background_color',
        'menu_menu_hover_color',
        'menu_breadcrumb_title_color',
        'menu_breadcrumb_background_title_color',
        'menu_breadcrumb_background_hover_color',
        'menu_breadcrumb_background_color',
        'menu_display_shadow',
        'menu_background_shadow',
        'menu_border_radius',
        'menu_menu_z_index',
        'menu_menu_home_title',
        'menu_scrollbar_color',
        'menu_menu_level_child_icon',

      );

      $menu_option = get_option( 'stsearch_style_opts' );
      foreach($menu_slide_styles as $menu_slide_style) {

        if(isset($menu_option[$menu_slide_style]) || !empty($menu_option[$menu_slide_style])):
          $menu_option[$menu_slide_style] = null;
        endif;

        $result = update_option( 'stsearch_style_opts', $menu_option );
      }
      if ( $result === FALSE) {
        echo '<div class="sobex-toast sobex-toast-error"><div class="sobex-toast-icon-container">';
        echo '<i class="sobex-tech-times"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
        echo esc_html_e('Error', 'sobex-tech').'</p><p class="sobex-toast-msg">';
        echo esc_html_e('While resetting Menu Style. Or Already has been reset before.', 'sobex-tech');
        echo $wpdb->last_error;
        echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
        exit;
      } else {
        echo '<div class="sobex-toast sobex-toast-success"><div class="sobex-toast-icon-container">'
        ;
        echo '<i class="sobex-tech-tick"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
        echo esc_html_e('Successed', 'sobex-tech');
        echo '</p><p class="sobex-toast-msg">';
        echo esc_html_e('Your Menu Style has been reset!','sobex-tech');
        echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
      }


    }

	}
  wp_die();
}
/*
==================
  Ajax Function For reset menu slide style icons
======================	 
*/
add_action( "wp_ajax_sobex_reset_menu_slide_icons_style", "sobex_reset_menu_slide_icons_style" );   //reset_records is action
add_action( "wp_ajax_nopriv_sobex_reset_menu_slide_icons_style", "sobex_reset_menu_slide_icons_style" );
function sobex_reset_menu_slide_icons_style(){

  if ( ! current_user_can( 'administrator' ) ) {
    wp_die();
  }

  global $wpdb;
  global $stsearch_get_opts;

	if (isset($_POST['reset'])) {

    if(isset($stsearch_get_opts['menu_menu_specific_name']) && !empty($stsearch_get_opts['menu_menu_specific_name'])) {
      $temp_name = $stsearch_get_opts['menu_menu_specific_name'];
      $default_icon = 'sobex-tech-favorite';
      $result = $wpdb->update( $wpdb->prefix.'sobex_tech_widget_menu', array('menu_icon'=>esc_attr($default_icon),'menu_icon_color'=>'#16a27b'),array( 'menu_temp_name' => $temp_name ));
    }else {
      echo '<div class="sobex-toast sobex-toast-error"><div class="sobex-toast-icon-container">';
      echo '<i class="sobex-tech-times"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
      echo esc_html_e('Error', 'sobex-tech').'</p><p class="sobex-toast-msg">';
      echo esc_html_e('Please Select Menu First.', 'sobex-tech');
      echo $wpdb->last_error;
      echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
      exit;
    }
    if ( $result === FALSE) {
      echo '<div class="sobex-toast sobex-toast-error"><div class="sobex-toast-icon-container">';
      echo '<i class="sobex-tech-times"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
      echo esc_html_e('Error', 'sobex-tech').'</p><p class="sobex-toast-msg">';
      echo esc_html_e('While resetting Menu Icons. Or Already has been reset before.', 'sobex-tech');
      echo $wpdb->last_error;
      echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
      exit;
    } else {
      echo '<div class="sobex-toast sobex-toast-success"><div class="sobex-toast-icon-container">'
      ;
      echo '<i class="sobex-tech-tick"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
      echo esc_html_e('Successed', 'sobex-tech','sobex-tech');
      echo '</p><p class="sobex-toast-msg">';
      echo esc_html_e('Your Menu Icons has been reset!','sobex-tech');
      echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
    }

	}
  wp_die();
}
/*
==================
  Ajax Function to get client domain
======================	 
*/
add_action( "wp_ajax_sobextech_get_client_domain", "sobextech_get_client_domain" );   //reset_records is action
add_action( "wp_ajax_nopriv_sobextech_get_client_domain", "sobextech_get_client_domain" );
function sobextech_get_client_domain(){

  if ( ! current_user_can( 'administrator' ) ) {
    wp_die();
  }
  // $data = array( 'result' => null, 'content' => null);

  global $wpdb;
  global $stsearch_get_opts;
  $result = FALSE;

	if (isset($_POST['accepted'])) {
  

    $domain = sanitize_text_field($_SERVER['SERVER_NAME']);

    if(isset($domain) || !empty($domain)):

      $url = "https://sobextech.com/musk/checkfreeusers.php?domain=" . urlencode($domain);

      // Initialize a cURL session
      $curl = curl_init($url);
  
      // Set cURL options
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  
      // Execute the cURL request
      $response = curl_exec($curl);
      
      // Check for cURL errors
      if (curl_errno($curl)) {
          echo 'cURL error: ' . curl_error($curl);
          return false;
      }
  
      // Close the cURL session
      curl_close($curl);
  
      // Decode the JSON response
      $send = json_decode($response, true);
      // Check if the response indicates success
      if (isset($send['success']) && $send['success'] === true) {
        $result = TRUE;
  
        $stsearch_opts = get_option('stsearch_opts');
  
        // Get the current options
        $stsearch_opts = get_option('stsearch_opts');

        // Check if the option is an array and set the value
        if (is_array($stsearch_opts)) {
            $stsearch_opts['sobextech_activated_domain'] = 1; // Set the value to 1
        } else {
            // If it's not an array, initialize it
            $stsearch_opts = array('sobextech_activated_domain' => 1);
        }

        // Update the option with the modified array
        update_option('stsearch_opts', $stsearch_opts);
        
      } else {
        $result = FALSE;
      }
    ?>
    
    <?php
    endif;
    ob_start();
    if ( $result === FALSE) {
      echo '<div class="sobex-toast sobex-toast-error"><div class="sobex-toast-icon-container">';
      echo '<i class="sobex-tech-times"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
      echo esc_html_e('Error', 'sobex-tech').'</p><p class="sobex-toast-msg">';
      echo esc_html_e('Something went wrong.', 'sobex-tech');
      echo $wpdb->last_error;
      echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
    } else {
      echo '<div class="sobex-toast sobex-toast-success"><div class="sobex-toast-icon-container">'
      ;
      echo '<i class="sobex-tech-tick"></i></div><div class="sobex-toast-title-container"><p class="sobex-toast-type">';
      echo esc_html_e('Successed', 'sobex-tech','sobex-tech');
      echo '</p><p class="sobex-toast-msg">';
      echo esc_html_e('Successfully completed, the page will now be reloaded','sobex-tech');
      echo '</p></div><button class="sobex-toast-close">&times;</button></div>';
    }
    $content = ob_get_clean();
    $data = array(
      'result' => 'success',
      'content'   => $content,
    );
    $jsonData = json_encode($data);
    // $dataArray = explode(PHP_EOL, $content);
    echo $jsonData;
	}

  exit();
}