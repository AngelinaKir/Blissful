<?php
/**
 * Yoga Studio: Customizer
 *
 * @subpackage Yoga Studio
 * @since 1.0
 */

function yoga_studio_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// fontawesome icon-picker

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	// Add custom control.

  	require get_parent_theme_file_path( 'inc/switch/control_switch.php' );

  	require get_parent_theme_file_path( 'inc/custom-control.php' );

  	//Register the sortable control type.
	$wp_customize->register_control_type( 'Yoga_Studio_Control_Sortable' );

  	// Add homepage customizer file
  	require get_template_directory() . '/inc/customizer-home-page.php';

  	// pro section
 	$wp_customize->add_section('yoga_studio_pro', array(
        'title'    => __('UPGRADE YOGA STUDIO PREMIUM', 'yoga-studio'),
        'priority' => 1,
    ));
    $wp_customize->add_setting('yoga_studio_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Yoga_Studio_Pro_Control($wp_customize, 'yoga_studio_pro', array(
        'label'    => __('YOGA STUDIO PREMIUM', 'yoga-studio'),
        'section'  => 'yoga_studio_pro',
        'settings' => 'yoga_studio_pro',
        'priority' => 1,
    )));

    // logo
	$wp_customize->add_setting('yoga_studio_logo_max_height',array(
		'default'=> '100',
		'transport' => 'refresh',
		'sanitize_callback' => 'yoga_studio_sanitize_integer'
	));
	$wp_customize->add_control(new Yoga_Studio_Slider_Custom_Control( $wp_customize, 'yoga_studio_logo_max_height',array(
		'label'	=> esc_html__('Logo Width','yoga-studio'),
		'section'=> 'title_tagline',
		'settings'=>'yoga_studio_logo_max_height',
		'input_attrs' => array(
			'reset' 		   => 100,
            'step'             => 1,
			'min'              => 0,
			'max'              => 250,
        ),
        'priority'=> 9,
	)));
	$wp_customize->add_setting('yoga_studio_logo_title',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_logo_title',
			array(
				'settings'        => 'yoga_studio_logo_title',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Title', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('yoga_studio_logo_tagline_text',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_logo_tagline_text',
			array(
				'settings'        => 'yoga_studio_logo_tagline_text',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Tagline', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);

	//colors
	if ( $wp_customize->get_section( 'colors' ) ) {
        $wp_customize->get_section( 'colors' )->title = __( 'Global Colors', 'yoga-studio' );
        $wp_customize->get_section( 'colors' )->priority = 2;
    }

    $wp_customize->add_setting( 'yoga_studio_global_color_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_global_color_heading', array(
			'label'       => esc_html__( 'Global Colors', 'yoga-studio' ),
			'section'     => 'colors',
			'settings'    => 'yoga_studio_global_color_heading',
			'priority'       => 1,

	) ) );

    $wp_customize->add_setting('yoga_studio_primary_color', array(
	    'default' => '#00ad8d',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'yoga_studio_primary_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme Color', 'yoga-studio'),
	 
	)));

	$wp_customize->add_setting('yoga_studio_heading_color', array(
	    'default' => '#14211b',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'yoga_studio_heading_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme Heading Color', 'yoga-studio'),
	 
	)));

	$wp_customize->add_setting('yoga_studio_text_color', array(
	    'default' => '#697871',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'yoga_studio_text_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme Text Color', 'yoga-studio'),
	 
	)));

	$wp_customize->add_setting('yoga_studio_primary_fade', array(
	    'default' => '#f1fffc',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'yoga_studio_primary_fade', array(
	    'section' => 'colors',
	    'label' => esc_html__('theme Color Light', 'yoga-studio'),
	 
	)));

	$wp_customize->add_setting('yoga_studio_footer_bg', array(
	    'default' => '#14211b',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'yoga_studio_footer_bg', array(
	    'section' => 'colors',
	    'label' => esc_html__('Footer Bg color', 'yoga-studio'),
	)));

	$wp_customize->add_setting('yoga_studio_post_bg', array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'yoga_studio_post_bg', array(
	    'section' => 'colors',
	    'label' => esc_html__('sidebar/Blog Post Bg color', 'yoga-studio'),
	)));

	// typography
	$wp_customize->add_section( 'yoga_studio_typography_settings', array(
		'title'       => __( 'Typography Settings', 'yoga-studio' ),
		'priority'       => 3,
	) );
	$yoga_studio_font_choices = array(
		'' => 'Select',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);
	$wp_customize->add_setting( 'yoga_studio_section_typo_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_section_typo_heading', array(
		'label'       => esc_html__( 'Typography Settings', 'yoga-studio' ),
		'section'     => 'yoga_studio_typography_settings',
		'settings'    => 'yoga_studio_section_typo_heading',
	) ) );
	$wp_customize->add_setting( 'yoga_studio_headings_text', array(
		'sanitize_callback' => 'yoga_studio_sanitize_fonts',
	));
	$wp_customize->add_control( 'yoga_studio_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'yoga-studio'),
		'section' => 'yoga_studio_typography_settings',
		'choices' => $yoga_studio_font_choices
	));
	$wp_customize->add_setting( 'yoga_studio_body_text', array(
		'sanitize_callback' => 'yoga_studio_sanitize_fonts'
	));
	$wp_customize->add_control( 'yoga_studio_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'yoga-studio' ),
		'section' => 'yoga_studio_typography_settings',
		'choices' => $yoga_studio_font_choices
	) );

    // Theme General Settings
    $wp_customize->add_section('yoga_studio_theme_settings',array(
        'title' => __('Theme General Settings', 'yoga-studio'),
        'priority' => 3,
    ) );
    $wp_customize->add_setting( 'yoga_studio_sticky_header_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_sticky_header_heading', array(
		'label'       => esc_html__( 'Sticky Header Settings', 'yoga-studio' ),
		'section'     => 'yoga_studio_theme_settings',
		'settings'    => 'yoga_studio_sticky_header_heading',
	) ) );
    $wp_customize->add_setting(
		'yoga_studio_sticky_header',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_sticky_header',
			array(
				'settings'        => 'yoga_studio_sticky_header',
				'section'         => 'yoga_studio_theme_settings',
				'label'           => __( 'Show Sticky Header', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'yoga_studio_loader_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_loader_heading', array(
		'label'       => esc_html__( 'Loader Settings', 'yoga-studio' ),
		'section'     => 'yoga_studio_theme_settings',
		'settings'    => 'yoga_studio_loader_heading',
	) ) );
	$wp_customize->add_setting(
		'yoga_studio_theme_loader',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_theme_loader',
			array(
				'settings'        => 'yoga_studio_theme_loader',
				'section'         => 'yoga_studio_theme_settings',
				'label'           => __( 'Show Site Loader', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('yoga_studio_loader_style',array(
        'default' => 'style_one',
        'sanitize_callback' => 'yoga_studio_sanitize_choices'
	));
	$wp_customize->add_control('yoga_studio_loader_style',array(
        'type' => 'select',
        'label' => __('Select Loader Design','yoga-studio'),
        'section' => 'yoga_studio_theme_settings',
        'choices' => array(
            'style_one' => __('Circle','yoga-studio'),
            'style_two' => __('Bar','yoga-studio'),
        ),
	) );
	
	$wp_customize->add_setting( 'yoga_studio_theme_width_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_theme_width_heading', array(
		'label'       => esc_html__( 'Theme Width Settings', 'yoga-studio' ),
		'section'     => 'yoga_studio_theme_settings',
		'settings'    => 'yoga_studio_theme_width_heading',
	) ) );
	$wp_customize->add_setting('yoga_studio_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'yoga_studio_sanitize_choices'
	));
	$wp_customize->add_control('yoga_studio_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','yoga-studio'),
        'section' => 'yoga_studio_theme_settings',
        'choices' => array(
            'full_width' => __('fullwidth','yoga-studio'),
            'container' => __('container','yoga-studio'),
            'container_fluid' => __('container fluid','yoga-studio'),
        ),
	) );
	$wp_customize->add_setting( 'yoga_studio_menu_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_menu_heading', array(
		'label'       => esc_html__( 'Menu Settings', 'yoga-studio' ),
		'section'     => 'yoga_studio_theme_settings',
		'settings'    => 'yoga_studio_menu_heading',
	) ) );
	$wp_customize->add_setting('yoga_studio_menu_text_transform',array(
        'default' => 'CAPITALISE',
        'sanitize_callback' => 'yoga_studio_sanitize_choices'
	));
	$wp_customize->add_control('yoga_studio_menu_text_transform',array(
        'type' => 'select',
        'label' => __('Menus Text Transform','yoga-studio'),
        'section' => 'yoga_studio_theme_settings',
        'choices' => array(
            'CAPITALISE' => __('CAPITALISE','yoga-studio'),
            'UPPERCASE' => __('UPPERCASE','yoga-studio'),
            'LOWERCASE' => __('LOWERCASE','yoga-studio'),
        ),
	) );
	$wp_customize->add_setting( 'yoga_studio_section_scroll_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_section_scroll_heading', array(
		'label'       => esc_html__( 'Scroll Top Settings', 'yoga-studio' ),
		'section'     => 'yoga_studio_theme_settings',
		'settings'    => 'yoga_studio_section_scroll_heading',
	) ) );
	$wp_customize->add_setting(
		'yoga_studio_scroll_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_scroll_enable',
			array(
				'settings'        => 'yoga_studio_scroll_enable',
				'section'         => 'yoga_studio_theme_settings',
				'label'           => __( 'show Scroll Top', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('yoga_studio_scroll_options',array(
        'default' => 'right_align',
        'sanitize_callback' => 'yoga_studio_sanitize_choices'
	));
	$wp_customize->add_control('yoga_studio_scroll_options',array(
		'type' => 'radio',
		'label'     => __('Scroll Top Alignment', 'yoga-studio'),
		'section' => 'yoga_studio_theme_settings',
		'type' => 'select',
		'choices' => array(
			'left_align' => __('LEFT','yoga-studio'),
			'center_align' => __('CENTER','yoga-studio'),
			'right_align' => __('RIGHT','yoga-studio'),
		)
	) );
	$wp_customize->add_setting('yoga_studio_scroll_top_icon',array(
		'default'	=> 'fas fa-chevron-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Yoga_Studio_Fontawesome_Icon_Chooser(
        $wp_customize,'yoga_studio_scroll_top_icon',array(
		'label'	=> __('Add Scroll Top Icon','yoga-studio'),
		'transport' => 'refresh',
		'section'	=> 'yoga_studio_theme_settings',
		'setting'	=> 'yoga_studio_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'yoga_studio_section_cursor_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_section_cursor_heading', array(
		'label'       => esc_html__( 'Cursor Setting', 'yoga-studio' ),
		'section'     => 'yoga_studio_theme_settings',
		'settings'    => 'yoga_studio_section_cursor_heading',
	) ) );

	$wp_customize->add_setting(
		'yoga_studio_enable_custom_cursor',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_enable_custom_cursor',
			array(
				'settings'        => 'yoga_studio_enable_custom_cursor',
				'section'         => 'yoga_studio_theme_settings',
				'label'           => __( 'show custom cursor', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting( 'yoga_studio_section_animation_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_section_animation_heading', array(
		'label'       => esc_html__( 'Animation Setting', 'yoga-studio' ),
		'section'     => 'yoga_studio_theme_settings',
		'settings'    => 'yoga_studio_section_animation_heading',
	) ) );

	$wp_customize->add_setting(
		'yoga_studio_animation_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_animation_enable',
			array(
				'settings'        => 'yoga_studio_animation_enable',
				'section'         => 'yoga_studio_theme_settings',
				'label'           => __( 'show/Hide Animation', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Post Layouts
	$wp_customize->add_panel( 'yoga_studio_post_panel', array(
		'title' => esc_html__( 'Post Layout', 'yoga-studio' ),
		'priority' => 4,
	));
    $wp_customize->add_section('yoga_studio_layout',array(
        'title' => __('Single-Post Layout', 'yoga-studio'),
        'panel' => 'yoga_studio_post_panel',
    ) );
    $wp_customize->add_setting( 'yoga_studio_section_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_section_post_heading', array(
		'label'       => esc_html__( 'Single Post Structure', 'yoga-studio' ),
		'section'     => 'yoga_studio_layout',
		'settings'    => 'yoga_studio_section_post_heading',
	) ) );
	$wp_customize->add_setting( 'yoga_studio_single_post_option',
		array(
			'default' => 'single_right_sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Yoga_Studio_Radio_Image_Control( $wp_customize, 'yoga_studio_single_post_option',
		array(
			'type'=>'select',
			'label' => __( 'select Single Post Page Layout', 'yoga-studio' ),
			'section' => 'yoga_studio_layout',
			'choices' => array(

				'single_right_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/2column.jpg',
					'name' => __( 'Right Sidebar', 'yoga-studio' )
				),
				'single_left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/left.png',
					'name' => __( 'Left Sidebar', 'yoga-studio' )
				),
				'single_full_width' => array(
					'image' => get_template_directory_uri().'/assets/images/1column.jpg',
					'name' => __( 'One Column', 'yoga-studio' )
				),
			)
		)
	) );
	$wp_customize->add_setting('yoga_studio_single_post_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_single_post_date',
			array(
				'settings'        => 'yoga_studio_single_post_date',
				'section'         => 'yoga_studio_layout',
				'label'           => __( 'Show Date', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'yoga_studio_single_post_date', array(
		'selector' => '.date-box',
		'render_callback' => 'yoga_studio_customize_partial_yoga_studio_single_post_date',
	) );
	$wp_customize->add_setting('yoga_studio_single_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Yoga_Studio_Fontawesome_Icon_Chooser(
        $wp_customize,'yoga_studio_single_date_icon',array(
		'label'	=> __('date Icon','yoga-studio'),
		'transport' => 'refresh',
		'section'	=> 'yoga_studio_layout',
		'setting'	=> 'yoga_studio_single_date_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('yoga_studio_single_post_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_single_post_admin',
			array(
				'settings'        => 'yoga_studio_single_post_admin',
				'section'         => 'yoga_studio_layout',
				'label'           => __( 'Show Author/Admin', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'yoga_studio_single_post_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'yoga_studio_customize_partial_yoga_studio_single_post_admin',
	) );
	$wp_customize->add_setting('yoga_studio_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Yoga_Studio_Fontawesome_Icon_Chooser(
        $wp_customize,'yoga_studio_single_author_icon',array(
		'label'	=> __('Author Icon','yoga-studio'),
		'transport' => 'refresh',
		'section'	=> 'yoga_studio_layout',
		'setting'	=> 'yoga_studio_single_author_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('yoga_studio_single_post_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_single_post_comment',
			array(
				'settings'        => 'yoga_studio_single_post_comment',
				'section'         => 'yoga_studio_layout',
				'label'           => __( 'Show Comment', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('yoga_studio_single_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Yoga_Studio_Fontawesome_Icon_Chooser(
        $wp_customize,'yoga_studio_single_comment_icon',array(
		'label'	=> __('comment Icon','yoga-studio'),
		'transport' => 'refresh',
		'section'	=> 'yoga_studio_layout',
		'setting'	=> 'yoga_studio_single_comment_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('yoga_studio_single_post_tag_count',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_single_post_tag_count',
			array(
				'settings'        => 'yoga_studio_single_post_tag_count',
				'section'         => 'yoga_studio_layout',
				'label'           => __( 'Show tag count', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('yoga_studio_single_tag_icon',array(
		'default'	=> 'fas fa-tags',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Yoga_Studio_Fontawesome_Icon_Chooser(
        $wp_customize,'yoga_studio_single_tag_icon',array(
		'label'	=> __('tag Icon','yoga-studio'),
		'transport' => 'refresh',
		'section'	=> 'yoga_studio_layout',
		'setting'	=> 'yoga_studio_single_tag_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('yoga_studio_single_post_tag',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_single_post_tag',
			array(
				'settings'        => 'yoga_studio_single_post_tag',
				'section'         => 'yoga_studio_layout',
				'label'           => __( 'Show Tags', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'yoga_studio_single_post_tag', array(
		'selector' => '.single-tags',
		'render_callback' => 'yoga_studio_customize_partial_yoga_studio_single_post_tag',
	) );
	$wp_customize->add_setting('yoga_studio_similar_post',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_similar_post',
			array(
				'settings'        => 'yoga_studio_similar_post',
				'section'         => 'yoga_studio_layout',
				'label'           => __( 'Show Similar post', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('yoga_studio_similar_text',array(
		'default' => 'Explore More',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('yoga_studio_similar_text',array(
		'label' => esc_html__('Similar Post Heading','yoga-studio'),
		'section' => 'yoga_studio_layout',
		'setting' => 'yoga_studio_similar_text',
		'type'    => 'text'
	));
	$wp_customize->add_section('yoga_studio_archieve_post_layot',array(
        'title' => __('Archieve-Post Layout', 'yoga-studio'),
        'panel' => 'yoga_studio_post_panel',
    ) );
	$wp_customize->add_setting( 'yoga_studio_section_archive_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_section_archive_post_heading', array(
		'label'       => esc_html__( 'Archieve Post Structure', 'yoga-studio' ),
		'section'     => 'yoga_studio_archieve_post_layot',
		'settings'    => 'yoga_studio_section_archive_post_heading',
	) ) );
    $wp_customize->add_setting( 'yoga_studio_post_option',
		array(
			'default' => 'right_sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Yoga_Studio_Radio_Image_Control( $wp_customize, 'yoga_studio_post_option',
		array(
			'type'=>'select',
			'label' => __( 'select Post Page Layout', 'yoga-studio' ),
			'section' => 'yoga_studio_archieve_post_layot',
			'choices' => array(
				'right_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/2column.jpg',
					'name' => __( 'Right Sidebar', 'yoga-studio' )
				),
				'left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/left.png',
					'name' => __( 'Left Sidebar', 'yoga-studio' )
				),
				'one_column' => array(
					'image' => get_template_directory_uri().'/assets/images/1column.jpg',
					'name' => __( 'One Column', 'yoga-studio' )
				),
				'three_column' => array(
					'image' => get_template_directory_uri().'/assets/images/3column.jpg',
					'name' => __( 'Three Column', 'yoga-studio' )
				),
				'four_column' => array(
					'image' => get_template_directory_uri().'/assets/images/4column.jpg',
					'name' => __( 'Four Column', 'yoga-studio' )
				),
				'grid_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/grid-sidebar.jpg',
					'name' => __( 'Grid-Right-Sidebar Layout', 'yoga-studio' )
				),
				'grid_left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/grid-left.png',
					'name' => __( 'Grid-Left-Sidebar Layout', 'yoga-studio' )
				),
				'grid_post' => array(
					'image' => get_template_directory_uri().'/assets/images/grid.jpg',
					'name' => __( 'Grid Layout', 'yoga-studio' )
				)
			)
		)
	) );
	$wp_customize->add_setting('yoga_studio_grid_column',array(
        'default' => '3_column',
        'sanitize_callback' => 'yoga_studio_sanitize_choices'
	));
	$wp_customize->add_control('yoga_studio_grid_column',array(
		'type' => 'radio',
		'label'     => __('Grid Post Per Row', 'yoga-studio'),
		'section' => 'yoga_studio_archieve_post_layot',
		'type' => 'select',
		'choices' => array(
			'1_column' => __('1','yoga-studio'),
            '2_column' => __('2','yoga-studio'),
            '3_column' => __('3','yoga-studio'),
            '4_column' => __('4','yoga-studio'),
		)
	) );
	$wp_customize->add_setting('archieve_post_order', array(
        'default' => array('title', 'image', 'meta','excerpt','btn'),
        'sanitize_callback' => 'yoga_studio_sanitize_sortable',
    ));
    $wp_customize->add_control(new Yoga_Studio_Control_Sortable($wp_customize, 'archieve_post_order', array(
    	'label' => esc_html__('Post Order', 'yoga-studio'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'yoga-studio') ,
        'section' => 'yoga_studio_archieve_post_layot',
        'choices' => array(
            'title' => __('title', 'yoga-studio') ,
            'image' => __('media', 'yoga-studio') ,
            'meta' => __('meta', 'yoga-studio') ,
            'excerpt' => __('excerpt', 'yoga-studio') ,
            'btn' => __('Read more', 'yoga-studio') ,
        ) ,
    )));
	$wp_customize->add_setting('yoga_studio_post_excerpt',array(
		'default'=> 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'yoga_studio_sanitize_integer'
	));
	$wp_customize->add_control(new Yoga_Studio_Slider_Custom_Control( $wp_customize, 'yoga_studio_post_excerpt',array(
		'label' => esc_html__( 'Excerpt Limit','yoga-studio' ),
		'section'=> 'yoga_studio_archieve_post_layot',
		'settings'=>'yoga_studio_post_excerpt',
		'input_attrs' => array(
			'reset'			   => 30,
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));
	$wp_customize->add_setting('yoga_studio_read_more_text',array(
		'default' => 'Read More',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('yoga_studio_read_more_text',array(
		'label' => esc_html__('Read More Text','yoga-studio'),
		'section' => 'yoga_studio_archieve_post_layot',
		'setting' => 'yoga_studio_read_more_text',
		'type'    => 'text'
	));
	$wp_customize->add_setting('yoga_studio_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_date',
			array(
				'settings'        => 'yoga_studio_date',
				'section'         => 'yoga_studio_archieve_post_layot',
				'label'           => __( 'Show Date', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'yoga_studio_date', array(
		'selector' => '.date-box',
		'render_callback' => 'yoga_studio_customize_partial_yoga_studio_date',
	) );
	$wp_customize->add_setting('yoga_studio_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Yoga_Studio_Fontawesome_Icon_Chooser(
        $wp_customize,'yoga_studio_date_icon',array(
		'label'	=> __('date Icon','yoga-studio'),
		'transport' => 'refresh',
		'section'	=> 'yoga_studio_archieve_post_layot',
		'setting'	=> 'yoga_studio_date_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('yoga_studio_sticky_icon',array(
		'default'	=> 'fas fa-thumb-tack',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Yoga_Studio_Fontawesome_Icon_Chooser(
        $wp_customize,'yoga_studio_sticky_icon',array(
		'label'	=> __('Sticky Post Icon','yoga-studio'),
		'transport' => 'refresh',
		'section'	=> 'yoga_studio_archieve_post_layot',
		'setting'	=> 'yoga_studio_sticky_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('yoga_studio_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_admin',
			array(
				'settings'        => 'yoga_studio_admin',
				'section'         => 'yoga_studio_archieve_post_layot',
				'label'           => __( 'Show Author/Admin', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'yoga_studio_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'yoga_studio_customize_partial_yoga_studio_admin',
	) );
	$wp_customize->add_setting('yoga_studio_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Yoga_Studio_Fontawesome_Icon_Chooser(
        $wp_customize,'yoga_studio_author_icon',array(
		'label'	=> __('Author Icon','yoga-studio'),
		'transport' => 'refresh',
		'section'	=> 'yoga_studio_archieve_post_layot',
		'setting'	=> 'yoga_studio_author_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('yoga_studio_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Yoga_Studio_Customizer_Customcontrol_Switch(
		$wp_customize,
		'yoga_studio_comment',
		array(
			'settings'        => 'yoga_studio_comment',
			'section'         => 'yoga_studio_archieve_post_layot',
			'label'           => __( 'Show Comment', 'yoga-studio' ),				
			'choices'		  => array(
				'1'      => __( 'On', 'yoga-studio' ),
				'off'    => __( 'Off', 'yoga-studio' ),
			),
			'active_callback' => '',
		)
	));
	$wp_customize->selective_refresh->add_partial( 'yoga_studio_comment', array(
		'selector' => '.entry-comments',
		'render_callback' => 'yoga_studio_customize_partial_yoga_studio_comment',
	) );
	$wp_customize->add_setting('yoga_studio_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Yoga_Studio_Fontawesome_Icon_Chooser(
        $wp_customize,'yoga_studio_comment_icon',array(
		'label'	=> __('comment Icon','yoga-studio'),
		'transport' => 'refresh',
		'section'	=> 'yoga_studio_archieve_post_layot',
		'setting'	=> 'yoga_studio_comment_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('yoga_studio_tag',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_tag',
			array(
				'settings'        => 'yoga_studio_tag',
				'section'         => 'yoga_studio_archieve_post_layot',
				'label'           => __( 'Show tag count', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'yoga_studio_tag', array(
		'selector' => '.tags',
		'render_callback' => 'yoga_studio_customize_partial_yoga_studio_tag',
	) );
	$wp_customize->add_setting('yoga_studio_tag_icon',array(
		'default'	=> 'fas fa-tags',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Yoga_Studio_Fontawesome_Icon_Chooser(
        $wp_customize,'yoga_studio_tag_icon',array(
		'label'	=> __('tag Icon','yoga-studio'),
		'transport' => 'refresh',
		'section'	=> 'yoga_studio_archieve_post_layot',
		'setting'	=> 'yoga_studio_tag_icon',
		'type'		=> 'icon'
	)));

	// header-image
	$wp_customize->add_setting( 'yoga_studio_section_header_image_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_section_header_image_heading', array(
		'label'       => esc_html__( 'Header Image Settings', 'yoga-studio' ),
		'section'     => 'header_image',
		'settings'    => 'yoga_studio_section_header_image_heading',
		'priority'    =>'1',
	) ) );

	$wp_customize->add_setting('yoga_studio_show_header_image',array(
        'default' => 'on',
        'sanitize_callback' => 'yoga_studio_sanitize_choices'
	));
	$wp_customize->add_control('yoga_studio_show_header_image',array(
        'type' => 'select',
        'label' => __('Select Option','yoga-studio'),
        'section' => 'header_image',
        'choices' => array(
            'on' => __('With Header Image','yoga-studio'),
            'off' => __('Without Header Image','yoga-studio'),
        ),
	) );

	// breadcrumb setting
	$wp_customize->add_section('yoga_studio_breadcrumb_settings',array(
        'title' => __('Breadcrumb Settings', 'yoga-studio'),
        'priority' => 4
    ) );
	$wp_customize->add_setting( 'yoga_studio_section_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_section_breadcrumb_heading', array(
		'label'       => esc_html__( 'Theme Breadcrumb Settings', 'yoga-studio' ),
		'section'     => 'yoga_studio_breadcrumb_settings',
		'settings'    => 'yoga_studio_section_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'yoga_studio_enable_breadcrumb',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_enable_breadcrumb',
			array(
				'settings'        => 'yoga_studio_enable_breadcrumb',
				'section'         => 'yoga_studio_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('yoga_studio_breadcrumb_separator', array(
        'default' => ' / ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('yoga_studio_breadcrumb_separator', array(
        'label' => __('Breadcrumb Separator', 'yoga-studio'),
        'section' => 'yoga_studio_breadcrumb_settings',
        'type' => 'text',
    ));
	$wp_customize->add_setting( 'yoga_studio_single_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_single_breadcrumb_heading', array(
		'label'       => esc_html__( 'Single post & Page', 'yoga-studio' ),
		'section'     => 'yoga_studio_breadcrumb_settings',
		'settings'    => 'yoga_studio_single_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'yoga_studio_single_enable_breadcrumb',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_single_enable_breadcrumb',
			array(
				'settings'        => 'yoga_studio_single_enable_breadcrumb',
				'section'         => 'yoga_studio_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);
	if ( class_exists( 'WooCommerce' ) ) { 
		$wp_customize->add_setting( 'yoga_studio_woocommerce_breadcrumb_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_woocommerce_breadcrumb_heading', array(
			'label'       => esc_html__( 'Woocommerce Breadcrumb', 'yoga-studio' ),
			'section'     => 'yoga_studio_breadcrumb_settings',
			'settings'    => 'yoga_studio_woocommerce_breadcrumb_heading',
		) ) );
		$wp_customize->add_setting(
			'yoga_studio_woocommerce_enable_breadcrumb',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(
			new Yoga_Studio_Customizer_Customcontrol_Switch(
				$wp_customize,
				'yoga_studio_woocommerce_enable_breadcrumb',
				array(
					'settings'        => 'yoga_studio_woocommerce_enable_breadcrumb',
					'section'         => 'yoga_studio_breadcrumb_settings',
					'label'           => __( 'Show Breadcrumb', 'yoga-studio' ),				
					'choices'		  => array(
						'1'      => __( 'On', 'yoga-studio' ),
						'off'    => __( 'Off', 'yoga-studio' ),
					),
					'active_callback' => '',
				)
			)
		);
		$wp_customize->add_setting('woocommerce_breadcrumb_separator', array(
	        'default' => ' / ',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    $wp_customize->add_control('woocommerce_breadcrumb_separator', array(
	        'label' => __('Breadcrumb Separator', 'yoga-studio'),
	        'section' => 'yoga_studio_breadcrumb_settings',
	        'type' => 'text',
	    ));
	}

	// woocommerce
	if ( class_exists( 'WooCommerce' ) ) {
		$wp_customize->add_section('yoga_studio_woocoomerce_section',array(
	        'title' => __('Custom Woocommerce Settings', 'yoga-studio'),
	        'panel' => 'woocommerce',
	        'priority' => 4,
	    ) );
		$wp_customize->add_setting( 'yoga_studio_section_shoppage_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_section_shoppage_heading', array(
			'label'       => esc_html__( 'Shop Page Settings', 'yoga-studio' ),
			'section'     => 'yoga_studio_woocoomerce_section',
			'settings'    => 'yoga_studio_section_shoppage_heading',
		) ) );
		$wp_customize->add_setting( 'yoga_studio_shop_page_sidebar',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new Yoga_Studio_Radio_Image_Control( $wp_customize, 'yoga_studio_shop_page_sidebar',
			array(
				'type'=>'select',
				'label' => __( 'Show Shop Page Sidebar', 'yoga-studio' ),
				'section'     => 'yoga_studio_woocoomerce_section',
				'choices' => array(

					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'yoga-studio' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'yoga-studio' )
					),
					'full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'Full Width', 'yoga-studio' )
					),
				)
			)
		) );
		$wp_customize->add_setting( 'yoga_studio_wocommerce_single_page_sidebar',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new Yoga_Studio_Radio_Image_Control( $wp_customize, 'yoga_studio_wocommerce_single_page_sidebar',
			array(
				'type'=>'select',
				'label'           => __( 'Show Single Product Page Sidebar', 'yoga-studio' ),
				'section'     => 'yoga_studio_woocoomerce_section',
				'choices' => array(

					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'yoga-studio' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'yoga-studio' )
					),
					'full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'Full Width', 'yoga-studio' )
					),
				)
			)
		) );
		$wp_customize->add_setting( 'yoga_studio_section_archieve_product_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_section_archieve_product_heading', array(
			'label'       => esc_html__( 'Archieve Product Settings', 'yoga-studio' ),
			'section'     => 'yoga_studio_woocoomerce_section',
			'settings'    => 'yoga_studio_section_archieve_product_heading',
		) ) );
		$wp_customize->add_setting('yoga_studio_archieve_item_columns',array(
	        'default' => '3',
	        'sanitize_callback' => 'yoga_studio_sanitize_choices'
		));
		$wp_customize->add_control('yoga_studio_archieve_item_columns',array(
	        'type' => 'select',
	        'label' => __('Select No of Columns','yoga-studio'),
	        'section' => 'yoga_studio_woocoomerce_section',
	        'choices' => array(
	            '1' => __('One Column','yoga-studio'),
	            '2' => __('Two Column','yoga-studio'),
	            '3' => __('Three Column','yoga-studio'),
	            '4' => __('four Column','yoga-studio'),
	            '5' => __('Five Column','yoga-studio'),
	            '6' => __('Six Column','yoga-studio'),
	        ),
		) );
		$wp_customize->add_setting( 'yoga_studio_archieve_shop_perpage', array(
			'default'              => 6,
			'type'                 => 'theme_mod',
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'yoga_studio_sanitize_number_absint',
			'sanitize_js_callback' => 'absint',
		) );
		$wp_customize->add_control( 'yoga_studio_archieve_shop_perpage', array(
			'label'       => esc_html__( 'Display Products','yoga-studio' ),
			'section'     => 'yoga_studio_woocoomerce_section',
			'type'        => 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 30,
			),
		) );
		$wp_customize->add_setting( 'yoga_studio_section_related_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_section_related_heading', array(
			'label'       => esc_html__( 'Related Product Settings', 'yoga-studio' ),
			'section'     => 'yoga_studio_woocoomerce_section',
			'settings'    => 'yoga_studio_section_related_heading',
		) ) );
		$wp_customize->add_setting('yoga_studio_related_item_columns',array(
	        'default' => '3',
	        'sanitize_callback' => 'yoga_studio_sanitize_choices'
		));
		$wp_customize->add_control('yoga_studio_related_item_columns',array(
	        'type' => 'select',
	        'label' => __('Select No of Columns','yoga-studio'),
	        'section' => 'yoga_studio_woocoomerce_section',
	        'choices' => array(
	            '1' => __('One Column','yoga-studio'),
	            '2' => __('Two Column','yoga-studio'),
	            '3' => __('Three Column','yoga-studio'),
	            '4' => __('four Column','yoga-studio'),
	            '5' => __('Five Column','yoga-studio'),
	            '6' => __('Six Column','yoga-studio'),
	        ),
		) );
		$wp_customize->add_setting( 'yoga_studio_related_shop_perpage', array(
			'default'              => 3,
			'type'                 => 'theme_mod',
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'yoga_studio_sanitize_number_absint',
			'sanitize_js_callback' => 'absint',
		) );
		$wp_customize->add_control( 'yoga_studio_related_shop_perpage', array(
			'label'       => esc_html__( 'Display Products','yoga-studio' ),
			'section'     => 'yoga_studio_woocoomerce_section',
			'type'        => 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 10,
			),
		) );
		$wp_customize->add_setting(
			'yoga_studio_related_product',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(new Yoga_Studio_Customizer_Customcontrol_Switch($wp_customize,'yoga_studio_related_product',
			array(
				'settings'        => 'yoga_studio_related_product',
				'section'         => 'yoga_studio_woocoomerce_section',
				'label'           => __( 'Show Related Products', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		));
	}

	// mobile width
	$wp_customize->add_section('yoga_studio_mobile_options',array(
        'title' => __('Mobile Media settings', 'yoga-studio'),
        'priority' => 4,
    ) );
    $wp_customize->add_setting( 'yoga_studio_section_mobile_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_section_mobile_heading', array(
		'label'       => esc_html__( 'Mobile Media settings', 'yoga-studio' ),
		'section'     => 'yoga_studio_mobile_options',
		'settings'    => 'yoga_studio_section_mobile_heading',
	) ) );
	$wp_customize->add_setting(
		'yoga_studio_slider_button_mobile_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_slider_button_mobile_show_hide',
			array(
				'settings'        => 'yoga_studio_slider_button_mobile_show_hide',
				'section'         => 'yoga_studio_mobile_options',
				'label'           => __( 'Show Slider Button', 'yoga-studio' ),
				'description' => __('Control wont function if the button is off in the main slider settings.', 'yoga-studio') ,				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting(
		'yoga_studio_scroll_enable_mobile',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_scroll_enable_mobile',
			array(
				'settings'        => 'yoga_studio_scroll_enable_mobile',
				'section'         => 'yoga_studio_mobile_options',
				'label'           => __( 'Show Scroll Top', 'yoga-studio' ),
				'description' => __('Control wont function if scroll-top is off in the main settings.', 'yoga-studio') ,				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'yoga_studio_section_mobile_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_section_mobile_breadcrumb_heading', array(
		'label'       => esc_html__( 'Mobile Breadcrumb settings', 'yoga-studio' ),
		'description' => __('Controls wont function if the breadcrumb is off in the main breadcrumb settings.', 'yoga-studio') ,
		'section'     => 'yoga_studio_mobile_options',
		'settings'    => 'yoga_studio_section_mobile_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'yoga_studio_enable_breadcrumb_mobile',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_enable_breadcrumb_mobile',
			array(
				'settings'        => 'yoga_studio_enable_breadcrumb_mobile',
				'section'         => 'yoga_studio_mobile_options',
				'label'           => __( 'Theme Breadcrumb', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting(
		'yoga_studio_single_enable_breadcrumb_mobile',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Yoga_Studio_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_studio_single_enable_breadcrumb_mobile',
			array(
				'settings'        => 'yoga_studio_single_enable_breadcrumb_mobile',
				'section'         => 'yoga_studio_mobile_options',
				'label'           => __( 'Single Post & Page', 'yoga-studio' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-studio' ),
					'off'    => __( 'Off', 'yoga-studio' ),
				),
				'active_callback' => '',
			)
		)
	);
	if ( class_exists( 'WooCommerce' ) ) {
		$wp_customize->add_setting(
			'yoga_studio_woocommerce_enable_breadcrumb_mobile',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'yoga_studio_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(
			new Yoga_Studio_Customizer_Customcontrol_Switch(
				$wp_customize,
				'yoga_studio_woocommerce_enable_breadcrumb_mobile',
				array(
					'settings'        => 'yoga_studio_woocommerce_enable_breadcrumb_mobile',
					'section'         => 'yoga_studio_mobile_options',
					'label'           => __( 'wooCommerce Breadcrumb', 'yoga-studio' ),				
					'choices'		  => array(
						'1'      => __( 'On', 'yoga-studio' ),
						'off'    => __( 'Off', 'yoga-studio' ),
					),
					'active_callback' => '',
				)
			)
		);
	}

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'yoga_studio_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'yoga_studio_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'yoga_studio_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'yoga_studio_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'yoga-studio' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'yoga-studio' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'yoga_studio_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'yoga_studio_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'yoga_studio_customize_register' );

function yoga_studio_customize_partial_blogname() {
	bloginfo( 'name' );
}
function yoga_studio_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function yoga_studio_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function yoga_studio_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('YOGA_STUDIO_PRO_LINK',__('https://www.ovationthemes.com/products/yoga-wordpress-theme','yoga-studio'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Yoga_Studio_Pro_Control')):
    class Yoga_Studio_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md-2 col-sm-6 upsell-btn">
                <a href="<?php echo esc_url( YOGA_STUDIO_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE YOGA STUDIO PREMIUM','yoga-studio');?> </a>
	        </div>
            <div class="col-md-4 col-sm-6">
                <img class="yoga_studio_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md-3 col-sm-6">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('YOGA STUDIO PREMIUM - Features', 'yoga-studio'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'yoga-studio');?> </li>
                    <li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'yoga-studio');?> </li>
                    <li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'yoga-studio');?> </li>
                    <li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'yoga-studio');?> </li>
                    <li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'yoga-studio');?> </li>
                    <li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'yoga-studio');?> </li>
                    <li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'yoga-studio');?> </li>
                    <li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'yoga-studio');?> </li>
                    <li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'yoga-studio');?> </li>
                    <li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'yoga-studio');?> </li>
                    <li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'yoga-studio');?> </li>
                    <li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'yoga-studio');?> </li>
                    <li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'yoga-studio');?> </li>
                    <li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'yoga-studio');?> </li>
                    <li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'yoga-studio');?> </li>
                    <li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'yoga-studio');?> </li>
                    <li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'yoga-studio');?> </li>
                    <li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'yoga-studio');?> </li>
                    <li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'yoga-studio');?> </li>
                   	<li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'yoga-studio');?> </li>
                   	<li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'yoga-studio');?> </li>
                   	<li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'yoga-studio');?> </li>
                   	<li class="upsell-yoga_studio"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'yoga-studio');?> </li>
                </ul>
        	</div>
		    <div class="col-md-2 col-sm-6 upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( YOGA_STUDIO_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE YOGA STUDIO PREMIUM','yoga-studio');?> </a>
		    </div>
        </label>
    <?php } }
endif;
