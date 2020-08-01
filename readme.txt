=== Blockeditor Fullscreen Mode Control ===
Tags: gutenberg, fullscreen
Contributors: wordpressdotorg, Clorith
Requires at least: 5.3
Requires PHP: 5.6
Tested up to: 5.5
Stable tag: 1.0.1
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Manage the behavior of the fullscreen editing experience in the block editor

== Description ==

Fullscreen editing was introduced as the default editing mode in WordPress 5.4.

This is understandably not what everyone wants, so this plugin makes the default remain as it was prior to this,
making the fullscreen editing an opt-in feature.

As a side feature, some browsers unfortunately do not properly keep stored settings the way things are set up
right now, this plugin provides you a per-user profile option to enable or disable the fullscreen editing which
persists between devices and sessions.

You will still be able to change the editing mode for individual posts while you are working on them the usual way,
via the ellipsis menu in the top corner of your editor, this plugin only helps save that value in a persistent manner.

== Frequently asked questions ==

= Does this work on multisite/network sites? =
Yes, you can network activate the plugin to have the functionality be instantly available to all users of your network.

== Changelog ==

= v1.0.1 =
* Clarified some strings
* Use WordPress event listeners to save fullscreen choice

= v1.0.0 =
* Initial release
