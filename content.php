<?php
/**
 * @package HowlThemes
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<div class="postdcp"><?php drag_themes_posted_on(); ?></div>
<?php showstarrating();?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="thumbnail-container" itemprop="image">
		<?php 
 if ( get_the_post_thumbnail() != '' ) {
 	echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
  $source_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
  $resizedImage = aq_resize($source_image_url, 250, 200, true);
   echo '<img src="';
   echo $resizedImage;
   echo '" alt="';the_title();
   echo '" />';
    echo '</a>';
} elseif(catch_that_image()){
 $source_image_url = catch_that_image();
 $resizedImage = aq_resize($source_image_url, 250, 200, true);
 echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
 echo '<img src="';
 echo $resizedImage;
 echo '" alt="';the_title();
 echo '" />';
 echo '</a>';
}
else{
	 echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
    echo '<img src="';
    echo esc_url( get_template_directory_uri() );
    echo '/img/thumbnail.jpg" alt="';the_title();
    echo '" />';
    echo '</a>';
}
?>
</div>
<div class="entry-summary" itemprop="text">
<?php the_excerpt(); ?></div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="read-more-button"><a href="<?php the_permalink(); ?>">Read More <i class="fa fa-long-arrow-right"></i></a></div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->