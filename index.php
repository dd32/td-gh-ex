<?php get_header(); ?>
<?php get_template_part( 'stripe'); ?>

    <div id="content">

        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


        <a href="<?php the_permalink(); ?>">
	<h1><?php the_title(); ?></h1>
	</a>

		<div id="postmetadata">
			<a href="<?php the_permalink(', '); ?>"><?php the_time( get_option('date_format') ); ?></a>, 
			<?php comments_popup_link(' Comment &raquo; ', '1 comment &raquo;', '% comments &raquo;'); ?>
			<?php edit_post_link(' EDIT '); ?>
		</div>

		<div id="postmetadata2"> 
			<?php the_category(', '); ?>
			<?php the_tags(', '); ?>
		</div>

		<div class="entry">   
                <?php the_post_thumbnail(); ?>
 		<!--<?php the_excerpt(); ?>-->
                <?php the_content(); ?>

		<div class="pagenumber">  
		<?php wp_link_pages(); ?> 
		</div>

               
   

	</div>

        </div>
<?php endwhile; ?>
         

         
        <?php endif; ?>

     <div class="navigation">
        <?php posts_nav_link(); ?> 
        </div>

    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>