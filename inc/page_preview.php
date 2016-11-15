<?PHP
	
	class antoninePreview{
	
		function __construct(){;
			add_action("wp_ajax_nopriv_antonine_preview", array($this, "preview"));
			add_action("wp_ajax_antonine_preview", array($this, "preview"));
		}
	
		function preview(){
			if(wp_verify_nonce($_POST['nonce'], "antonine_preview"))
			{
				$post = get_post($_POST['post']);
				
				$response = new StdClass();
				ob_start();
				
				set_query_var( 'post', $post );
				get_template_part( 'parts/content/content-preview', get_post_format($post->ID) );
	
				$buffer = ob_get_contents();
				ob_end_clean();
				$response->title = $post->post_title;
				$response->data = $buffer;
				echo json_encode($response);
				
			}
			else
			{
				echo esc_html(__("Nonce failed","antonine"));
			}
			wp_die();
		}	
	
	}
	
	$antoninePreview = new antoninePreview();
	