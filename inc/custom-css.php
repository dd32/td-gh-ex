<?php

/**
 * Custom Styling from Customizer
 *
 */

function backphoto_custom_css() {
?>

<style>

<?php if(get_theme_mod('backphoto_layout_width') !== null ) {
	echo '#content { max-width: '.esc_attr(get_theme_mod('backphoto_layout_width')).'}';
	echo '.horizontal .header-container { max-width: '.esc_attr(get_theme_mod('backphoto_layout_width')).'}';
} ?>

<?php if(get_theme_mod('backphoto_layout_padding') !== null ) {
	echo '#content { padding-left: '.get_theme_mod('backphoto_layout_padding').'; padding-right: '.esc_attr(get_theme_mod('backphoto_layout_padding')).';}';
} ?>

<?php if(get_theme_mod('backphoto_color_link') !== null ) {
	echo 'a { color: '.esc_attr(get_theme_mod('backphoto_color_link')).' }';
	echo 'a:visited { color: '.esc_attr(get_theme_mod('backphoto_color_link')).' }';
} ?>

<?php if(get_theme_mod('backphoto_color_link_hover') !== null ) {
	echo 'a:hover { color: '.esc_attr(get_theme_mod('backphoto_color_link_hover')).' }';
} ?>

<?php if(get_theme_mod('backphoto_color_paragpraph') !== null ) {
	echo 'body, button, input, select, optgroup, textarea { color: '.esc_attr(get_theme_mod('backphoto_color_paragpraph')).' }';
} ?>

<?php if(get_theme_mod('backphoto_color_heading') !== null ) {
	echo 'h1, h2, h3, h4, h5, h6 { color: '.esc_attr(get_theme_mod('backphoto_color_heading')).' }';
} ?>

<?php if(get_theme_mod('backphoto_typo_title') !== null ) {
	echo '.entry-title { font-family: '.esc_attr(get_theme_mod('backphoto_typo_title')).' }';
} ?>

<?php if(get_theme_mod('backphoto_typo_title_weight') !== null ) {
	echo '.entry-title { font-weight: '.esc_attr(get_theme_mod('backphoto_typo_title_weight')).' }';
} ?>

<?php if(get_theme_mod('backphoto_typo_title_size') !== null ) {
	echo '.entry-title { font-size: '.esc_attr(get_theme_mod('backphoto_typo_title_size')).' }';
} ?>

<?php if(get_theme_mod('backphoto_typo_h2') !== null ) {
	echo '.entry-content h2 { font-family: '.esc_attr(get_theme_mod('backphoto_typo_h2')).' }';
} ?>

<?php if(get_theme_mod('backphoto_typo_h2_weight') !== null ) {
	echo '.entry-content h2 { font-weight: '.esc_attr(get_theme_mod('backphoto_typo_h2_weight')).' }';
} ?>

<?php if(get_theme_mod('backphoto_typo_h2_size') !== null ) {
	echo '.entry-content h2 { font-size: '.esc_attr(get_theme_mod('backphoto_typo_h2_size')).' }';
} ?>

<?php if(get_theme_mod('backphoto_typo_h3') !== null ) {
	echo '.entry-content h3 { font-family: '.esc_attr(get_theme_mod('backphoto_typo_h3')).' }';
} ?>

<?php if(get_theme_mod('backphoto_typo_h3_weight') !== null ) {
	echo '.entry-content h3 { font-weight: '.esc_attr(get_theme_mod('backphoto_typo_h3_weight')).' }';
} ?>

<?php if(get_theme_mod('backphoto_typo_h3_size') !== null ) {
	echo '.entry-content h3 { font-size: '.esc_attr(get_theme_mod('backphoto_typo_h3_size')).' }';
} ?>

<?php if(get_theme_mod('backphoto_typo_p') !== null ) {
	echo 'body { font-family: '.esc_attr(get_theme_mod('backphoto_typo_p')).' }';
} ?>

<?php if(get_theme_mod('backphoto_typo_p_weight') !== null ) {
	echo 'body { font-weight: '.esc_attr(get_theme_mod('backphoto_typo_p_weight')).' }';
} ?>

<?php if(get_theme_mod('backphoto_typo_p_size') !== null ) {
	echo 'body { font-size: '.esc_attr(get_theme_mod('backphoto_typo_p_size')).' }';
} ?>

<?php if(get_theme_mod('backphoto_typo_nav') !== null ) {
	echo '.main-navigation { font-family: '.esc_attr(get_theme_mod('backphoto_typo_nav')).' }';
} ?>

<?php if(get_theme_mod('backphoto_typo_nav_weight') !== null ) {
	echo '.main-navigation { font-weight: '.esc_attr(get_theme_mod('backphoto_typo_nav_weight')).' }';
} ?>

<?php if(get_theme_mod('backphoto_typo_nav_size') !== null ) {
	echo '.main-navigation { font-size: '.esc_attr(get_theme_mod('backphoto_typo_nav_size')).' }';
} ?>

<?php if(get_theme_mod('backphoto_typo_sidebar') !== null ) {
	echo '.widget-title, #secondary ul, #secondary div, secondary p { font-family: '.esc_attr(get_theme_mod('backphoto_typo_sidebar')).' }';
} ?>

<?php if(get_theme_mod('backphoto_typo_sidebar_weight') !== null ) {
	echo '.widget-title { font-weight: '.esc_attr(get_theme_mod('backphoto_typo_sidebar_weight')).' }';
} ?>

<?php if(get_theme_mod('backphoto_typo_sidebar_title_size') !== null ) {
	echo '.widget-title { font-size: '.esc_attr(get_theme_mod('backphoto_typo_sidebar_title_size')).' }';
} ?>

<?php if(get_theme_mod('backphoto_typo_sidebar_content_size') !== null ) {
	echo '#secondary ul, #secondary div, secondary { font-size: '.esc_attr(get_theme_mod('backphoto_typo_sidebar_content_size')).' }';
} ?>




</style>

<script type="text/javascript">
	jQuery(document).ready(function($){
		<?php if(get_theme_mod('backphoto_header_setting_layout') == 'horizontal' ) {
			echo '$( \'.site-header\' ).addClass(\'horizontal\');';
		} ?>

	});

	<?php if(get_theme_mod('backphoto_header_setting_behaviour') == 'fixed') { ?>
	jQuery(window).scroll(function() {    
	    var scroll = jQuery(window).scrollTop();

	    if (scroll >= 200) {
	    	jQuery("#content").css("padding-top", jQuery(".site-header").height());
	        jQuery("#masthead").addClass("fixed-header");
	    } else {
	        jQuery("#masthead").removeClass("fixed-header");
	    	jQuery("#content").css("padding-top", "35px");
	    }
	});
	<?php } ?>

	<?php if((get_theme_mod('backphoto_typo_title') || get_theme_mod('backphoto_typo_h2') || get_theme_mod('backphoto_typo_h3') ) == "Arvo") { ?>
		WebFont.load({
		  google: {
		    families: ['Arvo:400,700']
		  }
		});
	<?php } ?>

	<?php if ((get_theme_mod('backphoto_typo_title') || get_theme_mod('backphoto_typo_h2') || get_theme_mod('backphoto_typo_h3')) == "Montserrat") { ?>
		WebFont.load({
		  google: {
		    families: ['Montserrat:300,400,600,700']
		  }
		});
	<?php } ?>

	<?php if ((get_theme_mod('backphoto_typo_title') || get_theme_mod('backphoto_typo_h2') || get_theme_mod('backphoto_typo_h3')) == "Merriweather") { ?>
		WebFont.load({
		  google: {
		    families: ['Merriweather:300,400,600,700']
		  }
		});
	<?php } ?>

	<?php if ((get_theme_mod('backphoto_typo_title') || get_theme_mod('backphoto_typo_h2') || get_theme_mod('backphoto_typo_h3')) == "Open sans") { ?>
		WebFont.load({
		  google: {
		    families: ['Open sans:300,400,600,700']
		  }
		});
	<?php } ?>

	<?php if ((get_theme_mod('backphoto_typo_title') || get_theme_mod('backphoto_typo_h2') || get_theme_mod('backphoto_typo_h3')) == "Pt Sans") { ?>
		WebFont.load({
		  google: {
		    families: ['Pt Sans:300,400,600,700']
		  }
		});
	<?php } ?>

	<?php if ((get_theme_mod('backphoto_typo_title') || get_theme_mod('backphoto_typo_h2') || get_theme_mod('backphoto_typo_h3')) == "Raleway") { ?>
		WebFont.load({
		  google: {
		    families: ['Raleway:300,400,600,700']
		  }
		});
	<?php } ?>

	<?php if ((get_theme_mod('backphoto_typo_title') || get_theme_mod('backphoto_typo_h2') || get_theme_mod('backphoto_typo_h3')) == "Raleway") { ?>
		WebFont.load({
		  google: {
		    families: ['Raleway:300,400,600,700']
		  }
		});
	<?php } ?>

	<?php if ((get_theme_mod('backphoto_typo_title') || get_theme_mod('backphoto_typo_h2') || get_theme_mod('backphoto_typo_h3')) == "Roboto Slab") { ?>
		WebFont.load({
		  google: {
		    families: ['Roboto Slab:300,400,600,700']
		  }
		});
	<?php } ?>

	<?php if ((get_theme_mod('backphoto_typo_title') || get_theme_mod('backphoto_typo_h2') || get_theme_mod('backphoto_typo_h3')) == "Ubuntu") { ?>
		WebFont.load({
		  google: {
		    families: ['Ubuntu:300,400,600,700']
		  }
		});
	<?php } ?>

	<?php if ((get_theme_mod('backphoto_typo_p') || get_theme_mod('backphoto_typo_nav') || get_theme_mod('backphoto_typo_sidebar')) == "Droid Sans") { ?>
		WebFont.load({
		  google: {
		    families: ['Droid Sans:300,400,600,700']
		  }
		});
	<?php } ?>

	<?php if ((get_theme_mod('backphoto_typo_p') || get_theme_mod('backphoto_typo_nav') || get_theme_mod('backphoto_typo_sidebar')) == "Open Sans") { ?>
		WebFont.load({
		  google: {
		    families: ['Open Sans:300,400,600,700']
		  }
		});
	<?php } ?>

	<?php if ((get_theme_mod('backphoto_typo_p') || get_theme_mod('backphoto_typo_nav') || get_theme_mod('backphoto_typo_sidebar')) == "Lato") { ?>
		WebFont.load({
		  google: {
		    families: ['Lato:300,400,600,700']
		  }
		});
	<?php } ?>

	<?php if ((get_theme_mod('backphoto_typo_p') || get_theme_mod('backphoto_typo_nav') || get_theme_mod('backphoto_typo_sidebar')) == "Montserrat") { ?>
		WebFont.load({
		  google: {
		    families: ['Montserrat:300,400,600,700']
		  }
		});
	<?php } ?>

	<?php if ((get_theme_mod('backphoto_typo_p') || get_theme_mod('backphoto_typo_nav') || get_theme_mod('backphoto_typo_sidebar')) == "Source Sans Pro") { ?>
		WebFont.load({
		  google: {
		    families: ['Source Sans Pro:300,400,600,700']
		  }
		});
	<?php } ?>

	<?php if ((get_theme_mod('backphoto_typo_p') || get_theme_mod('backphoto_typo_nav') || get_theme_mod('backphoto_typo_sidebar')) == "PT Sans") { ?>
		WebFont.load({
		  google: {
		    families: ['PT Sans:300,400,600,700']
		  }
		});
	<?php } ?>

	<?php if ((get_theme_mod('backphoto_typo_p') || get_theme_mod('backphoto_typo_nav') || get_theme_mod('backphoto_typo_sidebar')) == "Noto") { ?>
		WebFont.load({
		  google: {
		    families: ['Noto:300,400,600,700']
		  }
		});
	<?php } ?>

	<?php if ((get_theme_mod('backphoto_typo_p') || get_theme_mod('backphoto_typo_nav') || get_theme_mod('backphoto_typo_sidebar')) == "Muli") { ?>
		WebFont.load({
		  google: {
		    families: ['Muli:300,400,600,700']
		  }
		});
	<?php } ?>

	<?php if ((get_theme_mod('backphoto_typo_p') || get_theme_mod('backphoto_typo_nav') || get_theme_mod('backphoto_typo_sidebar')) == "Fira Sans") { ?>
		WebFont.load({
		  google: {
		    families: ['Fira Sans:300,400,600,700']
		  }
		});
	<?php } ?>

</script>

<?php
}
add_action('wp_head', 'backphoto_custom_css');

?>