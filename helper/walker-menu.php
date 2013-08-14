<?php

class Avedon_Walker_Nav_Menu extends Walker_Nav_Menu {

function __construct() {

}

function start_lvl(&$output, $depth) {

$indent = str_repeat("\t", $depth);
$output .= "\n$indent<ul class=\"dropdown-menu\">\n";

  }

}