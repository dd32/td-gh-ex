<?PHP
	
	class antonineFiles{
	
		function __construct(){;
			add_action("wp_ajax_nopriv_antonine_files", array($this, "files"));
			add_action("wp_ajax_antonine_files", array($this, "files"));
		}
	
		function files(){
		
			if(wp_verify_nonce($_POST['nonce'], "antonine_files"))
			{
				$query_args = array(
					'post_type'      => 'attachment',
					'post_status'    => 'inherit',
					'posts_per_page' => - 1,
					'order_by' => 'title'
				);

				$query = new WP_Query( $query_args );

				foreach ( $query->posts as $file ) {
					echo "<div>";
					if(strpos($file->post_mime_type,"image")!==FALSE){
						echo "<img aria-hidden='false' alt=" . $file->post_title . " src='" . wp_get_attachment_url($file->ID) . "' />";
					}else{
						echo "<img aria-hidden='false' alt=" . $file->post_title . " src='" . get_template_directory_uri() . "/img/filethumb.png' />";
					}
					echo "<p><a href='" . $file->guid . "'>";
					if(strlen($file->post_title)>25){
						echo substr($file->post_title, 0, 25) . "...";
					}else{
						echo $file->post_title;
					}
					echo "</a></p>";
					echo "</div>";
				}
			}
			else
			{
				echo esc_html(__("Nonce failed","antonine"));
			}
			wp_die();
		}	
	
	}
	
	$antonineFiles = new antonineFiles();
	