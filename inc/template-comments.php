<?php
/**
 * Custom template comment for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package fmi
 */
 
function fmi_comment_form_default_fields( $fields ) {
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields['author'] = '<div class="input-container"><input id="author" type="text" aria-required="true" tabindex="1" size="22" value="'.esc_attr($commenter['comment_author']).'" name="author" '.$aria_req.' autocomplete="off" /><span>'.__('Name','fmi').' '.($req?'*':'').'</span></div>';
	$fields['email'] = '<div class="input-container"><input id="email" type="text" aria-required="true" tabindex="2" size="22" value="'.esc_attr($commenter['comment_author_email']).'" name="email" '.$aria_req.' autocomplete="off" /><span>'.__('Email','fmi').' '.($req?'*':'').'</span></div>';
	$fields['url'] = '<div class="input-container"><input id="url" type="text" aria-required="true" tabindex="3" size="22" value="'.esc_attr($commenter['comment_author_url']).'" name="url" autocomplete="off" /><span>'.__('Website','fmi').'</span></div>';
	return $fields;
}
add_filter( 'comment_form_default_fields', 'fmi_comment_form_default_fields' );

function fmi_comment_form_field_comment( $comment_field ) {
	$comment_field = '<div class="input-container-full"><textarea id="comment" tabindex="4" rows="5" cols="58" name="comment" autocomplete="off" /></textarea></div><div class="input-container-full"><button class="button" type="submit">'.__('Post Comment','fmi').'</button></div>';
	return $comment_field;
}
add_filter( 'comment_form_field_comment', 'fmi_comment_form_field_comment' );

function fmi_comment_form_defaults($defaults){
	$defaults['comment_notes_before'] = '';
	$defaults['comment_notes_after'] = '';
	$defaults['cancel_reply_link'] = '<i class="fa fa-times-circle"></i>';
	return $defaults;
}
add_filter( 'comment_form_defaults', 'fmi_comment_form_defaults' ); 

function fmi_comment_form_fields($fields){
    $comment = array_shift($fields);
    $fields = array_merge($fields ,array('comment' => $comment));
    return $fields;
}
add_filter('comment_form_fields','fmi_comment_form_fields');