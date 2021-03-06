<?php

class CBFM_Profile {

	public function __construct() {
		add_action( 'personal_options', array( $this, 'add_options_field' ) );

		add_action( 'personal_options_update', array( $this, 'save_options_field' ) );
		add_action( 'edit_user_profile_update', array( $this, 'save_options_field' ) );
	}
	public function save_options_field( $user_id ) {
		if ( ! current_user_can( 'edit_user', $user_id ) ) {
			return;
		}

		$settings = get_user_meta( get_current_user_id(), 'cbfm_default_state', true );

		// Upgrade older settings users.
		if ( ! is_array( $settings ) ) {
			$settings = array(
				'fullscreenMode' => ( isset( $_POST['cbfm-default-state'] ) ? 'true' : 'false' ),
			);
		} else {
		    $settings['fullscreenMode'] = ( isset( $_POST['cbfm-default-state'] ) ? 'true' : 'false' );
        }

		update_user_meta( $user_id, 'cbfm_default_state', $settings );
	}

	public function add_options_field( $profileuser ) {
		$settings = get_user_meta( get_current_user_id(), 'cbfm_default_state', true );

		if ( ! is_array( $settings ) ) {
			$settings = array(
				'fullscreenMode' => $settings,
			);
		}
		?>

		<tr class="cbfm-default-state">
			<th scope="row"><?php _e( 'Fullscreen Editing', 'blockeditor-fullscreen-mode-control' ); ?></th>
			<td>
				<label for="cbfm_default_state">
					<input name="cbfm-default-state" type="checkbox" id="cbfm_default_state" value="true"<?php checked( "true", $settings['fullscreenMode'] ); ?> />
					<?php _e( 'Enable fullscreen editing', 'blockeditor-fullscreen-mode-control' ); ?>
				</label>
                <small><?php _e( '(this setting can also be toggled with the fullscreen option inside the block editor)', 'blockeditor-fullscreen-mode-control' ); ?></small>
                <br />
			</td>
		</tr>

		<script type="text/javascript">
			// Move the fullscreen option to the top along with "Visual Editor" where it belongs.
			var cbfm = document.getElementsByClassName( 'cbfm-default-state' )[0];
			var visual = document.getElementsByClassName( 'user-rich-editing-wrap' )[0];

			visual.parentNode.prepend( cbfm );
		</script>

		<?php
	}

}

new CBFM_Profile();
