//---------------------------------------> SETTING PAGE <--------------------------------\\
jQuery(document).ready(function($) {
    // @ IF user switch admin dashbaord language
    jQuery(document).on("change", ".sobex-tech-languages-switcher-container", function (event) {
        event.preventDefault();
        $(".submit input").click();
    });

    // @ IF user changed model search -> Show Another Setting
    if ($("#st-search-search-model").val() === "classic_model") {
        $(".st-search-filter-widget_buttons-container").show();
    } else {
        $(".st-search-filter-widget_buttons-container").hide();
    }
    $("body").on("change", "#st-search-search-model", function () {
        var value = $(this).val();
        if (value === "classic_model") {
            $(".st-search-filter-widget_buttons-container").show();
        } else {
            $(".st-search-filter-widget_buttons-container").hide();
        }
    });

    // @ IF user changed APi Security -> Show Another Setting
    if ($("#st-search-rest-api-security").val() === "on") {
        $(".st-search-rest-api-security-timeout-hide").show();
    } else {
        $(".st-search-rest-api-security-timeout-hide").hide();
    }
    $("body").on("change", "#st-search-rest-api-security", function () {
        var value = $(this).val();
        if (value === "on") {
            $(".st-search-rest-api-security-timeout-hide").show();
        } else {
            $(".st-search-rest-api-security-timeout-hide").hide();
        }
    });
});
//---------------------------------------> WIDGET SETTING PAGE <--------------------------------\\
jQuery(document).ready(function($) {
    //@ IF user open tags list
    $(".stsearch-select-product-tags").click(function () {
        $("#sobex-product-tag-custom-check-container").insertAfter(".stsearch-select-product-tags");
        $("#sobex-product-tag-custom-check-container").show();
    }); // CLOSE
    $(".sobex-product-tag-custom-check-close i").click(function () {
        $("#sobex-product-tag-custom-check-container").hide();
    });

    //@ IF user open default woocommerce filter list
    $(".stsearch-select-woocommerce-filter-list").click(function () {
        $("#sobex-woocommerce-filter-list-custom-check-container").insertAfter(".stsearch-select-woocommerce-filter-list");
        $("#sobex-woocommerce-filter-list-custom-check-container").show();
    }); // CLOSE
    $(".sobex-woocommerce-filter-list-custom-check-close i").click(function () {
        $("#sobex-woocommerce-filter-list-custom-check-container").hide();
    });
});
//---------------------------------------> STYLE PAGE <--------------------------------\\
jQuery(document).ready(function($){
    /**
     * @ Start Slide UP & Down Function For Header
     **/
    jQuery(document).on('click', '.widget-menu-sobex-group', function(e) {

        // Elements
        var current_group = $(this);
        var current_drop = $(current_group).find('.widget-menu-sobex-group-drop');
        var all_groups = $('.widget-menu-sobex-group');
        var all_drops = $('.widget-menu-sobex-group-drop');

        var slide_down = $('.widget-menu-sobex-group-drop-slide-down');
        var current_slide_down = $(current_group).find(slide_down);
        var slide_up = $('.widget-menu-sobex-group-drop-slide-up');
        var current_slide_up = $(current_group).find(slide_up);

        e.stopPropagation();

        $('.widget-menu-sobex-group-drop', this).toggle(); // Toggel Current Group
        $(current_slide_down).toggle();
        $(current_slide_up).toggle();
        /* If user clicked another group the current group will close automaticly */
        $('.widget-menu-sobex-group').not(current_group).on('click', function(e) {
            $(current_drop, this).slideUp();
            $(current_slide_up, this).hide();
            $(current_slide_down, this).show();


        });
    });

    // @ IF user use select menu icons for menu
    $( '.sobex-widget-menu-slide-icon-details-choice-icon' ).click(function() {
        $('.sobex-icons-accordion-main-container').show();
            // TO MOVE UP AND DOWN
        $(window).scroll(function(){
                if($(window).scrollTop() >= 120){
                    $('.sobex-icons-accordion-main-container').css('top', '-120px');
                }else if($(window).scrollTop() === 160){
                    $('.sobex-icons-accordion-main-container').css('top', '-60x');
                }else if($(window).scrollTop() === 0){
                    $('.sobex-icons-accordion-main-container').css('top', '68px');
                }
            $(".sobex-icons-accordion-main-container").stop().animate({"marginTop": ($(window).scrollTop()) + "px", "marginLeft":($(window).scrollLeft()) + "px", "left": "33px"}, "slow" );

        });
        the_menu_current_icon =  $(this).attr('id');
        var name = $('#currentname'+the_menu_current_icon).text();
        $(".sobex-select-icon-for").empty();
        // "<?php echo esc_html_e('Select Icon For','sobex-tech');?>"+" "+
        $('.sobex-select-icon-for').append(name);
        $('.sobex-icons-box-content input').on('change', function() {
            
    
            
                $('.sobex-icons-box-content input').on('change', function() {
            if(the_menu_current_icon == 'selected_icon_child') {
        
                const value = $(this).val();
                var icon_value = $("input[type='radio'][name='menu_icons']:checked").val();

                $('[id=currentchild]').removeClass().addClass(value);

                $( '#sobex-icons-accordion-close-icons-accordion' ).click(function() {
        
                    $('.sobex-icons-accordion-main-container').hide();
                    $('input[name="menu_icons"]').prop('checked', false)
                });
            }else if(the_menu_current_icon == the_menu_current_icon ){
                const value = $(this).val();
                var icon_value = $("input[type='radio'][name='menu_icons']:checked").val();

                $('#current'+the_menu_current_icon).removeClass();
                
                $('#current'+the_menu_current_icon).addClass(value);

            }
        });
        
            });

            $( '#sobex-icons-accordion-close-icons-accordion' ).click(function() {
    
                $('.sobex-icons-accordion-main-container').hide();
                $('input[name="menu_icons"]').prop('checked', false)
            });
    });

    // SLIDE DOWN AND UP FOR accordian menu icons
    $(window).scroll(function(){
        if($(window).scrollTop() >= 120){
            $('.sobex-icons-widget-accordion-main-container').css('top', '40px');
        }else if($(window).scrollTop() === 160){
            $('.sobex-icons-widget-accordion-main-container').css('top', '60x');
        }else if($(window).scrollTop() === 0){
            $('.sobex-icons-widget-accordion-main-container').css('top', '360px');
        }
            $(".sobex-icons-widget-accordion-main-container").stop().animate({"marginTop": ($(window).scrollTop()) + "px", "marginLeft":($(window).scrollLeft()) + "px", "left": "40%"}, "slow" );

    });

    // @ IF user use select menu icons for SIDEBAR OR HEADER
    $( '.sobex-widget-menu-icon-details-choice-icon' ).click(function() {

        $('.sobex-icons-widget-accordion-main-container').show();
        var selected = $(this).attr('id');
        var current_selected = selected.slice(0,-7)

        $(".sobex-select-icon-for").empty();
        // $('.sobex-select-icon-for').append("<?php echo esc_html_e('Select Icon','sobex-tech');?>");

        $('.sobex-icons-box-content input').on('change', function() {
            const value = $(this).val();
            $( "input#"+current_selected ).val(value).trigger('change');
        });

        $( '#sobex-icons-widget-accordion-close-icons-accordion' ).click(function() {
            current_selected = null;
            $( '.sobex-icons-widget-accordion-main-container' ).hide();
            $( '.sobex-icons-widget-accordion-main-container' ).trigger('reset');
            $('input[name="menu_icons"]').prop('checked', false)
        });
    });
    
});

/**
 * @ Create new inputs for delete (CSS CUSTOMIZATION)
 **/
jQuery(document).ready(function($){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.sobex_clear_shop_add_button'); //Add button selector
    var wrapper = $('.sobex-tech-field-wrapper'); //Input field wrapper
    var fieldHTML = '<div class="sobex-tech-field-inputs"><input type="text" name="stsearch_style_opts[sobex_css_clear_shop_page][]"/><a href="javascript:void(0);" class="sobex_clear_shop_remove_button"> <i class="sobex-tech-minus"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    jQuery(document).on('click', '.sobex_clear_shop_add_button', function(e) {

        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
 
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.sobex_clear_shop_remove_button', function(e){
        e.preventDefault();
        $(this).parent('.sobex-tech-field-inputs').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

jQuery(document).ready(function($) {

    // @ IF user use swatch mode one part or many (Header)
    $('#separted-header').hide();
    $('body').on('click','.st-search-style-mode-header-switch-container',function (){
            if($('.st-search-style-mode-header-switch-container input').filter(":checked").val() === 'all'){
                $("#all-header").show();
                $("#separted-header").hide();
            }else if($('.st-search-style-mode-header-switch-container input').filter(":checked").val() == 'separted'){
                $("#all-header").hide();
                $("#separted-header").show();
            }
    });

        // @ IF user use swatch mode one part or many (Sidebar)
    $('#separted-sidebar').hide();
    $('body').on('click','.st-search-style-mode-switch-container',function (){
            if($('.st-search-style-mode-switch-container input').filter(":checked").val() === 'all'){
                $("#all-sidebar").show();
                $("#separted-sidebar").hide();
            }else if($('.st-search-style-mode-switch-container input').filter(":checked").val() == 'separted'){
                $("#all-sidebar").hide();
                $("#separted-sidebar").show();
            }
    });
    
    // @ For Widget Sidebar
    var $content_checkbox = $(".content_checkbox").show();
    $(".content_click_checkbox").on("click", function() {
        if($('.sobex-show-table',this).hasClass("widget-sobex-hidden-table")){
            $('.sobex-show-table',this).removeClass('widget-sobex-hidden-table');
            $('.sobex-hide-table',this).addClass('widget-sobex-hidden-table');
        }else{
            $('.sobex-show-table',this).addClass('widget-sobex-hidden-table');
            $('.sobex-hide-table',this).removeClass('widget-sobex-hidden-table');
        }
        $content_checkbox.slideToggle();
    });

    // @ SLIDE UP AND DOWN For Widget sidebar & header 
    $(window).scroll(function(){
        if($(window).scrollTop() >= 120){
            $('.widget-now').css('top', '-120px');
        }else if($(window).scrollTop() === 160){
            $('.widget-now').css('top', '-150px');
        }else if($(window).scrollTop() === 0){
            $('.widget-now').css('top', '0');
        }
        $(".widget-now").stop().animate({"marginTop": ($(window).scrollTop()) + "px", "marginLeft":($(window).scrollLeft()) + "px"}, "slow" );

    });

    // @ IF user switch level of child tree
    jQuery(document).on("change", "#st-search-menu-level-child-icon", function (event) {
        event.preventDefault();
        $('.st-search-menu-level-child-icon-selected-msg').show();
        $(".submit input").click();
    });

});
