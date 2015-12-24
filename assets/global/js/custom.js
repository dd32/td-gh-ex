jQuery(document).ready(function($) {
    
    /* Superfish Menu Call */
    $('#actuate_menu').superfish({});
    
    /* Responsive Menu */
    $('.primarymenu-resp').sidr({
        'name': 'sidr-menu',
        'side': 'right',
    });
    
    $(window).resize(function() {
        if($('.sidr').css('display') == 'block'){
            $.sidr('close', 'sidr-menu');
        }
    });

});