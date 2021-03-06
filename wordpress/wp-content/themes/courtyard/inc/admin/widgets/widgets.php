<?php
/**
 * Courtyard Theme Widgets.
 *
 * @package Courtyard
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function courtyard_widgets_init() {

  //Register widget areas for the Courtyard Front Page template
  $pages = get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => 'page-templates/template-front-page.php',
  ));
  foreach($pages as $page){
    register_sidebar( array(
      'name'          => esc_html__( 'Front Page - ', 'courtyard' ) . esc_html( $page->post_title ),
      'id'            => 'courtyard_widget_area_' . absint( $page->post_id ),
      'description'   => esc_html__( 'Drag and drop our all custom widgets to build content awesome for the page: ', 'courtyard' ) . esc_html( $page->post_title ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>'
    ) );
  }

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'courtyard' ),
		'id'            => 'courtyard_sidebar',
		'description'   => esc_html__( 'Add widgets in your sidebar of  theme.', 'courtyard' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );

  //Footer widget areas
  $widget_areas = get_theme_mod('courtyard_footer_widgets_area', '3');
  for ($i=1; $i<=$widget_areas; $i++) {
    register_sidebar( array(
      'name'          => esc_html__( 'Footer ', 'courtyard' ) . $i,
      'id'            => 'courtyard_footer_sidebar_' . $i,
      'description'   => esc_html__( 'Add widgets in your footer widget area ', 'courtyard' ) .$i,
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    ) );
  }

  register_widget( "courtyard_video_widget" );
  register_widget( "courtyard_service_widget" );
  register_widget( "courtyard_recent_posts_widget" );
  register_widget( "courtyard_image_slider_widget" );
  register_widget( "courtyard_packages_widget" );
  register_widget( "courtyard_rooms_widget" );
}
add_action( 'widgets_init', 'courtyard_widgets_init' );

/**************************************************************************************/

require get_template_directory() . '/inc/admin/widgets/video-widget.php';
require get_template_directory() . '/inc/admin/widgets/services-widget.php';
require get_template_directory() . '/inc/admin/widgets/recent-posts-widget.php';
require get_template_directory() . '/inc/admin/widgets/image-slider-widget.php';
require get_template_directory() . '/inc/admin/widgets/packages-widget.php';
require get_template_directory() . '/inc/admin/widgets/rooms-widget.php';
