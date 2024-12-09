<?php
/**
 * Yoga Studio: Customizer-home-page
 *
 * @subpackage Yoga Studio
 * @since 1.0
 */

    //  Home Page Panel
    $wp_customize->add_panel( 'yoga_studio_custompage_panel', array(
        'title' => esc_html__( 'Custom Page Settings', 'yoga-studio' ),
        'priority' => 2,
    ));
    // Top Header
    $wp_customize->add_section('yoga_studio_top',array(
        'title' => __('Contact info', 'yoga-studio'),
        'priority' => 3,
        'panel' => 'yoga_studio_custompage_panel',
    ) );
    $wp_customize->add_setting( 'yoga_studio_section_contact_heading', array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_section_contact_heading', array(
        'label'       => esc_html__( 'Contact Settings', 'yoga-studio' ),   
        'description' => __( 'Add contact info in the below feilds', 'yoga-studio' ),       
        'section'     => 'yoga_studio_top',
        'settings'    => 'yoga_studio_section_contact_heading',
        'priority'   => 1,
    ) ) );
    $wp_customize->add_setting('yoga_studio_top_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('yoga_studio_top_text',array(
        'label' => esc_html__('Add Text','yoga-studio'),
        'section' => 'yoga_studio_top',
        'setting' => 'yoga_studio_top_text',
        'type'    => 'text',
    ));
    $wp_customize->selective_refresh->add_partial( 'yoga_studio_top_text', array(
      'selector' => '.yoga-contact',
      'render_callback' => 'yoga_studio_top_text_customize_partial_yoga_studio_top_text',
    ) );
    $wp_customize->add_setting('yoga_studio_phone',array(
        'default' => '',
        'sanitize_callback' => 'yoga_studio_sanitize_phone_number'
    ));
    $wp_customize->add_control('yoga_studio_phone',array(
        'label' => esc_html__('Add Phone Number','yoga-studio'),
        'section' => 'yoga_studio_top',
        'setting' => 'yoga_studio_phone',
        'type'    => 'text',
    ));
    $wp_customize->selective_refresh->add_partial( 'yoga_studio_phone', array(
      'selector' => '.yoga-call',
      'render_callback' => 'yoga_studio_customize_partial_yoga_studio_phone',
    ) );
    $wp_customize->add_setting('yoga_studio_address',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('yoga_studio_address',array(
        'label' => esc_html__('Add Address','yoga-studio'),
        'section' => 'yoga_studio_top',
        'setting' => 'yoga_studio_address',
        'type'    => 'text',
    ));
    $wp_customize->selective_refresh->add_partial( 'yoga_studio_address', array(
      'selector' => '.yoga-add',
      'render_callback' => 'yoga_studio_customize_partial_yoga_studio_address',
    ) );
    $wp_customize->add_setting('yoga_studio_button_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('yoga_studio_button_text',array(
        'label' => esc_html__('Add Button Text','yoga-studio'),
        'section' => 'yoga_studio_top',
        'setting' => 'yoga_studio_button_text',
        'type'    => 'text',
    ));
    $wp_customize->selective_refresh->add_partial( 'yoga_studio_button_text', array(
      'selector' => '.top_btn a',
      'render_callback' => 'yoga_studio_customize_partial_yoga_studio_button_text',
    ) );
    $wp_customize->add_setting('yoga_studio_button_link',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('yoga_studio_button_link',array(
        'label' => esc_html__('Add Button URL','yoga-studio'),
        'section' => 'yoga_studio_top',
        'setting' => 'yoga_studio_button_link',
        'type'    => 'url',
    ));

    // Social Media
    $wp_customize->add_section('yoga_studio_urls',array(
        'title' => __('Social Media', 'yoga-studio'),
        'priority' => 3,
        'panel' => 'yoga_studio_custompage_panel',
    ) );
    $wp_customize->add_setting( 'yoga_studio_section_social_heading', array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_section_social_heading', array(
        'label'       => esc_html__( 'Social Media Settings', 'yoga-studio' ),
        'description' => __( 'Add social media links in the below feilds', 'yoga-studio' ),         
        'section'     => 'yoga_studio_urls',
        'settings'    => 'yoga_studio_section_social_heading',
    ) ) );
    $wp_customize->add_setting(
        'yoga_studio_social_enable',
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
            'yoga_studio_social_enable',
            array(
                'settings'        => 'yoga_studio_social_enable',
                'section'         => 'yoga_studio_urls',
                'label'           => __( 'Check to show social fields', 'yoga-studio' ),                
                'choices'         => array(
                    '1'      => __( 'On', 'yoga-studio' ),
                    'off'    => __( 'Off', 'yoga-studio' ),
                ),
                'active_callback' => '',
            )
        )
    );
    $wp_customize->selective_refresh->add_partial( 'yoga_studio_social_enable', array(
      'selector' => '.links i',
      'render_callback' => 'yoga_studio_customize_partial_yoga_studio_social_enable',
    ) );
    $wp_customize->add_setting( 'yoga_studio_theme_twitter_heading', array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_theme_twitter_heading', array(
        'label'       => esc_html__( 'Twitter Settings', 'yoga-studio' ),
        'section'     => 'yoga_studio_urls',
        'settings'    => 'yoga_studio_theme_twitter_heading',
    ) ) );
    $wp_customize->add_setting('yoga_studio_twitter_icon',array(
        'default'   => 'fab fa-x-twitter',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control(new Yoga_Studio_Fontawesome_Icon_Chooser(
        $wp_customize,'yoga_studio_twitter_icon',array(
        'label' => __('Add Icon','yoga-studio'),
        'transport' => 'refresh',
        'section'   => 'yoga_studio_urls',
        'setting'   => 'yoga_studio_twitter_icon',
        'type'      => 'icon'
    )));
    $wp_customize->add_setting('yoga_studio_twitter',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('yoga_studio_twitter',array(
        'label' => esc_html__('Add URL','yoga-studio'),
        'section' => 'yoga_studio_urls',
        'setting' => 'yoga_studio_twitter',
        'type'    => 'url'
    ));
    $wp_customize->add_setting(
        'yoga_studio_header_twt_target',
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
            'yoga_studio_header_twt_target',
            array(
                'settings'        => 'yoga_studio_header_twt_target',
                'section'         => 'yoga_studio_urls',
                'label'           => __( 'Open link in a new tab', 'yoga-studio' ),             
                'choices'         => array(
                    '1'      => __( 'On', 'yoga-studio' ),
                    'off'    => __( 'Off', 'yoga-studio' ),
                ),
                'active_callback' => '',
            )
        )
    );
    $wp_customize->add_setting( 'yoga_studio_theme_linkedin_heading', array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_theme_linkedin_heading', array(
        'label'       => esc_html__( 'Linkedin Settings', 'yoga-studio' ),
        'section'     => 'yoga_studio_urls',
        'settings'    => 'yoga_studio_theme_linkedin_heading',
    ) ) );
    $wp_customize->add_setting('yoga_studio_linkedin_icon',array(
        'default'   => 'fab fa-linkedin',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control(new Yoga_Studio_Fontawesome_Icon_Chooser(
        $wp_customize,'yoga_studio_linkedin_icon',array(
        'label' => __('Add Icon','yoga-studio'),
        'transport' => 'refresh',
        'section'   => 'yoga_studio_urls',
        'setting'   => 'yoga_studio_linkedin_icon',
        'type'      => 'icon'
    )));
    $wp_customize->add_setting('yoga_studio_linkedin',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('yoga_studio_linkedin',array(
        'label' => esc_html__('Add URL','yoga-studio'),
        'section' => 'yoga_studio_urls',
        'setting' => 'yoga_studio_linkedin',
        'type'    => 'url'
    ));
    $wp_customize->add_setting(
        'yoga_studio_header_linkedin_target',
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
            'yoga_studio_header_linkedin_target',
            array(
                'settings'        => 'yoga_studio_header_linkedin_target',
                'section'         => 'yoga_studio_urls',
                'label'           => __( 'Open link in a new tab', 'yoga-studio' ),             
                'choices'         => array(
                    '1'      => __( 'On', 'yoga-studio' ),
                    'off'    => __( 'Off', 'yoga-studio' ),
                ),
                'active_callback' => '',
            )
        )
    );
    $wp_customize->add_setting( 'yoga_studio_theme_yt_heading', array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_theme_yt_heading', array(
        'label'       => esc_html__( 'Youtube Settings', 'yoga-studio' ),
        'section'     => 'yoga_studio_urls',
        'settings'    => 'yoga_studio_theme_yt_heading',
    ) ) );
    $wp_customize->add_setting('yoga_studio_youtube_icon',array(
        'default'   => 'fab fa-youtube',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control(new Yoga_Studio_Fontawesome_Icon_Chooser(
        $wp_customize,'yoga_studio_youtube_icon',array(
        'label' => __('Add Icon','yoga-studio'),
        'transport' => 'refresh',
        'section'   => 'yoga_studio_urls',
        'setting'   => 'yoga_studio_youtube_icon',
        'type'      => 'icon'
    )));
    $wp_customize->add_setting('yoga_studio_youtube',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('yoga_studio_youtube',array(
        'label' => esc_html__('Add URL','yoga-studio'),
        'section' => 'yoga_studio_urls',
        'setting' => 'yoga_studio_youtube',
        'type'    => 'url'
    ));
    $wp_customize->add_setting(
        'yoga_studio_header_youtube_target',
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
            'yoga_studio_header_youtube_target',
            array(
                'settings'        => 'yoga_studio_header_youtube_target',
                'section'         => 'yoga_studio_urls',
                'label'           => __( 'Open link in a new tab', 'yoga-studio' ),             
                'choices'         => array(
                    '1'      => __( 'On', 'yoga-studio' ),
                    'off'    => __( 'Off', 'yoga-studio' ),
                ),
                'active_callback' => '',
            )
        )
    );
    $wp_customize->add_setting( 'yoga_studio_theme_instagram_heading', array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_theme_instagram_heading', array(
        'label'       => esc_html__( 'Instagram Settings', 'yoga-studio' ),
        'section'     => 'yoga_studio_urls',
        'settings'    => 'yoga_studio_theme_instagram_heading',
    ) ) );
    $wp_customize->add_setting('yoga_studio_instagram_icon',array(
        'default'   => 'fab fa-instagram',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control(new Yoga_Studio_Fontawesome_Icon_Chooser(
        $wp_customize,'yoga_studio_instagram_icon',array(
        'label' => __('Add Icon','yoga-studio'),
        'transport' => 'refresh',
        'section'   => 'yoga_studio_urls',
        'setting'   => 'yoga_studio_instagram_icon',
        'type'      => 'icon'
    )));
    $wp_customize->add_setting('yoga_studio_instagram',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('yoga_studio_instagram',array(
        'label' => esc_html__('Add URL','yoga-studio'),
        'section' => 'yoga_studio_urls',
        'setting' => 'yoga_studio_instagram',
        'type'    => 'url'
    ));
    $wp_customize->add_setting(
        'yoga_studio_header_instagram_target',
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
            'yoga_studio_header_instagram_target',
            array(
                'settings'        => 'yoga_studio_header_instagram_target',
                'section'         => 'yoga_studio_urls',
                'label'           => __( 'Open link in a new tab', 'yoga-studio' ),             
                'choices'         => array(
                    '1'      => __( 'On', 'yoga-studio' ),
                    'off'    => __( 'Off', 'yoga-studio' ),
                ),
                'active_callback' => '',
            )
        )
    );
    $wp_customize->add_setting( 'yoga_studio_theme_fb_heading', array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_theme_fb_heading', array(
        'label'       => esc_html__( 'Facebook Settings', 'yoga-studio' ),
        'section'     => 'yoga_studio_urls',
        'settings'    => 'yoga_studio_theme_fb_heading',
    ) ) );
    $wp_customize->add_setting('yoga_studio_fb_icon',array(
        'default'   => 'fab fa-facebook',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control(new Yoga_Studio_Fontawesome_Icon_Chooser(
        $wp_customize,'yoga_studio_fb_icon',array(
        'label' => __('Add Icon','yoga-studio'),
        'transport' => 'refresh',
        'section'   => 'yoga_studio_urls',
        'setting'   => 'yoga_studio_fb_icon',
        'type'      => 'icon'
    )));
    $wp_customize->add_setting('yoga_studio_facebook',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('yoga_studio_facebook',array(
        'label' => esc_html__('Add URL','yoga-studio'),
        'section' => 'yoga_studio_urls',
        'setting' => 'yoga_studio_facebook',
        'type'    => 'url'
    ));
    $wp_customize->add_setting(
        'yoga_studio_header_fb_target',
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
            'yoga_studio_header_fb_target',
            array(
                'settings'        => 'yoga_studio_header_fb_target',
                'section'         => 'yoga_studio_urls',
                'label'           => __( 'Open link in a new tab', 'yoga-studio' ),             
                'choices'         => array(
                    '1'      => __( 'On', 'yoga-studio' ),
                    'off'    => __( 'Off', 'yoga-studio' ),
                ),
                'active_callback' => '',
            )
        )
    );

    //Slider
    $wp_customize->add_section( 'yoga_studio_slider_section' , array(
        'title'      => __( 'Slider Settings', 'yoga-studio' ),
        'priority'   => 3,
        'panel' => 'yoga_studio_custompage_panel',
    ) );
    $wp_customize->add_setting( 'yoga_studio_section_slide_heading', array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_section_slide_heading', array(
        'label'       => esc_html__( 'Slider Settings', 'yoga-studio' ),
        'description' => __( 'Slider Image Dimension ( 600px x 700px )', 'yoga-studio' ),       
        'section'     => 'yoga_studio_slider_section',
        'settings'    => 'yoga_studio_section_slide_heading',
        'priority'   => 1,
    ) ) );
    $wp_customize->add_setting(
        'yoga_studio_slider_arrows',
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
            'yoga_studio_slider_arrows',
            array(
                'settings'        => 'yoga_studio_slider_arrows',
                'section'         => 'yoga_studio_slider_section',
                'label'           => __( 'Check to show slider', 'yoga-studio' ),               
                'choices'         => array(
                    '1'      => __( 'On', 'yoga-studio' ),
                    'off'    => __( 'Off', 'yoga-studio' ),
                ),
                'priority'   => 1,
                'active_callback' => '',
                
            )
        )
    );
    $wp_customize->selective_refresh->add_partial( 'yoga_studio_slider_arrows', array(
      'selector' => '.carousel-control-prev',
      'render_callback' => 'yoga_studio_customize_partial_yoga_studio_slider_arrows',
    ) );

    $wp_customize->add_setting('yoga_studio_slider_count',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('yoga_studio_slider_count',array(
        'label' => esc_html__('Slider Count','yoga-studio'),
        'section'   => 'yoga_studio_slider_section',
        'type'      => 'number',
        'priority'    => 1,
    ));

    $categories = get_categories();
    $cats = array();
    $i = 0;
    $cat_post[]= 'select';
    foreach($categories as $category){
    if($i==0){
      $default = $category->slug;
      $i++;
    }
    $cat_post[$category->slug] = $category->name;
    }
    $wp_customize->add_setting('yoga_studio_post_setting',array(
        'default' => 'select',
        'sanitize_callback' => 'yoga_studio_sanitize_select',
    ));
    $wp_customize->add_control('yoga_studio_post_setting',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => esc_html__('Select Category to display slider images','yoga-studio'),
        'section' => 'yoga_studio_slider_section',
        'priority'   => 1,
    ));

    $wp_customize->add_setting(
        'yoga_studio_slider_excerpt_show_hide',
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
            'yoga_studio_slider_excerpt_show_hide',
            array(
                'settings'        => 'yoga_studio_slider_excerpt_show_hide',
                'section'         => 'yoga_studio_slider_section',
                'label'           => __( 'Show Hide excerpt', 'yoga-studio' ),               
                'choices'         => array(
                    '1'      => __( 'On', 'yoga-studio' ),
                    'off'    => __( 'Off', 'yoga-studio' ),
                ),
                'priority'   => 1,
            )
        )
    );
    $wp_customize->add_setting('yoga_studio_slider_excerpt_count',array(
        'default'=> 20,
        'transport' => 'refresh',
        'sanitize_callback' => 'yoga_studio_sanitize_integer'
    ));
    $wp_customize->add_control(new Yoga_Studio_Slider_Custom_Control( $wp_customize, 'yoga_studio_slider_excerpt_count',array(
        'label' => esc_html__( 'Excerpt Limit','yoga-studio' ),
        'section'=> 'yoga_studio_slider_section',
        'settings'=>'yoga_studio_slider_excerpt_count',
        'input_attrs' => array(
            'reset'            => 20,
            'step'             => 1,
            'min'              => 0,
            'max'              => 50,
        ),
        'priority'   => 1,
    )));
    $wp_customize->add_setting(
        'yoga_studio_slider_button_show_hide',
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
            'yoga_studio_slider_button_show_hide',
            array(
                'settings'        => 'yoga_studio_slider_button_show_hide',
                'section'         => 'yoga_studio_slider_section',
                'label'           => __( 'Show Hide Button', 'yoga-studio' ),                
                'choices'         => array(
                    '1'      => __( 'On', 'yoga-studio' ),
                    'off'    => __( 'Off', 'yoga-studio' ),
                ),
                'priority'   => 1,
            )
        )
    );
    $wp_customize->add_setting('yoga_studio_slider_read_more',array(
        'default' => 'Register Now',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('yoga_studio_slider_read_more',array(
        'label' => esc_html__('Button Text','yoga-studio'),
        'section' => 'yoga_studio_slider_section',
        'setting' => 'yoga_studio_slider_read_more',
        'type'    => 'text',
        'priority'   => 1,
    ));

    $wp_customize->add_setting('yoga_studio_slider_content_alignment',array(
        'default' => 'LEFT-ALIGN',
        'sanitize_callback' => 'yoga_studio_sanitize_choices'
    ));
    $wp_customize->add_control('yoga_studio_slider_content_alignment',array(
        'type' => 'radio',
        'label'     => __('Slider Content Alignment', 'yoga-studio'),
        'section' => 'yoga_studio_slider_section',
        'type' => 'select',
        'choices' => array(
            'LEFT-ALIGN' => __('LEFT','yoga-studio'),
            'CENTER-ALIGN' => __('CENTER','yoga-studio'),
            'RIGHT-ALIGN' => __('RIGHT','yoga-studio'),
        ),
    ) );

    $wp_customize->add_setting('yoga_studio_slider_opacity',array(
        'default' => '1',
        'sanitize_callback' => 'yoga_studio_sanitize_choices'
    ));
    $wp_customize->add_control('yoga_studio_slider_opacity',array(
        'type' => 'radio',
        'label'     => __('Slider Opacity', 'yoga-studio'),
        'section' => 'yoga_studio_slider_section',
        'type' => 'select',
        'choices' => array(
            '0' => __('0','yoga-studio'),
            '0.1' => __('0.1','yoga-studio'),
            '0.2' => __('0.2','yoga-studio'),
            '0.3' => __('0.3','yoga-studio'),
            '0.4' => __('0.4','yoga-studio'),
            '0.5' => __('0.5','yoga-studio'),
            '0.6' => __('0.6','yoga-studio'),
            '0.7' => __('0.7','yoga-studio'),
            '0.8' => __('0.8','yoga-studio'),
            '0.9' => __('0.9','yoga-studio'),
            '1' => __('1','yoga-studio')
        ),
    ) );

    // Services Section
    $wp_customize->add_section( 'yoga_studio_service_box_section' , array(
        'title'      => __( 'Services Settings', 'yoga-studio' ),
        'priority'   => 4,
        'panel' => 'yoga_studio_custompage_panel',
    ) );
    $wp_customize->add_setting( 'yoga_studio_section_services_heading', array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_section_services_heading', array(
        'label'       => esc_html__( 'Services Settings', 'yoga-studio' ),      
        'section'     => 'yoga_studio_service_box_section',
        'settings'    => 'yoga_studio_section_services_heading',
    ) ) );
    $wp_customize->add_setting(
        'yoga_studio_services_enable',
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
            'yoga_studio_services_enable',
            array(
                'settings'        => 'yoga_studio_services_enable',
                'section'         => 'yoga_studio_service_box_section',
                'label'           => __( 'Check to show services settings', 'yoga-studio' ),                
                'choices'         => array(
                    '1'      => __( 'On', 'yoga-studio' ),
                    'off'    => __( 'Off', 'yoga-studio' ),
                ),
                'active_callback' => '',
            )
        )
    );
    $wp_customize->add_setting('yoga_studio_services_section_title',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('yoga_studio_services_section_title',array(
        'label' => esc_html__('Section Title','yoga-studio'),
        'section' => 'yoga_studio_service_box_section',
        'setting' => 'yoga_studio_services_section_title',
        'type'    => 'text',
    ));
    $wp_customize->selective_refresh->add_partial( 'yoga_studio_services_section_title', array(
      'selector' => '#services-box h3',
      'render_callback' => 'yoga_studio_customize_partial_yoga_studio_services_section_title',
    ) );
    $wp_customize->add_setting('yoga_studio_services_section_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('yoga_studio_services_section_text',array(
        'label' => esc_html__('Section Text','yoga-studio'),
        'section' => 'yoga_studio_service_box_section',
        'setting' => 'yoga_studio_services_section_text',
        'type'    => 'text',
    ));
    $yoga_studio_categories = get_categories();
    $cats = array();
    $i = 0;
    $cat_post[]= 'select';
    foreach($yoga_studio_categories as $category){
    if($i==0){
      $default = $category->slug;
      $i++;
    }
    $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('yoga_studio_category_setting',array(
        'default' => 'select',
        'sanitize_callback' => 'yoga_studio_sanitize_select',
    ));
    $wp_customize->add_control('yoga_studio_category_setting',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => esc_html__('Select Category to display Post','yoga-studio'),
        'section' => 'yoga_studio_service_box_section',
    ));

    $wp_customize->add_setting('yoga_studio_service_count',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('yoga_studio_service_count',array(
        'label' => esc_html__('Service Count','yoga-studio'),
        'section'   => 'yoga_studio_service_box_section',
        'type'      => 'number',
    ));

    //Footer
    $wp_customize->add_section( 'yoga_studio_footer_copyright', array(
        'title'      => esc_html__( 'Footer Text', 'yoga-studio' ),
        'priority' => 5,
        'panel' => 'yoga_studio_custompage_panel',
    ) );
    $wp_customize->add_setting( 'yoga_studio_section_footer_heading', array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new Yoga_Studio_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_studio_section_footer_heading', array(
        'label'       => esc_html__( 'Footer Settings', 'yoga-studio' ),        
        'section'     => 'yoga_studio_footer_copyright',
        'settings'    => 'yoga_studio_section_footer_heading',
        'priority' => 1,
    ) ) );
    $wp_customize->add_setting('yoga_studio_footer_text',array(
        'default'   => 'Yoga WordPress Theme',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('yoga_studio_footer_text',array(
        'label' => esc_html__('Copyright Text','yoga-studio'),
        'section'   => 'yoga_studio_footer_copyright',
        'type'      => 'textarea'
    ));
    
    $wp_customize->selective_refresh->add_partial( 'yoga_studio_footer_text', array(
      'selector' => '.site-info a',
      'render_callback' => 'yoga_studio_customize_partial_yoga_studio_footer_text',
    ) );
    $wp_customize->add_setting('yoga_studio_footer_content_alignment',array(
        'default' => 'CENTER-ALIGN',
        'sanitize_callback' => 'yoga_studio_sanitize_choices'
    ));

    $wp_customize->add_control('yoga_studio_footer_content_alignment',array(
        'type' => 'radio',
        'label'     => __('Footer Content Alignment', 'yoga-studio'),
        'section' => 'yoga_studio_footer_copyright',
        'type' => 'select',
        'choices' => array(
            'LEFT-ALIGN' => __('LEFT','yoga-studio'),
            'CENTER-ALIGN' => __('CENTER','yoga-studio'),
            'RIGHT-ALIGN' => __('RIGHT','yoga-studio'),
        ),
    ) );

    $wp_customize->add_setting('yoga_studio_footer_widget',array(
        'default' => '4',
        'sanitize_callback' => 'yoga_studio_sanitize_choices'
    ));
    $wp_customize->add_control('yoga_studio_footer_widget',array(
        'type' => 'radio',
        'label'     => __('Footer Per Column', 'yoga-studio'),
        'section' => 'yoga_studio_footer_copyright',
        'type' => 'select',
        'choices' => array(
            '1' => __('1','yoga-studio'),
            '2' => __('2','yoga-studio'),
            '3' => __('3','yoga-studio'),
            '4' => __('4','yoga-studio'),
        )
    ) );