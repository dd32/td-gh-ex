<?php

get_header();

global $avata_post_meta;

$fullwidth  = isset($avata_post_meta['avata_fullpage'][0])?$avata_post_meta['avata_fullpage'][0]:'';
$fullscreen = isset($avata_post_meta['avata_fullscreen'][0])?$avata_post_meta['avata_fullscreen'][0]:'';

if ($fullwidth == '1' || $fullwidth == 'on' || $fullscreen >0) {
	get_template_part('template','fullwidth');
	exit;
}

$container = 'container';
$sidebar = 'none';
$left_sidebar  = esc_attr(avata_option('left_sidebar_pages'));
$right_sidebar = esc_attr(avata_option('right_sidebar_pages'));

if ($left_sidebar != '' && $left_sidebar != '0')
	$sidebar = 'left';

if ($right_sidebar != '' && $right_sidebar != '0')
	$sidebar = 'right';

if ($left_sidebar != '' && $left_sidebar != '0' && $right_sidebar != '' && $right_sidebar != '0')
	$sidebar = 'both';

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <section class="page-title-bar title-center no-subtitle" >
    <div class="<?php echo $container;?>">
      <hgroup class="page-title text-light text-center">
        <h1>
          <?php the_title();?>
        </h1>
      </hgroup>
      <div class="breadcrumb-nav breadcrumbs text-center text-light" itemprop="breadcrumb"> <?php avata_breadcrumbs();?></div>
      <div class="clearfix"></div>
    </div>
  </section>
  <div class="post-wrap">
    <div class="<?php echo $container;?>">
      <div class="page-inner row <?php echo avata_get_sidebar_class($sidebar);?>">
        <div class="col-main">
          <?php while (have_posts()) : ?>
          <?php the_post(); ?>
          <?php get_template_part('template-parts/content', 'page'); ?>
          <?php endwhile; ?>
        </div>
        <?php avata_get_sidebar($sidebar, 'page'); ?>
      </div>
    </div>
  </div>
</article>
<?php 
get_footer();
