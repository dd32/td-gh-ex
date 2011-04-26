<?php
/**
 * The Header for our theme.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'absolum' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />


<?php if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_head();
?>

</head>

<body <?php body_class(); ?>>     
<div id="blog-title">

<div id="blog-title-holder">


<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
      
					<span>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</span>
				</<?php echo $heading_tag; ?>>
        
        <div id="subscribe"><a href="<?php $options = get_option('absolum');if ($options['abs_rss_feed'] != "" ) { echo $options['abs_rss_feed']; } else { bloginfo( 'rss_url' ); } ?>" title="RSS Feed"><img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" width="42" height="69" alt="RSS Feed" /></a>
        

        <?php $options = get_option('absolum');
if (!empty($options['abs_facebook'])) { ?><a target="_blank" href="http://facebook.com/<?php echo stripslashes($options['abs_facebook']);?>" title="Facebook" >

<img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" width="40" height="69" alt="Facebook" />
</a><?php } ?>

        <?php $options = get_option('absolum');
if (!empty($options['abs_twitter_id'])) { ?><a target="_blank" href="http://twitter.com/<?php echo stripslashes($options['abs_twitter_id']);?>" title="Twitter" >

<img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" width="42" height="66" alt="Twitter" />
</a><?php } ?>


        <?php $options = get_option('absolum');
if (!empty($options['abs_newsletter'])) { ?><a target="_blank" href="<?php echo stripslashes($options['abs_newsletter']);?>" title="Newsletter" >

<img src="<?php echo get_template_directory_uri(); ?>/images/newsletter.png" width="40" height="66" alt="Newsletter" />
</a><?php } ?>     

        </div>
        
				<div id="site-description"><?php bloginfo( 'description' ); ?></div>

</div>
</div>

<div id="nav-back">
		<div id="access" role="navigation">
			
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'link_before' => '<span class="item-left"></span><span class="icon">' , 'link_after' => '</span><span class="item-right"></span>' ) ); ?>
			</div><!-- #access -->
      </div>
      
<div id="wrapper" class="hfeed">

<div id="back-top-left"></div>
<div id="back-top-right"></div>
<div id="back-bottom-left"></div>
<div id="back-bottom-right"></div>
<div id="back-top"></div>
<div id="back-bottom"></div>
<div id="back-left"></div>
<div id="back-right"></div>

	<div id="header">              
    
 <?php $options = get_option('absolum');
 if ($options['abs_header_slider'] == "disable" || $options['abs_header_slider'] == "") {
 
 } else {
  if ($options['abs_header_slider'] == "one") { 
  
   $number_items = 1;
  
   } else { $number_items = 10; } } ?>    	

    <?php $options = get_option('absolum');
 if ($options['abs_header_slider'] == "disable" || $options['abs_header_slider'] == "") { } else { ?>
 
     <div id="slide_holder" <?php if( get_header_image() ) { echo 'style="margin-bottom:-250px;"'; } ?> >

  	<div class="slide-container">
 
		<ul class="slides">
		
   <?php

    $args=array(
   'cat'=>-5981,
   'showposts'=>$number_items,
   'post__not_in' =>get_option("sticky_posts"),
   );
   
?>  

<?php if (have_posts()) : $featured = new WP_Query($args); while($featured->have_posts()) : $featured->the_post(); ?>

<li class="slide">  

<a class="post-more" href="<?php the_permalink(); ?>"></a>
          
 <?php if(has_post_thumbnail()) {
	echo '<a href="'; the_permalink(); echo '">';the_post_thumbnail(array(100,100)); echo '</a>';
  
     } else {

                      $image = absolum_get_first_image(); 
                      if ($image):
                      echo '<a href="'; the_permalink(); echo'"><img src="'.$image.'" alt="';the_title();echo'" /></a>';
                      endif;
               } ?>


<div class="featured-title">        

<a class="title" href="<?php the_permalink() ?>">
<?php
$title = the_title('', '', false);
echo absolum_truncate($title, 40, '...');
?>
</a>     
 
</div>  

<span>
<?php the_excerpt(); ?>  
</span> 

</li>   
 
<?php endwhile; ?>  

<?php else: ?>

<li>
Oops, please try to refresh the page
</li>

<?php endif; ?>     
   
<?php wp_reset_query(); ?>
   </ul>        
</div></div>
       
<?php } ?>

		<div id="masthead">
			<div id="branding" role="banner"> 

				<?php

					if ( is_singular() &&
							has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
							$image[1] >= HEADER_IMAGE_WIDTH ) :

						echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
					else : ?>
          <?php if( get_header_image() ) { ?>
						<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
            <?php } else { ?>
              <hr style="color:#f3f3f3;" />
            <?php } ?>
            
					<?php endif; ?>
			</div><!-- #branding -->
	
		</div><!-- #masthead -->
	</div><!-- #header -->

<div id="main">