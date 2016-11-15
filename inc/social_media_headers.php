<?PHP

	class antonine_headers{
	
		function __construct(){
			add_action('wp_head', array($this,'display_social_media_headers') );
		}
		
		function display_social_media_headers(){
	
			if(!is_single()){
				$this->display_site_header();
			}else{
				global $post;
				$this->display_single_picture_header($post);
			}
		
		}
		
		function display_site_header(){
		
			$img = get_theme_mod("antonine[sm_logo]", FALSE);
		
			if($img){
			
				$info = getimagesize($img);
			
				?>
				<meta property="og:image" content="<?PHP echo $img; ?>"/>
				<meta property="twitter:image" content="<?PHP echo $img; ?>"/>
				<meta property="og:url" content="<?PHP echo site_url(); ?>"/>
				<meta property="og:title" content="<?PHP echo get_bloginfo("name"); ?>"/>
				<meta name="twitter:card" content="photo">
				<meta name="twitter:image:width" content="<?PHP echo $info[0]; ?>">
				<meta name="twitter:image:height" content="<?PHP echo $info[1]; ?>">
				<meta name="twitter:title" content="<?PHP echo get_bloginfo("name"); ?>"><?PHP
				
			}
			
		}
		
		function display_single_picture_header($post){
			
			if(has_post_thumbnail($post)){
			
				$image = get_post(get_post_meta($post->ID,'_thumbnail_id',true));
				$info = getimagesize($image->guid);
				
				?>
				<meta property="og:image" content="<?PHP echo $image->guid; ?>"/>
				<meta property="twitter:image" content="<?PHP echo $image->guid; ?>"/>
				<meta property="og:url" content="<?PHP echo $post->guid; ?>"/>
				<meta property="og:title" content="<?PHP echo $post->post_title; ?>"/>
				<meta name="twitter:card" content="photo">
				<meta name="twitter:image:width" content="<?PHP echo $info[0]; ?>">
				<meta name="twitter:image:height" content="<?PHP echo $info[1]; ?>">
				<meta name="twitter:title" content="<?PHP echo $post->post_title; ?>"><?PHP
				
			}
			
		}
	
	}
	
	$antonine_headers = new antonine_headers;