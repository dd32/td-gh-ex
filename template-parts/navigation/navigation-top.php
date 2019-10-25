<?php
/**
 * Displays top navigation
 */
?>
<div class="header-menu">
	<div class="row m-0">
		<div class="col-lg-11 col-md-10">
			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'aagaz-startup' ); ?>">
				<button role="tab" class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
					<?php
						esc_html_e( 'Menu', 'aagaz-startup' );
					?>
				</button>

				<?php wp_nav_menu( array(
					'theme_location' => 'top',
					'menu_id'        => 'top-menu',
				) ); ?>				
			</nav>
		</div>
		<div class="col-lg-1 col-md-2">
			<div class="search-box">
				<a href="#" onclick="search_open()" ><i class="fas fa-search"></i>
		     		<span class="screen-reader-text"><?php esc_html_e( 'Search','aagaz-startup' );?></span>
		     	</a>
		    </div>
		</div>
	</div>
	<div class="serach_outer">
	    <a href="#" onclick="search_close()" class="closepop">X<span class="screen-reader-text"><?php esc_html_e( 'serach-outer','aagaz-startup' );?></span></a>
	    <div class="serach_inner">
	      <?php get_search_form(); ?>
	    </div>
	</div>
</div>