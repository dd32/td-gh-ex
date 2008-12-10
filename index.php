<?php get_header() ?>    
  <div id="main">
    <div id="maincontent">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="postwrapper">
    			<h1 class="post"><a id="post-<?php the_ID(); ?>" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>       
    			<div class="posted">Posted on <span><?php the_time('l, F j, Y'); ?></span> in <span><?php the_category(', ') ?></span></div>
    			<?php the_content(); ?>
			    <div class="commentContainer postmeta"><?php comments_popup_link('Comments', 'Comments', 'Comments'); ?></div>
          <div class="bubble"><?php comments_popup_link('0', '1', '%'); ?></div>
          <div class="edit"><?php edit_post_link('Edit'); ?></div>

    			<?php if (function_exists('the_tags')) { ?>
    			<?php the_tags('<div class="tags">Tags: ', ', ', '</div>'); ?>
    			<?php } ?>
        </div>

		<?php endwhile; ?>

		<?php else : ?>
			<h1>Not Found</h1>
			<p>Sorry, but you are looking for something that isn't here.</p>
			<?php include (TEMPLATEPATH . "/searchform.php"); ?>
			<div class="postmeta"></div>
		<?php endif; ?>
			<div class="clearboth"></div>
			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Previous Posts') ?></div>
				<div class="alignright"><?php previous_posts_link('Next Posts &raquo;') ?></div>
			</div>
    </div>
      
	<?php get_sidebar() ?>
    <div class="clearboth"></div>
  </div>
  
<?php get_footer() ?>