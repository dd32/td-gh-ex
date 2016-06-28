jQuery(document).on( 'ready widget-updated widget-added', function()  {
    jQuery(".bellini-widget__accordion h4").click(function () {
        jQuery(this).next(".bellini-widget__panel").slideToggle("slow").siblings(".bellini-widget__panel:visible").slideUp("slow");
        jQuery(this).toggleClass("current");
        jQuery(this).siblings("h4").removeClass("current");
    });
  });