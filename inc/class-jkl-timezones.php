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
            
            // Load the plugin and supplementary files
            $this->load();
            
        }
        
        /**
         * Creates the Widget
         * 
         * @since   0.0.1
         * @return  object  $widget     The Widget
         */
        protected function make_widget() {
            
            if ( is_null( $this->widget ) ) {
                $this->widget = new JKL_Timezones_Widget();
            }
            return $this->widget;

        }
        
        /**
         * Creates the Shortcode
         * 
         * @since   0.0.1
         * @return  shortcode   $shortcode  The Shortcode
         */
        protected function make_shortcode() {
            
            if ( is_null( $this->shortcode ) ) {
                $this->shortcode = new JKL_Timezones_Shortcode();
            }
            return $this->shortcode;
            
        }
        
        /**
         * Loads translation directory
         * Adds the call to enqueue styles and scripts
         * 
         * @since   0.0.1
         */
        protected function load() {
            
            load_plugin_textdomain( 'jkl-timezones', false, basename( dirname( __FILE__) ) . '/languages/' );
            add_action( 'wp_enqueue_scripts', array( $this, 'jkl_tz_scripts_styles' ) );
            
        }
        
        /**
         * Enqueues Styles and Scripts
         * 
         * @since   0.0.1
         */
        public function jkl_tz_scripts_styles() {
            
            // Selectively load styles and scripts only when the widget or shortcode are active on a page
            global $post;
            if( is_active_widget( false, false, 'jkl_timezones_widget' ) || has_shortcode( $post->post_content, 'jkluc' ) ) {
                
                wp_enqueue_style( 'jkl-tz-styles', plugins_url( '../style.css', __FILE__ ) );
                wp_enqueue_script( 'jkl-tz-scripts', plugins_url( '../js/functions.js', __FILE__ ), array( 'jquery', 'jquery-ui-datepicker' ), '20160327', true );
                
            }
        
        }
        
    }
    
}