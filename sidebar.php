<div id="side">     
  <ul>             
    <?php if(!function_exists('dynamic_sidebar')|| !dynamic_sidebar() ): ?>                   
    <li class="widget">      
      <h2 class="widgettitle">        
        <?php _e('Recent Comments')?> </h2>                         
      <ul>           
        <?php include(TEMPLATEPATH.'/simple_recent_comments.php')/* Recent Comments Plugin by: www.g-loaded.eu */ ?>                                 
        <?php if(function_exists('src_simple_recent_comments') ){ src_simple_recent_comments(5,60,'<li>','</li>'); }/* Recent Comments Plugin by: www.g-loaded.eu */ ?>                         
      </ul>              </li>                   
    <li class="widget">      
      <h2 class="widgettitle">        
        <?php _e('Tags:')?></h2>                           
      <?php wp_tag_cloud('orderby=count'); ?>               </li>   <?php endif?>                  <li>                          
    <a href="http://validator.w3.org/check/referer" title="<?php  _e('This page validates as XHTML 1.0 Transitional')?>">                                 
      <?php _e('Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr>') ?></a>                         
    <a href="http://jigsaw.w3.org/css-validator/validator?uri=<?php bloginfo('url')?>" title="This page validates as CSS level 2.1">                                 
      <abbr title="Cascading Style Sheets">CSS</abbr></a>                         
    <a href="http://gmpg.org/xfn/">      
      <abbr title="XHTML Friends Network">XFN</abbr></a>              </li>             
     
  </ul>
</div>