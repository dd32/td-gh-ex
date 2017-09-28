<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package aquaparallax
 */
?>

	</div><!-- #content -->
<footer>
<div class="aqa-footer-section">
 <div class="container"> <div class="row">
		<div class="col-md-3">
			<?php if(is_active_sidebar('aquaparallax_footer_sidebar1')){
			dynamic_sidebar('aquaparallax_footer_sidebar1');
			} ?>
		</div>
		<div class="col-md-3">
			<?php if(is_active_sidebar('aquaparallax_footer_sidebar2')){
			dynamic_sidebar('aquaparallax_footer_sidebar2');
			} ?>
		</div>
		<div class="col-md-3">
			<?php if(is_active_sidebar('aquaparallax_footer_sidebar3')){
			dynamic_sidebar('aquaparallax_footer_sidebar3');
			} ?>
		</div>
		<div class="col-md-3">
			<?php if(is_active_sidebar('aquaparallax_footer_sidebar4')){
			dynamic_sidebar('aquaparallax_footer_sidebar4');
			} ?>
		</div>
   </div>   </div>
 <div class="aqa-footer-top-section">
<div class="container">
<div class="row">
<div class="col-md-12">
    <ul class="footer-social-icons">	
	<?php if( get_theme_mod( 'aquaparallax_facebook_icon' ) == '1') { ?> 
	<li><a href="<?php echo esc_url( get_theme_mod( 'aquaparallax_facebook_link' ), 'aquaparallax' ); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>	    <?php } ?> 
    <?php if( get_theme_mod( 'aquaparallax_twitter_icon' ) == '1') { ?>
	<li><a href="<?php echo esc_url( get_theme_mod( 'aquaparallax_twitter_link' ), 'aquaparallax' ); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
	<?php } ?>
    <?php if( get_theme_mod( 'aquaparallax_google_icon' ) == '1') { ?>
	<li><a href="<?php echo esc_url( get_theme_mod( 'aquaparallax_google_link' ), 'aquaparallax' ); ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>	    <?php } ?>
    <?php if( get_theme_mod( 'aquaparallax_instagram_icon' ) == '1') { ?>
	<li><a href="<?php echo esc_url( get_theme_mod( 'aquaparallax_instagram_link' ), 'aquaparallax' ); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>	    <?php } ?>
    <?php if( get_theme_mod( 'aquaparallax_linked_icon' ) == '1') { ?>
	<li><a href="<?php echo esc_url( get_theme_mod( 'aquaparallax_linked_link' ), 'aquaparallax' ); ?>" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>	 <?php } ?>
    <?php if( get_theme_mod( 'aquaparallax_youtube_icon' ) == '1') { ?>
	<li><a href="<?php echo esc_url( get_theme_mod( 'aquaparallax_youtube_link' ), 'aquaparallax' ); ?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
    <?php } ?>

	</ul>
</div>
</div>
</div>
</div>
    <div class="aqa-footer-bottom">
    <div class="container">
    <div class="row">
    <div class="col-md-12">
 	<p><?php echo esc_html_e( 'Proudly powered by WordPress | Theme: Aquaparallax', 'aquaparallax' ); ?></p>
    </div>
    </div>
    </div>
    </div>
</div>

</footer>
</div>

<!-- Aquaparallax Wraper -->
<?php wp_footer(); ?>
</body>
</html>