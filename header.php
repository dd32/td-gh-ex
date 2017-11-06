<?php
/**
 * The header for our theme.
 *
 *
 * @package affidavit
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?> >

		<header id="site-header">
	        <div id="site-info">
				<div class="container">
					<div class="row">
			            <div class="col-md-8">
			                <div class="row">
					        	<?php 
					            /**
					             * Functions hooked in to affidavit_site_info action.
					             *
					             * @hooked affidavit_template_important_info 
					             */
					             do_action('affidavit_site_info'); ?>
							</div>
			            </div>
			            <div class="col-md-4 site-desc">
							<?php echo esc_html( bloginfo('description') ); ?>
			            </div>
			            <span class="clearfix"></span>
					</div>
				</div>
	        </div>
				
			<?php 
			/**
	         * Functions hooked in to affidavit_header action.
	         *
	         * @hooked affidavit_template_header 
	         */
			do_action('affidavit_header'); ?>

		</header>

		<div id="content-area">