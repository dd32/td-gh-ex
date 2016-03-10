<?php get_header();
get_template_part('index', 'banner');
if(!is_home()) { echo '</div>'; }
?>
<!-- Blog & Sidebar Section -->
<section class="site-content">
	<div class="container">
		<div class="row blog_sidebar_section">		
			<div class="<?php corpbiz_post_layout_class(); ?>" >
				<?php the_post(); ?>
				<div class="blog_detail_section">
					<?php if(has_post_thumbnail()): ?>
					<?php $defalt_arg =array('class' => "img-responsive"); ?>
					<div class="blog_post_img">
						<?php the_post_thumbnail('', $defalt_arg); ?>	
					</div>
					<?php endif; ?>
					<div class="blog_post_content">
						<?php the_content(); ?>
					</div>	
				</div>			
				<?php comments_template('',true); ?>	
			</div>
			<?php get_sidebar(); ?>	
		</div>
	</div>
</section>
<!--Blog-->
<?php get_footer(); ?>