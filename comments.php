<?php
  if (post_password_required()) {
    return;
  }

 if (have_comments()) : ?>
  <section id="comments">
    <h3 class="title2"><?php printf(_n(__('One Response','backyard'), __('%1$s Responses ','backyard'), get_comments_number(), 'backyard'), number_format_i18n(get_comments_number()), get_the_title()); ?></h3>

    <ol class="commentlist">
      <?php wp_list_comments(array('walker' => new backyard_walker_comment)); ?>
    </ol>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
    <nav>
      <ul class="pager">
        <?php if (get_previous_comments_link()) : ?>
          <li class="previous"><?php previous_comments_link(__('&larr; Older comments', 'backyard')); ?></li>
        <?php endif; ?>
        <?php if (get_next_comments_link()) : ?>
          <li class="next"><?php next_comments_link(__('Newer comments &rarr;', 'backyard')); ?></li>
        <?php endif; ?>
      </ul>
    </nav>
    <?php endif; ?>

    <?php if (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
    <?php global $backyard; if(isset($backyard['close_comments'])) {$show_closed_comment = $backyard['close_comments']; } else {$show_closed_comment = 1;}
    if($show_closed_comment == 1){ ?>
    <div class="alert">
      <?php _e('Comments are closed.', 'backyard'); ?>
    </div>
    <?php } else { } ?>
<?php endif; ?>
  </section><!-- /#comments -->
  <?php endif; ?>

<?php if (!have_comments() && !comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
  <?php global $backyard; if(isset($backyard['close_comments'])) {$show_closed_comment = $backyard['close_comments']; } else {$show_closed_comment = 1;}
    if($show_closed_comment == 1){ ?>
  <section id="comments">
    <div class="alert">
      <?php _e('Comments are closed.', 'backyard'); ?>
    </div>
  </section><!-- /#comments -->
  <?php } else { } ?>
<?php endif; ?>

<?php if (comments_open()) : ?>
  <section id="respond">

  <?php $comment_args = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
           'author' => '<div class="col1">' . '<label for="author">' . __('Name', 'backyard') .( $req ? ' ' : '').'</label> ' .
                        '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $comment_author ) . '" ' . ( $req ? 'aria-required="true"' : '') . ' /></div>',
            'email'  => '<div class="col1"><label for="email">' . __( 'Email', 'backyard') . ( $req ? '  ' : '' ) . '</label> ' .
                        '<input class="form-control" type="email" class="text" name="email" id="email" value="' . esc_attr(  $comment_author_email ) . '" ' . ( $req ? 'aria-required="true"' : '') . ' /></div>',
						
			'redirect_to' => '<input type="hidden" name="redirect_to" value="'.esc_url(get_permalink()).'"/>',			
		
            'url'    => '<div class="col2 urlfield"><label for="url">' . __( 'Website', 'backyard' ) . '</label> ' .

                        '<input class="form-control" id="url" name="url" type="url" value="' . esc_url($comment_author_url) . '" /></div>',
						

                        ) 

            ),

              'comment_field'        => '<div class="col2 textareabox"><label for="comment">' . __( 'Comment', 'backyard' ) . '</label> <textarea id="comment" name="comment" class="form-control input-xlarge" rows="8" aria-required="true" required="required"></textarea> </div>',

              'comment_notes_before' => '',
              'comment_notes_after'  => '',
              'id_form'              => 'commentform',
              'id_submit'            => 'submit',
              'class_submit'         => 'btn btn-default fillbg',
              'name_submit'          => 'submit',
              'title_reply'          => __('Leave a Reply', 'backyard'),
              'title_reply_to'       => __('Leave a Reply to %s', 'backyard'),
              'label_submit'         => __('Post Comment', 'backyard'),
              'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
              'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
              'format'               => 'html5',
        );
        comment_form($comment_args); ?>

  </section><!-- /#respond -->
<?php endif; ?>
