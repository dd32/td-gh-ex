<?php
/*
 * Template Name: Events
 *
 * @package AccesspressLite
 */

get_header();

global $post, $accesspresslite_options;
$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
$accesspresslite_show_breadcrumb = $accesspresslite_settings['show_breadcrumb'];
$accesspresslite_event_sidebar = $accesspresslite_settings['event_sidebar'];
$accesspresslite_event_show_date = $accesspresslite_settings['event_show_date'];
$accesspresslite_event_layout = $accesspresslite_settings['event_layout'];
$accesspresslite_event_grid_columns = $accesspresslite_settings['event_grid_columns'];
$accesspresslite_event_char = $accesspresslite_settings['event_char'];
$accesspresslite_event_post_per_page = $accesspresslite_settings['event_post_per_page'];
$accesspresslite_read_more_text = $accesspresslite_settings['read_more_text'];
$accesspresslite_event_fullwidth = ($accesspresslite_settings['event_fullwidth'] == 1) ? " fullwidth" : "";

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
		<div id="primary" class="content-area<?php echo $accesspresslite_event_fullwidth; ?>">
			
			<?php if( '' !== get_the_content() ) :?>	
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
				
			</article><!-- #post-## -->
			<?php endif; ?>

		<?php endwhile; // end of the loop. ?>


		<div class="event-listing <?php echo $accesspresslite_event_layout; ?>">

		<div class="column-<?php echo $accesspresslite_event_grid_columns; ?> clear">
		<?php
			$args = array (
	         'post_type' => 'events',
	         'post_status' => 'publish',
	         'posts_per_page' => -1,
	         'paged' => $paged,
	         'meta_key' => 'accesspresslite_event_day',
    		 'orderby' => 'meta_value_num',
    		 'type' => 'date' 
	        );
	        $wp_query = new WP_Query($args); 

			while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
				$accesspresslite_event_month = get_post_meta( $post -> ID, 'accesspresslite_event_month', true );
				$accesspresslite_event_day = get_post_meta( $post -> ID, 'accesspresslite_event_day', true );
				$thumbnail_id = get_post_thumbnail_id($post->ID);
				$image = wp_get_attachment_image_src($thumbnail_id,'thumbnail','true'); 
				$image_grid = wp_get_attachment_image_src($thumbnail_id,'portfolio','true'); ?>
				<div class="events clear">
					
					<div class="event-img">
					<?php if(has_post_thumbnail()): ?>
						<a href="<?php the_permalink(); ?>">
						<img src="<?php if($accesspresslite_event_layout=='event_grid') echo $image_grid[0]; else echo $image[0]; ?>"/>
						</a>
					<?php else: ?>
						<a href="<?php the_permalink(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/event-fallback.png"/>
						</a>
					<?php endif; ?>
						<div class="event-date">
							<?php echo $accesspresslite_event_month." ".$accesspresslite_event_day; ?>
						</div>
					</div>
					
					<a class="event-short-desc" href="<?php the_permalink(); ?>">
						<h4 class="event-title"><?php the_title(); ?></h4>
						<div class="event-excerpt"><?php echo accesspresslite_excerpt(get_the_content(),$accesspresslite_event_char,"..."); ?></div>
					</a>
				</div>
			<?php	
			endwhile;
			wp_reset_postdata();
			?>
		</div>
		</div>
		<?php edit_post_link( __( 'Edit', 'accesspresslite' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
		</div><!-- #primary -->

		<?php if(is_active_sidebar($accesspresslite_event_sidebar) && $accesspresslite_settings['event_fullwidth'] == 0):?>
			<div id="secondary-right" class="widget-area right-sidebar sidebar"> 
				<?php dynamic_sidebar( $accesspresslite_event_sidebar ); ?>
			</div>
		<?php endif; ?>
		</div>
<?php get_footer(); ?>