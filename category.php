<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package Cryout Creations
 * @subpackage mantra
 * @since mantra 0.5
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">
<?php // static page hookup start ?>
<?php /*$cattitle = single_cat_title( '', false );?>
      <div id="welcome">
           <div>
     	  <h1><?php the_title(); ?></h1>
     	  <?php the_content(); ?>
           </div>
      </div>

<?php */ // static page hookup end ?>

				<h1 class="page-title"><?php
					printf( __( 'Category Archive: %s', 'mantra' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h1>

                    <?php   // display subcategories mod start
                         if (is_category()) {
                         $this_category = get_category($cat);
                           if (get_term_children($this_category->cat_ID) != "") { ?>
                               <h1 class="page-title"><?php
                               $cats = wp_list_categories('orderby=name&show_count=0&echo=0&style=none&title_li=&use_desc_for_title=1&child_of='.$this_category->cat_ID);
                               printf( __( 'Subcategories: %s', 'mantra' ), '<span>' . str_replace("<br />","&nbsp;",$cats) . '</span>' );
                           }
                         } ?></h1>
                    <?php // display subcategories mod end ?>

                         <?php $category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
