<?php
//Let's determine which image size would be the best for the current user layout
$map = array(
      'col-1c'  => 'thumb-xxlarge',
      'col-2cl' => 'thumb-xlarge',
      'col-2cr' => 'thumb-xlarge',
      'col-3cm' => 'thumb-large',
      'col-3cl' => 'thumb-large',
      'col-3cr' => 'thumb-large'
);
$sb_layout = hu_get_layout_class();
$featured_img_size = array_key_exists( $sb_layout, $map ) ? $map[ $sb_layout ] : null;
//the featured img size is also used to generate a dynamic concatenated css class, featured-img-$featured_img_size
//for which the rule is defined assets/front/css/_parts/0_5_single_post_page.css
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
	<div class="post-inner post-hover">

		<div class="post-thumbnail featured-img-<?php echo $featured_img_size; ?>">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php hu_the_post_thumbnail( $featured_img_size ); // only difference to content.php ?>
				<?php if ( has_post_format('video') && !is_sticky() ) echo'<span class="thumb-icon"><i class="fa fa-play"></i></span>'; ?>
				<?php if ( has_post_format('audio') && !is_sticky() ) echo'<span class="thumb-icon"><i class="fa fa-volume-up"></i></span>'; ?>
				<?php if ( is_sticky() ) echo'<span class="thumb-icon"><i class="fa fa-star"></i></span>'; ?>
			</a>
			<?php if ( comments_open() && ( hu_is_checked('comment-count' ) ) ): ?>
				<a class="post-comments" href="<?php comments_link(); ?>"><span><i class="fa fa-comments-o"></i><?php comments_number( '0', '1', '%' ); ?></span></a>
			<?php endif; ?>
		</div><!--/.post-thumbnail-->

		<div class="post-meta group">
			<p class="post-category"><?php the_category(' / '); ?></p>
      <?php get_template_part('parts/post-list-author-date'); ?>
		</div><!--/.post-meta-->

		<h2 class="post-title entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h2><!--/.post-title-->

		<?php if ( ! hu_is_checked('featured-posts-full-content') ) : ?>
  		<div class="entry excerpt entry-summary">
  			<?php if ( hu_get_option('excerpt-length') != '0' ) { the_excerpt(); } ?>
  		</div><!--/.entry-->
		<?php else : ?>
      <div class="entry excerpt">
        <?php the_content() ?>
      </div><!--/.entry-->
    <?php endif; ?>

	</div><!--/.post-inner-->
</article><!--/.post-->