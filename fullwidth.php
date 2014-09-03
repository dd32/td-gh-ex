<?php // Template Name: Fullwidth 
get_header(); ?>
<!-- Page Section -->
<div class="page_mycarousel" <?php if(get_post_meta( get_the_ID(), 'page_header_image', true )) { ?> style="background: url('<?php echo get_post_meta( get_the_ID(), 'page_header_image', true ); ?>')  repeat scroll 0 0 / cover;" <?php } ?> >
	<div class="container page_title_col">
		<div class="row">
			<div class="hc_page_header_area">
				<h1> <?php the_title(); ?> </h1>		
			</div>
		</div>
	</div>
</div>
<!-- /Page Section -->
<!-- Blog & Sidebar Section -->
<div class="container">
	<div class="row blog_sidebar_section">		
		<!--Blog-->
<div class="col-md-12">
	<?php the_post(); ?>
	<div class="blog_detail_section">
			<?php if(has_post_thumbnail()): ?>
			<?php $defalt_arg =array('class' => "img-responsive"); ?>
			<div class="blog_post_img">
				<?php the_post_thumbnail('webriti_page_thumb', $defalt_arg); ?>	
			</div>
			<?php endif; ?>
			<div class="blog_post_content">
				<?php the_content(); ?>
			</div>	
	</div>			
	<?php comments_template('',true); ?>	
	</div>
</div>
</div>
<!--Blog-->
<?php get_footer(); ?>