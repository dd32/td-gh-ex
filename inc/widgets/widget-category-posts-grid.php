<?php

// Add Category Posts Grid Widget
class Anderson_Category_Posts_Grid_Widget extends WP_Widget {

	function __construct() {
		
		// Setup Widget
		$widget_ops = array(
			'classname' => 'anderson_category_posts_grid', 
			'description' => __('Display latest posts from category in a grid layout. Please use this widget ONLY on Magazine Homepage widget area.', 'anderson-lite')
		);
		$this->WP_Widget('anderson_category_posts_grid', __('Category Posts Grid (Anderson)', 'anderson-lite'), $widget_ops);
		
		// Delete Widget Cache on certain actions
		add_action( 'save_post', array( $this, 'delete_widget_cache' ) );
		add_action( 'deleted_post', array( $this, 'delete_widget_cache' ) );
		add_action( 'switch_theme', array( $this, 'delete_widget_cache' ) );
		
	}

	public function delete_widget_cache() {
		
		wp_cache_delete('widget_anderson_category_posts_grid', 'widget');
		
	}
	
	private function default_settings() {
	
		$defaults = array(
			'title'					=> '',
			'category'				=> 0,
			'number'				=> 6,
			'thumbnails'			=> true,
			'category_link'			=> false
		);
		
		return $defaults;
		
	}
	
	// Display Widget
	function widget($args, $instance) {

		$cache = array();
		
		// Get Widget Object Cache
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'widget_anderson_category_posts_grid', 'widget' );
		}
		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		// Display Widget from Cache if exists
		if ( isset( $cache[ $this->id ] ) ) {
			echo $cache[ $this->id ];
			return;
		}
		
		// Start Output Buffering
		ob_start();
		
		// Get Sidebar Arguments
		extract($args);
		
		// Get Widget Settings
		$defaults = $this->default_settings();
		extract( wp_parse_args( $instance, $defaults ) );
		
		// Add Widget Title Filter
		$widget_title = apply_filters('widget_title', $title, $instance, $this->id_base);
		
		// Output
		echo $before_widget;
	?>
		<div id="widget-category-posts-grid" class="widget-category-posts clearfix">
		
			<?php // Display Title
			$this->display_widget_title($args, $instance); ?>
			
			<div class="widget-category-posts-content">
			
				<?php $this->render($instance); ?>
				
			</div>
			
		</div>
	<?php
		echo $after_widget;
		
		// Set Cache
		if ( ! $this->is_preview() ) {
			$cache[ $this->id ] = ob_get_flush();
			wp_cache_set( 'widget_anderson_category_posts_grid', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	
	}
	
	// Render Widget Content
	function render($instance) {
		
		// Get Widget Settings
		$defaults = $this->default_settings();
		extract( wp_parse_args( $instance, $defaults ) );
	
		// Get latest posts from database
		$query_arguments = array(
			'posts_per_page' => (int)$number,
			'ignore_sticky_posts' => true,
			'cat' => (int)$category
		);
		$posts_query = new WP_Query($query_arguments);
		$i = 0;
		
		// Select Layout of Grid Posts
		$layout = ( $thumbnails == true ? 'small-post' : 'big-post' );
		$image = ( $thumbnails == true ? 'category-posts-widget-small' : 'category-posts-widget-big' );
		
		// Check if there are posts
		if( $posts_query->have_posts() ) :
		
			// Limit the number of words for the excerpt
			add_filter('excerpt_length', 'anderson_category_posts_widgets_excerpt_length');
			
			// Display Posts
			while( $posts_query->have_posts() ) :
				
				$posts_query->the_post(); 
				
				 // Open new Row on the Grid
				 if ( $i % 2 == 0) : ?>
			
					<div class="category-posts-grid-row clearfix">
		
				<?php // Set Variable row_open to true
					$row_open = true;
				endif; ?>

				<?php // Display small posts or big posts grid layout based on options
				if( $thumbnails == true ) : ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('small-post clearfix'); ?>>

					<?php if ( '' != get_the_post_thumbnail() ) : ?>
						<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail('category-posts-widget-small'); ?></a>
					<?php endif; ?>

						<div class="small-posts-content">
							<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							<div class="postmeta"><?php $this->display_postmeta($instance); ?></div>
						</div>

					</article>

				<?php else: ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('big-post'); ?>>

						<?php the_post_thumbnail('category-posts-widget-big'); ?>

						<div class="post-content">
							
							<h3 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>

							<div class="post-entry">
								
								<div class="postmeta"><?php $this->display_postmeta($instance); ?></div>

								<div class="entry">
									<?php the_excerpt(); ?>
								</div>
								
							</div>
						
						</div>

					</article>

				<?php endif; ?>
				
				<?php // Close Row on the Grid
				if ( $i % 2 == 1) : ?>
				
					</div>
				
				<?php // Set Variable row_open to false
					$row_open = false;
				
				endif; $i++;
				
			endwhile;
			
			// Remove excerpt filter
			remove_filter('excerpt_length', 'anderson_category_posts_widgets_excerpt_length');
			
		endif;
		
		// Reset Postdata
		wp_reset_postdata();
		
	}
	
	// Display Postmeta
	function display_postmeta($instance) {  ?>
		
		<span class="meta-date">
		<?php printf(__('Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time datetime="%3$s">%4$s</time></a>', 'anderson-lite'), 
				esc_url( get_permalink() ),
				esc_attr( get_the_time() ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() )
			);
		?>
		</span>
		<span class="meta-author">
		<?php printf(__('by <a href="%1$s" title="%2$s" rel="author">%3$s</a>', 'anderson-lite'), 
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'anderson-lite' ), get_the_author() ) ),
				get_the_author()
			);
		?>
		</span>
	<?php
	}
	
	// Link Widget Title to Category
	function display_widget_title($args, $instance) {
		
		// Get Sidebar Arguments
		extract($args);
		
		// Get Widget Settings
		$defaults = $this->default_settings();
		extract( wp_parse_args( $instance, $defaults ) );
		
		// Add Widget Title Filter
		$widget_title = apply_filters('widget_title', $title, $instance, $this->id_base);
		
		if( !empty( $widget_title ) ) :
		
			echo $before_title;
			
			// Link Category Title
			if( $category_link == true ) : 
				
				echo '<a href="'. esc_url( get_category_link( $category ) ) .'" title="'. $widget_title . '">'. $widget_title . '</a>';
			
			else:
			
				echo $widget_title;
			
			endif;
			
			echo $after_title; 
			
		endif;

	}

	function update($new_instance, $old_instance) {

		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['category'] = (int)$new_instance['category'];
		$instance['number'] = (int)$new_instance['number'];
		$instance['thumbnails'] = !empty($new_instance['thumbnails']);
		$instance['category_link'] = !empty($new_instance['category_link']);
		
		$this->delete_widget_cache();
		
		return $instance;
	}

	function form( $instance ) {
		
		// Get Widget Settings
		$defaults = $this->default_settings();
		extract( wp_parse_args( $instance, $defaults ) );

?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'anderson-lite'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Category:', 'anderson-lite'); ?></label><br/>
			<?php // Display Category Select
				$args = array(
					'show_option_all'    => __('All Categories', 'anderson-lite'),
					'show_count' 		 => true,
					'selected'           => $category,
					'name'               => $this->get_field_name('category'),
					'id'                 => $this->get_field_id('category')
				);
				wp_dropdown_categories( $args ); 
			?>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts:', 'anderson-lite'); ?>
				<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo (int)$number; ?>" size="3" />
				<br/><span class="description"><?php _e('Please chose an even number (2, 4, 6, 8).', 'anderson-lite'); ?></span>
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('thumbnails'); ?>">
				<input class="checkbox" type="checkbox" <?php checked( $thumbnails ) ; ?> id="<?php echo $this->get_field_id('thumbnails'); ?>" name="<?php echo $this->get_field_name('thumbnails'); ?>" />
				<?php _e('Display as small posts grid with thumbnails', 'anderson-lite'); ?>
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('category_link'); ?>">
				<input class="checkbox" type="checkbox" <?php checked( $category_link ) ; ?> id="<?php echo $this->get_field_id('category_link'); ?>" name="<?php echo $this->get_field_name('category_link'); ?>" />
				<?php _e('Link Widget Title to Category Archive page', 'anderson-lite'); ?>
			</label>
		</p>
<?php
	}
}
register_widget('Anderson_Category_Posts_Grid_Widget');
?>