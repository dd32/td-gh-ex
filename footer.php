<?php get_sidebar(); ?>
<div class="clear"></div>
</div><!-- End: Container -->
<div id="cnt_bottom"></div>
<div class="clear"></div>
</div><!-- End:cnt_wrap -->
<div class="clear"></div>
<?php include (TEMPLATEPATH . "/menu.php"); ?>
<?php if(!WEBFISH_FOOTER_INSIDE_WRAPPER):?><div class="clear"></div></div><!-- End: wrap --><?php endif;?>

<div id="footer" role="contentinfo">
<?php get_sidebar("footer"); ?>
<div id="creds">
	<p id="webfish_creds">Copyright &copy; <?php echo date('Y'); ?> <a href="http://www.webfish.se" title="Hannes Hagman and Tobias Nyholm">WebFish</a>
	<?php 
		global $webfish_settings;
		if($webfish_settings['show-logo']=="1"):
	?>
	<img src='<?php echo get_template_directory_uri(); ?>/images/logo.png'>
	<?php endif;?>
	</p>
</div>
</div>

<?php if(WEBFISH_FOOTER_INSIDE_WRAPPER):?><div class="clear"></div></div><!-- End: wrap --><?php endif;?>

<?php wp_footer(); ?>
</body>
</html>
