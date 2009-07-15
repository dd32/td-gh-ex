<?php get_header()?>
<div id="content">
    <?php if(have_posts()):while(have_posts()):the_post() ?>
     <div class="post">
        <h2 class="post-title"><a href="<?php the_permalink()?>" rel="bookmark" title="Permanent Link to: <?php the_title()?>"><?php the_title()?></a></h2>
        <div class="post-body">
          <?php the_content()?><br />
          <?php wp_link_pages()?>
        </div>
       <div class="post-footer">
        <?php include(TEMPLATEPATH.'/sharethis.js') ?> |
        <a href="<?php the_permalink()?>" rel="bookmark" title="Permanent Link to: <?php the_title()?>">Permalink</a>
        <?php edit_post_link(__('Edit'),__(' | ') )?>       
        </div>
    </div>
<?php endwhile;else: _e('Sory, no posts matched your criteria.');endif;?>
</div>
<?php get_sidebar();get_footer()?>