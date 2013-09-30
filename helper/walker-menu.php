<?php

/*
wp_bootstrap_navwalker - https://github.com/twittem/wp-bootstrap-navwalker
License: GPL-2.0+
Copyright: Edward McIntyre
*/

class Avedon_Walker_Nav_Menu extends Walker_Nav_Menu {

function start_lvl( &$output, $depth = 0, $args = array() ) {
$indent = str_repeat("\t", $depth);
$output .= "\n$indent<ul class=\" dropdown-menu\">\n";
}

function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

if (strcasecmp($item->title, 'divider') == 0) {
// Item is a Divider
$output .= $indent . '<li class="divider">';
} else if (strcasecmp($item->title, 'divider-vertical') == 0) {
// Item is a Vertical Divider
$output .= $indent . '<li class="divider-vertical">';
} else if (strcasecmp($item->title, 'nav-header') == 0) {
// Item is a Header
$output .= $indent . '<li class="nav-header">' . esc_attr( $item->attr_title );
} else {

$class_names = $value = '';

$classes = empty( $item->classes ) ? array() : (array) $item->classes;
$classes[] = 'menu-item-' . $item->ID;

$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

//If item has_children add dropdown class to li
if($args->has_children) {
$class_names .= ' dropdown';
}

$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

$output .= $indent . '<li' . $id . $value . $class_names .'>';

$atts = array();
$atts['title'] = ! empty( $item->title ) ? $item->title : '';
$atts['target'] = ! empty( $item->target ) ? $item->target : '';
$atts['rel'] = ! empty( $item->xfn ) ? $item->xfn : '';

//If item has_children add atts to a
if($args->has_children) {
$atts['href'] = '#';
$atts['class']	= 'dropdown-toggle';
$atts['data-toggle'] = 'dropdown';
$atts['data-target'] = '#';
} else {
$atts['href'] = ! empty( $item->url ) ? $item->url : '';
}

$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

$attributes = '';
foreach ( $atts as $attr => $value ) {
if ( ! empty( $value ) ) {
$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
$attributes .= ' ' . $attr . '="' . $value . '"';
}
}

$item_output = $args->before;

if(! empty( $item->attr_title )){
$item_output .= '<a'. $attributes .'><i class="' . esc_attr( $item->attr_title ) . '"></i>&nbsp;';
} else {
$item_output .= '<a'. $attributes .'>';
}

$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
$item_output .= ($args->has_children) ? ' </a>' : '</a>';
$item_output .= $args->after;

$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}
}

function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( !$element ) {
            return;
        }

        $id_field = $this->db_fields['id'];

        //display this element
        if ( is_object( $args[0] ) ) {
           $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}

?>