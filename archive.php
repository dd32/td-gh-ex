<?php 

/*
	Archive
	
	Creates the iFeature archive pages.
	
	Copyright (C) 2011 CyberChimps
*/

get_header(); ?>

<div id="content_wrap">

	<div id="content_left">
		
		<div class="content_padding">

		<?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h2>Archive for <?php the_time('F jS, Y'); ?></h2>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h2>Archive for <?php the_time('F, Y'); ?></h2>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h2 class="pagetitle">Author Archive</h2>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2 class="pagetitle">Blog Archives</h2>
			
			<?php } ?>

			<?php include (TEMPLATEPATH . '/sections/pagination.php' ); ?>

			<?php while (have_posts()) : the_post(); ?>
			
				<div <?php post_class() ?>>
				
						<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					
						<?php include (TEMPLATEPATH . '/sections/meta.php' ); ?>

						<div class="entry">
							<?php the_content(); ?>
							
							<?php 
								$hidefblike		= get_option('if_hide_fb_like') ?  : 'unchecked';
							?>
							<?php if ($hidefblike == 'unchecked' ):?>
							<div class="fb" >
								<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&layout=standard&show_faces=true&width=450&action=like&colorscheme=light" scrolling="no" frameborder="0"  allowTransparency="true" style="border:none; overflow:hidden; width:530px; height:28px"></iframe>
							</div>
							<?php endif;?>
							<!--end fb-->
						</div>

				</div><!--end post-->

			<?php endwhile; ?>

			<?php include (TEMPLATEPATH . '/sections/pagination.php' ); ?>
			
	<?php else : ?>

		<h2>Nothing found</h2>

	<?php endif; ?>
		</div><!--end content_padding-->
	</div><!--end content_left-->

	<div id="sidebar_right"><?php get_sidebar(); ?></div>
</div><!--end content_wrap-->

<div style=clear:both;></div>
<?php get_footer(); ?>