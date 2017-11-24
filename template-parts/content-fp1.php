<?php

 $bfast_shop_ba = get_theme_mod('bfastmag_shop_banners');
  $bfast_shop_ba_ar = json_decode($bfast_shop_ba,true);
echo '<div class="bfastmag-content-ban_wrap">';
echo '<div class="row">';
echo '<div class="bfastmag-content-ban col-md-12">';
foreach ($bfast_shop_ba_ar as $bfsba  ) {
	echo '<div class="bfastmag-content-ban col-md-4">';

 		echo '<a href="'.esc_url($bfsba['link']).'"><img src="'.esc_url($bfsba['image_url']).'" title="" alt=""></a>';
 echo "</div>";
 }
 echo "</div>";
 echo "</div>";
 echo "</div>";