<?php
/**
 * Template Name: Front Page
 */
 
 get_header('featured');
 global $avata_sections;
 
 $hide_side_nav   = absint( avata_option( 'hide_side_nav'));
 $side_nav_align  = esc_attr( avata_option( 'side_nav_align'));

 ?>
 
 <div id="content" class="site-content">
		<main id="main" class="site-main avata-home-sections" role="main">
        <?php 
		$i       = 0;
		$sub_nav = '';
		
		foreach ( $avata_sections as $k=>$v ){
			
			$index = str_replace('section-','',$k);
			$index = str_replace('-','_',$index);
			$hide  = avata_option('section_hide_'.$index);
			if ( $hide == '1' || $hide == 'on' )
				continue;
			
			get_template_part('sections/section',$k);
			
			$menu_title         = avata_option('section_menu_title_'.$index );
			$menu_slug          = esc_attr(avata_option('section_id_'.$index ));
			$section_type       = avata_option( 'section_type_'.$index, 'content' );
			
			$current     = "";
			if( $i==0 )
				$current  = "active";
		
			if( $section_type == 'link'){
				$sub_nav .= '<li class="'.$current.'"><a id="nav-'.$menu_slug.'" target="'.$target.'" href="'.$section_menu_link.'">'.esc_attr($menu_title).'</a></li>';
			}else{
			    $sub_nav .= '<li data-menuanchor="'.$menu_slug.'" class="'.$current.'"><a id="nav-'.$menu_slug.'" href="#'.$menu_slug.'">'.esc_attr($menu_title).'</a></li>';
			}

			$i++;
		}
		?>
         <?php get_footer('frontpage');?>
       </main>
<?php
	if ( $hide_side_nav != '1' ){
		$style = avata_option('nav_styling_css3_styles','fillup');
?>
<div id="avata-nav" class="dotstyle dotstyle-align-<?php echo $side_nav_align;?> dotstyle-<?php echo $style;?>">
  <ul id="dotstyle-nav">
    <?php echo $sub_nav;?>
  </ul>
</div>
<?php }?>
 </div>
 <?php wp_footer(); ?>
</body>
</html>