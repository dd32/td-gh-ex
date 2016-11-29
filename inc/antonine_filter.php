<?PHP
	
	class antonineFilter{
	
		function __construct(){;
			add_action("wp_ajax_nopriv_antonine_filter", array($this, "filter"));
			add_action("wp_ajax_antonine_filter", array($this, "filter"));
			add_action("wp_ajax_nopriv_antonine_show_posts", array($this, "show_posts"));
			add_action("wp_ajax_antonine_show_posts", array($this, "show_posts"));
		}

		function show_posts(){
			if(wp_verify_nonce($_POST['nonce'], "antonine_filter"))
			{
			
				$args = array( 'post_type' => 'post' , 'orderby' => 'menu_order' , 'order' => 'ASC' , 'posts_per_page' => -1);
				
				if($_POST['category']!=0){
					$args['cat'] = $_POST['category'];
				}
				if($_POST['tag']!=0){
					$args['tag_id'] = $_POST['tag'];
				}
				if($_POST['author']!=0){
					$args['author'] = $_POST['author'];
				}
				
				$query = new WP_Query( $args );
			
				if($_POST['date']!=0){
					foreach($query->posts as $index => $post){
						if(strpos($post->post_date, $_POST['date'])!==0){
							unset($query->posts[$index]);
						}
					}
				}
				
				if($_POST['text']!=""){
					foreach($query->posts as $index => $post){
						$post_text = " " . strtolower($post->post_title . " " . $post->post_content);
						if(strpos($post_text, strtolower($_POST['text']))===FALSE){
							unset($query->posts[$index]);
						}
					}
				}
				
				$response = new StdClass();
				ob_start();
				
				foreach($query->posts as $post){	
					set_query_var( 'post', $post );
					get_template_part( 'parts/content/content-scroll', get_post_format($post->ID) );
				}
				
				$buffer = ob_get_contents();
				ob_end_clean();
				$response->data = $buffer;
				echo json_encode($response);
				wp_reset_postdata();
			}
			else
			{
				echo esc_html(__("Nonce failed","antonine"));
			}
			wp_die();
		}
	
		function filter(){
			if(wp_verify_nonce($_POST['nonce'], "antonine_filter"))
			{
			
				$args = array( 'post_type' => 'post' , 'orderby' => 'menu_order' , 'order' => 'ASC' , 'posts_per_page' => -1);
				
				if($_POST['category']!=0){
					$args['cat'] = $_POST['category'];
				}
				if($_POST['tag']!=0){
					$args['tag_id'] = $_POST['tag'];
				}
				if($_POST['author']!=0){
					$args['author'] = $_POST['author'];
				}
				
				$query = new WP_Query( $args );
			
				$response = new StdClass();
			
				if($_POST['date']==0){
					$response->count = count($query->posts);
					if(count($query->posts)!=1){
						$response->text = esc_html(__(" Matching Posts", 'antonine'));
					}else{
						$response->text = esc_html(__(" Matching Post", 'antonine'));
					}
				}else{
					foreach($query->posts as $index => $post){
						if(strpos($post->post_date, $_POST['date'])!==0){
							unset($query->posts[$index]);
						}
					}
					$response->count = count($query->posts);
					if(count($query->posts)!=1){
						$response->text = esc_html(__(" Matching Posts", 'antonine'));
					}else{
						$response->text = esc_html(__(" Matching Post", 'antonine'));
					}
				}
				
				if($_POST['text']==""){
					$response->count = count($query->posts);
					if(count($query->posts)!=1){
						$response->text = esc_html(__(" Matching Posts", 'antonine'));
					}else{
						$response->text = esc_html(__(" Matching Post", 'antonine'));
					}
				}else{
					foreach($query->posts as $index => $post){
						$post_text = " " . strtolower($post->post_title . " " . $post->post_content);
						if(strpos($post_text, strtolower($_POST['text']))===FALSE){
							unset($query->posts[$index]);
						}
					}
					$response->count = count($query->posts);
					if(count($query->posts)!=1){
						$response->text = esc_html(__(" Matching Posts", 'antonine'));
					}else{
						$response->text = esc_html(__(" Matching Post", 'antonine'));
					}
				}
				
				echo json_encode($response);
				
			}
			else
			{
				echo esc_html(__("Nonce failed","antonine"));
			}
			wp_die();
		}	
	
	}
	
	$antonineFilter = new antonineFilter();
	