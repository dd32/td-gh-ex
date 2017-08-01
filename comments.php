<?php
/**
 * The template for displaying comments
 *
 * - Called when you write 'comments_template' function on page template or single template.
 *
 * @package WordPress
 * @since Base For Original 1.0
 */
if(post_password_required()){
  return;
}
?>

<?php if(have_comments()):?>
<div id="comments">
  <h2><?php printf(__('%d Comments', 'base-for-original'), number_format_i18n(get_comments_number()));?></h2>

  <?php if(get_comment_pages_count() > 1 && get_option('page_comments')):?>
    <div class="pagenation clearfix">
      <span class="prev"><?php previous_comments_link(__('Older Comments', 'base-for-original'));?></span>
      <span class="next"><?php next_comments_link(__('Newer Comments', 'base-for-original'));?></span>
    </div>
  <?php endif;?>

  <ol class="clearfix">
  <?php
    wp_list_comments(array(
      'style'        => 'ol',
      'avatar_size'  => 40,
    ));
  ?>
  </ol>

  <?php if(get_comment_pages_count() > 1 && get_option('page_comments')):?>
    <div class="pagenation clearfix">
      <span class="prev"><?php previous_comments_link(__('Older Comments', 'base-for-original'));?></span>
      <span class="next"><?php next_comments_link(__('Newer Comments', 'base-for-original'));?></span>
    </div>
  <?php endif;?>

  <?php if(comments_open()) comment_form();?>

</div><!-- #comment -->

<?php endif; ?>