<?php wp_enqueue_script('arjuna_default', get_bloginfo('template_url') . '/default.js'); ?>
<!--[if lte IE 7]><link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie7.css" type="text/css" media="screen" /><![endif]-->
<!--[if lte IE 6]>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie6.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/ie6.js"></script>
<![endif]-->
<?php get_template_part( 'templates/core/additional-global-includes' ); ?>
