<?php
/**
 * Column Post Widgets
 *
 * @since AcmePhoto 0.0.1
 *
 * @param null
 * @return array $acmephoto_post_number
 *
 */
if ( !function_exists('acmephoto_post_number') ) :
    function acmephoto_post_number() {
        $acmephoto_post_number =  array(
            4 => __( '4', 'acmephoto' ),
            8 => __( '8', 'acmephoto' ),
            15 => __( '12', 'acmephoto' )
        );
        return apply_filters( 'acmephoto_post_number', $acmephoto_post_number );
    }
endif;

/**
 * Custom columns of category with various options
 *
 * @package AcmeThemes
 * @subpackage AcmePhoto
 */
if ( ! class_exists( 'acmephoto_posts_col' ) ) {
    /**
     * Class for adding widget
     *
     * @package AcmeThemes
     * @subpackage AcmePhoto_posts_col
     * @since 0.0.1
     */
    class acmephoto_posts_col extends WP_Widget {

        /*defaults values for fields*/
        private $defaults = array(
            'title'                 => '',
            'acmephoto_cat_id' => '',
            'post_number'           => 3,
            'button_url'            => ''
        );

        function __construct() {
            parent::__construct(
            /*Base ID of your widget*/
                'acmephoto_posts_col',
                /*Widget name will appear in UI*/
                __('AT Posts Column', 'acmephoto'),
                /*Widget description*/
                array( 'description' => __( 'Show recents post or post from category', 'acmephoto' ), )
            );
        }
        /*Widget Backend*/
        public function form( $instance ) {
            $instance = wp_parse_args( (array) $instance, $this->defaults );
            /*default values*/
            $title = esc_attr( $instance[ 'title' ] );
            $acmephoto_selected_cat = esc_attr( $instance[ 'acmephoto_cat_id' ] );
            $post_number = absint( $instance[ 'post_number' ] );
            $button_url = esc_url( $instance[ 'button_url' ] );
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'acmephoto' ); ?>:</label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('acmephoto_cat_id'); ?>"><?php _e('Select Category', 'acmephoto'); ?></label>
                <?php
                $acmephoto_dropown_cat = array(
                    'show_option_none'   => __('From Recent Posts','acmephoto'),
                    'orderby'            => 'name',
                    'order'              => 'asc',
                    'show_count'         => 1,
                    'hide_empty'         => 1,
                    'echo'               => 1,
                    'selected'           => $acmephoto_selected_cat,
                    'hierarchical'       => 1,
                    'name'               => $this->get_field_name('acmephoto_cat_id'),
                    'id'                 => $this->get_field_name('acmephoto_cat_id'),
                    'class'              => 'widefat',
                    'taxonomy'           => 'category',
                    'hide_if_empty'      => false,
                );
                wp_dropdown_categories($acmephoto_dropown_cat);
                ?>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'post_number' ); ?>"><?php _e( 'Number', 'acmephoto' ); ?>:</label>
                <select class="widefat" id="<?php echo $this->get_field_id( 'post_number' ); ?>" name="<?php echo $this->get_field_name( 'post_number' ); ?>" >
                    <?php
                    $acmephoto_post_numbers = acmephoto_post_number();
                    foreach ( $acmephoto_post_numbers as $key => $value ){
                        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $post_number ); ?>><?php echo esc_attr( $value );?></option>
                        <?php
                    }
                    ?>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'button_url' ); ?>"><?php _e( 'Button Link Url', 'acmephoto' ); ?>:</label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'button_url' ); ?>" name="<?php echo $this->get_field_name( 'button_url' ); ?>" type="text" value="<?php echo $button_url; ?>" />
            </p>
            <?php
        }
        /**
         * Function to Updating widget replacing old instances with new
         *
         * @access public
         * @since 0.0.1
         *
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         * @return array
         *
         */
        public function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
            $instance['acmephoto_cat_id'] = ( isset( $new_instance['acmephoto_cat_id'] ) ) ? esc_attr( $new_instance['acmephoto_cat_id'] ) : '';
            $instance[ 'post_number' ] = absint( $new_instance[ 'post_number' ] );
            $instance[ 'button_url' ] = esc_url_raw( $new_instance[ 'button_url' ] );

            return $instance;
        }
        /**
         * Function to Creating widget front-end. This is where the action happens
         *
         * @access public
         * @since 0.0.1
         *
         * @param array $args widget setting
         * @param array $instance saved values
         * @return array
         *
         */
        public function widget($args, $instance) {
            $acmephoto_sidebar_id = $args['id'];
            $instance = wp_parse_args( (array) $instance, $this->defaults);

            $init_animate_title = '';
            $init_animate_content = '';
            if ( 'acmephoto-home' == $acmephoto_sidebar_id ){
                $init_animate_title = "init-animate animated fadeInUp";
                $init_animate_content = "init-animate animated fadeInLeft";
            }

            /*default values*/
            $title = apply_filters( 'widget_title', !empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
            $acmephoto_cat_id = esc_attr( $instance[ 'acmephoto_cat_id' ] );
            $post_number = absint( $instance[ 'post_number' ] );
            $button_url = esc_url( $instance[ 'button_url' ] );
            /**
             * Filter the arguments for the Recent Posts widget.
             *
             * @since 0.0.1
             *
             * @see WP_Query
             *
             */
            $acmephoto_cat_post_args = array(
                'posts_per_page'      => $post_number,
                'no_found_rows'       => true,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true
            );
            if( -1 != $acmephoto_cat_id ){
                $acmephoto_cat_post_args['cat'] = $acmephoto_cat_id;
            }
            $the_query = new WP_Query( $acmephoto_cat_post_args );
            echo $args['before_widget'];
            ?>
            <section id="<?php echo $acmephoto_sidebar_id;?>" class="<?php echo esc_attr( $acmephoto_sidebar_id ); ?>">
                <div class="container portfolio-container fullwidth-container">
                    <div class="main-title <?php echo esc_attr( $init_animate_title ); ?>">
                        <?php
                        if( !empty( $title ) ) {
                            echo $args['before_title'] .esc_html( $title ).$args['after_title'];
                        }
                        if( !empty( $sub_title ) ) { ?>
                            <p><?php echo esc_html( $sub_title ); ?></p>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="row fullwidth-row">
                        <?php
                        if ( $the_query->have_posts() ):
                            $i = 1;
                            while( $the_query->have_posts() ):$the_query->the_post();
                                if ( 'acmephoto-home-home' == $acmephoto_sidebar_id ){
                                    if ( $i == 1 ) {
                                        $init_animate_content = "init-animate animated fadeInDown";
                                    }
                                    elseif ( $i == 2 ) {
                                        $init_animate_content = "init-animate animated fadeInRight";
                                    }
                                }
                                if ( $i % 2 == 0 && $i > 1 ) {
                                    if ( 'acmephoto-home-home' == $acmephoto_sidebar_id ){
                                        $init_animate_content = "init-animate animated fadeInRight";
                                    }
                                }
                                $acmephoto_column = 'col-sm-3';
                                $acmephoto_no_image_post_thumb = get_template_directory_uri().'/assets/img/no-image-400-320.png';
                                ?>
                                <div class="portfolio-item <?php echo esc_attr( $acmephoto_column ); ?>">
                                    <div class="blog-item <?php echo esc_attr( $init_animate_content );?>">
                                        <?php
                                        if( has_post_thumbnail() ):
                                            $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'post-thumbnail' );
                                        else:
                                            $image_url[0] = $acmephoto_no_image_post_thumb;
                                        endif;
                                        ?>
                                        <div class="blog-img">
                                            <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
                                                <img src="<?php echo esc_url( $image_url[0] ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                            </a>
                                            <div class="at-hover">
                                                <div class="at-middle">
                                                    <div class="at-middle-block">
                                                        <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
                                                            <i class="round-icon fa fa-link fa-2x"></i>
                                                        </a>
                                                        <h3>
                                                            <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
                                                                <?php the_title(); ?>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $i++;
                            endwhile;
                            ?>
                            <div class="clearfix"></div>
                            <div class="init-animate fadeInDown at-btn-wrap">
                                <a class="btn btn-primary" href="<?php echo $button_url;?>">
                                    <?php _e( 'View More','acmephoto' ); ?>
                                </a>
                            </div>
                            <?php
                        endif;
                        wp_reset_query();
                        ?>
                    </div>
                </div>
            </section>
            <?php
            echo $args['after_widget'];
        }
    } // Class acmephoto_posts_col ends here
}
if ( ! function_exists( 'acmephoto_posts_col' ) ) :
    /**
     * Function to Register and load the widget
     *
     * @since 0.0.1
     *
     * @param null
     * @return null
     *
     */
    function acmephoto_posts_col() {
        register_widget( 'acmephoto_posts_col' );
    }
endif;
add_action( 'widgets_init', 'acmephoto_posts_col' );