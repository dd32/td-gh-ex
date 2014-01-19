<?php
/**
 * @package Blue Sky
 */
?>
<?php
global $bluesky_options_settings;
$bs_options = $bluesky_options_settings;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php blue_sky_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">

		<?php if('excerpt' == $bs_options['content_layout']  ) : ?>
				<?php if ( has_post_thumbnail()) : ?>
				<div class="bs-thumbnail-wrapper">
				   <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
				   <?php the_post_thumbnail('full', array('class'=> 'img-responsive')); ?>
				   </a>
				</div>
				 <?php endif; ?>
				<?php the_excerpt(); ?>


        <?php else:?>
        	<?php if ( 'excerpt-thumb' == $bs_options['content_layout']  ): ?>
        		<div class="et-row row ">
        			<div class="et-row-left col-md-5 col-sm-5 col-xs-12">
	        			<?php if ( has_post_thumbnail()) : ?>
        				<div class="bs-thumbnail-wrapper excerpt-thumb">
        					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
        						<?php the_post_thumbnail('homepage-thumb'); ?>
        					</a>
        				</div>
        			<?php endif; ?>
        			</div>
        			<div class="et-row-right col-md-7 col-sm-7 col-xs-12">
        				<?php the_excerpt(); ?>
      				</div>
        		</div>


	        <?php else: ?>

		        	<?php if ( has_post_thumbnail()) : ?>
		        		<div class="bs-thumbnail-wrapper">
		        			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
		        				<?php the_post_thumbnail(); ?>
		        			</a>
		        		</div>
		        	<?php endif; ?>
					 		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'blue-sky' ) ); ?>
							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'blue-sky' ),
									'after'  => '</div>',
								) );
							?>
		        <?php endif; //end if excerpt-thumb ?>
        <?php endif; // end if content_layout ?>



	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'blue-sky' ) );
				if ( $categories_list && blue_sky_categorized_blog() ) :
			?>
				<?php
				if (!empty($categories_list)) {
					echo '<span class="bs-category">'.$categories_list.'</span>';
				}
				 ?>

			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'blue-sky' ) );
				if ( $tags_list ) :

			?>
				<?php
				if (!empty($tags_list)) {
					echo '<span class="bs-tags">'.$tags_list.'</span>';
				}
				 ?>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>




		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<?php
			echo '<span class="comments">';
			echo comments_popup_link( __('0 comment','blue-sky'), __('1 comment','blue-sky'), __('% comments','blue-sky') );
			echo '</span>';
			?>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'blue-sky' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
