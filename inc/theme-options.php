<?php
if(is_admin()){

echo '<br />';
global $wpdb; 
$create_table_db = "CREATE TABLE theme_option (
												ID INT NOT NULL AUTO_INCREMENT,
												PRIMARY KEY(ID),
												Userfburl text,
												Usertwitterurl text,
												Usergplusurl text,
												Userlikinurl text,
												Useradsense728_90 longtext,
												Useradsense200_200 longtext,
												Useradsense180_150 longtext,
												Usergoogleanalytic longtext
											)";
$wpdb->query($create_table_db);

$get_row_theme_option = "SELECT * FROM theme_option WHERE ID = 1";
		$get_row_theme_option_id = $wpdb->get_row($get_row_theme_option);
		  $get_row_theme_option_id_fb 			= $get_row_theme_option_id->Userfburl;
		  $get_row_theme_option_id_tw 			= $get_row_theme_option_id->Usertwitterurl;
		  $get_row_theme_option_id_gp 			= $get_row_theme_option_id->Usergplusurl;
		  $get_row_theme_option_id_li 			= $get_row_theme_option_id->Userlikinurl;
		  $get_row_theme_option_id_ad_728_90 	= $get_row_theme_option_id->Useradsense728_90;
		  $get_row_theme_option_id_ad_200_200 	= $get_row_theme_option_id->Useradsense200_200;
		  $get_row_theme_option_id_ad_180_150 	= $get_row_theme_option_id->Useradsense180_150;
		  $get_row_theme_option_id_googleanalytic 	= $get_row_theme_option_id->Usergoogleanalytic;?>

<table>
  <tr>
    <th colspan="2">Social Media</th>
  </tr>
<form action="" method="post"> 
  <tr>
    <td>Facebook Follw URL:</td>
    <td><input type="text" name="user_facebook_url" value="<?php echo $get_row_theme_option_id_fb ?>" style="width:600px;"></td>
  </tr>
  <tr>
    <td>Twitter Follw URL:</td>
    <td><input style="width:600px;" type="text" name="user_twitter_url" value="<?php echo $get_row_theme_option_id_tw?>"></td>
  </tr>
  <tr>
    <td>Googleplus Follw URL:</td>
    <td><input style="width:600px;" type="text" name="user_googleplus_url" value="<?php echo $get_row_theme_option_id_gp ?>"></td>
  </tr>
   <tr>
    <td>Linkedin Follw URL:</td>
    <td><input style="width:600px;" type="text" name="user_linkedin_url" value="<?php echo $get_row_theme_option_id_li ?>"></td>
  </tr>
  <tr>
    <td>Adsense Code(728x90):</td>
    <td><textarea style="width:600px; height:100px;" name="user_adsense_728_90"><?php echo $get_row_theme_option_id_ad_728_90; ?></textarea></td>
  </tr>
  <tr>
    <td>Adsense Code(300x250):</td>
    <td><textarea style="width:600px; height:100px;" name="user_adsense_200_200"><?php echo $get_row_theme_option_id_ad_200_200; ?></textarea></td>
  </tr>
  <tr>
    <td>Adsense Code(468x60):</td>
    <td><textarea style="width:600px; height:100px;" name="user_adsense_180_150"><?php echo $get_row_theme_option_id_ad_180_150; ?></textarea></td>
  </tr>
  <tr>
    <td>Google Analytic:</td>
    <td><textarea style="width:600px; height:100px;" name="user_googleanalytic"><?php echo $get_row_theme_option_id_googleanalytic; ?></textarea></td>
  </tr>
  <tr>
    <td colspan="2"><input class="button" type="submit" name="user_submit_url" value="Save"></td>
  </tr>
</form>
</table>

<?php
if(isset($_POST['user_submit_url'])){
	
		$user_facebook_url 			=  	$_POST['user_facebook_url'];
		$user_twitter_url 			= 	$_POST['user_twitter_url'];
		$user_googleplus_url 		= 	$_POST['user_googleplus_url'];
		$user_linkedin_url 			=  	$_POST['user_linkedin_url'];
		$user_adsense_728_90 		=  	$_POST['user_adsense_728_90'];
		$user_adsense_200_200 		=  	$_POST['user_adsense_200_200'];
		$user_adsense_180_150 		=  	$_POST['user_adsense_180_150'];
		$user_googleanalytic 		=  	$_POST['user_googleanalytic'];
		
		
			if(isset($get_row_theme_option_id_fb) || isset($get_row_theme_option_id_tw) || isset($get_row_theme_option_id_gp) || isset($get_row_theme_option_id_li) || isset($get_row_theme_option_id_ad_728_90)   || isset($get_row_theme_option_id_ad_200_200) || isset($get_row_theme_option_id_ad_180_150) || isset($get_row_theme_option_id_googleanalytic)   ){
				$update_data_theme_option = "UPDATE theme_option SET Userfburl='" . $user_facebook_url . "'WHERE ID = 1"; 
				$wpdb->query($update_data_theme_option); ?>
                <script language="javascript">window.location = location.href;</script>
		<?php }
			else{
				$insert_fb_url_theme_option = "INSERT INTO theme_option (Userfburl)VALUES ('$user_facebook_url') ";
				$wpdb->query($insert_fb_url_theme_option); ?>
				<script language="javascript">window.location = location.href;</script>
			<?php }
		
			if(isset($get_row_theme_option_id_fb) || isset($get_row_theme_option_id_tw) || isset($get_row_theme_option_id_gp) || isset($get_row_theme_option_id_li) || isset($get_row_theme_option_id_ad_728_90)   || isset($get_row_theme_option_id_ad_200_200)  || isset($get_row_theme_option_id_ad_180_150) || isset($get_row_theme_option_id_googleanalytic)){
				$update_data_theme_option = "UPDATE theme_option SET Usertwitterurl='" . $user_twitter_url . "'WHERE ID = 1"; 
				$wpdb->query($update_data_theme_option);?>
                <script language="javascript">window.location = location.href;</script>
		<?php }
			else{
				$insert_tw_url_theme_option = "INSERT INTO theme_option (Usertwitterurl)VALUES ( '$user_twitter_url') ";
				$wpdb->query($insert_tw_url_theme_option);?>
				<script language="javascript">window.location = location.href;</script>
			<?php }
		
			if(isset($get_row_theme_option_id_fb) || isset($get_row_theme_option_id_tw) || isset($get_row_theme_option_id_gp) || isset($get_row_theme_option_id_li) || isset($get_row_theme_option_id_ad_728_90)   || isset($get_row_theme_option_id_ad_200_200) || isset($get_row_theme_option_id_ad_180_150)  || isset($get_row_theme_option_id_googleanalytic )){
				$update_data_theme_option = "UPDATE theme_option SET Usergplusurl='" . $user_googleplus_url . "'WHERE ID = 1"; 
				$wpdb->query($update_data_theme_option);?>
                <script language="javascript">window.location = location.href;</script>
		<?php }
			else{
				$insert_gogle_url_theme_option = "INSERT INTO theme_option (Usergplusurl)VALUES ('$user_googleplus_url') ";
				$wpdb->query($insert_gogle_url_theme_option);?>
				<script language="javascript">window.location = location.href;</script>
			<?php }
		
			if(isset($get_row_theme_option_id_fb) || isset($get_row_theme_option_id_tw) || isset($get_row_theme_option_id_gp) || isset($get_row_theme_option_id_li) || isset($get_row_theme_option_id_ad_728_90)   || isset($get_row_theme_option_id_ad_200_200) || isset($get_row_theme_option_id_ad_180_150) || isset($get_row_theme_option_id_googleanalytic ) ){
				$update_data_theme_option = "UPDATE theme_option SET Userlikinurl='" . $user_linkedin_url . "'WHERE ID = 1"; 
				$wpdb->query($update_data_theme_option);?>
                <script language="javascript">window.location = location.href;</script>
		<?php }
			else{
				$insert_link_url_theme_option = "INSERT INTO theme_option (Userlikinurl)VALUES ('$user_linkedin_url') ";
				$wpdb->query($insert_link_url_theme_option);?>
				<script language="javascript">window.location = location.href;</script>
			<?php }
		
			if(isset($get_row_theme_option_id_fb) || isset($get_row_theme_option_id_tw) || isset($get_row_theme_option_id_gp) || isset($get_row_theme_option_id_li) || isset($get_row_theme_option_id_ad_728_90)   || isset($get_row_theme_option_id_ad_200_200) || isset($get_row_theme_option_id_ad_180_150) || isset($get_row_theme_option_id_googleanalytic ) ){
				$update_data_theme_option = "UPDATE theme_option SET Useradsense728_90='" . $user_adsense_728_90 . "'WHERE ID = 1"; 
				$wpdb->query($update_data_theme_option);?>
                <script language="javascript">window.location = location.href;</script>
		<?php }
			else{
				$insert_link_url_theme_option = "INSERT INTO theme_option (Useradsense728_90)VALUES ('$user_adsense_728_90') ";
				$wpdb->query($insert_link_url_theme_option);?>
				<script language="javascript">window.location = location.href;</script>
			<?php }
		
			if(isset($get_row_theme_option_id_fb) || isset($get_row_theme_option_id_tw) || isset($get_row_theme_option_id_gp) || isset($get_row_theme_option_id_li) || isset($get_row_theme_option_id_ad_728_90)   || isset($get_row_theme_option_id_ad_200_200) || isset($get_row_theme_option_id_ad_180_150) || isset($get_row_theme_option_id_googleanalytic ) ){
				$update_data_theme_option = "UPDATE theme_option SET Useradsense200_200='" . $user_adsense_200_200 . "'WHERE ID = 1"; 
				$wpdb->query($update_data_theme_option);?>
                <script language="javascript">window.location = location.href;</script>
		<?php }
			else{
				$insert_link_url_theme_option = "INSERT INTO theme_option (Useradsense200_200)VALUES ('$user_adsense_200_200') ";
				$wpdb->query($insert_link_url_theme_option);?>
				<script language="javascript">window.location = location.href;</script>
			<?php }
			
			if(isset($get_row_theme_option_id_fb) || isset($get_row_theme_option_id_tw) || isset($get_row_theme_option_id_gp) || isset($get_row_theme_option_id_li) || isset($get_row_theme_option_id_ad_728_90)   || isset($get_row_theme_option_id_ad_200_200) || isset($get_row_theme_option_id_ad_180_150) || isset($get_row_theme_option_id_googleanalytic ) ){
				$update_data_theme_option = "UPDATE theme_option SET Useradsense180_150='" . $user_adsense_180_150 . "'WHERE ID = 1"; 
				$wpdb->query($update_data_theme_option);?>
                <script language="javascript">window.location = location.href;</script>
		<?php }
			else{
				$insert_link_url_theme_option = "INSERT INTO theme_option (Useradsense180_150)VALUES ('$user_adsense_180_150') ";
				$wpdb->query($insert_link_url_theme_option);?>
				<script language="javascript">window.location = location.href;</script>
			<?php }
			
			if(isset($get_row_theme_option_id_fb) || isset($get_row_theme_option_id_tw) || isset($get_row_theme_option_id_gp) || isset($get_row_theme_option_id_li) || isset($get_row_theme_option_id_ad_728_90)   || isset($get_row_theme_option_id_ad_200_200) || isset($get_row_theme_option_id_ad_180_150) || isset($get_row_theme_option_id_googleanalytic ) ){
				$update_data_theme_option = "UPDATE theme_option SET Usergoogleanalytic='" . $user_googleanalytic . "'WHERE ID = 1"; 
				$wpdb->query($update_data_theme_option);?>
                <script language="javascript">window.location = location.href;</script>
		<?php }
			else{
				$insert_link_url_theme_option = "INSERT INTO theme_option (Usergoogleanalytic)VALUES ('$user_googleanalytic') ";
				$wpdb->query($insert_link_url_theme_option);?>
				<script language="javascript">window.location = location.href;</script>
			<?php }
}
?>

<p style="text-align:right; margin:0 25px;"><a style="text-align:right; color:#F06; text-decoration:none; " href="http://jathemes.com/" target="_blank"><img src="http://jathemes.com/wp-content/uploads/2014/07/icon.png" width="30px" />JAThemes</a></p>

<?php }?>