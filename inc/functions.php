<?php
/**
 * Returns the timezone string for a WP site, even if set to UTC offset
 * 
 * Adapted from http://www.php.net/manual/en/function.timezone-name-from-abbr.php#89155
 * @link    https://www.skyverge.com/blog/down-the-rabbit-hole-wordpress-and-timezones/
 * 
 * @since   0.0.1
 * @return  string  valid PHP timezone string
 */
if( !function_exists( 'wp_get_timezone_string' ) ) {
    function wp_get_timezone_string() {
        
        // If site timezone string exists, return it
        if ( $timezone = get_option( 'timezone_string ' ) )
                return $timezone;
        
        // Get UTC offset, if it isn't set then return UTC
        if ( 0 === ( $utc_offset = get_option( 'gmt_offset', 0 ) ) )
                return 'UTC';
        
        // Adjust UTC offset from hours to seconds
        $utc_offset *= 3600;
        
        // Attempt to guess the timezone string from the UTC offset
        if ( $timezone = timezone_name_from_abbr( '', $utc_offset, 0 ) ) 
                return $timezone;
        
        // Last try, guess timezone string manually
        $is_dst = date( 'I' );
        
        foreach ( timezone_abbreviations_list() as $abbr ) {
            foreach ( $abbr as $city ) {
                if ( $city[ 'dst' ] == $is_dst && $city[ 'offset' ] == $utc_offset )
                    return $city[ 'timezone_id' ];
            }
        }
        
        // Fallback to UTC
        return 'UTC';
    }
}

/*
 * Round a time to the nearest X minutes
 */
function round_time( $time_string ) {
    $time = explode( ':', $time_string );
    $hours = $time[0];
    $minutes = $time[1];
    return $hours . ":" . ( $minutes - ( $minutes % 15 ) );
}

function timezone_select_options( $selected_timezone=NULL ) {
    $tz_ids = timezone_identifiers_list();
    // $tz_ids = DateTimeZone::listIdentifiers();
    
    if( $selected_timezone == NULL ) {
        $selected_timezone = wp_get_timezone_string();
    }
    
    $output = "";
    
    $dt = new DateTime( 'now' );
    foreach( $tz_ids as $zone ) {
        $this_tz = new DateTimeZone( $zone );
        $dt->setTimezone( $this_tz );
        $offset = $dt->format( 'P' );
        $zoneArr = explode( '/', $zone );
        
        $continent = $zoneArr[0];
        $city = isset( $zoneArr[1] ) ? ' &rarr; ' . str_replace( '_', ' ', $zoneArr[1] ) : '';
        $subcity = isset( $zoneArr[2] ) ? ', ' . str_replace( '_', ' ', $zoneArr[2] ) : '';
        
        $output .= "<option value='" . $zone . "'";
        if( $selected_timezone == $zone ) { $output .= " selected"; }
        $output .= ">";
        $output .= "(UTC $offset) " . $continent . $city . $subcity;
        $output .= "</option>";
    }
    return $output;
}

function timezone_select_city( $selected_city=NULL ) {
    $tz_ids = timezone_identifiers_list();
    // $tz_ids = DateTimeZone::listIdentifiers();
    
    /*
     * 1. Get the list of Timezones
     * 2. Break it into parts that we can recombine later
     * 3. Output the continent part
     * 4. Send to JSON so JavaScript/jQuery can use the data to dynamically recreate second dropdown
     */
    
    $continent_ids = array(
            'Africa',
            'America',
            'Antarctica',
            'Arctic',
            'Asia',
            'Atlantic',
            'Australia',
            'Europe',
            'Indian',
            'Pacific',
            'UTC'
    );
    
    $output = "";
    $contArr = array();
    $i = 0;
    
    $dt = new DateTime( 'now' );
    foreach( $tz_ids as $zone ) {
        $this_tz = new DateTimeZone( $zone );
        $dt->setTimezone( $this_tz );
        $offset = $dt->format( 'P' );
        
        $zoneArr = explode( '/', $zone );
        if( !in_array( $zoneArr[0], $continent_ids ) ) 
                continue;
        
        $continent = isset( $zoneArr[0] ) ? $zoneArr[0] : '';
        $city = isset( $zoneArr[1] ) ? '/' . $zoneArr[1] : '';
        $subcity = isset( $zoneArr[2] ) ? '/' . $zoneArr[2] : '';
        
        
        $output .= "<option value='" . $continent . $city . $subcity . "'";
        if( $selected_city == $city ) { $output .= " selected"; }
        $output .= ">";
        if( $city == '' ) {
            $output .= $continent;
        } else {
            if( $subcity == '' ) {
                $output .= str_replace( '_', ' ', substr( $city, 1 ) ); // . " (UTC/GMT $offset)";
            } else {
                $output .= str_replace( '_', ' ', substr( $city, 1 ) ) . ', ' . str_replace( '_', ' ', substr( $subcity, 1 ) );
            }
        }
        $output .= "</option>";
    }
    return $output;
}

function timezone_select_continent( $selected_continent=NULL ) {
    // $tz_ids = timezone_identifiers_list();
    // $tz_ids = DateTimeZone::listIdentifiers();
    $continent_ids = array(
            'Africa',
            'America',
            'Antarctica',
            'Arctic',
            'Asia',
            'Atlantic',
            'Australia',
            'Europe',
            'Indian',
            'Pacific',
            'UTC'
    );
    
    $output = "";
    
    $dt = new DateTime( 'now' );
    foreach( $continent_ids as $continent ) {
        // $this_ct = new DateTimeZone( $zone );
        // $dt->setTimezone( $this_tz );
        // $offset = $dt->format( 'P' );
        
        $output .= "<option value='" . $continent . "'";
        if( $selected_continent == $continent ) { $output .= " selected"; }
        $output .= ">";
        $output .= $continent; // . " (UTC/GMT $offset)";
        $output .= "</option>";
    }
    return $output;
}

/**
 * Generic function to output select option values
 * We just need an assc array with key=>value pairs
 *
 * @param   array   Associative array with key=>value pairs
 * @param   string  Selected value
 *
 * @return  string  List of options
 */
function select_options_for( $assc_array, $selected_value=NULL ) {
    $output = '';
    foreach( $assc_array as $key => $value ) {
        $output .= "<option value='" . $key . "'";
        if( $selected_value == $key ) { $output .= " selected"; }
        $output .= ">";
        $output .= $value;
        $output .= "</option>";
    }
    return $output;
}

function month_select_options( $selected_month=NULL ) {
    $months = array(
        1  => 'January',
        2  => 'February',
        3  => 'March',
        4  => 'April',
        5  => 'May',
        6  => 'June',
        7  => 'July',
        8  => 'August',
        9  => 'September',
        10 => 'October',
        11 => 'November',
        12 => 'December'
    );
    if( is_null( $selected_month ) ) {
        $selected_month = date( 'n' );
    }
    return select_options_for( $months, $selected_month );
}

function day_select_options( $selected_day=NULL ) {
    $range = range( 1, 31 );
    $days = array_combine( $range, $range );
    if( is_null( $selected_day ) ) {
        $selected_day = date( 'd' );
    }
    return select_options_for( $days, $selected_day );
}

function year_select_options( $selected_year=NULL ) {
    $start_year = (int) date( 'Y' );
    $end_year = $start_year + 5;
    $range = range( $start_year, $end_year );
    $years = array_combine( $range, $range );
    if( is_null( $selected_year ) ) {
        $selected_year = $start_year;
    }
    return select_options_for( $years, $selected_year );
}

function hour_option_format( $hour ) {
    $hour_ampm = $hour < 12 ? $hour : $hour - 12;
    if( $hour_ampm == 0 ) { $hour_ampm = 12; }
    // $ampm = $hour < 12 ? 'am' : 'pm';
    // $output = str_pad( $hour, 2, '0', STR_PAD_LEFT );
    $output = "$hour_ampm";
    return $output;
}

function hour_select_options( $selected_hour=NULL ) {
    $range = range( 1, 12 );
    $labels = array_map( 'hour_option_format', $range );
    $hours = array_combine( $range, $labels );
    if( is_null( $selected_hour ) ) {
        $selected_hour = date( 'G' );
    }
    return select_options_for( $hours, $selected_hour );
}

function minute_option_format( $minute ) {
    return str_pad( $minute, 2, '0', STR_PAD_LEFT );
}

function minute_select_options( $selected_minute=NULL ) {
    $range = range( 0, 59, 5 );
    $labels = array_map( 'minute_option_format', $range );
    $minutes = array_combine( $range, $labels );
    if( is_null( $selected_minute ) ) {
        $selected_minute = date( 'i' );
    }
    return select_options_for( $minutes, $selected_minute );
}

function time_select_options( $selected_time=NULL ) {
    if( is_null( $selected_time ) ) {
        $selected_time = date( 'H:i' );
    }
    $hour_range = range( 1, 12 );
    $hour_labels = array_map( 'hour_option_format', $hour_range );
    $minute_range = range( 0, 59, 15 );
    $minute_labels = array_map( 'minute_option_format', $minute_range );
    
    $timeArr = array();
    
    foreach( $hour_labels as $hour ) {
        foreach( $minute_labels as $minute ) {
            $timeArr[] = "$hour:$minute";
        }
    }
    $time = array_combine( $timeArr, $timeArr );
    return select_options_for( $time, $selected_time );
}

function ampm_select_options( $selected_ampm=NULL ) {
    $ampm = array( 'am' => 'am', 'pm' => 'pm' );
    if( is_null( $selected_ampm ) ) {
        $selected_ampm = 'am';
    }
    return select_options_for( $ampm, $selected_ampm );
}