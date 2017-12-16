<?php
/**
 * Main Page template file
 **/

get_header();
$pagetitle = get_post_meta($post->ID, 'pagetitle', true);
if($pagetitle==''):     $pagetitle =1;      endif;
$page_title = get_theme_mod('pagetitle');

    if(!is_home() && is_front_page() && $page_title != 0 ) : ?>
    <div class="heading-wrap blog-heading-wrap">
        <div class="heading-layer">
            <div class="heading-title">
                <h4><?php the_title(); ?></h4>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 blog-article">
                <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content();
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        } ?>
                <?php endwhile;  ?> 
            </div>
        </div>
    </div>
<?php get_footer(); ?>