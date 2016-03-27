<?php
/**
 * The Front-end display of the Timezones Widget.
 * 
 * Displays time and timezone select options, listens for a form submission, and converts the time entered to the chosen timezone.
 * 
 * @package     JKL_Timezones
 * @subpackage  JKL_Timezones/inc
 * @author      Aaron Snowberger <jekkilekki@gmail.com>
 */

require_once( 'functions.php' );

//if( isset( $_POST[ 'jkl_tz_submit' ] ) ) {
//    $from_date = $_POST[ 'jkl_tz_from_date' ];
//    $from_hour = $_POST[ 'jkl_tz_from_hour' ];
//    $from_minute = $_POST[ 'jkl_tz_from_minute' ];
//    
//    // Do some error checking / sanitizing here
//    $from_time = str_replace( $from_date, '-', '/' ) . " " . $from_hour . ":" . $from_minute;
//    $from_tz_country = $_POST[ 'jkl_tz_from_tz_country' ];
//    $from_tz_city = $_POST[ 'jkl_tz_from_tz_city' ];
//    $to_tz_country = $_POST[ 'jkl_tz_to_tz_country' ];
//    $to_tz_city = $_POST[ 'jkl_tz_to_tz_city' ];
//    
//    // Prevent injection/hacking
//    $tz_ids = timezone_identifiers_list();
//    if( in_array( $from_tz, $tz_ids ) && in_array( $to_tz, $tz_ids ) ) {
//        $from_tz_obj = new DateTimeZone( $from_tz );
//        $to_tz_obj = new DateTimeZone( $to_tz );
//        $converted_time = new DateTime( $from_time, $from_tz_obj );
//        $converted_time->setTimezone( $to_tz_obj );
//    }
//}
?>

<form action="" method="POST">
        
    <dl>
        <dt>From Time:</dt>
        <dd>
            <input name="jkl_tz_from_date" id="jkl-timezones-date"><i class="fa fa-calendar"></i><br>
            <select name="jkl_tz_from_hour" class="time">
                <?= hour_select_options( $from_hour ); ?>
            </select>
            :
            <select name="jkl_tz_from_minute" class="time">
                <?= minute_select_options( $from_minute ); ?>
            </select>
            <select name="jkl_tz_ampm" class="time">
                <?= ampm_select_options( $from_ampm ); ?>
            </select>
        </dd>
    </dl>
    <dl>
        <dt>From Timezone:</dt>
        <dd>
            <select name="jkl_tz_from_tz_country">
                <?= timezone_select_options( $from_tz_continent ); ?>
            </select>
            <select name="jkl_tz_from_tz_city">
                <?= timezone_select_options( $from_tz_city ); ?>
            </select>
        </dd>
    </dl>
    <dl>
        <dt>To Timezone:</dt>
        <dd>
            <select name="jkl_tz_to_tz_country">
                <?= timezone_select_options( $to_tz_continent ); ?>
            </select>
            <select name="jkl_tz_to_tz_city">
                <?= timezone_select_options( $to_tz_city ); ?>
            </select>
        </dd>
    </dl>
    <?php if ( isset( $converted_time ) ) : ?>
    <dl>
        <dt>Converted Time:</dt>
        <dd><?= $converted_time->format( 'F j, Y \a\t g:i a' ); ?></dd>
    </dl>
    <?php endif; ?>
    <br>

    <div class="controls">
        <input type="submit" name="jkl_tz_submit" value="Go">
    </div>

</form>

<?php