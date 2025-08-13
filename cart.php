<?php

/**
 * Template Name: Корзина (кастом)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go-brew
 */

get_header();
?>
<article class="breadcrumbs-art">
  <div class="container">
    <?php mytheme_breadcrumbs(); ?>
  </div>
</article>

<main id="primary" class="site-main cart-main">

  <div class="cart-section">
    <div class="container">
      <div class="cart-wrapper">

        <div class="cart-header">
          <h1 class="cart-title">КОРЗИНА</h1>
        </div>

        <div class="woocommerce-cart-content">
          <?php
          /**
           * WooCommerce Cart content
           */
          while (have_posts()) :
            the_post();
            the_content();
          endwhile;
          ?>
        </div>

        <?php if (WC()->cart->is_empty()) : ?>

          <div class="empty-cart">
            <div class="empty-cart-icon">
              <img src="<?php echo get_template_directory_uri(); ?>/images/empty-cart.svg" alt="Пустая корзина">
            </div>
            <h2 class="empty-cart-title">ВАША КОРЗИНА ПУСТА</h2>
            <p class="empty-cart-text">Добавьте товары в корзину, чтобы продолжить покупки</p>
            <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="button button-shop">
              <span class="button-text">ПЕРЕЙТИ В КАТАЛОГ</span>
            </a>
          </div>

        <?php else : ?>

          <!-- Рекомендуемые товары для корзины -->
          <div class="cart-recommendations">
            <h3 class="recommendations-title">РЕКОМЕНДУЕМ ТАКЖЕ</h3>
            <div class="recommendations-grid">
              <?php
              // Получаем рекомендуемые товары
              $recommended_products = wc_get_products(array(
                'limit' => 3,
                'orderby' => 'popularity',
                'exclude' => array_keys(WC()->cart->get_cart())
              ));

              if ($recommended_products) :
                foreach ($recommended_products as $product) :
              ?>
                  <div class="recommendation-item">
                    <div class="recommendation-image">
                      <?php if ($product->get_image_id()) : ?>
                        <?php echo wp_get_attachment_image($product->get_image_id(), 'thumbnail', false, array('class' => 'recommendation-img')); ?>
                      <?php else : ?>
                        <div class="no-image-placeholder">
                          <span>Нет фото</span>
                        </div>
                      <?php endif; ?>
                    </div>
                    <div class="recommendation-info">
                      <h4 class="recommendation-name"><?php echo esc_html($product->get_name()); ?></h4>
                      <div class="recommendation-price">
                        <?php echo $product->get_price_html(); ?>
                      </div>
                      <a href="<?php echo esc_url($product->get_permalink()); ?>" class="recommendation-link">
                        ПОДРОБНЕЕ
                      </a>
                    </div>
                  </div>
              <?php
                endforeach;
              endif;
              ?>
            </div>
          </div>

        <?php endif; ?>

      </div>
    </div>
  </div>
</main>

<?php
get_footer();
?>