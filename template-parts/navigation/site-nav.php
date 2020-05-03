<?php 
/*
* Display Theme menus
*/
?>

<div class="menubar">
  	<div class="container right_menu">
  		<div class="row">
	    	<div class="menubox col-lg-8 col-md-6 col-2">
	      		<div class="innermenubox">
		          	<div class="toggle-nav mobile-menu">
		            	<span onclick="automobile_hub_open_nav()"><i class="fas fa-bars"></i></span>
		          	</div>
		         	<div id="mySidenav" class="nav sidenav">
			            <nav id="site-navigation" class="main-navigation" role="navigation">
			              	<a href="javascript:void(0)" class="closebtn mobile-menu" onclick="automobile_hub_close_nav()"><i class="fas fa-times"></i></a>
			              	<?php
			                	wp_nav_menu( array( 
			                  	'theme_location' => 'primary-menu',
			                  	'container_class' => 'menu clearfix' ,
			                  	'menu_class' => 'clearfix',
			                  	'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
			                  	'fallback_cb' => 'wp_page_menu',
			                	) ); 
			              	?>
			            </nav>
	          		</div>
          			<div class="clearfix"></div>
        		</div>
	    	</div>
			<div class="col-lg-3 col-md-5 col-6 social-media">
				<?php if( get_theme_mod( 'automobile_hub_facebook_url' ) != '') { ?>
					<a href="<?php echo esc_url( get_theme_mod( 'automobile_hub_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f"></i></a>
				<?php } ?>
				<?php if( get_theme_mod( 'automobile_hub_twitter_url' ) != '') { ?>
					<a href="<?php echo esc_url( get_theme_mod( 'automobile_hub_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
				<?php } ?>
				<?php if( get_theme_mod( 'automobile_hub_google_url' ) != '') { ?>
					<a href="<?php echo esc_url( get_theme_mod( 'automobile_hub_google_url','' ) ); ?>"><i class="fab fa-google-plus-g"></i></a>
				<?php } ?>
				<?php if( get_theme_mod( 'automobile_hub_youtube_url' ) != '') { ?>
					<a href="<?php echo esc_url( get_theme_mod( 'automobile_hub_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i></a>
				<?php } ?>
				<?php if( get_theme_mod( 'automobile_hub_pint_url' ) != '') { ?>
					<a href="<?php echo esc_url( get_theme_mod( 'automobile_hub_pint_url','' ) ); ?>"><i class="fab fa-pinterest"></i></a>
				<?php } ?>
			</div>
	    	<div class="search-box col-lg-1 col-md-1 col-2">
		        <span><a href="#"><i class="fas fa-search"></i></a></span>
	      	</div>
	    </div>
	    <div class="serach_outer">
	      	<div class="serach_inner">
	        	<?php get_search_form(); ?>
	        </div>
      	</div>
  	</div>
</div>