<?php 
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>

<?php global $avis_shortname; ?>
<div class="main-wrapper-item">
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>	
<div class="container post-wrap">
	<div class="row-fluid">
		<div id="container" class="span9">
			<div id="content">  
					<div class="post" id="post-<?php the_ID(); ?>">
					  <div class="single_post_wrap">
						<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
							<div class="featured-image-shadow-box quote_featured_img">
								<?php the_post_thumbnail('avis_standard_img'); ?>
							</div>
						<?php } ?>

						
					   	<div class="post_inner_wrap clearfix">
							<h1 class="post-title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php the_title(); ?>
								</a>
							</h1>
							<div class="skepost-meta clearfix">			    
							    <div class="author-img"><?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?></div>
							    <div class="comment-date">
								    <div class="comments"><?php _e('by ','avis');?><span class="author-name"><?php the_author_posts_link(); ?></span><?php _e(' with ','avis');?><span class="commentnum"><?php comments_popup_link(__('No Comments','avis'), __('1 Comment ','avis'), __('% Comments ','avis')) ; ?></span></div>
								    <div class="date"><?php the_time('F j, Y') ?></div>
								    <div class="date-tag"><?php the_tags('Tag ',',',''); ?></div>
								</div>
					        </div>
							<!-- skepost-meta -->
					        <div class="skepost">
								<?php the_content(); ?>
					        </div>
					        <!-- skepost -->
				        </div>
				      </div><!-- single-post-wrap -->

						<div class="navigation"> 
							<?php previous_post_link( __('<span class="nav-previous"><i class="fa fa-angle-left"></i> %link</span>','avis')); ?>
							<?php next_post_link( __('<span class="nav-next">%link <i class="fa fa-angle-right"></i></span>','avis')); ?> 
						</div>

						<div class="clearfix"></div>
						<div class="comments-template">
							<?php comments_template( '', true ); ?>
						</div>
					</div>
				<!-- post -->
				<?php endwhile; ?>
				<?php else :  ?>

				<div class="post">
					<h2><?php _e('Not Found','avis'); ?></h2>
				</div>
				<?php endif; ?>
			</div><!-- content --> 
		</div><!-- container --> 

		<!-- Sidebar -->
		<div id="sidebar" class="span3">
			<?php get_sidebar(); ?>
		</div>
		<!-- Sidebar --> 

	</div>
 </div>
</div>
<?php get_footer(); ?>