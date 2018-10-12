<?php

	// nav walker for navigation widget, adds multilevel nested submenus
	class Anorya_Widget_Nav_Walker extends Walker_Nav_Menu {
	
		private $currentItem;
		
		function start_lvl( &$output, $depth = 0, $args = Array() ) {
			
			$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
			
			if(isset($this->currentItem)){
				if(in_array('menu-item-has-children',$this->currentItem->classes)){
					$output .= "\n" . $indent . '<ul id="collapse-submenu-item-'.$this->currentItem->ID.'" class="dropdown-menu collapse">' . "\n";
				}
				else{
					$output .= "\n" . $indent . '<ul class="dropdown-menu">' . "\n";
				}	
			}	
			else{
				$output .= "\n" . $indent . '<ul class="dropdown-menu">' . "\n";
			}
		}
		
		// add main/sub classes to li's and links
		function start_el( &$output, $item, $depth = 0, $args = Array(), $id = 0 ) {
			
			$this->currentItem = $item;
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
			
			if(isset($item->classes)){
				if($depth > 0){ 
					if(in_array('menu-item-has-children',$item->classes)){
						
						array_push($item->classes,'dropdown');
						
						$output .= "\n" . $indent . "<li class='" .  implode(" ", $item->classes) . "'>";
						$output .= '<a itemprop="url" href="' . $item->url . '">';
						$output .= $item->title;
						$output .= '</a>';
						$output .= '<span class="submenu" data-toggle="collapse" data-target="#collapse-submenu-item-'.$item->ID.'" ><i class="fa fa-angle-down" aria-hidden="true"></i></span>';
					}
					else{
						$output .= "\n" . $indent . "<li class='" .  implode(" ", $item->classes) . "'>";
						$output .= '<a itemprop="url" href="' . $item->url . '">';
						$output .= $item->title;
						$output .= '</a>';
					}
				}
				else{
					$output .= "\n" . $indent . "<li class='" .  implode(" ", $item->classes) . "'>";
					$output .= '<a itemprop="url" href="' . $item->url . '">';
					$output .= $item->title;
					$output .= '</a>';
					if(in_array('menu-item-has-children',$item->classes)){
						$output .= '<span class="submenu" data-toggle="collapse" data-target="#collapse-submenu-item-'.$item->ID.'" ><i class="fa fa-angle-down" aria-hidden="true"></i></span>';
					}
				}
			}	
		}	
	
	}	

?>