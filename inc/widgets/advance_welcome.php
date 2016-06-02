<?php

/**************************/
/******Call out with 2 buttons */
/************************/



class advance_welcome_widgets extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
			'ctUp-ads-welcomewidgets',
			__( 'Advance -Welcome Widget ', 'advance' )
		);
	}

    function widget($args, $instance) {

        extract($args);
			$content_bg = isset( $instance['content_bg'] ) ? $instance['content_bg'] : 'rgb(255, 255, 255)';
			$button_textcolor = isset( $instance['button_textcolor'] ) ? $instance['button_textcolor'] : '';
			$padtopbottom = isset( $instance['padtopbottom'] ) ? $instance['padtopbottom'] : '';
			

        echo $before_widget;

        ?>
       
    <?php

if (!empty($instance['link_name']) ||!empty($instance['text']) || !empty($instance['text']) || !empty($instance['url'])): ?>


<div id="welcome-widgets" style="<?php if (!empty($instance['content_bg'])): ?> background-color:<?php echo esc_attr($instance['content_bg']); ?> ;<?php endif; ?>  <?php if (!empty($padtopbottom)): ?>padding-top:<?php echo $padtopbottom ;?>%; padding-bottom:<?php echo $padtopbottom ;?>%;  <?php endif; ?>">
 <div class="row">
 <div class="vertical">
 <?php
	if (!empty($instance['text'])): ?>
 <div class="actionbox-text-two">
<?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text'])); ?> 
 </div>
 <?php endif; ?>
 <?php if (!empty($instance['url']) || !empty($instance['url2']) ): ?>
 <div class="actionbox-controls-two">
<?php if (!empty($instance['url'])): ?>
 <a href="<?php echo esc_url($instance['url']); ?>" class="hero_btn" style="color:<?php echo $button_textcolor ;?>; border-color:<?php echo $button_textcolor ;?>; "><?php echo apply_filters('widget_title', $instance['link_name']); ?></a>
 <?php endif; ?>
 <?php if (!empty($instance['url2'])): ?>
 <a href="<?php echo esc_url($instance['url2']); ?>" class="hero_btn" style="color:<?php echo $button_textcolor ;?>; border-color:<?php echo $button_textcolor ;?>;"><?php echo apply_filters('widget_title', $instance['link_name2']); ?></a>
 <?php endif; ?>
 </div>
 <?php endif; ?>
 </div>
 </div>
 </div>

 <?php
	endif; ?>

		
<?php
        echo $after_widget;
		

    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
       
				
		/*Content */
        
        $instance['link_name'] = strip_tags($new_instance['link_name']);
		$instance['text'] = stripslashes(wp_filter_post_kses($new_instance['text']));
		$instance['url'] = strip_tags( $new_instance['url'] );
		$instance['link_name2'] = strip_tags($new_instance['link_name2']);
		$instance['url2'] = strip_tags( $new_instance['url2'] );
		
		/* Color */
		$instance['content_bg'] = strip_tags($new_instance['content_bg']);
	   $instance['button_textcolor'] = strip_tags($new_instance['button_textcolor']);
	   $instance['padtopbottom'] = strip_tags($new_instance['padtopbottom']);
	   
	  
        return $instance;

    }

    function form($instance) {
		
		
		/* Set up some default widget settings. */
		$defaults = array(
		'text'=>'Welcome to WordPress. This is your first post. Edit or delete it, then start writing! ',
		'link_name' => 'BUY THIS THEME',
	    'url'=>'#',
		'link_name2' => 'BUY THIS THEME',
	    'url2'=>'#',
		'content_bg' => '#666',
	    'button_textcolor'=>'#fcfcfc',
		'padtopbottom' =>'2',
		
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		
        

 <p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text', 'advance'); ?></label><br/>
           
      <input class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" value="<?php echo esc_attr($instance['text']); ?>" type="hidden" />
			<a href="javascript:WPEditorWidget.showEditor('<?php echo $this->get_field_id( 'text' ); ?>');" class="button"><?php _e( 'Edit content', 'advance' ) ?></a>
		</p>
        
            
             <p>
            <label for="<?php echo $this->get_field_id('link_name'); ?>"><?php _e('Link Title', 'advance'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('link_name'); ?>" id="<?php echo $this->get_field_id('link_name'); ?>" value="<?php if( !empty($instance['link_name']) ): echo $instance['link_name']; endif; ?>" class="widefat">
        </p>
        
        <p>
        
			<label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('Link ','advance'); ?></label><br />
			<input type="text" name="<?php echo $this->get_field_name('url'); ?>" id="<?php echo $this->get_field_id('url'); ?>" value="<?php if( !empty($instance['url']) ): echo esc_url($instance['url']); endif; ?>" class="widefat">
		</p>
        
        
        <p>
            <label for="<?php echo $this->get_field_id('link_name2'); ?>"><?php _e('Link Title 2', 'advance'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('link_name2'); ?>" id="<?php echo $this->get_field_id('link_name2'); ?>" value="<?php if( !empty($instance['link_name2']) ): echo $instance['link_name2']; endif; ?>" class="widefat">
        </p>
        
        <p>
        
			<label for="<?php echo $this->get_field_id('url2'); ?>"><?php _e('Link 2 ','advance'); ?></label><br />
			<input type="text" name="<?php echo $this->get_field_name('url2'); ?>" id="<?php echo $this->get_field_id('url2'); ?>" value="<?php if( !empty($instance['url2']) ): echo esc_url($instance['url2']); endif; ?>" class="widefat">
		</p>
        
        
         <!-- Text Content Background Color Field -->
<p>
			<label for="<?php echo $this->get_field_id( 'content_bg' ); ?>"><?php _e('Background Color', 'advance') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'content_bg' ); ?>" name="<?php echo $this->get_field_name( 'content_bg' ); ?>" value="<?php echo $instance['content_bg']; ?>" type="text" />
		</p>
         
         <p>
			<label for="<?php echo $this->get_field_id( 'button_textcolor' ); ?>"><?php _e('button text and border color', 'advance') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'button_textcolor' ); ?>" name="<?php echo $this->get_field_name( 'button_textcolor' ); ?>" value="<?php echo $instance['button_textcolor']; ?>" type="text" />
		</p>
        
       
        
        <!-- Text Content Padding top/bottom Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'padtopbottom' ); ?>"><?php _e('Top &amp; Bottom Padding', 'advance') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'padtopbottom' ); ?>" name="<?php echo $this->get_field_name( 'padtopbottom' ); ?>" value="<?php echo $instance['padtopbottom']; ?>"  min="0" max="80" type="range" />
		</p>
        
        <!-- Text Content size Field -->
		
        
 <?php
	}
		//ENQUEUE CSS
   }   
		
			

			
			
	
			
			
		
	



