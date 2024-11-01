if (typeof $ == 'undefined') {
	var $ = jQuery;
}
$(document).ready(function() {
    /**
    * @ Start Filter Widget Function
    * @ To send Data when user enter page with filter link
    **/
    function sobex_tech_widget_filter_on_load() {

        var link = window.location +'';
        
        var data = link.split("#");  
            
        var widget_type = data[1]?.split("&")[0];

        if(widget_type == 'filter') { 
            var form_data = window.location.hash.substr(1);
            widget_form_data_ajax(form_data);
        }

    }
    sobex_tech_widget_filter_on_load();
});