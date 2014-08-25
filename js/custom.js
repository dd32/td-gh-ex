$(document).ready(function($) {
    themeoraApp.init();
});

$(window).load(function(){
   //Fade out the page loader
   jQuery('.mask-color').fadeOut('slow');
});

$(window).resize(function(){
});

var themeoraApp = {
    'config' : {
        //set up variables
    },

    'init' : function() {
        themeoraApp.dropDownMenus();
        themeoraApp.buttonStyling();
        themeoraApp.formValidation();
    },
    
    /* Add the classes and attributes we need for the bootstrap dropdown to do it's thing */
    'dropDownMenus' : function(){
        $('.menu-item-has-children').each(function(){
            var dropdownLink = $(this);
            $(dropdownLink).find('a:first').attr('data-toggle', 'dropdown');
            $(dropdownLink).find('a:first').attr('data-hover', 'dropdown');
            
            $(dropdownLink).find('a:first').append('<b class="caret"></b>').addClass('dropdown-toggle');
            $(dropdownLink).find('a:first').parent('li').addClass('dropdown');
        });
    },
    
    /* Setup all for validation via jquery.validate */
    'formValidation' : function(){
        // Comment form
        $('#commentForm').validate({
            rules: {
                comment: 'required'
            },
            messages: {
                comment: 'required'
            }
        });
    },
    
    /* Simple helpers to add useful CSS classes to hard to change Wordpress markup */
    'buttonStyling' : function(){
        $('#commentform #submit').addClass('btn btn-primary btn-lg');
        $('.post-password-form input[type="submit"]').addClass('btn btn-primary btn-lg');
        $('.search-form .search-submit').addClass('btn btn-success');
    }

}