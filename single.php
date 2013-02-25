<?php get_header(); ?>
 
    <div id="content">
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
        <div class="post">

                <div class="date">
                <?php the_time( get_option('date_format') ); ?>
                </div>

        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <div class="entry">   
                <?php the_post_thumbnail(); ?>
                <?php the_content(); ?>
		<?php wp_link_pages(); ?>


                <p class="postmetadata">
                Author: <?php the_author(); ?>, 
		Category: <?php the_category(', ') ?>, 
		<?php the_tags('Tags: ', ', '); ?><br/>
                
<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' , ', ''); ?>, <?php paginate_comments_links(); ?>
                </p>


 
            </div>




 
            <div class="comments-template">
                <?php comments_template(); ?>
            </div>
    </div>
 
<?php endwhile; ?>
     
    <div class="navigation">  

        <?php previous_post_link(' &laquo; %link &laquo; ') ?> 

	 Previous - Next article
	
	<?php next_post_link(' &raquo; %link &raquo; ') ?>, 

    <br><a href="<?php bloginfo('rss2_url'); ?>">News RSS</a>, <a href="post_comments_feed_link()">Comments RSS</a></br>
	
	</div>

<?php endif; ?>
</div>
 

<?php get_sidebar(); ?>
<?php get_template_part( 'sidebar2'); ?>
<?php get_footer(); ?>