<?php
/**
 * post layout2 for displaying postpage
 *
 * @package imon themes
 * @subpackage best blog
 * @since best blog 1.0
 */
 ?>
<?php $sidbar_positioncontent2 = get_theme_mod('sidbar_position_gen', 'right');?>
<div class="cell <?php if (('full' !== $sidbar_positioncontent2)):?> large-12 <?php else : ?>large-8  <?php endif;?>  medium-12 small-24 ">
  <div class="card card-blog">
    <?php if (has_post_thumbnail()) {
    ?>
      <div class="card-image">
        <div class="post-thumb-overlay"></div>
      <?php the_post_thumbnail('bestblog-small', array('class' => 'img','link_thumbnail' =>TRUE,)); ?>
      <div class="card-title">
        <?php the_title(sprintf('<h3 class="post-title is-font-size-4"><a class="post-title-link" href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
      </div>
    </div>
    <?php
} ?>
    <div class="card-content">
      <?php if (! has_post_thumbnail()) {
        ?>
      <div class="card-title no-thumb">
        <?php the_title(sprintf('<h3 class="post-title is-font-size-4"><a class="post-title-link" href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
      </div>
      <?php
    } ?>
      <h6 class="category text-info"><?php bestblog_category_widgtesmission(); ?></h6>
      <div class="card-description">
        <?php the_excerpt(); ?>
      </div>
      <div class="card-footer">
        <div class="author">
          <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(get_the_author()); ?>">
            <?php echo get_avatar(get_the_author_meta('ID'), '40'); ?>
            <span><?php echo get_the_author();?></span>
          </div>
          <div class="stats">
            <i class="fa fa-clock-o"></i>
            <?php echo bestblog_time_link(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
