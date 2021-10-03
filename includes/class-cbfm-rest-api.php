<?php

class CBFM_Rest_API {

	public function __construct() {
		add_action( 'rest_api_init', array( $this, 'add_rest_route' ) );
	}

	public function add_rest_route() {
		register_rest_route(
			'cbfm-manage/v1',
			'/save',
			array(
				'methods' => 'POST',
				'callback' => array( $this, 'save_editor_preference' ),
				'permission_callback' => function() {
					return is_user_logged_in();
				},
			)
		);
	}

	public function save_editor_preference( $request ) {
		$features = array(
			'fixedToolbar',
			'welcomeGuide',
			'fullscreenMode',
			'showIconLabels',
			'themeStyles',
			'showInserterHelpPanel',
			'focusMode',
			'reducedUI',
			'showBlockBreadcrumbs',
			'mostUsedBlocks',
			'keepCaretInsideBlock',
		);

		$settings = get_user_meta( get_current_user_id(), 'cbfm_default_state', true );

		// Upgrade older settings users.
		if ( ! is_array( $settings ) ) {
			$settings = array(
				'fullscreenMode' => $settings,
			);
		}

		$params = $request->get_params();

		foreach ( $params as $param => $value ) {
			// Skip unwatched parameters.
			if ( ! in_array( $param, $features ) ) {
				continue;
			}

			$settings[ $param ] = ( true === $value ? 'true' : 'false' );
		}

		update_user_meta( get_current_user_id(), 'cbfm_default_state', $settings );

		return true;
	}

}

new CBFM_Rest_API();
