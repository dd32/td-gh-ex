<?php
if (has_post_thumbnail())
{
?>
<div class="columns" style="margin-top:25px;">
<div class="column">
<?php
}
?>
<div id="post-<?php the_ID(); ?>" class="post-single" <?php post_class(); ?>>
	
	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	<p class="footnote"><?php _e('Posted by', 'atreus'); ?> <a><?php the_author(); ?></a> <?php _e('on', 'atreus'); ?> <?php echo get_the_date(); ?></p>
	<hr />
	<?php the_content(); ?>
	<p><?php the_tags( '<span class="tag is-medium">', '</span> <span class="tag is-medium">', '</span>' ); ?></p>
	<hr />
</div>
<?php
if (has_post_thumbnail())
{
?>
</div>
<div class="column is-4" style="min-height:250px;max-height:750px;background-size:cover;background-position:center;background-image:url(<?php
$large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
if (!empty($large_image_url[0])) {
	printf('%1$s', esc_url( $large_image_url[0]));
}
?>);">

</div>
</div>
<?php
}
?>