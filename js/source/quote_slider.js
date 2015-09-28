//script to fade in and out the testimonials

$(document).ready(function() {
    (function() {
        var infiniteLoop;
                var InfiniteRotator = {
            init: function(slide) {
                //initial fade-in time (in milliseconds)
                var initialFadeIn = 1000;
                //interval between items (in milliseconds)
                var itemInterval = 10000;
                //cross-fade time (in milliseconds)
                var fadeTime = 2500;
                //count number of items
                var numberOfItems = $('.quotes').length;
                //set current item
                var currentItem = slide;

                if (slide === -1) {
                    createPagination(numberOfItems);
                    currentItem = 0;
                }

                //hide all items and then show first item
                $('.quotes').animate({
                    opacity: 0
                }, 0).removeClass('showing');
                $('.quotes').eq(currentItem).animate({
                    opacity: 1.0
                }, 1000).addClass('showing');
                $('.next-prev li').eq(currentItem).addClass('active');
                //loop through the items
                infiniteLoop = setInterval(function() {
                    if ($('.testimonials').hasClass('stop')) {
                        return
                    } //pause

                    $('.quotes').eq(currentItem).animate({
                        opacity: 0.0
                    }, fadeTime).removeClass('showing');
                    if (currentItem == numberOfItems - 1) {
                        currentItem = 0;
                    } else {
                        currentItem++;
                    }
                    $('.quotes').eq(currentItem).animate({
                        opacity: 1.0
                    }, fadeTime).addClass('showing');

                    $('.next-prev li').removeClass('active');
                    $('.next-prev li').eq(currentItem).addClass('active');

                }, itemInterval);

            }
        };
        InfiniteRotator.init(-1);
        // when pagination clicked  
        $(".testimonials").on("click", ".next-prev li", function() {
            clearInterval(infiniteLoop);
            $('.next-prev li').removeClass('active');
            InfiniteRotator.init($(this).index());
        });
        
                 $(".quotes").on("mouseenter touchstart", function() {
                        $('.testimonials').addClass('stop')
            });
                    $(".quotes").on("mouseleave touchend", function() {
                        $('.testimonials').removeClass('stop')
            });
                
        function createPagination(numberOfItems) {
            var lists = "";
            var pagination = "";
            for (i = 0; i < numberOfItems; i++) {
                lists = lists + ("<li title='next'>" + (i + 1) + "</li>")
            }
            pagination = "<ul class='next-prev'>" + lists + "</ul>";
            $(".quote-wrapper").after(pagination);
        }
    }());
});