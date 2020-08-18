<?php get_header(); ?>

<?php get_template_part( 'menu'); ?>
 
    <div id="content">

        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
        <div class="post">

		<div class="postmetadata"> 

			<?php the_category(' '); ?>

			<?php
			$before = '';
			$seperator = ''; // blank instead of comma
			$after = '';

			the_tags( $before, $seperator, $after );
			?>

		</div>
			
		<h1 class="entry-title"><?php the_title(); ?></h1>

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
            <?php the_content(); ?>
			</div><!--ends entry-->
			
		<div class="pagenumber"><?php wp_link_pages(); ?></div>

	<?php endwhile; ?>
     
		<div class="comments-template"><?php comments_template(); ?>
			<?php paginate_comments_links(); ?> 
		</div>

	</div><!--ends post-->

<?php endif; ?>

  		<div class="navigation"><?php previous_post_link(' &laquo; %link ') ?>
		&nbsp; - &nbsp; <?php next_post_link(' %link &raquo; ') ?></div>

</div><!--ends content-->



<?php get_template_part( 'sidebar-post'); ?>
<?php get_footer(); ?>