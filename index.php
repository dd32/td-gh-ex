<?php get_header(); ?>

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar 3') ) : else : ?>
<?php endif; ?>

 
    <div id="content">

        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


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
		<?php the_tags('Tags: ', ', '); ?> <br />
                
<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' , ', ''); ?>
                </p>

 
            </div>
        </div>
<?php endwhile; ?>
         
        <div class="navigation">
        <?php posts_nav_link(); ?> 
        </div>
         
        <?php endif; ?>
    </div>
<?php get_sidebar(); ?>
<?php get_template_part( 'sidebar2'); ?>
<?php get_footer(); ?>