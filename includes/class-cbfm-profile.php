<?php

class CBFM_Profile {

	/**
     * Available block editor settings, and their labels.
     *
	 * @var string[]
	 */
    private $settings_fields = array();

	public function __construct() {
        $this->prepare_settings_fields();

		add_action( 'personal_options_update', array( $this, 'save_options_field' ) );
		add_action( 'edit_user_profile_update', array( $this, 'save_options_field' ) );

		add_action( 'show_user_profile', array( $this, 'add_options_field' ) );
		add_action( 'edit_user_profile', array( $this, 'add_options_field' ) );
	}

	/**
	 * SEt up the internal array of available settings fields.
	 */
    public function prepare_settings_fields() {
	    $this->settings_fields = array(
		    'fixedToolbar'         => array(
			    'title'    => esc_html__( 'Fixed toolbar', 'blockeditor-fullscreen-mode-control' ),
			    'label'    => esc_html__( 'Enable the fixed toolbar', 'blockeditor-fullscreen-mode-control' ),
			    'helptext' => esc_html__( '(Access all block and document tools in a single place)', 'blockeditor-fullscreen-mode-control' ),
			    'default'  => 'false',
		    ),
		    'welcomeGuide'         => array(
			    'title'    => esc_html__( 'Welcome guide', 'blockeditor-fullscreen-mode-control' ),
			    'label'    => esc_html__( 'Display the new user welcome guide', 'blockeditor-fullscreen-mode-control' ),
			    'helptext' => esc_html__( '(Not published anything in a while, take the welcome tour again)', 'blockeditor-fullscreen-mode-control' ),
			    'default'  => 'true',
		    ),
		    'fullscreenMode'       => array(
			    'title'    => esc_html__( 'Fullscreen Editing', 'blockeditor-fullscreen-mode-control' ),
			    'label'    => esc_html__( 'Enable fullscreen editing', 'blockeditor-fullscreen-mode-control' ),
			    'helptext' => esc_html__( '(Work without distraction)', 'blockeditor-fullscreen-mode-control' ),
			    'default'  => 'true',
		    ),
		    'showIconLabels'       => array(
			    'title'    => esc_html__( 'Button labels', 'blockeditor-fullscreen-mode-control' ),
			    'label'    => esc_html__( 'Display button labels', 'blockeditor-fullscreen-mode-control' ),
			    'helptext' => esc_html__( '(Show texts instead of icons in the toolbar)', 'blockeditor-fullscreen-mode-control' ),
			    'default'  => 'false',
		    ),
		    'themeStyles'          => array(
			    'title'    => esc_html__( 'Theme styles', 'blockeditor-fullscreen-mode-control' ),
			    'label'    => esc_html__( 'Use theme styles', 'blockeditor-fullscreen-mode-control' ),
			    'helptext' => esc_html__( '(Make the editor look like your theme)', 'blockeditor-fullscreen-mode-control' ),
			    'default'  => 'true',
		    ),
		    'focusMode'            => array(
			    'title'    => esc_html__( 'Spotlight mode', 'blockeditor-fullscreen-mode-control' ),
			    'label'    => esc_html__( 'Enable spotlight mode', 'blockeditor-fullscreen-mode-control' ),
			    'helptext' => esc_html__( '(Focus on one block at a time)', 'blockeditor-fullscreen-mode-control' ),
			    'default'  => 'false',
		    ),
		    'reducedUI'            => array(
			    'title'    => esc_html__( 'Reduced interface', 'blockeditor-fullscreen-mode-control' ),
			    'label'    => esc_html__( 'Enable reduced interface', 'blockeditor-fullscreen-mode-control' ),
			    'helptext' => esc_html__( '(Compacts options and outlines in the toolbar)', 'blockeditor-fullscreen-mode-control' ),
			    'default'  => 'false',
		    ),
		    'showBlockBreadcrumbs' => array(
			    'title'    => esc_html__( 'Block breadcrumbs', 'blockeditor-fullscreen-mode-control' ),
			    'label'    => esc_html__( 'Display block breadcrumbs', 'blockeditor-fullscreen-mode-control' ),
			    'helptext' => esc_html__( '(Shows block breadcrumbs at the bottom of the editor)', 'blockeditor-fullscreen-mode-control' ),
			    'default'  => 'true',
		    ),
		    'mostUsedBlocks'       => array(
			    'title'    => esc_html__( 'Most used blocks', 'blockeditor-fullscreen-mode-control' ),
			    'label'    => esc_html__( 'Show most used blocks', 'blockeditor-fullscreen-mode-control' ),
			    'helptext' => esc_html__( '(Places the most frequent blocks in the block library)', 'blockeditor-fullscreen-mode-control' ),
			    'default'  => 'false',
		    ),
		    'keepCaretInsideBlock' => array(
			    'title'    => esc_html__( 'Caret positioning', 'blockeditor-fullscreen-mode-control' ),
			    'label'    => esc_html__( 'Contain text cursor inside block', 'blockeditor-fullscreen-mode-control' ),
			    'helptext' => esc_html__( '(Aids screen readers by stopping text caret from leaving blocks)', 'blockeditor-fullscreen-mode-control' ),
			    'default'  => 'false',
		    )
	    );
    }

	public function save_options_field( $user_id ) {
		if ( ! current_user_can( 'edit_user', $user_id ) ) {
			return;
		}

		$settings = get_user_meta( get_current_user_id(), 'cbfm_default_state', true );

		// Upgrade older settings users.
		if ( ! is_array( $settings ) ) {
            $settings = array(
                'fullscreenMode' => $settings,
            );
		}

        foreach ( $this->settings_fields as $slug => $field ) {
            $settings[ $slug ] = ( isset( $_POST['cbfm-' . esc_attr( $slug ) ] ) ? 'true' : 'false' );
        }

		update_user_meta( $user_id, 'cbfm_default_state', $settings );
	}

	/**
     * Output the markup for the plugins profile settings section.
     *
	 * @param \WP_User $profileuser The WP_User object of the chosen profile.
	 */
	public function add_options_field( $profileuser ) {
		$settings = get_user_meta( get_current_user_id(), 'cbfm_default_state', true );

		if ( ! is_array( $settings ) ) {
			$settings = array(
				'fullscreenMode' => $settings,
			);
		}
		?>

        <h2><?php esc_html_e( 'Block editor settings', 'blockeditor-fullscreen-mode-control' ); ?></h2>

        <table class="form-table" id="cbfm-settings-section" role="presentation">
            <tbody>
            <?php foreach ( $this->settings_fields as $slug => $field ) : ?>

            <tr class="cbfm-<?php echo esc_attr( $slug ); ?>">
                <th scope="row"><?php echo $field['title']; ?></th>
                <td>
                    <label for="cbfm-<?php echo esc_attr( $slug ); ?>">
                        <input name="cbfm-<?php echo esc_attr( $slug ); ?>" type="checkbox" id="cbfm-<?php echo esc_attr( $slug ); ?>" value="true"<?php checked( "true", ( isset( $settings[ $slug ] ) && ! empty( $settings[ $slug ] ) ? $settings[ $slug ] : $field['default'] ) ); ?> />
                        <?php echo $field['label']; ?>
                    </label>

                    <?php if ( isset( $field['helptext'] ) && ! empty( $field['helptext'] ) ) : ?>
                    <small><?php echo $field['helptext']; ?></small>
                    <?php endif; ?>
                </td>
            </tr>

            <?php endforeach; ?>
            </tbody>
        </table>

		<?php
	}

}

new CBFM_Profile();
