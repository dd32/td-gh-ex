<?php

/* 	Easy Theme's Single Page to display Single Page or Post
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Easy 1.0
*/


get_header(); ?><div id="container">  

<div id="content">
          
		  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?> 
            <h1 class="page-title"><?php the_title(); ?></h1>
            <p class="postmetadataw"><?php echo esc_html__('Posted by:', 'easy'); ?> <?php the_author_posts_link() ?> | <?php echo esc_html__(' on', 'easy'); ?> <?php the_time('F j, Y'); ?></p> 
            <div class="content-ver-sep"> </div>
            <div class="entrytext">
            	<?php the_post_thumbnail('category-thumb'); ?>
				<?php the_content(); ?>            
            	<div class="clear"></div>
            	<div class="up-bottom-border">
            		<?php  wp_link_pages( array( 'before' => '<div class="page-link"><span>' . esc_html__('Pages:', 'easy') . '</span>', 'after' => '</div><br/>' ) ); ?>
            		<p class="postmetadata"><?php echo esc_html__('Posted in', 'easy'); ?> <?php the_category(', ') ?> | <?php edit_post_link( esc_html__('Edit', 'easy'), '', ' | '); ?>  <?php comments_popup_link(esc_html__('No Comments &#187;', 'easy'), esc_html__('1 Comment &#187;', 'easy'), esc_html__('% Comments &#187;', 'easy')); ?> <?php the_tags('<br />'. esc_html__('Tags: ', 'easy'), ', ', '<br />'); ?></p>           		
            	</div>
            	<div id="page-nav">
            		<div class="floatleft pagenavlink"><?php previous_post_link('%link'); ?></div>
            		<div class="floatright pagenavlink"><?php next_post_link('%link'); ?></div>
            		<div class="clear"> </div>
            		<?php if ( is_attachment() ): ?>
            			<div class="floatleft pagenavlink"><?php previous_image_link( false, esc_html__('Previous Image','easy') ); ?></div>
						<div class="floatright pagenavlink"><?php next_image_link( false, esc_html__('Next Image','easy') ); ?></div> 
            		<?php endif; ?>
          		</div>
            </div>
			
			<?php endwhile;?>
          	            
          <!-- End the Loop. -->          
			<?php comments_template(); ?>
            
</div>			
<?php get_sidebar(); ?>
<?php get_footer(); ?>