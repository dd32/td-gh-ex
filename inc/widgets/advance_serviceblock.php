<?php

/**************************/
/******service block widget */
/************************/



class advance_serviceblock extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
			'ctUp-ads-servicewidget',
			__( 'advance - Service Block', 'advance' )
		);
	}

    function widget($args, $instance) {

        extract($args);
			$content_bg = isset( $instance['content_bg'] ) ? $instance['content_bg'] : 'rgb(255, 255, 255)';
			$content_titlecolor =isset( $instance['content_titlecolor'] ) ? $instance['content_titlecolor'] : '';
			$content_textcolor=isset( $instance['content_textcolor'] ) ? $instance['content_textcolor'] : '';
			$content_iconcolor=isset( $instance['content_iconcolor'] ) ? $instance['content_iconcolor'] : '';
			$padtop=isset( $instance['padtop'] ) ? $instance['padtop'] : '';
			$padbottom=isset( $instance['padbottom'] ) ? $instance['padbottom'] : '';

        echo $before_widget;

        ?>


  

<style type="text/css">

.style2-service h4 {color:<?php echo $content_titlecolor ;?> !important;} 
.style2-service .style2-content p {color:<?php echo $content_textcolor; ?> !important;}
.style2-service .style2-content i {color:<?php echo $content_iconcolor ; ?> !important; }
 
</style>
		


<div class=" style2-service"  style=" <?php if (!empty($instance['content_bg'])): ?> background-color:<?php echo esc_attr($instance['content_bg']); ?> ;<?php endif; ?> <?php if (!empty($instance['padtop']) || !empty($instance['padbottom']) ): ?> padding-bottom: <?php echo esc_attr($instance['padbottom']); ?>%;  padding-top:<?php echo esc_attr($instance['padtop']); ?>%; <?php endif; ?>"  >
<div class=" row">
<?php if (!empty($instance['title']) || !empty($instance['sub_title'])): ?>
 <div class="section-header wow fadeIn animated animated">
 
 <?php if (!empty($instance['title'])): ?>
                            <h2 class="section-title wow fadeIn"  >
							
		<?php echo apply_filters('widget_title', $instance['title']); ?>
  </h2>
	<?php endif; ?>
                            <?php if (!empty($instance['sub_title'])): ?>
                            <div class="colored-line"></div>
		
						<div class="section-description"><h4><?php echo  htmlspecialchars_decode(apply_filters('widget_title', $instance['sub_title'])); ?></h4></div>
                        <div class="colored-line"></div>
                             <?php endif;?>
       				 </div><!--section head end-->
                       
                        <?php endif; ?>

 <?php

if (!empty($instance['icon1']) || !empty($instance['title1']) || !empty($instance['text1']) || !empty($instance['image_uri1'])): ?>

 <!--BLOCK 1 START-->
 <a <?php if (!empty($instance['box_uri1'])): ?> href="<?php echo esc_url($instance['box_uri1']); ?> " <?php endif; ?> >
 

<div class="medium-4 columns ">
<div class=" style2-content btn-lines matchhe">
<!--hover effct-->
<span class="line-top"></span>
<span class="line-bottom"></span>
<span class="line-left"></span>
<span class="line-right"></span>

   <?php
	if (!empty($instance['icon1']) || !empty($instance['image_uri1'])): ?>
      <?php
		if (!empty($instance['icon1'])): ?>
         <i class="fa <?php
			echo esc_attr($instance['icon1']); ?> fa-4x "  ></i>
           <?php
		endif; ?>
             <?php
		if (!empty($instance['image_uri1'])): ?>
               <img src="<?php
			echo esc_url($instance['image_uri1']); ?> "/>
                  <?php
		endif; ?>
    <?php
	endif; ?>
    
 <?php
	if (!empty($instance['title1'])): ?>
 <h4><?php
		echo apply_filters('widget_title', $instance['title1']); ?></h4>
 <?php
	endif; ?>
 <?php
	if (!empty($instance['text1'])): ?>
 <p> <?php
		echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text1'])); ?></p>
 
 <?php
	endif; ?>
 </div></div>
 </a>
 <?php
endif; ?>

  <!--BLOCK 2 START-->
 
 <?php

if (!empty($instance['icon2']) || !empty($instance['title2']) || !empty($instance['text2']) || !empty($instance['image_uri2'])): ?>

 <a <?php if (!empty($instance['box_uri2'])): ?> href="<?php echo esc_url($instance['box_uri2']); ?> " <?php endif; ?> >
 
<div class="medium-4 columns">
<div class=" style2-content btn-lines matchhe">
<!--hover effct-->
<span class="line-top"></span>
<span class="line-bottom"></span>
<span class="line-left"></span>
<span class="line-right"></span>
<!--BLOCK 2 START-->
   <?php
	if (!empty($instance['icon2']) || !empty($instance['image_uri2'])): ?>
      <?php
		if (!empty($instance['icon2'])): ?>
         <i class="fa <?php
			echo esc_attr($instance['icon2']); ?> fa-4x "  ></i>
           <?php
		endif; ?>
             <?php
		if (!empty($instance['image_uri2'])): ?>
               <img src="<?php
			echo esc_url($instance['image_uri2']); ?> "/>
                  <?php
		endif; ?>
    <?php
	endif; ?>
    
 <?php
	if (!empty($instance['title2'])): ?>
 <h4><?php
		echo apply_filters('widget_title', $instance['title2']); ?></h4>
 <?php
	endif; ?>
 <?php
	if (!empty($instance['text2'])): ?>
 <p> <?php
		echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text2'])); ?></p>
 
 <?php
	endif; ?>
 </div>
  </div>
 </a>
 <?php
endif; ?>

<!--BLOCK 3 START-->
<?php

if (!empty($instance['icon3']) || !empty($instance['title3']) || !empty($instance['text3']) || !empty($instance['image_uri3'])): ?>

 
<a <?php if (!empty($instance['box_uri3'])): ?> href="<?php echo esc_url($instance['box_uri3']); ?> " <?php endif; ?> >
<div class="medium-4 columns ">
<div class=" style2-content btn-lines matchhe">
<!--hover effct-->
<span class="line-top"></span>
<span class="line-bottom"></span>
<span class="line-left"></span>
<span class="line-right"></span>
<!--hover effct-->
   <?php
	if (!empty($instance['icon3']) || !empty($instance['image_uri3'])): ?>
      <?php
		if (!empty($instance['icon3'])): ?>
         <i class="fa <?php
			echo esc_attr($instance['icon3']); ?> fa-4x "  ></i>
           <?php
		endif; ?>
             <?php
		if (!empty($instance['image_uri3'])): ?>
               <img src="<?php
			echo esc_url($instance['image_uri3']); ?> "/>
                  <?php
		endif; ?>
    <?php
	endif; ?>
    
 <?php
	if (!empty($instance['title3'])): ?>
 <h4><?php
		echo apply_filters('widget_title', $instance['title3']); ?></h4>
 <?php
	endif; ?>
 <?php
	if (!empty($instance['text3'])): ?>
 <p> <?php
		echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text3'])); ?></p>
 
 <?php
	endif; ?>
 </div>
  </div>
 </a>
 <?php
endif; ?>
 </div>

</div>



		
<?php
        echo $after_widget;
		

    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
       
		/*heading */
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['sub_title'] = stripslashes(wp_filter_post_kses($new_instance['sub_title']));
			
		/*Box 1 */
        $instance['icon1'] = strip_tags( $new_instance['icon1'] );
		$instance['image_uri1'] = strip_tags( $new_instance['image_uri1'] );
        $instance['title1'] = strip_tags($new_instance['title1']);
		$instance['text1'] = stripslashes(wp_filter_post_kses($new_instance['text1']));
		$instance['box_uri1'] = strip_tags( $new_instance['box_uri1'] );
		
		/*Box 2 */
        $instance['icon2'] = strip_tags( $new_instance['icon2'] );
		$instance['image_uri2'] = strip_tags( $new_instance['image_uri2'] );
        $instance['title2'] = strip_tags($new_instance['title2']);
		$instance['text2'] = stripslashes(wp_filter_post_kses($new_instance['text2']));
		$instance['box_uri2'] = strip_tags( $new_instance['box_uri2'] );
		        
		/*Box 3 */
        $instance['icon3'] = strip_tags( $new_instance['icon3'] );
		$instance['image_uri3'] = strip_tags( $new_instance['image_uri3'] );
        $instance['title3'] = strip_tags($new_instance['title3']);
		$instance['text3'] = stripslashes(wp_filter_post_kses($new_instance['text3']));
		$instance['box_uri3'] = strip_tags( $new_instance['box_uri3'] );
		
       $instance['content_iconcolor'] = strip_tags($new_instance['content_iconcolor']);
       $instance['content_bg'] = strip_tags($new_instance['content_bg']);
	   $instance['content_titlecolor'] = strip_tags($new_instance['content_titlecolor']);
	   $instance['content_textcolor'] = strip_tags($new_instance['content_textcolor']);
	   $instance['padbottom'] = strip_tags($new_instance['padbottom']);
	   $instance['padtop'] = strip_tags($new_instance['padtop']);
        return $instance;

    }

    function form($instance) {
		
		
		/* Set up some default widget settings. */
		$defaults = array(
		'content_iconcolor'=>'#1cbac8',
		'content_bg' => 'rgb(255, 255, 255)',
	'content_textcolor'=>'#999999',
	'content_titlecolor'=>'#464545',
	'padbottom'=>'1',
	'padtop'=>'1',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'advance'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
        </p>
        
        
          <p>
            <label for="<?php echo $this->get_field_id('sub_title'); ?>"><?php _e('Sub title ', 'advance'); ?></label><br/>
            <textarea class="widefat" rows="4" cols="10" name="<?php echo $this->get_field_name('sub_title'); ?>" id="<?php echo $this->get_field_id('sub_title'); ?>"><?php if( !empty($instance['sub_title']) ): echo htmlspecialchars_decode($instance['sub_title']); endif; ?></textarea>
        </p>
         
		
         <h5><?php _e('For font-awesome icon visit ', 'advance') ?><a href="<?php echo esc_url('https://fortawesome.github.io/Font-Awesome/icons/');?>"><?php _e('font-awesome','advance')?></a></h5>


        <!--BLOCK 1 START-->
        <div class="accordion_advance">      
                 	<h4> <?php _e('Block 1', 'advance') ?></h4>
          
          <div class="pane_advance">                  
        
        <p>
            <label for="<?php echo $this->get_field_id('icon1'); ?>"><?php _e('Icon', 'advance'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('icon1'); ?>" id="<?php echo $this->get_field_id('icon1'); ?>" value="<?php if( !empty($instance['icon1']) ): echo $instance['icon1']; endif; ?>" class="widefat">
        </p>
        
        
        <div class="media-picker-wrap">
                <?php if(!empty($instance['image_uri1'])) { ?>
                    <img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['image_uri1']); ?>" />
                    <i class="fa fa-times media-picker-remove"></i>
                <?php } ?>
                <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'image_uri1' ); ?>" name="<?php echo $this->get_field_name( 'image_uri1' ); ?>" value="<?php if( !empty($instance['image_uri1']) ): echo $instance['image_uri1']; endif; ?>" type="hidden" />
                <a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'image_uri1' ).'mpick'; ?>"><?php _e('Select Image', 'advance') ?></a>
                </div>
                
                
             <p>
            <label for="<?php echo $this->get_field_id('title1'); ?>"><?php _e('Title', 'advance'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title1'); ?>" id="<?php echo $this->get_field_id('title1'); ?>" value="<?php if( !empty($instance['title1']) ): echo $instance['title1']; endif; ?>" class="widefat">
        </p>
        
        
        <p>
            <label for="<?php echo $this->get_field_id('text1'); ?>"><?php _e('Text', 'advance'); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text1'); ?>" id="<?php echo $this->get_field_id('text1'); ?>"><?php if( !empty($instance['text1']) ): echo htmlspecialchars_decode($instance['text1']); endif; ?></textarea>
        </p>


         <p>
        
			<label for="<?php echo $this->get_field_id('box_uri1'); ?>"><?php _e('Link 1','advance'); ?></label><br />
			<input type="text" name="<?php echo $this->get_field_name('box_uri1'); ?>" id="<?php echo $this->get_field_id('box_uri1'); ?>" value="<?php if( !empty($instance['box_uri1']) ): echo esc_url($instance['box_uri1']); endif; ?>" class="widefat">
		</p>
        </div>
        
        
         <!--BLOCK 2 START-->
            
                 	<h4> <?php _e('Block 2', 'advance') ?></h4>
          
          <div class="pane_advance">                  
        
        <p>
            <label for="<?php echo $this->get_field_id('icon2'); ?>"><?php _e('Icon', 'advance'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('icon2'); ?>" id="<?php echo $this->get_field_id('icon2'); ?>" value="<?php if( !empty($instance['icon2']) ): echo $instance['icon2']; endif; ?>" class="widefat">
        </p>
        
        
        <div class="media-picker-wrap">
                <?php if(!empty($instance['image_uri2'])) { ?>
                    <img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['image_uri2']); ?>" />
                    <i class="fa fa-times media-picker-remove"></i>
                <?php } ?>
                <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'image_uri2' ); ?>" name="<?php echo $this->get_field_name( 'image_uri2' ); ?>" value="<?php if( !empty($instance['image_uri2']) ): echo $instance['image_uri2']; endif; ?>" type="hidden" />
                <a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'image_uri2' ).'mpick'; ?>"><?php _e('Select Image', 'advance') ?></a>
                </div>
                
                
             <p>
            <label for="<?php echo $this->get_field_id('title2'); ?>"><?php _e('Title', 'advance'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title2'); ?>" id="<?php echo $this->get_field_id('title2'); ?>" value="<?php if( !empty($instance['title2']) ): echo $instance['title2']; endif; ?>" class="widefat">
        </p>
        
        
        <p>
            <label for="<?php echo $this->get_field_id('text2'); ?>"><?php _e('Text', 'advance'); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text2'); ?>" id="<?php echo $this->get_field_id('text2'); ?>"><?php if( !empty($instance['text2']) ): echo htmlspecialchars_decode($instance['text2']); endif; ?></textarea>
        </p>


         <p>
        
			<label for="<?php echo $this->get_field_id('box_uri2'); ?>"><?php _e('Link ','advance'); ?></label><br />
			<input type="text" name="<?php echo $this->get_field_name('box_uri2'); ?>" id="<?php echo $this->get_field_id('box_uri2'); ?>" value="<?php if( !empty($instance['box_uri2']) ): echo esc_url($instance['box_uri2']); endif; ?>" class="widefat">
		</p>
        </div>
        
        
        
         <!--BLOCK 3 START-->
              
                 	<h4> <?php _e('Block 3', 'advance') ?></h4>
          
          <div class="pane_advance">                  
        
        <p>
            <label for="<?php echo $this->get_field_id('icon3'); ?>"><?php _e('Icon', 'advance'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('icon3'); ?>" id="<?php echo $this->get_field_id('icon3'); ?>" value="<?php if( !empty($instance['icon3']) ): echo $instance['icon3']; endif; ?>" class="widefat">
        </p>
        
        
        <div class="media-picker-wrap">
                <?php if(!empty($instance['image_uri3'])) { ?>
                    <img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['image_uri3']); ?>" />
                    <i class="fa fa-times media-picker-remove"></i>
                <?php } ?>
                <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'image_uri3' ); ?>" name="<?php echo $this->get_field_name( 'image_uri3' ); ?>" value="<?php if( !empty($instance['image_uri3']) ): echo $instance['image_uri3']; endif; ?>" type="hidden" />
                <a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'image_uri3' ).'mpick'; ?>"><?php _e('Select Image', 'advance') ?></a>
                </div>
                
                
             <p>
            <label for="<?php echo $this->get_field_id('title3'); ?>"><?php _e('Title', 'advance'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title3'); ?>" id="<?php echo $this->get_field_id('title3'); ?>" value="<?php if( !empty($instance['title3']) ): echo $instance['title3']; endif; ?>" class="widefat">
        </p>
        
        
        <p>
            <label for="<?php echo $this->get_field_id('text3'); ?>"><?php _e('Text', 'advance'); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text3'); ?>" id="<?php echo $this->get_field_id('text3'); ?>"><?php if( !empty($instance['text3']) ): echo htmlspecialchars_decode($instance['text3']); endif; ?></textarea>
        </p>


         <p>
        
			<label for="<?php echo $this->get_field_id('box_uri3'); ?>"><?php _e('Link ','advance'); ?></label><br />
			<input type="text" name="<?php echo $this->get_field_name('box_uri3'); ?>" id="<?php echo $this->get_field_id('box_uri3'); ?>" value="<?php if( !empty($instance['box_uri3']) ): echo esc_url($instance['box_uri3']); endif; ?>" class="widefat">
		</p>
        </div>
        
        </div> <!---end accordino---->
        
        
        
        
        
        
          <!-- Text Content Background Color Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'content_bg' ); ?>"><?php _e('Background Color', 'advance') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'content_bg' ); ?>" name="<?php echo $this->get_field_name( 'content_bg' ); ?>" value="<?php echo $instance['content_bg']; ?>" type="text" />
		</p>
        
            
		<p>
			<label for="<?php echo $this->get_field_id( 'content_titlecolor' ); ?>"><?php _e('Title Color', 'advance') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'content_titlecolor' ); ?>" name="<?php echo $this->get_field_name( 'content_titlecolor' ); ?>" value="<?php echo $instance['content_titlecolor']; ?>" type="text" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'content_textcolor' ); ?>"><?php _e('Content text Color', 'advance') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'content_textcolor' ); ?>" name="<?php echo $this->get_field_name( 'content_textcolor' ); ?>" value="<?php echo $instance['content_textcolor']; ?>" type="text" />
		</p>
        
         <p>
			<label for="<?php echo $this->get_field_id( 'content_iconcolor' ); ?>"><?php _e('Content Icon Color', 'advance') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'content_iconcolor' ); ?>" name="<?php echo $this->get_field_name( 'content_iconcolor' ); ?>" value="<?php echo $instance['content_iconcolor']; ?>" type="text" />
		</p>
        
         <!-- Text Content Padding top/bottom Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'padtop' ); ?>"><?php _e('Top Padding', 'advance') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'padtop' ); ?>" name="<?php echo $this->get_field_name( 'padtop' ); ?>" value="<?php echo $instance['padtop']; ?>"  min="0" max="80" type="range" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'padbottom' ); ?>"><?php _e(' Bottom Padding', 'advance') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'padbottom' ); ?>" name="<?php echo $this->get_field_name( 'padbottom' ); ?>" value="<?php echo $instance['padbottom']; ?>"  min="0" max="80" type="range" />
		</p>
        
        
 <?php
	}
		
   }   
		
			

			
			
	
			
			
		
	


