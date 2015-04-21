<div class="block ui-tabs-panel deactive" id="option-ui-id-2" >
        <?php $current_options = wp_parse_args(  get_option( 'appointment_options', array() ), theme_data_setup() );
        if(isset($_POST['webriti_settings_save_2']))
        {      
                if($_POST['webriti_settings_save_2'] == 1)
                {
                        if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
                        {  printf (__('Sorry, your nonce did not verify.','appointment'));      exit; }
                        else  
                        {      
                                $current_options['slider_radio']=sanitize_text_field($_POST['slider_radio']);
                                $current_options['slider_options']=sanitize_text_field($_POST['slider_options']);
                                $current_options['slider_transition_delay']=sanitize_text_field($_POST['slider_transition_delay']);
                                $current_options['featured_slider_post']=sanitize_text_field($_POST['featured_slider_post']);
                               
                               
                               
                                $all_cats=$_POST['slider_select_category'];
                                if($all_cats)
                                {
                                        $arr=' ';
                                        foreach($all_cats as $val)
                                        {
                                                $arr.=$val.',';
                                        }
                                        $current_options['slider_select_category']=$arr;
                                }
                                // slider section enabled yes ya on
                                if(isset($_POST['home_banner_enabled']))
                                { echo $current_options['home_banner_enabled']= sanitize_text_field($_POST['home_banner_enabled']); }
                                else { echo $current_options['home_banner_enabled']="off"; }
                               
                                // slider section enabled yes ya on
                                if(isset($_POST['home_post_enabled']))
                                { echo $current_options['home_post_enabled']= sanitize_text_field($_POST['home_post_enabled']); }
                                else { echo $current_options['home_post_enabled']="off"; }
                               
                               
                                echo '<pre>';print_r($current_options);
                               
                                update_option('appointment_options', $current_options);
                        }
                }      
                 if($_POST['webriti_settings_save_2'] == 2)
                {
                       
                        $current_options['home_banner_enabled']="on";
                        $current_options['home_post_enabled']='on';
                        $current_options['slider_btn_link_target']= 'on';
                        $current_options['slider_radio']= 'demo';
                        $current_options['slider_options']= 'slide';
                        $current_options['slider_transition_delay']= '2000';
                        $current_options['slider_select_category']= ' Uncategorized ';
                        $current_options['featured_slider_post']= '';
                       
                        update_option('appointment_options',$current_options);
                }
        }  ?>
        <form method="post" id="webriti_theme_options_2">
                <div id="heading">
                        <table style="width:100%;"><tr>
                                <td><h2><?php _e('Home Feature Image Setting','appointment');?></h2></td>
                                <td><div class="webriti_settings_loding" id="webriti_loding_2_image"></div>
                                        <div class="webriti_settings_massage" id="webriti_settings_save_2_success" ><?php _e('Options data successfully Saved','appointment');?></div>
                                        <div class="webriti_settings_massage" id="webriti_settings_save_2_reset" ><?php _e('Options data successfully reset','appointment');?></div>
                                </td>
                                <td style="text-align:right;">
                                        <input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('2');">
                                        <input class="button button-primary button-large" type="button" value="Save Options" onclick="webriti_option_data_save('2')" >
                                </td>
                                </tr>
                        </table>       
                </div>         
                <?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
                <div class="section">
                        <h3><?php _e('Enable Home Banner','appointment'); ?>  </h3>
                        <input type="checkbox" <?php if($current_options['home_banner_enabled']=='on') echo "checked='checked'"; ?> id="home_banner_enabled" name="home_banner_enabled" >
                        <span class="explain"><?php _e('Enable Home Banner on front page.','appointment'); ?></span>
                </div>
                <div class="section">
                        <h3><?php _e('Select Slider Type','appointment'); ?>  </h3>
                        <input type="radio" name="slider_radio" id="slider_radio_demo" value="demo" <?php if($current_options['slider_radio']=='demo'){echo 'checked';} ?>><?php _e('Demo slider','appointment'); ?>
                        <input type="radio" name="slider_radio" id="slider_radio_post" value="post" <?php if($current_options['slider_radio']=='post'){echo 'checked';} ?>><?php _e('Post slider','appointment'); ?>
                        <input type="radio" name="slider_radio"  id="slider_radio_category" value="category" <?php if($current_options['slider_radio']=='category'){echo 'checked';} ?>> <?php _e('Category slider','appointment'); ?>
                </div>
               
                <div id="main_section" class="section" <?php if ($current_options['slider_radio']=='demo'){echo 'style="display:none;"';}?>>
                        <h3><?php _e('Transition Effect :','appointment'); ?>
                        <select id="slider_style" name="slider_options">
                                        <option value="carousel-fade" <?php if($current_options['slider_options']=='carousel-fade'){echo 'selected';} ?>><?php _e('fade','appointment'); ?></option>
                                        <option value="slide" <?php if($current_options['slider_options']=='slide'){echo 'selected';} ?>><?php _e('slide','appointment'); ?></option>
             </select>
                        <h3><?php _e('Transition Delay : ','appointment'); ?><input  type="text" name="slider_transition_delay" id="slider_transition_delay" value="<?php echo $current_options['slider_transition_delay'] ?>"></h3><h5><?php _e('If you choose Transction Delay 2000 that means 2 second.','appointment'); ?></h5></h3>
                </div>
               
                <div id="post_slider" <?php if($current_options['slider_radio']!='post'){echo 'style="display:none;"';}?>>
                        <input type="checkbox" <?php if($current_options['home_post_enabled']=='on') echo "checked='checked'"; ?> id="home_post_enabled" name="home_post_enabled" value="on">
                        <span class="explain"><?php _e('Enable Home Post on front page.','appointment'); ?></span>
                       
                        <h3><?php _e('Featured post slider section','appointment'); ?> </h3>
                        <div id="all_slider_content">
                                <div class="repeat-content-wrap">
                                        <div class="row">
                                                <div class="col col-1"> <?php _e('Featured Post Slider','appointment'); ?>
                                                </div>
                                                <div class="col col-2">
                                                        <input type="text" name="featured_slider_post" value="<?php echo $current_options['featured_slider_post'];?>">
                                                        <a href="<?php bloginfo ( 'url' );?>/wp-admin/post.php?post=<?php if( array_key_exists ( 'featured_slider_post', $current_options ) && array_key_exists ( $i, $current_options[ 'featured_slider_post' ] ) ) echo absint( $current_options[ 'featured_slider_post' ][ $i ] ); ?>&action=edit" class="button" title="<?php esc_attr_e('Click Here To Edit'); ?>" target="_blank"><?php _e( 'Click Here To Edit', 'appointment' ); ?></a>
                                                        <p><span> <h5><?php _e("You can use multiple ID's seprated by Commma[ , ]",'appointment');?></span></h5></p>
												</div>
                                        </div>
                                </div>
                        </div>
                </div> 
                <div id="category_slider" <?php if($current_options['slider_radio']!='category'){echo 'style="display:none;"';}?>>
                        <h3><?php _e('Featured Category slider section','appointment'); ?> </h3>
                       
                        <div>
                                <select class="slider_select_cat" name="slider_select_category[]" multiple >
                               
                                <?php
                                $args = array(
                                  'orderby' => 'name',
                                  'parent' => 0
                                  );
                                $categories = get_categories( $args );
                                foreach ( $categories as $category ) {
                                ?>
                                        <option <?php if(!strpos($current_options['slider_select_category'],$category->name)===false){echo 'selected';}?> > <?php echo $category->name;?> </option><?php
                                }
                                ?>
                                </select>
                        </div>
                </div>
               
                <div id="demo_slider" <?php if ($current_options['slider_radio']!='demo'){echo 'style="display:none;"';}?>>
                </div> 
                <div class="section">
                </div>
               
                <div id="button_section">
                        <input type="hidden" value="1" id="webriti_settings_save_2" name="webriti_settings_save_2" />
                        <input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('2');">
                        <input class="button button-primary button-large" type="button" value="Save Options" onclick="webriti_option_data_save('2')" >
                </div>
        </form>
</div>
<script>                        
       
       
  jQuery('input[name=slider_radio]').on('click',function(){
  if(this.value=='category')
  {
        jQuery("#category_slider").attr('style','display:block');
        jQuery("#post_slider").attr('style','display:none');
        jQuery("#demo_slider").attr('style','display:none');
        jQuery("#main_section").attr('style','display:block');
  }
  else if(this.value=='post')
  {
        jQuery("#category_slider").attr('style','display:none');
        jQuery("#post_slider").attr('style','display:block');
        jQuery("#demo_slider").attr('style','display:none');
        jQuery("#main_section").attr('style','display:block');
  }
  else
  {
  jQuery("#category_slider").attr('style','display:none');
  jQuery("#post_slider").attr('style','display:none');
  jQuery("#demo_slider").attr('style','display:block');
  jQuery("#main_section").attr('style','display:none');
  }
  });
  </script>