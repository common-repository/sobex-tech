if (typeof $ == 'undefined') {
	var $ = jQuery;
}
$(function(){
	/**
	 * @ Start Clear Function
	 * @ To Remove Any Checked value if the widget has
	 **/
	function sobex_menu_slide_default_model_clear() {
	   var checked = $('.sobex-menu-slide-main-container input:checkbox:checked').length;
	   var radio = $('.sobex-menu-slide-main-container input:radio:checked').length;
	   if (radio == 0) {
		  $('.sobex-menu-slide-filter-button').hide();
		  $('.sobex-menu-slide-clear-button').hide();
	   } else if (radio > 0) {
		  $('.sobex-menu-slide-filter-button').show();
		  $('.sobex-menu-slide-clear-button').show();
	   }
	   if (checked == 0) {
		  $('.sobex-menu-slide-filter-button').hide();
		  $('.sobex-menu-slide-clear-button').hide();
		  
	   } else if (checked > 0) {
		  $('.sobex-menu-slide-filter-button').show();
		  $('.sobex-menu-slide-clear-button').show();
	   }
	}
	/**
	 * @ Start Function after callback
	 * @ To Clear Class's
	 **/
	function sobex_menu_slide_default_model_after_callback() {
		$('.sobex-accoslider-ul-filter').removeClass('sobex-menu-slide-pointer-hidder');
		$('.sobex-menu-slide-filter-button').show();
	}
	/**
	 * @ Start Clear Function
	 * @ To Remove Any Checked value if the widget has
	 **/
	function sobex_menu_slide_default_model_header_reset() {
 
	   /** Start Rest menu slide Form */
	   $('.sobex-menu-slide-main-container').trigger("reset"); // SideBar Form Reset
	   $('.sobex-accoslider-li-filter input:checked').each(function () {
		  this.checked = false;
	   }); // Clear Checkbox's
	   $('.sobex-accoslider-li-filter  input:radio').each(function () {
		  this.checked = false;
	   }); // Clear Radios
 
	}
	//------------- Clear All Function -------------\\
	$("body").on('click', '.sobex-menu-slide-clear-button', function () {
	   sobex_menu_slide_default_model_header_reset();
	   sobex_menu_slide_default_model_clear();
	});
	/**
	 * @ Start function to send orderes after click filter
	 **/
	function sobex_menu_slide_default_model_done() {
 
	   menu_slide_filter_button = $('.sobex-menu-slide-filter-button');
	   menu_slide_hidder = 'sobex-menu-slide-pointer-hidder';
	   $('.sobex-accoslider-ul-filter').addClass(menu_slide_hidder);
	   $(menu_slide_filter_button).hide();
	   $('.sobex-menu-slide-clear-button').hide();

	  /*<------End Menu Serialize------>*/
	   var category_serialize = $(".sobex-menu-slide-main-container input:checkbox:checked").map(function(){
		return $(this).val();
	  }).get();
	
	  if (jQuery.isEmptyObject(category_serialize) === true) {
		category_serialize = $(".sobex-menu-slide-main-container input:radio:checked").map(function(){
			return $(this).val();
		  }).get();
	  }
	  /*<------End Menu Serialize------>*/

	   form_data =  "product_cat="+category_serialize;// Serialize the form
	   sobextech_widget_form_data_ajax(form_data); // Send Ajax Form to filter Products
	   sobextech_filter_widget_ajax(form_data); // Send Ajax Form To Sidebar
	   window.history.pushState(null,"#","#filter&"+form_data); // Create link
	}
	//------------- START Function of Checkbox -------------\\
	$('body').on('change', '.sobex-accoslider-checkbox', function () {
 
	   sobex_menu_slide_default_model_clear();

	});
	$('body').on('click', '.sobex-menu-slide-main-container .sobex-menu-slide-filter-button', function () {
		sobex_menu_slide_default_model_done();
	 });
	//------------- START Function of radio -------------\\
	$('body').on('change', '.sobex-accoslider-radio', function () {
 
	   if (!$(this).is(":checked")) {
		  sobex_menu_slide_default_model_done();
	   }
	});
});