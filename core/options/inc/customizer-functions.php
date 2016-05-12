<?php
//ad customizer css
add_action( 'customize_controls_print_styles', 	'igthemes_customizer_custom_control_css' );
function igthemes_customizer_custom_control_css() {
    ?>
    <style>
    /* Theme Instructions Panel CSS */
	li#accordion-section-premium h3.accordion-section-title, li#accordion-section-premium h3.accordion-section-title:focus { background-color:#fc3 !important; color: #5d4b16 !important; }
	li#accordion-section-premium h3.accordion-section-title:hover { background-color: #fd3 !important; color: #5d4b16 !important; }
	li#accordion-section-premium h3.accordion-section-title:after { color: #5d4b16 !important; }
    input.readonly {
        display: none;
    }
    .premium {
        font-style: normal;
    }
    .upgrade-button {
        background: #fc3;
        color: #5d4b16;
        font-weight: bold;
        border-radius: 2px;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        margin: 10px 0;
        padding: 10px 15px;
        display: inline-block;
        text-transform: uppercase;
        line-height: 1;
     }
    .upgrade-button:hover,
    .upgrade-button:focus   {
        background: #fd3;
        color: #5d4b16;
        font-weight: bold;
        border-radius: 2px;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        margin: 10px 0;
        padding: 10px 15px;
        display: inline-block;
        text-transform: uppercase;
        line-height: 1;
     }
    .customize-control-radio-image .image.ui-buttonset input[type=radio] {
        height: auto;
    }
    .customize-control-radio-image .image.ui-buttonset label {
        display: inline-block;
        width: 30%;
        padding: 1%;
        box-sizing: border-box;
    }
    .customize-control-radio-image .image.ui-buttonset label.ui-state-active {
        background: none;
    }
    .customize-control-radio-image .customize-control-radio-buttonset label {
        background: #f7f7f7;
        line-height: 35px;
    }
    .customize-control-radio-image label img {
        border: 2px solid #eee; 
    }
    #customize-controls .customize-control-radio-image label img {
        height: auto;
    }
    .customize-control-radio-image label.ui-state-active img {
        border: 2px solid #fff; 
        background: #fff;
    }
    .customize-control-radio-image label.ui-state-hover img {
        border: 2px solid #fff; 
    }
    </style>
    <?php
}

//style options
add_action( 'wp_enqueue_scripts', 'igthemes_customizer_css' );
if ( ! function_exists( 'igthemes_customizer_css' ) ) {
	function igthemes_customizer_css() {
        wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/custom.css');
        
        $site_title_color =  igthemes_option( 'site_title_color', '#313131');
        $tagline_color =  igthemes_option( 'tagline_color', '#e1f4de');
        
        $style = '
        .site-header h1.site-title a,
        .site-header .site-title a,
        .site-header p.site-title a,
        .site-header h1.site-title a:hover,
        .site-header .site-title a:hover,
        .site-header p.site-title a:hover { 
            color: '. $site_title_color .' ;
            }
        .site-header p.site-description { 
            color: '. $tagline_color .' ;
            }
        ';
		wp_add_inline_style( 'custom-style', $style );
	}//end custom css
}