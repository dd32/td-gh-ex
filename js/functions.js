(function($){

	var bidnis = {
		sizes: {
			'desktop': 1280,
			'tablet': 640,
			'phone': 320
		},

		init: function(){
			this.cacheDom();
			this.bindEvents();
			this.resizeHandler();
			this.fullWidthVideoEmbeds();
		},

		cacheDom: function(){
			this.$window = $(window);
			this.$document = $(document);
			this.$htmlAndBody = this.$document.find('html, body');
			this.$scrollToTop = this.$document.find('.scroll-to-top');
			this.$menuHeaderToggle = this.$document.find('.menu-toggle');
			this.$menuHeaderContainer = this.$document.find('.header-menu-container');
			this.$videoEmbeds = this.$document.find('.post_format-post-format-video iframe, post_format-post-format-video video');
		},

		bindEvents: function(){
			this.$window.resize( this.resizeHandler.bind(this) );
			this.$scrollToTop.on( 'click', this.scrollToTop.bind(this) );
			this.$menuHeaderToggle.on( 'click', this.toggleMenu.bind(this) );
			this.$document.on( 'scroll', this.scrollHandler.bind(this) );
		},

		toggleMenu: function(){
			this.$menuHeaderContainer.toggle()
		},

		scrollToTop: function(){
			this.$htmlAndBody.animate({scrollTop:0}, 'slow');
			return false;
		},

		resizeHandler: function(){
			var mm = window.matchMedia( '(max-width: '+this.sizes.tablet+'px)' );

			if( mm.matches ){
				this.$menuHeaderContainer.hide();
			}else{
				this.$menuHeaderContainer.show();
			}

			this.fullWidthVideoEmbeds();
		},

		fullWidthVideoEmbeds: function(){
			for( var x=0; x<this.$videoEmbeds.length; x++){
				var $video = $( this.$videoEmbeds[x] );

				$video.width('100%');
				$video.height( ($video.width()/16) * 9 );

			}
		},

		scrollHandler: function(){
			if( this.$document.scrollTop() >= 500 ){
				this.$scrollToTop.show(500)
			}else{
				this.$scrollToTop.hide(500);
			}
		}
	}
	
	bidnis.init();

})(jQuery);