<?php
/**
 * advantage Theme Widgets
 *
 * @package advantage
 * @since advantage 1.0
 */
class advantage_Recent_Post extends WP_Widget {
	function __construct() {
		WP_Widget::__construct(
			'widget_advantage_recent_post',
			__( '(advantage) Recent Posts', 'advantage' ),
			array(
				'classname' => 'advantage_recent_post',
				'description' => __( 'Use this widget to list your recent post summary.', 'advantage' ),
			)
		);
	}
	// Widget outputs
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );
		$instance = wp_parse_args($instance, $this->widget_defaults());
		extract( $instance, EXTR_SKIP );
		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base);
					
 		if ( $random_post )
			$sortby = 'rand';
		else
			$sortby = '';
		if ( $sticky_post )
			$sticky = array();
		else
			$sticky = get_option( 'sticky_posts' );

		global $advantage_display_excerpt, $advantage_entry_meta;
		$advantage_display_excerpt = $display_excerpt;
		$advantage_entry_meta = $entry_meta;
						
		$query_str = array(
			'order' => 'DESC',
			'orderby' => $sortby,
			'posts_per_page' => $number,
			'post_status' => 'publish',
			'post_type' => $posttype,
			'ignore_sticky_posts' => 1,
			'no_found_rows' => 1,
		);
		if ( 'post' == $posttype ) {
			$query_str['category__in'] = $category;
			$query_str['post__not_in'] = $sticky;			
		}
		if ( ! empty( $customquery ) ) {
			$custom_query = wp_parse_args( $customquery, NULL );	
			foreach ( $custom_query as $key => $query ) {
				if ( strpos( $key, '__' ) && strpos( $query, ',' ) )
					$query_str[$key] = explode( ',', $query );	
				else
					$query_str[$key] = $query;
			}
		}

		$recent_posts = new WP_Query( $query_str );
		if ( $recent_posts->have_posts() ) :
			echo $before_widget; 

			if ( ! empty( $title ) ) {
				echo $before_title;
				echo $title; // Can set this with a widget option, or omit altogether
				echo $after_title;			
				if ( ! empty( $category_link ) && $category ) {
			
					printf( '<a href="%1$s" title="%2$s" class="advantage_recent_post_link btn btn-small btn-transparent">%3$s</a>',
						get_category_link( $category ) ,
						get_the_category_by_ID( $category ),
						$category_link );					
				}	
			}

			global $advantage_thumbnail;
			
			$advantage_thumbnail = advantage_thumbnail_size( $thumbnail, $thumbnail_x, $thumbnail_y);
			$col = 0;
			while ( $recent_posts->have_posts() ) : 
				$recent_posts->the_post();
				$div_class = '';
				if ( $column > 1 && $col == 0 )
					echo '<div class="row">';
				if ($column == 2) {
					$div_class = "large-6 columns";
					$col = $col + 1;
					if ($col == 2)
						$col = 0;
				}
				elseif ($column == 3) {
					$div_class = "large-4 columns";
					$col = $col + 1;
					if ($col == 3)
						$col = 0;
				}
				elseif ($column == 4) {
					$div_class = "large-3 columns";
					$col = $col + 1;
					if ($col == 4)
						$col = 0;
				}

				if  ($column > 1)
					echo '<div class="' . $div_class .'">';
				get_template_part( 'content', 'summary' );
				
				if  ($column > 1) {
					echo '</div>';				
					if ($col == 0)
						echo '</div>';
				}
			endwhile;
			
			if ( $col > 0 )
				echo '</div>';
			echo $after_widget;
			// Reset the post globals as this query will have stomped on it
			wp_reset_postdata();
		endif;
	}

	// Update options
	function update( $new, $old ) {
		$instance = $old;
		$instance['title'] = strip_tags( $new['title'] );
		$instance['number'] = (int) $new['number'];
		$col = (int) $new['column'];
		if ($col > 4)
			$col = 4;
		if ($col <1 )
			$col = 1;
		$instance['column'] = $col;
		$instance['posttype'] = $new['posttype'];	
		$instance['customquery'] = wp_kses_stripslashes( $new['customquery'] );
		$instance['category'] =  (int) $new['category'];
		$instance['sticky_post'] =  (int) $new['sticky_post'];
		$instance['random_post'] =  (int) $new['random_post'];
		$instance['entry_meta'] =  (int) $new['entry_meta'];
		$instance['category_link'] =  strip_tags($new['category_link']);
		$instance['display_excerpt'] =  $new['display_excerpt'];
		$instance['thumbnail'] = $new['thumbnail'];
		$size = (int) $new['thumbnail_x'];
		if ($size < 1)
			$size = 64;
		$instance['thumbnail_x'] = $size;
		$size = (int) $new['thumbnail_y'];
		if ($size < 1)
			$size = 64;
		$instance['thumbnail_y'] = $size;

		return $instance;
	}
	
	function widget_defaults() {
		return array(
			'title' => '',
			'posttype' => 'post',
			'number' => '10',
			'category' => '0',
			'sticky_post' => '0',
			'random_post' => '0',
			'column' => '1',
			'thumbnail' => '1',
			'thumbnail_x' => '64',
			'thumbnail_y' => '64',
			'display_excerpt' => 1,
			'entry_meta' => '0',
			'category_link' => '',
			'customquery' => '',
		);
	}
	// Display options
	function form( $instance ) {
		$instance = wp_parse_args($instance, $this->widget_defaults());

		advantage_widget_field( $this, array ( 'field' => 'title', 'label' => __( 'Title:', 'advantage' ) ), $instance['title'] );
		advantage_widget_field( $this, array ( 'field' => 'posttype', 'type' => 'select', 'label' => __( 'Post Type:', 'advantage' ), 'options' => advantage_post_types(), 'class' => '' ), $instance['posttype'] );
		advantage_widget_field( $this, array ( 'field' => 'number', 'type' => 'number', 'label' => __( 'Number of posts to show:', 'advantage' ),  'class' => '' ), $instance['number'] );
		advantage_widget_field( $this, array ( 'field' => 'random_post', 'type' => 'checkbox', 'desc' => __( 'Random Posts', 'advantage' ), 'class' => '' ), $instance['random_post'] );
		advantage_widget_field( $this, array ( 'field' => 'column', 'type' => 'number', 'label' => __( 'No of Columns (1-4):', 'advantage' ),  'class' => '' ), $instance['column'] );
		advantage_widget_field( $this, array ( 'field' => 'category', 'type' => 'category', 'label' => __( 'Category:', 'advantage' ), 'label_all' => __( 'All Categories', 'advantage' ), 'options' => advantage_categories() ), $instance['category'] );
		advantage_widget_field( $this, array ( 'field' => 'sticky_post', 'type' => 'checkbox', 'desc' => __( 'Include sticky posts in the category', 'advantage' ), 'class' => '' ), $instance['sticky_post'] );	
		advantage_widget_field( $this, array ( 'field' => 'thumbnail', 'type' => 'select', 'label' => __( 'Thumbnail:', 'advantage' ), 'options' => advantage_thumbnail_array(), 'class' => '' ), $instance['thumbnail'] );
?>
		<p><?php advantage_widget_field( $this, array ( 'field' => 'thumbnail_x', 'type' => 'number', 'label' => __( 'Custom size: ', 'advantage' ),  'class' => '', 'ptag' => false ), $instance['thumbnail_x'] ); advantage_widget_field( $this, array ( 'field' => 'thumbnail_y', 'type' => 'number', 'label' => __( ' x ', 'advantage' ),  'class' => '', 'ptag' => false ), $instance['thumbnail_y'] ); ?></p>
<?php 		advantage_widget_field( $this, array ( 'field' => 'display_excerpt', 'type' => 'select', 'label' => __( 'Intro Text: ', 'advantage' ),
	'options' => array (
		array(	'key' => '1',
				'name' => __( 'Excerpt', 'advantage' ) ),
		array(	'key' => '2',
				'name' => __( 'Content', 'advantage' ) ),
		array(	'key' => '3',
				'name' => __( 'None', 'advantage' ) ) ),
	'class' => '' ), $instance['display_excerpt'] );
		advantage_widget_field( $this, array ( 'field' => 'entry_meta', 'type' => 'checkbox', 'desc' => __( 'Display post meta', 'advantage' ), 'class' => '' ), $instance['entry_meta'] );
		advantage_widget_field( $this, array ( 'field' => 'category_link', 'label' => __( 'Single category link : ', 'advantage' ), 'class' => '' ), $instance['category_link'] );
		advantage_widget_field( $this, array ( 'field' => 'customquery', 'label' => __( 'Custom Query:', 'advantage' ) ), $instance['customquery'] );	
	}
}

class advantage_Navigation extends WP_Widget {
	function __construct() {
		WP_Widget::__construct(
			'widget_advantage_navigation',
			__( '(advantage) Navigation Tabs', 'advantage' ),
			array(
				'classname'   => 'advantage_navigation',
				'description' => __( 'Tabbed navigation.', 'advantage' ),
			)
		);
	}
	// Widget outputs
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );
		$instance = wp_parse_args($instance, $this->widget_defaults());
		extract( $instance, EXTR_SKIP );
		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base);		
		$id = substr($widget_id,25);

		$tabs = array();
		if ($category)
			$tabs[] = array( 'order' => $category,
							 'type'	 => 'category',
							 'name' =>  $category_label );
		if ($archive)
			$tabs[] = array( 'order' => $archive,
							 'type'	 => 'archive',
							 'name' =>  $archive_label );
		if ($recent)
			$tabs[] = array( 'order' => $recent,
							 'type'	 => 'recent',
							 'name' =>  $recent_label );
		if ($tag)
			$tabs[] = array( 'order' => $tag,
							 'type'	 => 'tag',
							 'name' =>  $tag_label );
		if ($menu && $menu_id)
			$tabs[] = array( 'order' => $menu,
							 'type'	 => 'menu',
							 'name' =>  $menu_label );
		if ( $text && ! empty( $textcontent ) )
			$tabs[] = array( 'order' => $text,
							 'type'	 => 'text',
							 'name' =>  $text_label );

		advantage_sort_array($tabs, "order");

		echo $before_widget; 
		if ( ! empty( $title ) ) {
			echo $before_title;
			echo $title;
			echo $after_title;
		}

		echo '<div class="section-container tabs" data-section="tabs">';
		foreach ($tabs as $tab) {
		  if ($tab['order'] > 0) {
		  	echo '<section>';
			echo '<p class="title" data-section-title><a href="#">' . $tab['name'] .'</a></p>';
    
			switch ($tab['type']) {
			  case 'category':
				echo '<div class="content widget_categories" data-section-content><ul>';				
				$cat_args = array();
				$cat_args['show_count'] = $showcount;
				$cat_args['title_li'] = '';
				$cat_args['exclude'] = 1;
				wp_list_categories( $cat_args );		
				echo '</ul></div>';		
				break;
			  case 'archive':
				echo '<div class="content widget_archive" data-section-content><ul>';
				$arc_args = array();
				$arc_args['type'] = 'monthly';
				$arc_args['show_post_count'] = $showcount;	
				$arc_args['limit'] = $limits;
				wp_get_archives( $arc_args ); 	
							
				echo '</ul></div>';
				break;
			  case 'recent':
				echo '<div class="content widget_recent_entries" data-section-content><ul>';
				
				$rec_args = array();
				$rec_args['numberposts'] = $limits;
				$rec_args['post_status'] = 'publish';
				$recent_posts = wp_get_recent_posts( $rec_args ); 
				foreach( $recent_posts as $recent_post ){
					echo '<li><a href="' . get_permalink($recent_post["ID"]) . '" title="Look '.esc_attr($recent_post["post_title"]).'" >' . $recent_post["post_title"].'</a> </li> ';
				}			
				echo '</ul></div>';
				break;
			  case 'tag':
				echo '<div class="content widget_tag_cloud" data-section-content><ul>';
				
				$tag_args = array();
				wp_tag_cloud( $tag_args ); 			
				echo '</ul></div>';
				break;
			  case 'menu':
				echo '<div class="content widget_nav_menu" data-section-content>';				
				$menu_args = array();
				$menu_args['menu'] = $menu_id;
				wp_nav_menu( $menu_args);		
				echo '</div>';	
				break;
			  case 'text':
				echo '<div class="content widget_text" data-section-content>';
				echo do_shortcode( $textcontent );	
				echo '</div>';		
				break;
			}
		  	echo '</section>';
		  }
		}		
        echo '</div>';

		echo $after_widget;
		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
	}

	// Update options
	function update( $new, $old ) {
		$instance = $old;
		$instance['title'] = strip_tags( $new['title'] );
		$instance['category'] =  (int) $new['category'];
		$instance['archive'] =  (int) $new['archive'];
		$instance['recent'] =  (int) $new['recent'];
		$instance['tag'] =  (int) $new['tag'];
		$instance['menu'] =  (int) $new['menu'];		
		$instance['text'] =  (int) $new['text'];		
		$instance['showcount'] =  (int) $new['showcount'];
		$instance['limits'] =  (int) $new['limits'];		

		$instance['category_label'] =  wp_kses_stripslashes($new['category_label']);
		$instance['archive_label'] =  wp_kses_stripslashes($new['archive_label']);
		$instance['recent_label'] =  wp_kses_stripslashes($new['recent_label']);
		$instance['tag_label'] =  wp_kses_stripslashes($new['tag_label']);
		$instance['menu_label'] =  wp_kses_stripslashes($new['menu_label']);
		$instance['menu_id'] =  $new['menu_id'];
		$instance['text_label'] =  wp_kses_stripslashes($new['text_label']);
		$instance['textcontent'] =  wp_kses_stripslashes($new['textcontent']);
		$instance['data'] = $new['data'];
		$items = array();
		parse_str($instance['data'], $items);

		if ( ! empty( $items['tab'] ) ) {
			$ii = 1;
			foreach( $items['tab'] as $item ) {
				if ( $instance[ $item ] ) {
					$instance[ $item ] = $ii;
					$ii = $ii + 1;
				}
			}
		}			
		return $instance;
	}

	function widget_defaults() {
		return array(
			'title' => '',
			'category' => '1',
			'category_label' => __('Categories','advantage'),
			'archive' => '2',
			'archive_label' => __('Archives','advantage'),
			'recent' => '0',
			'recent_label' => __('Latest','advantage'),
			'tag' => '3',
			'tag_label' => __('Tags','advantage'),
			'menu' => '0',
			'menu_label' => __('Menu','advantage'),
			'menu_id' => '0',
			'text' => '0',
			'text_label' => __('Text','advantage'),
			'showcount' => '1',
			'limits' => '10',
			'textcontent' => '',
			'data' => '',
		);
	}

	// Display options
	function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->widget_defaults() );
		
		$tabs = array(
			array( 'order' => $instance['category'],
						 'type'	 => 'category' ),
			array( 'order' => $instance['archive'],
						 'type'	 => 'archive' ),
			array( 'order' => $instance['recent'],
						 'type'	 => 'recent' ),
			array( 'order' => $instance['tag'],
						 'type'	 => 'tag' ),
			array( 'order' => $instance['menu'],
						 'type'	 => 'menu' ),
			array( 'order' => $instance['text'],
						 'type'	 => 'text' ),
				);
		advantage_sort_array($tabs, "order");
		
		advantage_widget_field( $this, array ( 'field' => 'title', 'label' => __( 'Title:', 'advantage' ) ), $instance['title'] );
		?>
		<ul id="widget-nav-tabs" class="widget-sortable">
<?php
		$data = "";
		foreach( $tabs as $tab ) {
			$data .= 'tab[]=' . $tab['type'] . '&';
			switch ( $tab['type'] ) {
				case 'category':
					if ( $instance['category'] > 0 )
						$flag = 1;
					else
						$flag = 0;						
					echo '<li id="tab_category" ';
					if ( $flag )
						echo 'class="tab-selected"';
					echo '>';	
					advantage_widget_field( $this, array ( 'field' => 'category', 'type' => 'checkbox', 'desc' => __( 'Category', 'advantage' ), 'ptag' => false, 'class' => 'widget-checkbox' ), $flag );
					advantage_widget_field( $this, array ( 'field' => 'category_label', 'type' => 'text', 'ptag' => false, 'class' => '' ), $instance['category_label'] );
					echo '</li>';
					break;
				case 'archive':
					if ( $instance['archive'] > 0 )
						$flag = 1;
					else
						$flag = 0;						
					echo '<li id="tab_archive" ';
					if ( $flag )
						echo 'class="tab-selected"';
					echo '>';
					advantage_widget_field( $this, array ( 'field' => 'archive', 'type' => 'checkbox', 'desc' => __( 'Archive', 'advantage' ), 'ptag' => false, 'class' => 'widget-checkbox' ), $flag );
					advantage_widget_field( $this, array ( 'field' => 'archive_label', 'type' => 'text', 'ptag' => false, 'class' => '' ), $instance['archive_label'] );
					echo '</li>';
					break;
				case 'recent':
					if ( $instance['recent'] > 0 )
						$flag = 1;
					else
						$flag = 0;						
					echo '<li id="tab_recent" ';
					if ( $flag )
						echo 'class="tab-selected"';
					echo '>';
					advantage_widget_field( $this, array ( 'field' => 'recent', 'type' => 'checkbox', 'desc' => __( 'Recent', 'advantage' ), 'ptag' => false, 'class' => 'widget-checkbox' ), $flag );
					advantage_widget_field( $this, array ( 'field' => 'recent_label', 'type' => 'text', 'ptag' => false, 'class' => '' ), $instance['recent_label'] );
					echo '</li>';
					break;
				case 'tag':
					if ( $instance['tag'] > 0 )
						$flag = 1;
					else
						$flag = 0;						
					echo '<li id="tab_tag" ';
					if ( $flag )
						echo 'class="tab-selected"';
					echo '>';
					advantage_widget_field( $this, array ( 'field' => 'tag', 'type' => 'checkbox', 'desc' => __( 'Tag', 'advantage' ), 'ptag' => false, 'class' => 'widget-checkbox' ), $flag );
					advantage_widget_field( $this, array ( 'field' => 'tag_label', 'type' => 'text', 'ptag' => false, 'class' => '' ), $instance['tag_label'] );
					echo '</li>';
					break;
				case 'menu':
					if ( $instance['menu'] > 0 )
						$flag = 1;
					else
						$flag = 0;						
					echo '<li id="tab_menu" ';
					if ( $flag )
						echo 'class="tab-selected"';
					echo '>';
					advantage_widget_field( $this, array ( 'field' => 'menu', 'type' => 'checkbox', 'desc' => __( 'Menu', 'advantage' ), 'ptag' => false, 'class' => 'widget-checkbox' ), $flag );
					advantage_widget_field( $this, array ( 'field' => 'menu_label', 'type' => 'text', 'ptag' => false, 'class' => '' ), $instance['menu_label'] );
					advantage_widget_field( $this, array ( 'field' => 'menu_id', 'type' => 'category', 'label' => __( 'Menu:', 'advantage' ), 'label_all' => __( 'Select Menu', 'advantage' ), 'options' => get_terms('nav_menu'), 'ptag' => false ), $instance['menu_id'] );
					echo '</li>';
					break;
				case 'text':
					if ( $instance['text'] > 0 )
						$flag = 1;
					else
						$flag = 0;						
					echo '<li id="tab_text" ';
					if ( $flag )
						echo 'class="tab-selected"';
					echo '>';
					advantage_widget_field( $this, array ( 'field' => 'text', 'type' => 'checkbox', 'desc' => __( 'Text', 'advantage' ), 'ptag' => false, 'class' => 'widget-checkbox' ), $flag );
					advantage_widget_field( $this, array ( 'field' => 'text_label', 'type' => 'text', 'ptag' => false, 'class' => '' ), $instance['text_label'] );
					echo '</li>';
					break;
			}
		}
		$instance['data'] = $data;
?>		
		</ul>
<?php	advantage_widget_field( $this, array ( 'field' => 'limits', 'type' => 'number', 'label' => __( 'Post/Line Limits', 'advantage' ),  'class' => '' ), $instance['limits'] );
		advantage_widget_field( $this, array ( 'field' => 'showcount', 'type' => 'checkbox', 'desc' => __( 'Show Post Counts', 'advantage' ), 'class' => '' ), $instance['showcount'] );
		advantage_widget_field( $this, array ( 'field' => 'textcontent', 'type' => 'textarea', 'label' => __( 'Text:', 'advantage' ) ), $instance['textcontent'] );
		advantage_widget_field( $this, array ( 'field' => 'data', 'type' => 'hidden', 'class' => 'widefat advantagedata', 'ptag' => false ), $instance['data'] );		
	}
}

class advantage_Social extends WP_Widget {
	function __construct() {
		WP_Widget::__construct(
			'widget_advantage_social',
			__( '(advantage) Social', 'advantage' ),
			array(
				'classname'   => 'advantage_social',
				'description' => __( 'Display social links as widget', 'advantage' ),
			)
		);
	}
	// Widget outputs
	function widget( $args, $instance ) {
		global $advantage_options;
		extract( $args, EXTR_SKIP );
		$instance = wp_parse_args($instance, $this->widget_defaults());
		extract( $instance, EXTR_SKIP );
		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base);		
		echo $before_widget; 
		if ( ! empty( $title ) ) {
			echo $before_title;
			echo $title;
			echo $after_title;
		} 		
				
		$socials = advantage_social_links();
		$items = array();
		parse_str($instance['data'], $items);
		if ( ! empty( $items['url'] ) ) {
			echo '<div class="social-links large-icon"><ul>';
			foreach ( $items['url'] as $item ) {
				echo '<li><a class="' . $socials[ $item ]['name'];
				echo '" href="' . esc_url( $advantage_options[ $socials[ $item ]['name'] ] );
				echo '" title="' . esc_attr(  $socials[ $item ]['label'] );
				echo '" target="_blank">' . esc_attr( $socials[ $item ]['label'] ) . '</a></li>';
			}
			echo '</ul></div>';
		}		
		echo $after_widget;
//		wp_reset_postdata();
	}

	// Update options
	function update( $new, $old ) {
		$instance = $old;
		$instance['title'] = strip_tags( $new['title'] );
		$instance['data'] = wp_kses_stripslashes( $new['data'] );

//		$instance['category_label'] =  wp_kses_stripslashes($new['category_label']);
		return $instance;
	}

	function widget_defaults() {
		return array(
			'title' => '',
			'data' => '',
		);
	}

	// Display options
	function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->widget_defaults() );
		
		advantage_widget_field( $this, array ( 'field' => 'title', 'label' => __( 'Title:', 'advantage' ) ), $instance['title'] );
		echo '<p>' . __( 'Drag available Socials to the right', 'advantage' ) . '</p>';
		?>
		<ul id="sl-available" class="widget-sortable connected">
<?php 	
		global $advantage_options;
		$socials = advantage_social_links();
		$items = array();
		parse_str( $instance['data'], $items );
		
		foreach ( $socials as $social ) {	
			if ( ! empty( $advantage_options[ $social['name'] ] ) ) {
				$item = substr( $social['name'], 4 );
				if ( empty( $items ) || ! in_array( $item,  $items['url']) )
					echo '<li id="' . $social['name'] . '" class="' . $social['name'] . '">' . $social['label'] . '</li>';				
			}
		}
?>
		</ul>
		<ul id="sl-active" class="widget-sortable connected">
<?php 	
		if ( ! empty( $items ) )
			foreach ( $items['url'] as $item ) {
				echo '<li id="' . $socials[$item]['name'] . '" class="' . $socials[$item]['name'] . '">' . $socials[$item]['label'] . '</li>';
			}
?>		
		</ul>
		<div class="clear"></div>
<?php
		advantage_widget_field( $this, array ( 'field' => 'data', 'type' => 'hidden', 'class' => 'widefat advantagedata', 'ptag' => false ), $instance['data'] );
	}
}

function advantage_widget_field( $widget, $args = array(), $value ) {
	$args = wp_parse_args($args, array ( 
		'field' => 'title',
		'type' => 'text',
		'label' => '',
		'desc' => '',
		'class' => 'widefat',
		'options' => array(),
		'label_all' => '',
		'ptag' => true,
		) );
	extract( $args, EXTR_SKIP );

	$field_id =  esc_attr( $widget->get_field_id( $field ) );
	$field_name = esc_attr( $widget->get_field_name( $field ) );
	
	if ( $ptag )
		echo '<p>';
	if ( ! empty( $label ) ) {
		echo '<label for="' . $field_id . '">';
		echo $label . '</label>';
	}
	switch ( $type ) {
		case 'text':
		case 'hidden':
			echo '<input class="' . $class . '" id="' . $field_id;
			echo '" name="' . $field_name . '" type="' . $type .'" value="';
			echo esc_attr( $value ) . '" />';
			break;
		case 'textarea':
			echo '<textarea class="' . $class . '" id="' . $field_id;
			echo '" name="' . $field_name . '" type="' . $type .'" row="10" col="20">';
			echo esc_textarea( $value ) . '</textarea>';
			break;
		case 'number':
			echo '<input class="' . $class . '" id="' . $field_id;
			echo '" name="' . $field_name . '" type="text" size="3" value="';
			echo esc_attr( $value ) . '" />';
			break;
		case 'checkbox':
			echo '<input class="' . $class . '" id="' . $field_id;
			echo '" name="' . $field_name . '" type="' . $type .'" value="1" ';
			echo checked( '1', $value, false ) . ' /> ';
			echo '<label for="' . $field_id . '"> ' . $desc . '</label>';
			break;
		case 'category':
			echo '<select id="' . $field_id . '" name="' . $field_name . '">';
			if ( ! empty( $label_all ) ) {
			 	echo '<option value="0" ' . selected( $value, '0', false );
			 	echo '>' . $label_all . '</option>';				
			}
			foreach ( $options as $option ) {
				echo '<option value="' . $option->term_id . '" ' . selected( $value, $option->term_id, false );
				echo '>' . $option->name . '</option>';
			}
			echo '</select>';
			break;
		case 'select':
			echo '<select id="' . $field_id . '" name="' . $field_name . '">';
			foreach ( $options as $option ) {
				echo '<option value="' . $option['key'] . '" ' . selected( $option['key'], $value, false );
				echo '>' . $option['name'] . '</option>';
			}
			echo '</select>';
			break;
	}
	if ( $ptag )
		echo '</p>';
}
