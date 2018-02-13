<?php
if ( ! function_exists( 'best_education_widget_section' ) ) :
    /**
     *
     * @since Best Education 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function best_education_widget_section() {
        $sidebar_home_1 = '';
        ?>
        <!-- Main Content section -->
        <?php if (! is_active_sidebar( 'sidebar-home-2') ) {
            $sidebar_home_1 = "full-width";
        }?>
        <?php if ( is_active_sidebar( 'sidebar-home-1') || is_active_sidebar( 'sidebar-home-2') ) {  ?>
            <section class="section-block section-block-upper">
                <div class="container">
                    <div class="row">
                        <div id="primary" class="content-area <?php echo esc_attr($sidebar_home_1); ?>">
                            <main id="main" class="site-main">
                                <?php dynamic_sidebar('sidebar-home-1'); ?>
                            </main>
                        </div>
                        <?php if (is_active_sidebar( 'sidebar-home-2') ) { ?>
                            <aside id="secondary" class="widget-area">
                                <?php dynamic_sidebar('sidebar-home-2'); ?>
                            </aside>
                        <?php } ?>
                    </div>
                </div>
            </section>
        <?php } ?>
    <?php
    }
endif;
add_action( 'best_education_action_sidebar_section', 'best_education_widget_section', 50 );