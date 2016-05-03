<?php
//Custom Post Title

if(!function_exists('backyard_post_title')) : 
function backyard_post_title()
{
  if ( is_single() ) :
 ?>
     <?php the_title(); ?>
      <?php else: ?>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<?php endif; 
}

endif;

//Social Links

if(!function_exists('backyard_social_media_link')) :
function backyard_social_media_link() { 
  if(get_theme_mod('facebook_url'))
  {
      echo '<a href="'.esc_url(get_theme_mod('facebook_url')).'" target="_blank" class="fb"><i class="fa fa-facebook"></i></a>';
  }
  if(get_theme_mod('twitter_url'))
  {
      echo '<a href="'.esc_url(get_theme_mod('twitter_url')).'" target="_blank" class="tw"><i class="fa fa-twitter"></i></a>';
  }
  if(get_theme_mod('google_url'))
  {
      echo '<a href="'.esc_url(get_theme_mod('google_url')).'" target="_blank" class="google"><i class="fa fa-google-plus"></i></a>';
  }
  if(get_theme_mod('instagram_url'))
  {
      echo '<a href="'.esc_url(get_theme_mod('instagram_url')).'"  target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>';
  }
  if(get_theme_mod('youtube_channel_link'))
  {
      echo '<a href="'.esc_url(get_theme_mod('youtube_channel_link')).'" target="_blank" class="youtube"><i class="fa fa-youtube"></i></a>';
  }
  if(get_theme_mod('linkedin_link'))
  {
      echo '<a href="'.esc_url(get_theme_mod('linkedin_link')).'"   target="_blank" class="linkdin"><i class="fa fa-linkedin"></i></a>';
  }
  if(get_theme_mod('pinterest_link'))
  {
      echo '<a href="'.esc_url(get_theme_mod('pinterest_link')).'"  target="_blank" class="pinterest"><i class="fa fa-pinterest"></i></a>';
  }
}   
endif;



/**
 * Remove content from first <blockquote><blockquote> tags and return it for display
 */
if( !function_exists('backyard_strip_extracted_quote')) {
	function backyard_strip_extracted_quote($content) {
		$pattern = '/<blockquote.*?>/';
		preg_match($pattern, $content, $text_to_search);
               if (empty($text_to_search))
			$content = "<blockquote>{$content}</blockquote>";
		return $content;
	}
}

/**
 * content quote formats
 */

if( !function_exists('backyard_strip_extracted_aside')) {
	function backyard_strip_extracted_aside($content) {
		
            $content.='<a href="'.get_permalink().'">&#8734;</a>';
	    return $content;
	}
}


/* Filter the content of chat posts. */
add_filter('the_content', 'backyard_format_chat_content');

/* Auto-add paragraphs to the chat text. */
add_filter('backyard_post_format_chat_text', 'wpautop');

/**
 * This function filters the post content when viewing a post with the "chat" post format.  It formats the 
 * content with structured HTML markup to make it easy for theme developers to style chat posts.  The 
 * advantage of this solution is that it allows for more than two speakers (like most solutions).  You can 
 * have 100s of speakers in your chat post, each with their own, unique classes for styling.
 *
 */
function backyard_format_chat_content( $content ) {
	global $_post_format_chat_ids;
    global $speaker_id;
	global $chat_author;
	/* If this is not a 'chat' post, return the content. */
	if ( !has_post_format( 'chat' ) )
		return $content;

	/* Set the global variable of speaker IDs to a new, empty array for this chat. */
	$_post_format_chat_ids = array();

	/* Allow the separator (separator for speaker/text) to be filtered. */
	$separator = apply_filters('backyard_post_format_chat_separator', ':' );

	/* Open the chat transcript div and give it a unique ID based on the post ID. */
	$chat_output = "\n\t\t\t" . '<div id="chat-transcript-' . esc_attr( get_the_ID() ) . '" class="chat-transcript">';

	/* Split the content to get individual chat rows. */
	$chat_rows = preg_split( "/(\r?\n)+|(<br\s*\/?>\s*)+/", $content );

	/* Loop through each row and format the output. */
	foreach ( $chat_rows as $chat_row ) {

		/* If a speaker is found, create a new chat row with speaker and text. */
		if ( strpos( $chat_row, $separator ) ) {

			/* Split the chat row into author/text. */
			$chat_row_split = explode( $separator, trim( $chat_row ), 2 );

			/* Get the chat author and strip tags. */
			$chat_author = strip_tags( trim( $chat_row_split[0] ) );

			/* Get the chat text. */
			$chat_text = trim( $chat_row_split[1] );

			/* Get the chat row ID (based on chat author) to give a specific class to each row for styling. */
			$speaker_id = backyard_format_chat_row_id( $chat_author );

			/* Open the chat row. */
			$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';

			/* Add the chat row author. */
			$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-author ' . sanitize_html_class( strtolower( "chat-author-{$chat_author}" ) ) . ' vcard"><cite class="fn">' . apply_filters( 'backyard_post_format_chat_author', $chat_author, $speaker_id ) . '</cite>' . $separator . '</div>';

			/* Add the chat row text. */
			$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'backyard_post_format_chat_text', $chat_text, $chat_author, $speaker_id ) ) . '</div>';

			/* Close the chat row. */
			$chat_output .= "\n\t\t\t\t" . '</div><!-- .chat-row -->';
		}

		/**
		 * If no author is found, assume this is a separate paragraph of text that belongs to the
		 * previous speaker and label it as such, but let's still create a new row.
		 */
		else {

			/* Make sure we have text. */
			if ( !empty( $chat_row ) ) {

				/* Open the chat row. */
				$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';

				/* Don't add a chat row author.  The label for the previous row should suffice. */

				/* Add the chat row text. */
				$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'backyard_post_format_chat_text', $chat_row, $chat_author, $speaker_id ) ) . '</div>';

				/* Close the chat row. */
				$chat_output .= "\n\t\t\t</div><!-- .chat-row -->";
			}
		}
	}

	/* Close the chat transcript div. */
	$chat_output .= "\n\t\t\t</div><!-- .chat-transcript -->\n";

	/* Return the chat content and apply filters for developers. */
	return apply_filters( 'backyard_post_format_chat_content', $chat_output );
}

/**
 * This function returns an ID based on the provided chat author name.  It keeps these IDs in a global 
 * array and makes sure we have a unique set of IDs.  The purpose of this function is to provide an "ID"
 * that will be used in an HTML class for individual chat rows so they can be styled.
 */
function backyard_format_chat_row_id( $chat_author ) {
	global $_post_format_chat_ids;

	/* Let's sanitize the chat author to avoid craziness and differences like "John" and "john". */
	$chat_author = strtolower( strip_tags( $chat_author ) );

	/* Add the chat author to the array. */
	$_post_format_chat_ids[] = $chat_author;

	/* Make sure the array only holds unique values. */
	$_post_format_chat_ids = array_unique( $_post_format_chat_ids );

	/* Return the array key for the chat author and add "1" to avoid an ID of "0". */
	return absint( array_search( $chat_author, $_post_format_chat_ids ) ) + 1;
}


/** Grab IDs from new WP 3.5 gallery **/
function grab_ids_from_gallery() {
	global $post;
	
	if($post != null) {
		
		$attachment_ids = array();  
		$pattern = get_shortcode_regex();
		$ids = array();
		$portfolio_extra_content = get_post_meta($post->ID, '_nectar_portfolio_extra_content', true);
		
		if (preg_match_all( '/'. $pattern .'/s', $post->post_content, $matches ) ) {   //finds the "gallery" shortcode and puts the image ids in an associative array at $matches[3]
			$count=count($matches[3]);      //in case there is more than one gallery in the post.
			for ($i = 0; $i < $count; $i++){
				$atts = shortcode_parse_atts( $matches[3][$i] );
				if ( isset( $atts['ids'] ) ){
					$attachment_ids = explode( ',', $atts['ids'] );
					$ids = array_merge($ids, $attachment_ids);
				}
			}
		}
	
		if (preg_match_all( '/'. $pattern .'/s', $portfolio_extra_content, $matches ) ) {   
			$count=count($matches[3]);     
			for ($i = 0; $i < $count; $i++){
				$atts = shortcode_parse_atts( $matches[3][$i] );
				if ( isset( $atts['ids'] ) ){
					$attachment_ids = explode( ',', $atts['ids'] );
					$ids = array_merge($ids, $attachment_ids);
				}
			}
		}
	return $ids;
  } else {
  	$ids = array();
  	return $ids;
  }
}


?>