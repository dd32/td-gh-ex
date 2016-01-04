<?php get_header(); ?>
  <!-- end header -->

<!-----Page Title----->  
<?php get_template_part('title','strip'); ?>	
 
 <!-----Blog Section------>
<section id="blog">
<div class="container">
	<div class="row">
		<div class="col-md-8">
				
				<div class="row blog-item">	
					<div class="blog-content">
						<div class="featured-image">
						<?php the_post(); 
								$default_img = array('class' => "img-responsive img-blog");
								if(has_post_thumbnail()) :?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('',$default_img); ?></a>
							<?php endif; ?>
							<span class="date hidden-xs"><?php echo get_the_date('M'); ?><span><?php echo get_the_date('j'); ?></span></span>
		
						</div>
						<ul class="post-meta">
							    <li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><i class="fa fa-pencil-square-o"></i><?php echo get_the_author(); ?></a></li>
								<li><a href="#"><i class="fa fa-comments"></i><?php comments_popup_link( '0', '1', '%', '', '-'); ?></a></li>
								<?php if(get_the_category_list() != '') { ?>
								<li><a href="#"><i class="fa fa-folder-open"></i><?php the_category(' , '); ?></a></li>
								<?php } ?>
							</ul>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php the_content(); ?></p>
						<?php wp_link_pages( array( 'before' => '<div class="row">'.'<div class="blog-pagination">' . __( 'Pages:', 'becorp' ), 'after' => '</div></div>' ) ); ?>
					  <div class="post-bottom clearfix">
							<div class="post-tags-list">			
								<ul class="tag-cloud">
								<?php if(get_the_tag_list() != '') { ?>
									<li> <?php the_tags( __('Tags : ','becorp'), ' ', '&nbsp;'); ?></li> <br />
									<?php } ?>
								</ul>
							</div>
						</div>
						<div class="author-info clearfix">
							<div class="author-image">
								<?php echo get_avatar( get_the_author_meta( 'user_email' ), 70 ); ?>
							</div>
							<div class="author-bio">
								<h4><?php _e('About','becorp');?>&nbsp;<?php the_author_link(); ?></h4>
								<p><?php echo get_the_author_meta( 'description' );if(!get_the_author_meta('description')) _e('No description.
															Please update your profile.','becorp'); ?><a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">&nbsp;<?php _e('-','becorp'); _e('View all posts by','becorp'); get_the_author(); ?> </a></p>
							</div>
						</div>
						<div class="post-content"></div>
						
					</div>
					
				</div><!--/.blog-item-->
			
<!-- Start Comment Area -->
<?php comments_template( '', true );?>
<!-- End Comment Area -->
		</div><!--/.col-sm-8-->
	
	<!--------Sidebar-------------->
		<?php get_sidebar(); ?>   
  <!-------/Sidebar--------------->		
	</div>
</div>
</section>   
    
<!-------------Footer------------>
<?php get_footer(); ?>
<!--/copyright-->

</div> <!-- /main-wrapper -->