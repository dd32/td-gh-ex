<?php
/**
 * The template for displaying the footer.
 *
 * @package	Anarcho Notepad
 * @since	2.5.2
 * @author	Arthur (Berserkr) Gareginyan <arthurgareginyan@gmail.com>
 * @copyright 	Copyright (c) 2013-2014, Arthur Gareginyan
 * @link      	http://mycyberuniverse.com/anarcho-notepad.html
 * @license   	http://www.gnu.org/licenses/gpl-3.0.html
 */
?>

<footer id="footer" role="contentinfo">

<div class="notepad-bottom"></div>

<div class="site-info">
<?php echo esc_html(get_theme_mod('site-info')); ?><br/>

<?php if(get_theme_mod('disable_anarcho_copy') == '0') {  ?>
	<a href="http://wordpress.org/themes/anarcho-notepad">Theme "Anarcho Notepad" designed and engineered by Arthur (Berserkr) Gareginyan.</a><br/>
<?php }  ?>
<br/>

<?php if(get_theme_mod('show_info_line') == '1') {  ?>
	<?php echo get_num_queries(); ?> <?php _e('queries in', 'anarcho-notepad'); ?> <?php timer_stop(1); ?> <?php _e('seconds', 'anarcho-notepad'); ?> / <?php echo round(memory_get_usage()/1024/1024, 2); ?> <?php _e('mb', 'anarcho-notepad'); ?><br/>
<?php }  ?>

<div class="scripts-footer">
	<?php echo get_theme_mod('scripts_footer'); ?>
</div>
</div>

<?php if(get_theme_mod('disable_top_button') == '0') {  ?>
	<a id="back-top" href="#top"><i class="fa fa-arrow-up fa-lg"></i></a>
<?php }  ?>

<?php wp_footer(); ?>

</footer>
</body>
</html>
