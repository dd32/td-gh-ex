<?php function bhumi_scripts()
        {
                wp_enqueue_style('bhumi_bootstrap', BHUMI_TEMPLATE_DIR_URI .'/assets/css/bootstrap.css');
                wp_enqueue_style('bhumi_default', BHUMI_TEMPLATE_DIR_URI . '/assets/css/default.css');
                 wp_enqueue_style( 'bhumi_style', get_stylesheet_uri());
                wp_enqueue_style('bhumi_theme', BHUMI_TEMPLATE_DIR_URI . '/assets/css/bhumi-theme.css');
                wp_enqueue_style('bhumi_media_responsive', BHUMI_TEMPLATE_DIR_URI . '/assets/css/media-responsive.css');
                wp_enqueue_style('bhumi_animations', BHUMI_TEMPLATE_DIR_URI . '/assets/css/animations.css');
                wp_enqueue_style('bhumi_theme-animtae', BHUMI_TEMPLATE_DIR_URI . '/assets/css/theme-animtae.css');
                wp_enqueue_style('bhumi_font_awesome', BHUMI_TEMPLATE_DIR_URI . '/assets/css/font-awesome-4.3.0/css/font-awesome.css');
                wp_enqueue_style('bhumi_OpenSansRegular','//fonts.googleapis.com/css?family=Open+Sans');
                wp_enqueue_style('bhumi_OpenSansBold','//fonts.googleapis.com/css?family=Open+Sans:700');
                wp_enqueue_style('bhumi_OpenSansSemiBold','//fonts.googleapis.com/css?family=Open+Sans:600');
                wp_enqueue_style('bhumi_RobotoRegular','//fonts.googleapis.com/css?family=Roboto');
                wp_enqueue_style('bhumi_RobotoBold','//fonts.googleapis.com/css?family=Roboto:700');
                wp_enqueue_style('bhumi_RalewaySemiBold','//fonts.googleapis.com/css?family=Raleway:600');
                wp_enqueue_style('bhumi_Courgette','//fonts.googleapis.com/css?family=Courgette');

                // Js
                wp_enqueue_script('bhumi_menu', BHUMI_TEMPLATE_DIR_URI .'/assets/js/menu.js', array('jquery'));
                wp_enqueue_script('bhumi_bootstrap_script', BHUMI_TEMPLATE_DIR_URI .'/assets/js/bootstrap.js');
                wp_enqueue_script('bhumi_theme_script', BHUMI_TEMPLATE_DIR_URI .'/assets/js/bhumi_theme_script.js');
                if(is_front_page()){
                        //Footer JS//
        		wp_enqueue_script('bhumi_footer_script', BHUMI_TEMPLATE_DIR_URI .'/assets/js/bhumi-footer-script.js','','',true);
        		wp_enqueue_script('bhumi_waypoints', BHUMI_TEMPLATE_DIR_URI .'/assets/js/waypoints.js','','',true);
        		wp_enqueue_script('bhumi_scroll', BHUMI_TEMPLATE_DIR_URI .'/assets/js/scroll.js','','',true);
		}
                if ( is_singular() ) wp_enqueue_script( "comment-reply" );
        }
        add_action('wp_enqueue_scripts', 'bhumi_scripts');
?>