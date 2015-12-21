<?php
/**
 * Dynamic css
 *
 * @since acmeblog 1.1.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmeblog_dynamic_css' ) ) :

    function acmeblog_dynamic_css() {

        global $acmeblog_customizer_all_values;
        /*Color options */
        $acmeblog_primary_color = $acmeblog_customizer_all_values['acmeblog-primary-color'];
        ?>
        <style type="text/css">
            /*background*/
            mark,
            .comment-form .form-submit input,
            .slider-section .cat-links a,
            #calendar_wrap #wp-calendar #today,
            #calendar_wrap #wp-calendar #today a,
            .wpcf7-form input.wpcf7-submit:hover,
            .breadcrumb{
                background: <?php echo esc_attr( $acmeblog_primary_color ); ?>;
            }
            /*color*/
            a:hover,
            .header-wrapper .menu li a:hover,
            .screen-reader-text:focus,
            .bn-content a:hover,
            .socials a:hover,
            .site-title a,
            .widget_search input#s,
            .besides-slider .post-title a:hover,
            .slider-feature-wrap a:hover,
            .slider-section .bx-controls-direction a,
            .besides-slider .beside-post:hover .beside-caption,
            .besides-slider .beside-post:hover .beside-caption a:hover,
            .featured-desc .above-entry-meta span:hover,
            .posted-on a:hover,
            .cat-links a:hover,
            .comments-link a:hover,
            .edit-link a:hover,
            .tags-links a:hover,
            .byline a:hover,
            .nav-links a:hover,
            #acmeblog-breadcrumbs a:hover,
            .wpcf7-form input.wpcf7-submit,
            .widget li a:hover,
            .header-wrapper .menu > li.current-menu-item > a,
            .header-wrapper .menu > li.current-menu-parent > a,
            .header-wrapper .menu > li.current_page_parent > a,
            .header-wrapper .menu > li.current_page_ancestor > a{
                color: <?php echo esc_attr( $acmeblog_primary_color ); ?>;
            }
            /*border*/
            .nav-links .nav-previous a:hover,
            .nav-links .nav-next a:hover{
                border-top: 1px solid <?php echo esc_attr( $acmeblog_primary_color ); ?>;
            }
            .besides-slider .beside-post{
                border-bottom: 3px solid <?php echo esc_attr( $acmeblog_primary_color ); ?>;
            }
            .page-header .page-title,
            .single .entry-header .entry-title{
                border-bottom: 1px solid <?php echo esc_attr( $acmeblog_primary_color ); ?>;
            }
            .page-header .page-title:before,
            .single .entry-header .entry-title:before{
                border-bottom: 7px solid <?php echo esc_attr( $acmeblog_primary_color ); ?>;
            }
            .wpcf7-form input.wpcf7-submit:hover,
            article.post.sticky,
            .read-more:hover{
                border: 2px solid <?php echo esc_attr( $acmeblog_primary_color ); ?>;
            }
            .breadcrumb::after {
                border-left: 5px solid <?php echo esc_attr( $acmeblog_primary_color ); ?>;
            }
            .tagcloud a{
                border: 1px solid  <?php echo esc_attr( $acmeblog_primary_color ); ?>;
            }
            .widget-title{
                border-left: 2px solid <?php echo esc_attr( $acmeblog_primary_color ); ?>;;
            }
            /*media width*/
            @media screen and (max-width:992px){
                .slicknav_btn.slicknav_open{
                    border: 1px solid <?php echo esc_attr( $acmeblog_primary_color ); ?>;
                }
                .slicknav_btn.slicknav_open:before{
                    background: <?php echo esc_attr( $acmeblog_primary_color ); ?>;
                    box-shadow: 0 6px 0 0 <?php echo esc_attr( $acmeblog_primary_color ); ?>, 0 12px 0 0 <?php echo esc_attr( $acmeblog_primary_color ); ?>;
                }
                .slicknav_nav li:hover > a,
                .slicknav_nav li.current-menu-ancestor a,
                .slicknav_nav li.current-menu-item  > a,
                .slicknav_nav li.current_page_item a,
                .slicknav_nav li.current_page_item .slicknav_item span,
                .slicknav_nav li .slicknav_item:hover a{
                    color: <?php echo esc_attr( $acmeblog_primary_color ); ?>;
                }
            }
        <?php
        $acmeblog_custom_css = $acmeblog_customizer_all_values['acmeblog-custom-css'];
        $acmeblog_custom_css_output = '';
        if ( ! empty( $acmeblog_custom_css ) ) {
        $acmeblog_custom_css_output .= esc_textarea( $acmeblog_custom_css ) ;
        }
        echo $acmeblog_custom_css_output;/*escaping done above*/
         ?>
        </style>
        <?php
    }
endif;
add_action( 'acmeblog_action_after_wp_head', 'acmeblog_dynamic_css', 10 );