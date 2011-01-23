<?php global $chip_life_global; ?>
<div class="chipboxm1 chipstyle4 margin10b">
  <div class="chipboxm1data">
    
    <h2 class="white margin10b">Subscribe for Best &amp; Free Resources</h2>
    <form class="margin0" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $chip_life_global['theme_options']['chip_life_feedburner_id']; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
      <input name="email" type="text" class="inputtext" value="Enter your email here" onfocus="this.value=''" size="30"  />
      <input type="submit" name="button" class="inputbutton" value="Subscribe to Email RSS" />
      <input type="hidden" value="<?php echo $chip_life_global['theme_options']['chip_life_feedburner_id']; ?>" name="uri" />
      <input type="hidden" name="loc" value="en_US" />
    </form>
      
  </div>
</div>