<?php
/**
 * Custom template tags for this theme
 *
 * @package Fmi
 */

if (!function_exists('vs_posts_navigation')) {
  function vs_posts_navigation() {
    the_posts_navigation(array(
      'prev_text' => '<i class="fa fa-caret-left"></i> '.esc_html__('Older posts','fmi'),
      'next_text'  => esc_html__('Newer posts','fmi').' <i class="fa fa-caret-right"></i>'      
    ));
  }
}

if (!function_exists('vs_post_navigation')) {
  function vs_post_navigation(){
    the_post_navigation( array(
          'prev_text' => '<span>'.esc_html__('Previous Post','fmi').'</span> %title',
          'next_text' => '<span>'.esc_html__('Next Post','fmi').'</span> %title'
    ) );
  }
}

if (!function_exists('vs_comments_navigation')) {
  function vs_comments_navigation(){
    the_comments_navigation(array(
      'prev_text' => '<i class="fa fa-caret-left"></i> '.esc_html__( 'Older comments' ,'fmi'),
      'next_text' => esc_html__( 'Newer comments' ,'fmi').' <i class="fa fa-caret-right"></i>'
    ));
  }
}

if (!function_exists('vs_posts_pagination')) {
  function vs_posts_pagination(){
    the_posts_pagination(array(
      'prev_text' => '<i class="fa fa-caret-left"></i>',
      'next_text' => '<i class="fa fa-caret-right"></i>'
    ));
  }
}

if (!function_exists('vs_about_the_author')) {
  function vs_about_the_author() {
    $author_ID = get_the_author_meta('ID');
    $author_email = get_the_author_meta('user_email');
    $author_display_name = get_the_author_meta('display_name');
    $author_posts_url = get_author_posts_url($author_ID);
    ?>
    <div class="about-author clearfix">
      <div class="about-author-avatar">
        <a href="<?php echo esc_url($author_posts_url); ?>">
          <?php echo get_avatar($author_email, '60', '', esc_attr($author_display_name)); ?>
        </a>
      </div>
      <div class="about-author-bio-wrap">
        <div class="about-author-name">
          <?php the_author_posts_link(); ?>
          <span>(<?php the_author_posts(); esc_html_e(' Posts', 'fmi'); ?>)</span>
        </div>
        <div class="about-author-bio">
          <?php the_author_meta('description'); ?>
        </div>
        <a href="<?php echo esc_url($author_posts_url); ?>" class="about-author-link">
          <?php esc_html_e('View all author&rsquo;s posts', 'fmi'); ?><i class="fa fa-caret-right"></i>
        </a>
      </div>
    </div>
    <?php
  }
}
