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

require_once( 'controller.php' ); 

?>

<form id="jkl_timezones_form" action="" method="POST">
    
    <h4>Timezone Calculator</h4>
    <div class="jkl-from">
        From:
        <div class="jkl-from-time">
            <input type="text" name="jkl_tz_from_date" class="jkl-timezones-date" value="<?php
                echo $from_date;
            ?>"><span class="dashicons dashicons-calendar"></span>
            <select name="jkl_tz_from_time" class="jkltz-time">
                <?= time_select_options( $from_time ); ?>
            </select>
            <label for="jkltz-am" class="jkl-ampm">
                <input type="checkbox" name="jkl_tz_am" id="jkltz-am" <?php echo ( $ampm == 'am' ) ? " checked" : ''; ?>>
                am
            </label>
        </div>
        <div class="jkl-from-tz jkl-tz-select">
            <select name="jkl_tz_from_tz" id="from_continent">
                <?= timezone_select_options( $from_tz ); ?>
            </select>
        </div>
    </div>
    
    <div class="jkl-to">
        To:
        <div class="jkl-to-time">
            <input type="text" class="jkl-converted-date" value="<?= 
                isset( $converted_time ) ? $converted_time->format( 'F j, Y' ) : ''; ?>"
                readonly>
            <input type="text" class="jkl-converted-time" value="<?= 
                isset( $converted_time ) ? $converted_time->format( 'g:i a' ) : ''; ?>"
                readonly>
        </div>
        <div class="jkl-to-tz jkl-tz-select">
            <select name="jkl_tz_to_tz" id="to_continent">
                <?= timezone_select_options( $to_tz ); ?>
            </select>
        </div>
    </div>
    <hr>
    <div class="jkl-tz-controls">
        <input type="submit" name="jkl_tz_clear" value="Reset">
        <input type="submit" name="jkl_tz_submit" value="Go">
    </div>

</form>
