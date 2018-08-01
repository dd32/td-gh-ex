<?php
/*
 * Get the variables from the options
 * because this page is set up here.
 */
$prefix          = atlast_agency_get_prefix();
$isEnabled       = get_theme_mod( $prefix . '_enable_blog_section', false );
$postPage = get_option('page_for_posts');
$sectionTitles   = atlast_agency_show_section_title( $postPage );

if ( $isEnabled==true ): ?>

    <div id="home-blog" class="homepage blog-section pad-tb-120 text-center">

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


        <?php get_template_part( 'template-parts/custom-pages/homepage/blog/blog-style-1'); ?>

    </div>

<?php endif; ?>