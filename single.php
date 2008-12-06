<?php get_header(); ?>

<?php include('menu.php');?>
<?php include('left_sidebar.php');?>

<div id="container">

	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">

			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

			<div class="entry">

                                <p class="date">
<?php _e('Posted By '); ?> <?php the_author_posts_link(); ?> on <?php the_time(__('F j, Y')); ?>  <?php edit_post_link('Edit', ' &#124; ', ''); ?> 
				</p>

				<?php the_content(); ?>
				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>

				<p class="postmetadata">
<span class="categories"><?php _e('Categories: '); ?> <?php the_category(', '); ?></span>
                   <br />
<span class="tags"><?php _e('Tags: '); ?> <?php the_tags('', ', ', ''); ?></span>
				</p>
                                
			</div>
                                     
         <div id="author-box">
	<h2><?php _e('About The Author'); ?></h2>
<?php
	$author_email = get_the_author_email();
	echo get_avatar($author_email, '80', 'wavatar');
?>
	<h6><?php the_author_posts_link(); ?></h6>
	<?php the_author_description(); ?>
        </div>        

                            
                        <div class="comments-template">
                              <h2>Comments</h2>
                              <?php comments_template(); ?>
                        </div>

		</div>

	<?php endwhile; ?>

		<div class="navigation">
			<?php previous_post_link('&laquo; %link') ?> &nbsp; &nbsp; <?php next_post_link(' %link &raquo;') ?>
		</div>

	<?php else : ?>

		<div class="post">
			<h2><?php _e('Not Found'); ?></h2>
		</div>

	<?php endif; ?>

</div>

<?php include('right_sidebar.php');?>

<?php get_footer(); ?>