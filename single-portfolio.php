<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage i-excel
 * @since i-excel 1.0
 */

get_header(); ?>

	<?php 
		global $post;
		
		$sub_title = esc_attr(rwmb_meta('itrans_portfolio_subtitle'));
		$folio_url = esc_url(rwmb_meta('itrans_portfolio_url'));
	?>
    
            
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                	<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
					<header class="entry-header">
                    	<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="entry-thumbnail">
						<?php                        
							$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
							echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute( 'echo=0' ) . '" alt="" class="tx-colorbox">';
							the_post_thumbnail('folio-silder');
							echo '</a>';
                        ?>
						</div>
						
					</header><!-- .entry-header -->
                    <div class="folio-meta">
                    <?php if (!empty($sub_title)) : ?>
                    <h2 class="tx-subtitle"><?php echo $sub_title; ?></h2>
                    <?php endif; ?>
                    <?php
					if (!empty($folio_url))
					{
					?>
                        <div class="proj-url">
                        <span class="genericon genericon-external"></span>
                        <a href="<?php echo $folio_url ?>"><?php echo $folio_url; ?></a>
                        </div>
                    <?php
					}
					?>                    
                    <?php endif; ?>
                    <?php if (tx_folio_term( 'portfolio-category' )) : ?>
                    	<div class="folio-cat">
                        	<span class="genericon genericon-category"></span>
							<span class="folio-categories"><?php echo tx_folio_term( 'portfolio-category' ); ?></span>
                        </div>
                    <?php endif; ?>    
					</div>
                    
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'itransform' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'itransform' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

				<?php comments_template(); ?>
			<?php endwhile; ?>

		</div><!-- #content -->
        <?php get_sidebar(); ?>
	</div><!-- #primary -->


<?php get_footer(); ?>