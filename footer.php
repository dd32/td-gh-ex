<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 * A D5 Creation Theme
 
 */
?>

	</div><!-- #main -->

	</div><!-- #page -->

<div id="background-bottom">
	<footer id="colophon" role="contentinfo">

			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with four columns of widgets.
				 */
				get_sidebar( 'footer' );
			?>


			<div id="creditline">
            
            <a href="http://d5creation.com/about/tos/" target="_blank">Terms of Use</a> |
<a href="http://d5creation.com/about/pp/" target="_blank">Privacy Policy</a> |  <a href="#" target="_blank">Sitemap</a>&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;
            
<!-- You are not allowed to edit or modify the following codes. If you want to modify the codes please contact to sales@d5creation.com" -->            
&copy; Copyright 2011-<script type="text/javascript">document.write(new Date().getFullYear())</script>: <a href="http://d5creation.com" target="_blank">D5 Creation</a>, All Rights Reserved. &nbsp;

Theme by: <a href="http://d5creation.com" target="_blank"><img  width="30px" src="http://d5creation.com/wp-content/d5/d5logofooter.png" /> <strong>D5 Creation</strong></a> | Powered by: <a href="http://wordpress.org" target="_blank">WordPress</a> 

				
			</div>
	</footer><!-- #colophon -->



<?php wp_footer(); ?>
</div> <!-- #background-bottom -->

</body>
</html>