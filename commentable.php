<?php /* Template Name: Commentable
*/ get_header()?>
<div id="content">
    <?php if(have_posts()):while(have_posts()):the_post() ?>
     <div class="post">
        <h2 class="post-title"><a href="<?php the_permalink()?>" rel="bookmark" title="Permanent Link to: <?php the_title()?>"><?php the_title()?></a></h2>
        <div class="post-body">
          <?php the_content()?>
          <?php wp_link_pages()?>
        </div><br />
        <div class="post-footer-2">
            This entry was posted on <?php the_time('l, F jS, Y')?> at <?php the_time()?>
            and is filed under <?php the_category(', ')?>. You can follow any responses to 
            this entry through the <?php post_comments_feed_link(__('<abbr title="Really Simple Syndication">RSS 2.0</abbr>') )?> feed.
            <?php if (('open'==$post->comment_status)&&('open'==$post->ping_status)){?>You can
            <a href="#respond">leave a response</a>, or <a href="<?php trackback_url()?>" rel="rtackback">trackback</a> from your own site.
            <?php }elseif (!('open'==$post->comment_status )&&('open'==$post->ping_status) ){?>
            Responses are currently closed, but you can <a href="<?php trackback_url()?>" rel="trackback"></a> your own site.
            <?php }elseif (('open'==$post->comment_status)&& !('open'==$post->ping_status) ){ ?>
            You can skip to the end and leave a response. Pinging is currently not allowed.<?php }?>
            You can <?php include(TEMPLATEPATH.'/sharethis.js')?>. <?php edit_post_link()?>
           
          </div>
    </div>
<?php comments_template(); endwhile;else: _e('Sory, no posts matched your criteria.');endif;?>
</div>
<?php  get_sidebar();get_footer()?>