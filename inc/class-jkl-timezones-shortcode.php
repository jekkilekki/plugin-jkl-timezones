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
            
            $widget_ops = array(
                    'classname'     => 'jkl_timezones_widget',
                    'description'   => __( 'A Timezone Calculator Widget to help easily match times in different zones.', 'jkl-timezones' ),
            );
            parent::__construct( 
                    'jkl_timezones_widget',                 // Base ID
                    __( 'JKL Timezones', 'jkl-timezones' ), // Name
                    $widget_ops                             // Args
            );
            
            load_plugin_textdomain( 'jkl-timezones', false, basename( dirname( __FILE__) ) . '/languages' );
            
        }
        
        function jkl_timezones_make_shortcode( $atts ) {
            
            $a = shortcode_atts(
                array(
                    'color' => 'steelblue',
                ), $atts );
            return "color = { $a[ 'color'] }";
        
        }
        add_shortcode( 'jkl_tz', 'jkl_timezones_make_shortcode' );
        
    } // END class JKL_Timezones_Shortcode
    
} // END if ( ! class_exists() ) 
