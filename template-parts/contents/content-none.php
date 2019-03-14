<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

?>


<section class="no-results not-found">

	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing found', 'ba-tours-light' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
                /* translators: %s: URL to add new post. */
					__( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'ba-tours-light' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			
			echo '<p>' . esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ba-tours-light' ) . '</p>';
			get_search_form();
			
		else :

			echo '<p>' . esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ba-tours-light' ) . '</p>';
			get_search_form();
			
		endif;
		?>
		
	</div><!-- .page-content -->
</section><!-- .no-results -->
