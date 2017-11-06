<?php
/**
 * Template Name: Homepage
 *
 *
 * @package affidavit
 */

get_header(); ?>

    <?php 
     /**
     * Functions hooked in to affidavit_home_banner action.
     *
     * @hooked affidavit_template_banner 
     */
    do_action('affidavit_home_banner'); ?>

    
    <?php 
    /**
     * Functions hooked in to affidavit_home action.
     *
     * @hooked affidavit_template_section_1 -10 
     * @hooked affidavit_template_section_2 -15
     */
    do_action('affidavit_home'); 

get_footer(); ?>