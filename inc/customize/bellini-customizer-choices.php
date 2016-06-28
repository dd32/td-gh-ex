<?php

// Social Media Icon Choices
function bellini_social_accounts_icons(){
    
    return array(
    	''							=> esc_html__( 'None', 'bellini'), 
        'fa fa-500px' 				=> esc_html__( '500PX', 'bellini'), 
        'fa fa-amazon' 				=> esc_html__( 'Amazon', 'bellini'), 
        'fa fa-android' 			=> esc_html__( 'Android', 'bellini'), 
        'fa fa-angellist' 			=> esc_html__( 'AngelList', 'bellini'),
        'fa fa-apple' 				=> esc_html__( 'Apple', 'bellini'), 
        'fa fa-behance' 			=> esc_html__( 'Behance', 'bellini'), 
        'fa fa-behance-square' 		=> esc_html__( 'Behance Square', 'bellini'), 
        'fa fa-bitbucket' 			=> esc_html__( 'Bitbucket', 'bellini'),
        'fa fa-bitbucket-square'	=> esc_html__( 'Bitbucket Square', 'bellini'), 
        'fa fa-btc' 				=> esc_html__( 'Bitcoin', 'bellini'), 
        'fa fa-codepen' 			=> esc_html__( 'Codepen', 'bellini'), 
        'fa fa-delicious' 			=> esc_html__( 'Delicious', 'bellini'),
        'fa fa-deviantart' 			=> esc_html__( 'DeviantArt', 'bellini'), 
        'fa fa-digg' 				=> esc_html__( 'Digg', 'bellini'), 
        'fa fa-dribbble' 			=> esc_html__( 'Dribbble', 'bellini'), 
        'fa fa-dropbox' 			=> esc_html__( 'Dropbox', 'bellini'),
        'fa fa-drupal' 				=> esc_html__( 'Drupal', 'bellini'),
        'fa fa-envelop' 			=> esc_html__( 'Email', 'bellini'), 
        'fa fa-envelope-o' 			=> esc_html__( 'Email V2', 'bellini'),
        'fa fa-envelope-square' 	=> esc_html__( 'Email V3', 'bellini'),
        'fa fa-facebook' 			=> esc_html__( 'Facebook', 'bellini'), 
        'fa fa-facebook-official' 	=> esc_html__( 'Facebook Official', 'bellini'), 
        'fa fa-facebook-square' 	=> esc_html__( 'Facebook Square', 'bellini'),
        'fa fa-flickr' 				=> esc_html__( 'Flickr', 'bellini'), 
        'fa fa-foursquare' 			=> esc_html__( 'Foursquare', 'bellini'), 
        'fa fa-product-hunt' 		=> esc_html__( 'Product Hunt', 'bellini'), 
        'fa fa-pinterest-square' 	=> esc_html__( 'Pinterest Square', 'bellini'),
        'fa fa-pinterest-p'			=> esc_html__( 'Pinterest V2', 'bellini'), 
        'fa fa-pinterest' 			=> esc_html__( 'Pinterest', 'bellini'), 
        'fa fa-medium' 				=> esc_html__( 'Medium', 'bellini'), 
        'fa fa-linkedin-square' 	=> esc_html__( 'LinkedIn Square', 'bellini'),
        'fa fa-linkedin' 			=> esc_html__( 'LinkedIn', 'bellini'), 
        'fa fa-lastfm-square' 		=> esc_html__( 'Last.fm Square', 'bellini'), 
        'fa fa-lastfm' 				=> esc_html__( 'Last.fm', 'bellini'), 
        'fa fa-jsfiddle' 			=> esc_html__( 'JSFiddle', 'bellini'),
        'fa fa-joomla' 				=> esc_html__( 'Joomla', 'bellini'), 
        'fa fa-instagram' 			=> esc_html__( 'Instagram', 'bellini'), 
        'fa fa-houzz' 				=> esc_html__( 'Houzz', 'bellini'), 
        'fa fa-hacker-news' 		=> esc_html__( 'Hacker News', 'bellini'),
        'fa fa-google-plus-square' 	=> esc_html__( 'Google+ Square', 'bellini'), 
        'fa fa-google-plus' 		=> esc_html__( 'Google+', 'bellini'), 
        'fa fa-google' 				=> esc_html__( 'Google', 'bellini'), 
        'fa fa-github-square' 		=> esc_html__( 'GitHub Square', 'bellini'),
        'fa fa-github-alt'			=> esc_html__( 'GitHub V2', 'bellini'), 
        'fa fa-github' 				=> esc_html__( 'GitHub', 'bellini'), 
        'fa fa-codepen' 			=> esc_html__( 'Codepen', 'bellini'),
        'fa fa-vk' 					=> esc_html__( 'VKontakte', 'bellini'), 
        'fa fa-skype' 				=> esc_html__( 'Skype', 'bellini'), 
        'fa fa-slack' 				=> esc_html__( 'Slack', 'bellini'), 
        'fa fa-slideshare' 			=> esc_html__( 'SlideShare', 'bellini'),
        'fa fa-soundcloud' 			=> esc_html__( 'SoundCloud', 'bellini'), 
        'fa fa-spotify' 			=> esc_html__( 'Spotify', 'bellini'), 
        'fa fa-tripadvisor' 		=> esc_html__( 'TripAdvisor', 'bellini'), 
        'fa fa-twitch' 				=> esc_html__( 'Twitch', 'bellini'),
        'fa fa-viadeo'				=> esc_html__( 'Viadeo', 'bellini'), 
        'fa fa-viadeo-square' 		=> esc_html__( 'Viadeo Square', 'bellini'), 
        'fa fa-vine' 				=> esc_html__( 'Vine', 'bellini'), 
        'fa fa-windows' 			=> esc_html__( 'Windows', 'bellini'),
        'fa fa-wordpress' 			=> esc_html__( 'WordPress', 'bellini'), 
        'fa fa-xing' 				=> esc_html__( 'Xing', 'bellini'), 
        'fa fa-xing-square' 		=> esc_html__( 'Xing Square', 'bellini'), 
        'fa fa-yelp' 				=> esc_html__( 'Yelp', 'bellini'),
        'fa fa-vimeo' 				=> esc_html__( 'Vimeo', 'bellini'), 
        'fa fa-youtube-play' 		=> esc_html__( 'YouTube Play', 'bellini'), 
        'fa fa-youtube-square' 		=> esc_html__( 'YouTube Square', 'bellini'), 
        'fa fa-youtube' 			=> esc_html__( 'YouTube', 'bellini'),
        'fa fa-reddit' 				=> esc_html__( 'Reddit', 'bellini'),
        'fa fa-reddit-alien' 		=> esc_html__( 'Reddit V2', 'bellini'), 
        'fa fa-reddit-square' 		=> esc_html__( 'Reddit Square', 'bellini'), 
        'fa fa-snapchat' 			=> esc_html__( 'Snapchat', 'bellini'), 
        'fa fa-snapchat-ghost' 		=> esc_html__( 'Snapchat V2', 'bellini'),
        'fa fa-snapchat-square' 	=> esc_html__( 'Snapchat V3', 'bellini'), 
        'fa fa-tencent-weibo' 		=> esc_html__( 'Weibo', 'bellini'), 
        'fa fa-tumblr' 				=> esc_html__( 'tumblr', 'bellini'), 
        'fa fa-tumblr-square' 		=> esc_html__( 'tumblr V2', 'bellini'),
        'fa fa-twitter-square'		=> esc_html__( 'Twitter', 'bellini'), 
        'fa fa-twitter' 			=> esc_html__( 'Twitter V2', 'bellini'), 
        'fa fa-weibo' 				=> esc_html__( 'Weibo V2', 'bellini'), 
        'fa fa-weixin' 				=> esc_html__( 'We Chat', 'bellini'),  
    );
}




function bellini_font_preset(){

    $font_family_array = array(
    	'abeubu'					=> 'Abel and Ubuntu',
        'abrcan'                    => 'Abril Fatface and Candal',
    	'abrdro'					=> 'Abril Fatface and Droid Sans',
    	'abrjos'					=> 'Abril Fatface and Josefin Sans',
    	'abrlat'					=> 'Abril Fatface and Lato',
        'abrope'                    => 'Abril Fatface and Open Sans',
    	'abrvol'					=> 'Abril Fatface and Vollkorn',
    	'aleope'					=> 'Alegreya and Open Sans',
    	'alesou'					=> 'Alegreya and Source Sans Pro',
    	'alflor'					=> 'Alfa Slab One & Lora',
    	'alfgen'					=> 'Alfa Slab One and Gentium Book',
    	'amatit'                    => 'Amaranth and Titillium Web',
    	'amaand'					=> 'Amatic SC and Andika',
    	'amajos'					=> 'Amatic SC and Josefin Sans',
    	'bevpon'					=> 'Bevan and Pontano Sans',
    	'bitsou'					=> 'Bitter & Source Sans Pro',
    	'bitral'					=> 'Bitter and Raleway',
    	'breimp'					=> 'Bree Serif and Imprima',
    	'brelor'					=> 'Bree Serif and Lora',
    	'breope'					=> 'Bree Serif and Open Sans',
    	'cabold'  					=> 'Cabin and Old Standard TT',
    	'canimp'					=> 'Cantata One and Imprima',
        'caralm'                    => 'Cardo and Almendra Display',
    	'carjos'					=> 'Cardo and Josefin Sans',
    	'cliebg'					=> 'Clicker Script and EB Garamond',
    	'creabe'					=> 'Crete Round and AbeeZee',
    	'danebg'					=> 'Dancing Script and EB Garamond',
    	'danled'					=> 'Dancing Script and Ledger',
    	'didari'					=> 'Didact Gothic and Arimo',
    	'dosope'					=> 'Dosis and Open Sans',
    	'drocab'					=> 'Droid Sans and Cabin',
    	'drfosw'					=> 'Droid Serif and Oswald',
        'exolat'                    => 'Exo 2 and Lato',
        'exolor'                    => 'Exo 2 and Lora',
        'exoope'                    => 'Exo 2 and Open Sans',
        'exoosw'                    => 'Exo 2 and Oswald',
        'exorob'                    => 'Exo 2 and Roboto',
        'exosou'                    => 'Exo 2 and Roboto',
    	'fjaave'					=> 'Fjalla One and Average',
    	'fjacan'					=> 'Fjalla One and Cantarell',
    	'flaasa'					=> 'Flamenco and Asap',
    	'fradid'					=> 'Francois One and Didact Gothic',
    	'fralat'					=> 'Francois One and Lato',
    	'fraope'					=> 'Francois One and Open Sans',
        'genope'                    => 'Gentium Basic and Open Sans',
    	'hinope'					=> 'Hind and Open Sans',
    	'indlat'					=> 'Indie Flower and Lato',
    	'indosw'					=> 'Indie Flower and Oswald',
    	'indpop'					=> 'Indie Flower and Poppins',
    	'josjos'					=> 'Josefin Slab and Josefin Sans',
        'josplay'                   => 'Josefin Sans and Playfair Display',
        'jobmav'					=> 'Josefin Slab and Maven Pro',
        'jobosw'					=> 'Josefin Slab and Oswald',
        'kreubu'					=> 'Kreon and Ubuntu',
        'istlor'					=> 'Istok Web and Lora',
        'latmer'					=> 'Lato and Merriweather',
        'libmon'					=> 'Libre Baskerville and Montserrat',
        'libope'					=> 'Libre Baskerville and Open Sans',
        'libubu'					=> 'Libre Baskerville and Ubuntu',
        'lobari'					=> 'Lobster and Arimo',
        'lobcab'					=> 'Lobster and Cabin',
        'lobmul'                    => 'Lobster and Muli',
        'lobvol'					=> 'Lobster and Vollkorn',
        'lorope'                    => 'Lora and Open Sans',
        'lorsou'					=> 'Lora and Source Sans Pro',
        'luslat'					=> 'Lustria and Lato',
        'medlat'					=> 'Medula One and Lato',
        'merope'					=> 'Merriweather and Open Sans',
        'merosw'					=> 'Merriweather and Oswald',
        'mersou'					=> 'Merriweather and Source Sans Pro',
        'moncar'					=> 'Montserrat and Cardo',
        'moncri'					=> 'Montserrat and Crimson Text',
        'mondom'					=> 'Montserrat and Domine',
        'monhin'					=> 'Montserrat and Hind',
        'mpnist'					=> 'Montserrat and Istok Web',
        'monneu'					=> 'Montserrat and Neuton',
        'monpla'					=> 'Montserrat and Playfair Display',
        'monpon'					=> 'Montserrat and Pontano Sans',
        'monrob'					=> 'Montserrat and Roboto',
        'mulpla'					=> 'Muli and Playfair Display',
        'nixled'					=> 'Nixie One and Ledger',
        'nixlib'					=> 'Nixie One and Libre Baskerville',
        'nunale'					=> 'Nunito and Alegreya',
        'nunlor'					=> 'Nunito and Lora',
        'nunope'					=> 'Nunito and Open Sans',
        'oldque'					=> 'Old Standard TT and Questrial',
        'opegen'					=> 'Open Sans and Gentium Book Basic',
        'opelib'					=> 'Open Sans and Libre Baskerville',
        'opelor'					=> 'Open Sans and Lora',
        'openun'					=> 'Open Sans and Nunito',
        'opeosw'					=> 'Open Sans and Oswald',
        'opepla'					=> 'Open Sans and Playfair Display SC',
        'opcosw'					=> 'Open Sans Condensed and Oswald',
        'opcope'					=> 'Open Sans Condensed and Open Sans',
        'opcrob'					=> 'Open Sans Condensed and Roboto',
        'oswdro'					=> 'Oswald & Droid Serif',
        'oswdom'                    => 'Oswald and Domine',
        'oswdrod'					=> 'Oswald & Droid Sans',
        'oswmer'					=> 'Oswald and Merriweather',
        'oswmul'					=> 'Oswald and Muli',
        'oswold'					=> 'Oswald and Old Standard TT',
        'oswope'					=> 'Oswald and Open Sans',
        'oswqua'					=> 'Oswald and Quattrocento',
        'ovomul'					=> 'Ovo and Muli',
        'oxysou'					=> 'Oxygen and Source Sans Pro',
        'pacari'					=> 'Pacifico and Arimo',
        'patlor'					=> 'Patua One and Lora',
        'patosw'					=> 'Patua One and Oswald',
        'paydro'					=> 'Paytone One and Droid Sans',
        'phimul'					=> 'Philosopher and Muli',
        'plaali'					=> 'Playfair Display and Alice',
        'plafau'					=> 'Playfair Display and Fauna One',
        'plalat'					=> 'Playfair Display and Lato',
        'planot'                    => 'Playfair Display and Noto Serif',
        'plaope'					=> 'Playfair Display and Open Sans',
        'plakru'                    => 'Playfair Display and Sree Krushnadevaraya',        
        'plavol'					=> 'Playfair Display and Vollkorn',
        'poiope'                    => 'Poiret One and Open Sans',        
        'poilat'                    => 'Poiret One and Lato',        
        'ptscab'					=> 'PT Sans and Cabin',
        'ptsdid'					=> 'PT Sans and Didact Gothic',
        'ptslat'					=> 'PT Sans and Lato',
        'ptsptr'					=> 'PT Sans and PT Serif',
        'ptsrob'                    => 'PT Sans and Roboto',
        'ptrope'					=> 'PT Serif and Open Sans',
        'ptrpts'					=> 'PT Serif and PT Sans',
        'quajud'					=> 'Quando and Judson',
        'qutfan'					=> 'Quattrocento and Fanwood Text',
        'qutqus'					=> 'Quattrocento and Quattrocento Sans',
        'quiebg'					=> 'Quicksand and EB Garamond',
        'raldros'                   => 'Raleway and Droid Sans',
        'raldrof'                   => 'Raleway and Droid Serif',
        'rallat'                    => 'Raleway and Lato',
        'rallob'                    => 'Raleway and Lobster',
        'ralope'                    => 'Raleway and Open Sans',
        'ralosw'                    => 'Raleway and Oswald',
        'ralpop'                    => 'Raleway and Poppins',
        'ralcab'					=> 'Raleway and Cabin',
        'ralmer'					=> 'Raleway and Merriweather',
        'ralrob'					=> 'Raleway and Roboto',
        'rangud'					=> 'Rancho and Gudea',
        'roboto'                    => 'Roboto',
        'robnun'					=> 'Roboto and Nunito',
        'rosope'					=> 'Roboto Slab and Open Sans',
        'rosrob'					=> 'Roboto Slab and Roboto',
        'rokdros'                   => 'Rokkitt and Droid Sans',
        'roklat'                    => 'Rokkitt and Lato',
        'rokope'                    => 'Rokkitt and Open Sans',
        'rokosw'                    => 'Rokkitt and Oswald',
        'rokrob'					=> 'Rokkitt and Roboto',
        'rokubu'                    => 'Rokkitt and Ubuntu',
        'rubrob'                    => 'Rubik Mono One and Roboto Condensed',        
        'rufsin'                    => 'Rufina and Sintony',
        'sacali'                    => 'Sacramento and Alice',
        'sankam'                    => 'Sansita One and Kameron',
        'sharob'                    => 'Shadows and Roboto',
        'sigope'                    => 'Signika and Open Sans',
        'squall'                    => 'Squada One and Allerta',
        'stipon'                    => 'Stint Ultra and Pontano Sans',
        'ubucab'                    => 'Ubuntu and Cabin',
        'ubudid'                    => 'Ubuntu and Didact Gothic',
        'ubuhin'                    => 'Ubuntu and Hind',
        'ubulat'                    => 'Ubuntu and Lato',
        'ubulor'                    => 'Ubuntu and Lora',
        'uburob'                    => 'Ubuntu and Roboto',
        'ubusou'                    => 'Ubuntu and Source Sans Pro',
        'ultsla'                    => 'Ultra and Slabo 13px',
        'univol'                    => 'Unica One and Vollkorn',
        'vidrob'                    => 'Vidaloka and Roboto',        
        'volral'                    => 'Vollkorn and Raleway',
        'volexo'					=> 'Vollkorn and Exo 2',
        'walkre'					=> 'Walter Turncoat and Kreon',
        'walmol'					=> 'Walter Turncoat and Molengo',
        'walosw'					=> 'Walter Turncoat and Oswald',
        'walvol'					=> 'Walter Turncoat and Vollkorn',
        'yanlat'                    => 'Yanone Kaffeesatz and Lato',         
        'yanope'                    => 'Yanone Kaffeesatz and Open Sans',        
        'yanosw'                    => 'Yanone Kaffeesatz and Oswald',         
        'yanrob'                    => 'Yanone Kaffeesatz and Roboto',        
        'yescri'					=> 'Yeseva One and Crimson Text',
        'yesjos'					=> 'Yeseva One and Josefin Sans',
        'yeslor'					=> 'Yeseva One and Lora',
        'yesope'					=> 'Yeseva One and Open Sans',
        'yesphi'					=> 'Yeseva One and Philosopher',




    );
    return $font_family_array;
}





function bellini_font_preset_title($font){

	if($font == 'abeubu'){ return "'Abel', sans-serif";}
    if($font == 'abrcan'){ return "'Abril Fatface', cursive";}
	if($font == 'abrdro'){ return "'Abril Fatface', cursive";}
	if($font == 'abrjos'){ return "'Abril Fatface', cursive";}
	if($font == 'abrlat'){ return "'Abril Fatface', cursive";}
    if($font == 'abrope'){ return "'Abril Fatface', cursive";}
	if($font == 'abrvol'){ return "'Abril Fatface', cursive";}
	if($font == 'aleope'){ return "'Alegreya', serif";}
	if($font == 'alesou'){ return "'Alegreya', serif";}
	if($font == 'alflor'){ return "'Alfa Slab One', cursive";}
	if($font == 'alfgen'){ return "'Alfa Slab One', cursive";}
	if($font == 'amatit'){ return "'Amaranth', sans-serif";}
	if($font == 'amaand'){ return "'Amatic SC', cursive";}
	if($font == 'amajos'){ return "'Amatic SC', cursive";}
	if($font == 'bevpon'){ return "'Bevan', cursive";}
	if($font == 'bitsou'){ return "'Bitter', serif";}
	if($font == 'bitral'){ return "'Bitter', serif";}
	if($font == 'breimp'){ return "'Bree Serif', serif";}
	if($font == 'brelor'){ return "'Bree Serif', serif";}
	if($font == 'breope'){ return "'Bree Serif', serif";}
	if($font == 'canimp'){ return "'Cantata One', serif";}
    if($font == 'caralm'){ return "'Cardo', serif";}
	if($font == 'carjos'){ return "'Cardo', serif";}
	if($font == 'cliebg'){ return "'Clicker Script', cursive";}
	if($font == 'creabe'){ return "'Crete Round', serif";}
	if($font == 'danebg'){ return "'Dancing Script', cursive";}
	if($font == 'danled'){ return "'Dancing Script', cursive";}
	if($font == 'didari'){ return "'Didact Gothic', sans-serif";}
	if($font == 'dosope'){ return "'Dosis', sans-serif";}
	if($font == 'drocab'){ return "'Droid Sans', sans-serif";}
	if($font == 'drfosw'){ return "'Droid Serif', serif";}
    if($font == 'exolat'){ return "'Exo 2', sans-serif";}
    if($font == 'exolor'){ return "'Exo 2', sans-serif";}
    if($font == 'exoope'){ return "'Exo 2', sans-serif";}
    if($font == 'exoosw'){ return "'Exo 2', sans-serif";}
    if($font == 'exorob'){ return "'Exo 2', sans-serif";}
    if($font == 'exosou'){ return "'Exo 2', sans-serif";}
	if($font == 'fjaave'){ return "'Fjalla One', sans-serif";}
	if($font == 'fjacan'){ return "'Fjalla One', sans-serif";}
	if($font == 'flaasa'){ return "'Flamenco', cursive";}
	if($font == 'fradid'){ return "'Francois One', sans-serif"; }
	if($font == 'fralat'){ return "'Francois One', sans-serif"; }
	if($font == 'fraope'){ return "'Francois One', sans-serif"; }
    if($font == 'genope'){ return "'Gentium Basic', serif"; }
	if($font == 'hinope'){ return "'Hind', sans-serif"; }
	if($font == 'indlat'){ return "'Indie Flower', cursive"; }
	if($font == 'indosw'){ return "'Indie Flower', cursive"; }
	if($font == 'indpop'){ return "'Indie Flower', cursive"; }
	if($font == 'josjos'){ return "'Josefin Slab', serif"; }
	if($font == 'josplay'){ return "'Josefin Sans', sans-serif"; }
	if($font == 'jobmav'){ return "'Josefin Slab', serif"; }
	if($font == 'jobosw'){ return "'Josefin Slab', serif"; }
	if($font == 'kreubu'){ return "'Kreon', serif"; }
	if($font == 'cabold'){ return "'Cabin', sans-serif";}
	if($font == 'istlor'){ return "'Istok Web', sans-serif";}
	if($font == 'latmer'){ return "'Lato', sans-serif";}
	if($font == 'libmon'){ return "'Libre Baskerville', serif";}
	if($font == 'libope'){ return "'Libre Baskerville', serif";}
	if($font == 'libubu'){ return "'Libre Baskerville', serif";}
	if($font == 'lobari'){ return "'Lobster', cursive";}
	if($font == 'lobcab'){ return "'Lobster', cursive";}
    if($font == 'lobmul'){ return "'Lobster', cursive";}
	if($font == 'lobvol'){ return "'Lobster', cursive";}
    if($font == 'lorope'){ return "'Lora', serif";}
	if($font == 'lorsou'){ return "'Lora', serif";}
	if($font == 'luslat'){ return "'Lustria', serif";}
	if($font == 'medlat'){ return "'Medula One', cursive";}
	if($font == 'merope'){ return "'Merriweather', serif";}
	if($font == 'merosw'){ return "'Merriweather', serif";}
	if($font == 'mersou'){ return "'Merriweather', serif";}
	if($font == 'moncar'){ return "'Montserrat', sans-serif";}
	if($font == 'moncri'){ return "'Montserrat', sans-serif";}
	if($font == 'mondom'){ return "'Montserrat', sans-serif";}
	if($font == 'monhin'){ return "'Montserrat', sans-serif";}
	if($font == 'monist'){ return "'Montserrat', sans-serif";}
	if($font == 'monneu'){ return "'Montserrat', sans-serif";}
	if($font == 'monpla'){ return "'Montserrat', sans-serif";}
	if($font == 'monpon'){ return "'Montserrat', sans-serif";}
	if($font == 'monrob'){ return "'Montserrat', sans-serif";}
	if($font == 'mulpla'){ return "'Muli', sans-serif";}
	if($font == 'nixled'){ return "'Nixie One', cursive";}
	if($font == 'nixlib'){ return "'Nixie One', cursive";}
	if($font == 'nunale'){ return "'Nunito', sans-serif";}
	if($font == 'nunlor'){ return "'Nunito', sans-serif";}
	if($font == 'nunope'){ return "'Nunito', sans-serif";}
	if($font == 'oldque'){ return "'Old Standard TT', serif";}
	if($font == 'opegen'){ return "'Open Sans', sans-serif";}
	if($font == 'opelib'){ return "'Open Sans', sans-serif";}
	if($font == 'opelor'){ return "'Open Sans', sans-serif";}
	if($font == 'openun'){ return "'Open Sans', sans-serif";}
	if($font == 'opeosw'){ return "'Open Sans', sans-serif";}
	if($font == 'opepla'){ return "'Open Sans', sans-serif";}
	if($font == 'opcosw'){ return "'Open Sans Condensed', sans-serif";}
	if($font == 'opcope'){ return "'Open Sans Condensed', sans-serif";}
	if($font == 'opcrob'){ return "'Open Sans Condensed', sans-serif";}
	if($font == 'oswdro'){ return "'Oswald', sans-serif";}
    if($font == 'oswdom'){ return "'Oswald', sans-serif";}
	if($font == 'oswdrod'){ return "'Oswald', sans-serif";}
	if($font == 'oswmer'){ return "'Oswald', sans-serif";}
	if($font == 'oswmul'){ return "'Oswald', sans-serif";}
	if($font == 'oswold'){ return "'Oswald', sans-serif";}
	if($font == 'oswope'){ return "'Oswald', sans-serif";}
	if($font == 'oswqua'){ return "'Oswald', sans-serif";}
	if($font == 'ovomul'){ return "'Ovo', serif";}
	if($font == 'oxysou'){ return "'Oxygen', sans-serif";}
	if($font == 'pacari'){ return "'Pacifico', cursive";}
	if($font == 'patlor'){ return "'Patua One', cursive";}
	if($font == 'patosw'){ return "'Patua One', cursive";}
	if($font == 'paydro'){ return "'Paytone One', sans-serif";}
	if($font == 'phimul'){ return "'Philosopher', sans-serif";}
	if($font == 'plaali'){ return "'Playfair Display', serif";}
	if($font == 'plafau'){ return "'Playfair Display', serif";}
	if($font == 'plalat'){ return "'Playfair Display', serif";}
    if($font == 'planot'){ return "'Playfair Display', serif";}
	if($font == 'plaope'){ return "'Playfair Display', serif";}
    if($font == 'plakru'){ return "'Playfair Display', serif";}   
	if($font == 'plavol'){ return "'Playfair Display', serif";}
    if($font == 'poiope'){ return "'Poiret One', cursive";}     
    if($font == 'poilat'){ return "'Poiret One', cursive";}    
	if($font == 'ptscab'){ return "'PT Sans', sans-serif";}
	if($font == 'ptsdid'){ return "'PT Sans', sans-serif";}
	if($font == 'ptslat'){ return "'PT Sans', sans-serif";}
	if($font == 'ptsptr'){ return "'PT Sans', sans-serif";}
    if($font == 'ptsrob'){ return "'PT Sans', sans-serif";}
	if($font == 'ptrope'){ return "'PT Serif', serif";}
	if($font == 'ptrpts'){ return "'PT Serif', serif";}
	if($font == 'quajud'){ return "'Quando', serif";}
	if($font == 'qutfan'){ return "'Quattrocento', serif";}
	if($font == 'qutqus'){ return "'Quattrocento', serif";}
	if($font == 'quiebg'){ return "'Quicksand', sans-serif";}
    if($font == 'raldros'){ return "'Raleway', sans-serif";}
    if($font == 'raldrof'){ return "'Raleway', sans-serif";}
    if($font == 'rallat'){ return "'Raleway', sans-serif";}
    if($font == 'rallob'){ return "'Raleway', sans-serif";}
    if($font == 'ralope'){ return "'Raleway', sans-serif";}
    if($font == 'ralosw'){ return "'Raleway', sans-serif";}
    if($font == 'ralpop'){ return "'Raleway', sans-serif";}
	if($font == 'ralcab'){ return "'Raleway', sans-serif";}
	if($font == 'ralmer'){ return "'Raleway', sans-serif";}
	if($font == 'ralrob'){ return "'Raleway', sans-serif";}
	if($font == 'rangud'){ return "'Rancho', cursive";}
    if($font == 'roboto'){ return "'Roboto', sans-serif";}
	if($font == 'robnun'){ return "'Roboto', sans-serif";}
	if($font == 'rosope'){ return "'Roboto Slab', serif";}
	if($font == 'rosrob'){ return "'Roboto Slab', serif";}
    if($font == 'rokdros'){ return "'Rokkitt', serif";}
    if($font == 'roklat'){ return "'Rokkitt', serif";}
    if($font == 'rokope'){ return "'Rokkitt', serif";}
    if($font == 'rokosw'){ return "'Rokkitt', serif";}
	if($font == 'rokrob'){ return "'Rokkitt', serif";}
    if($font == 'rokubu'){ return "'Rokkitt', serif";}
    if($font == 'rubrob'){ return "'Rubik Mono One', sans-serif";}    
    if($font == 'rufsin'){ return "'Rufina', serif";}
    if($font == 'sacali'){ return "'Sacramento', cursive";}
    if($font == 'sankam'){ return "'Sansita One', cursive";}
    if($font == 'sharob'){ return "'Shadows Into Light', cursive";}
    if($font == 'sigope'){ return "'Signika', sans-serif";}
    if($font == 'squall'){ return "'Squada One', cursive";}
    if($font == 'stipon'){ return "'Stint Ultra Expanded', cursive";}
    if($font == 'ubucab'){ return "'Ubuntu', sans-serif";}
    if($font == 'ubudid'){ return "'Ubuntu', sans-serif";}
    if($font == 'ubuhin'){ return "'Ubuntu', sans-serif";}
    if($font == 'ubulat'){ return "'Ubuntu', sans-serif";}
    if($font == 'ubulor'){ return "'Ubuntu', sans-serif";}
    if($font == 'uburob'){ return "'Ubuntu', sans-serif";}
    if($font == 'ubusou'){ return "'Ubuntu', sans-serif";}
    if($font == 'ultsla'){ return "'Ultra', serif";}
    if($font == 'univol'){ return "'Unica One', cursive";}
    if($font == 'vidrob'){ return "'Vidaloka', serif";}    
    if($font == 'volral'){ return "'Vollkorn', serif";}
	if($font == 'volexo'){ return "'Vollkorn', serif";}
	if($font == 'walkre'){ return "'Walter Turncoat', cursive";}
	if($font == 'walmol'){ return "'Walter Turncoat', cursive";}
	if($font == 'walosw'){ return "'Walter Turncoat', cursive";}
	if($font == 'walvol'){ return "'Walter Turncoat', cursive";}
    if($font == 'yanlat'){ return "'Yanone Kaffeesatz', sans-serif";}    
    if($font == 'yanope'){ return "'Yanone Kaffeesatz', sans-serif";}     
    if($font == 'yanosw'){ return "'Yanone Kaffeesatz', sans-serif";}     
    if($font == 'yanrob'){ return "'Yanone Kaffeesatz', sans-serif";}    
	if($font == 'yescri'){ return "'Yeseva One', cursive";}
	if($font == 'yesjos'){ return "'Yeseva One', cursive";}
	if($font == 'yeslor'){ return "'Yeseva One', cursive";}
	if($font == 'yesope'){ return "'Yeseva One', cursive";}
	if($font == 'yesphi'){ return "'Yeseva One', cursive";}



}

function bellini_font_preset_body($font){

	if($font == 'abeubu'){ return "'Ubuntu', sans-serif";}
    if($font == 'abrcan'){ return "'Candal', sans-serif";}
	if($font == 'abrdro'){ return "'Droid Sans', sans-serif";}
	if($font == 'abrjos'){ return "'Josefin Sans', sans-serif";}
	if($font == 'abrlat'){ return "'Lato', sans-serif";}
    if($font == 'abrope'){ return "'Open Sans', sans-serif";}
	if($font == 'abrvol'){ return "'Vollkorn', serif";}
	if($font == 'aleope'){ return "'Open Sans', sans-serif";}
	if($font == 'alesou'){ return "'Source Sans Pro', sans-serif";}
	if($font == 'alflor'){ return "'Lora', serif";}
	if($font == 'alfgen'){ return "'Gentium Book Basic', serif";}
	if($font == 'amatit'){ return "'Titillium Web', sans-serif";}
	if($font == 'amaand'){ return "'Andika', sans-serif";}
	if($font == 'amajos'){ return "'Josefin Sans', sans-serif";}
	if($font == 'bevpon'){ return "'Pontano Sans', sans-serif";}
	if($font == 'bitsou'){ return "'Source Sans Pro', sans-serif";}
	if($font == 'bitral'){ return "'Raleway', sans-serif";}
	if($font == 'breimp'){ return "'Imprima', sans-serif";}
	if($font == 'brelor'){ return "'Lora', serif";}
	if($font == 'breope'){ return "'Open Sans', sans-serif";}
	if($font == 'canimp'){ return "'Imprima', sans-serif";}
    if($font == 'caralm'){ return "'Almendra Display', cursive";}
	if($font == 'carjos'){ return "'Josefin Sans', sans-serif";}
	if($font == 'cliebg'){ return "'EB Garamond', serif";}
	if($font == 'creabe'){ return "'ABeeZee', sans-serif";}
	if($font == 'danebg'){ return "'EB Garamond', serif";}
	if($font == 'danled'){ return "'Ledger', serif";}
	if($font == 'didari'){ return "'Arimo', sans-serif";}
	if($font == 'dosope'){ return "'Open Sans', sans-serif";}
	if($font == 'drocab'){ return "'Cabin', sans-serif";}
	if($font == 'drfosw'){ return "'Oswald', sans-serif";}
    if($font == 'exolat'){ return "'Lato', sans-serif"; }
    if($font == 'exolor'){ return "'Lora', serif";}
    if($font == 'exoope'){ return "'Open Sans', sans-serif";}
    if($font == 'exoosw'){ return "'Oswald', sans-serif";}
    if($font == 'exorob'){ return "'Roboto', sans-serif";}
    if($font == 'exosou'){ return "'Source Sans Pro', sans-serif";}
	if($font == 'fjaave'){ return "'Average', serif";}
	if($font == 'fjacan'){ return "'Cantarell', sans-serif"; }
	if($font == 'flaasa'){ return "'Asap', sans-serif";}
	if($font == 'fradid'){ return "'Didact Gothic', sans-serif"; }
	if($font == 'fralat'){ return "'Lato', sans-serif"; }
	if($font == 'fraope'){ return "'Open Sans', sans-serif"; }
    if($font == 'genope'){ return "'Open Sans', sans-serif";}
	if($font == 'hinope'){ return "'Open Sans', sans-serif"; }
	if($font == 'indlat'){ return "'Lato', sans-serif";}
	if($font == 'indosw'){ return "'Oswald', sans-serif";}
	if($font == 'indpop'){ return "'Poppins', sans-serif"; }
	if($font == 'josjos'){ return "'Josefin Sans', sans-serif"; }
	if($font == 'josplay'){ return "'Playfair Display', serif";}
	if($font == 'jobmav'){ return "'Maven Pro', sans-serif"; }
	if($font == 'jobosw'){ return "'Oswald', sans-serif";}
	if($font == 'kreubu'){ return "'Ubuntu', sans-serif"; }
	if($font == 'cabold'){ return "'Old Standard TT', serif";}
	if($font == 'istlor'){ return "'Lora', serif";}
	if($font == 'latmer'){ return "'Merriweather', serif";}
	if($font == 'libmon'){ return "'Montserrat', sans-serif";}
	if($font == 'libope'){ return "'Open Sans', sans-serif";}
	if($font == 'libubu'){ return "'Ubuntu', sans-serif"; }
	if($font == 'lobari'){ return "'Arimo', sans-serif";}
	if($font == 'lobcab'){ return "'Cabin', sans-serif";}
    if($font == 'lobmul'){ return "'Muli', sans-serif";}
	if($font == 'lobvol'){ return "'Vollkorn', serif";}
    if($font == 'lorope'){ return "'Open Sans', sans-serif";}
	if($font == 'lorsou'){ return "'Source Sans Pro', sans-serif";}
	if($font == 'luslat'){ return "'Lato', sans-serif";}
	if($font == 'medlat'){ return "'Lato', sans-serif";}
	if($font == 'merope'){ return "'Open Sans', sans-serif";}
	if($font == 'merosw'){ return "'Oswald', sans-serif";}
	if($font == 'mersou'){ return "'Source Sans Pro', sans-serif";}
	if($font == 'moncar'){ return "'Cardo', serif";}
	if($font == 'moncri'){ return "'Crimson Text', serif";}
	if($font == 'mondom'){ return "'Domine', serif";}
	if($font == 'monhin'){ return "'Hind', sans-serif"; }
	if($font == 'monist'){ return "'Istok Web', sans-serif";}
	if($font == 'monneu'){ return "'Neuton', serif";}
	if($font == 'monpla'){ return "'Playfair Display', serif";}
	if($font == 'monpon'){ return "'Pontano Sans', sans-serif";}
	if($font == 'monrob'){ return "'Roboto', sans-serif";}
	if($font == 'mulpla'){ return "'Playfair Display', serif";}
	if($font == 'nixled'){ return "'Ledger', serif";}
	if($font == 'nixlib'){ return "'Libre Baskerville', serif";}
	if($font == 'nunale'){ return "'Alegreya', serif";}
	if($font == 'nunlor'){ return "'Lora', serif";}
	if($font == 'nunope'){ return "'Open Sans', sans-serif";}
	if($font == 'oldque'){ return "'Questrial', sans-serif";}
	if($font == 'opegen'){ return "'Gentium Book Basic', serif";}
	if($font == 'opelib'){ return "'Libre Baskerville', serif";}
	if($font == 'opelor'){ return "'Lora', serif";}
	if($font == 'openun'){ return "'Nunito', sans-serif";}
	if($font == 'opeosw'){ return "'Oswald', sans-serif";}
	if($font == 'opepla'){ return "'Playfair Display', serif";}
	if($font == 'opcosw'){ return "'Oswald', sans-serif";}
	if($font == 'opcope'){ return "'Open Sans', sans-serif";}
	if($font == 'opcrob'){ return "'Roboto', sans-serif";}
	if($font == 'oswdro'){ return "'Droid Serif', serif";}
    if($font == 'oswdom'){ return "'Domine', serif";}
	if($font == 'oswdrod'){ return "'Droid Sans', sans-serif";}
	if($font == 'oswmer'){ return "'Merriweather', serif";}
	if($font == 'oswmul'){ return "'Muli', sans-serif";}
	if($font == 'oswold'){ return "'Old Standard TT', serif";}
	if($font == 'oswope'){ return "'Open Sans', sans-serif"; }
	if($font == 'oswqua'){ return "'Quattrocento', serif";}
	if($font == 'ovomul'){ return "'Muli', sans-serif";}
	if($font == 'oxysou'){ return "'Source Sans Pro', sans-serif";}
	if($font == 'pacari'){ return "'Arimo', sans-serif";}
	if($font == 'patlor'){ return "'Lora', serif";}
	if($font == 'patosw'){ return "'Oswald', sans-serif";}
	if($font == 'paydro'){ return "'Droid Sans', sans-serif";}
	if($font == 'phimul'){ return "'Muli', sans-serif";}
	if($font == 'plaali'){ return "'Alice', serif";}
	if($font == 'plafau'){ return "'Fauna One', serif";}
	if($font == 'plalat'){ return "'Lato', sans-serif";}
    if($font == 'planot'){ return "'Noto Serif', serif";}
	if($font == 'plaope'){ return "'Open Sans', sans-serif"; }
    if($font == 'plakru'){ return "'Sree Krushnadevaraya', serif";}     
	if($font == 'plavol'){ return "'Vollkorn', serif";}
    if($font == 'poiope'){ return "'Open Sans', sans-serif";}    
    if($font == 'poilat'){ return "'Lato', sans-serif";}    
	if($font == 'ptscab'){ return "'Cabin', sans-serif";}
	if($font == 'ptsdid'){ return "'Didact Gothic', sans-serif";}
	if($font == 'ptslat'){ return "'Lato', sans-serif";}
	if($font == 'ptsptr'){ return "'PT Serif', serif";}
    if($font == 'ptsrob'){ return "'Roboto', sans-serif";}
	if($font == 'ptrope'){ return "'Open Sans', sans-serif";}
	if($font == 'ptrpts'){ return "'PT Sans', sans-serif";}
	if($font == 'quajud'){ return "'Judson', serif";}
	if($font == 'qutfan'){ return "'Fanwood Text', serif";}
	if($font == 'qutqus'){ return "'Quattrocento Sans', sans-serif";}
	if($font == 'quiebg'){ return "'EB Garamond', serif";}
    if($font == 'raldros'){ return "'Droid Sans', sans-serif";}
    if($font == 'raldrof'){ return "'Droid Serif', serif";}
    if($font == 'rallat'){ return "'Lato', sans-serif";}
    if($font == 'rallob'){ return "'Lobster', cursive";}
    if($font == 'ralope'){ return "'Open Sans', sans-serif";}
    if($font == 'ralosw'){ return "'Oswald', sans-serif";}
	if($font == 'ralcab'){ return "'Cabin', sans-serif";}
	if($font == 'ralmer'){ return "'Merriweather', serif";}
    if($font == 'ralpop'){ return "'Poppins', sans-serif"; }
	if($font == 'ralrob'){ return "'Roboto', sans-serif";}
	if($font == 'rangud'){ return "'Gudea', sans-serif";}
    if($font == 'roboto'){ return "'Roboto', sans-serif";}
	if($font == 'robnun'){ return "'Nunito', sans-serif";}
	if($font == 'rosope'){ return "'Open Sans', sans-serif";}
	if($font == 'rosrob'){ return "'Roboto', sans-serif";}
    if($font == 'rokdros'){ return "'Droid Sans', sans-serif";}
    if($font == 'roklat'){ return "'Lato', sans-serif";}
    if($font == 'rokope'){ return "'Open Sans', sans-serif";}
    if($font == 'rokosw'){ return "'Oswald', sans-serif";}
	if($font == 'rokrob'){ return "'Roboto', sans-serif";}
    if($font == 'rokubu'){ return "'Ubuntu', sans-serif";}
    if($font == 'rubrob'){ return "'Roboto Condensed', sans-serif";}     
    if($font == 'rufsin'){ return "'Sintony', sans-serif";}
    if($font == 'sacali'){ return "'Alice', serif";}
    if($font == 'sankam'){ return "'Kameron', serif";}
    if($font == 'sharob'){ return "'Roboto', sans-serif";}
    if($font == 'sigope'){ return "'Open Sans', sans-serif";}
    if($font == 'squall'){ return "'Allerta', sans-serif";}
    if($font == 'stipon'){ return "'Pontano Sans', sans-serif";}
    if($font == 'ubucab'){ return "'Cabin', sans-serif";}
    if($font == 'ubudid'){ return "'Didact Gothic', sans-serif"; }
    if($font == 'ubuhin'){ return "'Hind', sans-serif"; }
    if($font == 'ubulat'){ return "'Lato', sans-serif";}
    if($font == 'ubulor'){ return "'Lora', serif";}
    if($font == 'uburob'){ return "'Roboto Slab', serif";}
    if($font == 'ubusou'){ return "'Source Sans Pro', sans-serif";}
    if($font == 'ultsla'){ return "'Slabo 13px', serif";}
    if($font == 'univol'){ return "'Vollkorn', serif";}
    if($font == 'vidrob'){ return "'Roboto', sans-serif";}    
    if($font == 'volral'){ return "'Raleway', sans-serif";}
	if($font == 'volexo'){ return "'Exo 2', sans-serif";}
	if($font == 'walkre'){ return "'Kreon', serif"; }
	if($font == 'walmol'){ return "'Molengo', sans-serif";}
	if($font == 'walosw'){ return "'Oswald', sans-serif";}
	if($font == 'walvol'){ return "'Vollkorn', serif";}
    if($font == 'yanlat'){ return "'Lato', sans-serif";}    
    if($font == 'yanope'){ return "'Open Sans', sans-serif";}    
    if($font == 'yanosw'){ return "'Oswald', sans-serif";}    
    if($font == 'yanrob'){ return "'Roboto', sans-serif";}   
	if($font == 'yescri'){ return "'Crimson Text', serif";}
	if($font == 'yesjos'){ return "'Josefin Sans', sans-serif"; }
	if($font == 'yeslor'){ return "'Lora', serif";}
	if($font == 'yesope'){ return "'Open Sans', sans-serif";}
	if($font == 'yesphi'){ return "'Philosopher', sans-serif";}

}

function bellini_font_script(){

if ( 'abeubu' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-abeubu-title', '//fonts.googleapis.com/css?family=Abel');
	wp_enqueue_style('bellini-font-abeubu-body', '//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic&subset=latin,greek,greek-ext,cyrillic-ext,latin-ext,cyrillic');
endif;

if ( 'abrcan' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-abrdro-title', '//fonts.googleapis.com/css?family=Abril+Fatface&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-abrdro-body', '//fonts.googleapis.com/css?family=Candal');
endif;

if ( 'abrope' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-abrdro-title', '//fonts.googleapis.com/css?family=Abril+Fatface&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-aleope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'abrdro' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-abrdro-title', '//fonts.googleapis.com/css?family=Abril+Fatface&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-abrdro-body', '//fonts.googleapis.com/css?family=Droid+Sans:400,700');
endif;

if ( 'abrjos' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-abrdro-title', '//fonts.googleapis.com/css?family=Abril+Fatface&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-josplay-title', '//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300italic,300,400italic,600,600italic,700,700italic&subset=latin,latin-ext');
endif;

if ( 'abrlat' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-abrdro-title', '//fonts.googleapis.com/css?family=Abril+Fatface&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,700,400italic,700italic,900,900italic&subset=latin,latin-ext');
endif;

if ( 'abrvol' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-abrdro-title', '//fonts.googleapis.com/css?family=Abril+Fatface&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Vollkorn:400,400italic,700,700italic');
endif;

if ( 'aleope' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-aleope-title', '//fonts.googleapis.com/css?family=Alegreya:400,400italic,700,700italic,900,900italic&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-aleope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'alesou' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-alesou-title', '//fonts.googleapis.com/css?family=Alegreya:400,400italic,700,700italic,900,900italic&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-alesou-body', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,900italic,900,200,200italic,300,300italic,400italic,600,600italic,700italic,700&subset=latin,vietnamese,latin-ext');
endif;

if ( 'alflor' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-alfgen-title', '//fonts.googleapis.com/css?family=Alfa+Slab+One');
	wp_enqueue_style('bellini-font-istlor-body', '//fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic&subset=latin,cyrillic,latin-ext');
endif;

if ( 'alfgen' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-alfgen-title', '//fonts.googleapis.com/css?family=Alfa+Slab+One');
	wp_enqueue_style('bellini-font-alfgen-body', '//fonts.googleapis.com/css?family=Gentium+Book+Basic:400,400italic,700,700italic&subset=latin,latin-ext');
endif;


if ( 'amatit' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-amatit-title', '//fonts.googleapis.com/css?family=Amaranth:400,400italic,700,700italic');
	wp_enqueue_style('bellini-font-amatit-body', '//fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900&subset=latin,latin-ext');
endif;

if ( 'amaand' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-amaand-title', '//fonts.googleapis.com/css?family=Amatic+SC:400,700&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-amaand-body', '//fonts.googleapis.com/css?family=Andika&subset=latin,vietnamese,cyrillic-ext,latin-ext,cyrillic');
endif;

if ( 'amajos' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-amaand-title', '//fonts.googleapis.com/css?family=Amatic+SC:400,700&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-josplay-title', '//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300italic,300,400italic,600,600italic,700,700italic&subset=latin,latin-ext');
endif;

if ( 'bevpon' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-amaand-title', '//fonts.googleapis.com/css?family=Bevan');
	wp_enqueue_style('bellini-font-josplay-title', '//fonts.googleapis.com/css?family=Pontano+Sans&subset=latin,latin-ext');
endif;

if ( 'bitsou' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-bitral-title', '//fonts.googleapis.com/css?family=Bitter:400,400italic,700&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-alesou-body', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,900italic,900,200,200italic,300,300italic,400italic,600,600italic,700italic,700&subset=latin,vietnamese,latin-ext');
endif;

if ( 'bitral' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-bitral-title', '//fonts.googleapis.com/css?family=Bitter:400,400italic,700&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-bitral-title', '//fonts.googleapis.com/css?family=Raleway:400,100,200,100italic,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin,latin-ext');
endif;

if ( 'breimp' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-bitral-title', '//fonts.googleapis.com/css?family=Bree+Serif&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-canimp-title', '//fonts.googleapis.com/css?family=Imprima&subset=latin,latin-ext');
endif;

if ( 'brelor' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-bitral-title', '//fonts.googleapis.com/css?family=Bree+Serif&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-istlor-body', '//fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic&subset=latin,cyrillic,latin-ext');
endif;

if ( 'breope' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-bitral-title', '//fonts.googleapis.com/css?family=Bree+Serif&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-aleope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'canimp' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-canimp-title', '//fonts.googleapis.com/css?family=Cantata+One&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-canimp-title', '//fonts.googleapis.com/css?family=Imprima&subset=latin,latin-ext');
endif;

if ( 'caralm' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-caralm-title', '//fonts.googleapis.com/css?family=Cardo:400,400italic,700&subset=latin,latin-ext,greek-ext,greek');
    wp_enqueue_style('bellini-font-caralm-body', '//fonts.googleapis.com/css?family=Almendra+Display&subset=latin,latin-ext');
endif;


if ( 'carjos' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-carjos-title', '//fonts.googleapis.com/css?family=Cardo:400,400italic,700&subset=latin,latin-ext,greek-ext,greek');
	wp_enqueue_style('bellini-font-carjos-title', '//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300italic,300,400italic,600,600italic,700,700italic&subset=latin,latin-ext');
endif;

if ( 'cliebg' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-carjos-title', '//fonts.googleapis.com/css?family=Clicker+Script&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-carjos-title', '//fonts.googleapis.com/css?family=EB+Garamond&subset=latin,vietnamese,cyrillic-ext,latin-ext,cyrillic');
endif;

if ( 'creabe' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-carjos-title', '//fonts.googleapis.com/css?family=Crete+Round:400,400italic&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-carjos-title', '//fonts.googleapis.com/css?family=ABeeZee:400,400italic');
endif;

if ( 'danebg' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-carjos-title', '//fonts.googleapis.com/css?family=Dancing+Script:400,700');
	wp_enqueue_style('bellini-font-carjos-title', '//fonts.googleapis.com/css?family=EB+Garamond&subset=latin,vietnamese,cyrillic-ext,latin-ext,cyrillic');
endif;

if ( 'danled' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-danled-title', '//fonts.googleapis.com/css?family=Dancing+Script:400,700');
	wp_enqueue_style('bellini-font-danled-title', '//fonts.googleapis.com/css?family=Ledger&subset=latin,latin-ext,cyrillic');
endif;

if ( 'didari' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-danled-title', '//fonts.googleapis.com/css?family=Didact+Gothic&subset=latin,greek-ext,greek,cyrillic-ext,latin-ext,cyrillic');
	wp_enqueue_style('bellini-font-danled-title', '//fonts.googleapis.com/css?family=Arimo:400,400italic,700,700italic&subset=latin,greek-ext,greek,latin-ext,cyrillic,hebrew,vietnamese,cyrillic-ext');
endif;

if ( 'dosope' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-dosope-title', '//fonts.googleapis.com/css?family=Dosis:200,300,500,400,600,700,800&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-dosope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'drocab' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-drocab-body', '//fonts.googleapis.com/css?family=Droid+Sans:400,700');
	wp_enqueue_style('bellini-font-drocab-title', '//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic');
endif;

if ( 'drfosw' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic');
	wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
endif;

if ( 'exolat' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Exo+2:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600italic,600,700,700italic,800,800italic,900,900italic&subset=latin,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,700,400italic,700italic,900,900italic&subset=latin,latin-ext');
endif;

if ( 'exolor' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-exolor-title', '//fonts.googleapis.com/css?family=Exo+2:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600italic,600,700,700italic,800,800italic,900,900italic&subset=latin,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-exolor-body', '//fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic&subset=latin,cyrillic,latin-ext');
endif;

if ( 'exoope' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-exoope-title', '//fonts.googleapis.com/css?family=Exo+2:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600italic,600,700,700italic,800,800italic,900,900italic&subset=latin,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-exoope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'exoosw' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-exoosw-title', '//fonts.googleapis.com/css?family=Exo+2:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600italic,600,700,700italic,800,800italic,900,900italic&subset=latin,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-exoosw-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
endif;

if ( 'exorob' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-exoosw-title', '//fonts.googleapis.com/css?family=Exo+2:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600italic,600,700,700italic,800,800italic,900,900italic&subset=latin,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-latmer-body', '//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,greek,cyrillic,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'exosou' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-exosou-title', '//fonts.googleapis.com/css?family=Exo+2:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600italic,600,700,700italic,800,800italic,900,900italic&subset=latin,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-exosou-body', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,900italic,900,200,200italic,300,300italic,400italic,600,600italic,700italic,700&subset=latin,vietnamese,latin-ext');
endif;

if ( 'fjaave' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-fjaave-title', '//fonts.googleapis.com/css?family=Fjalla+One&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-fjaave-body', '//fonts.googleapis.com/css?family=Average&subset=latin,latin-ext');
endif;

if ( 'fjacan' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-fjaave-title', '//fonts.googleapis.com/css?family=Fjalla+One&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-fjaave-body', '//fonts.googleapis.com/css?family=Cantarell:400,400italic,700italic,700');
endif;

if ( 'flaasa' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-fjaave-title', '//fonts.googleapis.com/css?family=Flamenco:400,300');
	wp_enqueue_style('bellini-font-fjaave-body', '//fonts.googleapis.com/css?family=Asap:400,700,400italic,700italic&subset=latin,latin-ext');
endif;

if ( 'fradid' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-fjaave-title', '//fonts.googleapis.com/css?family=Francois+One&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-danled-title', '//fonts.googleapis.com/css?family=Didact+Gothic&subset=latin,greek-ext,greek,cyrillic-ext,latin-ext,cyrillic');
endif;

if ( 'fralat' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-fralat-title', '//fonts.googleapis.com/css?family=Francois+One&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,700,400italic,700italic,900,900italic&subset=latin,latin-ext');
endif;

if ( 'fraope' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Francois+One&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'genope' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-aleope-title', '//fonts.googleapis.com/css?family=Gentium+Basic:400,400italic,700,700italic&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-aleope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;


if ( 'hinope' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Hind:400,300,500,700,600&subset=latin,latin-ext,devanagari');
	wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'indlat' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-indlat-title', '//fonts.googleapis.com/css?family=Indie+Flower');
    wp_enqueue_style('bellini-font-indlat-title', '//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,700,400italic,700italic,900,900italic&subset=latin,latin-ext');
endif;

if ( 'indosw' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-indlat-title', '//fonts.googleapis.com/css?family=Indie+Flower');
	wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
endif;

if ( 'indpop' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-indlat-title', '//fonts.googleapis.com/css?family=Indie+Flower');
	wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Poppins:400,300,500,600,700&subset=latin,latin-ext,devanagari');
endif;

if ( 'josjos' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-josjos-title', '//fonts.googleapis.com/css?family=Josefin+Slab:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic');
    wp_enqueue_style('bellini-font-josjos-title', '//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300italic,300,400italic,600,600italic,700,700italic&subset=latin,latin-ext');
endif;

if ( 'josplay' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-josplay-title', '//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300italic,300,400italic,600,600italic,700,700italic&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-josplay-body', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic&subset=latin,latin-ext,cyrillic');
endif;

if ( 'jobmav' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-josjos-title', '//fonts.googleapis.com/css?family=Josefin+Slab:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic');
	wp_enqueue_style('bellini-font-josplay-body', '//fonts.googleapis.com/css?family=Maven+Pro:400,900,700,500');
endif;

if ( 'jobosw' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-josjos-title', '//fonts.googleapis.com/css?family=Josefin+Slab:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic');
	wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
endif;

if ( 'cabold' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-cabold-title', '//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic');
	wp_enqueue_style('bellini-font-cabold-body', '//fonts.googleapis.com/css?family=Old+Standard+TT:400,400italic,700');
endif;

if ( 'kreubu' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-kreubu-title', '//fonts.googleapis.com/css?family=Kreon:400,300,700');
	wp_enqueue_style('bellini-font-kreubu-body', '//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,500,400italic,500italic,700,700italic&subset=latin,greek,greek-ext,cyrillic-ext,latin-ext,cyrillic');
endif;

if ( 'latmer' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,700,400italic,700italic,900,900italic&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-latmer-body', '//fonts.googleapis.com/css?family=Merriweather:400,300italic,300,400italic,700italic,700,900,900italic&subset=latin,cyrillic-ext,latin-ext,cyrillic');
endif;

if ( 'libmon' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic,700&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-latmer-body', '//fonts.googleapis.com/css?family=Montserrat:400,700');
endif;

if ( 'libope' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic,700&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'libubu' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic,700&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-kreubu-body', '//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,500,400italic,500italic,700,700italic&subset=latin,greek,greek-ext,cyrillic-ext,latin-ext,cyrillic');
endif;

if ( 'istlor' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-istlor-title', '//fonts.googleapis.com/css?family=Istok+Web:400,400italic,700,700italic&subset=latin,latin-ext,cyrillic-ext,cyrillic');
	wp_enqueue_style('bellini-font-istlor-body', '//fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic&subset=latin,cyrillic,latin-ext');
endif;

if ( 'lobari' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Lobster&subset=latin,vietnamese,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Arimo:400,400italic,700,700italic&subset=latin,greek,latin-ext,cyrillic,greek-ext,hebrew,vietnamese,cyrillic-ext');
endif;

if ( 'lobcab' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-lobcab-title', '//fonts.googleapis.com/css?family=Lobster&subset=latin,vietnamese,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-lobcab-title', '//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic');
endif;

if ( 'lobmul' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-lobcab-title', '//fonts.googleapis.com/css?family=Lobster&subset=latin,vietnamese,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-monpla-title', '//fonts.googleapis.com/css?family=Muli:400,300,300italic,400italic');
endif;

if ( 'lobvol' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-lobcab-title', '//fonts.googleapis.com/css?family=Lobster&subset=latin,vietnamese,latin-ext,cyrillic');
	wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Vollkorn:400,400italic,700,700italic');
endif;

if ( 'lorope' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-lorope-body', '//fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic&subset=latin,cyrillic,latin-ext');
    wp_enqueue_style('bellini-font-lorope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'lorsou' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-lorsou-body', '//fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic&subset=latin,cyrillic,latin-ext');
	wp_enqueue_style('bellini-font-lorsou-body', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,900italic,900,200,200italic,300,300italic,400italic,600,600italic,700italic,700&subset=latin,vietnamese,latin-ext');
endif;

if ( 'luslat' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-luslat-body', '//fonts.googleapis.com/css?family=Lustria');
    wp_enqueue_style('bellini-font-luslat-title', '//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,700,400italic,700italic,900,900italic&subset=latin,latin-ext');
endif;

if ( 'medlat' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-medlat-body', '//fonts.googleapis.com/css?family=Medula+One');
    wp_enqueue_style('bellini-font-medlat-title', '//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,700,400italic,700italic,900,900italic&subset=latin,latin-ext');
endif;

if ( 'merope' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic&subset=latin,latin-ext,cyrillic-ext,cyrillic');
	wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'merosw' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic&subset=latin,latin-ext,cyrillic-ext,cyrillic');
	wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
endif;

if ( 'mersou' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic&subset=latin,latin-ext,cyrillic-ext,cyrillic');
	wp_enqueue_style('bellini-font-lorsou-body', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,900italic,900,200,200italic,300,300italic,400italic,600,600italic,700italic,700&subset=latin,vietnamese,latin-ext');
endif;

if ( 'moncar' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-moncar-title', '//fonts.googleapis.com/css?family=Montserrat:400,700');
    wp_enqueue_style('bellini-font-moncar-title', '//fonts.googleapis.com/css?family=Cardo:400,400italic,700&subset=latin,latin-ext,greek-ext,greek');
endif;

if ( 'moncri' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-moncri-title', '//fonts.googleapis.com/css?family=Montserrat:400,700');
    wp_enqueue_style('bellini-font-moncri-title', '//fonts.googleapis.com/css?family=Crimson+Text:400,400italic,600,600italic,700,700italic');
endif;

if ( 'mondom' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-moncri-title', '//fonts.googleapis.com/css?family=Montserrat:400,700');
    wp_enqueue_style('bellini-font-moncri-title', '//fonts.googleapis.com/css?family=Domine:400,700&subset=latin,latin-ext');
endif;

if ( 'monhin' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-monhin-title', '//fonts.googleapis.com/css?family=Montserrat:400,700');
    wp_enqueue_style('bellini-font-monhin-title', '//fonts.googleapis.com/css?family=Hind:400,300,500,700,600&subset=latin,latin-ext,devanagari');
endif;

if ( 'monist' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-monhin-title', '//fonts.googleapis.com/css?family=Montserrat:400,700');
    wp_enqueue_style('bellini-font-istlor-title', '//fonts.googleapis.com/css?family=Istok+Web:400,400italic,700,700italic&subset=latin,latin-ext,cyrillic-ext,cyrillic');
endif;

if ( 'monneu' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-monneu-title', '//fonts.googleapis.com/css?family=Montserrat:400,700');
    wp_enqueue_style('bellini-font-monneu-title', '//fonts.googleapis.com/css?family=Neuton:400,300,200,400italic,700,800&subset=latin,latin-ext');
endif;

if ( 'monpla' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-monpla-title', '//fonts.googleapis.com/css?family=Montserrat:400,700');
	wp_enqueue_style('bellini-font-monpla-body', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic&subset=latin,latin-ext,cyrillic');
endif;

if ( 'monpon' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-monpla-title', '//fonts.googleapis.com/css?family=Montserrat:400,700');
	wp_enqueue_style('bellini-font-josplay-title', '//fonts.googleapis.com/css?family=Pontano+Sans&subset=latin,latin-ext');
endif;

if ( 'monrob' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-monpla-title', '//fonts.googleapis.com/css?family=Montserrat:400,700');
	wp_enqueue_style('bellini-font-latmer-body', '//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,greek,cyrillic,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'mulpla' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-monpla-title', '//fonts.googleapis.com/css?family=Muli:400,300,300italic,400italic');
	wp_enqueue_style('bellini-font-monpla-body', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic&subset=latin,latin-ext,cyrillic');
endif;

if ( 'nixled' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-nixled-title', '//fonts.googleapis.com/css?family=Nixie+One');
	wp_enqueue_style('bellini-font-nixled-title', '//fonts.googleapis.com/css?family=Ledger&subset=latin,latin-ext,cyrillic');
endif;

if ( 'nixlib' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-nixlib-title', '//fonts.googleapis.com/css?family=Nixie+One');
    wp_enqueue_style('bellini-font-nixlib-title', '//fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic,700&subset=latin,latin-ext');
endif;

if ( 'nunale' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Nunito:400,300,700');
    wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Alegreya:400,400italic,700,700italic,900,900italic&subset=latin,latin-ext');
endif;

if ( 'nunlor' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Nunito:400,300,700');
	wp_enqueue_style('bellini-font-istlor-body', '//fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic&subset=latin,cyrillic,latin-ext');
endif;

if ( 'nunope' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Nunito:400,300,700');
	wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'oldque' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-cabold-body', '//fonts.googleapis.com/css?family=Old+Standard+TT:400,400italic,700');
	wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Questrial');
endif;

if ( 'opegen' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-aleope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
	wp_enqueue_style('bellini-font-aleope-title', '//fonts.googleapis.com/css?family=Gentium+Book+Basic:400,400italic,700,700italic&subset=latin,latin-ext');
endif;

if ( 'opelib' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
    wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic,700&subset=latin,latin-ext');
endif;

if ( 'opelor' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
	wp_enqueue_style('bellini-font-istlor-body', '//fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic&subset=latin,cyrillic,latin-ext');
endif;

if ( 'openun' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
	wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Nunito:400,300,700');
endif;

if ( 'opeosw' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
	wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
endif;

if ( 'opepla' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
	wp_enqueue_style('bellini-font-monpla-body', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic&subset=latin,latin-ext,cyrillic');
endif;

if ( 'opcosw' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700&subset=latin,greek,cyrillic,greek-ext,vietnamese,cyrillic-ext,latin-ext');
	wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
endif;

if ( 'opcope' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700&subset=latin,greek,cyrillic,greek-ext,vietnamese,cyrillic-ext,latin-ext');
	wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'opcrob' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700&subset=latin,greek,cyrillic,greek-ext,vietnamese,cyrillic-ext,latin-ext');
	wp_enqueue_style('bellini-font-latmer-body', '//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,greek,cyrillic,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'oswdro' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic');
endif;

if ( 'oswdom' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-oswdom-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-oswdom-body', '//fonts.googleapis.com/css?family=Domine:400,700&subset=latin,latin-ext');
endif;

if ( 'oswdrod' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-oswdrod-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-oswdrod-title', '//fonts.googleapis.com/css?family=Droid+Sans:400,700');
endif;

if ( 'oswmer' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-oswdrod-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic&subset=latin,latin-ext,cyrillic-ext,cyrillic');
endif;

if ( 'oswmul' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-oswdrod-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-monpla-title', '//fonts.googleapis.com/css?family=Muli:400,300,300italic,400italic');
endif;

if ( 'oswold' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-oswold-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-oswold-body', '//fonts.googleapis.com/css?family=Old+Standard+TT:400,400italic,700');
endif;

if ( 'oswope' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-oswope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
	wp_enqueue_style('bellini-font-oswope-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
endif;

if ( 'oswqua' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-oswope-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-oswope-title', '//fonts.googleapis.com/css?family=Quattrocento:400,700&subset=latin,latin-ext');
endif;

if ( 'ovomul' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-ovomul-title', '//fonts.googleapis.com/css?family=Ovo');
    wp_enqueue_style('bellini-font-ovomul-title', '//fonts.googleapis.com/css?family=Muli:400,300,300italic,400italic');
endif;

if ( 'oxysou' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-oxysou-title', '//fonts.googleapis.com/css?family=Oxygen:400,700,300&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-oxysou-body', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,900italic,900,200,200italic,300,300italic,400italic,600,600italic,700italic,700&subset=latin,vietnamese,latin-ext');
endif;

if ( 'pacari' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-danled-title', '//fonts.googleapis.com/css?family=Pacifico');
	wp_enqueue_style('bellini-font-danled-title', '//fonts.googleapis.com/css?family=Arimo:400,400italic,700,700italic&subset=latin,greek-ext,greek,latin-ext,cyrillic,hebrew,vietnamese,cyrillic-ext');
endif;

if ( 'patlor' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-bitral-title', '//fonts.googleapis.com/css?family=Patua+One');
	wp_enqueue_style('bellini-font-istlor-body', '//fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic&subset=latin,cyrillic,latin-ext');
endif;

if ( 'patosw' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-patosw-title', '//fonts.googleapis.com/css?family=Patua+One');
	wp_enqueue_style('bellini-font-patosw-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
endif;

if ( 'paydro' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-drocab-title', '//fonts.googleapis.com/css?family=Paytone+One');
	wp_enqueue_style('bellini-font-drocab-body', '//fonts.googleapis.com/css?family=Droid+Sans:400,700');
endif;

if ( 'phimul' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-monpla-title', '//fonts.googleapis.com/css?family=Philosopher:400,400italic,700,700italic&subset=latin,cyrillic');
    wp_enqueue_style('bellini-font-monpla-title', '//fonts.googleapis.com/css?family=Muli:400,300,300italic,400italic');
endif;

if ( 'plaali' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-josplay-body', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic&subset=latin,latin-ext,cyrillic');
	wp_enqueue_style('bellini-font-josplay-body', '//fonts.googleapis.com/css?family=Alice');
endif;

if ( 'plafau' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-josplay-body', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic&subset=latin,latin-ext,cyrillic');
	wp_enqueue_style('bellini-font-josplay-body', '//fonts.googleapis.com/css?family=Fauna+One&subset=latin,latin-ext');
endif;

if ( 'plalat' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-plalat-body', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic&subset=latin,latin-ext,cyrillic');
	wp_enqueue_style('bellini-font-plalat-title', '//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,700,400italic,700italic,900,900italic&subset=latin,latin-ext');
endif;

if ( 'planot' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-planot-body', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic&subset=latin,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-planot-title', '//fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700,700italic&subset=latin,greek-ext,greek,vietnamese,cyrillic-ext,latin-ext,cyrillic');
endif;


if ( 'plaope' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-josplay-body', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic&subset=latin,latin-ext,cyrillic');
	wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'plakru' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-josplay-body', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic&subset=latin,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Sree+Krushnadevaraya&subset=latin,telugu');
endif;

if ( 'plavol' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-josplay-body', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic&subset=latin,latin-ext,cyrillic');
	wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Vollkorn:400,400italic,700,700italic');
endif;

if ( 'poiope' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-poilat-title', '//fonts.googleapis.com/css?family=Poiret+One&subset=latin,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'poilat' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-poilat-title', '//fonts.googleapis.com/css?family=Poiret+One&subset=latin,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-poilat-title', '//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,700,400italic,700italic,900,900italic&subset=latin,latin-ext');
endif;

if ( 'ptscab' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-drocab-body', '//fonts.googleapis.com/css?family=PT+Sans:400,400italic,700italic,700&subset=latin,cyrillic-ext,latin-ext,cyrillic');
	wp_enqueue_style('bellini-font-drocab-title', '//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic');
endif;

if ( 'ptsdid' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-drocab-body', '//fonts.googleapis.com/css?family=PT+Sans:400,400italic,700italic,700&subset=latin,cyrillic-ext,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-danled-title', '//fonts.googleapis.com/css?family=Didact+Gothic&subset=latin,greek-ext,greek,cyrillic-ext,latin-ext,cyrillic');
endif;

if ( 'ptslat' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-ptslat-body', '//fonts.googleapis.com/css?family=PT+Sans:400,400italic,700italic,700&subset=latin,cyrillic-ext,latin-ext,cyrillic');
	wp_enqueue_style('bellini-font-ptslat-title', '//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,700,400italic,700italic,900,900italic&subset=latin,latin-ext');
endif;

if ( 'ptsptr' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-drocab-body', '//fonts.googleapis.com/css?family=PT+Sans:400,400italic,700italic,700&subset=latin,cyrillic-ext,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-danled-title', '//fonts.googleapis.com/css?family=PT+Serif:400,400italic,700,700italic&subset=latin,cyrillic-ext,latin-ext,cyrillic');
endif;

if ( 'ptsrob' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-ptslat-body', '//fonts.googleapis.com/css?family=PT+Sans:400,400italic,700italic,700&subset=latin,cyrillic-ext,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-latmer-body', '//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,greek,cyrillic,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'ptrope' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-danled-title', '//fonts.googleapis.com/css?family=PT+Serif:400,400italic,700,700italic&subset=latin,cyrillic-ext,latin-ext,cyrillic');
	wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'ptrpts' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-danled-title', '//fonts.googleapis.com/css?family=PT+Serif:400,400italic,700,700italic&subset=latin,cyrillic-ext,latin-ext,cyrillic');
	wp_enqueue_style('bellini-font-drocab-body', '//fonts.googleapis.com/css?family=PT+Sans:400,400italic,700italic,700&subset=latin,cyrillic-ext,latin-ext,cyrillic');
endif;

if ( 'quajud' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-danled-title', '//fonts.googleapis.com/css?family=Quando&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-drocab-body', '//fonts.googleapis.com/css?family=Judson:400,400italic,700&subset=latin,vietnamese,latin-ext');
endif;

if ( 'qutfan' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-oswope-title', '//fonts.googleapis.com/css?family=Quattrocento:400,700&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-oswope-title', '//fonts.googleapis.com/css?family=Fanwood+Text:400,400italic');
endif;

if ( 'qutqus' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-oswope-title', '//fonts.googleapis.com/css?family=Quattrocento:400,700&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-oswope-title', '//fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700,700italic&subset=latin,latin-ext');
endif;

if ( 'quiebg' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-carjos-title', '//fonts.googleapis.com/css?family=Quicksand:400,300,700');
	wp_enqueue_style('bellini-font-carjos-title', '//fonts.googleapis.com/css?family=EB+Garamond&subset=latin,vietnamese,cyrillic-ext,latin-ext,cyrillic');
endif;

if ( 'raldros' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-raldrof-title', '//fonts.googleapis.com/css?family=Raleway:400,100,200,100italic,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-abrdro-body', '//fonts.googleapis.com/css?family=Droid+Sans:400,700');
endif;

if ( 'raldrof' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-raldrof-title', '//fonts.googleapis.com/css?family=Raleway:400,100,200,100italic,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-raldrof-body', '//fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic');
endif;

if ( 'rallat' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-rallat-title', '//fonts.googleapis.com/css?family=Raleway:400,100,200,100italic,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-rallat-title', '//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,700,400italic,700italic,900,900italic&subset=latin,latin-ext');
endif;

if ( 'rallob' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-rallob-title', '//fonts.googleapis.com/css?family=Raleway:400,100,200,100italic,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-rallob-body', '//fonts.googleapis.com/css?family=Lobster&subset=latin,vietnamese,latin-ext,cyrillic');
endif;

if ( 'ralope' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-bitral-title', '//fonts.googleapis.com/css?family=Raleway:400,100,200,100italic,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-aleope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'ralosw' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-bitral-title', '//fonts.googleapis.com/css?family=Raleway:400,100,200,100italic,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
endif;

if ( 'ralpop' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-bitral-title', '//fonts.googleapis.com/css?family=Raleway:400,100,200,100italic,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Poppins:400,300,500,600,700&subset=latin,latin-ext,devanagari');
endif;

if ( 'ralcab' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-bitral-title', '//fonts.googleapis.com/css?family=Raleway:400,100,200,100italic,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-drocab-title', '//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic');
endif;

if ( 'ralmer' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-bitral-title', '//fonts.googleapis.com/css?family=Raleway:400,100,200,100italic,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-latmer-body', '//fonts.googleapis.com/css?family=Merriweather:400,300italic,300,400italic,700italic,700,900,900italic&subset=latin,cyrillic-ext,latin-ext,cyrillic');
endif;

if ( 'ralrob' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-bitral-title', '//fonts.googleapis.com/css?family=Raleway:400,100,200,100italic,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin,latin-ext');
	wp_enqueue_style('bellini-font-latmer-body', '//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,greek,cyrillic,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'rangud' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-bitral-title', '//fonts.googleapis.com/css?family=Rancho');
	wp_enqueue_style('bellini-font-latmer-body', '//fonts.googleapis.com/css?family=Gudea:400,400italic,700&subset=latin,latin-ext');
endif;

if ( 'roboto' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-latmer-body', '//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,greek,cyrillic,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'robnun' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-latmer-body', '//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,greek,cyrillic,greek-ext,vietnamese,cyrillic-ext,latin-ext');
	wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Nunito:400,300,700');
endif;

if ( 'rosope' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700&subset=latin,greek-ext,greek,vietnamese,cyrillic-ext,latin-ext,cyrillic');
	wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'rosrob' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-rosrob-title', '//fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700&subset=latin,greek-ext,greek,vietnamese,cyrillic-ext,latin-ext,cyrillic');
	wp_enqueue_style('bellini-font-rosrob-body', '//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,greek,cyrillic,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'rokdros' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-rokrob-title', '//fonts.googleapis.com/css?family=Rokkitt:400,700');
    wp_enqueue_style('bellini-font-abrdro-body', '//fonts.googleapis.com/css?family=Droid+Sans:400,700');
endif;

if ( 'roklat' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-rokrob-title', '//fonts.googleapis.com/css?family=Rokkitt:400,700');
    wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,700,400italic,700italic,900,900italic&subset=latin,latin-ext');
endif;

if ( 'rokope' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-rokrob-title', '//fonts.googleapis.com/css?family=Rokkitt:400,700');
    wp_enqueue_style('bellini-font-sigope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'rokosw' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-rokrob-title', '//fonts.googleapis.com/css?family=Rokkitt:400,700');
    wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
endif;

if ( 'rokrob' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-rokrob-title', '//fonts.googleapis.com/css?family=Rokkitt:400,700');
	wp_enqueue_style('bellini-font-rokrob-body', '//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,greek,cyrillic,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'rokubu' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-rokrob-title', '//fonts.googleapis.com/css?family=Rokkitt:400,700');
    wp_enqueue_style('bellini-font-ubulat-body', '//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic&subset=latin,greek,greek-ext,cyrillic-ext,latin-ext,cyrillic');
endif;

if ( 'rubrob' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-rufsin-title', '//fonts.googleapis.com/css?family=Rubik+Mono+One&subset=latin,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-rufsin-body', '//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic&subset=latin,greek-ext,cyrillic,greek,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'rufsin' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-rufsin-title', '//fonts.googleapis.com/css?family=Rufina:400,700&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-rufsin-body', '//fonts.googleapis.com/css?family=Sintony:400,700&subset=latin,latin-ext');
endif;

if ( 'sacali' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-josplay-body', '//fonts.googleapis.com/css?family=Sacramento&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-josplay-body', '//fonts.googleapis.com/css?family=Alice');
endif;

if ( 'sankam' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-sankam-title', '//fonts.googleapis.com/css?family=Sansita+One');
    wp_enqueue_style('bellini-font-sankam-body', '//fonts.googleapis.com/css?family=Kameron:400,700');
endif;


if ( 'sharob' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-sharob-title', '//fonts.googleapis.com/css?family=Shadows+Into+Light');
    wp_enqueue_style('bellini-font-sharob-body', '//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,greek,cyrillic,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'sigope' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-sigope-title', '//fonts.googleapis.com/css?family=Signika:400,300,600,700&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-sigope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'squall' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-squall-title', '//fonts.googleapis.com/css?family=Squada+One');
    wp_enqueue_style('bellini-font-squall-title', '//fonts.googleapis.com/css?family=Allerta');
endif;

if ( 'stipon' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-amaand-title', '//fonts.googleapis.com/css?family=Stint+Ultra+Expanded&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-josplay-title', '//fonts.googleapis.com/css?family=Pontano+Sans&subset=latin,latin-ext');
endif;

if ( 'ubucab' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-ubudid-body', '//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic&subset=latin,greek,greek-ext,cyrillic-ext,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-drocab-title', '//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic');
endif;

if ( 'ubudid' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-ubudid-body', '//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic&subset=latin,greek,greek-ext,cyrillic-ext,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-ubudid-title', '//fonts.googleapis.com/css?family=Didact+Gothic&subset=latin,greek-ext,greek,cyrillic-ext,latin-ext,cyrillic');
endif;

if ( 'ubuhin' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-ubulat-body', '//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic&subset=latin,greek,greek-ext,cyrillic-ext,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Hind:400,300,500,700,600&subset=latin,latin-ext,devanagari');
endif;

if ( 'ubulat' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-ubulat-body', '//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic&subset=latin,greek,greek-ext,cyrillic-ext,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-ubulat-title', '//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,700,400italic,700italic,900,900italic&subset=latin,latin-ext');
endif;

if ( 'ubulor' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-abeubu-body', '//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic&subset=latin,greek,greek-ext,cyrillic-ext,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-istlor-body', '//fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic&subset=latin,cyrillic,latin-ext');
endif;

if ( 'uburob' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-abeubu-body', '//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic&subset=latin,greek,greek-ext,cyrillic-ext,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-latmer-body', '//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,greek,cyrillic,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'ubusou' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-abeubu-body', '//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic&subset=latin,greek,greek-ext,cyrillic-ext,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-alesou-body', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,900italic,900,200,200italic,300,300italic,400italic,600,600italic,700italic,700&subset=latin,vietnamese,latin-ext');
endif;

if ( 'ultsla' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-ultsla-title', '//fonts.googleapis.com/css?family=Ultra');
    wp_enqueue_style('bellini-font-ultsla-title', '//fonts.googleapis.com/css?family=Slabo+13px&subset=latin,latin-ext');
endif;

if ( 'univol' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Unica+One&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Vollkorn:400,400italic,700,700italic');
endif;

if ( 'vidrob' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-exoosw-title', '//fonts.googleapis.com/css?family=Vidaloka');
    wp_enqueue_style('bellini-font-latmer-body', '//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,greek,cyrillic,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'volral' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Vollkorn:400,400italic,700,700italic');
    wp_enqueue_style('bellini-font-bitral-title', '//fonts.googleapis.com/css?family=Raleway:400,100,200,100italic,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin,latin-ext');
endif;

if ( 'volexo' == esc_attr(get_option('preset_font', 'planot')) ):
	wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Vollkorn:400,400italic,700,700italic');
	wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Exo+2:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600italic,600,700,700italic,800,800italic,900,900italic&subset=latin,latin-ext,cyrillic');
endif;

if ( 'walkre' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-abrdro-title', '//fonts.googleapis.com/css?family=Walter+Turncoat');
    wp_enqueue_style('bellini-font-kreubu-title', '//fonts.googleapis.com/css?family=Kreon:400,300,700');
endif;

if ( 'walmol' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-abrdro-title', '//fonts.googleapis.com/css?family=Walter+Turncoat');
	wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Molengo&subset=latin,latin-ext');
endif;

if ( 'walosw' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-abrdro-title', '//fonts.googleapis.com/css?family=Walter+Turncoat');
	wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
endif;

if ( 'walvol' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-abrdro-title', '//fonts.googleapis.com/css?family=Walter+Turncoat');
	wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Vollkorn:400,400italic,700,700italic');
endif;

if ( 'yanlat' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-yanlat-title', '//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,300,700&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-yanlat-title', '//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,700,400italic,700italic,900,900italic&subset=latin,latin-ext');
endif;

if ( 'yanope' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-yanosw-title', '//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,300,700&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'yanosw' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-yanosw-title', '//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,300,700&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-yanosw-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
endif;


if ( 'yanrob' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-exoosw-title', '//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,300,700&subset=latin,latin-ext');
    wp_enqueue_style('bellini-font-latmer-body', '//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,greek,cyrillic,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'yescri' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-yescri-title', '//fonts.googleapis.com/css?family=Yeseva+One&subset=latin,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-yescri-title', '//fonts.googleapis.com/css?family=Crimson+Text:400,400italic,600,600italic,700,700italic');
endif;

if ( 'yesjos' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-josplay-title', '//fonts.googleapis.com/css?family=Yeseva+One&subset=latin,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-josplay-title', '//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300italic,300,400italic,600,600italic,700,700italic&subset=latin,latin-ext');
endif;

if ( 'yeslor' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-josplay-title', '//fonts.googleapis.com/css?family=Yeseva+One&subset=latin,latin-ext,cyrillic');
	wp_enqueue_style('bellini-font-istlor-body', '//fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic&subset=latin,cyrillic,latin-ext');
endif;

if ( 'yesope' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-josplay-title', '//fonts.googleapis.com/css?family=Yeseva+One&subset=latin,latin-ext,cyrillic');
	wp_enqueue_style('bellini-font-fraope-title', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'yesphi' == esc_attr(get_option('preset_font', 'planot')) ):
    wp_enqueue_style('bellini-font-josplay-title', '//fonts.googleapis.com/css?family=Yeseva+One&subset=latin,latin-ext,cyrillic');
    wp_enqueue_style('bellini-font-monpla-title', '//fonts.googleapis.com/css?family=Philosopher:400,400italic,700,700italic&subset=latin,cyrillic');
endif;

}

add_action('wp_enqueue_scripts', 'bellini_font_script');


function bellii_logo_fonts(){
    
    $logo_font_array = array(
        'logo-ope'          => 'Open Sans',
        'logo-rob'          => 'Roboto',
        'logo-lat'          => 'Lato',
        'logo-osw'          => 'Oswald',
        'logo-sla'          => 'Slabo 27px',
        'logo-roc'          => 'Roboto Condensed',
        'logo-drs'          => 'Droid Sans',
        'logo-ssp'          => 'Source Sans Pro',
        'logo-pts'          => 'PT Sans',
        'logo-lor'          => 'Lora',
        'logo-mon'          => 'Montserrat',
        'logo-ral'          => 'Raleway',                                                                                
    );
    
    
    return $logo_font_array;
}


function bellini_font_logo($logo_font){

    if($logo_font == 'logo-ope'){ return "'Open Sans', sans-serif";}
    if($logo_font == 'logo-rob'){ return "'Roboto', sans-serif";}
    if($logo_font == 'logo-lat'){ return "'Lato', sans-serif";}
    if($logo_font == 'logo-osw'){ return "'Oswald', sans-serif";}
    if($logo_font == 'logo-sla'){ return "'Slabo 27px', serif";}
    if($logo_font == 'logo-roc'){ return "'Roboto Condensed', sans-serif";}
    if($logo_font == 'logo-drs'){ return "'Droid Sans', sans-serif";}
    if($logo_font == 'logo-ssp'){ return "'Source Sans Pro', sans-serif";}
    if($logo_font == 'logo-pts'){ return "'PT Sans', sans-serif";}
    if($logo_font == 'logo-lor'){ return "'Lora', serif";}
    if($logo_font == 'logo-mon'){ return "'Montserrat', sans-serif";}
    if($logo_font == 'logo-ral'){ return "'Raleway', sans-serif";}                  
}

function bellini_logo_font_script(){

if ( 'logo-ope' == esc_attr(get_option('bellini_logo_typography_font', 'logo-ope') )):
    wp_enqueue_style('bellini_logo_font', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'logo-rob' == esc_attr(get_option('bellini_logo_typography_font', 'logo-ope') )):
    wp_enqueue_style('bellini-font-latmer-body', '//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,greek,cyrillic,greek-ext,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'logo-lat' == esc_attr(get_option('bellini_logo_typography_font', 'logo-ope') )):
    wp_enqueue_style('bellini-font-latmer-title', '//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,700,400italic,700italic,900,900italic&subset=latin,latin-ext');
endif;

if ( 'logo-osw' == esc_attr(get_option('bellini_logo_typography_font', 'logo-ope') )):
    wp_enqueue_style('bellini-font-nunale-title', '//fonts.googleapis.com/css?family=Oswald:400,700,300&subset=latin,latin-ext');
endif;

if ( 'logo-sla' == esc_attr(get_option('bellini_logo_typography_font', 'logo-ope') )):
    wp_enqueue_style('bellini_logo_font', '//fonts.googleapis.com/css?family=Slabo+27px&subset=latin,latin-ext');
endif;

if ( 'logo-roc' == esc_attr(get_option('bellini_logo_typography_font', 'logo-ope') )):
    wp_enqueue_style('bellini-font-rufsin-body', '//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic&subset=latin,greek-ext,cyrillic,greek,vietnamese,cyrillic-ext,latin-ext');
endif;

if ( 'logo-drs' == esc_attr(get_option('bellini_logo_typography_font', 'logo-ope') )):
    wp_enqueue_style('bellini-font-abrdro-body', '//fonts.googleapis.com/css?family=Droid+Sans:400,700');
endif;

if ( 'logo-ssp' == esc_attr(get_option('bellini_logo_typography_font', 'logo-ope') )):
    wp_enqueue_style('bellini-font-alesou-body', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,900italic,900,200,200italic,300,300italic,400italic,600,600italic,700italic,700&subset=latin,vietnamese,latin-ext');
endif;

if ( 'logo-pts' == esc_attr(get_option('bellini_logo_typography_font', 'logo-ope') )):
    wp_enqueue_style('bellini-font-drocab-body', '//fonts.googleapis.com/css?family=PT+Sans:400,400italic,700italic,700&subset=latin,cyrillic-ext,latin-ext,cyrillic');
endif;

if ( 'logo-lor' == esc_attr(get_option('bellini_logo_typography_font', 'logo-ope') )):
    wp_enqueue_style('bellini-font-istlor-body', '//fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic&subset=latin,cyrillic,latin-ext');
endif;

if ( 'logo-mon' == esc_attr(get_option('bellini_logo_typography_font', 'logo-ope') )):
    wp_enqueue_style('bellini-font-latmer-body', '//fonts.googleapis.com/css?family=Montserrat:400,700');
endif;

if ( 'logo-ral' == esc_attr(get_option('bellini_logo_typography_font', 'logo-ope') )):
    wp_enqueue_style('bellini-font-bitral-title', '//fonts.googleapis.com/css?family=Raleway:400,100,200,100italic,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin,latin-ext');
endif;
}

add_action('wp_enqueue_scripts', 'bellini_logo_font_script');