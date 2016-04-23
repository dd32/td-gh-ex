<?php 
function spasalon_typography_settings_customizer( $wp_customize ){

$font_size = array();
for($i=9; $i<=100; $i++)
{			
	$font_size[$i] = $i;
}

$font_family = array('MarketingScript'=>'MarketingScript','Open Sans'=>'Open Sans','RobotoRegular'=>'RobotoRegular','RobotoLight'=>'RobotoLight','RobotoBold'=>'RobotoBold','Roboto'=>'Roboto','Raleway'=>'Raleway','Arial, sans-serif'=>'Arial','Georgia, serif'=>'Georgia','Times New Roman, serif'=>'Times New Roman','Tahoma, Geneva, Verdana, sans-serif'=>'Tahoma','Palatino, Palatino Linotype, serif'=>'Palatino','Helvetica Neue, Helvetica, sans-serif'=>'Helvetica*','Calibri, Candara, Segoe, Optima, sans-serif'=>'Calibri*','Myriad Pro, Myriad, sans-serif'=>'Myriad Pro*','Lucida Grande, Lucida Sans Unicode, Lucida Sans, sans-serif'=>'Lucida','Arial Black, sans-serif'=>'Arial Black','Gill Sans, Gill Sans MT, Calibri, sans-serif'=>'Gill Sans*','Geneva, Tahoma, Verdana, sans-serif'=>'Geneva*','Impact, Charcoal, sans-serif'=>'Impact','Courier, Courier New, monospace'=>'Courier','Abel'=>'Abel','Abril Fatface'=>'Abril Fatface','Aclonica'=>'Aclonica','Actor'=>'Actor','Adamina'=>'Adamina','Aldrich'=>'Aldrich','Alice'=>'Alice','Alike'=>'Alike','Alike Angular'=>'Alike Angular','Allan'=>'Allan','Allerta'=>'Allerta','Allerta Stencil'=>'Allerta Stencil','Amaranth'=>'Amaranth','Amatic SC'=>'Amatic SC','Andada'=>'Andada','Andika'=>'Andika','Annie Use Your Telescope'=>'Annie Use Your Telescope','Anonymous Pro'=>'Anonymous Pro','Antic'=>'Antic','Anton'=>'Anton','Architects Daughter'=>'Architects Daughter','Arimo'=>'Arimo','Artifika'=>'Artifika','Arvo'=>'Arvo','Asset'=>'Asset','Astloch'=>'Astloch','Atomic Age'=>'Atomic Age','Aubrey'=>'Aubrey','Bangers'=>'Bangers','Bentham'=>'Bentham','Bevan'=>'Bevan','Bigshot One'=>'Bigshot One','Black Ops One'=>'Black Ops One','Bowlby One'=>'Bowlby One','Bowlby One SC'=>'Bowlby One SC','Brawler'=>'Brawler','Butcherman Caps'=>'Butcherman Caps','Cabin'=>'Cabin','Cabin Sketch'=>'Cabin Sketch','Cabin Sketch'=>'Cabin Sketch','Calligraffitti'=>'Calligraffitti','Candal'=>'Candal','Cantarell'=>'Cantarell','Cardo'=>'Cardo','Carme'=>'Carme','Carter One'=>'Carter One','Caudex'=>'Caudex','Cedarville Cursive'=>'Cedarville Cursive','Changa One'=>'Changa One','Cherry Cream Soda'=>'Cherry Cream Soda','Chewy'=>'Chewy','Chivo'=>'Chivo','Coda'=>'Coda','Comfortaa'=>'Comfortaa','Coming Soon'=>'Coming Soon','Contrail One'=>'Contrail One','Copse'=>'Copse','Corben'=>'Corben','Corben'=>'Corben','Cousine'=>'Cousine','Coustard'=>'Coustard','Covered By Your Grace'=>'Covered By Your Grace','Crafty Girls'=>'Crafty Girls','Creepster Caps'=>'Creepster Caps','Crimson Text'=>'Crimson Text','Crushed'=>'Crushed','Cuprum'=>'Cuprum','Damion'=>'Damion','Dancing Script'=>'Dancing Script','Dawning of a New Day'=>'Dawning of a New Day','Days One'=>'Days One','Delius'=>'Delius','Delius Swash Caps'=>'Delius Swash Caps','Delius Unicase'=>'Delius Unicase','Didact Gothic'=>'Didact Gothic','Dorsa'=>'Dorsa','Droid Sans'=>'Droid Sans','Droid Sans Mono'=>'Droid Sans Mono','Droid Serif'=>'Droid Serif','EB Garamond'=>'EB Garamond','Eater Caps'=>'Eater Caps','Expletus Sans'=>'Expletus Sans','Fanwood Text'=>'Fanwood Text','Federant'=>'Federant','Federo'=>'Federo','Fontdiner Swanky'=>'Fontdiner Swanky','Forum'=>'Forum','Francois One'=>'Francois One','Gentium Book Basic'=>'Gentium Book Basic','Geo'=>'Geo','Geostar'=>'Geostar','Geostar Fill'=>'Geostar Fill','Give You Glory'=>'Give You Glory','Gloria Hallelujah'=>'Gloria Hallelujah','Goblin One'=>'Goblin One','Gochi Hand'=>'Gochi Hand','Goudy Bookletter 1911'=>'Goudy Bookletter 1911','Gravitas One'=>'Gravitas One','Gruppo'=>'Gruppo','Hammersmith One'=>'Hammersmith One','Holtwood One SC'=>'Holtwood One SC','Homemade Apple'=>'Homemade Apple','IM Fell DW Pica'=>'IM Fell DW Pica','IM Fell English'=>'IM Fell English','IM Fell English SC'=>'IM Fell English SC','Inconsolata'=>'Inconsolata','Indie Flower'=>'Indie Flower','Irish Grover'=>'Irish Grover','Irish Growler'=>'Irish Growler','Istok Web'=>'Istok Web','Jockey One'=>'Jockey One','Josefin Sans'=>'Josefin Sans','Josefin Slab'=>'Josefin Slab','Judson'=>'Judson','Julee'=>'Julee','Jura'=>'Jura','Just Another Hand'=>'Just Another Hand','Just Me Again Down Here'=>'Just Me Again Down Here','Kameron'=>'Kameron','Kelly Slab'=>'Kelly Slab','Kenia'=>'Kenia','Kranky'=>'Kranky','Kreon'=>'Kreon','Kristi'=>'Kristi','La Belle Aurore'=>'La Belle Aurore','Lato'=>'Lato','League Script'=>'League Script','Leckerli One'=>'Leckerli One','Lekton'=>'Lekton','Limelight'=>'Limelight','Linden Hill'=>'Linden Hill','Lobster'=>'Lobster','Lobster Two'=>'Lobster Two','Lora'=>'Lora','Love Ya Like A Sister'=>'Love Ya Like A Sister','Loved by the King'=>'Loved by the King','Luckiest Guy'=>'LuckiestGuy','Maiden Orange'=>'Maiden Orange');

$font_style = array('normal'=>'Normal','italic'=>'Italic');

	/* typography settings */
	$wp_customize->add_panel( 'typography_settings', array(
		'priority'       => 132,
		'capability'     => 'edit_theme_options',
		'title'      => __('Typography Settings', 'sis_spa'),
	) );
	
		/* h1 settings */
		$wp_customize->add_section( 'h1_settings' , array(
			'title'      => __('H1 heading', 'sis_spa'),
			'panel'  => 'typography_settings'
		) );
			
			// h1 family
			$wp_customize->add_setting( 'spa_theme_options[h1_fontfamily]' , array(
			'default'    => 'Roboto',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[h1_fontfamily]' , array(
			'label' => __('H1 Font Family','sis_spa'),
			'section' => 'h1_settings',
			'type'=>'select',
			'choices'=> $font_family,
			) );
			
			// h1 size
			$wp_customize->add_setting( 'spa_theme_options[h1_size]' , array(
			'default'    => 36,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[h1_size]' , array(
			'label' => __('H1 Font Size','sis_spa'),
			'section' => 'h1_settings',
			'type'=>'select',
			'choices'=> $font_size,
			) );
			
			// h1 style
			$wp_customize->add_setting( 'spa_theme_options[h1_fontstyle]' , array(
			'default'    => 'normal',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[h1_fontstyle]' , array(
			'label' => __('H1 Font Style','sis_spa'),
			'section' => 'h1_settings',
			'type'=>'select',
			'choices'=> $font_style,
			) );
			
		/* h2 settings */
		$wp_customize->add_section( 'h2_settings' , array(
			'title'      => __('H2 heading', 'sis_spa'),
			'panel'  => 'typography_settings'
		) );
			
			// h2 family
			$wp_customize->add_setting( 'spa_theme_options[h2_fontfamily]' , array(
			'default'    => 'Roboto',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[h2_fontfamily]' , array(
			'label' => __('H2 Font Family','sis_spa'),
			'section' => 'h2_settings',
			'type'=>'select',
			'choices'=> $font_family,
			) );
			
			// h2 size
			$wp_customize->add_setting( 'spa_theme_options[h2_size]' , array(
			'default'    => 30,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[h2_size]' , array(
			'label' => __('H2 Font Size','sis_spa'),
			'section' => 'h2_settings',
			'type'=>'select',
			'choices'=> $font_size,
			) );
			
			// h2 style
			$wp_customize->add_setting( 'spa_theme_options[h2_fontstyle]' , array(
			'default'    => 'normal',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[h2_fontstyle]' , array(
			'label' => __('H2 Font Style','sis_spa'),
			'section' => 'h2_settings',
			'type'=>'select',
			'choices'=> $font_style,
			) );
			
		/* h3 settings */
		$wp_customize->add_section( 'h3_settings' , array(
			'title'      => __('H3 heading', 'sis_spa'),
			'panel'  => 'typography_settings'
		) );
			
			// h3 family
			$wp_customize->add_setting( 'spa_theme_options[h3_fontfamily]' , array(
			'default'    => 'Roboto',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[h3_fontfamily]' , array(
			'label' => __('H3 Font Family','sis_spa'),
			'section' => 'h3_settings',
			'type'=>'select',
			'choices'=> $font_family,
			) );
			
			// h3 size
			$wp_customize->add_setting( 'spa_theme_options[h3_size]' , array(
			'default'    => 24,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[h3_size]' , array(
			'label' => __('H3 Font Size','sis_spa'),
			'section' => 'h3_settings',
			'type'=>'select',
			'choices'=> $font_size,
			) );
			
			// h3 style
			$wp_customize->add_setting( 'spa_theme_options[h3_fontstyle]' , array(
			'default'    => 'normal',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[h3_fontstyle]' , array(
			'label' => __('H3 Font Style','sis_spa'),
			'section' => 'h3_settings',
			'type'=>'select',
			'choices'=> $font_style,
			) );
			
		/* h4 settings */
		$wp_customize->add_section( 'h4_settings' , array(
			'title'      => __('H4 heading', 'sis_spa'),
			'panel'  => 'typography_settings'
		) );
			
			// h4 family
			$wp_customize->add_setting( 'spa_theme_options[h4_fontfamily]' , array(
			'default'    => 'Roboto',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[h4_fontfamily]' , array(
			'label' => __('H4 Font Family','sis_spa'),
			'section' => 'h4_settings',
			'type'=>'select',
			'choices'=> $font_family,
			) );
			
			// h4 size
			$wp_customize->add_setting( 'spa_theme_options[h4_size]' , array(
			'default'    => 18,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[h4_size]' , array(
			'label' => __('H4 Font Size','sis_spa'),
			'section' => 'h4_settings',
			'type'=>'select',
			'choices'=> $font_size,
			) );
			
			// h4 style
			$wp_customize->add_setting( 'spa_theme_options[h4_fontstyle]' , array(
			'default'    => 'normal',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[h4_fontstyle]' , array(
			'label' => __('H4 Font Style','sis_spa'),
			'section' => 'h4_settings',
			'type'=>'select',
			'choices'=> $font_style,
			) );
			
		/* h5 settings */
		$wp_customize->add_section( 'h5_settings' , array(
			'title'      => __('H5 heading', 'sis_spa'),
			'panel'  => 'typography_settings'
		) );
			
			// h5 family
			$wp_customize->add_setting( 'spa_theme_options[h5_fontfamily]' , array(
			'default'    => 'Roboto',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[h5_fontfamily]' , array(
			'label' => __('H5 Font Family','sis_spa'),
			'section' => 'h5_settings',
			'type'=>'select',
			'choices'=> $font_family,
			) );
			
			// h5 size
			$wp_customize->add_setting( 'spa_theme_options[h5_size]' , array(
			'default'    => 14,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[h5_size]' , array(
			'label' => __('H5 Font Size','sis_spa'),
			'section' => 'h5_settings',
			'type'=>'select',
			'choices'=> $font_size,
			) );
			
			// h5 style
			$wp_customize->add_setting( 'spa_theme_options[h5_fontstyle]' , array(
			'default'    => 'normal',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[h5_fontstyle]' , array(
			'label' => __('H5 Font Style','sis_spa'),
			'section' => 'h5_settings',
			'type'=>'select',
			'choices'=> $font_style,
			) );
			
		/* h6 settings */
		$wp_customize->add_section( 'h6_settings' , array(
			'title'      => __('H6 heading', 'sis_spa'),
			'panel'  => 'typography_settings'
		) );
			
			// h5 family
			$wp_customize->add_setting( 'spa_theme_options[h6_fontfamily]' , array(
			'default'    => 'Roboto',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[h6_fontfamily]' , array(
			'label' => __('H6 Font Family','sis_spa'),
			'section' => 'h6_settings',
			'type'=>'select',
			'choices'=> $font_family,
			) );
			
			// h6 size
			$wp_customize->add_setting( 'spa_theme_options[h6_size]' , array(
			'default'    => 12,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[h6_size]' , array(
			'label' => __('H6 Font Size','sis_spa'),
			'section' => 'h6_settings',
			'type'=>'select',
			'choices'=> $font_size,
			) );
			
			// h6 style
			$wp_customize->add_setting( 'spa_theme_options[h6_fontstyle]' , array(
			'default'    => 'normal',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[h6_fontstyle]' , array(
			'label' => __('H6 Font Style','sis_spa'),
			'section' => 'h6_settings',
			'type'=>'select',
			'choices'=> $font_style,
			) );
			
		/* home page section title */
		$wp_customize->add_section( 'home_section_title' , array(
			'title'      => __('Home Page Sections Title', 'sis_spa'),
			'panel'  => 'typography_settings'
		) );
	
			// home page title
			$wp_customize->add_setting( 'spa_theme_options[home_section_title_fontfamily]' , array(
			'default'    => 'MarketingScript',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[home_section_title_fontfamily]' , array(
			'label' => __('Section Title Font Family','sis_spa'),
			'section' => 'home_section_title',
			'type'=>'select',
			'choices'=> $font_family,
			) );
			
			// home page title size
			$wp_customize->add_setting( 'spa_theme_options[home_section_title_fontsize]' , array(
			'default'    => 42,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[home_section_title_fontsize]' , array(
			'label' => __('Section Title Font Size','sis_spa'),
			'section' => 'home_section_title',
			'type'=>'select',
			'choices'=> $font_size,
			) );
			
			// home page title style
			$wp_customize->add_setting( 'spa_theme_options[home_section_title_fontstyle]' , array(
			'default'    => 'normal',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[home_section_title_fontstyle]' , array(
			'label' => __('Section Title Font Style','sis_spa'),
			'section' => 'home_section_title',
			'type'=>'select',
			'choices'=> $font_style,
			) );
			
		/* home page desc section  */
		$wp_customize->add_section( 'home_section_desc' , array(
			'title'      => __('Home Page description Settings', 'sis_spa'),
			'panel'  => 'typography_settings'
		) );
			
			// home page desc
			$wp_customize->add_setting( 'spa_theme_options[home_section_desc_fontfamily]' , array(
			'default'    => 'Droid Serif',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[home_section_desc_fontfamily]' , array(
			'label' => __('Section Description Font Family','sis_spa'),
			'section' => 'home_section_desc',
			'type'=>'select',
			'choices'=> $font_family,
			) );
			
			//home page desc size
			$wp_customize->add_setting( 'spa_theme_options[home_section_desc_fontsize]' , array(
			'default'    => 16,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[home_section_desc_fontsize]' , array(
			'label' => __('Section Description Font Size','sis_spa'),
			'section' => 'home_section_desc',
			'type'=>'select',
			'choices'=> $font_size,
			) );
			
			// home page desc style
			$wp_customize->add_setting( 'spa_theme_options[home_section_desc_fontstyle]' , array(
			'default'    => 'normal',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[home_section_desc_fontstyle]' , array(
			'label' => __('Section Description Font Style','sis_spa'),
			'section' => 'home_section_desc',
			'type'=>'select',
			'choices'=> $font_style,
			) );
			
		/* menu section title */
		$wp_customize->add_section( 'menu_section_title' , array(
			'title'      => __('Menu Title Settings', 'sis_spa'),
			'panel'  => 'typography_settings'
		) );
			
			// menu title
			$wp_customize->add_setting( 'spa_theme_options[menu_title_fontfamily]' , array(
			'default'    => 'Raleway',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[menu_title_fontfamily]' , array(
			'label' => __('Menu Title Font Family','sis_spa'),
			'section' => 'menu_section_title',
			'type'=>'select',
			'choices'=> $font_family,
			) );
			
			// menu title size
			$wp_customize->add_setting( 'spa_theme_options[menu_title_fontsize]' , array(
			'default'    => 15,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[menu_title_fontsize]' , array(
			'label' => __('Menu Title Font Size','sis_spa'),
			'section' => 'menu_section_title',
			'type'=>'select',
			'choices'=> $font_size,
			) );
			
			// menu title style
			$wp_customize->add_setting( 'spa_theme_options[menu_title_fontstyle]' , array(
			'default'    => 'normal',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[menu_title_fontstyle]' , array(
			'label' => __('Menu Title Font Style','sis_spa'),
			'section' => 'menu_section_title',
			'type'=>'select',
			'choices'=> $font_style,
			) );
			
		/* post section title */
		$wp_customize->add_section( 'post_section_title' , array(
			'title'      => __('Post / Page Title Settings', 'sis_spa'),
			'panel'  => 'typography_settings'
		) );
			
			// post title
			$wp_customize->add_setting( 'spa_theme_options[post_title_fontfamily]' , array(
			'default'    => 'Roboto',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[post_title_fontfamily]' , array(
			'label' => __('Post Title Font Family','sis_spa'),
			'section' => 'post_section_title',
			'type'=>'select',
			'choices'=> $font_family,
			) );
			
			// post title size
			$wp_customize->add_setting( 'spa_theme_options[post_title_fontsize]' , array(
			'default'    => 18,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[post_title_fontsize]' , array(
			'label' => __('Post Title Font Size','sis_spa'),
			'section' => 'post_section_title',
			'type'=>'select',
			'choices'=> $font_size,
			) );
			
			// post title style
			$wp_customize->add_setting( 'spa_theme_options[post_title_fontstyle]' , array(
			'default'    => 'normal',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[post_title_fontstyle]' , array(
			'label' => __('Post Title Font Style','sis_spa'),
			'section' => 'post_section_title',
			'type'=>'select',
			'choices'=> $font_style,
			) );
			
		/* postcontent section title */
		$wp_customize->add_section( 'postcontent_section_title' , array(
			'title'      => __('Site Contents Settings', 'sis_spa'),
			'panel'  => 'typography_settings'
		) );
			
			// postcontent title
			$wp_customize->add_setting( 'spa_theme_options[postexcerpt_fontfamily]' , array(
			'default'    => 'Roboto',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[postexcerpt_fontfamily]' , array(
			'label' => __('Post Excerpt Font Family','sis_spa'),
			'section' => 'postcontent_section_title',
			'type'=>'select',
			'choices'=> $font_family,
			) );
			
			// postcontent title size
			$wp_customize->add_setting( 'spa_theme_options[postexcerpt_title_fontsize]' , array(
			'default'    => 15,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[postexcerpt_title_fontsize]' , array(
			'label' => __('Post Excerpt Font Size','sis_spa'),
			'section' => 'postcontent_section_title',
			'type'=>'select',
			'choices'=> $font_size,
			) );
			
			// postcontent title style
			$wp_customize->add_setting( 'spa_theme_options[postexcerpt_fontstyle]' , array(
			'default'    => 'normal',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[postexcerpt_fontstyle]' , array(
			'label' => __('Post Excerpt Font Style','sis_spa'),
			'section' => 'postcontent_section_title',
			'type'=>'select',
			'choices'=> $font_style,
			) );
			
		/* widget section title */
		$wp_customize->add_section( 'widget_section_title' , array(
			'title'      => __('Widget Title Settings', 'sis_spa'),
			'panel'  => 'typography_settings'
		) );
			
			// widget title
			$wp_customize->add_setting( 'spa_theme_options[widget_title_fontfamily]' , array(
			'default'    => 'Roboto',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[widget_title_fontfamily]' , array(
			'label' => __('Widget Title Font Family','sis_spa'),
			'section' => 'widget_section_title',
			'type'=>'select',
			'choices'=> $font_family,
			) );
			
			// widget title size
			$wp_customize->add_setting( 'spa_theme_options[widget_title_fontsize]' , array(
			'default'    => 18,
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[widget_title_fontsize]' , array(
			'label' => __('Widget Title Font Size','sis_spa'),
			'section' => 'widget_section_title',
			'type'=>'select',
			'choices'=> $font_size,
			) );
			
			// widget title style
			$wp_customize->add_setting( 'spa_theme_options[widget_title_fontstyle]' , array(
			'default'    => 'normal',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			));

			$wp_customize->add_control( 'spa_theme_options[widget_title_fontstyle]' , array(
			'label' => __('Widget Title Font Style','sis_spa'),
			'section' => 'widget_section_title',
			'type'=>'select',
			'choices'=> $font_style,
			) );
	
}
add_action( 'customize_register', 'spasalon_typography_settings_customizer' );
