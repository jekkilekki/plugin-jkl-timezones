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

// Prevent loading more than once per Page
// global $post;
// if( has_shortcode( $post->post_content, 'jkltz' ) ) :

require_once( 'functions.php' );

date_default_timezone_set( wp_get_timezone_string() );

$from_date = date( 'Y\-m\-j' );
$from_time = round_time( date( 'g:i' ) );
$ampm = date( 'a' );
$from_time_str = '';
$from_tz = wp_get_timezone_string();
$to_tz = wp_get_timezone_string();

if( isset( $_POST[ 'jkl_tz_reset' ] ) ) {
    $_POST = '';
}

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
?>

<form id="jkl_timezones_form" action="" method="POST">
    
    <h4>Timezone Calculator</h4>
        
    <dl class="jkl-from-time">
        <dt>From Time:</dt>
        <dd>
            <input type="text" name="jkl_tz_from_date" class="jkl-timezones-date" value="<?php
                echo $from_date;
            ?>"><span class="dashicons dashicons-calendar"></span>
            <select name="jkl_tz_from_time" class="jkltz-time">
                <?= time_select_options( $from_time ); ?>
            </select>
            <input type="checkbox" name="jkl_tz_am" id="jkltz-am" <?php echo ( $ampm == 'am' ) ? " checked" : ''; ?>>am
        </dd>
    </dl>
    <dl class="jkl-from-tz jkl-tz-select">
        <dt>From Timezone:</dt>
        <dd>
            <select name="jkl_tz_from_tz" id="from_continent">
                <?= timezone_select_options( $from_tz ); ?>
            </select>
        </dd>
    </dl>
    <dl class="jkl-to-tz jkl-tz-select">
        <dt>To Timezone:</dt>
        <dd>
            <select name="jkl_tz_to_tz" id="to_continent">
                <?= timezone_select_options( $to_tz ); ?>
            </select>
        </dd>
    </dl>
    <?php if ( isset( $converted_time ) ) : ?>
    <dl class="jkl-converted-time">
        <dt>Converted Time:</dt>
        <dd><?= $converted_time->format( 'F j, Y \a\t g:i a' ); ?></dd>
    </dl>
    <?php endif; ?>

    <div class="jkl-tz-controls">
        <input type="submit" name="jkl_tz_clear" value="Reset">
        <input type="submit" name="jkl_tz_submit" value="Go">
    </div>

</form>

<?php // endif; ?>
