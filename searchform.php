<?php
/**
* searchform.php
*
* @author    Denis Franchi
* @package   Atomy
* @version   1.0.2
*/
?>

<form role="search" class="box" method="get" action="<?php echo esc_url( home_url( '/' ) ) ?>">
  <div class="container-4">
    <input type="search" id="search" placeholder="<?php echo esc_html('Search &hellip;','atomy');?>" value="<?php echo get_search_query() ?>"  name="s"/>
    <button class="icon"><i class="fas fa-search"></i></button>
  </div>
</form>

