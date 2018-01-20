<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package atoz
 */

get_header(); ?>

<?php if(have_posts() ) : while(have_posts() ) : the_post(); ?>     
<div id="single-banner" style="background-image:url('<?php echo the_post_thumbnail_url('atoz_single_post'); ?>'); "> 
    <div class="content wow fdeInUp">
		<div class="container">
			<?php 
			$categories = get_the_category();
			if($categories!=''){
				foreach ( $categories as $category ) {
					echo '<a class="category" href="' . esc_url(get_category_link( $category->term_id )) . '">' . esc_html($category->name) . '</a> ';
				}
			}
            ?> 
			<h1><?php the_title(); ?> </h1>
			<header class="entry-header">
				<span class="date-article"><?php echo esc_attr(human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'); ?></span> 
			</header>
			<!--breadcrumb-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><?php atoz_get_breadcrumb(); ?></li>
			</ol>
		</div>
    </div>
</div>
 <?php endwhile;endif; ?>

<!--Content Body-->
<div id="single-body">
	<div class="container">
		<div class="row">
			<!--blog posts container-->
			<div class="col-md-8 col-sm-8 single-post <?php background_color(); ?>">
				<?php if ( have_posts() ) : /* Start the Loop */ while ( have_posts() ) : the_post(); ?>
				<?php the_content();?>
				<div class="clearfix"></div>
				<!--Footer tags-->
				<footer class="entry-footer entry-meta-bar">
					<div class="entry-meta">
						<span class="tag-links">
							<?php echo get_the_tag_list('Tagged in: ',', '); ?>              
						</span>
					</div>
				</footer>
				<?php endwhile; endif;?>

				<div class="clearfix"></div>

				<!--Author box-->
				<div class="author-box">
					<?php echo get_avatar( get_the_author_meta( 'user_email'), '100', '' ); ?>
					<div class="author-box-title">
						<?php esc_html_e( 'By:', 'atoz'); ?>
						<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
							<?php echo esc_html(get_the_author_meta( 'display_name')) ; ?>
						</a>
					</div>
					<div class="author-description">
						<?php the_author_meta( 'description'); ?>
					</div>
					<div class="author_social">
						<a href="<?php echo esc_url(get_the_author_meta('url')) ; ?>"><i class="fa fa-globe"></i></a>
					</div>
				</div>
				<div class="clearfix"></div>
				
				<!--Comments-->
				<?php comments_template();?>
			</div>

			<!--aside-->
			<aside class="col-md-4 col-sm-4">
				<?php get_sidebar(); ?>
			</aside>
		</div>
	</div>
</div>

<?php if( get_theme_mod( 'atoz_related_post_check' )==1 ) { ?>

<!-- Related Posts -->
<section id="sb-imgbox">
	<div class="container">
		<div class="row ">
			<?php atoz_related_post(); ?>
		</div>
	</div>
</section>
<?php } ?>
<?php get_footer();