<?php
ob_start();
/* ----------------------------------------------------------------------------------- */
    /* Custom CSS Styles */
    /* ----------------------------------------------------------------------------------- */

    function optimize_of_head_css() {
        $output = '';
        $custom_css = optimize_get_option('optimize_customcss');
        if ($custom_css <> '') {
            $output .= $custom_css . "\n";
        }
// Output styles
        if ($output <> '') {
            $output = "<!-- Custom Styling -->\n<style type=\"text/css\">/*<![CDATA[*/\n" . $output . "/*]]>*/</style>\n";
            echo $output;
        }
    }

    add_action('wp_head', 'optimize_of_head_css');

/* ----------------------------------------------------------------------------------- */
/* Function to call first uploaded image in functions file
  /*----------------------------------------------------------------------------------- */

function optimize_main_image() {
    global $post, $posts;
    //This is required to set to Null
    $id = '';
    $the_title = '';
    // Till Here
    $permalink = get_permalink($id);
    $homeLink = get_template_directory_uri();
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if (isset($matches [1] [0])) {
        $first_img = $matches [1] [0];
    }
    if (empty($first_img)) { //Defines a default image  
    } else {
        print "<a href='$permalink'><img src='$first_img' width='250px' height='160px' class='postimg wp-post-image' alt='$the_title' /></a>";
    }
}

if ('optimize_comment') :

    /**
     * Template for comments and pingbacks.
     *
     * To override this walker in a child theme without modifying the comments template
     * simply create your own optimize_comment(), and that function will be used instead.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     */
    function optimize_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case '' :
                ?>
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                    <div id="comment-<?php comment_ID(); ?>">
                        <div class="comment-author vcard"> <?php echo get_avatar($comment, 40); ?> <?php printf('%s <span class="says">says:</span>' . sprintf('<cite class="fn">%s</cite>', get_comment_author_link())); ?> </div>
                        <!-- .comment-author .vcard -->
                        <?php if ($comment->comment_approved == '0') : ?>
                            <em> <?php echo ('Your comment is awaiting moderation.'); ?> </em> <br />
                        <?php endif; ?>
                        <div class="comment-meta commentmetadata"><a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                <?php
                                /* translators: 1: date, 2: time */
                                printf('%1$s at %2$s' . get_comment_date(), get_comment_time());
                                ?>
                            </a>
                            <?php edit_comment_link('(Edit)', ' ');
                            ?>
                        </div>
                        <!-- .comment-meta .commentmetadata -->
                        <div class="comment-body">
                            <?php comment_text(); ?>
                        </div>
                        <div class="reply">
                            <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                        </div>
                        <!-- .reply -->
                    </div>
                    <!-- #comment-##  -->
                    <?php
                    break;
                case 'pingback' :
                case 'trackback' :
                    ?>
                <li class="post pingback">
                    <p> <?php echo ('Pingback:'); ?>
                        <?php comment_author_link(); ?>
                        <?php edit_comment_link('(Edit)', ' '); ?>
                    </p>
                    <?php
                    break;
            endswitch;
        }

    endif;

 
/////////Theme Options
    /* ----------------------------------------------------------------------------------- */
    /* Add Favicon
      /*----------------------------------------------------------------------------------- */
    function optimize_childtheme_favicon() {
        if (optimize_get_option('optimize_favicon') != '') {
            echo '<link rel="shortcut icon" href="' . optimize_get_option('optimize_favicon') . '"/>' . "\n";
        }
    }

    add_action('wp_head', 'optimize_childtheme_favicon');
    
    ob_clean();