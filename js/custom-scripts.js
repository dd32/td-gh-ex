jQuery(document).ready(function(o){"use strict";o(".jarallax").jarallax({speed:.2}),o(".scroll-top-top").hide();o(window).scroll(function(){o(this).scrollTop()>250?o(".scroll-top-top").fadeIn(300):o(".scroll-top-top").fadeOut(300)}),o("body").on("click",".scroll-top-top",function(r){return r.preventDefault(),o("html, body").animate({scrollTop:0},300),!1});o("body").on("click",".header-last-item.search-wrap",function(){o(".arrival-search-form-wrapp").addClass("active")}),o(document).on("click",".arrival-search-form-wrapp .close",function(){o(".arrival-search-form-wrapp").removeClass("active")})});