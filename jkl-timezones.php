<?php
/**
 * @since       0.0.1
 * @package     JKL_Timezone_Widget
 * @author      Aaron Snowberger <jekkilekki@gmail.com>
 * 
 * @wordpress-plugin
 * Plugin Name: JKL Timezone Widget
 * Plugin URI: 
 * Description: A simple Timezone widget that allows you to calculate time differences and easily plan events or meetings based in other timezones relative to your own.
 * Version:     1.0.2
 * Author:      Aaron Snowberger
 * Author URI:  http://www.aaronsnowberger.com
 * Text Domain: jkl-timezone-widget
 * License:     GPL2
 * 
 * Requires at least: 3.5
 * Tested up to: 4.5
 */

/**
 * JKL Timezone Widget allows you to plan events or meetings based in other timezones relative to your own timezone.
 * Copyright (C) 2015  AARON SNOWBERGER (email: JEKKILEKKI@GMAIL.COM)
 * 
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

/*
 * Plugin Notes:
 * 
 * Similar simple selection like: https://wordpress.org/plugins/timezonecalculator/screenshots/
 */

/* Prevent direct access */
if ( ! defined( 'WPINC' ) ) die;

/*
 * The class that represents the MAIN JKL ADMIN settings page
 */

/*
 * The class that represents the core plugin class that is used to define the Widget
 */
require_once plugin_dir_path( __FILE__ ) . 'inc/class-jkl-timezones.php';

/*
 * The class that creates the Widget itself
 */
require_once plugin_dir_path( __FILE__ ) . 'inc/class-jkl-timezones-widget.php';

/*
 * The class that creates the Shortcode
 */
require_once plugin_dir_path( __FILE__ ) . 'inc/class-jkl-timezones-shortcode.php';

/*
 * The function that creates a new JKL_Timezones object and runs the program
 */
function run_timezones() {
    // Instantiate the plugin class
    $JKL_Timezones = new JKL_Timezones( 'jkl-timezones', '1.0.2' );
}

run_timezones();