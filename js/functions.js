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
        $( '.jkl-timezones-date' ).datepicker({
            //dateFormat: 'yy-mm-dd',
            dateFormat: 'MM d, yy (D)',
            changeMonth: true,
            changeYear: true,
        });
        
         // Add a new class to the Datepicker to (hopefully) avoid conflicts with other plugins
        $( '#ui-datepicker-div' ).addClass( 'jkl-timezones-datepicker' );
        
    }); // END main function
    
}) ( jQuery );