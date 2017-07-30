<?php
/**
 * Entry grid
 *
 * All post formats for archive in grid view
 *
 * @package ariel
 */
$ariel_example_content = ariel_get_option( 'ariel_example_content' );?>

<div <?php post_class( 'col-sm-6 view-grid' ); ?>>
	<div class="entry entry-grid">
		<?php if ( has_post_thumbnail() || $ariel_example_content ) : ?>
			<div class="entry-wrap-thumb">
				<div class="box-caption">
					<?php ariel_entry_categories(); ?>
					<?php ariel_entry_title(); ?>
				</div>
				<?php ariel_entry_thumbnail( 'ariel-grid' ); ?>
			</div>
		<?php elseif ( ! has_post_thumbnail() && ! $ariel_example_content ) : ?>
			<?php ariel_entry_categories(); ?>
			<?php ariel_entry_title(); ?>
		<?php endif; ?>

		<?php ariel_entry_excerpt(); ?>

		<p class="entry-meta">
			<?php ariel_entry_author(); ?>
			<?php ariel_entry_separator('author_date'); ?>
			<?php ariel_entry_date(); ?>
			<?php ariel_entry_separator('date_comments'); ?>
			<?php ariel_entry_separator('author_comments'); ?>
			<?php ariel_entry_comments_link(); ?>
		</p>
	</div>
</div>
