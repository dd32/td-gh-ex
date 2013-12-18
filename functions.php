<?php
/**
 * Anarcho Notepad functions and definitions.
 *
 * @package	Anarcho Notepad
 * @since	2.1.7
 * @author	Arthur (Berserkr) Gareginyan <arthurgareginyan@gmail.com>
 * @copyright 	Copyright (c) 2013, Arthur Gareginyan
 * @link      	http://mycyberuniverse.tk/anarcho-notepad.html
 * @license   	http://www.gnu.org/licenses/gpl-3.0.html
 */

// Ladies, Gentalmen, boys and girls let's start our engine
add_action('after_setup_theme', 'anarcho_notepad_setup');

function anarcho_notepad_setup() {
        global $content_width;

	// Localization Init
	load_theme_textdomain( 'anarcho-notepad', get_template_directory() . '/languages' );

        // This feature enables Custom Backgrounds.
	add_theme_support( 'custom-background', array(
		'default-image' => get_template_directory_uri() . '/images/background.jpg', ) );

	// This feature enables Custom Header.
	add_theme_support( 'custom-header', array(
	  'flex-width'    	   => true,
	  'width'         	   => 500,
	  'flex-height'    	   => true,
	  'height'        	   => 150,
	  //'default-text-color'     => '#e5e5e5',
	  'header-text'            => true,
	  //'default-image' 	   => get_template_directory_uri() . '/images/logotype.jpg',
	  'uploads'       	   => true,
	) );

        // This feature enables Featured Images (also known as post thumbnails).
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(540,230,!1);

        // This feature enables post and comment RSS feed links to <head>.
        add_theme_support('automatic-feed-links');

	// Add HTML5 elements
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );

	// This feature enables sidebar.
	register_sidebar(array(
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
	));

        // This feature enables menu.
	register_nav_menus( array(
			'primary' => __( 'Primary', 'anarcho-notepad' ) ));

	// This feature enables Link Manager in Admin page.
	add_filter( 'pre_option_link_manager_enabled', '__return_true' );

        // Add Callback for Custom TinyMCE editor stylesheets. (editor-style.css)
        add_editor_style();
    }

// Redirect to the theme options page after theme is activated
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" )
	wp_redirect(admin_url( 'customize.php?' ));


/******************Theme Customizer*******************************/

add_action('customize_register', function($wp_customize){

//class Anarcho_Customize_Textarea_Control
class Anarcho_Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';
		public function render_content() { ?>
        		<label>
        		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        		<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
        		</label> <?php } }

   $wp_customize->remove_section( 'colors' );

   // META SECTION
   $wp_customize->add_section( 'meta_section', array(
	'title'				=> __( 'Meta', 'anarcho-notepad' ),
	'priority'			=> 1, ));

		// About Box in column
		$wp_customize->add_setting( 'about_box', array(
			'default'			=> __( 'Paste here small text about You and/or about site', 'anarcho-notepad' ),
		));
		$wp_customize->add_control( new Anarcho_Customize_Textarea_Control( $wp_customize, 'about_box', array(
			'priority'			=> 1,
		        'label'				=> 'About box',
		        'section'			=> 'meta_section',
			'settings'			=> 'about_box', )));

		// Copyright after post
		$wp_customize->add_setting( 'copyright_post', array(
			'default'			=> 'Copyright &copy; 2013. All rights reserved.', ));
		$wp_customize->add_control( new Anarcho_Customize_Textarea_Control( $wp_customize, 'copyright_post', array(
			'priority'			=> 3,
			'label'				=> __( 'Copyright after post', 'anarcho-notepad' ),
			'section'			=> 'meta_section',
			'settings'			=> 'copyright_post', )));

		// Site-info in footer
		$wp_customize->add_setting( 'site-info', array(
			'default'			=> 'Copyright &copy; 2013. All rights reserved.'));
		$wp_customize->add_control( new Anarcho_Customize_Textarea_Control( $wp_customize, 'site-info', array(
			'priority'			=> 4,
		        'label'				=> __( 'Site-info in footer', 'anarcho-notepad' ),
		        'section'			=> 'meta_section',
			'settings'			=> 'site-info', )));

   // STUFF SECTION
   $wp_customize->add_section( 'stuff_section', array(
	'title'				=> __( 'Stuff', 'anarcho-notepad' ),
	'priority'			=> 2, ));

		$wp_customize->add_setting('enable_title_animation', array(
			'default'        		=> 'false'));
		$wp_customize->add_control( 'enable_title_animation', array(
			'priority'			=> 1,
		        'type'				=> 'checkbox',
		        'label'				=> __( 'Enable "Title animation"', 'anarcho-notepad' ),
		        'section'			=> 'stuff_section', ));

		$wp_customize->add_setting('enable_breadcrumbs', array(
			'default'        		=> 'false'));
		$wp_customize->add_control( 'enable_breadcrumbs', array(
			'priority'			=> 2,
		        'type'				=> 'checkbox',
		        'label'				=> __( 'Enable "Breadcrumbs"', 'anarcho-notepad' ),
		        'section'			=> 'stuff_section', ));

		$wp_customize->add_setting('enable_page-nav', array(
			'default'        		=> 'true'));
		$wp_customize->add_control( 'enable_page-nav', array(
			'priority'			=> 3,
		        'type'				=> 'checkbox',
		        'label'				=> __( 'Enable "Page Navigation"', 'anarcho-notepad' ),
		        'section'			=> 'stuff_section', ));

		$wp_customize->add_setting('show_info_line', array(
			'default'        		=> 'false'));
		$wp_customize->add_control( 'show_info_line', array(
			'priority'			=> 5,
		        'type'				=> 'checkbox',
		        'label'				=> __( 'Show info line in footer', 'anarcho-notepad' ),
		        'section'			=> 'stuff_section', ));

   // SCRIPTS SECTION
   $wp_customize->add_section( 'scripts_section', array(
	'title'				=> __( 'Scripts', 'anarcho-notepad' ),
	'description'			=> __( 'Put here your scripts', 'anarcho-notepad' ),
	'priority'			=> 3, ));

		$wp_customize->add_setting( 'script_header');
		$wp_customize->add_control( new Anarcho_Customize_Textarea_Control( $wp_customize, 'script_header', array(
			'priority'			=> 1,
		        'label'				=> __( 'Scripts in to header', 'anarcho-notepad' ),
		        'section'			=> 'scripts_section',
			'settings'			=> 'script_header', )));

                $wp_customize->add_setting( 'script_before_post');
                $wp_customize->add_control( new Anarcho_Customize_Textarea_Control( $wp_customize, 'script_before_post', array(
			'priority'			=> 2,
                        'label'                         => __( 'Scripts before post', 'anarcho-notepad' ),
                        'section'                       => 'scripts_section',
                        'settings'                      => 'script_before_post', )));

                $wp_customize->add_setting( 'script_after_post');
                $wp_customize->add_control( new Anarcho_Customize_Textarea_Control( $wp_customize, 'script_after_post', array(
			'priority'			=> 3,
                        'label'                         => __( 'Scripts after post', 'anarcho-notepad' ),
                        'section'                       => 'scripts_section',
                        'settings'                      => 'script_after_post', )));

                $wp_customize->add_setting( 'script_footer');
                $wp_customize->add_control( new Anarcho_Customize_Textarea_Control( $wp_customize, 'script_footer', array(
			'priority'			=> 4,
                        'label'                         => __( 'Scripts in to footer', 'anarcho-notepad' ),
                        'section'                       => 'scripts_section',
                        'settings'                      => 'script_footer', )));

   // HEADER SECTION


   // TITLE SECTION

	// Create an Array with a ton of Google Fonts
	$google_font_array = array(
			'Default'				=> 'Default',
			'Questrial'				=> 'Questrial',
			'Astloch'				=> 'Astloch',
			'IM+Fell+English+SC'			=> 'IM+Fell+English+SC',
			'Lekton'				=> 'Lekton',
			'Nova+Round'				=> 'Nova+Round',
			'Nova+Oval'				=> 'Nova+Oval',
			'League+Script'				=> 'League+Script',
			'Caudex'				=> 'Caudex',
			'IM+Fell+DW+Pica'			=> 'IM+Fell+DW+Pica',
			'Nova+Script'				=> 'Nova+Script',
			'Nixie+One'				=> 'Nixie+One',
			'IM+Fell+DW+Pica+SC'			=> 'IM+Fell+DW+Pica+SC',
			'Puritan'				=> 'Puritan',
			'Prociono'				=> 'Prociono',
			'Abel'					=> 'Abel',
			'Snippet'				=> 'Snippet',
			'Kristi'				=> 'Kristi',
			'Mako'					=> 'Mako',
			'Ubuntu+Mono'				=> 'Ubuntu+Mono',
			'Nova+Slim'				=> 'Nova+Slim',
			'Patrick+Hand'				=> 'Patrick+Hand',
			'Crafty+Girls'				=> 'Crafty+Girls',
			'Brawler'				=> 'Brawler',
			'Droid+Sans'				=> 'Droid+Sans',
			'Geostar'				=> 'Geostar',
			'Yellowtail'				=> 'Yellowtail',
			'Permanent+Marker'			=> 'Permanent+Marker',
			'Just+Another+Hand'			=> 'Just+Another+Hand',
			'Unkempt'				=> 'Unkempt',
			'Jockey+One'				=> 'Jockey+One',
			'Lato'					=> 'Lato',
			'Arvo'					=> 'Arvo',
			'Cabin'					=> 'Cabin',
			'Playfair+Display'			=> 'Playfair+Display',
			'Crushed'				=> 'Crushed',
			'Asset'					=> 'Asset',
			'Sue+Ellen+Francisco'			=> 'Sue+Ellen+Francisco',
			'Julee'					=> 'Julee',
			'Judson'				=> 'Judson',
			'Neuton'				=> 'Neuton',
			'Sorts+Mill+Goudy'			=> 'Sorts+Mill+Goudy',
			'Mate'					=> 'Mate',
			'News+Cycle'				=> 'News+Cycle',
			'Michroma'				=> 'Michroma',
			'Lora'					=> 'Lora',
			'Give+You+Glory'			=> 'Give+You+Glory',
			'Rammetto+One'				=> 'Rammetto+One',
			'Pompiere'				=> 'Pompiere',
			'PT+Sans'				=> 'PT+Sans',
			'Andika'				=> 'Andika',
			'Cabin+Sketch'				=> 'Cabin+Sketch',
			'Delius+Swash+Caps'			=> 'Delius+Swash+Caps',
			'Coustard'				=> 'Coustard',
			'Cherry+Cream+Soda'			=> 'Cherry+Cream+Soda',
			'Maiden+Orange'				=> 'Maiden+Orange',
			'Syncopate'				=> 'Syncopate',
			'PT+Sans+Narrow'			=> 'PT+Sans+Narrow',
			'Montez'				=> 'Montez',
			'Short+Stack'				=> 'Short+Stack',
			'Poller+One'				=> 'Poller+One',
			'Tinos'					=> 'Tinos',
			'Philosopher'				=> 'Philosopher',
			'Neucha'				=> 'Neucha',
			'Gravitas+One'				=> 'Gravitas+One',
			'Corben'				=> 'Corben',
			'Istok+Web'				=> 'Istok+Web',
			'Federo'				=> 'Federo',
			'Yeseva+One'				=> 'Yeseva+One',
			'Petrona'				=> 'Petrona',
			'Arimo'					=> 'Arimo',
			'Irish+Grover'				=> 'Irish+Grover',
			'Quicksand'				=> 'Quicksand',
			'Paytone+One'				=> 'Paytone+One',
			'Kelly+Slab'				=> 'Kelly+Slab',
			'Nova+Flat'				=> 'Nova+Flat',
			'Vast+Shadow'				=> 'Vast+Shadow',
			'Ubuntu'				=> 'Ubuntu',
			'Smokum'				=> 'Smokum',
			'Ruslan+Display'			=> 'Ruslan+Display',
			'La+Belle+Aurore'			=> 'La+Belle+Aurore',
			'Federant'				=> 'Federant',
			'Podkova'				=> 'Podkova',
			'IM+Fell+French+Canon'			=> 'IM+Fell+French+Canon',
			'PT+Serif+Caption'			=> 'PT+Serif+Caption',
			'The+Girl+Next+Door'			=> 'The+Girl+Next+Door',
			'Artifika'				=> 'Artifika',
			'Marck+Script'				=> 'Marck+Script',
			'Droid+Sans+Mono'			=> 'Droid+Sans+Mono',
			'Contrail+One'				=> 'Contrail+One',
			'Swanky+and+Moo+Moo'			=> 'Swanky+and+Moo+Moo',
			'Wire+One'				=> 'Wire+One',
			'Tenor+Sans'				=> 'Tenor+Sans',
			'Nova+Mono'				=> 'Nova+Mono',
			'Josefin+Sans'				=> 'Josefin+Sans',
			'Bitter'				=> 'Bitter',
			'Supermercado+One'			=> 'Supermercado+One',
			'PT+Serif'				=> 'PT+Serif',
			'Limelight'				=> 'Limelight',
			'Coda+Caption:800'			=> 'Coda+Caption:800',
			'Lobster'				=> 'Lobster',
			'Gentium+Basic'				=> 'Gentium+Basic',
			'Atomic+Age'				=> 'Atomic+Age',
			'Mate+SC'				=> 'Mate+SC',
			'Eater+Caps'				=> 'Eater+Caps',
			'Bigshot+One'				=> 'Bigshot+One',
			'Kreon'					=> 'Kreon',
			'Rationale'				=> 'Rationale',
			'Sniglet:800'				=> 'Sniglet:800',
			'Smythe'				=> 'Smythe',
			'Waiting+for+the+Sunrise'		=> 'Waiting+for+the+Sunrise',
			'Gochi+Hand'				=> 'Gochi+Hand',
			'Reenie+Beanie'				=> 'Reenie+Beanie',
			'Kameron'				=> 'Kameron',
			'Anton'					=> 'Anton',
			'Holtwood+One+SC'			=> 'Holtwood+One+SC',
			'Schoolbell'				=> 'Schoolbell',
			'Tulpen+One'				=> 'Tulpen+One',
			'Redressed'				=> 'Redressed',
			'Ovo'					=> 'Ovo',
			'Shadows+Into+Light'			=> 'Shadows+Into+Light',
			'Rokkitt'				=> 'Rokkitt',
			'Josefin+Slab'				=> 'Josefin+Slab',
			'Passero+One'				=> 'Passero+One',
			'Copse'					=> 'Copse',
			'Walter+Turncoat'			=> 'Walter+Turncoat',
			'Sigmar+One'				=> 'Sigmar+One',
			'Convergence'				=> 'Convergence',
			'Gloria+Hallelujah'			=> 'Gloria+Hallelujah',
			'Fontdiner+Swanky'			=> 'Fontdiner+Swanky',
			'Tienne'				=> 'Tienne',
			'Calligraffitti'			=> 'Calligraffitti',
			'UnifrakturCook:700'			=> 'UnifrakturCook:700',
			'Tangerine'				=> 'Tangerine',
			'Days+One'				=> 'Days+One',
			'Cantarell'				=> 'Cantarell',
			'IM+Fell+Great+Primer'			=> 'IM+Fell+Great+Primer',
			'Antic'					=> 'Antic',
			'Muli'					=> 'Muli',
			'Monofett'				=> 'Monofett',
			'Just+Me+Again+Down+Here'		=> 'Just+Me+Again+Down+Here',
			'Geostar+Fill'				=> 'Geostar+Fill',
			'Candal'				=> 'Candal',
			'Cousine'				=> 'Cousine',
			'Merienda+One'				=> 'Merienda+One',
			'Goblin+One'				=> 'Goblin+One',
			'Monoton'				=> 'Monoton',
			'Ubuntu+Condensed'			=> 'Ubuntu+Condensed',
			'EB+Garamond'				=> 'EB+Garamond',
			'Droid+Serif'				=> 'Droid+Serif',
			'Lancelot'				=> 'Lancelot',
			'Cookie'				=> 'Cookie',
			'Fjord+One'				=> 'Fjord+One',
			'Arapey'				=> 'Arapey',
			'Rancho'				=> 'Rancho',
			'Sancreek'				=> 'Sancreek',
			'Butcherman+Caps'			=> 'Butcherman+Caps',
			'Salsa'					=> 'Salsa',
			'Amatic+SC'				=> 'Amatic+SC',
			'Creepster+Caps'			=> 'Creepster+Caps',
			'Chivo'					=> 'Chivo',
			'Linden+Hill'				=> 'Linden+Hill',
			'Nosifer+Caps'				=> 'Nosifer+Caps',
			'Marvel'				=> 'Marvel',
			'Alice'					=> 'Alice',
			'Love+Ya+Like+A+Sister' 		=> 'Love+Ya+Like+A+Sister',
			'Pinyon+Script'				=> 'Pinyon+Script',
			'Stardos+Stencil'			=> 'Stardos+Stencil',
			'Leckerli+One'				=> 'Leckerli+One',
			'Nothing+You+Could+Do'			=> 'Nothing+You+Could+Do',
			'Sansita+One'				=> 'Sansita+One',
			'Poly'					=> 'Poly',
			'Alike'					=> 'Alike',
			'Fanwood+Text'				=> 'Fanwood+Text',
			'Bowlby+One+SC'				=> 'Bowlby+One+SC',
			'Actor'					=> 'Actor',
			'Terminal+Dosis'			=> 'Terminal+Dosis',
			'Aclonica'				=> 'Aclonica',
			'Gentium+Book+Basic'			=> 'Gentium+Book+Basic',
			'Rosario'				=> 'Rosario',
			'Satisfy'				=> 'Satisfy',
			'Sunshiney'				=> 'Sunshiney',
			'Aubrey'				=> 'Aubrey',
			'Jura'					=> 'Jura',
			'Ultra'					=> 'Ultra',
			'Zeyada'				=> 'Zeyada',
			'Changa+One'				=> 'Changa+One',
			'Varela'				=> 'Varela',
			'Black+Ops+One'				=> 'Black+Ops+One',
			'Open+Sans'				=> 'Open+Sans',
			'Alike+Angular'				=> 'Alike+Angular',
			'Prata'					=> 'Prata',
			'Bowlby+One'				=> 'Bowlby+One',
			'Megrim'				=> 'Megrim',
			'Damion'				=> 'Damion',
			'Coda'					=> 'Coda',
			'Vidaloka'				=> 'Vidaloka',
			'Radley'				=> 'Radley',
			'Indie+Flower'				=> 'Indie+Flower',
			'Over+the+Rainbow'			=> 'Over+the+Rainbow',
			'Open+Sans+Condensed:300'		=> 'Open+Sans+Condensed:300',
			'Abril+Fatface'				=> 'Abril+Fatface',
			'Miltonian'				=> 'Miltonian',
			'Delius'				=> 'Delius',
			'Six+Caps'				=> 'Six+Caps',
			'Francois+One'				=> 'Francois+One',
			'Dorsa'					=> 'Dorsa',
			'Aldrich'				=> 'Aldrich',
			'Buda:300'				=> 'Buda:300',
			'Rochester'				=> 'Rochester',
			'Allerta'				=> 'Allerta',
			'Bevan'					=> 'Bevan',
			'Wallpoet'				=> 'Wallpoet',
			'Quattrocento'				=> 'Quattrocento',
			'Dancing+Script'			=> 'Dancing+Script',
			'Amaranth'				=> 'Amaranth',
			'Unna'					=> 'Unna',
			'PT+Sans+Caption'			=> 'PT+Sans+Caption',
			'Geo'					=> 'Geo',
			'Quattrocento+Sans'			=> 'Quattrocento+Sans',
			'Oswald'				=> 'Oswald',
			'Carme'					=> 'Carme',
			'Spinnaker'				=> 'Spinnaker',
			'MedievalSharp'				=> 'MedievalSharp',
			'Nova+Square'				=> 'Nova+Square',
			'IM+Fell+French+Canon+SC' 		=> 'IM+Fell+French+Canon+SC',
			'Voltaire'				=> 'Voltaire',
			'Raleway:100'				=> 'Raleway:100',
			'Delius+Unicase'			=> 'Delius+Unicase',
			'Shanti'				=> 'Shanti',
			'Expletus+Sans'				=> 'Expletus+Sans',
			'Crimson+Text'				=> 'Crimson+Text',
			'Nunito'				=> 'Nunito',
			'Numans'				=> 'Numans',
			'Hammersmith+One'			=> 'Hammersmith+One',
			'Miltonian+Tattoo'			=> 'Miltonian+Tattoo',
			'Allerta+Stencil'			=> 'Allerta+Stencil',
			'Vollkorn'				=> 'Vollkorn',
			'Pacifico'				=> 'Pacifico',
			'Cedarville+Cursive'			=> 'Cedarville+Cursive',
			'Cardo'					=> 'Cardo',
			'Merriweather'				=> 'Merriweather',
			'Loved+by+the+King'			=> 'Loved+by+the+King',
			'Slackey'				=> 'Slackey',
			'Nova+Cut'				=> 'Nova+Cut',
			'Rock+Salt'				=> 'Rock+Salt',
			'Yanone+Kaffeesatz'			=> 'Yanone+Kaffeesatz',
			'Molengo'				=> 'Molengo',
			'Nobile'				=> 'Nobile',
			'Goudy+Bookletter+1911' 		=> 'Goudy+Bookletter+1911',
			'Bangers'				=> 'Bangers',
			'Old+Standard+TT'			=> 'Old+Standard+TT',
			'Orbitron'				=> 'Orbitron',
			'Comfortaa'				=> 'Comfortaa',
			'Varela+Round'				=> 'Varela+Round',
			'Forum'					=> 'Forum',
			'Maven+Pro'				=> 'Maven+Pro',
			'Volkhov'				=> 'Volkhov',
			'Allan:700'				=> 'Allan:700',
			'Luckiest+Guy'				=> 'Luckiest+Guy',
			'Gruppo'				=> 'Gruppo',
			'Cuprum'				=> 'Cuprum',
			'Anonymous+Pro'				=> 'Anonymous+Pro',
			'UnifrakturMaguntia'			=> 'UnifrakturMaguntia',
			'Covered+By+Your+Grace' 		=> 'Covered+By+Your+Grace',
			'Homemade+Apple'			=> 'Homemade+Apple',
			'Lobster+Two'				=> 'Lobster+Two',
			'Coming+Soon'				=> 'Coming+Soon',
			'Mountains+of+Christmas'		=> 'Mountains+of+Christmas',
			'Architects+Daughter'			=> 'Architects+Daughter',
			'Dawning+of+a+New+Day'			=> 'Dawning+of+a+New+Day',
			'Kranky'				=> 'Kranky',
			'Adamina'				=> 'Adamina',
			'Carter+One'				=> 'Carter+One',
			'Bentham'				=> 'Bentham',
			'IM+Fell+Great+Primer+SC' 		=> 'IM+Fell+Great+Primer+SC',
			'Chewy'					=> 'Chewy',
			'IM+Fell+English'			=> 'IM+Fell+English',
			'Inconsolata'				=> 'Inconsolata',
			'Vibur'					=> 'Vibur',
			'Andada'				=> 'Andada',
			'IM+Fell+Double+Pica'			=> 'IM+Fell+Double+Pica',
			'Kenia'					=> 'Kenia',
			'Meddon'				=> 'Meddon',
			'Metrophobic'				=> 'Metrophobic',
			'Play'					=> 'Play',
			'Special+Elite'				=> 'Special+Elite',
			'IM+Fell+Double+Pica+SC' 		=> 'IM+Fell+Double+Pica+SC',
			'Didact+Gothic'				=> 'Didact+Gothic',
			'Modern+Antiqua'			=> 'Modern+Antiqua',
			'VT323'					=> 'VT323',
			'Annie+Use+Your+Telescope' 		=> 'Annie+Use+Your+Telescope');

	// Enable Google Fonts for Title
	$wp_customize->add_setting( 'titlefontstyle_setting', array(
		'Default'           		=> 'Permanent+Marker',
		'control'           		=> 'select',));
	$wp_customize->add_control( 'titlefontstyle_control', array(
		'label'					=> __('Site Title font (Google Webfonts)', 'anarcho-notepad'),
		'priority'				=> 10,
		'section'				=> 'title_tagline',
		'settings'				=> 'titlefontstyle_setting',
		'type'					=> 'select',
		'choices'				=> $google_font_array, ));

	// Enable Google Fonts for Tagline
	$wp_customize->add_setting( 'taglinefontstyle_setting', array(
		'Default'          		=> 'Permanent+Marker',
		'control'           		=> 'select',));
	$wp_customize->add_control( 'taglinefontstyle_control', array(
		'label'					=> __('Site Tagline font (Google Webfonts)', 'anarcho-notepad'),
		'priority'				=> 11,
		'section'				=> 'title_tagline',
		'settings'				=> 'taglinefontstyle_setting',
		'type'					=> 'select',
		'choices'				=> $google_font_array, ));

	// Title color
	$wp_customize->add_setting( 'title_color', array(
		'default' 			=> '#e5e5e5',
                'transport'                     => 'postMessage',
		'type'           		=> 'option', ));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_color', array(
                'label' 				=> __('Site Title color', 'anarcho-notepad'),
                'section' 				=> 'title_tagline',
                'settings' 				=> 'title_color',
		'priority'				=> 12,
	)));

        // Tagline color
        $wp_customize->add_setting( 'tagline_color', array(
		'default' 			=> '#9b9b9b',
                'transport'                     => 'postMessage',
		'type'           		=> 'option', ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tagline_color', array(
                'label' 				=> __('Site Tagline color', 'anarcho-notepad'),
                'section' 				=> 'title_tagline',
                'settings' 				=> 'tagline_color',
		'priority'				=> 13,
        )));

   // BACKGROUND SECTION
   $wp_customize->get_section( 'background_image' );

	// Background color
        $wp_customize->add_setting( 'background_color' , array(
		'default'     			=> '000000',
		'transport'   			=> 'postMessage', ));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
		'label'				=> __('Background Color', 'anarcho-notepad'),
		'section'			=> 'background_image', )));

	// Add the option to use the CSS3 property Background-size
	$wp_customize->add_setting( 'backgroundsize_setting', array(
		'default'        		=> 'auto',
		'control'        		=> 'select',));
	$wp_customize->add_control( 'backgroundsize_control', array(
		'label'				=> __('Background Size', 'anarcho-notepad'),
		'section'			=> 'background_image',
		'settings'			=> 'backgroundsize_setting',
		'priority'			=> 10,
		'type'				=> 'radio',
		'choices'			=> array(
			'auto'				=> __('Auto (Default)', 'anarcho-notepad'),
			'contain'			=> __('Contain', 'anarcho-notepad'),
			'cover'				=> __('Cover', 'anarcho-notepad'),), ));

});

// Inject the Customizer Choices into the Theme
add_action('wp_head', 'anarcho_notepad_inline_css');
function anarcho_notepad_inline_css() {

		if ( ( get_theme_mod('enable_title_animation') != '0' ) ) echo '<script>
var tit=document.title,c=0;function writetitle(){document.title=tit.substring(0,c);c==tit.length?(c=0,setTimeout("writetitle()",3E3)):(c++,setTimeout("writetitle()",200))}writetitle(); 
</script>' . "\n";

		/* Custom Font Styles */
		if ( ( get_theme_mod('titlefontstyle_setting') != 'Default' ) && ( get_theme_mod('titlefontstyle_setting') != '' ) ) {
			echo "<link href='http://fonts.googleapis.com/css?family=" . get_theme_mod('titlefontstyle_setting') . "' rel='stylesheet' type='text/css'>"  . "\n";
			$q = get_theme_mod('titlefontstyle_setting');
			$q = preg_replace('/[^a-zA-Z0-9]+/', ' ', $q);
			echo '<style type="text/css" media="screen">' . "\n";
		 	echo	".site-title {font-family: '" . $q . "';}" . "\n";
			echo '</style>' . "\n";
		}
		if ( ( get_theme_mod('taglinefontstyle_setting') != 'Default' ) && ( get_theme_mod('taglinefontstyle_setting') != '' ) ) {
			echo "<link href='http://fonts.googleapis.com/css?family=" . get_theme_mod('taglinefontstyle_setting') . "' rel='stylesheet' type='text/css'>"  . "\n";
			echo '<style type="text/css" media="screen">' . "\n";
			$x = get_theme_mod('taglinefontstyle_setting');
			$x = preg_replace('/[^a-zA-Z0-9]+/', ' ', $x);
			echo	".site-description {font-family: '" . $x . "';}" . "\n";
			echo '</style>' . "\n";
		}
		/* End - Custom Font Styles */

	?><style type="text/css"><?php

		/* Has the text been hidden? */
		if ( ! display_header_text() ) {
		?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px 1px 1px 1px); /* IE7 */
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		}
		/* End - Has the text been hidden? */

		/* If the user has set a custom color for the text in the customizer, use that. */
		?>
		.site-title { color: <?php echo get_option('title_color'); ?>; }
		.site-description { color: <?php echo get_option('tagline_color'); ?>; }
		<?php
		/* End - If the user has set a custom color for the text in the customizer, use that. */

		/* If the user has set a custom color for the text in admin panel, use that. */
	       	/*if ( 'blank' != get_header_textcolor() ) {
    		?>
        		.site-title,
        		.site-description {
            			color: #<?php echo get_header_textcolor(); ?>;
       		 	}
		<?php
		}*/
		/*End - If the user has set a custom color for the text in admin panel, use that. */

	?></style><?php

}

function anarcho_customizer_live_preview() {
	wp_enqueue_script(
		'anarcho-themecustomizer',
		get_template_directory_uri().'/js/theme-customizer.js',
		array( 'jquery','customize-preview' ),
		'',
		true
	);
}
add_action( 'customize_preview_init', 'anarcho_customizer_live_preview' );

/*****************END-Theme Customizer******************************/

/*****************Theme Information Page****************************/

// Add some CSS so I can Style the Theme Options Page
function anarcho_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style('anarcho-theme-options', get_template_directory_uri() . '/theme-options.css', false, '1.0');
}
add_action('admin_print_styles-appearance_page_theme_options', 'anarcho_admin_enqueue_scripts');

// Create the Theme Information page (Theme Options)
function anarcho_theme_options_do_page() { ?>
    <div class="cover">
    <header id="header"></header>
    <section id="page">

      <div class="content">

	<div class="welcome"><i><?php _e('Thank you for using Anarcho-Notepad! The Anarcho-Notepad 2.1 now even more opportunities, it is safer and more stable than ever! Enjoy yourselves! ', 'anarcho-notepad');?></i>
	<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://mycyberuniverse.tk/anarcho-notepad.html" data-text="My WordPress website is built with the #Anarcho-Notepad Theme version 2.1!" data-related="AGareginyan">Tweet</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	<p><a name="fb_share" type="icon"
   share_url="http://mycyberuniverse/anarcho-notepad.html"></a>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript">
</script></p>
	</div>

      <h4><?php _e('About the Theme "Anarcho Notepad"', 'anarcho-notepad');?></h4>
	<p><?php _e('Inspired by the idea of anarchy, I designed this theme for your personal blogs and diaries. Anarcho Notepad can be easily customized. It utilizes latest HTML 5, CSS3 and wordpress native functions for creating the awesomeness that looks good on every browser. I\'m constantly adding new features to this theme to allow you to personalize it to your own needs. If you want a new feature or just want to be able to change something just ask me and I would be happy to add it for you. I would like to thank you for your support, visit the Theme URI for the update history, and Enjoy!', 'anarcho-notepad');?></p>


      <h4><?php _e('Features', 'anarcho-notepad');?></h4>
      <table>
        <tbody>
        <tr>
        <th class="justify"><?php _e('Anarcho Notepad Theme Features', 'anarcho-notepad');?></th>
        <th></th>
        </tr>
        <tr>
        <td class="justify">Responsive Design</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Clean and Beautiful Stylized HTML, CSS, JavaScript</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Change the site Title and Slogan Colors</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Upload Your Own Background Image</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Easy Selection of Fonts from Font Library "Googl Fonts".</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Automatically Scaling the Width Properties of Images, Video etc (Fluid Images etc.).</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Use Conditional Units of Measurements.</td>
        <td>&#9733;</td>
        </tr>
        <td class="justify">CSS3 Font Flags.</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">HTML5 Semantic Markup.</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">RTL Styles for Hebrew or Arabic.</td>
        <td>&#9733;</td>
        </tr>
        <td class="justify">Prepared to Translate to Other Languages.</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Box "About the author" Below</td>
        <td>&#9733;</td>
        </tr>
        <tr>
        <td class="justify">Your Copyright Box Under Each Post.</td>
        <td>&#9733;</td>
        </tr>

        </tbody>
	</table>

      <h4><?php _e('Version 2.1 change log', 'anarcho-notepad');?></h4>
	<p>
	* added : russian translation.<br/>
	* added : (css) rtl styles for hebrew or arabic.<br/>
	* added : (css) comment navigation styling, similar to post navigation<br/>
	* added : (php) (css) author box styling (if bio field not empty)<br/>
	* added : (js) smooth transition for "back to top" link.<br/>
	* added : (css) font-icons to title of archive, search, 404<br/>
	* fixed : many more minor fixes and changes.<br/>
	</p>
      </div><!--<div class="content">-->

      <aside id="sidebar">
            <div class="donate">
              <h3><?php _e('Donate', 'anarcho-notepad');?></h3>
              <p><?php _e('I\'m doing everything possible in order to "Anarcho Notepad" remained a completely free template  for you!', 'anarcho-notepad');?><br><br>
                <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2EBT6E8BQ5RRQ" target="_blank" rel="nofollow"><img class="tc-donate" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" alt="Make a donation for Anarcho-Notepad"></a>
              </p>
            </div><!--<div class="donate">-->

            <div class="site-link">
              <h3><?php _e('Happy to enjoy the Anarcho-Notepad?', 'anarcho-notepad');?></h3>
              <p><?php _e('If you are content this template, tell about it at wordpress.org, describe your Anarcho-Notepad! ', 'anarcho-notepad');?><br><?php _e(' I love the feedbacks ... ', 'anarcho-notepad');?><br>
              <a class="button-primary review-customizr" title="Visit the site of theme" href="http://mycyberuniverse.tk/anarcho-notepad" target="_blank"><?php _e('Visit the site of theme', 'anarcho-notepad');?></a></p>
            </div><!--<div class="site-link">-->

            <div class="follow">
              <h3><?php _e('Follow me in Twitter', 'anarcho-notepad');?></h3>
              <p><a href="https://twitter.com/AGareginyan" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @AGareginyan</a>
              <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
              </p>
            </div><!--<div class="last-feature">-->
      </aside><!--<aside id="sidebar">-->

      <br clear="all">

    </section><!--<section id="page">-->
    <footer id="footer"></footer><!--<footer id="finishing">-->

    </div><!--<div class="cover">-->

<?php }
add_action('admin_menu', 'anarcho_theme_options_add_page');

// Link to the page about theme in dashboard
function anarcho_theme_options_add_page() {
	add_theme_page('Theme Info', 'Theme Info', 'edit_theme_options', 'theme_options', 'anarcho_theme_options_do_page');}

/*****************END-Theme Information Page****************************/

// Add IE conditional HTML5 shim to header
function anarcho_add_ie_html5_shim () {
     global $is_IE;
     if ($is_IE)
    	echo '<!--[if lt IE 9]>';
    	echo '<script src="', get_template_directory_uri() .'/js/html5.js"></script>';
    	echo '<![endif]-->';
}
add_action('wp_head', 'anarcho_add_ie_html5_shim');

// Adds a custom default avatar
function anarcho_avatar( $avatar_defaults ) {
	$myavatar = get_stylesheet_directory_uri() . '/images/anarchy-symbol.png';
	$avatar_defaults[$myavatar] = 'Anarcho symbol';
	return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'anarcho_avatar' );

// Enable comment_reply
function anarcho_include_comment_reply() {
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
}
add_action( 'wp_enqueue_scripts', 'anarcho_include_comment_reply' );

// Include Font-Awesome styles
function anarcho_include_font_awesome_styles() {
    wp_register_style( 'font_awesome_styles', get_template_directory_uri() . '/fonts/font-awesome-4.0.0/font-awesome.min.css', 'screen' );
    wp_enqueue_style( 'font_awesome_styles' );
}
add_action( 'wp_enqueue_scripts', 'anarcho_include_font_awesome_styles' );

// Enable smoothscroll.js
function include_smoothscroll_script() {
	wp_enqueue_script( 'back-top', get_template_directory_uri() . '/js/smoothscroll.js', array( 'jquery' ), '',  true );
}
add_action( 'wp_enqueue_scripts', 'include_smoothscroll_script' );

// Enable Breadcrumbs
function anarcho_breadcrumbs() {
 if(get_theme_mod('enable_breadcrumbs') == '1') {
	$delimiter = '&raquo;';
	$before = '<span>';
	$after = '</span>';
	echo '<nav id="breadcrumbs">';
	global $post;
	$homeLink = esc_url( home_url() );
	echo '<a href="' . $homeLink . '" style="font-family: FontAwesome; font-size: 20px; vertical-align: bottom;">&#xf015;</a> ' . $delimiter . ' ';
 if ( is_category() ) {
	global $wp_query;
	$cat_obj = $wp_query->get_queried_object();
	$thisCat = $cat_obj->term_id;
	$thisCat = get_category($thisCat);
	$parentCat = get_category($thisCat->parent);
 if ($thisCat->parent != 0) echo (get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ')) ;
	echo $before . __('Archive by category ', 'anarcho-notepad') . '"' . single_cat_title('', false) . '"' . $after;
 } elseif ( is_day() ) {
	echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
	echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
	echo $before . __('Archive by date ', 'anarcho-notepad') . '"' . get_the_time('d') . '"' . $after;
 } elseif ( is_month() ) {
	echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
	echo $before . __('Archive by month ', 'anarcho-notepad') . '"' . get_the_time('F') . '"' . $after;
 } elseif ( is_year() ) {
	echo $before . __('Archive by year ', 'anarcho-notepad') . '"' . get_the_time('Y') . '"' . $after;
 } elseif ( is_single() && !is_attachment() ) {
 if ( get_post_type() != 'post' ) {
	$post_type = get_post_type_object(get_post_type());
	$slug = $post_type->rewrite;
	echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>' . $delimiter . ' ';
	echo $before . get_the_title() . $after;
 } else {
	$cat = get_the_category(); $cat = $cat[0];
	echo ' ' . get_category_parents($cat, TRUE, ' ' . $delimiter . ' ') . ' ';
	echo $before . __('You currently reading ', 'anarcho-notepad') . '"' . get_the_title() . '"' .  $after;
 }
/* } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
	$post_type = get_post_type_object(get_post_type());
	echo $before . $post_type->labels->singular_name . $after;*/
 } elseif ( is_attachment() ) {
	$parent_id  = $post->post_parent;
	$breadcrumbs = array();
	while ($parent_id) {
	$page = get_page($parent_id);
	$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
	$parent_id    = $page->post_parent;
 }
	$breadcrumbs = array_reverse($breadcrumbs);
	foreach ($breadcrumbs as $crumb) echo ' ' . $crumb . ' ' . $delimiter . ' ';
	echo $before . 'You&apos;re currently viewing "' . get_the_title() . '"' . $after;
 } elseif ( is_page() && !$post->post_parent ) {
	echo $before . 'You&apos;re currently reading "' . get_the_title() . '"' . $after;
 } elseif ( is_page() && $post->post_parent ) {
	$parent_id  = $post->post_parent;
	$breadcrumbs = array();
	while ($parent_id) {
	$page = get_page($parent_id);
	$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
	$parent_id    = $page->post_parent;
 }
	$breadcrumbs = array_reverse($breadcrumbs);
	foreach ($breadcrumbs as $crumb) echo ' ' . $crumb . ' ' . $delimiter . ' ';
	echo $before . __('You currently reading ', 'anarcho-notepad') . '"' . get_the_title() . '"' . $after;
 } elseif ( is_search() ) {
	echo $before . __('Search results for ', 'anarcho-notepad') . '"' . get_search_query() . '"' . $after;
 } elseif ( is_tag() ) {
	echo $before . __('Archive by tag ', 'anarcho-notepad') . '"' . single_tag_title('', false) . '"' . $after;
 } elseif ( is_author() ) {
	global $author;
	$userdata = get_userdata($author);
	echo $before . __('Articles posted by ', 'anarcho-notepad') . '"' . $userdata->display_name . '"' . $after;
 } elseif ( is_404() ) {
	echo $before . __('You got it ', 'anarcho-notepad') . '"' . 'Error 404 not Found' . '"&nbsp;' . $after;
 }
 if ( get_query_var('paged') ) {
 if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
	echo ('Page') . ' ' . get_query_var('paged');
 if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
 }
	echo '</nav>';
 }
}
// END-Breadcrumbs

// Page Navigation
/* Display navigation to next/previous set of posts when applicable. */
function anarcho_page_nav() {
 if(get_theme_mod('enable_page-nav') == '1') {
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;
  $total = 0;
  $a['mid_size'] = 3;
  $a['end_size'] = 1;
  $a['prev_text'] = __('Previous page', 'anarcho-notepad');
  $a['next_text'] = __('Next page', 'anarcho-notepad');
  if ($max > 0) echo '<nav id="page-nav">';
  if ($total == 1 && $max > 0) $pages = '<span class="pages-nav">' . __('Page ', 'anarcho-notepad') . $current . __(' of the ', 'anarcho-notepad') . $max . '</span>'."\r\n";
  echo $pages . paginate_links($a);
  if ($max > 0) echo '</nav><br/>';
 }
 else {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'anarcho-notepad' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( '<i class="fa fa-arrow-left"></i> Older posts' ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( 'Newer posts <i class="fa fa-arrow-right"></i>' ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
 }
}
// END-Page Navigation

// Post navigation
/* Display navigation to next/previous post when applicable. */
function anarcho_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'anarcho-notepad' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', '<i class="fa fa-arrow-left"></i> %title' ); ?>
			<?php next_post_link( '%link', '%title <i class="fa fa-arrow-right"></i>' ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
// END-Post navigation

// Comments
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function anarcho_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'anarcho-notepad' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'anarcho-notepad' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'anarcho-notepad' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( '%1$s at %2$s', get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'anarcho-notepad' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'anarcho-notepad' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'anarcho-notepad' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
// END-Comments

// Comments-Form
function anarcho_comment_form($anarcho_defaults) {

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$anarcho_fields = array(
		'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name:', 'anarcho-notepad' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
		            '<input id="author" name="author" placeholder="' . __('Name', 'anarcho-notepad') . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
		'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email:', 'anarcho-notepad' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
		            '<input id="email" name="email" placeholder="' . __('Email', 'anarcho-notepad') . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
		'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website:', 'anarcho-notepad' ) . '</label>' .
		            '<input id="url" name="url" placeholder="' . __('Website', 'anarcho-notepad') . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
);

	$anarcho_defaults['fields'] = apply_filters( 'comment_form_default_fields', $anarcho_fields);
	$anarcho_defaults['comment_field'] = '<p><label for=comment">' . _x( 'Comment:', 'noun', 'anarcho-notepad' ) . '</label><textarea id="comment" name="comment" placeholder="' . __('Comment', 'anarcho-notepad') . '" cols="45" rows="4" aria-required="true"></textarea></p>';

	$anarcho_defaults['title_reply'] = __('Leave a Comment', 'anarcho-notepad');

	return $anarcho_defaults;
}
add_filter('comment_form_defaults', 'anarcho_comment_form');
// END-Comments-Form

?>
