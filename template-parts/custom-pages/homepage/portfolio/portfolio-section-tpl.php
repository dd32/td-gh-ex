<?php
$prefix          = atlast_agency_get_prefix();
$isEnabled       = get_theme_mod( $prefix . '_enable_portfolio_section', false );
$portfolioParent = absint( get_theme_mod( $prefix . '_portfolio_parent_page', '' ) );
$portfolioStyle  = absint( get_theme_mod( $prefix . '_portfolio_style', 1 ) );
$sectionTitles   = atlast_agency_show_section_title( $portfolioParent );
if ( $isEnabled == true ):
	?>
    <div id="home-works" class="homepage portfolio-section pad-tb-120 text-center">

		<?php if ( $sectionTitles != false ): ?>
            <div class="heading-container">
				<?php if ( ! empty( $sectionTitles['title'] ) ): ?>
                    <h3>
						<?php echo $sectionTitles['title']; ?>
                    </h3>
				<?php endif; ?>
				<?php if ( ! empty( $sectionTitles['excerpt'] ) ): ?>
                    <h4><?php echo $sectionTitles['excerpt']; ?></h4>
				<?php endif; ?>
            </div>
		<?php endif; ?>


		<?php get_template_part( 'template-parts/custom-pages/homepage/portfolio/portfolio-style-' . $portfolioStyle ); ?>

    </div>
<?php endif; ?>