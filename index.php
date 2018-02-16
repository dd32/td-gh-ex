<?php get_header(); ?>
    <div class="main-content pad-tb-60">
        <div class="container grid-xl">
            <div class="columns">
                <div class="column col-8 col-sm-12">
                    <section id="content" role="main">

                        <?php do_action('atlast_business_before_index_content');

                        $blog_style = get_theme_mod(atlast_business_get_prefix().'_blog_layout','1');
                        get_template_part('template-parts/content/blog/blog-style-'.esc_attr($blog_style)) ;

                        do_action('atlast_business_after_index_content'); ?>
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