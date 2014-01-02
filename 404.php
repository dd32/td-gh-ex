<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Aadya
 * @subpackage Aadya
 * @since Aadya 1.0.0
 */

get_header(); ?>
<?php 
	$layout = of_get_option('page_layouts'); 
	$col =  aadya_get_content_cols();
?>

<?php
	if($layout ==  "sidebar-content" || $layout ==  "sidebar-content-sidebar") {
		get_sidebar('left');
	}	
	if($layout == "content-sidebar" || $layout ==  "sidebar-content") {
		$smcol = 8;
	} elseif($layout == "sidebar-content-sidebar" || $layout == "content-sidebar-sidebar") {
		$smcol = 6;
	}		
?>
<div class="col-xs-12 col-sm-<?php echo $smcol;?> col-md-<?php echo $col;?>" role="content">
	<div id="primary" class="site-content">
		<div id="content" role="main">
	
			<article id="post-0" class="post error404 no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'aadya' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'aadya' ); ?></p>
					<div class="row">
						<div class="col-md-6">
							<?php get_search_form(); ?>
						</div>
					</div>
					
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- .col-md-<?php echo $col;?> -->
<?php
	if($layout ==  "content-sidebar-sidebar") {
		get_sidebar('left');
	}	
?>
<?php	
	if($layout ==  "content-sidebar" || 
	   $layout ==  "sidebar-content-sidebar" ||
	   $layout ==  "content-sidebar-sidebar") {		
		get_sidebar();
	}
?>	
<?php get_footer(); ?>