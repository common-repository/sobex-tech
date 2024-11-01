if (typeof $ == 'undefined') {
	var $ = jQuery;
}
$(function(){
   /**
    * @ Start Clear Function
    * @ To Remove Any Checked value if the widget has
    **/
   function sobex_default_model_clear() {
      var checked = $('.widget-sobex-main-container input:checkbox:checked').length;
      if (checked == 0) {
         $('.widget-sobex-buttons-container').hide();
         $('.widget-sobex-table-group').removeClass('widget-sobex-avoid-control');
      }
   }
   $('body').on('change', '.widget-sobex-main-container', function () {
      sobex_default_model_clear();
   });
   /**
    * @ Start function to display clear & filter if group has checked value
    * @ To Remove Any Checked value if the widget has
    **/
   function sobex_default_model_show_clear() {
      $('.widget-sobex-table-group').each(function () {
         var checked = $('input:checkbox:checked', this).length;
         var filter_button = $(".widget-sobex-buttons-container");
         var current_parent_table = $(this).closest('.widget-sobex-table-group');
         var current_filter_button = $(current_parent_table).find(filter_button);
         if (checked > 0) {
            $(current_filter_button).show();
         }
      });
   }
   /**
    * @ Start function to Rest The Form of Sidebar
    * @ To Remove Any Checked value if has
    **/
   function sobex_default_model_rest_sidebar_form() {
      /** Start Rest The SideBar Form */
      $('.widget-sobex-select option:selected').each(function () {
         this.selected = false
      }); // Unchecked Select
      $('.widget-sobex-main-container').trigger("reset"); // SideBar Form Reset
      $('.widget-sobex-checkbox input:checked').each(function () {
         this.checked = false;
      }); // Unchcked Checkedbox's
      $('.widget-sobex-radio  input:radio').each(function () {
         this.checked = false;
      }); // Unchecked Radio

      // REST MENU
      $('.sobex-accoslider-checkbox input:checked').each(function () {
         this.checked = false;
      }); // Unchcked Checkedbox's

      sobextech_filter_widget_ajax("type=sidebar&action=clear_all");
      
      var url = window.location.href;

      // Split the URL into two parts: before and after the question mark
      var [baseUrl, queryString] = url.split('?');

      // Create a new query string with updated parameters
      var newQueryString = '';

      // Combine the base URL and updated query string to form a new URL
      var newUrl = `${baseUrl}${newQueryString}`;

      // Update the browser's address bar with the new URL
      window.history.pushState({}, '', newUrl);
   }
   $('body').on('click', '.widget-sobex-clear-button-table', function () {

      // Elements 
      var avoid_control = 'widget-sobex-avoid-control';
      var filter_button = $(".widget-sobex-buttons-container");
      var all_parent_table = $(".widget-sobex-table-group");

      $(all_parent_table).removeClass(avoid_control); // Remove Avoid Control
      $(filter_button).hide(); // Unshow Button

      sobex_default_model_rest_sidebar_form();

      // Header
      var header_all_groups = $('.widget-menu-sobex-group');
      var header_close_content = $('.widget-menu-sobex-close-content');
      var header_avoid_control = 'widget-menu-sobex-close-group';

      $(header_close_content).hide(); // Close header Content
      $(header_all_groups).removeClass(header_avoid_control); // Avoid Control In the groups

   });
   /**
    * @ Start function to send orderes after click filter
    **/
   function sobex_default_model_widget_done() {
      // Elements
      var all_parent_table = $(".widget-sobex-table-group");
      var content_container = $('.widget-sobex-content-container').show();
      var click_hidder = $('.widget-sobex-table-group-clicker');
      var filter_button = $(".widget-sobex-filter-button");
      var widget_buttons = $('.widget-sobex-main-button-container');
      var loading_content = $(".widget-sobex-loading-container");
      var table_title = $(".widget-sobex-table-text");
      var pointer_header = 'widget-sobex-pointer-hidder';
      var table_icon = $('.widget-sobex-table-table-icon');

      // Header
      var header_all_groups = $('.widget-menu-sobex-group');
      var header_close_content = $('.widget-menu-sobex-close-content');
      var header_avoid_control = 'widget-menu-sobex-close-group';

      $(header_close_content).show(); // Close header Content
      $(header_all_groups).addClass(header_avoid_control); // Avoid Control In the groups

      $(content_container).hide(600); // Hide All Content Containers
      $(loading_content).show(100); // Show Loading Content Ajax Message
      $(all_parent_table).addClass(pointer_header); // To add pointer header class to avoid control content
      $(click_hidder).hide(); // To Hide clicker class
      $(filter_button).hide(); // To Hide Filter Button
      $(widget_buttons).hide(); // To Hide Clear All Button *
      $(table_title).hide(); // Hide Table Title *
      $(table_icon).hide(); // Hide Table Icon

      /*<------Start Menu Serialize------>*/
	   var category_serialize = $(".sobex-menu-slide-main-container input:checkbox:checked").map(function(){
         return $(this).val();
        }).get();
      
        if (jQuery.isEmptyObject(category_serialize) === true) {
         category_serialize = $(".sobex-menu-slide-main-container input:radio:checked").map(function(){
            return $(this).val();
           }).get();
        }

        if (jQuery.isEmptyObject(category_serialize) === true) {
            category_serialize = $('.sobex-category').val();
            if(category_serialize === undefined) {
               category_serialize = '';
            }
         }
        menu_form =  "product_cat="+category_serialize;// Serialize the form
        /*<------End Menu Serialize------>*/

      form_data = menu_form+"&"+$('.widget-sobex-main-container :input').serialize(); // Serialize the form
      sobextech_widget_form_data_ajax(form_data); // Send Ajax Form to filter Products
	   sobextech_filter_widget_ajax(form_data); // Send Ajax Form To Sidebar
      window.history.pushState(null,"#","#filter&"+form_data); // Create link
   }
   //------------- START Function of checkbox -------------\\
   $('body').on('change', '.widget-sobex-checkbox', function () {

      // Elements
      var avoid_control = 'widget-sobex-avoid-control';
      var filter_button = $(".widget-sobex-buttons-container");
      // Currents
      var current_parent_table = $(this).closest('.widget-sobex-table-group');
      var current_filter_button = $(current_parent_table).find(filter_button);

      // To Show Search Button Filter
      $(current_filter_button).show();

      // To Avoid Control Other Tables
      $(".widget-sobex-table-group").not(current_parent_table).addClass(avoid_control);
   });
   $('body').on('click', '.widget-sobex-buttons-container .widet-sobex-filter-button-table-title', function () {
      sobex_default_model_widget_done();
   });

   //------------- START Function of Radio -------------\\
   $("body").on('change', '.widget-sobex-radio', function (e) {
      var content_container = $('.widget-sobex-content-container').show();
      if (!$(this).is(":checked")) {
         sobex_default_model_widget_done();
      }
   });

   //------------- START Function of Select Box -------------\\
   $("body").on('change', '.widget-sobex-select', function () {
      var content_container = $('.widget-sobex-content-container').show();
      if (!$(this).is(':selected')) {
         sobex_default_model_widget_done();
      }
   });
   
});
//----------- START Function of Price -----------\\
const price_sidebar_two_side_slider = () => {
   var avoid_control = 'widget-sobex-avoid-control';
   var filter_button = $(".widget-sobex-buttons-container");
   // Currents
   var current_parent_table = $('.sobex-tech-price-two-side-slider-container-sidebar').closest('.widget-sobex-table-group');
   var current_filter_button = $(current_parent_table).find(filter_button);

   // To Show Search Button Filter
   $(current_filter_button).show();

   // To Avoid Control Other Tables
   $(".widget-sobex-table-group").not(current_parent_table).addClass(avoid_control);
};



