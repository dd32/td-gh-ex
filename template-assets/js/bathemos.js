
jQuery(document).ready(function($){
    
    //$('p').html().replace(/\D\W+/g, '');
    
    $('p:empty').remove();
    
    /////////Search form//////
    
    $('.add_input_field .add_ids_title').on('click', function(event){
        event.preventDefault();
        search_add_input_toggle(this);
    });
    
    $('.add_input_field .add_ids_list .term_item').on('click', function(event){
        event.preventDefault();
        var parent = $(this).parent();
        search_add_input_toggle(parent);
        var selected = $(this).data('id');
        $(parent).parent().find('input[name="add_ids_'+$(parent).parent().data('tax')+'"]').val(selected);
        $(parent).find('.term_item').removeClass('term_item_selected');
        $(this).addClass('term_item_selected');
        $(parent).parent().find('.add_ids_title_value').html($(this).html());
    });
    
    function search_add_input_toggle(item){
        $(item).parent().find('.add_ids_list').toggleClass('active');
        $(item).parent().find('.add_ids_title i').toggleClass('fa-chevron-down');
        $(item).parent().find('.add_ids_title i').toggleClass('fa-chevron-up');
    }
    
    //////////Map/////////
    
    $('#myModal').on('shown.bs.modal', function (e) {
        
        
        
    })
    
    ///////Smooth scrolling
    
    var $root = $('html, body');
    
    $('#content a[href^="#"]').on('click', function(event){
        event.preventDefault();
        var addressValue = this.href.split('#')[1];
        if (addressValue != 'home_carousel'){
          $root.animate({
            scrollTop: $($.attr(this, 'href')).offset().top - 150
          }, 700);
        }
    });
    
    ////////////////////////
    
  var resized = false;
  
  function bindNavbar() {
		if ($(window).width() > 100) {			
			$('.dropdown-toggle').click(function(e) {
                if($(e.target).is('.caret') && $(window).width() < 992){ 
                   $(this).parent().toggleClass('dropdown-menu-active');
                   e.stopPropagation();
                   e.preventDefault(); 
                }
                if($(window).width() >= 992){
                   e.stopPropagation();
                   e.preventDefault();
                }
                if (!$(e.target).is('.caret')){
				    window.location = $(this).attr('href');
				}
			});
		}
		else {
			$('.navbar-nav .dropdown').off('mouseover').off('mouseout');
		}
	}
    
	bindNavbar();
});

/////////////////////////

var bathemos_waitForFinalEvent = (function () {
  var timers = {};
  return function (callback, ms, uniqueId) {
    if (!uniqueId) {
      uniqueId = "Don't call this twice without a uniqueId";
    }
    if (timers[uniqueId]) {
      clearTimeout (timers[uniqueId]);
    }
    timers[uniqueId] = setTimeout(callback, ms);
  };
})();
