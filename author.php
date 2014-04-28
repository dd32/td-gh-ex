<?php get_header(); 
$cherish_curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
?>
<div class="container">
	<h1 class="archive-title"><?php printf( __('About %s','cherish'), $cherish_curauth->display_name); ?></h1>
		<div class="author-info">
			<div class="author-avatar"><?php echo get_avatar($cherish_curauth->user_email, 60); ?></div>
				<div class="author-description"><?php echo $cherish_curauth->description; ?></div>
		</div>
		<h1 class="view_pots_by"><?php printf( __( 'View all posts by %s:', 'cherish' ), $cherish_curauth->display_name ); ?></h1>
		<?php
		while ( have_posts() ) : the_post(); ?> 
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<?php
					if (strpos($post->post_content,'[gallery') === false){
					   if ( has_post_thumbnail()) {
							the_post_thumbnail();
					   }
					}
					the_content(); 
					wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages: ', 'cherish' ), 'after' => '</div>' ) ); 
					cherish_meta();
					?>						
			</div>
<?php
		endwhile; 
next_posts_link('<div class="newer-posts">'. __('Next page &rarr;', 'cherish') . '</div>'); 
previous_posts_link('<div class="older-posts">' . __('&larr; Previous page','cherish') . '</div>'); 
?>
</div>
<?php
get_footer();
?> 