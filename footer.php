<?php
/**
* The template for displaying the footer
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package BestWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

</div>

</div><!--/#bestwp-content-wrapper -->
</div><!--/#bestwp-wrapper -->

<?php if ( !(bestwp_get_option('hide_footer_widgets')) ) { ?>
<?php if ( is_active_sidebar( 'bestwp-footer-1' ) || is_active_sidebar( 'bestwp-footer-2' ) || is_active_sidebar( 'bestwp-footer-3' ) || is_active_sidebar( 'bestwp-footer-4' ) ) : ?>
<div class='clearfix' id='bestwp-footer-blocks' itemscope='itemscope' itemtype='http://schema.org/WPFooter' role='contentinfo'>
<div class='bestwp-container clearfix'>
<div class="bestwp-outer-wrapper">

<div class='bestwp-footer-block-1'>
<?php dynamic_sidebar( 'bestwp-footer-1' ); ?>
</div>

<div class='bestwp-footer-block-2'>
<?php dynamic_sidebar( 'bestwp-footer-2' ); ?>
</div>

<div class='bestwp-footer-block-3'>
<?php dynamic_sidebar( 'bestwp-footer-3' ); ?>
</div>

<div class='bestwp-footer-block-4'>
<?php dynamic_sidebar( 'bestwp-footer-4' ); ?>
</div>

</div>
</div>
</div><!--/#bestwp-footer-blocks-->
<?php endif; ?>
<?php } ?>


<div class='clearfix' id='bestwp-footer'>
<div class='bestwp-foot-wrap bestwp-container'>
<div class="bestwp-outer-wrapper">

<?php if ( bestwp_get_option('footer_text') ) : ?>
  <p class='bestwp-copyright'><?php echo esc_html(bestwp_get_option('footer_text')); ?></p>
<?php else : ?>
  <p class='bestwp-copyright'><?php /* translators: %s: Year and site name. */ printf( esc_html__( 'Copyright &copy; %s', 'bestwp' ), esc_html(date_i18n(__('Y','bestwp'))) . ' ' . esc_html(get_bloginfo( 'name' ))  ); ?></p>
<?php endif; ?>
<p class='bestwp-credit'><a href="<?php echo esc_url( 'https://themesdna.com/' ); ?>"><?php /* translators: %s: Theme author. */ printf( esc_html__( 'Design by %s', 'bestwp' ), 'ThemesDNA.com' ); ?></a></p>

</div>
</div>
</div><!--/#bestwp-footer -->

<?php wp_footer(); ?>
</body>
</html>