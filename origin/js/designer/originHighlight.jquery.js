// Highlight an element
(function($){
    $.fn.originHighlight = function(options){
        var basicCss = {
            'position' : 'absolute',
            'opacity' : 0.55,
            'background' : 'green',
            'z-index' : 9999
        };

        options = $.extend({
            'class' : 'origin-highlight'
        }, options);

        return this.each(function(){
            var $$ = $(this);
            if(!$$.is(':visible')) return;

            var offset = $$.offset();

            var css = [];
            // Top
            css.push({
                'height' : 4,
                'width' : $$.outerWidth() + 10,
                'left' : offset.left - 5,
                'top' : offset.top - 5,
                'box-shadow' : '0px 2px 1px rgba(0,0,0,0.3)'
            });

            // Bottom
            css.push({
                'height' : 4,
                'width' : $$.outerWidth() + 10,
                'left' : offset.left - 5,
                'top' : offset.top + $$.outerHeight() + 1,
                'box-shadow' : '0px -2px 1px rgba(0,0,0,0.3)'
            });

            // Left
            css.push({
                'height' : $$.outerHeight()+ 2,
                'width' : 4,
                'left' : offset.left - 5,
                'top' : offset.top - 1,
                'box-shadow' : '2px 0px 1px rgba(0,0,0,0.3)'
            });

            // Right
            css.push({
                'height' : $$.outerHeight()+ 2,
                'width' : 4,
                'left' : offset.left + $$.outerWidth() + 1,
                'top' : offset.top - 1,
                'box-shadow' : '-2px 0px 1px rgba(0,0,0,0.3)'
            });
            
            var highlights = [];
            // Create the highlights
            for(var i = 0; i < css.length; i++){
                highlights.push(
                    $('<div></div>')
                        .addClass(options['class'])
                        .css(basicCss)
                        .css(css[i])
                        .appendTo($$.closest('body'))
                );
            }
            
            $$.data('highlights', highlights);
        })
    };

    $.fn.originUnhighlight = function(){
        return this.each(function(){
            var $$ = $(this);
            var hl = $$.data('highlights');
            
            if(hl == undefined || hl == null) return;
            
            for(var i = 0; i < hl.length; i++){
                hl[i].remove();
            }

            $$.data('highlights', null);
        });
    };
})(jQuery);