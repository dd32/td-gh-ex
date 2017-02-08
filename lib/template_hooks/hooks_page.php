<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function ascend_wp_link_pages() { 
	 wp_link_pages(array('before' => '<nav class="pagination kt-pagination">', 'after' => '</nav>', 'link_before'=> '<span>','link_after'=> '</span>'));
}
add_action( 'kadence_single_testimonial_content_after', 'ascend_wp_link_pages', 10 );

add_action( 'kadence_page_content', 'ascend_page_content_wrap_before', 10 );
function ascend_page_content_wrap_before() {
	echo '<div class="entry-content" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement">';
}
add_action( 'kadence_page_content', 'ascend_page_content', 20 );
function ascend_page_content() {
	get_template_part('templates/content', 'page'); 
}
add_action( 'kadence_page_content', 'ascend_page_content_wrap_after', 30 );
function ascend_page_content_wrap_after() {
	echo '</div>';
}

add_action( 'kadence_page_footer', 'ascend_page_comments', 20 );
function ascend_page_comments() {
	global $ascend;
	if(isset($ascend['page_comments']) && $ascend['page_comments'] == '1') {
		comments_template('/templates/comments.php');
	}
}

add_action( 'kadence_page_title_container', 'ascend_page_title', 20 );
function ascend_page_title() {
	if(ascend_display_pagetitle()) {
		get_template_part('templates/page', 'header');
	} else {
		if( ascend_display_page_breadcrumbs()) { 
			echo '<div class="kt_bc_nomargin kt_bread_container">';
			ascend_breadcrumbs(); 
			echo '</div>';
		}
	}
}
add_action( 'kadence_front_page_title_container', 'ascend_front_page_header', 20 );
function ascend_front_page_header() {
	global $ascend;
	if(isset($ascend['mobile_switch']) && $ascend['mobile_switch'] == 1) {
		if(isset($ascend['home_mobile_header'])) { 
	  		$m_home_header = $ascend['home_mobile_header'];
	  	} else {
	  		$m_home_header = 'none';
	  	}
		if ($m_home_header == "basic") {
			get_template_part('templates/mobile_home/mobile', 'basic-slider');
		} else if ($m_home_header == "pagetitle") {
			get_template_part('templates/mobile_home/mobile', 'page-header');
		} 
	}
	if(isset($ascend['home_header'])) { 
		$home_header = $ascend['home_header'];
	} else {
		$home_header = 'pagetitle';
	}
	if ($home_header == "basic") {
		get_template_part('templates/home/basic', 'slider');
	} else if ($home_header == "basic_post_carousel") {
		get_template_part('templates/home/post', 'carousel');
	} else if ($home_header == "pagetitle") {
		get_template_part('templates/home/home', 'page-header');
	}
}
 if(!function_exists('ascend_icon_menu_output')) {
function ascend_icon_menu_output($icon = 'kt-icon-cogs', $imageid = null, $link = null, $target = null, $title = null, $description = null, $readmore = null, $iconcolor = null, $iconbackground = null, $iconborder = null, $iconsize = null, $textcolor = null, $highlight = null) {
		if(!empty($target)) {
			$target = $target;
		} else {
			$target = '_self';
		}
		if(!empty($iconbackground)) {
			$iconbackground = 'background-color:'.$iconbackground;
		} else {
			$iconbackground = '';
		}
		if(!empty($iconsize)) {
			$iconsize = 'font-size:'.$iconsize.'px';
		} else {
			$iconsize = '';
		}
		if(!empty($iconcolor)) {
			$iconcolor = 'color:'.$iconcolor;
		} else {
			$iconcolor = '';
		}
		if(!empty($iconborder)) {
			$iconborder = 'border-color:'.$iconborder;
		} else {
			$iconborder = '';
		}
		if(!empty($textcolor)) {
			$textcolor = 'color:'.$textcolor;
		} else {
			$textcolor = '';
		}
		if(!empty($highlight)) {
			$highlight_border = 'border-color:'.$highlight;
			$highlight_bg = 'background-color:'.$highlight;
		} else {
			$highlight_border = '';
			$highlight_bg = '';
		}
		if(!empty($icon)) {
			$icon = $icon;
		} else {
			$icon = 'kt-icon-cogs';
		} 
		 	if(!empty($link)) {
            	echo '<a href="'.esc_url($link).'" target="'.esc_attr($target).'"  title="'.strip_tags(esc_attr($title)).'" class="box-icon-item">';
         	} else {
                echo '<div class="box-icon-item">';
            } 
               	echo '<div class="icon-container" style="'.esc_attr($iconbackground).' '.esc_attr($iconcolor).' '.esc_attr($iconborder).'">';
                 	echo '<span class="icon-left-highlight icon-heighlight" style="'.esc_attr($highlight_border).'"></span>';
                    echo '<span class="icon-right-highlight icon-heighlight" style="'.esc_attr($highlight_border).'"></span>';
                    if(!empty($imageid)) {
                    	echo wp_get_attachment_image($imageid, 'full');
                    } else {
                    	echo '<i class="'.esc_attr($icon).'" style="'.esc_attr($iconsize).'"></i>'; 
                    }
                echo '</div>';
                if (!empty($title)){
                	echo '<h4 style="'.esc_attr($textcolor).'">'.$title.'</h4>';
                } 
                if (!empty($description)){
                 	echo '<div class="menu-icon-description" style="'.esc_attr($textcolor).'">'.$description.'</div>';
                }
                if (!empty($readmore)){
                 	echo '<div class="menu-icon-read-more" style="'.esc_attr($textcolor).'"><span class="read-more-highlight" style="'.esc_attr($highlight_bg).'"></span>'.$readmore.'</div>';
                }
            if(!empty($link)) {
                echo '</a>';
            } else { 
                echo '</div>';
            }
    }
}
if(!function_exists('ascend_build_image_menu')) {
	function ascend_build_image_menu( $imageid = null, $type = 'fixed_height', $height = '220', $link = null, $target = '_self', $title = null, $subtitle = null, $align = 'left',  $valign = 'center', $class = null) {
		if(empty($imageid)){
			return;
		}
		ob_start(); 
			if($type == 'image_height') { 
				$csstype = 'image-menu-image-size';
			} else {
				$csstype = 'image-menu-fixed-height';
			}
			$image = wp_get_attachment_image_src($imageid, 'full' );
			$alt = get_post_meta($imageid, '_wp_attachment_image_alt', true);
			?>
			<div class="<?php echo esc_attr($csstype);?> image-menu_item <?php echo esc_attr($class);?>">
			    <?php if(!empty($link)) {
		    		echo '<a href="'.esc_attr($link).'" class="image_menu_item_link" target="'.esc_attr($target).'">';
		    	} else {
		    		echo '<div class="image_menu_item_link">';
		    	}?>
			        <?php if($type == 'image_height') { ?>
	                	<img src="<?php echo esc_url($image['0']);?>" width="<?php echo esc_attr($image['1']); ?>" height="<?php echo esc_attr($image['2']); ?>" alt="<?php echo esc_attr($alt);?>" />
	                <?php } else { ?>
	                		<div class="image_menu-bg-item" style="background: url(<?php echo esc_url($image['0']); ?>) center center no-repeat; height:<?php echo esc_attr($height) ?>px; background-size:cover;">
				        </div>
	                <?php } ?>
                	<div class="image_menu_overlay"></div>
                    <div class="image_menu_message  <?php echo 'imt-align-'.esc_attr($align);?> <?php echo 'imt-valign-'.esc_attr($valign);?>">
                    	<div class="image_menu_message_inner">
			        		<?php if (!empty($title)) {
			        			echo '<h4>'.$title.'</h4>';
			        		} 
			        		if (!empty($subtitle)) {
			            		echo '<h5>'.$subtitle.'</h5>';
			            	}?>
			            </div>
				    </div>
	        	<?php if(!empty($link)) {
        			echo '</a>'; 
        		} else {
        			echo '</div>';
        		}?>
			</div>
		<?php
    	$output = ob_get_contents();
		ob_end_clean();

	return $output;
	
	}
}