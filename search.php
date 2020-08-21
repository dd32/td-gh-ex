<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Ariele_Lite
 */

get_header();
?>

<div id="primary" class="content-area col-lg-12">
    <main id="main" class="site-main">


				
    <?php
	$archive_title    = '';
	$archive_subtitle = '';

	if ( is_search() ) {
		global $wp_query;

		$archive_title = sprintf(
			'%1$s %2$s',
			'<span class="color-accent">' . __( 'Search Results for:', 'ariele-lite' ) . '</span>',
			get_search_query()
		);

		if ( $wp_query->found_posts ) {
			$archive_subtitle = sprintf(
				/* translators: %s: Number of search results */
				_n(
					'We found %s result for your search.',
					'We found %s results for your search.',
					$wp_query->found_posts,
					'ariele-lite'
				),
				number_format_i18n( $wp_query->found_posts )
			);
		} else { 
			$archive_subtitle = __( 'We could not find any results for your search. You can give it another try through the search form below using different search terms.', 'ariele-lite' );
		}
	
	}

	if ( $archive_subtitle ) {
		?>

    <header class="page-header">

        <div class="archive-header-inner section-inner medium">
            <?php if ( $archive_title ) { ?>
            <h1 class="page-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
            <?php } ?>

            <?php if ( $archive_subtitle ) { ?>
            <div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
            <?php } ?>
        </div><!-- .archive-header-inner -->

    </header><!-- .archive-header -->

    <?php
	}
				?>
	
	
        <?php
		if ( have_posts() ) : 
		
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content', 'search' );

			endwhile;

			get_template_part( 'template-parts/navigation/nav', 'blog' );

		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif; ?>

    </main>
</div>

<?php
get_footer();
