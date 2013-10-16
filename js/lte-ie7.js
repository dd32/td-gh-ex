/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'avedon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'avedonicon-desktop' : '&#xf108;',
			'avedonicon-laptop' : '&#xf109;',
			'avedonicon-tablet' : '&#xf10a;',
			'avedonicon-mobile' : '&#xf10b;',
			'avedonicon-instagram' : '&#xf16d;',
			'avedonicon-facebook' : '&#x21;',
			'avedonicon-wordpress' : '&#x22;',
			'avedonicon-vimeo' : '&#x23;',
			'avedonicon-youtube' : '&#x24;',
			'avedonicon-twitter' : '&#x25;',
			'avedonicon-flickr' : '&#x26;',
			'avedonicon-linkedin' : '&#x27;',
			'avedonicon-google' : '&#x28;',
			'avedonicon-forrst' : '&#x29;',
			'avedonicon-dribbble' : '&#x2a;',
			'avedonicon-tumblr' : '&#x2b;',
			'avedonicon-foursquare' : '&#x2c;',
			'avedonicon-reedit' : '&#x2d;',
			'avedonicon-paypal' : '&#x2e;',
			'avedonicon-lastfm' : '&#x2f;',
			'avedonicon-pinterest' : '&#x32;',
			'avedonicon-stumble' : '&#x31;',
			'avedonicon-soundcloud' : '&#x33;',
			'avedonicon-refresh' : '&#xf021;',
			'avedonicon-camera' : '&#xf030;',
			'avedonicon-bookmark' : '&#xf02e;',
			'avedonicon-tag' : '&#xf02b;',
			'avedonicon-time' : '&#xf017;',
			'avedonicon-cog' : '&#xf013;',
			'avedonicon-music' : '&#xf001;',
			'avedonicon-facetime-video' : '&#xf03d;',
			'avedonicon-picture' : '&#xf03e;',
			'avedonicon-adjust' : '&#xf042;',
			'avedonicon-map-marker' : '&#xf041;',
			'avedonicon-play' : '&#xf04b;',
			'avedonicon-pause' : '&#xf04c;',
			'avedonicon-backward' : '&#xf04a;',
			'avedonicon-forward' : '&#xf04e;',
			'avedonicon-stop' : '&#xf04d;',
			'avedonicon-eject' : '&#xf052;',
			'avedonicon-chevron-left' : '&#xf053;',
			'avedonicon-chevron-right' : '&#xf054;',
			'avedonicon-chevron-up' : '&#xf077;',
			'avedonicon-chevron-down' : '&#xf078;',
			'avedonicon-asterisk' : '&#xf069;',
			'avedonicon-exclamation-sign' : '&#xf06a;',
			'avedonicon-minus' : '&#xf068;',
			'avedonicon-plus' : '&#xf067;',
			'avedonicon-info-sign' : '&#xf05a;',
			'avedonicon-question-sign' : '&#xf059;',
			'avedonicon-warning-sign' : '&#xf071;',
			'avedonicon-phone' : '&#xf095;',
			'avedonicon-fullscreen' : '&#xf0b2;',
			'avedonicon-dashboard' : '&#xf0e4;',
			'avedonicon-envelope-alt' : '&#xf0e0;',
			'avedonicon-quote-right' : '&#xf10e;',
			'avedonicon-rocket' : '&#xf135;',
			'avedonicon-ticket' : '&#xf145;',
			'avedonicon-link' : '&#xf0c1;',
			'avedonicon-bullhorn' : '&#xf0a1;',
			'avedonicon-calendar' : '&#xf073;',
			'avedonicon-beaker' : '&#xf0c3;',
			'avedonicon-coffee' : '&#xf0f4;',
			'avedonicon-lightbulb' : '&#xf0eb;',
			'avedonicon-google-plus' : '&#xf0d5;',
			'avedonicon-paper-clip' : '&#xf0c6;',
			'avedonicon-code' : '&#xf121;',
			'avedonicon-css3' : '&#xf13c;',
			'avedonicon-html5' : '&#xf13b;',
			'avedonicon-comment' : '&#xf075;',
			'avedonicon-bar-chart' : '&#xf080;',
			'avedonicon-briefcase' : '&#xf0b1;',
			'avedonicon-comments' : '&#xf086;',
			'avedonicon-edit' : '&#xf044;',
			'avedonicon-globe' : '&#xf0ac;',
			'avedonicon-save' : '&#xf0c7;',
			'avedonicon-home' : '&#xf015;',
			'avedonicon-file' : '&#xf016;',
			'avedonicon-zoom-in' : '&#xf00e;',
			'avedonicon-rss' : '&#xf09e;',
			'avedonicon-eye-open' : '&#xf06e;',
			'avedonicon-reorder' : '&#xf0c9;',
			'avedonicon-gift' : '&#xf06b;',
			'avedonicon-cogs' : '&#xf085;',
			'avedonicon-bolt' : '&#xf0e7;',
			'avedonicon-fire-extinguisher' : '&#xf134;'
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
		c = c.match(/avedonicon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};