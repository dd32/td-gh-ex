<?php
/**
 * Entry list
 *
 * All post formats for archive in list view
 *
 * @package ariel
 */
$ariel_example_content = ariel_get_option( 'ariel_example_content' ); ?>

<div <?php post_class( 'entry entry-grid view-list' ); ?>>
	<div class="row">
		<div class="col-sm-6">
			<?php if ( has_post_thumbnail() || $ariel_example_content ) : ?>
				<?php ariel_entry_thumbnail( 'ariel-grid' ); ?>
			<?php endif; ?>
		</div><!-- col-sm-6 -->
		<div class="col-sm-6">
			<?php ariel_entry_categories(); ?>
			<?php ariel_entry_title(); ?>
			<?php ariel_entry_excerpt(); ?>
			<br />

			<p class="entry-meta">
				<?php ariel_entry_author(); ?>
				<?php ariel_entry_separator('author_date'); ?>
				<?php ariel_entry_date(); ?>
				<?php ariel_entry_separator('date_comments'); ?>
				<?php ariel_entry_separator('author_comments'); ?>
				<?php ariel_entry_comments_link(); ?>
			</p><!-- entry-meta -->
		</div><!-- col-sm-6 -->
	</div><!-- row -->
</div><!-- entry entry-grid -->