<?php 
/*
============================================================================================================================
White Spektrum - header.php
============================================================================================================================
The header.php template file only displays the header section such as primary navigation and header image with site title and
description.

@package        White Spektrum WordPress Theme
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
    <section id="container" class="site-container">
        <header id="header" class="site-header">
            <div class="site-branding">
                <?php if (has_custom_logo()) { 
                    the_custom_logo();
                } else {
                    Benlumia007\Backdrop\Site\display_site_title();
                    Benlumia007\Backdrop\Site\display_site_description();
                }
                ?>
            </div>
            <?php Benlumia007\Backdrop\Menu\display_primary(); ?>
            <?php the_custom_header_markup() ?>
        </header>
        <div id="content" class="site-content">