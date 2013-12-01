<?php
/**
 * The template for displaying the footer.
 *
 * @package	Anarcho Notepad
 * @since	2.1.5
 * @author	Arthur (Berserkr) Gareginyan <arthurgareginyan@gmail.com>
 * @copyright 	Copyright (c) 2013, Arthur Gareginyan
 * @link      	http://mycyberuniverse.tk/anarcho-notepad.html
 * @license   	http://www.gnu.org/licenses/gpl-3.0.html
 */
?>

<footer id="footer" role="contentinfo">

<div class="notepad-bottom"></div>

<div class="site-info">
<?php echo esc_html(get_theme_mod('site-info')); ?><br/>

<?php if(get_theme_mod('show_info_line') == 'true') {  ?>
<?php echo get_num_queries(); ?> queries in <?php timer_stop(1); ?> seconds / <?php echo round(memory_get_usage()/1024/1024, 2); ?> mb<br/>
<?php }  ?>
</div>

<?php echo esc_html(get_theme_mod('script_footer')); ?>

<a id="back-top" href="#top"><i class="fa fa-arrow-up fa-lg"></i></a>

<?php wp_footer(); ?>

</footer>
</body>
</html>