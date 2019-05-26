<?php
/**
 * File aeonblog.
 * @package   AeonBlog
 * @author    Aeon Theme <info@aeontheme.com>
 * @copyright Copyright (c) 2019, Aeon Theme
 * @link      http://www.aeontheme.com/themes/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AeonBlog
 */
global $aeonblog_theme_options;
$read_more = esc_html($aeonblog_theme_options['aeonblog-read-more-text']);
$blog_meta = absint($aeonblog_theme_options['aeonblog-blog-meta']); 
$blog_featured_image = absint($aeonblog_theme_options['aeonblog-blog-image']);
$featured_image_full = absint($aeonblog_theme_options['aeonblog-blog-full-image']);  
$blog_full_image = ($featured_image_full == 0 ) ? '' : 'blog-full-image';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?>>
			<div class="entry-header">
			<?php if($blog_meta == 1 ){  ?>
				<ul class="entry-meta list-inline clearfix">
					<li>
						<i class="fa fa-clock-o"></i><?php aeonblog_posted_on(); ?>
					</li>
					<li>
						<span class="post-comments"><i class="fa fa-comments"></i> <?php comments_number(); ?></span>
					</li>			
				</ul>
			<?php } ?>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
			<?php endif; ?>
			<?php if($blog_meta == 1 ){  ?>
				<ul class="entry-meta list-inline clearfix">
					<li>
						<span class="posted-in">
							<?php
							$categories = get_the_category();
							if ( ! empty( $categories ) ) {
								echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"rel="category tag">'.esc_html( $categories[0]->name ).'</a>';
							}                                 
							?>
						</span>
					</li>
				</ul>
			<?php } ?>
		</div><!-- .entry-header -->
		<header class="featured-wrapper <?php echo esc_attr($blog_full_image); ?>">
			<div class="post-thumbnail">
				<?php if($blog_featured_image == 1 ) {
					the_post_thumbnail( 'small' );
				} 
				?>
			</div>
		</header>
		<div class="blog-content">
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php if( !empty( $read_more)){ ?>
					<a class="more-link" href="<?php the_permalink(); ?>">
						<?php echo esc_html($read_more); ?>  
					</a>
				<?php } ?>
			</footer><!-- .entry-footer -->
		</div>
</article><!-- #post-<?php the_ID(); ?> -->
