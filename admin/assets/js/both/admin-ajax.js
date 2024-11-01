jQuery(document).ready(function($) {


	/**
	 * @ Function For Submit input Show&Hide
	 */
	function show_updating_message(this_parent) {
		$('#loadingmessage', this_parent).show();
		$(this_parent).addClass('sobex-button-update-close');
	}

	function hide_updating_message(this_parent) {
		$('#loadingmessage', this_parent).hide();
		setTimeout(function(){
			$('.sobex-toast').delay(4000).fadeOut('slow');
		 }, 3000);
			// $('#loadingmessage', this_parent).fadeOut('slow');

		$(this_parent).removeClass('sobex-button-update-close');
	}

	/**
	 * @ Function For Sortable Sidebar
	 */
	jQuery('.stsearchtable tbody').sortable({
		update: function(event, ui) {
			$(this).children().each(function(index) {
				if ($(this).attr('data-position') != (index + 1)) {
					$(this).attr('data-position', (index + 1)).addClass('updated');
				}
			});
		}
	});

	/**
	 * @ Function If user Clicked on submit button To Save Sidebar Attributes
	 */
	$(document).on('click', '#upd_sidebar_attributes', function() {
		$('.update-sidebar-attributes').each(function() {

			if (!$(this).hasClass("updated")) {
				$(this).addClass('updated');
			}


		});

		var this_parent = $(this);
		show_updating_message(this_parent);
		saveSidebarAttributes(this_parent);

	});

	// Send Sidebar Attributes Data
	function saveSidebarAttributes(this_parent) {

		var positions = new Array();

		$('.tbody-sidebar-attributes .updated').each(function() {

			var playmode = $('#play_mode' + $(this).attr('data-index')).is(':checked')? "1": "0";

			positions.push([$(this).attr('data-index'), $('#attribute_woo' + $(this).attr('data-index')).val(), $(this).attr('data-position'), playmode, $('#display_mode' + $(this).attr('data-index')).val()]);

			$(this).removeClass('updated');
		});
		if(jQuery.isEmptyObject(positions)) {
			positions = null;
		}

		var tags = new Array();
		$('input[name="product-tags-list"]:checked').each(function() {
			tags.push([$(this).val()]);
		});
		if(jQuery.isEmptyObject(tags)) {
			tags = null;
		}
		

		var woos = new Array();
		$('input[name="woocommerce-filter-list"]:checked').each(function() {
			woos.push([$(this).val()]);
		});
		if(jQuery.isEmptyObject(woos)) {
			woos = null;
		}

		var price_setting = $("select#stsearch-select-price-setting option").filter(":selected").val();


		$.ajax({
			url: stsearch_admin_ajax.ajax_url,
			method: 'POST',
			dataType: 'text',
			data: {
				action: 'save_attributes',
				update: 1,
				positions: positions,
				tags: tags,
				woos: woos,
				price_setting:price_setting,
			},
			success: function(response) {
				$('.sobextechcontent').append(response);

					hide_updating_message(this_parent);
			}
		});
	}

	/**
	 * @ Function If user Clicked on submit button To Save Sidebar Attributes Label Names
	 */
	$(document).on('click', '#upd_sidebar_title', function() {

		var this_parent = $(this);
		show_updating_message(this_parent);

		saveAttributesNames(this_parent);

	});

	// Send Sidebar Attributes Label names Data
	function saveAttributesNames(this_parent) {

		var labels = new Array();

		$('.stsearch-label-box-input').each(function() {

			labels.push([$(this).attr('label-id-sidebar'), $('#label_name' + $(this).attr('label-id-sidebar')).val()]);

		});


		$.ajax({
			url: stsearch_admin_ajax.ajax_url,
			method: 'POST',
			dataType: 'text',
			data: {
				action: 'save_attributes',
				update_names: 1,
				labels: labels
			},
			success: function(response) {

				$('.sobextechcontent').append(response);

				hide_updating_message(this_parent);

			}

		});
	}

	/**
	 * @ Function For Header Sidebar
	 */
	$('.stsearchtableheader tbody').sortable({
		update: function(event, ui) {
			$(this).children().each(function(index) {
				if ($(this).attr('data-position-header') != (index + 1)) {
					$(this).attr('data-position-header', (index + 1)).addClass('updated');
				}
			});
		}
	});

	/**
	 * @ Function If user Clicked on submit button To Save Header Attributes
	 */
	$(document).on('click', '#upd_header_attributes', function() {
		$('.update-header-attributes').each(function() {

			if (!$(this).hasClass("updated")) {
				$(this).addClass('updated');
			}


		});
		var this_parent = $(this);
		show_updating_message(this_parent);
		saveHeaderAttributes(this_parent);

	});

	// Send Header Attributes  Data
	function saveHeaderAttributes(this_parent) {

		var positions = new Array();

		$('.tbody-header-attributes .updated').each(function() {

			var playmode = $('#play_mode_header' + $(this).attr('data-index-header')).is(':checked')? "1": "0";

			positions.push([$(this).attr('data-index-header'), $('#attribute_header' + $(this).attr('data-index-header')).val(), $(this).attr('data-position-header'), playmode, $('#device_mode_header' + $(this).attr('data-index-header')).val(),$('#display_mode_header' + $(this).attr('data-index-header')).val()]);

			$(this).removeClass('updated');
		});


		$.ajax({
			url: stsearch_admin_ajax.ajax_url,
			method: 'POST',
			dataType: 'text',
			data: {
				action: 'save_widget_header',
				update: 1,
				positions: positions
			},
			success: function(response) {

				$('.sobextechcontent').append(response);
				hide_updating_message(this_parent);

			}
		});
	}

	/**
	 * @ Function If user Clicked on submit button To Save Header Attributes Label names
	 */
	$(document).on('click', '#upd_header_title', function() {

		var this_parent = $(this);
		show_updating_message(this_parent);
		saveAttributesHeaderNames(this_parent);

	});
	// Send Header Attributes Label Names Data
	function saveAttributesHeaderNames(this_parent) {

		var labels = new Array();

		$('.stsearch-label-box-input-header').each(function() {

			labels.push([$(this).attr('label-id-header'), $('#label_name_header' + $(this).attr('label-id-header')).val()]);

		});


		$.ajax({
			url: stsearch_admin_ajax.ajax_url,
			method: 'POST',
			dataType: 'text',
			data: {
				action: 'save_widget_header',
				update_names: 1,
				labels: labels
			},
			success: function(response) {

				$('.sobextechcontent').append(response);
				hide_updating_message(this_parent);


			}

		});
	}

	/**
	 * @ Function Save Menu Settings -> Icons att & colors
	 */
	$(document).on('click', '#upd_menu_style_settings', function() {

		var this_parent = $(this);
		show_updating_message(this_parent);
		saveMenuStyleSettings(this_parent);

	});

	// Send New Data Of menu Style Settings.
	function saveMenuStyleSettings(this_parent) {

		var parent_menus = new Array();

		$('.sobex-widget-first-child').each(function() {

			var parent_id = $('.sobex-widget-menu-slide-icon-details-choice-icon',this).attr('id-parent-icon');
			parent_menus.push([parent_id, $('#current' + parent_id).attr('class'),$('#pickcolor' + parent_id).val()]);

		});

		var child_menus = new Array();

		$('.sobex-widget-fourth-child').each(function() {

			var child_id = $('.sobex-widget-menu-slide-icon-details-choice-icon',this).attr('id-child-icon');
			child_menus.push([child_id,$('#currentchild').attr('class'),$('#pickcolorforchild').val()]);

		});

		$.ajax({
			url: stsearch_admin_ajax.ajax_url,
			method: 'POST',
			dataType: 'text',
			data: {
				action: 'save_menu_style_settings',
				update: 1,
				parent_menus: parent_menus,
				child_menus: child_menus,

			},
			success: function(response) {

				$('.sobextechcontent').append(response);

				hide_updating_message(this_parent);

			}

		});
	}

	/**
	 * @ Function If user want to update filter widget
	 */
	 $(document).on('click', '#sobex_icore_update_filter_widget', function() {

		var this_parent = $(this);
		show_updating_message(this_parent);
		sobex_update_filter_widget(this_parent);

	});

	function sobex_update_filter_widget(this_parent) {

		$.ajax({
			url: stsearch_admin_ajax.ajax_url,
			method: 'POST',
			dataType: 'text',
			data: {
				action: 'sobex_update_filter_widget',
				reset: 1,
			},
			success: function(response) {
				$('.sobextechcontent').append(response);
				hide_updating_message(this_parent);

			}
		});
	}
	/**
	 * @ Function If user want to reset widget sidebar style
	 */
	$(document).on('click', '#sobex_icore_reset_filter_widget_sidebar_style', function() {

		var this_parent = $(this);
		show_updating_message(this_parent);
		sobex_reset_filter_widget_sidebar_style(this_parent);

	});

	function sobex_reset_filter_widget_sidebar_style(this_parent) {

		$.ajax({
			url: stsearch_admin_ajax.ajax_url,
			method: 'POST',
			dataType: 'text',
			data: {
				action: 'sobex_reset_filter_widget_sidebar_style',
				reset: 1,
			},
			success: function(response) {
				$('.sobextechcontent').append(response);
				hide_updating_message(this_parent);

			}
		});
	}
	/**
	 * @ Function If user want to reset widget header style
	 */
	 $(document).on('click', '#sobex_icore_reset_filter_widget_header_style', function() {

		var this_parent = $(this);
		show_updating_message(this_parent);
		sobex_reset_filter_widget_header_style(this_parent);

	});

	function sobex_reset_filter_widget_header_style(this_parent) {

		$.ajax({
			url: stsearch_admin_ajax.ajax_url,
			method: 'POST',
			dataType: 'text',
			data: {
				action: 'sobex_reset_filter_widget_header_style',
				reset: 1,
			},
			success: function(response) {
				$('.sobextechcontent').append(response);
				hide_updating_message(this_parent);

			}
		});
	}
	/**
	 * @ Function If user want to update menu widget
	 */
	 $(document).on('click', '#sobex_icore_update_menu_widget', function() {

		var this_parent = $(this);
		show_updating_message(this_parent);
		sobex_icore_update_menu_widget(this_parent);

	});

	function sobex_icore_update_menu_widget(this_parent) {

		$.ajax({
			url: stsearch_admin_ajax.ajax_url,
			method: 'POST',
			dataType: 'text',
			data: {
				action: 'sobex_update_menu_widget',
				reset: 1,
			},
			success: function(response) {
				$('.sobextechcontent').append(response);
				hide_updating_message(this_parent);

			}
		});
	}
	/**
	 * @ Function If user want to reset menu slide style
	 */
	 $(document).on('click', '#sobex_icore_reset_menu_slide_style', function() {

		var this_parent = $(this);
		show_updating_message(this_parent);
		sobex_reset_menu_slide_style(this_parent);

	});

	function sobex_reset_menu_slide_style(this_parent) {

		$.ajax({
			url: stsearch_admin_ajax.ajax_url,
			method: 'POST',
			dataType: 'text',
			data: {
				action: 'sobex_reset_menu_slide_style',
				reset: 1,
			},
			success: function(response) {
				$('.sobextechcontent').append(response);
				hide_updating_message(this_parent);

			}
		});
	}
	/**
	 * @ Function If user want to reset menu slide icons style
	 */
	 $(document).on('click', '#sobex_icore_reset_menu_slide_icons_style', function() {

		var this_parent = $(this);
		show_updating_message(this_parent);
		sobex_reset_menu_slide_icons_style(this_parent);

	});

	function sobex_reset_menu_slide_icons_style(this_parent) {

		$.ajax({
			url: stsearch_admin_ajax.ajax_url,
			method: 'POST',
			dataType: 'text',
			data: {
				action: 'sobex_reset_menu_slide_icons_style',
				reset: 1,
			},
			success: function(response) {
				$('.sobextechcontent').append(response);
				hide_updating_message(this_parent);

			}
		});
	}
	/**
	 * @ Function If user want to send contact message
	 */

	$('#contact-attachment').on("change", function () {
		if(this.files[0].size > 1000000) {
		  alert("لطفا فایل کمتر از 1 مگابایت آپلود کنید");
		  $(this).val('');
		}
	   });
	$(document).on('click', '.sobex-contact-submit', function($) {

		$('.sobex-contact-submit').addClass('sobex-contact-submit-css');
		sobex_send_contact_form();

	});
		function sobex_send_contact_form() {

		var data = new FormData();
		data.append('image', $('#contact-attachment').prop('files')[0]);
		data.append('name',$('#sobex-contact-user-name').val());
		data.append('email',$('#sobex-contact-user-email').val());
		data.append('text',$('#sobex-contact-user-text').val());
		data.append('action', 'sobex_mail_contact_support');

		$.ajax({
			url: stsearch_admin_ajax.ajax_url,
			type: "POST",
			contentType: false,
			processData: false,
			data: data,
			success: function(response) {

				$('.sobextechcontent').append(response);
				$('.sobex-contact-submit').removeClass('sobex-contact-submit-css');

			}

		});

	}

	/**
	 * @ Function If user Clicked on Active Icons
	 */
		$(document).on('click', '#sobex-tech-cansel-package', function() {
			var package_id = $(this).attr('data-package-id');
			var this_parent = $(this);
			show_updating_message(this_parent);
			DeleteSobexPackage(this_parent,package_id);
	
		});
		// Send Header Attributes Label Names Data
		function DeleteSobexPackage(this_parent,package_id) {


			$.ajax({
				url: stsearch_admin_ajax.ajax_url,
				type: "POST",
				data: {
						action: 'sobex_delete_package',
						delete: package_id,
				},
				success: function(success_data) {
					$('.sobextechcontent').append(success_data);
					hide_updating_message(this_parent);
					location.reload();
				}
	
			});
		}

		/**
		 * @ Function If user Clicked on Uninstall Icon Pack
		 */
		$(document).on('click', '#sobex-tech-uninstall-icon-package', function() {
			if (confirm("Are you sure you want to delete the Addon permanently?")) {
			var package_name = $(this).attr('data-package-name');
			var this_parent = $(this);
			show_updating_message(this_parent);
			UninstallSobexIconPackage(this_parent,package_name);
			}
			
	
		});
		function UninstallSobexIconPackage(this_parent,package_name) {


			$.ajax({
				url: stsearch_admin_ajax.ajax_url,
				type: "POST",
				data: {
						action: 'sobex_uninstall_addon_icon',
						delete: package_name,
				},
				success: function(success_data) {
					$('.sobextechcontent').append(success_data);
					hide_updating_message(this_parent);
				}
	
			});
		}

		/**
		 * @ Function If user Clicked on Alert 
		 */
		$(document).on('click', '.sobex-tech-cookie-alert-accept-cookies', function() {
			submitAlertData();
	
		});
		// Send Header Attributes Label Names Data
		function submitAlertData() {

			$.ajax({
				url: stsearch_admin_ajax.ajax_url,
				method: 'POST',
				dataType: 'text',
				data: {
					action: 'sobextech_get_client_domain',
					accepted: 1,
				},
				success: function(response) {
					const jsonObject = JSON.parse(response);
					const resultOutput = jsonObject.result;
					const contentOutput = jsonObject.content;
					if(resultOutput == 'success') {
						// location.reload();
					}
					$('.sobextechcontent').append(contentOutput);
					hide_updating_message(".sobex-toast sobex-toast-success");
	
				}
			});
		}
		

});
jQuery(document).ready(function($) {
    "use strict";

    var cookieAlert = document.querySelector(".sobex-tech-cookie-alert-container");
    var acceptCookies = document.querySelector(".sobex-tech-cookie-alert-accept-cookies");


	var selection = document.querySelector(".sobex-tech-cookie-alert-container") !== null;

	if (selection) {

		cookieAlert.offsetHeight;

		cookieAlert.classList.add("show");
		acceptCookies.addEventListener("click", function () {
	
			cookieAlert.classList.remove("show");
		});
	}

});

