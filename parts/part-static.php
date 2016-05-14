<?php 
// Define all Variables.
$bnt_advance = esc_html ( get_theme_mod('advance_link_name1',esc_attr__('Know More','advance')) );
$bnt2_advance = esc_html ( get_theme_mod('advance_link_name2',esc_attr__('Buy Theme','advance')) );
$advance_staticslider_uri1 = esc_url( get_theme_mod('advance_staticslider_uri1') ,esc_attr__('#','advance'));
$advance_staticslider_uri2 = esc_url( get_theme_mod('advance_staticslider_uri2'),esc_attr__('#','advance') );
$advance_staticslider_image = esc_url( get_theme_mod('advance_staticslider_image',esc_url(get_template_directory_uri().'/images/slider.jpg')) );
$advance_staticslider_title = esc_attr( get_theme_mod('advance_staticslider_title',esc_attr__('HERE IS SAFREEN ','advance')) );
$advance_staticslider_tagline = esc_attr( get_theme_mod('advance_staticslider_tagline',esc_attr__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. ','advance')) );
$advance_staticslider_tagline = html_entity_decode(get_theme_mod ('advance_staticslider_tagline',esc_attr__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','advance')));

?>
    <section class="masthead" style="background-image:url(<?php echo $advance_staticslider_image ?>); <?php $advance_Static_Sliderpara = get_theme_mod('advance_Static_Sliderpara',1);?> <?php if( isset($advance_Static_Sliderpara) && $advance_Static_Sliderpara == 1 ):?>background-attachment:fixed;<?php endif;?>" >
		
		<div class="masthead-overlay"></div>  
		<div class="masthead-arrow"></div>
        <div class="masthead-dsc">
		<?php if( !empty($advance_staticslider_title) || !empty($advance_staticslider_tagline)):?><h1><?php echo $advance_staticslider_title ?></h1>
		<p><?php echo $advance_staticslider_tagline ?></p>
		<?php endif;?>
		
        
         <?php if( !empty($bnt_advance) ):?>
                                    <a href="<?php echo $advance_staticslider_uri1 ?>" class='hvr-sweep-to-top'>  <?php echo $bnt_advance ?>  </a>
                                    <?php endif;?>
                                                                         <?php if( !empty($bnt2_advance) ):?>
                                    <a href="<?php echo $advance_staticslider_uri2 ?>" class='hvr-sweep-to-bottom-border'> <?php echo $bnt2_advance ?></a>
                                    <?php endif;?>
                                    </div>
                                  
	</section>