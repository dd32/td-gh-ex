<?php
/**
 * The template part for header
 *
 * @package Automotive Centre 
 * @subpackage automotive-centre
 * @since Automotive Centre 1.0
 */
?>

<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','automotive-centre'); ?></a></div>
<div class="container">
	<div id="header" class="menubar">
		<div class="row">
			<div class="<?php if( get_theme_mod( 'automotive_centre_header_search') != '') { ?>col-lg-11 col-md-10"<?php } else { ?>col-lg-12 col-md-12 <?php } ?> ">
				<div class="nav">
					<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
				</div>
			</div>
			<div class="col-lg-1 col-md-2">
		        <?php if( get_theme_mod( 'automotive_centre_header_search') != '') { ?>
		        <div class="search-box">
		        	<span><i class="fas fa-search"></i></span>
		        </div>
		        <?php }?>
		    </div>
		</div>
		<div class="serach_outer">
	      	<div class="closepop"><i class="far fa-window-close"></i></div>
	      	<div class="serach_inner">
	        	<?php get_search_form(); ?>
	      	</div>
	    </div>
	</div>
</div>