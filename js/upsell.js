/**
 * Upsell notice for theme
 */
( function( $ ) {
 // Add Upgrade Message
 if ('undefined' !== typeof prefixL10n) {
 upsell = $('<a class="prefix-upsell-link"></a>')
 .attr('href', prefixL10n.prefixURL)
 .attr('target', '_blank')
 .text(prefixL10n.prefixLabel)
 .css({
 'display' : 'inline-block',
 'background-color' : '#D03232',
 'color' : '#fff',
 'text-transform' : 'uppercase',
 'margin-top' : '6px',
 'padding' : '3px 6px',
 'font-size': '14px',
 'letter-spacing': '1px',
 'line-height': '1.5',
 'clear' : 'both'
 })
 ;
 setTimeout(function () {
 $('#customize-info .accordion-section-title	').append(upsell);
 }, 200);
 // Remove accordion click event
 $('.prefix-upsell-link').on('click', function(e) {
 e.stopPropagation();
 });
 }
} )( jQuery );






