<?php
// Don't Edit This Section.
?>
<script type="text/javascript">
$(document).ready(function() {		
	//Execute the slideShow
	slideShow();
});
function slideShow() {
	//Set the opacity of all images to 0
	$('#gallery a').css({opacity: 0.0});
	//Get the first image and display it (set it to full opacity)
	$('#gallery a:first').css({opacity: 1.0});
	//Set the caption background to semi-transparent
	$('#gallery .caption').css({opacity: 0.9});
	//Resize the width of the caption according to the image width
	$('#gallery .caption').css({width: $('#gallery a').find('img').css('width')});
	//Get the caption of the first image from REL attribute and display it
	$('#gallery .content').html($('#gallery a:first').find('img').attr('rel'))
	.animate({opacity: 1.0}, 400);
	//Call the gallery function to run the slideshow, 6000 = change to next image after 6 seconds
	setInterval('gallery()',6000);
}

function gallery() {
	//if no IMGs have the show class, grab the first image
	var current = ($('#gallery a.show')?  $('#gallery a.show') : $('#gallery a:first'));
	//Get next image, if it reached the end of the slideshow, rotate it back to the first image
	var next = ((current.next().length) ? ((current.next().hasClass('caption'))? $('#gallery a:first') :current.next()) : $('#gallery a:first'));	
	//Get next image caption
	var caption = next.find('img').attr('rel');	
	//Set the fade in effect for the next image, show class has higher z-index
	next.css({opacity: 0.0})
	.addClass('show')
	.animate({opacity: 1.0}, 1000);
	//Hide the current image
	current.animate({opacity: 0.0}, 1000)
	.removeClass('show');
	//Set the opacity to 0 and height to 1px
	$('#gallery .caption').animate({opacity: 0.0}, { queue:false, duration:0 }).animate({height: '1px'}, { queue:true, duration:300 });	
	//Animate the caption, opacity to 0.7 and heigth to 100px, a slide up effect
	$('#gallery .caption').animate({opacity: 0.7},100 ).animate({height: '60px'},500 );
	//Display the content
	$('#gallery .content').html(caption);
}

</script>

<style type="text/css">
.clear {
	clear:both
}

#gallery { 	position:relative; 	height:288px; background:#000000; margin-left:auto; margin-right:auto; width:1000px; top: 33px; margin-bottom:40px; order-radius:0 0 7px 7px; }
#gallery.show { height:288px; margin:auto; width:1000px; top: 33px; }
#gallery a { float:left; position:absolute; }
#gallery a img { border:none; width:1000px; border-radius:0 0 7px 7px; }
#gallery img { border:none; width:1000px; border-radius:0 0 7px 7px; }
#gallery .caption { background-color:#02801A; color:#ffffff; height:60px; width:100%; position:absolute; bottom:0px; font-size:10px; border-radius:0 0 7px 7px; }
#gallery .caption .content { margin:5px; text-align: center; }
#gallery .caption .content h3 { margin:0; padding:0; color:#FFFFFF; font-weight:bold; font-size:12px; text-align:center; }
.menuimage { background:no-repeat scroll center top transparent; display: block; height: 90px; }
.menuimage:hover { background-position:bottom; }
</style>



        

        

       
<?php
// Edit This Section. Point your Images, Titles and Captions Respectively
?>

<div id="gallery">



	<a href="#" class="show">

		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/d5socialia/images/slides/(1).jpg" alt="D5 Socialia by D5 Creation" rel="<h3>Welcome to D5 Socialia Theme Previewing, Visit D5 Creation for Details</h3>D5 Socialia is a WordPress Theme which is Ideal for Social Organizations, NGOs, CBOs, Environmental Organizations, Societies, Climate Change Related Progrms.You can Chnage these Images and Captions by Editing the <?php echo site_url(); ?>/wp-content/themes/d5socialia/slide-image.php"/>

	</a>

    

	<a href="#" class="show">

		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/d5socialia/images/slides/(2).jpg" alt="D5 Socialia by D5 Creation" rel="<h3>Welcome to D5 Socialia Theme Previewing, Visit D5 Creation for Details</h3>D5 Socialia is a WordPress Theme which is Ideal for Social Organizations, NGOs, CBOs, Environmental Organizations, Societies, Climate Change Related Progrms.You can Chnage these Images and Captions by Editing the <?php echo site_url(); ?>/wp-content/themes/d5socialia/slide-image.php"/>

	</a>

    

    <a href="#" class="show">

		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/d5socialia/images/slides/(3).jpg" alt="D5 Socialia by D5 Creation" rel="<h3>Welcome to D5 Socialia Theme Previewing, Visit D5 Creation for Details</h3>D5 Socialia is a WordPress Theme which is Ideal for Social Organizations, NGOs, CBOs, Environmental Organizations, Societies, Climate Change Related Progrms.You can Chnage these Images and Captions by Editing the <?php echo site_url(); ?>/wp-content/themes/d5socialia/slide-image.php"/>

	</a>

    

    <a href="#" class="show">

		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/d5socialia/images/slides/(4).jpg" alt="D5 Socialia by D5 Creation" rel="<h3>Welcome to D5 Socialia Theme Previewing, Visit D5 Creation for Details</h3>D5 Socialia is a WordPress Theme which is Ideal for Social Organizations, NGOs, CBOs, Environmental Organizations, Societies, Climate Change Related Progrms.You can Chnage these Images and Captions by Editing the <?php echo site_url(); ?>/wp-content/themes/d5socialia/slide-image.php"/>

	</a>

    

    <a href="#" class="show">

		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/d5socialia/images/slides/(5).jpg" alt="D5 Socialia by D5 Creation" rel="<h3>Welcome to D5 Socialia Theme Previewing, Visit D5 Creation for Details</h3>D5 Socialia is a WordPress Theme which is Ideal for Social Organizations, NGOs, CBOs, Environmental Organizations, Societies, Climate Change Related Progrms.You can Chnage these Images and Captions by Editing the <?php echo site_url(); ?>/wp-content/themes/d5socialia/slide-image.php"/>

	</a>



	<a href="#" class="show">

		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/d5socialia/images/slides/(6).jpg" alt="D5 Socialia by D5 Creation" rel="<h3>Welcome to D5 Socialia Theme Previewing, Visit D5 Creation for Details</h3>D5 Socialia is a WordPress Theme which is Ideal for Social Organizations, NGOs, CBOs, Environmental Organizations, Societies, Climate Change Related Progrms.You can Chnage these Images and Captions by Editing the <?php echo site_url(); ?>/wp-content/themes/d5socialia/slide-image.php"/>

	</a>

    

    <a href="#" class="show">

		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/d5socialia/images/slides/(7).jpg" alt="D5 Socialia by D5 Creation" rel="<h3>Welcome to D5 Socialia Theme Previewing, Visit D5 Creation for Details</h3>D5 Socialia is a WordPress Theme which is Ideal for Social Organizations, NGOs, CBOs, Environmental Organizations, Societies, Climate Change Related Progrms.You can Chnage these Images and Captions by Editing the <?php echo site_url(); ?>/wp-content/themes/d5socialia/slide-image.php"/>

	</a>

    

    <a href="#" class="show">

		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/d5socialia/images/slides/(8).jpg" alt="D5 Socialia by D5 Creation" rel="<h3>Welcome to D5 Socialia Theme Previewing, Visit D5 Creation for Details</h3>D5 Socialia is a WordPress Theme which is Ideal for Social Organizations, NGOs, CBOs, Environmental Organizations, Societies, Climate Change Related Progrms.You can Chnage these Images and Captions by Editing the <?php echo site_url(); ?>/wp-content/themes/d5socialia/slide-image.php"/>

	</a>
    
    <a href="#" class="show">

		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/d5socialia/images/slides/(9).jpg" alt="D5 Socialia by D5 Creation" rel="<h3>Welcome to D5 Socialia Theme Previewing, Visit D5 Creation for Details</h3>D5 Socialia is a WordPress Theme which is Ideal for Social Organizations, NGOs, CBOs, Environmental Organizations, Societies, Climate Change Related Progrms.You can Chnage these Images and Captions by Editing the <?php echo site_url(); ?>/wp-content/themes/d5socialia/slide-image.php"/>

	</a>
    
    <a href="#" class="show">

		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/d5socialia/images/slides/(10).jpg" alt="D5 Socialia by D5 Creation" rel="<h3>Welcome to D5 Socialia Theme Previewing, Visit D5 Creation for Details</h3>D5 Socialia is a WordPress Theme which is Ideal for Social Organizations, NGOs, CBOs, Environmental Organizations, Societies, Climate Change Related Progrms.You can Chnage these Images and Captions by Editing the <?php echo site_url(); ?>/wp-content/themes/d5socialia/slide-image.php"/>

	</a>
    
    <a href="#" class="show">

		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/d5socialia/images/slides/(11).jpg" alt="D5 Socialia by D5 Creation" rel="<h3>Welcome to D5 Socialia Theme Previewing, Visit D5 Creation for Details</h3>D5 Socialia is a WordPress Theme which is Ideal for Social Organizations, NGOs, CBOs, Environmental Organizations, Societies, Climate Change Related Progrms.You can Chnage these Images and Captions by Editing the <?php echo site_url(); ?>/wp-content/themes/d5socialia/slide-image.php"/>

	</a>
    
    <a href="#" class="show">

		<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/d5socialia/images/slides/(12).jpg" alt="D5 Socialia by D5 Creation" rel="<h3>Welcome to D5 Socialia Theme Previewing, Visit D5 Creation for Details</h3>D5 Socialia is a WordPress Theme which is Ideal for Social Organizations, NGOs, CBOs, Environmental Organizations, Societies, Climate Change Related Progrms.You can Chnage these Images and Captions by Editing the <?php echo site_url(); ?>/wp-content/themes/d5socialia/slide-image.php"/>

	</a>

	<div class="caption" ><div class="content"></div></div>

</div><div class="clear"></div>