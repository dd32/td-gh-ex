<?php
/**
* The file for displaying the sidebars.
*
* @package BestWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<div class="bestwp-sidebar-one-wrapper bestwp-sidebar-widget-areas clearfix" id="bestwp-sidebar-one-wrapper" itemscope="itemscope" itemtype="http://schema.org/WPSideBar" role="complementary">
<div class="theiaStickySidebar">
<div class="bestwp-sidebar-one-wrapper-inside clearfix">

<?php dynamic_sidebar( 'bestwp-sidebar-one' ); ?>

</div>
</div>
</div><!-- /#bestwp-sidebar-one-wrapper-->

<div class="bestwp-sidebar-two-wrapper bestwp-sidebar-widget-areas clearfix" id="bestwp-sidebar-two-wrapper" itemscope="itemscope" itemtype="http://schema.org/WPSideBar" role="complementary">
<div class="theiaStickySidebar">
<div class="bestwp-sidebar-two-wrapper-inside clearfix">

<?php dynamic_sidebar( 'bestwp-sidebar-two' ); ?>

</div>
</div>
</div><!-- /#bestwp-sidebar-two-wrapper-->