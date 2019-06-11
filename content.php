<div id="post-<?php the_ID(); ?>" class="post" <?php post_class(); ?>>
<?php
if ( has_post_thumbnail() ) 
{
?>
<div class="columns">
<div class="column is-3" style="background-size:cover;background-position:center;background-image:url(<?php
$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
if (!empty($large_image_url[0])) {
	printf('%1$s', esc_url( $large_image_url[0]));
}
?>);">
</div>
<div class="column">
<?php
}
?>
<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<hr />
<?php the_excerpt(); ?>
<hr />
<div class="level">
<div class="level-left"><p><?php the_tags( '<span class="tag">', '</span> <span class="tag">', '</span>' ); ?></p></div>
<div class="level-right"><div class="level-item"><p class="footnote"><?php _e('Posted by', 'atreus'); ?> <a><?php the_author(); ?></a> <?php _e('on', 'atreus'); ?> <?php echo esc_html(get_the_date()); ?></p></div></div>
</div>
<?php
if ( has_post_thumbnail() ) 
{
?>
</div>
</div>
<?php
}
?>
</div>