<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package bb wedding bliss
 */
?>
<header>
	<h2 class="entry-title"><?php echo esc_html(get_theme_mod('bb_wedding_bliss_nosearch_found_title',__('Nothing Found','bb-wedding-bliss')));?></h2>
</header>
<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<p><?php printf(esc_html__('Ready to publish your first post? Get started here.','bb-wedding-bliss'), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
	<?php elseif ( is_search() ) : ?>
		<p><?php echo esc_html(get_theme_mod('bb_wedding_bliss_nosearch_found_content',__('Sorry, but nothing matched your search terms. Please try again with some different keywords.','bb-wedding-bliss')));?></p><br />
		<?php if( get_theme_mod( 'bb_wedding_bliss_show_noresult_search',true) != '') { ?>
			<?php get_search_form(); ?>
		<?php } ?>
	<?php else : ?>
		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bb-wedding-bliss' ); ?></p><br />
		<?php get_search_form(); ?>
<?php endif; ?>