<?PHP
	
	class antonineScroll{
	
		function __construct(){;
			add_action("wp_ajax_nopriv_antonine_scroll", array($this, "scroll"));
			add_action("wp_ajax_antonine_scroll", array($this, "scroll"));
		}
	
		function scroll(){
		
			if(wp_verify_nonce($_POST['nonce'], "antonine_scroll"))
			{
				$args = array(
								'posts_per_page'   => $_POST['posts'],
								'offset'           => ($_POST['offset'] + 1)
							);
				
				if(isset($_POST['cat'])){
					$args['cat'] = $_POST['cat'];
				}
				
				if(isset($_POST['tag_id'])){
					$args['tag_id'] = $_POST['tag_id'];
				}
				
				if(isset($_POST['author'])){
					$args['author'] = $_POST['author'];
				}
				
				$query = new WP_Query( $args );	

				$response = new StdClass();
				ob_start();
				if(count($query->posts)!=0){
					foreach($query->posts as $index => $post){
					
						set_query_var( 'post', $post );
						get_template_part( 'parts/content/content-scroll', get_post_format($post->ID) );
		
					}
					
					$buffer = ob_get_contents();
					ob_end_clean();
					$response->data = $buffer;
					$response->end = false;
					echo json_encode($response);
				}else{
					$response->end = true;
					$response->data = esc_html(__("No more posts", 'antonine'));
					echo json_encode($response);
				}
				
			}
			else
			{
				echo esc_html(__("Nonce failed","antonine"));
			}
			wp_die();
		}	
	
	}
	
	$antonineScroll = new antonineScroll();
	