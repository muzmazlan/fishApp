<?php
/**
 * Courtyard Theme Customizer.
 *
 * @package Courtyard
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function courtyard_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    // Remove
    $wp_customize->remove_control( 'display_header_text' );
    $wp_customize->remove_control( 'header_textcolor' );

    //Custom Controls
    if ( class_exists( 'WP_Customize_Control' ) ):

        // Custom Checkbox Control Class
        class WP_Customize_Checkbox_Control extends WP_Customize_Control {
            public $type = 'checkbox';

            public function render_content() {
                ?>

                <label>
                    <span class="pt-checkbox-label"><?php echo esc_html( $this->label ); ?></span>

                    <span class="pt-on-off-switch">
                        <input class="pt-on-off-switch-checkbox"  type="checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?> />
                        <span class="pt-on-off-switch-label"></span>
                    </span>

                    <?php if ( ! empty( $this->description ) ) : ?>
                        <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                    <?php endif; ?>
                </label>
                <?php
            }
        }

        // Custom Font Size Control Class
        class WP_Customize_Font_Control extends WP_Customize_Control {

            public function render_content() {
                ?>

                <label class="pt-customizer-font">
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <input type="range" min="0" max="100" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
                    <input type="number" min="0" max="100" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
                </label>

                <?php
            }
        }

        // Image radio control
        class WP_Customizer_Image_Radio_Control extends WP_Customize_Control {

            public function render_content() {

            if ( empty( $this->choices ) )
                return;

            $name = '_customize-radio-' . $this->id;

            ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <ul class="controls" id = 'pt-img-container'>

                <?php   foreach ( $this->choices as $value => $label ) :

                    $class = ($this->value() == $value)?'pt-radio-img-selected pt-radio-img-img':'pt-radio-img-img';

                    ?>

                    <li style="display: inline;">

                    <label>

                        <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />

                        <img src = '<?php echo esc_url( $label ); ?>' class = '<?php echo esc_attr( $class) ; ?>' />

                    </label>

                    </li>

                <?php   endforeach; ?>

            </ul>

            <?php
            }
        }

        // Theme Color
        class courtyard_theme_color_picker extends WP_Customize_Control {

            /**
             * Render the content on the theme customizer page
             */
            public function render_content() {

                if ( empty( $this->choices ) )
                    return;

                $name = $this->id;

                ?>

                <h3 class="courtyard-layout-title"><?php echo esc_html( $this->label ); ?></h3>

                <?php foreach ( $this->choices as $value => $label ) : ?>

                    <input type="radio" id="<?php echo esc_attr( $value ); ?>" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />

                    <label for="<?php echo esc_attr( $value ); ?>">
                        <?php echo esc_html( $label ); ?>
                        <span class="courtyard-radio-color">
                            <span class="courtyard-color-checked"></span>
                        </span>
                    </label>

                    <?php

                endforeach;
            }
        }

    endif;

    // General Settings
    $wp_customize->add_panel( 'courtyard_general', array(
        'priority'              => 2,
        'title'                 => esc_html__( 'General', 'courtyard' ),
    ) );

    // Pre Loader
    $wp_customize->add_section( 'courtyard_basic', array(
        'priority'              => 1,
        'title'                 => esc_html__( 'Basic', 'courtyard' ),
        'panel'                 => 'courtyard_general',
    ) );

    // Activate Optimize Bootstrap
    $wp_customize->add_setting( 'courtyard_optimize_bootstrap_activate', array(
        'default'               => 1,
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_checkbox_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Checkbox_Control( $wp_customize, 'courtyard_optimize_bootstrap_activate', array(
        'label'                 => esc_html__( 'Optimize Bootstrap', 'courtyard' ),
        'section'               => 'courtyard_basic',
        'settings'              => 'courtyard_optimize_bootstrap_activate',
    ) ) );

    // Activate Breadcrumbs
    $wp_customize->add_setting( 'courtyard_breadcrumbs_activate', array(
        'default'               => 1,
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_checkbox_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Checkbox_Control( $wp_customize, 'courtyard_breadcrumbs_activate', array(
        'label'                 => esc_html__( 'Breadcrumbs', 'courtyard' ),
        'section'               => 'courtyard_basic',
        'settings'              => 'courtyard_breadcrumbs_activate',
    ) ) );

    // Breadcrumbs Delimiter
    $wp_customize->add_setting( 'courtyard_breadcrumbs_sep', array(
        'default'               => '/',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_sanitize_nohtml',
    ) );

    $wp_customize->add_control( 'courtyard_breadcrumbs_sep', array(
        'type'                  => 'text',
        'label'                 => esc_html__( 'Breadcrumbs Delimiter', 'courtyard' ),
        'section'               => 'courtyard_basic',
        'settings'              => 'courtyard_breadcrumbs_sep',
    ) );

    // Background Image
    $wp_customize->add_section( 'background_image', array(
        'priority'              => 5,
        'title'                 => esc_html__( 'Background Image', 'courtyard' ),
        'panel'                 => 'courtyard_general',
    ) );

/*--------------------------------------------------------------------------------------------------*/

    // Header Panel
    $wp_customize->add_panel( 'courtyard_header', array(
        'priority'              => 3,
        'title'                 => esc_html__( 'Header', 'courtyard' ),
    ) );

    // Site Title & Tag-line
    $wp_customize->add_section( 'title_tagline', array(
        'priority'              => 3,
        'title'                 => esc_html__( 'Site Title & Tagline', 'courtyard' ),
        'panel'                 => 'courtyard_header',
    ) );

    // Header Secondary Logo
    $wp_customize->add_setting( 'courtyard_secondary_logo', array(
        'default'               => '',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'courtyard_secondary_logo', array(
        'label'                 => esc_html__( 'Secondary Logo', 'courtyard' ),
        'section'               => 'title_tagline',
        'setting'               => 'courtyard_secondary_logo',
    ) ) );

    // Display Site Title
    $wp_customize->add_setting( 'courtyard_site_title_activate', array(
        'default'               => 1,
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_checkbox_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Checkbox_Control( $wp_customize, 'courtyard_site_title_activate', array(
        'label'                 => esc_html__( 'Display Site Title', 'courtyard' ),
        'section'               => 'title_tagline',
        'settings'              => 'courtyard_site_title_activate',
    ) ) );

    // Display tag line
    $wp_customize->add_setting( 'courtyard_site_tagline_activate', array(
        'default'               => 1,
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_checkbox_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Checkbox_Control( $wp_customize, 'courtyard_site_tagline_activate', array(
        'label'                 => esc_html__( 'Display Tagline', 'courtyard' ),
        'section'               => 'title_tagline',
        'settings'              => 'courtyard_site_tagline_activate',
    ) ) );

    // Header Media
    $wp_customize->add_section( 'header_image', array(
        'priority'              => 4,
        'title'                 => esc_html__( 'Header Media', 'courtyard' ),
        'panel'                 => 'courtyard_header',
    ) );

    // Activate header link back to home page
    $wp_customize->add_setting( 'courtyard_header_image_link_activate', array(
        'default'               => '',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_checkbox_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Checkbox_Control( $wp_customize, 'courtyard_header_image_link_activate', array(
        'label'                 => esc_html__( 'Activate Image Link Back to Home', 'courtyard' ),
        'section'               => 'header_image',
        'settings'              => 'courtyard_header_image_link_activate',
    ) ) );


/*--------------------------------------------------------------------------------------------------*/

    // Colors
    $wp_customize->add_panel( 'courtyard_colors', array(
        'priority'              => 101,
        'title'                 => esc_html__( 'Colors', 'courtyard' ),
    ) );

    // Background Colors
    $wp_customize->add_section( 'colors', array(
        'priority'              => 1,
        'title'                 => esc_html__( 'Background Color', 'courtyard' ),
        'panel'                 => 'courtyard_colors',
    ) );

    // Theme Color
    $wp_customize->add_section( 'courtyard_custom_theme_color_sec', array(
        'priority'              => 1,
        'title'                 => esc_html__( 'Theme Color', 'courtyard' ),
        'panel'                 => 'courtyard_colors',
    ) );

    $wp_customize->add_setting( 'courtyard_theme_color', array(
        'default'               => 'maroon',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_sanitize_theme_color',
    ) );

    $wp_customize->add_control( new courtyard_theme_color_picker( $wp_customize, 'courtyard_theme_color', array(
        'label'                 => esc_html__( 'Choose Theme Color', 'courtyard' ),
        'section'               => 'courtyard_custom_theme_color_sec',
        'settings'              => 'courtyard_theme_color',
        'type'                  => 'radio',
        'choices'               => array(
            'watermelon'            => esc_html__( 'Watermelon', 'courtyard' ),
            'red'                   => esc_html__( 'Red', 'courtyard' ),
            'orange'                => esc_html__( 'Orange', 'courtyard' ),
            'yellow'                => esc_html__( 'Yellow', 'courtyard' ),
            'lime'                  => esc_html__( 'Lime', 'courtyard' ),
            'green'                 => esc_html__( 'Green', 'courtyard' ),
            'mint'                  => esc_html__( 'Mint', 'courtyard' ),
            'teal'                  => esc_html__( 'Teal', 'courtyard' ),
            'sky-blue'              => esc_html__( 'Sky Blue', 'courtyard' ),
            'blue'                  => esc_html__( 'Blue', 'courtyard' ),
            'purple'                => esc_html__( 'Purple', 'courtyard' ),
            'pink'                  => esc_html__( 'Pink', 'courtyard' ),
            'magenta'               => esc_html__( 'Magenta', 'courtyard' ),
            'plum'                  => esc_html__( 'Plum', 'courtyard' ),
            'brown'                 => esc_html__( 'Brown', 'courtyard' ),
            'maroon'                => esc_html__( 'Maroon', 'courtyard' )
        ),
    ) ) );

    // Custom Primary Color
    $wp_customize->add_setting( 'courtyard_custom_primary_color', array(
        'default'               => '',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'courtyard_custom_primary_color', array(
        'label'                 => esc_html__( 'Primary Color', 'courtyard' ),
        'description'           => esc_html__( 'You can override theme color by custom color', 'courtyard' ),
        'section'               => 'courtyard_custom_theme_color_sec',
        'settings'              => 'courtyard_custom_primary_color',
    ) ) );

    // Custom Secondary Color
    $wp_customize->add_setting( 'courtyard_custom_secondary_color', array(
        'default'               => '',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'courtyard_custom_secondary_color', array(
        'label'                 => esc_html__( 'Secondary Color', 'courtyard' ),
        'section'               => 'courtyard_custom_theme_color_sec',
        'settings'              => 'courtyard_custom_secondary_color',
    ) ) );

/*--------------------------------------------------------------------------------------------------*/

    // Posts Settings
    $wp_customize->add_panel( 'courtyard_post_settings', array(
        'priority'              => 112,
        'title'                 => esc_html__( 'Post Settings', 'courtyard' ),
    ) );

    // Post Settings
    $wp_customize->add_section( 'courtyard_post_settings_general_sec', array(
        'title'                 => esc_html__( 'General Settings', 'courtyard' ),
        'panel'                 => 'courtyard_post_settings',
    ) );

    // Post global sidebar.
    $wp_customize->add_setting( 'courtyard_post_global_sidebar', array(
        'default'           => 'right_sidebar',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'courtyard_sanitize_post_sidebar',                
    ) );

    $wp_customize->add_control( new WP_Customizer_Image_Radio_Control( $wp_customize, 'courtyard_post_global_sidebar', array(
        'type'               => 'radio',
        'priority'           => 1,
        'label'              => esc_html__('Available Sidebar', 'courtyard'),
        'description'        => esc_html__('Select default layout for single posts. This layout will be reflected in all single posts unless unique layout is set for specific post.', 'courtyard'),
        'section'            => 'courtyard_post_settings_general_sec',
        'settings'           => 'courtyard_post_global_sidebar',
        'choices'            => array(
            'right_sidebar'                 => get_template_directory_uri() . '/images/right-sidebar.png',
            'left_sidebar'                  => get_template_directory_uri() . '/images/left-sidebar.png',
            'no_sidebar_full_width'         => get_template_directory_uri() . '/images/no-sidebar-full-width-layout.png',
        ),
    ) ) );

    // Post Nex/Prev article
    $wp_customize->add_setting( 'courtyard_post_nex_prev_article', array(
        'default'               => 1,
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_checkbox_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Checkbox_Control( $wp_customize, 'courtyard_post_nex_prev_article', array(
        'label'                 => esc_html__( 'Next/Previous Article', 'courtyard' ),
        'section'               => 'courtyard_post_settings_general_sec',
        'settings'              => 'courtyard_post_nex_prev_article',
    ) ) );

    // Featured Image show
    $wp_customize->add_setting( 'courtyard_post_featured_image', array(
        'default'               => '',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_checkbox_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Checkbox_Control( $wp_customize, 'courtyard_post_featured_image', array(
        'label'                 => esc_html__( 'Show Featured Image', 'courtyard' ),
        'section'               => 'courtyard_post_settings_general_sec',
        'settings'              => 'courtyard_post_featured_image',
    ) ) );

    // Posts meta Settings
    $wp_customize->add_section( 'courtyard_post_meta_settings_sec', array(
        'title'                 => esc_html__( 'Post Meta', 'courtyard' ),
        'panel'                 => 'courtyard_post_settings',
    ) );

    // Post Author
    $wp_customize->add_setting( 'courtyard_post_meta_author', array(
        'default'               => 1,
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_checkbox_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Checkbox_Control( $wp_customize, 'courtyard_post_meta_author', array(
        'label'                 => esc_html__( 'Post Author', 'courtyard' ),
        'section'               => 'courtyard_post_meta_settings_sec',
        'settings'              => 'courtyard_post_meta_author',
    ) ) );

    // Post Date
    $wp_customize->add_setting( 'courtyard_post_meta_date', array(
        'default'               => 1,
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_checkbox_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Checkbox_Control( $wp_customize, 'courtyard_post_meta_date', array(
        'label'                 => esc_html__( 'Post Date', 'courtyard' ),
        'section'               => 'courtyard_post_meta_settings_sec',
        'settings'              => 'courtyard_post_meta_date',
    ) ) );

    // Post Categories
    $wp_customize->add_setting( 'courtyard_post_meta_categories', array(
        'default'               => 1,
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_checkbox_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Checkbox_Control( $wp_customize, 'courtyard_post_meta_categories', array(
        'label'                 => esc_html__( 'Post Categories', 'courtyard' ),
        'section'               => 'courtyard_post_meta_settings_sec',
        'settings'              => 'courtyard_post_meta_categories',
    ) ) );

    // Post Tags
    $wp_customize->add_setting( 'courtyard_post_meta_tags', array(
        'default'               => 1,
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_checkbox_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Checkbox_Control( $wp_customize, 'courtyard_post_meta_tags', array(
        'label'                 => esc_html__( 'Post Tags', 'courtyard' ),
        'section'               => 'courtyard_post_meta_settings_sec',
        'settings'              => 'courtyard_post_meta_tags',
    ) ) );

    
/*--------------------------------------------------------------------------------------------------*/

    // Archive/Category Settings
    $wp_customize->add_panel( 'courtyard_blog_settings', array(
        'priority'              => 113,
        'title'                 => esc_html__( 'Blog Settings', 'courtyard' ),
    ) );

    // General Settings
    $wp_customize->add_section( 'courtyard_blog_general_sec', array(
        'title'                 => esc_html__( 'General Settings', 'courtyard' ),
        'panel'                 => 'courtyard_blog_settings',
    ) );

    // blog global sidebar.
    $wp_customize->add_setting( 'courtyard_blog_global_sidebar', array(
        'default'           => 'right_sidebar',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'courtyard_sanitize_post_sidebar',                 
    ) );

    $wp_customize->add_control( new WP_Customizer_Image_Radio_Control( $wp_customize, 'courtyard_blog_global_sidebar', array(
        'type'               => 'radio',
        'priority'           => 1,
        'label'              => esc_html__('Available Sidebar', 'courtyard'),
        'description'        => esc_html__('Select default sidebar. This sidebar will be reflected in all pages unless unique layout is set for specific page as well as reflected in whole site archives, categories, search page etc.', 'courtyard'),
        'section'            => 'courtyard_blog_general_sec',
        'settings'           => 'courtyard_blog_global_sidebar',
        'choices'            => array(
            'right_sidebar'                 => get_template_directory_uri() . '/images/right-sidebar.png',
            'left_sidebar'                  => get_template_directory_uri() . '/images/left-sidebar.png',
            'no_sidebar_full_width'         => get_template_directory_uri() . '/images/no-sidebar-full-width-layout.png',
        ),
    ) ) );

    // Excerpt Length
    $wp_customize->add_setting( 'courtyard_blog_post_excerpt_length', array(
        'default'               => 40,
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_sanitize_number_range',
    ) );

    $wp_customize->add_control( new WP_Customize_Font_Control(  $wp_customize, 'courtyard_blog_post_excerpt_length', array(
        'label'                 => esc_html__( 'Excerpt Length', 'courtyard' ),
        'section'               => 'courtyard_blog_general_sec',
        'settings'              => 'courtyard_blog_post_excerpt_length',
    ) ) );

    // Show Thumbnail
    $wp_customize->add_setting( 'courtyard_blog_post_thumb_image', array(
        'default'               => 1,
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_checkbox_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Checkbox_Control( $wp_customize, 'courtyard_blog_post_thumb_image', array(
        'label'                 => esc_html__( 'Show Thumbnail', 'courtyard' ),
        'section'               => 'courtyard_blog_general_sec',
        'settings'              => 'courtyard_blog_post_thumb_image',
    ) ) );

    // Show Read More
    $wp_customize->add_setting( 'courtyard_blog_show_read_more', array(
        'default'               => 1,
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_checkbox_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Checkbox_Control( $wp_customize, 'courtyard_blog_show_read_more', array(
        'label'                 => esc_html__( 'Show Read More', 'courtyard' ),
        'section'               => 'courtyard_blog_general_sec',
        'settings'              => 'courtyard_blog_show_read_more',
    ) ) );

    // Read More Text
    $wp_customize->add_setting( 'courtyard_blog_read_more_text', array(
        'default'               => esc_html__( 'Read More', 'courtyard' ),
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_sanitize_text',
    ) );

    $wp_customize->add_control( 'courtyard_blog_read_more_text', array(
        'type'                  => 'text',
        'label'                 => esc_html__( 'Read More Text', 'courtyard' ),
        'section'               => 'courtyard_blog_general_sec',
        'settings'              => 'courtyard_blog_read_more_text',
    ) );

    // Posts meta Settings
    $wp_customize->add_section( 'courtyard_blog_post_meta_sec', array(
        'title'                 => esc_html__( 'Post Meta', 'courtyard' ),
        'panel'                 => 'courtyard_blog_settings',
    ) );

    // Date
    $wp_customize->add_setting( 'courtyard_blog_post_date', array(
        'default'               => 1,
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_checkbox_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Checkbox_Control( $wp_customize, 'courtyard_blog_post_date', array(
        'label'                 => esc_html__( 'Post Date', 'courtyard' ),
        'section'               => 'courtyard_blog_post_meta_sec',
        'settings'              => 'courtyard_blog_post_date',
    ) ) );

    // Categories
    $wp_customize->add_setting( 'courtyard_blog_post_categories', array(
        'default'               => 1,
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_checkbox_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Checkbox_Control( $wp_customize, 'courtyard_blog_post_categories', array(
        'label'                 => esc_html__( 'Post Categories', 'courtyard' ),
        'section'               => 'courtyard_blog_post_meta_sec',
        'settings'              => 'courtyard_blog_post_categories',
    ) ) );

    // Tags
    $wp_customize->add_setting( 'courtyard_blog_post_tags', array(
        'default'               => 1,
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_checkbox_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Checkbox_Control( $wp_customize, 'courtyard_blog_post_tags', array(
        'label'                 => esc_html__( 'Show Tags', 'courtyard' ),
        'section'               => 'courtyard_blog_post_meta_sec',
        'settings'              => 'courtyard_blog_post_tags',
    ) ) ); 

    // Comments
    $wp_customize->add_setting( 'courtyard_blog_post_comments', array(
        'default'               => 1,
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_checkbox_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Checkbox_Control( $wp_customize, 'courtyard_blog_post_comments', array(
        'label'                 => esc_html__( 'Post Comments', 'courtyard' ),
        'section'               => 'courtyard_blog_post_meta_sec',
        'settings'              => 'courtyard_blog_post_comments',
    ) ) );

    

/*--------------------------------------------------------------------------------------------------*/
    // Footer
    $wp_customize->add_panel( 'courtyard_footer_settings', array(
        'priority'              => 124,
        'title'                 => esc_html__( 'Footer', 'courtyard' ),
    ) );

    // General Settings
    $wp_customize->add_section( 'courtyard_footer_settings_sec', array(
        'title'                 => esc_html__( 'General Settings', 'courtyard' ),
        'panel'                 => 'courtyard_footer_settings',
    ) );

    // Go To Top Button
    $wp_customize->add_setting( 'courtyard_footer_go_to_top', array(
        'default'               => 1,
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'courtyard_checkbox_sanitize',
    ) );

    $wp_customize->add_control( new WP_Customize_Checkbox_Control( $wp_customize, 'courtyard_footer_go_to_top', array(
        'label'                 => esc_html__( 'Go To Top Button', 'courtyard' ),
        'section'               => 'courtyard_footer_settings_sec',
        'settings'              => 'courtyard_footer_go_to_top',
    ) ) );

    // Footer Widgets
    $wp_customize->add_section( 'courtyard_footer_widgets_sec', array(
        'title'                 => esc_html__( 'Footer Widgets', 'courtyard' ),
        'panel'                 => 'courtyard_footer_settings',
    ) );

    $wp_customize->add_setting( 'courtyard_footer_widgets_area', array(
        'default'            => 4,
        'capability'         => 'edit_theme_options',
        'sanitize_callback'  => 'courtyard_sanitize_choices',
    ) );

    $wp_customize->add_control( 'courtyard_footer_widgets_area', array(
        'label'          => esc_html__( 'Footer widget area', 'courtyard' ),
        'description'    => esc_html__( 'Choose the number of widget areas in the footer, then go to Appearance &gt; Widgets and add your widgets.', 'courtyard' ),
        'section'        => 'courtyard_footer_widgets_sec',
        'type'           => 'select',
        'choices'        => array(
            '1' => esc_html__('One', 'courtyard'),
            '2' => esc_html__('Two', 'courtyard'),
            '3' => esc_html__('Three', 'courtyard'),
            '4' => esc_html__('Four', 'courtyard')
        ),
    ) );

    /**
     * Checkbox Sanitize
     */
    function courtyard_checkbox_sanitize( $input ) {
        if ( $input == 1 ) {
            return 1;
        } else {
            return '';
        }
    }

    /**
     * Sanitize Choices
     */
    function courtyard_sanitize_choices( $input, $setting ) {
        global $wp_customize;

        $control = $wp_customize->get_control( $setting->id );

        if ( array_key_exists( $input, $control->choices ) ) {
            return $input;
        } else {
            return $setting->default;
        }
    }

    /**
     * Sanitize Choices
     */
    function courtyard_sanitize_post_sidebar( $input ) {
        if ( in_array( $input, array( 'right_sidebar', 'left_sidebar', 'no_sidebar_full_width' ), true ) ) {
            return $input;
        }
    }

    /**
     * Text
     */
    function courtyard_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }

    /**
     * No-HTML sanitization callback
     */
    function courtyard_sanitize_nohtml( $nohtml ) {
        return wp_filter_nohtml_kses( $nohtml );
    }

    /**
     * Number Range Sanitize
     */
    function courtyard_sanitize_number_range( $number, $setting ) {

        // Ensure input is an absolute integer.
        $number = absint( $number );

        // Get the input attributes associated with the setting.
        $atts = $setting->manager->get_control( $setting->id )->input_attrs;

        // Get minimum number in the range.
        $min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

        // Get maximum number in the range.
        $max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

        // Get step.
        $step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

        // If the number is within the valid range, return it; otherwise, return the default
        return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
    }

    /**
     * Header Layout Sanitize
     */
    function courtyard_sanitize_theme_color( $value ) {
        if ( ! in_array( $value, array( 'watermelon', 'red', 'orange', 'yellow', 'lime', 'green', 'mint', 'teal', 'sky-blue', 'blue', 'purple', 'pink', 'magenta', 'plum', 'brown', 'maroon' ) ) )
            $value = 'sky-blue';

        return $value;
    }
}
add_action( 'customize_register', 'courtyard_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function courtyard_customize_preview_js() {
    wp_enqueue_script( 'courtyard_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'courtyard_customize_preview_js' );
