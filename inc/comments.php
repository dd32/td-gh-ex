<?PHP
	
	class antonineComments{
	
		function __construct(){;
			add_action("wp_ajax_nopriv_antonine_comments", array($this, "comments"));
			add_action("wp_ajax_antonine_comments", array($this, "comments"));
		}
	
		function comments(){
		
			if(wp_verify_nonce($_POST['nonce'], "antonine_comments"))
			{
				$args = array(
					'status' => 'approve',
					'number' => '50'
				);
				$comments = get_comments($args);
				foreach($comments as $comment) :
					$date = $comment->comment_date;
					$post = get_post($comment->comment_post_ID);
					echo "<p><span><strong>" . get_comment_author($comment->comment_ID) . "</strong> " . __("on", 'antonine') . " <a href='" . get_permalink($post) . "#comment" . $comment->comment_ID . "'>" . $post->post_title . "</a> " . $date . " " . __("said", 'antonine') . " </span></p><blockquote>" . $comment->comment_content . "</blockquote>"; 
				endforeach;
			}
			else
			{
				echo esc_html(__("Nonce failed","antonine"));
			}
			wp_die();
		}	
	
	}
	
	$antonineComments = new antonineComments();
	