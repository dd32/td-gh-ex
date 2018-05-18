<?php
/*
 * Template Name: Atlast Business Home (via Customizer)
 * It is the homepage of our website. It works out of the box from the theme's customizer. :)
 */
$prefix = atlast_business_get_prefix();
get_header(); ?>
    <section id="content" class="content-area template-content" role="main">
        <div class="main-content">

            <!-- About section -->
            <?php $about_style = absint(get_theme_mod($prefix . '_about_section_style', 1)); ?>
            <?php
            if ($about_style != 1) {
                get_template_part('template-parts/custom-pages/homepage/about-section-' . $about_style);
            } else {

                get_template_part('template-parts/custom-pages/homepage/about-section');
            }
            ?>
            <!-- Services section -->

            <?php if (atlast_business_is_section_enabled('_enable_services_section')): ?>

                <section class="home-services pad-tb-80" id="home-services-section">
                    <div class="container grid-xl">
                        <div class="columns">
                            <div class="column col-12 text-center mb-100">
                                <?php if (atlast_business_get_citem('_services_section_title', 'Our Services') != false): ?>
                                    <h2 class="section-title">
                                        <?php echo esc_html(atlast_business_get_citem('_services_section_title')); ?>
                                    </h2>
                                <?php endif; ?>
                                <?php if (atlast_business_get_citem('_services_section_subtitle') != false): ?>
                                    <h3 class="section-subtitle">
                                        <?php echo esc_html(atlast_business_get_citem('_services_section_subtitle', 'Tailormade services for every client. We specialize in..')); ?>
                                    </h3>
                                <?php endif; ?>
                            </div>
                            <?php
                            $services_style = absint(get_theme_mod($prefix . '_services_section_style', 1));
                            get_template_part('template-parts/custom-pages/homepage/services/services-style-' . $services_style); ?>
                        </div>
                    </div>

                </section>

            <?php endif; ?>

            <!-- Services section -->

            <!-- Projects Section -->

            <?php if (atlast_business_is_section_enabled('_enable_projects_section')): ?>
                <section class="home-projects pad-tb-80" id="home-projects-section">
                    <div class="container grid-xl">
                        <div class="columns">
                            <div class="column col-12 text-center mb-100">
                                <?php if (atlast_business_get_citem('_projects_section_title', 'Latest Projects') != false): ?>
                                    <h2 class="section-title">
                                        <?php echo esc_html(atlast_business_get_citem('_projects_section_title')); ?>
                                    </h2>
                                <?php endif; ?>
                                <?php if (atlast_business_get_citem('_projects_section_subtitle') != false): ?>
                                    <h3 class="section-subtitle">
                                        <?php echo esc_html(atlast_business_get_citem('_projects_section_subtitle', 'You new project starts from here')); ?>
                                    </h3>
                                <?php endif; ?>
                            </div>
                            <?php get_template_part('template-parts/custom-pages/homepage/projects/projects-style-1'); ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <!-- Projects section ends here -->

            <!-- Gallery section -->
            <?php if (atlast_business_is_section_enabled('_enable_gallery_section')): ?>
                <section class="home-gallery pad-tb-80" id="home-gallery-section">
                    <div class="container grid-xl">
                        <div class="columns">
                            <div class="column col-12 text-center mb-100">
                                <?php if (atlast_business_get_citem('_gallery_section_title', 'Great Galleries') != false): ?>
                                    <h2 class="section-title">
                                        <?php echo esc_html(atlast_business_get_citem('_gallery_section_title', 'Great Galleries')); ?>
                                    </h2>
                                <?php endif; ?>
                                <?php if (atlast_business_get_citem('_gallery_section_subtitle', 'A picture is worth a thousand words') != false): ?>
                                    <h3 class="section-subtitle">
                                        <?php echo esc_html(atlast_business_get_citem('_gallery_section_subtitle', 'A picture is worth a thousand words')); ?>
                                    </h3>
                                <?php endif; ?>
                            </div>
                            <?php if (get_theme_mod('atlast_business_gallery_section_page', '') != ''):
                                $gallery_page = get_post(get_theme_mod('atlast_business_gallery_section_page', ''));
                                echo do_shortcode(wp_kses($gallery_page->post_content, atlast_business_allowed_HTML()));
                            endif; ?>

                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <!-- Gallery section ends here -->


            <!-- Team section -->
            <?php if (atlast_business_is_section_enabled('_enable_team_section')): ?>

                <section class="home-team pad-tb-80" id="home-team-section">
                    <div class="container grid-xl">
                        <div class="columns">
                            <div class="column col-12 text-center mb-100">
                                <?php if (atlast_business_get_citem('_team_section_title', 'Our Team') != false): ?>
                                    <h2 class="section-title">
                                        <?php echo esc_html(atlast_business_get_citem('_team_section_title')); ?>
                                    </h2>
                                <?php endif; ?>
                                <?php if (atlast_business_get_citem('_team_section_subtitle') != false): ?>
                                    <h3 class="section-subtitle">
                                        <?php echo esc_html(atlast_business_get_citem('_team_section_subtitle', 'Meet our team of experts')); ?>
                                    </h3>
                                <?php endif; ?>
                            </div>
                            <?php get_template_part('template-parts/custom-pages/homepage/team/team-style-1'); ?>
                        </div>
                    </div>
                </section>
                <!-- Team section ends -->
            <?php endif; ?>

            <!-- Testimonials Section-->
            <?php if (atlast_business_is_section_enabled('_enable_testimonials_section')): ?>
                <section class="home-testimonials pad-tb-80" id="home-testimonials-section">
                    <div class="container grid-lg">
                        <div class="columns">
                            <div class="column col-12 text-center mb-100">
                                <?php if (atlast_business_get_citem('_testimonials_section_title', 'Testimonials') != false): ?>
                                    <h2 class="section-title">
                                        <?php echo esc_html(atlast_business_get_citem('_testimonials_section_title', 'Client Testimonials')); ?>
                                    </h2>
                                <?php endif; ?>
                                <?php if (atlast_business_get_citem('_testimonials_section_subtitle', 'Don\'t take our word for it') != false): ?>
                                    <h3 class="section-subtitle">
                                        <?php echo esc_html(atlast_business_get_citem('_testimonials_section_subtitle', 'Don\'t take our word for it')); ?>
                                    </h3>
                                <?php endif; ?>
                            </div>
                            <?php get_template_part('template-parts/custom-pages/homepage/testimonials/testimonials-style-1'); ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <!-- Testimonials section ends -->
            <!-- Blog section -->
            <?php if (atlast_business_is_section_enabled('_enable_blog_section')): ?>
                <section class="home-blog pad-tb-80" id="home-blog-section">
                    <div class="container grid-xl">
                        <div class="columns">
                            <div class="column col-12 text-center mb-100">
                                <?php if (atlast_business_get_citem('_blog_section_title', 'Latest from the blog') != false): ?>
                                    <h2 class="section-title">
                                        <?php echo esc_html(atlast_business_get_citem('_blog_section_title', 'Latest from the blog')); ?>
                                    </h2>
                                <?php endif; ?>
                                <?php if (atlast_business_get_citem('_blog_section_subtitle', 'The latest news are here') != false): ?>
                                    <h3 class="section-subtitle">
                                        <?php echo esc_html(atlast_business_get_citem('_blog_section_subtitle', 'The latest news are here')); ?>
                                    </h3>
                                <?php endif; ?>
                            </div>
                            <?php get_template_part('template-parts/custom-pages/homepage/blog/blog-style-1'); ?>
                        </div>
                    </div>
                </section>
                <!-- Blog section ends -->
            <?php endif; ?>

        </div>
    </section>
<?php get_footer();