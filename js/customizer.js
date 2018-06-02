/**
 * customizer.js
 *
 * author    Denis Franchi
 * package   Avik
 * version   1.1.0
 */

/* TABLE OF CONTENT

  1 - Site identity
  2 - Who we are
  3 - Services
  4 - Portfolio
  5 - Blog
  6 - Contact
  7 - Footer
  8 - Page 404
  9 - Share
  10 - Color Filter Header Home
*/

( function( $ ) {

/* ------------------------------------------------------------------------- *
## 1 Site identity */
/* ------------------------------------------------------------------------- */  	

// Site title and description.
wp.customize( 'blogname', function( value ) {
	value.bind( function( to ) {
	$( '.site-title a' ).text( to );
	} );
} );
wp.customize( 'blogdescription', function( value ) {
	value.bind( function( to ) {
	$( '.site-description' ).text( to );
	} );
} );

// Header text color.
wp.customize( 'header_textcolor', function( value ) {
	value.bind( function( to ) {
	if ( 'blank' === to ) {
	$( '.site-title, .site-description' ).css( {
			'clip': 'rect(1px, 1px, 1px, 1px)',
			'position': 'absolute'
	} );
	} else {
	$( '.site-title, .site-description' ).css( {
			'clip': 'auto',
			'position': 'relative'
	} );
	$( '.site-title a, .site-description' ).css( {
			'color': to
	} );
	}
	} );
} );

// Font-size logo
wp.customize('avik_font_size_logo', function(control) {
	control.bind(function( controlValue ) {
		$('.avik-logo img').css('width', controlValue + 'px');
	});
});

/* ------------------------------------------------------------------------- *
## 2 Who we are */
/* ------------------------------------------------------------------------- */  

// Color title banner image
wp.customize( 'avik_color_title_image_banner_whoweare', function( value ) {
    value.bind( function( newval ) {
    $( '#typed' ).css( 'color', newval );     
    } );
} );

// Color cursor banner image
wp.customize( 'avik_color_cursor_image_banner_whoweare', function( value ) {
    value.bind( function( newval ) {
    $( '.typed-cursor' ).css( 'color', newval );     
    } );
} );

// Title Statistics 1
wp.customize( 'avik_title_1_statistics_whoweare', function( value ) {
	value.bind( function( newval ) {
		$( '.statistics-text.one h4' ).html( newval );
		
	} );
} ); 

// Title Statistics 2
wp.customize( 'avik_title_2_statistics_whoweare', function( value ) {
	value.bind( function( newval ) {
		$( '.statistics-text.two h4' ).html( newval );
		
	} );
} );

// Title Statistics 3
wp.customize( 'avik_title_3_statistics_whoweare', function( value ) {
	value.bind( function( newval ) {
		$( '.statistics-text.three h4' ).html( newval );
		
	} );
} );

// Title Statistics 4
wp.customize( 'avik_title_4_statistics_whoweare', function( value ) {
	value.bind( function( newval ) {
		$( '.statistics-text.four h4' ).html( newval );
		
	} );
} );

// Title general Team
wp.customize( 'avik_title_general_team_whoweare', function( value ) {
	value.bind( function( newval ) {
		$( '.title-team h3' ).html( newval );
		
	} );
} );

// Title Team 1
wp.customize( 'avik_title_team_1_whoweare', function( value ) {
	value.bind( function( newval ) {
		$( '.name-title.one h4' ).html( newval );
		
	} );
} );

// Subtitle Team 1
wp.customize( 'avik_subtitle_team_1_whoweare', function( value ) {
	value.bind( function( newval ) {
		$( '.name-title.one h5' ).html( newval );
		
	} );
} );

// Title Team 2
wp.customize( 'avik_title_team_2_whoweare', function( value ) {
	value.bind( function( newval ) {
		$( '.name-title.two h4' ).html( newval );
		
	} );
} );

// Subtitle Team 2
wp.customize( 'avik_subtitle_team_2_whoweare', function( value ) {
	value.bind( function( newval ) {
		$( '.name-title.two h5' ).html( newval );
		
	} );
} );

// Title Team 3
wp.customize( 'avik_title_team_3_whoweare', function( value ) {
	value.bind( function( newval ) {
		$( '.name-title.three h4' ).html( newval );
		
	} );
} );

// Subtitle Team 3
wp.customize( 'avik_subtitle_team_3_whoweare', function( value ) {
	value.bind( function( newval ) {
		$( '.name-title.three h5' ).html( newval );
		
	} );
} );

// Title Partner
wp.customize( 'avik_title_partner_whoweare', function( value ) {
	value.bind( function( newval ) {
		$( '.title-brands h3' ).html( newval );
		
	} );
} );

// Subtitle Partner
wp.customize( 'avik_subtitle_partner_whoweare', function( value ) {
	value.bind( function( newval ) {
		$( '.title-brands h4' ).html( newval );
		
	} );
} );

/* ------------------------------------------------------------------------- *
## 3 Services */
/* ------------------------------------------------------------------------- */  

// Title Icon 1 Services 
wp.customize( 'avik_title_icon_1_services', function( value ) {
	value.bind( function( newval ) {
		$( 'h2.enter-title-services.one,h2.tab__development-title.one' ).html( newval ); 
		
	} );
} );

// Subtitle icon 1 Services
wp.customize( 'avik_subtitle_icon_1_services', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.p-enter-services.one' ).html( newval );
		
	} );
} );

// Title Icon 2 Services 
wp.customize( 'avik_title_icon_2_services', function( value ) {
	value.bind( function( newval ) {
		$( 'h2.enter-title-services.two,h2.tab__development-title.two' ).html( newval );
		
	} );
} );

// Subtitle icon 2 Services
wp.customize( 'avik_subtitle_icon_2_services', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.p-enter-services.two' ).html( newval );
		
	} );
} );

// Title Icon 3 Services 
wp.customize( 'avik_title_icon_3_services', function( value ) {
	value.bind( function( newval ) {
		$( 'h2.enter-title-services.three,h2.tab__development-title.three' ).html( newval );
		
	} );
} );

// Subtitle icon 3 Services
wp.customize( 'avik_subtitle_icon_3_services', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.p-enter-services.three' ).html( newval );
		
	} );
} );

// Title Icon 4 Services 
wp.customize( 'avik_title_icon_4_services', function( value ) {
	value.bind( function( newval ) {
		$( 'h2.enter-title-services.four,h2.tab__development-title.four' ).html( newval );
		
	} );
} );

// Subtitle icon 4 Services
wp.customize( 'avik_subtitle_icon_4_services', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.p-enter-services.four' ).html( newval );
		
	} );
} );

// Title Partners
wp.customize( 'avik_title_partners_services', function( value ) {
	value.bind( function( newval ) {
		$( '.title-partenrs h2' ).html( newval );
		
	} );
} );

// Subtitle Partners
wp.customize( 'avik_subtitle_partners_services', function( value ) {
	value.bind( function( newval ) {
		$( '.title-partenrs h3' ).html( newval );
		
	} );
} );

// Title 1 Price quotation
wp.customize( 'avik_title_1_quotation_services', function( value ) {
	value.bind( function( newval ) {
		$( '.separator-price h2' ).html( newval );
		
	} );
} );

// Subitle 1 Price quotation
wp.customize( 'avik_subtitle_1_quotation_services', function( value ) {
	value.bind( function( newval ) {
		$( '.separator-price h3' ).html( newval );
		
	} );
} );

// Title 2 Price quotation
wp.customize( 'avik_title_2_quotation_services', function( value ) {
	value.bind( function( newval ) {
		$( '.subtitle-price h3' ).html( newval );
		
	} );
} );

// Subtitle 2 Price quotation
wp.customize( 'avik_subtitle_2_quotation_services', function( value ) {
	value.bind( function( newval ) {
		$( '.subtitle-price h4' ).html( newval );
		
	} );
} );

// Title Project Price quotation
wp.customize( 'avik_title_project_quotation_services', function( value ) {
	value.bind( function( newval ) {
		$( '.widget-contact h3' ).html( newval );
		
	} );
} );

/* ------------------------------------------------------------------------- *
## 4 Portfolio */
/* ------------------------------------------------------------------------- */  

// Title Portfolio
wp.customize( 'avik_title_portfolio', function( value ) {
	value.bind( function( newval ) {
		$( '#control-portfolio h3' ).html( newval );
		
	} );
} );

// Title client Portfolio 1 c 1
wp.customize( 'avik_title_client_portfolio_1_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-client-portfolio-1-c-1' ).html( newval );
		
	} );
} );

// Subtitle client Portfolio 1 c 1
wp.customize( 'avik_subtitle_client_portfolio_1_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-client-portfolio-1-c-1' ).html( newval );
		
	} );
} );

// Title project Portfolio 1 c 1 
wp.customize( 'avik_title_project_portfolio_1_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-project-portfolio-1-c-1' ).html( newval );
		
	} );
} );

// Subtitle project Portfolio 1 c 1
wp.customize( 'avik_subtitle_project_portfolio_1_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-project-portfolio-1-c-1' ).html( newval );
		
	} );
} );

// Title category Portfolio 1 c 1
wp.customize( 'avik_title_category_portfolio_1_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-category-portfolio-1-c-1' ).html( newval );
		
	} );
} );

// Subtitle category Portfolio 1 c 1
wp.customize( 'avik_subtitle_category_portfolio_1_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-category-portfolio-1-c-1' ).html( newval );
		
	} );
} );

// Title name Portfolio 1 c 1
wp.customize( 'avik_title_name_portfolio_1_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-name-portfolio-1-c-1' ).html( newval );
		
	} );
} );

// Subtitle name Portfolio 1 c 1 
wp.customize( 'avik_subtitle_name_portfolio_1_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-name-portfolio-1-c-1' ).html( newval );
		
	} );
} );

// Title button Portfolio 1 c 1 
wp.customize( 'avik_title_button_portfolio_1_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'a.button-portfolio-1-c-1' ).html( newval );
		
	} );
} );

// Title client Portfolio 2 c 1
wp.customize( 'avik_title_client_portfolio_2_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-client-portfolio-2-c-1' ).html( newval );
		
	} );
} );

// Subtitle client Portfolio 2 c 1
wp.customize( 'avik_subtitle_client_portfolio_2_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-client-portfolio-2-c-1' ).html( newval );
		
	} );
} );

// Title project Portfolio 2 c 1 
wp.customize( 'avik_title_project_portfolio_2_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-project-portfolio-2-c-1' ).html( newval );
		
	} );
} );

// Subtitle project Portfolio 2 c 1
wp.customize( 'avik_subtitle_project_portfolio_2_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-project-portfolio-2-c-1' ).html( newval );
		
	} );
} );

// Title category Portfolio 2 c 1
wp.customize( 'avik_title_category_portfolio_2_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-category-portfolio-2-c-1' ).html( newval );
		
	} );
} );

// Subtitle category Portfolio 2 c 1
wp.customize( 'avik_subtitle_category_portfolio_2_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-category-portfolio-2-c-1' ).html( newval );
		
	} );
} );

// Title name Portfolio 2 c 1
wp.customize( 'avik_title_name_portfolio_2_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-name-portfolio-2-c-1' ).html( newval );
		
	} );
} );

// Subtitle name Portfolio 2 c 1 
wp.customize( 'avik_subtitle_name_portfolio_2_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-name-portfolio-2-c-1' ).html( newval );
		
	} );
} );

// Title button Portfolio 2 c 1 
wp.customize( 'avik_title_button_portfolio_2_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'a.button-portfolio-2-c-1' ).html( newval );
		
	} );
} );

// Title client Portfolio 3 c 1
wp.customize( 'avik_title_client_portfolio_3_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-client-portfolio-3-c-1' ).html( newval );
		
	} );
} );

// Subtitle client Portfolio 3 c 1
wp.customize( 'avik-subtitle_client_portfolio_3_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-client-portfolio-3-c-1' ).html( newval );
		
	} );
} );

// Title project Portfolio 3 c 1 
wp.customize( 'avik-title_project_portfolio_3_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-project-portfolio-3-c-1' ).html( newval );
		
	} );
} );

// Subtitle project Portfolio 3 c 1
wp.customize( 'avik_subtitle_project_portfolio_3_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-project-portfolio-3-c-1' ).html( newval );
		
	} );
} );

// Title category Portfolio 3 c 1
wp.customize( 'avik_title_category_portfolio_3_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-category-portfolio-3-c-1' ).html( newval );
		
	} );
} );

// Subtitle category Portfolio 3 c 1
wp.customize( 'avik_subtitle_category_portfolio_3_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-category-portfolio-3-c-1' ).html( newval );
		
	} );
} );

// Title name Portfolio 3 c 1
wp.customize( 'avik_title_name_portfolio_3_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-name-portfolio-3-c-1' ).html( newval );
		
	} );
} );

// Subtitle name Portfolio 3 c 1 
wp.customize( 'avik_subtitle_name_portfolio_3_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-name-portfolio-3-c-1' ).html( newval );
		
	} );
} );

// Title button Portfolio 3 c 1 
wp.customize( 'avik_title_button_portfolio_3_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'a.button-portfolio-3-c-1' ).html( newval );
		
	} );
} );

// Title client Portfolio 4 c 1
wp.customize( 'avik_title_client_portfolio_4_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-client-portfolio-4-c-1' ).html( newval );
		
	} );
} );

// Subtitle client Portfolio 4 c 1
wp.customize( 'avik_subtitle_client_portfolio_4_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-client-portfolio-4-c-1' ).html( newval );
		
	} );
} );

// Title project Portfolio 4 c 1 
wp.customize( 'avik_title_project_portfolio_4_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-project-portfolio-4-c-1' ).html( newval );
		
	} );
} );

// Subtitle project Portfolio 4 c 1
wp.customize( 'avik_subtitle_project_portfolio_4_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-project-portfolio-4-c-1' ).html( newval );
		
	} );
} );

// Title category Portfolio 4 c 1
wp.customize( 'avik_title_category_portfolio_4_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-category-portfolio-4-c-1' ).html( newval );
		
	} );
} );

// Subtitle category Portfolio 4 c 1
wp.customize( 'avik_subtitle_category_portfolio_4_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-category-portfolio-4-c-1' ).html( newval );
		
	} );
} );

// Title name Portfolio 4 c 1
wp.customize( 'avik_title_name_portfolio_4_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-name-portfolio-4-c-1' ).html( newval );
		
	} );
} );

// Subtitle name Portfolio 4 c 1 
wp.customize( 'avik_subtitle_name_portfolio_4_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-name-portfolio-4-c-1' ).html( newval );
		
	} );
} );

// Title button Portfolio 4 c 1 
wp.customize( 'avik_title_button_portfolio_4_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'a.button-portfolio-4-c-1' ).html( newval );
		
	} );
} );

// Title client Portfolio 5 c 1
wp.customize( 'avik_title_client_portfolio_5_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-client-portfolio-5-c-1' ).html( newval );
		
	} );
} );

// Subtitle client Portfolio 5 c 1
wp.customize( 'avik_subtitle_client_portfolio_5_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-client-portfolio-5-c-1' ).html( newval );
		
	} );
} );

// Title project Portfolio 5 c 1 
wp.customize( 'avik_title_project_portfolio_5_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-project-portfolio-5-c-1' ).html( newval );
		
	} );
} );

// Subtitle project Portfolio 5 c 1
wp.customize( 'avik_subtitle_project_portfolio_5_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-project-portfolio-5-c-1' ).html( newval );
		
	} );
} );

// Title category Portfolio 5 c 1
wp.customize( 'avik_title_category_portfolio_5_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-category-portfolio-5-c-1' ).html( newval );
		
	} );
} );

// Subtitle category Portfolio 5 c 1
wp.customize( 'avik_subtitle_category_portfolio_5_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-category-portfolio-5-c-1' ).html( newval );
		
	} );
} );

// Title name Portfolio 5 c 1
wp.customize( 'avik_title_name_portfolio_5_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-name-portfolio-5-c-1' ).html( newval );
		
	} );
} );

// Subtitle name Portfolio 5 c 1 
wp.customize( 'avik_subtitle_name_portfolio_5_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-name-portfolio-5-c-1' ).html( newval );
		
	} );
} );

// Title button Portfolio 5 c 1 
wp.customize( 'avik_title_button_portfolio_5_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'a.button-portfolio-5-c-1' ).html( newval );
		
	} );
} );

// Title client Portfolio 6 c 1
wp.customize( 'avik_title_client_portfolio_6_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-client-portfolio-6-c-1' ).html( newval );
		
	} );
} );

// Subtitle client Portfolio 6 c 1
wp.customize( 'avik_subtitle_client_portfolio_6_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-client-portfolio-6-c-1' ).html( newval );
		
	} );
} );

// Title project Portfolio 6 c 1 
wp.customize( 'avik_title_project_portfolio_6_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-project-portfolio-6-c-1' ).html( newval );
		
	} );
} );

// Subtitle project Portfolio 6 c 1
wp.customize( 'avik_subtitle_project_portfolio_6_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-project-portfolio-6-c-1' ).html( newval );
		
	} );
} );

// Title category Portfolio 6 c 1
wp.customize( 'avik_title_category_portfolio_6_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-category-portfolio-6-c-1' ).html( newval );
		
	} );
} );

// Subtitle category Portfolio 6 c 1
wp.customize( 'avik_subtitle_category_portfolio_6_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-category-portfolio-6-c-1' ).html( newval );
		
	} );
} );

// Title name Portfolio 6 c 1
wp.customize( 'avik_title_name_portfolio_6_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-name-portfolio-6-c-1' ).html( newval );
		
	} );
} );

// Subtitle name Portfolio 6 c 1 
wp.customize( 'avik_subtitle_name_portfolio_6_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-name-portfolio-6-c-1' ).html( newval );
		
	} );
} );

// Title button Portfolio 6 c 1 
wp.customize( 'avik_title_button_portfolio_6_c_1', function( value ) {
	value.bind( function( newval ) {
		$( 'a.button-portfolio-6-c-1' ).html( newval );
		
	} );
} );

// Title client Portfolio 1 c 2
wp.customize( 'avik_title_client_portfolio_1_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-client-portfolio-1-c-2' ).html( newval );
		
	} );
} );

// Subtitle client Portfolio 1 c 2
wp.customize( 'avik_subtitle_client_portfolio_1_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-client-portfolio-1-c-2' ).html( newval );
		
	} );
} );

// Title project Portfolio 1 c 2 
wp.customize( 'avik_title_project_portfolio_1_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-project-portfolio-1-c-2' ).html( newval );
		
	} );
} );

// Subtitle project Portfolio 1 c 2
wp.customize( 'avik_subtitle_project_portfolio_1_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-project-portfolio-1-c-2' ).html( newval );
		
	} );
} );

// Title category Portfolio 1 c 2
wp.customize( 'avik_title_category_portfolio_1_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-category-portfolio-1-c-2' ).html( newval );
		
	} );
} );

// Subtitle category Portfolio 1 c 2
wp.customize( 'avik_subtitle_category_portfolio_1_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-category-portfolio-1-c-2' ).html( newval );
		
	} );
} );

// Title name Portfolio 1 c 2
wp.customize( 'avik_title_name_portfolio_1_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-name-portfolio-1-c-2' ).html( newval );
		
	} );
} );

// Subtitle name Portfolio 1 c 2 
wp.customize( 'avik_subtitle_name_portfolio_1_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-name-portfolio-1-c-2' ).html( newval );
		
	} );
} );

// Title button Portfolio 1 c 2 
wp.customize( 'avik_title_button_portfolio_1_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'a.button-portfolio-1-c-2' ).html( newval );
		
	} );
} );

// Title client Portfolio 2 c 2
wp.customize( 'avik_title_client_portfolio_2_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-client-portfolio-2-c-2' ).html( newval );
		
	} );
} );

// Subtitle client Portfolio 2 c 2
wp.customize( 'avik_subtitle_client_portfolio_2_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-client-portfolio-2-c-2' ).html( newval );
		
	} );
} );

// Title project Portfolio 2 c 2 
wp.customize( 'avik_title_project_portfolio_2_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-project-portfolio-2-c-2' ).html( newval );
		
	} );
} );

// Subtitle project Portfolio 2 c 2
wp.customize( 'avik_subtitle_project_portfolio_2_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-project-portfolio-2-c-2' ).html( newval );
		
	} );
} );

// Title category Portfolio 2 c 2
wp.customize( 'avik_title_category_portfolio_2_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-category-portfolio-2-c-2' ).html( newval );
		
	} );
} );

// Subtitle category Portfolio 2 c 2
wp.customize( 'avik_subtitle_category_portfolio_2_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-category-portfolio-2-c-2' ).html( newval );
		
	} );
} );

// Title name Portfolio 2 c 2
wp.customize( 'avik_title_name_portfolio_2_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-name-portfolio-2-c-2' ).html( newval );
		
	} );
} );

// Subtitle name Portfolio 2 c 2 
wp.customize( 'avik_subtitle_name_portfolio_2_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-name-portfolio-2-c-2' ).html( newval );
		
	} );
} );

// Title button Portfolio 2 c 2 
wp.customize( 'avik_title_button_portfolio_2_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'a.button-portfolio-2-c-2' ).html( newval );
		
	} );
} );

// Title client Portfolio 3 c 2
wp.customize( 'avik_title_client_portfolio_3_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-client-portfolio-3-c-2' ).html( newval );
		
	} );
} );

// Subtitle client Portfolio 3 c 2
wp.customize( 'avik_subtitle_client_portfolio_3_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-client-portfolio-3-c-2' ).html( newval );
		
	} );
} );

// Title project Portfolio 3 c 2 
wp.customize( 'avik_title_project_portfolio_3_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-project-portfolio-3-c-2' ).html( newval );
		
	} );
} );

// Subtitle project Portfolio 3 c 2
wp.customize( 'avik_subtitle_project_portfolio_3_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-project-portfolio-3-c-2' ).html( newval );
		
	} );
} );

// Title category Portfolio 3 c 2
wp.customize( 'avik_title_category_portfolio_3_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-category-portfolio-3-c-2' ).html( newval );
		
	} );
} );

// Subtitle category Portfolio 3 c 2
wp.customize( 'avik_subtitle_category_portfolio_3_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-category-portfolio-3-c-2' ).html( newval );
		
	} );
} );

// Title name Portfolio 3 c 2
wp.customize( 'avik_title_name_portfolio_3_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-name-portfolio-3-c-2' ).html( newval );
		
	} );
} );

// Subtitle name Portfolio 3 c 2 
wp.customize( 'avik_subtitle_name_portfolio_3_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-name-portfolio-3-c-2' ).html( newval );
		
	} );
} );

// Title button Portfolio 3 c 2 
wp.customize( 'avik_title_button_portfolio_3_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'a.button-portfolio-3-c-2' ).html( newval );
		
	} );
} );

// Title client Portfolio 4 c 2
wp.customize( 'avik_title_client_portfolio_4_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-client-portfolio-4-c-2' ).html( newval );
		
	} );
} );

// Subtitle client Portfolio 4 c 2
wp.customize( 'avik_subtitle_client_portfolio_4_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-client-portfolio-4-c-2' ).html( newval );
		
	} );
} );

// Title project Portfolio 4 c 2 
wp.customize( 'avik_title_project_portfolio_4_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-project-portfolio-4-c-2' ).html( newval );
		
	} );
} );

// Subtitle project Portfolio 4 c 2
wp.customize( 'avik_subtitle_project_portfolio_4_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-project-portfolio-4-c-2' ).html( newval );
		
	} );
} );

// Title category Portfolio 4 c 2
wp.customize( 'avik_title_category_portfolio_4_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-category-portfolio-4-c-2' ).html( newval );
		
	} );
} );

// Subtitle category Portfolio 4 c 2
wp.customize( 'avik_subtitle_category_portfolio_4_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-category-portfolio-4-c-2' ).html( newval );
		
	} );
} );

// Title name Portfolio 4 c 2
wp.customize( 'avik_title_name_portfolio_4_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-name-portfolio-4-c-2' ).html( newval );
		
	} );
} );

// Subtitle name Portfolio 4 c 2 
wp.customize( 'avik_subtitle_name_portfolio_4_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-name-portfolio-4-c-2' ).html( newval );
		
	} );
} );

// Title button Portfolio 4 c 2 
wp.customize( 'avik_title_button_portfolio_4_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'a.button-portfolio-4-c-2' ).html( newval );
		
	} );
} );

// Title client Portfolio 5 c 2
wp.customize( 'avik_title_client_portfolio_5_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-client-portfolio-5-c-2' ).html( newval );
		
	} );
} );

// Subtitle client Portfolio 5 c 2
wp.customize( 'avik_subtitle_client_portfolio_5_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-client-portfolio-5-c-2' ).html( newval );
		
	} );
} );

// Title project Portfolio 5 c 2 
wp.customize( 'avik_title_project_portfolio_5_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-project-portfolio-5-c-2' ).html( newval );
		
	} );
} );

// Subtitle project Portfolio 5 c 2
wp.customize( 'avik_subtitle_project_portfolio_5_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-project-portfolio-5-c-2' ).html( newval );
		
	} );
} );

// Title category Portfolio 5 c 2
wp.customize( 'avik_title_category_portfolio_5_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-category-portfolio-5-c-2' ).html( newval );
		
	} );
} );

// Subtitle category Portfolio 5 c 2
wp.customize( 'avik_subtitle_category_portfolio_5_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-category-portfolio-5-c-2' ).html( newval );
		
	} );
} );

// Title name Portfolio 5 c 2
wp.customize( 'avik_title_name_portfolio_5_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-name-portfolio-5-c-2' ).html( newval );
		
	} );
} );

// Subtitle name Portfolio 5 c 2 
wp.customize( 'avik_subtitle_name_portfolio_5_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-name-portfolio-5-c-2' ).html( newval );
		
	} );
} );

// Title button Portfolio 5 c 2 
wp.customize( 'avik_title_button_portfolio_5_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'a.button-portfolio-5-c-2' ).html( newval );
		
	} );
} );

// Title client Portfolio 6 c 2
wp.customize( 'avik_title_client_portfolio_6_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-client-portfolio-6-c-2' ).html( newval );
		
	} );
} );

// Subtitle client Portfolio 6 c 2
wp.customize( 'avik_subtitle_client_portfolio_6_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-client-portfolio-6-c-2' ).html( newval );
		
	} );
} );

// Title project Portfolio 6 c 2 
wp.customize( 'avik_title_project_portfolio_6_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-project-portfolio-6-c-2' ).html( newval );
		
	} );
} );

// Subtitle project Portfolio 6 c 2
wp.customize( 'avik_subtitle_project_portfolio_6_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-project-portfolio-6-c-2' ).html( newval );
		
	} );
} );

// Title category Portfolio 6 c 2
wp.customize( 'avik_title_category_portfolio_6_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-category-portfolio-6-c-2' ).html( newval );
		
	} );
} );

// Subtitle category Portfolio 6 c 2
wp.customize( 'avik_subtitle_category_portfolio_6_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-category-portfolio-6-c-2' ).html( newval );
		
	} );
} );

// Title name Portfolio 6 c 2
wp.customize( 'avik_title_name_portfolio_6_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-name-portfolio-6-c-2' ).html( newval );
		
	} );
} );

// Subtitle name Portfolio 6 c 2 
wp.customize( 'avik_subtitle_name_portfolio_6_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-name-portfolio-6-c-2' ).html( newval );
		
	} );
} );

// Title button Portfolio 6 c 2 
wp.customize( 'avik_title_button_portfolio_6_c_2', function( value ) {
	value.bind( function( newval ) {
		$( 'a.button-portfolio-6-c-2' ).html( newval );
		
	} );
} );

// Title client Portfolio 1 c 3
wp.customize( 'avik_title_client_portfolio_1_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-client-portfolio-1-c-3' ).html( newval );
		
	} );
} );

// Subtitle client Portfolio 1 c 3
wp.customize( 'avik_subtitle_client_portfolio_1_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-client-portfolio-1-c-3' ).html( newval );
		
	} );
} );

// Title project Portfolio 1 c 3 
wp.customize( 'avik_title_project_portfolio_1_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-project-portfolio-1-c-3' ).html( newval );
		
	} );
} );

// Subtitle project Portfolio 1 c 3
wp.customize( 'avik_subtitle_project_portfolio_1_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-project-portfolio-1-c-3' ).html( newval );
		
	} );
} );

// Title category Portfolio 1 c 3
wp.customize( 'avik_title_category_portfolio_1_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-category-portfolio-1-c-3' ).html( newval );
		
	} );
} );

// Subtitle category Portfolio 1 c 3
wp.customize( 'avik_subtitle_category_portfolio_1_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-category-portfolio-1-c-3' ).html( newval );
		
	} );
} );

// Title name Portfolio 1 c 3
wp.customize( 'avik_title_name_portfolio_1_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-name-portfolio-1-c-3' ).html( newval );
		
	} );
} );

// Subtitle name Portfolio 1 c 3 
wp.customize( 'avik_subtitle_name_portfolio_1_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-name-portfolio-1-c-3' ).html( newval );
		
	} );
} );

// Title button Portfolio 1 c 3 
wp.customize( 'avik_title_button_portfolio_1_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'a.button-portfolio-1-c-3' ).html( newval );
		
	} );
} );

// Title client Portfolio 2 c 3
wp.customize( 'avik_title_client_portfolio_2_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-client-portfolio-2-c-3' ).html( newval );
		
	} );
} );

// Subtitle client Portfolio 2 c 3
wp.customize( 'avik_subtitle_client_portfolio_2_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-client-portfolio-2-c-3' ).html( newval );
		
	} );
} );

// Title project Portfolio 2 c 3 
wp.customize( 'avik_title_project_portfolio_2_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-project-portfolio-2-c-3' ).html( newval );
		
	} );
} );

// Subtitle project Portfolio 2 c 3
wp.customize( 'avik_subtitle_project_portfolio_2_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-project-portfolio-2-c-3' ).html( newval );
		
	} );
} );

// Title category Portfolio 2 c 3
wp.customize( 'avik_title_category_portfolio_2_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-category-portfolio-2-c-3' ).html( newval );
		
	} );
} );

// Subtitle category Portfolio 2 c 3
wp.customize( 'avik_subtitle_category_portfolio_2_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-category-portfolio-2-c-3' ).html( newval );
		
	} );
} );

// Title name Portfolio 2 c 3
wp.customize( 'avik_title_name_portfolio_2_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-name-portfolio-2-c-3' ).html( newval );
		
	} );
} );

// Subtitle name Portfolio 2 c 3 
wp.customize( 'avik_subtitle_name_portfolio_2_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-name-portfolio-2-c-3' ).html( newval );
		
	} );
} );

// Title button Portfolio 2 c 3 
wp.customize( 'avik_title_button_portfolio_2_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'a.button-portfolio-2-c-3' ).html( newval );
		
	} );
} );

// Title client Portfolio 3 c 3
wp.customize( 'avik_title_client_portfolio_3_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-client-portfolio-3-c-3' ).html( newval );
		
	} );
} );

// Subtitle client Portfolio 3 c 3
wp.customize( 'avik_subtitle_client_portfolio_3_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-client-portfolio-3-c-3' ).html( newval );
		
	} );
} );

// Title project Portfolio 3 c 3 
wp.customize( 'avik_title_project_portfolio_3_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-project-portfolio-3-c-3' ).html( newval );
		
	} );
} );

// Subtitle project Portfolio 3 c 3
wp.customize( 'avik_subtitle_project_portfolio_3_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-project-portfolio-3-c-3' ).html( newval );
		
	} );
} );

// Title category Portfolio 3 c 3
wp.customize( 'avik_title_category_portfolio_3_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-category-portfolio-3-c-3' ).html( newval );
		
	} );
} );

// Subtitle category Portfolio 3 c 3
wp.customize( 'avik_subtitle_category_portfolio_3_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-category-portfolio-3-c-3' ).html( newval );
		
	} );
} );

// Title name Portfolio 3 c 3
wp.customize( 'avik_title_name_portfolio_3_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-name-portfolio-3-c-3' ).html( newval );
		
	} );
} );

// Subtitle name Portfolio 3 c 3 
wp.customize( 'avik_subtitle_name_portfolio_3_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-name-portfolio-3-c-3' ).html( newval );
		
	} );
} );

// Title button Portfolio 3 c 3 
wp.customize( 'avik_title_button_portfolio_3_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'a.button-portfolio-3-c-3' ).html( newval );
		
	} );
} );

// Title client Portfolio 4 c 3
wp.customize( 'avik_title_client_portfolio_4_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-client-portfolio-4-c-3' ).html( newval );
		
	} );
} );

// Subtitle client Portfolio 4 c 3
wp.customize( 'avik_subtitle_client_portfolio_4_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-client-portfolio-4-c-3' ).html( newval );
		
	} );
} );

// Title project Portfolio 4 c 3 
wp.customize( 'avik_title_project_portfolio_4_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-project-portfolio-4-c-3' ).html( newval );
		
	} );
} );

// Subtitle project Portfolio 4 c 3
wp.customize( 'avik_subtitle_project_portfolio_4_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-project-portfolio-4-c-3' ).html( newval );
		
	} );
} );

// Title category Portfolio 4 c 3
wp.customize( 'avik_title_category_portfolio_4_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-category-portfolio-4-c-3' ).html( newval );
		
	} );
} );

// Subtitle category Portfolio 4 c 3
wp.customize( 'avik_subtitle_category_portfolio_4_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-category-portfolio-4-c-3' ).html( newval );
		
	} );
} );

// Title name Portfolio 4 c 3
wp.customize( 'avik_title_name_portfolio_4_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-name-portfolio-4-c-3' ).html( newval );
		
	} );
} );

// Subtitle name Portfolio 4 c 3 
wp.customize( 'avik_subtitle_name_portfolio_4_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-name-portfolio-4-c-3' ).html( newval );
		
	} );
} );

// Title button Portfolio 4 c 3 
wp.customize( 'avik_title_button_portfolio_4_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'a.button-portfolio-4-c-3' ).html( newval );
		
	} );
} );

// Title client Portfolio 5 c 3
wp.customize( 'avik_title_client_portfolio_5_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-client-portfolio-5-c-3' ).html( newval );
		
	} );
} );

// Subtitle client Portfolio 5 c 3
wp.customize( 'avik_subtitle_client_portfolio_5_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-client-portfolio-5-c-3' ).html( newval );
		
	} );
} );

// Title project Portfolio 5 c 3 
wp.customize( 'avik_title_project_portfolio_5_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-project-portfolio-5-c-3' ).html( newval );
		
	} );
} );

// Subtitle project Portfolio 5 c 3
wp.customize( 'avik_subtitle_project_portfolio_5_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-project-portfolio-5-c-3' ).html( newval );
		
	} );
} );

// Title category Portfolio 5 c 3
wp.customize( 'avik_title_category_portfolio_5_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-category-portfolio-5-c-3' ).html( newval );
		
	} );
} );

// Subtitle category Portfolio 5 c 3
wp.customize( 'avik_subtitle_category_portfolio_5_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-category-portfolio-5-c-3' ).html( newval );
		
	} );
} );

// Title name Portfolio 5 c 3
wp.customize( 'avik_title_name_portfolio_5_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-name-portfolio-5-c-3' ).html( newval );
		
	} );
} );

// Subtitle name Portfolio 5 c 3 
wp.customize( 'avik_subtitle_name_portfolio_5_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-name-portfolio-5-c-3' ).html( newval );
		
	} );
} );

// Title button Portfolio 5 c 3 
wp.customize( 'avik_title_button_portfolio_5_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'a.button-portfolio-5-c-3' ).html( newval );
		
	} );
} );

// Title client Portfolio 6 c 3
wp.customize( 'avik_title_client_portfolio_6_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-client-portfolio-6-c-3' ).html( newval );
		
	} );
} );

// Subtitle client Portfolio 6 c 3
wp.customize( 'avik_subtitle_client_portfolio_6_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-client-portfolio-6-c-3' ).html( newval );
		
	} );
} );

// Title project Portfolio 6 c 3 
wp.customize( 'avik_title_project_portfolio_6_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-project-portfolio-6-c-3' ).html( newval );
		
	} );
} );

// Subtitle project Portfolio 6 c 3
wp.customize( 'avik_subtitle_project_portfolio_6_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-project-portfolio-6-c-3' ).html( newval );
		
	} );
} );

// Title category Portfolio 6 c 3
wp.customize( 'avik_title_category_portfolio_6_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-category-portfolio-6-c-3' ).html( newval );
		
	} );
} );

// Subtitle category Portfolio 6 c 3
wp.customize( 'avik_subtitle_category_portfolio_6_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-category-portfolio-6-c-3' ).html( newval );
		
	} );
} );

// Title name Portfolio 6 c 3
wp.customize( 'avik_title_name_portfolio_6_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-name-portfolio-6-c-3' ).html( newval );
		
	} );
} );

// Subtitle name Portfolio 6 c 3 
wp.customize( 'avik_subtitle_name_portfolio_6_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'p.subtitle-name-portfolio-6-c-3' ).html( newval );
		
	} );
} );

// Title button Portfolio 6 c 3 
wp.customize( 'avik_title_button_portfolio_6_c_3', function( value ) {
	value.bind( function( newval ) {
		$( 'a.button-portfolio-6-c-3' ).html( newval );
		
	} );
} );

// Title Nav All
wp.customize( 'avik_title_nav_all_portfolio', function( value ) {
	value.bind( function( newval ) {
		$( 'li.all' ).html( newval );
		
	} );
} );

// Title Nav 1
wp.customize( 'avik_title_nav_1_portfolio', function( value ) {
	value.bind( function( newval ) {
		$( 'li.one' ).html( newval );
		
	} );
} );

// Title Nav 2
wp.customize( 'avik_title_nav_2_portfolio', function( value ) {
	value.bind( function( newval ) {
		$( 'li.two' ).html( newval );
		
	} );
} );

// Title Nav 3
wp.customize( 'avik_title_nav_3_portfolio', function( value ) {
	value.bind( function( newval ) {
		$( 'li.three' ).html( newval );
		
	} );
} );

/* ------------------------------------------------------------------------- *
## 5 Blog */
/* ------------------------------------------------------------------------- */  

// Title Blog
wp.customize( 'avik_title_blog', function( value ) {
	value.bind( function( newval ) {
		$( 'h2.blog' ).html( newval );
		
	} );
} );

/* ------------------------------------------------------------------------- *
## 6 Contact */
/* ------------------------------------------------------------------------- */  

// Title Contact
wp.customize( 'avik_title_contact', function( value ) {
	value.bind( function( newval ) {
		$( '.address h3' ).html( newval );
		
	} );
} );

// Title state Contact
wp.customize( 'avik_title_state_contact', function( value ) {
	value.bind( function( newval ) {
		$( 'li.state' ).html( newval );
		
	} );
} );

// Title city Contact
wp.customize( 'avik_title_city_contact', function( value ) {
	value.bind( function( newval ) {
		$( 'li.city' ).html( newval );
		
	} );
} );

// Title mail Contact
wp.customize( 'avik_title_mail_contact', function( value ) {
	value.bind( function( newval ) {
		$( 'li.mail' ).html( newval );
		
	} );
} );

// Title phone Contact
wp.customize( 'avik_title_phone_contact', function( value ) {
	value.bind( function( newval ) {
		$( 'li.phone' ).html( newval );
		
	} );
} );

// Title Widget Contact
wp.customize( 'avik_title_widget_contact', function( value ) {
	value.bind( function( newval ) {
		$( '.widget-contact h3' ).html( newval );
		
	} );
} );

/* ------------------------------------------------------------------------- *
## 7 Footer */
/* ------------------------------------------------------------------------- */  

// Title "Power by" Footer
wp.customize( 'avik_title_power_footer', function( value ) {
	value.bind( function( newval ) {
		$( 'p.title-power' ).html( newval );
		
	} );
} );

/* ------------------------------------------------------------------------- *
## 8 Page 404 */
/* ------------------------------------------------------------------------- */  

// Title Page 404
wp.customize( 'avik_title_page_404', function( value ) {
	value.bind( function( newval ) {
		$( 'h1.bold-number-404' ).html( newval );
		
	} );
} );

// Subtitle Page 404
wp.customize( 'avik_subtitle_page_404', function( value ) {
	value.bind( function( newval ) {
		$( 'h2.bold-text-404' ).html( newval );
		
	} );
} );

// Button Page 404
wp.customize( 'avik_title_button_404', function( value ) {
	value.bind( function( newval ) {
		$( '.page-404 a' ).html( newval );
		
	} );
} );

/* ------------------------------------------------------------------------- *
## 9 Share */
/* ------------------------------------------------------------------------- */

// Title Share
wp.customize( 'avik_title_share', function( value ) {
	value.bind( function( newval ) {
		$( 'h3.title-share' ).html( newval );
		
	} );
} );

/* ------------------------------------------------------------------------- *
## 10 Color Filter Header Home */
/* ------------------------------------------------------------------------- */

// Color Filter
wp.customize( 'avik_color_filter_header', function( value ) {
	value.bind( function( newval ) {
		$( '.filter-header' ).css('background-color', newval );
		
	} );
} );




} )( jQuery );
