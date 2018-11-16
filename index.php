<?php get_header(); ?>
<?php get_template_part( 'stripe'); ?>

    <div id="content">

        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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


			<div class="entry">   
                <?php the_post_thumbnail(); ?>
                <?php the_content(); ?>
			</div>
			
		<div class="pagenumber">  
		<?php wp_link_pages(); ?> 
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