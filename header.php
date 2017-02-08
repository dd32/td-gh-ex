<?php
/*
* DO NOT ADD SCRIPTS HERE (USE THEME OPTIONS)
* 
* wp_head();
*/

	/* Load Scripts meta */
  	get_template_part('templates/head');
  	?>
	<body <?php body_class(); ?>>
	<div id="wrapper" class="container">
	<?php
	   	do_action('kt_beforeheader');

	      	get_template_part('templates/header');
	      
	    do_action('kt_header_after');
	  ?>

  			<div id="inner-wrap" class="wrap clearfix contentclass hfeed" role="document">

        	<?php 	/*
		        	* Hooked 
		        	*/
		        	do_action('kt_content_top');
