<?php
/*
 * Template Name: FAQ
 *
 * @package AccesspressLite
 */

get_header();

global $post, $accesspresslite_options;
$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
$accesspresslite_show_breadcrumb = $accesspresslite_settings['show_breadcrumb'];
$accesspresslite_faq_left_sidebar = $accesspresslite_settings['faq_left_sidebar'];
$accesspresslite_faq_right_sidebar = $accesspresslite_settings['faq_left_sidebar'];
$accesspresslite_faq_fullwidth = ($accesspresslite_settings['faq_fullwidth'] == 1) ? " fullwidth" : "" ;
$accesspresslite_faq_answer_toggle = $accesspresslite_settings['faq_answer_toggle'];

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
		<div id="primary" class="content-area<?php echo $accesspresslite_faq_fullwidth; ?>">
			
			<?php if( '' !== get_the_content() ) :?>	
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
				
			</article><!-- #post-## -->
			<?php endif; ?>

		<?php endwhile; // end of the loop. ?>


		<div class="faq-listing <?php echo $accesspresslite_faq_answer_toggle; ?>">
		<?php
			$args = array (
	         'post_type' => 'faqs',
	         'post_status' => 'publish',
	         'posts_per_page' => -1,
	         'paged' => $paged,
	        );
	        $wp_query = new WP_Query($args); 

			while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
				<div class="faqs clear">					
					<div class="faq-question"><?php the_title(); ?></div>
					<div class="faq-answer"><?php the_content() ?></div>
				</div>
			<?php	
			endwhile;
			wp_reset_postdata();
			?>
		</div>
		</div><!-- #primary -->

		<?php if(is_active_sidebar($accesspresslite_faq_right_sidebar) && $accesspresslite_settings['faq_fullwidth'] == 0):?>
			<div id="secondary-right" class="widget-area right-sidebar sidebar"> 
				<?php dynamic_sidebar( $accesspresslite_faq_right_sidebar ); ?>
			</div>
		<?php endif; ?>
		</div>
<?php get_footer(); ?>