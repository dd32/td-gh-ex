
	/*
	 * Date : 2013.12.21
	 * Name : isnow
	 * About : The Javscript Animation width canyon.
	 */
	 
	 /*-- easeout --*/
	 ;(function($){

		(function($){

			if($.browser) return;
			
			$.browser = {};
			$.browser.mozilla = false;
			$.browser.webkit = false;
			$.browser.opera = false;
			$.browser.msie = false;
			
			var nAgt = navigator.userAgent;
			$.browser.name = navigator.appName;
			$.browser.fullVersion = ''+parseFloat(navigator.appVersion);
			$.browser.majorVersion = parseInt(navigator.appVersion,10);
			var nameOffset,verOffset,ix;
			
			// In Opera, the true version is after "Opera" or after "Version"
			if ((verOffset=nAgt.indexOf("Opera"))!=-1) {
				$.browser.opera = true;
				$.browser.name = "Opera";
				$.browser.fullVersion = nAgt.substring(verOffset+6);
			if ((verOffset=nAgt.indexOf("Version"))!=-1)
				$.browser.fullVersion = nAgt.substring(verOffset+8);
			}
			// In MSIE, the true version is after "MSIE" in userAgent
			else if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
				$.browser.msie = true;
				$.browser.name = "Microsoft Internet Explorer";
				$.browser.fullVersion = nAgt.substring(verOffset+5);
			}
			// In Chrome, the true version is after "Chrome"
			else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
				$.browser.webkit = true;
				$.browser.name = "Chrome";
				$.browser.fullVersion = nAgt.substring(verOffset+7);
			}
			// In Safari, the true version is after "Safari" or after "Version"
			else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
				$.browser.webkit = true;
				$.browser.name = "Safari";
				$.browser.fullVersion = nAgt.substring(verOffset+7);
			if ((verOffset=nAgt.indexOf("Version"))!=-1)
				$.browser.fullVersion = nAgt.substring(verOffset+8);
			}
			// In Firefox, the true version is after "Firefox"
			else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
				$.browser.mozilla = true;
				$.browser.name = "Firefox";
				$.browser.fullVersion = nAgt.substring(verOffset+8);
			}
			// In most other browsers, "name/version" is at the end of userAgent
			else if ( (nameOffset=nAgt.lastIndexOf(' ')+1) <
				(verOffset=nAgt.lastIndexOf('/')) )
			{
				$.browser.name = nAgt.substring(nameOffset,verOffset);
				$.browser.fullVersion = nAgt.substring(verOffset+1);
			if ($.browser.name.toLowerCase()==$.browser.name.toUpperCase()) {
				$.browser.name = navigator.appName;
			}
			}
			// trim the fullVersion string at semicolon/space if present
			if ((ix=$.browser.fullVersion.indexOf(";"))!=-1)
				$.browser.fullVersion=$.browser.fullVersion.substring(0,ix);
			if ((ix=$.browser.fullVersion.indexOf(" "))!=-1)
				$.browser.fullVersion=$.browser.fullVersion.substring(0,ix);
				$.browser.majorVersion = parseInt(''+$.browser.fullVersion,10);
			if (isNaN($.browser.majorVersion)) {
				$.browser.fullVersion = ''+parseFloat(navigator.appVersion);
				$.browser.majorVersion = parseInt(navigator.appVersion,10);
			}
			$.browser.version = $.browser.majorVersion;
		})($);

 		$.fn.extend({

 			"easeout" : function(obj,time,fn){
				var obj = obj,
						time = time || 500, 
						fn = fn, //callback
						o = this, 
						timer = null; 
					 											
				timer = setInterval(function(){
					var onoff = true; 
					for(attr in obj){
						
						var value; 
						if(attr == "opacity"){
							value = Math.round(o.css(attr) * 100);
						}else{
							value = parseInt(o.css(attr));
						}
						
						var speed = (attr == "opacity") ? (obj[attr] * 100 - value)/(time/50) : (obj[attr] - value)/(time/50);
						speed = speed > 0 ? Math.ceil(speed) : Math.floor(speed);
						
						if(value != obj[attr]){
							onoff = false;
						}
						if(attr == "opacity"){
							o.css( "opacity", (value + speed)/100 );
						}else{
							o.css( attr, (value + speed) + "px" );
						}

						if(onoff){
							clearInterval(timer);
							if(fn){ fn.call(o); }
						}
					}
				},60);
				return this;
			 },

			"hexagon" : function(options){
										
				var options = $.extend({
							o : $("[data-hexagon='item']",this),
							margin : 30 
						},options),
						_ = this,
						o = options.o, 
						m = options.margin, 
						sw = 189,
						sh = 217, 
						l = o.length, 
						p = _.css("position"); 
						
				$(window).bind("resize",function(){
					var w = _.width(),
						n = Math.floor(w/(sw + m)); 
					
					if($(window).width() < 1000){
						_.css({ height : "auto" })
						 .find(".i-case-wrap").css({ height : o.outerHeight(true) * 3 - parseInt(o.eq(0).css("margin-bottom")) });
						_.children("div").css({ width : "98%" });
						o.css({ "margin-left" : "1%", left : 0, top : 0 });
						return;
					}else{
						_.css({ height : Math.ceil((l + 1)/n) * sh +_.children(":eq(0)").outerHeight(true) + 100 });
						_.children("div").css({ width : n * sw + (n-1) * m });
					}
					

					
					if(p != "relative" && p != "absolute"){
						_.css({ "position" : "relative" });
					}
					
					o.each(function(i){
						$(this).css({ "z-index" : (l - i) });
						if(w < (sw + m) * 2){ return; }
						for(var k = 0; k < l/(n - 1);k++){
							o.slice((2 * n - 1) * k, (2 * n - 1) * k + (n - 1))
							 .each(function(i){
									$(this).css({ 
										top : 2 * k * sh,
										left : (sw + m) * i + sw/2,
										"margin-left" : m/2
									});
							 });
								
							o.slice((2 * n - 1) * k + (n - 1), (2 * n - 1) * (k + 1))
							  .each(function(i){
									 $(this).css({ 
									 	 top : (2 * k + 1) * sh,
									 	 left : (sw + m) * i,
									 	 "margin-left" : 0
									 });
							  });
						}
					});
				
				});
				return this;									
			},

	 		"mousewheel" : function(fn){
	 			
					var fn = fn || function(){ console.log("Please do something!") };
					

			 		var mousewheelevt = (/Firefox/i.test(navigator.userAgent)) ? "DOMMouseScroll" : "mousewheel";
			 		
			 		if(this[0].attachEvent){ 
			 			this[0].attachEvent("on" + mousewheelevt, handler, false);
			 		}else if(this[0].addEventListener){
			 			this[0].addEventListener(mousewheelevt, handler, false);
			 		}
			 		
			 		function handler(event){
			 			var	event = window.event || event, 

			 					delta = event.detail ? -event.detail/3 : event.wheelDelta/120;

							if(event.preventDefault){
								event.preventDefault();	
							}
							event.returnValue = false;
			 					return fn.apply(this[0], [event, delta]);
			 		}
			 		return this;
			 },

	 		"playscroll" : function(options){
				var _ = $.extend({
						 c : $("[data-scroll='item']"), 
						 b : $("[data-scroll='icon']"),
						 max : 3,
						 wheel : false,
						 time : 3000, 
						 maxWidth : 1000,
						 autoplay : false,
						 callback : function(){ /* Code your function */ } 
					 },options),
					 iThis = 0, o = this, c = _.c, b = _.b, time = _.time,
					 max = _.max, wheel = _.wheel, callback = _.callback,
					 autoplay = _.autoplay, timer = null, cw = c.outerWidth(true);
				
				this.css({ width : (c.length + 1) * cw });
				
				if($(window).width() < _.maxWidth){
					autoplay = false;
				}
				
				$(window).bind("resize",function(){
					if($(window).width() < _.maxWidth){
						autoplay = false;
					}else{
						autoplay = true;
					}
				});
				

				if(wheel && c.length > max){
				 this.mousewheel(function(e,delta){
				 		switch(delta){
				 			case -1 : Next();
				 								break;
				 			case 1 : Prev();
				 							 break;
				 		}
				 });
				}
				

				b.bind("click",function(){
					switch($(this).index()){
						case 0 : Prev();
										 break;
						case 1 : Next();
										 break;	
					}
				});
				

				function Prev(){
				 if(iThis == 0){ return; }
				 iThis --;
				 Animation();
				}
				

				function Next(){
				 if(iThis == (c.length - max)){ return; }
				 iThis ++;
				 Animation();	
				}
				

				if(autoplay && c.length > max){
					o.hover(function(){
						if(timer){ clearInterval(timer);	}
					},function(){
						timer = setInterval(function(){
							if(!autoplay){ 
								clearInterval(timer);
								timer = null;
								
							}
							o.animate({ left : -cw },500,function(){
								o.css({ left : 0 });
								o.children(":first-child").clone(true).appendTo(o);
								o.children(":first-child").remove();
							});
						},time);
					}).trigger("mouseleave");
				}
				

				function Animation(){
					o.stop().animate({ 
						left : -(iThis * c.outerWidth(true)) 
					},500);
					callback.apply(o,[c,iThis]);
				}
				
				return this;
			 }

 		});

		$.extend({
			
			"addCookie" : function(name,value,expireHours){
						var cookieStr = name + "=" + value;
						if(expireHours > 0){
							var date = new Date();
							date.setTime(date.getTime() + expireHours * 1000 * 60 * 60);
							cookieStr += "; expire=" + date.toGMTString();
						}
						document.cookie = cookieStr + "; path=/";
			},
			"getCookie" : function(name){
				var arr = document.cookie.split(";"),
						name = new RegExp("(^|\\s)" + name + "$");
				for(var i = 0; i < arr.length; i++){
					if(name.test(arr[i].split("=")[0])){
						return arr[i].split("=")[1];
					}
				}
			},
			"getCookieValue" : function(value){
				var arr = document.cookie.split(";"),
						value = new RegExp("^" + value + "(\\s|$)");
				for(var i = 0; i < arr.length; i++){
					if(value.test(arr[i].split("=")[1])){
						return arr[i].split("=")[0];
					}
				}
			}
		});

	 })($);
	 
	 $(function(){


 		(function nav(){
 			var c = $("#header"),
 					o = $(".nav:eq(1) > ul > li"),
 					b = $("#i-business"),
 					w = $(window),
 					minheight = 0,
 					iThis = 0;
 					
 			o.eq(0).css({ "text-indent" : 24 }).find("div").remove();
 			o.hover(function(){
 				$(this).children("a").addClass("current")
 							 .next().stop(false,true).fadeIn(500)
 							 .next().stop(false,true).fadeIn(500)
 							 .end().siblings().children("a").removeClass("current");
 			},function(){
 				$(this).children("a").removeClass("current")
 							 .next().stop(false,true).fadeOut(200)
 							 .next().stop(false,true).fadeOut(200);
 			});
 			
 			w.bind("scroll",function(){
 				if($(window).width() > 110){
 					o.children("a").next().hide().next().hide();
 				}
 				if($(window).width() < 1000){ return; }
			//minheight = $(".index").length > 0 ? (b.offset().top - 200) : 400;
 				minheight = $(".index").length > 0 ? (b.offset().top - 200) : 400;
 				if(w.scrollTop() > minheight){
 					if($(".header-fixed").length == 0){
 						c.clone(true).appendTo("body").addClass("header-fixed")
 						 .animate({ top : 0 });
 					}else{
 		
			 			$("body").find(".header-fixed").bind("mousedown",function(e){
			 				if(e.which == 3){
			 					$(".header-fixed").fadeOut(500);
			 				}
			 				$("body").find(".header-fixed").bind("contextmenu",function(e){
			 					return false;
			 				});
			 			});
 					}
 				}else{
 					$(".header-fixed").animate({ top : -70 },300,function(){
 						$(".header-fixed").remove();
 					});
 				}
 			});
 			
 		})();
 		

 		(function search(){
 			var o = $(".search"),
 					c = $(".search-select");
 			o.hover(function(){
 				$(this).children(":eq(1)").stop(false,true).fadeIn(500);
 			},function(){
 				$(this).children(":eq(1)").stop(false,true).fadeOut(500);	
 			});
 			c.children().bind("click",function(){
 				$(this).addClass("current").siblings().removeClass("current");
				$(".searchType").val($(this).attr('data-src'));
 			});
 		})();
 		

 		(function quik(){
 			var o = $("#quik ul"),
 					b = $("html, body"),
 					w = $(window),
 					timer = null,
 					of = true;
 					
 			o.children(":eq(2)").bind("click",function(){
 				b.animate({ scrollTop : 0 },500);
 			});
 			
 			w.bind("scroll",function(){
 				if(w.scrollTop() > 600 && of == true){
 					if(parseInt(o.parent().css("right")) == -50){
 						o.parent().animate({ right : 0 },300);	
 					}
 				}else if(w.scrollTop() <= 600){
 					of = true;
 					if(parseInt(o.parent().css("right")) == 0){
 						o.parent().animate({ right : -50 },300);
 					}
 				}
 			});
 			
 
 			o.bind("mousedown",function(e){
 				if(e.which == 3){
 					of = false;
 					o.parent().animate({ right : -50 },300);
 				}
 				o.bind("contextmenu",function(e){
 					return false;
 				});
 			});
 			
 			o.children().hover(function(){
 				var _ = $(this);
 				timer = setTimeout(function(){
				 					_.children("div").stop(false,true).fadeIn(300);	
				 				},300);
 			},function(){
 				clearTimeout(timer);
 				$(this).children("div").stop(false,true).fadeOut(300);
 			});
 			
 		})();
 		
		//Banner
		(function banner(){
			
			var l = $(".loading"), //Loading
				o = $(".i-banner-item"), //Banner list
				c = $(".i-banner-icon"), //
				sImage = $(".i-banner-case"), //
				w = $(window), //Window
				start = 0, //Load
				loader = null, //Load
				iThis = 0, 
				onoff = true, 
				time = 4000, 
				timer = null; 
			
			loader = setInterval(function(){
					start += 5;
					if(start > ($(window).width() * 0.95)){ clearInterval(loader); }
					l.children().css({ width : start });
			},60);
			
			o.each(function(i){
				var oImg = new Image();
					oImg.src = $(this).attr("data-src");
				if(oImg.width > 0){
					imageload(i);
				}else{
					oImg.onload = function(){ imageload(i); }
				}
			});
			

			function imageload(num){
				var _ = o.eq(num);
				_.append("<img src='" + _.attr("data-src") + "' title='" + _.find("h1").text() + "' alt='" + _.find("h1").text() + "' />");
				if(num == 0){ o.eq(0).children("img").fadeIn(500); }
				if(num == o.length - 1){
					l.remove();
					play();
				}
			}
			
		
			function play(){
			
			
				for(var k = 0;k < o.length; k++){
					c.append("<span></span>");
				}
				
	
				sImage.each(function(i){
					var oImg = new Image();
						oImg.src = $(this).find("img").attr("src");
						
					if(oImg.width > 0){
						$(this).css({ height : oImg.height, bottom : (380 - oImg.height) / 2 + 35 },500)
							   .find("img").css({ "margin-left" : - oImg.width / 2 });
					}else{
						oImg.onload = function(){
							$(this).css({ height : oImg.height, bottom : (380 - oImg.height) / 2 + 35 },500)
								   .find("img").css({ "margin-left" : - oImg.width / 2 });
						}
					}
					
				});
				
	
				animation();
				o.eq(0).css("z-index",2);
				c.hover(function(){
					clearInterval(timer);
				},function(){
					timer = setInterval(function(){
						iThis ++;
						if(iThis == o.length){ iThis = 0; }
						animation();
						o.eq(iThis).css("z-index",2).siblings(".i-banner-item").css("z-index",0);
					},time);
				}).trigger("mouseleave");
				
		
				c.children().bind("click",function(){
					iThis = $(this).index();
					animation();
					o.eq(iThis).css("z-index",2).siblings(".i-banner-item").css("z-index",0);
				}).eq(0).addClass("current");
				
			}
			
		
			function animation(){
				

				if(!onoff){ return; }
				onoff = false;
				setTimeout(function(){ onoff = true },1000);
				
				c.children().eq(iThis).addClass("current")
				 .siblings().removeClass("current");
				 

				o.eq(iThis).children("img").fadeIn(500,function(){
				
					$(this).prev().find(".i-banner-info")
						   .css({ top : 80, opacity : 0 })
						   .delay(800).animate({ top : 105, opacity : 1 },500);
					$(this).prev().find(".i-banner-case")
						   .css({ left : "150%", opacity : 0 })
						   .animate({ left : "50%", opacity : 1 },1000);
						   
				}).parent().siblings().find(".i-banner-case")
				  .animate({ left : "-150%", opacity : 0 },500,function(){
								$(this).parent().next().fadeOut(500);
				}).prev().animate({ top : 80, opacity : 0 },300);
				
			}	
			
		})();
 		

 		(function caseRandom(){
 			var o = $(".i-case-item"),
 					a = [];
 			setInterval(function(){
 				o.removeClass("color");
 				a = [ Math.floor(Math.random() * o.length), Math.floor(Math.random() * o.length), Math.floor(Math.random() * o.length) ]
 				for(var i = 0;i < a.length; i++){ o.eq(a[i]).addClass("color"); }
 			},3000);
 				
 		})();
 		

 		(function containBanner(){
 			var o = $(".banner"),
 					c = $(".banner-info");
 			c.css({ "display" : "block", opacity : 0 });
 			o.find("img").fadeIn(800,function(){
 				o.find(c).animate({ top : 80, opacity : 1 },1000);	
 			});
 			
 		})();
 		
 		//About
 		(function about(){
 			var o = $(".menu a"),
 					b = $("html, body"),
 					n = $(".nav-item li a");
 			
 			o.bind("click",function(){
 				var d = $(this).attr("href");
 				b.animate({ scrollTop : ($(d).offset().top + 70) },500);
 				return false;
 			});
 				 			
 		})();
		

		(function iservice(){
			var o = $(".i-business-item");
			
			o.each(function(i){
				$(this).addClass("nth-child" + (i + 1));
			});
			
		})();
		

		(function friend(){
			
			var o = $(".i-friend"),
				l = o.children("dd").length;
			
			if(l > 5){
				o.after("<dl class='i-friend ui-l'></dl>");
				$(".i-friend").eq(1).html(o.children("dd").slice(5,11).clone(true));
				o.children("dd").slice(5,11).remove();
				l = o.children("dd").length;
				o.parent().children().css({ "margin-right" : 160 });
				if(l > 5){
					$(".i-friend").eq(1).after("<dl class='i-friend ui-l'></dl>");
					$(".i-friend").eq(2).html(o.children("dd").slice(5,11).clone(true));
					o.children("dd").slice(5,11).remove();
					o.parent().children().css({ "margin-right" : 100 });
				}
			}
			
		})();
 		
		/*The language translate
		function lanTranslate() {

			var lan = $(".language a"),
				loca = window.location.pathname;

			for(var i = 0; i < lan.length; i++){
				lan.eq(i).attr({ "href" : lan.eq(i).attr("href") + loca });
			}

		};
		*/

		//header
		(function mobileHeader(){
			var o = $("#header .ui-wrap"),
					b = $(".ui-nav-icon"),
					c = $("body"),
					media = true,
					w = $(".ui-m-wrap"),
					n = $(".ui-m-nav"),
					ww, wl, navscroll;
			
			$(window).bind("resize",function(){
				n.find(".nav-item li a").bind("click",function(){
					b.removeAttr("data-click");
					w.stop().css({ left : 0 });
				});
				
				if(b.attr("data-click") == "yes" && w){
					w.css({ left : -$(window).width() + 60 },500);
				}else if(w){
					w.css({ left : 0 },500);
				}
				
			}).trigger("resize");
			
			b.bind("click",function(){
				if(navscroll){
					navscroll.destroy();
					navscroll = null;
				}
				if($(this).attr("data-click") == "yes"){
					$(this).removeAttr("data-click");
					w.stop().animate({ left : 0 },500);
				}else{
					navscroll = new IScroll(n[0], { mouseWheel: true, click: true });
					$(this).attr({ "data-click" : "yes" });
					w.stop().animate({ left : -$(window).width() + 60 },500);
				}
			});
			
		})();
		

		(function mobileNav(){
			var o = $(".menu a");
			
			$(window).bind("resize",function(){
				if($(this).width() >= 1000){
					o.css({ width : 58 }); 
					return; 
				}
				
				if(o.length < 5 ){
					o.css({ width : Math.floor($(window).width() / o.length) });
				}else if(o.length == 5){
					o.css({ width : "20%" });	
				}else if(o.length == 6 ){
					o.css({ width : "33.333%" });	
				}
			}).trigger("resize");
			
		})();
		
		//Mobile Banner
		(function mobileBanner(){
			
			var mobileBanner = $(".m-banner"),
				mobileBannerIcon = $(".m-banner-icon"),
				win = $(window),
				mySwiper = null;

			if($("body").hasClass("index")){
				addBanner();
			}

			//FadeIn or FadeOut
			function addBanner(){

				if(!mySwiper){
				  mySwiper = new Swiper('.swiper-container',{
				    pagination: '.m-banner-icon',
				    autoplay : 10000,
				    loop:true,
				    grabCursor: true,
				    paginationClickable: true
				  })
				}

				//Add image
				mobileBanner.find("[data-src]").each(function(){

					var oImg = new Image(),
						o = $(this);
						oImg.src = $(this).attr("data-src");
					
					if(oImg.width > 0){
						animation();
					}else{
						oImg.onload = function(){
							animation();
						}
					}

					function animation(){

						o.append("<img src='" + oImg.src + "' title='' alt='' />");
						o.children("img").css({ "position" : "absolute", top : "50%", left : "50%" });

						if(oImg.width / oImg.height < win.width() / 250){
							o.children("img").css({ width : "100%", height : win.width() / (oImg.width / oImg.height), "margin-top" : - win.width() / (oImg.width / oImg.height) / 2, "margin-left" : - win.width()/2 });	
						}else{
							o.children("img").css({ width : 250 * (oImg.width / oImg.height), height : "100%", "margin-top" : - 125, "margin-left" : - 250 * (oImg.width / oImg.height) / 2 });
						}
					}

					$(window).bind("resize", function(){
						setTimeout(function(){
							if(oImg.width / oImg.height < win.width() / 250){
								o.children("img").css({ width : "100%", height : win.width() / (oImg.width / oImg.height), "margin-top" : - win.width() / (oImg.width / oImg.height) / 2, "margin-left" : - win.width()/2 });	
							}else{
								o.children("img").css({ width : 250 * (oImg.width / oImg.height), height : "100%", "margin-top" : - 125, "margin-left" : - 250 * (oImg.width / oImg.height) / 2 });
							}
						},100);
					});

				});
			}

		})();
		

		(function backlink(){
				var o = $(".ui-back-icon"),
						h = window.location.href,
						c = document.cookie,
						iThis = 0;
				
				if(!$.getCookieValue(h)){
					iThis = isNaN($.getCookie("i")) ? 1 : (parseInt($.getCookie("i")) + 1);
					$.addCookie("i", iThis);
					$.addCookie(iThis, h);
				}
				
				o.attr({ "href" : $.getCookie($.getCookieValue(h) - 1) });
				//console.log(c);
				
		})();

		( function footer() {
			var str = $(".footer-menu-item:eq(3) a");

			for( var i = 0; i < str.length; i ++){
				str.eq(i).attr({ "href" : str.eq(i).attr("href").replace("about-us/", "about-us#") });
			}

		})();

	 });
	 
	 
	 