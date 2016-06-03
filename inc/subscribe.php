<?PHP	
	
	class antonineSubscribe{
	
		var $hash;
		var $random;
	
		function __construct(){;
			add_action("wp_ajax_nopriv_antonine_subscribe", array($this, "subscribe"));
			add_action("wp_ajax_antonine_subscribe", array($this, "subscribe"));
			add_action("wp_ajax_nopriv_antonine_subscribe_process", array($this, "subscribe_process"));
			add_action("wp_ajax_antonine_subscribe_process", array($this, "subscribe_process"));
			add_action("wp_ajax_nopriv_antonine_unsubscribe_process", array($this, "unsubscribe_process"));
			add_action("wp_ajax_antonine_unsubscribe_process", array($this, "unsubscribe_process"));
			add_action("publish_post", array($this, "handle_subscription_publish"));
		}
		
		function mail_from( $email )
		{
			return get_option('admin_email');
		}

		function mail_from_name( $name )
		{
			return get_bloginfo('name');
		}
		
		function handle_subscription_publish($post_id){
			global $wpdb;
			$table_name = $wpdb->prefix . "antonine_subscribe";
			$results = $wpdb->get_results( "SELECT id, email_address FROM " . $table_name . " WHERE verify = ''" );
			foreach($results as $result){
				$random = bin2hex(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM));
				$hash = password_hash($result->email_address, PASSWORD_BCRYPT);
				$wpdb->update($table_name, array("unsubscribe" => $random . $hash), array("id" => $result->id));
				
				$unsubscribe = $random . $hash;
				
				add_filter( 'wp_mail_content_type', array($this, 'set_content_type') );
				add_filter( 'wp_mail_from', array($this, 'mail_from') );
				add_filter( 'wp_mail_from_name', array($this, 'mail_from_name') );
								
				$unsubscribe = site_url() . "/?unsub=" . $unsubscribe;
				
				$post = get_post($post_id);
				
				$email = "<p>" . __("Hello", 'antonine') . ",</p><p>" . __("There is new content on", "antonine") . " " . get_bloginfo('name') . "</p>.";
				$email .= "<p>" . __("Here is a link to the new post", "antonine") . " <a href='" . get_the_permalink($post_id) . "'>" . $post->post_title . "</a></p>.";
				$email .= "<p><a href='" . $unsubscribe . "'>" . __("Unsubscribe", 'antonine') . "</a></p>"; 
				$email .= "<p>" . __("Thanks", "antonine") . "</p>"; 
				
				wp_mail($result->email_address, "[" . get_bloginfo('name') . "] : " .  __("New Post", 'antonine') . " " . $post->post_title, $email);
				
				remove_filter( 'wp_mail_content_type', array($this, 'set_content_type') );
				remove_filter( 'wp_mail_from', array($this, 'mail_from') );
				remove_filter( 'wp_mail_from_name', array($this, 'mail_from_name') );				
			}
		}
		
		function unsubscribe_process(){
		
			$response = new StdClass();
		
			if(wp_verify_nonce($_POST['nonce'], "antonine_unsubscribe_process"))
			{
				global $wpdb;
				$table_name = $wpdb->prefix . "antonine_subscribe";
				
				$unsub = $_POST['unsub'];
				
				$row = $wpdb->get_row( "SELECT * FROM " . $table_name . " WHERE unsubscribe = '" . $unsub . "'" );

				if($row){
					if(password_verify($row->email_address,substr($row->unsubscribe,-60,60))){
						$wpdb->delete( 
							$table_name,
							array( 'ID' => $row->id )
						); 
						
						$response->success = __("You've been unsubscribed from ", 'antonine') . get_bloginfo('name');
						
					}else{
						$response->error = __("A problem occurred, please try again", 'antonine');	
					}
				}
				else
				{
					$response->error = __("A problem occurred, please try again", 'antonine');
				}			
			}
			else
			{
				$response->error = __("A problem occurred, please try again", 'antonine');
			}
			echo json_encode($response);
			wp_die();
		}
	
		function subscribe_process(){
		
			$response = new StdClass();
		
			if(wp_verify_nonce($_POST['nonce'], "antonine_subscribe_process"))
			{
				global $wpdb;
				$table_name = $wpdb->prefix . "antonine_subscribe";
				
				$sub = $_POST['sub'];
				$hash = substr($sub, -60, 60);
				
				$row = $wpdb->get_row( "SELECT * FROM " . $table_name . " WHERE verify = '" . $sub . "'" );

				if($row){
					if(password_verify($row->email_address,substr($row->verify,-60,60))){
						$wpdb->update( 
							$table_name, 
							array( 	
								'verify' => '',	// string
								), 
							array( 'ID' => $row->id )
						); 
						
						$response->success = __("You've been subscribed to ", 'antonine') . get_bloginfo('name');
						
					}else{
						$response->error = __("A problem occurred, please try again", 'antonine');	
					}
				}
				else
				{
					$response->error = __("A problem occurred, please try again", 'antonine');
				}			
			}
			else
			{
				$response->error = __("A problem occurred, please try again", 'antonine');
			}
			echo json_encode($response);
			wp_die();
		}
	
		function insert_email(){
			
			global $wpdb;
			
			$this->random = bin2hex(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM));
			$this->hash = password_hash($_POST['email'], PASSWORD_BCRYPT);
			
			$table_name = $wpdb->prefix . "antonine_subscribe";
			
			$data = array(
				"email_address" => $_POST['email'],
			);
			
			$wpdb->delete($table_name, $data);
			
			$data = array(
				"email_address" => $_POST['email'],
				"verify" => $this->random . $this->hash
			);
			
			if($wpdb->insert($table_name, $data)==1){
				return true;
			}else{
				return false;
			}
			
		}
					
		function set_content_type( $content_type ) {
				return 'text/html';
		}
	
		function subscribe(){
		
			if(wp_verify_nonce($_POST['nonce'], "antonine_subscribe"))
			{
			
				$response = new StdClass();
				
				if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)!==FALSE){
					if($this->insert_email()){
						add_filter( 'wp_mail_content_type', array($this, 'set_content_type') );
						add_filter( 'wp_mail_from', array($this, 'mail_from') );
						add_filter( 'wp_mail_from_name', array($this, 'mail_from_name') );
						
						$subscribe = site_url() . "/?sub=" . $this->random . $this->hash;
						
						$email = "<p>" . __("To subscribe to", 'antonine') . " " . get_bloginfo('name') . ", <a href='" . $subscribe . "'>" . __("click here", 'antonine') . "</a></p>"; 
						
						wp_mail($_POST['email'], __("Subscribe to", 'antonine') . " " . get_bloginfo('name'), $email);
						
						remove_filter( 'wp_mail_content_type', array($this, 'set_content_type') );
						remove_filter( 'wp_mail_from', array($this, 'mail_from') );
						remove_filter( 'wp_mail_from_name', array($this, 'mail_from_name') );
						
						$response->success = __("Please check your inbox for an email", 'antonine');
		
					}else{
						$response->error = __("A problem occurred, please try again", 'antonine');
					}
				}else{
					$response->error = __("Email address not valid", 'antonine');
				}
				
			}
			else
			{
				$response->error = __("A problem occurred, please try again", 'antonine');
			}
			
			echo json_encode($response);
			
			wp_die();
		}	
	
	}
	
	$antonineSubscribe = new antonineSubscribe();
	