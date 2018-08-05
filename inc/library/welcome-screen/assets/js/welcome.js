jQuery( document ).ready( function() {

  /* If there are required actions, add an icon with the number of required actions in the About beenews page -> Actions required tab */
  var beenews_nr_actions_required = beenewsWelcomeScreenObject.nr_actions_required,
      context = jQuery( '.widget-content' ),
      sliders = context.find( '.slider-container' ),
      slider, input, inputId, id, min, max, step;

  if ( (typeof beenews_nr_actions_required !== 'undefined') && (beenews_nr_actions_required != '0') ) {
    jQuery( 'li.beenews-w-red-tab a' ).append( '<span class="beenews-actions-count">' + beenews_nr_actions_required + '</span>' );
  }

  /* Dismiss required actions */
  jQuery( '.beenews-required-action-button' ).click( function() {

    var id = jQuery( this ).attr( 'id' ),
        action = jQuery( this ).attr( 'data-action' );
    jQuery.ajax( {
      type: 'GET',
      data: { action: 'beenews_dismiss_required_action', id: id, todo: action },
      dataType: 'html',
      url: beenewsWelcomeScreenObject.ajaxurl,
      beforeSend: function( data, settings ) {
        jQuery( '.beenews-tab-pane#actions_required h1' ).
            append( '<div id="temp_load" style="text-align:center"><img src=' + beenewsWelcomeScreenObject.template_directory +
                '"//inc/library/welcome-screen/img/ajax-loader.gif" /></div>' );
      },
      success: function( data ) {
        location.reload();
        jQuery( '#temp_load' ).remove();
        /* Remove loading gif */
      },
      error: function( jqXHR, textStatus, errorThrown ) {
        console.log( jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown );
      }
    } );
  } );

  function beenews_rangesliders_init() {
    jQuery.each( sliders, function() {
      var slider = jQuery( this ).find( '.ss-slider' ),
          input = jQuery( this ).find( '.rl-slider' ),
          inputId = input.attr( 'id' ),
          id = slider.attr( 'id' ),
          min = jQuery( '#' + id ).attr( 'data-attr-min' ),
          max = jQuery( '#' + id ).attr( 'data-attr-max' ),
          step = jQuery( '#' + id ).attr( 'data-attr-step' );

      jQuery( '#' + id ).slider( {
        value: jQuery( '#' + inputId ).attr( 'value' ),
        range: 'min',
        min: parseFloat( min ),
        max: parseFloat( max ),
        step: parseFloat( step ),
        /**
         * Removed Change event because server was flooded with requests from
         * javascript, sending changesets on each increment.
         *
         * @param event
         * @param ui
         */
        slide: function( event, ui ) {
          jQuery( '#' + inputId ).attr( 'value', ui.value );
        },
        /**
         * Bind the change event to the "actual" stop
         * @param event
         * @param ui
         */
        stop: function( event, ui ) {
          jQuery( '#' + inputId ).trigger( 'change' );
        }
      } );

      jQuery( input ).on( 'focus', function() {
        jQuery( this ).blur();
      } );

      jQuery( '#' + inputId ).attr( 'value', ( jQuery( '#' + id ).slider( 'value' ) ) );
      jQuery( '#' + inputId ).on( 'change', function() {
        jQuery( '#' + id ).slider( {
          value: jQuery( this ).val()
        } );
      } );
    } );
  };
  beenews_rangesliders_init();
  jQuery( document ).ajaxStop( function() {
    beenews_rangesliders_init();
  } );
} );