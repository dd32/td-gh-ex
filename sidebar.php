<?php
/**
  * @package WordPress
  * @subpackage A_Theme
*/
?><div id="side">     
  <ul>             
    <?php if(!function_exists('dynamic_sidebar')|| !dynamic_sidebar() ): ?>                   
    <li class="widget">      
      <h2 class="widgettitle">        
        <?php _e('Categories')?> </h2>                         
      <ul>           
        <?php wp_list_categories('title_li=');
?>                         
      </ul>              </li>                   
       <?php endif?>                  <li>                          
    <a href="http://validator.w3.org/check/referer" title="<?php  _e('This page validates as XHTML 1.0 Transitional')?>">                                 
      <?php _e('Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr>') ?></a>                         
    <a href="http://jigsaw.w3.org/css-validator/validator?uri=<?php bloginfo('url')?>" title="This page validates as CSS level 2.1">                                 
      <abbr title="Cascading Style Sheets">CSS</abbr></a>                         
    <a href="http://gmpg.org/xfn/">      
      <abbr title="XHTML Friends Network">XFN</abbr></a>              </li>             
     
  </ul>
</div>
