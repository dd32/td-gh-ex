<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section
 *
 * @package beam
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="page" class="hfeed site">
    <?php do_action('beam_before_header'); ?>
    <header id="masthead" class="site-header">
      <nav class="navbar is-transparent">
        <div class="container">
          <?php do_action('beam_before_branding'); ?>
          <div class="navbar-brand">
            <div class="navbar-brand-wrap">
              <?php if (!has_custom_logo()) { ?>
              <p class="site-name"><?php bloginfo('name'); ?></p>
              <?php
                $description = get_bloginfo('description', 'display');
                if ($description || is_customize_preview()) :
              ?>
              <p class="site-description"><?php echo $description; ?></p>
              <?php
                endif;
                } else {
                  the_custom_logo();
                }
              ?>
            </div>
            <div class="navbar-burger burger" data-target="navbar">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
          <?php
            do_action('beam_after_branding');
            if (false == get_theme_mod('hide_menus', false)) :
          ?>
          <div id="navbar" class="navbar-menu is-uppercase">
            <div class="navbar-end">
          <?php
            $args = array(
              'container' => '',
              'items_wrap' => '%3$s',
            );
            wp_nav_menu($args);
          ?>
            </div>
          </div>
        </div>
      </nav>
      <?php
        endif;
        do_action('beam_after_nav');
      ?>

    </header><!-- #header-->
		<?php do_action( 'beam_after_header' );
