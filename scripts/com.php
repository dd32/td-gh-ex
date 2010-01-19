<h3 class="f1"><?php echo $bxx_com_title ?></h3><?php
  if(function_exists('recent_comments')) {
  	recent_comments($bxx_avatar_size, $bxx_com_number, $bxx_com_siz, false);
  }
?>
<?php
$num_com = wp_count_comments( );
$num_com = $num_com->approved;
echo '<p>There are ' . $num_com . ' comments.</p>';
?>