<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
     <div class="blog_row_mn">
         
				
				
			
	<?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'twentytwelve_status_avatar', '50' ) ); ?>
    <div class="blog_con_mn">
	      <?php the_author(); ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'appointment' ) ); ?>
		</div>
  <footer >
			
			
			<?php edit_post_link( __( 'Edit', 'appointment' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->

  </div>
</article><!-- #post -->
