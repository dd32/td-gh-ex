<?php
/**
 * The template part for header
 *
 * @package Automotive Centre 
 * @subpackage automotive-centre
 * @since Automotive Centre 1.0
 */
?>

<div class="container">
	<div id="header" class="menubar">
		<div class="header-menu <?php if( get_theme_mod( 'automotive_centre_sticky_header') != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
			<div class="row">
				<div class="<?php if( get_theme_mod( 'automotive_centre_search_hide_show') != '') { ?>col-lg-11 col-md-10 col-6"<?php } else { ?>col-lg-12 col-md-12 <?php } ?> ">
					<div class="toggle-nav mobile-menu">
					    <button role="tab" onclick="menu_openNav()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','automotive-centre'); ?></span></button>
					</div>
					<div id="mySidenav" class="nav sidenav">
			          	<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'automotive-centre' ); ?>">
				            <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="menu_closeNav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','automotive-centre'); ?></span></a>
				            <?php 
				              wp_nav_menu( array( 
				                'theme_location' => 'primary',
				                'container_class' => 'main-menu clearfix' ,
				                'menu_class' => 'clearfix',
				                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
				                'fallback_cb' => 'wp_page_menu',
				              ) ); 
				            ?>
			          	</nav>
			        </div>
				</div>
				<div class="col-lg-1 col-md-2 col-6">
			        <?php if( get_theme_mod( 'automotive_centre_search_hide_show') != '') { ?>
			        <div class="search-box">
			        	<span><a href="#"><i class="fas fa-search"></i></a></span>
			        </div>
			        <?php }?>
			    </div>
			</div>
		</div>
		<div class="serach_outer">
	      	<div class="closepop"><a href="#"><i class="far fa-window-close"></i></a></div>
	      	<div class="serach_inner">
	        	<?php get_search_form(); ?>
	      	</div>
	    </div>
	</div>
</div>