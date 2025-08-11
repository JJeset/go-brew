<?php

/**
 * go-brew functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package go-brew
 */

if (! defined('_S_VERSION')) {
  // Replace the version number of the theme on each release.
  define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function go_brew_setup()
{
  /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on go-brew, use a find and replace
		* to change 'go-brew' to the name of your theme in all the template files.
		*/
  load_theme_textdomain('go-brew', get_template_directory() . '/languages');

  // Add default posts and comments RSS feed links to head.
  add_theme_support('automatic-feed-links');

  /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
  add_theme_support('title-tag');

  /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
  add_theme_support('post-thumbnails');

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus(
    array(
      'nav-menu-head' => esc_html__('Primary', 'go-brew'),
    )
  );

  /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script',
    )
  );

  // Set up the WordPress core custom background feature.
  add_theme_support(
    'custom-background',
    apply_filters(
      'go_brew_custom_background_args',
      array(
        'default-color' => 'ffffff',
        'default-image' => '',
      )
    )
  );

  // Add theme support for selective refresh for widgets.
  add_theme_support('customize-selective-refresh-widgets');

  /**
   * Add support for core custom logo.
   *
   * @link https://codex.wordpress.org/Theme_Logo
   */
  add_theme_support(
    'custom-logo',
    array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    )
  );
}
add_action('after_setup_theme', 'go_brew_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function go_brew_content_width()
{
  $GLOBALS['content_width'] = apply_filters('go_brew_content_width', 640);
}
add_action('after_setup_theme', 'go_brew_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function go_brew_widgets_init()
{
  register_sidebar(
    array(
      'name'          => esc_html__('Sidebar', 'go-brew'),
      'id'            => 'sidebar-1',
      'description'   => esc_html__('Add widgets here.', 'go-brew'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
}
add_action('widgets_init', 'go_brew_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function go_brew_scripts()
{
  wp_enqueue_style('go-brew-style', get_stylesheet_uri(), array(), _S_VERSION);
  wp_style_add_data('go-brew-style', 'rtl', 'replace');

  wp_enqueue_script('go-brew-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'go_brew_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}


//footer



/**
 * Footer related functions for WordPress theme
 * Add this code to your theme's functions.php file
 */

// Enqueue footer styles
function enqueue_footer_styles()
{
  wp_enqueue_style(
    'footer-styles',
    get_template_directory_uri() . '/assets/css/footer-styles.css',
    array(),
    '1.0.0',
    'all'
  );
}
add_action('wp_enqueue_scripts', 'enqueue_footer_styles');

// Register footer menu
function register_footer_menus()
{
  register_nav_menus(array(
    'footer-menu' => __('Footer Menu', 'textdomain'),
    'footer-legal' => __('Footer Legal Links', 'textdomain'),
  ));
}
add_action('init', 'register_footer_menus');

// Footer customizer options
function footer_customize_register($wp_customize)
{

  // Footer Section
  $wp_customize->add_section('footer_section', array(
    'title' => __('Footer Settings', 'textdomain'),
    'priority' => 120,
  ));

  // Legal Address
  $wp_customize->add_setting('footer_legal_address', array(
    'default' => '678370, Россия, Москва, улица Проспект Мира 53 строение 1, подъезд 1',
    'sanitize_callback' => 'sanitize_textarea_field',
  ));

  $wp_customize->add_control('footer_legal_address', array(
    'label' => __('Legal Address', 'textdomain'),
    'section' => 'footer_section',
    'type' => 'textarea',
  ));

  // Physical Address
  $wp_customize->add_setting('footer_physical_address', array(
    'default' => 'Москва, улица Проспект Мира 53 строение 1, подъезд 1',
    'sanitize_callback' => 'sanitize_textarea_field',
  ));

  $wp_customize->add_control('footer_physical_address', array(
    'label' => __('Physical Address', 'textdomain'),
    'section' => 'footer_section',
    'type' => 'textarea',
  ));

  // OGRN
  $wp_customize->add_setting('footer_ogrn', array(
    'default' => '1061435052007',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('footer_ogrn', array(
    'label' => __('OGRN', 'textdomain'),
    'section' => 'footer_section',
    'type' => 'text',
  ));

  // INN
  $wp_customize->add_setting('footer_inn', array(
    'default' => '1435176805',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('footer_inn', array(
    'label' => __('INN', 'textdomain'),
    'section' => 'footer_section',
    'type' => 'text',
  ));

  // Social Media Links
  $social_networks = array(
    'instagram' => 'Instagram',
    'telegram' => 'Telegram',
  );

  foreach ($social_networks as $network => $label) {
    $wp_customize->add_setting("footer_social_{$network}", array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control("footer_social_{$network}", array(
      'label' => sprintf(__('%s URL', 'textdomain'), $label),
      'section' => 'footer_section',
      'type' => 'url',
    ));
  }
}
add_action('customize_register', 'footer_customize_register');

// Get footer navigation menu
function get_footer_nav_menu()
{
  $menu_items = array(
    array('title' => __('Главная', 'textdomain'), 'url' => home_url()),
    array('title' => __('Каталог', 'textdomain'), 'url' => home_url('/catalog/')),
    array('title' => __('О нас', 'textdomain'), 'url' => home_url('/about/')),
    array('title' => __('Блог', 'textdomain'), 'url' => home_url('/blog/')),
    array('title' => __('Контакты', 'textdomain'), 'url' => home_url('/contacts/')),
  );

  return apply_filters('footer_nav_menu_items', $menu_items);
}

// Get footer legal links
function get_footer_legal_links()
{
  $legal_links = array(
    array(
      'title' => __('Согласие на обработку персональных данных', 'textdomain'),
      'url' => home_url('/privacy-policy/')
    ),
    array(
      'title' => __('Пользовательское соглашение', 'textdomain'),
      'url' => home_url('/terms/')
    ),
    array(
      'title' => __('Политика обработки персональных данных', 'textdomain'),
      'url' => home_url('/privacy/')
    ),
  );

  return apply_filters('footer_legal_links', $legal_links);
}

// Footer shortcode for flexible usage
function footer_info_shortcode($atts)
{
  $atts = shortcode_atts(array(
    'type' => 'legal_address',
  ), $atts);

  switch ($atts['type']) {
    case 'legal_address':
      return get_theme_mod('footer_legal_address', '678370, Россия, Москва, улица Проспект Мира 53 строение 1, подъезд 1');
    case 'physical_address':
      return get_theme_mod('footer_physical_address', 'Москва, улица Проспект Мира 53 строение 1, подъезд 1');
    case 'ogrn':
      return get_theme_mod('footer_ogrn', '1061435052007');
    case 'inn':
      return get_theme_mod('footer_inn', '1435176805');
    default:
      return '';
  }
}
add_shortcode('footer_info', 'footer_info_shortcode');

// Add body class for footer styling
function add_footer_body_class($classes)
{
  $classes[] = 'has-footer';
  return $classes;
}
add_filter('body_class', 'add_footer_body_class');



// swiper

function enqueue_swiper_scripts()
{

  wp_enqueue_script('go-brew-main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true);

  wp_enqueue_style('swiper-style', 'https://unpkg.com/swiper/swiper-bundle.min.css');


  wp_enqueue_script('swiper-script', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);


  wp_add_inline_script('swiper-script', '
        document.addEventListener("DOMContentLoaded", function() {
            var swiper = new Swiper(".partners_swiper", {
                slidesPerView: 4,
                spaceBetween: 10,
                loop: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                breakpoints: {
                    0: {
                        slidesPerView: 2,
                        spaceBetween: 5
                    },
                    920: {
                        slidesPerView: 3,
                        spaceBetween: 10
                    },
                    1200: {
                        slidesPerView: 4,
                        spaceBetween: 10
                    }
                }
            });
        });
    ');
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_scripts');
