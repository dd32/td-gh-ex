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
	<?php $bestblog_footertext = html_entity_decode(get_theme_mod ('bestblog_footertext'));?>
	<div class="grid-container">
		<div class="callout margin-vertical-0 border-none copy-text">
			<?php echo $bestblog_footertext;?>
			<a target="_blank" href="<?php echo esc_url( 'https://www.yangiz.fr'); ?>"><?php printf( esc_attr__( 'Theme by %s', 'best-blog' ), 'Yangiz' ); ?></a>
		</div>
	</div>
</div>
