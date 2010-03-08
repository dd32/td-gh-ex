<?php
/**
 * @package WordPress
 * @subpackage Belle
 */
?>
<?php
if (!is_search()): ?>
	<div id="footer">
    	<div id="footer-logo">
           <a href="<?php bloginfo('home'); ?>"><?php bloginfo('name'); ?></a>
        </div>
        <div id="credits">Powered by <a href="http://www.wordpress.org/">Wordpress</a> and <a href="http://www.getbelle.com/">Belle</a> <a href="<?php bloginfo('rss2_url'); ?>" class="rss">Entries RSS</a> and <a href="<?php bloginfo('comments_rss2_url'); ?>" class="rss">Comments RSS</a></span></div>
     </div>
</div>

<!-- Gorgeous design by Grigoruta Adrian - http://www.pixelstudio.ro/ -->
<?php wp_footer(); ?>
	<script type="text/javascript">
	//<![CDATA[
		function initBelle() {
			Belle.AjaxURL		= "<?php bloginfo('url'); ?>/"
			// Initialize Livesearch
			Belle.LiveSearch	= new LiveSearch( "Search" )
			}
		jQuery(document).ready( function() { initBelle() })
	//]]>
	</script>

	
</body>
</html>
<?php endif; ?>