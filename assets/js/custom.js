jQuery(document).ready(function ($) {
    "use strict";
    $('body').on('click keypress','.browse-category-wrap', function(){
    	$(this).toggleClass('active');
    });

    
    /**
    * YITH Wishlist header counter
    */
    var arrival_store_update_wishlist_count = function() {
        $.ajax({
            beforeSend: function () {

            },
            complete  : function () {

            },
            data      : {
                action: 'arrival_store_update_wishlist_count'
            },
            success   : function (data) {
                $('.site-header .icons-wrapp .wishlist-counter').html(data);
            },

            url: yith_wcwl_l10n.ajax_url
        });
    };

    $('body').on( 'added_to_wishlist removed_from_wishlist', arrival_store_update_wishlist_count );


    /**
    * YITH Compate counter
    */
    $('body').on('click', 'a.compare', function (e) {
    e.preventDefault();
    var compare = false;

    if ($(this).hasClass('added')) {
      compare = true;
    } else if ($(this).closest('.footer-product-button').hasClass('compare-added')) {
      compare = true;
    }

    if (compare === false) {
      var compare_counter = $('.site-header').find('#fs-compare-count').html();
      compare_counter = parseInt(compare_counter, 10) + 1;

      setTimeout(function () {
        $('.site-header').find('#fs-compare-count').html(compare_counter);
      }, 2000);

    }
  });


});