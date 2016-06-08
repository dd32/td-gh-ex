<?php get_header();  

asiathemes_breadcrumbs(); ?>	

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
							<?php endif;
								if(has_post_thumbnail()) {?>
							<span class="date hidden-xs"><?php echo get_the_date('M'); ?><span><?php echo get_the_date('j'); ?></span></span>
							<?php } else { echo""; } ?>
						</div>
						<ul class="post-meta">
							    <li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><i class="fa fa-pencil-square-o"></i><?php echo get_the_author(); ?></a></li>
								<li><a href="#"><i class="fa fa-comments"></i><?php comments_popup_link( '0', '1', '%', '', '-'); ?></a></li>
								<?php $categories_list = get_the_category_list( __( ', ', 'becorp' ) ); ?>
								<li><a href="<?php  ?>"><i class="fa fa-folder-open"></i><?php echo $categories_list; ?></a></li>
							</ul>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php the_content(); ?></p>
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
								<a href="#"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 70 ); ?></a>
							</div>
							<div class="author-bio">
								<h4><?php _e('About','becorp');?> <a href="<?php bloginfo(); ?>"><?php echo get_the_author(); ?></a></h4>
								<p><?php echo get_the_author_meta( 'description' ); ?><a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php _e('View all posts by','becorp');?> <?php get_the_author(); ?> </a></p>
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