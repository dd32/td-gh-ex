<?php
/**
 * For Mobile
 */
?>
<?php
	$main_bgheader_style = get_theme_mod( 'main_bgheader_style', 'gradient_header' );
	$main_header_gradient = get_theme_mod( 'main_header_gradient', 'gradient_2' );
	?>
	<?php   if ( ('img_header' == $main_bgheader_style )&& get_header_image() ) : ?>
<div class="mobile-header  show-for-small hide-for-large" data-interchange="[<?php echo esc_url( header_image());?>, small],[<?php echo esc_url( header_image());?>, large]" >
	<?php else:?>
		<div class="mobile-header  show-for-small hide-for-large <?php   if ( ('gradient_header' == $main_bgheader_style ) ) : ?> <?php echo $main_header_gradient ?> <?php endif;?> " >
			<?php endif;?>

	<div class="grid-container full ">
	<div class="title-bar">
  <div class="title-bar-left">
		<div class="off-canvas-content" data-off-canvas-content>
			  <button class="offcanvas-trigger menu-icon" type="button" data-open="offCanvasmobile">
	</div>
  </div>
  <!--site-title-->
  <div class="logo-wrap is-logo-image title-bar-center" itemscope="" itemtype="http://schema.org/Organization">
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
  </div>
  </div>
<!--site-title END-->
  <div class="title-bar-right">
		<div class="navbar-search">
			<button class="navbar-search-button" data-toggle="navbar-search-bar1 navbar-filter-icons-container">
				<i class="fa fa-search" aria-hidden="true"></i>
			</button>
      <div class="navbar-search-bar-container animated " id="navbar-search-bar1" data-toggler=".is-hidden" data-animate="fade-in fade-out" data-closable="" aria-expanded="true" style="display: none;">
      <?php get_search_form(); ?>
      <button class="close-button fast" data-close="">&times;</button>
      </div>
		</div>
 </div>


</div>
</div>
</div>


<div class="off-canvas-wrapper ">
  <div class="multilevel-offcanvas off-canvas position-left" id="offCanvasmobile" data-off-canvas data-transition="overlap">
    <button class="close-button" aria-label="Close menu" type="button" data-close>
     <span aria-hidden="false">&times;</span>
    </button>
    <?php bestblog_off_canvas_mobile(); ?>
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
