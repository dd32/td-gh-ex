<?php
/* 	D5 Creation Theme's Sub Functions
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
*/

// 	Link Open in Same/New Window
	function associationx_linkosn($losnv = '0' ) { if ( $losnv == '1' ): return ' target="_blank" '; else: return ' '; endif; }

// 	Link and Target
	function associationx_linkandtarget($contentt, $linkurl = '', $linktarget ='', $linkid ='', $linkclass ='', $nolnknotxt = '', $excontent = '' ) {
		if ($contentt): 
			$linkstart = ''; $linkend = '';
			if($linkid) $linkid =' id="'.$linkid.'" ';  if($linkclass) $linkclass =' class="'.$linkclass.'" ';
			if ( esc_url($linkurl) && $linkurl != "#"  ): $linkstart = '<a '.$linkid.' '.$linkclass.' href="'.esc_url($linkurl).'" '.associationx_linkosn($linktarget).' '.$excontent.'>'; $linkend = '</a>'; endif;
			$routput = ''; $routput = $linkstart . $contentt . $linkend;
			if ( $nolnknotxt == '1' && $routput == $contentt  ) $routput = ''; 
			return $routput;
		else:
			return '';
		endif;
	}

// 	CSS Property Change from Options
	function associationx_cngstyle($option, $default, $items='', $property='', $unit='', $isimportant='', $extrainside='', $extraoutside='', $countzerovalasfalse='' ) { 
		$result = '';
		if ($option && $default):		 
		$itemvalue = associationx_get_option($option,$default);
		if($countzerovalasfalse =='1' || $countzerovalasfalse =='true'): if(empty($itemvalue) || $itemvalue == '0'): $itemvalue ='false'; $unit=''; endif; endif;			
			if ( $isimportant == '1' || $isimportant == 'true'): $isimportant = '!important'; endif;
				if ($itemvalue != $default):
					if ( $items && $property ):
						if ( $property == 'background-image' ): $itemvalue = 'url("'.$itemvalue.'")'; endif;
						$result= $items.'{'.$property.':'.$itemvalue.''.$unit.''.$isimportant.';'.$extrainside.'}'.$extraoutside.''; 
					else: 
							$result=$extraoutside; 
					endif;
			endif;
		endif;			
	return $result;		
	}
	
//	Background Change
	function associationx_backchange($option, $itemforback, $image ='', $color = '', $repeat = 'repeat', $position='top left', $attachment = 'scroll' ){
		$optionval = associationx_get_option($option);
		if ( $optionval && $itemforback ):
			$nimage = $optionval['image']; 
			$ncolor = $optionval['color']; 
			$nrepeat = $optionval['repeat']; 
			$nposition = $optionval['position']; 
			$nattachment = $optionval['attachment'];
			if ( $nimage == $image && $ncolor == $color && $nrepeat == $repeat && $nposition == $position && $nattachment == $attachment ) : 	return ''; 
			else: 
				$nfoutput = '';				
				if($ncolor && $ncolor != $color) $nfoutput .= 'background-color:'. $ncolor . ';';				
				if($nimage):
					if($nimage && $nimage != $image): $nfoutput .= 'background-image: url("'.$nimage.'");'; endif;
					if($nrepeat && $nrepeat != $repeat ): $nfoutput .= 'background-repeat:'. $nrepeat . ';'; endif; 
					if($nposition && $nposition != $position): $nfoutput .= 'background-position:'. $nposition . ';'; endif;
					if($nattachment && $nattachment != $attachment): $nfoutput .= 'background-attachment:'. $nattachment . ';'; endif;
				else:
					$nfoutput .= 'background-image:none;';		
				endif;
				if($nfoutput): return $itemforback .'{'.$nfoutput.'}'; else: return ''; endif;
			endif;
		else: 
			return '';
		endif;
	}

//	WooCommerce Check
	function associationx_woo_check() {
		if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )): return true; else: return false; endif;
	}
	
//	WooCommerce Cart Icon Add
	if ( esc_attr(associationx_get_option('woo-cart-icon', '1')) && associationx_woo_check() ) {
	function associationx_wc_cart_count($d5wmenu, $wargs) {
    if( $wargs->theme_location == 'main-menu'):
	$wcsccount = WC()->cart->get_cart_contents_count();
	$wclink = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : WC()->cart->get_cart_url();
	$newmenup = '<li><a class="wccart-icon  fa-shopping-cart" href="'. $wclink . '"> ' . $wcsccount . '</a></li>';
	$newmenun = $d5wmenu . $newmenup;
	return $newmenun;
	else: 
	return $d5wmenu;
	endif;
	}
	add_filter('wp_nav_menu_items','associationx_wc_cart_count', 10, 2);
	}

//	WooCommerce Page Check
	function associationx_woo_page_check() {
		if ( associationx_woo_check() && ( is_cart() || is_checkout() || is_account_page() ) ): return true; else: return false; endif;
	}

// 	Social Links
	function associationx_social_links( $sval = '1' ) { 
	 	If ( $sval == '1' ): 
			$sltarget = 1;
			$slink = '';
			$numslinks = 4;
			if($numslinks && is_numeric($numslinks)):
				foreach (range(1, $numslinks ) as $numslinksn) {
					$sl = ''; $sl = esc_url(associationx_get_option('sl' . $numslinksn, '#'));
					$slink .= associationx_linkandtarget('<span></span>', $sl, $sltarget, '', 'sociallinkitem slicondefined', '1' );
				}
			endif;
			if($slink) echo '<div class="social social-link">'.$slink.'</div>';
		endif;
	}

// 	Post Meta design
	function associationx_post_meta() { ?>	
		<div class="post-meta"><span class="post-edit"><?php edit_post_link(esc_html__('Edit','associationx'),'<span class="fa-edit">','</span>' ); ?></span><span class="post-author fa-user-md"><?php the_author_posts_link(); ?></span><span class="post-date fa-clock"><?php the_time('F j, Y'); ?></span><span class="post-tag fa-tags"> <?php the_tags('' , ', '); ?> </span><span class="post-category fa-archive"> <?php the_category(', '); ?> </span> <span class="post-comments fa-comments"> <?php comments_popup_link(esc_html__('No Comments', 'associationx') . ' &#187;', esc_html__('One Comment', 'associationx') . ' &#187;', '% ' . esc_html__('Comments', 'associationx') . ' &#187;'); ?> </span>
		</div>	
	<?php }
	
//	Page Navigation
	function associationx_page_nav() {
		echo '<div class="page-nav">';
		echo paginate_links(array(
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> '<span class="fa-arrow-circle-left"></span>',
				'next_text'		=> '<span class="fa-arrow-circle-right"></span>',
			 ) );
		echo '</div>';
	}


//	Not Found Page
	function associationx_not_found() { ?>
        <div class="searchinfo box404">
        <h1 class="page-title fa-times-circle"><?php echo esc_html__('SORRY, NOT FOUND ANYTHING', 'associationx'); ?></h1>
		<h3 class="arc-src"><span><?php echo esc_html__('You Can Try Another Search...', 'associationx'); ?></span></h3>
		<?php get_search_form(); ?>
		<p class="backhome"><a href="<?php echo esc_url(home_url()); ?>" >&laquo; <?php echo esc_html__('Or Return to the Home Page', 'associationx'); ?></a></p>
        </div>
        <br />
    <?php }		

//	Page Navigation
	function associationx_singlepage_next_previous() { ?>
		<?php if ( is_single() ): ?>
			<div class="page-nav">
            	<div class="alignleft pagenavlink pagenavlinkleft"><?php next_post_link('%link', '<span class="pagenavicon fa-arrow-left"></span> <strong>%title</strong>&nbsp;' . esc_html__(':Newer', 'associationx')); ?></div>
            	<div class="alignright pagenavlink pagenavlinkright"><?php previous_post_link('%link', esc_html__('Older: ', 'associationx'). '&nbsp;<strong>%title</strong> <span class="pagenavicon fa-arrow-right"></span>'); ?></div>         
            	<div class="clear"> </div> 
            	<?php if ( is_attachment() ): ?>
            		<div class="alignleft pagenavlink pagenavlinkleft"><?php next_image_link( false, '<span class="pagenav fa-arrow-left"></span> ' . esc_html__('Newer', 'associationx') ); ?></div>
					<div class="alignright pagenavlink pagenavlinkright"><?php previous_image_link( false,  esc_html__('Older', 'associationx') . ' <span class="pagenav fa-arrow-right"></span>' ); ?></div> 
            	<?php endif; ?>
          	</div>
 		<?php endif;
  	}

//	Image Navigation
	function associationx_singleimage_next_previous() { ?>
		<?php if ( is_single() && is_attachment() ): ?>
			<div class="page-nextpre">           	
            	<div class="alignleft pagenavlink imgnavlink pagenavlinkleft"><?php next_image_link( false, '<span class="pagenav fa-arrow-left"></span>'); ?></div>
				<div class="alignright pagenavlink imgnavlink pagenavlinkright"><?php previous_image_link( false,  '<span class="pagenav fa-arrow-right"></span>' ); ?></div> 
          	</div>
 		<?php endif;
  	}

//	Author Bio
	function associationx_author_bio( $authorname='Author : ', $singpost=1, $singpage=0 ) { 	
 	if ( get_the_author_meta('description') != '' ): ?>
            <?php $authorbio = 
            '<div class="clear"></div>
            <div class="autbio">
             <div class="author-image">
			'. get_avatar( get_the_author_meta('user_email') , 110 ). '
            </div>
            <div class="author-description">
            <h3 class="author-name">'.$authorname.' ' . esc_attr(get_the_author()) .'</h3>
            
			' . wp_kses_post(get_the_author_meta('description')). '
            </div>
            </div>';  
			
	if ( is_single() && $singpost == 1 ): echo  $authorbio; endif; 
	if ( is_page() && $singpage == 1 ): echo  $authorbio; endif;          
	endif;  
	} 

//  Breadcrumbs
	function associationx_breadcrumbs() { associationx_breadcrumb_trail(); }
	add_action('associationx_starting_content', 'associationx_breadcrumbs');

//	Menu Description
function associationx_description_to_menu($item_output, $item, $depth, $args) {
    if (strlen($item->description) > 0 ) {
        $item_output .= sprintf('<div class="menu-description">%s</div>', esc_html($item->description));
    }
    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'associationx_description_to_menu', 10, 4);