<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package a-portfolio
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 <!-- Single blog -->
    <div class="blog">
        <div class="blog-head">
         <?php if(has_post_thumbnail()){
         	the_post_thumbnail(); 
         } ?>
        </div>
        <div class="blog-content">
               <?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
            <div class="meta">
                <span><i class="fa fa-user"></i><?php a_portfolio_posted_by();?></span>
                <span><i class="fa fa-calender"></i><?php echo get_the_date( 'd'); ?> <?php echo get_the_date( 'F'); ?> </span>
                <span><i class="fa fa-comments"></i><?php echo esc_html(get_comments_number());?></span>
            </div>
              <?php the_content();?>
        </div>
    </div>
    <!--/ End Single blog -->

    <div class="entry-content">
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">',
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'a-portfolio' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
