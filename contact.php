<?php

/**
 * Template Name: Контакты
 * Description: A custom template for a specific page.
 */
get_header(); ?>

<article class="breadcrumbs-art">
  <div class="container">
    <?php mytheme_breadcrumbs(); ?>
  </div>
</article>

<main id="primary" class="contacts">

  <section class="contacts_section">
    <div class="container">
      <div class="contacts_wrapper">
        <h1 class="contacts_title"><?php the_title(); ?></h1>
        <div class="contacts_text">Мы поставляем лучший и вкуснейший кофе от самых известных производителей в мире.
          Каждый месяц у нас появляется новый
          ассортимент из трех сортов европейского кофе, двух сортов мирового производства и кофе без кофеина. </div>
      </div>
      <div class="contacts_socials-wrapper">
        <div class="contacts_grid-list">
          <div class="contacts_grid-item">
            <div class="contacts_grid-item-name">Телефон</div>
            <a href="tel:+79684356578" class="contacts_grid-item-tel">+7(968) 435 65 78</a>

          </div>
          <div class="contacts_grid-item">
            <div class="contacts_grid-item-name">E-mail</div>
            <a href="email:coffe01@gmail.com" class="contacts_grid-item-email">coffe01@gmail.com</a>

          </div>
          <div class="contacts_grid-item">
            <div class="contacts_grid-item-name">Соц.сети</div>
            <div class="contacts_grid-item-icons">
              <a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/insta.svg"></a>
              <a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/telega.svg"></a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <article class="subscribe subscribe_article">
    <div class="container container_subscribe">
      <div class="subscribe_left">
        <img src="<?php echo get_template_directory_uri(); ?>/images/subscribe-bg.png">
      </div>
      <div class="subscribe_right">
        <div class="subscribe_content">
          <div class="subscribe_title">ВСЕ ПРОСТО - ОФОРМИТЬ ПОДПИСКУ GO BREW</div>
          <button class="button button_subscribe">
            <span class="button-text button-subscribe-text">Подписаться</span>
          </button>
        </div>
      </div>
    </div>
  </article>
  <?php the_content(); ?>
</main>

<?php get_sidebar();
get_footer();
