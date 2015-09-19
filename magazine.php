<?php
/**
 * @package HowlThemes
 */
?>

<div class="container featpostholder">
<?php
  $featpost = new WP_Query( '&posts_per_page=5' );
$newnum = 1;
while($featpost->have_posts()) : $featpost->the_post();
?>
<article class="featured-post" id="featpost<?php echo $newnum?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost"><?php showstarrating();?>
<div class="thumbnail-container" itemprop="image">

<?php 
 
if($newnum != 1){
  if ( get_the_post_thumbnail() != '' ) {
    echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
  $source_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
  $resizedImage = aq_resize($source_image_url, 250, 200, true);
   echo '<img src="';
   echo $resizedImage;
   echo '" alt="';the_title();
   echo '" />';
    echo '</a>';
}
    elseif(catch_that_image()){
   $source_image_url = catch_that_image();
   $resizedImage = aq_resize($source_image_url, 250, 200, true);
   echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
   echo '<img src="';
   echo $resizedImage;
   echo '" alt="';the_title();
   echo '" />';
   echo '</a>';
    } 
    else{
   echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
    echo '<img src="';
    echo esc_url( get_template_directory_uri() );
    echo '/img/featuredimgsmall.jpg" alt="';the_title();
    echo '" />';
    echo '</a>';
}
  }
  else{
 if ( get_the_post_thumbnail() != '' ) {
    echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
  $source_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
  $resizedImage = aq_resize($source_image_url, 586, 420, true);
   echo '<img src="';
   echo $resizedImage;
   echo '" alt="';the_title();
   echo '" />';
    echo '</a>';
}
 elseif(catch_that_image()){
   $source_image_url = catch_that_image();
   $resizedImage = aq_resize($source_image_url, 586, 420, true);
   echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
   echo '<img src="';
   echo $resizedImage;
   echo '" alt="';the_title();
   echo '" />';
   echo '</a>';
    } 
    else{
   echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
    echo '<img src="';
    echo esc_url( get_template_directory_uri() );
    echo '/img/featuredimg.jpg" alt="';the_title();
    echo '" />';
    echo '</a>';
}
  }
?>
</div>
<div class="featured-content">
<?php if($newnum != 1){ ?>
<?php } ?>
<header class="entry-header">
<h2 itemprop="headline"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2></header>
<?php if($newnum == 1){ ?>
<p class="entry-meta">
<span class="entry-author"><i class="fa fa-user"></i> <a href="<?php echo get_site_url(); ?>/author/<?php echo get_the_author() ?>" rel="author"><span ><?php echo get_the_author() ?></span></a></span>

<span class="time-drag"><i class="fa fa-calendar-o"></i><span class="dtime"><?php the_time('F j, Y'); ?></span></span>
<span class="comment-count"><i class="fa fa-comments"></i> <a href="<?php the_permalink() ?>/#comment"><?php echo get_comments_number(); ?></a></span>
</p>
<?php } ?>
</div>
</article>
<?php 
$newnum++;
endwhile; ?>
</div>

<?php 
$arasr = get_option('dt_howlimany');
  $howliprint = get_option('dt_remembertli') ; 
  for ($i=1;$i<=$howliprint;$i++) {
 $arrayforcat[$i] = substr($arasr,$i-1, 1);
       }
$catgorylin = get_option('dt_rembertcat');
$catposi = explode(',', $catgorylin);
for($xc=0;$xc<=count($catposi)-1;$xc++){
$thiswhatweget = trim($catposi[$xc]);
$category_count = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->term_taxonomy WHERE taxonomy = 'category'");
$category_count = $category_count + 1 ;
for ($x=1; $x<=$category_count; $x++) {
$cat= $x;
$catname = get_cat_name($cat); 

if (strtolower($catname) == strtolower($thiswhatweget) ) {
 $Cat_ID[$xc] = $cat;
}
elseif (strtolower($thiswhatweget) == "select a category") {
  $Cat_ID[$xc] = 'no';
}
}
}
?>
<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">



  


<?php 
if ($arrayforcat) { $dumbnumer =0;
foreach ($arrayforcat as $kyaid => $value) { 
  if($value == 1 && $Cat_ID[$dumbnumer] != 'no' && $Cat_ID[$dumbnumer] != null){?>

<!--Slider--> 
<div id="cat-slider"><div class="slider-title"><a href='<?php echo get_site_url(); ?>/category/<?php echo str_replace(" ", "-", get_category($Cat_ID[$dumbnumer])->name) ?>'><?php echo get_category($Cat_ID[$dumbnumer])->name ?></a></div><ul class="bjqs">
<?php $featpost = new WP_Query( 'cat='.$Cat_ID[$dumbnumer].'&posts_per_page=5' );  while($featpost->have_posts()) : $featpost->the_post(); ?>    
<li>  <?php showstarrating();?>

<div class="slider-img-con" itemprop="image">
  <?php if ( get_the_post_thumbnail() != '' ) { 
  echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
  $source_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
  $resizedImage = aq_resize($source_image_url, 740, 400, true);
   echo '<img src="';
   echo $resizedImage;
   echo '" alt="';the_title();
   echo '" />';
    echo '</a>';
    } 
    elseif(catch_that_image()){
   $source_image_url = catch_that_image();
   $resizedImage = aq_resize($source_image_url, 740, 400, true);
   echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
   echo '<img src="';
   echo $resizedImage;
   echo '" alt="';the_title();
   echo '" />';
   echo '</a>';
    } 
    else{
   echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
    echo '<img src="';
    echo esc_url( get_template_directory_uri() );
    echo '/img/slider-thumbnail.jpg" alt="';the_title();
    echo '" />';
    echo '</a>';
}
  ?>
</div><h2 class="bjqs-caption" itemprop="headline"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
</li> 
<?php endwhile; ?>
</ul></div>

<?php } if ($value == 2 && $Cat_ID[$dumbnumer] != 'no' && $Cat_ID[$dumbnumer] != null) {?>

<!--Carousel-->
<div id="carouselpost">
<div class="titlecatholder"><span><a href='<?php echo get_site_url(); ?>/category/<?php echo str_replace(" ", "-", get_category($Cat_ID[$dumbnumer])->name) ?>'><?php echo get_category($Cat_ID[$dumbnumer])->name ?></a></span>
<div class="navigator-holder">
<a class="buttons prev" href="#"><i class="fa fa-angle-left"></i></a>
<a class="buttons next" href="#"><i class="fa fa-angle-right"></i></a></div>
</div>
    <div class="viewport">
      <ul class="overview">

<?php $featpost = new WP_Query( 'cat='.$Cat_ID[$dumbnumer].'&posts_per_page=5' );  while($featpost->have_posts()) : $featpost->the_post(); ?>    
<li>  <?php showstarrating();?>
<div class="imgcarholder" itemprop="image">
 <?php if ( get_the_post_thumbnail() != '' ) { 
   echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
  $source_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
  $resizedImage = aq_resize($source_image_url, 300, 180, true);
   echo '<img src="';
   echo $resizedImage;
   echo '" alt="';the_title();
   echo '" />';
    echo '</a>';
    } 
   elseif(catch_that_image()){
   $source_image_url = catch_that_image();
   $resizedImage = aq_resize($source_image_url, 300, 180, true);
   echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
   echo '<img src="';
   echo $resizedImage;
   echo '" alt="';the_title();
   echo '" />';
   echo '</a>';
    } 
    else{
   echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
    echo '<img src="';
    echo esc_url( get_template_directory_uri() );
    echo '/img/carousel-thumbnail.jpg" alt="';the_title();
    echo '" />';
    echo '</a>';
}
  ?>
</div>
<p class="meta-holder">
<span class="time-drag"><i class="fa fa-calendar-o"></i><span class="dtime"><?php the_time('F j, Y'); ?></span></span>
<span class="comment-count"><i class="fa fa-comments"></i> <a href="<?php the_permalink() ?>/#comment"><?php echo get_comments_number(); ?></a></span>
</p>
<h2 itemprop="headline"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
</li>
<?php endwhile; ?>

      </ul>
    </div>
    
  </div>
<?php } if($value == 3 && $Cat_ID[$dumbnumer] != 'no' && $Cat_ID[$dumbnumer] != null){ ?>
<!--Grid Posts-->
<div class="grid-posts-holder">
<div class="titlecatholder"><span><a href='<?php echo get_site_url(); ?>/category/<?php echo str_replace(" ", "-", get_category($Cat_ID[$dumbnumer])->name) ?>'><?php echo get_category($Cat_ID[$dumbnumer])->name ?></a></span></div>
<?php $featpost = new WP_Query( 'cat='.$Cat_ID[$dumbnumer].'&posts_per_page=5' ); $rnewnum = 1;  while($featpost->have_posts()) : $featpost->the_post(); ?>    
<?php if($rnewnum == 1 or $rnewnum == 4){ ?>
<div class="grid-posts-big" itemprop="image">  <?php showstarrating();?>
 <?php 
 if ( get_the_post_thumbnail() != '' ) { 
    echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
  $source_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
  $resizedImage = aq_resize($source_image_url, 477, 247, true);
   echo '<img src="';
   echo $resizedImage;
   echo '" alt="';the_title();
   echo '" />';
    echo '</a>';
    } 
    elseif(catch_that_image()){
   $source_image_url = catch_that_image();
   $resizedImage = aq_resize($source_image_url, 477, 247, true);
   echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
   echo '<img src="';
   echo $resizedImage;
   echo '" alt="';the_title();
   echo '" />';
   echo '</a>';
    } 
    else{
   echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
    echo '<img src="';
    echo esc_url( get_template_directory_uri() );
    echo '/img/giridpostbig.jpg" alt="';the_title();
    echo '" />';
    echo '</a>';
}
  ?>
<div class="post-content-holder">
<div class="post-meta-holder">
<span class="time-drag"><i class="fa fa-calendar-o"></i><span class="dtime"><?php the_time('F j, Y'); ?></span></span>
<span class="comment-count"><i class="fa fa-comments"></i> <a href="<?php the_permalink() ?>/#comment"><?php echo get_comments_number(); ?></a></span>
</div>
<h2 itemprop="headline"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
</div>
</div>
<?php } else{?>

<div class="grid-posts-small" itemprop="image">  <?php showstarrating();?>
 <?php if ( get_the_post_thumbnail() != '' ) { 
  echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
  $source_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
  $resizedImage = aq_resize($source_image_url, 250, 160, true);
   echo '<img src="';
   echo $resizedImage;
   echo '" alt="';the_title();
   echo '" />';
    echo '</a>';
    } 
    elseif(catch_that_image()){
   $source_image_url = catch_that_image();
   $resizedImage = aq_resize($source_image_url, 250, 160, true);
   echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
   echo '<img src="';
   echo $resizedImage;
   echo '" alt="';the_title();
   echo '" />';
   echo '</a>';
    } 
    else{
   echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
    echo '<img src="';
    echo esc_url( get_template_directory_uri() );
    echo '/img/gridpostsmall.jpg" alt="';the_title();
    echo '" />';
    echo '</a>';
}
  ?>
<h2 itemprop="headline"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
</div>
<?php } ?>
<?php $rnewnum++; endwhile; ?>
</div>
<?php } if ($value == 4 && $Cat_ID[$dumbnumer] != 'no' && $Cat_ID[$dumbnumer] != null) { ?>

<!--Blog Posts-->
<div class="blog-cnt-holder">
  <div class="titlecatholder"><span><a href='<?php echo get_site_url(); ?>/category/<?php echo str_replace(" ", "-", get_category($Cat_ID[$dumbnumer])->name) ?>'><?php echo get_category($Cat_ID[$dumbnumer])->name ?></a></span></div>
<?php $featpost = new WP_Query( 'cat='.$Cat_ID[$dumbnumer].'&posts_per_page=6' ); $randnewnum = 1;  while($featpost->have_posts()) : $featpost->the_post(); ?>
<div class="blogposts <?php if($randnewnum== 1 or $randnewnum== 3 or $randnewnum== 5){echo"left-posts";} else{ echo"right-post"; } ?>">
  <?php showstarrating();?>
<div class="hldrblog4" itemprop="image">
<?php 
  if ( get_the_post_thumbnail() != '' ) { 
    echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
  $source_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
  $resizedImage = aq_resize($source_image_url, 365, 220, true);
   echo '<img src="';
   echo $resizedImage;
   echo '" alt="';the_title();
   echo '" />';
    echo '</a>';
    } 
    elseif(catch_that_image()){
   $source_image_url = catch_that_image();
   $resizedImage = aq_resize($source_image_url, 365, 220, true);
   echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
   echo '<img src="';
   echo $resizedImage;
   echo '" alt="';the_title();
   echo '" />';
   echo '</a>';
    } 
    else{
   echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
    echo '<img src="';
    echo esc_url( get_template_directory_uri() );
    echo '/img/gridposts.jpg" alt="';the_title();
    echo '" />';
    echo '</a>';
}
  ?>
</div>
  <div class="entry-content-hldr">
      <div class="entry-metatag">

<span class="time-drag"><i class="fa fa-calendar-o"></i><span class="dtime"><?php the_time('F j, Y'); ?></span></span>
<span class="comment-count"><i class="fa fa-comments"></i> <a href="<?php the_permalink() ?>/#comment"><?php echo get_comments_number(); ?></a></span>
 </div> <h2 itemprop="headline"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
</div>

</div>


 <?php $randnewnum++; endwhile; ?>
</div>

<?php } if ($value == 5 && $Cat_ID[$dumbnumer] != 'no' && $Cat_ID[$dumbnumer] != null) { ?>
<!--Simple Posts-->
<div class="simple-posts">
    <div class="titlecatholder"><span><a href='<?php echo get_site_url(); ?>/category/<?php echo str_replace(" ", "-", get_category($Cat_ID[$dumbnumer])->name) ?>'><?php echo get_category($Cat_ID[$dumbnumer])->name ?></a></span></div>
<?php $featpost = new WP_Query( 'cat='.$Cat_ID[$dumbnumer].'&posts_per_page=6' ); while($featpost->have_posts()) : $featpost->the_post(); ?>
<article itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
<?php if ( get_the_post_thumbnail() != '' ) { 
    echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
  $source_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
  $resizedImage = aq_resize($source_image_url, 220, 170, true);
   echo '<img src="';
   echo $resizedImage;
   echo '" alt="';the_title();
   echo '" />';
    echo '</a>';
    } 
    elseif(catch_that_image()){
   $source_image_url = catch_that_image();
   $resizedImage = aq_resize($source_image_url, 220, 170, true);
   echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
   echo '<img src="';
   echo $resizedImage;
   echo '" alt="';the_title();
   echo '" />';
   echo '</a>';
    } 
    else{
   echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
    echo '<img src="';
    echo esc_url( get_template_directory_uri() );
    echo '/img/simplethumbnail.jpg" alt="';the_title();
    echo '" />';
    echo '</a>';
}
  ?>
  <?php showstarrating();?>
 <div class="blog-content-hldr">
    <h2 itemprop="headline"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
  <div class="entry-metatag">
<span class="entry-author"><i class="fa fa-user"></i> <a href="<?php echo get_site_url(); ?>/author/<?php echo get_the_author() ?>" rel="author"><span><?php echo get_the_author() ?></span></a></span>
<span class="time-drag"><i class="fa fa-calendar-o"></i><span class="dtime"><?php the_time('F j, Y'); ?></span></span>
<span class="comment-count"><i class="fa fa-comments"></i> <a href="<?php the_permalink() ?>/#comment"><?php echo get_comments_number(); ?></a></span>
 </div> 
<?php the_excerpt(); ?>
</div>
</article>
<?php endwhile; ?>
</div>

<?php } $dumbnumer++;} } ?>


</main><!-- #main -->
</div><!-- #primary -->
