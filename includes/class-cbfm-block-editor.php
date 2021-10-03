<?php

class CBFM_Block_Editor {

	/**
	 * Build the class events.
	 */
	public function __construct() {
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_script' ) );

		add_filter( 'plugin_action_links', array( $this, 'add_donate_link' ), 10, 2 );
	}

	/**
	 * Enqueue the JavaScript used to maintain editor settings across sessions.
	 */
	function enqueue_script() {
		wp_enqueue_script(
			'cbfm-manager',
			trailingslashit( CBFM_PLUGINS_BASE ) . 'assets/js/fullscreen.js',
			array(),
			'1.3.0',
			true
		);

		$settings = get_user_meta( get_current_user_id(), 'cbfm_default_state', true );

		if ( ! is_array( $settings ) ) {
			$settings = array(
				'fullscreenMode' => $settings,
				'welcomeGuide'   => 'false', // Auto-set the welcome message, if you've made it ot the plugin, always skip this.
			);
		}

		wp_localize_script(
			'cbfm-manager',
			'cbfm_manager',
			$settings
		);
	}

	/**
	 * Add a donate link to the row actions for this plugin.
	 *
	 * @param array  $actions An array of plugin actions.
	 * @param string $file    The string identifying the primary plugin file.
	 *
	 * @return array
	 */
	public function add_donate_link( $actions, $file ) {
		// Return early if this is not the entry data for this plugin.
		if ( 'blockeditor-fullscreen-mode-control/blockeditor-fullscreen-mode-control.php' !== $file ) {
			return $actions;
		}

		$actions['cbfm-donate'] = sprintf(
			'<a href="%s" target="_blank"><span style="font-weight:600">%s</span></a>',
			esc_url( 'https://www.paypal.me/clorith' ),
			esc_html__( 'Donate to this plugin', 'blockeditor-fullscreen-mode-control' )
		);

		return $actions;
	}

}

new CBFM_Block_Editor();
