<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bfastmag
 */

?>

<aside id="secondary" class="widget-area col-md-3 sidebar" role="complementary">
	<?php

	if (  is_active_sidebar( 'bfastmag-sidebar' ) ) {
	 	  		dynamic_sidebar( 'bfastmag-sidebar' );

		}else{




  		the_widget( 'bfastmag_themepacific_recent_category_widget',
			array(
				'title'  => __( 'Posts Widget', 'bfastmag' ),
				'count'  => true,
  			),
			array(
				'before_widget' => '<div id="tpcrn-cat-posts-widget-7" class="widget bfastmag_themepacific_recent_category_widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="title-border title-bg-line"><span>',
				'after_title'   => '<span class="line"></span></span></h3>',
			)
		);	
		

  		the_widget( 'WP_Widget_Categories',
			array(
				'title'  => __( 'Categories', 'bfastmag' ),
				'count'  => true,
  			),
			array(
				'before_widget' => '<div id="categories-3" class="widget widget_categories">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="title-border title-bg-line"><span>',
				'after_title'   => '<span class="line"></span></span></h3>',
			)
		);	

  		the_widget( 'WP_Widget_Text',
			array(
				'title'  => __( 'Example Widget', 'bfastmag' ),
				/* translators: Widgets area editing link */
 				'text'   => sprintf( __( 'This is an example widget to show how the %s looks by default. You can add custom widgets from the %swidgets screen%s in the admin. If custom widgets are added then this will be replaced by those widgets.', 'bfastmag' ), 'Sidebar', current_user_can( 'edit_theme_options' ) ? '<a href="' . admin_url( 'widgets.php' ) . '">' : '', current_user_can( 'edit_theme_options' ) ? '</a>' : '' ),
               
			),
			array(
				'before_widget' => '<div id="text-3" class="widget widget_text">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="title-border title-bg-line"><span>',
				'after_title'   => '<span class="line"></span></span></h3>',
			)
		);	

	}


 	?>
</aside><!-- #secondary -->
