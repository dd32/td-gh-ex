<h3 class="f1"><?php echo $bxx_com_title ?></h3><?php
  if(function_exists('recent_comments')) {
  	recent_comments($bxx_avatar_size, $bxx_com_number, $bxx_com_siz, false);
  }
?>
<?php $numcomms = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1'");
if (0 < $numcomms) $numcomms = number_format($numcomms); ?>
<p><?php printf(__(' There are %3$s comments on this site'), $numposts, 'edit.php',  $numcomms, 'edit-comments.php', $numcats, 'categories.php'); ?></p>