<?php
/**
 * Sanitization functions for Theme/Customzer Options
 *
 * @package Catch Themes
 * @subpackage Clean Magazine
 * @since Clean Magazine 0.2
 */

/**
 * Sanitizes Checkboxes
 * @param  $input entered value
 * @return sanitized output
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_sanitize_checkbox( $checked ) {
    // Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}


/**
 * Sanitizes Custom CSS
 * @param  $input entered value
 * @return sanitized output
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_sanitize_custom_css( $input ) {
	if ( $input != '' ) {
        $input = str_replace( '<=', '&lt;=', $input );

        $input = wp_kses_split( $input, array(), array() );

        $input = str_replace( '&gt;', '>', $input );

        $input = strip_tags( $input );

        return $input;
 	}
    else {
    	return '';
    }
}


/**
 * Image sanitization callback example.
 *
 * Checks the image's file extension and mime type against a whitelist. If they're allowed,
 * send back the filename, otherwise, return the setting default.
 *
 * - Sanitization: image file extension
 * - Control: text, WP_Customize_Image_Control
 *
 * @see wp_check_filetype() https://developer.wordpress.org/reference/functions/wp_check_filetype/
 *
 * @param string               $image   Image filename.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string The image filename if the extension is allowed; otherwise, the setting default.
 */
function clean_magazine_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}


/**
 * Sanitizes page/post in slider
 * @param  $input entered value
 * @return sanitized output
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_sanitize_page( $input ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $input );
	// If $page_id is an ID of a published page, return it; otherwise, return false
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : false );
}


/**
 * Sanitizes category list in slider
 * @param  $input entered value
 * @return sanitized output
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_sanitize_category_list( $input ) {
	if ( $input != '' ) {
		$args = array(
						'type'			=> 'post',
						'child_of'      => 0,
						'parent'        => '',
						'orderby'       => 'name',
						'order'         => 'ASC',
						'hide_empty'    => 0,
						'hierarchical'  => 0,
						'taxonomy'      => 'category',
					);

		$categories = ( get_categories( $args ) );

		$category_list 	=	array();

		foreach ( $categories as $category )
			$category_list 	=	wp_parse_args( $category_list, array( $category->term_id ) );

		if ( count( array_intersect( $input, $category_list ) ) == count( $input ) ) {
	    	return $input;
	    }
	    else {
    		return '';
   		}
    }
    else {
    	return '';
    }
}


/**
 * Number Range sanitization callback example.
 *
 * - Sanitization: number_range
 * - Control: number, tel
 *
 * Sanitization callback for 'number' or 'tel' type text inputs. This callback sanitizes
 * `$number` as an absolute integer within a defined min-max range.
 *
 * @see absint() https://developer.wordpress.org/reference/functions/absint/
 *
 * @param int                  $number  Number to check within the numeric range defined by the setting.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return int|string The number, if it is zero or greater and falls within the defined range; otherwise,
 *                    the setting default.
 */
function clean_magazine_sanitize_number_range( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;


	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}


/**
 * Select sanitization callback example.
 *
 * - Sanitization: select
 * - Control: select, radio
 *
 * Sanitization callback for 'select' and 'radio' type controls. This callback sanitizes `$input`
 * as a slug, and then validates `$input` against the choices defined for the control.
 *
 * @see clean_magazine_sanitize_select()               https://developer.wordpress.org/reference/functions/clean_magazine_sanitize_select/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param string               $input   Slug to sanitize.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
 */
function clean_magazine_sanitize_select( $input, $setting ) {
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


/**
 * Reset all settings to default
 * @param  $input entered value
 * @return sanitized output
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_reset_all_settings( $input ) {
	if ( $input == 1 ) {
        // Set default values
        set_theme_mod( 'clean_magazine_theme_options', clean_magazine_get_default_theme_options() );

        // Remove background color and image
		remove_theme_mod( 'background_color' );
		remove_theme_mod( 'background_image' );
		remove_theme_mod( 'background_repeat' );
		remove_theme_mod( 'background_position_x' );
		remove_theme_mod( 'background_attachment' );

		// Remove header image
		remove_theme_mod( 'header_image' );
		remove_theme_mod( 'header_image_data' );

		//Remove Header Textcolor
		remove_theme_mod( 'header_textcolor' );

        // Flush out all transients	on reset
        clean_magazine_flush_transients();

    }
    else {
        return '';
    }
}


/**
 * Dummy Sanitizaition function as it contains no value to be sanitized
 *
 * @since Clean Magazine 0.2
 */
function clean_magazine_sanitize_important_link() {
	return false;
}

