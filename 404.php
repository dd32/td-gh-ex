<?php get_header(); ?>
   <div id="content">


     <h2 class="center">Error 404 - Not Found</h2>
     Try the search function, the navigation menu, or the various links at the sidebar or footer area.

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div><label class="screen-reader-text" for="s"></label>
        <input type="text" value="Search" name="s" id="searchtextarea" />
        <input type="submit" id="searchsubmit" value="Go" />

    </div>
</form>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>



   </div>


<?php get_sidebar(); ?>
<?php get_template_part( 'sidebar2'); ?>
<?php get_footer(); ?>