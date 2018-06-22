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
                }?> <br/>

				
				<?php 
				$url   = 'https://jonnyjordan.com';
				
				if( is_home() && !is_paged() ){
					$text = sprintf( '<a href="%s" >'.esc_html__( 'Jonny Jordan Web Design', 'belfast' ).'</a> '.esc_html__( 'Theme ', 'belfast' ).'.', esc_url( $url ) );
				}else{
					$text = __( 'belfast Theme. ', 'belfast' );
				}
				
				echo sprintf( $text.esc_html__( 'Developed by ', 'belfast' ).'<a href="%s">'.esc_html__( 'JonnyJordan', 'belfast' ).'</a>', $url  );
				?>
				
			</p> 
					
        </div>

</div> 

</footer>
	<?php wp_footer(); ?>   
</body>
</html>