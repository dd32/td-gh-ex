<?php get_header(); ?>

<div id="content">


	<div id="cat-description"><h1><?php _e('Search results','redesign'); ?></h1></div>

	<?php get_template_part( 'searchform'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry">

		<a href="<?php the_permalink(); ?>"><h1 class="entry-title"><?php the_title(); ?></h1></a>

		<div class="postmetadata2"> 
			<?php the_category( ' ' ); ?>
			<?php the_tags( ' ' ); ?>

			<span class="date updated">
			<a href="<?php the_permalink( ' ' ); ?>">
			<?php the_time( get_option('date_format') ); ?>
			</a>
			</span>

			<?php comments_popup_link(); ?>
		</div>

		<?php the_excerpt(); ?>

		</div><!--Ends entry-->

		</div><!--Ends post-->


<?php endwhile; else: ?>

<div class="mid-title"><?php _e('Try again, no articles matched your criteria.','redesign'); ?></div>

<?php endif; ?>

    	<div class="navigation">
        <?php posts_nav_link(); ?>
    	</div>

</div><!--Ends content-->

<?php get_template_part( 'sidebar-post'); ?>
<?php get_footer(); ?>