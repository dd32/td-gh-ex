jQuery(document).ready(function(a){"use-strict";var e,s;a(".mobile-nav-container"),s=a("a.mobile-trigger");var t=a("#header");e=t.offset().top;s.sidr({name:"sidr-mobile",source:"#main-navigation",displace:!1}),a(".sameHeightDiv").matchHeight(),a(window).scroll(function(){t.hasClass("sticky-header")&&(a(window).scrollTop()>e?(t.addClass("justwp-sticky box-shadow-bottom"),t.hasClass("transparent-header")&&(t.removeClass("transparent-header"),t.addClass("no-transparent-header"))):(t.removeClass("justwp-sticky box-shadow-bottom"),t.hasClass("no-transparent-header")&&(t.removeClass("no-transparent-header"),t.addClass("transparent-header"))))})});