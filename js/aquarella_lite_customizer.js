jQuery(document).ready(function() {

	jQuery('#customize-info').append('<div style="padding: 30px; padding-top: 10px; padding-bottom: 5px;">{titulo}</div> <a style="width: 80%; margin: 5px auto 15px auto; display: block; text-align: center;" href="http://themebear.co/portfolio/aquarella-blog-wordpress-theme/" class="button" target="_blank">{pro}</a>'.replace('{pro}',objectL10n.pro).replace('{titulo}',objectL10n.titulo));
	
});
