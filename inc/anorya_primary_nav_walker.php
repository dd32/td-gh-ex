<?php


	// nav walker for primary menu, adds multilevel nested submenus
	class Anorya_Primary_Nav_Walker extends Walker_Nav_Menu {
	
		private $currentItem;
		
		function start_lvl( &$output, $depth = 0, $args = Array() ) {
			
			$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
			
			$output .= "\n" . $indent . '<ul class="dropdown-menu">' . "\n";
			
		}
		
		// add main/sub classes to li's and links
		function start_el( &$output, $item, $depth = 0, $args = Array(), $id = 0 ) {
			
			$currentItem = $item;
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
			
			if(isset($currentItem->classes)){
				if($depth > 0){ 
					if(in_array('menu-item-has-children',$currentItem->classes)){
						array_push($currentItem->classes,'dropdown');
					}	
					
					$output .= "\n" . $indent . "<li class='" .  implode(" ", $currentItem->classes) . "'>";
					$output .= '<a href="' . $currentItem->url . '">';
					$output .= $currentItem->title;
					$output .= '</a>';
					
				}
				else{
					
					$output .= "\n" . $indent . "<li class='" .  implode(" ", $currentItem->classes) . "'>";
					$output .= '<a href="' . $currentItem->url . '">';
					$output .= $currentItem->title;
					if(in_array('menu-item-has-children',$currentItem->classes)){
						$output .= ' <i class="fa fa-angle-down" ></i>';
					}
					$output .= '</a>';				
					
				}
			}	
		}	
	
	}	

?>