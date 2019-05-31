jQuery('.multi-level a.dropdown-toggle').on('click', function(e) {

  if (!jQuery(this).next().hasClass('show')) {
	jQuery(this).parents('.apelleuno-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = jQuery(this).next(".apelleuno-menu");
  $subMenu.toggleClass('show');


  jQuery(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
	jQuery('.apelleuno-submenu .show').removeClass("show");
  });


  return false;
});