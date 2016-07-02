<?php
/**
 * The main template for implementing Theme/Customzer Options
 *
 * @package Catch Themes
 * @subpackage Clean Magazine
 * @since Clean Magazine 0.2
 */


/**
 * Implements Clean Magazine theme options into Theme Customizer.
 *
 * @param $wp_customize Theme Customizer object
 * @return void
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport			= 'postMessage';

	/**
	  * Set priority of blogname (Site Title) to 1.
	  *  Strangly, if more than two options is added, Site title is moved below Tagline. This rectifies this issue.
	  */
	$wp_customize->get_control( 'blogname' )->priority			= 1;

	$wp_customize->get_setting( 'blogdescription' )->transport	= 'postMessage';

	$options  = clean_magazine_get_theme_options();

	$defaults = clean_magazine_get_default_theme_options();

	//Custom Controls
	require get_template_directory() . '/inc/customizer-includes/clean-magazine-customizer-custom-controls.php';

	// Move Site Title and Tagline (added to Site Title and Tagline section in Theme Customizer)
	$wp_customize->add_setting( 'clean_magazine_theme_options[move_title_tagline]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['move_title_tagline'],
		'sanitize_callback' => 'clean_magazine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'clean_magazine_theme_options[move_title_tagline]', array(
		'label'    => __( 'Check to move Site Title and Tagline before logo', 'clean-magazine' ),
		'priority' => 103,
		'section'  => 'title_tagline',
		'settings' => 'clean_magazine_theme_options[move_title_tagline]',
		'type'     => 'checkbox',
	) );
	// Custom Logo End

	// Header Options (added to Header section in Theme Customizer)
	require get_template_directory() . '/inc/customizer-includes/clean-magazine-customizer-header-options.php';

	//Theme Options
	require get_template_directory() . '/inc/customizer-includes/clean-magazine-customizer-theme-options.php';

	//Header Highlight Content
	require get_template_directory() . '/inc/customizer-includes/clean-magazine-customizer-header-highlight-content.php';

	//Featured Content Setting
	require get_template_directory() . '/inc/customizer-includes/clean-magazine-customizer-featured-content.php';

	//Featured Slider
	require get_template_directory() . '/inc/customizer-includes/clean-magazine-customizer-featured-slider.php';

	//News Ticker
    require get_template_directory() . '/inc/customizer-includes/clean-magazine-customizer-news-ticker.php';

	//Social Links
	require get_template_directory() . '/inc/customizer-includes/clean-magazine-customizer-social-icons.php';

	// Reset all settings to default
	$wp_customize->add_section( 'clean_magazine_reset_all_settings', array(
		'description'	=> __( 'Caution: Reset all settings to default. Refresh the page after save to view full effects.', 'clean-magazine' ),
		'priority' 		=> 700,
		'title'    		=> __( 'Reset all settings', 'clean-magazine' ),
	) );

	$wp_customize->add_setting( 'clean_magazine_theme_options[reset_all_settings]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['reset_all_settings'],
		'sanitize_callback' => 'clean_magazine_reset_all_settings',
		'transport'			=> 'postMessage',
	) );

	$wp_customize->add_control( 'clean_magazine_theme_options[reset_all_settings]', array(
		'label'    => __( 'Check to reset all settings to default', 'clean-magazine' ),
		'section'  => 'clean_magazine_reset_all_settings',
		'settings' => 'clean_magazine_theme_options[reset_all_settings]',
		'type'     => 'checkbox',
	) );
	// Reset all settings to default end


	//Important Links
		$wp_customize->add_section( 'important_links', array(
			'priority' 		=> 999,
			'title'   	 	=> __( 'Important Links', 'clean-magazine' ),
		) );

		/**
		 * Has dummy Sanitizaition function as it contains no value to be sanitized
		 */
		$wp_customize->add_setting( 'important_links', array(
			'sanitize_callback'	=> 'clean_magazine_sanitize_important_link',
		) );

		$wp_customize->add_control( new clean_magazine_Important_Links( $wp_customize, 'important_links', array(
	        'label'   	=> __( 'Important Links', 'clean-magazine' ),
	         'section'  	=> 'important_links',
	        'settings' 	=> 'important_links',
	        'type'     	=> 'important_links',
	    ) ) );
	    //Important Links End
}
add_action( 'customize_register', 'clean_magazine_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously for Clean Magazine.
 * And flushes out all transient data on preview
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_customize_preview() {
	wp_enqueue_script( 'clean_magazine_customizer', get_template_directory_uri() . '/js/clean-magazine-customizer.min.js', array( 'customize-preview' ), '20120827', true );

	//Flush transients
	clean_magazine_flush_transients();
}
add_action( 'customize_preview_init', 'clean_magazine_customize_preview' );


/**
 * Custom scripts and styles on customize.php for Clean Magazine.
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_customize_scripts() {
	wp_enqueue_script( 'clean_magazine_customizer_custom', get_template_directory_uri() . '/js/clean-magazine-customizer-custom-scripts.min.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20150630', true );

	$clean_magazine_misc_links = array(
							'upgrade_link'        => esc_url( 'https://catchthemes.com/themes/clean-magazine-pro/' ),
							'upgrade_text'        => __( 'Upgrade To Pro &raquo;', 'clean-magazine' ),
							'WP_version'          => get_bloginfo( 'version' ),
							'old_version_message' => __( 'Some settings might be missing or disorganized in this version of WordPress. So we suggest you to upgrade to version 4.0 or better.', 'clean-magazine' )
		);

	//Add Upgrade Button and old WordPress message via localized script
	wp_localize_script( 'clean_magazine_customizer_custom', 'clean_magazine_misc_links', $clean_magazine_misc_links );

	wp_enqueue_style( 'clean_magazine_customizer_custom', get_template_directory_uri() . '/css/clean-magazine-customizer.css');
}
add_action( 'customize_controls_enqueue_scripts', 'clean_magazine_customize_scripts');

//Active callbacks for customizer
require get_template_directory() . '/inc/customizer-includes/clean-magazine-customizer-active-callbacks.php';


//Sanitize functions for customizer
require get_template_directory() . '/inc/customizer-includes/clean-magazine-customizer-sanitize-functions.php';
