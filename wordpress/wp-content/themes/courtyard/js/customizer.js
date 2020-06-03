/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	/* Shows a live preview of changing the breadcrumbs delimeter. */
	wp.customize( 'customize-control-courtyard_breadcrumbs_sep', function( value ) {
		value.bind( function( to ) {
			$( '.pt-breadcrumbs .pt-breadcrumbs-items .pt-breadcrumbs-delimiter' ).text( to ) ;
		});
	});

	/* Shows a live preview of changing the readmore text. */
	wp.customize( 'customize-control-courtyard_blog_read_more_text', function( value ) {
		value.bind( function( to ) {
			$( '#primary .read-more' ).text( to ) ;
		});
	});

} )( jQuery );
