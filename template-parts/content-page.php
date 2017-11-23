<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Business_Consulting
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array('type-post') ); ?>>
	
		<?php
        /**
        * Hook - business_consulting_posts_blog_media.
        *
        * @hooked business_consulting_posts_blog_media - 10
        */
        do_action( 'business_consulting_posts_blog_media' );
        ?>
		<?php
        
        if ( 'post' === get_post_type() ) : ?>
        <div class="entry-meta">
        <?php business_consulting_posted_on(); ?>
        <?php
			echo ' <a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'" class="avatar_round">';
			echo get_avatar( get_the_author_meta('user_email'), $size = '70'); 
			echo ' </a>';
		?>
        </div><!-- .entry-meta -->
        <?php
        endif; ?>
	

	<div class="entry-content entry-block">
    
  
                            
		<?php
			
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bc-business-consulting' ),
				'after'  => '</div>',
			) );
			
		?>
      	
		<?php if ( get_edit_post_link() ) : ?>
        <div class="pull-right padding-top-35">
        <?php business_consulting_entry_footer(); ?>
        </div>
        <?php endif; ?>
        <div class="clearfix"></div>
	</div><!-- .entry-content -->

	
</article><!-- #post-<?php the_ID(); ?> -->
