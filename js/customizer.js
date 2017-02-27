jQuery(document).ready(function(){
  jQuery("#customize-info").after('<div><a target="blank" style="background: #ffb900; display: block; color: #000; padding: 10px; font-weight: 700;text-transform: uppercase;margin-top: -15px;" href="https://wordpress.org/support/theme/aqueduct/reviews/#new-post">{add_star_txt}</a></div>'.replace('{add_star_txt}', aqueduct_customizer_local_obj.fivestartxt));

});
