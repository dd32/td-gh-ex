<?php
/**
 * Template part for metadata
 * Used to generate the metadata for post.
 * @uses is_home() to check if meta footer should display all
*/ 
?>

    <ul class="metas list-inline">

      <?php if ( is_front_page() && is_home() ) { 
                echo '<li class="show-comment-nmbr"><small>'; 
                printf( esc_html( _nx( '1 Response', '%1$s Responses', get_comments_number(), 
                'Responses', 'appeal' ) ), number_format_i18n( get_comments_number() ) );
                echo '</small></li></ul>'; } 
            else { 
            //stop here - don't need tags and edit on home blog
            ?> 
            
      <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>"
             title="<?php the_author(); ?>"
             class="theauthor"><?php the_author(); ?></a></li>
      <li><?php edit_post_link(__( 'Edit', "appeal"), ' '); ?></li>
    </ul>
    <ul class="list-inline">
      <li class="tagcats"><?php the_tags('<p class="tags">', ' ', '</p>'); ?></li>
    </ul>
   

    <!--<div class="row"><hr class="short"></div><div class="clearfix"></div>-->


    <ul class="list-unstyled">
          <?php if ( ! post_password_required() && (
                   comments_open() || get_comments_number() ) )
                { ?>
      <li><?php
            $dsp = '<span class="comment-icon"> &#9776; </span> ';
            comments_popup_link(
            $dsp . __( 'Leave a comment', "appeal"),
            $dsp . __( '1 Comment', "appeal"),
            $dsp . __( '% Comments', "appeal")); ?></li>
        <?php } ?>

    </ul>
    <?php } 
    //ends only show tags and edit if not front page blog
    ?>
    <div class="row nomarg"></div><div class="clearfix"></div>
