/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'avedon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-beaker' : '&#xf0c3;',
			'icon-laptop' : '&#xf109;',
			'icon-tablet' : '&#xf10a;',
			'icon-mobile' : '&#xf10b;',
			'icon-desktop' : '&#xf108;',
			'icon-question-sign' : '&#xf059;',
			'icon-info-sign' : '&#xf05a;',
			'icon-calendar' : '&#xf073;',
			'icon-code' : '&#xf121;',
			'icon-ticket' : '&#xf145;',
			'icon-rocket' : '&#xf135;',
			'icon-html5' : '&#xf13b;',
			'icon-css3' : '&#xf13c;',
			'icon-camera' : '&#xf030;',
			'icon-bullhorn' : '&#xf0a1;',
			'icon-comment' : '&#xf075;',
			'icon-asterisk' : '&#xf069;',
			'icon-quote-right' : '&#xf10e;',
			'icon-suitcase' : '&#xf0f2;',
			'icon-envelope-alt' : '&#xf0e0;',
			'icon-bookmark' : '&#xf02e;',
			'icon-picture' : '&#xf03e;',
			'icon-facetime-video' : '&#xf03d;',
			'icon-map-marker' : '&#xf041;',
			'icon-edit' : '&#xf044;',
			'icon-globe' : '&#xf0ac;',
			'icon-link' : '&#xf0c1;',
			'icon-undo' : '&#xf0e2;',
			'icon-save' : '&#xf0c7;',
			'icon-paper-clip' : '&#xf0c6;',
			'icon-adjust' : '&#xf042;',
			'icon-tag' : '&#xf02b;',
			'icon-cog' : '&#xf013;',
			'icon-home' : '&#xf015;',
			'icon-file' : '&#xf016;',
			'icon-eject' : '&#xf052;',
			'icon-chevron-left' : '&#xf053;',
			'icon-chevron-right' : '&#xf054;',
			'icon-play' : '&#xf04b;',
			'icon-pause' : '&#xf04c;',
			'icon-remove-sign' : '&#xf057;',
			'icon-ok-sign' : '&#xf058;',
			'icon-search' : '&#xf002;',
			'icon-music' : '&#xf001;',
			'icon-film' : '&#xf008;',
			'icon-time' : '&#xf017;',
			'icon-cogs' : '&#xf085;',
			'icon-cloud' : '&#xf0c2;',
			'icon-fullscreen' : '&#xf0b2;',
			'icon-eye-open' : '&#xf06e;',
			'icon-reorder' : '&#xf0c9;',
			'icon-chevron-up' : '&#xf077;',
			'icon-chevron-down' : '&#xf078;',
			'icon-gift' : '&#xf06b;',
			'icon-dashboard' : '&#xf0e4;',
			'icon-rss' : '&#xf09e;',
			'icon-instagram' : '&#xf16d;',
			'icon-question' : '&#xf128;',
			'icon-wordpress' : '&#xe000;',
			'icon-reddit' : '&#xe002;',
			'icon-paypal' : '&#xe003;',
			'icon-vimeo' : '&#xe004;',
			'icon-facebook' : '&#xe005;',
			'icon-instagram-2' : '&#xe006;',
			'icon-twitter' : '&#xe007;',
			'icon-feed' : '&#xe008;',
			'icon-dribbble' : '&#xe001;',
			'icon-soundcloud' : '&#xe009;',
			'icon-lastfm' : '&#xe00a;',
			'icon-forrst' : '&#xe00b;',
			'icon-tumblr' : '&#xe00c;',
			'icon-phone' : '&#xe00d;',
			'icon-google-plus' : '&#xe00e;',
			'icon-flickr' : '&#xe00f;',
			'icon-youtube' : '&#xe010;',
			'icon-pinterest' : '&#xe011;',
			'icon-linkedin' : '&#xe012;',
			'icon-stumbleupon' : '&#xe013;',
			'icon-foursquare' : '&#xe014;',
			'icon-IcoMoon' : '&#xe015;',
			'icon-chrome' : '&#xe016;',
			'icon-firefox' : '&#xe017;',
			'icon-IE' : '&#xe018;',
			'icon-opera' : '&#xe019;',
			'icon-safari' : '&#xe01a;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};