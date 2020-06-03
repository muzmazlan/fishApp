<?php
/**
 * Multipurpose Photography Theme Customizer
 * @package Multipurpose Photography
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function multipurpose_photography_customize_register( $wp_customize ) {	

	class Multipurpose_Photography_WP_Customize_Range_Control extends WP_Customize_Control{
	    public $type = 'custom_range';
	    public function enqueue(){
	        wp_enqueue_script(
	            'cs-range-control',
	            false,
	            true
	        );
	    }
	    public function render_content(){?>
	        <label>
	            <?php if ( ! empty( $this->label )) : ?>
	                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
	            <?php endif; ?>
	            <div class="cs-range-value"><?php echo esc_attr($this->value()); ?></div>
	            <input data-input-type="range" type="range" <?php $this->input_attrs(); ?> value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
	            <?php if ( ! empty( $this->description )) : ?>
	                <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
	            <?php endif; ?>
	        </label>
        <?php }
	}

	//add home page setting pannel
	$wp_customize->add_panel( 'multipurpose_photography_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'multipurpose-photography' ),
	    'description' => __( 'Description of what this panel does.', 'multipurpose-photography' ),
	) );

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'multipurpose_photography_theme_color_option', array( 
		'panel' => 'multipurpose_photography_panel_id', 
		'title' => esc_html__( 'Global Color Settings', 'multipurpose-photography' ) 
	) );

  	$wp_customize->add_setting( 'multipurpose_photography_first_theme_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_photography_first_theme_color', array(
  		'label' => 'Color Option 1',
	    'description' => __('One can change complete theme global color settings on just one click.', 'multipurpose-photography'),
	    'section' => 'multipurpose_photography_theme_color_option',
	    'settings' => 'multipurpose_photography_first_theme_color',
  	)));

  	$wp_customize->add_setting( 'multipurpose_photography_second_theme_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_photography_second_theme_color', array(
  		'label' => 'Color Option 2',
	    'description' => __('One can change complete theme global color settings on just one click.', 'multipurpose-photography'),
	    'section' => 'multipurpose_photography_theme_color_option',
	    'settings' => 'multipurpose_photography_second_theme_color',
  	)));

	// font array
	$multipurpose_photography_font_array = array(
        '' => 'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' => 'Acme',
        'Anton' => 'Anton',
        'Architects Daughter' => 'Architects Daughter',
        'Arimo' => 'Arimo',
        'Arsenal' => 'Arsenal', 
        'Arvo' => 'Arvo',
        'Alegreya' => 'Alegreya',
        'Alfa Slab One' => 'Alfa Slab One',
        'Averia Serif Libre' => 'Averia Serif Libre',
        'Bangers' => 'Bangers', 
        'Boogaloo' => 'Boogaloo',
        'Bad Script' => 'Bad Script',
        'Bitter' => 'Bitter',
        'Bree Serif' => 'Bree Serif',
        'BenchNine' => 'BenchNine', 
        'Cabin' => 'Cabin', 
        'Cardo' => 'Cardo',
        'Courgette' => 'Courgette',
        'Cherry Swash' => 'Cherry Swash',
        'Cormorant Garamond' => 'Cormorant Garamond',
        'Crimson Text' => 'Crimson Text',
        'Cuprum' => 'Cuprum', 
        'Cookie' => 'Cookie', 
        'Chewy' => 'Chewy', 
        'Days One' => 'Days One', 
        'Dosis' => 'Dosis',
        'Droid Sans' => 'Droid Sans',
        'Economica' => 'Economica',
        'Fredoka One' => 'Fredoka One',
        'Fjalla One' => 'Fjalla One',
        'Francois One' => 'Francois One',
        'Frank Ruhl Libre' => 'Frank Ruhl Libre',
        'Gloria Hallelujah' => 'Gloria Hallelujah',
        'Great Vibes' => 'Great Vibes',
        'Handlee' => 'Handlee', 
        'Hammersmith One' => 'Hammersmith One',
        'Inconsolata' => 'Inconsolata', 
        'Indie Flower' => 'Indie Flower', 
        'IM Fell English SC' => 'IM Fell English SC', 
        'Julius Sans One' => 'Julius Sans One',
        'Josefin Slab' => 'Josefin Slab', 
        'Josefin Sans' => 'Josefin Sans', 
        'Kanit' => 'Kanit', 
        'Lobster' => 'Lobster', 
        'Lato' => 'Lato',
        'Lora' => 'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather', 
        'Monda' => 'Monda',
        'Montserrat' => 'Montserrat',
        'Muli' => 'Muli', 
        'Marck Script' => 'Marck Script',
        'Noto Serif' => 'Noto Serif',
        'Open Sans' => 'Open Sans', 
        'Overpass' => 'Overpass',
        'Overpass Mono' => 'Overpass Mono',
        'Oxygen' => 'Oxygen', 
        'Orbitron' => 'Orbitron', 
        'Patua One' => 'Patua One', 
        'Pacifico' => 'Pacifico',
        'Padauk' => 'Padauk', 
        'Playball' => 'Playball',
        'Playfair Display' => 'Playfair Display', 
        'PT Sans' => 'PT Sans',
        'Philosopher' => 'Philosopher',
        'Permanent Marker' => 'Permanent Marker',
        'Poiret One' => 'Poiret One', 
        'Quicksand' => 'Quicksand', 
        'Quattrocento Sans' => 'Quattrocento Sans', 
        'Raleway' => 'Raleway', 
        'Rubik' => 'Rubik', 
        'Rokkitt' => 'Rokkitt', 
        'Russo One' => 'Russo One', 
        'Righteous' => 'Righteous', 
        'Slabo' => 'Slabo', 
        'Source Sans Pro' => 'Source Sans Pro', 
        'Shadows Into Light Two' =>'Shadows Into Light Two', 
        'Shadows Into Light' => 'Shadows Into Light', 
        'Sacramento' => 'Sacramento', 
        'Shrikhand' => 'Shrikhand', 
        'Tangerine' => 'Tangerine',
        'Ubuntu' => 'Ubuntu', 
        'VT323' => 'VT323', 
        'Varela Round' => 'Varela Round', 
        'Vampiro One' => 'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' => 'Volkhov', 
        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
    );

	//Typography
	$wp_customize->add_section( 'multipurpose_photography_typography', array(
    	'title' => __( 'Typography', 'multipurpose-photography' ),
		'priority'   => 30,
		'panel' => 'multipurpose_photography_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'multipurpose_photography_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_photography_paragraph_color', array(
		'label' => __('Paragraph Color', 'multipurpose-photography'),
		'section' => 'multipurpose_photography_typography',
		'settings' => 'multipurpose_photography_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('multipurpose_photography_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'multipurpose_photography_sanitize_choices'
	));
	$wp_customize->add_control(
	    'multipurpose_photography_paragraph_font_family', array(
	    'section'  => 'multipurpose_photography_typography',
	    'label'    => __( 'Paragraph Fonts','multipurpose-photography'),
	    'type'     => 'select',
	    'choices'  => $multipurpose_photography_font_array,
	));

	$wp_customize->add_setting('multipurpose_photography_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('multipurpose_photography_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_typography',
		'setting'	=> 'multipurpose_photography_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'multipurpose_photography_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_photography_atag_color', array(
		'label' => __('"a" Tag Color', 'multipurpose-photography'),
		'section' => 'multipurpose_photography_typography',
		'settings' => 'multipurpose_photography_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('multipurpose_photography_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'multipurpose_photography_sanitize_choices'
	));
	$wp_customize->add_control(
	    'multipurpose_photography_atag_font_family', array(
	    'section'  => 'multipurpose_photography_typography',
	    'label'    => __( '"a" Tag Fonts','multipurpose-photography'),
	    'type'     => 'select',
	    'choices'  => $multipurpose_photography_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'multipurpose_photography_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_photography_li_color', array(
		'label' => __('"li" Tag Color', 'multipurpose-photography'),
		'section' => 'multipurpose_photography_typography',
		'settings' => 'multipurpose_photography_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('multipurpose_photography_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'multipurpose_photography_sanitize_choices'
	));
	$wp_customize->add_control(
	    'multipurpose_photography_li_font_family', array(
	    'section'  => 'multipurpose_photography_typography',
	    'label'    => __( '"li" Tag Fonts','multipurpose-photography'),
	    'type'     => 'select',
	    'choices'  => $multipurpose_photography_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'multipurpose_photography_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_photography_h1_color', array(
		'label' => __('H1 Color', 'multipurpose-photography'),
		'section' => 'multipurpose_photography_typography',
		'settings' => 'multipurpose_photography_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('multipurpose_photography_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'multipurpose_photography_sanitize_choices'
	));
	$wp_customize->add_control(
	    'multipurpose_photography_h1_font_family', array(
	    'section'  => 'multipurpose_photography_typography',
	    'label'    => __( 'H1 Fonts','multipurpose-photography'),
	    'type'     => 'select',
	    'choices'  => $multipurpose_photography_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('multipurpose_photography_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('multipurpose_photography_h1_font_size',array(
		'label'	=> __('H1 Font Size','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_typography',
		'setting'	=> 'multipurpose_photography_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'multipurpose_photography_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_photography_h2_color', array(
		'label' => __('h2 Color', 'multipurpose-photography'),
		'section' => 'multipurpose_photography_typography',
		'settings' => 'multipurpose_photography_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('multipurpose_photography_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'multipurpose_photography_sanitize_choices'
	));
	$wp_customize->add_control(
	    'multipurpose_photography_h2_font_family', array(
	    'section'  => 'multipurpose_photography_typography',
	    'label'    => __( 'h2 Fonts','multipurpose-photography'),
	    'type'     => 'select',
	    'choices'  => $multipurpose_photography_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('multipurpose_photography_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('multipurpose_photography_h2_font_size',array(
		'label'	=> __('h2 Font Size','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_typography',
		'setting'	=> 'multipurpose_photography_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'multipurpose_photography_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_photography_h3_color', array(
		'label' => __('h3 Color', 'multipurpose-photography'),
		'section' => 'multipurpose_photography_typography',
		'settings' => 'multipurpose_photography_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('multipurpose_photography_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'multipurpose_photography_sanitize_choices'
	));
	$wp_customize->add_control(
	    'multipurpose_photography_h3_font_family', array(
	    'section'  => 'multipurpose_photography_typography',
	    'label'    => __( 'h3 Fonts','multipurpose-photography'),
	    'type'     => 'select',
	    'choices'  => $multipurpose_photography_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('multipurpose_photography_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('multipurpose_photography_h3_font_size',array(
		'label'	=> __('h3 Font Size','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_typography',
		'setting'	=> 'multipurpose_photography_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'multipurpose_photography_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_photography_h4_color', array(
		'label' => __('h4 Color', 'multipurpose-photography'),
		'section' => 'multipurpose_photography_typography',
		'settings' => 'multipurpose_photography_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('multipurpose_photography_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'multipurpose_photography_sanitize_choices'
	));
	$wp_customize->add_control(
	    'multipurpose_photography_h4_font_family', array(
	    'section'  => 'multipurpose_photography_typography',
	    'label'    => __( 'h4 Fonts','multipurpose-photography'),
	    'type'     => 'select',
	    'choices'  => $multipurpose_photography_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('multipurpose_photography_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('multipurpose_photography_h4_font_size',array(
		'label'	=> __('h4 Font Size','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_typography',
		'setting'	=> 'multipurpose_photography_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'multipurpose_photography_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_photography_h5_color', array(
		'label' => __('h5 Color', 'multipurpose-photography'),
		'section' => 'multipurpose_photography_typography',
		'settings' => 'multipurpose_photography_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('multipurpose_photography_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'multipurpose_photography_sanitize_choices'
	));
	$wp_customize->add_control(
	    'multipurpose_photography_h5_font_family', array(
	    'section'  => 'multipurpose_photography_typography',
	    'label'    => __( 'h5 Fonts','multipurpose-photography'),
	    'type'     => 'select',
	    'choices'  => $multipurpose_photography_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('multipurpose_photography_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('multipurpose_photography_h5_font_size',array(
		'label'	=> __('h5 Font Size','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_typography',
		'setting'	=> 'multipurpose_photography_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'multipurpose_photography_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_photography_h6_color', array(
		'label' => __('h6 Color', 'multipurpose-photography'),
		'section' => 'multipurpose_photography_typography',
		'settings' => 'multipurpose_photography_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('multipurpose_photography_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'multipurpose_photography_sanitize_choices'
	));
	$wp_customize->add_control(
	    'multipurpose_photography_h6_font_family', array(
	    'section'  => 'multipurpose_photography_typography',
	    'label'    => __( 'h6 Fonts','multipurpose-photography'),
	    'type'     => 'select',
	    'choices'  => $multipurpose_photography_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('multipurpose_photography_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('multipurpose_photography_h6_font_size',array(
		'label'	=> __('h6 Font Size','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_typography',
		'setting'	=> 'multipurpose_photography_h6_font_size',
		'type'	=> 'text'
	));

	//Topbar section
	$wp_customize->add_section('multipurpose_photography_topbar_icon',array(
		'title'	=> __('Topbar Section','multipurpose-photography'),
		'description'	=> __('Add Header Content here','multipurpose-photography'),
		'priority'	=> null,
		'panel' => 'multipurpose_photography_panel_id',
	));

	$wp_customize->add_setting('multipurpose_photography_sticky_header',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('multipurpose_photography_sticky_header',array(
       'type' => 'checkbox',
       'label' => __('Stick header on Desktop','multipurpose-photography'),
       'section' => 'multipurpose_photography_topbar_icon'
    ));

	$wp_customize->add_setting('multipurpose_photography_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multipurpose_photography_call',array(
		'label'	=> __('Add Phone No.','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_topbar_icon',
		'setting'	=> 'multipurpose_photography_call',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('multipurpose_photography_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('multipurpose_photography_facebook_url',array(
		'label'	=> __('Add Facebook link','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_topbar_icon',
		'setting'	=> 'multipurpose_photography_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('multipurpose_photography_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('multipurpose_photography_twitter_url',array(
		'label'	=> __('Add Twitter link','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_topbar_icon',
		'setting'	=> 'multipurpose_photography_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('multipurpose_photography_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('multipurpose_photography_insta_url',array(
		'label'	=> __('Add Instagram link','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_topbar_icon',
		'setting'	=> 'multipurpose_photography_insta_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('multipurpose_photography_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('multipurpose_photography_youtube_url',array(
		'label'	=> __('Add Youtube link','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_topbar_icon',
		'setting'	=> 'multipurpose_photography_youtube_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('multipurpose_photography_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('multipurpose_photography_linkedin_url',array(
		'label'	=> __('Add Likedin link','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_topbar_icon',
		'setting'	=> 'multipurpose_photography_linkedin_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('multipurpose_photography_pinterest_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('multipurpose_photography_pinterest_url',array(
		'label'	=> __('Add Pinterest link','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_topbar_icon',
		'setting'	=> 'multipurpose_photography_pinterest_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('multipurpose_photography_tumblr_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('multipurpose_photography_tumblr_url',array(
		'label'	=> __('Add Tumblr link','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_topbar_icon',
		'setting'	=> 'multipurpose_photography_tumblr_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('multipurpose_photography_google_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('multipurpose_photography_google_url',array(
		'label'	=> __('Add Google link','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_topbar_icon',
		'setting'	=> 'multipurpose_photography_google_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('multipurpose_photography_rss_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('multipurpose_photography_rss_url',array(
		'label'	=> __('Add RSS link','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_topbar_icon',
		'setting'	=> 'multipurpose_photography_rss_url',
		'type'	=> 'url'
	));

	//Slider section
  	$wp_customize->add_section('multipurpose_photography_slidersettings',array(
	    'title' => __('Slider Section','multipurpose-photography'),
	    'description' => '',
	    'priority'  => null,
	    'panel' => 'multipurpose_photography_panel_id',
	)); 

	$wp_customize->add_setting('multipurpose_photography_slider_hide_show',array(
	  'default' => false,
	  'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multipurpose_photography_slider_hide_show',array(
	  'type' => 'checkbox',
	  'label' => __('Show / Hide slider','multipurpose-photography'),
	  'section' => 'multipurpose_photography_slidersettings',
	));

	$wp_customize->add_setting('multipurpose_photography_slider_indicator',array(
        'default' => true,
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multipurpose_photography_slider_indicator',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Indicators','multipurpose-photography'),
      	'section' => 'multipurpose_photography_slidersettings'
	));

	$wp_customize->add_setting('multipurpose_photography_slider_title',array(
        'default' => true,
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multipurpose_photography_slider_title',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Title','multipurpose-photography'),
      	'section' => 'multipurpose_photography_slidersettings'
	));

	$wp_customize->add_setting('multipurpose_photography_slider_content',array(
        'default' => true,
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multipurpose_photography_slider_content',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Content','multipurpose-photography'),
      	'section' => 'multipurpose_photography_slidersettings'
	));

	$wp_customize->add_setting('multipurpose_photography_slider_button',array(
        'default' => true,
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multipurpose_photography_slider_button',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Button','multipurpose-photography'),
      	'section' => 'multipurpose_photography_slidersettings'
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		// Add color scheme setting and control.
		$wp_customize->add_setting( 'multipurpose_photography_slidersettings_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'multipurpose_photography_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'multipurpose_photography_slidersettings_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'multipurpose-photography' ),
			'section'  => 'multipurpose_photography_slidersettings',
			'type'     => 'dropdown-pages'
		) 	);
	}

	//content Alignment
    $wp_customize->add_setting('multipurpose_photography_slider_alignment_option',array(
    'default' => __('Center Align','multipurpose-photography'),
        'sanitize_callback' => 'multipurpose_photography_sanitize_choices'
	));
	$wp_customize->add_control('multipurpose_photography_slider_alignment_option',array(
        'type' => 'radio',
        'label' => __('Slider Content Alignment','multipurpose-photography'),
        'section' => 'multipurpose_photography_slidersettings',
        'choices' => array(
            'Center Align' => __('Center Align','multipurpose-photography'),
            'Left Align' => __('Left Align','multipurpose-photography'),
            'Right Align' => __('Right Align','multipurpose-photography'),
        ),
	) );

    //Slider excerpt
	$wp_customize->add_setting( 'multipurpose_photography_slider_excerpt', array(
		'default'              => 25,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'multipurpose_photography_slider_excerpt', array(
		'label'       => esc_html__( 'Slider Excerpt length','multipurpose-photography' ),
		'section'     => 'multipurpose_photography_slidersettings',
		'type'        => 'number',
		'settings'    => 'multipurpose_photography_slider_excerpt',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('multipurpose_photography_slider_opacity',array(
      'default'              => 0.7,
      'sanitize_callback' => 'multipurpose_photography_sanitize_choices'
	));
	$wp_customize->add_control( 'multipurpose_photography_slider_opacity', array(
		'label'       => esc_html__( 'Slider Image Opacity','multipurpose-photography' ),
		'section'     => 'multipurpose_photography_slidersettings',
		'type'        => 'select',
		'settings'    => 'multipurpose_photography_slider_opacity',
		'choices' => array(
	      '0' =>  esc_attr('0','multipurpose-photography'),
	      '0.1' =>  esc_attr('0.1','multipurpose-photography'),
	      '0.2' =>  esc_attr('0.2','multipurpose-photography'),
	      '0.3' =>  esc_attr('0.3','multipurpose-photography'),
	      '0.4' =>  esc_attr('0.4','multipurpose-photography'),
	      '0.5' =>  esc_attr('0.5','multipurpose-photography'),
	      '0.6' =>  esc_attr('0.6','multipurpose-photography'),
	      '0.7' =>  esc_attr('0.7','multipurpose-photography'),
	      '0.8' =>  esc_attr('0.8','multipurpose-photography'),
	      '0.9' =>  esc_attr('0.9','multipurpose-photography')
	  ),
	));

	$wp_customize->add_setting( 'multipurpose_photography_slider_button_label', array(
		'default' => __('READ MORE','multipurpose-photography' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'multipurpose_photography_slider_button_label', array(
		'label' => esc_html__( 'Slider Button Label','multipurpose-photography' ),
		'section'     => 'multipurpose_photography_slidersettings',
		'type'        => 'text',
		'settings'    => 'multipurpose_photography_slider_button_label'
	) );

	//About Section
	$wp_customize->add_section('multipurpose_photography_services',array(
		'title'	=> __('Services Section','multipurpose-photography'),
		'description'	=> __('Add Slider sections below.','multipurpose-photography'),
		'panel' => 'multipurpose_photography_panel_id',
	));

	$wp_customize->add_setting('multipurpose_photography_services_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_photography_services_title',array(
		'label'	=> __('Section Title','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_services',
		'type'		=> 'text'
	));

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';	
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('multipurpose_photography_services_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('multipurpose_photography_services_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Latest Post','multipurpose-photography'),
		'description'=> __('Size of image should be 80 x 80 ','multipurpose-photography'),
		'section' => 'multipurpose_photography_services',
	));
	
	//layout setting
	$wp_customize->add_section( 'multipurpose_photography_theme_layout', array(
    	'title'  => __( 'Blog Settings', 'multipurpose-photography' ),
		'priority'   => null,
		'panel' => 'multipurpose_photography_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('multipurpose_photography_layout',array(
        'default' => __( 'Right Sidebar', 'multipurpose-photography' ),
        'sanitize_callback' => 'multipurpose_photography_sanitize_choices'
	) );
	$wp_customize->add_control(new Multipurpose_Photography_Image_Radio_Control($wp_customize, 'multipurpose_photography_layout', array(
        'type' => 'radio',
        'label' => esc_html__('Select Sidebar layout', 'multipurpose-photography'),
        'section' => 'multipurpose_photography_theme_layout',
        'settings' => 'multipurpose_photography_layout',
        'choices' => array(
            'Right Sidebar' => get_template_directory_uri() . '/images/layout3.png',
            'Left Sidebar' => get_template_directory_uri() . '/images/layout2.png',
            'One Column' => get_template_directory_uri() . '/images/layout1.png',
            'Three Columns' => get_template_directory_uri() . '/images/layout4.png',
            'Four Columns' => get_template_directory_uri() . '/images/layout5.png',
            'Grid Layout' => get_template_directory_uri() . '/images/layout6.png'
   	))));

   	$wp_customize->add_setting('multipurpose_photography_metafields_date',array(
       'default' => 'true',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('multipurpose_photography_metafields_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Date ','multipurpose-photography'),
       'section' => 'multipurpose_photography_theme_layout'
    ));

    $wp_customize->add_setting('multipurpose_photography_metafields_author',array(
       'default' => 'true',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('multipurpose_photography_metafields_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Author','multipurpose-photography'),
       'section' => 'multipurpose_photography_theme_layout'
    ));

    $wp_customize->add_setting('multipurpose_photography_metafields_comment',array(
       'default' => 'true',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('multipurpose_photography_metafields_comment',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Comments','multipurpose-photography'),
       'section' => 'multipurpose_photography_theme_layout'
    ));

    $wp_customize->add_setting('multipurpose_photography_blog_post_content',array(
    	'default' => __('Excerpt Content','multipurpose-photography'),
        'sanitize_callback' => 'multipurpose_photography_sanitize_choices'
	));
	$wp_customize->add_control('multipurpose_photography_blog_post_content',array(
        'type' => 'radio',
        'label' => __('Blog Post Content Type','multipurpose-photography'),
        'section' => 'multipurpose_photography_theme_layout',
        'choices' => array(
            'No Content' => __('No Content','multipurpose-photography'),
            'Full Content' => __('Full Content','multipurpose-photography'),
            'Excerpt Content' => __('Excerpt Content','multipurpose-photography'),
        ),
	) );

    $wp_customize->add_setting( 'multipurpose_photography_post_excerpt_number', array(
		'default'              => 20,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'multipurpose_photography_post_excerpt_number', array(
		'label'       => esc_html__( 'Blog Post Excerpt Number (Max 50)','multipurpose-photography' ),
		'section'   => 'multipurpose_photography_theme_layout',
		'type'        => 'number',
		'settings' => 'multipurpose_photography_post_excerpt_number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
		'active_callback' => 'multipurpose_photography_excerpt_enabled'
	) );

	$wp_customize->add_setting( 'multipurpose_photography_button_excerpt_suffix', array(
		'default'   => '...',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'multipurpose_photography_button_excerpt_suffix', array(
		'label'       => esc_html__( 'Post Excerpt Suffix','multipurpose-photography' ),
		'section'     => 'multipurpose_photography_theme_layout',
		'type'        => 'text',
		'settings'    => 'multipurpose_photography_button_excerpt_suffix',
		'active_callback' => 'multipurpose_photography_excerpt_enabled'
	) );

	$wp_customize->add_section( 'multipurpose_photography_single_post_settings', array(
		'title' => __( 'Single Post Options', 'multipurpose-photography' ),
		'panel' => 'multipurpose_photography_panel_id',
	));

	$wp_customize->add_setting('multipurpose_photography_metafields_tags',array(
       'default' => 'true',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('multipurpose_photography_metafields_tags',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Tags','multipurpose-photography'),
       'section' => 'multipurpose_photography_single_post_settings'
    ));

	$wp_customize->add_setting('multipurpose_photography_related_posts',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('multipurpose_photography_related_posts',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Related Posts','multipurpose-photography'),
       'section' => 'multipurpose_photography_single_post_settings'
    ));

    $wp_customize->add_setting('multipurpose_photography_related_posts_title',array(
       'default' => __('You May Also Like','multipurpose-photography'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('multipurpose_photography_related_posts_title',array(
       'type' => 'text',
       'label' => __('Related Posts Title','multipurpose-photography'),
       'section' => 'multipurpose_photography_single_post_settings'
    ));

    $wp_customize->add_setting( 'multipurpose_photography_related_post_count', array(
		'default' => 3,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'multipurpose_photography_related_post_count', array(
		'label' => esc_html__( 'Related Posts Count','multipurpose-photography' ),
		'section' => 'multipurpose_photography_single_post_settings',
		'type' => 'number',
		'settings' => 'multipurpose_photography_related_post_count',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
	) );

    $wp_customize->add_setting( 'multipurpose_photography_post_shown_by', array(
        'default' => 'categories',
        'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control( 'multipurpose_photography_post_shown_by', array(
        'section' => 'multipurpose_photography_single_post_settings',
        'type' => 'radio',
        'label' => __( 'Related Posts must be shown:', 'multipurpose-photography' ),
        'choices'		=> array(
            'categories'  => __('By Categories', 'multipurpose-photography'),
            'tags' => __( 'By Tags', 'multipurpose-photography' ),
    )));

	// Button option
	$wp_customize->add_section( 'multipurpose_photography_button_options', array(
		'title' =>  __( 'Button Options', 'multipurpose-photography' ),
		'panel' => 'multipurpose_photography_panel_id',
	));

    $wp_customize->add_setting( 'multipurpose_photography_blog_button_text', array(
		'default'   => 'Read Full',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'multipurpose_photography_blog_button_text', array(
		'label'       => esc_html__( 'Blog Post Button Label','multipurpose-photography' ),
		'section'     => 'multipurpose_photography_button_options',
		'type'        => 'text',
		'settings'    => 'multipurpose_photography_blog_button_text'
	) );

	$wp_customize->add_setting('multipurpose_photography_button_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('multipurpose_photography_button_padding',array(
		'label'	=> esc_html__('Button Padding','multipurpose-photography'),
		'section'=> 'multipurpose_photography_button_options',
		'active_callback' => 'multipurpose_photography_button_enabled'
	));

	$wp_customize->add_setting('multipurpose_photography_top_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multipurpose_photography_top_button_padding',array(
		'label'	=> __('Top','multipurpose-photography'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'multipurpose_photography_button_options',
		'type'=> 'number',
		'active_callback' => 'multipurpose_photography_button_enabled'
	));

	$wp_customize->add_setting('multipurpose_photography_bottom_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multipurpose_photography_bottom_button_padding',array(
		'label'	=> __('Bottom','multipurpose-photography'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'multipurpose_photography_button_options',
		'type'=> 'number',
		'active_callback' => 'multipurpose_photography_button_enabled'
	));

	$wp_customize->add_setting('multipurpose_photography_left_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multipurpose_photography_left_button_padding',array(
		'label'	=> __('Left','multipurpose-photography'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'multipurpose_photography_button_options',
		'type'=> 'number',
		'active_callback' => 'multipurpose_photography_button_enabled'
	));

	$wp_customize->add_setting('multipurpose_photography_right_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multipurpose_photography_right_button_padding',array(
		'label'	=> __('Right','multipurpose-photography'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'multipurpose_photography_button_options',
		'type'=> 'number',
		'active_callback' => 'multipurpose_photography_button_enabled'
	));

	$wp_customize->add_setting( 'multipurpose_photography_button_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Multipurpose_Photography_WP_Customize_Range_Control( $wp_customize, 'multipurpose_photography_button_border_radius', array(
            'label'  => __('Border Radius','multipurpose-photography'),
            'section'  => 'multipurpose_photography_button_options',
            'description' => __('Measurement is in pixel.','multipurpose-photography'),
            'input_attrs' => array(
                'min' => 0,
                'max' => 50,
            ),
			'active_callback' => 'multipurpose_photography_button_enabled'
    )));

    //Advance Options
	$wp_customize->add_section( 'multipurpose_photography_advance_options', array(
    	'title' => __( 'Advance Options', 'multipurpose-photography' ),
		'priority'   => null,
		'panel' => 'multipurpose_photography_panel_id'
	) );

	$wp_customize->add_setting('multipurpose_photography_preloader',array(
       'default' => 'true',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('multipurpose_photography_preloader',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Preloader','multipurpose-photography'),
       'section' => 'multipurpose_photography_advance_options'
    ));

    $wp_customize->add_setting( 'multipurpose_photography_preloader_color', array(
	    'default' => '#333333',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_photography_preloader_color', array(
  		'label' => __('Preloader Color', 'multipurpose-photography'),
	    'section' => 'multipurpose_photography_advance_options',
	    'settings' => 'multipurpose_photography_preloader_color',
  	)));

  	$wp_customize->add_setting( 'multipurpose_photography_preloader_bg_color', array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'multipurpose_photography_preloader_bg_color', array(
  		'label' => __('Preloader Background Color', 'multipurpose-photography'),
	    'section' => 'multipurpose_photography_advance_options',
	    'settings' => 'multipurpose_photography_preloader_bg_color',
  	)));

	$wp_customize->add_setting('multipurpose_photography_theme_layout_options',array(
        'default' => __('Default Theme','multipurpose-photography'),
        'sanitize_callback' => 'multipurpose_photography_sanitize_choices'
	));
	$wp_customize->add_control('multipurpose_photography_theme_layout_options',array(
        'type' => 'radio',
        'label' => __('Theme Layout','multipurpose-photography'),
        'section' => 'multipurpose_photography_advance_options',
        'choices' => array(
            'Default Theme' => __('Default Theme','multipurpose-photography'),
            'Container Theme' => __('Container Theme','multipurpose-photography'),
            'Box Container Theme' => __('Box Container Theme','multipurpose-photography'),
        ),
	) );

	//404 Page Option
	$wp_customize->add_section('multipurpose_photography_404_settings',array(
		'title'	=> __('404 Settings','multipurpose-photography'),
		'priority'	=> null,
		'panel' => 'multipurpose_photography_panel_id',
	));

	$wp_customize->add_setting('multipurpose_photography_404_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_photography_404_title',array(
		'label'	=> __('404 Title','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_404_settings',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('multipurpose_photography_404_button_label',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_photography_404_button_label',array(
		'label'	=> __('404 button Label','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_404_settings',
		'type'		=> 'text'
	));	

	//Woocommerce Options
	$wp_customize->add_section('multipurpose_photography_woocommerce',array(
		'title'	=> __('WooCommerce Options','multipurpose-photography'),
		'panel' => 'multipurpose_photography_panel_id',
	));

	$wp_customize->add_setting('multipurpose_photography_shop_page_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('multipurpose_photography_shop_page_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable Shop Page Sidebar','multipurpose-photography'),
       'section' => 'multipurpose_photography_woocommerce'
    ));

    $wp_customize->add_setting('multipurpose_photography_single_product_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('multipurpose_photography_single_product_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable Single Product Page Sidebar','multipurpose-photography'),
       'section' => 'multipurpose_photography_woocommerce'
    ));

    $wp_customize->add_setting('multipurpose_photography_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multipurpose_photography_products_per_page',array(
		'label'	=> __('Products Per Page','multipurpose-photography'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'multipurpose_photography_woocommerce',
		'type'=> 'number',
	));

	$wp_customize->add_setting('multipurpose_photography_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multipurpose_photography_products_per_row',array(
		'label'	=> __('Products Per Row','multipurpose-photography'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'multipurpose_photography_woocommerce',
		'type'=> 'select',
	));

	//footer text
	$wp_customize->add_section('multipurpose_photography_footer_section',array(
		'title'	=> __('Footer Section','multipurpose-photography'),
		'panel' => 'multipurpose_photography_panel_id'
	));

	$wp_customize->add_setting('multipurpose_photography_hide_scroll',array(
        'default' => 'true',
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multipurpose_photography_hide_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Back To Top','multipurpose-photography'),
      	'section' => 'multipurpose_photography_footer_section',
	));

	$wp_customize->add_setting('multipurpose_photography_back_to_top',array(
        'default' => __('Right','multipurpose-photography'),
        'sanitize_callback' => 'multipurpose_photography_sanitize_choices'
	));
	$wp_customize->add_control('multipurpose_photography_back_to_top',array(
        'type' => 'radio',
        'label' => __('Back to Top Alignment','multipurpose-photography'),
        'section' => 'multipurpose_photography_footer_section',
        'choices' => array(
            'Left' => __('Left','multipurpose-photography'),
            'Right' => __('Right','multipurpose-photography'),
            'Center' => __('Center','multipurpose-photography'),
        ),
	) );

	$wp_customize->add_setting('multipurpose_photography_footer_widget',array(
        'default'           => '4',
        'sanitize_callback' => 'multipurpose_photography_sanitize_choices',
    ));
    $wp_customize->add_control('multipurpose_photography_footer_widget',array(
        'type'        => 'radio',
        'label'       => __('No. of Footer columns', 'multipurpose-photography'),
        'section'     => 'multipurpose_photography_footer_section',
        'description' => __('Select the number of footer columns and add your widgets in the footer.', 'multipurpose-photography'),
        'choices' => array(
            '1'   => __('One column', 'multipurpose-photography'),
            '2'   => __('Two columns', 'multipurpose-photography'),
            '3'   => __('Three columns', 'multipurpose-photography'),
            '4'   => __('Four columns', 'multipurpose-photography')
        ),
    )); 

    $wp_customize->add_setting('multipurpose_photography_copyright_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('multipurpose_photography_copyright_padding',array(
		'label'	=> esc_html__('Copyright Padding','multipurpose-photography'),
		'section'=> 'multipurpose_photography_footer_section',
	));

    $wp_customize->add_setting('multipurpose_photography_top_copyright_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multipurpose_photography_top_copyright_padding',array(
		'description'	=> __('Top','multipurpose-photography'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'multipurpose_photography_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('multipurpose_photography_bottom_copyright_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('multipurpose_photography_bottom_copyright_padding',array(
		'description'	=> __('Bottom','multipurpose-photography'),
		'input_attrs' => array(
            'step' => 1,
			'min' => 0,
			'max' => 50,
        ),
		'section'=> 'multipurpose_photography_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('multipurpose_photography_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'multipurpose_photography_sanitize_choices'
	));
	$wp_customize->add_control('multipurpose_photography_copyright_alignment',array(
        'type' => 'radio',
        'label' => __('Copyright Alignment','multipurpose-photography'),
        'section' => 'multipurpose_photography_footer_section',
        'choices' => array(
            'left' => __('Left','multipurpose-photography'),
            'right' => __('Right','multipurpose-photography'),
            'center' => __('Center','multipurpose-photography'),
        ),
	) );

	$wp_customize->add_setting( 'multipurpose_photography_copyright_font_size', array(
		'default'=> '15',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Multipurpose_Photography_WP_Customize_Range_Control( $wp_customize, 'multipurpose_photography_copyright_font_size', array(
        'label'  => __('Copyright Font Size','multipurpose-photography'),
        'section'  => 'multipurpose_photography_footer_section',
        'description' => __('Measurement is in pixel.','multipurpose-photography'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
        )
    )));
	
	$wp_customize->add_setting('multipurpose_photography_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_photography_text',array(
		'label'	=> __('Copyright Text','multipurpose-photography'),
		'description'	=> __('Add some text for footer like copyright etc.','multipurpose-photography'),
		'section'	=> 'multipurpose_photography_footer_section',
		'type'		=> 'text'
	));	
}
add_action( 'customize_register', 'multipurpose_photography_customize_register' );	

load_template( ABSPATH . 'wp-includes/class-wp-customize-control.php' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

class Multipurpose_Photography_Image_Radio_Control extends WP_Customize_Control {

    public function render_content() {
 
        if (empty($this->choices))
            return;
 
        $name = '_customize-radio-' . $this->id;
        ?>
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
        <ul class="controls" id='multipurpose-photography-img-container'>
            <?php
            foreach ($this->choices as $value => $label) :
                $class = ($this->value() == $value) ? 'multipurpose-photography-radio-img-selected multipurpose-photography-radio-img-img' : 'multipurpose-photography-radio-img-img';
                ?>
                <li style="display: inline;">
                    <label>
                        <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
                          	$this->link();
                          	checked($this->value(), $value);
                          	?> />
                        <img role="img" src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
                    </label>
                </li>
                <?php
            endforeach;
            ?>
        </ul>
        <?php
    } 
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Multipurpose_Photography_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Multipurpose_photography_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Multipurpose_photography_Customize_Section_Pro(
			$manager,
			'example_1',
				array(
				'priority'   => 9,
				'title'    => esc_html__( 'Photography Pro', 'multipurpose-photography' ),
				'pro_text' => esc_html__( 'Go Pro', 'multipurpose-photography' ),
				'pro_url'  => esc_url('https://www.themesglance.com/themes/wordpress-photography-themes/')					
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'multipurpose-photography-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'multipurpose-photography-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!

Multipurpose_Photography_Customize::get_instance();