
<?php 
/**
 * The template for displaying Category pages
 * Imonthemes
 */


get_header(); ?>
<!-- head select -->   
	
        <?php get_template_part('headers/part','headsingle'); ?>
<!-- / head select --> 





 <div id="sub_banner">
<h1>
<?php printf( __( ' %s', 'advance' ), single_cat_title( '', false ) ); ?>
</h1>
</div>


<div class="  row ">
   
       
       <?php get_template_part('layout/part','layout1'); ?>
        </div>
        




<?php get_footer(); ?>