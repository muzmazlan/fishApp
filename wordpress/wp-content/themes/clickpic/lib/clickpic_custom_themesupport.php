<?php   
/**
 * @package clickpic
 */
 ?>
 <?php
 if ( ! function_exists( 'clickpic_setup' ) ) :
function clickpic_setup() {   
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'clickpic' ),
		'footer' => esc_html__( 'Footer Menu', 'clickpic' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );	

	$defaults = array(
			'default-image'          => get_template_directory_uri() .'/images/slider1.jpg',
			'default-text-color' => 'ffffff',
			'width'                  => 1400,
			'height'                 => 500,
			'uploads'                => true,
			'wp-head-callback'   => 'clickpic_header_style',			
		);
	add_theme_support( 'custom-header', $defaults );
} 
endif; // clickpic_setup
add_action( 'after_setup_theme', 'clickpic_setup' );
?>
<?php
function clickpic_header_style() {
	$clickpic_header_text_color = get_header_textcolor();
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $clickpic_header_text_color ) {
		return;
	}
	echo '<style id="clickpic-custom-header-styles" type="text/css">';
	if ( 'blank' !== $clickpic_header_text_color ) 
	{
		echo '.logotxt, .logotxt a
			 {
				color: #'.esc_attr( $clickpic_header_text_color ).'
			}';
	}	
	echo '</style>';	
}