<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package go-brew
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <!-- Top Bar -->
  <div class="top-bar">
    <div class="container">
      <div class="top-bar-content">
        <div class="top-bar-left">
          <span><img src="<?php echo get_template_directory_uri(); ?>/images/phone.svg">
            <?php echo get_theme_mod('phone_number', '+7 (900) 300-23-14'); ?></span>

        </div>
        <div class="top-bar-right">
          <div class="top-bar-right-socials socials-links">
            <a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/insta.svg"></a>
            <a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/telega.svg"></a>
          </div>
          <div class="top-bar-right-lk">
            <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/lk.svg">
              <div class="top-bar-text">Личный кабинет</div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Header -->
  <header id="main-header" class="main-header">
    <div class="container">
      <nav class="navbar">
        <a class="logo" href="<?php echo home_url(); ?>" class="logo">
          <span class="logo-icon-one"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"></span>
        </a>

        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'nav-menu-head',
            'menu_class'     => 'nav-menu',
            'container'      => false,
            'depth'          => 1,
          )
        );
        ?>

        <div class="header-actions">
          <a class="btn-icon search-toggle icon-after">
            <span class="header-actions-text"><?php esc_html_e('Поиск', 'go-brew'); ?></span>
            <img src="<?php echo get_template_directory_uri(); ?>/images/search.svg"></a>
          <?php if (class_exists('WooCommerce')) : ?>
            <a href="<?php echo wc_get_cart_url(); ?>" class="btn-icon">
              <span class="header-actions-text"><?php esc_html_e('Корзина', 'go-brew'); ?></span>
              <img src="<?php echo get_template_directory_uri(); ?>/images/basket.svg">
              <?php if (WC()->cart->get_cart_contents_count() > 0) : ?>
                <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
              <?php endif; ?>
            </a>
          <?php endif; ?>
        </div><!-- .header-actions -->
        <a class="burger-icon" href="#">
          <span></span>
        </a>
      </nav>
    </div>
  </header><!-- #masthead -->