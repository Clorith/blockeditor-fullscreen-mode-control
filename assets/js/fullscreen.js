const cbfmIsFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' );
var cbfmLastIsFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' );

if ( cbfmIsFullscreenMode && "true" !== cbfm_manager.fullscreen || ! cbfmIsFullscreenMode && "true" === cbfm_manager.fullscreen ) {
	wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' );
}

wp.data.subscribe( function() {
	var isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' );

	if ( isFullscreenMode !== cbfmLastIsFullscreenMode ) {
		cbfmLastIsFullscreenMode = isFullscreenMode;

		wp.apiFetch( {
			path: '/cbfm-manage/v1/save',
			method: 'POST',
			data: {
				fullscreen: isFullscreenMode ? 'true' : 'false'
			}
		} );
	}
} );
