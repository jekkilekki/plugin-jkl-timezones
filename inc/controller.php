<?php
/**
 * Controller file
 * 
 * The controller that collects data submitted via the form and calculates the results.
 * Sets default values, checks for POST data, validates it, and converts it
 * 
 * @since       1.0.1
 * 
 * @package     JKL_Timezones
 * @subpackage  JKL_Timezones/inc
 * @author      Aaron Snowberger <jekkilekki@gmail.com>
 */

require_once( 'functions.php' );

/*
 *  Set defaults
 */
    // Default TIMEZONES are determined by this function 
    // (either set in WP Options, or guessed based on location, or fallback to UTC)
    date_default_timezone_set( wp_get_timezone_string() );
    $from_tz = wp_get_timezone_string();
    $to_tz = wp_get_timezone_string();

    // Default FROM DATE is today (current date)
    $from_date = date( 'F j, Y (D)' );
    
    // Default FROM TIME is now (rounded by the function provided)
    $from_time = round_time( date( 'g:i' ), 15 ); // round to 15min increments
    
    // Default AM/PM is now
    $ampm = date( 'a' );
    
    // Default FROM TIME STRING is empty
    $from_time_str = '';
    
/*
 * If reset button is pressed, reset the $_POST array
 */
if( isset( $_POST[ 'jkl_tz_reset' ] ) ) {
    $_POST = '';
}

/*
 * If submit button is pressed AND the nonce value is correct, calculate
 */
if( isset( $_POST[ 'jkl_tz_submit' ] ) && wp_verify_nonce( $_POST[ 'jkl_timezones_form' ], 'jkl_timezones' ) ) {
    
    // Valid times
    $valid_times = get_valid_times();
    
    /*
     * Validate & Sanitize form inputs
     */
    $from_date = sanitize_text_field( $_POST[ 'jkl_tz_from_date' ] );
    $from_time = sanitize_text_field( $_POST[ 'jkl_tz_from_time' ] );
    $ampm = isset( $_POST[ 'jkl_tz_am' ] ) ? 'am' : 'pm';
    $from_tz = sanitize_text_field( $_POST[ 'jkl_tz_from_tz' ] );
    $to_tz = sanitize_text_field( $_POST[ 'jkl_tz_to_tz' ] );
    
    /*
     * Be sure the selected time is valid
     */
    if( in_array( $from_time, $valid_times ) ) {
        // Create time string from selected time + 00 seconds + am/pm checkbox
        $from_time_str = $from_time . ':00' . $ampm;
        
        // Truncate off the (Sat) day to get just the date
        $original_time = substr( $from_date, 0, -6 );
        
        // Create a new DateTime object with the specified format
        $original_time = DateTime::createFromFormat( 'F j, Y', $original_time );
        
        // Format the DateTime object properly and add the time string to the end
        $original_time = $original_time->format( 'Y-m-d' ) . " " . $from_time_str;
    }
    
    /*
     * Prevent injection/hacking
     * Be sure the FROM timezone and TO timezone values are valid timezones (from PHP timezone_identifiers_list())
     */
    $tz_ids = timezone_identifiers_list();
    if( in_array( $from_tz, $tz_ids ) && in_array( $to_tz, $tz_ids ) ) {
        $from_tz_obj = new DateTimeZone( $from_tz );
        $to_tz_obj = new DateTimeZone( $to_tz );
        $converted_time = new DateTime( $original_time, $from_tz_obj );
        $converted_time->setTimezone( $to_tz_obj );
    }
}
