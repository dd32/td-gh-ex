/* Start social sharing script */
jQuery(document).ready(function($) {
    jQuery('.social-share a').click(function(){
        newwindow=window.open($(this).attr('href'),'','height=450,width=700');
        if (window.focus) {newwindow.focus()}
        return false;
    });
});

/* End social sharing script */
