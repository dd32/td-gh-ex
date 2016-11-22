<?php
/*
================================================================================================
SIlver Quantum - content-single.php
================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display
content. This content-single.php is the main content that will be displayed.

@package        SIlver Quantum WordPress Theme
@copyright      Copyright (C) 2014. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-thumbniail-banner">
        <?php the_post_thumbnail('silver-quantum-banner'); ?>
    </div>
    <header class="entry-header">
        <?php the_title(sprintf('<h1 class="entry-title">', '</h1>')); ?>
    </header>
    <div class="entry-excerpt">
        <?php the_excerpt(); ?>
        <?php if (!is_singular() || is_front_page()) { ?>
            <div class="continue-reading">
                <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                    <?php
                        printf(
                            wp_kses(__('Continue reading %s', 'silver-quantum'), array('span' => array('class' => array()))),
                            the_title('<span class="screen-reader-text">"', '"</span>', false)
                        );
                    ?>
                </a>
            </div>
        <?php } ?>
        <?php wp_link_pages(); ?>
    </div>
    <div class="entry-metadata">
        <?php silver_quantum_entry_posted_on(); ?>
    </div>
    <?php the_content(); ?>
    <div class="entry-footer">
        <?php silver_quantum_entry_taxonomies(); ?>
    </div>
    <?php wp_link_pages(); ?>
</article>
<?php comments_template(); ?>