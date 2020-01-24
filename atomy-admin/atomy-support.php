<?php
/**
* atomy-support.php
* @link https://www.denisfranchi.com
*
* @package Atomy
*
*  @version 1.0.4
*/

function atomy_page_display() {
?>

 <div class="at-header-admin">
      <div class="at-logo-admin">
		   	<h2><?php echo esc_html('Atomy','atomy');?></h2>
		  	<span><?php echo esc_html('V 1.0.4','atomy');?></span>
		  </div>
		   <div class="at-logo-icon-admin">
		   	<span class="dashicons dashicons-screenoptions"></span>
	     </div>
   </div>
<!-- Tab links -->
<div class="atomy-tab-support">
	<div class="tab">
		<button class="tablinks" onclick="atomyopenGuide(event, 'Welcome')"id="defaultOpen"><?php esc_html_e('Welcome','atomy'); ?></button>
		<button class="tablinks" onclick="atomyopenGuide(event, 'Help')"><?php esc_html_e('Help','atomy'); ?></button>
		<button class="tablinks" onclick="atomyopenGuide(event, 'Options')"><?php esc_html_e('Pro Version','atomy'); ?></button>
		<button class="tablinks" onclick="atomyopenGuide(event, 'Changelog')"><a class="at-nav-link" href="<?php echo esc_url(atomy_url_updates_theme); ?>" target="_blank"><?php echo esc_html('Changelog','atomy')?></a></button>
	</div>
	<!-- Tab content -->
	<!-- Welcome -->
	<div id="Welcome" class="tabcontent">
		<h3 class="atomy-welkome-support-title"><?php esc_html_e('Welcome','atomy' ); ?></h3>
		<p class="atomy-welkome-support"><?php esc_html_e('Thank you for choosing Atomy.','atomy');?><br>
			<?php esc_html_e('The theme is ready to be used. You can customize everything you want in a few simple clicks directly from the front end.','atomy'); ?><br>
			<?php esc_html_e('This theme was created to be used with the WooCommerce plugin to fully exploit its potential.','atomy');?><br>
			<?php esc_html_e('You can choose from 4 available demos by importing them in a few minutes, or you can create your site by customizing it as you prefer.','atomy');?><br>
			<?php esc_html_e('The code of this theme was designed to create a multilingual site in a very simple and fast way.','atomy');?><br>
			<?php esc_html_e('Only one demo is available in the free version!','atomy')?>
		  </p>
	</div>
	<!-- Help -->
	<div id="Help" class="tabcontent">
		<div class="at-documentation">
	<div class="at-header-help">
	  <h2><?php echo esc_html('Documentation','atomy');?></h2>
	</div>
	<div class="at-header-help-p">
	   <p><?php echo esc_html('In this page you can view general frequently asked questions to help you get started. Support is only available for the','atomy')?> <a target="_blank" href="<?php echo esc_url(atomy_url_go_pro_theme);?>"><?php echo esc_html('PRO version!','atomy')?></a>
	      <?php echo esc_html('For more, refer to our documentation site or click the links below:','atomy')?></p>
          <div class="at-button-documentation">
		   	<a class="at-read-documentation" target="_blank" href="<?php echo esc_url(atomy_url_documentation_theme); ?>"><?php echo esc_html('Read Documentation','atomy');?></a>
		   <a class="at-theme-support" target="_blank" href="<?php echo esc_url(atomy_url_support_theme); ?>"><?php echo esc_html('Theme Support','atomy');?></a>
	     </div>
       </div>
    </div>
		<h3 class="atomy-welkome-support-title"><?php esc_html_e('Frequently Asked Questions','atomy' ); ?></h3>
		<a href="#" class="togglefaq"><span class="dashicons dashicons-plus at-plus"></span>
		  <?php esc_html_e('When installing the theme it gives me an error, the style sheet is missing, what am I doing wrong?','atomy')?>
		  <p class="at-number"><?php esc_html_e('1','atomy')?></p>
		</a>
          <div class="faqanswer">
            <p><?php esc_html_e('To solve the problem you need to: unzip the downloaded zip file, inside you can find (Documentation.zip/Licensing/Theme Files), open Theme Files, inside you find (atomy-child.zip/atomy.zip), use atomy.zip','atomy')?></p>
            <div class="at-full-article">
              <a target="_blank" href="<?php echo esc_url(atomy_url_faq_1_support); ?>"><?php esc_html_e('VIEW FULL ARTICLE','atomy')?></a>
         </div>
    </div>
	   <a href="#" class="togglefaq"><span class="dashicons dashicons-plus"></span>
		<?php esc_html_e('I entered the shortcode to display the Social Networks icons in a Widgets, but they do not appear, how can I do?','atomy')?>
		  <p class="at-number"><?php esc_html_e('2','atomy')?></p></a>
          <div class="faqanswer">
			 <p><?php esc_html_e('If they do not appear it means that you have not installed and activated the franchi-shortcode plugin','atomy')?></p>
			 <div class="at-full-article">
               <a target="_blank" href="<?php echo esc_url(atomy_url_faq_2_support); ?>"><?php esc_html_e('VIEW FULL ARTICLE','atomy')?></a>
             </div>
          </div>
		<a href="#" class="togglefaq"><span class="dashicons dashicons-plus"></span>
		<?php esc_html_e('How do I import a demo?','atomy')?>
		 <p class="at-number"><?php esc_html_e('3','atomy')?></p></a>
          <div class="faqanswer">
			 <p><?php esc_html_e('To import a demo you need to install the One Click Demo Import plugin, then go to Appearance -> ATOMY Import Demo','atomy')?></p>
			 <div class="at-full-article">
              <a target="_blank" href="<?php echo esc_url(atomy_url_faq_3_support); ?>"><?php esc_html_e('VIEW FULL ARTICLE','atomy')?></a>
            </div>
         </div>    
		   <a href="#" class="togglefaq"><span class="dashicons dashicons-plus"></span>
			<?php esc_html_e('The Customize is a bit slow to open up, how can I speed it up?','atomy')?>
			 <p class="at-number"><?php esc_html_e('4','atomy')?></p></a>
          <div class="faqanswer">
			 <p><?php esc_html_e('Atomy is, in total, customizable, so it has many controls in the Customize, to speed up its loading you can go to Appearance-> ATOMY -> Options','atomy')?></p>
			 <div class="at-full-article">
              <a target="_blank" href="<?php echo esc_url(atomy_url_faq_4_support); ?>"><?php esc_html_e('VIEW FULL ARTICLE','atomy')?></a>
            </div>
		  </div>
		  <div class="at-margin-bottom-tab"></div>
		<div class="atomy-clear-guide-support-admin"></div>
	</div>
   <!-- Options -->
   <div id="Options" class="tabcontent">  
		<h3 class="atomy-comp-support-title"><?php esc_html_e('PRO VERSION', 'atomy' ); ?></h3>
		<p class="atomy-welkome-support">
			<?php esc_html_e('Specifications Atomy theme','atomy');?>
		</p>
		<div class="atomy-guide-support-admin-comparison">
			<div class="comparison">
				<table>
					<thead>
						<tr>
							<th class="tl tl2"></th>
							<th class="product" style="background:#82B541;border-top-left-radius: 5px; border-left:0px;"><?php esc_html_e('FREE','atomy');?></th>
							<th class="product" style="background:#82B541;"><?php esc_html_e('PRO','atomy');?></th>
							</tr>
							<tr>
								<th></th>
								<th class="price-info">
									<div class="price-now"><span><?php esc_html_e('ATOMY - THEME','atomy');?></span><br>
										<p></p>
									</div>
								</th>
								<th class="price-info">
									<div class="price-now"><span><?php esc_html_e('ATOMY - THEME','atomy');?></span>
									</div>
								</th>
							</tr>
						</thead>
						<tbody>
							<!-- Logo -->
							<tr>
								<td></td>
									<td colspan="3"><?php esc_html_e('Logo Upload','atomy');?></td>
							</tr>
							<tr class="compare-row">
								<td><?php esc_html_e('Logo Upload','atomy');?></td>
								<td><span><i class="fa fa-check"></i></span>
								</td>
								<td><span><i class="fa fa-check"></i></span></td>
							</td>
						</tr>
						<!-- Font Awesome -->
						<tr>
							<td></td>
							<td colspan="3"><?php esc_html_e('Font Awesome Icons v5','atomy');?></td>
						</tr>
						<tr>
							<td><?php esc_html_e('Font Awesome Icons v5','atomy');?></td>
							<td><span><i class="fa fa-check"></i></span>
							</td>
							<td><span><i class="fa fa-check"></i></span></td>
						</td>
					</tr>
					<!-- Ready Retina -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Retina Ready','atomy');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Retina Ready','atomy');?></td>
						<td><span><i class="fa fa-check"></i></span>
						</td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Responsive -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Responsive Design','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Responsive Design','atomy');?></td>
						<td><span><i class="fa fa-check"></i></span>
						</td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Color Change -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Skin Color','atomy');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Skin Color','atomy');?></td>
						<td><span><?php esc_html_e('2','atomy');?></span>
						</td>
						<td><span><?php esc_html_e('8','atomy');?></span></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Custom Color','atomy');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Custom Color','atomy');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span>
						</td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Font Family -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Font Family','atomy');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Font Family','atomy');?></td>
						<td><span><?php esc_html_e('8','atomy');?></span>
						</td>
						<td><span><?php esc_html_e('15','atomy');?></span></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Custom Font','atomy');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Custom Font','atomy');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span>
						</td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Layou setting -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Layout Settings','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Layout Settings','atomy');?></td>
						<td><span><i class="fa fa-check"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Slides -->
					<tr>
						<td></td>
						<td colspan="4"><?php esc_html_e('Slider','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Slider','atomy');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- More Widgets -->
					<tr>
						<td></td>
						<td colspan="4"><?php esc_html_e('More Areas Widgets','atomy');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('More Areas Widgets','atomy');?></td>
						<td><span><?php esc_html_e('8','atomy');?></span></td>
						<td><span><?php esc_html_e('17','atomy');?></span></td>
					</tr>
					<!-- Menu types -->
					<tr>
						<td></td>
						<td colspan="4"><?php esc_html_e('Menu Types','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Menu Types','atomy');?></td>
						<td><span><?php esc_html_e('1','atomy');?></span></td>
						<td><span><?php esc_html_e('2','atomy');?></span></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="4"><?php esc_html_e('Menu Layout','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Menu Layout','atomy');?></td>
						<td><span><?php esc_html_e('1','atomy');?></span></td>
						<td><span><?php esc_html_e('2','atomy');?></span></td>
					</tr>
					<!-- Page Template -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Page Templates','atomy');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Page Templates','atomy');?></td>
						<td><span><?php esc_html_e('1','atomy');?></span></td>
						<td><span><?php esc_html_e('5','atomy');?></span></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Section Templates','atomy');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Section Templates','atomy');?></td>
						<td><span><?php esc_html_e('11','atomy');?></span></td>
						<td><span><?php esc_html_e('36','atomy');?></span></td>
					</tr>
					<!-- Blog Layout -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Blog Layouts','atomy');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Blog Layouts','atomy');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><i class="fa fa-check"></i></td>
					</tr>
					<!-- Pop-ip Light Box -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Pop-up Light Box','atomy');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Pop-up Light Box','atomy');?></td>
						<td><i class="fa fa-check"></i></td>
						<td><i class="fa fa-check"></i></td>
					</tr>
					<!-- Gutenberg -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Gutenberg Compatible','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Gutenberg Compatible','atomy');?></td>
						<td><span><i class="fa fa-check"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Portfolio -->
					<tr>
						<td></td>
						<td colspan="4"><?php esc_html_e('Portfolio','atomy');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Portfolio','atomy');?></td>
						<td><span><?php esc_html_e('Section Only','atomy');?></span></td>
						<td><span><?php esc_html_e('Section and Page','atomy');?></span></td>
					</tr>
					<!-- Woocommerce compatible -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Woocommerce Complatible','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Woocommerce Complatible','atomy');?></td>
						<td><span><i class="fa fa-check"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Woocommerce Template -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Woocommerce Templates','atomy');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Woocommerce Templates','atomy');?></td>
						<td><span><i class="fa fa-check"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Dropdown Menu -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Dropdown Menu','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Dropdown Menu','atomy');?></td>
						<td><span><i class="fa fa-check"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
						<!-- Menu Sticky -->
						<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Menu Sticky','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Menu Sticky','atomy');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Logo in Footer-->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Logo in Footer','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Logo in Footer','atomy');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- 404 Customizable error page -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('404 Customizable error page','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('404 Customizable error page','atomy');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Child-Theme Included -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Child-Theme Included','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Child-Theme Included','atomy');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<tr>
						<!-- Demos -->
						<td></td>
						<td colspan="3"><?php esc_html_e('Demos Included','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Demos Included','atomy');?></td>
						<td><span><?php esc_html_e('1','atomy');?></span></td>
						<td><span><?php esc_html_e('4','atomy');?></span></td>
					</tr>
						<!-- Shotcode -->
						<td></td>
						<td colspan="3"><?php esc_html_e('Shortcode','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Shortcode','atomy');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
						<!-- Banner -->
						<td></td>
						<td colspan="3"><?php esc_html_e('Banner','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Banner','atomy');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
						<!-- Popup -->
						<td></td>
						<td colspan="3"><?php esc_html_e('Custom Popup','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Custom Popup','atomy');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
						<!-- Effect hover icons-->
						<td></td>
						<td colspan="3"><?php esc_html_e('Effect hover icons','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Effect hover icons','atomy');?></td>
						<td><span><?php esc_html_e('2','atomy');?></span></td>
						<td><span><?php esc_html_e('15','atomy');?></span></td>
					</tr>
					<!-- Header top area-->
					<td></td>
						<td colspan="3"><?php esc_html_e('Header top area','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Header top area','atomy');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
						<!-- Preloader -->
						<td></td>
						<td colspan="3"><?php esc_html_e('Preloader','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Preloader','atomy');?></td>
						<td><span><?php esc_html_e('2 Icons','atomy');?></span></td>
						<td><span><?php esc_html_e('6 + Icons','atomy');?></span></td>
					</tr>
					<!-- Transition Ready -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Transition Ready','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Transition Ready','atomy');?></td>
						<td><span><i class="fa fa-check"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Multy Language -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Multy Language','atomy');?></td>
					</tr>
					<tr>
						<td><?php esc_html_e('Multy Language','atomy');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<!-- Full Support -->
					<tr>
						<td></td>
						<td colspan="3"><?php esc_html_e('Full Support','atomy');?></td>
					</tr>
					<tr class="compare-row">
						<td><?php esc_html_e('Full Support','atomy');?></td>
						<td><span><i class="fas fa-times avik-icon-free"></i></span></td>
						<td><span><i class="fa fa-check"></i></span></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td><div class="avik-no-button-free"></div></td>
						<td><a href="<?php echo esc_url(atomy_url_go_pro_theme);?>" class="price-buy" target="_blank"><?php esc_html_e('GO PRO','atomy');?><span class="hide-mobile"></span></a></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="avik-clear-guide-support-admin"></div>


</div>
<script>
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>


<script>
//faq toggle stuff 
jQuery(function($){ 
$('.togglefaq').click(function(e) {
e.preventDefault();
var notthis = $('.active').not(this);
notthis.find('.dashicons-minus').addClass('dashicons-plus').removeClass('dashicons-minus');
notthis.toggleClass('active').next('.faqanswer').slideToggle(300);
 $(this).toggleClass('active').next().slideToggle("fast");
$(this).children('span').toggleClass('dashicons-plus dashicons-minus');
});
});
</script>

<?php
/* And Settings Page */
}







