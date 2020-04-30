<?php
/**
* content-none.php
*
* @author    Franchi Design
* @package   Atomy
*/
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title mt-5">
		  <?php esc_html_e('Nothing Found','atomy');?>
		</h1>
	</header><!-- .page-header -->
	<div class="page-content <?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_body','container') )?>">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :
			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'atomy' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);
		elseif ( is_search() ) :
			?>
			<p>
			  <?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.','atomy');?>
			</p>
			<?php
			get_search_form();

		else :
			?>
			<p>
			 <?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.','atomy');?>	
			</p>
			<?php
			get_search_form();
		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
