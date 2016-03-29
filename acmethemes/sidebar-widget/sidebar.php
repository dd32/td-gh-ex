<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function acmephoto_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'acmephoto' ),
        'id'            => 'acmephoto-sidebar',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2><div class="line"><span></span></div>',
    ) );

    register_sidebar(array(
        'name' => __('Home Main Content Area', 'acmephoto'),
        'id'   => 'acmephoto-home',
        'description' => __('Displays widgets on home page main content area.', 'acmephoto'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title"><span>',
        'after_title' => '</span></h2><div class="line"><span></span></div>',
    ));

}
add_action( 'widgets_init', 'acmephoto_widgets_init' );