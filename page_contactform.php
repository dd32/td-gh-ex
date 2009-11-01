<?php
/*
Template Name: Contact form
*/

// Include the contact form plugin
Include TEMPLATEPATH.'/plugin_contact_page/plugin_contact_page.php';

// Show Page:
ForEach (Array ('page.php', 'index.php') AS $file){
  If ( Is_File(TEMPLATEPATH.'/'.$file) ){
    Include TEMPLATEPATH.'/'.$file;
    Break;
  }
}


/* End of File */