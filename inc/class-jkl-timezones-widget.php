<?php
/**
 * The class that creates the plugin Widget.
 * 
 * Defines the plugin name, version, and hooks for enqueing the stylesheet and JavaScript.
 * 
 * @package     JKL_Timezones
 * @subpackage  JKL_Timezones/inc
 * @author      Aaron Snowberger <jekkilekki@gmail.com>
 */

/* Prevent direct access */
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'JKL_Timezones_Widget' ) ) {
    
    class JKL_Timezones_Widget extends WP_Widget {
        
        /**
         * Register widget with WordPress
         * Sets up the widget's name, etc
         * 
         * @see     WP_Widget::__construct()
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
        
        /**
         * Front-end display of the content of the widget
         * 
         * @see     WP_Widget::widget()
         *
         * @since   0.0.1 
         * @param   array   $args       Widget arguments
         * @param   array   $instance   Saved values from database.
         */
        public function widget( $args, $instance ) {
            
            // Outputs the content of the widget
            echo $args[ 'before_widget' ];
            if ( ! empty( $instance[ 'title' ] ) ) {
                echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
            }
            
            // Output of the actual widget - call the function to create it here
            include 'view-jkl-timezones-widget.php';
            
            echo $args[ 'after_widget' ];
            
        }
        
        /**
         * Back-end display of the options form on admin
         * 
         * @see     WP_Widget::form()
         * 
         * @since   0.0.1
         * @param   array   $instance     Previously saved values from the database.
         */
        public function form( $instance ) {
            
            // Outputs the options form on admin
            $title = ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : __( 'Timezone Calculator', 'jkl-timezones' );
            $color = ! empty( $instance[ 'color' ] ) ? $instance[ 'color' ] : 'steelblue'; ?>
            
            <p>
                <label for="<?= $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'jkl-timezones' ); ?></label>
                <input class="widefat" id="<?= $this->get_field_id( 'title' ); ?>" name="<?= $this->get_field_name( 'title' ); ?>" type="text" value="<?= esc_attr( $title ); ?>">
                <label for="<?= $this->get_field_id( 'color' ); ?>"><?php _e( 'Success Color:', 'jkl-timezones' ); ?></label>
                <input class="widefat" id="<?= $this->get_field_id( 'color' ); ?>" name="<?= $this->get_field_name( 'color' ); ?>" type="color" value="<?= esc_html( $color ); ?>">
            </p>
            
            <?php
        }
        
        /**
         * Processes & sanitizes widget options on save
         * 
         * @see     WP_Widget::update()
         * 
         * @since   0.0.1
         * @param   array   $new_instance       The new options to be saved
         * @param   array   $old_instance       The previously saved values from the database
         * 
         * @return  array   Updated safe values to be saved
         */
        public function update( $new_instance, $old_instance ) {
            
            // Processes widget options to be saved
            $instance = array();
            $instance[ 'title' ] = ( ! empty( $new_instance[ 'title' ] ) ) ? strip_tags( $new_instance[ 'title' ] ) : '';
            $instance[ 'color' ] = ( ! empty( $new_instance[ 'color' ] ) ) ? strip_tags( $new_instance[ 'color' ] ) : '';
            
            return $instance;
            
        }
        
    } // END class JKL_Timezones_Widget
    
    // return new JKL_Timezones_Widget;

} // END if ( ! class_exists() )

