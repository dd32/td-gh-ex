<footer>
<div class="aqa-footer-section">
 <div class="container"> <div class="row">
		<div class="col-md-3">
			<?php if(is_active_sidebar('aqua_footer_sidebar1')){
			dynamic_sidebar('aqua_footer_sidebar1');
			} ?>
		</div>
		<div class="col-md-3">
			<?php if(is_active_sidebar('aqua_footer_sidebar2')){
			dynamic_sidebar('aqua_footer_sidebar2');
			} ?>
		</div>
		<div class="col-md-3">
			<?php if(is_active_sidebar('aqua_footer_sidebar3')){
			dynamic_sidebar('aqua_footer_sidebar3');
			} ?>
		</div>
		<div class="col-md-3">
			<?php if(is_active_sidebar('aqua_footer_sidebar4')){
			dynamic_sidebar('aqua_footer_sidebar4');
			} ?>
		</div>
   </div>   </div>
 <div class="aqa-footer-top-section">
<div class="container">
<div class="row">
<div class="col-md-12">
    <ul class="footer-social-icons">	
	<?php if( get_theme_mod( 'aqua_facebook_icon' ) == '1') { ?> 
	<li><a href="<?php echo esc_url( get_theme_mod( 'aqua_facebook_link' ), 'aquaparallax' ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>	    <?php } ?> 
    <?php if( get_theme_mod( 'aqua_twitter_icon' ) == '1') { ?>
	<li><a href="<?php echo esc_url( get_theme_mod( 'aqua_twitter_link' ), 'aquaparallax' ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
	<?php } ?>
    <?php if( get_theme_mod( 'aqua_google_icon' ) == '1') { ?>
	<li><a href="<?php echo esc_url( get_theme_mod( 'aqua_google_link' ), 'aquaparallax' ); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>	    <?php } ?>
    <?php if( get_theme_mod( 'aqua_instagram_icon' ) == '1') { ?>
	<li><a href="<?php echo esc_url( get_theme_mod( 'aqua_instagram_link' ), 'aquaparallax' ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>	    <?php } ?>
    <?php if( get_theme_mod( 'aqua_linked_icon' ) == '1') { ?>
	<li><a href="<?php echo esc_url( get_theme_mod( 'aqua_linked_link' ), 'aquaparallax' ); ?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>	 <?php } ?>
    <?php if( get_theme_mod( 'aqua_youtube_icon' ) == '1') { ?>
	<li><a href="<?php echo esc_url( get_theme_mod( 'aqua_youtube_link' ), 'aquaparallax' ); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
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
    <?php if( get_theme_mod( 'aqua_copyright_text' ) ) { ?>	
    <p><?php echo esc_html( get_theme_mod( 'aqua_copyright_text' ), 'aquaparallax' ); ?></p>
    <?php }
    else { ?>
    <p>Copyright @ <a href="http://brandfuge.com/category/wordpress-themes/" target="_blank">wordpress themes</a></p>
    <?php } ?>
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