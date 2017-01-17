<?php 
get_header();
get_template_part('index', 'banner'); 
if(!is_home()) { echo '</div>'; }
?>
<!-- Blog & Sidebar Section -->
<section class="site-content">
	<div class="container">
		<div class="row blog_sidebar_section">
			<!--Blog-->
			<div class="<?php corpbiz_post_layout_class(); ?>" >
			<?php if ( have_posts() ) : ?>
				<h1>
					<?php printf( __( "Search results for %s", 'corpbiz' ), '<span>' . get_search_query() . '</span>' ); ?>
				</h1>			
				<?php while ( have_posts() ) : the_post();  ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('blog_section'); ?>>
					<?php if(has_post_thumbnail()): ?>
					<?php $defalt_arg =array('class' => "img-responsive"); ?>
					<div class="blog_post_img">					
						<?php the_post_thumbnail('', $defalt_arg); ?>					
					</div>
					<?php endif; ?>
					<div class="post_title_wrapper">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="post_detail">
							<a href="<?php echo get_month_link(get_post_time('Y'),get_post_time('m')); ?>"><i class="fa fa-calendar"></i> <?php echo get_the_date('M j, Y'); ?> </a>
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i> <?php _e('Posted by','corpbiz'); ?> <?php the_author(); ?></a>
							<a href="<?php comments_link(); ?>"><i class="fa fa-comments"></i> <?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?> </a>
							<?php $tag_list = get_the_tag_list();
							if(!empty($tag_list)) { ?>
							<div class="post_tags">
								<i class="fa fa-tags"></i><?php the_tags('', ', ', '<br />'); ?>							
							</div>
							<?php } ?>
						</div>
					</div>
					<div class="blog_post_content">
						<?php the_content(); ?>
					</div>	
				</div>			
				<?php endwhile; ?>
				<div class="paginations">
						<?php
						// Previous/next page navigation.
						the_posts_pagination( array(
						'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
						'next_text'          => '<i class="fa fa-angle-double-right"></i>',
						) );
						?>
						</div>
				<?php if(wp_link_pages()) { wp_link_pages();  } ?>			
				<?php else : ?>
							<h2><?php _e( "Nothing Found", 'corpbiz' ); ?></h2>
							<div class="qua_searching">
								<p>
								<?php _e( "Sorry, but nothing matched your search criteria. Please try again with some different keywords.", 'corpbiz' ); ?></p>
								<?php get_search_form(); ?>
							</div>	
				<?php endif; ?>
			
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>	
<?php get_footer(); ?>