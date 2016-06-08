<?php 
get_header();

get_template_part('title','strip'); 
?>  
 
 <!-----Blog Section------>
<section id="blog">
<div class="container">
	<div class="row">
		<div class="col-md-8">				
			<?php if ( have_posts() ) : ?>
				<h2><?php printf( __( "Search Results for: %s", 'becorp' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
			<?php
				endif;
				rewind_posts();?>
				<?php
				if(have_posts()) :
				while(have_posts()) :
					the_post();
			?>
				<div class="row blog-item">	
					<div class="blog-content">
					<?php $default_img=array('class'=>'img-responsive'); ?>
						<div class="featured-image">
							<?php if(has_post_thumbnail()) {
							the_post_thumbnail('',$default_img);
						} ?>
							<span class="date hidden-xs"><?php echo get_the_date('M'); ?><span><?php echo get_the_date('j'); ?></span></span>
		
						</div>
						<ul class="post-meta">
							    <li><a href="<?php get_author_posts_url(get_the_author_meta('ID')); ?>"><i class="fa fa-pencil-square-o"><?php echo get_the_author(); ?></i></a></li>
								<li><a href="#"><i class="fa fa-comments"></i><?php comments_popup_link( '0', '1', '%', '', '-'); ?></a></li>
								<?php $categories_list = get_the_category_list( __( ', ', 'becorp' ) ); ?>
								<li><a href="<?php  ?>"><i class="fa fa-folder-open"></i><?php echo $categories_list; ?></a></li>
							</ul>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="post-content"><?php the_content(); ?></p>
						<a class="btn btn-readmore" href="#"><?php _e('Read More','becorp'); ?></a>
					</div>
					
				</div>
				<?php endwhile; ?>
				<?php else : ?>
				<h2><?php _e( "Ooops!!... Post Not Found", 'becorp' ); ?></h2>
			<div class="">
			<p><?php
			_e( "Sorry, but nothing matched your search criteria. Please try again with some different keywords.", 'becorp' ); ?>
			</p>
			<?php get_search_form(); ?>
			</div><!-- .blog_con_mn -->
			<?php endif; ?>
				<!--/.blog-item-->		
			<!---Blog pagination-->
			<br />
				<div class="row">
					<div class="col-md-12">	
						<div class="blog-pagination wow fadeInLeft animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;">
						  <?php echo wp_link_pages( array( 
							'show_all' => true,
							'prev_text' => '<<', 
							'next_text' => '>>',
							)); ?>
						</div>
					</div>
				</div>
			
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