<?php while (have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'theme'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
	
	
  <?php If ($post->post_type == 'post') : ?>
    <div class="postmetadata top">
      <div class="postdate"><?php the_time(_c('F jS, Y|Date format of a post', 'theme')) ?></div>
      <div class="postauthor"><?php the_author_posts_link() ?></div>
    </div>
  <?php EndIf; ?>
  
  
  
  <div class="entry">
    <?php If ( !is_singular() && Get_Theme_Setting('use_excerpts') ) : ?>
      <?php If (List($attachment) = theme_functions::get_post_preview_image()) : ?>
        <img src="<?php Echo $attachment[0] ?>" width="<?php Echo $attachment[1] ?>" height="<?php Echo $attachment[2] ?>" alt="" class="post-preview-image" />
      <?php EndIf;
      theme_functions::the_excerpt(); ?>
      <a href="<?php the_permalink() ?>" class="more-link"><?php _e('Read the rest of this entry', 'theme'); ?></a>
    <?php Else :
      the_content(__('Read the rest of this entry', 'theme'));
    EndIf; ?>
    <div class="clear"></div>
	</div>
	
	
</div>

<?php EndWhile; ?>

<div class="navigation">
  <div class="next_posts"><?php next_posts_link(__('&laquo; Older Entries', 'theme')) ?></div>
  <div class="previous_posts"><?php previous_posts_link(__('Newer Entries &raquo;', 'theme')) ?></div>
  <div class="clear"></div>
</div>
