<?php get_header(); ?>
<?php the_post(); ?>

<div class="contentbox">
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		<h2 class="title"><?php the_title(); ?></h2>
		
    <div class="entry">
      <?php the_content(); ?>
      <div class="clear"></div>
		</div>
		
		<div class="page-navigation"><?php wp_link_pages(); ?></div>

    <?php
    If ($association_settings = get_post_meta($post->ID, '_association_settings', True)){
      If ($association_settings['post_limit'] == '') $association_settings['post_limit'] = -1;
      
      If ($association_settings['associated_cat_id'])
        $associated_posts = get_posts (Array( 'cat'         => $association_settings['associated_cat_id'],
                                              'numberposts' => $association_settings['post_limit'] ));
      
      If (!Empty($associated_posts)) : ?>
        <div class="post-meta associated-posts">
        <h3><?php _e('Associated Posts', 'theme') ?></h3>
        <ul class="associated-posts">
        <?php ForEach ($associated_posts AS $associated_post) : ?>
          <li>
            <h4><a href="<?php Echo get_permalink( $associated_post->ID ); ?>"><?php Echo $associated_post->post_title ?></a></h4>
            <?php If (List($attachment) = theme_functions::get_post_preview_image($associated_post->ID)) : ?>
              <img src="<?php Echo $attachment[0] ?>" width="<?php Echo $attachment[1] ?>" height="<?php Echo $attachment[2] ?>" alt="" class="post-preview-image" />
            <?php EndIf; ?>            
            <p><?php echo theme_functions::get_the_excerpt($associated_post->ID) ?></p>
            <div class="clear"></div>
          </li>
        <?php EndForEach; ?>
        </ul>
        </div>
      <?php EndIf;
    }
    ?>
		
		<?php If (is_admin() || comments_open()) : ?>
    <div class="postmetadata bottom">
      <?php edit_post_link(__('Edit this entry', 'theme'), '<div class="postedit">', '</div>'); ?>
      <?php If (comments_open()) : ?>
        <div class="postcomments"><?php comments_popup_link(__('No Comments', 'theme'), __('One Comment', 'theme'), __('% Comments', 'theme'), '', __('Comments Closed', 'theme') ); ?></div>
      <?php EndIf; ?>
    </div>
    <?php EndIf; ?>
	</div>
</div>

<div class="grid_12 alpha"><?php comments_template(); ?></div>

<?php get_footer();
/* End of File */