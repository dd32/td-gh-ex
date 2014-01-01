<?php get_header(); ?>
<div id="oloContainer">
	<div id="oloContent">
		<div class="oloPosts">
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<?php if ( is_sticky() ) : ?>
								<h2>[<?php printf(__('Featured', 'olo')) ; ?>]<?php the_title(); ?></h2>
							
						<?php else : ?>
						<h2><?php the_title(); ?></h2>
						<?php endif; ?>
						<div class="date">
							<span class="binds"></span>
							<span class="month"><?php the_time('Y/m'); ?></span>
							<span class="day"><?php the_time( 'd' ); ?></span>
							<span class="hour"><?php the_time( 'H:m' ); ?></span>
						</div>
						
					</header>
					
					<section class="oloEntry">
						<figure id="adx"><?php echo get_option('adx'); ?></figure>
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<nav class="page-link"><span>' . __( 'Pages:', 'olo' ) . '</span>', 'after' => '</nav>' ) ); ?>
						<figure id="adxx"><?php echo get_option('adxx'); ?></figure>
					</section>
					
					<footer>
						<p class="tags"><i class="fa fa-tags"></i><?php the_tags(); ?></p>
						<span class="author">
							<?php _e('Posted by', 'olo'); ?> <?php the_author_posts_link(); ?>
						</span>·
						<span class="cat-links">
							<?php _e('Posted in', 'olo'); ?> <?php the_category(', '); ?>
						</span>

						<?php edit_post_link( __( 'Edit', 'olo' ), '<span class="edit-link">', '</span>' ); ?>
						<div class="post-share">
							<ul class="post-shareul clearfix">
								<li class="post-shareli"><a href="http://service.weibo.com/share/share.php?title=<?php the_title(); ?>&url=<?php the_permalink(); ?>" class="post-sharea psa-weibo" target="_blank" rel="nofollow" title="分享到新浪微博">新浪微博</a></li>
								<li class="post-shareli"><a href="http://v.t.qq.com/share/share.php?title=<?php the_title(); ?>&url=<?php the_permalink(); ?>&site=<?php echo home_url();?>" class="post-sharea psa-qqweibo" target="_blank" rel="nofollow" title="分享到腾讯微博">腾讯微博</a></li>
								<li class="post-shareli"><a href="http://www.douban.com/recommend/?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" class="post-sharea psa-douban" target="_blank" rel="nofollow" title="分享到豆瓣">豆瓣网</a></li>
								<li class="post-shareli"><a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" class="post-sharea psa-qzone" target="_blank" rel="nofollow" title="分享到QQ空间">QQ空间</a></li>
								<li class="post-shareli"><a href="http://share.renren.com/share/buttonshare?link=<?php the_permalink(); ?>&title=<?php the_title(); ?>" class="post-sharea psa-renren" target="_blank" rel="nofollow" title="分享到人人网">人人网</a></li>
								<li class="post-shareli"><a href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" class="post-sharea psa-twitter" target="_blank" rel="nofollow" title="分享到Twitter">Twitter</a></li>
							</ul>
						</div>
					</footer>
				</article><!-- #post-<?php the_ID(); ?> -->
				
				<?php comments_template( '', true ); ?>
				<?php endwhile; ?>
				<div class="clear"></div>
					<nav id="nav-single">
						<p class="nav-previous"><?php previous_post_link( '%link', __( 'Previous: %title', 'olo' ) ); ?></p>
						<p class="nav-next"><?php next_post_link( '%link', __( 'Next: %title', 'olo' ) ); ?></p>
					</nav><!-- #nav-single -->
					<nav class="oloNav">
						<?php
							if(function_exists('wp_page_numbers')) {
								wp_page_numbers();
							}
							elseif(function_exists('wp_pagenavi')) {
								wp_pagenavi();
							} else {
							global $wp_query;
							$total_pages = $wp_query->max_num_pages;
							if ( $total_pages > 1 ) {
								echo '<div class="page_navi">';
									par_pagenavi(4);
								echo '</div>';
								}
							}
						?>
					</nav>

			<?php else : ?>

				<article id="post-404" class="post no-results not-found">
					<header>
						<h1><?php _e( 'Nothing Found', 'olo' ); ?></h1>
					</header><!-- .entry-header -->

					<section>
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'olo' ); ?></p>
					</section><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
		</div><!--#oloPosts-->
<?php if(!IsMobile) get_sidebar(); ?>	
	</div><!-- #oloContent-->
</div><!-- #oloContainer-->
<?php get_footer(); ?>