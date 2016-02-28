/**
 * Upsell notice for theme
 */
( function( $ ) {
 // Add Upgrade Message
 if ('undefined' !== typeof prefixL11n) {
 upsell2 = $('<a class="prefix-upsell-link2"></a>')
 .attr('href', prefixL11n.prefixURL2)
 .attr('target', '_blank')
 .text(prefixL11n.prefixLabel2)
 .css({
 'display' : 'inline-block',
 'color' : 'rgb(84, 84, 84)',
 'text-transform' : 'uppercase',
 'margin-top' : '6px',
 'margin-bottom' : '6px',
 'padding' : '6px 6px',
 'font-size': '14px',
 'letter-spacing': '1px',
 'line-height': '1.5',
 'clear' : 'both',
 'width' : '100%',
 'text-align' : 'center',
 'border' : '1px solid #D03232'
 
 
 })
 ;
 setTimeout(function () {
 $('#customize-info 	').append(upsell2);
 }, 200);
 // Remove accordion click event
 $('.prefix-upsell-link2').on('click', function(e) {
 e.stopPropagation();
 });
 }
} )( jQuery );


