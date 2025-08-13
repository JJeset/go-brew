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

<main id="primary" class="site-main">
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
                            <?php echo wp_trim_words($product->get_short_description(), 20); ?>
                          </p>
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
                      </div>
                  <?php
                    endif;
                  }
                  ?>
                </div>
              </div>

              <!-- Шаг 2: Оформление заказа -->
              <div class="checkout-step checkout-step-details" id="checkout-step-02">
                <div class="checkout-step-header">
                  <div class="checkout-step-number">02</div>
                  <h2 class="checkout-step-title"><?php _e('Оформление заказа', 'go-brew'); ?></h2>
                </div>

                <div class="checkout-billing-fields">
                  <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
                    <?php do_action('woocommerce_checkout_shipping'); ?>
                  <?php endif; ?>

                  <div class="checkout-form-row">
                    <div class="checkout-form-col checkout-form-col-left">
                      <?php
                      $fields = WC()->checkout->get_checkout_fields('billing');
                      foreach ($fields as $key => $field) {
                        if ($key === 'billing_first_name' || $key === 'billing_last_name') {
                          woocommerce_form_field($key, $field, WC()->checkout->get_value($key));
                        }
                      }
                      ?>
                    </div>
                    <div class="checkout-form-col checkout-form-col-right">
                      <?php
                      foreach ($fields as $key => $field) {
                        if ($key === 'billing_email' || $key === 'billing_phone') {
                          woocommerce_form_field($key, $field, WC()->checkout->get_value($key));
                        }
                      }
                      ?>
                    </div>
                  </div>

                  <div class="checkout-additional-fields">
                    <div class="checkout-form-col">
                      <label><?php _e('Другой получатель', 'go-brew'); ?></label>
                      <input type="text" name="other_recipient" placeholder="<?php _e('Имя', 'go-brew'); ?>"
                        class="checkout-input">
                    </div>
                    <div class="checkout-form-col">
                      <input type="text" name="other_recipient_phone" placeholder="<?php _e('Телефон', 'go-brew'); ?>"
                        class="checkout-input">
                    </div>
                  </div>
                </div>
              </div>

              <!-- Шаг 3: Способ доставки -->
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

              <!-- Шаг 5: Завершить оформление -->
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
            </form>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</main>

<style>
  /* Основные стили для страницы оформления заказа */
  .checkout-page {
    padding: 24px 0 60px;
    background: #FDFCFA;
  }

  .checkout-container {
    max-width: 1200px;
    margin: 0 auto;
  }

  .checkout-main-title {
    font-size: 40px;
    font-weight: 700;
    line-height: 53px;
    letter-spacing: -1.2px;
    text-transform: uppercase;
    margin-bottom: 40px;
    color: var(--dark-text);
  }

  .checkout-content {
    display: flex;
    flex-direction: column;
    gap: 30px;
  }

  /* Стили для шагов оформления */
  .checkout-step {
    background: #FFFFFF;
    border-radius: 30px;
    border: 1px solid rgba(33, 33, 35, 0.10);
    box-shadow: 0 9px 24px 0 rgba(59, 61, 78, 0.05);
    padding: 30px;
  }

  .checkout-step-header {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 30px;
  }

  .checkout-step-number {
    font-size: 32px;
    font-weight: 600;
    line-height: 53px;
    /* 165.625% */
    letter-spacing: -1.2px;
    text-transform: uppercase;
    color: var(--dark-text);

    padding: 27px 29px 25px 25px;
    background: var(--primary-pink);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
  }

  .checkout-step-title {
    font-size: 24px;
    font-weight: 600;
    letter-spacing: -0.7px;
    text-transform: uppercase;
    color: var(--dark-text);
    margin: 0;
  }

  /* Стили для товаров в корзине */
  .checkout-cart-item {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 20px 0;
    border-bottom: 1px solid rgba(33, 33, 35, 0.10);
  }

  .checkout-cart-item:last-child {
    border-bottom: none;
  }

  .cart-item-image {
    width: 100px;
    height: 100px;
    border-radius: 15px;
    overflow: hidden;
    flex-shrink: 0;
  }

  .cart-item-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .cart-item-details {
    flex: 1;
  }

  .cart-item-name {
    font-size: 18px;
    font-weight: 600;
    letter-spacing: -0.7px;
    text-transform: uppercase;
    margin: 0 0 10px 0;
    color: var(--dark-text);
  }

  .cart-item-description {
    font-size: 14px;
    color: var(--grey-text);
    line-height: 16px;
    margin: 0;
  }

  .cart-item-price {
    text-align: right;
    min-width: 120px;
  }

  .cart-item-total {
    font-size: 18px;
    font-weight: 700;
    color: var(--dark-text);
    display: block;
    margin-bottom: 5px;
  }

  .cart-item-quantity {
    font-size: 12px;
    color: var(--grey-text);
  }

  /* Стили для формы */
  .checkout-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
  }

  .checkout-form-col {
    display: flex;
    flex-direction: column;
  }

  .checkout-additional-fields {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-top: 20px;
  }

  .checkout-input {
    padding: 15px 20px;
    border: 1px solid rgba(33, 33, 35, 0.10);
    border-radius: 15px;
    background: #FDFCFA;
    font-size: 14px;
    color: var(--dark-text);
    transition: var(--transition);
  }

  .checkout-input:focus {
    outline: none;
    border-color: var(--primary-pink);
  }

  .checkout-select {
    padding: 15px 20px;
    border: 1px solid rgba(33, 33, 35, 0.10);
    border-radius: 15px;
    background: #FDFCFA;
    font-size: 14px;
    color: var(--dark-text);
    appearance: none;
    background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTQiIGhlaWdodD0iOCIgdmlld0JveD0iMCAwIDE0IDgiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGQ9Ik0xIDFMNyA3TDEzIDEiIHN0cm9rZT0iIzIxMjEyMyIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPC9zdmc+');
    background-repeat: no-repeat;
    background-position: right 20px center;
    background-size: 14px;
    padding-right: 50px;
  }

  /* Стили для способов оплаты */
  .checkout-payment-options {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin-bottom: 20px;
  }

  .payment-method-card {
    padding: 15px 20px;
    border: 1px solid rgba(33, 33, 35, 0.10);
    border-radius: 15px;
    background: #FDFCFA;
    text-align: center;
    cursor: pointer;
    transition: var(--transition);
  }

  .payment-method-card:hover {
    border-color: var(--primary-pink);
  }

  .payment-method-card.active {
    background: var(--primary-pink);
    border-color: var(--primary-pink);
  }

  .payment-method-card.active .payment-method-label {
    color: #FFFFFF;
  }

  .payment-method-label {
    font-size: 14px;
    font-weight: 600;
    color: var(--dark-text);
  }

  /* Стили для промокода */
  .checkout-promo-code {
    display: flex;
    gap: 15px;
    margin-bottom: 30px;
    align-items: center;
  }

  .checkout-promo-code .checkout-input {
    flex: 1;
  }

  .checkout-promo-btn {
    padding: 15px 25px;
    background: var(--primary-pink);
    border: none;
    border-radius: 15px;
    font-size: 14px;
    font-weight: 600;
    color: #FFFFFF;
    cursor: pointer;
    transition: var(--transition);
    white-space: nowrap;
  }

  .checkout-promo-btn:hover {
    background: #e5a6a1;
  }

  /* Стили для итогов заказа */
  .checkout-order-totals {
    background: #F3EEEA;
    border-radius: 20px;
    padding: 25px;
    margin-bottom: 30px;
  }

  .checkout-totals-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
  }

  .checkout-totals-row:not(:last-child) {
    border-bottom: 1px solid rgba(33, 33, 35, 0.10);
  }

  .checkout-totals-final {
    font-weight: 700;
    font-size: 18px;
    padding-top: 15px;
  }

  .checkout-totals-label {
    font-size: 14px;
    color: var(--dark-text);
  }

  .checkout-totals-value {
    font-size: 14px;
    font-weight: 600;
    color: var(--dark-text);
  }

  /* Стили для кнопки оплаты */
  .checkout-submit-wrapper {
    text-align: center;
  }

  .checkout-submit-btn {
    width: 100%;
    max-width: 300px;
    padding: 18px 40px;
    background: var(--primary-pink);
    border: none;
    border-radius: 30px;
    font-size: 16px;
    font-weight: 600;
    text-transform: uppercase;
    color: #FFFFFF;
    cursor: pointer;
    transition: var(--transition);
    margin: 0 0 20px 0;
  }

  .checkout-submit-btn:hover {
    background: #e5a6a1;
    transform: translateY(-2px);
  }

  .checkout-privacy-notice {
    font-size: 12px;
    color: var(--grey-text);
    line-height: 1.4;
    max-width: 400px;
    margin: 0 auto;
  }

  /* Стили для пустой корзины */
  .checkout-empty-cart {
    text-align: center;
    padding: 60px 20px;
  }

  .checkout-empty-cart h2 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 20px;
    color: var(--dark-text);
  }

  .checkout-empty-cart p {
    font-size: 16px;
    color: var(--grey-text);
    margin-bottom: 30px;
  }

  /* Адаптивные стили */
  @media (max-width: 768px) {
    .checkout-main-title {
      font-size: 28px;
      line-height: 1.3;
    }

    .checkout-step {
      padding: 20px;
    }

    .checkout-form-row,
    .checkout-additional-fields {
      grid-template-columns: 1fr;
    }

    .checkout-cart-item {
      flex-direction: column;
      align-items: flex-start;
      text-align: left;
    }

    .cart-item-price {
      text-align: left;
      width: 100%;
    }

    .checkout-payment-options {
      grid-template-columns: 1fr 1fr;
      gap: 10px;
    }

    .checkout-promo-code {
      flex-direction: column;
    }

    .checkout-promo-btn {
      width: 100%;
    }
  }

  @media (max-width: 480px) {
    .checkout-payment-options {
      grid-template-columns: 1fr;
    }

    .checkout-step-header {
      flex-direction: column;
      align-items: flex-start;
      gap: 15px;
    }

    .checkout-step-number {
      align-self: flex-start;
    }
  }
</style>


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