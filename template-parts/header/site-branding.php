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
<?php $main_header_gradient = get_theme_mod( 'main_header_gradient', 'gradient_2' ); ?>
<div class="banner-warp <?php echo $main_header_gradient ?> hide-for-small-only hide-for-medium-only  ">
	<div class="grid-container">
		<div class="grid-x grid-padding-x ">
			<div class="small-12 cell">
				<div class="banner-inner">
					<div class="logo-wrap is-logo-image" >
						<div class="logo-inner">
							<?php the_custom_logo(); ?>
							<div class="site-branding">

										<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>


								<?php $description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
								<?php
								endif; ?>
							</div><!-- .site-branding -->
										<?php $social_icons_top = get_theme_mod( 'social_icons_top'); ?>
										<?php if( !empty( $social_icons_top ) ):?>
											<div class="header-social-wrap">
												<div class="header-social-inner">
											<?php foreach( $social_icons_top as $row ) : ?>
												<a <?php if ( true == get_theme_mod( 'open_social_tab', false ) ) : ?>target="_blank"<?php endif; ?> href="<?php echo esc_url($row['social_url']); ?>">
													<button class=" btn btn-just-icon btn-<?php echo esc_html( $row['social_icon']); ?>">
														<i class="fa fa-<?php echo esc_html( $row['social_icon']); ?>"></i>
													</button>
												</a>
											<?php endforeach; ?>
										</div>
									</div>
										<?php endif; ?>
						</div>
						<!--site-title END-->
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
			<?php $social_icons_top = get_theme_mod( 'social_icons_top'); ?>
			<?php if( !empty( $social_icons_top ) ):?>
				<div class="off-canvas-social-wrap">
				<?php foreach( $social_icons_top as $row ) : ?>
					<a <?php if ( true == get_theme_mod( 'open_social_tab', false ) ) : ?>target="_blank"<?php endif; ?> href="<?php echo esc_url($row['social_url']); ?>">
						<button class=" btn btn-simple btn-<?php echo esc_html( $row['social_icon']); ?>">
							<i class="fa fa-<?php echo esc_html( $row['social_icon']); ?>"></i>
						</button>
					</a>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
  </div>
</div>
