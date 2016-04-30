<?php
/**
 * @package   Options_Framework
 * @author    Devin Price <devin@wptheming.com>
 * @license   GPL-2.0+
 * @link      http://wptheming.com
 * @copyright 2010-2014 WP Theming
 */
 
 
				

class Options_Framework_Interface {

	/**
	 * Generates the tabs that are used in the options menu
	 */
	static function optionsframework_tabs() {
		$counter = 0;
		$options = & Options_Framework::_optionsframework_options();
		$menu = '';

		foreach ( $options as $value ) {
			// Heading for Navigation
			if ( $value['type'] == "heading" ) {
				$counter++;
				$class = '';
				$class = ! empty( $value['id'] ) ? $value['id'] : $value['name'];
				$class = preg_replace( '/[^a-zA-Z0-9._\-]/', '', strtolower($class) ) . '-tab';
				$menu .= '<a id="options-group-'.  $counter . '-tab" class="nav-tab ' . $class .'" title="' . esc_attr( $value['name'] ) . '" href="' . esc_attr( '#options-group-'.  $counter ) . '">' . esc_html( $value['name'] ) . '</a>';
			}
		}

		return $menu;
	}
	
	

	/**
	 * Generates the options fields that are used in the form.
	 */
	static function optionsframework_fields() {

		global $allowedtags;

		$options_framework = new Options_Framework;
		$option_name = $options_framework->get_option_name();
		$settings = get_option( $option_name );
		$options = & Options_Framework::_optionsframework_options();

		$counter = 0;
		$menu = '';

		foreach ( $options as $value ) {

			$val = '';
			$select_value = '';
			$output = '';

			// Wrap all options
			if ( ( $value['type'] != "heading" ) && ( $value['type'] != "info" ) ) {

				// Keep all ids lowercase with no spaces
				$value['id'] = preg_replace('/[^a-zA-Z0-9._\-]/', '', strtolower($value['id']) );

				$id = 'section-' . $value['id'];

				$class = 'section';
				if ( isset( $value['type'] ) ) {
					$class .= ' section-' . $value['type'];
				}
				if ( isset( $value['class'] ) ) {
					$class .= ' ' . $value['class'];
				}

				$output .= '<div id="' . esc_attr( $id ) .'" class="' . esc_attr( $class ) . '">'."\n";
				if ( isset( $value['name'] ) ) {
					$output .= '<h4 class="heading">' . esc_html( $value['name'] ) . '</h4>' . "\n";
				}
				if ( $value['type'] != 'editor' ) {
					$output .= '<div class="option">' . "\n" . '<div class="controls">' . "\n";
				}
				else {
					$output .= '<div class="option">' . "\n" . '<div>' . "\n";
				}
			}

			// Set default value to $val
			if ( isset( $value['std'] ) ) {
				$val = $value['std'];
			}

			// If the option is already saved, override $val
			if ( ( $value['type'] != 'heading' ) && ( $value['type'] != 'info') ) {
				if ( isset( $settings[($value['id'])]) ) {
					$val = $settings[($value['id'])];
					// Striping slashes of non-array options
					if ( !is_array($val) ) {
						$val = stripslashes( $val );
					}
				}
			}

			// If there is a description save it for labels
			$explain_value = '';
			if ( isset( $value['desc'] ) ) {
				$explain_value = $value['desc'];
			}

			// Set the placeholder if one exists
			$placeholder = '';
			if ( isset( $value['placeholder'] ) ) {
				$placeholder = ' placeholder="' . esc_attr( $value['placeholder'] ) . '"';
			}

			if ( has_filter( 'optionsframework_' . $value['type'] ) ) {
				$output .= apply_filters( 'optionsframework_' . $value['type'], $option_name, $value, $val );
			}


			switch ( $value['type'] ) {

			// Basic text input
			case 'text':
				$output .= '<input id="' . esc_attr( $value['id'] ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" type="text" value="' . esc_attr( $val ) . '"' . $placeholder . ' />';
				break;

			// Password input
			case 'password':
				$output .= '<input id="' . esc_attr( $value['id'] ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" type="password" value="' . esc_attr( $val ) . '" />';
				break;

			// Textarea
			case 'textarea':
				$rows = '8';

				if ( isset( $value['settings']['rows'] ) ) {
					$custom_rows = $value['settings']['rows'];
					if ( is_numeric( $custom_rows ) ) {
						$rows = $custom_rows;
					}
				}

				$val = stripslashes( $val );
				$output .= '<textarea id="' . esc_attr( $value['id'] ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" rows="' . $rows . '"' . $placeholder . '>' . esc_textarea( $val ) . '</textarea>';
				break;

			// Select Box
			case 'select':
				$output .= '<select class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" id="' . esc_attr( $value['id'] ) . '">';

				foreach ($value['options'] as $key => $option ) {
					$output .= '<option'. selected( $val, $key, false ) .' value="' . esc_attr( $key ) . '">' . esc_html( $option ) . '</option>';
				}
				$output .= '</select>';
				break;


			// Radio Box
			case "radio":
				$name = $option_name .'['. $value['id'] .']';
				foreach ($value['options'] as $key => $option) {
					$id = $option_name . '-' . $value['id'] .'-'. $key;
					$output .= '<input class="of-input of-radio" type="radio" name="' . esc_attr( $name ) . '" id="' . esc_attr( $id ) . '" value="'. esc_attr( $key ) . '" '. checked( $val, $key, false) .' /><label for="' . esc_attr( $id ) . '">' . esc_html( $option ) . '</label>';
				}
				break;

			// Image Selectors
			case "images":
				$name = $option_name .'['. $value['id'] .']';
				foreach ( $value['options'] as $key => $option ) {
					$selected = '';
					if ( $val != '' && ($val == $key) ) {
						$selected = ' of-radio-img-selected';
					}
					$output .= '<input type="radio" id="' . esc_attr( $value['id'] .'_'. $key) . '" class="of-radio-img-radio" value="' . esc_attr( $key ) . '" name="' . esc_attr( $name ) . '" '. checked( $val, $key, false ) .' />';
					$output .= '<div class="of-radio-img-label">' . esc_html( $key ) . '</div>';
					$output .= '<img src="' . esc_url( $option ) . '" alt="' . $option .'" class="of-radio-img-img' . $selected .'" onclick="document.getElementById(\''. esc_attr($value['id'] .'_'. $key) .'\').checked=true;" />';
				}
				break;

			// Checkbox
			case "checkbox":
				$output .= '<input id="' . esc_attr( $value['id'] ) . '" class="checkbox of-input" type="checkbox" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" '. checked( $val, 1, false) .' />';
				$output .= '<label class="explain" for="' . esc_attr( $value['id'] ) . '">' . wp_kses( $explain_value, $allowedtags) . '</label>';
				break;
				
				
				// Switch
			case "switch":
			
				$sclass = 'swit'. esc_attr( $value['id'] );
				$capop = '';
				if (isset($value['capt'])): $capop = $value['capt']; endif;
				if (!empty($capop)): $dcapop = $capop[0]; $ecapop = $capop[1]; echo '<style>.'.$sclass.' .onoffswitch-inner:before { content: "'.$ecapop.'"; } .' .$sclass. ' .onoffswitch-inner:after { content: "'.$dcapop.'"; }</style>'; endif;
				$output .= '<div class="onoffswitch '.$sclass.'">';
				$output .= '<input id="' . esc_attr( $value['id'] ) . '" class="switch onoffswitch-checkbox of-input-switch" type="checkbox" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" '. checked( $val, 1, false) .' />';
				$output .= '<label class="onoffswitch-label" for="myonoffswitch">';
        		$output .= '<span class="onoffswitch-inner"></span>';
        		$output .= '<span class="onoffswitch-switch"></span>';
    			$output .= '</label>';
				$output .= '</div>';
				$output .= '<label class="explainswitch" for="' . esc_attr( $value['id'] ) . '"> </label>';
				
				break;
				

			// Multicheck
			case "multicheck":
				foreach ($value['options'] as $key => $option) {
					$checked = '';
					$label = $option;
					$option = preg_replace('/[^a-zA-Z0-9._\-]/', '', strtolower($key));

					$id = $option_name . '-' . $value['id'] . '-'. $option;
					$name = $option_name . '[' . $value['id'] . '][' . $option .']';

					if ( isset($val[$option]) ) {
						$checked = checked($val[$option], 1, false);
					}

					$output .= '<input id="' . esc_attr( $id ) . '" class="checkbox of-input" type="checkbox" name="' . esc_attr( $name ) . '" ' . $checked . ' /><label for="' . esc_attr( $id ) . '">' . esc_html( $label ) . '</label>';
				}
				break;

			// Color picker
			case "color":
				$default_color = '';
				if ( isset($value['std']) ) {
					if ( $val !=  $value['std'] )
						$default_color = ' data-default-color="' .$value['std'] . '" ';
				}
				$output .= '<input name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" id="' . esc_attr( $value['id'] ) . '" class="of-color"  type="text" value="' . esc_attr( $val ) . '"' . $default_color .' />';

				break;

			// Uploader
			case "upload":
				$output .= Options_Framework_Media_Uploader::optionsframework_uploader( $value['id'], $val, null );

				break;

			// Typography
			case 'typography':
				$fvid = $value['id'];
				unset( $font_size, $font_style, $font_weight, $font_align, $font_face,  $font_cface, $font_color );

				$typography_defaults = array(
					'size' => '',
					'face' => '',
					'style' => '',
					'weight' => '',
					'align' => '',
					'cface' => '',
					'color' => ''
				);

				$typography_stored = wp_parse_args( $val, $typography_defaults );

				$typography_options = array(
					'sizes' => of_recognized_font_sizes(),
					'faces' => of_recognized_font_faces(),
					'styles' => of_recognized_font_styles(),
					'weights' => of_recognized_font_weights(),
					'aligns' => of_recognized_font_aligns(),
					'cface' => true,
					'color' => true,
				);

				if ( isset( $value['options'] ) ) {
					$typography_options = wp_parse_args( $value['options'], $typography_options );
				}

				// Font Size
				if ( $typography_options['sizes'] ) {
					$font_size = '<select class="of-typography of-typography-size" name="' . esc_attr( $option_name . '[' . $value['id'] . '][size]' ) . '" id="' . esc_attr( $value['id'] . '_size' ) . '">';
					$sizes = $typography_options['sizes'];
					foreach ( $sizes as $i ) {
						$size = $i . 'px';
						$font_size .= '<option value="' . esc_attr( $size ) . '" ' . selected( $typography_stored['size'], $size, false ) . '>' . esc_html( $size ) . '</option>';
					}
					$font_size .= '</select>';
				}

				// Font Face
				if ( $typography_options['faces'] ) {
					$font_face = '<select class="of-typography of-typography-face" name="' . esc_attr( $option_name . '[' . $value['id'] . '][face]' ) . '" id="' . esc_attr( $value['id'] . '_face' ) . '">';
					$faces = $typography_options['faces'];
					foreach ( $faces as $key => $face ) {
						$font_face .= '<option value="' . esc_attr( $key ) . '" ' . selected( $typography_stored['face'], $key, false ) . '>' . esc_html( $face ) . '</option>';
					}
					$font_face .= '</select>';
				}

				// Font Styles
				if ( $typography_options['styles'] ) {
					$font_style = '<select class="of-typography of-typography-style" name="'.$option_name.'['.$value['id'].'][style]" id="'. $value['id'].'_style">';
					$styles = $typography_options['styles'];
					foreach ( $styles as $key => $style ) {
						$font_style .= '<option value="' . esc_attr( $key ) . '" ' . selected( $typography_stored['style'], $key, false ) . '>'. $style .'</option>';
					}
					$font_style .= '</select>';
				}
				
				// Font Weight
				if ( $typography_options['weights'] ) {
					$font_weight = '<select class="of-typography of-typography-weight" name="'.$option_name.'['.$value['id'].'][weight]" id="'. $value['id'].'_weight">';
					$weights = $typography_options['weights'];
					foreach ( $weights as $key => $weight ) {
						$font_weight .= '<option value="' . esc_attr( $key ) . '" ' . selected( $typography_stored['weight'], $key, false ) . '>'. $weight .'</option>';
					}
					$font_weight .= '</select>';
				}
				
				// Font Align
				if ( $typography_options['aligns'] ) {
					$font_align = '<select class="of-typography of-typography-align" name="'.$option_name.'['.$value['id'].'][align]" id="'. $value['id'].'_align">';
					$aligns = $typography_options['aligns'];
					foreach ( $aligns as $key => $align ) {
						$font_align .= '<option value="' . esc_attr( $key ) . '" ' . selected( $typography_stored['align'], $key, false ) . '>'. $align .'</option>';
					}
					$font_align .= '</select>';
				}

				// Font Color
				if ( $typography_options['color'] ) {
					$default_color = '';
					if ( isset($value['std']['color']) ) {
						if ( $val !=  $value['std']['color'] )
							$default_color = ' data-default-color="' .$value['std']['color'] . '" ';
					}
					$font_color = '<input name="' . esc_attr( $option_name . '[' . $value['id'] . '][color]' ) . '" id="' . esc_attr( $value['id'] . '_color' ) . '" class="of-color of-typography-color"  type="text" value="' . esc_attr( $typography_stored['color'] ) . '"' . $default_color .' />';
				}
				
				// Font CFace
				if ( $typography_options['cface'] ) {
					$default_cface = '';
					if ( isset($value['std']['cface']) ) {
						if ( $val !=  $value['std']['cface'] )
							$default_cface = ' data-default-cface="' .$value['std']['cface'] . '" ';
					}
					$font_cface = '<input name="' . esc_attr( $option_name . '[' . $value['id'] . '][cface]' ) . '" id="' . esc_attr( $value['id'] . '_cface' ) . '" class="of-cface of-typography-cface"  type="text"  value="' . esc_attr( $typography_stored['cface'] ) . '"' . $default_cface .' placeholder="Custom Font Family" />';
				}
				

				// Allow modification/injection of typography fields
				$typography_fields = compact( 'font_size', 'font_face', 'font_style', 'font_weight', 'font_align', 'font_color', 'font_cface'  );
				$typography_fields = apply_filters( 'of_typography_fields', $typography_fields, $typography_stored, $option_name, $value );
				$output .= implode( '', $typography_fields );
				$output .= '<div class="typoshow">Aa Bb Cc Dd Ee Ff Gg Hh Ii Jj Kk Ll Mm Nn Oo Pp Qq Rr Ss Tt Uu Vv Ww Xx Yy Zz 0 1 2 3 4 5 6 7 8 9 World Class, Responsive and Premium WordPress Themes by D5 CREATION</div>';
				?>
                
                <script type="text/javascript">
                jQuery(document).ready(function(){
					jQuery("<?php echo '#section-'. $fvid .' '; ?> .of-typography-face").change(function(){ jQuery("<?php echo '#section-'. $fvid .' '; ?> .typoshow").css("font-family", jQuery(this).val()); }).change();
					jQuery("<?php echo '#section-'. $fvid .' '; ?> .of-typography-size").change(function(){ jQuery("<?php echo '#section-'. $fvid .' '; ?> .typoshow").css("font-size", jQuery(this).val()); }).change();
					jQuery("<?php echo '#section-'. $fvid .' '; ?> .of-typography-style").change(function(){ jQuery("<?php echo '#section-'. $fvid .' '; ?> .typoshow").css("font-style", jQuery(this).val()); }).change();
					jQuery("<?php echo '#section-'. $fvid .' '; ?> .of-typography-weight").change(function(){ jQuery("<?php echo '#section-'. $fvid .' '; ?> .typoshow").css("font-weight", jQuery(this).val()); }).change();
					jQuery("<?php echo '#section-'. $fvid .' '; ?> .of-typography-align").change(function(){ jQuery("<?php echo '#section-'. $fvid .' '; ?> .typoshow").css("text-align", jQuery(this).val()); }).change();
					jQuery("<?php echo '#section-'. $fvid .' '; ?> .wp-color-picker").wpColorPicker( 'option', 'change', function(event, ui) { jQuery("<?php echo '#section-'. $fvid .' '; ?> .typoshow").css("color", jQuery(this).val()); } );
					jQuery("<?php echo '#section-'. $fvid .' '; ?>  .of-typography-cface").blur(function(){ jQuery("<?php echo '#section-'. $fvid .' '; ?> .typoshow").css("font-family", jQuery(this).val()); });
				});
				</script>	
				
				
				<?php

				break;

			// Background
			case 'background':

				$background = $val;

				// Background Color
				$default_color = '';
				if ( isset( $value['std']['color'] ) ) {
					if ( $val !=  $value['std']['color'] )
						$default_color = ' data-default-color="' .$value['std']['color'] . '" ';
				}
				$output .= '<input name="' . esc_attr( $option_name . '[' . $value['id'] . '][color]' ) . '" id="' . esc_attr( $value['id'] . '_color' ) . '" class="of-color of-background-color"  type="text" value="' . esc_attr( $background['color'] ) . '"' . $default_color .' />';

				// Background Image
				if ( !isset($background['image']) ) {
					$background['image'] = '';
				}

				$output .= Options_Framework_Media_Uploader::optionsframework_uploader( $value['id'], $background['image'], null, esc_attr( $option_name . '[' . $value['id'] . '][image]' ) );

				$class = 'of-background-properties';
				if ( '' == $background['image'] ) {
					$class .= ' hide';
				}
				$output .= '<div class="' . esc_attr( $class ) . '">';

				// Background Repeat
				$output .= '<select class="of-background of-background-repeat" name="' . esc_attr( $option_name . '[' . $value['id'] . '][repeat]'  ) . '" id="' . esc_attr( $value['id'] . '_repeat' ) . '">';
				$repeats = of_recognized_background_repeat();

				foreach ($repeats as $key => $repeat) {
					$output .= '<option value="' . esc_attr( $key ) . '" ' . selected( $background['repeat'], $key, false ) . '>'. esc_html( $repeat ) . '</option>';
				}
				$output .= '</select>';

				// Background Position
				$output .= '<select class="of-background of-background-position" name="' . esc_attr( $option_name . '[' . $value['id'] . '][position]' ) . '" id="' . esc_attr( $value['id'] . '_position' ) . '">';
				$positions = of_recognized_background_position();

				foreach ($positions as $key=>$position) {
					$output .= '<option value="' . esc_attr( $key ) . '" ' . selected( $background['position'], $key, false ) . '>'. esc_html( $position ) . '</option>';
				}
				$output .= '</select>';

				// Background Attachment
				$output .= '<select class="of-background of-background-attachment" name="' . esc_attr( $option_name . '[' . $value['id'] . '][attachment]' ) . '" id="' . esc_attr( $value['id'] . '_attachment' ) . '">';
				$attachments = of_recognized_background_attachment();

				foreach ($attachments as $key => $attachment) {
					$output .= '<option value="' . esc_attr( $key ) . '" ' . selected( $background['attachment'], $key, false ) . '>' . esc_html( $attachment ) . '</option>';
				}
				$output .= '</select>';
				$output .= '</div>';

				break;

			// Editor
			case 'editor':
				$output .= '<div class="explain">' . wp_kses( $explain_value, $allowedtags ) . '</div>'."\n";
				echo $output;
				$textarea_name = esc_attr( $option_name . '[' . $value['id'] . ']' );
				$default_editor_settings = array(
					'textarea_name' => $textarea_name,
					'media_buttons' => false,
					'tinymce' => array( 'plugins' => 'wordpress,wplink' )
				);
				$editor_settings = array();
				if ( isset( $value['settings'] ) ) {
					$editor_settings = $value['settings'];
				}
				$editor_settings = array_merge( $default_editor_settings, $editor_settings );
				wp_editor( $val, $value['id'], $editor_settings );
				$output = '';
				break;
				
	// D5 Extra
				//Drag & Drop Block Manager
				case 'sorter':
				$itemid = $value['id'];
				$itemdef = $value['std'];
				$itemsv = of_get_option( $itemid, $itemdef );
				$bodylayout = $itemsv;
				if ( is_array( $itemsv )  && is_array( $itemdef ) ):
					if($itemsv === array_intersect($itemsv, $itemdef) && $itemdef === array_intersect($itemdef, $itemsv)): 
						$bodylayout = $itemsv; 
						else: $itemall = array_merge($itemsv,$itemdef); $bodylayout = array_intersect($itemall,$itemdef); $output .= '<div class="ofnote">Note: Items Added/Deducted, Please Update Your Settings Again!</div>';
					endif;
				endif;				
				if ( isset($bodylayout) && is_array( $bodylayout )):
				$val ='';
				$blayout= $bodylayout; 
				$output .= '<div id="'.$itemid.'sorter">';
				$output .= '<ol class="shorterobject">';
				foreach ( $blayout as $xkey => $xvalue ) {
					$aval = $xkey.':'.$xvalue.'|';
					$output .= '<li role="'.$aval.'" class="sorterli">' . $xvalue . '</li>';
					$val .= $aval;
				}
				$output .= '</ol>';
				$output .= '</div>';
				?>
				<script type="text/javascript">
				jQuery(document).ready(function() {
					// jQuery( ".shorterobject" ).sortable();
    				// jQuery( ".shorterobject" ).disableSelection();
    				jQuery("<?php echo '#'.$itemid.'sorter '; ?> .shorterobject").sortable({    
						stop : function(event, ui){
							jQuery("<?php echo '#'.$itemid; ?>").val('');	
							jQuery("<?php echo '#'.$itemid.'sorter '; ?> .shorterobject li").each(function(){ jQuery("<?php echo '#'.$itemid; ?>").val(jQuery("<?php echo '#'.$itemid; ?>").val() + jQuery(this).attr("role") ); });
						}
					});
				});
				</script>
                <?php
								
				else:
				$output .= 'Not Proper Default Data. Default Data should be an Array !';
				endif;
				$output .= '<input id="' . esc_attr( $itemid ) . '" class="'.$itemid.'-sort of-sorter" name="' . esc_attr( $option_name . '[' . $itemid . ']' ) . '" type="text" value="' . esc_attr( $val ) . '"' . $placeholder . ' />';
				$output .= '';
				break;
	// D5 Extra End
				

			// Info
			case "info":
				$id = '';
				$class = 'section';
				if ( isset( $value['id'] ) ) {
					$id = 'id="' . esc_attr( $value['id'] ) . '" ';
				}
				if ( isset( $value['type'] ) ) {
					$class .= ' section-' . $value['type'];
				}
				if ( isset( $value['class'] ) ) {
					$class .= ' ' . $value['class'];
				}

				$output .= '<div ' . $id . 'class="' . esc_attr( $class ) . '">' . "\n";
				if ( isset($value['name']) ) {
					$output .= '<h4 class="heading">' . esc_html( $value['name'] ) . '</h4>' . "\n";
				}
				if ( isset( $value['desc'] ) ) {
					$output .= $value['desc'] . "\n";
				}
				$output .= '</div>' . "\n";
				break;

			// Heading for Navigation
			case "heading":
				$counter++;
				if ( $counter >= 2 ) {
					$output .= '</div>'."\n";
				}
				$class = '';
				$class = ! empty( $value['id'] ) ? $value['id'] : $value['name'];
				$class = preg_replace('/[^a-zA-Z0-9._\-]/', '', strtolower($class) );
				$output .= '<div id="options-group-' . $counter . '" class="group ' . $class . '">';
				$output .= '<h3>' . esc_html( $value['name'] ) . '</h3>' . "\n";
				break;
				
			}

			if ( ( $value['type'] != "heading" ) && ( $value['type'] != "info" ) ) {
				$output .= '</div>';
				if ( ( $value['type'] != "checkbox" ) && ( $value['type'] != "editor" ) ) {
					$output .= '<div class="explain">' . wp_kses( $explain_value, $allowedtags) . '</div>'."\n";
				}
				$output .= '</div></div>'."\n";
			}

			echo $output;
		}

		// Outputs closing div if there tabs
		if ( Options_Framework_Interface::optionsframework_tabs() != '' ) {
			echo '</div>';
		}
	}

}

				