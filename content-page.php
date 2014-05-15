<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Aadya
 * @subpackage Aadya
 * @since Aadya 1.0.0
 */
?>
<?php 
	$aadya_feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$aadya_display_post_page_nav = of_get_option('display_post_page_nav');
	$aadya_display_featured_img = of_get_option('display_featured_img_on_page_post');
?>
<?php if(!empty($aadya_feat_image) && $aadya_display_featured_img == true):?>
<div class="single-post-feat-image">	
	<img src="<?php echo $aadya_feat_image;?>" class="img-responsive"/>
</div>	
<?php endif;?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<hgroup>
			<h1><?php the_title(); ?></h1>	
		</hgroup>
	</header>
	<hr class="custom-hr"/>
	<div class="entry-content">	
	<?php the_content(); ?>
	</div><!-- .entry-content -->	
	<footer class="entry-meta">					
		<p><?php wp_link_pages(); ?></p>
		<hr/>
		<?php if(!empty($aadya_display_post_page_nav)):?>
		<div class="panel panel-default">
		  <div class="panel-heading">
		 
			<nav class="nav-single">
				<div class="row">	
					<div class="col-md-6">
						<span class="nav-previous pull-left"><?php previous_post_link( '%link', '<i class="fa fa-arrow-left"></i> %title' ); ?></span>
					</div>	
					<div class="col-md-6">
						<span class="nav-next pull-right"><?php next_post_link( '%link', '%title <i class="fa fa-arrow-right"></i>' ); ?></span>
					</div>	
				</div>	
			</nav><!-- .nav-single -->	
		  
		  </div>
		  <?php if(has_category() || has_tag()):?>
		  <div class="panel-body">
			<div class="cat-tag-info">				
				<?php if(has_category()):?>
				<div class="row">
				<div class="col-md-12 post_cats">
				<?php _e('<i class="fa fa-folder-open"></i> &nbsp;', 'aadya' );?>
				<?php the_category(', '); ?>
				</div>
				</div>
				<?php endif;?>
				<?php if(has_tag()):?>
				<div class="row">
				<div class="col-md-12 post_tags">
				<?php _e('<i class="fa fa-tags"></i> &nbsp;', 'aadya' );?>
				<?php the_tags('',', ',''); ?>
				</div>				
				</div>
				<?php endif;?>
			</div>				
		  </div>
		  <?php endif;?>
		</div>	
		<?php endif;?>
	</footer>
</article>

	
<?php get_template_part('author-box'); ?>		

<?php comments_template( '', true ); ?>
