// initializes infinite scroll
var infinite_scroll = {
		loading: {
			img: "/wp-content/themes/bartleby/img/loader.gif",
			msgText : '...',
			finishedMsg: 'the end',
			behavior: 'manual'
		},
		"nextSelector":"#post-nav a",
		"navSelector":"#post-nav",
		"itemSelector":".column-posts",
		"contentSelector":"#content"
	};
	jQuery( infinite_scroll.contentSelector ).infinitescroll( infinite_scroll );
	
// unbinds to load manually
jQuery('#content').infinitescroll('unbind');

// hides nav links
jQuery('#post-nav').css ( 'display', 'none' );

jQuery('#infinite-target').on('click', function(e) {
  e.preventDefault();
	jQuery('#content').infinitescroll('retrieve');
});