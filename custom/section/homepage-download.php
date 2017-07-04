<?php
//download
  $i=12;
  $key = 'download';
  $custom_css = '';
  //--------------public css set-------------------
  $sections = ascreen_get_section_default(); 
  $default = $sections[$key];
  

  //--------------section css set-------------------
 $download_button_text     = get_theme_mod( 'download_button_text',__( 'Download Now', 'ascreen' )); 
 $download_url     = get_theme_mod( 'download_url',''); 
 

?>           
<section id="ct_<?php echo $key;?>" class="ct_section ct_<?php echo $key;?> ct_section_<?php echo $i;?> "  >
	<div  id="<?php echo $key;?>" class="section_content container">
        
        <div class="row">
            <div class="section_text_content col-md-8" style="text-align:center;">
                <p class="download_title"><?php echo esc_html( get_theme_mod( $key.'_section_title', $default['title'] ) );  ?></p>
                <p class="download_text"><?php echo esc_html( get_theme_mod( $key.'_section_description', $default['description'] ) ); ?></p>
            
            </div>
            
            <div class="col-md-4 download_btn">
            <a class="btn btn-lg btn-primary color1" href="<?php echo esc_url($download_url);?>" role="button"><?php echo esc_html($download_button_text);?></a>
            </div>
		</div>





	</div>
	<div class="clear"></div>
</section>