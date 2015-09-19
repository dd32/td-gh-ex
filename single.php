<?php
/**
 * The template for displaying all single posts.
 *
 * @package HowlThemes
 */

get_header(); ?>

<div class="main-outer container">
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

    <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'content', 'single' ); ?>

            <div class="post-navss">
      <?php the_post_navigation(); ?>
            </div>

<div class="howl-sharing-buttons">
<?php sharingbuttons(); ?>
</div>

<div class="relatedposts">
<?php
//for use in the loop, list 5 post titles related to first tag on current post
$tags = wp_get_post_tags($post->ID);
if ($tags) {
echo '<p>Related Posts</p>';
$first_tag = $tags[0]->term_id;
$args=array(
'tag__in' => array($first_tag),
'post__not_in' => array($post->ID),
'posts_per_page'=>3,
'ignore_sticky_posts'=>1
);
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
  $randnum =1;
while ($my_query->have_posts()) : $my_query->the_post();?>
<div class="related-posts rpost<?php echo $randnum; ?>">
<?php if ( get_the_post_thumbnail() != '' ) { 
  $source_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
  $resizedImage = aq_resize($source_image_url, 220, 170, true);
  echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
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
    <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
</div>
<?php
$randnum++;
endwhile;
}
wp_reset_query();
}
?>
</div>

<div class="ads-container-cmnt">
  <?php echo stripslashes(get_option('dt_custom_ads_abovecmt')) ?>
</div>

      <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;
      ?>

    <?php endwhile; // end of the loop. ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
