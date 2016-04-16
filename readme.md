![banner-772x250](https://cloud.githubusercontent.com/assets/6644259/14165024/adf49f18-f73f-11e5-8c2e-f24a3e07fb87.png)

# JKL Timezone Converter

* [Plugin Page](https://github.com/jekkilekki/plugin-jkl-timezones)
* [Author Page](http://www.aaronsnowberger.com/)

A simple Timezone widget and shortcode that allows you to convert time differences and 
easily plan events or meetings based in other timezones relative to your own.

##Description

I live in South Korea. But I have loads of friends in the US and elsewhere in the
world. Additionally, sometimes I need to arrange Skype calls or meetings with 
someone in a different timezone, OR there is an online event that I really want to 
attend - in a different timezone. 

I needed a way to quickly and easily convert from one date and time in a particular 
timezone to another. (I hate Googling it every time, or looking up timezone tables 
and doing mental math.) What I really wanted was something I could just point, 
click, submit and have it spit out therelevant time for me in my timezone. So, 
I created this plugin which does just that.

Requires WordPress 3.5 and PHP 5.4 or later.

###Special Features 
* Automatically defaults to your current date, time, and timezone
based on your WordPress General Settings
* Allows you to select a City or Manual UTC offset for conversion in the same way
the WordPress General Settings Page does
* Uses a special jQuery calendar popup for easy date selection
* Only allows one instance of the Converter to run on a Page at one time

###Notes
* Multiple widgets are allowed at once (on the same Post/Page)
* Multiple shortcodes (on the same Post/Page) are disabled - multiple shortcodes
will display only ONE form
* On Posts/Pages with a shortcode, the widget will be disabled

###Planned Upcoming Features 
* AJAX form submission to prevent page reload
* Ability to give the shortcode a specific date and time (like for an Event you're 
promoting) that will set as the default for the Converter on that particular Page
* Ability to change the color of the form (shortcode) or converted result (widget)
* Possibly allow users to select whether or not to display multiple forms in shortcodes
and/or widgets 

###Translations 
* English (EN) - default
* Korean (KO) - upcoming

If you want to help translate the plugin into your language, please have a look 
at the `.pot` file which contains all definitions and may be used with a [gettext] 
editor.

If you have created your own language pack, or have an update of an existing one, 
you can send your [gettext .po or .mo file] to me so that I can bundle it in the
plugin.

##Documentation & Support
Full documentation of the Plugin and its uses can (currently) be found at its 
[GitHub page](https://github.com/jekkilekki/plugin-jkl-timezones) 

###Screenshots

1. Timezone Converter loaded in a Page via the shortcode

![screenshot-1](https://cloud.githubusercontent.com/assets/6644259/14580170/c90211b0-03ff-11e6-9327-d9388893c1ab.png)

2. Timezone Converter Widget

![screenshot-2](https://cloud.githubusercontent.com/assets/6644259/14580196/775719b8-0400-11e6-9509-b22a93552fb2.png)

###Contact Me
If you have questions about, problems with, or suggestions for improving this 
plugin, please let me know at the [WordPress.org support forums](http://wordpress.org/support/plugin/jkl-timezones)

Want updates about my other WordPress plugins, themes, or tutorials? Follow me 
[@jekkilekki](http://twitter.com/jekkilekki)

##Acknowledgements 

###This plugin uses:

* [jQuery UI Datepicker](http://jqueryui.com/datepicker/) licensed under MIT 
License or GNU General Public License (GPL) Version 2
* World Map image (in the banner) from [Dmthoth on Wikipedia](https://commons.wikimedia.org/wiki/File:Blank_Map_Pacific_World.svg)


##License
This program is free software; you can redistribute it and/or modify it under the terms 
of the GNU General Public License as published by the Free Software Foundation; either 
version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY 
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A 
PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this 
program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth 
Floor, Boston, MA 02110-1301 USA

##Changelog

###1.0.2
* Added better security features (WP nonce, validation, sanitization, escaping)
* Re-styled to look more like Google's unit converter

###1.0
* Initial release
