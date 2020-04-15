<?php
/**
 * Custom template comment for this theme
 *
 * @package Fmi
 */

// Custom comment list
if ( ! function_exists( 'vs_list_comments' ) ) {
  function vs_list_comments($comment,$args,$depth) {
    if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) {
  ?>
    <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
      <article class="comment-body">
        <?php echo esc_html__( 'Pingback:', 'fmi' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'fmi' ), '<span class="edit-link">', '</span>' ); ?>
      </article>
  <?php
    }else{
  ?>
    <li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
      <article id="div-comment-<?php comment_ID(); ?>" class="comment-body clearfix">
        <div class="comment-author"><?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, 46); ?></div>
          
        <div class="comment-info">
          <div class="comment-meta">
            <span class="fn"><?php echo get_comment_author_link();?></span>
            
            <span class="comment-metadata"><time datetime="<?php comment_time( 'c' ); ?>"><?php printf( esc_html_x( '%1$s at %2$s', '1: date, 2: time', 'fmi' ), get_comment_date(), get_comment_time() ); ?></time></span>
            <?php edit_comment_link( esc_html__( 'Edit', 'fmi' ), '<span class="comment-edit">', '</span>' ); ?>

            <?php if ( '0' == $comment->comment_approved ) : ?>
            <span class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'fmi' ); ?></span>
            <?php endif; ?>
            
            <span class="reply"><?php comment_reply_link( array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
          </div>
          <div class="comment-content clearfix">
            <?php comment_text();?>
          </div>
        </div>
      </article>
  <?php
    }
  }
}

// Custom default fields
if ( ! function_exists( 'vs_comment_form_default_fields' ) ) {
  function vs_comment_form_default_fields( $fields ) {
    $req = get_option( 'require_name_email' );
    $commenter = wp_get_current_commenter();
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $fields['author'] = '<div class="comment-item"><input id="author" type="text" aria-required="true" size="22" value="' . esc_attr($commenter['comment_author']) . '" name="author" ' . $aria_req . ' placeholder="' . esc_attr__('Name','fmi') . ' ' . ($req?'*':'') . '" /></div>';
    $fields['email'] = '<div class="comment-item"><input id="email" type="text" aria-required="true" size="22" value="' . esc_attr($commenter['comment_author_email']) . '" name="email" ' . $aria_req . ' placeholder="' . esc_attr__('Email','fmi') . ' ' . ($req?'*':'') . '" /></div>';
    $fields['url'] = '<div class="comment-item"><input id="url" type="text" aria-required="true" size="22" value="' . esc_url($commenter['comment_author_url']) . '" name="url" placeholder="' . esc_attr__('Website','fmi') . '" /></div>';
    return $fields;
  }
}
add_filter( 'comment_form_default_fields', 'vs_comment_form_default_fields' );

// Custom fields comment
if ( ! function_exists( 'vs_comment_form_field_comment' ) ) {
  function vs_comment_form_field_comment( $comment_field ) {
    $req = get_option( 'require_name_email' );
    $comment_field = '<div class="comment-item"><textarea id="comment" name="comment" placeholder="' . esc_attr__('Comment','fmi') . ' ' . ($req?'*':'') . '" /></textarea></div>';
    return $comment_field;
  }
}
add_filter( 'comment_form_field_comment', 'vs_comment_form_field_comment' );

// Custom defaults
if ( ! function_exists( 'vs_comment_form_defaults' ) ) {
  function vs_comment_form_defaults($defaults) {
    $defaults['comment_notes_before'] = '';
    $defaults['comment_notes_after'] = '';
    return $defaults;
  }
}
add_filter( 'comment_form_defaults', 'vs_comment_form_defaults' );
