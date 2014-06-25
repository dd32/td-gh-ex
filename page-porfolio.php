<?php
/*
 * Template Name: Portfolio
 *
 * @package AccesspressLite
 */

get_header();

global $post, $accesspresslite_options;
$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
$accesspresslite_show_breadcrumb = $accesspresslite_settings['show_breadcrumb'];
$accesspresslite_portfolio_sidebar = $accesspresslite_settings['portfolio_sidebar'];
$accesspresslite_portfolio_grid_columns = $accesspresslite_settings['portfolio_grid_columns'];
$accesspresslite_portfolio_grid_char = $accesspresslite_settings['portfolio_grid_char'];
$accesspresslite_portfolio_layout = $accesspresslite_settings['portfolio_layout'];
$accesspresslite_portfolio_post_per_page = $accesspresslite_settings['portfolio_post_per_page'];
$accesspresslite_read_more_text = $accesspresslite_settings['read_more_text'];
$accesspresslite_portfolio_fullwidth = ($accesspresslite_settings['portfolio_fullwidth'] == 1) ? " fullwidth" : "";
$accesspresslite_header_image = get_post_meta( $post -> ID, 'accesspresslite_page_header_image', true );


if(!empty($accesspresslite_header_image)){ ?>
<div id="header-banner-image">
<img src="<?php echo esc_url($accesspresslite_header_image); ?>" alt="Header Image"/> 
</div>
<?php }
		while(have_posts()): the_post() ?>
		<header class="entry-header">
			<?php if ((function_exists('accesspresslite_breadcrumbs') && $accesspresslite_show_breadcrumb == 0) || empty($accesspresslite_show_breadcrumb)) {
			accesspresslite_breadcrumbs();
			} ?>
			<h1 class="entry-title ak-container"><?php the_title(); ?></h1>
		</header><!-- .entry-header -->

		<div class="ak-container">
		<div id="primary" class="content-area<?php echo $accesspresslite_portfolio_fullwidth; ?>">
		<?php if( '' !== get_the_content() ) :?>	
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
				
			</article><!-- #post-## -->
		<?php endif; ?>
		<?php endwhile; // end of the loop. ?>


		<div class="portfolio-listing <?php echo $accesspresslite_portfolio_layout; ?>">
		<?php
		$args = array(
	    'orderby'    => 'count',
		); 

		$portfolio_categories = get_terms( 'portfolio-category', $args );
		if(!empty($portfolio_categories) && !is_wp_error($portfolio_categories)):
			echo "<ul class='button-group clear' data-filter-group='category'>";
			echo "<li data-filter='' class='is-checked'>All</li>";
			foreach ($portfolio_categories as $portfolio_category) :
				echo "<li data-filter='.".$portfolio_category->slug."'>" . $portfolio_category->name . "</li>";
			endforeach;
			echo "</ul>";
		endif;
		wp_reset_query();
		?>

		<div class="column-<?php echo $accesspresslite_portfolio_grid_columns; ?> clear">
		<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
			$args = array (
	         'post_type' => 'portfolio',
	         'post_status' => 'publish',
	         'posts_per_page' => -1,
	         'paged' => $paged,

	         
	        );
	        $wp_query = new WP_Query($args); 

			while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
				$thumbnail_id = get_post_thumbnail_id($post->ID);
				$image = wp_get_attachment_image_src($thumbnail_id,'portfolio-thumbnail','true'); 
				$image_large = wp_get_attachment_image_src($thumbnail_id,'large','true'); ?>
				<div class="portfolios clear">
					<div class="portfolios-bg"></div>
					<img src="<?php echo $image[0]; ?>"/> 
					<div class="portfolio-short-desc">
						<h4 class="portfolio-title"><?php the_title(); ?></h4>
						<div class="portfolio-excerpt"><?php echo accesspresslite_excerpt(get_the_content(),$accesspresslite_portfolio_grid_char,"..."); ?></div>
						<a class="portfolio-link" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
						<a class="portfolio-image" href="<?php echo $image_large[0];?>"><i class="fa fa-arrows-alt"></i></a>
						<?php if(!empty($accesspresslite_read_more_text)):?>
							<a href="<?php the_permalink(); ?>" class="bttn"><?php echo $accesspresslite_read_more_text; ?></a>
						<?php endif; ?>
					</div>
				</div>
			<?php	
			endwhile;
			?>
		</div>
		<?php 
		kriesi_pagination( $wp_query->max_num_pages);
		wp_reset_postdata();
		?>
		</div>
		</div><!-- #primary -->

		<?php if(is_active_sidebar($accesspresslite_portfolio_sidebar) && $accesspresslite_settings['portfolio_fullwidth'] == 0):?>
			<div id="secondary-right" class="widget-area right-sidebar sidebar"> 
				<?php dynamic_sidebar( $accesspresslite_portfolio_sidebar ); ?>
			</div>
		<?php endif; ?>
		</div>
<?php get_footer(); ?>