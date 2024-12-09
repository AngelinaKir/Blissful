<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  <?php if( get_option('yoga_studio_slider_arrows', false) !== 'off'){ ?>
    <section id="slider" class="p-md-5 p-4">
      <span class="design-right"></span>
      <div class="owl-carousel">
        <?php
          $yoga_studio_slider_category=  get_theme_mod('yoga_studio_post_setting');if($yoga_studio_slider_category){
          $yoga_studio_page_query = new WP_Query(array( 

              'category_name' => esc_html($yoga_studio_slider_category ,'yoga-studio'),

              'posts_per_page' => get_theme_mod('yoga_studio_slider_count')

            ));?>
            <?php while( $yoga_studio_page_query->have_posts() ) : $yoga_studio_page_query->the_post(); ?>
              <div class="container-md">
                <div class="slide-box">
                  <div class="row">
                     <div class="col-lg-6 col-md-6 col-12 slide-content">
                      <div class="slide-inner-box slider-inner">
                        <h2><?php the_title();?></h2>
                      <?php if( get_option('yoga_studio_slider_excerpt_show_hide',false) != 'off'){ ?>
                        <p class="slider-excerpt mb-0"><?php echo wp_trim_words(get_the_content(), get_theme_mod('yoga_studio_slider_excerpt_count',20) );?></p>
                      <?php } ?>
                      <div class="home-btn my-4">
                        <a class="py-sm-3 px-sm-4 py-2 px-3" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('yoga_studio_slider_read_more',__('Register Now','yoga-studio'))); ?></a>
                      </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 image-content">
                      <?php if(has_post_thumbnail()){ ?>
                        <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                      <?php }else{?>
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/slider.jpg" alt="" />
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile;
          wp_reset_postdata();
        }?>
      </div>
      <span class="design-left"></span>
    </section>
  <?php }?>

  <?php if( get_option('yoga_studio_services_enable', false) !== 'off'){ ?>
    <?php if( get_theme_mod('yoga_studio_services_section_title') != '' || get_theme_mod('yoga_studio_services_section_text') != '' || get_theme_mod('yoga_studio_category_setting') != ''){ ?>
      <section id="services-box" class="py-5">
        <span class="design-right"></span>
        <div class="container">
          <h3 class="text-center mb-2"><?php echo esc_html( get_theme_mod( 'yoga_studio_services_section_title','') ); ?></h3><span class="heading-bg"></span>
          <p class="text-center mb-5"><?php echo esc_html( get_theme_mod( 'yoga_studio_services_section_text','') ); ?></p>
          <div class="row">
            <?php
              $yoga_studio_services_category=  get_theme_mod('yoga_studio_category_setting');if($yoga_studio_services_category){
              $yoga_studio_page_query = new WP_Query(array( 

              'category_name' => esc_html($yoga_studio_services_category ,'yoga-studio'),

              'posts_per_page' => get_theme_mod('yoga_studio_service_count')

            ));?>
                <?php while( $yoga_studio_page_query->have_posts() ) : $yoga_studio_page_query->the_post(); ?>  
                  <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="box mb-lg-5 mb-3 text-center">
                      <div class="img-box mb-3 wow swing" data-wow-duration="2s">
                        <?php if(has_post_thumbnail()){ ?>
                          <?php the_post_thumbnail(); ?>
                        <?php }else{?>
                          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/service.jpg" alt="" />
                        <?php } ?>
                      </div>
                      <a href="<?php the_permalink(); ?>"><h4><?php the_title();?></h4></a>
                    </div>
                  </div>
                <?php endwhile;
              wp_reset_postdata();
            }?>
          </div>
        </div>
      </section>
    <?php }?>
  <?php } ?>
  <section id="custom-page-content" <?php if ( have_posts() && trim( get_the_content() ) !== '' ) echo 'class="pt-3"'; ?>>
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>