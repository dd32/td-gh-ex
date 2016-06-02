jQuery(document).ready(function($) {
    var service_id = object_name.service_id;
    $('#bhumi_service_text').hide();
    $('#in-category-'+service_id).is(':checked') ? $('#bhumi_service_text').show() : $('#bhumi_service_text').hide();
    $('#in-category-'+service_id).click(function() {
        $('#bhumi_service_text').toggle(this.checked);
    });
    var slider_id = object_name.slider_id;
    $('#bhumi_slider_text').hide();
    $('#in-category-'+slider_id).is(':checked') ? $('#bhumi_slider_text').show() : $('#bhumi_slider_text').hide();
    $('#in-category-'+slider_id).click(function() {
        $('#bhumi_slider_text').toggle(this.checked);
    });
});