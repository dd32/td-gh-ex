<?php get_header(); ?>

<div id="content">

<div class="post">

	<h2 class="entry"><?php _e('Search result','redesign'); ?></h2>

 <?php get_template_part( 'searchform'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="postmetadata"> 

			<?php the_category(' '); ?>

			<?php
			$before = '';
			$seperator = ''; // blank instead of comma
			$after = '';

			the_tags( $before, $seperator, $after );
			?>

		</div>
			
		<a href="<?php the_permalink(); ?>"><h1 class="entry-title"><?php the_title(); ?></h1></a>

		<div class="postmetadata2"> 

			<span class="date updated">
			<a href="<?php the_permalink(); ?>">
			<?php the_time( get_option('date_format') ); ?>
			</a>
			</span>
			
			<span class="vcard author">	
 			<span class="fn"><?php the_author_posts_link(); ?></span>
			</span>


			<?php
			if ( comments_open() ) :
  			comments_popup_link();
			endif;
			?>
			
		</div>

<?php the_excerpt(); ?>
<?php endwhile; else: ?>
	
	<div class="entry">
		<?php _e('Try again, no articles matched your criteria.','redesign'); ?>
	</div>

<?php endif; ?>




</div>

    	<div class="navigation">
        <?php posts_nav_link(); ?>
    	</div>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>