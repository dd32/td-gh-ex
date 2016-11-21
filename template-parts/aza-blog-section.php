<?php
/**
 * Blog Section
 */

$heading = get_theme_mod('aza_blog_title');
$subheading = get_theme_mod('aza_blog_subtitle');
$separator_top = get_theme_mod('aza_separator_blog_top', '1');
$separator_bottom = get_theme_mod('aza_separator_blog_bottom', '0');

$args = array (
    'posts_per_page' => 3,
);

?>
<section id="blog">
    <?php if( ! empty( $heading ) || ! empty( $subheading ) ) { ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 text-center">
                    <?php
                    if( ! empty( $heading ) ) {
                        echo '<h2>'. esc_html( $heading ).'</h2>';
                    }

                    if ( $separator_top ) {
                        echo "<hr class='separator'/>";
                    }

                    if( ! empty( $subheading ) ) {
                        echo '<p class="blog-p">'. esc_html( $subheading ) .'</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="container">
        <div class="row row-centered text-center">


            <?php $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    get_template_part( 'template-parts/blog-posts', get_post_format() );
                }
                wp_reset_postdata();
            } else {
                get_template_part( 'template-parts/content', 'none' );
                wp_reset_query();
            } ?>
        </div>

        <?php if( $separator_bottom ) {
            echo "<hr class='separator'/>";
        } ?>
    </div>
</section>
