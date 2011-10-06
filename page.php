<?php
/**
 * @package Babylog
 */

get_header(); ?>

	<div id="content" class="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			
			<div class="post_header">
				<h2 class="page_title">
					<?php the_title(); ?>
				</h2>
			</div>
			
			<div class="entry">
            	<?php if( wp_list_pages( 'child_of='.$post->ID.'&echo=0' ) ) { ?>
                	<ul>
                		<?php wp_list_pages( 'title_li=&child_of='.$post->ID.'&depth=1' ); ?></ul>
				<?php } ?> 
				
				<?php the_content('<p>' . __( 'Read the rest of this entry' , 'babylog' ) . ' &raquo;</p>'); ?>
				
				<?php wp_link_pages( array( 'before' => '<p class="clear"><strong>' . __( 'Pages:' , 'babylog' ) . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) ); ?>
			</div>
			
			<?php if( $post->post_parent ) { 
				echo '<p class="clear"><a href="' . get_permalink( $post->post_parent ) . '">&laquo; ' . get_the_title( $post->post_parent ) . '</a></p>' ; 
				} ?>
				
				<?php edit_post_link( __( 'Edit this entry', 'babylog' ), '<p class="clear">', '</p>'); ?>
			
            <?php if ( comments_open() ) comments_template(); ?>
		</div>
		<?php endwhile; endif; ?>    
    
	</div>
		
<?php get_sidebar(); ?>

<?php get_footer(); ?>