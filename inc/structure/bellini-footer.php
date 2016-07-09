<?php
function bellini_core_footer_layout(){ ?>
<?php
if(absint(get_option('bellini_footer_layout_type', 2)) == 2) :
	if(get_option('bellini_show_footer_logo', true) == true) : ?>
		<div class="col-md-12">
			<?php bellini_header_logo();?>
		</div>
	<?php endif;
	if(get_option('bellini_show_footer_copyright', true) == true) :
	if(get_option('bellini_copyright_text') == true) : ?>
		<div class="footer__copyright col-md-12 text-center">
	    	<?php echo do_shortcode(wp_kses_post(get_option( 'bellini_copyright_text'))); ?>
	    </div>
	<?php else: ?>
		<div class="col-md-12 text-center">
	    	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bellini' ) ); ?>">
	    		<?php printf( __( 'Proudly powered by %s', 'bellini' ), 'WordPress' ); ?>
	    	</a>
	    	<span class="sep"> | </span>
	    	<a href="<?php echo esc_url('http://pangolinthemes.com/'); ?>" rel="nofollow">
				<?php printf( __( 'Theme: %1$s by Pangolin Themes', 'bellini' ), 'Bellini'); ?>
			</a>
		</div>
	<?php endif;
	endif;
	    if(get_option('bellini_show_footer_social_menu', true) == true) : ?>
	        <div class="col-md-12">
	        <?php bellini_social_menu();?>
	        </div>
	<?php endif;
endif; // Layout 2
}