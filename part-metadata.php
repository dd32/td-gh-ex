<?php
/**
 * Template part for metadata
 * Used to generate the metadata for post.
 * @uses is_home() to check if meta footer should display all
*/ 
?>

    <ul class="metas list-inline">

    <?php if ( is_front_page() && is_home() || is_home() ) 
    { 
        echo '<li class="show-comment-nmbr"><small>'; 
        printf( esc_html( _nx( '1 Response', '%1$s Responses', get_comments_number(), 
        'Responses', 'appeal' ) ), number_format_i18n( get_comments_number() ) );
        echo '</small></li></ul>'; 
    }   // Stop here (don't need tags and edit on home blog)
        elseif ( is_single() )
        { 
        // Uncomment author li to display in content footer of single post.
        ?> 
            
        <!--<li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>"
               title="<?php the_author(); ?>"
               class="theauthor"><?php the_author(); ?></a></li>-->
        <li><?php edit_post_link(__( 'Edit', "appeal"), ' '); ?></li>
    </ul>
    <ul class="list-unstyled">
      <li class="tagcats"><?php the_tags('<p class="tags">', ' ', '</p>'); ?></li>
      <li class="cat-links-post"><?php the_category( ' &bull; ' ); ?></li>
    </ul>
        
            <?php if ( ! post_password_required() && (
            comments_open() || get_comments_number() ) )
            { ?>
            <ul class="list-unstyled">
            <li><?php
            $dsp = '<span class="comment-icon"> &#9776; </span> ';
            comments_popup_link(
            $dsp . __( 'Leave a comment', "appeal"),
            $dsp . __( '1 Comment', "appeal"),
            $dsp . __( '% Comments', "appeal")); ?></li>
            </ul>
            <?php 
            } ?>

        <?php 
        //ends if single
        } elseif ( is_page() ) 
            {
        ?>
        <li><?php edit_post_link(__( 'Edit', "appeal"), ' '); ?></li></ul>
        <?php 
            } else {
            ?>
     <li><?php edit_post_link(__( 'Edit', "appeal"), ' '); ?></li></ul>
    


    <?php } 
    //ends only show tags and edit if not front page blog
    ?>
    <div class="row nomarg"></div><div class="clearfix"></div>
