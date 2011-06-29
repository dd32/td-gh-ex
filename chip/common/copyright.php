<div class="chipboxw2 chipstyle1">
  <div class="chipboxw2data">            
    
	<?php if(!dynamic_sidebar('footer-navigation-sidebar')): endif; ?>
    
    <div class="font11 alignc">
	  <?php 
	  global $chip_life_global;
	  echo htmlspecialchars_decode ( $chip_life_global['theme_options']['chip_life_field_copyright'] );
	  ?>
    </div>
    
  </div>
</div>