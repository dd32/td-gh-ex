<?php get_header(); ?>
<?php the_post(); ?>

<div class="contentbox">
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		<h2 class="title"><?php the_title(); ?></h2>
		
    <div class="postmetadata top">
      <div class="postdate"><?php the_time(_c('F jS, Y|Date format of a post', 'theme')) ?></div>
      <div class="postauthor"><?php the_author_posts_link() ?></div>
    </div>
    
    <div class="entry">
      <?php the_content(); ?>
      <div class="clear"></div>
		</div>
		
		<div class="page-navigation"><?php wp_link_pages(); ?></div>
		
    <div class="postmetadata bottom">
      <?php printf('<div class="postcategorie">'.__('Posted in %s' , 'theme').'</div>', get_the_category_list(', ')); ?>
      <?php the_tags('<div class="posttags">'.__('Tags:', 'theme').' ', ', ', '</div>'); ?>
      <?php edit_post_link(__('Edit this entry', 'theme'), '<div class="postedit">', '</div>'); ?>
      <div class="postcomments"><?php comments_popup_link(__('No Comments', 'theme'), __('One Comment', 'theme'), __('% Comments', 'theme'), '', __('Comments Closed', 'theme') ); ?></div>
    </div>
	</div>
</div>

<?php If ( !is_attachment() ) : ?>
<div class="grid_6 alpha">
  <div class="post-meta leftbox">	  
  <?php If ($related_posts = theme_functions::get_related_posts(6)) : ?>
    <h3 class="related-posts"><?php _e('Related Posts', 'theme') ?></h3>
    <ul class="related-post">
    <?php ForEach ($related_posts AS $related_post) : ?>
	    <li><a href="<?php Echo get_permalink( $related_post->ID ); ?>"><?php Echo $related_post->post_title ?></a></li>
	  <?php EndForEach; ?>
	  </ul>
  
  <?php ElseIf ($feat_posts = theme_functions::get_featured_posts(6)) : ?>
    <h3 class="featured-posts"><?php _e('Featured Posts', 'theme') ?></h3>
    <ul class="featured-post">
    <?php ForEach ($feat_posts AS $feat_post) : ?>
	    <li><a href="<?php Echo get_permalink( $feat_post->ID ); ?>"><?php Echo $feat_post->post_title ?></a></li>
	  <?php EndForEach; ?>
	  </ul>
    	    
  <?php Else : ?>
    <h3 class="other-posts"><?php _e('Other Posts', 'theme') ?></h3>
    <ul class="random-posts">
    <?php $rand_posts = theme_functions::get_random_posts(6); ?>
    <?php ForEach ($rand_posts AS $rand_post) : ?>
	    <li><a href="<?php Echo get_permalink( $rand_post->ID ); ?>"><?php Echo $rand_post->post_title ?></a></li>
	  <?php EndForEach; ?>
	  </ul>
  
  <?php EndIf; ?>
  </div>
</div>

<div class="grid_6 omega">
  <div class="post-meta rightbox">
  <?php If ($nextpost = get_next_post()) : ?>
    <h3 class="next-post"><?php Echo $nextpost->post_title ?></h3>
    <p class="post-excerpt"><?php echo theme_functions::get_the_excerpt($nextpost->ID) ?></p>
    <p class="post-link"><a href="<?php Echo get_permalink($nextpost->ID) ?>" class="more-link"><?php _e('Read next post', 'theme') ?></a></p>
  
  <?php ElseIf ($prevpost = get_previous_post()) : ?>
    <h3 class="prev_post"><?php Echo $prevpost->post_title ?></h3>
    <p class="post-excerpt"><?php echo theme_functions::get_the_excerpt($prevpost->ID) ?></p>
    <p class="post-link"><a href="<?php Echo get_permalink($prevpost->ID) ?>" class="more-link"><?php _e('Read previous post', 'theme') ?></a></p>
    
  <?php Else : ?>
    <h3><?php _e('Exclusive Post', 'theme') ?></h3>
    <p><?php _e('It seems this is the only post in this blog.', 'theme') ?></p>
  
  <?php EndIf; ?>
  </div>
</div>

<?php EndIf; ?>

<div class="grid_12 alpha"><?php comments_template(); ?></div>

<?php get_footer();
/* End of File */