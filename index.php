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
	
	<!--Corrent Content OFF-->
    <div id="current-content">
	   <?php include(TEMPLATEPATH . '/belle/loop.php'); ?>
	</div>
	<div id="dynamic-content"></div>
	<!--Corrent Content OFF-->
	<?php
if ($_GET["dynamic"]!='true'): ?>
</div>
<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
