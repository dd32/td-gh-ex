<?php
/**
 * The TOP header
 */
?>
<div class="menu-outer">
	<div class="grid-container ">
	<div class="top-bar ">
  <div class="top-bar-left">
		<div class="off-canvas-content" data-off-canvas-content>
			  <button class="offcanvas-trigger menu-icon" type="button" data-open="offCanvasleft">
	</div>
  </div>
	<div class="main-menu-wrap">
		 <?php if ( has_nav_menu( 'primary' ) ) : ?>
		          <?php bestblog_top_nav(); ?>
						<?php else : ?>
							<ul class="horizontal menu  desktop-menu dropdown align-center">
	            <li id="add-menu" class="menu-item">
								<a  href=" <?php echo esc_url(admin_url( 'nav-menus.php' ));?>  "><?php echo __( 'Add a Primary Menu', 'best-blog' );?>  </a>
							</li>
						</ul>
		        <?php endif; ?>
</div>
  <div class="top-bar-right">
		<div class="navbar-search">
			<button class="navbar-search-button" data-toggle="navbar-search-bar navbar-filter-icons-container">
				<i class="fa fa-search" aria-hidden="true"></i>
			</button>
		</div>
 </div>
</div>
<div class="navbar-search-bar-container animated fadeIn " id="navbar-search-bar" data-toggler=".is-hidden" data-animate="fade-in fade-out" data-closable="" aria-expanded="true" style="display: none;">
<?php get_search_form(); ?>
<button class="close-button fast" data-close="">&times;</button>
</div>
</div>
</div>
