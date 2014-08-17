<?php
/**
 * Template Name: Front Page Template
 *
 * Description: Page template for the front page
 *
 * @package Avrora
 */

get_header(); ?>

    <section class="welcome-box">
        <div class="wrap">
            <div class="content">
                <div class="home-about-section">
                    <?php _e( '<h1 class="title">Hello we are happy to recommend you the <span>Avrora</span> wordpress theme</h1>
                    <p>Our theme is fully responsive and very easy to use</p>', "avrora" ); ?>
                </div>
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/img1.jpg" />
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/img2.jpg" />
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/img3.jpg" />
                        </li>
                    </ul>
                </div>
                <?php if (of_get_option('home_content', 'no entry') == 1) : ?>

                    <h1><?php the_title(); ?></h1>

                    <?php the_content(); ?>

                <?php endif; ?>
                <?php get_template_part('content', 'home'); ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>