<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage belfast
 * @since belfast 1.0
 */
?>
	</div><!-- #main -->
   
</div>
<footer> 
<div class="container">
        <div class="copyright col-md-12 col-sm-8">
				
			<p class="col-md-6 alignright2">
				<?php 
				$url   = 'https://jonnyjordan.com';
				
				printf( '%s <a href="%s">%s</a>', esc_html__( 'Belfast Theme Powered by', 'belfast' ), esc_url( $url ),esc_html__( 'Jonny Jordan', 'belfast' ) );
				?>
			</p> 
					
        </div>

</div> 

</footer>
	<?php wp_footer(); ?>   
</body>
</html>