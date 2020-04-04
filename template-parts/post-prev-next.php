<?php
/**
 * The template part for displaying post prev next section.
 *
 * @package Fmi
 */

    the_post_navigation( array(
          'prev_text' => '<span>'.esc_html__('Previous Post','fmi').'</span> %title',
          'next_text' => '<span>'.esc_html__('Next Post','fmi').'</span> %title'
    ) );
