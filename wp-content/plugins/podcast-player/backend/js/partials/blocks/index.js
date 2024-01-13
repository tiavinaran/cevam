import edit from './edit';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

registerBlockType( 'podcast-player/podcast-player', {
	title: __( 'Podcast Player', 'podcast-player' ),
	description: __( 'Host your podcast anywhere, display them only using podcasting feed url.', 'podcast-player' ),
	icon: <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><path d="M32 16c0-8.837-7.163-16-16-16s-16 7.163-16 16c0 6.877 4.339 12.739 10.428 15.002l-0.428 0.998h12l-0.428-0.998c6.089-2.263 10.428-8.125 10.428-15.002zM15.212 19.838c-0.713-0.306-1.212-1.014-1.212-1.838 0-1.105 0.895-2 2-2s2 0.895 2 2c0 0.825-0.499 1.533-1.212 1.839l-0.788-1.839-0.788 1.838zM16.821 19.915c1.815-0.379 3.179-1.988 3.179-3.915 0-2.209-1.791-4-4-4s-4 1.791-4 4c0 1.928 1.364 3.535 3.18 3.913l-2.332 5.441c-2.851-1.223-4.848-4.056-4.848-7.355 0-4.418 3.582-8.375 8-8.375s8 3.957 8 8.375c0 3.299-1.997 6.131-4.848 7.355l-2.331-5.439zM21.514 30.866l-2.31-5.39c3.951-1.336 6.796-5.073 6.796-9.476 0-5.523-4.477-10-10-10s-10 4.477-10 10c0 4.402 2.845 8.14 6.796 9.476l-2.31 5.39c-4.987-2.14-8.481-7.095-8.481-12.866 0-7.729 6.266-14.37 13.995-14.37s13.995 6.641 13.995 14.37c0 5.771-3.494 10.726-8.481 12.866z"></path></svg>,
	category: 'widgets',
	keywords: [
		__( 'Podcast', 'featured-content' ),
		__( 'Feed to Audio', 'featured-content' ),
		__( 'Podcasting', 'featured-content' ),
	],
    edit,
    save() {
        return null;
    },
} );
