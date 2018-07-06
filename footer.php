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
            <p class="col-md-6 alignleft"><?php if(get_theme_mod('belfast_footer_cr_left')){
                echo esc_html(get_theme_mod( 'belfast_footer_cr_left' )); 
                }?>
				</p>
				
				<p class="col-md-6 alignright2">
				
                <?php if(get_theme_mod('belfast_footer_top')){
                    echo esc_html(get_theme_mod( 'belfast_footer_top' )); 
                }
				?> 
				<br/>
				<?php 
				$url   = 'https://jonnyjordan.com';
				
				$brand = '<a href="'.esc_url( $url ).'">Jonny Jordan</a>';
				
				echo sprintf( __( 'Belfast WordPress Theme, Copyright 2018 %s', 'belfast' ), $brand );
				?>
				
			</p> 
					
        </div>

</div> 

</footer>
	<?php wp_footer(); ?>   
</body>
</html>