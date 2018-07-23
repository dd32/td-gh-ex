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
				
				$brand = '<a href="'.esc_url( $url ).'">Jonny Jordan</a>';
				
				printf( __( 'Belfast Theme Powered by %s', 'belfast' ), $brand );
				?>
				
			</p> 
					
        </div>

</div> 

</footer>
	<?php wp_footer(); ?>   
</body>
</html>