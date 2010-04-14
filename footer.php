<?php
/**
 * @package WordPress
 * @subpackage Belle
 */
?>
<?php
if ($_GET["dynamic"]!='true'): ?>
	<div id="footer">
    	<div id="footer-logo">
           <a href="<?php bloginfo('home'); ?>"><?php bloginfo('name'); ?></a>
        </div>
        <div id="credits">Powered by <a href="http://www.wordpress.org/">WordPress</a> and <a href="http://www.getbelle.com/">Belle</a> Design by <a href="http://www.usainstantpayday.com/" title="web design">Bad Credit Loans</a></span></div>
     </div>
</div>

<!-- Gorgeous design by Grigoruta Adrian - http://www.pixelstudio.ro/ -->
<?php wp_footer(); ?>
	<script type="text/javascript">
	//<![CDATA[
		function initBelle() {
			Belle.AjaxURL		= "<?php bloginfo('url'); ?>/"
			// Initialize Livesearch
			Belle.LiveSearch	= new LiveSearch( "Type and wait for search" )
			}
		jQuery(document).ready( function() { initBelle() })
	//]]>
	</script>

	
</body>
</html>
<?php endif; ?>