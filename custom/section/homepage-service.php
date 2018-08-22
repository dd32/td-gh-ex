<?php

  $key = 'service';
  $custom_css = '';

  $sections = best_restaurant_public_content_default(); 
  $default = $sections[$key];

	
  $imagepath =  get_stylesheet_directory_uri() . '/custom/images/'; 

  $enable_parallax_background = get_theme_mod( $key.'_enable_parallax_background',1); 
  
  $section_background_image     = esc_url(get_theme_mod( $key.'_section_background_image', $imagepath.'service.jpg')); 
  
  $parallax_str = '';
  
  if($enable_parallax_background && $section_background_image !=''){	  
	  $parallax_str ='data-parallax="scroll" data-image-src="'.$section_background_image.'" ';  
  }

?>
<section id="ct_<?php echo $key;?>" class="ct_section ct_<?php echo $key;?> ct_section_<?php echo $key;?> ">
	<div  id="<?php echo $key;?>" class="section_content "   <?php echo $parallax_str;?> >
    	
        <div class="ct-title container">
        
			<?php if ( get_theme_mod( $key.'_section_description', $default['description'] ) != '' ) : ?>
				<p class="section_text"><?php echo esc_html( get_theme_mod( $key.'_section_description', $default['description'] ) ); ?></p>
			<?php endif; ?>        
        
        	<?php if ( get_theme_mod( $key.'_section_title', $default['title'] ) != '' ) : ?>
            <h1 class="section_title "><?php echo esc_html( get_theme_mod( $key.'_section_title', $default['title'] ) );  ?></h1>
           
			<?php endif; ?>

            
        </div>

	</div>
	<div class="clear"></div>
</section>