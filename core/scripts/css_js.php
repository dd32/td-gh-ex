<?php function bhumi_scripts()
        {
                wp_enqueue_style('bootstrap', CPM_TEMPLATE_DIR_URI .'/assets/css/bootstrap.css');
                wp_enqueue_style('default', CPM_TEMPLATE_DIR_URI . '/assets/css/default.css');
                wp_enqueue_style('bhumi-theme', CPM_TEMPLATE_DIR_URI . '/assets/css/bhumi-theme.css');
                wp_enqueue_style('media-responsive', CPM_TEMPLATE_DIR_URI . '/assets/css/media-responsive.css');
                wp_enqueue_style('animations', CPM_TEMPLATE_DIR_URI . '/assets/css/animations.css');
                wp_enqueue_style('theme-animtae', CPM_TEMPLATE_DIR_URI . '/assets/css/theme-animtae.css');
                wp_enqueue_style('font-awesome', CPM_TEMPLATE_DIR_URI . '/assets/css/font-awesome-4.3.0/css/font-awesome.css');
                wp_enqueue_style('OpenSansRegular','//fonts.googleapis.com/css?family=Open+Sans');
                wp_enqueue_style('OpenSansBold','//fonts.googleapis.com/css?family=Open+Sans:700');
                wp_enqueue_style('OpenSansSemiBold','//fonts.googleapis.com/css?family=Open+Sans:600');
                wp_enqueue_style('RobotoRegular','//fonts.googleapis.com/css?family=Roboto');
                wp_enqueue_style('RobotoBold','//fonts.googleapis.com/css?family=Roboto:700');
                wp_enqueue_style('RalewaySemiBold','//fonts.googleapis.com/css?family=Raleway:600');
                wp_enqueue_style('Courgette','//fonts.googleapis.com/css?family=Courgette');

                // Js
                wp_enqueue_script('menu', CPM_TEMPLATE_DIR_URI .'/assets/js/menu.js', array('jquery'));
                wp_enqueue_script('bootstrap-js', CPM_TEMPLATE_DIR_URI .'/assets/js/bootstrap.js');
                wp_enqueue_script('bhumi-theme-script', CPM_TEMPLATE_DIR_URI .'/assets/js/bhumi_theme_script.js');
                if(is_front_page()){
                        //Footer JS//
        		wp_enqueue_script('bhumi-footer-script', CPM_TEMPLATE_DIR_URI .'/assets/js/bhumi-footer-script.js','','',true);
        		wp_enqueue_script('waypoints', CPM_TEMPLATE_DIR_URI .'/assets/js/waypoints.js','','',true);
        		wp_enqueue_script('scroll', CPM_TEMPLATE_DIR_URI .'/assets/js/scroll.js','','',true);
		}
                if ( is_singular() ) wp_enqueue_script( "comment-reply" );
        }
        add_action('wp_enqueue_scripts', 'bhumi_scripts');
?>