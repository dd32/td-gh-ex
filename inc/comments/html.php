<?php if ( post_password_required() ) { return; } ?>

<?php if ( have_comments() ) : ?>

        <ol id="list-comments">

    <?php wp_list_comments(
            array(
                'avatar_size'   => 500,
                'reply_text'    => __( 'Leave A Reply' , 'semper-fi-lite' ),
                'short_ping'    => false,
                'style'         => 'ol', )
    ); ?>
            
            
<?php if ( get_the_comments_pagination() != '' ) : ?>
            <li class="comment">
            
                <?php paginate_comments_links(); ?>
            
            </li><?php endif; ?>

<?php else :?>

        <ol id="list-comments">
<?php endif; ?>       
            
<?php 
$semper_fi_lite_current_user = wp_get_current_user();
$semper_fi_lite_user_identity = $semper_fi_lite_current_user->user_login;
                                                          
comment_form(
    array(
        'comment_field'         => '
            <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>

',
        'comment_notes_after'   => '',
        'comment_notes_before'  => '',
        'format'                => 'html5',
        'label_submit'          => __( 'Submit Reply' , 'semper-fi-lite' ),
        'logged_in_as'          => '
            <p>' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>.

                <a class="log-out-link" href="%3$s" title="Log out of this account">Log out?</a>', 'semper-fi-lite' ), admin_url( 'profile.php' ), $semper_fi_lite_user_identity, wp_logout_url( apply_filters( 'semper_fi_lite_the_permalink', get_permalink( ) ) ) ) . '

            </p>
',
        'submit_button'         => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
        'submit_field'          => '            <p class="form-submit">

                %1$s

                %2$s

            </p>        
',
        'title_reply_before'    => '
        <h3>',
        'title_reply_after'     => '</h3>

',
    )
); ?>
            
        </ol>
