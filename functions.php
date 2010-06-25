<?php 
/*
Theme Name: adStyle
Author:  Gordon French
*/
$themename = "adstyle";
$shortname = "adstyle";


function register_my_menus() {
	if (function_exists( 'wp_nav_menu')) {
		register_nav_menus( array(
				'primary-menu' => __( 'Primary Navigation Menu' )
		));
		define('WP_ALLOW_MULTISITE', true);
		add_custom_background();
		//add_custom_image_header('header_style', 'admin_header_style');
		
		
	} 
}
add_action( 'init', 'register_my_menus' );



if ( function_exists('register_sidebar') ) {
	// Main Sidebar
	register_sidebar( array(
				'name'=>'Sidebar',
				'description' => 'Widgets in this area will be shown on the right-hand side in the main sidebar.',
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget' => '</li>',
				'before_title' => '<h2 class="sidebarTitle">',
				'after_title' => '</h2>'));
	
	// HEADER
	register_sidebar( array(
				'name'=>'Header',
				'description' => 'Widgets in this area will be shown in the center of the header.',
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget' => '</li>',
				'before_title' => '<h3 class="headerTitle">',
				'after_title' => '</h3>'
				));
}


//Determine the location
$path =  get_bloginfo( 'stylesheet_directory' );


//Add the menu to the Settings sidenav in wp-admin
function adStyle_admin_menu() {
	//add_menu_page(page_title, menu_title, access_level/capability, file, [function], [icon_url]);
	
	add_menu_page('adStyle', 'adStyle', 8, __FILE__, 'adStyle_panel_setting', get_bloginfo( 'stylesheet_directory' ).'/images/dollar-sign.png');
	//add_submenu_page(__FILE__, 'Page title', 'Gordon\'s subLink1', 8, __FILE__, 'my_magic_function');
	//add_submenu_page(__FILE__, 'Page title', 'Gordon\'s subLink2', 8, __FILE__, 'my_magic_function');
	
}
add_action('admin_menu', 'adStyle_admin_menu');




//codefor settings in admin panel
function adStyle_panel_setting() {

 	$apaOptions = get_option("apaOptions");
	if ($_POST['main-Submit']) {
		
		$apaOptions['paySand'] = $_POST['paySand'];
		$apaOptions['payEmail'] = $_POST['payEmail'];
		$apaOptions['payButton'] = $_POST['payButton'];
		$apaOptions['payReturn'] = $_POST['payReturn'];
		
		$apaOptions['clickButton'] = $_POST['clickButton'];
		
		update_option("apaOptions", $apaOptions);
		echo '<div class="savedBox"><b>Your settings have been saved</b></div>';
	}
	
	if (empty($apaOptions['payEmail'])){ $payEmail = 'payments@1stepwebsite.com'; } else { $payEmail = $apaOptions['payEmail'];};
	if (empty($apaOptions['payButton'])){ $payButton = get_bloginfo('template_url').'/images/btn_buynowCC_LG.gif'; } else 
			{ $payButton = $apaOptions['payButton'];};
	if (empty($apaOptions['payReturn'])){ $payReturn = get_bloginfo('wpurl'); } else { $payReturn = $apaOptions['payReturn'];};
	
	$paySand = $apaOptions['paySand']; if (empty($paySand)) { $paySand = 'no'; }; 
	
	if ($paySand == 'yes'){
		$paySandYes = 'CHECKED';
		$paySandNo = '';
	}
	if ($paySand == 'no'){
		$paySandYes = '';
		$paySandNo = 'CHECKED';
	}
	
	if (empty($apaOptions['clickButton'])){ $clickButton = get_bloginfo('template_url').'/images/buyNow.png'; } else 
			{ $clickButton = $apaOptions['clickButton'];};
	
	?>
    
    <style type="text/css">
		.savedBox		{ position:relative; width:700px; border:2px solid #229585; background-color:#c2f7f0; padding:10px;  margin:20px 0px 0px}
	    .errorBox		{ position:relative; width:700px; border:2px solid #f7a468; background-color:#f7d8c2; padding:10px; margin:20px 0px 0px}
	    .highlight		{ border:2px solid #f7a468; background-color:#f7d8c2}
		small			{ color:#666}
		
		h3 	{ margin:10px 0px 5px;}
		p	{ margin:0px 0px 15px 0px; padding:0;}
		
		/* Short Codes */
		.blue		{background:#E4F5FD;}
		.red		{background:#ffe2e2}
		.yellow		{background:#FFFADE}
		.green		{background:#EDFFD6}
		
		.blueBox 	{ padding:10px; margin:0px 0px 5px 0px; border:1px solid #AFDBEE; background:#E4F5FD; clear:left;}
		.blueBox, .blueBox a { color:#2A80A7; }
		
		.yellowBox 	{ padding:10px; margin:0px 0px 5px 0px; border:1px solid #F8ECA9;background:#FFFADE;clear:left;}
		.yellowBox, .yellowBox a { color:#DB7701; }
		
		.greenBox 	{padding:10px;margin:0px 0px 5px 0px;border:1px solid #D2EBB1;background:#EDFFD6;clear:left;}
		.greenBox, .greenBox a { color:#527A19; }
		
		.redBox 	{padding:10px;margin:0px 0px 5px 0px;border:1px solid #f9a4a4;background:#ffe2e2;clear:left;}
		.redBox, .redBox a { color:#bc142b; }
		
		.greyBox 	{padding:10px;margin:0px 0px 5px 0px;border:1px solid #cdcdcd;background:#eeeeee;clear:left;}
		.greyBox, .greyBox a { color:#676767; }
		
		
		.quote		{margin-top:10px; padding:0px 10px 10px 40px; background:url(<?php bloginfo('template_url')?>/images/quote_left.png) no-repeat; font-size:110%;}
		.author		{ text-align:right; font-size:80%; color:#666; font-style:italic;}
		
		.code		{ border:1px solid #999; background-color:#FFF; padding:10px;}
		
	</style>
    
     <script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-includes/js/jquery/jquery.js"></script> 
       <script language="JavaScript" type="text/javascript">
	   /* <![CDATA[ */

		jQuery(document).ready(function(){
			jQuery(".errorBox").animate( {opacity: 1.0}, 3000, function() {
				jQuery(".errorBox").animate( {opacity: 0.5}, 2000, function() {
					jQuery(".errorBox").slideUp("slow");
				});
			}); 
		
			jQuery(".savedBox").animate( {opacity: 1.0}, 3000, function() {
				jQuery(".savedBox").animate( {opacity: 0.5}, 2000, function() {
					jQuery(".savedBox").slideUp("slow");
				});
			}); 
		});
		/* ]]> */

	</script>
    
    <div class="wrap" style="width:500px;">
    	<h2>Adstyle for Wordpress</h2>
        <p>More great themes at <a href="http://wordpressPowerThemes">Wordpress Power Themes</a></p>
		
        <form method="post" action=""/>
        <h3 style="margin-bottom:5px;">Paypal Settings</h3>
        
        <p>Enable Sandbox for testing? &nbsp; &nbsp; &nbsp;
            <input type="radio" name="paySand" value="yes" <?php echo $paySandYes; ?>/>Enable &nbsp; &nbsp;
            <input type="radio" name="paySand" value="no" <?php echo $paySandNo; ?>/>Disable<br />
		<small>When sandbox is enabled transaction will not be processed. <br />
		Enable this only durring testing.</small>
        </p>
        
        <p>Enter the PayPal email account? 
        <input type="text" class="color" size="40"  name="payEmail" value="<?php echo $payEmail; ?>" /><br />
        <small>Enter a valiad PayPal email <em>'payments@1stepwebsite.com'</em> This is the 
        email address payments will be sent to.</small>
        </p>
        
        <p>Enter Thank You page URL? 
        <input type="text" class="color"  name="payReturn" value="<?php echo $payReturn; ?>" /><br />
        <small>After the transaction is completed, the customer need to be redirected to a thank you page. You need to enter that url here.
        <em>http://<?php bloginfo('wpurl'); ?>/thank-you</small>
        </p>
        
        <p>You can enter a custom button graphic.
        <input type="text" class="color"  name="payButton" value="<?php echo $payButton; ?>" /><br />
        <small>Please enter a complete "File URL".<br />
		<?php echo get_bloginfo('template_url').'/images/btn_buynowCC_LG.gif'; ?></small><br />
        <center><img src="<?php echo $payButton; ?>" /></center>
        </p>
        <input name="save" value="Save" type="submit" /><br /><br /><br />



        
        <h3 style="margin:10px 0px 5px;"><em>How To: </em>Paypal Settings</h3>
        <p>PayPal integration is done with shortcodes. To add a PayPal button to your page or post, add the following code, to your post or page.</p>
        <div style="border:1px solid #999; background-color:#FFF; padding:10px;">
            [paypal price="12.00" name="product1" shipping="0.00"]Button[/paypal]
        </div><br />

        <p>As you can see it is very simple to add a "buy now" button. You will want to replace the price 
        with the price of your product, the name with the name of your product and if you want to charge a shipping amount just 
        change "0.00" to your shipping fees.</p>
        
        <p><hr /></p>
        
        
        <h3 style="margin:60px 0px 5px;">Click Bank</h3>
        <p>At this time the Clickbank is used to promote click bank products. You can not use this shortcode to create your own clickbank product.
        If you want to create your own product, please contact us directly at <a href="http://WordpressPowerThemes.com">WordpressPowerThemes</a>.</p> 
        <p>You can enter a custom button graphic.
        <input type="text" class="color"  name="clickButton" value="<?php echo $clickButton; ?>" /><br />
        <small>Please enter a complete "File URL".<br />
		<?php echo get_bloginfo('template_url').'/images/buyNow.png'; ?></small><br />
        <center><img src="<?php echo $clickButton; ?>" /></center>
        </p>
        <input name="save" value="Save" type="submit" />
        <br /><br /><br />



        <p>Clickbank integration is done with shortcodes. To add a PayPal button to your page or post, add the following code, to your post or page.</p>
        <div style="border:1px solid #999; background-color:#FFF; padding:10px;">
            [clickbank hopURL="http://1.jon.pay.clickbank.net" ]Button[/clickbank]
        </div><br />
        
        <p>As you can see it is very simple to add a "buy now" button. 
        You will want to replace the hopURL with the url of the product you are promoting</p>

        <p><hr /></p>
        
        <input type="hidden" id="main-Submit" name="main-Submit" value="1" />
        
        </form>
	</div>
    
  <div class="wrap" style="width:680px;">
  <br />
<br />


  <h3>Recommended Adsense Colors</h3>
  <p>You can ad your code directly to the header widget</p>

  <div style="margin-left:25px; margin-bottom:20px; margin-top:-15px;">
      <table width="200" border="0">
      <tr>
        <td width="35px"><div style="width:25px; height:25px; background-color:#FDF4E2"></div></td>
        <td width="50px">#FDF4E2</td>
        <td width="50px">Border</td>
      </tr>
      <tr>
        <td ><div style="width:25px; height:25px; background-color:#DA944A"></div></td> 
        <td>#DA944A</td>
		<td>Title</td>
      </tr>
      <tr>
        <td ><div style="width:25px; height:25px; background-color:#FDF4E2"></div></td>
        <td>#FDF4E2</td>
        <td>Background</td>
      </tr>
      <tr>
        <td><div style="width:25px; height:25px; background-color:#54340D"></div></td>
        <td>#54340D</td>
        <td>Text</td>
      </tr>
      <tr>
        <td><div style="width:25px; height:25px; background-color:#AEC2E1"></div></td>
        <td>#AEC2E1</td>
        <td>URL </td>
      </tr>
      </table>
  </div>
  <p><hr /></p><br />
<br />

  
  <h3>Short Code Examples</h3>
        <p>Shortcodes are a very easy way to display lot of things on your blog posts by inserting a very simple code. Pick the sortcode you want then copy and past the example code.</p>
        
        <div style="width:320px; float:right">
        	<h3>Blue Highlight</h3>
            <div class="blue">This should be highlighted blue</div><br />
            <div class="code">
                [blue]This should be highlighted blue[/blue]
            </div>
            
            <h3 style="margin-top:30px;">Green Highlight</h3>
            <div class="green">This should be highlighted green</div><br />
            <div class="code">
                [green]This should be highlighted green[/green]
            </div>
            
            <h3 style="margin-top:30px;">Red Box</h3>
            <div class="red">This should be highlighted red</div><br />
            <div class="code">
                [red]This should be highlighted green[/red]
            </div>
            
            <h3 style="margin-top:30px;">Yellow Box</h3>
            <div class="yellow">This should be highlighted yellow</div><br />
            <div class="code">
                [yellow]This should be highlighted yellow[/yellow]
            </div>
            
            <h3 style="margin-top:30px;">Quote</h3>
            <div class="quote"><p>Shortcodes are a very easy way to display lot of things on your blog posts by inserting a 
            very simple code. Pick the sortcode you want then copy and past the example code.</p>
            <p class="author">Gordon French, PowerThemes</p></div>
            <div class="code">
                [quote author="Gordon French, PowerThemes"]Shortcodes are a very easy way to display lot of things on your blog posts by inserting a very simple code. Pick the sortcode you want then copy and past the example code.[/quote]
            </div>
        </div>
        
        <div style="width:320px; position:relative; top:10px;">
        	<h3>Blue Box</h3>
            <div class="blueBox">This should be in a Blue Box</div>
            <div class="code">
                [blueBox]This should be in a Blue Box[/blueBox]
            </div>
            
            <h3 style="margin-top:30px;">Green Box</h3>
            <div class="greenBox">This should be in a Green Box</div>
            <div class="code">
                [greenBox]This should be in a Green Box[/greenBox]
            </div>
            
            <h3 style="margin-top:30px;">Red Box</h3>
            <div class="redBox">This should be in a Red Box</div>
            <div class="code">
                [redBox]This should be in a Red Box[/redBox]
            </div>
            
            <h3 style="margin-top:30px;">Yellow Box</h3>
            <div class="yellowBox">This should be in a Yellow Box</div>
            <div class="code">
                [yellowBox]This should be in a Yellow Box[/yellowBox]
            </div>
            
            <h3 style="margin-top:30px;">Grey Box</h3>
            <div class="greyBox">This should be in a Grey Box</div>
            <div class="code">
                [greyBox]This should be in a Grey Box[/greyBox]
            </div>
        </div>
  </div>
     
  
<?php
}


//Paypal
function paypal_shortcode($atts, $content = null){
	$apaOptions = get_option("apaOptions");
	$payEmail = $apaOptions['payEmail'];
	$payReturn = $apaOptions['payReturn'];
	$payButton = $apaOptions['payButton'];
	$paySand = $apaOptions['paySand'];
	if (empty($payEmail)) {$payEmail = 'payments@1stepwebsite.com';}
	if (empty($paySand)) {$payEmail = 'no';}
	if (empty($payReturn)) {$payReturn = get_bloginfo('wpurl');}
	if (empty($payButton)) {$payButton = get_bloginfo('template_url').'/images/btn_buynowCC_LG.gif';}
	
	if ($paySand == 'yes'){ $action = "https://www.sandbox.paypal.com/cgi-bin/webscr"; }
	else { $action = "https://www.paypal.com/cgi-bin/webscr"; }
	
	extract(shortcode_atts(array('price' => '9.99', 'name' => 'My Product', 'shipping' => '0.00'), $atts));
	return '
<form action="'.$action.'" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="'.$payEmail.'">
<input type="hidden" name="item_name" value="'.$name.'">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="shipping" value="'.$price.'">
<input type="hidden" name="amount" value="'.$price.'">
<input type="hidden" name="return" value="'.$payReturn.'">
<input type="image" src="'.$payButton.'" border="0" name="submit" alt="Make payments with PayPal!">
</form>';

}
add_shortcode('paypal', 'paypal_shortcode');

function get_first_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1] [0];
	
	if(empty($first_img)){ //Defines a default image
		$first_img = "nope";
	}
	return $first_img;
}

//ClickBank
function clickbank_shortcode($atts, $content = null){
	$apaOptions = get_option("apaOptions");
	$clickButton = $apaOptions['clickButton'];
	if (empty($clickButton)) {$clickButton = get_bloginfo('template_url').'/images/buyNow.png';}
	extract(shortcode_atts(array('hopURL' => 'http://1.gfrench.pay.clickbank.net'), $atts));
	return '
	<a href="'.$hopURL.'">
		<img src="'.$clickButton.'" border="0" />
	</a>';
}
add_shortcode('clickbank', 'clickbank_shortcode');

//SHort Codes
function blue_highlight( $atts, $content = null ) { return '<span class="blue">' . $content . '</span>';}
add_shortcode('blue', 'blue_highlight');
function green_highlight( $atts, $content = null ) { return '<span class="green">' . $content . '</span>';}
add_shortcode('green', 'green_highlight');
function yellow_highlight( $atts, $content = null ) { return '<span class="yellow">' . $content . '</span>';}
add_shortcode('yellow', 'yellow_highlight');
function red_highlight( $atts, $content = null ) { return '<span class="red">' . $content . '</span>';}
add_shortcode('red', 'red_highlight');

function blueBox_shortcode( $atts, $content = null ) {
   return '<div class="blueBox">' . $content . '</div>';
}
add_shortcode('blueBox', 'blueBox_shortcode');

function yellowBox_shortcode( $atts, $content = null ) {
   return '<div class="yellowBox">' . $content . '</div>';
}
add_shortcode('yellowBox', 'yellowBox_shortcode');

function greenBox_shortcode( $atts, $content = null ) {
   return '<div class="greenBox">' . $content . '</div>';
}
add_shortcode('greenBox', 'greenBox_shortcode');

function redBox_shortcode( $atts, $content = null ) {
   return '<div class="redBox">' . $content . '</div>';
}
add_shortcode('redBox', 'redBox_shortcode');

function greyBox_shortcode( $atts, $content = null ) {
   return '<div class="greyBox">' . $content . '</div>';
}
add_shortcode('greyBox', 'greyBox_shortcode');


function quote_shortcode($atts, $content = null){
	extract(shortcode_atts(array('author' => 'something'), $atts));
	return '<div class="quote"><p>' . $content . '</p><p class="author">'.$author.'</p></div>';
}
add_shortcode('quote', 'quote_shortcode');


class truncate{
	/* Public function for truncating content
	*  Requires an string and a length
	*
	* Structure:
	* $truncateString = 'text ro truncate'
	*
	* Example:
	*	$truncateString = truncate::doTruncate($_POST['truncate'], 100);
	*					
	* Returns:
	* return truncated string;
	*/	
	public static function doTruncate($truncateString, $limit, $break=".", $pad="...") { 
	// return with no change if string is shorter than $limit  
	if(strlen($truncateString) <= $limit) return $truncateString; 
		// is $break present between $limit and the end of the string?  
		if(false !== ($breakpoint = strpos($truncateString, $break, $limit))) { 
			if($breakpoint < strlen($truncateString) - 1) { 
				$truncateString = substr($truncateString, 0, $breakpoint) . $pad; 
			}
		} 
		return $truncateString;
	}
}

function power(){
$powerNeeds = '<div style="position:absolute; top:-1000px;">Wordpress Theme designed and provided 
by <a title="Wordpress Themes" href="http://wordpresspowerthemes.com">Wordpress Power Themes</a>
</div>';
return $powerNeeds;
}

?>