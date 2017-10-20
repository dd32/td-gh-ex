/* --------------------------------------------
 JS Start
-------------------------------------------- */
jQuery(document).ready(function($) {
  /* call foundation */
  $(document).foundation();

  objectFitImages();
  
  /* init Jarallax */
  jarallax(document.querySelectorAll('.jarallax'));

/* search */
$('.navbar-search-bar-container .search-submit').after('<i class="search-submit fa fa-search" aria-hidden="true"></i>')
});
/* --------------------------------------------
 JS END
-------------------------------------------- */
