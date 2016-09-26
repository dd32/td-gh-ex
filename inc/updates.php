<?PHP
	
	class antonineUpdates{
	
		function __construct(){;
			add_action("wp_ajax_nopriv_antonine_update", array($this, "update"));
			add_action("wp_ajax_antonine_update", array($this, "update"));
			add_action("wp_ajax_nopriv_antonine_update_poll", array($this, "poll"));
			add_action("wp_ajax_antonine_update_poll", array($this, "poll"));
		}
	
		function poll(){
		
			if(wp_verify_nonce($_POST['nonce'], "antonine_update"))
			{
			
				global $wpdb;
			
				$response = new StdClass();
				$response->content = 0;
								
				$since = substr($_POST['last_read'],0, -3);
				$sinceMySQL = date('Y-m-d H:i:s', $since);
				$rows = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "posts where post_status='publish' and post_mime_type='' and post_modified > '" . $sinceMySQL . "' order by post_modified desc" );

				foreach($rows as $post){
					$response->content++;
				}
				
				$rows = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "comments where comment_approved='1' and comment_date > '" . $sinceMySQL . "' order by comment_date desc" );

				foreach($rows as $comments){
					$response->content++;
				}
				
				if($response->content!=0){
					$response->updates = "true";
				}else{
					$response->updates = "false";
				}
				
				echo json_encode($response);
				
			}
			else
			{
				print_r($_POST);
				echo "Nonce failed";
			}
			wp_die();
		}	
	
		function update(){
		
			if(wp_verify_nonce($_POST['nonce'], "antonine_update"))
			{
			
				global $wpdb;
			
				$response = new StdClass();
				$response->posts_not_read = "";
				$response->posts_count = 0;
				
				$response->new_posts = "";
				$response->new_posts_count = 0;
				
				$response->new_comments = "";
				$response->new_comments_count = 0;
								
				$since = substr($_POST['last_read'],0, -3);
				$sinceMySQL = date('Y-m-d H:i:s', $since);
				$rows = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "posts where post_status='publish' and post_mime_type='' and post_modified > '" . $sinceMySQL . "' order by post_modified desc" );

				foreach($rows as $post){
					$response->new_posts .= "<p><a href='" . get_permalink(get_post($post->ID)) . "'>" . $post->post_title . "</a></p>";
					$response->new_posts_count++;
				}
				
				
				$rows = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "comments where comment_approved='1' and comment_date > '" . $sinceMySQL . "' order by comment_date desc" );

				foreach($rows as $comment){
					$date = $comment->comment_date;
					$post = get_post($comment->comment_post_ID);
					$response->new_comments .= "<p><span><strong>" . get_comment_author($comment->comment_ID) . "</strong> " . __("on", 'antonine') . " <a href='" . get_permalink($post) . "#comment" . $comment->comment_ID . "'>" . $post->post_title . "</a> " . $date . " " . __("said",'antonine') . " </span></p><blockquote>" . $comment->comment_content . "</blockquote>"; 
					$response->new_comments_count++;
				}
				
				$query_args = array(
					'post_type' => 'post',
					'posts_per_page' => - 1,
					'order_by' => 'date',
					'post_status' => 'publish',
					'post__not_in' => $_POST['read']
				);

				$query = new WP_Query( $query_args );
				
				foreach ( $query->posts as $post ) {
					$response->posts_not_read .= "<p><a href='" . get_permalink($post) . "'>" . $post->post_title . "</a></p>";
					$response->posts_count++;
				}
				
				echo json_encode($response);
				
			}
			else
			{
				print_r($_POST);
				echo "Nonce failed";
			}
			wp_die();
		}	
	
	}
	
	$antonineUpdates = new antonineUpdates();
	