<?php get_header() ?>    
  <div id="main">
  	<div id="maincontent">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div>
    	    <h1 class="post"><a id="post-<?php the_ID(); ?>" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>       
    			  <div class="posted">Posted on <span><?php the_time('l, F j, Y'); ?></span> in <span><?php the_category(', ') ?></span></div>
      			<?php the_content(); ?>
      			<?php if (function_exists('the_tags')) { ?>
      			<?php the_tags('<div class="tags">Tags: ', ', ', '</div>'); ?>
    	  <?php } ?>
  			  <div class="postmeta">Filed in <?php the_category(', ') ?> <?php edit_post_link('Edit', ' | '); ?></div>
          <div class="navigation">
            <div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
            <div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
          </div>
          
      <?php comments_template(); ?>
      
      </div>
    <?php endwhile; ?>
    
    <?php else : ?>
    	<h1>Not Found</h1>
    	<p>Sorry, but you are looking for something that isn't here.</p>
    	<?php include (TEMPLATEPATH . "/searchform.php"); ?>
    	<div class="postmeta"></div>
    <?php endif; ?>
    </div>
	<?php get_sidebar() ?>
    <div class="clearboth"></div>
  </div>
  
<?php get_footer() ?>