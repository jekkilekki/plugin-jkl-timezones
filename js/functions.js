/**
 * The jQuery function that handles all the button clicks and such
 * 
 * @since   0.0.1
 * @param   jQuery  $
 */
( function( $ ) {
    
    $( function() {
        
        /*
         * Add Date Picker functionality to the JKL Timezones Widget
         */
        $( '#jkl-timezones-date' ).datepicker({
            dateFormat: 'yyyy-mm-dd',
            changeMonth: true,
            changeYear: true,
        });
        
    }); // END main function
    
}) ( jQuery );