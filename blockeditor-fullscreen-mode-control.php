<?php
/*
 * Plugin Name: Persistent blockeditor settings
 * Plugin URI: https://wordpress.org/plugins/blockeditor-fullscreen-mode-control
 * Description: Persistent editor settings between devices.
 * Version: 1.2.0
 * Author: Clorith
 * Author URI: https://wordpress.org
 * Network: true
 * License: GPLv2
 * Text Domain: blockeditor-fullscreen-mode-control
 */

define( 'CBFM_PLUGINS_BASE', plugins_url( '', __FILE__ ) );

require_once __DIR__ . '/includes/class-cbfm-profile.php';
require_once __DIR__ . '/includes/class-cbfm-block-editor.php';
require_once __DIR__ . '/includes/class-cbfm-rest-api.php';
