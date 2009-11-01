<?php

/*
Plugin Name: Fancy Image Box
Plugin URI: http://DennisHoppe.de
Description: Associate linked images with Fancybox (http://fancy.klade.lv) 
Version: 1.0
Author: Dennis Hoppe
Author URI: http://DennisHoppe.de
*/


New plugin_fancy_image_box();

If (Class_Exists('plugin_fancy_image_box')) return False;
Class plugin_fancy_image_box {
  var $base_url;
  
  Function plugin_fancy_image_box(){
    // Read base
    $this->base_url = get_option('home').'/'.Str_Replace("\\", '/', SubStr(  RealPath(DirName(__FILE__)), Strlen(ABSPATH) ));
    
    // Set Hook
    Add_Action('wp_head', Array($this, 'Include_Fancy_Box'));
    wp_enqueue_script('jquery');
  }
  
  Function Include_Fancy_Box(){
    ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $this->base_url?>/jquery.fancybox.css" />
    <script type="text/javascript" src="<?php echo $this->base_url?>/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?php echo $this->base_url?>/jquery.fancybox-1.2.1.pack.js"></script>
    <script type="text/javascript" src="<?php echo $this->base_url?>/fancy.js"></script>
    <?php
  }
}

/* End of File */