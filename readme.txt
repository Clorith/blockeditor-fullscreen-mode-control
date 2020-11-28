=== Persistent blockeditor settings ===
Tags: gutenberg, block-editor, fullscreen, editor settings
Contributors: Clorith
Requires at least: 5.3
Requires PHP: 5.6
Tested up to: 5.6
Stable tag: 1.2.0
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Persistent editor settings between devices.

== Description ==

This plugin provides a means of persisting editor feature settings (like fullscreen editing, the welcome message, focused mode, and os on)
between devices, or if you clear your browsers local storage (a feature automatically performed by Apple devices very frequently).

Previously, the plugin was known as *Blockeditor Fullscreen Mode Control*, and only handled the fullscreen mode, but over
time there has presented it self a need to maintain other editor settings in usermeta as well.

== Frequently asked questions ==

= Does this work on multisite/network sites? =
Yes, you can network activate the plugin to have the functionality be instantly available to all users of your network.

== Changelog ==

= v1.2.0 - 2020-11-28 =
* Add support for other stateful settings (welcome message, focus mode, fixed toolbar and more)

= v1.0.1 =
* Clarified some strings
* Use WordPress event listeners to save fullscreen choice

= v1.0.0 =
* Initial release
