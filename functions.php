<?php
/**
 * This is child themes functions.php file. All modifications should be made in this file.
 *
 * All style changes should be in child themes style.css file.
 *
 * @package    Toivo Lite Example
 * @version    1.0.0
 * @author     Sami Keijonen <sami.keijonen@foxnet.fi>
 * @copyright  Copyright (c) 2015, Sami Keijonen
 * @link       https://foxland.fi
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Setup function. All child themes should run their setup within this function. The idea is to add/remove 
 * filters and actions after the parent theme has been set up. This function provides you that opportunity.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function toivo_lite_example_theme_setup() {

	/* Load child theme text domain. */
	load_child_theme_textdomain( 'toivo-lite-example', get_stylesheet_directory() . '/languages' );
	
	/*
	 * Add a custom background to overwrite the defaults. Remove this section if you want to use 
	 * the parent theme defaults instead.
	 *
	 * @link http://codex.wordpress.org/Custom_Backgrounds
	 */
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f6f6f4',
			'default-image' => ''
		)
	);
	
	/*
	 * Add a custom header to overwrite the defaults. Remove this section if you want to use the 
	 * the parent theme defaults instead.
	 *
	 * @link http://codex.wordpress.org/Custom_Headers
	 */
	add_theme_support(
		'custom-header',
		array(
			'default-image'      => get_stylesheet_directory_uri() . '/images/header-image.jpg',
			'default-text-color' => 'f2f2f2',
			'height'             => 550
		)
	);
	
	/* Add child theme fonts to editor styles. */
	add_editor_style( toivo_lite_example_fonts_url() );
	
}
add_action( 'after_setup_theme', 'toivo_lite_example_theme_setup', 11 );

/**
 * Enqueue scripts and styles. 
 *
 * @since  1.0.0
 */
function toivo_lite_example_scripts() {
	
	/* Dequeue parent fonts. */
	wp_dequeue_style( 'toivo-lite-fonts' );
	
	/* Enqueue child theme fonts. */
	wp_enqueue_style( 'toivo-lite-example-fonts', toivo_lite_example_fonts_url(), array(), null );
	
}
add_action( 'wp_enqueue_scripts', 'toivo_lite_example_scripts', 11 );

/**
 * Filter default header background color from the Customizer. 
 *
 * @since  1.0.0
 */
function toivo_lite_example_header_background_color() {
	return '#f8f8f4';
}
add_filter( 'toivo_lite_default_bg_color', 'toivo_lite_example_header_background_color' );

/**
 * Filter default header background color from the Customizer. 
 *
 * @since  1.0.0
 */
function toivo_lite_example_header_bg_color_opacity() {
	return 10;
}
add_filter( 'toivo_lite_default_bg_opacity', 'toivo_lite_example_header_bg_color_opacity' );

/**
 * Add action for new Callout section.
 *
 * @since  1.0.0
 */
function toivo_lite_example_callout() {
	?>
	
	<div class="toivo-callout toivo-callout-new">
		<div class="entry-inner">
			<div class="toivo-callout-text">
				This is new Callout section and example how to use add_action
			</div>
			<div class="toivo-callout-link">
				<a class="toivo-button toivo-callout-link-anchor" href="https://foxland.fi">Visit Foxland</a>
			</div>
		</div>
	</div>
	
	<?php
}
add_action( 'toivo_after_front_page_sidebar', 'toivo_lite_example_callout' );

/**
 * Return the Google font stylesheet URL
 *
 * @since  1.0.0
 * @return string
 */
function toivo_lite_example_fonts_url() {
	
	$fonts_url = '';
	
	/* Translators: If there are characters in your language that are not
	 * supported by Open Sans, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'toivo-lite-example' );
	
	/* Translators: If there are characters in your language that are not
	 * supported by Nunito, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$nunito = _x( 'on', 'Nunito font: on or off', 'toivo-lite-example' );
	
	if ( 'off' !== $open_sans || 'off' !== $nunito ) {
		
		$font_families = array();
		
		if ( 'off' !== $open_sans )
			$font_families[] = 'Open Sans:300italic,400italic,700italic,400,700,300';
		
		if ( 'off' !== $nunito )
			$font_families[] = 'Nunito:400,700,300';
		
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}
	
	return $fonts_url;
}