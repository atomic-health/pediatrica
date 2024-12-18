
const { registerBlockVariation } = wp.blocks;

wp.domReady( () => {
	registerBlockVariation(
		'core/query',
		{
			title: '[Loop] Newsroom with sticky posts',
			name: '[Loop] Newsroom with sticky posts',
			attributes: {
				namespace: 'newsroom--sticky',
				query: {
						postType: 'newsroom',
						perPage: 2,
						inherit: false,
						doSticky: true
				},
		},
		scope: [ 'inserter' ],
		}
	);

	registerBlockVariation(
		'core/query',
		{
			title: '[Loop] Newsroom exclude current post',
			name: '[Loop] Newsroom exclude current post',
			attributes: {
				namespace: 'newsroom--exclude-current',
				query: {
						postType: 'newsroom',
						perPage: 3,
						inherit: false,
						excludeCurrentPost: true
				},
		},
		scope: [ 'inserter' ],
		}
	);

	registerBlockVariation(
		'core/query',
		{
			title: '[Loop] Blog - Related Posts',
			name: '[Loop] Blog - Related Posts',
			attributes: {
				namespace: 'post--exclude-current',
				query: {
						postType: 'post',
						perPage: 3,
						inherit: false,
						excludeCurrentPost: true
				},
		},
		scope: [ 'inserter' ],
		}
	);

	registerBlockVariation(
		'core/query',
		{
			title: '[Loop] Leadership',
			name: '[Loop] Leadership',
			attributes: {
				namespace: 'leadership--custom-order',
				query: {
						postType: 'leadership',
						perPage: 3,
						inherit: false,
						customOrder: true
				},
		},
		allowedControls: [ 'postType', 'author' ],
		scope: [ 'inserter' ],
		}
	);
} );