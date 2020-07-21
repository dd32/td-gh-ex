<?php get_header();
get_template_part('index', 'bannerstrip');
?>
<!-- Page Title -->
<!-- End of Page Title -->

<div class="clearfix"></div>

<!-- Blog & Sidebar Section -->
<div id="content">
<section>
	<div class="container">
		<div class="row">

			<!--Blog Detail-->
			<div class="col-md-8 col-xs-12">
				<div class="site-content">
					<?php
                    if (have_posts()) :
                    // Start the Loop.
                    while (have_posts()) : the_post();

                    ?>

					<article <?php post_class('post'); ?>>
	<span class="site-author">
		<figure class="avatar">
		<?php $author_id=$post->post_author; ?>
			<a data-tip="<?php the_author() ;?>" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>" data-toggle="tooltip" title="<?php echo esc_attr(the_author_meta('display_name', $author_id)); ?>"><?php echo get_avatar(get_the_author_meta('ID'), 32); ?></a>
		</figure>
	</span>
		<header class="entry-header">
			<?php
                if (is_single()) :

                the_title('<h3 class="entry-title">', '</h3>');

                else:

                the_title(sprintf('<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>');

                endif;
                ?>
		</header>

		<div class="entry-meta">
			<span class="entry-date"><a href="<?php echo esc_url(home_url('/')); ?><?php echo esc_html(date('Y/m', strtotime(get_the_date()))); ?>"><time datetime=""><?php the_time('M j,Y');?></time></a></span>
			<span class="comments-link">
			<?php  comments_popup_link(esc_html__('Leave a comment', 'arzine')); ?></span>

			<?php if (get_the_tags()) { ?>
			<span class="tag-links"><?php the_tags('', ', ', ''); ?></span>
			<?php } ?>
		</div>

		<?php the_post_thumbnail(); ?>

	<div class="entry-content">
		<?php the_content(__('Read More', 'arzine')); ?>
	</div>
</article>


					<?php

                    endwhile; endif;
                    ?>
					<!--Comments-->
					<?php comments_template('', true);?>
					<!--/End of Comments-->

					<!--Comment Form-->


					<?php if (wp_link_pages(array('echo'=>0))):?>
					<div class="pagination_blog"><ul><?php
                        $args=array('before' => '<li>', ' after' => '</li>');
                        wp_link_pages($args); ?></ul>
					</div>
				<?php endif;?>

					<!--/End of Comment Form-->

				</div>
			</div>
			<!--/End of Blog Detail-->

			<!--Sidebar-->
			<?php get_sidebar(); ?>
			<!--/End of Sidebar-->

		</div>
	</div>
</section>
</div>
<!-- End of Blog & Sidebar Section -->
<?php get_footer(); ?>
