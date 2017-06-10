<?php if ( ashe_options( 'top_bar_label' ) === true ) : ?>
<div id="top-bar" class="clear-fix">
	<div <?php echo ashe_options( 'general_header_width' ) === 'contained' ? 'class="boxed-wrapper"': ''; ?>>
		
		<?php
		if ( ashe_options( 'top_bar_show_menu' ) === true ) {
			if ( has_nav_menu('top') ) {
				wp_nav_menu( array(
					'theme_location' 	=> 'top',
					'menu_id' 		 	=> 'top-menu',
					'menu_class' 		=> '',
					'container' 	 	=> 'nav',
					'container_class'	=> 'top-menu-container',
				) );
			} else {
				echo '<ul id="top-menu">';
					echo '<li>';
						echo '<a href="'. esc_url( home_url('/') .'wp-admin/nav-menus.php' ) .'">'. esc_html__( 'Set up Menu', 'ashe' ) .'</a>';
					echo '</li>';
				echo '</ul>';
			}
		}
		
		if ( ashe_options( 'top_bar_show_socials' ) === true ) {	
			ashe_social_media( 'top-bar-socials' );
		}
		?>

	</div>
</div><!-- #top-bar -->
<?php endif; ?>
