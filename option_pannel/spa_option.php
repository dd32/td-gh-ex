
<div class="slidesDescription container" style="margin:25px 0;padding-bottom:25px;padding-left:25px;padding-right:25px;">
			<h1><?php _e('Spasalon Pro Verison Coming Soon !!! ','sis_spa');?></h1>
			<p style="font-size:16px;"><?php _e('You are Using the Lite Version of Spasalon Theme. The Premium Version  is coming soon with lots and lots of features. Soon releasing themes premium version on our blog','sis_spa'); ?></p>
			<a href="http://www.webriti.com" style="font-size:20px;color:Black;" ><?php _e('Check Out Our Blog','sis_spa');?></a>
           </div>
<div class="wrap" id="framework_wrap">

 

    <div class="icon32" id="icon-options-general"></div>
    <h2><?php _e('Spa Theme Options','sis_spa');?></h2>
	

    <div id="content_wrap">

     

            <div class="info top-info is-option-page"><a class="toggle_tabs" href=""><?php _e('Tabs','sis_spa');?></a>

               

                <div class="top-layout-bar">

                   


                </div>

            </div>

            <div class="ajax-message">
                                                                            </div>

            <div id="content">

                <div id="options_tabs" class="ui-tabs ">

                    <ul class="options_tabs ui-tabs-nav" role="tablist">
                    <li class="active" role="tab" tabindex="0" aria-controls="option_general_default" aria-labelledby="ui-id-1" aria-selected="true"><a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1"><?php _e('General','sis_spa');?></a><span></span></li>
                    
                    <li  role="tab" tabindex="-1" aria-controls="option_demo_header" aria-labelledby="ui-id-2" aria-selected="true"><a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2"><?php _e('Typography','sis_spa');?></a><span></span></li>
                    
                  
                    
                    <li  role="tab" tabindex="-1" aria-controls="option_header" aria-labelledby="ui-id-4" aria-selected="false"><a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-4"><?php _e('Footer Customization','sis_spa');?> </a><span></span></li>
                    
                    <li role="tab" tabindex="-1" aria-controls="option_color_header" aria-labelledby="ui-id-5" aria-selected="false"><a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-5"><?php _e('Home','sis_spa');?></a><span></span></li>
                                        
                    </ul>




    <!--most 1 tabs-->
        
        <?php require_once('general_settings.php');?>
    
    <!--most 2 tabs-->
  
      <?php include('typography.php');?>

   <!--most 3 tabs-->

 <?php //include('homepage_slider.php');?>
   
	<!--most 4 tabs-->
	
        <?php include('footer_customization.php');?>

    <!--most 5 tabs-->

        <?php include('home.php');?>

 <br class="clear">

                </div>
            </div>
    </div>
</div>