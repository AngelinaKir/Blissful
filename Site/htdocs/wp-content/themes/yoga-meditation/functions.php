<?php
/**
 * Theme functions and definitions
 *
 * @package Yoga Meditation
 */

// enque files
if ( ! function_exists( 'yoga_meditation_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function yoga_meditation_enqueue_styles() {
		wp_enqueue_style( 'yoga-studio-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'yoga-meditation-style', get_stylesheet_directory_uri() . '/style.css', array( 'yoga-studio-style-parent' ), '1.0.0' );
		// Theme Customize CSS.
		require get_parent_theme_file_path( 'inc/extra_customization.php' );
		wp_add_inline_style( 'yoga-meditation-style',$yoga_studio_custom_style );
		require get_theme_file_path( 'inc/extra_customization.php' );
		wp_add_inline_style( 'yoga-meditation-style',$yoga_studio_custom_style );

		// blocks css
        wp_enqueue_style( 'yoga-meditation-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'yoga-meditation-style' ), '1.0' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'yoga_meditation_enqueue_styles', 99 );

// theme setup
function yoga_meditation_setup() {
	add_theme_support( 'align-wide' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'yoga-meditation-featured-image', 2000, 1200, true );
	add_image_size( 'yoga-meditation-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'yoga-meditation' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	/*
	* This theme styles the visual editor to resemble the theme style,
	* specifically font, colors, and column width.
	*/
	add_editor_style( array( 'assets/css/editor-style.css', yoga_studio_fonts_url() ) );
}
add_action( 'after_setup_theme', 'yoga_meditation_setup' );

// header setup
function yoga_meditation_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'yoga_meditation_custom_header_args', array(
		'default-image'          => get_parent_theme_file_uri( '/assets/images/header-img-2.png' ),
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 100,
		'flex-width'			 => true,
		'flex-height'			 => true,
		'wp-head-callback'       => 'yoga_studio_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'yoga_meditation_custom_header_setup' );

// widgets
function yoga_meditation_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'yoga-meditation' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'yoga-meditation' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'yoga-meditation' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'yoga-meditation' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'yoga-meditation' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'yoga-meditation' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'yoga-meditation' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'yoga-meditation' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'yoga-meditation' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'yoga-meditation' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'yoga-meditation' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'yoga-meditation' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'yoga-meditation' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'yoga-meditation' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'yoga_meditation_widgets_init' );

// remove sections
function yoga_meditation_customize_register() {
  	global $wp_customize;

  	$wp_customize->remove_section( 'yoga_studio_pro' );

	$wp_customize->remove_setting( 'yoga_studio_top_text' );
	$wp_customize->remove_control( 'yoga_studio_top_text' );

	$wp_customize->remove_setting('yoga_studio_slider_content_alignment');
	$wp_customize->remove_control('yoga_studio_slider_content_alignment');

	$wp_customize->remove_setting('yoga_studio_footer_text');
	$wp_customize->remove_control('yoga_studio_footer_text');

	$wp_customize->remove_setting('yoga_studio_slider_excerpt_show_hide');
	$wp_customize->remove_control('yoga_studio_slider_excerpt_show_hide');

	$wp_customize->remove_setting('yoga_studio_slider_excerpt_count');
	$wp_customize->remove_control('yoga_studio_slider_excerpt_count');

	$wp_customize->remove_setting('yoga_studio_slider_button_show_hide');
	$wp_customize->remove_control('yoga_studio_slider_button_show_hide');

	$wp_customize->remove_setting('yoga_studio_slider_read_more');
	$wp_customize->remove_control('yoga_studio_slider_read_more');

	$wp_customize->remove_setting('yoga_studio_primary_color');
	$wp_customize->remove_control('yoga_studio_primary_color');

	$wp_customize->remove_setting('yoga_studio_heading_color');
	$wp_customize->remove_control('yoga_studio_heading_color');

	$wp_customize->remove_setting('yoga_studio_primary_fade');
	$wp_customize->remove_control('yoga_studio_primary_fade');

	$wp_customize->remove_setting('yoga_studio_footer_bg');
	$wp_customize->remove_control('yoga_studio_footer_bg');

	$wp_customize->remove_setting('yoga_studio_slider_opacity');
	$wp_customize->remove_control('yoga_studio_slider_opacity');
}
add_action( 'customize_register', 'yoga_meditation_customize_register', 11 );

// customizer
function yoga_meditation_customize( $wp_customize ) {
	wp_enqueue_style('customizercustom_css', esc_url( get_stylesheet_directory_uri() ). '/assets/css/customizer.css');

	require get_theme_file_path( 'inc/custom-control.php' );

	// pro section
	$wp_customize->add_section('yoga_meditation_pro', array(
		'title'    => __('UPGRADE YOGA PREMIUM', 'yoga-meditation'),
		'priority' => 1,
	));
	$wp_customize->add_setting('yoga_meditation_pro', array(
		'default'           => null,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control(new Yoga_Meditation_Pro_Control($wp_customize, 'yoga_meditation_pro', array(
		'label'    => __('YOGA MEDITATION PREMIUM', 'yoga-meditation'),
		'section'  => 'yoga_meditation_pro',
		'settings' => 'yoga_meditation_pro',
		'priority' => 1,
	)));

	// header
    $wp_customize->add_setting('yoga_meditation_email',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('yoga_meditation_email',array(
		'label' => esc_html__('Add Email Address','yoga-meditation'),
		'section' => 'yoga_studio_top',
		'setting' => 'yoga_meditation_email',
		'type'    => 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'yoga_meditation_email', array(
		'selector' => '.top_bar i',
		'render_callback' => 'yoga_meditation_customize_partial_yoga_meditation_email',
	) );

	// slider
    $wp_customize->add_setting('yoga_meditation_slider_content_alignment',array(
        'default' => 'CENTER-ALIGN',
        'sanitize_callback' => 'yoga_studio_sanitize_choices'
    ));
    $wp_customize->add_control('yoga_meditation_slider_content_alignment',array(
        'type' => 'radio',
        'label'     => __('Slider Content Alignment', 'yoga-meditation'),
        'section' => 'yoga_studio_slider_section',
        'type' => 'select',
        'choices' => array(
            'LEFT-ALIGN' => __('LEFT','yoga-meditation'),
            'CENTER-ALIGN' => __('CENTER','yoga-meditation'),
            'RIGHT-ALIGN' => __('RIGHT','yoga-meditation'),
        ),
    ) );

    $wp_customize->add_setting('yoga_meditation_slider_opacity',array(
        'default' => '0.4',
        'sanitize_callback' => 'yoga_studio_sanitize_choices'
    ));
    $wp_customize->add_control('yoga_meditation_slider_opacity',array(
        'type' => 'radio',
        'label'     => __('Slider Opacity', 'yoga-meditation'),
        'section' => 'yoga_studio_slider_section',
        'type' => 'select',
        'choices' => array(
            '0' => __('0','yoga-meditation'),
            '0.1' => __('0.1','yoga-meditation'),
            '0.2' => __('0.2','yoga-meditation'),
            '0.3' => __('0.3','yoga-meditation'),
            '0.4' => __('0.4','yoga-meditation'),
            '0.5' => __('0.5','yoga-meditation'),
            '0.6' => __('0.6','yoga-meditation'),
            '0.7' => __('0.7','yoga-meditation'),
            '0.8' => __('0.8','yoga-meditation'),
            '0.9' => __('0.9','yoga-meditation'),
            '1' => __('1','yoga-meditation')
        ),
    ) );

	// About
	$wp_customize->add_section( 'yoga_meditation_about_section' , array(
    	'title'      => __( 'About Settings', 'yoga-meditation' ),
		'priority'   => 5,
		'panel' => 'yoga_studio_custompage_panel',
	) );
	$wp_customize->add_setting( 'yoga_meditation_about_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Yoga_Meditation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'yoga_meditation_about_heading', array(
		'label'       => esc_html__( 'About Settings', 'yoga-meditation' ),		
		'section'     => 'yoga_meditation_about_section',
		'settings'    => 'yoga_meditation_about_heading',
	) ) );
	$wp_customize->add_setting(
		'yoga_meditation_about_enable',
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
		new Yoga_Meditation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'yoga_meditation_about_enable',
			array(
				'settings'        => 'yoga_meditation_about_enable',
				'section'         => 'yoga_meditation_about_section',
				'label'           => __( 'Check to show About settings', 'yoga-meditation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'yoga-meditation' ),
					'off'    => __( 'Off', 'yoga-meditation' ),
				),
				'active_callback' => '',
			)
		)
	);

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$pst_sls[]= __('Select','yoga-meditation');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}

	$wp_customize->add_setting('yoga_meditation_about_post_setting',array(
		'sanitize_callback' => 'yoga_studio_sanitize_select',
	));
	$wp_customize->add_control('yoga_meditation_about_post_setting',array(
		'type'    => 'select',
		'choices' => $pst_sls,
		'label' => __('Select post','yoga-meditation'),
		'section' => 'yoga_meditation_about_section',
	));

	$wp_customize->selective_refresh->add_partial( 'yoga_meditation_about_post_setting', array(
	'selector' => '.about-box h2 a',
	'render_callback' => 'yoga_meditation_customize_partial_yoga_meditation_about_post_setting',
	) );

	wp_reset_postdata();

	$wp_customize->add_setting('yoga_meditation_footer_text',array(
        'default'   => 'Meditation WordPress Theme',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('yoga_meditation_footer_text',array(
        'label' => esc_html__('Copyright Text','yoga-meditation'),
        'section'   => 'yoga_studio_footer_copyright',
        'type'      => 'textarea'
    ));
    $wp_customize->selective_refresh->add_partial( 'yoga_meditation_footer_text', array(
      'selector' => '.site-info a',
      'render_callback' => 'yoga_studio_customize_partial_yoga_meditation_footer_text',
    ) );

    $wp_customize->add_setting('yoga_meditation_primary_color', array(
	    'default' => '#db4242',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'yoga_meditation_primary_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme Color', 'yoga-meditation'),
	 
	)));

	$wp_customize->add_setting('yoga_meditation_heading_color', array(
	    'default' => '#412236',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'yoga_meditation_heading_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme Heading Color', 'yoga-meditation'),
	 
	)));

	$wp_customize->add_setting('yoga_meditation_primary_fade', array(
	    'default' => '#d8d9ff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'yoga_meditation_primary_fade', array(
	    'section' => 'colors',
	    'label' => esc_html__('theme Color Light', 'yoga-meditation'),
	 
	)));

	$wp_customize->add_setting('yoga_meditation_footer_bg', array(
	    'default' => '#412236',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'yoga_meditation_footer_bg', array(
	    'section' => 'colors',
	    'label' => esc_html__('Footer Bg color', 'yoga-meditation'),
	)));
}
add_action( 'customize_register', 'yoga_meditation_customize' );

// comments
function yoga_meditation_enqueue_comments_reply() {
  if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
    // Load comment-reply.js (into footer)
    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
  }
}
add_action(  'wp_enqueue_scripts', 'yoga_meditation_enqueue_comments_reply' );

// Footer Text
function yoga_meditation_copyright_link() {
    $yoga_meditation_footer_text = get_theme_mod('yoga_meditation_footer_text', esc_html__('Meditation WordPress Theme', 'yoga-meditation'));
    $yoga_meditation_credit_link = esc_url('https://www.ovationthemes.com/products/free-meditation-wordpress-theme');

    echo '<a href="' . $yoga_meditation_credit_link . '" target="_blank">' . esc_html($yoga_meditation_footer_text) . '<span class="footer-copyright">' . esc_html__(' By Ovation Themes', 'yoga-meditation') . '</span></a>';
}

define('YOGA_MEDITATION_PRO_LINK',__('https://www.ovationthemes.com/products/Yogi-wordpress-theme','yoga-meditation'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Yoga_Meditation_Pro_Control')):
    class Yoga_Meditation_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
            <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( YOGA_MEDITATION_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE YOGA PREMIUM','yoga-meditation');?> </a>
            </div>
            <div class="col-md">
                <img class="yoga_meditation_img_responsive " src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png">
            </div>
            <div class="col-md">
                <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('Yoga Meditation PREMIUM - Features', 'yoga-meditation'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'yoga-meditation');?> </li>
                    <li class="upsell-yoga_meditation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'yoga-meditation');?> </li>
                </ul>
            </div>
            <div class="col-md upsell-btn upsell-btn-bottom">
                <a href="<?php echo esc_url( YOGA_MEDITATION_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE YOGA PREMIUM','yoga-meditation');?> </a>
            </div>
        </label>
    <?php } }
endif;

if ( ! defined( 'YOGA_STUDIO_SUPPORT' ) ) {
	define('YOGA_STUDIO_SUPPORT',__('https://wordpress.org/support/theme/yoga-meditation','yoga-meditation'));
}
if ( ! defined( 'YOGA_STUDIO_REVIEW' ) ) {
	define('YOGA_STUDIO_REVIEW',__('https://wordpress.org/support/theme/yoga-meditation/reviews/#new-post','yoga-meditation'));
}
if ( ! defined( 'YOGA_STUDIO_LIVE_DEMO' ) ) {
	define('YOGA_STUDIO_LIVE_DEMO',__('https://trial.ovationthemes.com/yoga-meditation/','yoga-meditation'));
}
if ( ! defined( 'YOGA_STUDIO_BUY_PRO' ) ) {
	define('YOGA_STUDIO_BUY_PRO',__('https://www.ovationthemes.com/products/yogi-wordpress-theme','yoga-meditation'));
}
if ( ! defined( 'YOGA_STUDIO_PRO_DOC' ) ) {
	define('YOGA_STUDIO_PRO_DOC',__('https://trial.ovationthemes.com/docs/ot-yoga-meditation-pro-doc/','yoga-meditation'));
}
if ( ! defined( 'YOGA_STUDIO_FREE_DOC' ) ) {
define('YOGA_STUDIO_FREE_DOC',__('https://trial.ovationthemes.com/docs/ot-yoga-meditation-free-doc/','yoga-meditation'));
}
if ( ! defined( 'YOGA_STUDIO_THEME_NAME' ) ) {
	define('YOGA_STUDIO_THEME_NAME',__('Premium Meditation Theme','yoga-meditation'));
}
