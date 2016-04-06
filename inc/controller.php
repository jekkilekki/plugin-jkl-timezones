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
    $from_date = date( 'Y\-m\-j' );
    
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
 * If submit button is pressed, calculate
 */
if( isset( $_POST[ 'jkl_tz_submit' ] ) ) {
    
    
    $from_date = $_POST[ 'jkl_tz_from_date' ];
    $from_time = $_POST[ 'jkl_tz_from_time' ];
    $ampm = isset( $_POST[ 'jkl_tz_am' ] ) ? 'am' : 'pm';
    $from_time_str = $from_time . ':00' . $ampm;
    $from_tz = $_POST[ 'jkl_tz_from_tz' ];
    $to_tz = $_POST[ 'jkl_tz_to_tz' ];
    
    // Do some error checking / sanitizing here
    $original_time = $from_date . " " . $from_time_str;
    
    // Prevent injection/hacking
    $tz_ids = timezone_identifiers_list();
    if( in_array( $from_tz, $tz_ids ) && in_array( $to_tz, $tz_ids ) ) {
        $from_tz_obj = new DateTimeZone( $from_tz );
        $to_tz_obj = new DateTimeZone( $to_tz );
        $converted_time = new DateTime( $original_time, $from_tz_obj );
        $converted_time->setTimezone( $to_tz_obj );
    }
}
