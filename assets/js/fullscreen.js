const cbfmUserSettings = [
	'fixedToolbar',
	'welcomeGuide',
	'fullscreenMode',
	'showIconLabels',
	'themeStyles',
	'showInserterHelpPanel',
	'focusMode',
	'reducedUI',
];

var cbfmLoop,
	cbfmCurrentMode = [],
	cbfmLastMode = [];

for ( cbfmLoop = 0; cbfmLoop < cbfmUserSettings.length; cbfmLoop++ ) {
	var feature = cbfmUserSettings[ cbfmLoop ];

	cbfmCurrentMode[ feature ] = wp.data.select( 'core/edit-post' ).isFeatureActive( feature );
	cbfmLastMode[ feature ] = wp.data.select( 'core/edit-post' ).isFeatureActive( feature );

	// Only try to override states if they are found in usermeta.
	if ( typeof cbfm_manager[ feature] !== 'undefined' ) {
		if (cbfmCurrentMode[feature] && "true" !== cbfm_manager[feature] || !cbfmCurrentMode[feature] && "true" === cbfm_manager[feature]) {
			wp.data.dispatch('core/edit-post').toggleFeature(feature);
		}
	}
}

wp.data.subscribe( function() {
	var data = {};

	for ( cbfmLoop = 0; cbfmLoop < cbfmUserSettings.length; cbfmLoop++ ) {
		var feature = cbfmUserSettings[ cbfmLoop ];
		var check = wp.data.select( 'core/edit-post' ).isFeatureActive( feature );

		if ( check !== cbfmLastMode[ feature ] ) {
			cbfmLastMode[ feature ] = check;

			data[ feature ] = check;
		}
	}

	console.log( { data } );
	console.log( { cbfmLastMode } );
	console.log( { cbfmUserSettings } );
	console.log( { cbfmCurrentMode } );

	if ( Object.keys( data ).length >= 1 ) {
		wp.apiFetch( {
			path: '/cbfm-manage/v1/save',
			method: 'POST',
			data: data,
		} );
	}
} );
