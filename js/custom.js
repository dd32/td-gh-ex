
	    $(document).ready(function () {

		    $('.btn-top').click(function () {
		        $("html, body").animate({
		            scrollTop: 0
		        }, 600);
		        return false;
		    });

		});
		$('#responsive-menu-button').sidr({
	      name: 'sidr-main',
	      source: '#site-navigation',
	      side: 'right'
	    });
