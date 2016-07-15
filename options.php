<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// add new code 20151201
	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
    
	return $themename;
		
	// Change this to use your theme slug
	//return 'options-framework-theme';
}


function ct_std_select($i)
{
	switch ($i)
	{
		case 0:
		  $return = 'video';
		  break;
		case 1:
		  $return = 'columns';
		  break;
		case 2:
		  $return = 'post_list';
		  break;
		case 3:
		  $return = 'team';
		  break;				  
		case 4:
		  $return = 'facts';
		  break;				  
		case 5:
		  $return = 'progress_bar';
		  break;				  
		case 6:
		  $return = 'price';
		  break;				  
		case 7:
		  $return = 'video';
		  break;
		case 8:
		  $return = 'video';
		  break;	
		case 9:
		  $return = 'video';
		  break;					  			  				  
		  
		default:
		  $return = 'video';
	}
	
	return $return;
}
			
/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options()
{
	// initialized data

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);
	
	$home_footer_background_defaults = array(
		'color' => '#020202',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );
    $footer_widget_area_background = array(
		'color' => '#222222',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	//$imagepath =  get_template_directory_uri() . '/images/';
	$imagepath =  'https://www.coothemes.com/wp-content/themes/acool/images/';
	//$imagepath =  'http://localhost/wp440/images/';		

	$options = array();


   /**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */
	 
	$options[] = array(
		'name' => __('General Options', 'acool'),
		'type' => 'heading');

	$options[] = array(
			'name' => __('Enable Query Loader', 'acool'),
			'desc' => __('Enable page query loader progress bar.', 'acool'),
			'id' => 'enable_query_loader',
			'std' => '',
			'type' => 'checkbox');

	$options[] = array(
		'name' => __('Upload Logo (recommended use 262px*52px ,png format )', 'acool'),
		'id' => 'logo',
		'std' => '',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('Favicon', 'acool'),
		'desc' => sprintf(__('An icon associated with a URL that is variously displayed, as in a browser\'s address bar or next to the site name in a bookmark list. Learn more about <a href="%s" target="_blank">Favicon</a>', 'acool'),esc_url("http://en.wikipedia.org/wiki/Favicon")),
		'id' => 'favicon',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Default featured image for front page ', 'acool'),
		'desc' => __('Recommended size: 475*313px;', 'acool'),
		'id' => 'default-featured-image',
		'type' => 'upload');
		
	
	//$options[] = array('name' => __('Link Color', 'acool'),'id' => 'link_color','std'=>'#03a325' ,'type'=> 'color');	
	//$options[] = array('name' => __('Link Mouseover Color', 'acool'),'std'=>'#0c8432','id' => 'link_mouseover_color' ,'type'=> 'color');	
	//$options[] = array('name' => __('Site Title Color', 'acool'),'id' => 'site_title_color','std'=>'#2C2C2C' ,'type'=> 'color');	
	
	$options[] = array(
		'name' => __('404 Page Content', 'acool'),
		'id' => 'page_404_content',
		'std' => '<div class="text-center">
                                    <img class="img-404" src="'.$imagepath .'404.png" alt="404 not found" />
                                    <br/> <br/>
                                    <a href="'.esc_url(home_url("/")).'"><i class="fa fa-home"></i> Please, return to homepage!</a>
                                    </div>',
		'type' => 'editor');
		
	$options[] = array(
		'name' => __('Custom CSS', 'acool'),
		'desc' => __('The following css code will add to the header before the closing &lt;/head&gt; tag.', 'acool'),
		'id' => 'custom_css',
		'std' => 'body{margin:0px;}',
		'type' => 'textarea');


	//Home page
	 	$options[] = array(
			'name' => __('Home Page', 'acool'),
			'type' => 'heading');
	 
		  $options[] = array(
			'name' => __('Enable Featured Homepage', 'acool'),
			'desc' => sprintf(__('Active featured homepage Layout.  The standardized way of creating Static Front Pages: <a href="%s" target="_blank">Creating a Static Front Page</a>', 'acool'),esc_url('http://codex.wordpress.org/Creating_a_Static_Front_Page')),
			'id' => 'enable_home_page',
			'std' => '1',
			'type' => 'checkbox');	
	
	
	
	if ( defined( 'CT_FEATURED_HOMEPAGE_USED' ) && CT_FEATURED_HOMEPAGE_USED )
	{	

		  
		 $options[] = array(
			'name' => __('Number of Sections', 'acool'),
			'desc' => __('Select number of sections', 'acool'),
			'id' => 'section_num',
			'type' => 'select',
			'class' => 'mini',
			'std' => '7',
			'options' => array_combine(range(1,10), range(1,10)) );
	
			
		 $section_num = of_get_option( 'section_num', 7 );
	
	
		 //set video main div
		 $options[] = array(	'desc' =>'<div class="options-section"><h3 class="groupTitle">'.__('Video Background Options', 'acool').'</h3>',	'class' => 'toggle_option_group group_close','type' => 'info');		 
		 //set YouTube Video ID	 
		 $options[] = array('name' => __('Section Background Video', 'acool'),'std' => 'e1c-n1dRxwc','desc' => __('YouTube Video ID', 'acool'),'id' => 'youtube_background_video','type' => 'text');		
		$options[] = array('name' => __('Display Buttons', 'acool'), 'desc' => __('Display video control buttons.', 'acool'),'id' => 'video_controls', 'std' => '1','class' => 'mini', 'options' => array('1'=>'yes','0'=>'no'),'type' => 'select');		
		$options[] = array('name' => __('Video Loop', 'acool'), 'desc' => __('Play video loop.', 'acool'),'id' => 'youtube_video_loop', 'std' => '1','class' => 'mini', 'options' => array('1'=>'yes','0'=>'no'),'type' => 'select');

		$options[] = array('name' => __('Default Volum', 'acool'),'desc' => '','id' => 'default_volum','type' => 'select',	'class' => 'mini',	'std' => '10','options' => array_combine(range(0,100,10), range(0,100,10)) );
		$options[] = array('name' => __('Seeks To', 'acool'),'std' => '3','desc' => __('Seeks to a specified time in the video ( number of seconds ).', 'acool'),'id' => 'youtube_seekto','type' => 'text');
			
		$video_background_section = array("0"=>__('No video background', 'acool'),"1"=>__('Secion 1', 'acool'));
		/*if( is_numeric( $section_num ) )
		{
			for($i=1; $i <= $section_num; $i++)
			{
				$video_background_section[$i] = "Secion ".$i;
			}
		}*/
		
		
		$options[]  = array('name' => __('Video Background Section', 'acool'),'std' => '1','id' => 'video_background_section',
			'type'  => 'select','options'=>$video_background_section);
			
		//shut video main div
		$options[] = array('desc' => __('</div>', 'acool'),	'class' => 'toggle_title','type' => 'info');
		 
		//slider or content
		$options[] = array('name' => __('Section 1 Content', 'acool'),'std' => 'slider','class' => 'mini','id' => 'section_1_content','type' => 'select','options'=>array("content"=>__('Content', 'acool'),"slider"=>__('Slider', 'acool')));
		//$section_title_border_color = array("","#009dc4","#459a00","#305999","#ff6c00");		
		$section_title              = array("video"                , "columns"       ,"post_list"        ,"team"        ,"facts"         ,"progress_bar"        ,"price"        );	
		$section_title_color        = array(""                     , "#00bceb"       ,"#ffffff"          ,"#3b3b3b"     ,"#303030"       ,"#303030"             ,"#303030"      );
		$section_content_color      = array("#ffffff"              ,"#595959"        ,"#ffffff"          ,"#595959"     ,"#303030"       ,"#ffffff"             ,"#ffffff"      );
		$section_anchor             = array("section-video-default","section-columns","section-post-list","section-team","section-facts" ,"section-progress-bar","section-price");
		$section_css_class          = array(""                     ,""               ,""                 ,""            ,""              ,""                    ,""             );
		$section_background_size    = array("yes"                  ,"yes"            ,"yes"              ,"yes"         ,"yes"           ,"yes"                 ,"yes"          );
		$section_full_width         = array("yes"                  ,"no"             ,"yes"              ,"no"          ,"no"            ,"no"                  ,"no"           );
		
		$section_background = array
		(
			array(
					'color' => '',
					'image' => $imagepath.'youtube-video-screenshot.jpg',
					'repeat' => 'repeat',
					'position' => 'top left',
					'attachment'=>'scroll' 
				),
			array(
					'color' => '',
					'image' => $imagepath.'default-bg-section.png',
					'repeat' => 'repeat',
					'position' => 'top left',
					'attachment'=>'scroll' 
				),
			 array(
					'color' => '#222222',
					'image' => '',
					'repeat' => 'repeat',
					'position' => 'top left',
					'attachment'=>'scroll' 
				),
			 array(
					'color' => '',
					'image' => $imagepath.'default-bg-section.png',
					'repeat' => 'repeat',
					'position' => 'top left',
					'attachment'=>'scroll' 
				),
			 array(
					'color' => '#ffffff',
					'image' => '',
					'repeat' => 'repeat',
					'position' => 'top left',
					'attachment'=>'scroll' 
				),
			 array(
					'color' => '#61c148',
					'image' => '',
					'repeat' => 'repeat',
					'position' => 'top left',
					'attachment'=>'scroll' 
				),			
			 array(
					'color' => '#ffffff',
					'image' => '',
					'repeat' => 'repeat',
					'position' => 'top left',
					'attachment'=>'scroll' 
				)				
		);

		$section_content   = array(
			'<div class="ct_setion_text">
				<h1>The jQuery slider that just slides.</h1>
				<p class="ct_slider_text">No fancy effects or unnecessary markup.</p>
				<a class="btn" href="#download">Download</a>	
			</div>
			',
			'		<div class="ct_section_title">
						<h2>We are always dedicated to...</h2>
						<h3>CooThemes.com is a creative design company focused on visual presentation and interactive experience!</h3> 
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="thumbnail">
							  <div class="circle fa-v1"><i class="fa fa-file-image-o fa-5x">&nbsp;</i></div>
							  <div class="caption">
								 <h3><a href="#">Beautiful</a></h3>
								 <span class="ct_columns_text">Impress your potential cusomters with a unique and fantastic website.</span>
							  </div>
							</div>
						</div> 
						<div class="col-xs-12 col-sm-6  col-lg-3">
							<div class="thumbnail">
							  <div class="circle  fa-v2"><i class="fa fa-tachometer fa-5x">&nbsp;</i></div>
							  <div class="caption">
								 <h3><a href="#">Easy to Use</a></h3>
								 <span class="ct_columns_text">Shortcodes, page templates and theme options give easy control over your websites.</span>
							  </div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6  col-lg-3">
							<div class="thumbnail">
								<div class="circle  fa-v3"><i class="fa fa-tablet fa-5x">&nbsp;</i></div>
								<div class="caption">
									<h3><a href="#">Responsive</a></h3>
									<span class="ct_columns_text">All of our WordPress themes are responsive on mainstream browsers and mobile devices.</span>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="thumbnail">
								<div class="circle fa-v4"><i class="fa fa-money fa-5x">&nbsp;</i></div>
								<div class="caption">
									<h3><a href="#">Affordable</a></h3>
									<span class="ct_columns_text">Top design quality, fastest tech support and many other great features at an affodable price.</span>
								</div>
							</div>
						</div>                          
					</div>
			', 
				   
			'<h2 class="case-tx0">Perfect Solution for Your Project. </h2>
			<h3 class="case-tx1">Our constant innovation meets your specific needs, here you can check out our most recent news...</h3>
			',
								
			'		<div class="ct_section_title">
						<h2>Our Team</h2>
						<h3>CooThemes.com is a creative design company focused on visual presentation and interactive experience!</h3> 
					</div>                
								   
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="customer_img"><img src="'.$imagepath .'t-anna.jpg" width="200"></div>
							<p class="clear"></p>
							<p class="ct_team_text">Anna</p>
							<p class="ct_team_text">Support</p>
							<p class="ct_team_bookmarks">
								<a href="#" class="tooltip-test" data-toggle="tooltip"  title="Facebook"><i class="fa fa-facebook fa-2x">&nbsp;</i></a>                   	
								<a href="#" class="tooltip-test" data-toggle="tooltip"  title="Twitter"><i class="fa fa-twitter fa-2x">&nbsp;</i></a>
								<a href="#" class="tooltip-test" data-toggle="tooltip"  title="Youtube"><i class="fa fa-youtube fa-2x">&nbsp;</i></a>
							</p>
							<p class="ct_team_text2">consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							
						</div> 
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="customer_img"><img src="'.$imagepath .'t-Brown.jpg" width="200"></div>
							<p class="clear"></p>
							<p class="ct_team_text">Brown</p>
							<p class="ct_team_text">Designer</p>
							<p class="ct_team_bookmarks">
								<a href="#" class="tooltip-test" data-toggle="tooltip"  title="Facebook"><i class="fa fa-facebook fa-2x">&nbsp;</i></a>                    	
								<a href="#" class="tooltip-test" data-toggle="tooltip"  title="Twitter"><i class="fa fa-twitter fa-2x">&nbsp;</i></a>
								<a href="#" class="tooltip-test" data-toggle="tooltip"  title="Youtube"><i class="fa fa-youtube fa-2x">&nbsp;</i></a>
							</p>
							<p class="ct_team_text2"> consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>       
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="customer_img"><img src="'.$imagepath .'t-emma.jpg" width="200"></div>
							<p class="clear"></p>
							<p class="ct_team_text">Emma</p>
							<p class="ct_team_text">Designer</p>
							<p class="ct_team_bookmarks">
								<a href="#" class="tooltip-test" data-toggle="tooltip"  title="Facebook"><i class="fa fa-facebook fa-2x">&nbsp;</i></a>                   	
								<a href="#" class="tooltip-test" data-toggle="tooltip"  title="Twitter"><i class="fa fa-twitter fa-2x">&nbsp;</i></a>
								<a href="#" class="tooltip-test" data-toggle="tooltip"  title="Youtube"><i class="fa fa-youtube fa-2x">&nbsp;</i></a>
							</p>
							<p class="ct_team_text2"> consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						</div>
						<div class="col-xs-12 col-sm-6 col-lg-3">
							<div class="customer_img"><img src="'.$imagepath .'t-Hannah.jpg" width="200"></div>
							<p class="clear"></p>
							<p class="ct_team_text">Hannah</p>
							<p class="ct_team_text">SUPPORT</p>
							<p class="ct_team_bookmarks">
								<a href="#" class="tooltip-test" data-toggle="tooltip"  title="Facebook"><i class="fa fa-facebook fa-2x">&nbsp;</i></a>
								<a href="#" class="tooltip-test" data-toggle="tooltip"  title="Twitter"><i class="fa fa-twitter fa-2x">&nbsp;</i></a>
								<a href="#" class="tooltip-test" data-toggle="tooltip"  title="Youtube"><i class="fa fa-youtube fa-2x">&nbsp;</i></a>
							</p>
							<p class="ct_team_text2"> consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>                      
						</div>                                          
					</div>
			', 
				   
			'<h2 class="case-tx0">FACTS</h2>				
                <div class="row ct_facts">                
                    <div class="col-xs-12 col-sm-6 col-lg-3 ct_clear_margin_padding">               
                        <span id="" class="fact" data-fact="88">0</span>
                        <p>Employees</p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3 ct_clear_margin_padding">                 
                        <span id="" class="fact" data-fact="168">0</span>
                        <p>Projects</p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3 ct_clear_margin_padding">              
                       <span id="" class="fact" data-fact="76">0</span>
                       <p>Dogs</p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-3 ct_clear_margin_padding">              
                       <span id="" class="fact" data-fact="18">0</span>
                       <p>Offices</p>
                    </div>
                </div>
			', 
				   
			'<h2 class="case-tx0">OUR SKILLS</h2>
			<div class="ct_progress" >
				<div class="col-md-6 ">
					Lorem Ipsum is simply dummy text of the printing and typesetting industry.
					 Lorem Ipsum has been the industry standard dummy text ever since the 1500s, 
					 when an unknown printer took a galley of type and scrambled it to make a type specimen book.
					<div class="clear"></div>
				</div>

				<div class="col-md-6">
					<div class="col-md-3  ct_progress_px">Web Design</div>
					<div class="col-md-9 progress ct_clear_margin_padding ct_progress_px">
						<div class="progress-bar ct_progress_width" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" data-percent="80">
							<div>80% </div>
						</div>
					</div>
					<div class="ct_clear"></div>
					<div class="col-md-3 ct_progress_px">HTML/CSS</div>
					<div class="col-md-9 progress ct_clear_margin_padding ct_progress_px">
						<div class="progress-bar progress-bar-success  ct_progress_width" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"  data-percent="70">
							<div>70% </div>
						</div>
					</div>
					<div class="ct_clear"></div>
					<div class="col-md-3 ct_progress_px">PHP Coding</div>
					<div class="col-md-9 progress ct_clear_margin_padding ct_progress_px">
						<div class="progress-bar progress-bar-info ct_progress_width" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"  data-percent="90">
							<div>90% </div>
						</div>
					</div>
					<div class="ct_clear"></div>
					<div class="col-md-3 ct_progress_px">SEO</div>
					<div class="col-md-9 progress ct_clear_margin_padding ct_progress_px">
						<div class="progress-bar progress-bar-warning ct_progress_width" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" data-percent="85">
							<div>85% </div>
						</div>
					</div>  
				</div>
			</div>
			',
			'<h2 class="case-tx0">PRICE TABLE</h2>
                <div id="pricePlans">
                    <ul id="plans">
                        <li class="plan">
                            <ul class="planContainer">
                                <li class="title"><h2>Plan 1</h2></li>
                                <li class="price"><p>$10/<span>month</span></p></li>
                                <li>
                                    <ul class="options">
                                        <li>2x <span>option 1</span></li>
                                        <li>Free <span>option 2</span></li>
                                        <li>Unlimited <span>option 3</span></li>
                                        <li>Unlimited <span>option 4</span></li>
                                        <li>1x <span>option 5</span></li>
                                    </ul>
                                </li>
                                <li class="button"><a href="#">Purchase</a></li>
                            </ul>
                        </li>
            
                        <li class="plan">
                            <ul class="planContainer">
                                <li class="title"><h2 class="bestPlanTitle">Plan 2</h2></li>
                                <li class="price"><p class="bestPlanPrice">$20/month</p></li>
                                <li>
                                    <ul class="options">
                                        <li>2x <span>option 1</span></li>
                                        <li>Free <span>option 2</span></li>
                                        <li>Unlimited <span>option 3</span></li>
                                        <li>Unlimited <span>option 4</span></li>
                                        <li>1x <span>option 5</span></li>
                                    </ul>
                                </li>
                                <li class="button"><a class="bestPlanButton" href="#">Purchase</a></li>
                            </ul>
                        </li>
            
                        <li class="plan">
                            <ul class="planContainer">
                                <li class="title"><h2>Plan 3</h2></li>
                                <li class="price"><p>$30/<span>month</span></p></li>
                                <li>
                                    <ul class="options">
                                        <li>2x <span>option 1</span></li>
                                        <li>Free <span>option 2</span></li>
                                        <li>Unlimited <span>option 3</span></li>
                                        <li>Unlimited <span>option 4</span></li>
                                        <li>1x <span>option 5</span></li>
                                    </ul>
                                </li>
                                <li class="button"><a href="#">Purchase</a></li>
                            </ul>
                        </li>
            
                        <li class="plan">
                            <ul class="planContainer">
                                <li class="title"><h2>Plan 4</h2></li>
                                <li class="price"><p>$40/<span>month</span></p></li>
                                <li>
                                    <ul class="options">
                                        <li>2x <span>option 1</span></li>
                                        <li>Free <span>option 2</span></li>
                                        <li>Unlimited <span>option 3</span></li>
                                        <li>Unlimited <span>option 4</span></li>
                                        <li>1x <span>option 5</span></li>
                                    </ul>
                                </li>
                                <li class="button"><a href="#">Purchase</a></li>
                            </ul>
                        </li>
                    </ul> <!-- End ul#plans -->
                </div>	<!--div id="pricePlans"-->
			'	
					
		);
			 
		 
		for($i=0; $i < $section_num; $i++)
		{
			if(!isset($section_title[$i])){$section_title[$i] = "";}
			if(!isset($section_menu[$i])){$section_menu[$i] = "";}
			if(!isset($section_background[$i])){$section_background[$i] = array('color' => '',
			'image' => '',
			'repeat' => '',
			'position' => '',
			'attachment'=>'');}
			if(!isset($section_css_class[$i])){$section_css_class[$i] = "";}
			if(!isset($section_content[$i])){$section_content[$i] = "";}
			if(!isset($section_title_color[$i])){$section_title_color[$i] = "";}
			if(!isset($section_title_border_color[$i])){$section_title_border_color[$i] = "";}
			
			if(!isset($section_content_color[$i])){$section_content_color[$i] = "";}
			if(!isset($section_anchor[$i])){$section_anchor[$i] = "";}
			if(!isset($section_background[$i])){$section_background[$i] = "";}
			if(!isset($section_background_size[$i])){$section_background_size[$i] = "";}
			
			
			if(!isset($section_full_width[$i])){$section_full_width[$i] = "";}	
			if(!isset($section_full_width[$i])){$section_full_width[$i] = "";}					
	
			
			$options[] = array(	'desc' => '<div class="options-section"><h3 class="groupTitle">Section '.($i+1).'</h3>', 'class' => 'toggle_option_group home-section group_close','type' => 'info');
						
			$options[] = array(
			'name' => '',
			'desc' => '<div style="overflow:hidden; background-color:#eee;"><a data-section="'.$i.'" class="delete-section button-primary" style="float:right;" title="'.__('Delete', 'acool').'">'.__('Delete this section', 'acool').'</a></div>',
			'id' => 'delete_section_'.$i,
			'std' => '',
			'type' => 'info',
			'class'=>'section-item section-delete-button');
			
			

			if($i==0)
			{					
				$options[] = array(
					'name' => __('Select Content Template for this section', 'acool'),
					'std' => ct_std_select($i),
					'id' => 'ct_select_section_temp_'.$i.'',
					'type' => 'select',
					'class'=>'mini ct_select_section_temp',
					'options'=>array(
						"video"=>"video",
						"slider"=>"slider",
						//"columns"=>"columns",			
						//"post_list"=>"post_list",					
						//"team"=>"team",
						//"workteam"=>"workteam"
						)
					);
			}else{
				$options[] = array(
					'name' => __('Select Content Template for this section', 'acool'),
					'std' => ct_std_select($i),
					'id' => 'ct_select_section_temp_'.$i.'',
					'type' => 'select',
					'class'=>'mini ct_select_section_temp',
					'options'=>array(
						//"video"=>"video",
						"columns"=>"columns",			
						"post_list"=>"post_list",								
						"team"=>"team",
						"facts"=>"facts",						
						"progress_bar"=>"progress_bar",
						"price"=>"price"						
						)
					);
			}
			//$options[] = array('name' => __('Section Content', 'acool'),'id' => 'section_content_'.$i,'std' => $section_content[$i],'type' => 'editor');			
			//$options[] = array('name' => __('Section Title', 'acool'),'id' => 'section_title_'.$i.'','type' => 'text','std'=>$section_title[$i]);
			$options[] = array('name' => __('Title Color', 'acool'),'id' => 'section_title_color_'.$i.'','type' => 'color','std'=>$section_title_color[$i]);
			//$options[] = array('name' => __('Title Border Color', 'acool'),'id' => 'section_title_border_color_'.$i.'','type' => 'color','std'=>$section_title_border_color[$i]);
			$options[] = array('name' => __('Content Color', 'acool'),'id' => 'section_content_color_'.$i.'','type' => 'color','std'=>$section_content_color[$i]);
			//$options[] = array('name' => __('Section ID', 'acool'),'id' => 'section_anchor_'.$i.'','type' => 'text','std'=>$section_anchor[$i],'desc'=>__('Add anchor tag to jump to specific section on one page without having any space or symbol. This section id will be related with the menu link, it should be call on wp appearance menu by using # after site url. It is usually all lowercase and contains only letters, numbers, and hyphens.', 'acool'));
			
			if($section_title[$i] =='post_list' )
			{
				//$options[] = array('name' => __('Blog List Link', 'acool'),'id' => 'section_title_post_list_'.$i,"class" => 'mini','type' => 'text');
				$options[] = array('name' => __('Blog List Link', 'acool'),'id' => 'section_post_list_'.$i.'','type' => 'text','std'=>esc_url(home_url('/')).'blog/');
			}
			
			$options[] = array('name' =>  __('Section Background', 'acool'),'id' => 'section_background_'.$i.'','std' => $section_background[$i],'type' => 'background' );
			
			$options[] = array('name' => __('100% Width Background Image', 'acool'),'std' => $section_background_size[$i],'id' => 'background_size_'.$i.'',
			'type' => 'select','class'=>'mini','options'=>array("no"=>"no","yes"=>"yes"));
			$options[] = array('name' => __('Full Width', 'acool'),'std' => $section_full_width[$i],'id' => 'full_width_'.$i.'','type' => 'select','class'=>'mini','options'=>array("no"=>"no","yes"=>"yes"));
			$options[] = array('name' => __('Section Css Class', 'acool'),'id' => 'section_css_class_'.$i.'','type' => 'text','std'=>$section_css_class[$i]);
			$options[] = array('name' => __('Section Content', 'acool'),'id' => 'section_content_'.$i,'std' => $section_content[$i],'type' => 'editor');
			
			$options[] = array('desc' => __('</div>', 'acool'),'class' => 'toggle_title','type' => 'info');
			
		}
				  
	}//end  if ( defined( 'CT_FEATURED_HOMEPAGE_USED' ) && CT_FEATURED_HOMEPAGE_USED )

					  
	// HEADER
	$options[] = array('name' => __('Header', 'acool'),'type' => 'heading');
		
	$options[] = array('name' => __('Header Opacity', 'acool'),'desc' =>'',	'id' => 'header_opacity',	'type' => 'select',	'class' => 'mini',	'std' => '0.8','options' => array_combine(range(0,1,0.1), range(0,1,0.1)) );	
		
	$options[] = array('name' => __('Fixed Header', 'acool'),'desc' =>'',	'id' => 'fixed_header',	'type' => 'select',	'class' => 'mini',	'std' => 'yes','options' => array('no'=>'no','yes'=>'yes') );

	//since 1.0.2
	$options[] = array('name' => __('Breadcrumb', 'acool'),'desc' =>__( "Display the breadcrumb in posts lists :post page, blog page, archives, search results..." , "acool" ),	'id' => 'show_breadcrumb',	'type' => 'select',	'class' => 'mini',	'std' => '1','options' => array('yes'=>'yes','no'=>'no')  );
	//$show_breadcrumb         =  of_get_option("show_breadcrumb");
	//since 1.0.2 end

				
	// FOOTER	
	$social_icons = array(
		'fa fa-facebook'=>'facebook',
		'fa fa-flickr'=>'flickr',
		'fa fa-google-plus'=>'google plus',
		'fa fa-linkedin'=>'linkedin',
		'fa fa-pinterest'=>'pinterest',
		'fa fa-twitter'=>'twitter',
		'fa fa-tumblr'=>'tumblr',
		'fa fa-digg'=>'digg',
		'fa fa-rss'=>'rss',
		
		);	
	
	$options[] = array('name' => __('Footer', 'acool'),'type' => 'heading');

	$options[] = array('name' => __('Display Footer Widget Area', 'acool'), 'desc' =>'','id' => 'display_footer_widget_area', 'std' => '0','class' => 'mini', 'options' => array('0'=>'no','1'=>'yes'),'type' => 'select');

	$options[] = array('name' =>  __('Footer Widget Area Background', 'acool'),'id' => 'footer_widget_area_background','std' => $footer_widget_area_background,'type' => 'background' );	  
			  
	$options[] = array('name' => __('Social Icon Color', 'acool'),'std' => '#FFFFFF','id' => 'social_icon_color' ,'type'=> 'color');
	$options[] = array('name' => __('Social Icon Background Color', 'acool'),'std' => '#0c8432','id' => 'social_icon_background_color' ,'type'=> 'color');
		
	$options[] = array('name' =>  __('Home Page Footer Background', 'acool'),'id' => 'home_footer_background','std' =>$home_footer_background_defaults,'type' => 'background' );
	$options[] = array('name' =>  __('Single Page Footer Background', 'acool'),'id' => 'single_footer_background','std' => $background_defaults,'type' => 'background' );
	
	for($i=0;$i<9;$i++)
	{
		$options[] = array("name" => sprintf(__('Social Icon #%s', 'acool'),($i+1)),	"id" => "social_icon_".$i,"std" => "","class" => 'mini',"type" => "select",	"options" => $social_icons );
		$options[] = array('name' => sprintf(__('Social Title #%s', 'acool'),($i+1)),'id' => 'social_title_'.$i,"class" => 'mini','type' => 'text');	
		$options[] = array('name' => sprintf(__('Social Link #%s', 'acool'),($i+1)),'id' => 'social_link_'.$i,'type' => 'text');	
	}


		// Slider

		$options[] = array(	'name' => __('Homepage Slider', 'acool'),	'type' => 'heading');
		
		//HOME PAGE SLIDER
		$options[] = array('name' => __('Slideshow', 'acool'),'id' => 'group_title','type' => 'title');
		
		$options[] = array(	'desc' => __('<div class="options-section"><h3 class="groupTitle">'.__('Slide One','acool').'</h3>', 'acool'),	'class' => 'toggle_option_group group_close','type' => 'info');
		
		$options[] = array('name' => __('Image', 'acool'),'id' => 'acool_slide_image_1','type' => 'upload','std'=>$imagepath.'banner1.jpg');
		
		$options[] = array('name' => __('Text', 'acool'),'id' => 'acool_slide_text_1','type' => 'editor','std'=>'<h1>The jQuery slider that just slides.</h1><p class="ct_slider_text">No fancy effects or unnecessary markup.</p><a class="btn" href="#download">Download</a>');
		
		$options[] = array(	'desc' => __('</div>', 'acool'),	'class' => 'toggle_title','type' => 'info');


	if ( defined( 'CT_HOMEPAGE_SLIDER_USED' ) && CT_HOMEPAGE_SLIDER_USED )
	{		


		
		$options[] = array(	'desc' => __('<div class="options-section"><h3 class="groupTitle">'.__('Slide Two','acool').'</h3>', 'acool'),	'class' => 'toggle_option_group group_close','type' => 'info');
		
		$options[] = array('name' => __('Image', 'acool'),'id' => 'acool_slide_image_2','type' => 'upload','std'=>$imagepath.'banner2.jpg');
		
		$options[] = array('name' => __('Text', 'acool'),'id' => 'acool_slide_text_2','type' => 'editor','std'=>'<h1>Fluid, flexible, fantastically minimal.</h1><p class="ct_slider_text">Use any HTML in your slides, extend with CSS. You have full control.</p><a class="btn" href="#download">Download</a>');
		
		$options[] = array(	'desc' => __('</div>', 'acool'),	'class' => 'toggle_title','type' => 'info');
		
		$options[] = array(	'desc' => __('<div class="options-section"><h3 class="groupTitle">'.__('Slide Three','acool').'</h3>', 'acool'),	'class' => 'toggle_option_group group_close','type' => 'info');
		$options[] = array('name' => __('Image', 'acool'),'id' => 'acool_slide_image_3','type' => 'upload','std'=>$imagepath.'banner3.jpg');
		
		$options[] = array('name' => __('Text', 'acool'),'id' => 'acool_slide_text_3','type' => 'editor','std'=>'<h1>Open-source.</h1><p class="ct_slider_text"> Vestibulum auctor nisl vel lectus ullamcorper sed pellentesque dolor eleifend.</p><a class="btn" href="#">Contribute</a>');
		
		$options[] = array(	'desc' => __('</div>', 'acool'),	'class' => 'toggle_title','type' => 'info');
		
		$options[] = array(	'desc' => __('<div class="options-section"><h3 class="groupTitle">'.__('Slide Four','acool').'</h3>', 'acool'),	'class' => 'toggle_option_group group_close','type' => 'info');
		$options[] = array('name' => __('Image', 'acool'),'id' => 'acool_slide_image_4','type' => 'upload','std'=>$imagepath.'banner4.jpg');
		
		$options[] = array('name' => __('Text', 'acool'),'id' => 'acool_slide_text_4','type' => 'editor','std'=>'<h1>Uh, that\'s about it.</h1><p class="ct_slider_text"> I just wanted to show you another slide.</p><a class="btn" href="#download">Download</a>');
		
		$options[] = array(	'desc' => __('</div>', 'acool'),	'class' => 'toggle_title','type' => 'info');
		
		$options[] = array(	'desc' => __('<div class="options-section"><h3 class="groupTitle">'.__('Slide Five','acool').'</h3>', 'acool'),	'class' => 'toggle_option_group group_close','type' => 'info');
		$options[] = array('name' => __('Image', 'acool'),'id' => 'acool_slide_image_5','type' => 'upload');
		
		$options[] = array('name' => __('Text', 'acool'),'id' => 'acool_slide_text_5','type' => 'editor');
		
		$options[] = array(	'desc' => __('</div>', 'acool'),	'class' => 'toggle_title','type' => 'info');
		
	}

		$options[] = array(	'name' => __('Slide Time', 'acool'),'id' => 'slide_time',	'std' => '5000','desc'=>__('Milliseconds between the end of the sliding effect and the start of the nex one.','acool'),'type' => 'text');
		//END HOME PAGE SLIDER



	//Blog
	$options[] = array('name' => __('Blog', 'acool'),'type' => 'heading');
	$options[] = array('name' => __('Hide Post Meta', 'acool'),'std' => 'no','desc'=>__('Hide date, author, category...below blog title.','acool'),'id' => 'hide_post_meta',
	'type' => 'select','class'=>'mini','options'=>array("no"=>"no","yes"=>"yes"));
	//$options[] = array('name' => __('Blog Title Color', 'acool'),'id' => 'blog_title_color','std'=>'#4ca702' ,'type'=> 'color');	
		  
	return $options;
}