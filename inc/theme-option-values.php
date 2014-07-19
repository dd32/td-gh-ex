<?php
function values_get_fb(){
	global $wpdb;
 $get_row_theme_option = "SELECT * FROM theme_option WHERE ID = 1";
		$get_row_theme_option_id = $wpdb->get_row($get_row_theme_option);
			echo $get_row_theme_option_id_fb = $get_row_theme_option_id->Userfburl;

}
function values_get_tw(){
	global $wpdb;
 $get_row_theme_option = "SELECT * FROM theme_option WHERE ID = 1";
		$get_row_theme_option_id = $wpdb->get_row($get_row_theme_option);
		echo $get_row_theme_option_id_tw = $get_row_theme_option_id->Usertwitterurl;
}
function values_get_gp(){
	global $wpdb;
$get_row_theme_option = "SELECT * FROM theme_option WHERE ID = 1";
		$get_row_theme_option_id = $wpdb->get_row($get_row_theme_option);
		echo $get_row_theme_option_id_gp = $get_row_theme_option_id->Usergplusurl;

}
function values_get_li(){
	global $wpdb;
 $get_row_theme_option = "SELECT * FROM theme_option WHERE ID = 1";
		$get_row_theme_option_id = $wpdb->get_row($get_row_theme_option);
		echo $get_row_theme_option_id_li = $get_row_theme_option_id->Userlikinurl;
}
function values_get_ad_728_90(){
	global $wpdb;
 $get_row_theme_option = "SELECT * FROM theme_option WHERE ID = 1";
		$get_row_theme_option_id = $wpdb->get_row($get_row_theme_option);
		echo $get_row_theme_option_id_li = $get_row_theme_option_id->Useradsense728_90;
}
function values_get_ad_200_200(){
	global $wpdb;
 $get_row_theme_option = "SELECT * FROM theme_option WHERE ID = 1";
		$get_row_theme_option_id = $wpdb->get_row($get_row_theme_option);
		echo $get_row_theme_option_id_li = $get_row_theme_option_id->Useradsense200_200;
}
function values_get_ad_180_150(){
	global $wpdb;
 $get_row_theme_option = "SELECT * FROM theme_option WHERE ID = 1";
		$get_row_theme_option_id = $wpdb->get_row($get_row_theme_option);
		echo $get_row_theme_option_id_li = $get_row_theme_option_id->Useradsense180_150;
}
function values_get_googleanalytic(){
	global $wpdb;
 $get_row_theme_option = "SELECT * FROM theme_option WHERE ID = 1";
		$get_row_theme_option_id = $wpdb->get_row($get_row_theme_option);
		$get_row_theme_option_id_li = $get_row_theme_option_id->Usergoogleanalytic;
}
?>