<?php
/**
 * For Mobile
 */
?>
<div class="mobile-header  show-for-small hide-for-large">
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
		<div class="off-canvas-social-wrap">
<a class="icon-facebook icon-social" title="facebook" href="http://bingo.themeruby.com/fashion/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a><a class="icon-twitter icon-social" title="twitter" href="http://bingo.themeruby.com/fashion/" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a><a class="icon-pinterest icon-social" title="pinterest" href="http://bingo.themeruby.com/fashion/" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a><a class="icon-instagram icon-social" title="instagram" href="http://bingo.themeruby.com/fashion/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a><a class="icon-snapchat icon-social" title="snapchat" href="http://bingo.themeruby.com/fashion/" target="_blank"><i class="fa fa-snapchat-ghost" aria-hidden="true"></i></a><a class="icon-reddit icon-social" title="reddit" href="http://bingo.themeruby.com/fashion/" target="_blank"><i class="fa fa-reddit" aria-hidden="true"></i></a><a class="icon-whatsapp icon-social" title="whatsapp" href="http://bingo.themeruby.com/fashion/" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a><a class="icon-rss icon-social" title="rss" href="http://bingo.themeruby.com/fashion/" target="_blank"><i class="fa fa-rss" aria-hidden="true"></i></a>	</div>
  </div>
</div>
