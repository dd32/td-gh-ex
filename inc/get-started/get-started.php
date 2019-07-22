<?php
//about theme info
add_action( 'admin_menu', 'academic_education_gettingstarted' );
function academic_education_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started: Education Theme', 'academic-education'), esc_html__('Get Started', 'academic-education'), 'edit_theme_options', 'academic_education_guide', 'academic_education_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function academic_education_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/inc/get-started/get-started.css');
   //wp_enqueue_script('tabs', get_template_directory_uri() . '/inc/getting-started/js/tab.js');
}
add_action('admin_enqueue_scripts', 'academic_education_admin_theme_style');

//guidline for about theme
function academic_education_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'academic-education' );
?>

<div class="wrapper-info">
	<div class="top-section">
	    <div class="col-left">
	    	<h2><?php esc_html_e( 'Welcome to Academic Education Theme', 'academic-education' ); ?></h2>
	    	<span class="version">Version: <?php echo esc_html($theme['Version']);?></span>
	    	<p><?php esc_html_e('Academic Education theme is suitable for college, School, university, LMS, Training Center, Academy, Primary School, High School and Kindergarten and various educational websites. and hey you can even put it use for tuition classes, coaching classes, personal, blogging and any small business, we are not leaving anything behind. .A highly flexible, versatile yet multipurpose theme that can be used to build business and corporate websites. This theme comprises of news, added filter feature, personalization options with a clean professional design that is user friendly. Not only that you can also find useful sections such as testimonial section, Banner with Call to Action Button (CTA),social media links and so on. An excellent option for the educational institutions and businesses. The SEO optimization with unique and secure coding ensures safety of your data along with the SEO activities, web crawlers will love it. A lovely theme for your lovely university. lastly , we would like to talk about the insane customization viability in regards to add on features tools and short codes that we provide.', 'academic-education'); ?></p>
	    </div>
	    <div class="col-right">
	    	<div class="logo">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/academic.png" alt="" />
			</div>
	    </div>
	    <div class="info-link">
			<a href="<?php echo esc_url( ACADEMIC_EDUCATION_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'academic-education' ); ?></a>
			<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'academic-education'); ?></a>
			<a href="<?php echo esc_url( ACADEMIC_EDUCATION_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'academic-education'); ?></a>
			<a class="get-pro" href="<?php echo esc_url( ACADEMIC_EDUCATION_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'academic-education'); ?></a>
		</div>
	</div>

	<div class="accordain-sec">
		<div class="block">
		  	<input type="radio" name="city" id="cityA" checked />   
		  	<label for="cityA"><span><?php esc_html_e( 'Visit to our amazing Premium Theme', 'academic-education' ); ?></span><span class="dashicons dashicons-arrow-down"></span></label>
		  	<div class="info1">
			  	<h3><?php esc_html_e( 'Premium Theme Information', 'academic-education' ); ?></h3>
			  	<hr class="hr-accr">
			  	<div class="sec-left-inner">
			  		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/academic.png" alt="" />
			  		<p class="lite-para"><?php esc_html_e('The WordPress Education theme is a treasure for all those looking forward to providing their services in the education sector. Its flexibility has made it a multipurpose theme which can be used by all educational institutions like schools, colleges, coaching centres, private institutes, training institutes etc. It is thoughtfully designed to meet all your demands whether you are a newly opened coaching centre looking to establish yourself in the market or a reputed college eager to deliver fully groomed professionals to the countrys economy. It is the best theme to showcase your sincerity and dedication in providing educational services and hence gain the trust of your customers.', 'academic-education'); ?></p>

					<div class="info-link-top">
						<a href="<?php echo esc_url( ACADEMIC_EDUCATION_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Buy Now', 'academic-education' ); ?></a>
						<a href="<?php echo esc_url( ACADEMIC_EDUCATION_LIVE_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Live Demo', 'academic-education' ); ?></a>
						<a href="<?php echo esc_url( ACADEMIC_EDUCATION_PRO_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Pro Documentation', 'academic-education' ); ?></a>
					</div>					
			  	</div>
		  	</div>
		</div>
		<div class="block">
		  	<input type="radio" name="city" id="cityB"/>
		  	<label for="cityB"><span><?php esc_html_e( 'Theme Features', 'academic-education' ); ?></span><span class="dashicons dashicons-arrow-down"></span></label>
		  	<div class="info2">
			    <h3><?php esc_html_e( 'Lite Theme v/s Premium Theme', 'academic-education' ); ?></h3>
			  	<hr class="hr-accr">
			  	<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'academic-education'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'academic-education'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'academic-education'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'academic-education'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'academic-education'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'academic-education'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'academic-education'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'academic-education'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'academic-education'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'academic-education'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'academic-education'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Contact us Page Template', 'academic-education'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'academic-education'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Blog Templates & Layout', 'academic-education'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'academic-education'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Page Templates & Layout', 'academic-education'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'academic-education'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Full Documentation', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Latest WordPress Compatibility', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support 3rd Party Plugins', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Secure and Optimized Code', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Exclusive Functionalities', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Enable / Disable', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Google Font Choices', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Gallery', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Simple & Mega Menu Option', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Shortcodes', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Premium Membership', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Budget Friendly Value', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Priority Error Fixing', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Feature Addition', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('All Access Theme Pass', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Seamless Customer Support', 'academic-education'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( ACADEMIC_EDUCATION_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'academic-education'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
		 	</div>
		</div>
	</div>
</div>
<?php } ?>