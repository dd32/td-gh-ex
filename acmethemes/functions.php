<?php
/**
 * List down the post category
 *
 * @since AcmeBlog 1.0.0
 *
 * @param int $post_id
 * @return string list of category
 *
 */
if ( !function_exists('acmeblog_list_category') ) :
    function acmeblog_list_category( $post_id = 0 ) {

        if( 0 == $post_id ){
            global $post;
            if( isset( $post->ID )){
                $post_id = $post->ID;
            }
        }
        if( 0 == $post_id ){
            return null;
        }
        $categories = get_the_category($post_id);
        $separator = '&nbsp;';
        $output = '';
        if($categories) {
            $output .= '<span class="cat-links">';
            foreach($categories as $category) {
                $output .= '<a href="'.esc_url( get_category_link( $category->term_id ) ).'"  rel="category tag">'.esc_html( $category->cat_name ).'</a>'.$separator;
            }
            $output .='</span>';
            echo trim($output, $separator);
        }
    }
endif;

/**
 * Callback functions for comments
 *
 * @since AcmeBlog 1.0.0
 *
 * @param $comment
 * @param $args
 * @param $depth
 * @return void
 *
 */
if ( !function_exists('acmeblog_commment_list') ) :

    function acmeblog_commment_list($comment, $args, $depth) {
        extract($args, EXTR_SKIP);
        if ('div' == $args['style']) {
            $tag = 'div';
            $add_below = 'comment';
        }
        else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
        ?>
        <<?php echo $tag ?>
        <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
        <?php if ('div' != $args['style']) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
        <?php endif; ?>
        <div class="comment-author vcard">
            <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, '64'); ?>
            <?php printf(__('<cite class="fn">%s</cite>', 'acmeblog' ), get_comment_author_link()); ?>
        </div>
        <?php if ($comment->comment_approved == '0') : ?>
            <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'acmeblog'); ?></em>
            <br/>
        <?php endif; ?>
        <div class="comment-meta commentmetadata">
            <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                <i class="fa fa-clock-o"></i>
                <?php
                /* translators: 1: date, 2: time */
                printf(__('%1$s at %2$s', 'acmeblog'), get_comment_date(), get_comment_time()); ?>
            </a>
            <?php edit_comment_link(__('(Edit)', 'acmeblog'), '  ', ''); ?>
        </div>
        <?php comment_text(); ?>
        <div class="reply">
            <?php comment_reply_link( array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div>
        <?php if ('div' != $args['style']) : ?>
            </div>
        <?php endif;
    }
endif;

/**
 * Date display functions
 *
 * @since AcmeBlog 1.0.0
 *
 * @param string $format
 * @return string
 *
 */
if ( ! function_exists( 'acmeblog_date_display' ) ) :

    function acmeblog_date_display( $format = 'l, F j, Y') {
        echo esc_html( date_i18n( $format, current_time( 'timestamp' ) ) );
    }

endif;

/**
 * Return content of fixed lenth
 *
 * @since AcmeBlog 1.0.0
 *
 * @param string $acmeblog_content
 * @param int $length
 * @return string
 *
 */
if ( ! function_exists( 'acmeblog_words_count' ) ) :
    function acmeblog_words_count( $acmeblog_content = null, $length = 16 ) {

        $length = absint( $length );
        $source_content = preg_replace( '`\[[^\]]*\]`', '', $acmeblog_content );
        $trimmed_content = wp_trim_words( $source_content, $length, '...' );
        return $trimmed_content;

    }
endif;

/**
 * BreadCrumb Settings
 */
if( ! function_exists( 'acmeblog_breadcrumbs' ) ):
	function acmeblog_breadcrumbs() {
		if ( ! function_exists( 'breadcrumb_trail' ) ) {
			require acmeblog_file_directory('acmethemes/library/breadcrumbs/breadcrumbs.php');
		}
		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false
		);
		$acmeblog_customizer_all_values = acmeblog_get_theme_options();

		$acmeblog_you_are_here_text = $acmeblog_customizer_all_values['acmeblog-you-are-here-text'];
		if( !empty( $acmeblog_you_are_here_text ) ){
			$acmeblog_you_are_here_text = "<span class='breadcrumb'>".$acmeblog_you_are_here_text."</span>";
		}
		echo "<div class='breadcrumbs init-animate clearfix'>".$acmeblog_you_are_here_text."<div id='acmeblog-breadcrumbs' class='clearfix'>";
		breadcrumb_trail( $breadcrumb_args );
		echo "</div></div>";
	}
endif;