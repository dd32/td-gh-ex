(function(b,f,g,h){b.fn.doubleTapToGo=function(h){if(!("ontouchstart"in f||navigator.msMaxTouchPoints||navigator.userAgent.toLowerCase().match(/windows phone os 7/i)))return!1;this.each(function(){var d=!1;b(this).on("click",function(a){var c=b(this);c[0]!=d[0]&&(a.preventDefault(),d=c)});b(g).on("click touchstart MSPointerDown",function(a){var c=!0;a=b(a.target).parents();for(var e=0;e<a.length;e++)a[e]==d[0]&&(c=!1);c&&(d=!1)})});return this}})(jQuery,window,document);