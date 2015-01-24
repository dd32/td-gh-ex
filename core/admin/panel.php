<?php

/**
 * Wp in Progress
 * 
 * @package Wordpress
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

	function diarjolite_panel( $panel ) { 

	global $wp_version;

	diarjolite_save_option ( $panel );
	
	if (!isset($_GET['tab']))  { $_GET['tab'] = "General"; }

	if ( ( $wp_version >= 3.8 ) && ( is_admin()) ) { $diarjoliteclasses = 'class="wp-8"'; } else { $diarjoliteclasses = "";}

	foreach ($panel as $element) {

		switch ( $element['type'] ) { 
		
			case 'navigation': ?>

                <div class="banner">

                    <h2> <?php echo diarjolite_theme_data('Name') . " " . diarjolite_theme_data('Version');  ?> </h2>
    
                    <h1> <?php _e( 'To Activate All Features, Please Upgrade to Premium version!','diarjolite'); ?> </h1>
                    
                    <div class="big-button"> 
                    
                        <a href="<?php echo esc_url('https://www.themeinprogress.com/diarjo-free-creative-minimal-wordpress-theme/?ref=panel'); ?>" target="_blank">
                            <?php _e( 'GET PREMIUM VERSION','diarjolite'); ?>
                        </a>
                    
                    </div>
                
                </div>
                
				<div class="header">
                    
                    <h2 class="maintitle settings"> <?php _e( 'General Settings',"diarjolite"); ?> </h2> 
                    
                    <div class="right"> <h2 class="maintitle"> <?php echo diarjolite_theme_data('Name') . " " . diarjolite_theme_data('Version');  ?> </h2> </div>
                    
                    <div class="clear"></div>
                
                </div>
                
				<?php diarjolite_message($panel); ?>
                
                <div id="tabs" <?php echo $diarjoliteclasses; ?>>

                <ul>
    
					<?php 
                    
                        foreach ($element['item'] as $option => $name ) {
                            
                            if (str_replace(" ", "", $option) == $_GET['tab'] ) $class = "class='ui-state-active'"; else $class = ""; 
                                
                                echo "<li ".$class."><a href='themes.php?page=diarjolite_option&tab=".str_replace(" ", "", $option)."'>".$name."</a></li>";
                            
                        }
                    
                    ?>
              
                </ul>
               
                <?php	
			
			break;
			
			case 'endpanel':  ?>
				
				</div>
                
                <div style="margin:10px 0; font-size:11px">Icons by: <a href="<?php echo esc_url('http://www.woothemes.com/2009/09/woofunction/'); ?>" target="_blank">WooFunction</a> </div>
			
			<?php break;
			
		}

	if (isset($element['tab'])) : 
	
	switch ( $element['tab'] ) { 

		case $_GET['tab']:  

			foreach ($element as $value) {
			
				if (isset($value['type'])) :
				
					switch ( $value['type'] ) { 
					
						case 'form':  ?>
							
							<div id="<?php echo str_replace(" ", "", $value['name']); ?>">
							<form method="post" action="?page=diarjolite_option&tab=<?php echo $_GET['tab']; ?>">
						
						<?php break;
						
						case 'endtab':  ?>
							
							</form>
							</div>
						
						<?php break;
							
						case 'start':  ?>
	
						<?php 
			
							if ( ('Save' == diarjolite_request('action'))  && ( $value['val'] == diarjolite_request('element-opened')) ) { 
								$class=" inactive"; $style='style="display:block;"'; } else { $class="";  $style=''; 
							}  
				
							?>
	
							<div class="wip_container">
			
							<h5 class="element<?php echo $class; ?>" id="<?php echo $value['val']; ?>"><?php echo $value['name']; ?></h5>
				   
							<div class="wip_mainbox"> 
			
						<?php break;
				
						case 'startopen':  ?>
				
							<div class="wip_container">
			
							<h5 class="element-open"><?php echo $value['name']; ?></h5>
				   
							<div class="wip_mainbox2"> 
			
						<?php break;
				
						case 'end':  ?>
				
							</div>            
			
							</div>
			   
							<?php break;
							
							case 'text': ?>
			
								<div class="wip_inputbox">
			
								<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
								
								<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( diarjolite_setting($value['id']) != "") { echo stripslashes(diarjolite_setting($value['id'])); } else { echo $value['std']; } ?>" />
								
								<p> <?php echo $value['desc']; ?> </p>
			
								</div>
			
							<?php break;

							case 'url': ?>
			
								<div class="wip_inputbox">
			
								<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
								
								<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( diarjolite_setting($value['id']) != "") { echo stripslashes(diarjolite_setting($value['id'])); } else { echo $value['std']; } ?>" />
								
								<p> <?php echo $value['desc']; ?> </p>
			
								</div>
			
							<?php break;

							case 'form':  ?>
				
							<?php break;
				
							case 'navigation':  ?>
				
								<?php echo $value['start']; ?>
			
								<?php foreach ($value['item'] as $option) { echo "<li><a href='#".str_replace(" ", "", $option)."'>".$option."</a></li>"; } ?>
			
								<?php echo $value['end']; ?>
			   
							<?php break;
			 
							case 'textarea':  ?>
				
								<div class="wip_inputbox">
			
								<label for="bl_custom_style"> <?php echo $value['name']; ?> </label>
								
								<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( diarjolite_setting($value['id']) != "") { echo stripslashes(diarjolite_setting($value['id'])); } else { echo $value['std']; } ?></textarea>
			
								<p><?php echo $value['desc']; ?></p>
			
								</div> 
				
							<?php break;

							case "on-off": ?>
			
								<div class="wip_inputbox">
			
								<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			
								<div class="bool-slider <?php if ( diarjolite_setting($value['id']) != "") { echo stripslashes(diarjolite_setting($value['id'])); } else { echo $value['std']; } ?>">
									<div class="inset">
										<div class="control"></div>
									</div>
									<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="on-off" type="hidden" value="<?php if ( diarjolite_setting($value['id']) != "") { echo stripslashes(diarjolite_setting($value['id'])); } else { echo $value['std']; } ?>" />
								</div>  
								
								<div class="clear"></div>      
								
								<p><?php echo $value['desc']; ?></p>
								
								</div>
			
							<?php break;

							case 'select': ?>
				
								<div class="wip_inputbox">
			
								<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			
								<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">  
								
								<?php foreach ( $value['options'] as $val => $option ) { ?>  
								
								<option <?php if (( diarjolite_setting( $value['id'] ) == $val) || ( ( !diarjolite_setting($value['id'])) && ( $value['std'] == $val) )) { echo 'selected="selected"'; } ?> value="<?php echo $val; ?>"><?php echo $option; ?></option><?php } ?>  
								</select>  
			 
								<p><?php echo $value['desc']; ?></p>
			
								</div>
				
							<?php break;
							
							case "save-button": ?>
			
								<div class="wip_inputbox">
			
								<input name="action" id="element-open" type="submit" value="<?php echo $value['value']; ?>" class="button"/>
			
								</div>

							<?php break;

					}
					
				endif;
			}
		}	
		
		endif;	

	}
	
} 

?>