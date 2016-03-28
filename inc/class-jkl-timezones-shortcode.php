<?php
/**
 * The class that creates the plugin Shortcode.
 * 
 * Sets up the shortcode and its attributes
 * 
 * @since       0.0.1
 * @package     JKL_Timezones
 * @subpackage  JKL_Timezones/inc
 * @author      Aaron Snowberger <jekkilekki@gmail.com>
 */
/* Prevent direct access */
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'JKL_Timezones_Shortcode' ) ) {
    
    class JKL_Timezones_Shortcode {
        
        /**
         * Register shortcode with WordPress
         * 
         * @since   0.0.1
         */
        public function __construct() {
            
            $this->register();
            
        }
        
        public function register() {
            add_shortcode( 'jkltz', array( $this, 'jkl_timezones_make_shortcode' ) );
        }
        
        function jkl_timezones_make_shortcode() {
            
            include 'view-jkl-timezones-widget.php';
        
        }
        
        //add_shortcode( 'jkl_tz', 'jkl_timezones_make_shortcode' );
        
    } // END class JKL_Timezones_Shortcode
    
} // END if ( ! class_exists() ) 
