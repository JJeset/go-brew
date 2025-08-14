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

  // ресайз картинок
  add_image_size('custom-article-thumb', 253, 153, array('center', 'center'));
  add_image_size('large-article', 1920, 1080, false); // Для полностраничного отображения
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



function mytheme_breadcrumbs()
{
  // Ссылка на главную
  $home_link = esc_url(home_url('/'));
  $home_text = 'Главная';
  $blog_page_id = get_option('page_for_posts');
  $blog_link = get_permalink($blog_page_id);
  $blog_text = 'Блог';

  if (is_front_page()) {
    echo '<nav class="breadcrumbs" aria-label="Хлебные крошки">';
    echo '<a href="' . $home_link . '">' . esc_html($home_text) . '</a>';
    echo '</nav>';
    return;
  }

  if (is_home() && $blog_page_id) {
    echo '<nav class="breadcrumbs" aria-label="Хлебные крошки">';
    echo '<a href="' . $home_link . '">' . esc_html($home_text) . '</a>';
    echo ' &gt; ';
    echo '<span>' . esc_html($blog_text) . '</span>';
    echo '</nav>';
    return;
  }

  echo '<nav class="breadcrumbs" aria-label="Хлебные крошки">';
  echo '<a href="' . $home_link . '">' . esc_html($home_text) . '</a>';
  echo ' &gt; ';

  if (is_single() && get_post_type() === 'post') {
    echo '   <a href="' . $blog_link . '">' . esc_html($blog_text) . '</a> &gt; ';
    echo '<span>' . esc_html(get_the_title()) . '</span>';
  } elseif (is_singular()) {
    echo '<span>' . esc_html(get_the_title()) . '</span>';
  } elseif (is_archive()) {
    echo '<span>' . esc_html(get_the_archive_title()) . '</span>';
  } elseif (is_search()) {
    echo '<span>Результаты поиска: ' . esc_html(get_search_query()) . '</span>';
  } else {
    echo '<span>' . esc_html(wp_get_document_title()) . '</span>';
  }

  echo '</nav>';
}


// BLOG 

function enqueue_custom_articles_styles()
{
  wp_enqueue_style('custom-articles-style', get_template_directory_uri() . '/css/custom-articles.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_articles_styles');

// Шорткод для отображения статей
function custom_articles_grid_shortcode($atts)
{
  $atts = shortcode_atts(array(
    'posts_per_page' => 8,
    'category' => '',
    'show_load_more' => 'true',
    'columns' => 4
  ), $atts);

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => $atts['posts_per_page'],
    'post_status' => 'publish'
  );

  if (!empty($atts['category'])) {
    $args['category_name'] = $atts['category'];
  }

  $query = new WP_Query($args);

  if (!$query->have_posts()) {
    return '<p>Статьи не найдены.</p>';
  }

  ob_start();
?>



  <div class="custom-articles-grid columns-<?php echo esc_attr($atts['columns']); ?>">
    <?php while ($query->have_posts()) : $query->the_post(); ?>
      <div class="article-card">
        <div class="article-content">
          <div class="article-date">
            <?php echo get_the_date('j M Y'); ?>
          </div>
          <h3 class="article-title">
            <?php the_title(); ?>
          </h3>
          <div class="article-excerpt">
            <?php
            $excerpt = get_the_excerpt();
            echo wp_trim_words($excerpt, 11, '...');
            ?>
          </div>
          <div class="article-meta">
            <a href="<?php the_permalink(); ?>" class="read-more-btn">
              ЧИТАТЬ ПОДРОБНЕЕ
            </a>
          </div>
          <div class="article-image">
            <?php if (has_post_thumbnail()) : ?>
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('custom-article-thumb', array('class' => 'article-thumb')); ?>
              </a>
            <?php else : ?>
              <div class="no-image-placeholder">
                <img src="<?php echo get_template_directory_uri(); ?>/images/default-article.png" alt="<?php the_title(); ?>">
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>

  <?php if ($atts['show_load_more'] === 'true') : ?>
    <div class="load-more-container">
      <button class="load-more-btn button" data-page="1" data-max="<?php echo $query->max_num_pages; ?>">
        ПОКАЗАТЬ ЕЩЕ
      </button>
    </div>
  <?php endif; ?>



  <script>
    jQuery(document).ready(function($) {
      $('.load-more-btn').on('click', function() {
        var button = $(this);
        var page = button.data('page');
        var max = button.data('max');

        if (page >= max) {
          button.hide();
          return;
        }

        $.ajax({
          url: '<?php echo admin_url("admin-ajax.php"); ?>',
          type: 'POST',
          data: {
            action: 'load_more_articles',
            page: page + 1,
            posts_per_page: <?php echo $atts['posts_per_page']; ?>,
            category: '<?php echo $atts['category']; ?>'
          },
          success: function(response) {
            if (response) {
              $('.custom-articles-grid').append(response);
              button.data('page', page + 1);

              if (page + 1 >= max) {
                button.hide();
              }
            }
          }
        });
      });
    });
  </script>

  <?php
  wp_reset_postdata();
  return ob_get_clean();
}
add_shortcode('custom_articles_grid', 'custom_articles_grid_shortcode');

// AJAX обработчик для загрузки дополнительных статей
function load_more_articles()
{
  $page = $_POST['page'];
  $posts_per_page = $_POST['posts_per_page'];
  $category = $_POST['category'];

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => $posts_per_page,
    'paged' => $page,
    'post_status' => 'publish'
  );

  if (!empty($category)) {
    $args['category_name'] = $category;
  }

  $query = new WP_Query($args);

  if ($query->have_posts()) {
    while ($query->have_posts()) : $query->the_post();
  ?>
      <div class="article-card">
        <div class="article-content">
          <div class="article-date">
            <?php echo get_the_date('j M Y'); ?>
          </div>
          <h3 class="article-title">
            <?php the_title(); ?>
          </h3>
          <div class="article-excerpt">
            <?php
            $excerpt = get_the_excerpt();
            echo wp_trim_words($excerpt, 11, '...');
            ?>
          </div>
          <div class="article-meta">
            <a href="<?php the_permalink(); ?>" class="read-more-btn">
              ЧИТАТЬ ПОДРОБНЕЕ
            </a>
          </div>
          <div class="article-image">
            <?php if (has_post_thumbnail()) : ?>
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('custom-article-thumb', array('class' => 'article-thumb')); ?>
              </a>
            <?php else : ?>
              <div class="no-image-placeholder">
                <img src="<?php echo get_template_directory_uri(); ?>/images/default-article.jpg" alt="<?php the_title(); ?>">
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php
    endwhile;
  }

  wp_reset_postdata();
  wp_die();
}
add_action('wp_ajax_load_more_articles', 'load_more_articles');
add_action('wp_ajax_nopriv_load_more_articles', 'load_more_articles');

function remove_image_attributes($html, $post_id, $post_image_id)
{
  $html = preg_replace('/(height|width)="\d+"/', '', $html);
  return $html;
}
add_filter('post_thumbnail_html', 'remove_image_attributes', 10, 3);


function add_article_meta_tags()
{
  if (is_single()) {
    global $post;
    ?>
    <meta property="og:title" content="<?php echo esc_attr(get_the_title()); ?>">
    <meta property="og:description"
      content="<?php echo esc_attr(wp_trim_words(get_the_excerpt() ?: $post->post_content, 20)); ?>">
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>">
    <?php if (has_post_thumbnail()) : ?>
      <meta property="og:image" content="<?php echo esc_url(get_the_post_thumbnail_url(null, 'large')); ?>">
    <?php endif; ?>
    <meta property="article:published_time" content="<?php echo get_the_date('c'); ?>">
    <meta property="article:modified_time" content="<?php echo get_the_modified_date('c'); ?>">
  <?php

    // Структурированные данные JSON-LD для статьи
    $schema = array(
      '@context' => 'https://schema.org',
      '@type' => 'Article',
      'headline' => get_the_title(),
      'description' => wp_trim_words(get_the_excerpt() ?: $post->post_content, 20),
      'datePublished' => get_the_date('c'),
      'dateModified' => get_the_modified_date('c'),
      'author' => array(
        '@type' => 'Person',
        'name' => get_the_author()
      ),
      'publisher' => array(
        '@type' => 'Organization',
        'name' => get_bloginfo('name'),
        'logo' => array(
          '@type' => 'ImageObject',
          'url' => get_site_icon_url()
        )
      )
    );

    if (has_post_thumbnail()) {
      $schema['image'] = get_the_post_thumbnail_url(null, 'large');
    }

    echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
  }
}
add_action('wp_head', 'add_article_meta_tags');

function custom_excerpt_more($more)
{
  return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');

function custom_excerpt_length($length)
{
  return 25;
}
add_filter('excerpt_length', 'custom_excerpt_length');

// Добавляем шорткод для времени чтения
function reading_time_shortcode($atts)
{
  $time = get_reading_time();
  return '<span class="reading-time">Время чтения: ' . $time . ' мин.</span>';
}
add_shortcode('reading_time', 'reading_time_shortcode');

// Добавляем класс body для одиночных статей
function add_single_post_body_class($classes)
{
  if (is_single()) {
    $classes[] = 'single-article-page';
  }
  return $classes;
}
add_filter('body_class', 'add_single_post_body_class');

// Запрет автоматического уменьшения качества при обработке


add_filter('disable_image_downsize', 10, 4);
add_filter('png_quality', 'set_high_quality_images', 10, 2);
add_filter('jpeg_quality', 'set_high_quality_images', 10, 2);



// My account 

/**
 * Enqueue My Account page styles
 */
function enqueue_my_account_styles()
{
  // Подключаем стили только на странице личного кабинета
  if (is_account_page()) {
    wp_enqueue_style(
      'my-account-styles',
      get_template_directory_uri() . '/css/my-account-styles.css',
      array('go-brew-style'),
      '1.0.0',
      'all'
    );
  }
}
add_action('wp_enqueue_scripts', 'enqueue_my_account_styles');

/**
 * Customize WooCommerce My Account menu items
 */
function customize_my_account_menu_items($items)
{
  // Переводим пункты меню на русский язык
  $custom_items = array(
    'dashboard'       => 'Панель управления',
    'orders'         => 'Заказы',
    'downloads'      => 'Загрузки',
    'edit-address'   => 'Адреса',
    'edit-account'   => 'Данные аккаунта',
    'customer-logout' => 'Выйти'
  );

  // Заменяем только те пункты, которые есть в массиве
  foreach ($items as $key => $item) {
    if (isset($custom_items[$key])) {
      $items[$key] = $custom_items[$key];
    }
  }

  return $items;
}
add_filter('woocommerce_account_menu_items', 'customize_my_account_menu_items');

/**
 * Redirect users to custom my account page after login
 */
function redirect_to_my_account_after_login($redirect_to, $request, $user)
{
  if (isset($user->roles) && is_array($user->roles)) {
    if (in_array('customer', $user->roles)) {
      return wc_get_page_permalink('myaccount');
    }
  }
  return $redirect_to;
}
add_filter('login_redirect', 'redirect_to_my_account_after_login', 10, 3);

/**
 * Customize WooCommerce account page titles
 */
function customize_woocommerce_account_page_titles($title, $endpoint)
{
  $custom_titles = array(
    'dashboard'      => 'Панель управления',
    'orders'        => 'Мои заказы',
    'downloads'     => 'Загрузки',
    'edit-address'  => 'Мои адреса',
    'edit-account'  => 'Данные аккаунта',
    'lost-password' => 'Восстановление пароля'
  );

  if (isset($custom_titles[$endpoint])) {
    return $custom_titles[$endpoint];
  }

  return $title;
}
add_filter('woocommerce_endpoint_title', 'customize_woocommerce_account_page_titles', 10, 2);

/**
 * Add custom content to My Account dashboard
 */
function add_custom_my_account_dashboard_content()
{
  ?>
  <div class="custom-dashboard-welcome">
    <h3>Добро пожаловать в ваш личный кабинет!</h3>
    <p>Здесь вы можете управлять своими заказами, подписками и личными данными.</p>
  </div>
<?php
}
add_action('woocommerce_account_dashboard', 'add_custom_my_account_dashboard_content', 5);

/**
 * Remove WooCommerce default styles on account page
 */
function remove_woocommerce_styles_on_account()
{
  if (is_account_page()) {
    wp_dequeue_style('woocommerce-general');
    wp_dequeue_style('woocommerce-layout');
    wp_dequeue_style('woocommerce-smallscreen');
  }
}
add_action('wp_enqueue_scripts', 'remove_woocommerce_styles_on_account', 99);



function enqueue_checkout_styles()
{
  // Проверяем, что WooCommerce активен и это страница оформления заказа
  if (function_exists('is_checkout') && is_checkout()) {
    wp_enqueue_style(
      'checkout-styles',
      get_template_directory_uri() . '/css/checkout-styles.css',
      array(),
      '1.0.0',
      'all'
    );
  }
}
add_action('wp_enqueue_scripts', 'enqueue_checkout_styles');




add_filter('woocommerce_locate_template', 'custom_checkout_template', 10, 3);
function custom_checkout_template($template, $template_name, $template_path)
{
  if ($template_name === 'checkout/form-checkout.php') {
    $template = get_stylesheet_directory() . '/woocommerce/checkout/custom-checkout.php';
  }
  return $template;
}



/**
 * Enqueue Cart page styles
 */
function enqueue_cart_styles()
{
  // Подключаем стили только на странице корзины
  if (is_cart()) {
    wp_enqueue_style(
      'cart-styles',
      get_template_directory_uri() . '/css/cart-styles.css',
      array('go-brew-style'),
      '1.0.0',
      'all'
    );
  }
}
add_action('wp_enqueue_scripts', 'enqueue_cart_styles');

/**
 * Add custom attributes for mobile table display
 */
function add_cart_table_mobile_attributes()
{
?>
  <script>
    jQuery(document).ready(function($) {
      // Добавляем data-title атрибуты для мобильного отображения
      $('.woocommerce table.cart .product-remove').attr('data-title', 'Удалить');
      $('.woocommerce table.cart .product-thumbnail').attr('data-title', 'Товар');
      $('.woocommerce table.cart .product-name').attr('data-title', 'Название');
      $('.woocommerce table.cart .product-price').attr('data-title', 'Цена');
      $('.woocommerce table.cart .product-quantity').attr('data-title', 'Количество');
      $('.woocommerce table.cart .product-subtotal').attr('data-title', 'Сумма');
    });
  </script>
<?php
}
add_action('wp_footer', 'add_cart_table_mobile_attributes');

/**
 * Customize WooCommerce cart table headers
 */
function customize_cart_table_headers($defaults)
{
  $custom_headers = array(
    'remove'      => '',
    'thumbnail'   => 'Товар',
    'name'        => 'Название',
    'price'       => 'Цена',
    'quantity'    => 'Количество',
    'subtotal'    => 'Сумма'
  );

  return array_merge($defaults, $custom_headers);
}
add_filter('woocommerce_cart_item_remove_link', 'customize_cart_table_headers');

/**
 * Add continue shopping button to cart page
 */
function add_continue_shopping_button_to_cart()
{
?>
  <div class="continue-shopping" style="margin-top: 20px;">
    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="button button-continue">
      <span class="button-text">← ПРОДОЛЖИТЬ ПОКУПКИ</span>
    </a>
  </div>
  <style>
    .button-continue {
      background: #F3EEEA;
      color: var(--dark-text);
      border: 1px solid rgba(33, 33, 35, 0.1);
      margin-top: 0;
    }

    .button-continue:hover {
      background: #e6ddd7;
      transform: translateY(-1px);
    }
  </style>
<?php
}
add_action('woocommerce_cart_actions', 'add_continue_shopping_button_to_cart');

/**
 * Modify cart item name to remove link (optional)
 */
function remove_cart_item_link($product_name, $cart_item, $cart_item_key)
{
  $product = $cart_item['data'];

  if ($product && $product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
    $product_permalink = apply_filters('woocommerce_cart_item_permalink', $product->is_visible() ? $product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);

    if (!$product_permalink) {
      return $product->get_name() . '&nbsp;';
    }
  }

  return $product_name;
}
// Раскомментируйте следующую строку, если хотите убрать ссылки с названий товаров в корзине
// add_filter('woocommerce_cart_item_name', 'remove_cart_item_link', 10, 3);

/**
 * Customize cart messages
 */
function customize_cart_messages()
{
  // Изменяем текст кнопки "Обновить корзину"
  add_filter('gettext', function ($translated_text, $text, $domain) {
    if ($domain === 'woocommerce') {
      switch ($text) {
        case 'Update cart':
          return 'Обновить корзину';
        case 'Proceed to checkout':
          return 'Оформить заказ';
        case 'Apply coupon':
          return 'Применить купон';
        case 'Coupon code':
          return 'Код купона';
        case 'Cart totals':
          return 'Итого по корзине';
        case 'Subtotal':
          return 'Промежуточная сумма';
        case 'Total':
          return 'Всего к оплате';
      }
    }
    return $translated_text;
  }, 20, 3);
}
add_action('init', 'customize_cart_messages');

/**
 * Add cart count to header (if needed)
 */
function add_cart_count_to_header()
{
  if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    $count = WC()->cart->get_cart_contents_count();
    if ($count > 0) {
      echo '<span class="cart-count">' . esc_html($count) . '</span>';
    }
  }
}

/**
 * AJAX update cart count
 */
function update_cart_count()
{
  if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    wp_enqueue_script('wc-cart-fragments');
  }
}
add_action('wp_enqueue_scripts', 'update_cart_count');

/**
 * Remove WooCommerce default styles on cart page
 */
function remove_woocommerce_styles_on_cart()
{
  if (is_cart()) {
    wp_dequeue_style('woocommerce-general');
    wp_dequeue_style('woocommerce-layout');
    wp_dequeue_style('woocommerce-smallscreen');
  }
}
add_action('wp_enqueue_scripts', 'remove_woocommerce_styles_on_cart', 99);

// выбор города 
// Регистрируем страницу настроек
add_action('admin_menu', function () {
  add_options_page(
    'Настройки городов', // Заголовок страницы
    'Города доставки',   // Название в меню
    'manage_options',    // Права доступа
    'delivery-cities',   // slug
    'render_delivery_cities_settings' // функция вывода
  );
});

// Регистрируем опцию
add_action('admin_init', function () {
  register_setting('delivery_cities_group', 'delivery_cities');
});

// Вывод страницы настроек
function render_delivery_cities_settings()
{
?>
  <div class="wrap">
    <h1>Список городов доставки</h1>
    <form method="post" action="options.php">
      <?php settings_fields('delivery_cities_group'); ?>
      <?php do_settings_sections('delivery_cities_group'); ?>
      <textarea name="delivery_cities" rows="10" cols="50"
        class="large-text"><?php echo esc_textarea(get_option('delivery_cities')); ?></textarea>
      <p class="description">Введите города построчно. Пример:<br>Москва<br>Санкт-Петербург<br>Новосибирск</p>
      <?php submit_button(); ?>
    </form>
  </div>
<?php
}

// Добавляем поле выбора города на страницу оформления заказа
add_action('woocommerce_after_order_notes', function ($checkout) {
  $cities = get_option('delivery_cities');
  $cities_list = array_filter(array_map('trim', explode("\n", $cities)));
?>
  <p class="form-row form-row-wide">
    <label for="delivery_city"><?php _e('Выбор города', 'go-brew'); ?> <span class="required">*</span></label>
    <select name="delivery_city" id="delivery_city" class="checkout-select">
      <option value=""><?php _e('Выберите город', 'go-brew'); ?></option>
      <?php foreach ($cities_list as $city): ?>
        <option value="<?php echo esc_attr($city); ?>"><?php echo esc_html($city); ?></option>
      <?php endforeach; ?>
    </select>
  </p>
<?php
});


add_action('woocommerce_checkout_process', function () {
  if (empty($_POST['delivery_city'])) {
    wc_add_notice(__('Пожалуйста, выберите город доставки.'), 'error');
  }
});

add_action('woocommerce_checkout_update_order_meta', function ($order_id) {
  if (!empty($_POST['delivery_city'])) {
    update_post_meta($order_id, 'delivery_city', sanitize_text_field($_POST['delivery_city']));
  }
});


add_action('woocommerce_admin_order_data_after_billing_address', function ($order) {
  $city = get_post_meta($order->get_id(), 'delivery_city', true);
  if ($city) {
    echo '<p><strong>' . __('Город доставки', 'go-brew') . ':</strong> ' . esc_html($city) . '</p>';
  }
});



?>