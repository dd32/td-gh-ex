<?php
/**
 * Displays footer site info
 *
 * imonthemes
 * @subpackage bestblog
 * @since 1.0
 * @version 1.0
 */

?>
<!--COPYRIGHT TEXT-->
<div id="footer-copyright" class="footer-copyright-wrap">
	<?php
		 $bestblog_footertext = html_entity_decode(get_theme_mod ('bestblog_footertext'));
 ?>
 <div class="grid-container">
 <div class="callout margin-vertical-0 border-none copy-text">
	 <a target="_blank" href="<?php echo esc_url( 'http://imonthemes.com/'); ?>"><?php printf( esc_attr__( 'Theme by %s', 'best-blog' ), 'Themez WP' ); ?></a>
	 <?php echo $bestblog_footertext;?>Hi! I am a callout with no Borders
 </div>
 </div>
</div>
