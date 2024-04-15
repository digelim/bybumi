<?php
/**
 * our-island functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package our-island
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

// require_once( dirname( __FILE__ ) . '/inc/class-tmg-plugin-activation.php' );

/**
 * Check for WP_Customizer_Control existence before adding custom control because WP_Customize_Control
 * is loaded on customizer page only
 *
 * @see _wp_customize_include()
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	require_once  dirname( __FILE__ ) . '/inc/class-customizer-range-value-control/class-customizer-range-value-control.php';
}

if ( ! function_exists('wsl_activate')){
//require_once  dirname( __FILE__ ) . '/inc/wordpress-social-login/wp-social-login.php';
}
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function our_island_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on our-island, use a find and replace
		* to change 'our-island' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'our-island', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'our-island' ),
			'menu-2' => esc_html__( 'Secondary', 'our-island' ),
			'menu-3' => esc_html__( 'Tertiary', 'our-island' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'flex-width'  => false,
			'flex-height' => false,
		)
	);

	add_theme_support( 'disable-custom-colors' );
	
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => esc_html__( 'Button', 'twentytwentyone' ),
				'slug'  => 'color',
				'color' => get_option('color', '#561F18'),
			
			),
			array(
				'name'  => esc_html__( 'Hover', 'twentytwentyone' ),
				'slug'  => 'hover_color',
				'color' => get_option('hover_color', '#000000'),
			
			),
			array(
				'name'  => esc_html__( 'Info', 'twentytwentyone' ),
				'slug'  => 'info_color',
				'color' => get_option('info_color', '#bdfcfd'),
			
			),
			array(
				'name'  => esc_html__( 'Warning', 'twentytwentyone' ),
				'slug'  => 'warning_color',
				'color' => get_option('warning_color', '#ffff00'),
			
			),
			array(
				'name'  => esc_html__( 'Success', 'twentytwentyone' ),
				'slug'  => 'success_color',
				'color' => get_option('success_color', '#bdfdbd'),
			
			),
			array(
				'name'  => esc_html__( 'Error', 'twentytwentyone' ),
				'slug'  => 'error_color',
				'color' => get_option('error_color', '#561F18'),
			
			),
			array(
				'name'  => esc_html__( 'Gray-50', 'twentytwentyone' ),
				'slug'  => 'gray-50',
				'color' => '#f9fafb',
			
			),
			array(
				'name'  => esc_html__( 'Gray-100', 'twentytwentyone' ),
				'slug'  => 'gray-100',
				'color' => '#f3f4f6',
			
			),
			array(
				'name'  => esc_html__( 'Gray-200', 'twentytwentyone' ),
				'slug'  => 'gray-200',
				'color' => '#e5e7eb',
			
			),
			array(
				'name'  => esc_html__( 'Gray-300', 'twentytwentyone' ),
				'slug'  => 'gray-300',
				'color' => '#d1d5db',
			
			),
			array(
				'name'  => esc_html__( 'Gray-400', 'twentytwentyone' ),
				'slug'  => 'gray-400',
				'color' => '#9ca3af',
			
			),
			array(
				'name'  => esc_html__( 'Gray-500', 'twentytwentyone' ),
				'slug'  => 'gray-500',
				'color' => '#6b7280',
			
			),
			array(
				'name'  => esc_html__( 'Gray-600', 'twentytwentyone' ),
				'slug'  => 'gray-600',
				'color' => '#4b5563',
			
			),
			array(
				'name'  => esc_html__( 'Gray-700', 'twentytwentyone' ),
				'slug'  => 'gray-700',
				'color' => '#374151',
			
			),
			array(
				'name'  => esc_html__( 'Gray-800', 'twentytwentyone' ),
				'slug'  => 'gray-800',
				'color' => '#1f2937',
			
			),
			array(
				'name'  => esc_html__( 'Gray-900', 'twentytwentyone' ),
				'slug'  => 'gray-900',
				'color' => '#111827',
			
			),

		),
	);	
	
}

function mytheme_customize_register( $wp_customize ) {
	$wp_customize->add_setting( 'color', array(
		'capability'        => 'edit_theme_options',
		'default'           => '#561F18',
		'type' => 'option',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_c',
		array(
			'label'    => __( 'Button Color', 'text-domain' ),
			'section'  => 'colors',
			'settings' => 'color',
		)
	));

	$wp_customize->add_setting( 'hover_color', array(
		'capability'        => 'edit_theme_options',
		'default'           => '#000000',
		'type' => 'option',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_h',
		array(
			'label'    => __( 'Hover Color', 'text-domain' ),
			'section'  => 'colors',
			'settings' => 'hover_color',
		)
	));

	$wp_customize->add_setting( 'warning_color', array(
		'capability'        => 'edit_theme_options',
		'default'           => '#ffff00',
		'type' => 'option',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_d',
		array(
			'label'    => __( 'Warning Color', 'text-domain' ),
			'section'  => 'colors',
			'settings' => 'warning_color',
		)
	));
    
    $wp_customize->add_setting( 'success_color', array(
        'capability'        => 'edit_theme_options',
        'default'           => '#bdfdbd',
        'type' => 'option',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_s',
        array(
            'label'    => __( 'Success Color', 'text-domain' ),
            'section'  => 'colors',
            'settings' => 'success_color',
        )
    ));
    
    $wp_customize->add_setting( 'info_color', array(
        'capability'        => 'edit_theme_options',
        'default'           => '#bdfcfd',
        'type' => 'option',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_i',
        array(
            'label'    => __( 'Info Color', 'text-domain' ),
            'section'  => 'colors',
            'settings' => 'info_color',
        )
    ));
    
    $wp_customize->add_setting( 'error_color', array(
        'capability'        => 'edit_theme_options',
        'default'           => '#561F18',
        'type' => 'option',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_e',
        array(
            'label'    => __( 'Error Color', 'text-domain' ),
            'section'  => 'colors',
            'settings' => 'error_color',
        )
    ));

	$wp_customize->add_setting( 'logo_height', array(
		'capability'        => 'edit_theme_options',
		'default'           => '',
	) );

	$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'logo__c', array(
	'type'     => 'range-value',
	'section'  => 'title_tagline',
	'settings' => 'logo_height',
	'label'    => __( 'Height' ),
	'input_attrs' => array(
		'min'    => 2,
		'max'    => 240,
		'step'   => 2,
		'suffix' => 'px'
  	),
) ) );

	$wp_customize->add_section('fonts' , array(
		'title'     => __('Fonts', 'theme'),
		'priority'  => 1020
	));

	$wp_customize->add_setting('font_family', array(
		'type' => 'option',
		'default' => 'Noto Sans'
	));

	$choices = array (
		'ABeeZee' => 'ABeeZee',
		'Abel' => 'Abel',
		'Abhaya Libre' => 'Abhaya Libre',
		'Aboreto' => 'Aboreto',
		'Abril Fatface' => 'Abril Fatface',
		'Abyssinica SIL' => 'Abyssinica SIL',
		'Aclonica' => 'Aclonica',
		'Acme' => 'Acme',
		'Actor' => 'Actor',
		'Adamina' => 'Adamina',
		'Advent Pro' => 'Advent Pro',
		'Aguafina Script' => 'Aguafina Script',
		'Akaya Kanadaka' => 'Akaya Kanadaka',
		'Akaya Telivigala' => 'Akaya Telivigala',
		'Akronim' => 'Akronim',
		'Akshar' => 'Akshar',
		'Aladin' => 'Aladin',
		'Alata' => 'Alata',
		'Alatsi' => 'Alatsi',
		'Albert Sans' => 'Albert Sans',
		'Aldrich' => 'Aldrich',
		'Alef' => 'Alef',
		'Alegreya' => 'Alegreya',
		'Alegreya SC' => 'Alegreya SC',
		'Alegreya Sans' => 'Alegreya Sans',
		'Alegreya Sans SC' => 'Alegreya Sans SC',
		'Aleo' => 'Aleo',
		'Alex Brush' => 'Alex Brush',
		'Alexandria' => 'Alexandria',
		'Alfa Slab One' => 'Alfa Slab One',
		'Alice' => 'Alice',
		'Alike' => 'Alike',
		'Alike Angular' => 'Alike Angular',
		'Alkalami' => 'Alkalami',
		'Allan' => 'Allan',
		'Allerta' => 'Allerta',
		'Allerta Stencil' => 'Allerta Stencil',
		'Allison' => 'Allison',
		'Allura' => 'Allura',
		'Almarai' => 'Almarai',
		'Almendra' => 'Almendra',
		'Almendra Display' => 'Almendra Display',
		'Almendra SC' => 'Almendra SC',
		'Alumni Sans' => 'Alumni Sans',
		'Alumni Sans Collegiate One' => 'Alumni Sans Collegiate One',
		'Alumni Sans Inline One' => 'Alumni Sans Inline One',
		'Alumni Sans Pinstripe' => 'Alumni Sans Pinstripe',
		'Amarante' => 'Amarante',
		'Amaranth' => 'Amaranth',
		'Amatic SC' => 'Amatic SC',
		'Amethysta' => 'Amethysta',
		'Amiko' => 'Amiko',
		'Amiri' => 'Amiri',
		'Amiri Quran' => 'Amiri Quran',
		'Amita' => 'Amita',
		'Anaheim' => 'Anaheim',
		'Andada Pro' => 'Andada Pro',
		'Andika' => 'Andika',
		'Anek Bangla' => 'Anek Bangla',
		'Anek Devanagari' => 'Anek Devanagari',
		'Anek Gujarati' => 'Anek Gujarati',
		'Anek Gurmukhi' => 'Anek Gurmukhi',
		'Anek Kannada' => 'Anek Kannada',
		'Anek Latin' => 'Anek Latin',
		'Anek Malayalam' => 'Anek Malayalam',
		'Anek Odia' => 'Anek Odia',
		'Anek Tamil' => 'Anek Tamil',
		'Anek Telugu' => 'Anek Telugu',
		'Angkor' => 'Angkor',
		'Annie Use Your Telescope' => 'Annie Use Your Telescope',
		'Anonymous Pro' => 'Anonymous Pro',
		'Antic' => 'Antic',
		'Antic Didone' => 'Antic Didone',
		'Antic Slab' => 'Antic Slab',
		'Anton' => 'Anton',
		'Antonio' => 'Antonio',
		'Anybody' => 'Anybody',
		'Arapey' => 'Arapey',
		'Arbutus' => 'Arbutus',
		'Arbutus Slab' => 'Arbutus Slab',
		'Architects Daughter' => 'Architects Daughter',
		'Archivo' => 'Archivo',
		'Archivo Black' => 'Archivo Black',
		'Archivo Narrow' => 'Archivo Narrow',
		'Are You Serious' => 'Are You Serious',
		'Aref Ruqaa' => 'Aref Ruqaa',
		'Aref Ruqaa Ink' => 'Aref Ruqaa Ink',
		'Arima' => 'Arima',
		'Arima Madurai' => 'Arima Madurai',
		'Arimo' => 'Arimo',
		'Arizonia' => 'Arizonia',
		'Armata' => 'Armata',
		'Arsenal' => 'Arsenal',
		'Artifika' => 'Artifika',
		'Arvo' => 'Arvo',
		'Arya' => 'Arya',
		'Asap' => 'Asap',
		'Asap Condensed' => 'Asap Condensed',
		'Asar' => 'Asar',
		'Asset' => 'Asset',
		'Assistant' => 'Assistant',
		'Astloch' => 'Astloch',
		'Asul' => 'Asul',
		'Athiti' => 'Athiti',
		'Atkinson Hyperlegible' => 'Atkinson Hyperlegible',
		'Atma' => 'Atma',
		'Atomic Age' => 'Atomic Age',
		'Aubrey' => 'Aubrey',
		'Audiowide' => 'Audiowide',
		'Autour One' => 'Autour One',
		'Average' => 'Average',
		'Average Sans' => 'Average Sans',
		'Averia Gruesa Libre' => 'Averia Gruesa Libre',
		'Averia Libre' => 'Averia Libre',
		'Averia Sans Libre' => 'Averia Sans Libre',
		'Averia Serif Libre' => 'Averia Serif Libre',
		'Azeret Mono' => 'Azeret Mono',
		'B612' => 'B612',
		'B612 Mono' => 'B612 Mono',
		'BIZ UDGothic' => 'BIZ UDGothic',
		'BIZ UDMincho' => 'BIZ UDMincho',
		'BIZ UDPGothic' => 'BIZ UDPGothic',
		'BIZ UDPMincho' => 'BIZ UDPMincho',
		'Babylonica' => 'Babylonica',
		'Bad Script' => 'Bad Script',
		'Bahiana' => 'Bahiana',
		'Bahianita' => 'Bahianita',
		'Bai Jamjuree' => 'Bai Jamjuree',
		'Bakbak One' => 'Bakbak One',
		'Ballet' => 'Ballet',
		'Baloo 2' => 'Baloo 2',
		'Baloo Bhai 2' => 'Baloo Bhai 2',
		'Baloo Bhaijaan 2' => 'Baloo Bhaijaan 2',
		'Baloo Bhaina 2' => 'Baloo Bhaina 2',
		'Baloo Chettan 2' => 'Baloo Chettan 2',
		'Baloo Da 2' => 'Baloo Da 2',
		'Baloo Paaji 2' => 'Baloo Paaji 2',
		'Baloo Tamma 2' => 'Baloo Tamma 2',
		'Baloo Tammudu 2' => 'Baloo Tammudu 2',
		'Baloo Thambi 2' => 'Baloo Thambi 2',
		'Balsamiq Sans' => 'Balsamiq Sans',
		'Balthazar' => 'Balthazar',
		'Bangers' => 'Bangers',
		'Barlow' => 'Barlow',
		'Barlow Condensed' => 'Barlow Condensed',
		'Barlow Semi Condensed' => 'Barlow Semi Condensed',
		'Barriecito' => 'Barriecito',
		'Barrio' => 'Barrio',
		'Basic' => 'Basic',
		'Baskervville' => 'Baskervville',
		'Battambang' => 'Battambang',
		'Baumans' => 'Baumans',
		'Bayon' => 'Bayon',
		'Be Vietnam Pro' => 'Be Vietnam Pro',
		'Beau Rivage' => 'Beau Rivage',
		'Bebas Neue' => 'Bebas Neue',
		'Belgrano' => 'Belgrano',
		'Bellefair' => 'Bellefair',
		'Belleza' => 'Belleza',
		'Bellota' => 'Bellota',
		'Bellota Text' => 'Bellota Text',
		'BenchNine' => 'BenchNine',
		'Benne' => 'Benne',
		'Bentham' => 'Bentham',
		'Berkshire Swash' => 'Berkshire Swash',
		'Besley' => 'Besley',
		'Beth Ellen' => 'Beth Ellen',
		'Bevan' => 'Bevan',
		'BhuTuka Expanded One' => 'BhuTuka Expanded One',
		'Big Shoulders Display' => 'Big Shoulders Display',
		'Big Shoulders Inline Display' => 'Big Shoulders Inline Display',
		'Big Shoulders Inline Text' => 'Big Shoulders Inline Text',
		'Big Shoulders Stencil Display' => 'Big Shoulders Stencil Display',
		'Big Shoulders Stencil Text' => 'Big Shoulders Stencil Text',
		'Big Shoulders Text' => 'Big Shoulders Text',
		'Bigelow Rules' => 'Bigelow Rules',
		'Bigshot One' => 'Bigshot One',
		'Bilbo' => 'Bilbo',
		'Bilbo Swash Caps' => 'Bilbo Swash Caps',
		'BioRhyme' => 'BioRhyme',
		'BioRhyme Expanded' => 'BioRhyme Expanded',
		'Birthstone' => 'Birthstone',
		'Birthstone Bounce' => 'Birthstone Bounce',
		'Biryani' => 'Biryani',
		'Bitter' => 'Bitter',
		'Black And White Picture' => 'Black And White Picture',
		'Black Han Sans' => 'Black Han Sans',
		'Black Ops One' => 'Black Ops One',
		'Blaka' => 'Blaka',
		'Blaka Hollow' => 'Blaka Hollow',
		'Blaka Ink' => 'Blaka Ink',
		'Blinker' => 'Blinker',
		'Bodoni Moda' => 'Bodoni Moda',
		'Bokor' => 'Bokor',
		'Bona Nova' => 'Bona Nova',
		'Bonbon' => 'Bonbon',
		'Bonheur Royale' => 'Bonheur Royale',
		'Boogaloo' => 'Boogaloo',
		'Bowlby One' => 'Bowlby One',
		'Bowlby One SC' => 'Bowlby One SC',
		'Brawler' => 'Brawler',
		'Bree Serif' => 'Bree Serif',
		'Brygada 1918' => 'Brygada 1918',
		'Bubblegum Sans' => 'Bubblegum Sans',
		'Bubbler One' => 'Bubbler One',
		'Buda' => 'Buda',
		'Buenard' => 'Buenard',
		'Bungee' => 'Bungee',
		'Bungee Hairline' => 'Bungee Hairline',
		'Bungee Inline' => 'Bungee Inline',
		'Bungee Outline' => 'Bungee Outline',
		'Bungee Shade' => 'Bungee Shade',
		'Bungee Spice' => 'Bungee Spice',
		'Butcherman' => 'Butcherman',
		'Butterfly Kids' => 'Butterfly Kids',
		'Cabin' => 'Cabin',
		'Cabin Condensed' => 'Cabin Condensed',
		'Cabin Sketch' => 'Cabin Sketch',
		'Caesar Dressing' => 'Caesar Dressing',
		'Cagliostro' => 'Cagliostro',
		'Cairo' => 'Cairo',
		'Cairo Play' => 'Cairo Play',
		'Caladea' => 'Caladea',
		'Calistoga' => 'Calistoga',
		'Calligraffitti' => 'Calligraffitti',
		'Cambay' => 'Cambay',
		'Cambo' => 'Cambo',
		'Candal' => 'Candal',
		'Cantarell' => 'Cantarell',
		'Cantata One' => 'Cantata One',
		'Cantora One' => 'Cantora One',
		'Capriola' => 'Capriola',
		'Caramel' => 'Caramel',
		'Carattere' => 'Carattere',
		'Cardo' => 'Cardo',
		'Carme' => 'Carme',
		'Carrois Gothic' => 'Carrois Gothic',
		'Carrois Gothic SC' => 'Carrois Gothic SC',
		'Carter One' => 'Carter One',
		'Castoro' => 'Castoro',
		'Catamaran' => 'Catamaran',
		'Caudex' => 'Caudex',
		'Caveat' => 'Caveat',
		'Caveat Brush' => 'Caveat Brush',
		'Cedarville Cursive' => 'Cedarville Cursive',
		'Ceviche One' => 'Ceviche One',
		'Chakra Petch' => 'Chakra Petch',
		'Changa' => 'Changa',
		'Changa One' => 'Changa One',
		'Chango' => 'Chango',
		'Charis SIL' => 'Charis SIL',
		'Charm' => 'Charm',
		'Charmonman' => 'Charmonman',
		'Chathura' => 'Chathura',
		'Chau Philomene One' => 'Chau Philomene One',
		'Chela One' => 'Chela One',
		'Chelsea Market' => 'Chelsea Market',
		'Chenla' => 'Chenla',
		'Cherish' => 'Cherish',
		'Cherry Cream Soda' => 'Cherry Cream Soda',
		'Cherry Swash' => 'Cherry Swash',
		'Chewy' => 'Chewy',
		'Chicle' => 'Chicle',
		'Chilanka' => 'Chilanka',
		'Chivo' => 'Chivo',
		'Chivo Mono' => 'Chivo Mono',
		'Chonburi' => 'Chonburi',
		'Cinzel' => 'Cinzel',
		'Cinzel Decorative' => 'Cinzel Decorative',
		'Clicker Script' => 'Clicker Script',
		'Coda' => 'Coda',
		'Coda Caption' => 'Coda Caption',
		'Codystar' => 'Codystar',
		'Coiny' => 'Coiny',
		'Combo' => 'Combo',
		'Comfortaa' => 'Comfortaa',
		'Comforter' => 'Comforter',
		'Comforter Brush' => 'Comforter Brush',
		'Comic Neue' => 'Comic Neue',
		'Coming Soon' => 'Coming Soon',
		'Commissioner' => 'Commissioner',
		'Concert One' => 'Concert One',
		'Condiment' => 'Condiment',
		'Content' => 'Content',
		'Contrail One' => 'Contrail One',
		'Convergence' => 'Convergence',
		'Cookie' => 'Cookie',
		'Copse' => 'Copse',
		'Corben' => 'Corben',
		'Corinthia' => 'Corinthia',
		'Cormorant' => 'Cormorant',
		'Cormorant Garamond' => 'Cormorant Garamond',
		'Cormorant Infant' => 'Cormorant Infant',
		'Cormorant SC' => 'Cormorant SC',
		'Cormorant Unicase' => 'Cormorant Unicase',
		'Cormorant Upright' => 'Cormorant Upright',
		'Courgette' => 'Courgette',
		'Courier Prime' => 'Courier Prime',
		'Cousine' => 'Cousine',
		'Coustard' => 'Coustard',
		'Covered By Your Grace' => 'Covered By Your Grace',
		'Crafty Girls' => 'Crafty Girls',
		'Creepster' => 'Creepster',
		'Crete Round' => 'Crete Round',
		'Crimson Pro' => 'Crimson Pro',
		'Crimson Text' => 'Crimson Text',
		'Croissant One' => 'Croissant One',
		'Crushed' => 'Crushed',
		'Cuprum' => 'Cuprum',
		'Cute Font' => 'Cute Font',
		'Cutive' => 'Cutive',
		'Cutive Mono' => 'Cutive Mono',
		'DM Mono' => 'DM Mono',
		'DM Sans' => 'DM Sans',
		'DM Serif Display' => 'DM Serif Display',
		'DM Serif Text' => 'DM Serif Text',
		'Damion' => 'Damion',
		'Dancing Script' => 'Dancing Script',
		'Dangrek' => 'Dangrek',
		'Darker Grotesque' => 'Darker Grotesque',
		'David Libre' => 'David Libre',
		'Dawning of a New Day' => 'Dawning of a New Day',
		'Days One' => 'Days One',
		'Dekko' => 'Dekko',
		'Dela Gothic One' => 'Dela Gothic One',
		'Delius' => 'Delius',
		'Delius Swash Caps' => 'Delius Swash Caps',
		'Delius Unicase' => 'Delius Unicase',
		'Della Respira' => 'Della Respira',
		'Denk One' => 'Denk One',
		'Devonshire' => 'Devonshire',
		'Dhurjati' => 'Dhurjati',
		'Didact Gothic' => 'Didact Gothic',
		'Diplomata' => 'Diplomata',
		'Diplomata SC' => 'Diplomata SC',
		'Do Hyeon' => 'Do Hyeon',
		'Dokdo' => 'Dokdo',
		'Domine' => 'Domine',
		'Donegal One' => 'Donegal One',
		'Dongle' => 'Dongle',
		'Doppio One' => 'Doppio One',
		'Dorsa' => 'Dorsa',
		'Dosis' => 'Dosis',
		'DotGothic16' => 'DotGothic16',
		'Dr Sugiyama' => 'Dr Sugiyama',
		'Duru Sans' => 'Duru Sans',
		'DynaPuff' => 'DynaPuff',
		'Dynalight' => 'Dynalight',
		'EB Garamond' => 'EB Garamond',
		'Eagle Lake' => 'Eagle Lake',
		'East Sea Dokdo' => 'East Sea Dokdo',
		'Eater' => 'Eater',
		'Economica' => 'Economica',
		'Eczar' => 'Eczar',
		'Edu NSW ACT Foundation' => 'Edu NSW ACT Foundation',
		'Edu QLD Beginner' => 'Edu QLD Beginner',
		'Edu SA Beginner' => 'Edu SA Beginner',
		'Edu TAS Beginner' => 'Edu TAS Beginner',
		'Edu VIC WA NT Beginner' => 'Edu VIC WA NT Beginner',
		'El Messiri' => 'El Messiri',
		'Electrolize' => 'Electrolize',
		'Elsie' => 'Elsie',
		'Elsie Swash Caps' => 'Elsie Swash Caps',
		'Emblema One' => 'Emblema One',
		'Emilys Candy' => 'Emilys Candy',
		'Encode Sans' => 'Encode Sans',
		'Encode Sans Condensed' => 'Encode Sans Condensed',
		'Encode Sans Expanded' => 'Encode Sans Expanded',
		'Encode Sans SC' => 'Encode Sans SC',
		'Encode Sans Semi Condensed' => 'Encode Sans Semi Condensed',
		'Encode Sans Semi Expanded' => 'Encode Sans Semi Expanded',
		'Engagement' => 'Engagement',
		'Englebert' => 'Englebert',
		'Enriqueta' => 'Enriqueta',
		'Ephesis' => 'Ephesis',
		'Epilogue' => 'Epilogue',
		'Erica One' => 'Erica One',
		'Esteban' => 'Esteban',
		'Estonia' => 'Estonia',
		'Euphoria Script' => 'Euphoria Script',
		'Ewert' => 'Ewert',
		'Exo' => 'Exo',
		'Exo 2' => 'Exo 2',
		'Expletus Sans' => 'Expletus Sans',
		'Explora' => 'Explora',
		'Fahkwang' => 'Fahkwang',
		'Familjen Grotesk' => 'Familjen Grotesk',
		'Fanwood Text' => 'Fanwood Text',
		'Farro' => 'Farro',
		'Farsan' => 'Farsan',
		'Fascinate' => 'Fascinate',
		'Fascinate Inline' => 'Fascinate Inline',
		'Faster One' => 'Faster One',
		'Fasthand' => 'Fasthand',
		'Fauna One' => 'Fauna One',
		'Faustina' => 'Faustina',
		'Federant' => 'Federant',
		'Federo' => 'Federo',
		'Felipa' => 'Felipa',
		'Fenix' => 'Fenix',
		'Festive' => 'Festive',
		'Figtree' => 'Figtree',
		'Finger Paint' => 'Finger Paint',
		'Finlandica' => 'Finlandica',
		'Fira Code' => 'Fira Code',
		'Fira Mono' => 'Fira Mono',
		'Fira Sans' => 'Fira Sans',
		'Fira Sans Condensed' => 'Fira Sans Condensed',
		'Fira Sans Extra Condensed' => 'Fira Sans Extra Condensed',
		'Fjalla One' => 'Fjalla One',
		'Fjord One' => 'Fjord One',
		'Flamenco' => 'Flamenco',
		'Flavors' => 'Flavors',
		'Fleur De Leah' => 'Fleur De Leah',
		'Flow Block' => 'Flow Block',
		'Flow Circular' => 'Flow Circular',
		'Flow Rounded' => 'Flow Rounded',
		'Fondamento' => 'Fondamento',
		'Fontdiner Swanky' => 'Fontdiner Swanky',
		'Forum' => 'Forum',
		'Fragment Mono' => 'Fragment Mono',
		'Francois One' => 'Francois One',
		'Frank Ruhl Libre' => 'Frank Ruhl Libre',
		'Fraunces' => 'Fraunces',
		'Freckle Face' => 'Freckle Face',
		'Fredericka the Great' => 'Fredericka the Great',
		'Fredoka' => 'Fredoka',
		'Fredoka One' => 'Fredoka One',
		'Freehand' => 'Freehand',
		'Fresca' => 'Fresca',
		'Frijole' => 'Frijole',
		'Fruktur' => 'Fruktur',
		'Fugaz One' => 'Fugaz One',
		'Fuggles' => 'Fuggles',
		'Fuzzy Bubbles' => 'Fuzzy Bubbles',
		'GFS Didot' => 'GFS Didot',
		'GFS Neohellenic' => 'GFS Neohellenic',
		'Gabriela' => 'Gabriela',
		'Gaegu' => 'Gaegu',
		'Gafata' => 'Gafata',
		'Galada' => 'Galada',
		'Galdeano' => 'Galdeano',
		'Galindo' => 'Galindo',
		'Gamja Flower' => 'Gamja Flower',
		'Gantari' => 'Gantari',
		'Gayathri' => 'Gayathri',
		'Gelasio' => 'Gelasio',
		'Gemunu Libre' => 'Gemunu Libre',
		'Genos' => 'Genos',
		'Gentium Book Basic' => 'Gentium Book Basic',
		'Gentium Book Plus' => 'Gentium Book Plus',
		'Gentium Plus' => 'Gentium Plus',
		'Geo' => 'Geo',
		'Georama' => 'Georama',
		'Geostar' => 'Geostar',
		'Geostar Fill' => 'Geostar Fill',
		'Germania One' => 'Germania One',
		'Gideon Roman' => 'Gideon Roman',
		'Gidugu' => 'Gidugu',
		'Gilda Display' => 'Gilda Display',
		'Girassol' => 'Girassol',
		'Give You Glory' => 'Give You Glory',
		'Glass Antiqua' => 'Glass Antiqua',
		'Glegoo' => 'Glegoo',
		'Gloria Hallelujah' => 'Gloria Hallelujah',
		'Glory' => 'Glory',
		'Gluten' => 'Gluten',
		'Goblin One' => 'Goblin One',
		'Gochi Hand' => 'Gochi Hand',
		'Goldman' => 'Goldman',
		'Gorditas' => 'Gorditas',
		'Gothic A1' => 'Gothic A1',
		'Gotu' => 'Gotu',
		'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
		'Gowun Batang' => 'Gowun Batang',
		'Gowun Dodum' => 'Gowun Dodum',
		'Graduate' => 'Graduate',
		'Grand Hotel' => 'Grand Hotel',
		'Grandstander' => 'Grandstander',
		'Grape Nuts' => 'Grape Nuts',
		'Gravitas One' => 'Gravitas One',
		'Great Vibes' => 'Great Vibes',
		'Grechen Fuemen' => 'Grechen Fuemen',
		'Grenze' => 'Grenze',
		'Grenze Gotisch' => 'Grenze Gotisch',
		'Grey Qo' => 'Grey Qo',
		'Griffy' => 'Griffy',
		'Gruppo' => 'Gruppo',
		'Gudea' => 'Gudea',
		'Gugi' => 'Gugi',
		'Gulzar' => 'Gulzar',
		'Gupter' => 'Gupter',
		'Gurajada' => 'Gurajada',
		'Gwendolyn' => 'Gwendolyn',
		'Habibi' => 'Habibi',
		'Hachi Maru Pop' => 'Hachi Maru Pop',
		'Hahmlet' => 'Hahmlet',
		'Halant' => 'Halant',
		'Hammersmith One' => 'Hammersmith One',
		'Hanalei' => 'Hanalei',
		'Hanalei Fill' => 'Hanalei Fill',
		'Handlee' => 'Handlee',
		'Hanken Grotesk' => 'Hanken Grotesk',
		'Hanuman' => 'Hanuman',
		'Happy Monkey' => 'Happy Monkey',
		'Harmattan' => 'Harmattan',
		'Headland One' => 'Headland One',
		'Heebo' => 'Heebo',
		'Henny Penny' => 'Henny Penny',
		'Hepta Slab' => 'Hepta Slab',
		'Herr Von Muellerhoff' => 'Herr Von Muellerhoff',
		'Hi Melody' => 'Hi Melody',
		'Hina Mincho' => 'Hina Mincho',
		'Hind' => 'Hind',
		'Hind Guntur' => 'Hind Guntur',
		'Hind Madurai' => 'Hind Madurai',
		'Hind Siliguri' => 'Hind Siliguri',
		'Hind Vadodara' => 'Hind Vadodara',
		'Holtwood One SC' => 'Holtwood One SC',
		'Homemade Apple' => 'Homemade Apple',
		'Homenaje' => 'Homenaje',
		'Hubballi' => 'Hubballi',
		'Hurricane' => 'Hurricane',
		'IBM Plex Mono' => 'IBM Plex Mono',
		'IBM Plex Sans' => 'IBM Plex Sans',
		'IBM Plex Sans Arabic' => 'IBM Plex Sans Arabic',
		'IBM Plex Sans Condensed' => 'IBM Plex Sans Condensed',
		'IBM Plex Sans Devanagari' => 'IBM Plex Sans Devanagari',
		'IBM Plex Sans Hebrew' => 'IBM Plex Sans Hebrew',
		'IBM Plex Sans JP' => 'IBM Plex Sans JP',
		'IBM Plex Sans KR' => 'IBM Plex Sans KR',
		'IBM Plex Sans Thai' => 'IBM Plex Sans Thai',
		'IBM Plex Sans Thai Looped' => 'IBM Plex Sans Thai Looped',
		'IBM Plex Serif' => 'IBM Plex Serif',
		'IM Fell DW Pica' => 'IM Fell DW Pica',
		'IM Fell DW Pica SC' => 'IM Fell DW Pica SC',
		'IM Fell Double Pica' => 'IM Fell Double Pica',
		'IM Fell Double Pica SC' => 'IM Fell Double Pica SC',
		'IM Fell English' => 'IM Fell English',
		'IM Fell English SC' => 'IM Fell English SC',
		'IM Fell French Canon' => 'IM Fell French Canon',
		'IM Fell French Canon SC' => 'IM Fell French Canon SC',
		'IM Fell Great Primer' => 'IM Fell Great Primer',
		'IM Fell Great Primer SC' => 'IM Fell Great Primer SC',
		'Ibarra Real Nova' => 'Ibarra Real Nova',
		'Iceberg' => 'Iceberg',
		'Iceland' => 'Iceland',
		'Imbue' => 'Imbue',
		'Imperial Script' => 'Imperial Script',
		'Imprima' => 'Imprima',
		'Inconsolata' => 'Inconsolata',
		'Inder' => 'Inder',
		'Indie Flower' => 'Indie Flower',
		'Ingrid Darling' => 'Ingrid Darling',
		'Inika' => 'Inika',
		'Inknut Antiqua' => 'Inknut Antiqua',
		'Inria Sans' => 'Inria Sans',
		'Inria Serif' => 'Inria Serif',
		'Inspiration' => 'Inspiration',
		'Inter' => 'Inter',
		'Inter Tight' => 'Inter Tight',
		'Irish Grover' => 'Irish Grover',
		'Island Moments' => 'Island Moments',
		'Istok Web' => 'Istok Web',
		'Italiana' => 'Italiana',
		'Italianno' => 'Italianno',
		'Itim' => 'Itim',
		'Jacques Francois' => 'Jacques Francois',
		'Jacques Francois Shadow' => 'Jacques Francois Shadow',
		'Jaldi' => 'Jaldi',
		'JetBrains Mono' => 'JetBrains Mono',
		'Jim Nightshade' => 'Jim Nightshade',
		'Joan' => 'Joan',
		'Jockey One' => 'Jockey One',
		'Jolly Lodger' => 'Jolly Lodger',
		'Jomhuria' => 'Jomhuria',
		'Jomolhari' => 'Jomolhari',
		'Josefin Sans' => 'Josefin Sans',
		'Josefin Slab' => 'Josefin Slab',
		'Jost' => 'Jost',
		'Joti One' => 'Joti One',
		'Jua' => 'Jua',
		'Judson' => 'Judson',
		'Julee' => 'Julee',
		'Julius Sans One' => 'Julius Sans One',
		'Junge' => 'Junge',
		'Jura' => 'Jura',
		'Just Another Hand' => 'Just Another Hand',
		'Just Me Again Down Here' => 'Just Me Again Down Here',
		'K2D' => 'K2D',
		'Kadwa' => 'Kadwa',
		'Kaisei Decol' => 'Kaisei Decol',
		'Kaisei HarunoUmi' => 'Kaisei HarunoUmi',
		'Kaisei Opti' => 'Kaisei Opti',
		'Kaisei Tokumin' => 'Kaisei Tokumin',
		'Kalam' => 'Kalam',
		'Kameron' => 'Kameron',
		'Kanit' => 'Kanit',
		'Kantumruy' => 'Kantumruy',
		'Kantumruy Pro' => 'Kantumruy Pro',
		'Karantina' => 'Karantina',
		'Karla' => 'Karla',
		'Karma' => 'Karma',
		'Katibeh' => 'Katibeh',
		'Kaushan Script' => 'Kaushan Script',
		'Kavivanar' => 'Kavivanar',
		'Kavoon' => 'Kavoon',
		'Kdam Thmor Pro' => 'Kdam Thmor Pro',
		'Keania One' => 'Keania One',
		'Kelly Slab' => 'Kelly Slab',
		'Kenia' => 'Kenia',
		'Khand' => 'Khand',
		'Khmer' => 'Khmer',
		'Khula' => 'Khula',
		'Kings' => 'Kings',
		'Kirang Haerang' => 'Kirang Haerang',
		'Kite One' => 'Kite One',
		'Kiwi Maru' => 'Kiwi Maru',
		'Klee One' => 'Klee One',
		'Knewave' => 'Knewave',
		'KoHo' => 'KoHo',
		'Kodchasan' => 'Kodchasan',
		'Koh Santepheap' => 'Koh Santepheap',
		'Kolker Brush' => 'Kolker Brush',
		'Kosugi' => 'Kosugi',
		'Kosugi Maru' => 'Kosugi Maru',
		'Kotta One' => 'Kotta One',
		'Koulen' => 'Koulen',
		'Kranky' => 'Kranky',
		'Kreon' => 'Kreon',
		'Kristi' => 'Kristi',
		'Krona One' => 'Krona One',
		'Krub' => 'Krub',
		'Kufam' => 'Kufam',
		'Kulim Park' => 'Kulim Park',
		'Kumar One' => 'Kumar One',
		'Kumar One Outline' => 'Kumar One Outline',
		'Kumbh Sans' => 'Kumbh Sans',
		'Kurale' => 'Kurale',
		'La Belle Aurore' => 'La Belle Aurore',
		'Lacquer' => 'Lacquer',
		'Laila' => 'Laila',
		'Lakki Reddy' => 'Lakki Reddy',
		'Lalezar' => 'Lalezar',
		'Lancelot' => 'Lancelot',
		'Langar' => 'Langar',
		'Lateef' => 'Lateef',
		'Lato' => 'Lato',
		'Lavishly Yours' => 'Lavishly Yours',
		'League Gothic' => 'League Gothic',
		'League Script' => 'League Script',
		'League Spartan' => 'League Spartan',
		'Leckerli One' => 'Leckerli One',
		'Ledger' => 'Ledger',
		'Lekton' => 'Lekton',
		'Lemon' => 'Lemon',
		'Lemonada' => 'Lemonada',
		'Lexend' => 'Lexend',
		'Lexend Deca' => 'Lexend Deca',
		'Lexend Exa' => 'Lexend Exa',
		'Lexend Giga' => 'Lexend Giga',
		'Lexend Mega' => 'Lexend Mega',
		'Lexend Peta' => 'Lexend Peta',
		'Lexend Tera' => 'Lexend Tera',
		'Lexend Zetta' => 'Lexend Zetta',
		'Libre Barcode 128' => 'Libre Barcode 128',
		'Libre Barcode 128 Text' => 'Libre Barcode 128 Text',
		'Libre Barcode 39' => 'Libre Barcode 39',
		'Libre Barcode 39 Extended' => 'Libre Barcode 39 Extended',
		'Libre Barcode 39 Extended Text' => 'Libre Barcode 39 Extended Text',
		'Libre Barcode 39 Text' => 'Libre Barcode 39 Text',
		'Libre Barcode EAN13 Text' => 'Libre Barcode EAN13 Text',
		'Libre Baskerville' => 'Libre Baskerville',
		'Libre Bodoni' => 'Libre Bodoni',
		'Libre Caslon Display' => 'Libre Caslon Display',
		'Libre Caslon Text' => 'Libre Caslon Text',
		'Libre Franklin' => 'Libre Franklin',
		'Licorice' => 'Licorice',
		'Life Savers' => 'Life Savers',
		'Lilita One' => 'Lilita One',
		'Lily Script One' => 'Lily Script One',
		'Limelight' => 'Limelight',
		'Linden Hill' => 'Linden Hill',
		'Literata' => 'Literata',
		'Liu Jian Mao Cao' => 'Liu Jian Mao Cao',
		'Livvic' => 'Livvic',
		'Lobster' => 'Lobster',
		'Lobster Two' => 'Lobster Two',
		'Londrina Outline' => 'Londrina Outline',
		'Londrina Shadow' => 'Londrina Shadow',
		'Londrina Sketch' => 'Londrina Sketch',
		'Londrina Solid' => 'Londrina Solid',
		'Long Cang' => 'Long Cang',
		'Lora' => 'Lora',
		'Love Light' => 'Love Light',
		'Love Ya Like A Sister' => 'Love Ya Like A Sister',
		'Loved by the King' => 'Loved by the King',
		'Lovers Quarrel' => 'Lovers Quarrel',
		'Luckiest Guy' => 'Luckiest Guy',
		'Lusitana' => 'Lusitana',
		'Lustria' => 'Lustria',
		'Luxurious Roman' => 'Luxurious Roman',
		'Luxurious Script' => 'Luxurious Script',
		'M PLUS 1' => 'M PLUS 1',
		'M PLUS 1 Code' => 'M PLUS 1 Code',
		'M PLUS 1p' => 'M PLUS 1p',
		'M PLUS 2' => 'M PLUS 2',
		'M PLUS Code Latin' => 'M PLUS Code Latin',
		'M PLUS Rounded 1c' => 'M PLUS Rounded 1c',
		'Ma Shan Zheng' => 'Ma Shan Zheng',
		'Macondo' => 'Macondo',
		'Macondo Swash Caps' => 'Macondo Swash Caps',
		'Mada' => 'Mada',
		'Magra' => 'Magra',
		'Maiden Orange' => 'Maiden Orange',
		'Maitree' => 'Maitree',
		'Major Mono Display' => 'Major Mono Display',
		'Mako' => 'Mako',
		'Mali' => 'Mali',
		'Mallanna' => 'Mallanna',
		'Mandali' => 'Mandali',
		'Manjari' => 'Manjari',
		'Manrope' => 'Manrope',
		'Mansalva' => 'Mansalva',
		'Manuale' => 'Manuale',
		'Marcellus' => 'Marcellus',
		'Marcellus SC' => 'Marcellus SC',
		'Marck Script' => 'Marck Script',
		'Margarine' => 'Margarine',
		'Marhey' => 'Marhey',
		'Markazi Text' => 'Markazi Text',
		'Marko One' => 'Marko One',
		'Marmelad' => 'Marmelad',
		'Martel' => 'Martel',
		'Martel Sans' => 'Martel Sans',
		'Martian Mono' => 'Martian Mono',
		'Marvel' => 'Marvel',
		'Mate' => 'Mate',
		'Mate SC' => 'Mate SC',
		'Maven Pro' => 'Maven Pro',
		'McLaren' => 'McLaren',
		'Mea Culpa' => 'Mea Culpa',
		'Meddon' => 'Meddon',
		'MedievalSharp' => 'MedievalSharp',
		'Medula One' => 'Medula One',
		'Meera Inimai' => 'Meera Inimai',
		'Megrim' => 'Megrim',
		'Meie Script' => 'Meie Script',
		'Meow Script' => 'Meow Script',
		'Merienda' => 'Merienda',
		'Merienda One' => 'Merienda One',
		'Merriweather' => 'Merriweather',
		'Merriweather Sans' => 'Merriweather Sans',
		'Metal' => 'Metal',
		'Metal Mania' => 'Metal Mania',
		'Metamorphous' => 'Metamorphous',
		'Metrophobic' => 'Metrophobic',
		'Michroma' => 'Michroma',
		'Milonga' => 'Milonga',
		'Miltonian' => 'Miltonian',
		'Miltonian Tattoo' => 'Miltonian Tattoo',
		'Mina' => 'Mina',
		'Mingzat' => 'Mingzat',
		'Miniver' => 'Miniver',
		'Miriam Libre' => 'Miriam Libre',
		'Mirza' => 'Mirza',
		'Miss Fajardose' => 'Miss Fajardose',
		'Mitr' => 'Mitr',
		'Mochiy Pop One' => 'Mochiy Pop One',
		'Mochiy Pop P One' => 'Mochiy Pop P One',
		'Modak' => 'Modak',
		'Modern Antiqua' => 'Modern Antiqua',
		'Mogra' => 'Mogra',
		'Mohave' => 'Mohave',
		'Molengo' => 'Molengo',
		'Molle' => 'Molle',
		'Monda' => 'Monda',
		'Monofett' => 'Monofett',
		'Monoton' => 'Monoton',
		'Monsieur La Doulaise' => 'Monsieur La Doulaise',
		'Montaga' => 'Montaga',
		'Montagu Slab' => 'Montagu Slab',
		'MonteCarlo' => 'MonteCarlo',
		'Montez' => 'Montez',
		'Montserrat' => 'Montserrat',
		'Montserrat Alternates' => 'Montserrat Alternates',
		'Montserrat Subrayada' => 'Montserrat Subrayada',
		'Moo Lah Lah' => 'Moo Lah Lah',
		'Moon Dance' => 'Moon Dance',
		'Moul' => 'Moul',
		'Moulpali' => 'Moulpali',
		'Mountains of Christmas' => 'Mountains of Christmas',
		'Mouse Memoirs' => 'Mouse Memoirs',
		'Mr Bedfort' => 'Mr Bedfort',
		'Mr Dafoe' => 'Mr Dafoe',
		'Mr De Haviland' => 'Mr De Haviland',
		'Mrs Saint Delafield' => 'Mrs Saint Delafield',
		'Mrs Sheppards' => 'Mrs Sheppards',
		'Ms Madi' => 'Ms Madi',
		'Mukta' => 'Mukta',
		'Mukta Mahee' => 'Mukta Mahee',
		'Mukta Malar' => 'Mukta Malar',
		'Mukta Vaani' => 'Mukta Vaani',
		'Mulish' => 'Mulish',
		'Murecho' => 'Murecho',
		'MuseoModerno' => 'MuseoModerno',
		'My Soul' => 'My Soul',
		'Mystery Quest' => 'Mystery Quest',
		'NTR' => 'NTR',
		'Nabla' => 'Nabla',
		'Nanum Brush Script' => 'Nanum Brush Script',
		'Nanum Gothic' => 'Nanum Gothic',
		'Nanum Gothic Coding' => 'Nanum Gothic Coding',
		'Nanum Myeongjo' => 'Nanum Myeongjo',
		'Nanum Pen Script' => 'Nanum Pen Script',
		'Neonderthaw' => 'Neonderthaw',
		'Nerko One' => 'Nerko One',
		'Neucha' => 'Neucha',
		'Neuton' => 'Neuton',
		'New Rocker' => 'New Rocker',
		'New Tegomin' => 'New Tegomin',
		'News Cycle' => 'News Cycle',
		'Newsreader' => 'Newsreader',
		'Niconne' => 'Niconne',
		'Niramit' => 'Niramit',
		'Nixie One' => 'Nixie One',
		'Nobile' => 'Nobile',
		'Nokora' => 'Nokora',
		'Norican' => 'Norican',
		'Nosifer' => 'Nosifer',
		'Notable' => 'Notable',
		'Nothing You Could Do' => 'Nothing You Could Do',
		'Noticia Text' => 'Noticia Text',
		'Noto Color Emoji' => 'Noto Color Emoji',
		'Noto Emoji' => 'Noto Emoji',
		'Noto Kufi Arabic' => 'Noto Kufi Arabic',
		'Noto Music' => 'Noto Music',
		'Noto Naskh Arabic' => 'Noto Naskh Arabic',
		'Noto Nastaliq Urdu' => 'Noto Nastaliq Urdu',
		'Noto Rashi Hebrew' => 'Noto Rashi Hebrew',
		'Noto Sans' => 'Noto Sans',
		'Noto Sans Adlam' => 'Noto Sans Adlam',
		'Noto Sans Adlam Unjoined' => 'Noto Sans Adlam Unjoined',
		'Noto Sans Anatolian Hieroglyphs' => 'Noto Sans Anatolian Hieroglyphs',
		'Noto Sans Arabic' => 'Noto Sans Arabic',
		'Noto Sans Armenian' => 'Noto Sans Armenian',
		'Noto Sans Avestan' => 'Noto Sans Avestan',
		'Noto Sans Balinese' => 'Noto Sans Balinese',
		'Noto Sans Bamum' => 'Noto Sans Bamum',
		'Noto Sans Bassa Vah' => 'Noto Sans Bassa Vah',
		'Noto Sans Batak' => 'Noto Sans Batak',
		'Noto Sans Bengali' => 'Noto Sans Bengali',
		'Noto Sans Bhaiksuki' => 'Noto Sans Bhaiksuki',
		'Noto Sans Brahmi' => 'Noto Sans Brahmi',
		'Noto Sans Buginese' => 'Noto Sans Buginese',
		'Noto Sans Buhid' => 'Noto Sans Buhid',
		'Noto Sans Canadian Aboriginal' => 'Noto Sans Canadian Aboriginal',
		'Noto Sans Carian' => 'Noto Sans Carian',
		'Noto Sans Caucasian Albanian' => 'Noto Sans Caucasian Albanian',
		'Noto Sans Chakma' => 'Noto Sans Chakma',
		'Noto Sans Cham' => 'Noto Sans Cham',
		'Noto Sans Cherokee' => 'Noto Sans Cherokee',
		'Noto Sans Coptic' => 'Noto Sans Coptic',
		'Noto Sans Cuneiform' => 'Noto Sans Cuneiform',
		'Noto Sans Cypriot' => 'Noto Sans Cypriot',
		'Noto Sans Deseret' => 'Noto Sans Deseret',
		'Noto Sans Devanagari' => 'Noto Sans Devanagari',
		'Noto Sans Display' => 'Noto Sans Display',
		'Noto Sans Duployan' => 'Noto Sans Duployan',
		'Noto Sans Egyptian Hieroglyphs' => 'Noto Sans Egyptian Hieroglyphs',
		'Noto Sans Elbasan' => 'Noto Sans Elbasan',
		'Noto Sans Elymaic' => 'Noto Sans Elymaic',
		'Noto Sans Ethiopic' => 'Noto Sans Ethiopic',
		'Noto Sans Georgian' => 'Noto Sans Georgian',
		'Noto Sans Glagolitic' => 'Noto Sans Glagolitic',
		'Noto Sans Gothic' => 'Noto Sans Gothic',
		'Noto Sans Grantha' => 'Noto Sans Grantha',
		'Noto Sans Gujarati' => 'Noto Sans Gujarati',
		'Noto Sans Gunjala Gondi' => 'Noto Sans Gunjala Gondi',
		'Noto Sans Gurmukhi' => 'Noto Sans Gurmukhi',
		'Noto Sans HK' => 'Noto Sans HK',
		'Noto Sans Hanifi Rohingya' => 'Noto Sans Hanifi Rohingya',
		'Noto Sans Hanunoo' => 'Noto Sans Hanunoo',
		'Noto Sans Hatran' => 'Noto Sans Hatran',
		'Noto Sans Hebrew' => 'Noto Sans Hebrew',
		'Noto Sans Imperial Aramaic' => 'Noto Sans Imperial Aramaic',
		'Noto Sans Indic Siyaq Numbers' => 'Noto Sans Indic Siyaq Numbers',
		'Noto Sans Inscriptional Pahlavi' => 'Noto Sans Inscriptional Pahlavi',
		'Noto Sans Inscriptional Parthian' => 'Noto Sans Inscriptional Parthian',
		'Noto Sans JP' => 'Noto Sans JP',
		'Noto Sans Javanese' => 'Noto Sans Javanese',
		'Noto Sans KR' => 'Noto Sans KR',
		'Noto Sans Kaithi' => 'Noto Sans Kaithi',
		'Noto Sans Kannada' => 'Noto Sans Kannada',
		'Noto Sans Kayah Li' => 'Noto Sans Kayah Li',
		'Noto Sans Kharoshthi' => 'Noto Sans Kharoshthi',
		'Noto Sans Khmer' => 'Noto Sans Khmer',
		'Noto Sans Khojki' => 'Noto Sans Khojki',
		'Noto Sans Khudawadi' => 'Noto Sans Khudawadi',
		'Noto Sans Lao' => 'Noto Sans Lao',
		'Noto Sans Lao Looped' => 'Noto Sans Lao Looped',
		'Noto Sans Lepcha' => 'Noto Sans Lepcha',
		'Noto Sans Limbu' => 'Noto Sans Limbu',
		'Noto Sans Linear A' => 'Noto Sans Linear A',
		'Noto Sans Linear B' => 'Noto Sans Linear B',
		'Noto Sans Lisu' => 'Noto Sans Lisu',
		'Noto Sans Lycian' => 'Noto Sans Lycian',
		'Noto Sans Lydian' => 'Noto Sans Lydian',
		'Noto Sans Mahajani' => 'Noto Sans Mahajani',
		'Noto Sans Malayalam' => 'Noto Sans Malayalam',
		'Noto Sans Mandaic' => 'Noto Sans Mandaic',
		'Noto Sans Manichaean' => 'Noto Sans Manichaean',
		'Noto Sans Marchen' => 'Noto Sans Marchen',
		'Noto Sans Masaram Gondi' => 'Noto Sans Masaram Gondi',
		'Noto Sans Math' => 'Noto Sans Math',
		'Noto Sans Mayan Numerals' => 'Noto Sans Mayan Numerals',
		'Noto Sans Medefaidrin' => 'Noto Sans Medefaidrin',
		'Noto Sans Meetei Mayek' => 'Noto Sans Meetei Mayek',
		'Noto Sans Mende Kikakui' => 'Noto Sans Mende Kikakui',
		'Noto Sans Meroitic' => 'Noto Sans Meroitic',
		'Noto Sans Miao' => 'Noto Sans Miao',
		'Noto Sans Modi' => 'Noto Sans Modi',
		'Noto Sans Mongolian' => 'Noto Sans Mongolian',
		'Noto Sans Mono' => 'Noto Sans Mono',
		'Noto Sans Mro' => 'Noto Sans Mro',
		'Noto Sans Multani' => 'Noto Sans Multani',
		'Noto Sans Myanmar' => 'Noto Sans Myanmar',
		'Noto Sans NKo' => 'Noto Sans NKo',
		'Noto Sans Nabataean' => 'Noto Sans Nabataean',
		'Noto Sans New Tai Lue' => 'Noto Sans New Tai Lue',
		'Noto Sans Newa' => 'Noto Sans Newa',
		'Noto Sans Nushu' => 'Noto Sans Nushu',
		'Noto Sans Ogham' => 'Noto Sans Ogham',
		'Noto Sans Ol Chiki' => 'Noto Sans Ol Chiki',
		'Noto Sans Old Hungarian' => 'Noto Sans Old Hungarian',
		'Noto Sans Old Italic' => 'Noto Sans Old Italic',
		'Noto Sans Old North Arabian' => 'Noto Sans Old North Arabian',
		'Noto Sans Old Permic' => 'Noto Sans Old Permic',
		'Noto Sans Old Persian' => 'Noto Sans Old Persian',
		'Noto Sans Old Sogdian' => 'Noto Sans Old Sogdian',
		'Noto Sans Old South Arabian' => 'Noto Sans Old South Arabian',
		'Noto Sans Old Turkic' => 'Noto Sans Old Turkic',
		'Noto Sans Oriya' => 'Noto Sans Oriya',
		'Noto Sans Osage' => 'Noto Sans Osage',
		'Noto Sans Osmanya' => 'Noto Sans Osmanya',
		'Noto Sans Pahawh Hmong' => 'Noto Sans Pahawh Hmong',
		'Noto Sans Palmyrene' => 'Noto Sans Palmyrene',
		'Noto Sans Pau Cin Hau' => 'Noto Sans Pau Cin Hau',
		'Noto Sans Phags Pa' => 'Noto Sans Phags Pa',
		'Noto Sans Phoenician' => 'Noto Sans Phoenician',
		'Noto Sans Psalter Pahlavi' => 'Noto Sans Psalter Pahlavi',
		'Noto Sans Rejang' => 'Noto Sans Rejang',
		'Noto Sans Runic' => 'Noto Sans Runic',
		'Noto Sans SC' => 'Noto Sans SC',
		'Noto Sans Samaritan' => 'Noto Sans Samaritan',
		'Noto Sans Saurashtra' => 'Noto Sans Saurashtra',
		'Noto Sans Sharada' => 'Noto Sans Sharada',
		'Noto Sans Shavian' => 'Noto Sans Shavian',
		'Noto Sans Siddham' => 'Noto Sans Siddham',
		'Noto Sans SignWriting' => 'Noto Sans SignWriting',
		'Noto Sans Sinhala' => 'Noto Sans Sinhala',
		'Noto Sans Sogdian' => 'Noto Sans Sogdian',
		'Noto Sans Sora Sompeng' => 'Noto Sans Sora Sompeng',
		'Noto Sans Soyombo' => 'Noto Sans Soyombo',
		'Noto Sans Sundanese' => 'Noto Sans Sundanese',
		'Noto Sans Syloti Nagri' => 'Noto Sans Syloti Nagri',
		'Noto Sans Symbols' => 'Noto Sans Symbols',
		'Noto Sans Symbols 2' => 'Noto Sans Symbols 2',
		'Noto Sans Syriac' => 'Noto Sans Syriac',
		'Noto Sans TC' => 'Noto Sans TC',
		'Noto Sans Tagalog' => 'Noto Sans Tagalog',
		'Noto Sans Tagbanwa' => 'Noto Sans Tagbanwa',
		'Noto Sans Tai Le' => 'Noto Sans Tai Le',
		'Noto Sans Tai Tham' => 'Noto Sans Tai Tham',
		'Noto Sans Tai Viet' => 'Noto Sans Tai Viet',
		'Noto Sans Takri' => 'Noto Sans Takri',
		'Noto Sans Tamil' => 'Noto Sans Tamil',
		'Noto Sans Tamil Supplement' => 'Noto Sans Tamil Supplement',
		'Noto Sans Tangsa' => 'Noto Sans Tangsa',
		'Noto Sans Telugu' => 'Noto Sans Telugu',
		'Noto Sans Thaana' => 'Noto Sans Thaana',
		'Noto Sans Thai' => 'Noto Sans Thai',
		'Noto Sans Thai Looped' => 'Noto Sans Thai Looped',
		'Noto Sans Tifinagh' => 'Noto Sans Tifinagh',
		'Noto Sans Tirhuta' => 'Noto Sans Tirhuta',
		'Noto Sans Ugaritic' => 'Noto Sans Ugaritic',
		'Noto Sans Vai' => 'Noto Sans Vai',
		'Noto Sans Wancho' => 'Noto Sans Wancho',
		'Noto Sans Warang Citi' => 'Noto Sans Warang Citi',
		'Noto Sans Yi' => 'Noto Sans Yi',
		'Noto Sans Zanabazar Square' => 'Noto Sans Zanabazar Square',
		'Noto Serif' => 'Noto Serif',
		'Noto Serif Ahom' => 'Noto Serif Ahom',
		'Noto Serif Armenian' => 'Noto Serif Armenian',
		'Noto Serif Balinese' => 'Noto Serif Balinese',
		'Noto Serif Bengali' => 'Noto Serif Bengali',
		'Noto Serif Devanagari' => 'Noto Serif Devanagari',
		'Noto Serif Display' => 'Noto Serif Display',
		'Noto Serif Dogra' => 'Noto Serif Dogra',
		'Noto Serif Ethiopic' => 'Noto Serif Ethiopic',
		'Noto Serif Georgian' => 'Noto Serif Georgian',
		'Noto Serif Grantha' => 'Noto Serif Grantha',
		'Noto Serif Gujarati' => 'Noto Serif Gujarati',
		'Noto Serif Gurmukhi' => 'Noto Serif Gurmukhi',
		'Noto Serif HK' => 'Noto Serif HK',
		'Noto Serif Hebrew' => 'Noto Serif Hebrew',
		'Noto Serif JP' => 'Noto Serif JP',
		'Noto Serif KR' => 'Noto Serif KR',
		'Noto Serif Kannada' => 'Noto Serif Kannada',
		'Noto Serif Khmer' => 'Noto Serif Khmer',
		'Noto Serif Khojki' => 'Noto Serif Khojki',
		'Noto Serif Lao' => 'Noto Serif Lao',
		'Noto Serif Malayalam' => 'Noto Serif Malayalam',
		'Noto Serif Myanmar' => 'Noto Serif Myanmar',
		'Noto Serif NP Hmong' => 'Noto Serif NP Hmong',
		'Noto Serif Oriya' => 'Noto Serif Oriya',
		'Noto Serif SC' => 'Noto Serif SC',
		'Noto Serif Sinhala' => 'Noto Serif Sinhala',
		'Noto Serif TC' => 'Noto Serif TC',
		'Noto Serif Tamil' => 'Noto Serif Tamil',
		'Noto Serif Tangut' => 'Noto Serif Tangut',
		'Noto Serif Telugu' => 'Noto Serif Telugu',
		'Noto Serif Thai' => 'Noto Serif Thai',
		'Noto Serif Tibetan' => 'Noto Serif Tibetan',
		'Noto Serif Toto' => 'Noto Serif Toto',
		'Noto Serif Yezidi' => 'Noto Serif Yezidi',
		'Noto Traditional Nushu' => 'Noto Traditional Nushu',
		'Nova Cut' => 'Nova Cut',
		'Nova Flat' => 'Nova Flat',
		'Nova Mono' => 'Nova Mono',
		'Nova Oval' => 'Nova Oval',
		'Nova Round' => 'Nova Round',
		'Nova Script' => 'Nova Script',
		'Nova Slim' => 'Nova Slim',
		'Nova Square' => 'Nova Square',
		'Numans' => 'Numans',
		'Nunito' => 'Nunito',
		'Nunito Sans' => 'Nunito Sans',
		'Nuosu SIL' => 'Nuosu SIL',
		'Odibee Sans' => 'Odibee Sans',
		'Odor Mean Chey' => 'Odor Mean Chey',
		'Offside' => 'Offside',
		'Oi' => 'Oi',
		'Old Standard TT' => 'Old Standard TT',
		'Oldenburg' => 'Oldenburg',
		'Ole' => 'Ole',
		'Oleo Script' => 'Oleo Script',
		'Oleo Script Swash Caps' => 'Oleo Script Swash Caps',
		'Oooh Baby' => 'Oooh Baby',
		'Open Sans' => 'Open Sans',
		'Oranienbaum' => 'Oranienbaum',
		'Orbitron' => 'Orbitron',
		'Oregano' => 'Oregano',
		'Orelega One' => 'Orelega One',
		'Orienta' => 'Orienta',
		'Original Surfer' => 'Original Surfer',
		'Oswald' => 'Oswald',
		'Outfit' => 'Outfit',
		'Over the Rainbow' => 'Over the Rainbow',
		'Overlock' => 'Overlock',
		'Overlock SC' => 'Overlock SC',
		'Overpass' => 'Overpass',
		'Overpass Mono' => 'Overpass Mono',
		'Ovo' => 'Ovo',
		'Oxanium' => 'Oxanium',
		'Oxygen' => 'Oxygen',
		'Oxygen Mono' => 'Oxygen Mono',
		'PT Mono' => 'PT Mono',
		'PT Sans' => 'PT Sans',
		'PT Sans Caption' => 'PT Sans Caption',
		'PT Sans Narrow' => 'PT Sans Narrow',
		'PT Serif' => 'PT Serif',
		'PT Serif Caption' => 'PT Serif Caption',
		'Pacifico' => 'Pacifico',
		'Padauk' => 'Padauk',
		'Padyakke Expanded One' => 'Padyakke Expanded One',
		'Palanquin' => 'Palanquin',
		'Palanquin Dark' => 'Palanquin Dark',
		'Pangolin' => 'Pangolin',
		'Paprika' => 'Paprika',
		'Parisienne' => 'Parisienne',
		'Passero One' => 'Passero One',
		'Passion One' => 'Passion One',
		'Passions Conflict' => 'Passions Conflict',
		'Pathway Gothic One' => 'Pathway Gothic One',
		'Patrick Hand' => 'Patrick Hand',
		'Patrick Hand SC' => 'Patrick Hand SC',
		'Pattaya' => 'Pattaya',
		'Patua One' => 'Patua One',
		'Pavanam' => 'Pavanam',
		'Paytone One' => 'Paytone One',
		'Peddana' => 'Peddana',
		'Peralta' => 'Peralta',
		'Permanent Marker' => 'Permanent Marker',
		'Petemoss' => 'Petemoss',
		'Petit Formal Script' => 'Petit Formal Script',
		'Petrona' => 'Petrona',
		'Philosopher' => 'Philosopher',
		'Piazzolla' => 'Piazzolla',
		'Piedra' => 'Piedra',
		'Pinyon Script' => 'Pinyon Script',
		'Pirata One' => 'Pirata One',
		'Plaster' => 'Plaster',
		'Play' => 'Play',
		'Playball' => 'Playball',
		'Playfair Display' => 'Playfair Display',
		'Playfair Display SC' => 'Playfair Display SC',
		'Plus Jakarta Sans' => 'Plus Jakarta Sans',
		'Podkova' => 'Podkova',
		'Poiret One' => 'Poiret One',
		'Poller One' => 'Poller One',
		'Poly' => 'Poly',
		'Pompiere' => 'Pompiere',
		'Pontano Sans' => 'Pontano Sans',
		'Poor Story' => 'Poor Story',
		'Poppins' => 'Poppins',
		'Port Lligat Sans' => 'Port Lligat Sans',
		'Port Lligat Slab' => 'Port Lligat Slab',
		'Potta One' => 'Potta One',
		'Pragati Narrow' => 'Pragati Narrow',
		'Praise' => 'Praise',
		'Prata' => 'Prata',
		'Preahvihear' => 'Preahvihear',
		'Press Start 2P' => 'Press Start 2P',
		'Pridi' => 'Pridi',
		'Princess Sofia' => 'Princess Sofia',
		'Prociono' => 'Prociono',
		'Prompt' => 'Prompt',
		'Prosto One' => 'Prosto One',
		'Proza Libre' => 'Proza Libre',
		'Public Sans' => 'Public Sans',
		'Puppies Play' => 'Puppies Play',
		'Puritan' => 'Puritan',
		'Purple Purse' => 'Purple Purse',
		'Qahiri' => 'Qahiri',
		'Quando' => 'Quando',
		'Quantico' => 'Quantico',
		'Quattrocento' => 'Quattrocento',
		'Quattrocento Sans' => 'Quattrocento Sans',
		'Questrial' => 'Questrial',
		'Quicksand' => 'Quicksand',
		'Quintessential' => 'Quintessential',
		'Qwigley' => 'Qwigley',
		'Qwitcher Grypen' => 'Qwitcher Grypen',
		'Racing Sans One' => 'Racing Sans One',
		'Radio Canada' => 'Radio Canada',
		'Radley' => 'Radley',
		'Rajdhani' => 'Rajdhani',
		'Rakkas' => 'Rakkas',
		'Raleway' => 'Raleway',
		'Raleway Dots' => 'Raleway Dots',
		'Ramabhadra' => 'Ramabhadra',
		'Ramaraja' => 'Ramaraja',
		'Rambla' => 'Rambla',
		'Rammetto One' => 'Rammetto One',
		'Rampart One' => 'Rampart One',
		'Ranchers' => 'Ranchers',
		'Rancho' => 'Rancho',
		'Ranga' => 'Ranga',
		'Rasa' => 'Rasa',
		'Rationale' => 'Rationale',
		'Ravi Prakash' => 'Ravi Prakash',
		'Readex Pro' => 'Readex Pro',
		'Recursive' => 'Recursive',
		'Red Hat Display' => 'Red Hat Display',
		'Red Hat Mono' => 'Red Hat Mono',
		'Red Hat Text' => 'Red Hat Text',
		'Red Rose' => 'Red Rose',
		'Redacted' => 'Redacted',
		'Redacted Script' => 'Redacted Script',
		'Redressed' => 'Redressed',
		'Reem Kufi' => 'Reem Kufi',
		'Reem Kufi Fun' => 'Reem Kufi Fun',
		'Reem Kufi Ink' => 'Reem Kufi Ink',
		'Reenie Beanie' => 'Reenie Beanie',
		'Reggae One' => 'Reggae One',
		'Revalia' => 'Revalia',
		'Rhodium Libre' => 'Rhodium Libre',
		'Ribeye' => 'Ribeye',
		'Ribeye Marrow' => 'Ribeye Marrow',
		'Righteous' => 'Righteous',
		'Risque' => 'Risque',
		'Road Rage' => 'Road Rage',
		'Roboto' => 'Roboto',
		'Roboto Condensed' => 'Roboto Condensed',
		'Roboto Flex' => 'Roboto Flex',
		'Roboto Mono' => 'Roboto Mono',
		'Roboto Serif' => 'Roboto Serif',
		'Roboto Slab' => 'Roboto Slab',
		'Rochester' => 'Rochester',
		'Rock Salt' => 'Rock Salt',
		'RocknRoll One' => 'RocknRoll One',
		'Rokkitt' => 'Rokkitt',
		'Romanesco' => 'Romanesco',
		'Ropa Sans' => 'Ropa Sans',
		'Rosario' => 'Rosario',
		'Rosarivo' => 'Rosarivo',
		'Rouge Script' => 'Rouge Script',
		'Rowdies' => 'Rowdies',
		'Rozha One' => 'Rozha One',
		'Rubik' => 'Rubik',
		'Rubik 80s Fade' => 'Rubik 80s Fade',
		'Rubik Beastly' => 'Rubik Beastly',
		'Rubik Bubbles' => 'Rubik Bubbles',
		'Rubik Burned' => 'Rubik Burned',
		'Rubik Dirt' => 'Rubik Dirt',
		'Rubik Distressed' => 'Rubik Distressed',
		'Rubik Gemstones' => 'Rubik Gemstones',
		'Rubik Glitch' => 'Rubik Glitch',
		'Rubik Iso' => 'Rubik Iso',
		'Rubik Marker Hatch' => 'Rubik Marker Hatch',
		'Rubik Maze' => 'Rubik Maze',
		'Rubik Microbe' => 'Rubik Microbe',
		'Rubik Mono One' => 'Rubik Mono One',
		'Rubik Moonrocks' => 'Rubik Moonrocks',
		'Rubik Puddles' => 'Rubik Puddles',
		'Rubik Spray Paint' => 'Rubik Spray Paint',
		'Rubik Storm' => 'Rubik Storm',
		'Rubik Vinyl' => 'Rubik Vinyl',
		'Rubik Wet Paint' => 'Rubik Wet Paint',
		'Ruda' => 'Ruda',
		'Rufina' => 'Rufina',
		'Ruge Boogie' => 'Ruge Boogie',
		'Ruluko' => 'Ruluko',
		'Rum Raisin' => 'Rum Raisin',
		'Ruslan Display' => 'Ruslan Display',
		'Russo One' => 'Russo One',
		'Ruthie' => 'Ruthie',
		'Rye' => 'Rye',
		'STIX Two Text' => 'STIX Two Text',
		'Sacramento' => 'Sacramento',
		'Sahitya' => 'Sahitya',
		'Sail' => 'Sail',
		'Saira' => 'Saira',
		'Saira Condensed' => 'Saira Condensed',
		'Saira Extra Condensed' => 'Saira Extra Condensed',
		'Saira Semi Condensed' => 'Saira Semi Condensed',
		'Saira Stencil One' => 'Saira Stencil One',
		'Salsa' => 'Salsa',
		'Sanchez' => 'Sanchez',
		'Sancreek' => 'Sancreek',
		'Sansita' => 'Sansita',
		'Sansita Swashed' => 'Sansita Swashed',
		'Sarabun' => 'Sarabun',
		'Sarala' => 'Sarala',
		'Sarina' => 'Sarina',
		'Sarpanch' => 'Sarpanch',
		'Sassy Frass' => 'Sassy Frass',
		'Satisfy' => 'Satisfy',
		'Sawarabi Gothic' => 'Sawarabi Gothic',
		'Sawarabi Mincho' => 'Sawarabi Mincho',
		'Scada' => 'Scada',
		'Scheherazade New' => 'Scheherazade New',
		'Schoolbell' => 'Schoolbell',
		'Scope One' => 'Scope One',
		'Seaweed Script' => 'Seaweed Script',
		'Secular One' => 'Secular One',
		'Sedgwick Ave' => 'Sedgwick Ave',
		'Sedgwick Ave Display' => 'Sedgwick Ave Display',
		'Sen' => 'Sen',
		'Send Flowers' => 'Send Flowers',
		'Sevillana' => 'Sevillana',
		'Seymour One' => 'Seymour One',
		'Shadows Into Light' => 'Shadows Into Light',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shalimar' => 'Shalimar',
		'Shanti' => 'Shanti',
		'Share' => 'Share',
		'Share Tech' => 'Share Tech',
		'Share Tech Mono' => 'Share Tech Mono',
		'Shippori Antique' => 'Shippori Antique',
		'Shippori Antique B1' => 'Shippori Antique B1',
		'Shippori Mincho' => 'Shippori Mincho',
		'Shippori Mincho B1' => 'Shippori Mincho B1',
		'Shojumaru' => 'Shojumaru',
		'Short Stack' => 'Short Stack',
		'Shrikhand' => 'Shrikhand',
		'Siemreap' => 'Siemreap',
		'Sigmar One' => 'Sigmar One',
		'Signika' => 'Signika',
		'Signika Negative' => 'Signika Negative',
		'Silkscreen' => 'Silkscreen',
		'Simonetta' => 'Simonetta',
		'Single Day' => 'Single Day',
		'Sintony' => 'Sintony',
		'Sirin Stencil' => 'Sirin Stencil',
		'Six Caps' => 'Six Caps',
		'Skranji' => 'Skranji',
		'Slabo 13px' => 'Slabo 13px',
		'Slabo 27px' => 'Slabo 27px',
		'Slackey' => 'Slackey',
		'Smokum' => 'Smokum',
		'Smooch' => 'Smooch',
		'Smooch Sans' => 'Smooch Sans',
		'Smythe' => 'Smythe',
		'Sniglet' => 'Sniglet',
		'Snippet' => 'Snippet',
		'Snowburst One' => 'Snowburst One',
		'Sofadi One' => 'Sofadi One',
		'Sofia' => 'Sofia',
		'Sofia Sans' => 'Sofia Sans',
		'Sofia Sans Condensed' => 'Sofia Sans Condensed',
		'Sofia Sans Extra Condensed' => 'Sofia Sans Extra Condensed',
		'Sofia Sans Semi Condensed' => 'Sofia Sans Semi Condensed',
		'Solitreo' => 'Solitreo',
		'Solway' => 'Solway',
		'Song Myung' => 'Song Myung',
		'Sono' => 'Sono',
		'Sonsie One' => 'Sonsie One',
		'Sora' => 'Sora',
		'Sorts Mill Goudy' => 'Sorts Mill Goudy',
		'Source Code Pro' => 'Source Code Pro',
		'Source Sans 3' => 'Source Sans 3',
		'Source Sans Pro' => 'Source Sans Pro',
		'Source Serif 4' => 'Source Serif 4',
		'Source Serif Pro' => 'Source Serif Pro',
		'Space Grotesk' => 'Space Grotesk',
		'Space Mono' => 'Space Mono',
		'Special Elite' => 'Special Elite',
		'Spectral' => 'Spectral',
		'Spectral SC' => 'Spectral SC',
		'Spicy Rice' => 'Spicy Rice',
		'Spinnaker' => 'Spinnaker',
		'Spirax' => 'Spirax',
		'Splash' => 'Splash',
		'Spline Sans' => 'Spline Sans',
		'Spline Sans Mono' => 'Spline Sans Mono',
		'Squada One' => 'Squada One',
		'Square Peg' => 'Square Peg',
		'Sree Krushnadevaraya' => 'Sree Krushnadevaraya',
		'Sriracha' => 'Sriracha',
		'Srisakdi' => 'Srisakdi',
		'Staatliches' => 'Staatliches',
		'Stalemate' => 'Stalemate',
		'Stalinist One' => 'Stalinist One',
		'Stardos Stencil' => 'Stardos Stencil',
		'Stick' => 'Stick',
		'Stick No Bills' => 'Stick No Bills',
		'Stint Ultra Condensed' => 'Stint Ultra Condensed',
		'Stint Ultra Expanded' => 'Stint Ultra Expanded',
		'Stoke' => 'Stoke',
		'Strait' => 'Strait',
		'Style Script' => 'Style Script',
		'Stylish' => 'Stylish',
		'Sue Ellen Francisco' => 'Sue Ellen Francisco',
		'Suez One' => 'Suez One',
		'Sulphur Point' => 'Sulphur Point',
		'Sumana' => 'Sumana',
		'Sunflower' => 'Sunflower',
		'Sunshiney' => 'Sunshiney',
		'Supermercado One' => 'Supermercado One',
		'Sura' => 'Sura',
		'Suranna' => 'Suranna',
		'Suravaram' => 'Suravaram',
		'Suwannaphum' => 'Suwannaphum',
		'Swanky and Moo Moo' => 'Swanky and Moo Moo',
		'Syncopate' => 'Syncopate',
		'Syne' => 'Syne',
		'Syne Mono' => 'Syne Mono',
		'Syne Tactile' => 'Syne Tactile',
		'Tai Heritage Pro' => 'Tai Heritage Pro',
		'Tajawal' => 'Tajawal',
		'Tangerine' => 'Tangerine',
		'Tapestry' => 'Tapestry',
		'Taprom' => 'Taprom',
		'Tauri' => 'Tauri',
		'Taviraj' => 'Taviraj',
		'Teko' => 'Teko',
		'Telex' => 'Telex',
		'Tenali Ramakrishna' => 'Tenali Ramakrishna',
		'Tenor Sans' => 'Tenor Sans',
		'Text Me One' => 'Text Me One',
		'Texturina' => 'Texturina',
		'Thasadith' => 'Thasadith',
		'The Girl Next Door' => 'The Girl Next Door',
		'The Nautigal' => 'The Nautigal',
		'Tienne' => 'Tienne',
		'Tillana' => 'Tillana',
		'Timmana' => 'Timmana',
		'Tinos' => 'Tinos',
		'Tiro Bangla' => 'Tiro Bangla',
		'Tiro Devanagari Hindi' => 'Tiro Devanagari Hindi',
		'Tiro Devanagari Marathi' => 'Tiro Devanagari Marathi',
		'Tiro Devanagari Sanskrit' => 'Tiro Devanagari Sanskrit',
		'Tiro Gurmukhi' => 'Tiro Gurmukhi',
		'Tiro Kannada' => 'Tiro Kannada',
		'Tiro Tamil' => 'Tiro Tamil',
		'Tiro Telugu' => 'Tiro Telugu',
		'Titan One' => 'Titan One',
		'Titillium Web' => 'Titillium Web',
		'Tomorrow' => 'Tomorrow',
		'Tourney' => 'Tourney',
		'Trade Winds' => 'Trade Winds',
		'Train One' => 'Train One',
		'Trirong' => 'Trirong',
		'Trispace' => 'Trispace',
		'Trocchi' => 'Trocchi',
		'Trochut' => 'Trochut',
		'Truculenta' => 'Truculenta',
		'Trykker' => 'Trykker',
		'Tulpen One' => 'Tulpen One',
		'Turret Road' => 'Turret Road',
		'Twinkle Star' => 'Twinkle Star',
		'Ubuntu' => 'Ubuntu',
		'Ubuntu Condensed' => 'Ubuntu Condensed',
		'Ubuntu Mono' => 'Ubuntu Mono',
		'Uchen' => 'Uchen',
		'Ultra' => 'Ultra',
		'Unbounded' => 'Unbounded',
		'Uncial Antiqua' => 'Uncial Antiqua',
		'Underdog' => 'Underdog',
		'Unica One' => 'Unica One',
		'UnifrakturCook' => 'UnifrakturCook',
		'UnifrakturMaguntia' => 'UnifrakturMaguntia',
		'Unkempt' => 'Unkempt',
		'Unlock' => 'Unlock',
		'Unna' => 'Unna',
		'Updock' => 'Updock',
		'Urbanist' => 'Urbanist',
		'VT323' => 'VT323',
		'Vampiro One' => 'Vampiro One',
		'Varela' => 'Varela',
		'Varela Round' => 'Varela Round',
		'Varta' => 'Varta',
		'Vast Shadow' => 'Vast Shadow',
		'Vazirmatn' => 'Vazirmatn',
		'Vesper Libre' => 'Vesper Libre',
		'Viaoda Libre' => 'Viaoda Libre',
		'Vibes' => 'Vibes',
		'Vibur' => 'Vibur',
		'Vidaloka' => 'Vidaloka',
		'Viga' => 'Viga',
		'Voces' => 'Voces',
		'Volkhov' => 'Volkhov',
		'Vollkorn' => 'Vollkorn',
		'Vollkorn SC' => 'Vollkorn SC',
		'Voltaire' => 'Voltaire',
		'Vujahday Script' => 'Vujahday Script',
		'Waiting for the Sunrise' => 'Waiting for the Sunrise',
		'Wallpoet' => 'Wallpoet',
		'Walter Turncoat' => 'Walter Turncoat',
		'Warnes' => 'Warnes',
		'Water Brush' => 'Water Brush',
		'Waterfall' => 'Waterfall',
		'Wellfleet' => 'Wellfleet',
		'Wendy One' => 'Wendy One',
		'Whisper' => 'Whisper',
		'WindSong' => 'WindSong',
		'Wire One' => 'Wire One',
		'Work Sans' => 'Work Sans',
		'Xanh Mono' => 'Xanh Mono',
		'Yaldevi' => 'Yaldevi',
		'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
		'Yantramanav' => 'Yantramanav',
		'Yatra One' => 'Yatra One',
		'Yellowtail' => 'Yellowtail',
		'Yeon Sung' => 'Yeon Sung',
		'Yeseva One' => 'Yeseva One',
		'Yesteryear' => 'Yesteryear',
		'Yomogi' => 'Yomogi',
		'Yrsa' => 'Yrsa',
		'Yuji Boku' => 'Yuji Boku',
		'Yuji Mai' => 'Yuji Mai',
		'Yuji Syuku' => 'Yuji Syuku',
		'Yusei Magic' => 'Yusei Magic',
		'ZCOOL KuaiLe' => 'ZCOOL KuaiLe',
		'ZCOOL QingKe HuangYou' => 'ZCOOL QingKe HuangYou',
		'ZCOOL XiaoWei' => 'ZCOOL XiaoWei',
		'Zen Antique' => 'Zen Antique',
		'Zen Antique Soft' => 'Zen Antique Soft',
		'Zen Dots' => 'Zen Dots',
		'Zen Kaku Gothic Antique' => 'Zen Kaku Gothic Antique',
		'Zen Kaku Gothic New' => 'Zen Kaku Gothic New',
		'Zen Kurenaido' => 'Zen Kurenaido',
		'Zen Loop' => 'Zen Loop',
		'Zen Maru Gothic' => 'Zen Maru Gothic',
		'Zen Old Mincho' => 'Zen Old Mincho',
		'Zen Tokyo Zoo' => 'Zen Tokyo Zoo',
		'Zeyada' => 'Zeyada',
		'Zhi Mang Xing' => 'Zhi Mang Xing',
		'Zilla Slab' => 'Zilla Slab',
		'Zilla Slab Highlight' => 'Zilla Slab Highlight',
	);

	$wp_customize->add_control(
		'select_fonts',
		array(
			'type'     => 'select',
			'label'    => 'Font family',
			'section'  => 'fonts',
			'settings' => 'font_family',
			'choices'  => $choices
		)
	);

	$wp_customize->add_section('posts' , array(
		'title'     => __('Posts', 'dd_theme'),
		'priority'  => 1020
	));

	$wp_customize->add_setting('show_thumbnail', array(
		'default'    => '0',
		'type' => 'option'
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'show_thumbnail',
			array(
				'label'     => __('Show thumbnail', 'theme'),
				'section'   => 'posts',
				'settings'  => 'show_thumbnail',
				'type'      => 'checkbox',
			)
		)
	);

	$wp_customize->add_setting('show_categories', array(
		'default'    => '0',
		'type' => 'option'
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'show_categories',
			array(
				'label'     => __('Show categories', 'theme'),
				'section'   => 'posts',
				'settings'  => 'show_categories',
				'type'      => 'checkbox',
			)
		)
	);

	$wp_customize->add_setting('show_title', array(
		'default'    => '0',
		'type' => 'option'
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'show_title',
			array(
				'label'     => __('Show title', 'theme'),
				'section'   => 'posts',
				'settings'  => 'show_title',
				'type'      => 'checkbox',
			)
		)
	);

	$wp_customize->add_setting('show_excerpt', array(
		'default'    => '0',
		'type' => 'option'
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'show_excerpt',
			array(
				'label'     => __('Show excerpt', 'theme'),
				'section'   => 'posts',
				'settings'  => 'show_excerpt',
				'type'      => 'checkbox',
			)
		)
	);

	$wp_customize->add_setting('show_author', array(
		'default'    => '0',
		'type' => 'option'
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'show_author',
			array(
				'label'     => __('Show author', 'theme'),
				'section'   => 'posts',
				'settings'  => 'show_author',
				'type'      => 'checkbox',
			)
		)
	);

	$wp_customize->add_setting('show_date', array(
		'default'    => '0',
		'type' => 'option'
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'show_date',
			array(
				'label'     => __('Show date', 'theme'),
				'section'   => 'posts',
				'settings'  => 'show_date',
				'type'      => 'checkbox',
			)
		)
	);	

 }
add_action( 'customize_register', 'mytheme_customize_register' );

add_action( 'after_setup_theme', 'our_island_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function our_island_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'our_island_content_width', 640 );
}
add_action( 'after_setup_theme', 'our_island_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function our_island_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Header Left', 'our-island' ),
			'id'            => 'header-1',
			'description'   => esc_html__( 'Add widgets here.', 'our-island' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Header Middle', 'our-island' ),
			'id'            => 'header-2',
			'description'   => esc_html__( 'Add widgets here.', 'our-island' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Header Right', 'our-island' ),
			'id'            => 'header-3',
			'description'   => esc_html__( 'Add widgets here.', 'our-island' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Left', 'our-island' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'our-island' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Middle', 'our-island' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'our-island' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'before_title' => '<h3 class="text-sm font-medium text-gray-900">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Right', 'our-island' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'our-island' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);


	register_sidebar(
		array(
			'name'          => esc_html__( 'Mobile Header', 'our-island' ),
			'id'            => 'mobile-1',
			'description'   => esc_html__( 'Add widgets here.', 'our-island' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Mobile Body', 'our-island' ),
			'id'            => 'mobile-2',
			'description'   => esc_html__( 'Add widgets here.', 'our-island' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Mobile Footer', 'our-island' ),
			'id'            => 'mobile-3',
			'description'   => esc_html__( 'Add widgets here.', 'our-island' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);

	
}
add_action( 'widgets_init', 'our_island_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function our_island_scripts() {
	wp_enqueue_script( 'pace', get_template_directory_uri() . '/js/pace.min.js', array(), '1.2.4', true );
	wp_enqueue_style( 'pace-flash', get_template_directory_uri() . '/css/flash.css', array(), '1.2.4' );

	wp_enqueue_style( 'our-island-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_script( 'tailwind', get_template_directory_uri() . '/js/tailwind.js', array(), '3.2.4', true );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_style( 'select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', array(), '4.1.0-rc.0');
    wp_enqueue_script( 'select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', 'jquery', '4.1.0-rc.0');

    wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), _S_VERSION, true );



	wp_deregister_style('block-library');
	wp_dequeue_style('wp-block-library');

	wp_deregister_style('wc-blocks-vendors-style');
	wp_dequeue_style('wc-blocks-vendors-style');

	wp_deregister_style('wc-blocks-style');
	wp_dequeue_style('wc-blocks-style');

	if ( !is_page( 'wishlist' ) ) {
		wp_deregister_style('yith-wcwl-font-awesome');
		wp_dequeue_style('yith-wcwl-font-awesome');
	}

	wp_deregister_style('classic-theme-styles');
	wp_dequeue_style( 'classic-theme-styles' );

	wp_deregister_style('global-styles');
	wp_dequeue_style( 'global-styles' );

	if ( !is_product() ) {
		wp_deregister_style('woo-variation-swatches');
		wp_dequeue_style( 'woo-variation-swatches' );
	}

	if ( !is_checkout() ) {
		wp_deregister_style('thwmscf-checkout-css');
		wp_dequeue_style( 'thwmscf-checkout-css' );
	}


	$hex = str_replace( '#', '', get_option( 'color', '#561f18' ) );
	$hsl = hexToHsl( $hex );


	$indigo = array();
	$indigo[6] = $hsl;

	for ($i=5; $i >=0; $i--) { 
	$indigo[$i] = [$indigo[$i+1][0],$indigo[$i+1][1],$indigo[$i+1][2]*1.3];
	}

	$definitions = array(
		'900' => '#' . hslToHex($indigo[6]),
		'800' => '#' . hslToHex($indigo[6]),
		'700' => '#' . hslToHex($indigo[6]),
		'600' => '#' . hslToHex($indigo[6]),
		'500' => '#' . hslToHex($indigo[5]),
		'400' => '#' . hslToHex($indigo[4]),
		'300' => '#' . hslToHex($indigo[3]),
		'200' => '#' . hslToHex($indigo[2]),
		'100' => '#' . hslToHex($indigo[1]),
		'50' => '#' . hslToHex($indigo[0])
	);
    
    wp_localize_script( 'custom', 'ajax_object', array( 
			'ajax_url'    => admin_url( 'admin-ajax.php' ), 
			'colors'      => array( 
				'hover_color'   => '#000000', 
				'color'         => '#561f18', 
				'info_color'    => '#bdfcfd',
				'success_color' => '#bdfdbd' ), 
			'definitions' => $definitions ,
			'font'        => get_option('font_family'),

		)
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'our_island_scripts' );

/**
 * Enqueue scripts and styles.
 */
function admin_island_scripts() {
    wp_enqueue_media();

    wp_enqueue_script( 'admin-custom', get_template_directory_uri() . '/js/admin-custom.js', array('jquery'), _S_VERSION, true );
    
    wp_localize_script( 'admin-custom', 'colors', array( 'hover_color' => '#000000', 'color' => '#561f18', 'info_color'=> '#bdfcfd','success_color'=> '#bdfdbd' ) );

}

add_action( 'admin_enqueue_scripts', 'admin_island_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

class Footer_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = null ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );

		// Default class.
		$classes = array( 'sub-menu' );

		/**
		 * Filters the CSS class(es) applied to a menu list element.
		 *
		 * @since 4.8.0
		 *
		 * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
		 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
		$class_names = ' class="mt-6 space-y-6"';

		$output .= "{$n}{$indent}<ul$class_names>{$n}";
	}
	
	function end_lvl( &$output, $depth = 0, $args = null ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent  = str_repeat( $t, $depth );
		$output .= "$indent</ul>{$n}";
	}
	
	function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
		// Restores the more descriptive, specific name for use within this method.
		$menu_item = $data_object;

		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		$classes   = empty( $menu_item->classes ) ? array() : (array) $menu_item->classes;
		$classes[] = 'menu-item-' . $menu_item->ID;

		/**
		 * Filters the arguments for a single nav menu item.
		 *
		 * @since 4.4.0
		 *
		 * @param stdClass $args      An object of wp_nav_menu() arguments.
		 * @param WP_Post  $menu_item Menu item data object.
		 * @param int      $depth     Depth of menu item. Used for padding.
		 */
		$args = apply_filters( 'nav_menu_item_args', $args, $menu_item, $depth );

		/**
		 * Filters the CSS classes applied to a menu item's list item element.
		 *
		 * @since 3.0.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string[] $classes   Array of the CSS classes that are applied to the menu item's `<li>` element.
		 * @param WP_Post  $menu_item The current menu item object.
		 * @param stdClass $args      An object of wp_nav_menu() arguments.
		 * @param int      $depth     Depth of menu item. Used for padding.
		 */
		$class_names = ' class="text-sm text-gray-500 hover:text-gray-600"';

		/**
		 * Filters the ID attribute applied to a menu item's list item element.
		 *
		 * @since 3.0.1
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string   $menu_item_id The ID attribute applied to the menu item's `<li>` element.
		 * @param WP_Post  $menu_item    The current menu item.
		 * @param stdClass $args         An object of wp_nav_menu() arguments.
		 * @param int      $depth        Depth of menu item. Used for padding.
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $menu_item->ID, $menu_item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names . '>';

		$atts           = array();
		$atts['title']  = ! empty( $menu_item->attr_title ) ? $menu_item->attr_title : '';
		$atts['target'] = ! empty( $menu_item->target ) ? $menu_item->target : '';
		if ( '_blank' === $menu_item->target && empty( $menu_item->xfn ) ) {
			$atts['rel'] = 'noopener';
		} else {
			$atts['rel'] = $menu_item->xfn;
		}
		$atts['href']         = ! empty( $menu_item->url ) ? $menu_item->url : '';
		$atts['aria-current'] = $menu_item->current ? 'page' : '';

		/**
		 * Filters the HTML attributes applied to a menu item's anchor element.
		 *
		 * @since 3.6.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 *     @type string $title        Title attribute.
		 *     @type string $target       Target attribute.
		 *     @type string $rel          The rel attribute.
		 *     @type string $href         The href attribute.
		 *     @type string $aria-current The aria-current attribute.
		 * }
		 * @param WP_Post  $menu_item The current menu item object.
		 * @param stdClass $args      An object of wp_nav_menu() arguments.
		 * @param int      $depth     Depth of menu item. Used for padding.
		 */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $menu_item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $menu_item->title, $menu_item->ID );

		/**
		 * Filters a menu item's title.
		 *
		 * @since 4.4.0
		 *
		 * @param string   $title     The menu item's title.
		 * @param WP_Post  $menu_item The current menu item object.
		 * @param stdClass $args      An object of wp_nav_menu() arguments.
		 * @param int      $depth     Depth of menu item. Used for padding.
		 */
		$title = apply_filters( 'nav_menu_item_title', $title, $menu_item, $args, $depth );

		$item_output  = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		/**
		 * Filters a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @since 3.0.0
		 *
		 * @param string   $item_output The menu item's starting HTML output.
		 * @param WP_Post  $menu_item   Menu item data object.
		 * @param int      $depth       Depth of menu item. Used for padding.
		 * @param stdClass $args        An object of wp_nav_menu() arguments.
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $menu_item, $depth, $args );
	}

	function end_el( &$output, $data_object, $depth = 0, $args = null ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$output .= "</li>{$n}";
	}
}

class C_Walker_Nav_Menu extends Walker_Nav_Menu {

	/**
	 * Starts the list before the elements are added.
	 *
	 * Adds classes to the unordered list sub-menus.
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu()
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		// Depth-dependent classes.
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		
		// Build HTML for output.
		$output .= "\n" . $indent . '<div class="h-full flex">' . "\n";
	}

	public function end_lvl( &$output, $depth = 0, $args = null ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent  = str_repeat( $t, $depth );
		$output .= "$indent</div>{$n}";
	}

	/**
	 * Start the element output.
	 *
	 * Adds main/sub-classes to the list items and links.
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item   Menu item data object.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu()
	 * @param int    $id     Current item ID.
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

		// Depth-dependent classes.
		$depth_classes = array(
			( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
			( $depth >=2 ? 'sub-sub-menu-item' : '' ),
			( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
			'menu-item-depth-' . $depth
		);
		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

		// Passed classes.
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = 'flex';

		// Build HTML.
		$attachment = wp_get_attachment_image_url( get_term_meta($item->object_id, 'product_collections_img', true ), 'medium' );
		$class = $attachment ? ' has-image' : '';
		$class_names .= $class;
		$output .= $indent . '<div id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

		// Link attributes.
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ' class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 flex items-center transition-colors ease-out duration-200 text-sm font-medium border-b-2 -mb-px pt-px ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

		if ( $attachment ) {
			$item_output = $args->before.'
			<div class="group relative">
				<div class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
			  		<img src="'. $attachment .'" alt="">
				</div>
				<a href="'.esc_attr( $item->url).'" class="mt-6 block text-sm font-medium text-gray-900">
			  		<span class="absolute z-10 inset-0" aria-hidden="true"></span>
				'. apply_filters( 'the_title', $item->title, $item->ID ) .'
				</a>
				<p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
		  	</div>'.$args->after;
		} else {
			// Build HTML output and pass through the proper filter.
			$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
			);
		}
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$output .= "</div>{$n}";
	}

}

add_filter('wp_nav_menu_args', 'my_args');
add_filter('widget_nav_menu_args', 'my_args');
function my_args($args) {
   if ( did_action( 'get_footer' ) ) {
	return array_merge( $args, array(
		'walker'     => new Footer_Walker_Nav_Menu(),
		'items_wrap' => '<ul role="list" class="mt-6 space-y-6">%3$s</ul>'
	 ) );
   } 

   return array_merge( $args, array(
	'walker' => new C_Walker_Nav_Menu(),
	 'depth' => 3
 ) );
}

add_filter( 'get_custom_logo', 'change_logo_class' );

function change_logo_class( $html ) {
	$height = get_theme_mod( 'logo_height' ); 

	$html = str_replace('alt=', ' id="logo-img" alt=', $html );

    $html = str_replace( 'custom-logo', 'h-' . $height, $html );
	$html = str_replace( 'h-'. $height .'-link', 'h-' . $height . ' w-auto', $html );
	$html = str_replace( 'width="364"', 'width="auto"', $html );
	
    return $html;
}

function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	
	return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );

add_action( 'wp_ajax_load_posts', 'load_posts' );
add_action('wp_ajax_nopriv_load_posts', 'load_posts');


function load_posts() {
    
    $tax_query = array();
    
    $response = '';
    
    foreach ( $_POST['filters'] as $taxonomy => $terms ) {
        if ( $taxonomy == 'category' ) {
            
            $cat_query[] =  array(
                'taxonomy'  => 'product_cat',
                'field'     => 'term_id',
                'terms'     => $terms,
                'operator'  => 'IN',
            );
            
        } else {
        
            $tax_query[] = array(
                 'taxonomy' => 'attribute_pa_'. $taxonomy,
                 'value'    =>  $terms,
                 'operator' => 'IN'
            );
        
        }
        
    }
    
    $args = array(
       'post_type'      =>array('product','product_variation'),
       'post_status'    => 'publish',
       'posts_per_page' => -1,
       'meta_query'     => $tax_query,
       'tax_query'      => $cat_query,
	   's'              => get_search_query()
        

    );
    
    $ajaxposts = new WP_Query( $args );

    
    ob_start();

    while ( $ajaxposts->have_posts() ) {
        $ajaxposts->the_post();

        wc_get_template_part( 'content-product' );
    }
    
    wp_reset_postdata();
    
    $response = ob_get_contents();
    ob_end_flush();

    echo $response;

    exit;
}

function custom_my_account_menu_items( $items ) {
    unset($items['dashboard']);
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'custom_my_account_menu_items' );


add_action( 'parse_request', function ( $wp ) {
    if (!is_user_logged_in()) return false;

    if ( $wp->request === 'my-account' ) {
        wp_redirect( home_url( '/my-account/orders/' ) );
           
        exit;
    }
}, 10, 1 );

add_shortcode('cart_icon', 'cart_icon' );
            
function cart_icon() {
	if ( class_exists( 'WooCommerce' ) && is_object( WC()->cart )) :
    return '<div class="basket-item-count relative flex align-center cart-icon">
				<a href="#" class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 flex items-center transition-colors ease-out duration-200 text-sm font-medium border-b-2 -mb-px pt-px main-menu-link">
					<svg class="flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
					</svg>
				</a>
				<span class="text-gray-500 text-sm ml-2 pt-1 cart-items-count" data-cart="'.WC()->cart->get_cart_contents_count().'">'.WC()->cart->get_cart_contents_count().'</span>
			</div>';
	endif;
	
	return '';
}

add_shortcode('search_icon', 'search_icon');
            
function search_icon() {
    return '<div class="relative flex">
				<div class="h-4">
					<div id="search-toggle" class="absolute inset-y-0 top-1 left-3 flex items-center" style="z-index: 4;">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
							<path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
						</svg>			  
					</div>
					<div id="search-wrapper" class="hidden relative bottom-2" style="">
					<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/shop' ) ) . '">
						<input id="search" type="search" value="' . get_search_query() . '" name="s" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Search" type="search" style="opacity: 1;">
					</form>
					<div style="
						position: fixed;
						background: white;
						width: 100vw;
						height: 100vh;
						right: 0;
						top: 0;
						z-index: -1;
						padding: 8rem 7rem 3rem;" class="search-overlay mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8 pb-20"></div>
					</div>
				</div>
			</div>';
}

add_shortcode('account_icon', 'account_icon');
            
function account_icon() {

	$user = wp_get_current_user();
	$avatar = get_avatar_url( $user->user_email );

    return '<div class="flex items-center">
				<div class="ml-3 text-right">
					<div class="font-medium text-gray-800 text-sm">'. $user->display_name .'</div>
					<div class="text-xs text-gray-500">'. $user->user_email .'</div>
				</div><div class="flex-shrink-0">
					<img style="border: 2px solid white;box-shadow: 0 0 1px 2px #e4e4e4;" class="h-10 w-10 rounded-full ml-2" src="'. $avatar .'" alt="'. $user->display_name .'">
				</div>
			</div>';
}

function prefix_nav_description( $item_output, $item, $depth, $args ) {
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( $args->link_after . '</a>', '<span class="menu-item-description">' . do_shortcode($item->description) . '</span>' . $args->link_after . '</a>', $item_output );
    }
 
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );


add_filter( 'woocommerce_cart_shipping_method_full_label', 'change_cart_shipping_method_full_label', 10, 2 );
function change_cart_shipping_method_full_label( $label, $method ) {
    $has_cost  = 0 < $method->cost;
    $hide_cost = ! $has_cost && in_array( $method->get_method_id(), array( 'free_shipping', 'local_pickup' ), true );

    if ( ! $has_cost && ! $hide_cost ) {
        $label  = $method->get_label() . ': Free';
    }
    return get_woocommerce_currency_symbol().$method->cost;
}


add_action( 'wp_ajax_load_products', 'load_products' );
add_action('wp_ajax_nopriv_load_products', 'load_products');


function load_products() {

	$filters = '';
    
	if ( !empty( $_POST['filters'] ) && sizeof( $_POST['filters'] ) > 0) {
		foreach ( $_POST['filters'] as $taxonomy => $terms ) {
			if ( $taxonomy == 'category' ) {
				$taxonomy = 'product_cat';
				$taxonomy_terms = implode( $terms, ',' );
			} else {
			
				$taxonomy = 'attribute_pa_'. $taxonomy;
				$taxonomy_terms = implode( $terms, ',');

			}        
		}

		$filters = 'taxonomy="'.$taxonomy.'" taxonomy_terms="'. $taxonomy_terms .'" taxonomy_operator="IN"';
	}	


	echo do_shortcode('[ajax_load_more id="custom" container_type="div" css_classes="loop-container mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8 pb-20" post_type="product" category__not_in="1"  '. $filters .' ]');

    exit;
}

function myplugin_create_variations(){

	wc_maybe_define_constant( 'WC_MAX_LINKED_VARIATIONS', 50 );
	wc_set_time_limit( 0 );

	$args = array(
        'post_type'      => array('product'),
        'numberposts' => -1,
    );

	$products = get_posts($args);

	foreach ($products as $product) {

		$product_id=$product->ID;
	
	if ( ! $product_id ) {
		wp_die();
	}
	$product    = wc_get_product( $product_id );
	$data_store = $product->get_data_store();
	if ( ! is_callable( array( $data_store, 'create_all_product_variations' ) ) ) {
		wp_die();
	}
	$data_store->create_all_product_variations( $product, WC_MAX_LINKED_VARIATIONS );
	$data_store->sort_all_product_variations( $product->ID );  

	}

}

add_action('product_variation_linked','product_variations',10,1);

function product_variations( $variation_id ) {
	if ( !empty($variation_id) ) {
        $variation = wc_get_product($variation_id);
        $price = get_post_meta($variation->get_parent_id(), '_regular_price', true);

		foreach ($variation->get_attributes() as $attribute ) {
			preg_match('/\((.*)\)/', $attribute, $match);
	
			if ( $match && $match[0] ) {
				$price = floatval(preg_replace('/[^\d\.]/', '', $match[0])) && floatval(preg_replace('/[^\d\.]/', '', $match[0])) != 0 ? floatval(preg_replace('/[^\d\.]/', '', $match[0])) : $price;
			}
		}

		$variation->set_regular_price($price);
        $variation->save();
    }
}

add_filter('comment_form_default_fields', 'unset_url_field');
function unset_url_field($fields){
    if(isset($fields['url']))
       unset($fields['url']);
       return $fields;
}

remove_action( 'set_comment_cookies', 'wp_set_comment_cookies' );

add_filter('woocommerce_product_related_products_heading', function(){return false;});


remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );


function hexToHsl($hex) {
    $hex = array($hex[0].$hex[1], $hex[2].$hex[3], $hex[4].$hex[5]);
    $rgb = array_map(function($part) {
        return hexdec($part) / 255;
    }, $hex);

    $max = max($rgb);
    $min = min($rgb);

    $l = ($max + $min) / 2;

    if ($max == $min) {
        $h = $s = 0;
    } else {
        $diff = $max - $min;
        $s = $l > 0.5 ? $diff / (2 - $max - $min) : $diff / ($max + $min);

        switch($max) {
            case $rgb[0]:
                $h = ($rgb[1] - $rgb[2]) / $diff + ($rgb[1] < $rgb[2] ? 6 : 0);
                break;
            case $rgb[1]:
                $h = ($rgb[2] - $rgb[0]) / $diff + 2;
                break;
            case $rgb[2]:
                $h = ($rgb[0] - $rgb[1]) / $diff + 4;
                break;
        }

        $h /= 6;
    }

    return array($h, $s, $l);
}

function hslToHex($hsl)
{
    list($h, $s, $l) = $hsl;

    if ($s == 0) {
        $r = $g = $b = 1;
    } else {
        $q = $l < 0.5 ? $l * (1 + $s) : $l + $s - $l * $s;
        $p = 2 * $l - $q;

        $r = hue2rgb($p, $q, $h + 1/3);
        $g = hue2rgb($p, $q, $h);
        $b = hue2rgb($p, $q, $h - 1/3);
    }

    return rgb2hex($r) . rgb2hex($g) . rgb2hex($b);
}

function hue2rgb($p, $q, $t) {
    if ($t < 0) $t += 1;
    if ($t > 1) $t -= 1;
    if ($t < 1/6) return $p + ($q - $p) * 6 * $t;
    if ($t < 1/2) return $q;
    if ($t < 2/3) return $p + ($q - $p) * (2/3 - $t) * 6;

    return $p;
}

function rgb2hex($rgb) {
    return str_pad(dechex($rgb * 255), 2, '0', STR_PAD_LEFT);
}

add_action( 'wp_ajax_set_theme_colors', 'set_theme_colors' );
add_action('wp_ajax_nopriv_set_theme_colors', 'set_theme_colors');


function set_theme_colors() {

    $primary = $_POST['colibri']['background'];
	$secondary = $_POST['colibri']['content'][0];
	$tertiary = $_POST['colibri']['content'][2];

	$hsl = hexToHsl($tertiary);
	
	$info = '#' . hslToHex(200, $hsl[1], $hsl[2]);

	$success = '#' . hslToHex(120, $hsl[1], $hsl[2]);
	
	$warning = '#' . hslToHex(45, $hsl[1], $hsl[2]);

	update_option( 'color', $primary );
	update_option( 'hover_color', $secondary );
	update_option( 'info_color', $info );
	update_option( 'success_color', $success );
	update_option( 'warning_color', $warning );

    echo 1;

    exit;
}

add_action( 'wp_enqueue_scripts', 'remove_woocommerce_styles_scripts', 9999 );

function remove_woocommerce_styles_scripts() {
    if ( function_exists( 'is_woocommerce' ) ) {
            # The styles
            wp_dequeue_style( 'woocommerce-general' );
            wp_dequeue_style( 'woocommerce-layout' );
            wp_dequeue_style( 'woocommerce-smallscreen' );
            wp_dequeue_style( 'woocommerce-cart' );
			wp_dequeue_style( 'woocommerce-checkout' );
			wp_dequeue_style( 'woocommerce-checkout-overview' );
			wp_dequeue_style( 'woocommerce-checkout-rating' );
			wp_dequeue_style( 'woocommerce-checkout-review' );
			wp_dequeue_style( 'woocommerce-checkout-review-rating' );
			wp_dequeue_style( 'woocommerce-checkout-review-form' );
			wp_dequeue_style( 'woocommerce-checkout-review-form-rating' );
			wp_dequeue_style( 'woocommerce-checkout-review-form-form' );
			wp_dequeue_style( 'woocommerce-checkout-review-form-form-rating' );
			wp_dequeue_style( 'woocommerce-checkout-review-details' );
			wp_dequeue_style( 'woocommerce-checkout-review-details-rating' );
			wp_dequeue_style( 'woocommerce-checkout-review-details-form' );
			wp_dequeue_style( 'woocommerce-checkout-review-details-form-rating');
		
    }
}

function get_post_navigation_item( $post ){
	return "
	
	<div class='flex flex-col '>
		<div class='flex-shrink-0'>
			<img class='h-44 w-full object-cover' src='".get_the_post_thumbnail_url( $post, array(1184,1376))."' alt=''>
		</div>
		<div class='flex-1 p-5 flex flex-col justify-between bg-white'>
			<div class='flex-1'>
				<p class='text-sm font-medium text-indigo-600'>
					<span> ".get_the_category_list( $post, ', ')." </span>
				</p>
				<a href='".get_the_permalink( $post )."' class='block mt-2'>
					<p class='text-lg font-semibold text-gray-900'>".get_the_title( $post )."</p>
					<p class='text-base text-gray-500'>".get_the_excerpt( $post )."</p>
				</a>
		</div>
		<div class='mt-2 flex items-center'>
			<div class='flex-shrink-0'>
				<div>
					<span class='sr-only'>".get_the_author( $post )."</span>
					<img class='h-10 w-10 rounded-full' src='".get_avatar_url( get_the_author_meta( 'email', get_the_author_ID( $post ) ) )."' alt=''>
				</div>
			</div>
			<div class='ml-3'>
				<p class='text-sm font-medium text-gray-900'>
					<div> ".get_the_author( $post )." </div>
				</p>
				<div class='flex space-x-1 text-sm text-gray-500'>
				<time datetime='".get_the_date( 'Y-m-d', $post )."'>". get_the_date('M d, Y', $post ) ."</time>
			</div>
		</div>
		</div>
	</div>";
}

add_action( 'wp_ajax_send_email', 'send_email' );
add_action('wp_ajax_nopriv_send_email', 'send_email');


function parse_input_vars( $string, $values ) {
	preg_match_all( '/\{(.*)\}/', $string, $tags );
	$out = $string;

	foreach( $tags[0] as $key => $tag) {
		if ( in_array( $tags[1][$key], array_keys( $values ) ) ) {
			$out = str_replace( $tag, $values[ $tags[1][$key] ], $string);
			
		}
    }
	
	return $out;
}

function send_email() {
	$url = wp_get_referer();
	$post_id = url_to_postid( $url ); 
	$post = get_post( $post_id );

	if ( $post ){
		$blocks = parse_blocks( $post->post_content ) ;
		$block_name = $_POST['block_name'];

		foreach ( $blocks as $key => $block ) {

			if ( $block_name && $block_name === $block['blockName'] ) {
				parse_str( $_POST['form_data'], $values );

				$to = $block['attrs']['to'];
				$subject = $block['attrs']['subject'];
				$message = parse_input_vars( $block['attrs']['message'], $values );

				if ( $to && $subject && $message ) {
					wp_mail( $to, $subject, $message );
				}
			}

		}
	}
	echo json_encode($blocks);

    exit;
}


function cptui_register_my_taxes_product_collections() {

	/**
	 * Taxonomy: Product collections.
	 */

	$labels = [
		"name" => esc_html__( "Product collections", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "Product collection", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => esc_html__( "Product collections", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'product_collections', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "product_collections",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "product_collections", [ "product" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_product_collections' );

add_action( 'product_collections_add_form_fields', 'product_collections_add_term_fields' );

function product_collections_add_term_fields( $taxonomy ) {
	?>
		<div class="form-field">
			<label>Featured Image</label>
			<a href="#" class="button upload">Upload image</a>
			<a href="#" class="remove" style="display:none">Remove image</a>
			<input type="hidden" name="product_collections_img" value="">
		</div>
	<?php
}

add_action( 'product_collections_edit_form_fields', 'product_collections_edit_term_fields', 10, 2 );
function product_collections_edit_term_fields( $term, $taxonomy ) {

	// get meta data value
	$text_field = get_term_meta( $term->term_id, 'product_collections_text', true );
	$image_id = get_term_meta( $term->term_id, 'product_collections_img', true );

	?><tr class="form-field">
		<th><label for="product_collections_text">Text Field</label></th>
		<td>
			<input name="product_collections_text" id="product_collections_text" type="text" value="<?php echo esc_attr( $text_field ) ?>" />
			<p class="description">Field description may go here.</p>
		</td>
	</tr>
	<tr class="form-field">
		<th>
			<label for="product_collections_img">Image Field</label>
		</th>
		<td>
			<?php if( $image = wp_get_attachment_image_url( $image_id, 'medium' ) ) : ?>
				<a href="#" class="product_collections-upload">
					<img src="<?php echo esc_url( $image ) ?>" />
				</a>
				<a href="#" class="product_collections-remove">Remove image</a>
				<input type="hidden" name="product_collections_img" value="<?php echo absint( $image_id ) ?>">
			<?php else : ?>
				<a href="#" class="button product_collections-upload">Upload image</a>
				<a href="#" class="product_collections-remove" style="display:none">Remove image</a>
				<input type="hidden" name="product_collections_img" value="">
			<?php endif; ?>
		</td>
	</tr><?php
}

add_action( 'created_product_collections', 'product_collections_save_term_fields' );
add_action( 'edited_product_collections', 'product_collections_save_term_fields' );
function product_collections_save_term_fields( $term_id ) {
	update_term_meta(
		$term_id,
		'product_collections_img',
		absint( $_POST[ 'product_collections_img' ] )
	);
	
}

add_action( 'wp_ajax_search_products', 'search_products' );
add_action('wp_ajax_nopriv_search_products', 'search_products');

function search_products() {    
    $args = array(
        'post_type'      => array('product'),
        'post_status'    => 'publish',
        'numberposts'    => 4,
		'posts_per_page' => 4,
		's'              => $_POST['s']
    );
    
    $ajaxposts = new WP_Query( $args );

    ob_start();

    while ( $ajaxposts->have_posts() ) {
        $ajaxposts->the_post();

        wc_get_template_part( 'content-product' );
    }

    wp_reset_postdata();

    $response = ob_get_contents();
    ob_end_flush();

    echo $response;

    exit;
}


add_action( 'wp_footer' , 'custom_quantity_fields_script' );
function custom_quantity_fields_script(){
    ?>
    <script type='text/javascript'>
    jQuery( function( $ ) {
        if ( ! String.prototype.getDecimals ) {
            String.prototype.getDecimals = function() {
                var num = this,
                    match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                if ( ! match ) {
                    return 0;
                }
                return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
            }
        }
        // Quantity "plus" and "minus" buttons
        $( document.body ).on( 'click', '.plus, .minus', function() {
            var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
                currentVal  = parseFloat( $qty.val() ),
                max         = parseFloat( $qty.attr( 'max' ) ),
                min         = parseFloat( $qty.attr( 'min' ) ),
                step        = $qty.attr( 'step' );

            // Format values
            if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
            if ( max === '' || max === 'NaN' ) max = '';
            if ( min === '' || min === 'NaN' ) min = 0;
            if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

            // Change the value
            if ( $( this ).is( '.plus' ) ) {
                if ( max && ( currentVal >= max ) ) {
                    $qty.val( max );
                } else {
                    $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            } else {
                if ( min && ( currentVal <= min ) ) {
                    $qty.val( min );
                } else if ( currentVal > 0 ) {
                    $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            }

            // Trigger change event
            $qty.trigger( 'change' );
        });
    });
    </script>
    <?php
}


add_filter( 'woocommerce_add_to_cart_fragments', 'cart_fragments', 10, 1 );

function cart_fragments( $fragments ) {
    $fragments['div.basket-item-count'] = 
	'<div class="basket-item-count relative flex align-center cart-icon">
		<a href="#" class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 flex items-center transition-colors ease-out duration-200 text-sm font-medium border-b-2 -mb-px pt-px main-menu-link">
			<svg class="flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
			</svg>
		</a>
		<span class="text-gray-500 text-sm ml-2 pt-1 cart-items-count" data-cart="'.WC()->cart->get_cart_contents_count().'">'.WC()->cart->get_cart_contents_count().'</span>
	</div>';

	$fragments['ul.minicart'] = '<ul role="list" class="minicart divide-y divide-gray-200">';

	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
		$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ) );

			$fragments['ul.minicart'] .=  '<li class="py-4 flex items-center">';

				$thumbnail = '<img src="'. $image[0] .'" alt="Front of sienna cotton t-shirt." class="flex-none w-16 h-16 rounded-md border border-gray-200">';
				$fragments['ul.minicart'] .= '<a href="'. $product_permalink .'" class="shrink-0">'. $thumbnail . '</a>'; 
				$fragments['ul.minicart'] .= '<div class="ml-4 flex-auto"><h3 class="font-medium text-gray-500 text-sm"><a href="' . $product_permalink . '">' . $_product->get_title() . '</a></h3></div></li>';


	}

	$fragments['ul.minicart'] .= '</ul>';




	
    return $fragments;
}

function has_reviewed_product( $product_id ) {
    global $wpdb;

    $user = wp_get_current_user();

    if( $user->ID == 0 )
        return false;

    $count = $wpdb->get_var( "
        SELECT COUNT(comment_ID) FROM {$wpdb->prefix}comments
        WHERE comment_post_ID = $product_id
        AND comment_author_email = '{$user->user_email}'
    " );

    return $count > 0 ? true : false;
}

add_filter( 'woocommerce_checkout_fields', 'bbloomer_labels_inside_checkout_fields', 9999 );
   
function bbloomer_labels_inside_checkout_fields( $fields ) {
   foreach ( $fields as $section => $section_fields ) {
      foreach ( $section_fields as $section_field => $section_field_settings ) {
         $fields[$section][$section_field]['placeholder'] = $fields[$section][$section_field]['label'];
         $fields[$section][$section_field]['label'] = '';
      }
   }
   return $fields;
}


add_shortcode('product_details_accordion', 'product_details_accordion' );

function product_details_accordion( $atts ) {
	$title = $atts['title'];
	$content = $atts['content'];

	return '<div class="border-t divide-y divide-gray-200">
				<div>
				<h3>
					<!-- Expand/collapse question button -->
					<button type="button" class="group relative w-full py-6 flex justify-between items-center text-left" aria-controls="disclosure-1" aria-expanded="false">
					<!-- Open: "text-indigo-600", Closed: "text-gray-900" -->
					<span class="text-gray-900 text-sm font-medium"> '. $title .' </span>
					<span class="ml-6 flex items-center">
						<!--
						Heroicon name: outline/plus-sm

						Open: "hidden", Closed: "block"
						-->
						<svg class="block h-6 w-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
						</svg>
						<!--
						Heroicon name: outline/minus-sm

						Open: "block", Closed: "hidden"
						-->
						<svg class="hidden h-6 w-6 text-indigo-400 group-hover:text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6"></path>
						</svg>
					</span>
					</button>
				</h3>
				<div class="pb-6 prose prose-sm" id="disclosure-1">
					'. $content .'
				</div>
				
				</div>

			</div>';
}


add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_excerpt', 30 );




// add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 *  <snip />
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
// function my_theme_register_required_plugins() {
// 	/*
// 	 * Array of plugin arrays. Required keys are name and slug.
// 	 * If the source is NOT from the .org repo, then source is also required.
// 	 */
// 	$plugins = array(

// 		// This is an example of how to include a plugin bundled with a theme.
// 		array(
// 			'name'               => 'TGM Example Plugin',
// 			'slug'               => 'tgm-example-plugin',
// 			'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip',
// 			'required'           => true
// 			'version'            => '',
// 			'force_activation'   => true,
// 			'force_deactivation' => false,
// 			'external_url'       => '',
// 			'is_callable'        => '',
// 		),

// 		// This is an example of how to include a plugin from the WordPress Plugin Repository.
// 		array(
// 			'name'      => 'BuddyPress',
// 			'slug'      => 'buddypress',
// 			'required'  => false,
// 		),
		
// 	);

// 	$config = array(
// 		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
// 		'default_path' => '',                      // Default absolute path to bundled plugins.
// 		'menu'         => 'tgmpa-install-plugins', // Menu slug.
// 		'parent_slug'  => 'themes.php',            // Parent menu slug.
// 		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
// 		'has_notices'  => true,                    // Show admin notices or not.
// 		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
// 		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
// 		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
// 		'message'      => '',                      // Message to output right before the plugins table.
// 		/*
// 		'strings'      => array(
// 			'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
// 			'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
// 			// <snip>...</snip>
// 			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
// 		)
// 		*/
// 	);

// 	tgmpa( $plugins, $config );

// }


function get_cat_tree( $parent, $categories ) {
    $result = array();

    foreach( $categories as $category ) {
        if ($parent == $category->category_parent) {
            $category->children = get_cat_tree($category->cat_ID,$categories);
            $result[] = $category;
        }
    }
    return $result;
}


function category_has_children() {
	global $wpdb;
	$term = get_queried_object();
	$category_children_check = $wpdb->get_results(" SELECT * FROM wp_term_taxonomy WHERE parent = '$term->term_id' ");

	if ( $category_children_check ) {
		return true;
	} else {
		return false;
	}
}

function render_category_tree( $categories, $count = 0 ) {

	foreach( $categories as $cat ) {
	
		echo '<div class="pl-['. $count .'px] flex items-center"><input data-count="'. $cat->category_count .'" id="filter-category-0" name="Category[]" data-attribute="Category" value="'. $cat->term_id .'" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500"><label for="filter-category-0" class="ml-3 pr-6 text-sm font-medium text-gray-900 whitespace-nowrap">'.$cat->name.'</label></div>';

		if ( category_has_children( $cat->cat_ID ) ) {
			$count = $count + 10;
			render_category_tree( $cat->children, $count );
			$count = $count - 10;
		} else {
			$count = 0;
		}

	}
}


add_action( 'init', 'smartwp_disable_emojis' );

function smartwp_disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}

function disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
 return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
 return array();
 }
}

add_filter( 'rest_authentication_errors', function( $result ) {
    if ( true === $result || is_wp_error( $result ) ) {
        return $result;
    }

    if ( ! is_user_logged_in() ) {
        return new WP_Error(
            'rest_not_logged_in',
            __( 'You are not currently logged in.' ),
            array( 'status' => 401 )
        );
    }

    return $result;
});

remove_action('wp_head', 'wp_generator'); 

function itsme_disable_feed() {
	wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}

add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);

remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

