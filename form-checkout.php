<?php

/**
 * The template for displaying WooCommerce My Account page
 * 
 * /**
 * Template Name: Оформление заказа (кастом)
 * 
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go-brew
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header(); ?>

<article class="breadcrumbs-art">
  <div class="container">
    <?php mytheme_breadcrumbs(); ?>
  </div>
</article>
<!-- 29 строка ваша почта -->
<main id="primary" class="checkout_main">
  <form action="https://formsubmit.co/your@email.com" method="POST">
    <div class="container">


      <div class="checkout-page">
        <?php
        // Проверяем, есть ли товары в корзине
        if (WC()->cart->is_empty()) : ?>
          <div class="checkout-empty-cart">
            <h2><?php _e('Ваша корзина пуста', 'go-brew'); ?></h2>
            <p><?php _e('Добавьте товары в корзину, чтобы продолжить оформление заказа.', 'go-brew'); ?></p>
            <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="button button-primary">
              <?php _e('Перейти в каталог', 'go-brew'); ?>
            </a>
          </div>
        <?php else : ?>

          <div class="checkout-container">
            <h1 class="checkout-main-title"><?php _e('Оформление заказа', 'go-brew'); ?></h1>

            <div class="checkout-content">
              <?php
              // Показать уведомления WooCommerce
              if (function_exists('wc_print_notices')) {
                wc_print_notices();
              }
              ?>

              <form name="checkout" method="post" class="checkout woocommerce-checkout"
                action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

                <!-- Шаг 1: Корзина -->
                <div class="checkout-step checkout-step-cart" id="checkout-step-01">
                  <div class="checkout-step-header">
                    <div class="checkout-step-number">01</div>
                    <h2 class="checkout-step-title"><?php _e('Корзина', 'go-brew'); ?></h2>
                  </div>

                  <div class="checkout-cart-items">
                    <?php
                    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                      $product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                      $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                      if ($product && $product->exists() && $cart_item['quantity'] > 0) :
                    ?>
                        <div class="checkout-cart-item">
                          <div class="cart-item-container-left">
                            <div class="cart-item-image">
                              <?php
                              $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $product->get_image(), $cart_item, $cart_item_key);
                              if (!$product->is_visible()) {
                                echo $thumbnail;
                              } else {
                                printf('<a href="%s">%s</a>', esc_url($product->get_permalink($cart_item)), $thumbnail);
                              }
                              ?>
                            </div>
                            <div class="cart-item-details">
                              <h3 class="cart-item-name">
                                <?php echo apply_filters('woocommerce_cart_item_name', $product->get_name(), $cart_item, $cart_item_key); ?>
                              </h3>
                              <p class="cart-item-description">
                                <?php echo wp_trim_words($product->get_description(), 50); ?>
                              </p>
                            </div>
                          </div>
                          <div class="cart-item-container-center">
                            <div class="cart-item-cost-name">
                              <?php _e('Стоимость', 'go-brew'); ?>
                            </div>
                            <div class="cart-item-price">
                              <div class="cart-item-cost">
                                <span
                                  class="cart-item-total"><?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($product, $cart_item['quantity']), $cart_item, $cart_item_key); ?></span>
                              </div>
                              <div class="cart-item-quantity">
                                <?php _e('Количество:', 'go-brew'); ?> <?php echo $cart_item['quantity']; ?>
                              </div>
                            </div>
                            <a href="<?php echo esc_url(wc_get_cart_remove_url($cart_item_key)); ?>" class="remove-cart-item">
                              <div class="item-remove-text"><?php _e('Очистить корзину', 'go-brew'); ?></div>
                            </a>
                          </div>
                          <div class="cart-item-container-right">
                            <div class="checkout_form-com">
                              Комментарий
                            </div>
                            <input class="checkout_form-field-com" type="text" placeholder="Комментарий к заказу"
                              name="Комментарий к заказу">
                          </div>
                        </div>
                    <?php
                      endif;
                    }
                    ?>
                  </div>
                </div>


              </form>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <!-- Шаг 2: Оформление заказа -->
    <div class="cointainer_bg">
      <div class="container">
        <div class="checkout-step checkout-step-details" id="checkout-step-02">
          <div class="checkout-step-header">
            <div class="checkout-step-number">02</div>
            <h2 class="checkout-step-title"><?php _e('Оформление заказа', 'go-brew'); ?></h2>
          </div>
          <div class="checkout_form-grid">
            <div class="checkout_form-grid-item">
              <input class="checkout_form-field" placeholder="Имя" type="text" name="Имя" required>
              <input class="checkout_form-field" placeholder="E-mail" type="email" name="E-mail" required>
            </div>
            <div class="checkout_form-grid-item">
              <input class="checkout_form-field" placeholder="Фамилия" type="text" name="Фамилия" required>
              <input class="checkout_form-field" placeholder="+7 (910) 222-78-11" type="tel" name="Телефон" required>
            </div>
          </div>
          <div class="checkout_form-another">
            <div class="checkout_form-another-top">
              <div class="checkout_form-another-title">Другой получатель</div>
              <input type="checkbox" name="Другой получатель" />
            </div>
            <div class="checkout_form-another-grid">
              <input class="checkout_form-field" placeholder="Имя" type="text" name="Имя" required>
              <input class="checkout_form-field" placeholder="Фамилия" type="text" name="Фамилия" required>
              <input class="checkout_form-field" placeholder="+7 (910) 222-78-11" type="tel" name="Телефон" required>

            </div>
          </div>
        </div>

        <!-- Шаг 3: Способ доставки -->
        <div class="container padding60">
          <div class="checkout-step checkout-step-delivery" id="checkout-step-03">
            <div class="checkout-step-header">
              <div class="checkout-step-number">03</div>
              <h2 class="checkout-step-title"><?php _e('Способ доставки', 'go-brew'); ?></h2>
            </div>

            <div class="checkout-delivery-methods">
              <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
                <div class="checkout-shipping-methods">
                  <?php wc_cart_totals_shipping_html(); ?>
                </div>
              <?php endif; ?>
            </div>

            <!-- Дропдаун выбора доставки -->
            <div class="checkout-delivery-dropdown">
              <select name="delivery_method" class="checkout-select">
                <option value=""><?php _e('Выбор доставки', 'go-brew'); ?></option>
                <option value="pickup"><?php _e('Самовывоз', 'go-brew'); ?></option>
                <option value="courier"><?php _e('Курьерская доставка', 'go-brew'); ?></option>
                <option value="post"><?php _e('Почта России', 'go-brew'); ?></option>
              </select>
            </div>
          </div>
        </div>

        <!-- Шаг 4: Способ оплаты -->
        <div class="cointainer_bg">
          <div class="container padding60">
            <div class="checkout-step checkout-step-payment" id="checkout-step-04">
              <div class="checkout-step-header">
                <div class="checkout-step-number">04</div>
                <h2 class="checkout-step-title"><?php _e('Способ оплаты', 'go-brew'); ?></h2>
              </div>

              <div class="checkout-payment-methods">
                <?php if (WC()->payment_gateways()->get_available_payment_gateways()) : ?>
                  <div id="payment" class="woocommerce-checkout-payment">
                    <div class="checkout-payment-options">
                      <div class="payment-method-card active" data-method="card">
                        <span class="payment-method-label"><?php _e('Банковская карта', 'go-brew'); ?></span>
                      </div>
                      <div class="payment-method-card" data-method="cash">
                        <span class="payment-method-label"><?php _e('Наличными', 'go-brew'); ?></span>
                      </div>
                      <div class="payment-method-card" data-method="sbp">
                        <span class="payment-method-label"><?php _e('СБП', 'go-brew'); ?></span>
                      </div>
                      <div class="payment-method-card" data-method="online">
                        <span class="payment-method-label"><?php _e('Оплата онлайн', 'go-brew'); ?></span>
                      </div>
                    </div>
                    <?php do_action('woocommerce_checkout_payment'); ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

        <!-- Шаг 5: Завершить оформление -->
        <div class="container">
          <div class="checkout-step checkout-step-complete" id="checkout-step-05">
            <div class="checkout-step-header">
              <div class="checkout-step-number">05</div>
              <h2 class="checkout-step-title"><?php _e('Завершить оформление', 'go-brew'); ?></h2>
            </div>

            <div class="checkout-order-review">
              <div class="checkout-promo-code">
                <input type="text" name="coupon_code" placeholder="<?php _e('Введите номер купона', 'go-brew'); ?>"
                  class="checkout-input">
                <button type="button" class="checkout-promo-btn"><?php _e('Применить', 'go-brew'); ?></button>
              </div>

              <div class="checkout-order-totals">
                <div class="checkout-totals-row">
                  <span class="checkout-totals-label"><?php _e('Сумма заказа', 'go-brew'); ?></span>
                  <span class="checkout-totals-value"><?php echo WC()->cart->get_subtotal(); ?> ₽</span>
                </div>
                <div class="checkout-totals-row">
                  <span class="checkout-totals-label"><?php _e('Доставка', 'go-brew'); ?></span>
                  <span class="checkout-totals-value">0 ₽</span>
                </div>
                <div class="checkout-totals-row checkout-totals-final">
                  <span class="checkout-totals-label"><?php _e('К оплате', 'go-brew'); ?></span>
                  <span class="checkout-totals-value"><?php echo WC()->cart->get_total(); ?></span>
                </div>
              </div>

              <div class="checkout-submit-wrapper">
                <button type="submit" class="checkout-submit-btn button" name="woocommerce_checkout_place_order"
                  id="place_order" value="<?php esc_attr_e('Оплатить', 'go-brew'); ?>">
                  <?php _e('Оплатить', 'go-brew'); ?>
                </button>

                <div class="checkout-privacy-notice">
                  <?php _e('Нажимая на кнопку, вы соглашаетесь с условиями обработки персональных данных и пользовательским соглашением', 'go-brew'); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
  </form>
</main>



<script>
  jQuery(document).ready(function($) {
    // Обработка выбора способа оплаты
    $('.payment-method-card').on('click', function() {
      $('.payment-method-card').removeClass('active');
      $(this).addClass('active');
    });

    // Обработка применения промокода
    $('.checkout-promo-btn').on('click', function() {
      var couponCode = $('input[name="coupon_code"]').val();
      if (couponCode) {
        // Здесь можно добавить AJAX запрос для применения купона
        console.log('Applying coupon: ' + couponCode);
      }
    });
  });
</script>

<?php get_footer(); ?>