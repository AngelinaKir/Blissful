<?php

	$yoga_studio_custom_style= "";

if (false === get_option('yoga_studio_sticky_header')) {
    add_option('yoga_studio_sticky_header', 'off');
}

// Define the custom CSS based on the 'yoga_studio_sticky_header' option

if (get_option('yoga_studio_sticky_header', 'off') !== 'on') {
    $yoga_studio_custom_style .= '.fixed_header.fixed {';
    $yoga_studio_custom_style .= 'position: static;';
    $yoga_studio_custom_style .= '}';
}

if (get_option('yoga_studio_sticky_header', 'off') !== 'off') {
    $yoga_studio_custom_style .= '.fixed_header.fixed {';
    $yoga_studio_custom_style .= 'position: fixed; border-bottom: solid 5px var(--theme-primary-color); background: #fff;';
    $yoga_studio_custom_style .= '}';

    $yoga_studio_custom_style .= '.admin-bar .fixed {';
    $yoga_studio_custom_style .= ' margin-top: 32px;';
    $yoga_studio_custom_style .= '}';
}

// Width

$yoga_studio_theme_width = get_theme_mod( 'yoga_studio_width_options','full_width');

if($yoga_studio_theme_width == 'full_width'){

$yoga_studio_custom_style .='body{';

	$yoga_studio_custom_style .='max-width: 100%;';

$yoga_studio_custom_style .='}';

}else if($yoga_studio_theme_width == 'container'){

$yoga_studio_custom_style .='body{';

	$yoga_studio_custom_style .='width: 100%; padding-right: 15px; padding-left: 15px;  margin-right: auto !important; margin-left: auto !important;';

$yoga_studio_custom_style .='}';

$yoga_studio_custom_style .='@media screen and (min-width: 601px){';

$yoga_studio_custom_style .='body{';

    $yoga_studio_custom_style .='max-width: 720px;';
    
$yoga_studio_custom_style .='} }';

$yoga_studio_custom_style .='@media screen and (min-width: 992px){';

$yoga_studio_custom_style .='body{';

    $yoga_studio_custom_style .='max-width: 960px;';
    
$yoga_studio_custom_style .='} }';

$yoga_studio_custom_style .='@media screen and (min-width: 1200px){';

$yoga_studio_custom_style .='body{';

    $yoga_studio_custom_style .='max-width: 1140px;';
    
$yoga_studio_custom_style .='} }';

$yoga_studio_custom_style .='@media screen and (min-width: 1400px){';

$yoga_studio_custom_style .='body{';

    $yoga_studio_custom_style .='max-width: 1320px;';
    
$yoga_studio_custom_style .='} }';

$yoga_studio_custom_style .='@media screen and (max-width:600px){';

$yoga_studio_custom_style .='body{';

    $yoga_studio_custom_style .='max-width: 100%; padding-right:0px; padding-left: 0px';
    
$yoga_studio_custom_style .='} }';

}else if($yoga_studio_theme_width == 'container_fluid'){

$yoga_studio_custom_style .='body{';

	$yoga_studio_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

$yoga_studio_custom_style .='}';

$yoga_studio_custom_style .='@media screen and (max-width:600px){';

$yoga_studio_custom_style .='body{';

    $yoga_studio_custom_style .='max-width: 100%; padding-right:0px; padding-left: 0px';
    
$yoga_studio_custom_style .='} }';
}

// Scroll-top-position

$yoga_studio_scroll_options = get_theme_mod( 'yoga_studio_scroll_options','right_align');

if($yoga_studio_scroll_options == 'right_align'){

$yoga_studio_custom_style .='.scroll-top button{';

	$yoga_studio_custom_style .='';

$yoga_studio_custom_style .='}';

}else if($yoga_studio_scroll_options == 'center_align'){

$yoga_studio_custom_style .='.scroll-top button{';

	$yoga_studio_custom_style .='right: 0; left:0; margin: 0 auto; top:85%';

$yoga_studio_custom_style .='}';

}else if($yoga_studio_scroll_options == 'left_align'){

$yoga_studio_custom_style .='.scroll-top button{';

	$yoga_studio_custom_style .='right: auto; left:5%; margin: 0 auto';

$yoga_studio_custom_style .='}';
}

// logo-height

$yoga_studio_logo_max_height = get_theme_mod('yoga_studio_logo_max_height','100');

if($yoga_studio_logo_max_height != false){

$yoga_studio_custom_style .='.custom-logo-link img{';

	$yoga_studio_custom_style .='max-height: '.esc_html($yoga_studio_logo_max_height).'px;';

$yoga_studio_custom_style .='}';
}

// text-transform

$yoga_studio_text_transform = get_theme_mod( 'yoga_studio_menu_text_transform','CAPITALISE');
if($yoga_studio_text_transform == 'CAPITALISE'){

$yoga_studio_custom_style .='nav#top_gb_menu ul li a{';

	$yoga_studio_custom_style .='text-transform: capitalize ; font-size: 14px;';

$yoga_studio_custom_style .='}';

}else if($yoga_studio_text_transform == 'UPPERCASE'){

$yoga_studio_custom_style .='nav#top_gb_menu ul li a{';

	$yoga_studio_custom_style .='text-transform: uppercase ; font-size: 14px;';

$yoga_studio_custom_style .='}';

}else if($yoga_studio_text_transform == 'LOWERCASE'){

$yoga_studio_custom_style .='nav#top_gb_menu ul li a{';

	$yoga_studio_custom_style .='text-transform: lowercase ; font-size: 14px;';

$yoga_studio_custom_style .='}';
}

/*-------------------------Slider-content-alignment-------------------*/

$yoga_studio_slider_content_alignment = get_theme_mod( 'yoga_studio_slider_content_alignment','LEFT-ALIGN');

if($yoga_studio_slider_content_alignment == 'LEFT-ALIGN'){

$yoga_studio_custom_style .='#slider .slide-inner-box {';

	$yoga_studio_custom_style .='text-align:left; right: 20%; left: 10%;';

$yoga_studio_custom_style .='}';

$yoga_studio_custom_style .='@media screen and (max-width:1299px){';

$yoga_studio_custom_style .='#slider .slide-inner-box{';

    $yoga_studio_custom_style .='right: 20%; left: 0;';
    
$yoga_studio_custom_style .='} }';


}else if($yoga_studio_slider_content_alignment == 'CENTER-ALIGN'){

$yoga_studio_custom_style .='#slider .slide-inner-box {';

	$yoga_studio_custom_style .='text-align:center; right: 20%; left: 0;';

$yoga_studio_custom_style .='}';


}else if($yoga_studio_slider_content_alignment == 'RIGHT-ALIGN'){

$yoga_studio_custom_style .='#slider .slide-inner-box {';

	$yoga_studio_custom_style .='text-align:right; right: 20%; left: 0;';

$yoga_studio_custom_style .='}';

$yoga_studio_custom_style .='@media screen and (max-width:1299px){';

$yoga_studio_custom_style .='#slider .slide-inner-box{';

    $yoga_studio_custom_style .='right: 20%; left: 10%;';
    
$yoga_studio_custom_style .='} }';

}

//related products
if( get_option( 'yoga_studio_related_product',true) != 'on') {

$yoga_studio_custom_style .='.related.products{';

	$yoga_studio_custom_style .='display: none;';
	
$yoga_studio_custom_style .='}';
}

if( get_option( 'yoga_studio_related_product',true) != 'off') {

$yoga_studio_custom_style .='.related.products{';

	$yoga_studio_custom_style .='display: block;';
	
$yoga_studio_custom_style .='}';
}
// footer text alignment
$yoga_studio_footer_content_alignment = get_theme_mod( 'yoga_studio_footer_content_alignment','CENTER-ALIGN');

if($yoga_studio_footer_content_alignment == 'LEFT-ALIGN'){

$yoga_studio_custom_style .='.site-info{';

	$yoga_studio_custom_style .='text-align:left; padding-left: 30px;';

$yoga_studio_custom_style .='}';

$yoga_studio_custom_style .='.site-info a{';

	$yoga_studio_custom_style .='padding-left: 30px;';

$yoga_studio_custom_style .='}';


}else if($yoga_studio_footer_content_alignment == 'CENTER-ALIGN'){

$yoga_studio_custom_style .='.site-info{';

	$yoga_studio_custom_style .='text-align:center;';

$yoga_studio_custom_style .='}';


}else if($yoga_studio_footer_content_alignment == 'RIGHT-ALIGN'){

$yoga_studio_custom_style .='.site-info{';

	$yoga_studio_custom_style .='text-align:right; padding-right: 30px;';

$yoga_studio_custom_style .='}';

$yoga_studio_custom_style .='.site-info a{';

	$yoga_studio_custom_style .='padding-right: 30px;';

$yoga_studio_custom_style .='}';

}

// slider button
$mobile_button_setting = get_option('yoga_studio_slider_button_mobile_show_hide', '1');
$main_button_setting = get_option('yoga_studio_slider_button_show_hide', '1');

$yoga_studio_custom_style .= '#slider .home-btn {';

if ($main_button_setting == 'off') {
    $yoga_studio_custom_style .= 'display: none;';
}

$yoga_studio_custom_style .= '}';

// Add media query for mobile devices
$yoga_studio_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_button_setting == 'off' || $mobile_button_setting == 'off') {
    $yoga_studio_custom_style .= '#slider .home-btn { display: none; }';
}
$yoga_studio_custom_style .= '}';


// scroll button
$mobile_scroll_setting = get_option('yoga_studio_scroll_enable_mobile', '1');
$main_scroll_setting = get_option('yoga_studio_scroll_enable', '1');

$yoga_studio_custom_style .= '.scrollup {';

if ($main_scroll_setting == 'off') {
    $yoga_studio_custom_style .= 'display: none;';
}

$yoga_studio_custom_style .= '}';

// Add media query for mobile devices
$yoga_studio_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_scroll_setting == 'off' || $mobile_scroll_setting == 'off') {
    $yoga_studio_custom_style .= '.scrollup { display: none; }';
}
$yoga_studio_custom_style .= '}';

// theme breadcrumb
$mobile_breadcrumb_setting = get_option('yoga_studio_enable_breadcrumb_mobile', '1');
$main_breadcrumb_setting = get_option('yoga_studio_enable_breadcrumb', '1');

$yoga_studio_custom_style .= '.archieve_breadcrumb {';

if ($main_breadcrumb_setting == 'off') {
    $yoga_studio_custom_style .= 'display: none;';
}

$yoga_studio_custom_style .= '}';

// Add media query for mobile devices
$yoga_studio_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_breadcrumb_setting == 'off' || $mobile_breadcrumb_setting == 'off') {
    $yoga_studio_custom_style .= '.archieve_breadcrumb { display: none; }';
}
$yoga_studio_custom_style .= '}';

// single post and page breadcrumb
$mobile_single_breadcrumb_setting = get_option('yoga_studio_single_enable_breadcrumb_mobile', '1');
$main_single_breadcrumb_setting = get_option('yoga_studio_single_enable_breadcrumb', '1');

$yoga_studio_custom_style .= '.single_breadcrumb {';

if ($main_single_breadcrumb_setting == 'off') {
    $yoga_studio_custom_style .= 'display: none;';
}

$yoga_studio_custom_style .= '}';

// Add media query for mobile devices
$yoga_studio_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_single_breadcrumb_setting == 'off' || $mobile_single_breadcrumb_setting == 'off') {
    $yoga_studio_custom_style .= '.single_breadcrumb { display: none; }';
}
$yoga_studio_custom_style .= '}';

// woocommerce breadcrumb
$mobile_woo_breadcrumb_setting = get_option('yoga_studio_woocommerce_enable_breadcrumb_mobile', '1');
$main_woo_breadcrumb_setting = get_option('yoga_studio_woocommerce_enable_breadcrumb', '1');

$yoga_studio_custom_style .= '.woocommerce-breadcrumb {';

if ($main_woo_breadcrumb_setting == 'off') {
    $yoga_studio_custom_style .= 'display: none;';
}

$yoga_studio_custom_style .= '}';

// Add media query for mobile devices
$yoga_studio_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_woo_breadcrumb_setting == 'off' || $mobile_woo_breadcrumb_setting == 'off') {
    $yoga_studio_custom_style .= '.woocommerce-breadcrumb { display: none; }';
}
$yoga_studio_custom_style .= '}';


//colors
$color = get_theme_mod('yoga_studio_primary_color', '#00ad8d');
$color_heading = get_theme_mod('yoga_studio_heading_color', '#14211b');
$color_text = get_theme_mod('yoga_studio_text_color', '#697871');
$color_fade = get_theme_mod('yoga_studio_primary_fade', '#f1fffc');
$color_footer_bg = get_theme_mod('yoga_studio_footer_bg', '#14211b');
$color_post_bg = get_theme_mod('yoga_studio_post_bg', '#ffffff');


$yoga_studio_custom_style .= ":root {";
    $yoga_studio_custom_style .= "--theme-primary-color: {$color};";
    $yoga_studio_custom_style .= "--theme-heading-color: {$color_heading};";
    $yoga_studio_custom_style .= "--theme-text-color: {$color_text};";
    $yoga_studio_custom_style .= "--theme-primary-fade: {$color_fade};";
    $yoga_studio_custom_style .= "--theme-footer-color: {$color_footer_bg};";
    $yoga_studio_custom_style .= "--post-bg-color: {$color_post_bg};";
$yoga_studio_custom_style .= "}";


$yoga_studio_slider_opacity = get_theme_mod( 'yoga_studio_slider_opacity','1');

if($yoga_studio_slider_opacity == '0'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 0';
$yoga_studio_custom_style .='}';

}else if($yoga_studio_slider_opacity == '0.1'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 0.1';
$yoga_studio_custom_style .='}';

}else if($yoga_studio_slider_opacity == '0.2'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 0.2';
$yoga_studio_custom_style .='}';

}else if($yoga_studio_slider_opacity == '0.3'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 0.3';
$yoga_studio_custom_style .='}';

}else if($yoga_studio_slider_opacity == '0.4'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 0.4';
$yoga_studio_custom_style .='}';

}else if($yoga_studio_slider_opacity == '0.5'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 0.5';
$yoga_studio_custom_style .='}';

}else if($yoga_studio_slider_opacity == '0.6'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 0.6';
$yoga_studio_custom_style .='}';

}else if($yoga_studio_slider_opacity == '0.7'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 0.7';
$yoga_studio_custom_style .='}';


}else if($yoga_studio_slider_opacity == '0.8'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 0.8';
$yoga_studio_custom_style .='}';

$yoga_studio_custom_style .='@media screen and (max-width: 767px){';
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img{';
    $yoga_studio_custom_style .='opacity: 0.5';
$yoga_studio_custom_style .='} }';

}
else if($yoga_studio_slider_opacity == '0.9'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 0.9';
$yoga_studio_custom_style .='}';

$yoga_studio_custom_style .='@media screen and (max-width: 767px){';
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img{';
    $yoga_studio_custom_style .='opacity: 0.5';
$yoga_studio_custom_style .='} }';

}
else if($yoga_studio_slider_opacity == '1'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 1';
$yoga_studio_custom_style .='}';

$yoga_studio_custom_style .='@media screen and (max-width: 767px){';
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img{';
    $yoga_studio_custom_style .='opacity: 0.5';
$yoga_studio_custom_style .='} }';

}
