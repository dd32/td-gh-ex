
jQuery(document).ready(function($) {
	var imagepath =  'https://www.coothemes.com/wp-content/themes/acool/images/';	
	$("#ct_select_section_temp_0").on("change", function(){		 
		var selected = $(this).val();		
		var getarr = get_section_arr(selected);
		document.getElementById("section_title_color_0").value=getarr["section_title_color"];//Title Color		
		document.getElementById("section_content_color_0").value=getarr["section_content_color"];//Content Color
		document.getElementById("section_background_0_color").value=getarr["section_background_color"];		
		document.getElementById("section_background_0").value=getarr["section_background"];//Section Background	
		document.getElementById("background_size_0").value=getarr["background_size"];//100% Width Background Image
		document.getElementById("full_width_0").value=getarr["full_width"];//Full Width
		document.getElementById("section_css_class_0").value=getarr["section_css_class"];//Section Css Class
		document.getElementById("section_content_0").value=getarr["section_content"];//Section Content
		
	})
	
	
	$("#ct_select_section_temp_1").on("change", function(){		
		var selected = $(this).val();		
		var getarr = get_section_arr(selected);	
		document.getElementById("section_title_color_1").value=getarr["section_title_color"];//Title Color		
		document.getElementById("section_content_color_1").value=getarr["section_content_color"];//Content Color
		document.getElementById("section_background_1_color").value=getarr["section_background_color"];		
		document.getElementById("section_background_1").value=getarr["section_background"];//Section Background	
		document.getElementById("background_size_1").value=getarr["background_size"];//100% Width Background Image
		document.getElementById("full_width_1").value=getarr["full_width"];//Full Width
		document.getElementById("section_css_class_1").value=getarr["section_css_class"];//Section Css Class
		document.getElementById("section_content_1").value=getarr["section_content"];//Section Content		
	})	
		
	$("#ct_select_section_temp_2").on("change", function(){		 
		var selected = $(this).val();		
		var getarr = get_section_arr(selected);
		document.getElementById("section_title_color_2").value=getarr["section_title_color"];//Title Color		
		document.getElementById("section_content_color_2").value=getarr["section_content_color"];//Content Color
		document.getElementById("section_background_2_color").value=getarr["section_background_color"];
		document.getElementById("section_background_2").value=getarr["section_background"];//Section Background	
		document.getElementById("background_size_2").value=getarr["background_size"];//100% Width Background Image
		document.getElementById("full_width_2").value=getarr["full_width"];//Full Width
		document.getElementById("section_css_class_2").value=getarr["section_css_class"];//Section Css Class
		document.getElementById("section_content_2").value=getarr["section_content"];//Section Content
	})		
	
	$("#ct_select_section_temp_3").on("change", function(){
		var selected = $(this).val();		
		var getarr = get_section_arr(selected);	
		document.getElementById("section_title_color_3").value=getarr["section_title_color"];//Title Color		
		document.getElementById("section_content_color_3").value=getarr["section_content_color"];//Content Color	
		document.getElementById("section_background_3_color").value=getarr["section_background_color"];
		document.getElementById("section_background_3").value=getarr["section_background"];//Section Background	
		document.getElementById("background_size_3").value=getarr["background_size"];//100% Width Background Image
		document.getElementById("full_width_3").value=getarr["full_width"];//Full Width
		document.getElementById("section_css_class_3").value=getarr["section_css_class"];//Section Css Class
		document.getElementById("section_content_3").value=getarr["section_content"];//Section Content		
	})

	$("#ct_select_section_temp_4").on("change", function(){
		var selected = $(this).val();		
		var getarr = get_section_arr(selected);	
		document.getElementById("section_title_color_4").value=getarr["section_title_color"];//Title Color		
		document.getElementById("section_content_color_4").value=getarr["section_content_color"];//Content Color	
		document.getElementById("section_background_4_color").value=getarr["section_background_color"];
		document.getElementById("section_background_4").value=getarr["section_background"];//Section Background	
		document.getElementById("background_size_4").value=getarr["background_size"];//100% Width Background Image
		document.getElementById("full_width_4").value=getarr["full_width"];//Full Width
		document.getElementById("section_css_class_4").value=getarr["section_css_class"];//Section Css Class
		document.getElementById("section_content_4").value=getarr["section_content"];//Section Content
	})	
		
	$("#ct_select_section_temp_5").on("change", function(){
		var selected = $(this).val();		
		var getarr = get_section_arr(selected);	
		document.getElementById("section_title_color_5").value=getarr["section_title_color"];//Title Color		
		document.getElementById("section_content_color_5").value=getarr["section_content_color"];//Content Color
		document.getElementById("section_background_5_color").value=getarr["section_background_color"];
		document.getElementById("section_background_5").value=getarr["section_background"];//Section Background	
		document.getElementById("background_size_5").value=getarr["background_size"];//100% Width Background Image
		document.getElementById("full_width_5").value=getarr["full_width"];//Full Width
		document.getElementById("section_css_class_5").value=getarr["section_css_class"];//Section Css Class
		document.getElementById("section_content_5").value=getarr["section_content"];//Section Content		
	})
	
	$("#ct_select_section_temp_6").on("change", function(){
		var selected = $(this).val();		
		var getarr = get_section_arr(selected);
		document.getElementById("section_title_color_6").value=getarr["section_title_color"];//Title Color		
		document.getElementById("section_content_color_6").value=getarr["section_content_color"];//Content Color
		document.getElementById("section_background_6_color").value=getarr["section_background_color"];
		document.getElementById("section_background_6").value=getarr["section_background"];//Section Background	
		document.getElementById("background_size_6").value=getarr["background_size"];//100% Width Background Image
		document.getElementById("full_width_6").value=getarr["full_width"];//Full Width
		document.getElementById("section_css_class_6").value=getarr["section_css_class"];//Section Css Class
		document.getElementById("section_content_6").value=getarr["section_content"];//Section Content		
	})

	$("#ct_select_section_temp_7").on("change", function(){
		var selected = $(this).val();		
		var getarr = get_section_arr(selected);		
		document.getElementById("section_title_color_7").value=getarr["section_title_color"];//Title Color		
		document.getElementById("section_content_color_7").value=getarr["section_content_color"];//Content Color	
		document.getElementById("section_background_7_color").value=getarr["section_background_color"];		
		document.getElementById("section_background_7").value=getarr["section_background"];//Section Background	
		document.getElementById("background_size_7").value=getarr["background_size"];//100% Width Background Image
		document.getElementById("full_width_7").value=getarr["full_width"];//Full Width
		document.getElementById("section_css_class_7").value=getarr["section_css_class"];//Section Css Class
		document.getElementById("section_content_7").value=getarr["section_content"];//Section Content		
	})

	$("#ct_select_section_temp_8").on("change", function(){
		var selected = $(this).val();		
		var getarr = get_section_arr(selected);		
		document.getElementById("section_title_color_8").value=getarr["section_title_color"];//Title Color		
		document.getElementById("section_content_color_8").value=getarr["section_content_color"];//Content Color
		document.getElementById("section_background_8_color").value=getarr["section_background_color"];
		document.getElementById("section_background_8").value=getarr["section_background"];//Section Background	
		document.getElementById("background_size_8").value=getarr["background_size"];//100% Width Background Image
		document.getElementById("full_width_8").value=getarr["full_width"];//Full Width
		document.getElementById("section_css_class_8").value=getarr["section_css_class"];//Section Css Class
		document.getElementById("section_content_8").value=getarr["section_content"];//Section Content		
	})
	
	$("#ct_select_section_temp_9").on("change", function(){
		var selected = $(this).val();		
		var getarr = get_section_arr(selected);	
		document.getElementById("section_title_color_9").value=getarr["section_title_color"];//Title Color		
		document.getElementById("section_content_color_9").value=getarr["section_content_color"];//Content Color
		document.getElementById("section_background_9_color").value=getarr["section_background_color"];
		document.getElementById("section_background_9").value=getarr["section_background"];//Section Background	
		document.getElementById("background_size_9").value=getarr["background_size"];//100% Width Background Image
		document.getElementById("full_width_9").value=getarr["full_width"];//Full Width
		document.getElementById("section_css_class_9").value=getarr["section_css_class"];//Section Css Class
		document.getElementById("section_content_9").value=getarr["section_content"];//Section Content		
	})
  
	function get_section_arr(str)
	{
		
		str = str.replace(/^(\s|\u00A0)+/,'').replace(/(\s|\u00A0)+$/,'');
		var arr=new Object();  
		switch (str) {
			case "video":
				// ...				
				arr['section_title']='video';//Section Title
				arr["section_title_color"]='';//Title Color	
				arr["section_content_color"]='#ffffff';//Content Color	
				arr["section_background_color"]= '';				
				arr["section_background"]=imagepath+'default-bg-section.png';//Section Background
				arr["background_size"]='yes';//100% Width Background Image																
				arr["full_width"]='yes';//Full Width
				arr["section_css_class"]='';//Section Css Class
				arr["section_content"]=
										'<div class="ct_setion_text">\n'+
										'  <h1>The jQuery slider that just slides.</h1>\n'+
										'  <p class="ct_slider_text">No fancy effects or unnecessary markup.</p>\n'+
										'  <a class="btn" href="#download">Download</a>\n'+
										'</div>';//Section Content				
				
				break;
			case "slider":
				arr["section_title"]='slider';//Section Title
				arr["section_title_color"]='';//Title Color	
				arr["section_content_color"]='#ffffff';//Content Color				
				arr["section_background"]=imagepath+'default-bg-section.png';//Section Background	
				arr["background_size"]='yes';//100% Width Background Image																
				arr["full_width"]='yes';//Full Width
				arr["section_css_class"]='';//Section Css Class
				arr["section_content"]='';//Section Content
				break;
			case "columns":
				arr["section_title"]='columns';//Section Title
				arr["section_title_color"]='#00bceb';//Title Color	
				arr["section_content_color"]='#595959';//Content Color				
				//arr["section_anchor"]='section-columns';//Section ID	
				arr["section_background_color"]= '';				
				arr["section_background"]=imagepath+'default-bg-section.png';//Section Background
				arr["background_size"]='no';//100% Width Background Image																
				arr["full_width"]='no';//Full Width
				arr["section_css_class"]='';//Section Css Class
				arr["section_content"]=
					'<div class="ct_section_title">\n '+
					'  <h2>We are always dedicated to...</h2>\n '+
					'  <h3>CooThemes.com is a creative design company focused on visual presentation and interactive experience!</h3> \n '+
					'</div>\n '+
					'<div class="row">\n '+
					'  <div class="col-xs-12 col-sm-6 col-lg-3">\n '+
					'    <div class="thumbnail">\n '+
					'      <div class="circle fa-v1"><i class="fa fa-file-image-o fa-5x">&nbsp;</i></div>\n '+
					'	   <div class="caption">\n '+
					'		  <h3><a href="#">Beautiful</a></h3>\n '+
					'		  <span class="ct_columns_text">Impress your potential cusomters with a unique and fantastic website.</span>\n '+
					'	   </div>\n '+
					'    </div>\n '+
					'  </div> \n '+
					'  <div class="col-xs-12 col-sm-6  col-lg-3">\n '+
					'    <div class="thumbnail">\n '+
					'	   <div class="circle  fa-v2"><i class="fa fa-tachometer fa-5x">&nbsp;</i></div>\n '+
					'	   <div class="caption">\n '+
					'		 <h3><a href="#">Easy to Use</a></h3>\n '+
					'		 <span class="ct_columns_text">Shortcodes, page templates and theme options give easy control over your websites.</span>\n '+
					'	   </div>\n '+
					'    </div>\n '+
					'  </div>\n '+
					'  <div class="col-xs-12 col-sm-6  col-lg-3">\n '+
					'    <div class="thumbnail">\n '+
					'	   <div class="circle  fa-v3"><i class="fa fa-tablet fa-5x">&nbsp;</i></div>\n '+
					'	   <div class="caption">\n '+
					'		 <h3><a href="#">Responsive</a></h3>\n '+
					'		 <span class="ct_columns_text">All of our WordPress themes are responsive on mainstream browsers and mobile devices.</span>\n '+
					'	   </div>\n '+
					'    </div>\n '+
					'  </div>\n '+
					'  <div class="col-xs-12 col-sm-6 col-lg-3">\n '+
					'    <div class="thumbnail">\n '+
					'      <div class="circle fa-v4"><i class="fa fa-money fa-5x">&nbsp;</i></div>\n '+
					'      <div class="caption">\n '+
					'        <h3><a href="#">Affordable</a></h3>\n '+
					'        <span class="ct_columns_text">Top design quality, fastest tech support and many other great features at an affodable price.</span>\n '+
					'      </div>\n '+
					'    </div>\n '+
					'  </div> \n '+					
					'</div>';//Section Content
				break;
				
			case "post_list":
				arr["section_title"]='post_list';//Section Title
				arr["section_title_color"]='#ffffff';//Title Color	
				arr["section_content_color"]='#ffffff';//Content Color				
				//arr["section_anchor"]='section-post_list';//Section ID	
				arr["section_background_color"]= '#222222';//Section Background	
				arr["section_background"]= '';
				
				arr["section_post_list"]= 'https://www.coothemes.com/blog/';
				arr["background_size"]='yes';//100% Width Background Image																
				arr["full_width"]='yes';//Full Width
				arr["section_css_class"]='';//Section Css Class
				arr["section_content"]=
					'<h2 class="case-tx0">Perfect Solution for Your Project. </h2>\n '+
					'<h3 class="case-tx1">Our constant innovation meets your specific needs, here you can check out our most recent news...</h3>'
					;//Section Content
				break;				
			case "team":
				arr["section_title"]='team';//Section Title
				arr["section_title_color"]='#3b3b3b';//Title Color	
				arr["section_content_color"]='#595959';//Content Color				
				//arr["section_anchor"]='section-team';//Section ID	
				arr["section_background_color"]= '';				
				arr["section_background"]=imagepath+'default-bg-section.png';//Section Background	
				arr["background_size"]='yes';//100% Width Background Image																
				arr["full_width"]='no';//Full Width
				arr["section_css_class"]='';//Section Css Class
				arr["section_content"]=
					'<div class="ct_section_title">\n '+
					'  <h2>Our Team</h2>\n '+
					'  <h3>CooThemes.com is a creative design company focused on visual presentation and interactive experience!</h3> \n '+
					'</div>\n '+								   
					'<div class="row">\n '+
					'  <div class="col-xs-12 col-sm-6 col-lg-3">\n '+
					'    <div class="customer_img"><img src="'+imagepath+'t-anna.jpg" width="200"></div>\n '+
					'    <p class="clear"></p>\n '+
					'    <p class="ct_team_text">Anna</p>\n '+
					'    <p class="ct_team_text">Support</p>\n '+
					'    <p class="ct_team_bookmarks">\n '+
					'      <a href="#" class="tooltip-test" data-toggle="tooltip"  title="Facebook"><i class="fa fa-facebook fa-2x">&nbsp;</i></a> \n '+                  	
					'	   <a href="#" class="tooltip-test" data-toggle="tooltip"  title="Twitter"><i class="fa fa-twitter fa-2x">&nbsp;</i></a>\n '+
					'      <a href="#" class="tooltip-test" data-toggle="tooltip"  title="Youtube"><i class="fa fa-youtube fa-2x">&nbsp;</i></a>\n '+
					'    </p>\n '+
					'    <p class="ct_team_text2">consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\n '+
					'  </div>\n '+ 
					'  <div class="col-xs-12 col-sm-6 col-lg-3">\n '+
					'    <div class="customer_img"><img src="'+imagepath+'t-Brown.jpg" width="200"></div>\n '+
					'    <p class="clear"></p>\n '+
					'    <p class="ct_team_text">Brown</p>\n '+
					'    <p class="ct_team_text">Designer</p>\n '+
					'    <p class="ct_team_bookmarks">\n '+
					'      <a href="#" class="tooltip-test" data-toggle="tooltip"  title="Facebook"><i class="fa fa-facebook fa-2x">&nbsp;</i></a>\n '+                    	
					'      <a href="#" class="tooltip-test" data-toggle="tooltip"  title="Twitter"><i class="fa fa-twitter fa-2x">&nbsp;</i></a>\n '+
					'      <a href="#" class="tooltip-test" data-toggle="tooltip"  title="Youtube"><i class="fa fa-youtube fa-2x">&nbsp;</i></a>\n '+
					'    </p>\n '+
					'    <p class="ct_team_text2"> consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> \n '+      
					'  </div>\n '+
					'  <div class="col-xs-12 col-sm-6 col-lg-3">\n '+
					'    <div class="customer_img"><img src="'+imagepath+'t-emma.jpg" width="200"></div>\n '+
					'    <p class="clear"></p>\n '+
					'    <p class="ct_team_text">Emma</p>\n '+
					'    <p class="ct_team_text">Designer</p>\n '+
					'    <p class="ct_team_bookmarks">\n '+
					'      <a href="#" class="tooltip-test" data-toggle="tooltip"  title="Facebook"><i class="fa fa-facebook fa-2x">&nbsp;</i></a>\n '+                   	
					'      <a href="#" class="tooltip-test" data-toggle="tooltip"  title="Twitter"><i class="fa fa-twitter fa-2x">&nbsp;</i></a>\n '+
					'      <a href="#" class="tooltip-test" data-toggle="tooltip"  title="Youtube"><i class="fa fa-youtube fa-2x">&nbsp;</i></a>\n '+
					'    </p>\n '+
					'    <p class="ct_team_text2"> consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\n '+
					'  </div>\n '+
					'  <div class="col-xs-12 col-sm-6 col-lg-3">\n '+
					'    <div class="customer_img"><img src="'+imagepath+'t-Hannah.jpg" width="200"></div>\n '+
					'    <p class="clear"></p>\n '+
					'    <p class="ct_team_text">Hannah</p>\n '+
					'    <p class="ct_team_text">SUPPORT</p>\n '+
					'    <p class="ct_team_bookmarks">\n '+
					'      <a href="#" class="tooltip-test" data-toggle="tooltip"  title="Facebook"><i class="fa fa-facebook fa-2x">&nbsp;</i></a>\n '+
					'      <a href="#" class="tooltip-test" data-toggle="tooltip"  title="Twitter"><i class="fa fa-twitter fa-2x">&nbsp;</i></a>\n '+
					'      <a href="#" class="tooltip-test" data-toggle="tooltip"  title="Youtube"><i class="fa fa-youtube fa-2x">&nbsp;</i></a>\n '+
					'    </p>\n '+
					'    <p class="ct_team_text2"> consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>  \n '+                    
					'  </div> \n '+                                         
					'</div>';//Section Content
				break;			


			case "facts":
				arr["section_title"]='facts';//Section Title
				arr["section_title_color"]='#303030';//Title Color	
				arr["section_content_color"]='#303030';//Content Color				
				//arr["section_anchor"]='section-columns';//Section ID	
				arr["section_background_color"]= '#ffffff';				
				arr["section_background"]='';//Section Background
				arr["background_size"]='yes';//100% Width Background Image																
				arr["full_width"]='no';//Full Width
				arr["section_css_class"]='';//Section Css Class
				arr["section_content"]=
					'<h2 class="case-tx0">FACTS</h2>\n '+ 				
                	'<div class="row ct_facts"> \n '+                
                    '  <div class="col-xs-12 col-sm-6 col-lg-3 ct_clear_margin_padding"> \n '+               
                    '    <span id="" class="fact" data-fact="88">0</span>\n '+ 
                    '    <p>Employees</p>\n '+ 
                    '  </div>\n '+ 
                    '  <div class="col-xs-12 col-sm-6 col-lg-3 ct_clear_margin_padding">  \n '+                
                    '    <span id="" class="fact" data-fact="168">0</span>\n '+ 
                    '    <p>Projects</p>\n '+ 
                    '  </div>\n '+ 
                    '  <div class="col-xs-12 col-sm-6 col-lg-3 ct_clear_margin_padding"> \n '+              
                    '    <span id="" class="fact" data-fact="76">0</span>\n '+ 
                    '    <p>Dogs</p>\n '+ 
                    '  </div>\n '+ 
                    '  <div class="col-xs-12 col-sm-6 col-lg-3 ct_clear_margin_padding"> \n '+              
                    '    <span id="" class="fact" data-fact="18">0</span>\n '+ 
                    '    <p>Offices</p>\n '+ 
                    '  </div>\n '+ 
                	'</div>';//Section Content
				break;


			case "progress_bar":
				arr["section_title"]='progress_bar';//Section Title
				arr["section_title_color"]='#303030';//Title Color	
				arr["section_content_color"]='#ffffff';//Content Color				
				//arr["section_anchor"]='section-columns';//Section ID	
				arr["section_background_color"]= '#61c148';	//Section Background color			
				arr["section_background"]='';//Section Background img
				arr["background_size"]='yes';//100% Width Background Image																
				arr["full_width"]='no';//Full Width
				arr["section_css_class"]='';//Section Css Class
				arr["section_content"]=
					'<h2 class="case-tx0">OUR SKILLS</h2>\n '+ 
					'<div class="ct_progress" >\n '+ 
					'  <div class="col-md-6 ">\n '+ 
					'    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\n '+ 
					'    <div class="clear"></div>\n '+ 
					'  </div>\n '+ 
					
					'  <div class="col-md-6">\n '+ 
					'    <div class="col-md-3  ct_progress_px">Web Design</div>\n '+ 
					'    <div class="col-md-9 progress ct_clear_margin_padding ct_progress_px">\n '+ 
					'      <div class="progress-bar ct_progress_width" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" data-percent="80">\n '+ 
					'        <div>80% </div>\n '+ 
					'      </div>\n '+ 
					'    </div>\n '+ 
					'    <div class="ct_clear"></div>\n '+ 
					'    <div class="col-md-3 ct_progress_px">HTML/CSS</div>\n '+ 
					'    <div class="col-md-9 progress ct_clear_margin_padding ct_progress_px">\n '+ 
					'      <div class="progress-bar progress-bar-success  ct_progress_width" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"  data-percent="70">\n '+ 
					'        <div>70% </div>\n '+ 
					'      </div>\n '+ 
					'    </div>\n '+ 
					'    <div class="ct_clear"></div>\n '+ 
					'    <div class="col-md-3 ct_progress_px">PHP Coding</div>\n '+ 
					'    <div class="col-md-9 progress ct_clear_margin_padding ct_progress_px">\n '+ 
					'      <div class="progress-bar progress-bar-info ct_progress_width" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"  data-percent="90">\n '+ 
					'        <div>90% </div>\n '+ 
					'      </div>\n '+ 
					'    </div>\n '+ 
					'    <div class="ct_clear"></div>\n '+ 
					'    <div class="col-md-3 ct_progress_px">SEO</div>\n '+ 
					'    <div class="col-md-9 progress ct_clear_margin_padding ct_progress_px">\n '+ 
					'      <div class="progress-bar progress-bar-warning ct_progress_width" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" data-percent="85">\n '+ 
					'        <div>85% </div>\n '+ 
					'      </div>\n '+ 
					'    </div>\n '+  
					'  </div>\n '+  				                                        
					'</div>';//Section Content
				break;

			case "price":
				arr["section_title"]='price';//Section Title
				arr["section_title_color"]='#303030';//Title Color	
				arr["section_content_color"]='#303030';//Content Color				
				//arr["section_anchor"]='section-columns';//Section ID	
				arr["section_background_color"]= '#ffffff';				
				arr["section_background"]='';//Section Background
				arr["background_size"]='yes';//100% Width Background Image																
				arr["full_width"]='no';//Full Width
				arr["section_css_class"]='';//Section Css Class
				arr["section_content"]=
					'<h2 class="case-tx0">PRICE TABLE</h2>\n '+ 
					'<div id="pricePlans">\n '+ 
					'  <ul id="plans">\n '+ 
					'    <li class="plan">\n '+ 
					'      <ul class="planContainer">\n '+ 
					'        <li class="title"><h2>Plan 1</h2></li>\n '+ 
					'        <li class="price"><p>$10/<span>month</span></p></li>\n '+ 
					'        <li>\n '+ 
					'          <ul class="options">\n '+ 
					'            <li>2x <span>option 1</span></li>\n '+ 
					'            <li>Free <span>option 2</span></li>\n '+ 
					'            <li>Unlimited <span>option 3</span></li>\n '+ 
					'            <li>Unlimited <span>option 4</span></li>\n '+ 
					'            <li>1x <span>option 5</span></li>\n '+ 
					'          </ul>\n '+ 
					'        </li>\n '+ 
					'        <li class="button"><a href="#">Purchase</a></li>\n '+ 
					'      </ul>\n '+ 
					'    </li>\n '+ 
					
					'    <li class="plan">\n '+ 
					'      <ul class="planContainer">\n '+ 
					'        <li class="title"><h2 class="bestPlanTitle">Plan 2</h2></li>\n '+ 
					'        <li class="price"><p class="bestPlanPrice">$20/month</p></li>\n '+ 
					'        <li>\n '+ 
					'          <ul class="options">\n '+ 
					'            <li>2x <span>option 1</span></li>\n '+ 
					'            <li>Free <span>option 2</span></li>\n '+ 
					'            <li>Unlimited <span>option 3</span></li>\n '+ 
					'            <li>Unlimited <span>option 4</span></li>\n '+ 
					'            <li>1x <span>option 5</span></li>\n '+ 
					'          </ul>\n '+ 
					'        </li>\n '+ 
					'        <li class="button"><a class="bestPlanButton" href="#">Purchase</a></li>\n '+ 
					'      </ul>\n '+ 
					'    </li>\n '+ 
					
					'    <li class="plan">\n '+ 
					'      <ul class="planContainer">\n '+ 
					'        <li class="title"><h2>Plan 3</h2></li>\n '+ 
					'        <li class="price"><p>$30/<span>month</span></p></li>\n '+ 
					'        <li>\n '+ 
					'          <ul class="options">\n '+ 
					'            <li>2x <span>option 1</span></li>\n '+ 
					'            <li>Free <span>option 2</span></li>\n '+ 
					'            <li>Unlimited <span>option 3</span></li>\n '+ 
					'            <li>Unlimited <span>option 4</span></li>\n '+ 
					'            <li>1x <span>option 5</span></li>\n '+ 
					'          </ul>\n '+ 
					'        </li>\n '+ 
					'        <li class="button"><a href="#">Purchase</a></li>\n '+ 
					'      </ul>\n '+ 
					'    </li>\n '+ 
					
					'    <li class="plan">\n '+ 
					'      <ul class="planContainer">\n '+ 
					'        <li class="title"><h2>Plan 4</h2></li>\n '+ 
					'        <li class="price"><p>$40/<span>month</span></p></li>\n '+ 
					'        <li>\n '+ 
					'          <ul class="options">\n '+ 
					'            <li>2x <span>option 1</span></li>\n '+ 
					'            <li>Free <span>option 2</span></li>\n '+ 
					'            <li>Unlimited <span>option 3</span></li>\n '+ 
					'            <li>Unlimited <span>option 4</span></li>\n '+ 
					'            <li>1x <span>option 5</span></li>\n '+ 
					'          </ul>\n '+ 
					'        </li>\n '+ 
					'        <li class="button"><a href="#">Purchase</a></li>\n '+ 
					'      </ul>\n '+ 
					'    </li>\n '+ 
					'  </ul> <!-- End ul#plans -->\n '+ 
                	'</div><!--div id="pricePlans"-->';//Section Content
				break;
				
			default:
				arr = '';
		}		
		
		if(arr != ''){
			return arr;
		}else{		
			return 'error';
		}
	}




	  
});	  
