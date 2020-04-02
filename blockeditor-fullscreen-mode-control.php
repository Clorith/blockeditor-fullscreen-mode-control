<?php
/*
 * Plugin Name: Blockeditor Fullscreen Mode Control
 * Plugin URI: https://wordpress.org/plugins/blockeditor-fullscreen-mode-control
 * Description: Manage the behavior of the fullscreen editing experience in the block editor
 * Version: 1.0.1
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
