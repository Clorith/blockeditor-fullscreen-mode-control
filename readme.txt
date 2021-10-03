=== Persistent block editor settings ===
Tags: gutenberg, block-editor, block editor, fullscreen, editor settings
Contributors: Clorith
Author URI: https://clorith.net
Donate link: https://www.paypal.me/clorith
Requires at least: 5.3
Requires PHP: 5.6
Tested up to: 5.8
Stable tag: 1.3.0
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

= I want to contribute to this plugin =
Contributions are more than welcome, just head on over to the GitHub repository at https://github.com/Clorith/blockeditor-fullscreen-mode-control, where you can submit Pull Requests or open issues.

== Changelog ==

= v1.3.0 - 2021-10-03 =
* Extended the settings panel with all applicable block editor settings.
* Added support for the following user settings:
  * Block breadcrumbs
  * Most used blocks
  * Caret positioning
* Clarified how the plugin works, and how to use it, in the readme.
* Updated the plugin name spelling, and plugin description to be consistent with WordPress.

= v1.2.0 - 2020-11-28 =
* Add support for other stateful settings (welcome message, focus mode, fixed toolbar and more)

= v1.0.1 =
* Clarified some strings
* Use WordPress event listeners to save fullscreen choice

= v1.0.0 =
* Initial release
