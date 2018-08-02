jQuery(document).ready(function($) {
	$('#aml-content').tabs();
	$('#aml-general .hide:not(:first)').hide();
	$('#aml-general .hide:first').parent().toggleClass("toggle");
	$('#aml-general .title').click(function(){
		$(this).parent().toggleClass("toggle");
		$(this).parent().siblings().removeClass("toggle").find('.hide').slideUp("fast");
		$(this).next()
		.slideToggle("fast");
	});
	$('#aml-docs .hide:not(:first)').hide();
	$('#aml-docs .hide:first').parent().toggleClass("toggle");
	$('#aml-docs .title').click(function(){
		$(this).parent().toggleClass("toggle");
		$(this).parent().siblings().removeClass("toggle").find('.hide').slideUp("fast");
		$(this).next()
		.slideToggle("fast");
	});
	$('#aml-demo .hide:not(:first)').hide();
	$('#aml-demo .hide:first').parent().toggleClass("toggle");
	$('#aml-demo .title').click(function(){
		$(this).parent().toggleClass("toggle");
		$(this).parent().siblings().removeClass("toggle").find('.hide').slideUp("fast");
		$(this).next()
		.slideToggle("fast");
	});
});