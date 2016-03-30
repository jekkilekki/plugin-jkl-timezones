# JKL Timezones

* [Plugin Page](https://github.com/jekkilekki/plugin-jkl-timezones)
* [Author Page](http://www.aaronsnowberger.com/)

A simple Timezone widget that allows you to calculate time differences and 
easily plan events or meetings based in other timezones relative to your own.

##Description

I live in South Korea. But I have loads of friends in the US and elsewhere in the
world. Additionally, sometimes I need to arrange Skype calls or meetings with 
someone in a different timezone, OR there is an online event that I really want to 
attend - in a different timezone. 

I needed a way to quickly and easily convert 
from one date and time in a particular timezone to another. (I hate Googling it 
every time, or looking up timezone tables and doing mental math.) What I really 
wanted was something I could just point, click, submit and have it spit out the
relevant time for me in my timezone. So, I created this plugin which does just that.

Requires WordPress 3.5 and PHP 5.4 or later.

###Special Features 
* Automatically defaults the Calculator to your current date, time, and timezone
based on your WordPress General Settings
* Allows you to select a City or Manual UTC offset for calculation in the same way
the WordPress General Settings Page does
* Uses a special jQuery calendar popup for easy date selection
* Only allows one instance of the Calculator to run on any Page at one time

###Planned Upcoming Features 
* AJAX form submission to prevent page reload
* Ability to give the shortcode a specific date and time (like for an Event you're 
promoting) that will set as the default for the Calculator on that particular Page
* Ability to change the color of the form (shortcode) or calculated result (widget)

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

1. Timezone Calculator Widget
1. Timezone Calculator loaded in a Page via the shortcode

###Contact Me
If you have questions about, problems with, or suggestions for improving this 
plugin, please let me know at the [WordPress.org support forums](http://wordpress.org/support/plugin/jkl-timezones)

Want updates about my other WordPress plugins, themes, or tutorials? Follow me 
[@jekkilekki](http://twitter.com/jekkilekki)

##Acknowledgements 

###This plugin uses:

* [jQuery UI Datepicker](http://jqueryui.com/datepicker/) licensed under MIT 
License or GNU General Public License (GPL) Version 2

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

###1.0
* Initial release
