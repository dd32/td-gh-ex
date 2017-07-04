<?php if ( ashe_options( 'main_nav_label' ) === true ) : ?>
<div id="main-nav" class="clear-fix" data-fixed="<?php echo ashe_options( 'main_nav_fixed' ); ?>">

	<div <?php echo ashe_options( 'general_header_width' ) === 'contained' ? 'class="boxed-wrapper"': ''; ?>>	
		
		<!-- Alt Sidebar Icon -->
		<?php if ( ashe_options( 'main_nav_show_sidebar' ) === true ) : ?>
		<div class="main-nav-sidebar">
			<div>
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
		<?php endif; ?>


		<!-- Icons -->
		<div class="main-nav-icons">
			<?php
			if ( ashe_options( 'main_nav_show_socials' ) === true ) {	
				ashe_social_media( 'main-nav-socials' );
			} 
			?>

			<?php if ( ashe_options( 'main_nav_show_search' ) === true ) : ?>
			<div class="main-nav-search">
				<i class="fa fa-search"></i>
				<i class="fa fa-times"></i>
				<?php get_search_form(); ?>
			</div>
			<?php endif; ?>
		</div>


		<!-- Menu -->
		<span class="mobile-menu-btn">
			<i class="fa fa-chevron-down"></i>
		</span>

		<?php // Navigation Menus

		if ( has_nav_menu('main') ) {

			wp_nav_menu( array(
				'theme_location' 	=> 'main',
				'menu_id'        	=> 'main-menu',
				'menu_class' 		=> '',
				'container' 	 	=> 'nav',
				'container_class'	=> 'main-menu-container',
			) );

			wp_nav_menu( array(
				'theme_location' 	=> 'main',
				'menu_id'        	=> 'mobile-menu',
				'menu_class' 		=> '',
				'container' 	 	=> 'nav',
				'container_class'	=> 'mobile-menu-container',
			) );

		} else {
			echo '<ul id="main-menu">';
				echo '<li>';
					echo '<a href="'. esc_url( home_url( '/' ) .'wp-admin/nav-menus.php' ) .'">'. esc_html__( 'Set up Menu', 'ashe' ) .'</a>';
				echo '</li>';
			echo '</ul>';
		}
		
		?>

	</div>

</div><!-- #main-nav -->
<?php endif; ?>