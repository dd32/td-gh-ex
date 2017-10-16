<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package atoz
 */

get_header(); ?>

<section id="sb-imgbox" style="padding-bottom:80px;">
	<div class="container">
		<div class="row text-center">
			<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); the_archive_description( '<div class="archive-description">', '</div>' ); ?>
			</header>
			<!-- .page-header -->
			<?php /* Start the Loop */ while ( have_posts() ) : the_post(); ?>

			<!--Blog Listing-->
			<article class="col-md-4 col-sm-4 text-center">
				<div class="blog-box-inn eq-blocks"><span><?php echo get_the_date('M d');?></span>
					<?php if ( get_the_post_thumbnail() != '' ) {?>
					<a href="<?php esc_url( the_permalink() );?>">
						<?php the_post_thumbnail( 'atoz_home_posts'); ?>
					</a>
					<?php }else{?>
					<?php 
						$placeholder_img   = get_template_directory_uri() . "/img/default.jpg";
					?>
					<a href="<?php esc_url( the_permalink() );?>"><img src="<?php echo esc_url($placeholder_img); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive blog-img"></a>
					<?php }?>
					<h2><a href="<?php esc_url( the_permalink() );?>" class="eq-blocks-title"><?php the_title();?></a></h2>
					<p>
						<?php the_category();?>
					</p>
					<a href="<?php esc_url( the_permalink() );?>" class="btn btn-default">
						<?php esc_html_e( 'View', 'atoz');?>
					</a>
				</div>
			</article>

			<?php endwhile; ?>
			<div class="clearfix"></div>
			<?php the_posts_pagination( array( 'prev_text' => esc_attr( '<<', 'atoz ' ),
								'next_text' => esc_attr( '>>', 'atoz' ), ) ); else : get_template_part( 'template-parts/content', 'none' ); endif; ?>
		</div>
	</div>
</section>
<?php
get_footer();