<div class="chipboxgrid">
  <div class="chipboxgriddata">
  
    <div id="headimg">
      <div id="headimgdata">        
        
        <?php 
		$header_textcolor = get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR );
		if( ( !empty( $header_textcolor ) && $header_textcolor != 'blank' ) ):
		?>
        <h1><a id="name" href="<?php echo CHIP_LIFE_HOME; ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
        <div id="desc"><?php bloginfo( 'description' ); ?></div>
        <?php else: ?>
        <a href="<?php echo CHIP_LIFE_HOME; ?>"><img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>        
        <?php endif; ?>
      
      </div>	
    </div>
    
    
  </div>
</div>