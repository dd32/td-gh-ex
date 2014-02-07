<?php get_header(); ?>
	<div id="content" class="narrowcolumn">

<div id="header-responsive">		
<?php if (is_home()) { ?><h1><?php } ?>
<a class="blogtitle" href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo('name'); ?></a><?php if (is_home()) { ?></h1><?php } ?><div class="description"><?php bloginfo('description'); ?></div>
</div>

<?php is_tag(); ?>
		<?php if (have_posts()) : ?>
 	 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">Archives: <?php single_cat_title(); ?></h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<h2 class="pagetitle"><?php printf( __( 'Daily Archives: <span>%s</span>', 'quickchic'), get_the_date() ); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h2 class="pagetitle"><?php printf( __( 'Monthly Archives: <span>%s</span>', 'quickchic'), get_the_date( 'F Y' ) ); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<h2 class="pagetitle"><?php printf( __( 'Monthly Archives: <span>%s</span>', 'quickchic'), get_the_date( 'Y' ) ); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Author Archive</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Blog Archives</h2>
 	  <?php } ?>
		<?php while (have_posts()) : the_post(); ?>
			<div <?php post_class() ?>>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><a href="<?php the_permalink() ?>"><?php the_time(get_option('date_format')); ?>	</a>  by <?php the_author() ?> |  <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> | Filed in <?php the_category(', ') ?> <?php edit_post_link('Edit'); ?>  </small>
		<div class="entry">
<?php the_post_thumbnail('thumbnail', array('class' => 'thumb')); ?>
					<?php the_excerpt() ?>
   <?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
				</div>
			</div>
		<?php endwhile; ?>
		<div class="navigation">
			<div class="alignleft mainnav"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright mainnav"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
	<?php else : ?>
		<h2 class="center">Not Found</h2>
	<?php endif; ?>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>