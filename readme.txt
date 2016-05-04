=== JKL Timezone Converter ===
Contributors:           jekkilekki
Plugin Name:            JKL Timezone Converter
Plugin URI:             https://github.com/jekkilekki/plugin-jkl-timezones
Author:                 Aaron Snowberger
Author URI:             http://www.aaronsnowberger.com/
Donate link:            https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=567MWDR76KHLU
Tags:                   content, custom, shortcode, widget, timezones, calculator, converter
Requires at least:      3.5
Tested up to:           4.5
Stable tag:             1.0.4
Version:                1.0.4
License:                GPLv2 or later
License URI:            http://www.gnu.org/licenses/gpl-2.0.html

A simple Timezone widget and shortcode that allows you to convert time differences and 
easily plan events or meetings based in other timezones.

== Description ==

I live in South Korea. But I have loads of friends in the US and elsewhere in the
world. Additionally, sometimes I need to arrange Skype calls or meetings with 
someone in a different timezone, OR there is an online event that I really want to 
attend - in a different timezone. 

I needed a way to quickly and easily convert from one date and time in a particular 
timezone to another. (I hate Googling it every time, or looking up timezone tables 
and doing mental math.) What I really wanted was something I could just point, 
click, submit and have it spit out the relevant time for me in my timezone. So, 
I created this plugin which does just that.

Requires WordPress 3.5 and PHP 5.4 or later.

= Usage = 
Add the shortcode `[jkltz]` or `[jkl-timezones]` to your Post or Page. This will
insert the Timezone Converter at the top of your content. Upcoming features may
allow user positioning and setting default values.

= Special Features = 
* Automatically defaults to your current date, time, and timezone
based on your WordPress General Settings
* Allows you to select a City or Manual UTC offset for conversion in the same way
the WordPress General Settings Page does
* Uses a special jQuery calendar popup for easy date selection
* Only allows one instance of the Converter to run on a Page at one time

= Notes =
* Multiple widgets are allowed at once (on the same Post/Page)
* Multiple shortcodes (on the same Post/Page) are disabled - multiple shortcodes
will display only ONE form
* On Posts/Pages with a shortcode, the widget will be disabled

= Planned Upcoming Features = 
* AJAX form submission to prevent page reload
* Ability to give the shortcode a specific date and time (like for an Event you're 
promoting) that will set as the default for the Converter on that particular Page
* Ability to change the color of the form (shortcode) or converted result (widget)
* Possibly allow users to select whether or not to display multiple forms in shortcodes
and/or widgets 

= Translations = 
* English (EN) - default
* Korean (KO) - upcoming

If you want to help translate the plugin into your language, please have a look 
at the `.pot` file which contains all definitions and may be used with a [gettext] 
editor.

If you have created your own language pack, or have an update of an existing one, 
you can send your [gettext .po or .mo file] to me so that I can bundle it in the
plugin.

= Contact Me = 
If you have questions about, problems with, or suggestions for improving this 
plugin, please let me know at the [WordPress.org support forums](http://wordpress.org/support/plugin/jkl-timezones)

Want updates about my other WordPress plugins, themes, or tutorials? Follow me 
[@jekkilekki](http://twitter.com/jekkilekki)

== Installation ==

= Automatic installation =
1. Log into your WordPress admin
2. Go to `Plugins -> Add New`
3. Search for `JKL Timezone Converter`
4. Click `Install Now`
5. Activate the Plugin

= Manual installation =
1. Download the Plugin
2. Extract the contents of the .ZIP file
3. Upload the contents of the `jkl-timezones` directory to your `/wp-content/plugins` 
folder of your WordPress installation
4. Activate the Plugin from the `Plugins` page

= Documentation = 
Full documentation of the Plugin and its uses can (currently) be found at its 
[GitHub page](https://github.com/jekkilekki/plugin-jkl-timezones) 

== Frequently Asked Questions ==

= Tips =
As a general rule, it is always best to keep your WordPress installation and all 
Themes and Plugins fully updated in order to avoid problems with this or any other 
Themees or Plugins. I regularly update my site and test my Plugins and Themes with
the latest version of WordPress.

= How can I change the style of the plugin to match my website? =
Each element within the `jkl_timezones_form` contains its own unique CSS identifier, 
allowing you to hook into those in your own Custom CSS stylesheet.

To easily find out which classes control which elements, simply open your site in 
a modern browser (Google Chrome, Firefox, Opera, or Internet Explorer 9 or later) 
and right-click on the element you wish to style. Then find `Inspect` in the pop-up 
contextual menu.

= Why does the Timezone Converter always show UTC time and not my current timezone? =
In order for your current timezone to show up in the timezone calculator as the 
default, you first need to SET your default timezone in the WordPress Settings Page.
In the WordPress admin menu, go to `Settings -> General` and find the dropdown to
set your timezone. 

**Note:** If you select a manual UTC time (like +9:00), then the plugin will GUESS
which city you are located in based on that timezone (and it might not be entirely 
accurate). For example, I am based in Seoul (UTC +9:00), but when I set it to `UTC 
+9:00` rather than the city name `Seoul`, the plugin guesses that my city is actually
`Tokyo` (which is located in the same timezone).

= Why doesn't the Sidebar Widget also show up on a Page using the shortcode? =
Simple: it's best to not allow TWO separate instances of the Timezone Converter 
to run on the same page. It's overkill. You only need one per page. The same is 
true for multiple shortcodes on one page. Only ONE instance of the Timezone Converter
should be used on any one Page.

= Why does my Page reload every time I click the Timezone Converter buttons? =
There is currently no AJAX functionality implemented by this plugin to maintain
the state of the Page and dynamically calculate and show the answer without a 
reload. This is a planned feature for an upcoming release.

= Why do I have to scroll down the Page to see my results after conversion? =
Currently, the plugin doesn't remember your page position when you submit the 
conversion form, so because the form completely reloads the page, it thinks this 
is the first time you're loading, so it will load to the top of the page. 

Remembering page position is a planned upcoming feature, but it will be 
unnecessary if/when I implement dynamic calculations with AJAX.

= Why do some of the Timezone Converter fields appear out of place? =
For the most part, it depends on how your Theme styles those elements. I did my 
best to style the form very simply and plainly, but some elements may appear out
of place in your installation due to your Theme's default styles. In order to fix
this, add some Custom CSS (preferrably using Jetpack's Custom CSS feature, or 
another that doesn't require modifying the Theme or Plugin files). 

See the first question above for more info on how to do create Custom CSS for the plugin.

= Can you ADD / REMOVE / CHANGE features of the plugin? =
Sure, I'm always open to suggestions. Let me know what you're looking for. Feel
free to open a GitHub Issue on the [plugin repository](https://github.com/jekkilekki/plugin-jkl-timezones)
to let me know the specific features or problems you're having.

== Screenshots ==

1. Timezone Converter loaded in a Page via the shortcode
2. Timezone Converter Widget

== Other Notes ==

= Support = 
[Click here to visit the forum for this plugin](https://wordpress.org/support/plugin/jkl-timezones)

= Acknowledgements = 
This plugin uses:

* [jQuery UI Datepicker](http://jqueryui.com/datepicker/) licensed under MIT 
License or GNU General Public License (GPL) Version 2
* World Map image (in the banner) from [Dmthoth on Wikipedia](https://commons.wikimedia.org/wiki/File:Blank_Map_Pacific_World.svg)

= License = 
This program is free software; you can redistribute it and/or modify it under the terms 
of the GNU General Public License as published by the Free Software Foundation; either 
version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY 
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A 
PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this 
program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth 
Floor, Boston, MA 02110-1301 USA

== Changelog ==

= 1.0.4 = 
* Added `[jkltz]` shortcode in addition to `[jkl-timezones]`
* Added Readme documentation to show shortcode Usage

= 1.0.3 =
* Added better security features (WP nonce, validation, sanitization, escaping)
* Re-styled to look more like Google's unit converter
* Modified short descriptive text to fit on WordPress.org

= 1.0 =
* Initial release
