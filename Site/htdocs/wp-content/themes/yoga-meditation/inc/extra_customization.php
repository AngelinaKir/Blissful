<?php 

	$yoga_studio_custom_style= "";

//Slider-content-alignment

$yoga_meditation_slider_content_alignment = get_theme_mod( 'yoga_meditation_slider_content_alignment','CENTER-ALIGN');

if($yoga_meditation_slider_content_alignment == 'LEFT-ALIGN'){

$yoga_studio_custom_style .='#slider .slide-inner-box{';

	$yoga_studio_custom_style .='text-align:left; right: 50%; left: 15%;';

$yoga_studio_custom_style .='}';

}else if($yoga_meditation_slider_content_alignment == 'CENTER-ALIGN'){

$yoga_studio_custom_style .='#slider .slide-inner-box{';

	$yoga_studio_custom_style .='text-align:center; right: 25%; left: 25%;';

$yoga_studio_custom_style .='}';


}else if($yoga_meditation_slider_content_alignment == 'RIGHT-ALIGN'){

$yoga_studio_custom_style .='#slider .slide-inner-box{';

	$yoga_studio_custom_style .='text-align:right; right: 15%; left: 50%;';

$yoga_studio_custom_style .='}';

}
	
// sticky header
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

//colors
$color = get_theme_mod('yoga_meditation_primary_color', '#db4242');
$color_heading = get_theme_mod('yoga_meditation_heading_color', '#412236');
$color_fade = get_theme_mod('yoga_meditation_primary_fade', '#ffe3e3');
$color_footer_bg = get_theme_mod('yoga_meditation_footer_bg', '#412236');


$yoga_studio_custom_style .= ":root {";
    $yoga_studio_custom_style .= "--theme-primary-color: {$color};";
    $yoga_studio_custom_style .= "--theme-heading-color: {$color_heading};";
    $yoga_studio_custom_style .= "--theme-primary-fade: {$color_fade};";
    $yoga_studio_custom_style .= "--theme-footer-color: {$color_footer_bg};";
$yoga_studio_custom_style .= "}";

$yoga_meditation_slider_opacity = get_theme_mod( 'yoga_meditation_slider_opacity','0.4');

if($yoga_meditation_slider_opacity == '0'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 0';
$yoga_studio_custom_style .='}';

}else if($yoga_meditation_slider_opacity == '0.1'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 0.1';
$yoga_studio_custom_style .='}';

}else if($yoga_meditation_slider_opacity == '0.2'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 0.2';
$yoga_studio_custom_style .='}';

}else if($yoga_meditation_slider_opacity == '0.3'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 0.3';
$yoga_studio_custom_style .='}';

}else if($yoga_meditation_slider_opacity == '0.4'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 0.4';
$yoga_studio_custom_style .='}';

}else if($yoga_meditation_slider_opacity == '0.5'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 0.5';
$yoga_studio_custom_style .='}';

}else if($yoga_meditation_slider_opacity == '0.6'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 0.6';
$yoga_studio_custom_style .='}';

}else if($yoga_meditation_slider_opacity == '0.7'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 0.7';
$yoga_studio_custom_style .='}';

}else if($yoga_meditation_slider_opacity == '0.8'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 0.8';
$yoga_studio_custom_style .='}';

}
else if($yoga_meditation_slider_opacity == '0.9'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 0.9';
$yoga_studio_custom_style .='}';

}
else if($yoga_meditation_slider_opacity == '1'){
$yoga_studio_custom_style .='#slider .owl-carousel .owl-item img {';
    $yoga_studio_custom_style .='opacity: 1';
$yoga_studio_custom_style .='}';

}