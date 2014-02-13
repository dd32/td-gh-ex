<?php

/* 	Smartia Theme's Single Page to display Single Page or Post
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Smartia 2.0
*/


get_header(); ?>
<div id="content">
<div class="pagead"><?php echo of_get_option('adcodesp', ''); ?></div>
          
		  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          
            <h1 class="page-title"><?php the_title(); ?></h1>
             <?php echo  of_get_option ('postedby', 'Posted by'); ?>: <b><?php the_author_posts_link() ?></b> | <?php echo  of_get_option ('postedon', 'Posted on'); ?>: <b><?php the_time('F j, Y'); ?></b>
 			<div class="entrytext"><?php the_post_thumbnail(); ?>
 			<?php smartia_content(); ?>
 			<div class="clear"> </div>
 			<?php  wp_link_pages( array( 'before' => '<div class="page-link"><span>' . of_get_option ('pages', 'Pages'). ': </span>', 'after' => '</div>' ) ); ?>
 			<div class="postmetadata"><?php echo  of_get_option ('postedin', 'Posted in'); ?> <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link(of_get_option ('nocomments', 'No Comments') . ' &#187;', of_get_option ('1comment', 'One Comment') . ' &#187;', '% ' . of_get_option ('comments', 'Comments') . ' &#187;'); ?> <?php the_tags('<br />' .  of_get_option ('tags', 'Tags') . ': ', ', ', '<br />'); ?></div>
 			</div>
 			<br />
			<div class="floatleft"><?php previous_post_link('&laquo; %link'); ?></div>
			<div class="floatright"><?php next_post_link('%link &raquo;'); ?></div><br /><br />
            <?php if ( is_attachment() ): ?>
            <div class="floatleft"><?php previous_image_link( false, '&laquo; ' . of_get_option('pi3', 'Previous Image') ); ?></div>
			<div class="floatright"><?php next_image_link( false,  of_get_option('ni3', 'Next Image') . ' &raquo;' ); ?></div> 
            <?php endif; ?>
          	<div class="content-ver-sep"></div><br />
			<?php endwhile;?>
          	            
          <!-- End the Loop. -->          
        	
			<?php comments_template('', true); ?>
            
</div>			
<?php get_sidebar(); ?>
<?php get_footer(); ?>