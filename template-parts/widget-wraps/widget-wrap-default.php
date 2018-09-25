<?php
/**
 * Default widget html wrap.
 *
 * This file will be used in case no panel-name-specific file was found.
 */


$container['before_widget'] = '<section id="%1$s" class="widget %2$s">';
$container['after_widget']  = '</section>';
$container['before_title']  = '<h2 class="widget-title">';
$container['after_title']   = '</h2>';


do_action( 'bathemos_collect_data', $container, 'widget-wrap' );
