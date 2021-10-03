=== Persistent block editor settings ===
Tags: gutenberg, block-editor, block editor, fullscreen, editor settings
Contributors: Clorith
Requires at least: 5.3
Requires PHP: 5.6
Tested up to: 5.6
Stable tag: 1.2.0
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Remember your editor settings across devices and editing sessions.

== Description ==

Tired of losing your block editor settings when you change devices, or your local browsing data is cleared? Then this is the plugin for you!

The block editor stores all settings in what is known as "localStorage", this means your preferences do not carry over between your phone, tablet, or computer.
This also means that if you regularly clear out old cookies and browser data, your preferences may be lost (some browsers even do this automatically at set intervals, Safari, for example, is known to do this).

The plugin simply requires you to activate it, and it will remember your editor settings without any other interactions.
In addition, it also makes it possible to change your editor preferences via your user profile if you prefer this approach.

---

Previously, the plugin was known as *Blockeditor Fullscreen Mode Control*, and only handled the fullscreen mode, but over
time there has presented itself a need to maintain persistent editor settings across sessions and devices for other elements as well.

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
