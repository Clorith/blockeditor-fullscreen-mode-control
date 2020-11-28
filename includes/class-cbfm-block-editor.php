<?php

class CBFM_Block_Editor {

	public function __construct() {
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_script' ) );
	}

	function enqueue_script() {
		wp_enqueue_script(
			'cbfm-manager',
			trailingslashit( CBFM_PLUGINS_BASE ) . 'assets/js/fullscreen.js',
			array(),
			null,
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

}

new CBFM_Block_Editor();