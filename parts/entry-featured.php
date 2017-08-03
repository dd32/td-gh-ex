<?php
/**
 * Template for displaying a featured post/page on frontpage
 *
 * @package ariel
 */
$ariel_frontpage_featured_post_type = ariel_get_option( 'ariel_frontpage_featured_post_type' ); ?>

<div class="col-sm-6 col-md-3">
	<div id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

		<?php ariel_entry_thumbnail( 'ariel-featured' ); ?>

		<?php if ( $ariel_frontpage_featured_post_type == 'post' ) : ?>
			<?php ariel_entry_categories(); ?>
		<?php endif; // $ariel_frontpage_featured_post_type == 'post' ?>

		<?php ariel_entry_title(); ?>

		<?php ariel_entry_excerpt(); ?>

		<p class="entry-meta">
			<?php ariel_entry_author(); ?>
			<?php ariel_entry_separator('author_date'); ?>
			<?php ariel_entry_date(); ?>
			<?php if ( ! post_password_required() && comments_open() && $ariel_frontpage_featured_post_type == 'post' ) : ?>
				<?php ariel_entry_separator('date_comments'); ?>
				<?php ariel_entry_comments_link(); ?>
			<?php endif; // ! post_password_required() && comments_open() && $ariel_frontpage_featured_post_type == 'post' ?>
		</p><!-- entry-meta-->

	</div><!-- #post-<?php the_ID(); ?> -->
</div><!-- col-sm-6 col-md-3 -->