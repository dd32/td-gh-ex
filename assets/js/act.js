var img_cache,
galleries;



(function() {
	var menu_container = document.querySelectorAll('.menu');
	menu_container.forEach(function(menu) {
		menu.querySelectorAll(".menu-item-has-children").forEach(function(element) {
			let toggler = document.createElement('div');
			let togglerTextNode = document.createTextNode('+');
			toggler.appendChild(togglerTextNode);
			toggler.classList.add('toggle');
			element.insertBefore(toggler, element.childNodes[1]);
		});
	});
})();
(function() {
	window.addEventListener( "scroll", () => {
		var element = document.getElementById( "scroll-up" );
		if ( window.pageYOffset > window.innerHeight && !element.classList.contains( 'active' ) ) {
			element.classList.add( 'active' );
		}
		if ( window.pageYOffset < window.innerHeight && element.classList.contains( 'active' ) ) {
			element.classList.remove( 'active' );
		}
	}, false );
	var duration = 800;
	document.getElementById( "scroll-up" ).addEventListener("click", () => {
		var scroll = function (){
			var progress = Math.min(1, (new Date - start) / duration);
			window.scrollTo(0, (to - from) * Math.pow(progress, 2) + from);
			(progress < 1) && window.requestAnimationFrame(scroll);
		}
		var start = new Date,
		from = window.pageYOffset,
		to = document.body.offsetTop;
		scroll();
	}, false);
})();
(function() {
	document.querySelectorAll(".toggle").forEach(function(element) {
		element.addEventListener("click", () => {
			element.classList.toggle("toggled");
			if (document.getElementById('toggle-header-menu') !== null && document.getElementById('toggle-header-widget') !== null) {
				if (element === document.getElementById('toggle-header-menu') && document.getElementById('toggle-header-widget').classList.contains('toggled')) {
					document.getElementById('toggle-header-widget').classList.remove('toggled');
					document.body.classList.toggle("no-overflow");
				} else if (element === document.getElementById('toggle-header-widget') && document.getElementById('toggle-header-menu').classList.contains('toggled')) {
					let scrolled = window.scrollY;
					document.getElementById('toggle-header-menu').classList.remove('toggled');
					document.body.classList.toggle("no-overflow");
				}
			}
			if (element === document.getElementById('toggle-header-menu') || element === document.getElementById('toggle-header-widget')) {
				document.body.classList.toggle("no-overflow");
			}
		}, false);
	});
	document.querySelectorAll('.widget-title').forEach(function(element) {
		element.addEventListener('click', () => {
			element.classList.toggle('toggled');
		},false)
	});
})();
(function() {
	function doAdelay() {
		setTimeout(function() {
			return true;
		}, 30000);
	}
	function GalleryItem(gallery_id, gallery_item, src) {
		this.img = new Image();
		this.img.src = src;
		this.item_id = [gallery_id, gallery_item];
	}
	function img_cache_constructor() {
		this.cache = [];
		this.add = function(item) {
			this.cache.push(item);
		};
	}
	galleries = document.querySelectorAll('.gallery');
	img_cache = new img_cache_constructor();
	if (galleries !== null) {
		for (let i = 0; i < galleries.length; i++) {
			let items = galleries[i].querySelectorAll('.gallery-item');
			for (let j = 0; j < items.length; j++) {
				let gi_tag = items[j].querySelector('a');
				gi_tag.dataset.gi = i + "_" + j;
				img_cache.add(new GalleryItem(i, j, gi_tag.getAttribute('href')));
				gi_tag.addEventListener("click", function (event) {
					event.preventDefault();
					let current_gi_tag = this.dataset.gi.split('_'),
					filtered_items = [];
					for (let item of img_cache.cache) {
						if (item.item_id[0] == current_gi_tag[0])
						filtered_items.push(item);
					}
					var gallery_display = document.createElement('div');
					gallery_display.classList.add('gallery-display');
					var close_gallery_display = document.createElement('div');
					close_gallery_display.classList.add('close-display');
					var info_gallery_display = document.createElement('div');
					info_gallery_display.classList.add('info-display');
					var domElement = document.querySelectorAll('.gallery')[current_gi_tag[0]];
					domElement.appendChild(gallery_display);
					domElement = domElement.querySelector('.gallery-display');
					domElement.appendChild(info_gallery_display);
					domElement.appendChild(close_gallery_display);
					for (let item of filtered_items) {
						var item_container = document.createElement('div')
						item_container.classList.add('item-display');
						domElement.appendChild(item_container);
						domElement.lastChild.appendChild(item.img);
					}
					setTimeout(() => {
						domElement.classList.toggle('toggled');
						domElement.querySelectorAll('.item-display')[current_gi_tag[1]].scrollIntoView();
						document.body.classList.toggle("no-overflow");
						document.querySelector('.close-display').addEventListener('click', () => {
							domElement.classList.toggle('toggled');
							setTimeout(() => {
								document.body.classList.toggle("no-overflow");
								document.querySelector('.gallery-display').remove();
							}, 176);
						}, false);
					}, 176);
				}, false);
			}
		}
	}
})();
