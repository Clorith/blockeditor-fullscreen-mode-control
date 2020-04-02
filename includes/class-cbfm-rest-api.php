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
				'callback' => array( $this, 'save_fullscreen_view' ),
				'permission_callback' => function() {
					return is_user_logged_in();
				},
			)
		);
	}

	public function save_fullscreen_view( $request ) {
		update_user_meta( get_current_user_id(), 'cbfm_default_state', ( 'true' === $request->get_param( 'fullscreen' ) ? 'true' : 'false' ) );

		return true;
	}

}

new CBFM_Rest_API();
