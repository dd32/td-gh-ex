<?php get_header(); ?>

<?php 
if (
	( ( get_post_type() == 'topic' ) && ( asteroid_option('ast_bbpress_topic_full_width') == 1 ) ) ||
	( ( get_post_type() != 'topic' ) && ( asteroid_option('ast_bbpress_forum_full_width') == 1 ) ) 
) :
?>
	<div id="content-nosidebar">
<?php else : ?>
	<div id="content">
<?php endif; ?>
 
    <?php
		the_post();
		get_template_part( 'loop', 'single' );
    ?>
	
	</div>

<?php
if (
	( ( get_post_type() == 'topic' ) && ( asteroid_option('ast_bbpress_topic_full_width') == 0 ) ) ||
	( ( get_post_type() != 'topic' ) && ( asteroid_option('ast_bbpress_forum_full_width') == 0 ) ) 
) :
?>
	<?php get_sidebar(); ?>
<?php endif; ?>

<?php get_footer(); ?>