<?php
/*
	*Theme Name	: BusiProf
	
 * @file           front-page.php
 * @package        Busiprof
 * @author         Priyanshu Mittal
 * @copyright      2013 Webriti
 * @license        license.txt
 * @filesource     wp-content/themes/Busiprof/front-page.php
*/
?>
<?php
/*
*					Template Name: Home
*/
if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
} else {
		get_header();
		$current_options=get_option('busiprof_theme_options');
?>

<!---Slider Section of Index Page---->
<?php get_template_part('index', 'slider') ;?>



<!---Service Section of index Page---->
<?php get_template_part('index', 'services') ;?>


<!---Projects Section of index Page---->
<?php get_template_part('index', 'projects') ;?>


<?php get_template_part('index', 'testimonials') ;?>


<!---footer Section of index Page---->
<?php get_footer() ; }?>
