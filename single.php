<?php

/* 	Socialia Theme's Single Page to display Single Page or Post
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Socialia 2.0
*/


get_header(); ?>
<div id="content">
          
		  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          
            <h1 class="page-title"><?php the_title(); ?></h1>
             <?php esc_html_e('Posted by','d5-socialia'); ?>: <b><?php the_author_posts_link() ?></b> | <?php esc_html_e('Posted on','d5-socialia'); ?>: <b><?php the_time('F j, Y'); ?></b>
 			<div class="entrytext"><?php the_post_thumbnail(); ?>
 			<?php d5socialia_content(); ?>
 			<div class="clear"> </div>
 			<?php  wp_link_pages( array( 'before' => '<div class="page-link"><span>' . esc_html__('Pages','d5-socialia'). ': </span>', 'after' => '</div>' ) ); ?>
 			<div class="postmetadata"><?php esc_html_e('Posted in','d5-socialia'); ?> <?php the_category(', ') ?> | <?php edit_post_link(esc_html__('Edit','d5-socialia'), '', ' | '); ?>  <?php comments_popup_link(esc_html__('No Comments','d5-socialia') . ' &#187;', esc_html__('One Comment','d5-socialia') . ' &#187;', '% ' . esc_html__('Comments','d5-socialia') . ' &#187;'); ?> <?php the_tags('<br />' .  esc_html__('Tags','d5-socialia') . ': ', ', ', '<br />'); ?></div>
 			</div>
 			<br />
			<div class="floatleft"><?php previous_post_link('&laquo; %link'); ?></div>
			<div class="floatright"><?php next_post_link('%link &raquo;'); ?></div><br /><br />
            <?php if ( is_attachment() ): ?>
            <div class="floatleft"><?php previous_image_link( false, '&laquo; ' . esc_html__('Previous Image','d5-socialia') ); ?></div>
			<div class="floatright"><?php next_image_link( false,  esc_html__('Next Image','d5-socialia') . ' &raquo;' ); ?></div> 
            <?php endif; ?>
          	<div class="content-ver-sep"></div><br />
			<?php endwhile;?>
          	            
          <!-- End the Loop. -->          
        	
			<?php if (d5socialia_get_option ('cpost', '' ) != '1' ): comments_template('', true); endif;?>
            
</div>			
<?php get_sidebar(); ?>
<?php get_footer(); ?>