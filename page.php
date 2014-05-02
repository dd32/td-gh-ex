<?php
/*	@Theme Name	:	Quality
* 	@file         :	page.php
* 	@package      :	Quality
* 	@author       :	VibhorPurandare
* 	@license      :	license.txt
* 	@filesource   :	wp-content/themes/quality/page.php
*/	
?>
<?php get_header(); ?>
<!--/Header Logo & Menus-->
<div class="page-seperator"></div>
<!-- Page Title Section ---->
<div class="container">
	<div class="row">
		<div class="qua_page_heading">
			<h1><?php the_title(); ?></h1>			
			<div class="qua-separator" id=""></div>
		</div>
	</div>
</div>
<!-- /Page Title Section ---->
	<div class="container">	
	<div class="row qua_blog_wrapper">		
		<!--Blog Content-->
		<div class="col-md-8">
			<?php the_post(); ?>
		<div class="qua_blog_detail_section">	
			<?php $defalt_arg =array('class' => "img-responsive"); ?>
			<?php if(has_post_thumbnail()): ?>
			<div class="qua_blog_post_img">	
			<a  href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('quality_blog_img', $defalt_arg); ?>
			</a>
			</div>
			<?php endif; ?>	
				<div class="clear"></div>
				<div class="qua_blog_post_content">
				<p><?php the_content( __( 'Read More' , 'quality' ) ); ?></p>
				</div>
		</div>	
			<?php comments_template('',true); ?>
		</div>		
		<!--/Blog Content-->
		<?php get_sidebar();  ?>
	</div>
</div>
<?php get_footer(); ?>