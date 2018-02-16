<?php get_header();
    get_template_part('template-parts/content/content-elements/titles/archive-major-title'); ?>
    <div class="main-content pad-tb-60">
        <div class="container grid-xl">
            <div class="columns">
                <div class="column col-8 col-sm-12">
                    <section id="content" role="main">

                        <?php do_action('atlast_business_before_archive_content');

                        get_template_part('template-parts/content/archive/archive-style-1') ;

                        do_action('atlast_business_after_archive_content'); ?>
                    </section>
                </div>
                <div class="column col-4 col-sm-12">
                    <aside id="aside" role="complementary">
                        <?php get_sidebar(); ?>
                    </aside>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>