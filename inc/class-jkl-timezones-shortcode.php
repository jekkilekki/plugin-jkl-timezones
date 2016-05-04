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
         * Builds the shortcode object
         * 
         * @since   0.0.1
         */
        public function __construct() {
            
            $this->register();
            
        }
        
        /**
         * Registers the shortcode with WordPress
         * 
         * @since   0.0.1
         */
        protected function register() {
            add_shortcode( 'jkl-timezones', array( $this, 'jkl_timezones_make_shortcode' ) );
            add_shortcode( 'jkltz', array( $this, 'jkl_timezones_make_shortcode' ) );
        }
        
        /**
         * Creates the view for the shortcode
         * 
         * Only allows ONE instance of the shortcode per page (include_once) 
         * Also prevents it from loading in the sidebar because of include_once
         * 
         * @since   0.0.1
         * @global  post    $post   A reference to the current WordPress Post
         */
        public function jkl_timezones_make_shortcode( $atts ) {
            
            // Set Default attributes
            $timezone_atts = shortcode_atts( array(
                'allow-widget'    => false,
            ), $atts );
            
            // Prevent loading more than once per Page
            global $post;
            if( has_shortcode( $post->post_content, 'jkl-timezones' ) || has_shortcode( $post->post_content, 'jkltz' ) ) {
                if( $timezone_atts[ 'allow-widget' ] ) {
                    include 'view-jkl-timezones-form.php';
                } else {
                    include_once 'view-jkl-timezones-form.php';
                }
            }
                
        }
        
        //add_shortcode( 'jkl_tz', 'jkl_timezones_make_shortcode' );
        
    } // END class JKL_Timezones_Shortcode
    
} // END if ( ! class_exists() ) 
