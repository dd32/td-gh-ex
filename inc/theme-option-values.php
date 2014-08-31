<?php
function values_get_fb(){
	global $wpdb;
 		$get_row_theme_option = "SELECT * FROM theme_option WHERE ID = 1";
		$get_row_theme_option_id = $wpdb->get_row($get_row_theme_option);
		$get_row_theme_option_id_fb = $get_row_theme_option_id->Userfburl;
		if( empty($get_row_theme_option_id_fb) ){
			'<hide>empty</hide>';
		}
		else{
			echo $get_row_theme_option_id_fb;
		}
}
function values_get_tw(){
	global $wpdb;
		 $get_row_theme_option = "SELECT * FROM theme_option WHERE ID = 1";
		$get_row_theme_option_id = $wpdb->get_row($get_row_theme_option);
		echo $get_row_theme_option_id_tw = $get_row_theme_option_id->Usertwitterurl;
		if( empty($get_row_theme_option_id_tw) ){
			'<hide>empty</hide>';
		}
		else{
			echo $get_row_theme_option_id_tw;
		}
}
function values_get_gp(){
	global $wpdb;
		$get_row_theme_option = "SELECT * FROM theme_option WHERE ID = 1";
		$get_row_theme_option_id = $wpdb->get_row($get_row_theme_option);
		echo $get_row_theme_option_id_gp = $get_row_theme_option_id->Usergplusurl;
		if( empty($get_row_theme_option_id_gp) ){
			'<hide>empty</hide>';
		}
		else{
			echo $get_row_theme_option_id_gp;
		}

}
function values_get_li(){
	global $wpdb;
 		$get_row_theme_option = "SELECT * FROM theme_option WHERE ID = 1";
		$get_row_theme_option_id = $wpdb->get_row($get_row_theme_option);
		echo $get_row_theme_option_id_li = $get_row_theme_option_id->Userlikinurl;
		if( empty($get_row_theme_option_id_li) ){
			'<hide>empty</hide>';
		}
		else{
			echo $get_row_theme_option_id_li;
		}
}
function values_get_ad_728_90(){
	global $wpdb;
		$get_row_theme_option = "SELECT * FROM theme_option WHERE ID = 1";
		$get_row_theme_option_id = $wpdb->get_row($get_row_theme_option);
		echo $get_row_theme_option_id_li = $get_row_theme_option_id->Useradsense728_90;
		if( empty($get_row_theme_option_id_li) ){
			'<hide>empty</hide>';
		}
		else{
			echo $get_row_theme_option_id_li;
		}
}
function values_get_ad_200_200(){
	global $wpdb;
 		$get_row_theme_option = "SELECT * FROM theme_option WHERE ID = 1";
		$get_row_theme_option_id = $wpdb->get_row($get_row_theme_option);
		echo $get_row_theme_option_id_li = $get_row_theme_option_id->Useradsense200_200;
		if( empty($get_row_theme_option_id_li) ){
			'<hide>empty</hide>';
		}
		else{
			echo $get_row_theme_option_id_li;
		}
}
function values_get_ad_180_150(){
	global $wpdb;
 		$get_row_theme_option = "SELECT * FROM theme_option WHERE ID = 1";
		$get_row_theme_option_id = $wpdb->get_row($get_row_theme_option);
		echo $get_row_theme_option_id_li = $get_row_theme_option_id->Useradsense180_150;
		if( empty($get_row_theme_option_id_li) ){
			'<hide>empty</hide>';
		}
		else{
			echo $get_row_theme_option_id_li;
		}
}
function values_get_googleanalytic(){
	global $wpdb;
 		$get_row_theme_option = "SELECT * FROM theme_option WHERE ID = 1";
		$get_row_theme_option_id = $wpdb->get_row($get_row_theme_option);
		$get_row_theme_option_id_li = $get_row_theme_option_id->Usergoogleanalytic;
}
?>