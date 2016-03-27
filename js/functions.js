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
        
        /*
         * Functionality for selective dropdowns
         * Only show city names for the continents they are in
         */
        var f_cont = $( '#from_continent' ).val();
        var f_city = $( '#from_city' ).val();
        var t_cont = $( '#to_continent' ).val();
        var t_city = $( '#to_city' ).val();
        
    }); // END main function
    
}) ( jQuery );