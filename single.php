<?php

/* 	SPARK Theme's Single Page to display Single Page or Post
	Copyright: 2014-2015, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since SPARK 1.0
*/


get_header(); ?>
<div id="container">
<div id="content">
          
		  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <p class="postmetadataw">Posted by: <?php the_author_posts_link() ?> | on <?php the_time('F j, Y'); ?></p> 
                        
            <div class="content-ver-sep"> </div>
            <div class="entrytext"><?php the_post_thumbnail('spark-category-thumb'); ?>
			<?php the_content(); ?>
            </div>
            <div class="clear"> </div>
            <div class="up-bottom-border">
            <?php  wp_link_pages( array( 'before' => '<div class="page-link"><span>' . 'Pages:' . '</span>', 'after' => '</div><br/>' ) ); ?>
            
             <p class="postmetadata">Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php the_tags('<br />Tags: ', ', ', '<br />'); ?></p><br />
            <div class="floatleft"><?php previous_post_link('&laquo; %link'); ?></div>
			<div class="floatright"><?php next_post_link('%link &raquo;'); ?></div><br /><br />
            <?php if ( is_attachment() ): ?>
            <div class="floatleft"><?php previous_image_link( false, '&laquo; Previous Image') ; ?></div>
			<div class="floatright"><?php next_image_link( false,  'Next Image &raquo;' ); ?></div> 
            <?php endif; ?>
          	</div>
			</div>
			<?php endwhile;?>
          	            
          <!-- End the Loop. -->          
        	
			<?php if (comments_open( $post->ID ) == true ): comments_template('', true); endif; ?>
            
</div>			
<?php get_sidebar(); ?>
<?php get_footer(); ?>