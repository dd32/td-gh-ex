<?php
/**
 * Override default customizer panels, sections, settings or controls.
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2015, Brainstorm Force
 * @link        http://www.brainstormforce.com
 * @since       Astra 1.0
 */

/**
 * Override Sections
 */
$wp_customize->get_control( 'blogname' )->section            = 'section-site-identity';
$wp_customize->get_control( 'site_icon' )->section           = 'section-site-identity';
$wp_customize->get_control( 'blogdescription' )->section     = 'section-site-identity';
$wp_customize->get_control( 'display_header_text' )->section = 'section-site-identity';

/**
 * Override Settings
 */
$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

/**
 * Override Controls
 */
$wp_customize->remove_control( 'header_textcolor' );
$wp_customize->get_control( 'site_icon' )->priority = 55;
