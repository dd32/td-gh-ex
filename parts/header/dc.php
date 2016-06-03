	<?PHP
		if(is_single()){
			global $post;
			$user = get_userdata($post->post_author);
			$cats = array_merge(antonine_get_categories($post->ID), antonine_get_tags($post->ID));
			?><meta name = "DC.Creator" content = "<?PHP echo $user->user_nicename; ?>"><?PHP
			?><meta name = "DC.Title" content = "<?PHP echo $post->post_title; ?><?PHP
			?><meta name = "DC.Date" content = "<?PHP echo $post->post_date; ?><?PHP
			foreach($cats as $subject){
				?><meta name = "DC.Subject" content = "<?PHP echo $subject['name']; ?>"><?PHP
			}
		}
	?>
	<?php wp_head(); ?>
</head>
