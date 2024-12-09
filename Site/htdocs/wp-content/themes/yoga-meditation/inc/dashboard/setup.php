<?php //to use wp udpate plugin
wp_enqueue_script( 'updates' ); ?>

<div class="theme-offer">
  <?php 
  if(isset($_GET['import-demo'])){
    $home_id=''; $blog_id=''; $page_id=''; $about_id='';


    // Function to check if a page with a specific title exists
    function page_exists_by_title($title) {
      $page_query = new WP_Query(array(
          'post_type'   => 'page',
          'title'       => $title,
          'post_status' => 'publish',
          'numberposts' => 1
      ));
      
      if ($page_query->have_posts()) {
          // Return the ID of the first matching page
          $page = $page_query->posts[0];
          return $page->ID;
      }
    
      return false; // Return false if no page found
    }

    //Homepage
    $home_title = 'Home';
    if (!page_exists_by_title($home_title)) {
      $home_content = '';
      $home = array(
        'post_type'    => 'page',
        'post_title'   => $home_title,
        'post_content' => $home_content,
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_name'    => 'home'
      );

      $home_id = wp_insert_post($home);
      
      // Set the home page template
      add_post_meta($home_id, '_wp_page_template', 'page-template/custom-home-page.php');
      
      // Set the static front page
      update_option('page_on_front', $home_id);
      update_option('show_on_front', 'page');

    }else {
      // Get the ID of the existing page
      $home_id = page_exists_by_title($home_title);

      // Set the home page template
      add_post_meta($home_id, '_wp_page_template', 'page-template/custom-home-page.php');
      
      // Set the static front page
      update_option('page_on_front', $home_id);
      update_option('show_on_front', 'page');
    }
    


    // Create a Page if it doesn't exist
    if ( !page_exists_by_title('Page') ) {
      $page_title = 'Page';
      $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel';

      $ot_page = array(
        'post_type'     => 'page',
        'post_title'    => $page_title,
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_name'     => 'page'
      );
      $page_id = wp_insert_post($ot_page);
    }else {
      // Get the ID of the existing page
      $ot_page = page_exists_by_title('Page');
    }

    if ( !page_exists_by_title('Page Left Sidebar') ) {
      $page_title = 'Page Left Sidebar';
      $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semelTe obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel.Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel.';

      $ot_page = array(
        'post_type'     => 'page',
        'post_title'    => $page_title,
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_name'     => 'page-left'
      );
      $page_id = wp_insert_post($ot_page);

      // Set the page template
      add_post_meta($page_id, '_wp_page_template', 'page-template/left-sidebar.php');
    }else {
      // Get the ID of the existing page
      $ot_page = page_exists_by_title('Page Left Sidebar');
    }

    if ( !page_exists_by_title('Page Right Sidebar') ) {
      $page_title = 'Page Right Sidebar';
      $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semelTe obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel.Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel.';

      $ot_page = array(
        'post_type'     => 'page',
        'post_title'    => $page_title,
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_name'     => 'page-right'
      );
      $page_id = wp_insert_post($ot_page);

      // Set the page template
      add_post_meta($page_id, '_wp_page_template', 'page-template/right-sidebar.php');
    }else {
      // Get the ID of the existing page
      $ot_page = page_exists_by_title('Page Right Sidebar');
    }

    // ------- Create Left Menu --------
    $menuname =  'Main Menu';
    $bpmenulocation = 'primary';
    $menu_exists = wp_get_nav_menu_object( $menuname );

    if (!$menu_exists) {
      // Create the menu
      $menu_id = wp_create_nav_menu($menuname);

      // Add the HOME item
      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'  => __('Home', 'yoga-meditation'),
          'menu-item-classes' => 'home',
          'menu-item-url'     => home_url('/'),
          'menu-item-status'  => 'publish'
      ));

      // Add the PAGE item
      $parent_page_item_id = wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'  => __('Pages', 'yoga-meditation'),
          'menu-item-classes' => 'page',
          'menu-item-url'     => home_url('/index.php/page/'),
          'menu-item-status'  => 'publish'
      ));

      // Add the Page Left Sidebar item as a child of PAGE
      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'   => __('Page Left Sidebar', 'yoga-meditation'),
          'menu-item-classes' => 'page-left',
          'menu-item-url'     => home_url('/index.php/page-left/'),
          'menu-item-status'  => 'publish',
          'menu-item-parent-id' => $parent_page_item_id
      ));

      // Add the Page Right Sidebar item as a child of PAGE
      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'   => __('Page Right Sidebar', 'yoga-meditation'),
          'menu-item-classes' => 'page-right',
          'menu-item-url'     => home_url('/index.php/page-right/'),
          'menu-item-status'  => 'publish',
          'menu-item-parent-id' => $parent_page_item_id
      ));

      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'  => __('About Us', 'yoga-meditation'),
          'menu-item-classes' => 'aboutus',
          'menu-item-url'     => '#',
          'menu-item-status'  => 'publish'
      ));

      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'  => __('Classes', 'yoga-meditation'),
          'menu-item-classes' => 'classes',
          'menu-item-url'     => '#',
          'menu-item-status'  => 'publish'
      ));

      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'  => __('Trainers', 'yoga-meditation'),
          'menu-item-classes' => 'trainers',
          'menu-item-url'     => '#',
          'menu-item-status'  => 'publish'
      ));
      
      // Assign the menu to the desired location if not already assigned
      if (!has_nav_menu($bpmenulocation)) {
          $locations = get_theme_mod('nav_menu_locations');
          $locations[$bpmenulocation] = $menu_id;
          set_theme_mod('nav_menu_locations', $locations);
      }
    }
       
    // --------Header------------------------

    set_theme_mod( 'yoga_meditation_email', 'support@example.com' ); 

    set_theme_mod( 'yoga_studio_phone', '+123-456-78-09' ); 

    set_theme_mod( 'yoga_studio_address', '1810 Way King Street,5th Avenue Miami' ); 

    set_theme_mod( 'yoga_studio_button_link', '#' );

    set_theme_mod( 'yoga_studio_button_text', 'Enquiry' );

    // --------Header------------------------

    set_theme_mod( 'yoga_studio_twitter', 'https://www.twitter.com/' );

    set_theme_mod( 'yoga_studio_linkedin', 'https://www.linkedin.com/' );

    set_theme_mod( 'yoga_studio_youtube', 'https://www.youtube.com/' );

    set_theme_mod( 'yoga_studio_instagram', 'https://www.instagram.com/' );

    set_theme_mod( 'yoga_studio_facebook', 'https://www.facebook.com/' );

    //-------------- Slider-----------------------

    set_theme_mod( 'yoga_studio_post_setting', '4' );

    $slider_category = wp_create_category('Slider'); 

    for($i=1;$i<=4;$i++){

      $title = '"Yoga is the journey of the self, through the self, to the self."';
      $content = 'Etiam rhoncus. Maecenas tempus,telluseget condimenttum rhoncus,sem quam semper libero,sit amet adipiscing sem neque sed ipsum consectetuer adipiscing elit';

      // Create post object
      $my_post = array(
       'post_title'    => wp_strip_all_tags( $title ),
       'post_content'  => $content,
       'post_status'   => 'publish',
       'post_type'     => 'post',
       'post_category' => array($slider_category) 
      );

      $slider_post_id = wp_insert_post($my_post);

    }

    set_theme_mod( 'yoga_studio_post_setting', 'Slider' );

    //-------------- Service-----------------------

    set_theme_mod( 'yoga_studio_services_section_title', 'OUR SERVICES' ); 

    set_theme_mod( 'yoga_studio_services_section_text', 'Choose What You Want' ); 

    $service_category = wp_create_category('Our Services'); 

    $service_title=array('Vinyasa Yoga','Basic Yoga','Meditation Yoga');

    set_theme_mod( 'yoga_studio_service_count', '3' );

    for($i=1;$i<=3;$i++){

      $title = $service_title[$i-1];
      $content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';

      // Create post object
      $my_post = array(
       'post_title'    => wp_strip_all_tags( $title ),
       'post_content'  => $content,
       'post_status'   => 'publish',
       'post_type'     => 'post',
       'post_category' => array($service_category) 
      );

      $service_post_id = wp_insert_post($my_post);

    }

    set_theme_mod( 'yoga_studio_category_setting', 'Our Services' );

    //-------------- About-----------------------

    $about_title = 'ABOUT US';
    $about_content = 'Modern yoga consists of a range of techniques including asanas (postures) and meditation derived from some of the philosophies, teachings and practices of the Yoga school, which is one of the six schools of traditional Hindu philosophies, and organised into a wide variety of schools and denominations. It has been described by Elizabeth de Michelis as having four types, namely: Modern Psych osomatic Yoga, as in The Yoga Institute. which is one of the six schools of traditional Hindu philosophies, and organised into a wide variety of schools and denominations.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).';

    // Create post object
    $about_post = array(
     'post_title'    => wp_strip_all_tags( $about_title ),
     'post_content'  => $about_content,
     'post_status'   => 'publish',
     'post_type'     => 'post',
    );

    $about_post_id = wp_insert_post($about_post);

    // Set theme mod for each post created
    set_theme_mod('yoga_meditation_about_post_setting', $about_post_id);

  } ?>
    
  <p class="note"><?php esc_html_e("If your website is already live and containing data, please make a backup.This importer will override the Yoga Meditation's new customizable values.",'yoga-meditation'); ?></p>
  <form id="mep-demo-importer-form" action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=yoga-studio-guide-page" method="POST">
    <input type="submit" name="submit" value="<?php echo esc_attr( __('Begin With Demo Import', 'yoga-meditation') ); ?>" class="button button-primary button-large">
    <a href="<?php echo esc_url(home_url('/')); ?>" target="_blank" class="button button-primary button-large"><?php esc_html_e('View Site','yoga-meditation'); ?></a>
  </form>
  <div class="mep-spinner-div"><p class="spinner"></p></div>
  <div class="success">
    <?php if (isset($_GET['import-demo'])) {
       echo esc_html(__('Demo Import Successful', 'yoga-meditation'));
    } ?>
  </div>
  <?php $admin_url = admin_url( 'admin-ajax.php' ); ?>

  <script type="text/javascript">
    function validate() {
      document.forms[0].submit();
    }
    jQuery(document).ready(function($) {
      var pathUrl = new URL(window.location.href)
      var searchParams = pathUrl.searchParams.get("import-demo")
      if(searchParams) {
        history.replaceState({}, '', 'themes.php?page=yoga-studio-guide-page')
      }
      $( "#mep-demo-importer-form" ).submit(function( event ) {
        event.preventDefault();
        if(confirm("Are you sure, you want to import demo content?")){
          $('.spinner').addClass('is-active');
          location.href = location.href + '&import-demo=true';
        } else {
          return false;
        }
      });
    });
  </script>
</div>