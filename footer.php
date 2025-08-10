<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package go-brew
 */

?>

<footer id="colophon" class="site-footer">
  <div class="footer-container">

    <div class="footer-main">

      <div class="footer-company">
        <div class="footer-logo">
          <img class="footer-logo-img" src="<?php echo get_template_directory_uri(); ?>/images/logo.png">
        </div>

        <div class="footer-addresses">
          <div class="address-item">
            <span class="address-label">Юридический адрес:</span>
            <span class="address-text">678370, Россия, Москва, <br>улица Проспект Мира 53 строение 1, подъезд 1</span>
          </div>

          <div class="address-item">
            <span class="address-label">Фактический адрес:</span>
            <span class="address-text">Москва, улица Проспект Мира 53 <br>строение 1, подъезд 1</span>
          </div>
        </div>
      </div>

      <!-- Navigation Sections -->
      <div class="footer-nav">

        <!-- Site Sections -->
        <div class="footer-nav-column">
          <h4 class="footer-nav-title">Разделы сайта:</h4>
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'nav-menu-head',
              'menu_class'     => 'nav-menu-footer',
              'container'      => false,
              'depth'          => 1,
            )
          );
          ?>
        </div>

        <!-- Social Media -->
        <div class="footer-nav-column">
          <h4 class="footer-nav-title">Наши соц.сети:</h4>
          <div class="footer-right-column">
            <div class="footer-social socials-links">
              <a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/insta.svg"></a>
              <a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/telega.svg"></a>
              </a>
            </div>

            <div class="footer-company-info">
              <div class="company-info-item">
                ОГРН:
                1061435052007
              </div>
              <div class="company-info-item">
                ИНН:
                1435176805
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>

  <!-- Footer Bottom -->
  <div class="footer-bottom">
    <div class="footer-container">
      <div class="footer-legal-links">
        <a href="<?php echo home_url('/privacy-policy/'); ?>" class="footer-legal-link">Согласие на обработку
          персональных данных</a>
        <a href="<?php echo home_url('/terms/'); ?>" class="footer-legal-link">Пользовательское соглашение</a>
        <a href="<?php echo home_url('/privacy/'); ?>" class="footer-legal-link">Политика обработки персональных
          данных</a>
      </div>
      <div class="footer-gobrew">
        GO BREW
      </div>
    </div>
  </div>
  </div>

  </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>