jQuery(document).ready(function($){
    $('.sobex-color-picker').wpColorPicker();

		/**
         * @ START EDITOR FOR MENU
         */

		$('.sobex-menu-slide-clear-button').css('color', $('#st-search-menu-buttons-title-color').val());
		$('.sobex-menu-slide-filter-button').css('color', $('#st-search-menu-buttons-title-color').val());
        $('#st-search-menu-buttons-title-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
				$('.sobex-menu-slide-clear-button').css('color', val);
				$('.sobex-menu-slide-filter-button').css('color', val);
            } 
		});

		$('.sobex-menu-slide-clear-button').css('background', $('#st-search-menu-buttons-background-color').val());
		$('.sobex-menu-slide-filter-button').css('background', $('#st-search-menu-buttons-background-color').val());
        $('#st-search-menu-buttons-background-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('.sobex-menu-slide-clear-button').css('background', val);
				$('.sobex-menu-slide-filter-button').css('background', val);
            } 
		});

		$('head').append('<style>.sobex-menu-slide-clear-button:hover,.sobex-menu-slide-filter-button:hover {background: '+$('#st-search-menu-buttons-background-hover').val()+' !important;}</style>');
        $('#st-search-menu-buttons-background-hover').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('head').append('<style>.sobex-menu-slide-clear-button:hover,.sobex-menu-slide-filter-button:hover {background: '+val+' !important;}</style>');
            } 
        });

		$('.sobex-menu-slide-clear-button i').removeClass().addClass($('#st-search-menu-clear-all-icon').val());
		$("body").on('change', '#st-search-menu-clear-all-icon',function(){
			var val = $('#st-search-menu-clear-all-icon').val();
			$('.sobex-menu-slide-clear-button i').removeClass().addClass(val);
		});

		$('.sobex-menu-slide-filter-button i').removeClass().addClass($('#st-search-menu-filter-all-icon').val());
		$("body").on('change', '#st-search-menu-filter-all-icon',function(){
			var val = $('#st-search-menu-filter-all-icon').val();
			$('.sobex-menu-slide-filter-button i').removeClass().addClass(val);
		});

		$('.sobex-menu-slide-clear-button i').css('color', $('#st-search-menu-buttons-icon-color').val());
		$('.sobex-menu-slide-filter-button i').css('color', $('#st-search-menu-buttons-icon-color').val());
        $('#st-search-menu-buttons-icon-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('.sobex-menu-slide-clear-button i').css('color', val);
				$('.sobex-menu-slide-filter-button i').css('color', val);
            } 
		});

		$('i#sobex-menu-arrow-slide').removeClass().addClass($('#st-search-menu-icon-slide').val());
		$("body").on('change', '#st-search-menu-icon-slide',function(){
			var val = $('#st-search-menu-icon-slide').val();
			$('i#sobex-menu-arrow-slide').removeClass().addClass(val);
		});
		
		$('i#sobex-menu-arrow-slide').css('color', $('#st-search-menu-icon-color-slide').val());
        $('#st-search-menu-icon-color-slide').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('i#sobex-menu-arrow-slide').css('color', val);
            } 
		});

		$('.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li .sobex-menu-breadcrumb-a').css('font-size',$('#st-search-menu-breadcrumb-font-size').val()+"px");
		$("body").on('change', '#st-search-menu-breadcrumb-font-size',function(){
			var val = $('#st-search-menu-breadcrumb-font-size').val();
			$('.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li .sobex-menu-breadcrumb-a').css('font-size',val+"px");
		});

		$('.sobex-menu-slide-clear-button').css('font-size',$('#st-search-menu-buttons-font-size').val()+"px");
		$('.sobex-menu-slide-filter-button').css('font-size',$('#st-search-menu-buttons-font-size').val()+"px");
		$("body").on('change', '#st-search-menu-buttons-font-size',function(){
			var val = $('#st-search-menu-buttons-font-size').val();
			$('.sobex-menu-slide-clear-button').css('font-size',val+"px");
			$('.sobex-menu-slide-filter-button').css('font-size',val+"px");
		});

		$('.sobex-menu-slide-menu .sobex-accoslider-li-filter a').css('font-size',$('#st-search-menu-title-font-size').val()+"px");
		$("body").on('change', '#st-search-menu-title-font-size',function(){
			var val = $('#st-search-menu-title-font-size').val();
			$('.sobex-menu-slide-menu .sobex-accoslider-li-filter a').css('font-size',val+"px");
		});

		$('.sobex-main-menu-names').css('color', $('#st-search-menu-title-color').val());
        $('#st-search-menu-title-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('.sobex-main-menu-names').css('color', val);
            } 
		});
		
		$('head').append('<style>.sobex-menu-check-with-label:checked+ .sobex-main-menu-names{background-color: '+$('#st-search-menu-checked-background-color').val()+' !important'+'}</style>');
        $('#st-search-menu-checked-background-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
								$('head').append('<style>.sobex-menu-check-with-label:checked+ .sobex-main-menu-names{background-color: '+val+' !important'+'}</style>');
            } 
		});

		$('.sobex-menu-slide-main-container').css('background', $('#st-search-menu-background-color').val());
		$('.sobex-accoslider-ul-filter').css('background', $('#st-search-menu-background-color').val());
		$('#st-search-menu-background-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
				$('.sobex-accoslider-ul-filter').css('background', val);
                $('.sobex-menu-slide-main-container').css('background', val);
            } 
		});
		$('head').append('<style>.sobex-menu-slide-menu .sobex-accoslider-li-filter .sobex-main-menu-names:hover {background: '+$('#st-search-menu-hover-color').val()+' ;}</style>');
        $('#st-search-menu-hover-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('head').append('<style>.sobex-menu-slide-menu .sobex-accoslider-li-filter .sobex-main-menu-names:hover {background: '+val+' ;}</style>');
            } 
        });
		$('a.sobex-menu-breadcrumb-a').css('color', $('#st-search-menu-breadcrumb-title-color').val());
        $('#st-search-menu-breadcrumb-title-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('a.sobex-menu-breadcrumb-a').css('color', val);
            } 
        });
		
		$('head').append('<style>.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li {background: '+$('#st-search-menu-breadcrumb-background-title-color').val()+';}.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:before{  border-top: 15px solid '+$('#st-search-menu-breadcrumb-background-title-color').val()+';}.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:after{  border-bottom: 15px solid '+$('#st-search-menu-breadcrumb-background-title-color').val()+';}.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li .sobex-menu-breadcrumb-a{  background-color: '+$('#st-search-menu-breadcrumb-background-title-color').val()+';}.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li .sobex-menu-breadcrumb-a:after{  border-color: transparent transparent transparent '+$('#st-search-menu-breadcrumb-background-title-color').val()+';}</style>');
        $('#st-search-menu-breadcrumb-background-title-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
				$('head').append('<style>.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li {background: '+val+';}.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:before{  border-top: 15px solid '+val+';}.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:after{  border-bottom: 15px solid '+val+';}.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li .sobex-menu-breadcrumb-a{  background-color: '+val+';}.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li .sobex-menu-breadcrumb-a:after{  border-color: transparent transparent transparent '+val+';}</style>');
            } 
        });

        $('head').append('<style>.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:last-child {background-color: '+$('#st-search-menu-breadcrumb-background-hover-color').val()+' !important;}.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:last-child:before,.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:last-child:after,.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:hover:before,.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:hover:after {border-top-color: '+$('#st-search-menu-breadcrumb-background-hover-color').val()+' ;border-bottom-color: '+$('#st-search-menu-breadcrumb-background-hover-color').val()+'}.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:last-child .sobex-menu-breadcrumb-a,.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:hover .sobex-menu-breadcrumb-a {background: '+$('#st-search-menu-breadcrumb-background-hover-color').val()+'}.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:last-child .sobex-menu-breadcrumb-a:after,.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:hover .sobex-menu-breadcrumb-a:after {border-left-color: '+$('#st-search-menu-breadcrumb-background-hover-color').val()+'!important}.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:last-child + li {background: '+$('#st-search-menu-breadcrumb-background-hover-color').val()+'}</style>');
        $('#st-search-menu-breadcrumb-background-hover-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('head').append('<style>.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:last-child {background-color: '+val+' !important;}.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:last-child:before,.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:last-child:after,.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:hover:before,.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:hover:after {border-top-color: '+val+' ;border-bottom-color: '+val+'}.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:last-child .sobex-menu-breadcrumb-a,.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:hover .sobex-menu-breadcrumb-a {background: '+val+'}.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:last-child .sobex-menu-breadcrumb-a:after,.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:hover .sobex-menu-breadcrumb-a:after {border-left-color: '+val+'!important}.sobex-menu-breadcrumb .sobex-menu-breadcrumb-li:last-child + li {background: '+val+'}</style>');
            } 
        });

		$('head').append('<style>.sobex-menu-slide-menu {scrollbar-color: '+$('#st-search-menu-scrollbar-color').val()+" "+$('#st-search-menu-background-color').val()+' !important;}</style>');
		$('head').append('<style>.sobex-menu-slide-menu::-webkit-scrollbar-thumb {background-color: '+$('#st-search-menu-scrollbar-color').val()+' !important;}</style>');
        $('#st-search-menu-scrollbar-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
				$('head').append('<style>.sobex-menu-slide-menu {scrollbar-color: '+$('#st-search-menu-scrollbar-color').val()+" "+$('#st-search-menu-background-color').val()+' !important;}</style>');
				$('head').append('<style>.sobex-menu-slide-menu::-webkit-scrollbar-thumb {background-color: '+val+' !important;}</style>');
            } 
        });

		$("body").on('change', '#st-search-menu-display-shadow',function(){
			var val = $('#st-search-menu-display-shadow').val();
			if(val == 'off') {
				$('head').append('<style>.sobex-menu-slide-main-container {box-shadow: unset !important;-webkit-box-shadow: unset !important;-moz-box-shadow: unset !important;}</style>');
			}
		});

        $('head').append('<style>.sobex-menu-slide-main-container {box-shadow: 0px 0px 5px 1px '+$('#st-search-menu-background-shadow').val()+' !important;-webkit-box-shadow: 0px 0px 5px 1px '+$('#st-search-menu-background-shadow').val()+' !important;-moz-box-shadow: 0px 0px 5px 1px '+$('#st-search-menu-background-shadow').val()+' !important;}</style>');
        $('#st-search-menu-background-shadow').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('head').append('<style>.sobex-menu-slide-main-container {box-shadow: 0px 0px 5px 1px '+val+' !important;-webkit-box-shadow: 0px 0px 5px 1px '+val+' !important;-moz-box-shadow: 0px 0px 5px 1px '+val+' !important;}</style>');
            } 
        });



        $('.sobex-menu-slide-main-container').css('border-radius', $('#st-search-menu-border-radius option:selected').val()+'px');
				$("body").on('change', '#st-search-menu-border-radius',function(){
					var val = $('#st-search-menu-border-radius option:selected').val();
					$('.sobex-menu-slide-main-container').css('border-radius', val+'px');
				});

				
				$('#st-search-menu-home-title').on('keyup', function(e){
					var val = $(this).val();
					$('#sobex-menu-drillcrumb .sobex-menu-breadcrumb-li .sobex-menu-breadcrumb-a').eq(0).text(val);
				});

		/**
         * @ START EDITOR FOR SIDEBAR
         */
		$('.widget-sobex-table-table-icon i').removeClass().addClass($("#st-search-settings-widget-icon").val());
		$("body").on('change', '#st-search-settings-widget-icon',function(){
			var val = $("#st-search-settings-widget-icon").val();
			$('.widget-sobex-table-table-icon i').removeClass().addClass(val);;
		});

		$('.widget-sobex-table-table-icon i').css('color', $('#st-search-settings-widget-icon-color').val());
        $('#st-search-settings-widget-icon-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('.widget-sobex-table-table-icon i').css('color', val);
            } 
		});

		$('.widget-sobex-table-text').css('color', $('#st-search-settings-widget-table-text-color').val());
        $('#st-search-settings-widget-table-text-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('.widget-sobex-table-title .widget-sobex-table-text').css('color', val);
            } 
        });

		$('.sobex-widget-input-container span').css('color', $('#st-search-settings-field-text-color').val());
        $('#st-search-settings-field-text-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('.sobex-widget-input-container span').css('color', val);
            } 
        });

		$('.sobex-hide-table > i').removeClass().addClass($("#st-search-settings-widget-icon-slideup").val());
		$("body").on('change', '#st-search-settings-widget-icon-slideup',function(){
			var val = $("#st-search-settings-widget-icon-slideup").val();
			$('.sobex-hide-table > i').removeClass().addClass(val);
		});

		$('.sobex-hide-table i').css('color', $('#st-search-settings-widget-icon-slideup-color').val());
        $('#st-search-settings-widget-icon-slideup-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('.sobex-hide-table i').css('color', val);
            } 
        });

		$('.sobex-show-table i').removeClass().addClass($("#st-search-settings-widget-icon-slidedown").val());
		$("body").on('change', '#st-search-settings-widget-icon-slidedown',function(){
			var val = $("#st-search-settings-widget-icon-slidedown").val();
			$('.sobex-show-table i').removeClass().addClass(val);
		});

		$('.sobex-show-table i').css('color', $('#st-search-settings-widget-icon-slidedown-color').val());
        $('#st-search-settings-widget-icon-slidedown-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('.sobex-show-table i').css('color', val);
            } 
        });

		$('.widget-sobex-filter-button-before-content').css('background', $('#st-search-settings-widget-search-backround-color').val());
        $('#st-search-settings-widget-search-backround-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
            	$('.widget-sobex-filter-button-before-content').css('background', val);
            } 
        });

		$('head').append('<style>.widget-sobex-filter-button-before-content:hover {background: '+$('#st-search-settings-widget-search-backround-hover').val()+' !important;}</style>');
        $('#st-search-settings-widget-search-backround-hover').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('head').append('<style>.widget-sobex-filter-button-before-content:hover {background: '+val+' !important;}</style>');
            } 
        });

		$('.widget-sobex-filter-button.widget-sobex-filter-button-before-content a').css('color', $('#st-search-settings-widget-search-title-color').val());
        $('#st-search-settings-widget-search-title-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
            	$('.widget-sobex-filter-button.widget-sobex-filter-button-before-content a').css('color', val);
            } 
        });

		$('#sidebar-icon-search').removeClass().addClass($('#st-search-settings-widget-search-icon').val());
		$("body").on('change', '#st-search-settings-widget-search-icon',function(){
			var val = $('#st-search-settings-widget-search-icon').val();
			$('#sidebar-icon-search').removeClass().addClass(val);
		});

		$('.widet-sobex-filter-button-table-title i').css('color', $('#st-search-settings-widget-search-icon-color').val());
        $('#st-search-settings-widget-search-icon-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
            	$('.widet-sobex-filter-button-table-title i').css('color', val);
            } 
        });

		$('#sidebar-icon-clear').removeClass().addClass($('#st-search-settings-widget-clear-icon').val());
		$("body").on('change', '#st-search-settings-widget-clear-icon',function(){
			var val = $('#st-search-settings-widget-clear-icon').val();
			$('#sidebar-icon-clear').removeClass().addClass(val);
		});

		$('.widet-sobex-clear-button-table-title i').css('color', $('#st-search-settings-widget-clear-icon-color').val());
        $('#st-search-settings-widget-clear-icon-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
            	$('.widet-sobex-clear-button-table-title i').css('color', val);
            } 
        });
		
		$('.widget-sobex-table-group').css('border-radius', $('#st-search-settings-widget-table-radius option:selected').val()+'px');
		$("body").on('change', '#st-search-settings-widget-table-radius',function(){
			var val = $('#st-search-settings-widget-table-radius option:selected').val();
			$('.widget-sobex-table-group').css('border-radius', val+'px');
		});

		$('.widget-sobex-table-group').css('background', $('#st-search-settings-widget-table-background-color').val());
        $('#st-search-settings-widget-table-background-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('.widget-sobex-table-group').css('background', val);
            } 
        });

		$('.widget-button-filter-text-label').css('color', $('#st-search-settings-filter-all-text-color').val());
        $('#st-search-settings-filter-all-text-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('.widget-button-filter-text-label').css('color', val);
            } 
        });

		$('.widget-button-filter-image i').removeClass().addClass($("#st-search-settings-filter-all-icon").val());
		$("body").on('change', '#st-search-settings-filter-all-icon',function(){
			var val = $("#st-search-settings-filter-all-icon").val();
			$('.widget-button-filter-image i').removeClass().addClass(val);
		});

		$('.widget-button-filter-image i').css('color', $('#st-search-settings-filter-all-icon-color').val());
        $('#st-search-settings-filter-all-icon-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('.widget-button-filter-image i').css('color', val);
            } 
        });

		$('.widget-button-clear-part-text-label').css('color', $('#st-search-settings-clear-all-text-color').val());
        $('#st-search-settings-clear-all-text-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('.widget-button-clear-part-text-label').css('color', val);
            } 
        });

		$('.widget-button-clear-image i').removeClass().addClass($("#st-search-settings-clear-all-icon").val());
		$("body").on('change', '#st-search-settings-clear-all-icon',function(){
			var val = $("#st-search-settings-clear-all-icon").val();
			$('.widget-button-clear-image i').removeClass().addClass(val);
		});

		$('.widget-button-clear-image i').css('color', $('#st-search-settings-clear-all-icon-color').val());
        $('#st-search-settings-clear-all-icon-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('.widget-button-clear-image i').css('color', val);
            } 
        });

		$('.widget-sobex-table-text').css('font-size',$('#st-search-settings-widget-table-font-size').val()+"px");
		$("body").on('change', '#st-search-settings-widget-table-font-size',function(){
			var val = $('#st-search-settings-widget-table-font-size').val();
			$('.widget-sobex-table-text').css('font-size',val+"px");
		});

		$('.sobex-widget-input-container span').css('font-size',$('#st-search-settings-field-font-size').val()+"px");
		$("body").on('change', '#st-search-settings-field-font-size',function(){
			var val = $('#st-search-settings-field-font-size').val();
			$('.sobex-widget-input-container span').css('font-size',val+"px");
		});

		$('.widget-sobex-buttons-container a').css('font-size',$('#st-search-settings-widget-table-buttons-font-size').val()+"px");
		$('.widget-button-filter-now-container .widget-button-filter-part-text .widget-button-filter-text-label').css('font-size',$('#st-search-settings-widget-table-buttons-font-size').val()+"px");
		$('.widget-button-clear-container .widget-button-clear-part-text .widget-button-clear-part-text-label').css('font-size',$('#st-search-settings-widget-table-buttons-font-size').val()+"px");
		$("body").on('change', '#st-search-settings-widget-table-buttons-font-size',function(){
			var val = $('#st-search-settings-widget-table-buttons-font-size').val();
			$('.widget-sobex-buttons-container a').css('font-size',val+"px");
			$('.widget-button-filter-now-container .widget-button-filter-part-text .widget-button-filter-text-label').css('font-size',val+"px");
			$('.widget-button-clear-container .widget-button-clear-part-text .widget-button-clear-part-text-label').css('font-size',val+"px");
		});

		$('head').append('<style>.widget-sobex-content-scroll {scrollbar-color: '+$('#st-search-settings-sidebar-scroll-color').val()+$('#st-search-settings-widget-table-background-color').val()+' !important;}</style>');
		$('head').append('<style>.widget-sobex-content-scroll::-webkit-scrollbar-thumb {background-color: '+$('#st-search-settings-sidebar-scroll-color').val()+' !important;}</style>');
        $('#st-search-settings-sidebar-scroll-color').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
				$('head').append('<style>.widget-sobex-content-scroll {scrollbar-color: '+val+$('#st-search-settings-widget-table-background-color').val()+' !important;}</style>');
				$('head').append('<style>.widget-sobex-content-scroll::-webkit-scrollbar-thumb {background-color: '+val+' !important;}</style>');
            } 
        });

		$('head').append('<style>.widget-sobex-content-container {height: '+$('#st-search-settings-sidebar-scroll-height').val()+'px !important;}</style>');
		$("body").on('change', '#st-search-settings-sidebar-scroll-height',function(){
			var val = $('#st-search-settings-sidebar-scroll-height').val();
			$('head').append('<style>.widget-sobex-content-container {height: '+val+'px !important;}</style>');
		});


		$("body").on('change', '#st-search-settings-hide-sidebar-container-background-color',function(){
			var val = $('#st-search-settings-hide-sidebar-container-background-color option:selected').val();
			$('.widget-sobex-main-container').css('background-color', val);
		});

		$('#st-search-settings-sidebar-container-background-color').wpColorPicker({
			change: function(event, ui){
				var val = ui.color.toString();
				$('.widget-sobex-main-container').css('background-color', val);
			} 
		});
		/**
         * @ START EDITOR FOR Header
         */
		 $('div.widget-menu-sobex-group-header > i').removeClass().addClass($("#st-search-settings-h-header-icon").val());
		 $("body").on('change', '#st-search-settings-h-header-icon',function(){
			 var val = $("#st-search-settings-h-header-icon").val();
			 $('div.widget-menu-sobex-group-header > i').removeClass().addClass(val);
		 });

		 $('div.widget-menu-sobex-group-header > i').css('color', $('#st-search-settings-h-header-icon-color').val());
		 $('#st-search-settings-h-header-icon-color').wpColorPicker({
			 change: function(event, ui){
				 var val = ui.color.toString();
				 $('div.widget-menu-sobex-group-header > i').css('color', ""+val+"");
			 } 
		 });

		 $('.widget-menu-sobex-group-header > a').css('color', $('#st-search-settings-h-text-color').val());
		 $('#st-search-settings-h-text-color').wpColorPicker({
			 change: function(event, ui){
				 var val = ui.color.toString();
				 $('.widget-menu-sobex-group-header > a').css('color', ""+val+"");
			 } 
		 });

		 $('div.widget-menu-sobex-group-drop-slide-down > i').removeClass().addClass($("#st-search-settings-h-slide-down-icon").val());
		 $("body").on('change', '#st-search-settings-h-slide-down-icon',function(){
			 var val = $("#st-search-settings-h-slide-down-icon").val();
			 $('div.widget-menu-sobex-group-drop-slide-down > i').removeClass().addClass(val);
		 });

		 $('div.widget-menu-sobex-group-drop-slide-up > i').removeClass().addClass($("#st-search-settings-h-slide-up-icon").val());
		 $("body").on('change', '#st-search-settings-h-slide-up-icon',function(){
			 var val = $("#st-search-settings-h-slide-up-icon").val();
			 $('div.widget-menu-sobex-group-drop-slide-up > i').removeClass().addClass(val);
		 });

		$('.widget-menu-sobex-group-drop-icons i').css('color', $('#st-search-settings-h-slide-icon-color').val());
		$('#st-search-settings-h-slide-icon-color').wpColorPicker({
			change: function(event, ui){
				var val = ui.color.toString();
				$('.widget-menu-sobex-group-drop-icons i').css('color', val);
			} 
		});
		

		$('.widget-menu-sobex-group').css('background', $('#st-search-settings-h-table-background-color').val());
		$('#st-search-settings-h-table-background-color').wpColorPicker({
		   change: function(event, ui){
			   var val = ui.color.toString();
			   $('.widget-menu-sobex-group').css('background', val);
		   } 
	   });

		$('.widget-menu-sobex-group').css('border-radius', $('#st-search-settings-h-table-radius option:selected').val()+'px');
		$("body").on('change', '#st-search-settings-h-table-radius',function(){
			var val = $('#st-search-settings-h-table-radius option:selected').val();
			$('.widget-menu-sobex-group').css('border-radius', val+'px');
		});

		$('.sobex-menu-widget-input-container > span').css('color', $('#st-search-settings-h-drop-title-color').val());
		$('#st-search-settings-h-drop-title-color').wpColorPicker({
			change: function(event, ui){
				var val = ui.color.toString();
				$('.sobex-menu-widget-input-container > span').css('color', val);
			} 
		});

		$('.widget-menu-sobex-input-list').css('background', $('#st-search-settings-h-drop-background-color').val());
		$('#st-search-settings-h-drop-background-color').wpColorPicker({
			change: function(event, ui){
				var val = ui.color.toString();
				$('.widget-menu-sobex-input-list').css('background', val);
			} 
		});
		
		$('head').append('<style>.widget-menu-sobex-input-list li label:hover {background: '+$('#st-search-settings-h-drop-background-hover').val()+' !important;}</style>');
        $('#st-search-settings-h-drop-background-hover').wpColorPicker({
            change: function(event, ui){
                var val = ui.color.toString();
                $('head').append('<style>.widget-menu-sobex-input-list li label:hover {background: '+val+' !important;}</style>');
            } 
        });

		$('.widget-menu-sobex-close-content i').css('color', $('#st-search-settings-h-close-icon-color').val());
		$('#st-search-settings-h-close-icon-color').wpColorPicker({
			change: function(event, ui){
				var val = ui.color.toString();
				$('.widget-menu-sobex-close-content i').css('color', val);
			} 
		});

		$('.widget-menu-sobex-close-content i').removeClass().addClass($(".st-search-settings-h-close-icon input[type='radio']:checked").val());
		$("body").on('change', '.st-search-settings-h-close-icon',function(){
			var val = $(".st-search-settings-h-close-icon input[type='radio']:checked").val();
			$('.widget-menu-sobex-close-content i').removeClass().addClass(val);
		});

		$('<style>.widget-menu-sobex-input-list::-webkit-scrollbar-thumb {background-color:'+$('#st-search-settings-h-drop-scrollbar-color').val()+' }</style>').appendTo('body');
		$('.scrollbar-header-menu').css('color', $('#st-search-settings-h-drop-scrollbar-color').val());
		$('#st-search-settings-h-drop-scrollbar-color').wpColorPicker({
			change: function(event, ui){
				var val = ui.color.toString();
				$('<style>.widget-menu-sobex-input-list::-webkit-scrollbar-thumb {background-color:'+val+' }</style>').appendTo('body');
				$('.scrollbar-header-menu').css('color', val);
			} 
		});

		$('.widget-header-table-button-container').css('background', $('#st-search-settings-h-drop-buttons-background-color').val());
		$('#st-search-settings-h-drop-buttons-background-color').wpColorPicker({
			change: function(event, ui){
				var val = ui.color.toString();
				$('.widget-header-table-button-container').css('background', val);
			} 
		});

		$('.widget-header-filter > i').removeClass().addClass($("#st-search-settings-h-drop-buttons-filter-icon").val());
		$("body").on('change', '#st-search-settings-h-drop-buttons-filter-icon',function(){
			var val = $("#st-search-settings-h-drop-buttons-filter-icon").val();
			$('.widget-header-filter > i').removeClass().addClass(val);
		});

		$('.widget-header-clear > i').removeClass().addClass($("#st-search-settings-h-drop-buttons-clear-icon").val());
		$("body").on('change', '#st-search-settings-h-drop-buttons-clear-icon',function(){
			var val = $("#st-search-settings-h-drop-buttons-clear-icon").val();
			$('.widget-header-clear > i').removeClass().addClass(val);
		});

		$('.widget-header-table-button-container i').css('color', $('#st-search-settings-h-drop-buttons-icons-color').val());
		$('#st-search-settings-h-drop-buttons-icons-color').wpColorPicker({
			change: function(event, ui){
				var val = ui.color.toString();
				$('.widget-header-table-button-container i').css('color', val);
			} 
		});

		$('.widget-menu-button-label').css('color', $('#st-search-settings-h-drop-buttons-title-color').val());
		$('#st-search-settings-h-drop-buttons-title-color').wpColorPicker({
			change: function(event, ui){
				var val = ui.color.toString();
				$('.widget-menu-button-label').css('color', val);
			} 
		});

		$('.widget-menu-sobex-group-title').css('font-size',$('#st-search-settings-h-header-font-size').val()+"px");
		$("body").on('change', '#st-search-settings-h-header-font-size',function(){
			var val = $('#st-search-settings-h-header-font-size').val();
			$('.widget-menu-sobex-group-title').css('font-size',val+"px");
		});

		$('.widget-menu-sobex-input-list span').css('font-size',$('#st-search-settings-h-content-font-size').val()+"px");
		$("body").on('change', '#st-search-settings-h-content-font-size',function(){
			var val = $('#st-search-settings-h-content-font-size').val();
			$('.widget-menu-sobex-input-list span').css('font-size',val+"px");
		});

		$('span.widget-menu-button-label').css('font-size',$('#st-search-settings-h-header-buttons-font-size').val()+"px");
		$("body").on('change', '#st-search-settings-h-header-buttons-font-size',function(){
			var val = $('#st-search-settings-h-header-buttons-font-size').val();
			$('span.widget-menu-button-label').css('font-size',val+"px");
		});

		$('.widget-menu-sobex-groups').css('background-color', $('#st-search-settings-h-hide-header-container-background-color option:selected').val());
		$("body").on('change', '#st-search-settings-h-hide-header-container-background-color',function(){
			var val = $('#st-search-settings-h-hide-header-container-background-color option:selected').val();
			$('.widget-menu-sobex-groups').css('background-color', val);
		});

		$('.widget-menu-sobex-groups').css('background-color', $('#st-search-settings-h-container-background-color').val());
		$('#st-search-settings-h-container-background-color').wpColorPicker({
			change: function(event, ui){
				var val = ui.color.toString();
				$('.widget-menu-sobex-groups').css('background-color', val);
			} 
		});

		$('head').append('<style>.sobex-widget-header-arrow-arrow-top:before {border-bottom: 8px solid '+$('#st-search-settings-h-show-contents-background-color').val()+' !important;}</style>');
		$('.sobex-widget-header-arrow').css('background-color', $('#st-search-settings-h-show-contents-background-color').val());
		$('#st-search-settings-h-show-contents-background-color').wpColorPicker({
			change: function(event, ui){
				var val = ui.color.toString();
				$('.sobex-widget-header-arrow').css('background-color', val);
				$('head').append('<style>.sobex-widget-header-arrow-arrow-top:before {border-bottom: 8px solid '+$('#st-search-settings-h-show-contents-background-color').val()+' !important;}</style>');
			} 
		});

		$('.sobex-widget-header-arrow').css('color', $('#st-search-settings-h-show-contents-title-color').val());
		$('#st-search-settings-h-show-contents-title-color').wpColorPicker({
			change: function(event, ui){
				var val = ui.color.toString();
				$('.sobex-widget-header-arrow').css('color', val);
			} 
		});

});
(function($){ 
	var val = null;
	

	if($('#st-search-menu-display-shadow').find('option:selected').val() == 'off'){
		$('head').append('<style>.sobex-menu-slide-main-container {box-shadow: unset !important;-webkit-box-shadow: unset !important;-moz-box-shadow: unset !important;}</style>');
	}



	if($('#st-search-menu-display-shadow').find('option:selected').val() === 'off') {
		$('.hide-menu-shadow').hide();
	}else if($('#st-search-menu-display-shadow').find('option:selected').val() === 'on') {
		$('.hide-menu-shadow').show();
	}
	$('#st-search-menu-display-shadow').change(function() {
		var val = $('#st-search-menu-display-shadow').find('option:selected').val();
		if(val === 'off') {
			$('.hide-menu-shadow').hide();
		}else if(val === 'on') {
			$('.hide-menu-shadow').show();
		}
	});

	// hide sidebar background color


		if($('#st-search-settings-hide-sidebar-container-background-color').find('option:selected').val() == 'show') {
			$('.hide-st-search-settings-sidebar-container-background-color').show();
			$('.widget-sobex-main-container').css('background-color', $('#st-search-settings-sidebar-container-background-color').val());
		}else {
			$('.hide-st-search-settings-sidebar-container-background-color').hide();
			$('.widget-sobex-main-container').css('background-color', 'unset');
		}
		$('#st-search-settings-hide-sidebar-container-background-color').change(function() {
			val = $('#st-search-settings-hide-sidebar-container-background-color').find('option:selected').val();
			if(val == 'show') {
				$('.hide-st-search-settings-sidebar-container-background-color').show();
				$('.widget-sobex-main-container').css('background-color', $('#st-search-settings-sidebar-container-background-color').val());
			}else {
				$('.hide-st-search-settings-sidebar-container-background-color').hide();
				$('.widget-sobex-main-container').css('background-color', 'unset');
			}
		});



	// hide header background color
	if($('#st-search-settings-h-hide-header-container-background-color').find('option:selected').val() === 'show') {
		$('.hide-st-search-settings-h-container-background-color').show();
	}else{
		$('.hide-st-search-settings-h-container-background-color').hide();
	}
	$('#st-search-settings-h-hide-header-container-background-color').change(function() {
		val = $('#st-search-settings-h-hide-header-container-background-color').find('option:selected').val();
		if(val == 'show') {
			$('.hide-st-search-settings-h-container-background-color').show();
		}else{
			$('.hide-st-search-settings-h-container-background-color').hide();
		}
	});
})(jQuery); 