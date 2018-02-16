<?php get_header();
    get_template_part('template-parts/content/content-elements/titles/page-major-title'); ?>
    <section id="content" role="main">
        <div class="main-content pad-tb-60">
            <div class="container grid-xl">
                <div class="columns">
                    <?php if (have_posts()): while (have_posts()): the_post(); ?>
                        <div class="column col-8 col-sm-12">
                            <section id="content" role="main">

                                <?php do_action('atlast_business_before_page_content');

                                get_template_part('template-parts/content/page/page-style-1');

                                comments_template();

                                do_action('atlast_business_after_page_content'); ?>
                            </section>
                        </div>
                    <?php endwhile;
                    endif; ?>
                    <div class="column col-4 col-sm-12">
                        <aside id="aside" role="complementary">
                            <?php get_sidebar(); ?>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>