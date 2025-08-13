<?php

/**
 * The template for displaying WooCommerce My Account page
 * 
 * /**
 * Template Name: Мой личный кабинет 
 * 
 *
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

<main id="primary" class="site-main my-account-main">


  <div class="my-account-section">
    <div class="container">
      <div class="my-account-wrapper">

        <?php if (is_user_logged_in()) : ?>
          <?php
          $current_user = wp_get_current_user();
          $user_orders = wc_get_orders(array(
            'customer' => $current_user->ID,
            'limit' => -1,
            'status' => array('wc-completed', 'wc-processing', 'wc-on-hold')
          ));
          ?>

          <div class="my-account-header">
            <h1 class="my-account-title">ИСТОРИЯ ПОДПИСОК</h1>
            <div class="user-greeting">
              <p>Добро пожаловать, <strong><?php echo esc_html($current_user->display_name); ?>!</strong></p>
            </div>
          </div>

          <!-- История подписок -->
          <div class="subscription-history-section">

            <div class="subscription-cards">
              <?php if (!empty($user_orders)) : ?>
                <?php foreach (array_slice($user_orders, 0, 3) as $order) : ?>
                  <?php
                  $order_data = wc_get_order($order->get_id());
                  $order_date = $order_data->get_date_created();
                  $subscription_type = '';
                  $items = $order_data->get_items();

                  foreach ($items as $item) {
                    $product = $item->get_product();
                    if ($product) {
                      $subscription_type = $product->get_name();
                      break;
                    }
                  }
                  ?>
                  <div class="subscription-card">
                    <div class="subscription-info">
                      <div class="subscription-badge">
                        <?php echo esc_html(strtoupper(substr($subscription_type, 0, 10))); ?>
                      </div>
                      <div class="subscription-date">
                        Была куплена: <?php echo $order_date->format('d.m.Y'); ?>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php else : ?>
                <div class="no-subscriptions">
                  <p>У вас пока нет активных подписок</p>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="container"><span class="sepparator sepparator-account"></span></div>
          <!-- Программа лояльности -->
          <div class="loyalty-program-section">
            <h2 class="my-account-title">ПРОГРАММА ЛОЯЛЬНОСТИ</h2>

            <div class="loyalty-cards">
              <div class="loyalty-card loyalty-card-6months">
                <div class="loyalty-header">
                  <span class="loyalty-duration">ПРИ ПОДПИСКЕ ОТ 6 МЕСЯЦЕВ</span>
                </div>
                <div class="loyalty-discount">
                  <span class="discount-text">СКИДКА 10%</span>
                </div>
              </div>

              <div class="loyalty-card loyalty-card-12months">
                <div class="loyalty-header">
                  <span class="loyalty-duration">ПРИ ПОДПИСКЕ ОТ 12 МЕСЯЦЕВ</span>
                </div>
                <div class="loyalty-discount">
                  <span class="discount-text">СКИДКА 20%</span>
                </div>
              </div>
            </div>
          </div>

          <!-- WooCommerce My Account Content -->
          <div class="woocommerce-account-content">
            <?php
            /**
             * My Account content.
             */
            // do_action('woocommerce_account_content');
            ?>
          </div>

        <?php else : ?>

          <div class="login-prompt">
            <h1 class="my-account-title">ВХОД В ЛИЧНЫЙ КАБИНЕТ</h1>
            <p>Пожалуйста, войдите в свой аккаунт для доступа к личному кабинету</p>

            <?php
            /**
             * My Account content for non-logged in users.
             */
            do_action('woocommerce_account_content');
            ?>
          </div>

        <?php endif; ?>

      </div>
    </div>
  </div>
</main>

<?php
get_footer();
?>