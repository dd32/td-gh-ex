<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cryout Creations
 * @subpackage Mantra
 */
$mantra_options= mantra_get_theme_options();
foreach ($mantra_options as $key => $value) {

     ${"$key"} = $value ;

}
get_header(); 
if ($mantra_frontpage!="Enable") {
?>


		<section id="container">
				
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<?php mantra_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

					<?php if($mantra_pagination=="Enable") mantra_pagination(); else mantra_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'mantra' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'mantra' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
	<?php get_sidebar(); ?>
		</section><!-- #container -->

<?php } else { 
?>


		 <script type="text/javascript">

function flash(id){

             

             jQuery(id)
             .animate({opacity: 0.5}, 100) 
             .fadeOut(100)
			 .fadeIn(100)
             .animate({opacity: 1}, 100)
			
			

}

    jQuery(window).load(function() {
        jQuery('#slider').nivoSlider({

			effect: '<?php  echo $mantra_fpslideranim; ?>',
        animSpeed: <?php echo $mantra_fpslidertime ?>,
	<?php	if($mantra_fpsliderarrows=="Hidden") { ?> directionNav: false, <?php }
   	if($mantra_fpsliderarrows=="Always Visible") { ?>  directionNavHide: false, <?php } ?>
	pauseTime: <?php echo $mantra_fpsliderpause ?>

});


 

                jQuery('#front-columns > div img').mouseover(function(e) { flash(this); })






   
		});	
	</script>

<style>

<?php if ($mantra_fronthideheader) {?> #branding {display:none;} <?php }
	  if ($mantra_fronthidemenu) {?> #access {display:none;} <?php }
  	  if ($mantra_fronthidewidget) {?> #colophon {display:none;} <?php }
	  if ($mantra_fronthidefooter) {?> #footer2 {display:none;} <?php }
      if ($mantra_fronthideback) {?> #main {background:none;} <?php } ?>


#slider{ 
width:<?php echo $mantra_fpsliderwidth ?>px ;
height:<?php echo $mantra_fpsliderheight ?>px !important;
margin:30px auto;
display:block;
border:10px solid #eee;
}


#front-text1 h1 , #front-text2 h1{
display:block;
float:none;
margin:30px auto;
text-align:center;
font-size:32px;
clear:both;
line-height:32px;
font-style:italic;
font-weight:bold;

color:<?php echo $mantra_fronttitlecolor; ?>;
}

 #front-text2 h1{
font-size:28px;
line-height:28px;
margin-top:40px;
margin-bottom:15px;
}


#frontpage blockquote {
width:88% ;
max-width:88% !important;
margin-bottom:20px;
font-size:16px;
line-height:22px;
color:#444;
}

#frontpage #front-text4 blockquote {
font-size:14px;
line-height:18px;
color:#666;
}

#frontpage blockquote:before, #frontpage blockquote:after {
content:none;
}

#front-columns > div {
display:block;
width:<?php
switch ($mantra_nrcolumns) {
    case 0:
        break;
	case 1:
        echo "95";
		break;
    case 2:
        echo "45";
		break;
    case 3:
        echo "29";
        break;
    case 4:
        echo "21";
        break;
} ?>%;
height:auto;
margin-left:2%;margin-right:2%;
margin-top:20px;
margin-bottom:20px;
float:left;
}

.column-image {
height:<?php echo $mantra_colimageheight ?>px;
border:3px solid #eee;
}

.theme-default .nivo-controlNav {margin-left:-<?php echo $mantra_slideNumber*11; ?>px}

<?php if ($mantra_fpslidernav!="Bullets") { 
	if ($mantra_fpslidernav=="Numbers") {?>

.theme-default .nivo-controlNav {bottom:-40px;}
.theme-default .nivo-controlNav a {
    background: none;
	text-decoration:underline;
	margin-right:5px;
    display: block;
    float: left;
	text-align:center;
    height: 16px;
    text-indent:0;
    width: 16px;
}
<?php } else if ($mantra_fpslidernav=="None") {?>
.theme-default .nivo-controlNav {display:none;}

<?php } } ?>
</style>

<div id="frontpage">
<?php  if($mantra_fronttext1) {?><div id="front-text1"> <h1><?php echo $mantra_fronttext1 ?> </h1></div><?php }


if ($mantra_slideType != 'Custom Slides') { 
global $post;
$latest_query = new WP_query();

switch ($mantra_slideType) {

 case 'Latest Posts' :
$latest_query->query('showposts='.$mantra_slideNumber.'&ignore_sticky_posts=1');
break;

 case 'Random Posts' :
$latest_query->query('showposts='.$mantra_slideNumber.'&orderby=rand&ignore_sticky_posts=1');
break;

 case 'Latest Posts from Category' :
$latest_query->query('showposts='.$mantra_slideNumber.'&category_name='.$mantra_slideCateg.'&ignore_sticky_posts=1');
break;

 case 'Random Posts from Category' :
$latest_query->query('showposts='.$mantra_slideNumber.'&category_name='.$mantra_slideCateg.'&orderby=rand&ignore_sticky_posts=1');
break;

 case 'Sticky Posts' :
$latest_query->query(array('post__in'  => get_option( 'sticky_posts' ), 'showposts' =>$mantra_slideNumber,'ignore_sticky_posts' => 1));
break;

 case 'Specific Posts' :
$pieces_array = explode(",", $mantra_slideSpecific);
$latest_query->query(array( 'post__in' => $pieces_array,'ignore_sticky_posts' => 1 ));
break;

}




 
$i=0;?>
 <div class="slider-wrapper theme-default">
            <div class="ribbon"></div>
  <div id="slider" class="nivoSlider">

	<?php if ( $latest_query->have_posts() ) while ( $latest_query->have_posts()) : $latest_query->the_post();  

 		 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),array(800,250)); 
		 $i++; ?>
         <a href="<?php the_permalink(); ?>"><img width="<?php echo $mantra_fpsliderwidth ?>" src="<?php echo $image[0]; ?>" id="slider1" alt="" <?php if ($mantra_slidertitle1 || $mantra_slidertext1 ) { ?> title="#caption<?php echo $i;?>" <?php }?> /></a> 

	<?php endwhile; // end of the loop.   
	$j=0;?> 
</div>
	<?php if ($latest_query->have_posts() ) while ( $latest_query->have_posts() ) : $latest_query->the_post();  
					$j++; ?>
					
            <div id="caption<?php echo $j;?>" class="nivo-html-caption">
                <?php the_title("<h2>","</h2>");the_excerpt(); ?>
            </div>
 
	<?php endwhile; // end of the loop. ?>        
            
        </div>

<?php } else { ?>


 <div class="slider-wrapper theme-default">
            <div class="ribbon"></div>
            <div id="slider" class="nivoSlider">
             <?php  if($mantra_sliderimg1) {?>    <a href="<?php echo $mantra_sliderlink1 ?>"><img width="<?php echo $mantra_fpsliderwidth ?>" src="<?php echo $mantra_sliderimg1 ?>" id="slider1" alt="" <?php if ($mantra_slidertitle1 || $mantra_slidertext1 ) { ?>title="#caption1" <?php }?> /></a><?php } 
           			if($mantra_sliderimg2) {?>    <a href="<?php echo $mantra_sliderlink2 ?>"><img width="<?php echo $mantra_fpsliderwidth ?>" src="<?php echo $mantra_sliderimg2 ?>" id="slider2" alt="" <?php if ($mantra_slidertitle2 || $mantra_slidertext2 ) { ?>title="#caption2" <?php }?> /></a><?php } 
 					if($mantra_sliderimg3) {?>    <a href="<?php echo $mantra_sliderlink3 ?>"><img width="<?php echo $mantra_fpsliderwidth ?>" src="<?php echo $mantra_sliderimg3 ?>" id="slider3" alt="" <?php if ($mantra_slidertitle3 || $mantra_slidertext3 ) { ?>title="#caption3" <?php }?> /></a><?php } 
 		    		if($mantra_sliderimg4) {?>    <a href="<?php echo $mantra_sliderlink4 ?>"><img width="<?php echo $mantra_fpsliderwidth ?>" src="<?php echo $mantra_sliderimg4 ?>" id="slider4" alt="" <?php if ($mantra_slidertitle4 || $mantra_slidertext4 ) { ?>title="#caption4" <?php }?> /></a><?php } 
			 		if($mantra_sliderimg5) {?>    <a href="<?php echo $mantra_sliderlink5 ?>"><img width="<?php echo $mantra_fpsliderwidth ?>" src="<?php echo $mantra_sliderimg5 ?>" id="slider5" alt="" <?php if ($mantra_slidertitle5 || $mantra_slidertext5 ) { ?>title="#caption5" <?php }?> /></a><?php } ?>
              
            </div>
            <div id="caption1" class="nivo-html-caption">
                <?php echo '<h2>'.$mantra_slidertitle1.'</h2>'.$mantra_slidertext1 ?>
            </div>
            <div id="caption2" class="nivo-html-caption">
                <?php echo '<h2>'.$mantra_slidertitle2.'</h2>'.$mantra_slidertext2 ?>
            </div>
            <div id="caption3" class="nivo-html-caption">
                <?php echo '<h2>'.$mantra_slidertitle3.'</h2>'.$mantra_slidertext3 ?>
            </div>
            <div id="caption4" class="nivo-html-caption">
                <?php echo '<h2>'.$mantra_slidertitle4.'</h2>'.$mantra_slidertext4 ?>
            </div>

            <div id="caption5" class="nivo-html-caption">
                <?php echo '<h2>'.$mantra_slidertitle5.'</h2>'.$mantra_slidertext5 ?>
            </div>
        </div>
<?php } ?><?php 

 if($mantra_fronttext2) {?><div id="front-text2"> <h1><?php echo $mantra_fronttext2 ?> </h1></div><?php } ?>
<?php  if($mantra_nrcolumns) { ?>
<div id="front-columns"> 
	<div id="column1">
	<a  href="<?php echo $mantra_columnlink1 ?>">	<div class="column-image" ><img  src="<?php echo $mantra_columnimg1 ?>" id="columnImage1" alt="" /> </div> <h3><?php echo $mantra_columntitle1 ?></h3> </a><div class="column-text"><?php echo $mantra_columntext1 ?></div>
	<?php if($mantra_columnreadmore) {?>	<div class="columnmore"> <a href="<?php echo $mantra_columnlink1 ?>"><?php echo $mantra_columnreadmore ?> &raquo;</a> </div><?php } ?>
	</div>
<?php  if($mantra_nrcolumns != '1') { ?>
	<div id="column2">
		<a  href="<?php echo $mantra_columnlink2 ?>">	<div class="column-image" ><img  src="<?php echo $mantra_columnimg2 ?>" id="columnImage2" alt="" /> </div> <h3><?php echo $mantra_columntitle2 ?></h3> </a><div class="column-text"><?php echo $mantra_columntext2 ?></div>
	<?php if($mantra_columnreadmore) {?>	<div class="columnmore"> <a href="<?php echo $mantra_columnlink2 ?>"><?php echo $mantra_columnreadmore ?> &raquo;</a> </div><?php } ?>
	</div>
<?php  if($mantra_nrcolumns != '2') { ?>
	<div id="column3">
		<a  href="<?php echo $mantra_columnlink3 ?>">	<div class="column-image" ><img  src="<?php echo $mantra_columnimg3 ?>" id="columnImage3" alt="" /> </div> <h3><?php echo $mantra_columntitle3 ?></h3> </a><div class="column-text"><?php echo $mantra_columntext3 ?></div>
	<?php if($mantra_columnreadmore) {?>	<div class="columnmore"> <a href="<?php echo $mantra_columnlink3 ?>"><?php echo $mantra_columnreadmore ?> &raquo;</a> </div><?php } ?>
	</div>
<?php  if($mantra_nrcolumns == '4') { ?>
	<div id="column4">
		<a  href="<?php echo $mantra_columnlink4 ?>">	<div class="column-image" ><img  src="<?php echo $mantra_columnimg4 ?>" id="columnImage4" alt="" /> </div> <h3><?php echo $mantra_columntitle4 ?></h3> </a><div class="column-text"><?php echo $mantra_columntext4 ?></div>
	<?php if($mantra_columnreadmore) {?>	<div class="columnmore"> <a href="<?php echo $mantra_columnlink4 ?>"><?php echo $mantra_columnreadmore ?> &raquo;</a> </div><?php } ?>
	</div>
<?php } } }?>
</div>
<?php } 

  if($mantra_fronttext3) {?><div id="front-text3"> <blockquote><?php echo $mantra_fronttext3 ?> </blockquote></div><?php } 
  if($mantra_fronttext4) {?><div id="front-text4"> <blockquote><?php echo $mantra_fronttext4 ?> </blockquote></div><?php } 

 ?>
</div> <!-- frontpage -->

 <?php  }// end if  

 get_footer(); ?>