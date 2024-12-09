<?php
/**
 * The header for our theme
 *
 * @subpackage Yoga Studio
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}
?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'yoga-studio' ); ?></a>
	<?php if( get_option('yoga_studio_theme_loader',true) != 'off'){ ?>
		<?php $yoga_studio_loader_option = get_theme_mod( 'yoga_studio_loader_style','style_one');
		if($yoga_studio_loader_option == 'style_one'){ ?>
			<div id="preloader" class="circle">
				<div id="loader"></div>
			</div>
		<?php }
		else if($yoga_studio_loader_option == 'style_two'){ ?>
			<div id="preloader">
				<div class="spinner">
					<div class="rect1"></div>
					<div class="rect2"></div>
					<div class="rect3"></div>
					<div class="rect4"></div>
					<div class="rect5"></div>
				</div>
			</div>
		<?php }?>
	<?php }?>
	<div id="page" class="site">
		<div id="header">
			<div class="wrap_figure">
				<div class="top_bar py-2 text-center text-lg-start text-md-start wow slideInDown">
					<div class="container">
						<div class="row">
							<div class="col-lg-10 col-md-9 align-self-center yoga-contact">
								<?php if( get_theme_mod('yoga_studio_top_text') != '' ){ ?>
									<span><?php echo esc_html(get_theme_mod('yoga_studio_top_text','')); ?></span>
								<?php }?>
								<?php if( get_theme_mod('yoga_studio_phone') != ''){ ?>
									<span class="ms-md-4 yoga-call"><strong><?php esc_html_e('Call Us : ','yoga-studio'); ?></strong><?php echo esc_html(get_theme_mod('yoga_studio_phone','')); ?></span>
								<?php }?>
								<?php if( get_theme_mod('yoga_studio_address') != ''){ ?>
									<span class="ms-md-4 yoga-add"><strong><?php esc_html_e('Address : ','yoga-studio'); ?></strong><?php echo esc_html(get_theme_mod('yoga_studio_address','')); ?></span>
								<?php }?>
							</div>
							<div class="col-lg-2 col-md-3 align-self-center">
							 	<?php
						            $yoga_studio_header_twt_target = esc_attr(get_option('yoga_studio_header_twt_target','true'));
						            $yoga_studio_header_linkedin_target = esc_attr(get_option('yoga_studio_header_linkedin_target','true'));
						            $yoga_studio_header_youtube_target = esc_attr(get_option('yoga_studio_header_youtube_target','true'));
						            $yoga_studio_header_instagram_target = esc_attr(get_option('yoga_studio_header_instagram_target','true'));
						            $yoga_studio_header_fb_target = esc_attr(get_option('yoga_studio_header_fb_target','true'));
						         ?>
						         <?php if( get_option('yoga_studio_social_enable',false) != 'off'){ ?>
						          <div class="links text-center text-lg-end text-md-end">
									<?php if( get_theme_mod('yoga_studio_twitter') != ''){ ?>
						            <a target="<?php echo $yoga_studio_header_twt_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('yoga_studio_twitter','')); ?>">
						              <i class="<?php echo esc_attr(get_theme_mod('yoga_studio_twitter_icon','fab fa-x-twitter')); ?>"></i>
						            </a>
						          <?php }?>
						          <?php if( get_theme_mod('yoga_studio_linkedin') != ''){ ?>
						            <a target="<?php echo $yoga_studio_header_linkedin_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('yoga_studio_linkedin','')); ?>">
						              <i class="<?php echo esc_attr(get_theme_mod('yoga_studio_linkedin_icon','fab fa-linkedin-in')); ?>"></i>
						            </a>
						          <?php }?>
						          <?php if( get_theme_mod('yoga_studio_youtube') != ''){ ?>
						            <a target="<?php echo $yoga_studio_header_youtube_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('yoga_studio_youtube','')); ?>">
						              <i class="<?php echo esc_attr(get_theme_mod('yoga_studio_youtube_icon','fab fa-youtube')); ?>"></i>
						            </a>
						          <?php }?>
						          <?php if( get_theme_mod('yoga_studio_instagram') != ''){ ?>
						            <a target="<?php echo $yoga_studio_header_instagram_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('yoga_studio_instagram','')); ?>">
						              <i class="<?php echo esc_attr(get_theme_mod('yoga_studio_instagram_icon','fab fa-instagram')); ?>"></i>
						            </a>
						          <?php }?>
						          <?php if( get_theme_mod('yoga_studio_facebook') != ''){ ?>
						            <a target="<?php echo $yoga_studio_header_fb_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('yoga_studio_facebook','')); ?>">
						              <i class="<?php echo esc_attr(get_theme_mod('yoga_studio_fb_icon','fab fa-facebook')); ?>"></i>
						            </a>
						          <?php }?>
								</div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
				<div class="menu_header fixed_header py-3 wow slideInUp">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-4 col-sm-4 col-12 align-self-center">
								<div class="logo text-center text-md-start text-sm-start py-3 py-md-0">
							        <?php if ( has_custom_logo() ) : ?>
					            		<?php the_custom_logo(); ?>
						            <?php endif; ?>
					              	<?php $yoga_studio_blog_info = get_bloginfo( 'name' ); ?>
					              	<?php if( get_option('yoga_studio_logo_title',false) != 'off' ){ ?>
						                <?php if ( ! empty( $yoga_studio_blog_info ) ) : ?>
						                  	<?php if ( is_front_page() && is_home() ) : ?>
						                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						                  	<?php else : ?>
					                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					                  		<?php endif; ?>
						                <?php endif; ?>
						            <?php }?>
						                <?php
					                  		$yoga_studio_description = get_bloginfo( 'description', 'display' );
						                  	if ( $yoga_studio_description || is_customize_preview() ) :
						                ?>
						                <?php if( get_option('yoga_studio_logo_tagline_text',true) != 'off' ){ ?>
					                  	<p class="site-description">
					                    	<?php echo esc_html($yoga_studio_description); ?>
					                  	</p>
					                  	<?php }?>
					              	<?php endif; ?>
							    </div>
							</div>
							<div class="col-lg-6 col-md-2 col-sm-2 col-3 align-self-center">
									<div class="toggle-menu gb_menu text-center">
										<button onclick="yoga_studio_gb_Menu_open()" class="gb_toggle p-2"><i class="fas fa-ellipsis-h"></i><p class="mb-0"><?php esc_html_e('Menu','yoga-studio'); ?></p></button>
									</div>
				   				<?php get_template_part('template-parts/navigation/navigation'); ?>
				   			</div>
				   			<div class="col-lg-1 col-md-2 col-sm-2 col-3 align-self-center">
								<div class="header-search">
	              					<div class="header-search-wrapper">
						                <span class="search-main">
						                    <i class="search-icon fas fa-search"></i>
						                </span>
						                <span class="search-close-icon"><i class="fas fa-xmark"></i>
						                </span>
						                <div class="search-form-main clearfix">
						                  <?php get_search_form(); ?>
						                </div>
	              					</div>
	            				</div>
							</div>
							<div class="col-lg-2 col-md-4 col-sm-4 col-6 align-self-center">
								<?php if( get_theme_mod('yoga_studio_button_text') != '' || get_theme_mod('yoga_studio_button_link') != ''){ ?>
									<div class="top_btn">
										<a href="<?php echo esc_url(get_theme_mod('yoga_studio_button_link','')); ?>"><?php echo esc_html(get_theme_mod('yoga_studio_button_text','')); ?></a>
									</div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>