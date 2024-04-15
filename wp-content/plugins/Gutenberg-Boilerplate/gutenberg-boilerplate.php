<?php
/**
 * Plugin Name: Cadre
 * Plugin URI: https://naubly.com/
 * Description: A set of blocks for the Gutenbergerg project.
 * Author URI: https://naubly.com/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define global constants.
 *
 * @since 1.0.0
 */
if ( ! defined( 'GB_VERSION' ) ) {
	define( 'GB_VERSION', '1.0.0' );
}

if ( ! defined( 'GB_NAME' ) ) {
	define( 'GB_NAME', trim( dirname( plugin_basename( __FILE__ ) ), '/' ) );
}

if ( ! defined( 'GB_DIR' ) ) {
	define( 'GB_DIR', WP_PLUGIN_DIR . '/' . GB_NAME );
}

if ( ! defined( 'GB_URL' ) ) {
	define( 'GB_URL', WP_PLUGIN_URL . '/' . GB_NAME );
}


add_action( 'enqueue_block_editor_assets', 'gb_block_editor_assets' );

function gb_block_editor_assets() {
	wp_enqueue_script(
		'gb-tailwind',
		plugin_dir_url( __FILE__ ) . 'tailwind.js',
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ),
		'3.2.4'
	);

	wp_localize_script( 'gb-tailwind', 'plugin_url', array( 'url' => plugin_dir_url( __FILE__ ) ) );

	wp_enqueue_style(
		'editor-styles',
		plugin_dir_url( __FILE__ ) . 'editor-styles.css',
		array(),
		'1.0.0'
	);
}

add_filter( 'block_categories_all' , function( $categories ) {

	$custom = array(
		"heroes",
		"header",
		"logo-clouds",
		"feature",
		"testimonials",
		"content",
		"blog",
		"team",
		"newsletter",
		"stats",
		"cta",
		"pricing",
		"faq",
		"contact",
		"footer",
	);

	foreach( $custom as $cat ) {

		$categories[] = array(
			'slug'  => $cat,
			'title' => $cat
		);
	}

	return $categories;
} );


require_once( GB_DIR . '/blocks/team/withsmallimages/index.php' );
require_once( GB_DIR . '/blocks/footer/4columnwithnewsletterandlocalization/index.php' );
require_once( GB_DIR . '/blocks/footer/4columnwithnewsletterdark/index.php' );
require_once( GB_DIR . '/blocks/footer/simplecentered/index.php' );
require_once( GB_DIR . '/blocks/footer/columnwithcompanymission/index.php' );
require_once( GB_DIR . '/blocks/footer/sociallinksonly/index.php' );
require_once( GB_DIR . '/blocks/footer/4columnwithnewsletter/index.php' );
require_once( GB_DIR . '/blocks/footer/4columnwithnewsletterandlocalizationdark/index.php' );
require_once( GB_DIR . '/blocks/contact/simplefourcolumn/index.php' );
require_once( GB_DIR . '/blocks/contact/centered/index.php' );
require_once( GB_DIR . '/blocks/contact/sidebysidegrid/index.php' );
require_once( GB_DIR . '/blocks/contact/splitwithimage/index.php' );
require_once( GB_DIR . '/blocks/contact/splitbrandpanel/index.php' );
require_once( GB_DIR . '/blocks/contact/splittwotone/index.php' );
require_once( GB_DIR . '/blocks/contact/simpletwocolumn/index.php' );
require_once( GB_DIR . '/blocks/testimonials/withoverlappingimage/index.php' );
require_once( GB_DIR . '/blocks/testimonials/simplecentered/index.php' );
require_once( GB_DIR . '/blocks/testimonials/withlargeavatar/index.php' );
require_once( GB_DIR . '/blocks/testimonials/sidebysideonbrand/index.php' );
require_once( GB_DIR . '/blocks/testimonials/withbackgroundimage/index.php' );
require_once( GB_DIR . '/blocks/heroes/darkwithillustration/index.php' );
require_once( GB_DIR . '/blocks/heroes/splitwithscreenshots/index.php' );
require_once( GB_DIR . '/blocks/heroes/simplecentered/index.php' );
require_once( GB_DIR . '/blocks/heroes/cardwithbackgroundimage/index.php' );
require_once( GB_DIR . '/blocks/heroes/signupwithvideo/index.php' );
require_once( GB_DIR . '/blocks/heroes/withsigninform/index.php' );
require_once( GB_DIR . '/blocks/heroes/withappscreenshot/index.php' );
require_once( GB_DIR . '/blocks/heroes/splitwithnavbar/index.php' );
require_once( GB_DIR . '/blocks/heroes/withangledimageonright/index.php' );
require_once( GB_DIR . '/blocks/faq/twocolumns/index.php' );
require_once( GB_DIR . '/blocks/faq/threecolumnswithintroduction/index.php' );
require_once( GB_DIR . '/blocks/faq/threecolumns/index.php' );
require_once( GB_DIR . '/blocks/faq/centeredaccordion/index.php' );
require_once( GB_DIR . '/blocks/faq/twocolumnswithdescription/index.php' );
require_once( GB_DIR . '/blocks/faq/twocolumnsonbrand/index.php' );
require_once( GB_DIR . '/blocks/faq/offsetwithsupportingtext/index.php' );
require_once( GB_DIR . '/blocks/faq/sidebyside/index.php' );
require_once( GB_DIR . '/blocks/faq/twocolumnswithdescriptionondark/index.php' );
require_once( GB_DIR . '/blocks/cta/brandpanelwithappscreenshot/index.php' );
require_once( GB_DIR . '/blocks/cta/simplestacked/index.php' );
require_once( GB_DIR . '/blocks/cta/simplejustified/index.php' );
require_once( GB_DIR . '/blocks/cta/simplejustifiedonlightbrand/index.php' );
require_once( GB_DIR . '/blocks/cta/simplecentered/index.php' );
require_once( GB_DIR . '/blocks/cta/simplecenterbranded/index.php' );
require_once( GB_DIR . '/blocks/cta/brandpanelwithoverlappingimage/index.php' );
require_once( GB_DIR . '/blocks/cta/splitwithimage/index.php' );
require_once( GB_DIR . '/blocks/content/twocolumnswithimage/index.php' );
require_once( GB_DIR . '/blocks/content/twocolumns/index.php' );
require_once( GB_DIR . '/blocks/content/centered/index.php' );
require_once( GB_DIR . '/blocks/content/twocolumnswithtestimonial/index.php' );
require_once( GB_DIR . '/blocks/content/splitwithimage/index.php' );
require_once( GB_DIR . '/blocks/content/withtestimonialandstats/index.php' );
require_once( GB_DIR . '/blocks/blog/3columncards/index.php' );
require_once( GB_DIR . '/blocks/blog/2columnswithsignup/index.php' );
require_once( GB_DIR . '/blocks/blog/3columnwithbadges/index.php' );
require_once( GB_DIR . '/blocks/team/teammember/index.php' );
require_once( GB_DIR . '/blocks/team/teammembergrid/index.php' );
require_once( GB_DIR . '/blocks/team/teammemberdark/index.php' );
require_once( GB_DIR . '/blocks/team/teammembersmall/index.php' );
require_once( GB_DIR . '/blocks/team/darkversionwithlargeimages/index.php' );
require_once( GB_DIR . '/blocks/team/withsmallimages/index.php' );
require_once( GB_DIR . '/blocks/team/withlargeimages/index.php' );
require_once( GB_DIR . '/blocks/team/gridwithroundimages/index.php' );
require_once( GB_DIR . '/blocks/team/fullwidthwithverticalimages/index.php' );
require_once( GB_DIR . '/blocks/team/withimageandshortparagraph/index.php' );
require_once( GB_DIR . '/blocks/team/gridwithlargeroundimages/index.php' );
require_once( GB_DIR . '/blocks/feature/withfeatureslist/index.php' );
require_once( GB_DIR . '/blocks/feature/simplethreecolumn/index.php' );
require_once( GB_DIR . '/blocks/feature/alternativesidebysidewithimages/index.php' );
require_once( GB_DIR . '/blocks/feature/alternatingwithoptionaltestimonial/index.php' );
require_once( GB_DIR . '/blocks/feature/withlargescreenshot/index.php' );
require_once( GB_DIR . '/blocks/feature/centered2x2grid/index.php' );
require_once( GB_DIR . '/blocks/feature/withfeaturegridlist/index.php' );
require_once( GB_DIR . '/blocks/feature/offset2x2grid/index.php' );
require_once( GB_DIR . '/blocks/feature/4x2gridonbrand/index.php' );
require_once( GB_DIR . '/blocks/feature/gridwithoffseticons/index.php' );
require_once( GB_DIR . '/blocks/newsletter/simplestacked/index.php' );
require_once( GB_DIR . '/blocks/newsletter/withparagraphonbrandcard/index.php' );
require_once( GB_DIR . '/blocks/newsletter/withdescriptiononbrand/index.php' );
require_once( GB_DIR . '/blocks/newsletter/simplewithdescription/index.php' );
require_once( GB_DIR . '/blocks/newsletter/centeredcardwithgraphic/index.php' );
require_once( GB_DIR . '/blocks/newsletter/withdescriptiononbrandcard/index.php' );
require_once( GB_DIR . '/blocks/newsletter/withparagraphondark/index.php' );
require_once( GB_DIR . '/blocks/pricing/singlepricewithdetails/index.php' );
require_once( GB_DIR . '/blocks/pricing/withcomparisontable/index.php' );
require_once( GB_DIR . '/blocks/pricing/threetiersonbrandandfeaturecomparison/index.php' );
require_once( GB_DIR . '/blocks/pricing/fourtierwithtoggle/index.php' );
require_once( GB_DIR . '/blocks/pricing/threetierswithemphasizedtier/index.php' );
require_once( GB_DIR . '/blocks/pricing/splitwithbrandpanel/index.php' );
require_once( GB_DIR . '/blocks/pricing/singlepricewithfeaturelist/index.php' );
require_once( GB_DIR . '/blocks/pricing/threetiers/index.php' );
require_once( GB_DIR . '/blocks/pricing/twotierswithextratier/index.php' );
require_once( GB_DIR . '/blocks/logo-clouds/simplewithheading/index.php' );
require_once( GB_DIR . '/blocks/logo-clouds/simple/index.php' );
require_once( GB_DIR . '/blocks/logo-clouds/splitwithgridonright/index.php' );
require_once( GB_DIR . '/blocks/logo-clouds/offwhitegrid/index.php' );
require_once( GB_DIR . '/blocks/logo-clouds/simplewithheadingonbrand/index.php' );
require_once( GB_DIR . '/blocks/header/brandedwithbackgroundimage/index.php' );
require_once( GB_DIR . '/blocks/header/simplewithselectmenudark/index.php' );
require_once( GB_DIR . '/blocks/header/simplecentered/index.php' );
require_once( GB_DIR . '/blocks/header/withbackgroundimageandoverlappingcards/index.php' );
require_once( GB_DIR . '/blocks/header/simplewithselectmenu/index.php' );
require_once( GB_DIR . '/blocks/stats/withfadingbackgroundimage/index.php' );
require_once( GB_DIR . '/blocks/stats/splitwithimage/index.php' );
require_once( GB_DIR . '/blocks/stats/smpleincard/index.php' );
require_once( GB_DIR . '/blocks/stats/simpleonbrand/index.php' );