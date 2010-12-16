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
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<?php $options = get_option('absolum');
  if ($options['abs_color_scheme'] == "grey" ):
    
echo '<link rel="stylesheet" href="'; echo get_template_directory_uri(); echo '/images/schemes/grey/grey.css" type="text/css" media="screen" />';

elseif ($options['abs_color_scheme'] == "black" ):

echo '<link rel="stylesheet" href="'; echo get_template_directory_uri(); echo '/images/schemes/black/black.css" type="text/css" media="screen" />';

elseif ($options['abs_color_scheme'] == "purple" ):

echo '<link rel="stylesheet" href="'; echo get_template_directory_uri(); echo '/images/schemes/purple/purple.css" type="text/css" media="screen" />';

elseif ($options['abs_color_scheme'] == "orange" ):

echo '<link rel="stylesheet" href="'; echo get_template_directory_uri(); echo '/images/schemes/orange/orange.css" type="text/css" media="screen" />';

elseif ($options['abs_color_scheme'] == "red" ):

echo '<link rel="stylesheet" href="'; echo get_template_directory_uri(); echo '/images/schemes/red/red.css" type="text/css" media="screen" />';

elseif ($options['abs_color_scheme'] == "green" ):

echo '<link rel="stylesheet" href="'; echo get_template_directory_uri(); echo '/images/schemes/green/green.css" type="text/css" media="screen" />';

elseif ($options['abs_color_scheme'] == "blue" ):

echo '<link rel="stylesheet" href="'; echo get_template_directory_uri(); echo '/images/schemes/blue/blue.css" type="text/css" media="screen" />';

elseif ($options['abs_color_scheme'] == "gothic" ):

echo '<link rel="stylesheet" href="'; echo get_template_directory_uri(); echo '/images/schemes/gothic.css" type="text/css" media="screen" />';

else:

endif;

 ?>
 
 
 <?php $options = get_option('absolum');  

 if ($options['abs_content_font'] == "arial") { ?>

  <style type="text/css">body, input, textarea {font-family: Arial, Helvetica Neue, Helvetica, sans-serif;}</style>
  
 <?php } if ($options['abs_content_font'] == "segoe") { ?>

  <style type="text/css">body, input, textarea {font-family: "Segoe UI",Calibri,"Myriad Pro",Myriad,"Trebuchet MS",Helvetica,Arial,sans-serif;}</style>
  
  
   <?php } if ($options['abs_content_font'] == "courier") { ?>

  <style type="text/css">body, input, textarea {font-family: "Courier New", Courier, monospace;}</style>
  
   <?php } if ($options['abs_content_font'] == "times") { ?>

  <style type="text/css">body, input, textarea {font-family: "Times New Roman", serif;}</style>
  
    
  
  

 <?php } if ($options['abs_content_font'] == "comic") { ?>

  <style type="text/css">body, input, textarea {font-family: Comic Sans, Comic Sans MS, cursive;}</style>
  
  
 <?php } if ($options['abs_title_scheme'] == "blue") { ?>
 
   <style type="text/css">#blog-title {background-image: url("<?php echo get_template_directory_uri(); ?>/images/blog-title/blue.png");}
   #site-title a {background:#0d68a2;text-shadow: 0 1px 2px #084166;}
   #site-title a:hover {background:#0d68a2 url("<?php echo get_template_directory_uri(); ?>/images/blog-title/blue-hover.png") center bottom no-repeat;}
   #site-description {color:#b1ccde;}   
   </style>
  
 
   <?php } if ($options['abs_title_scheme'] == "red") { ?>
 
   <style type="text/css">#blog-title {background-image: url("<?php echo get_template_directory_uri(); ?>/images/blog-title/red.png");}
   #site-title a {background:#9f1b1b;text-shadow: 0 1px 2px #5b0f0f;}
   #site-title a:hover {background:#9f1b1b url("<?php echo get_template_directory_uri(); ?>/images/blog-title/red-hover.png") center bottom no-repeat;}
   #site-description {color:#ffd4d4;}   
   </style>
   
   <?php } if ($options['abs_title_scheme'] == "green") { ?>
 
   <style type="text/css">#blog-title {background-image: url("<?php echo get_template_directory_uri(); ?>/images/blog-title/green.png");}
   #site-title a {background:#307b0d;text-shadow: 0 1px 2px #193f07;}
   #site-title a:hover {background:#307b0d url("<?php echo get_template_directory_uri(); ?>/images/blog-title/green-hover.png") center bottom no-repeat;}
   #site-description {color:#cdffb7;}   
   </style>   
   
   <?php } if ($options['abs_title_scheme'] == "silver") { ?>
 
   <style type="text/css">#blog-title {background-image: url("<?php echo get_template_directory_uri(); ?>/images/blog-title/silver.png");}
   #site-title a {color:#333;background:#ddd;text-shadow: 0 1px 2px #eee;}
   #site-title a:hover {background:#ddd url("<?php echo get_template_directory_uri(); ?>/images/blog-title/silver-hover.png") center bottom no-repeat;}
   #site-description {color:#777;}   
   </style>   
   
   <?php } if ($options['abs_title_scheme'] == "brown") { ?>
 
   <style type="text/css">#blog-title {background-image: url("<?php echo get_template_directory_uri(); ?>/images/blog-title/brown.png");}
   #site-title a {background:#614b3a;text-shadow: 0 1px 2px #32271e;}
   #site-title a:hover {background:#614b3a url("<?php echo get_template_directory_uri(); ?>/images/blog-title/brown-hover.png") center bottom no-repeat;}
   #site-description {color:#ffdcc3;}   
   </style>   
   
   <?php } if ($options['abs_back_scheme'] == "green") { ?>
 
   <style type="text/css">
   body {background:url("<?php echo get_template_directory_uri(); ?>/images/background/green.png") repeat-y scroll center top #42bf42;}  
   </style>  
   
   <?php } if ($options['abs_back_scheme'] == "silver") { ?>
 
   <style type="text/css">
   body {background:url("<?php echo get_template_directory_uri(); ?>/images/background/silver.png") repeat-y scroll center top #c1c1c1;}  
   </style>       
   
   <?php } if ($options['abs_back_scheme'] == "black") { ?>
 
   <style type="text/css">
   body {background:url("<?php echo get_template_directory_uri(); ?>/images/background/black.png") repeat-y scroll center top #101010;}  
   </style>  
   
   <?php } if ($options['abs_back_scheme'] == "red") { ?>
 
   <style type="text/css">
   body {background:url("<?php echo get_template_directory_uri(); ?>/images/background/red.png") repeat-y scroll center top #bf4242;}  
   </style>     
   
   <?php } if ($options['abs_back_scheme'] == "yellow") { ?>
 
   <style type="text/css">
   body {background:url("<?php echo get_template_directory_uri(); ?>/images/background/yellow.png") repeat-y scroll center top #bfbd42;}  
   </style>  
                 
   <?php } if ($options['abs_back_scheme'] == "brown") { ?>
 
   <style type="text/css">
   body {background:url("<?php echo get_template_directory_uri(); ?>/images/background/brown.png") repeat-y scroll center top #684e25;}  
   </style>             
  
  <?php } ?> 
  
  
  <?php $options = get_option('absolum'); if ($options['abs_pos_sidebar'] == "left") { ?>

   <style type="text/css"> 
  #content {margin: 0 5px 0 345px;}
  #container {float: right;margin: 0 0 0 -325px;}
  #main {background-position:left top;float: right;}
  #primary, #secondary {float: left;}
  .entry-meta {left:auto;right:0px;background-position:10px bottom;}
</style>  

<?php } if ($options['abs_pos_sidebar'] == "disable") { ?>

   <style type="text/css"> 
  #content {margin: 0 5px;}
  #container {float: right;margin: 0;}
  #main {background:none;}
  .entry-meta {
        width:940px;
}
</style>  

<?php } ?>

<script type='text/javascript' src="<?php echo get_template_directory_uri(); ?>/js/jquery-min.js"></script>  


<?php if ($options['abs_header_slider'] == "disable" || $options['abs_header_slider'] == "") { ?>

<?php } else { ?>

<?php if( get_header_image() ) { }  else { ?> 
<style type="text/css"> 
#slide_holder img {-moz-box-shadow:0 1px 8px #888;}
#slide_holder .featured-title a {color:#555;text-shadow:none;}
#slide_holder .featured-title a:hover {color:#333;}
#slide_holder span {color:#333;text-shadow:none;}
</style>  <?php } ?>

<?php } ?>



   <?php $options = get_option('absolum'); 
  if ($options['abs_header_slider'] == "one") { ?>
   
   <style type="text/css"> 
  ul.slides li.slide {
display:block !important; }
</style>    

  <?php } ?>
  
    <?php if ($options['abs_header_slider'] == "disable" || $options['abs_header_slider'] == "" || $options['abs_header_slider'] == "one") { ?>

<?php } else { ?>

<script type='text/javascript' src="<?php echo get_template_directory_uri(); ?>/js/carousel.js"></script>  

<?php } ?>


<!--[if IE 6]><script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/ie6.js"></script><![endif]-->
<!--[if IE 6]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.ie6.php" type="text/css" media="screen" /><![endif]-->


<?php

	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_head();
  

?>




 <?php $options = get_option('absolum'); 
 $css_content = $options['abs_css_content']; 
 if ($css_content === false) $css_content = '';
 if (!empty($css_content)) {
 echo '<style type="text/css">'.stripslashes($css_content).'</style>';
 } 
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
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args=array(
   'cat'=>-5981,
   'showposts'=>$number_items,
   'post__not_in' =>get_option("sticky_posts"),
   );
query_posts($args);
?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<li class="slide">



<a class="post-more" href="<?php the_permalink(); ?>"></a>


 <?php  
           
          
if(has_post_thumbnail()) {
	echo '<a href="'; the_permalink(); echo '">';the_post_thumbnail(array(100,100)); echo '</a>';
  
     } else {

                      $image = get_first_image(); 
                      if ($image):
                      echo '<a href="'; the_permalink(); echo'"><img src="'.$image.'" alt="';the_title();echo'" /></a>';
                      endif;
               } ?>


<div class="featured-title">
     

<a class="title" href="<?php the_permalink() ?>">
<?php
$title = the_title('', '', false);
echo truncate($title, 40, '...');
 ?></a> 
 
 
 </div>
 



<span>
<?php $postexcerpt = get_the_content();
$postexcerpt = apply_filters('the_content', $postexcerpt);
$postexcerpt = str_replace(']]>', ']]&gt;', $postexcerpt);
$postexcerpt = strip_tags($postexcerpt);
$postexcerpt = strip_shortcodes($postexcerpt);

echo truncate($postexcerpt, 180, ' [...]');
 ?>
 
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

      
       </div>  </div>
       
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