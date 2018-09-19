<?php 
/*
============================================================================================================================
Silver Quantum - header.php
============================================================================================================================
The header.php template file only displays the header section such as primary navigation and header image with site title and
description.

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2014-2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="main-navigation">
        <?php silver_quantum_display_primary_navigation(); ?>
    </div>
    <section id="container" class="site-container">
        <?php silver_quantum_display_site_header(); ?>
        <div id="content" class="site-content">