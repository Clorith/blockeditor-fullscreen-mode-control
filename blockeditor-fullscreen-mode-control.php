<?php
/*
 * Plugin Name: Persistent block editor settings
 * Plugin URI: https://wordpress.org/plugins/blockeditor-fullscreen-mode-control
 * Description: Remember your editor settings across devices and editing sessions.
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
