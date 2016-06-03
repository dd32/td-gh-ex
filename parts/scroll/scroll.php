<div id="scroll_bottom" <?PHP
	foreach($wp_query->query_vars as $name => $value){
		
		if(is_array($value)){
			$value = implode(",", $value);
		}
		if($value!=""){
			echo ' ' . $name . '="' . $value . '" ';
		}
	}
?> scroll="on" page="<?PHP echo $wp_query->query_vars['posts_per_page']; ?>"></div>