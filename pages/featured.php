<?php
/**
 * Template Name: Featured Home Page
 *
 * @package advantage
 * @since 1.0
 */
get_header();

	global $advantage_options, $content_width;
	
	$post_pp = -1; // All Posts
	if ( 1 == $advantage_options['fp_option']  && 0 == $advantage_options['fp_category'] )
		$post_pp = 5;
	$featured_args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $post_pp,
						'ignore_sticky_posts' => 1,
						'no_found_rows' => 1
						);
	if ( $advantage_options['fp_category'] > 0 && 1 == $advantage_options['fp_option'] )
		$featured_args['category__in'] = $advantage_options['fp_category'];
	elseif (2 == $advantage_options['fp_option']) {
	   $featured_args['meta_query'] = array(
       			array(
           			'key' => '_advantage_featured',
           			'value' => 1,
          			'compare' => 'IN' ) );
	}

	$featured = new WP_Query( $featured_args );
?>
<div id="featured-home" class="carousel slide">
      <div class="carousel-inner">
        <div class="item active">
          <img src="http://localhost/wordpress/wp-content/uploads/2013/06/header_bg.png" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Example headline.</h1>
              <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <a class="btn btn-large btn-primary" href="#">Sign up today</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="http://localhost/wordpress/wp-content/uploads/2013/05/GreatWall1920x1080.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <a class="btn btn-large btn-primary" href="#">Learn more</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="http://localhost/wordpress/wp-content/uploads/2013/05/GreatWall1920x1080.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <a class="btn btn-large btn-primary" href="#">Browse gallery</a>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#featured-home" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#featured-home" data-slide="next">&rsaquo;</a>
    </div><!-- /.carousel -->
<?php
/*	$count = 0;
	if ( $featured->have_posts() ) {
		$thumbs = array();
		
		echo '<div id="featured-column" class="large-12 columns"><div class="flexslider">';
		echo '<ul id="featured" class="slides">';
		while ( $featured->have_posts() ) {
			$featured->the_post();
			$readmore = get_post_meta( $post->ID, '_advantage_readmore', true );
			if ( empty( $readmore ) )
				$readmore = __( 'Learn More', 'advantage' );

			$thumbs[] = array( 'title' => trim(strip_tags(get_the_title())), 'thumb' => '' );
			$count += 1;		
			echo '<li>';
			if ( has_post_thumbnail() ) { // Featured
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
				$thumbs[$count - 1]['thumb'] = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
				if ( $image[1] >= $content_width * 0.70 ) { // Large Featured
					echo '<a href="' . get_permalink() . '">';
					the_post_thumbnail( 'full', array(  'title' => get_the_title() ) );
					echo '</a><div class="slider-caption">';
					the_excerpt();
					echo '</div>';
				} else { // Small Featured
					echo '<div class="row">';
					echo '<div class="large-6 columns">';
					echo '<a href="' . get_permalink() . '">';
					the_post_thumbnail( 'large', array(  'title' => get_the_title() ) );
					echo '</a></div><div class="large-6 columns small-featured">';
					echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
					the_excerpt(); 
					echo '<a class="btn btn-primary btn-large" href="' . get_permalink() . '">';
					echo $readmore . '</a>';
					echo '</div></div>';
				}

			} else { // No Featured Images
				echo '<div class="no-featured-image">';
				echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
				the_excerpt(''); 
				echo '<a class="btn btn-primary btn-large" href="' . get_permalink() . '">';
				echo $readmore . '</a>';
				echo '</div>';			
			}
			echo '</li>';
		}
		echo '</ul></div></div></div>';
		echo '<input id="slider-animation" type="hidden" value="' . $advantage_options['fp_effect'] . '">';
		if ($count > 1) {
			echo '<div id="featured-row" class="row hide-for-small row-container"><div class="small-12 columns">';
			echo '<ul id="featured-list">';

			for ( $i = 1 ; $i <= $count; $i++ ) {
				echo '<li>';
				if ( ! empty( $thumbs[ $i - 1 ]['thumb'] ) ) {
					echo '<img src="' . $thumbs[ $i - 1 ]['thumb'][0] . '" />';
				}
				else {
					echo '<img src="' . get_template_directory_uri() . '/images/default.png' . '" />';
				}
				echo '<span class="thumb-title">' . $thumbs[ $i - 1 ]['title'] .'</span>';
				echo '</li>';
			}
			echo '</ul></div></div>';
		}
		echo '</div>'; //Featured Wrapper
	} else {
		echo "</div></div>";
	}  */
	wp_reset_postdata();
	advantage_nav_menu();
?>
<div class="container-fluid content-area">
<div class="row-fluid">	
        <div class="span4">
          <img class="img-circle" data-src="holder.js/140x140">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div><!-- /.span4 -->
        <div class="span4">
          <img class="img-circle" data-src="holder.js/140x140">
          <h2>Heading</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div><!-- /.span4 -->
        <div class="span4">
          <img class="img-circle" data-src="holder.js/140x140">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div><!-- /.span4 -->
      </div><!-- /.row -->
<?php
	get_sidebar('home');
	get_footer();