jQuery(document).ready(function($) {
    "use strict";var ids, values = [], section, sections = [];
    $('#sub-accordion-panel-accesspress_root_homepage .control-section').each( function(){
        $( this ).append('<i class="dashicons dashicons-move section-drag"></i>');
    });
    
  /**
  * Section Reorder
  *
  */
  function accesspress_root_sections_order( container ){

    var sections_list = $('#sub-accordion-panel-accesspress_root_homepage').sortable('toArray');
    var s_ordered = [];
    var i = 0;
    $.each(sections_list, function( index, s_id ) {
        i++;
        s_id = s_id.replace( "accordion-section-accesspress_root_", "");
        s_ordered.push( s_id );
    });
    $.ajax({
        url: ApAdminObj.ajax_url,
        type: 'post',
        dataType: 'html',
        data: {
            'action': 'accesspress_root_order_sections',
            'sections': s_ordered,
        }
    })
    .done( function( data ) {
      wp.customize.previewer.refresh();
    });
  }

 

  $('#sub-accordion-panel-accesspress_root_homepage').sortable({
    helper: 'clone',
    items: '> li.control-section',
    cancel: 'li.ui-sortable-handle.open',
    delay: 150,
    cursor: 'move',
    axis: 'y',
    update: function( event, ui ) {

      accesspress_root_sections_order( $('#sub-accordion-panel-accesspress_root_homepage') );

    },

  });
});