<?php
defined( 'ABSPATH' ) || exit;
function sobextech_widget_AccoSlider() {
  global $stsearch_get_opts;
    function populate_children($menu_array, $menu_item)
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
            $children[$m->ID]['children'] = populate_children($menu_array, $m);
          }
        }
      };
      return $children;
    }
    
    function wp_get_menu_array($current_menu) {
    
        $menu_array = wp_get_nav_menu_items($current_menu);
    
        $menu = array();
    
        foreach ($menu_array as $m) {
            if (empty($m->menu_item_parent)) {
                $menu[$m->ID] = array();
                $menu[$m->ID]['ID'] = $m->ID;
                $menu[$m->ID]['title'] = $m->title;
                $menu[$m->ID]['url'] = $m->url;
                $menu[$m->ID]['slug'] = $m->post_name;
                $menu[$m->ID]['children'] = populate_children($menu_array, $m);
            }
        }
    
        return $menu;
    
    }
    function get_menu_html( $menu_array, $level = 1 ){
    global $stsearch_get_opts;

      
    ob_start();
    echo '
    <ul class="sobex-accoslider-ul-filter">
        ';
        foreach ($menu_array as $menu_id => $menu) {

              if(isset($stsearch_get_opts['menu_menu_display_type']) && !empty($stsearch_get_opts['menu_menu_display_type'])):
                if($stsearch_get_opts['menu_menu_display_type'] === 'hide'):
                  $isset_products_in_category = sobextech_check_if_category_has_products($menu['title']);
                  if($isset_products_in_category == TRUE):

                      if ($menu['children']) {
                        echo '
                        <li class="sobex-accoslider-li-filter">';
                            echo '<a class="sobex-main-menu-names sobex-li-parent">';
                            echo "<i class='";
                              echo sobextech_get_menu_class_from_db($menu['ID']);
                              echo "' style='color:";
                                echo sobextech_get_menu_color_id_from_db($menu['ID']);
                            echo "!important'></i>";
                            echo esc_attr($menu['title']); echo "</a>";
                      } else{
                            echo '
                        <li class="sobex-accoslider-li-filter">';
                            echo "<label  for='"; echo esc_attr($menu['title']); echo"' class='sobex-menu-label-for-check'>";
                            echo "<input type='radio' class='sobex-menu-check-with-label' id='"; echo esc_attr($menu['title']); echo"' value='"; echo esc_attr($menu['title']); echo"' name='product_cat'";
                            if(!empty($checked)){ if( $menu['title'] === $checked ){echo "checked"; }}
                            echo "/>";
                            echo '<a class="sobex-main-menu-names sobex-li-child">';
                            echo "<i class='";
                              echo sobextech_get_menu_class_from_db($menu['ID']);
                              echo "' style='color:";
                                echo sobextech_get_menu_color_id_from_db($menu['ID']);
                            echo "!important'></i>";
                            echo esc_attr($menu['title']); echo"</a>";
                            echo '</label>';
                      }
                      if( count($menu['children']) ){
                      $new_level = $level + 1;
                      echo get_menu_html( $menu['children'], $new_level );
                      }
                      
                  endif;
                elseif($stsearch_get_opts['menu_menu_display_type'] === 'unhide'):
                      if ($menu['children']) {
                        echo '
                        <li class="sobex-accoslider-li-filter">';
                            echo '<a class="sobex-main-menu-names sobex-li-parent">';
                            echo "<i class='";
                            echo sobextech_get_menu_class_from_db($menu['ID']);
                            echo "' style='color:";
                              echo sobextech_get_menu_color_id_from_db($menu['ID']);
                            echo "!important'></i>";
                            echo esc_attr($menu['title']); echo"</a>";
                      } else{
                            echo '
                        <li class="sobex-accoslider-li-filter">';
                            echo "<label  for='"; echo esc_attr($menu['title']); echo"' class='sobex-menu-label-for-check'>";
                            echo "<input type='radio' class='sobex-menu-check-with-label' id='"; echo esc_attr($menu['title']); echo"' value='"; echo esc_attr($menu['title']); echo"' name='product_cat'";
                            if(!empty($checked)){ if( $menu['title'] === $checked ){echo "checked"; }}
                            echo "/>";
                            echo '<a class="sobex-main-menu-names sobex-li-child">';
                            echo "<i class='";
                              echo sobextech_get_menu_class_from_db($menu['ID']);
                              echo "' style='color:";
                                echo sobextech_get_menu_color_id_from_db($menu['ID']);
                            echo "!important'></i>";
                            echo esc_attr($menu['title']); echo"</a>";
                            echo '</label>';
                      }
                      if( count($menu['children']) ){
                      $new_level = $level + 1;
                      echo get_menu_html( $menu['children'], $new_level );
                      }
                endif;

              endif;
            echo "
        </li>
        ";
        }

        echo "
    </ul>
    ";
    $menu_html = ob_get_clean();
        return $menu_html;
        }

    global $stsearch_style_get_opts;
    // This function will return array of menu items
    if( !empty( $stsearch_get_opts['menu_menu_specific_name'] ) ) {
      $current_menu = $stsearch_get_opts['menu_menu_specific_name'];
      $menu_arrays = wp_get_menu_array($current_menu);
      echo '
      <div class="sobex-menu-slide-main-container">
          ';
          echo '
          <div id="sobex-menu-drillcrumb" class="breadcrumb sobex-menu-breadcrumb"></div>
          ';
            echo '<div class="sobex-menu-slide-clear-button">';
                echo sobex_techwidget_wpml_clear_all_string(); 
                echo '<i class="';
                      if(isset($stsearch_style_get_opts['menu_menu_clear_all_icon']) || !empty($stsearch_style_get_opts['menu_menu_clear_all_icon'])) echo esc_attr($stsearch_style_get_opts['menu_menu_clear_all_icon']); else echo 'sobex-tech-unchecked';
                echo '"></i>';
              echo '</div>'; 
              echo '<div class="sobex-menu-slide-filter-button">';
                echo sobextech_widget_wpml_filter_all_string();
                echo '<i class="';
                if(isset($stsearch_style_get_opts['menu_menu_filter_all_icon']) || !empty($stsearch_style_get_opts['menu_menu_filter_all_icon'])) echo esc_attr($stsearch_style_get_opts['menu_menu_filter_all_icon']); else echo 'sobex-tech-check-1';
                echo '"></i>';
            echo '</div>';
          echo '
          <div id="sobex-menu-slide-menu" class="sobex-menu-slide-menu sobex-accoslider-radio">';
              echo get_menu_html($menu_arrays); 
              echo '<br style="clear: left" />';
              echo '
          </div>
          ';
          echo '
      </div>
      ';
    }
    
}
function sobextech_widget_AccoSlider_script() {
  ?>
  <script>
          //** Sobex AccoSlider Menu v1.0- Sobex-Tech: http://www.sobextech.com
      //Version 1.0: June 1st, 2022':
      //**1) Ability to include menu from external file and added to page via Ajax
      //**2) Adds drillmenuinstance.back() method, which can be called on demand to go back one level within drill menu
      //**3) Fixes bug with background ULs being visible following foreground UL contents
      //**4) Updated css so browsers with JS disabled will get a scrolling, fixed height UL

      
      function Sobex_AccoSlider_Menu(setting){
        this.sublevelarrow='<?php global $stsearch_style_get_opts; if(isset($stsearch_style_get_opts['menu_menu_icon_slide']) || !empty($stsearch_style_get_opts['menu_menu_icon_slide'])) echo esc_attr($stsearch_style_get_opts['menu_menu_icon_slide']); else echo 'sobex-tech-left-arrow-1'; ?>' //full URL to image used to indicate there's a sub level
        this.breadcrumbarrow='' //full URL to image separating breadcrumb links (if it's defined)
        this.loadingimage='<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_FRONT . '/loading-widget.gif' ?>' //full URL to 'loading' image, if menu is loaded via Ajax
        this.homecrumbtext='<?php echo sobextechwidget_menu_home_title_string();  ?>' //Top level crumb text
        this.titlelength=35 //length of parent LI text to extract from to use as crumb titles
        this.backarrow='' //full URL to image added in front of back LI 

        ////////// No need to edit beyond here /////////////
        this.menuid=setting.menuid
        this.$menudiv=null
        this.mainul=null
        this.$uls=null
        this.navdivs={}
        this.menuheight=setting.menuheight || 'auto'
        this.selectedul=setting.selectedul || null
        this.speed=setting.speed || 70
        this.persist=setting.persist || {enable: false, overrideselectedurl: false}
        this.$arrowimgs=null
        this.currentul=0
        this.filesetting=setting.filesetting || {url: null, targetElement: null}
        this.zIndexvalue=<?php if(isset($stsearch_style_get_opts['menu_menu_z_index']) || !empty($stsearch_style_get_opts['menu_menu_z_index'])) echo esc_attr($stsearch_style_get_opts['menu_menu_z_index']); else echo '40'  ?>;
        this.arrowposx=0 //default arrow x position relative to parent LI
        var thisdrill=this
        jQuery.noConflict()
        jQuery(document).ready(function($){
          if (thisdrill.filesetting.url && thisdrill.filesetting.url.length>0){ //menu defined inside external file (use Ajax)?
            var $dest=(typeof thisdrill.filesetting.targetElement=="string")? $('#'+thisdrill.filesetting.targetElement) : null
            if (!$dest || $dest.length!=1){ //if target element isn't defined or multiple targets found
              alert("Error: The target element \"" + thisdrill.filesetting.targetElement + "\" to add the menu into doesn't exist or is incorrectly specified.")
              return
            }
            $dest.html('<img src="'+thisdrill.loadingimage+'" style="vertical-align:middle" /> <b>Loading Drill Down Menu...</b>')
            $.ajax({
              url: thisdrill.filesetting.url,
              error:function(ajaxrequest){
                alert('Error fetching Ajax content.\nServer Response: '+ajaxrequest.responseText)
              }, //end error
              success:function(content){
                $dest.html(content)
                thisdrill.init($, setting)
              } //end success
            }) //end ajax
          }
          else{ //if inline menu
            thisdrill.init($, setting)
          }
        }) //end document.ready
      }

      Sobex_AccoSlider_Menu.prototype.init=function($, setting){
          var thisdrill=this
          var $maindiv=$('#'+setting.menuid).css({position:'relative'}) //relative position main DIV
          var $uls=$maindiv.find('.sobex-accoslider-ul-filter')
          $uls.css({position:'absolute', left:0, top:0, visibility:'hidden'}) //absolutely position ULs
          this.$maindiv=$maindiv
          this.$uls=$uls
          this.navdivs.$crumb=$('#'+setting.breadcrumbid)
          this.navdivs.$backbuttons=$('a[rel^="drillback-'+setting.menuid+'"]').css({outline:'none'}).click(function(e){
            thisdrill.back()
            e.preventDefault()
          })
          this.buildmenu($)
          $(window).bind('unload', function(){
            thisdrill.uninit()
          })
          
          setting=null	

      }

      Sobex_AccoSlider_Menu.prototype.buildmenu=function($){

        var thisdrill=this
        this.$uls.each(function(i){ //loop through each UL
          var $thisul=$(this)
          var $thisul=$(this)
          if (i==0){ //if topmost UL
            $('<li class="backcontroltitle" style="display:none;">Site Navigation</li>').prependTo($thisul).click(function(e){e.preventDefault()})
            thisdrill.$maindiv.css({height:(thisdrill.menuheight=='auto')? $thisul.outerHeight() : parseInt(thisdrill.menuheight), overflow:'hidden'}) //set main menu DIV's height to top level UL's height
              .data('h', parseInt(thisdrill.$maindiv.css('height')))
            
          }
          else{ //if this isn't the topmost UL
            var $parentul=$thisul.parents('ul:eq(0)')
            var $parentli=$thisul.parents('li:eq(0)')
            // $('') //add back LI item
            //   .click(function(e){thisdrill.back(); e.preventDefault()})
            //   .prependTo($thisul)
            var $anchorlink=$parentli.children('a:eq(0)').css({outline:'none'}).data('control', {order:i}) //remove outline from anchor links
            var $arrowimg=$('<i id="sobex-menu-arrow-slide" class="sobex-menu-arrowclass"></i>').attr('class', thisdrill.sublevelarrow).css({position:'absolute', borderWidth:0, paddingTop:thisdrill.sublevelarrow.top}).prependTo($anchorlink)
            $anchorlink.click(function(e){ //assign click behavior to anchor link
              thisdrill.slidemenu(jQuery(this).data('control').order)
              e.preventDefault()
            })
          }
          var ulheight=($thisul.outerHeight() < thisdrill.$maindiv.data('h'))? thisdrill.$maindiv.data('h') : 'auto'
          $thisul.css({visibility:'visible', width:'100%', height:ulheight, left:(i==0)? 'auto' : $parentli.outerWidth(), top:0})
          $thisul.data('specs', {w:$thisul.outerWidth(), h:$thisul.outerHeight(), order:i, parentorder:(i==0)? -1 : $anchorlink.parents('ul:eq(0)').data('specs').order, x:(i==0)? $thisul.position().left : $parentul.data('specs').x+$parentul.data('specs').w, title:(i==0)? thisdrill.homecrumbtext : $parentli.find('a:eq(0)').text().substring(0, thisdrill.titlelength)})
        }) //end UL loop
        var selectedulcheck=this.selectedul && document.getElementById(this.selectedul) //check if "selectedul" defined, plus if actual element exists
        this.$arrowimgs=this.$maindiv.find('img.sobex-menu-arrowclass')
        this.arrowposx=parseInt(this.$arrowimgs.eq(0).css('left')) //get default x position of arrow
        if (window.opera)
          this.$uls.eq(0).css({zIndex: this.zIndexvalue}) //Opera seems to require this in order for top level arrows to show
        if (this.persist.enable && (this.persist.overrideselectedul || !this.persist.overrideselectedul && !selectedulcheck) && Sobex_AccoSlider_Menu.routines.getCookie(this.menuid)){ //go to last persisted UL?
          var ulorder=parseInt(Sobex_AccoSlider_Menu.routines.getCookie(this.menuid))
          this.slidemenu(ulorder, true)
        }
        else if (selectedulcheck){ //if "selectedul" setting defined, slide to that UL by default
          var ulorder=$('#'+this.selectedul).data('specs').order
          this.slidemenu(ulorder, true)
        }
        else{
          this.slidemenu(0, true)
        }
        this.navdivs.$crumb.click(function(e){ //assign click behavior to breadcrumb div
          if (e.target.tagName=="A"){
            var order=parseInt(e.target.getAttribute('rel'))
            if (!isNaN(order)){ //check link contains a valid rel attribute int value (is anchor link)
              thisdrill.slidemenu(order)
              e.preventDefault()
            }
          }
        })

      }

      Sobex_AccoSlider_Menu.prototype.slidemenu=function(order, disableanimate){
        var order=isNaN(order)? 0 : order
        this.$uls.css({display: 'none'})
        var $targetul=this.$uls.eq(order).css({zIndex: this.zIndexvalue++})
        $targetul.parents('ul').addBack().css({display: 'block'})
        this.currentul=order
        if ($targetul.data('specs').h > this.$maindiv.data('h')){
          this.$maindiv.css({overflowY:'auto'}).scrollTop(0)
          this.$arrowimgs.css('left', this.arrowposx-15) //adjust arrow position if scrollbar is added
        }
        else{
          this.$maindiv.css({overflowY: 'hidden'}).scrollTop(0)
          this.$arrowimgs.css('left', this.arrowposx)
        }
        this.updatenav($, order)
        this.$uls.eq(0).animate({left:-$targetul.data('specs').x}, typeof disableanimate!="undefined"? 0 : this.speed)
      }

      Sobex_AccoSlider_Menu.prototype.back=function(){
        if (this.currentul>0){
          var order=this.$uls.eq(this.currentul).parents('ul:eq(0)').data('specs').order
          this.slidemenu(order)
        }
      }

      Sobex_AccoSlider_Menu.prototype.updatenav=function($, endorder){
        var $currentul=this.$uls.eq(endorder)
        if (this.navdivs.$crumb.length==1){ //if breadcrumb div defined
          var $crumb=this.navdivs.$crumb.empty()
          if (endorder>0){ //if this isn't the topmost UL (no point in showing crumbs if it is)
            var crumbhtml=''
            while ($currentul && $currentul.data('specs').order>=0){
                crumbhtml='<li class="sobex-menu-breadcrumb-li"><a class="sobex-menu-breadcrumb-a" href="#nav" rel="'+$currentul.data('specs').order+'">'+$currentul.data('specs').title+'</a></li>'+crumbhtml
                $currentul=($currentul.data('specs').order>0)? this.$uls.eq($currentul.data('specs').parentorder) : null
            }
            $crumb.append(crumbhtml).find('img:eq(0)').remove().end().find('a:last').replaceWith(this.$uls.eq(endorder).data('specs').title) //remove link from very last crumb trail
          }
        }
        if (this.navdivs.$backbuttons.length>0){ //if back buttons found
          if	(!/Safari/i.test(navigator.userAgent)) //exclude Safari from button state toggling due to bug when the button is an image link
            this.navdivs.$backbuttons.css((endorder>0)? {opacity:1, cursor:'pointer'} : {opacity:0.5, cursor:'default'})
        }
      }

      Sobex_AccoSlider_Menu.prototype.uninit=function(){
        if (this.persist.enable)
          Sobex_AccoSlider_Menu.routines.setCookie(this.menuid, this.currentul)
      }

      Sobex_AccoSlider_Menu.routines={

        getCookie:function(Name){ 
          var re=new RegExp(Name+"=[^;]*", "i"); //construct RE to search for target name/value pair
          if (document.cookie.match(re)) //if cookie found
            return document.cookie.match(re)[0].split("=")[1] //return its value
          return null
        },

        setCookie:function(name, value){
          document.cookie = name+"="+value+"; path=/"
        }

      } 
          var sobex_menu = new Sobex_AccoSlider_Menu({
              menuid: 'sobex-menu-slide-menu',
              menuheight: 'auto',
              breadcrumbid: 'sobex-menu-drillcrumb',
              persist: {enable: true, overrideselectedul: true}
            });
            $ = jQuery;
            function check_menu_breadcrumb_menu() {
              var length = $("#sobex-menu-drillcrumb").children().length
              if ( length > 0 ) {
                  $("#sobex-menu-drillcrumb").attr('height', '30px');
                  
              } 
              if( length == 0 ){
                $("#sobex-menu-drillcrumb").attr('height', '0px');

              }
            }
            function remove_empty_parent_menu() {
              $('.sobex-accoslider-ul-filter').each(function(){

              if ($(this).has('.sobex-accoslider-li-filter').length == 0) {
                $(this).closest('.sobex-accoslider-li-filter').remove();
              }

              });
            }
            jQuery(document).ready(function($){
              check_menu_breadcrumb_menu();
              <?php global $stsearch_get_opts; if(isset($stsearch_get_opts['menu_menu_display_type']) && !empty($stsearch_get_opts['menu_menu_display_type'])):
             if($stsearch_get_opts['menu_menu_display_type'] === 'hide'): ?>
              remove_empty_parent_menu();     
              <?php
              endif;
            endif; ?>
            });

        
            
  </script>

  <?php
}
/**
 * @ GET STYLE SETTINGS
 */
function sobextech_get_menu_class_from_db($id) {
  global $wpdb;
  global $stsearch_get_opts;
   /* Load Menu From database */
   $table_name =  $wpdb->prefix.'sobex_tech_widget_menu'; // Table Name
   if( !empty( $stsearch_get_opts['menu_menu_specific_name'] ) ) {
    $current_menu = $stsearch_get_opts['menu_menu_specific_name'];
    if( !empty($stsearch_get_opts['sobex_plugin_translate']) ):
      if( $stsearch_get_opts['sobex_plugin_translate'] === 'WPML' ):
        $id_item = apply_filters( 'wpml_object_id', $id, 'nav_menu_item', true, 'en' );
      else:
        $id_item = $id;
      endif;
    else:
      $id_item = $id;
    endif;
   $rows = $wpdb->get_results( "SELECT * FROM  $table_name WHERE menu_temp_name = '$current_menu'", ARRAY_A);
   if(isset($rows) && !empty($rows)):
    foreach($rows as $row):
      if($row['menu_id'] == $id_item):
        if(!empty($row['menu_icon'])):
          echo esc_attr($row['menu_icon']);
        elseif(empty($row['menu_icon'])):
          echo 'sobex-tech-favorite';
        endif;
      endif;
    endforeach;
   endif;
  }
}
function sobextech_get_menu_color_id_from_db($id) {
  global $wpdb;
  global $stsearch_get_opts;
   /* Load Menu From database */
   $table_name =  $wpdb->prefix.'sobex_tech_widget_menu'; // Table Name
   $current_menu = $stsearch_get_opts['menu_menu_specific_name'];
   if( !empty( $stsearch_get_opts['menu_menu_specific_name'] ) ) {
    if( !empty($stsearch_get_opts['sobex_plugin_translate']) ):
      if( $stsearch_get_opts['sobex_plugin_translate'] === 'WPML' ):
        $id_item = apply_filters( 'wpml_object_id', $id, 'nav_menu_item', true, 'en' );
      else:
        $id_item = $id;
      endif;
    else:
      $id_item = $id;
    endif;
   $rows = $wpdb->get_results( "SELECT * FROM  $table_name WHERE menu_temp_name = '$current_menu'", ARRAY_A);
   if(isset($rows) && !empty($rows)):
    foreach($rows as $row):
      if($row['menu_id'] == $id_item):
        if(!empty($row['menu_icon_color'])):
          echo esc_attr($row['menu_icon_color']);
        elseif(empty($row['menu_icon_color'])):
          echo '#16a27b';
        endif;
      endif;
    endforeach;
   endif;
  }
}
/**
 * @ Function To Check if Menu is On or not
 */
function sobextech_check_if_category_has_products($category_name){

  if(isset($stsearch_get_opts['post_status']) || !empty($stsearch_get_opts['post_status'])):
    if(in_array("all", $stsearch_get_opts['post_status'])):
    // Fetch All Products
      $args = array(
        'post_type' => 'product',
        'post_status' => array('publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit'),
        'posts_per_page' => 1,
        'fields' => 'ids',
        
        );
    elseif(empty($stsearch_get_opts['post_status'])):
      $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => 1,
        'fields' => 'ids',
        
        );
    else:
      $args = array(
      'post_type' => 'product',
      'post_status' => $stsearch_get_opts['post_status'],
      'posts_per_page' => 1,
      'fields' => 'ids',
      );
    endif;
  else:
    $args = array(
      'post_type' => 'product',
      'post_status' => 'publish',
      'posts_per_page' => 1,
      'fields' => 'ids',
      );
  endif;

  $category = get_term_by( 'name', $category_name, 'product_cat' );

  $cat_id = null;

  if( !empty($category) ) {
    $cat_id = $category->term_id;
  }
  
  if($cat_id > 0):

    $args['tax_query'] = array(
      array(
          'taxonomy' => 'product_cat',
          'field' => 'name',
          'terms' => $category_name,
          'operator' => 'IN',
      )
    );

    $wp_query_products = new WP_Query($args);
    if($wp_query_products->post_count > 0):
      return TRUE;
    elseif($wp_query_products->post_count == 0):
      return FALSE;
    endif;

  elseif($cat_id == 0):

    return TRUE;
    
  endif;
  
}
/**
 * @ Function To Check if Menu is On or not
 */
function sobextech_widget_menu_not_exists($category_name) {
  
    ?>
      <input class="sobex-category" type="hidden" name="product_cat" value="<?php echo esc_attr($category_name); ?>">

    <?php
}
/**
 * @ Widget Price Script
*/
function sobextech_widget_sidebar_price_script($side,$price_min,$price_max) {

  if($side == "two_side"):
    ?> 
    <script>
      jQuery(document).ready(function($) {
        $('.noUi-handle').on('click', function() {
          $(this).width(50);
        });
        var rangeSlider = document.getElementById('sobex-tech-price-two-side-slider-slider-range-sidebar');
        var moneyFormat = wNumb({
          decimals: 0,
          thousand: ',',
          prefix: ''
        });
        noUiSlider.create(rangeSlider, {
          start: [<?php if(isset($price_min) || !empty($price_min)) echo esc_attr($price_min); else echo '0';  ?>, <?php if(isset($price_max) || !empty($price_max)) echo esc_attr($price_max); else echo '0';  ?>],
          step: 1,
          direction: '<?php if(is_rtl()): echo 'rtl'; else: echo 'ltr'; endif;?>',
          range: {
            'min': [<?php if(isset($price_min) || !empty($price_min)) echo esc_attr($price_min); else echo '0';  ?>],
            'max': [<?php if(isset($price_max) || !empty($price_max)) echo esc_attr($price_max); else echo '0';  ?>]
          },
          format: moneyFormat,
          connect: true
          
        });

          
          // Set visual min and max values and also update value hidden form inputs
          rangeSlider.noUiSlider.on('update', function(values, handle) {
            $('.sobex-tech-price-two-side-min-value-sidebar').val(moneyFormat.from(values[0]))
            $('.sobex-tech-price-two-side-max-value-sidebar').val(moneyFormat.from(values[1]))
            document.getElementById('sobex-tech-price-two-side-slider-range-value1-sidebar').innerHTML = values[0];
            document.getElementById('sobex-tech-price-two-side-slider-range-value2-sidebar').innerHTML = values[1];
          });
          rangeSlider.noUiSlider.on('change', function(values, handle) {
            price_sidebar_two_side_slider();
          });
      
      });

    </script>
    <?php
  elseif($side == "one_side"):
    ?> 
    <script>
      jQuery(document).ready(function($) {
        $('.noUi-handle').on('click', function() {
          $(this).width(50);
        });
        var rangeSlider = document.getElementById('sobex-tech-price-two-side-slider-slider-range-sidebar');
        var moneyFormat = wNumb({
          decimals: 0,
          thousand: ',',
          prefix: ''
        });
        noUiSlider.create(rangeSlider, {
          start: <?php if(isset($price_max) || !empty($price_max)) echo esc_attr($price_max); else echo '0';  ?>,
          step: 1,
          direction: '<?php if(is_rtl()): echo 'rtl'; else: echo 'ltr'; endif;?>',
          range: {
            'min': [<?php if(isset($price_min) || !empty($price_min)) echo esc_attr($price_min); else echo '0';  ?>],
            'max': [<?php if(isset($price_max) || !empty($price_max)) echo esc_attr($price_max); else echo '0';  ?>]
          },
          format: moneyFormat,
          connect: 'lower',
          
        });
  
          
          // Set visual min and max values and also update value hidden form inputs
          rangeSlider.noUiSlider.on('update', function(values, handle) {
            $('.sobex-tech-price-two-side-max-value-sidebar').val(moneyFormat.from(values[0]))
            document.getElementById('sobex-tech-price-two-side-slider-range-value2-sidebar').innerHTML = values[0];
          });
          rangeSlider.noUiSlider.on('change', function(values, handle) {
            price_sidebar_two_side_slider();
          });
      
      });
  
    </script>
    <?php
  endif;
}
function sobextech_widget_get_price_min($category_id) {
  
  global $stsearch_get_opts;
  if(isset($stsearch_get_opts['stsearch_price_filter_min_setting']) && !empty($stsearch_get_opts['stsearch_price_filter_min_setting'])):
  
    if($stsearch_get_opts['stsearch_price_filter_min_setting'] == 'on'):

      $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => -1,
      );

      if($category_id !== 'all') {
        $args['tax_query'] = array(
          array(
              'taxonomy' => 'product_cat',
              'field' => 'term_id',
              'terms' => $category_id,
              'operator' => 'IN',
          )
        );
      }
      
      $products = new WP_Query( $args );
      
      $min_price = null;

      
      if ( $products->have_posts() ) {
      
          while ( $products->have_posts() ) {
              $products->the_post();
              $product = wc_get_product( get_the_ID() );
              $price = $product->get_price();
      
              if ( $min_price === null || $price < $min_price ) {
                  $min_price = $price;
              }
          }
      }

        
        return $min_price;
    elseif($stsearch_get_opts['stsearch_price_filter_min_setting'] == 'off'):
      $price_min = 0;
      
      return $price_min;
    endif;
  elseif(empty($stsearch_get_opts['stsearch_price_filter_min_setting'])):
      $price_min = 0;
        
      return $price_min;
  endif;
}
function sobextech_widget_get_price_min_callback($args) {
  
  $price_min = null;
  if($price_min == null){
    global $stsearch_get_opts;
    if(isset($stsearch_get_opts['stsearch_price_filter_min_setting']) && !empty($stsearch_get_opts['stsearch_price_filter_min_setting'])):
    
      if($stsearch_get_opts['stsearch_price_filter_min_setting'] == 'on'):

        $products = new WP_Query( $args );
        
        $min_price = null;
  
        
        if ( $products->have_posts() ) {
        
            while ( $products->have_posts() ) {
                $products->the_post();
                $product = wc_get_product( get_the_ID() );
                $price = $product->get_price();
        
                if ( $min_price === null || $price < $min_price ) {
                    $min_price = $price;
                }
            }
        }
  
          
        return $min_price;
      elseif($stsearch_get_opts['stsearch_price_filter_min_setting'] == 'off'):
        $price_min = 0;
        
        return $price_min;
      endif;
    elseif(empty($stsearch_get_opts['stsearch_price_filter_min_setting'])):
      $price_min = 0;
        
      return $price_min;
    endif;
  }
}
/* @ max PRICE */
function sobextech_widget_get_price_max($category_id) {

  $args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => -1,
  );
  if($category_id !== 'all') {
    $args['tax_query'] = array(
      array(
          'taxonomy' => 'product_cat',
          'field' => 'term_id',
          'terms' => $category_id,
          'operator' => 'IN',
      )
    );
  }

  $products = new WP_Query($args);

  $max_price = 0;

  if ($products->have_posts()) {
      while ($products->have_posts()) {
          $products->the_post();

          $product = wc_get_product(get_the_ID());

          if ($product->is_type('grouped')) {
              $children = $product->get_children();

              foreach ($children as $child_id) {
                  $child = wc_get_product($child_id);

                  $child_price = $child->get_price();

                  if ($child_price > $max_price) {
                      $max_price = $child_price;
                  }
              }
          } else {
              $price = $product->get_price();

              if ($price > $max_price) {
                  $max_price = $price;
              }
          }
      }
  }

  return $max_price;

}
function sobextech_widget_get_price_max_callback($args) {
  
  $price_max = null;
  if($price_max == null){

    $products = new WP_Query($args);
  
    $max_price = 0;
  
    if ($products->have_posts()) {
        while ($products->have_posts()) {
            $products->the_post();
  
            $product = wc_get_product(get_the_ID());
  
            if ($product->is_type('grouped')) {
                $children = $product->get_children();
  
                foreach ($children as $child_id) {
                    $child = wc_get_product($child_id);
  
                    $child_price = $child->get_price();
  
                    if ($child_price > $max_price) {
                        $max_price = $child_price;
                    }
                }
            } else {
                $price = $product->get_price();
  
                if ($price > $max_price) {
                    $max_price = $price;
                }
            }
        }
    }
  
    return $max_price;
  }

}

/**
 * @ Widget Get Color CODE
*/
function sobextech_widget_get_color_id($attribute_term_id, $attribute_term_name){
  global $stsearch_get_opts;
  if(isset(get_term_meta($attribute_term_id)["_yith_wccl_value"][0])):
      echo get_term_meta($attribute_term_id)["_yith_wccl_value"][0];
  elseif(isset(get_term_meta($attribute_term_id)["product_attribute_color"][0])):
      echo get_term_meta($attribute_term_id)["product_attribute_color"][0];
  elseif(isset(get_term_meta($attribute_term_id)["color"][0])):
      echo get_term_meta($attribute_term_id)["color"][0];
  elseif(!empty($stsearch_get_opts['color_plugin'])):
      echo get_term_meta($attribute_term_id)[$stsearch_get_opts['color_plugin']][0];
  else:
      echo esc_attr($attribute_term_name);
  endif;
}
/**
 * @ PLUGIN STRING TRANSLATOR
*/
function sobextech_widget_sidebar_table_string($Attributes_label_name,$Attributes) {
  global $stsearch_get_opts;
  $off = "off";
  $wpml = "WPML";

  if( !empty($stsearch_get_opts['sobex_plugin_translate']) ){ // Check if Option is Exists

    if( $stsearch_get_opts['sobex_plugin_translate'] === $off ) { // If Website Doesn't Support Multi Languages

      if( empty($Attributes_label_name)) { // If label name is empty Create New Name;
    

        $tras_attribute = $Attributes;
        $en = array('en_US','en_AU','en_CA','en_GB');
        if( in_array(get_locale(), $en, true ) ): 

          $title = 'Filter By'; 
          if($Attributes === 'price_input'): $tras_attribute = 'Price'; elseif($Attributes === 'product_tag'): $tras_attribute = 'Tags'; elseif($Attributes === 'default_woocommerce_filter'): $tras_attribute = 'Woocommerce '; endif;
        elseif(get_locale() == 'fa_IR'): 
          $title = 'فيلتر بر اساس'; 
         
            if($Attributes === 'price_input'): $tras_attribute = 'قيمت'; elseif($Attributes === 'product_tag'): $tras_attribute = 'برچسب ها'; elseif($Attributes === 'default_woocommerce_filter'): $tras_attribute = 'ووکامرس'; endif;

        elseif(get_locale() == 'ar'): 
          $title = 'التصفية حسب'; 
        
            if($Attributes === 'price_input'): $tras_attribute = 'السعر'; elseif($Attributes === 'product_tag'): $tras_attribute = 'الوسم'; elseif($Attributes === 'default_woocommerce_filter'): $tras_attribute = 'ووكومرس'; endif;
        
      endif;
      
      if($Attributes !== 'price_input' && $Attributes !== 'default_woocommerce_filter') :

        if($Attributes === 'product_tag'): $attribute_taxonomy  =  $tras_attribute; else: $attribute_taxonomy   = 'pa_' . $tras_attribute; endif;
      
        $tras_attribute = wc_attribute_label( $attribute_taxonomy );

      endif;
        
        echo esc_attr($title) . " " . esc_attr($tras_attribute);
      }
      else { // If Not Empty echo the value
        echo esc_attr($Attributes_label_name);
      }
    }
    
  }

}

function sobextech_widget_wpml_content_loading_string() {
  global $stsearch_get_opts;
  $off = "off";
  $wpml = "WPML";

  if( !empty($stsearch_get_opts['sobex_plugin_translate']) ){ // Check if Option is Exists

    if( $stsearch_get_opts['sobex_plugin_translate'] === $off ) { // If Website Doesn't Support Multi Languages
      $en = array('en_US','en_AU','en_CA','en_GB');
      if( in_array(get_locale(), $en, true ) ): $title = 'Content is loading'; elseif(get_locale() == 'fa_IR'): $title = 'محتوا در حال بارگیری است'; elseif(get_locale() == 'ar'): $title = 'يتم يتحميل المحتوى'; endif;
        echo esc_attr($title);
    }
    elseif( $stsearch_get_opts['sobex_plugin_translate'] === $wpml) { // If website Supporting WPML
      $title = apply_filters('wpml_translate_single_string', 'محتوا در حال بارگیری است.', 'sobex-front', 'پیام ابزارک کناری'); 
      echo esc_attr($title);
    }
    
  }
}
function sobex_techwidget_wpml_clear_all_string() {
  global $stsearch_get_opts;
  $off = "off";
  $wpml = "WPML";

  if( !empty($stsearch_get_opts['sobex_plugin_translate']) ){ // Check if Option is Exists

    if( $stsearch_get_opts['sobex_plugin_translate'] === $off ) { // If Website Doesn't Support Multi Languages
      $en = array('en_US','en_AU','en_CA','en_GB');
      if( in_array(get_locale(), $en, true ) ): $title = 'Clear All'; elseif(get_locale() == 'fa_IR'): $title = 'حذف همه'; elseif(get_locale() == 'ar'): $title = 'حذف التصفية'; endif;
        echo esc_attr($title);;
    }
    
  }
}
function sobextech_widget_wpml_filter_all_string() {
  global $stsearch_get_opts;
  $off = "off";
  $wpml = "WPML";

  if( !empty($stsearch_get_opts['sobex_plugin_translate']) ){ // Check if Option is Exists

    if( $stsearch_get_opts['sobex_plugin_translate'] === $off ) { // If Website Doesn't Support Multi Languages
      $en = array('en_US','en_AU','en_CA','en_GB');
      if( in_array(get_locale(), $en, true ) ): $title = 'Filter All'; elseif(get_locale() == 'fa_IR'): $title = 'فيلتر همه'; elseif(get_locale() == 'ar'): $title = 'تصفية الجميع'; endif;
        echo esc_attr($title);
    }
    
  }
}
function sobextechwidget_menu_home_title_string() {
  global $stsearch_get_opts;
  global $stsearch_style_get_opts;
  $off = "off";
  $wpml = "WPML";

  if( !empty($stsearch_get_opts['sobex_plugin_translate']) ){ // Check if Option is Exists

    if( $stsearch_get_opts['sobex_plugin_translate'] === $off ) { // If Website Doesn't Support Multi Languages
      $en = array('en_US','en_AU','en_CA','en_GB');
      if(isset($stsearch_style_get_opts['menu_menu_home_title']) || !empty($stsearch_style_get_opts['menu_menu_home_title'])):
        $title = $stsearch_style_get_opts['menu_menu_home_title'];
        echo esc_attr($title);
      else:
        if( in_array(get_locale(), $en, true ) ): $title = 'Shop'; elseif(get_locale() == 'fa_IR'): $title = 'فروشگاه'; elseif(get_locale() == 'ar'): $title = 'المتجر'; endif;
          echo esc_attr($title);
      endif;
    }
    
  }
  if(empty($stsearch_get_opts['sobex_plugin_translate'])){
    if( in_array(get_locale(), $en, true ) ): $title = 'Shop'; elseif(get_locale() == 'fa_IR'): $title = 'فروشگاه'; elseif(get_locale() == 'ar'): $title = 'المتجر'; endif;
    echo esc_attr($title);
  }
}
function sobextech_widget_wpml_select_string() {
  global $stsearch_get_opts;
  $off = "off";
  $wpml = "WPML";

  if( !empty($stsearch_get_opts['sobex_plugin_translate']) ){ // Check if Option is Exists

    if( $stsearch_get_opts['sobex_plugin_translate'] === $off ) { // If Website Doesn't Support Multi Languages
      $en = array('en_US','en_AU','en_CA','en_GB');
      if( in_array(get_locale(), $en, true ) ): $title = 'Select'; elseif(get_locale() == 'fa_IR'): $title = 'انتخاب'; elseif(get_locale() == 'ar'): $title = 'اختيار'; endif;
        echo esc_attr($title);
    }
    
  }
}
function sobextech_widget_wpml_ajax_timeout_error_string() {
  global $stsearch_get_opts;
  $off = "off";
  $wpml = "WPML";

  if( !empty($stsearch_get_opts['sobex_plugin_translate']) ){ // Check if Option is Exists

    if( $stsearch_get_opts['sobex_plugin_translate'] === $off ) { // If Website Doesn't Support Multi Languages
      $en = array('en_US','en_AU','en_CA','en_GB');
      if( in_array(get_locale(), $en, true ) ): $title = 'Notice: The server is busy now, Please Try Again.'; elseif(get_locale() == 'fa_IR'): $title = 'توجه: سرور در حال حاضر مشغول است، لطفا مجددا تلاش کنید.'; elseif(get_locale() == 'ar'): $title = 'تنبيه: الخادم مشغول الآن ، يرجى المحاولة مرة أخرى.'; endif;
        echo esc_attr($title);
    }
    
  }
}
function sobextech_widget_wpml_using_sidebar_msg_string() {
  global $stsearch_get_opts;
  $off = "off";
  $wpml = "WPML";

    if( !empty($stsearch_get_opts['sobex_plugin_translate']) ){ // Check if Option is Exists

      if( $stsearch_get_opts['sobex_plugin_translate'] === $off ) { // If Website Doesn't Support Multi Languages
        $en = array('en_US','en_AU','en_CA','en_GB');
        if( in_array(get_locale(), $en, true ) ): $title = 'You are using a Sidebar Filter, Wait for the content to load first.
  '; elseif(get_locale() == 'fa_IR'): $title = 'شما از فیلتر نوار کناری استفاده می کنید، ابتدا صبر کنید تا محتوا بارگیری شود.'; elseif(get_locale() == 'ar'): $title = 'أنت تستخدم التصفية الجانبية ، انتظر حتى يتم تحميل المحتوى أولاً.'; endif;
          echo esc_attr($title);
      }
      
    }
}
function sobextech_widget_wpml_using_header_msg_string() {
    global $stsearch_get_opts;
    $off = "off";
    $wpml = "WPML";

    if( !empty($stsearch_get_opts['sobex_plugin_translate']) ){ // Check if Option is Exists

      if( $stsearch_get_opts['sobex_plugin_translate'] === $off ) { // If Website Doesn't Support Multi Languages
        $en = array('en_US','en_AU','en_CA','en_GB');
        if( in_array(get_locale(), $en, true ) ): $title = 'You are using a header Filter, Wait for the content to load first.
  '; elseif(get_locale() == 'fa_IR'): $title = 'شمااز فیلتر سربرگ استفاده می کنید، ابتدا صبر کنید تا محتوا بارگیری شود.'; elseif(get_locale() == 'ar'): $title = 'أنت تستخدم التصفية العلوية ، انتظر حتى يتم تحميل المحتوى أولاً.'; endif;
          echo esc_attr($title);
      }
    }
}
function sobextech_widget_wpml_show_more_and_less_string($string) {
  global $stsearch_get_opts;
  $off = "off";
  $wpml = "WPML";

  if( !empty($stsearch_get_opts['sobex_plugin_translate']) ){ // Check if Option is Exists

    if( $stsearch_get_opts['sobex_plugin_translate'] === $off ) { // If Website Doesn't Support Multi Languages
      $en = array('en_US','en_AU','en_CA','en_GB');
      if($string == 'show_more') {
        if( in_array(get_locale(), $en, true ) ): $title = 'Show More'; elseif(get_locale() == 'fa_IR'): $title = 'نمايش بیشتر'; elseif(get_locale() == 'ar'): $title = 'اظهار المزيد'; endif;
        echo esc_attr($title);
      }elseif($string == 'show_less') {
        if( in_array(get_locale(), $en, true ) ): $title = 'Show Less'; elseif(get_locale() == 'fa_IR'): $title = 'نمايش كمتر'; elseif(get_locale() == 'ar'): $title = 'اظهار القليل'; endif;
        echo esc_attr($title);
      }
      
    }
    
  }
}
function sobextech_widget_wpml_default_woo_filter_string($string) {
  global $stsearch_get_opts;
  $off = "off";
  $wpml = "WPML";

  if( !empty($stsearch_get_opts['sobex_plugin_translate']) ){ // Check if Option is Exists

    if( $stsearch_get_opts['sobex_plugin_translate'] === $off ) { // If Website Doesn't Support Multi Languages
      $en = array('en_US','en_AU','en_CA','en_GB');
      if($string == 'instock') {
        if( in_array(get_locale(), $en, true ) ): $title = 'in stock'; elseif(get_locale() == 'ar'): $title = ' المتوفر'; elseif(get_locale() == 'fa_IR'): $title = 'در انبار'; endif;
        return esc_attr($title);
      }elseif($string == 'outofstock') {
        if( in_array(get_locale(), $en, true ) ): $title = 'out of stock'; elseif(get_locale() == 'ar'): $title = 'غير متوفر'; elseif(get_locale() == 'fa_IR'): $title = 'تمام شده'; endif;
        return esc_attr($title);
      }
      elseif($string == '_backorders') {
        if( in_array(get_locale(), $en, true ) ): $title = 'backorders'; elseif(get_locale() == 'ar'): $title = 'الطلب المؤجل'; elseif(get_locale() == 'fa_IR'): $title = 'سفارس با تاخیر'; endif;
        return esc_attr($title);
      }
      elseif($string == '_sale_price') {
        if( in_array(get_locale(), $en, true ) ): $title = 'On Sale'; elseif(get_locale() == 'ar'): $title = 'تخفیضات'; elseif(get_locale() == 'fa_IR'): $title = 'حراج'; endif;
        return esc_attr($title);
      }
      elseif($string == 'popularity') {
        if( in_array(get_locale(), $en, true ) ): $title = 'popularity'; elseif(get_locale() == 'ar'): $title = 'الأكثر شعبية'; elseif(get_locale() == 'fa_IR'): $title = 'محبوبترین'; endif;
        return esc_attr($title);
      }
      elseif($string == 'rating') {
        if( in_array(get_locale(), $en, true ) ): $title = 'rating'; elseif(get_locale() == 'ar'): $title = 'الأكثر تقييما'; elseif(get_locale() == 'fa_IR'): $title = 'امتیاز'; endif;
        return esc_attr($title);
      }
      elseif($string == 'newest') {
        if( in_array(get_locale(), $en, true ) ): $title = 'Newest'; elseif(get_locale() == 'ar'): $title = 'الأحدث'; elseif(get_locale() == 'fa_IR'): $title = 'جدیدترین'; endif;
        return esc_attr($title);
      }
      elseif($string == 'price-asc') {
        if( in_array(get_locale(), $en, true ) ): $title = 'price:low to high'; elseif(get_locale() == 'ar'): $title = 'سعرالأرخص-الأغلى'; elseif(get_locale() == 'fa_IR'): $title = 'ارزانترین به گرانترین'; endif;
        return esc_attr($title);
      }
      elseif($string == 'price-max') {
        if( in_array(get_locale(), $en, true ) ): $title = 'price: high to low'; elseif(get_locale() == 'ar'): $title = 'سعرالأغلى-الأرخص'; elseif(get_locale() == 'fa_IR'): $title = 'گرانترین به ارزانترین'; endif;
        return esc_attr($title);
      }
      
    }

  }
}
/**
 * @ Function to check if current attributes is exists in product
*/
function sobextech_check_if_product_has_current_attribute($products, $taxonomy) {
  global $stsearch_get_opts;
  $uniques = array(); 
  $exists = array();

  if($taxonomy !== 'default_woocommerce_filter'):
    if(isset($products) && !empty($products)):
      foreach ( $products as $_product ):
                
        foreach(  wc_get_product_terms( $_product->get_id(), $taxonomy ) as $attribute_value ):
        
                if (in_array($attribute_value->name, $uniques)) {
                  continue;
                }
              $uniques[] = $attribute_value->name; 
              
              if($taxonomy !== 'product_tag') { 
                if($attribute_value->term_id == 0) {
                  $exists[] = 'false';
                  
                }elseif($attribute_value->term_id > 0){
                  $exists[] = 'true';
                }
              }
              elseif($taxonomy == 'product_tag') { 

                if(isset($stsearch_get_opts['stsearch_product_tags_list'])):
                  $product_tag_ids = $stsearch_get_opts['stsearch_product_tags_list'];
                elseif(empty($stsearch_get_opts['stsearch_product_tags_list'])): 
                  $product_tag_ids[] = null;
                endif;
                if (in_array($attribute_value->term_id, $product_tag_ids)) { 
                  $exists[] = 'true';
                }else{
                  $exists[] = 'false';
                }
                
              }


        endforeach; 

      endforeach; 
    endif;

  elseif($taxonomy == 'default_woocommerce_filter'):
    if(isset($stsearch_get_opts['stsearch_default_woocommerce_filter_list'])):
      $exists[] = 'true';
    elseif(empty($stsearch_get_opts['stsearch_product_tags_list'])): 
      $exists[] = 'false';
    endif;
    
  endif;
  return $exists;
}
/**
 * @ Function to Get Selected Tags only
*/
function sobextech_custom_product_tags($type,$Attributes,$term_id,$term_name,$checked) {
  global $stsearch_get_opts;
  if(isset($stsearch_get_opts['sobex_plugin_translate']) && !empty($stsearch_get_opts['sobex_plugin_translate'])):
    if($stsearch_get_opts['sobex_plugin_translate'] === 'WPML'):
      $product_id = apply_filters( 'wpml_object_id', $term_id, 'product_tag', null, 'en');
    else:
      $product_id = $term_id;
    endif;
  else:
    $product_id = $term_id;
  endif;
  if(isset($stsearch_get_opts['stsearch_product_tags_list']) && !empty($stsearch_get_opts['stsearch_product_tags_list'])) {
    if($type === 'widget_radio'){
      if (in_array($product_id, $stsearch_get_opts['stsearch_product_tags_list'])) {
        ?>     
        <label class="sobex-widget-input-container st-input-count">
          <span><?php echo esc_attr($term_name); ?></span>
          <input type="radio" 
          value="<?php echo esc_attr($term_id); ?>" 
          name="<?php echo esc_attr($Attributes)?>"
          <?php if(!empty($checked)){
              if( $term_id == $checked ){
                echo 'checked';
                }
                } ?>/>
          <div class="widget-sobex-fake-input"></div>
        </label>
        <?php
      }
    }elseif($type === 'widget_radio_label'){
      if (in_array($product_id, $stsearch_get_opts['stsearch_product_tags_list'])) {
        ?>     
        <label class="input-sobex-box-container-radio"> 
          <input type="radio"                                       
          value="<?php echo esc_attr($term_id); ?>" 
          name="<?php echo esc_attr($Attributes)?>"
          <?php if(!empty($checked)){
              if( $term_id == $checked ){
                echo 'checked';
                }
                } ?>/>
          <span class="widget-sobex-fake-input-box-radio"><?php echo esc_attr($term_name); ?></span>
        </label>
        <?php
      }
    }
  }
  

}
/**
 * @ Function to Get Selected Default Woocommerce List only
*/
function sobextech_custom_default_woo_lists($type,$Attributes,$checked) {
  global $stsearch_get_opts;

  if(isset($stsearch_get_opts['stsearch_default_woocommerce_filter_list']) && !empty($stsearch_get_opts['stsearch_default_woocommerce_filter_list'])) {
    $slugs = $stsearch_get_opts['stsearch_default_woocommerce_filter_list'];
    $instock = sobextech_widget_wpml_default_woo_filter_string("instock");
    $outofstock = sobextech_widget_wpml_default_woo_filter_string("outofstock");
    $_backorders = sobextech_widget_wpml_default_woo_filter_string("_backorders");
    $_sale_price = sobextech_widget_wpml_default_woo_filter_string("_sale_price");
    $popularity = sobextech_widget_wpml_default_woo_filter_string("popularity");
    $rating = sobextech_widget_wpml_default_woo_filter_string("rating");
    $newest = sobextech_widget_wpml_default_woo_filter_string("newest");
    $price_asc = sobextech_widget_wpml_default_woo_filter_string("price-asc");
    $price_max = sobextech_widget_wpml_default_woo_filter_string("price-max");
    $woos=array(
      array("name" => $instock, "slug" => "instock"),
      array("name" => $outofstock, "slug" => "outofstock"),
      array("name" => $_backorders, "slug" => "_backorders"),
      array("name" => $_sale_price, "slug" => "_sale_price"),
      array("name" => $popularity, "slug" => "popularity"),
      array("name" => $rating, "slug" => "rating"),
      array("name" => $newest, "slug" => "newest"),
      array("name" => $price_asc, "slug" => "price-asc"),
      array("name" => $price_max, "slug" => "price-max"),
    );
    if($type === 'widget_radio'){
      foreach($woos as $woo) {
      if (in_array($woo['slug'], $slugs)) {
        ?>     
        <label class="sobex-widget-input-container st-input-count">
          <span><?php echo esc_attr($woo['name']); ?></span>
          <input type="radio" 
          value="<?php echo esc_attr($woo['slug']); ?>" 
          name="<?php echo esc_attr($Attributes)?>"
          <?php if(!empty($checked)){
              if( $woo['slug'] == $checked ){
                echo 'checked';
                }
                } ?>/>
          <div class="widget-sobex-fake-input"></div>
        </label>
        <?php
      }
    }
    }elseif($type === 'widget_radio_label'){
      foreach($woos as $woo) {
      if (in_array($woo['slug'], $slugs)) {
        ?>     
        <label class="input-sobex-box-container-radio"> 
          <input type="radio"                                       
          value="<?php echo esc_attr($woo['slug']); ?>" 
          name="<?php echo esc_attr($Attributes)?>"
          <?php if(!empty($checked)){
              if( $woo['slug'] == $checked ){
                echo 'checked';
                }
                } ?>/>
          <span class="widget-sobex-fake-input-box-radio"><?php echo esc_attr($woo['name']); ?></span>
        </label>
        <?php
      }
    }
    }
  }
  

}
/**
 * @ SIDEBAR WIDGET
 * @ Template Default
*/
// Start Sidebar Form \\
function sobextech_widget_sidebar_form_start() {
  ?>
    <!--Start Form-->
    <form class="st-search-products-widget">
  <?php
}
// Filter & Clear All Buttons For Upside \\
function sobextech_widget_sobex_buttons_classic_model() { 
  global $stsearch_get_opts;
  global $stsearch_style_get_opts; 
  // Start Buttons \\ 
  if(isset($stsearch_get_opts['search_model']) && !empty($stsearch_get_opts['search_model'])):
    if($stsearch_get_opts['search_model'] === 'classic_model'):?>
    <div class="widget-sobex-main-button-container">
      <div class="widget-sobex-main-button-flex-container">
        <!-- Start Filter now Button-->
        <a class="widget-button-filter-now-container">
          <div class="widget-button-filter-now-row">
            <div class="widget-button-filter-part-text">
              <span class="widget-button-filter-text-label"><?php echo sobextech_widget_wpml_filter_all_string(); ?></span>
            </div>
            <div class="widget-button-filter-part-icon">
              <div class="widget-button-filter-image">
              <i class="<?php if(isset($stsearch_style_get_opts['filter_all_icon']) || !empty($stsearch_style_get_opts['filter_all_icon'])) echo esc_attr($stsearch_style_get_opts['filter_all_icon']); else echo 'sobex-search2';  ?>"></i>
              </div>
            </div>
          </div>
        </a>
        <!-- End Filter now Button-->
        <!-- Start Clear All Button-->
        <a class="widget-button-clear-container">
          <div class="widget-button-clear-row">
            <div class="widget-button-clear-part-text">
              <span class="widget-button-clear-part-text-label"><?php echo sobex_techwidget_wpml_clear_all_string(); ?></span>
            </div>
            <div class="widget-button-clear-part-icon">
              <div class="widget-button-clear-image">
              <i class="<?php if(isset($stsearch_style_get_opts['clear_all_icon']) || !empty($stsearch_style_get_opts['clear_all_icon'])) echo esc_attr($stsearch_style_get_opts['clear_all_icon']); else echo 'sobex-cross';  ?>"></i>
              </div>
            </div>
          </div>
        </a>
      </div>
      <!-- End Clear All Button-->
    </div> <?php
    endif;
  endif;
  // End Buttons \\
}
// Close Widget Content \\
function sobextech_widget_sidebar_closed_text() {
  ?>
    <!-- Comment (Sobex Close message) start -->
    <div class="widget-sidebar-sobex-close-content">
      <p><?php echo sobextech_widget_wpml_using_header_msg_string(); ?></p>
    </div> <!-- Comment (Sobex Close message) end -->
    <!-- Comment (Sobex Close error) start -->
    <div class="widget-sidebar-sobex-error-content">
      <p></p>
    </div> <!-- Comment (Sobex Close error) end -->
  <?php
}
// Start Sidebar Container \\
function sobextech_widget_sidebar_main_container_start(){
  ?>
  <!-- START TABLE GROUP CONTAINER -->
  <div class="widget-sobex-main-container">
  <?php
}
// Sidebar Radio \\
function sobextech_widget_sobex_radio($Attributes, $Attributes_label_name, $products, $taxonomy, $checked) { 
  ?>
  <?php global $stsearch_style_get_opts;  

  $exists = sobextech_check_if_product_has_current_attribute($products,$taxonomy);

  if( in_array( "true", $exists ) )
  {
  ?>

      <!-- Comment (Start Table widget Group Radio) start -->
      <div class="widget-sobex-table-group">
  
      <!-- Comment (Sobex loading message) start -->
      <div class="widget-sobex-loading-container">
          <div class="widget-sobex-loading-content">
          <img src="<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_FRONT . '/loading-widget.gif' ?>" />
          <?php echo sobextech_widget_wpml_content_loading_string(); ?>
          </div> 
        </div> <!-- Comment (Sobex loading message) end -->
    
      <!-- Comment (Sobex Header Content) start -->
      <div class="widget-sobex-header-content">
  
        <!-- Comment Sobext Right Content header start-->
        <div class="widget-sobex-table-title">
          <div class="widget-sobex-table-table-icon">
            <i class="<?php echo (isset($stsearch_style_get_opts['widget_sidebar_icon']) && !empty($stsearch_style_get_opts['widget_sidebar_icon']))? esc_attr($stsearch_style_get_opts['widget_sidebar_icon']) : 'sobex-tech-menu' ?>"></i>
          </div>
          <a class="widget-sobex-table-text"><?php echo sobextech_widget_sidebar_table_string($Attributes_label_name,$Attributes); ?></a>
        </div> <!-- Comment Sobext Right Content header End-->
  
        <!-- Comment Sobext Left Content header start-->
        <div class="widget-sobex-left-header">
          <div class="widget-sobex-table-group-clicker slide_content_click_<?php echo esc_attr($Attributes); ?>">
            <div class="sobex-hide-table"><i class="<?php if(isset($stsearch_style_get_opts['widget_icon_slideup']) || !empty($stsearch_style_get_opts['widget_icon_slideup'])) echo esc_attr($stsearch_style_get_opts['widget_icon_slideup']); else echo 'sobex-tech-arrow-down-sign-to-navigate';  ?>"></i></div><!--show in font-->
            <div class="sobex-show-table widget-sobex-hidden-table"><i class=" <?php if(isset($stsearch_style_get_opts['widget_icon_slidedown']) || !empty($stsearch_style_get_opts['widget_icon_slidedown'])) echo esc_attr($stsearch_style_get_opts['widget_icon_slidedown']); else echo 'sobex-tech-up-arrow';  ?>"></i></div> <!--hide in font-->
          </div> <!-- Open & Close Tab Clicker -->
        </div> <!-- Comment Sobext Left Content header End-->
  
      </div><!-- Comment (Sobex Header Content) start -->
    
      <div class="widget-sobex-header-line"></div> <!-- Sobex widget Line-->
  
        <!--Start Filter Button-->
        <div class="widget-sobex-buttons-container">
          <div class="widget-sobex-filter-button widget-sobex-filter-button-before-content">         
              <div class="widget-sobex-filter-button-table" role="button"><a class="widet-sobex-filter-button-table-title"><i class="  <?php if(isset($stsearch_style_get_opts['widget_search_icon']) || !empty($stsearch_style_get_opts['widget_search_icon'])) echo esc_attr($stsearch_style_get_opts['widget_search_icon']); else echo 'sobex-tech-checked-1';  ?>"></i> <?php sobextech_widget_wpml_filter_all_string(); ?></a></div>
              <div class="widget-sobex-clear-button-table" role="button"><a class="widet-sobex-clear-button-table-title"><i class="<?php echo (isset($stsearch_style_get_opts['widget_clear_icon']) && !empty($stsearch_style_get_opts['widget_clear_icon']))? esc_attr($stsearch_style_get_opts['widget_clear_icon']) : 'sobex-tech-unchecked' ?>"></i><?php echo sobex_techwidget_wpml_clear_all_string(); ?></a></div>
          </div>
        </div>
        <!--End Filter Button-->

      <!-- Comment (widget-sobex-content-container) start -->
      <div class="widget-sobex-content-container widget-sobex-radio slide_content_<?php echo esc_attr($Attributes); ?>">
  
                    <!-- Comment widget-sobex-checkbox-container start -->
                    <?php 
                    if($Attributes !== 'default_woocommerce_filter'):
                    $uniques = array (); ?>
                    <?php foreach ( $products as $_product ):
                            
              
                              foreach(  wc_get_product_terms( $_product->get_id(), $taxonomy ) as $attribute_value ):
                              
                                      if (in_array($attribute_value->name, $uniques)) {
                                        continue;
                                      }
                                    $uniques[] = $attribute_value->name;  
                                    if($taxonomy !== 'product_tag'){
                                      ?>     
                                      <label class="sobex-widget-input-container st-input-count">
                                        <span><?php echo esc_attr($attribute_value->name); ?></span>
                                        <input type="radio" 
                                        value="<?php echo esc_attr($attribute_value->term_id); ?>" 
                                        name="<?php echo esc_attr($Attributes)?>"
                                        <?php if(!empty($checked)){
                                            if( $attribute_value->term_id == $checked ){
                                              echo 'checked';
                                              }
                                              } ?>/>
                                        <div class="widget-sobex-fake-input"></div>
                                      </label>
                                      <?php
                                    }else{
                                      echo sobextech_custom_product_tags('widget_radio',$Attributes,$attribute_value->term_id,$attribute_value->name,$checked);
                                    }
                              endforeach; // for loop attribute 

                          endforeach; endif;
                          if($Attributes == 'default_woocommerce_filter'):
                            echo sobextech_custom_default_woo_lists('widget_radio',$Attributes,$checked);
                          endif;?>

                          <!-- Comment widget-sobex-input-container end -->
  
      </div> <!-- Comment (widget-sobex-content-container) End -->
  
      </div> <!-- Comment (Start Table widget Group) End -->
  <?php
  }
}
// Sidebar Radio Color \\
function sobextech_widget_sobex_radio_color($Attributes, $Attributes_label_name, $products, $taxonomy, $checked) { 
  ?>
  <?php global $stsearch_style_get_opts;  

  $exists = sobextech_check_if_product_has_current_attribute($products,$taxonomy);
  
  if( in_array( "true", $exists ) )
  {
  ?>

    <!-- Comment (Start Table widget Group Color Radio) start -->
    <div class="widget-sobex-table-group">
  
     <!-- Comment (Sobex loading message) start -->
     <div class="widget-sobex-loading-container">
          <div class="widget-sobex-loading-content">
          <img src="<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_FRONT . '/loading-widget.gif' ?>" />
          <?php echo sobextech_widget_wpml_content_loading_string(); ?>
          </div> 
        </div> <!-- Comment (Sobex loading message) end -->
      
        <!-- Comment (Sobex Header Content) start -->
        <div class="widget-sobex-header-content">
  
          <!-- Comment Sobext Right Content header start-->
          <div class="widget-sobex-table-title">
            <div class="widget-sobex-table-table-icon">
              <i class="<?php echo (isset($stsearch_style_get_opts['widget_sidebar_icon']) && !empty($stsearch_style_get_opts['widget_sidebar_icon']))? esc_attr($stsearch_style_get_opts['widget_sidebar_icon']) : 'sobex-tech-menu' ?>"></i>
            </div>
            <a class="widget-sobex-table-text"><?php echo sobextech_widget_sidebar_table_string($Attributes_label_name,$Attributes); ?></a>
            
          </div> <!-- Comment Sobext Right Content header End-->
  
          <!-- Comment Sobext Left Content header start-->
          <div class="widget-sobex-left-header">
            <div class="widget-sobex-table-group-clicker slide_content_click_<?php echo esc_attr($Attributes); ?>">
                            <div class="sobex-hide-table"><i class="<?php if(isset($stsearch_style_get_opts['widget_icon_slideup']) || !empty($stsearch_style_get_opts['widget_icon_slideup'])) echo esc_attr($stsearch_style_get_opts['widget_icon_slideup']); else echo 'sobex-tech-arrow-down-sign-to-navigate';  ?>"></i></div><!--show in font-->
              <div class="sobex-show-table widget-sobex-hidden-table"><i class=" <?php if(isset($stsearch_style_get_opts['widget_icon_slidedown']) || !empty($stsearch_style_get_opts['widget_icon_slidedown'])) echo esc_attr($stsearch_style_get_opts['widget_icon_slidedown']); else echo 'sobex-tech-up-arrow';  ?>"></i></div> <!--hide in font-->
            </div> <!-- Open & Close Tab Clicker -->
          </div> <!-- Comment Sobext Left Content header End-->
  
        </div><!-- Comment (Sobex Header Content) start -->
      
        <div class="widget-sobex-header-line"></div> <!-- Sobex widget Line-->

        <!--Start Filter Button-->
        <div class="widget-sobex-buttons-container">
          <div class="widget-sobex-filter-button widget-sobex-filter-button-before-content">         
              <div class="widget-sobex-filter-button-table" role="button"><a class="widet-sobex-filter-button-table-title"><i class="  <?php if(isset($stsearch_style_get_opts['widget_search_icon']) || !empty($stsearch_style_get_opts['widget_search_icon'])) echo esc_attr($stsearch_style_get_opts['widget_search_icon']); else echo 'sobex-tech-checked-1';  ?>"></i> <?php sobextech_widget_wpml_filter_all_string(); ?></a></div>
              <div class="widget-sobex-clear-button-table" role="button"><a class="widet-sobex-clear-button-table-title"><i class="<?php echo (isset($stsearch_style_get_opts['widget_clear_icon']) && !empty($stsearch_style_get_opts['widget_clear_icon']))? esc_attr($stsearch_style_get_opts['widget_clear_icon']) : 'sobex-tech-unchecked' ?>"></i><?php echo sobex_techwidget_wpml_clear_all_string(); ?></a></div>
          </div>
        </div>
        <!--End Filter Button-->
        <!-- Comment (widget-sobex-content-container) start -->
        <div class="widget-sobex-content-container widget-sobex-radio slide_content_<?php echo esc_attr($Attributes); ?>">
  
          <!-- widget-sobex-color-container-style-one-radio start -->
          <div class="widget-sobex-color-container-style-one-radio">

                    <!-- Comment widget-sobex-radio-container start -->
                    <?php $uniques = array (); ?>
                    <?php foreach ( $products as $_product ):
                            
              
                              foreach(  wc_get_product_terms( $_product->get_id(), $taxonomy ) as $attribute_value ):
                              
                                      if (in_array($attribute_value->name, $uniques)) {
                                        continue;
                                      }
                                    $uniques[] = $attribute_value->name;  ?>     
                                    <label class="widget-sobex-radio-container">
                                      <input 
                                        type="radio" 
                                        value="<?php echo esc_attr($attribute_value->term_id); ?>" 
                                        name="<?php echo esc_attr($Attributes)?>" 
                                        <?php if(!empty($checked)){
                                          if( $attribute_value->term_id == $checked ){
                                             echo 'checked';
                                            }
                                             } ?>/>
                                        <span
                                        class="widget-sobex-fake-radio"
                                        style="background-color: <?php 
                                      $attribute_term_id = $attribute_value->term_id;
                                      $attribute_term_name = $attribute_value->name; 
                                      echo sobextech_widget_get_color_id($attribute_term_id, $attribute_term_name); ?>"
                                      >
                                        </span>
                                    </label>
                              <?php
                              endforeach; // for loop attribute 

                          endforeach; ?>
                          <!-- Comment widget-sobex-radio-container End -->

          </div> <!-- widget-sobex-color-container-style-one-radio End -->
  
        </div> <!-- Comment (widget-sobex-content-container) End -->
  
    </div> <!-- Comment (Start Table widget Group) End -->
  <?php
  }
}
// Sidebar Radio Box \\
function sobextech_widget_sobex_box_radio($Attributes, $Attributes_label_name, $products, $taxonomy, $checked) { 
  ?>
  <?php global $stsearch_style_get_opts;  
  $exists = sobextech_check_if_product_has_current_attribute($products,$taxonomy);
  
  if( in_array( "true", $exists ) )
  {
  ?>
    <!-- Comment (Start Table widget Group Box Radio) start -->
    <div class="widget-sobex-table-group">
  
     <!-- Comment (Sobex loading message) start -->
     <div class="widget-sobex-loading-container">
          <div class="widget-sobex-loading-content">
          <img src="<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_FRONT . '/loading-widget.gif' ?>" />
          <?php echo sobextech_widget_wpml_content_loading_string(); ?>
          </div> 
        </div> <!-- Comment (Sobex loading message) end -->
      
        <!-- Comment (Sobex Header Content) start -->
        <div class="widget-sobex-header-content">
  
          <!-- Comment Sobext Right Content header start-->
          <div class="widget-sobex-table-title">
            <div class="widget-sobex-table-table-icon">
              <i class="<?php echo (isset($stsearch_style_get_opts['widget_sidebar_icon']) && !empty($stsearch_style_get_opts['widget_sidebar_icon']))? esc_attr($stsearch_style_get_opts['widget_sidebar_icon']) : 'sobex-tech-menu' ?>"></i>
            </div>
            <a class="widget-sobex-table-text"><?php echo sobextech_widget_sidebar_table_string($Attributes_label_name,$Attributes); ?></a>
          </div> <!-- Comment Sobext Right Content header End-->
  
          <!-- Comment Sobext Left Content header start-->
          <div class="widget-sobex-left-header">
            <div class="widget-sobex-table-group-clicker slide_content_click_<?php echo esc_attr($Attributes); ?>">
              <div class="sobex-hide-table"><i class="<?php if(isset($stsearch_style_get_opts['widget_icon_slideup']) || !empty($stsearch_style_get_opts['widget_icon_slideup'])) echo esc_attr($stsearch_style_get_opts['widget_icon_slideup']); else echo 'sobex-tech-arrow-down-sign-to-navigate';  ?>"></i></div><!--show in font-->
              <div class="sobex-show-table widget-sobex-hidden-table"><i class=" <?php if(isset($stsearch_style_get_opts['widget_icon_slidedown']) || !empty($stsearch_style_get_opts['widget_icon_slidedown'])) echo esc_attr($stsearch_style_get_opts['widget_icon_slidedown']); else echo 'sobex-tech-up-arrow';  ?>"></i></div> <!--hide in font-->
            </div> <!-- Open & Close Tab Clicker -->
          </div> <!-- Comment Sobext Left Content header End-->
  
        </div><!-- Comment (Sobex Header Content) start -->
      
        <div class="widget-sobex-header-line"></div> <!-- Sobex widget Line-->

        <!--Start Filter Button-->
        <div class="widget-sobex-buttons-container">
          <div class="widget-sobex-filter-button widget-sobex-filter-button-before-content">         
              <div class="widget-sobex-filter-button-table" role="button"><a class="widet-sobex-filter-button-table-title"><i class="  <?php if(isset($stsearch_style_get_opts['widget_search_icon']) || !empty($stsearch_style_get_opts['widget_search_icon'])) echo esc_attr($stsearch_style_get_opts['widget_search_icon']); else echo 'sobex-tech-checked-1';  ?>"></i> <?php sobextech_widget_wpml_filter_all_string(); ?></a></div>
              <div class="widget-sobex-clear-button-table" role="button"><a class="widet-sobex-clear-button-table-title"><i class="<?php echo (isset($stsearch_style_get_opts['widget_clear_icon']) && !empty($stsearch_style_get_opts['widget_clear_icon']))? esc_attr($stsearch_style_get_opts['widget_clear_icon']) : 'sobex-tech-unchecked' ?>"></i><?php echo sobex_techwidget_wpml_clear_all_string(); ?></a></div>
          </div>
        </div>
        <!--End Filter Button-->

        <!-- Comment (widget-sobex-content-container) start -->
        <div class="widget-sobex-content-container widget-sobex-radio slide_content_<?php echo esc_attr($Attributes); ?>">
  
          <!-- widget-sobex-box-container-style-radio start -->
          <div class="widget-sobex-box-container-style-radio">
            
            <!-- Comment input-sobex-box-container-radio start -->
                    <?php 
                    if($Attributes !== 'default_woocommerce_filter'):
                    $uniques = array (); ?>
                    <?php foreach ( $products as $_product ):
                            
              
                              foreach(  wc_get_product_terms( $_product->get_id(), $taxonomy ) as $attribute_value ):
                              
                                      if (in_array($attribute_value->name, $uniques)) {
                                        continue;
                                      }
                                    $uniques[] = $attribute_value->name;  
                                     if($taxonomy !== 'product_tag'){
                                      ?>     
                                      <label class="input-sobex-box-container-radio"> 
                                        <input type="radio"                                       
                                        value="<?php echo esc_attr($attribute_value->term_id); ?>" 
                                        name="<?php echo esc_attr($Attributes)?>"
                                        <?php if(!empty($checked)){
                                          if( $attribute_value->term_id == $checked ){
                                             echo 'checked';
                                            }
                                             } ?>/>
                                        <span class="widget-sobex-fake-input-box-radio"><?php echo esc_attr($attribute_value->name); ?></span>
                                      </label>
                                      <?php
                                    }else{
                                      echo sobextech_custom_product_tags('widget_radio_label',$Attributes,$attribute_value->term_id,$attribute_value->name,$checked);
                                    }
                              endforeach; // for loop attribute 

                          endforeach; 
                        endif;
                        if($Attributes == 'default_woocommerce_filter'):
                          echo sobextech_custom_default_woo_lists('widget_radio_label',$Attributes,$checked);
                        endif;?>

          </div> <!-- widget-sobex-box-container-style-radio End -->
  
        </div> <!-- Comment (widget-sobex-content-container) End -->
  
    </div> <!-- Comment (Start Table widget Group Box Radio) End -->
  <?php
  }
}
// Sidebar Price \\
function sobextech_widget_sidebar_sobex_price_two_side($Attributes, $Attributes_label_name, $currency, $price_min, $price_max) {
  ?>
  <?php global $stsearch_style_get_opts; ?>
    <!-- Comment (Start Table widget Group Box Radio) start -->
    <div class="widget-sobex-table-group">
  
     <!-- Comment (Sobex loading message) start -->
     <div class="widget-sobex-loading-container">
          <div class="widget-sobex-loading-content">
          <img src="<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_FRONT . '/loading-widget.gif' ?>" />
          <?php echo sobextech_widget_wpml_content_loading_string(); ?>
          </div> 
        </div> <!-- Comment (Sobex loading message) end -->
      
        <!-- Comment (Sobex Header Content) start -->
        <div class="widget-sobex-header-content">
  
          <!-- Comment Sobext Right Content header start-->
          <div class="widget-sobex-table-title">
            <div class="widget-sobex-table-table-icon">
              <i class="<?php echo (isset($stsearch_style_get_opts['widget_sidebar_icon']) && !empty($stsearch_style_get_opts['widget_sidebar_icon']))? esc_attr($stsearch_style_get_opts['widget_sidebar_icon']) : 'sobex-tech-menu' ?>"></i>
            </div>
            <a class="widget-sobex-table-text"><?php echo sobextech_widget_sidebar_table_string($Attributes_label_name,$Attributes); ?></a>
          </div> <!-- Comment Sobext Right Content header End-->
  
          <!-- Comment Sobext Left Content header start-->
          <div class="widget-sobex-left-header">
            <div class="widget-sobex-table-group-clicker slide_content_click_<?php echo esc_attr($Attributes); ?>">
              <div class="sobex-hide-table"><i class="<?php if(isset($stsearch_style_get_opts['widget_icon_slideup']) || !empty($stsearch_style_get_opts['widget_icon_slideup'])) echo esc_attr($stsearch_style_get_opts['widget_icon_slideup']); else echo 'sobex-tech-arrow-down-sign-to-navigate';  ?>"></i></div><!--show in font-->
              <div class="sobex-show-table widget-sobex-hidden-table"><i class=" <?php if(isset($stsearch_style_get_opts['widget_icon_slidedown']) || !empty($stsearch_style_get_opts['widget_icon_slidedown'])) echo esc_attr($stsearch_style_get_opts['widget_icon_slidedown']); else echo 'sobex-tech-up-arrow';  ?>"></i></div> <!--hide in font-->
            </div> <!-- Open & Close Tab Clicker -->
          </div> <!-- Comment Sobext Left Content header End-->
  
        </div><!-- Comment (Sobex Header Content) start -->
      
        <div class="widget-sobex-header-line"></div> <!-- Sobex widget Line-->

        <!--Start Filter Button-->
        <div class="widget-sobex-buttons-container">
          <div class="widget-sobex-filter-button widget-sobex-filter-button-before-content">         
              <div class="widget-sobex-filter-button-table" role="button"><a class="widet-sobex-filter-button-table-title"><i class="  <?php if(isset($stsearch_style_get_opts['widget_search_icon']) || !empty($stsearch_style_get_opts['widget_search_icon'])) echo esc_attr($stsearch_style_get_opts['widget_search_icon']); else echo 'sobex-tech-checked-1';  ?>"></i> <?php sobextech_widget_wpml_filter_all_string(); ?></a></div>
              <div class="widget-sobex-clear-button-table" role="button"><a class="widet-sobex-clear-button-table-title"><i class="<?php echo (isset($stsearch_style_get_opts['widget_clear_icon']) && !empty($stsearch_style_get_opts['widget_clear_icon']))? esc_attr($stsearch_style_get_opts['widget_clear_icon']) : 'sobex-tech-unchecked' ?>"></i><?php echo sobex_techwidget_wpml_clear_all_string(); ?></a></div>
          </div>
        </div>
        <!--End Filter Button-->

        <!-- Comment (widget-sobex-content-container) start -->
        <div class="widget-sobex-content-container widget-sobex-radio slide_content_<?php echo esc_attr($Attributes); ?>">
  
          <!-- widget-sobex-box-container-style-checkbox start -->
          <div class="widget-sobex-box-container-style-price">

            <div class="sobex-tech-price-two-side-slider-container sobex-tech-price-two-side-slider-container-sidebar">
              <div class="sobex-tech-price-two-side-slider-row">

                  <div id="sobex-tech-price-two-side-slider-slider-range-sidebar"></div>

              </div>
              <div class="sobex-tech-price-two-side-slider-row sobex-tech-price-two-side-slider-slider-labels">
                <div class="sobex-tech-price-two-side-slider-min-caption">
                  <strong><?php echo esc_attr($currency);?>:</strong> <span id="sobex-tech-price-two-side-slider-range-value1-sidebar"></span>
                </div>
                <div class="sobex-tech-price-two-side-slider-max-caption">
                  <strong><?php echo esc_attr($currency);?>:</strong> <span id="sobex-tech-price-two-side-slider-range-value2-sidebar"></span>
                </div>
              </div>
              <div class="sobex-tech-price-two-side-slider-row">

                    <input type="hidden" class="sobex-tech-price-two-side-min-value-sidebar" name="min_price" value="0">
                    <input type="hidden" class="sobex-tech-price-two-side-max-value-sidebar" name="max_price" value="0">

              </div>
            </div>

    
          </div> <!-- widget-sobex-box-container-style-checkbox End -->
  
        </div> <!-- Comment (widget-sobex-content-container) End -->
  
    </div> <!-- Comment (Start Table widget Group Box Radio) End -->
    <?php 

    echo sobextech_widget_sidebar_price_script("two_side",$price_min,$price_max); ?>
  <?php
}
function sobextech_widget_sidebar_sobex_price_one_side($Attributes, $Attributes_label_name, $currency, $price_min, $price_max) {
  ?>
  <?php global $stsearch_style_get_opts; ?>
    <!-- Comment (Start Table widget Group Box Radio) start -->
    <div class="widget-sobex-table-group">
  
     <!-- Comment (Sobex loading message) start -->
     <div class="widget-sobex-loading-container">
          <div class="widget-sobex-loading-content">
          <img src="<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_FRONT . '/loading-widget.gif' ?>" />
          <?php echo sobextech_widget_wpml_content_loading_string(); ?>
          </div> 
        </div> <!-- Comment (Sobex loading message) end -->
      
        <!-- Comment (Sobex Header Content) start -->
        <div class="widget-sobex-header-content">
  
          <!-- Comment Sobext Right Content header start-->
          <div class="widget-sobex-table-title">
            <div class="widget-sobex-table-table-icon">
              <i class="<?php echo (isset($stsearch_style_get_opts['widget_sidebar_icon']) && !empty($stsearch_style_get_opts['widget_sidebar_icon']))? esc_attr($stsearch_style_get_opts['widget_sidebar_icon']) : 'sobex-tech-menu' ?>"></i>
            </div>
            <a class="widget-sobex-table-text"><?php echo sobextech_widget_sidebar_table_string($Attributes_label_name,$Attributes); ?></a>
          </div> <!-- Comment Sobext Right Content header End-->
  
          <!-- Comment Sobext Left Content header start-->
          <div class="widget-sobex-left-header">
            <div class="widget-sobex-table-group-clicker slide_content_click_<?php echo esc_attr($Attributes); ?>">
              <div class="sobex-hide-table"><i class="<?php if(isset($stsearch_style_get_opts['widget_icon_slideup']) || !empty($stsearch_style_get_opts['widget_icon_slideup'])) echo esc_attr($stsearch_style_get_opts['widget_icon_slideup']); else echo 'sobex-tech-arrow-down-sign-to-navigate';  ?>"></i></div><!--show in font-->
              <div class="sobex-show-table widget-sobex-hidden-table"><i class=" <?php if(isset($stsearch_style_get_opts['widget_icon_slidedown']) || !empty($stsearch_style_get_opts['widget_icon_slidedown'])) echo esc_attr($stsearch_style_get_opts['widget_icon_slidedown']); else echo 'sobex-tech-up-arrow';  ?>"></i></div> <!--hide in font-->
            </div> <!-- Open & Close Tab Clicker -->
          </div> <!-- Comment Sobext Left Content header End-->
  
        </div><!-- Comment (Sobex Header Content) start -->
      
        <div class="widget-sobex-header-line"></div> <!-- Sobex widget Line-->

        <!--Start Filter Button-->
        <div class="widget-sobex-buttons-container">
          <div class="widget-sobex-filter-button widget-sobex-filter-button-before-content">         
              <div class="widget-sobex-filter-button-table" role="button"><a class="widet-sobex-filter-button-table-title"><i class="  <?php if(isset($stsearch_style_get_opts['widget_search_icon']) || !empty($stsearch_style_get_opts['widget_search_icon'])) echo esc_attr($stsearch_style_get_opts['widget_search_icon']); else echo 'sobex-tech-checked-1';  ?>"></i> <?php sobextech_widget_wpml_filter_all_string(); ?></a></div>
              <div class="widget-sobex-clear-button-table" role="button"><a class="widet-sobex-clear-button-table-title"><i class="<?php echo (isset($stsearch_style_get_opts['widget_clear_icon']) && !empty($stsearch_style_get_opts['widget_clear_icon']))? esc_attr($stsearch_style_get_opts['widget_clear_icon']) : 'sobex-tech-unchecked' ?>"></i><?php echo sobex_techwidget_wpml_clear_all_string(); ?></a></div>
          </div>
        </div>
        <!--End Filter Button-->

        <!-- Comment (widget-sobex-content-container) start -->
        <div class="widget-sobex-content-container widget-sobex-radio slide_content_<?php echo esc_attr($Attributes); ?>">
  
          <!-- widget-sobex-box-container-style-checkbox start -->
          <div class="widget-sobex-box-container-style-price">

            <div class="sobex-tech-price-two-side-slider-container sobex-tech-price-two-side-slider-container-sidebar">
              <div class="sobex-tech-price-two-side-slider-row">

                  <div id="sobex-tech-price-two-side-slider-slider-range-sidebar"></div>

              </div>
              <div class="sobex-tech-price-two-side-slider-row sobex-tech-price-two-side-slider-slider-labels">
                <div class="sobex-tech-price-two-side-slider-min-caption">
                 
                </div>
                <div class="sobex-tech-price-two-side-slider-max-caption">
                <strong><?php echo esc_attr($currency);?>:</strong> <span id="sobex-tech-price-two-side-slider-range-value2-sidebar"></span>
                </div>
              </div>
              <div class="sobex-tech-price-two-side-slider-row">

                    <input type="hidden" class="sobex-tech-price-two-side-min-value-sidebar" name="min_price" value="0">
                    <input type="hidden" class="sobex-tech-price-two-side-max-value-sidebar" name="max_price" value="0">

              </div>
            </div>

    
          </div> <!-- widget-sobex-box-container-style-checkbox End -->
  
        </div> <!-- Comment (widget-sobex-content-container) End -->
  
    </div> <!-- Comment (Start Table widget Group Box Radio) End -->
    <?php 

    echo sobextech_widget_sidebar_price_script("one_side",$price_min,$price_max); ?>
  <?php
}
// End Widget Sidebar Container \\
function sobextech_widget_sidebar_main_container_end(){
  ?>
    </div>
    <!-- End TABLE GROUP CONTAINER -->
  <?php
}
// End Widget Sidebar Form \\
function sobextech_widget_sidebar_form_end() {
  ?>
    </form>
    
    <!--End Form-->
  <?php
}
// Sidebar Scripts \\
function sobextech_widget_sidebar_script($rows) {
  ?>
  <script>

    jQuery('body').ready(function(){


      <?php
        // Start Script for Arrow down & Arrow Up to close widget \\
        foreach($rows as $row):
          $Attribute_js = $row['attribute_woo'];
          $not_attributes = 'product_cat';
            if($Attribute_js !== $not_attributes):?>
            
            jQuery(".<?php echo 'slide_content_'; echo esc_attr($Attribute_js); ?>").show();
            jQuery('body').on('click', '.<?php echo 'slide_content_click_'. esc_attr($Attribute_js) ?>', function () {
                
                if(jQuery('.sobex-show-table',this).hasClass("widget-sobex-hidden-table")){
                  jQuery('.sobex-show-table',this).removeClass('widget-sobex-hidden-table');
                  jQuery('.sobex-hide-table',this).addClass('widget-sobex-hidden-table');
                }else{
                  jQuery('.sobex-show-table',this).addClass('widget-sobex-hidden-table');
                  jQuery('.sobex-hide-table',this).removeClass('widget-sobex-hidden-table');
                }
                jQuery(".<?php echo 'slide_content_'. esc_attr($Attribute_js) ?>").slideToggle();
                
              }); 
              <?php 
            endif;
        endforeach;?>

        
        if($('.widget-menu-sobex-container').insertAfter("<?php global $stsearch_style_get_opts; echo (isset($stsearch_style_get_opts['header_widget_position_attr']) && !empty($stsearch_style_get_opts['header_widget_position_attr']))? esc_attr($stsearch_style_get_opts['header_widget_position_attr']) : '.page-title'; ?>")){
          $('.widget-menu-sobex-container').show();
        }

        <?php 
        // if rtl make scroll into right in mobile & tablet mode
              if ( is_rtl() ) {  
                echo "$('.widget-menu-sobex-groups').scrollLeft($(this).height());";
              }
        ?>
    

      <?php  global $stsearch_style_get_opts;

        if(isset($stsearch_style_get_opts['sidebar_scroll_type']) && !empty($stsearch_style_get_opts['sidebar_scroll_type'])): 


      if($stsearch_style_get_opts['sidebar_scroll_type'] === 'scroll'): ?>
      
        // Add Scroll Bar

          if(jQuery(this).height() > <?php if(isset($stsearch_style_get_opts['sidebar_scroll_height']) || !empty($stsearch_style_get_opts['sidebar_scroll_height'])) echo esc_attr($stsearch_style_get_opts['sidebar_scroll_height']); else echo '138'; ?>){
            jQuery('div.widget-sobex-content-container').addClass('widget-sobex-content-scroll');
          }
      
        <?php 
        endif;
      endif; ?>


    });
  </script>
  <?php
}
// Sidebar widget ajax requests \\
function sobextech_widget_ajax_requests() {
  ?>
  <script>
  function sobex_dc_model_menu_after_callback() {
      var checked = $('.sobex-menu-slide-main-container input:radio:checked').length;
        if (checked > 0) {
            $('.sobex-menu-slide-clear-button').show();
          }
        $('.sobex-accoslider-ul-filter').removeClass('sobex-menu-slide-pointer-hidder');
  }
  function sobex_default_model_after_callback_sidebar() {

      $('.widget-menu-sobex-group').removeClass('widget-menu-sobex-close-group'); $('.widget-menu-sobex-close-content').hide();
      $('.widget-sobex-table-group').each(function () {
         var checked = $('input:radio:checked', this).length;
         var filter_button = $(".widget-sobex-buttons-container");
         var current_parent_table = $(this).closest('.widget-sobex-table-group');
         var current_filter_button = $(current_parent_table).find(filter_button);
         if (checked > 0) {
            $(current_filter_button).show();
         }
      });
  }
  function sobex_after_callback_sidebar_reset() {
      $('.widget-sobex-content-container').show();
      $('.widget-menu-sobex-close-content').show();
      $('.widget-menu-sobex-group').removeClass('widget-menu-sobex-close-group');
      $(".widget-sobex-loading-container").hide(); 
      $(".widget-sobex-table-group").removeClass('widget-sobex-pointer-hidder'); 
      $('.widget-sobex-table-group-clicker').show(); 
      $(".widget-sobex-filter-button").show(); 
      $('.widget-sobex-main-button-container').show(); 
      $(".widget-sobex-table-text").show(); 
      $('.widget-sobex-table-table-icon').show(); 
      $('.widget-menu-sobex-close-content').hide();
  }
  function sobex_show_error_ajax_callback_sidebar() {
      $('.widget-sidebar-sobex-error-content').show(); 
      $('.widget-sidebar-sobex-error-content p').text("<?php echo sobextech_widget_wpml_ajax_timeout_error_string(); ?>");
  }
  function sobex_widget_sidebar_scroll_script() {
    <?php global $stsearch_style_get_opts; ?>
    $('.widget-sobex-content-container').each(function(){

        if($(this).height() > '<?php if(isset($stsearch_style_get_opts['sidebar_scroll_height']) || !empty($stsearch_style_get_opts['sidebar_scroll_height'])) echo esc_attr($stsearch_style_get_opts['sidebar_scroll_height']); else echo '138'; ?>'){
            jQuery(this).css( "height", "<?php if(isset($stsearch_style_get_opts['sidebar_scroll_height']) || !empty($stsearch_style_get_opts['sidebar_scroll_height'])) echo esc_attr($stsearch_style_get_opts['sidebar_scroll_height']); else echo '138'; ?>px" );
            jQuery(this).addClass('widget-sobex-content-scroll');
        }else if($(this).height() < '<?php if(isset($stsearch_style_get_opts['sidebar_scroll_height']) || !empty($stsearch_style_get_opts['sidebar_scroll_height'])) echo esc_attr($stsearch_style_get_opts['sidebar_scroll_height']); else echo '138'; ?>') {
            jQuery(this).css( "height", "auto" );
            jQuery(this).removeClass('widget-sobex-content-scroll');
        }

    });
  }
  sobex_widget_sidebar_scroll_script();
    //------------- START Ajax Functions -------------\\
    // To Send Form Data
    function sobextech_widget_form_data_ajax(form_data) {
      // console.log(form_data);
      <?php global $stsearch_get_opts; ?>
      $('.widget-menu-sobex-error-content').hide();

      data = form_data + "&page=" + $(".woocommerce nav.woocommerce-pagination ul li span.current").text();
      var settings = {
          "url": "<?php echo WC_AJAX::get_endpoint( 'stsearch_products_filter' ) ?>",
          "method": "POST",
          "data": data
        }
        $.ajax(settings).done(function (response) {
          $('.products').html(response.products);
          $('.woocommerce-pagination').html(response.paginate);
          
          <?php 
              if(isset($stsearch_get_opts['search_model']) || !empty($stsearch_get_opts['search_model'])):
                if($stsearch_get_opts['search_model'] === 'default_model'):
                  ?>
                    sobex_dc_model_menu_after_callback();
                  <?php
                endif;
              endif;
            ?>
        });
    }
  <?php global $stsearch_get_opts;
      if(isset($stsearch_get_opts['menu_menu_type']) && !empty($stsearch_get_opts['menu_menu_type'])):
        if($stsearch_get_opts['menu_menu_type'] === 'off' || $stsearch_get_opts['menu_menu_type'] === 'merge'): ?>
    // To Send Widget Data
    function sobextech_filter_widget_ajax(form_data) {
      <?php global $stsearch_get_opts; ?>
      data = form_data;
      var settings = {
        "url": "<?php echo rest_url( 'stsearch/v1/sidebar' ); ?>"+"?"+data,
        "method": "GET",
        timeout:<?php if(isset($stsearch_get_opts['st_search_widet_ajax_callback_timeout']) || !empty($stsearch_get_opts['st_search_widet_ajax_callback_timeout'])): echo esc_attr($stsearch_get_opts['st_search_widet_ajax_callback_timeout']); else: echo 6000; endif; ?>,
      }
      $.ajax(settings).done(function (response) {
        if ( 'undefined' !== typeof response.sidebar ) {

          if(response.sidebar !== 'error') {

              $('.widget-sobex-main-container').html(response.sidebar); // To Replace The Widget
              $('.widget-sobex-main-button-container').show();

              <?php 
              if(isset($stsearch_get_opts['search_model']) || !empty($stsearch_get_opts['search_model'])):
                if($stsearch_get_opts['search_model'] === 'default_model'):
                  ?>
                      sobex_default_model_after_callback_sidebar();
                  <?php
                endif;
              endif;
            ?>
            
            sobex_widget_sidebar_scroll_script();
          }else {
            sobex_after_callback_sidebar_reset();
            sobex_show_error_ajax_callback_sidebar();
          }
        }

        
      }).catch(function(e) {
        if(e.statusText == 'timeout')
        {     
          sobex_after_callback_sidebar_reset();
          sobex_show_error_ajax_callback_sidebar();
        }
      });

    }
    <?php 
        else:
          ?>
          function sobextech_filter_widget_ajax(form_data){ //empty 
            
          }
          <?php
        endif;
      endif;?>
  
  </script>
  <?php
}



