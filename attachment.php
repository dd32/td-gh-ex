<?php 
/**
 * The attechment template file.
**/
$top_mag_options = get_option( 'topmag_theme_options' );
get_header(); ?>
<div class="col-md-12">
  <div class="col-md-8 single-blog no-padding-left clearfix">
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="col-md-12 no-padding">
      <a href="<?php the_permalink(); ?>"><h1 class="post-page-title">
        <?php the_title(); ?>
      </h1></a>
      <div class="blogpost-comment">
        <?php top_mag_entry_meta(); ?>
      </div>
    </div>
    <div class="col-md-12 singleblog-img no-padding singleblog-contan">
      <?php if(has_post_thumbnail()) { ?>
      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'topmagthumbnailimage', array( 'alt' => get_the_title(), 'class' => 'img-responsive') ); ?></a>
      <div class="caption-wrap-topimg">
        <div class="caption-date"><span><?php echo get_the_date('d M'); ?></span></div>
        <div class="caption-time"><i class="fa fa-clock-o"></i> <?php echo get_the_date('g:i'); ?></div>
      </div>
      <?php } ?>
      <?php the_content(); ?>      
    </div>
    <hr class="col-md-12 socialicon-like no-padding" />
    <?php endwhile; ?>
    <?php comments_template(); ?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>