<?php
/**
 * Displays header site branding
 *
 * imonthemes
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

	<div class="banner-warp" >
	<div class="grid-container">
		<div class="grid-x grid-padding-x ">
			<div class="small-12 cell">
				<div class="banner-inner">
					<div class="logo-wrap is-logo-image" itemscope="" itemtype="http://schema.org/Organization">
						<div class="logo-inner">
							<?php the_custom_logo(); ?>
							<h1 class="site-title logo-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
							</h1>
							 <?php
										 $description = get_bloginfo( 'description', 'display' );
										 if ( $description || is_customize_preview() ) : ?>
												 <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
								 <?php endif; ?>
								 <div class="header-social-wrap">
									 <div class="header-social-inner">
										 <a class="icon-facebook icon-social has-tip bottom" href="#" target="_blank" data-tooltip aria-haspopup="true"  data-disable-hover="false" tabindex="1" data-fade-in-duration="200" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
										 <a class="icon-twitter icon-social has-tip bottom" href="#" target="_blank" data-tooltip aria-haspopup="true"  data-disable-hover="false" tabindex="1" data-fade-in-duration="200" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
										 <a class="icon-instagram icon-social has-tip bottom" href="#" target="_blank" data-tooltip aria-haspopup="true"  data-disable-hover="false" tabindex="1" data-fade-in-duration="200" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>									 </div>
						</div>
					</div><!--site-title END-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="off-canvas-wrapper ">
  <div class="multilevel-offcanvas off-canvas position-left" id="offCanvasleft" data-off-canvas data-transition="overlap">
    <button class="close-button" aria-label="Close menu" type="button" data-close>
     <span aria-hidden="false">&times;</span>
    </button>
    <?php bestblog_off_canvas_nav(); ?>
		<div class="off-canvas-social-wrap">
<a class="icon-facebook icon-social" title="facebook" href="http://bingo.themeruby.com/fashion/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a><a class="icon-twitter icon-social" title="twitter" href="http://bingo.themeruby.com/fashion/" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a><a class="icon-pinterest icon-social" title="pinterest" href="http://bingo.themeruby.com/fashion/" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a><a class="icon-instagram icon-social" title="instagram" href="http://bingo.themeruby.com/fashion/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a><a class="icon-snapchat icon-social" title="snapchat" href="http://bingo.themeruby.com/fashion/" target="_blank"><i class="fa fa-snapchat-ghost" aria-hidden="true"></i></a><a class="icon-reddit icon-social" title="reddit" href="http://bingo.themeruby.com/fashion/" target="_blank"><i class="fa fa-reddit" aria-hidden="true"></i></a><a class="icon-whatsapp icon-social" title="whatsapp" href="http://bingo.themeruby.com/fashion/" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a><a class="icon-rss icon-social" title="rss" href="http://bingo.themeruby.com/fashion/" target="_blank"><i class="fa fa-rss" aria-hidden="true"></i></a>	</div>
  </div>
</div>
