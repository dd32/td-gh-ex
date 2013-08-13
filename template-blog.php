<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>
			
			<div id="content">
		
				<div id="left-col">
				
			
<?php

global $more; $more = false; # some wordpress wtf logic

  $query_args = array(
     'post_type' => 'post', 
     'paged' => $paged
      );

query_posts($query_args);

if (have_posts()) : while (have_posts()) : the_post();

	$thumb_small = '';
								
	if(has_post_thumbnail(get_the_ID(), 'large'))
	{
	    $image_id = get_post_thumbnail_id(get_the_ID());
	    $thumb_small = wp_get_attachment_image_src($image_id, 'large', true);

	}
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="post-head">
	
			<h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'application' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			
			</div><!--post-heading end-->
			
			<div class="meta-data">
			
			<span class="meta-info"><?php application_posted_on(); ?> <?php _e('in', 'application'); ?> <?php the_category(', '); ?> | <?php comments_popup_link( __( 'Leave a comment', 'application' ), __( '1 Comment', 'application' ), __( '% Comments', 'application' ) ); ?></span>
			
			</div><!--meta data end-->
			<div class="clear"></div>

<div class="post-entry">

 	<?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) { ?> <div class="entry-thumbnail"> <?php the_post_thumbnail(array(620,240)); ?> </div> <?php } ?>
		
			<?php the_content( '<span class="read-more">'.__('Read More', 'application').'</span>' ); ?>
			<div class="clear"></div>
			<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'application' ), 'after' => '' ) ); ?>
				
				
				</div><!--post-entry end-->


		<?php comments_template( '', true ); ?>

</div> <!--post end-->

<?php endwhile; endif; ?>

<!--pagination-->
<?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); } 
		else { ?>
	<div class="navigation">
		<div class="alignleft"><?php next_posts_link( __( '&larr; Older posts', 'application' ) ); ?></div>
		<div class="alignright"><?php previous_posts_link( __( 'Newer posts &rarr;', 'application' ) ); ?></div>
	</div><?php } ?>

</div> <!--left-col end-->

<?php get_sidebar(); ?>

</div>
<!--content end-->
	
</div>
<!--wrapper end-->

<?php get_footer(); ?>