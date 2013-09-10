<?php if(!defined('ABSPATH')) exit; //Exit if accessed directly
/* ------------------------------------------------------- */
/* THEME SETTINGS -  SANITIZE DATA ----------------------- */
function sanitize($data){
	return htmlentities(strip_tags(mysql_real_escape_string($data)));
}
/* ------------------------------------------------------- */
/* THEME SETTINGS -  OUTPUT ERRORS ----------------------- */
function output_errors($errors) {
	$output = array();
	foreach($errors as $error) {
		$output[] = '<li>'.$error.'</li>';
	}
	return '<ol class="errors"><h1 class="title">Oops ...</h1><p>The following field(s) was not updated for the reason(s) listed below. Please correct these errors and try again.</p>'.implode('', $output).'</ol>';
}

/* ------------------------------------------------------- */
/* GENERAL SETTINGS -------------------------------------- */
/* GENERAL SETTINGS - FAVICON ---------------------------- */
function favicon() {
	$favicon = get_option('favicon');
	if(!empty($favicon)) :
		echo '<link rel="shortcut icon" type="image/x-icon" href="'.$favicon.'" />';
	endif;	
}
/* ------------------------------------------------------- */
/* GENERAL SETTINGS - BREADCRUMBS ------------------------ */
function breadcrumbs() {
	$breadcrumbs = get_option('disable_breadcrumbs');
	if($breadcrumbs != 'checked') : ?>
        <!-- Breadcrumbs -->
        <div id="breadcrumbs">
            <div class="row">
                <ul id="crumbs" class="col width-100 last">
                <?php
					if(!is_home()) {
						echo '<li><a href="';
						echo home_url();
						echo '">';
						echo bloginfo('name');
						echo "</a></li>";
						if (is_category() || is_single()) {
							echo '<li>';
							the_category(' </li><li> ');
							if (is_single()) {
								echo "</li><li>";
								the_title();
								echo '</li>';
							}
						} elseif (is_page()) {
							echo '<li>';
							echo the_title();
							echo '</li>';
						}
					}
					elseif(is_tag()) { single_tag_title(); }
					elseif(is_day()) { echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>'; }
					elseif(is_month()) { echo"<li>Archive for "; the_time('F, Y'); echo'</li>'; }
					elseif(is_year()) { echo"<li>Archive for "; the_time('Y'); echo'</li>'; }
					elseif(is_author()) { echo"<li>Author Archive"; echo'</li>'; }
					elseif(isset($_GET['paged']) && !empty($_GET['paged'])) { echo "<li>Blog Archives"; echo'</li>'; }
					elseif(is_search()) { echo"<li>Search Results"; echo'</li>'; } ?>
                </ul>
			</div>
    	</div>
        <!-- Breadcrumbs end -->
       <?php
	endif;
}
/* ------------------------------------------------------- */
/* HOMEPAGE SETTINGS ------------------------------------- */
/* HOMEPAGE SETTINGS - CUSTOM HOMEPAGE ------------------- */
function custom_homepage() {
	$featured		= get_option('homepage_featured_content');
	$headline		= get_option('headline');
	$sub_headline	= get_option('sub_headline'); 
	$content		= get_option('content');
	$image			= get_option('image');
	if($featured == 'checked') :
		if(empty($image)) : ?>
			<!-- Featured -->
			<div id="featured">
				<div class="row">
					<div class="col width-100 last">
						<h1 class="headline"><?php echo $headline; ?></h1>
						<h2 class="sub-headline"><?php echo $sub_headline; ?></h2>
						<p><?php echo $content; ?></p>
					</div>
				</div>
			</div>
			<!-- Feature end -->
		<?php else : ?>
			<!-- Featured -->
			<div id="featured">
				<div class="row">
					<div class="col width-50">
						<h1 class="headline"><?php echo $headline; ?></h1>
						<h2 class="sub-headline"><?php echo $sub_headline; ?></h2>
						<p><?php echo $content; ?></p>
					</div>
					<div class="col width-50 last">
						<?php echo '<img src="'.$image.'" alt="" />'; ?>
					</div>
				</div>
			</div>
			<!-- Featured end -->
		<?php
		endif;
	endif;
}
/* ------------------------------------------------------- */
/* FOOTER SETTINGS --------------------------------------- */
/* FOOTER SETTINGS - DISCLIMAER -------------------------- */
function disclaimer() {
	$disclaimer = get_option('disclaimer');
	if(!empty($disclaimer)) :
		echo $disclaimer;
	endif;
}
/* ------------------------------------------------------- */
/* SLIDER SETTINGS --------------------------------------- */
function slider() {
	$slider = get_option('homepage_slider');
	$slides = get_option('slides');
	if($slider == 'checked') :
		if($slides >= 1) :
			//If there are more than two slides, js is required.
			if($slides >= 2) : 
				//Slide transition speed
				if(get_option('slide_transition') != "") :
					$transition = get_option('slide_transition');
				else :
					$transition = 1500;
				endif;
				//Slide pause rate
				if(get_option('slide_pause') != "") :
					$pause = get_option('slide_pause');
				else :
					$pause = 3000;
				endif; ?>
				<script type="text/javascript">(function($) { var mouseEnteredSlider = false; $(document).ready(function(){ $('#slider .slider').slider({ speed:<?php echo $transition; ?>, easing:'ease' }).mouseenter(function() { mouseEnteredSlider = true; }).mouseleave(function() { mouseEnteredSlider = false; }); setInterval(function() { if(!mouseEnteredSlider) { if($('.next').css('display') != 'none'){ $('.next').click(); } else { $('.slides span:first-child').click(); } } }, <?php echo $pause; ?>); }); })(jQuery);</script> 
				<?php endif; ?>
				<!-- Slider -->
				<div id="slider">
					<div class="row">
						<div class="slider col width-100 last">
							<?php
							echo '<ul>';
							for($i = 1; $i <= $slides; $i++) :	
								$location		= get_option('slide_image_'.$i);
								$destination	= get_option('slide_image_link_'.$i);
								if($location != "" && $destination != "") :
									echo '<li><a href="'.$destination.'"><img src="'.$location.'" alt="" /></a></li>';
								elseif($location != "" && $destination == "") :
									echo '<li><img src="'.$location.'" alt="" /></li>';
								endif;
							endfor;
							echo '</ul>'; ?>
						</div>
					</div>
				</div>
				<!-- Slider end -->
			<?php
		endif;
	endif;
}
/* ------------------------------------------------------- */
/* SOCIAL SETTINGS --------------------------------------- */
function social_icons() {
	$behance		= get_option('behance');
	$facebook		= get_option('facebook');
	$flickr			= get_option('flickr');
	$foursquare		= get_option('foursquare');
	$googleplus		= get_option('googleplus');
	$instagram		= get_option('instagram');
	$linkedin 		= get_option('linkedin');
	$myspace		= get_option('myspace');
	$pintrest		= get_option('pintrest');
	$stumbleupon	= get_option('stumbleupon');
	$tumblr			= get_option('tumblr');
	$twitter		= get_option('twitter');
	$vimeo			= get_option('vimeo');
	$wordpress		= get_option('wordpress');
	$yelp			= get_option('yelp');
	$youtube		= get_option('youtube');
	echo "<ul class='social-icons'>";
	if(!empty($behance)) :
		echo "<li class='behance'><a href='".$behance."'></a></li>";
	endif;
	if(!empty($facebook)) :
		echo "<li class='facebook'><a href='".$facebook."'></a></li>";
	endif;
	if(!empty($flickr)) :
		echo "<li class='flickr'><a href='".$flickr."'></a></li>";
	endif;
	if(!empty($foursquare)) :	
		echo "<li class='foursquare'><a href='".$foursquare."'></a></li>";
	endif;
	if(!empty($googleplus)) :
		echo "<li class='googleplus'><a href='".$googleplus."'></a></li>";
	endif;
	if(!empty($instagram)) :
		echo "<li class='instagram'><a href='".$instagram."'></a></li>";
	endif;
	if(!empty($linkedin)) :
		echo "<li class='linkedin'><a href='".$linkedin."'></a></li>";
	endif;
	if(!empty($myspace)) :
		echo "<li class='myspace'><a href='".$myspace."'></a></li>";
	endif;
	if(!empty($pintrest)) :
		echo "<li class='pintrest'><a href='".$pintrest."'></a></li>";
	endif;
	if(!empty($stumbleupon)) :
		echo "<li class='stumbleupon'><a href='".$stumbleupon."'></a></li>";
	endif;	
	if(!empty($tumblr)) :
		echo "<li class='tumblr'><a href='".$tumblr."'></a></li>";
	endif;	
	if(!empty($twitter)) :
		echo "<li class='twitter'><a href='".$twitter."'></a></li>";
	endif;
	if(!empty($vimeo)) :
		echo "<li class='vimeo'><a href='".$vimeo."'></a></li>";
	endif;
	if(!empty($wordpress)) :
		echo "<li class='wordpress'><a href='".$wordpress."'></a></li>";
	endif;
	if(!empty($yelp)) :
		echo "<li class='yelp'><a href='".$yelp."'></a></li>";
	endif;
	if(!empty($youtube)) :
		echo "<li class='youtube'><a href='".$youtube."'></a></li>";
	endif;
	echo "</ul>";
}
/* ------------------------------------------------------- */
/* SOCIAL SETTINGS - HOMEPAGE ---------------------------- */
function homepage_social_icons() {
	$icons = get_option('homepage_social_icons');
	if($icons == 'checked') :
		social_icons();
	endif;
}
/* ------------------------------------------------------- */
/* SOCIAL SETTINGS - FOOTER ------------------------------ */
function footer_social_icons() {
	$icons = get_option('footer_social_icons');
	if($icons == 'checked') :
		social_icons();
	endif;
} ?>