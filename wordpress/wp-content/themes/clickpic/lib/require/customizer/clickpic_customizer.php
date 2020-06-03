<?php 
add_action( 'customize_register', 'clickpic_customize_register_custom_controls', 9 );
function clickpic_customize_register_custom_controls( $wp_customize ) {
    get_template_part( 'lib/require/proupgrade/clickpic','sectionpro');
}
function clickpic_customize_controls_js() {
    $theme = wp_get_theme();
    wp_enqueue_script( 'clickpic-customizer-section-pro-jquery', get_template_directory_uri() . '/lib/require/proupgrade/clickpic-customize-controls.js', array( 'customize-controls' ), $theme->get( 'Version' ), true );
    wp_enqueue_style( 'clickpic-customizer-section-pro', get_template_directory_uri() . '/lib/require/proupgrade/clickpic-customize-controls.css', $theme->get( 'Version' ) );
}
add_action( 'customize_controls_enqueue_scripts', 'clickpic_customize_controls_js' );
?>
<?php
function clickpic_enqueue_comments_reply() {
if( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
add_action( 'comment_form_before', 'clickpic_enqueue_comments_reply' );
?>
<?php 
if ( ! function_exists( 'clickpic_sanitize_page' ) ) :
    function clickpic_sanitize_page( $page_id, $setting ) {
        // Ensure $input is an absolute integer.
        $page_id = absint( $page_id );
        // If $page_id is an ID of a published page, return it; otherwise, return the default.
        return ( 'publish' === get_post_status( $page_id ) ? $page_id : $setting->default );
    }

endif;
function clickpic_customize_register($wp_customize){

    // Register custom section types.
    $wp_customize->register_section_type( 'clickpic_Customize_Section_Pro' );

    // Register sections.
    $wp_customize->add_section( new clickpic_Customize_Section_Pro(
        $wp_customize,
        'theme_go_pro',
        array(
            'priority' => 1,
            'title'    => esc_html__( 'ClickPic Pro', 'clickpic' ),
            'pro_text' => esc_html__( 'Upgrade To Pro', 'clickpic' ),
            'pro_url'  => 'https://themestulip.com/themes/clickpic-photography-wordpress-theme/',
        )
    ) );
    $wp_customize->add_section('clickpic_header', array(
        'title'    => esc_html__('ClickPic Header Phone and Address', 'clickpic'),
        'description' => '',
        'priority' => 30,
    ));
     $wp_customize->add_section('clickpic_social', array(
        'title'    => esc_html__('ClickPic Social Link', 'clickpic'),
        'description' => '',
        'priority' => 35,
    ));


    //  =============================
    //  = Text Input phone number                =
    //  =============================
    $wp_customize->add_setting('clickpic_phone', array(
        'default'        => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
 
    $wp_customize->add_control('clickpic_phone', array(
        'label'      => esc_html__('Phone Number', 'clickpic'),
        'section'    => 'clickpic_header',
        'setting'   => 'clickpic_phone',
        'type'    => 'number'
    ));
    
    //  =============================
    //  = Text Input Email                =
    //  =============================
    $wp_customize->add_setting('clickpic_address', array(
        'default'        => '',
        'sanitize_callback' => 'sanitize_textarea_field'       
    ));
 
    $wp_customize->add_control('clickpic_address', array(
        'label'      => esc_html__('Email Address', 'clickpic'),
        'section'    => 'clickpic_header',
        'setting'   => 'clickpic_address',
        'type'    => 'textarea'
    ));

    //  =============================
    //  = Text Input facebook                =
    //  =============================
    $wp_customize->add_setting('clickpic_fb', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('clickpic_fb', array(
        'label'      => esc_html__('Facebook', 'clickpic'),
        'section'    => 'clickpic_social',
        'setting'   => 'clickpic_fb',
    ));
    //  =============================
    //  = Text Input Twitter                =
    //  =============================
    $wp_customize->add_setting('clickpic_twitter', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('clickpic_twitter', array(
        'label'      => esc_html__('Twitter', 'clickpic'),
        'section'    => 'clickpic_social',
        'setting'   => 'clickpic_twitter',
    ));
    //  =============================
    //  = Text Input googleplus                =
    //  =============================
    $wp_customize->add_setting('clickpic_glplus', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('clickpic_glplus', array(
        'label'      => esc_html__('Google Plus', 'clickpic'),
        'section'    => 'clickpic_social',
        'setting'   => 'clickpic_glplus',
    ));
    //  =============================
    //  = Text Input linkedin                =
    //  =============================
    $wp_customize->add_setting('clickpic_in', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('clickpic_in', array(
        'label'      => esc_html__('Linkedin', 'clickpic'),
        'section'    => 'clickpic_social',
        'setting'   => 'clickpic_in',
    ));

    //  =============================
    //  = slider section              =
    //  =============================
    $wp_customize->add_section('business_multi_lite_banner', array(
        'title'    => esc_html__('ClickPic Home Banner Text', 'clickpic'),
        'description' => esc_html__('add home banner text here.','clickpic'),
        'priority' => 36,
    ));
   
// Banner heading Text
    $wp_customize->add_setting('banner_heading',array(
            'default'   => null,
            'sanitize_callback' => 'sanitize_text_field'    
    ));
    
    $wp_customize->add_control('banner_heading',array( 
            'type'  => 'text',
            'label' => esc_html__('Add Banner heading here','clickpic'),
            'section'   => 'business_multi_lite_banner',
            'setting'   => 'banner_heading'
    )); // Banner heading Text

    // Banner heading Text
    $wp_customize->add_setting('banner_sub_heading',array(
            'default'   => null,
            'sanitize_callback' => 'sanitize_text_field'    
    ));
    
    $wp_customize->add_control('banner_sub_heading',array( 
            'type'  => 'text',
            'label' => esc_html__('Add Banner sub heading here','clickpic'),
            'section'   => 'business_multi_lite_banner',
            'setting'   => 'banner_sub_heading'
    )); // Banner heading Text

  //  =============================
    //  = Footer              =
    //  =============================

    $wp_customize->add_section('clickpic_footer', array(
        'title'    => esc_html__('ClickPic Footer', 'clickpic'),
        'description' => '',
        'priority' => 37,
    ));

	// Footer design and developed
	 $wp_customize->add_setting('clickpic_design', array(
        'default'        => '',
		'sanitize_callback' => 'sanitize_textarea_field'
    ));
 
    $wp_customize->add_control('clickpic_design', array(
        'label'      => esc_html__('Design and developed', 'clickpic'),
        'section'    => 'clickpic_footer',
        'setting'   => 'clickpic_design',
		'type'	   =>'textarea'
    ));
	// Footer copyright
	 $wp_customize->add_setting('clickpic_copyright', array(
        'default'        => '',
		'sanitize_callback' => 'sanitize_textarea_field'       
    ));
 
    $wp_customize->add_control('clickpic_copyright', array(
        'label'      => esc_html__('Copyright', 'clickpic'),
        'section'    => 'clickpic_footer',
        'setting'   => 'clickpic_copyright',
		'type'	   =>'textarea'
    ));	
}
add_action('customize_register', 'clickpic_customize_register');
?>