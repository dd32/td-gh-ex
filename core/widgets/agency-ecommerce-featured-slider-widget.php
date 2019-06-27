<?php
/**
 * Custom widgets.
 *
 * @package Agency_Ecommerce
 */

if (!class_exists('Agency_Ecommerce_Featured_Slider_Widget')) :

    /**
     * Latest Products widget class.
     *
     * @since 1.0.0
     */
    class Agency_Ecommerce_Featured_Slider_Widget extends Agency_Ecommerce_Widget_Base
    {

        function __construct()
        {
            $opts = array(
                'classname' => 'agency_ecommerce_featured_slider_widget',
                'description' => esc_html__('This widget will show slider on your website and it is compatible with Slider Widget Area', 'agency-ecommerce'),
            );

            parent::__construct('agency-ecommerce-featured-slider', esc_html__(' Featured Slider', 'agency-ecommerce'), $opts);

        }


        function widget_fields()
        {

            $product_type_choices = array(
                'latest' => esc_html__('Latest', 'agency-ecommerce'),
                'featured' => esc_html__('Featured', 'agency-ecommerce'),
            );
            $fields = array(
                'left_product_category' => array(
                    'name' => 'left_product_category',
                    'title' => esc_html__('Product Category for Left Slider', 'agency-ecommerce'),
                    'type' => 'dropdown_categories',
                    'args' => array(
                        'taxonomy' => 'product_cat',
                        'hide_empty' => true,
                        'orderby' => 'name',
                        'multiple' => true
                    ),
                ), 'left_number_of_products' => array(
                    'name' => 'left_number_of_products',
                    'title' => esc_html__('Number of products for Left Slider', 'agency-ecommerce'),
                    'type' => 'number',
                    'default' => 6,
                ), 'right_product_category' => array(
                    'name' => 'right_product_category',
                    'title' => esc_html__('Product Category for Right Slider', 'agency-ecommerce'),
                    'type' => 'dropdown_categories',
                    'args' => array(
                        'taxonomy' => 'product_cat',
                        'hide_empty' => true,
                        'orderby' => 'name',
                        'multiple' => true
                    ),
                ), 'right_number_of_products' => array(
                    'name' => 'right_number_of_products',
                    'title' => esc_html__('Number of products for Right Slider', 'agency-ecommerce'),
                    'type' => 'number',
                    'default' => 6,
                ), 'shop_now_text' => array(
                    'name' => 'shop_now_text',
                    'title' => esc_html__('Shop Now Text', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('Shop Now', 'agency-ecommerce'),
                ), 'disable_slider' => array(
                    'name' => 'disable_slider',
                    'title' => esc_html__('Disable Slider Mode', 'agency-ecommerce'),
                    'type' => 'checkbox',
                )


            );

            return $fields;
        }

        function widget($args, $instance)
        {
            $valid_widget_instance = Agency_Ecommerce_Widget_Validation::instance()->validate($instance, $this->widget_fields());

            $title = apply_filters('widget_title', empty($valid_widget_instance['title']) ? '' : $valid_widget_instance['title'], $valid_widget_instance, $this->id_base);

            $left_product_category = $valid_widget_instance['left_product_category'];

            $left_number_of_products = $valid_widget_instance['left_number_of_products'];

            $disable_slider = $valid_widget_instance['disable_slider'];


            echo $args['before_widget'];
            ?>
            <div class="feature-slider-wrap">
                <div class="main-slider-wrap">
                    <div class="main-slider" data-disable="<?php echo $disable_slider ? true : false ?>">

                        <?php
                        $is_woocommerce_active = true;
                        $left_query_args = $this->get_query_args($valid_widget_instance, 'left_product');
                        $left_slider_query = new WP_Query($left_query_args);
                        if ($left_slider_query->have_posts()):
                            while ($left_slider_query->have_posts()): $left_slider_query->the_post();
                                $this->slider_item($valid_widget_instance);
                            endwhile;

                        else:
                            $this->default_slider_item($valid_widget_instance);
                            $this->default_slider_item($valid_widget_instance);

                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <div class="slider-section-right">
                    <div class="verticle-slider" data-disable="<?php echo $disable_slider ? true : false ?>">
                        <?php
                        $is_woocommerce_active = true;

                        $right_query_args = $this->get_query_args($valid_widget_instance, 'right_product');
                        $right_slider_query = new WP_Query($right_query_args);
                        if ($right_slider_query->have_posts()):
                            while ($right_slider_query->have_posts()): $right_slider_query->the_post();
                                $this->slider_item($valid_widget_instance);
                            endwhile;
                        else:
                            $this->default_slider_item($valid_widget_instance);
                            $this->default_slider_item($valid_widget_instance);
                            $this->default_slider_item($valid_widget_instance);
                        endif;
                        wp_reset_postdata();
                        ?>

                    </div>
                </div>

            </div>

            <?php
            echo $args['after_widget'];

        }

        public function get_query_args($valid_widget_instance, $type = 'left_product')
        {
            $query_args = array();

            $query_args = array(
                'post_status' => 'publish',
                'post_type' => 'product',
                'no_found_rows' => 1,
                'meta_query' => array(),
                'tax_query' => array(
                    'relation' => 'AND',
                )
            );
            switch ($type) {
                case "left_product":

                    $query_args['posts_per_page'] = $valid_widget_instance['left_number_of_products'];
                    if (0 < count($valid_widget_instance['left_product_category'])) {
                        $query_args['tax_query'][] = array(
                            'taxonomy' => 'product_cat',
                            'field' => 'term_id',
                            'terms' => $valid_widget_instance['left_product_category'],
                        );

                    }
                    break;
                case "right_product":
                    $query_args['posts_per_page'] = $valid_widget_instance['right_number_of_products'];
                    if (0 < count($valid_widget_instance['right_product_category'])) {
                        $query_args['tax_query'][] = array(
                            'taxonomy' => 'product_cat',
                            'field' => 'term_id',
                            'terms' => $valid_widget_instance['right_product_category'],
                        );

                    }
                    break;
            }


            return $query_args;
        }

        public function slider_item($valid_widget_instance)
        {
            $image_url = '';
            if (has_post_thumbnail()) {

                $image_url_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                $image_url = isset($image_url_array[0]) ? $image_url_array[0] : '';
            }
            $image_url = empty($image_url) ? get_template_directory_uri() . '/assets/images/placeholder/agency-ecommerce-1400-653.jpg' : $image_url;

            $bg_image_style = 'background-image:url(' . ($image_url) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
            ?>
            <div class="slide-item" style="<?php echo $bg_image_style; ?>">
                <a class="ae-overlay"
                   href="<?php the_permalink() ?>"
                   title="<?php the_title() ?>"></a>
                <div class="slider-desc">
                    <div class="slider-details">
                        <div class="slide-title">
                            <a href="<?php the_permalink() ?>"
                               title="<?php the_title() ?>">
                                <?php the_title() ?></a>
                        </div>
                    </div>
                    <div class="slider-buttons">
                        <a href="<?php the_permalink() ?>"
                           class="slider-button primary" title="<?php the_title() ?>">
                            <?php echo esc_html($valid_widget_instance['shop_now_text']) ?></a>
                    </div>
                </div>
            </div>
            <?php
        }

        public function default_slider_item($valid_widget_instance)
        {
            $image_url = get_template_directory_uri() . '/assets/images/placeholder/agency-ecommerce-1400-653.jpg';
            $bg_image_style = 'background-image:url(' . ($image_url) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';

            ?>
            <div class="slide-item" style="<?php echo $bg_image_style; ?>">
                <a class="ae-overlay"
                   href="#"></a>
                <div class="slider-desc">
                    <div class="slider-details">
                        <div class="slide-title">
                            <a href="#"><?php echo __('Slider Title', 'agency-ecommerce'); ?></a>
                        </div>
                    </div>
                    <div class="slider-buttons">
                        <a href="#"
                           class="slider-button primary">
                            <?php echo esc_html($valid_widget_instance['shop_now_text']) ?></a>
                    </div>
                </div>
            </div>
            <?php

        }
    }

endif;