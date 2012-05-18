<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Simple Catch
 * @since Simple Catch 1.0
 */
?>
	<div id="footer">
    	<div class="layout-978">
			<?php //Displaying footer logo ?>
            <div class="col7 copyright no-margin-left">
				<?php if( function_exists( 'ci_footer_logo' ) ) :
						ci_footer_logo(); 
					  endif;	
				?>&copy; <?php _e( 'copyright', 'simplecatch' ); ?> <span><?php bloginfo('name')?></span> <?php echo date("Y"); ?>. <?php _e( 'All Right Reserved.', 'simplecatch' ); ?>
            </div><!-- .col7 -->
            
           <?php do_action( 'simplecatch_credits' ); ?>
            
		</div><!-- .layout-978 -->
	</div><!-- #footer -->
	<?php 
	if( function_exists( 'ci_footer_scripts' ) ):
		ci_footer_scripts();
	endif;
	?>        
<?php wp_footer(); ?>

 </body>
</html>