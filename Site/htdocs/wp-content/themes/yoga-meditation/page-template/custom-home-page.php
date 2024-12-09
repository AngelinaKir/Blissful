<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  <?php if( get_option('yoga_studio_slider_arrows', false) !== 'off'){ ?>
    <section id="slider">
      <div class="owl-carousel">
        <?php
        $yoga_studio_slider_category=  get_theme_mod('yoga_studio_post_setting');if($yoga_studio_slider_category){
        $yoga_studio_page_query = new WP_Query(array( 

              'category_name' => esc_html($yoga_studio_slider_category ,'yoga-meditation'),

              'posts_per_page' => get_theme_mod('yoga_studio_slider_count')

            ));?>
          <?php while( $yoga_studio_page_query->have_posts() ) : $yoga_studio_page_query->the_post(); ?>
            <div class="slide-box">
              <?php if(has_post_thumbnail()){ ?>
                <img src="<?php the_post_thumbnail_url('full'); ?>"/>
              <?php }else{?>
                <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/slider.jpg" alt="" />
              <?php } ?>
              <div class="slide-inner-box slider-inner">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        }?>
      </div>
    </section>
  <?php }?>
  <?php if( get_option('yoga_studio_services_enable', false) !== 'off'){ ?>
    <?php if( get_theme_mod('yoga_studio_services_section_title') != '' || get_theme_mod('yoga_studio_services_section_text') != '' || get_theme_mod('yoga_studio_category_setting') != ''){ ?>
      <section id="services-box" class="pt-5">
        <div class="container">
          <h3 class="text-center mb-2"><?php echo esc_html( get_theme_mod( 'yoga_studio_services_section_title','') ); ?></h3>
          <p class="text-center mb-5"><?php echo esc_html( get_theme_mod( 'yoga_studio_services_section_text','') ); ?></p>
          <div class="row">
            <?php
              $yoga_studio_services_category=  get_theme_mod('yoga_studio_category_setting');if($yoga_studio_services_category){
              $yoga_studio_page_query = new WP_Query(array( 

              'category_name' => esc_html($yoga_studio_services_category ,'yoga-meditation'),

              'posts_per_page' => get_theme_mod('yoga_studio_service_count')

            ));?>
                <?php while( $yoga_studio_page_query->have_posts() ) : $yoga_studio_page_query->the_post(); ?>  
                  <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="box mb-lg-5 mb-3 text-center wow swing" data-wow-duration="2s">
                      <div class="img-box mb-3">
                        <?php if(has_post_thumbnail()){ ?>
                          <?php the_post_thumbnail(); ?>
                        <?php }else{?>
                          <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/service.jpg" alt="" />
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
  <?php }?>
  <?php if( get_option('yoga_meditation_about_enable', false) !== 'off'){ ?>
    <?php if( get_theme_mod('yoga_meditation_about_post_setting') != '' ){ ?>
      <div class="about-box py-5 text-center text-md-start">
        <div class="container">
          <div class="row">
            <?php
              $yoga_meditation_mod =  get_theme_mod( 'yoga_meditation_about_post_setting');
              if ( 'page-none-selected' != $yoga_meditation_mod ) {
                $yoga_meditation_about_post[] = $yoga_meditation_mod;
              }
              if( !empty($yoga_meditation_about_post) ) :
              $yoga_meditation_args = array(
                'post_type' =>array('post'),
                'post__in' => $yoga_meditation_about_post,
                'ignore_sticky_posts'  => true, // Exclude sticky posts by default
              );

              // Check if specific posts are selected
              if (empty($yoga_meditation_about_post) && is_sticky()) {
                  $yoga_meditation_args['post__in'] = get_option('sticky_posts');
              }
              $yoga_meditation_query = new WP_Query( $yoga_meditation_args );
              if ( $yoga_meditation_query->have_posts() ) :
            ?>
            <?php  while ( $yoga_meditation_query->have_posts() ) : $yoga_meditation_query->the_post(); ?>            
              <div class="col-lg-7 col-md-7 align-self-center wow slideInLeft">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                <p><?php echo wp_trim_words( get_the_content(),100 );?></p>
              </div>
              <div class="col-lg-5 col-md-5 align-self-center wow slideInRight ps-md-5">
                <?php if(has_post_thumbnail()){ ?>
                  <img src="<?php esc_attr(the_post_thumbnail_url('full')); ?>"/>
                <?php }else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/slider.jpg" alt="" />
                <?php } ?>
              </div>
            <?php endwhile;
            wp_reset_postdata();?>
              <?php else : ?>
              <div class="no-postfound"></div>
              <?php endif;
            endif;?>
          </div>
        </div>
      </div>
    <?php }?>
  <?php }?>
  <section id="custom-page-content" <?php if ( have_posts() && trim( get_the_content() ) !== '' ) echo 'class="pt-3"'; ?>>
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>