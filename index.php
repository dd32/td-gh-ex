<?php
/**
 * @package WordPress
 * @subpackage Belle
 */

get_header(); ?>

<?php
if ($_GET["dynamic"]!='true'): ?>
<div id="content">
<?php endif; ?>
	
	<div id="notices"></div>
	
	<!--Current Content ON-->
    <div id="current-content">
	   <?php include(TEMPLATEPATH . '/belle/loop.php'); ?>
	</div>
	<!--Current Content OFF-->
	
	<!--Dynamic Content ON-->
	<div id="dynamic-content"></div>
	<!--Dynamic Content OFF -->	
	
<?php
if ($_GET["dynamic"]!='true'): ?>
</div>
<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
