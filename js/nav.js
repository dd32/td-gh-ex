jQuery(document).ready(function() {
            
            // build <select> dropdown
            jQuery("<select />").appendTo("div.nav-head");

            //Create deafult option "Go to..."
            jQuery("<option />", {
                "selected": "selected",
                "value": "",
                "text": "Menu Head..."  
            }).appendTo(".nav-head select");

            //Populate
            jQuery(".nav-head ul li a").each(function() {
                var el = jQuery(this);
                    if(el.parents('.nav-head ul ul').length) {
                        // if there are ul in li
                        jQuery('<option />', {
                        'value': el.attr('href'),
                        'text':  '- ' + el.text()
                    }).appendTo('.nav-head select');
                    } else { // if no ul in li
                        jQuery('<option />', {
                        'value': el.attr('href'),
                        'text': el.text()
                    }).appendTo('.nav-head select');
                }
            });

            //make links work 
            jQuery(".nav-head select").change(function() {
                window.location = jQuery(this).find("option:selected").val();
            });
    });

jQuery(document).ready(function() {
            
            // build <select> dropdown
            jQuery("<select />").appendTo("div.nav-foot");

            //Create deafult option "Go to..."
            jQuery("<option />", {
                "selected": "selected",
                "value": "",
                "text": "Menu Foot..."  
            }).appendTo(".nav-foot select");

            //Populate
            jQuery(".nav-foot ul li a").each(function() {
                var el = jQuery(this);
                    if(el.parents('.nav-foot ul ul').length) {
                        // if there are ul in li
                        jQuery('<option />', {
                        'value': el.attr('href'),
                        'text':  '- ' + el.text()
                    }).appendTo('.nav-foot select');
                    } else { // if no ul in li
                        jQuery('<option />', {
                        'value': el.attr('href'),
                        'text': el.text()
                    }).appendTo('.nav-foot select');
                }
            });

            //make links work 
            jQuery(".nav-foot select").change(function() {
                window.location = jQuery(this).find("option:selected").val();
            });
    });