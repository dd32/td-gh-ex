<?php

/*
	Search Form
	
	Creates the iFeature search form 
	
	Copyright (C) 2011 CyberChimps
*/

?>

<form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
    <div>
        <label for="s" class="screen-reader-text">Search for:</label>
       <input type="text" name="s" class="s" value="Search" id="searchsubmit" onfocus="if (this.value == 'Search') this.value = '';">
        
        <input type="submit" value="Search" id="searchsubmit" />
      
    </div>
</form>