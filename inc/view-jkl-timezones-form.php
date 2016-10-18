<?php
/**
 * The Front-end display of the Timezones Widget.
 * 
 * Displays time and timezone select options, listens for a form submission, and converts the time entered to the chosen timezone.
 * 
 * @since       0.0.1
 * 
 * @package     JKL_Timezones
 * @subpackage  JKL_Timezones/inc
 * @author      Aaron Snowberger <jekkilekki@gmail.com>
 */

require_once( 'controller.php' ); 

?>

<a id="jkl_timezone" name="jkl_timezone"></a>
<form id="jkl_timezones_form" action="<?php // #jkl_timezone ?>" method="POST">
    
    <?php 
    // Add a nonce (number once) to be sure submissions come from THIS form
    wp_nonce_field( 'jkl_timezones', 'jkl_timezones_form' ); 
    ?>
    
    <h4><?php _e( 'Timezone Converter', 'jkl-timezones' ); ?></h4>
    <div class="jkl-from">
        <?php _ex( 'From:', 'Original time', 'jkl-timezones' ); ?>
        <div class="jkl-from-time">
            <input type="text" name="jkl_tz_from_date" class="jkl-timezones-date" value="<?php
                echo esc_attr( $from_date );
            ?>"><span class="dashicons dashicons-calendar"></span>
            <select name="jkl_tz_from_time" class="jkltz-time">
                <?= time_select_options( $from_time ); ?>
            </select>
            <label for="jkltz-am" class="jkl-ampm">
                <input type="checkbox" name="jkl_tz_am" id="jkltz-am" <?php echo ( $ampm == 'am' ) ? " checked" : ''; ?>>
                <?php _ex( 'am', 'Morning time (am/pm)', 'jkl-timezones' ); ?>
            </label>
        </div>
        <div class="jkl-from-tz jkl-tz-select">
            <select name="jkl_tz_from_tz" id="from_continent">
                <?= timezone_select_options( $from_tz ); ?>
            </select>
        </div>
    </div>
    
    <span class="jkltz-equal-sign">=</span>
    
    <div class="jkl-to">
        <?php _ex( 'To:', 'Converted time', 'jkl-timezones' ); ?>
        <div class="jkl-to-time">
            <input type="text" class="jkl-converted-date" value="<?= 
                isset( $converted_time ) ? esc_attr( $converted_time->format( 'F j, Y (D)' ) ) : ''; ?>"
                readonly>
            <input type="text" class="jkl-converted-time" value="<?= 
                isset( $converted_time ) ? ' @ ' . esc_attr( $converted_time->format( 'g:i a' ) ) : ''; ?>"
                readonly>
        </div>
        <div class="jkl-to-tz jkl-tz-select">
            <select name="jkl_tz_to_tz" id="to_continent">
                <?= timezone_select_options( $to_tz ); ?>
            </select>
        </div>
    </div>
    <br>
    <div class="jkl-tz-controls">
        <input type="submit" name="jkl_tz_clear" value="<?php _ex( 'Reset', 'Clear or erase form', 'jkl-timezones' ); ?>">
        <input type="submit" name="jkl_tz_submit" value="<?php _ex( 'Go', 'Run converter program', 'jkl-timezones' ); ?>">
    </div>

</form>
