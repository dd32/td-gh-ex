jQuery(document).ready(function() {

// Menu animation

jQuery("#access ul ul").css({display: "none"}); // Opera Fix

jQuery("#access li").hover(function(){
	jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).show(250);
	},function(){
	jQuery(this).find('ul:first').css({visibility: "hidden"});
								});
// Social Icons Animation

jQuery(".socialicons").hover(
function(){
	jQuery(this).animate({"top": "-5px" },{ queue: false, duration:200});
/*	 jQuery(this).css({
                        '-webkit-transform': 'rotate(5deg)',
                        '-moz-transform': 'rotate(5deg)',
                        '-ms-transform': 'rotate(5deg)',
                        '-o-transform': 'rotate(5deg)',
                        'transform': 'rotate(5deg)',
                        'zoom': 1
            });*/

					},
function(){
	jQuery(this).animate({ "top": "0px" }, { queue: false, duration:200 });
/* jQuery(this).css({
                        '-webkit-transform': 'rotate(0deg)',
                        '-moz-transform': 'rotate(0deg)',
                        '-ms-transform': 'rotate(0deg)',
                        '-o-transform': 'rotate(0deg)',
                        'transform': 'rotate(0deg)',
                        'zoom': 1
            });*/

					});

/*! http://tinynav.viljamis.com v1.03 by @viljamis */
(function ($, window, i) {
  $.fn.tinyNav = function (options) {

    // Default settings
    var settings = $.extend({
      'active' : 'selected', // String: Set the "active" class
      'header' : false // Boolean: Show header instead of the active item
    }, options);

    return this.each(function () {

      // Used for namespacing
      i++;

      var $nav = $(this),
        // Namespacing
        namespace = 'tinynav',
        namespace_i = namespace + i,
        l_namespace_i = '.l_' + namespace_i,
        $select = $('<select/>').addClass(namespace + ' ' + namespace_i);

      if ($nav.is('ul,ol')) {

        if (settings.header) {
          $select.append(
            $('<option/>').text('Navigation')
          );
        }

        // Build options
        var options = '';
		var indent = 0;
		var indented = ["&nbsp;"];
		for ( var i = 0; i < 10; i++) {
			indented.push(indented[indented.length-1]+indented[indented.length-1]);
		}
		indented[0] = "";
        $nav
          .addClass('l_' + namespace_i)
          .children('li')
          .each(buildNavTree=function () {
            var a = $(this).children('a').first();
            
            options +=
              '<option value="' + a.attr('href') + '">' +
              indented[indent] + a.text() +
              '</option>';
              indent++;
              $(this).children('ul,ol').children('li').each(buildNavTree);
              indent--;
          });

        // Append options into a select
        $select.append(options);

        // Select the active item
        if (!settings.header) {
          $select
            .find(':eq(' + $(l_namespace_i + ' li')
            .index($(l_namespace_i + ' li.' + settings.active)) + ')')
            .attr('selected', true);
        }

        // Change window location
        $select.change(function () {
          window.location.href = $(this).val();
        });

        // Inject select
        $(l_namespace_i).after($select);

      }

	$('option[value="'+document.location+'"]').attr("selected","selected");

    });

  };
})(jQuery, this, 0);





}); // ready 

