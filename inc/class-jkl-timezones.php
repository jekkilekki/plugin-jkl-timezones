<?php
/**
 * The main plugin class that handles all other plugin parts.
 * 
 * Defines the plugin name, version, and hooks for enqueing the stylesheet and JavaScript.
 * 
 * @package     JKL_Timezones
 * @subpackage  JKL_Timezones/inc
 * @author      Aaron Snowberger <jekkilekki@gmail.com>
 */

/* Prevent direct access */
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'JKL_Timezones' ) ) {
    
    class JKL_Timezones {
        
        /**
         * The ID of this plugin.
         * 
         * @since   0.0.1
         * @access  private
         * @var     string  $name       The ID of this plugin.
         */
        private $name;
        
        /**
         * Current version of the plugin.
         * 
         * @since   0.0.1
         * @access  private
         * @var     string  $version    The current version of this plugin.
         */
        private $version;
        
        /**
         * Widget
         * 
         * @since   0.0.1
         * @access  private
         * @var     JKL_Timezones_Widget    $widget     A reference to the widget.
         */
        private $widget;
        
        /**
         * Shortcode
         * 
         * @since   0.0.1
         * @access  private
         * @var     JKL_Timezones_Shortcode $shortcode  A reference to the shortcode.
         */
        private $shortcode;
        
        
        /**
         * CONSTRUCTOR !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
         * Initializes the JKL_Timezones object and sets its properties
         * 
         * @since   0.0.1
         * @var     string  $name       The name of this plugin.
         * @var     string  $version    The version of this plugin.
         */
        public function __construct( $name, $version ) {
            
            // Set the name and version number
            $this->name     = $name;
            $this->version  = $version;
            
            // Create the widget
            $this->make_widget();
            
            // Create the shortcode
            $this->make_shortcode();
            
            // Enqueue styles and scripts
            $this->get_scripts();
            
        }
        
        function make_widget() {
            add_action( 'widgets_init', function() {
                    register_widget( 'JKL_Timezones_Widget' );
            });
        }
        
        function make_shortcode() {
            
            if ( is_null( $this->shortcode ) ) {
                $this->shortcode = new JKL_Timezones_Shortcode();
            }
            return $this->shortcode;
            
        }
        
        // Enqueue Styles and Scripts
        function jkl_tz_scripts_styles() {
            wp_enqueue_style( 'jkl-tz-styles', plugins_url( '../style.css', __FILE__ ) );
            wp_enqueue_script( 'jkl-tz-scripts', plugins_url( '../js/functions.js', __FILE__ ), array( 'jquery', 'jquery-ui-datepicker' ), '20160327', true );
        } 
        function get_scripts() {
            add_action( 'wp_enqueue_scripts', array( $this, 'jkl_tz_scripts_styles' ) );
        }
        
    }
    
}