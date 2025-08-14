<?php

/**
 * Template Name: Главная
 * Description: A custom template for a specific page.
 */
get_header(); ?>

<main id="primary" class="site-main">

  <section class="intro_section">
    <div class="intro">
      <div class="intro_img-mobile">
        <img src="<?php echo get_template_directory_uri(); ?>/images/intro-bg.png">
      </div>
      <div class="container main-container">
        <div class="intro-text">
          <h1 class="intro-title">Каждый месяц — новое кофейное открытие</h1>
          <h2 class="intro-subtitle">Первая в России независимая подписка на зерновой кофе</h2>
          <button class="button button_intro-production">
            <span class="button-text">к продукции</span>
          </button>
        </div>
      </div>
      <div class="intro-image">
        <img src="<?php echo get_template_directory_uri(); ?>/images/quality-sert.svg">
      </div>
      <img class="intro-wave" src="<?php echo get_template_directory_uri(); ?>/images/wave-effect.svg">
    </div>
  </section>
  <section class="why_us">
    <div class="container why_us-container">
      <div class="why_us-title">
        <h2>Почему выбирают GO BREW?</h2>
      </div>
      <div class="why_us-content">
        <div class="why_us-item">
          <img src="<?php echo get_template_directory_uri(); ?>/images/why_us-item-img.png">
          <h3 class="why_us-item-title">Свежий<br> и отборный</h3>
          <p class="why_us-item-text">Мы отбираем только те лоты, в качестве которых уверены. В подборке — как известные
            обжарщики, так и
            небольшие производства из России и мира. Всё — через строгий отбор сертифицированного Q-грейдера.</p>
        </div>
        <div class="why_us-item">
          <img src="<?php echo get_template_directory_uri(); ?>/images/why_us-item-img2.png">
          <h3 class="why_us-item-title">Независимый подход <br>и география</h3>
          <p class="why_us-item-text">Мы независимы в выборе и каждый месяц собираем кофе от разных проектов с раных
            уголков континента. Главное — вкус. Неважно, крупная это компания или производство с одним маленьким
            ростером. Если зерна вкусные - не важно какой логотип на пачке.</p>
        </div>
        <div class="why_us-item">
          <img src="<?php echo get_template_directory_uri(); ?>/images/why_us-item-img3.png">
          <h3 class="why_us-item-title">Из мелочей <br>складывается картина</h3>
          <p class="why_us-item-text">Кофе обжаривается под заказ и поступает в Москву, где мы тестируем рецепты,
            бережно упаковываем бокс и отправляем подписчикам. Всё продумано — от зерна до последнего глотка.</p>
        </div>
      </div>
    </div>
  </section>
  <section class="inside">
    <div class="container">
      <div class="inside_content">
        <div class="inside_content-left">
          <img src="<?php echo get_template_directory_uri(); ?>/images/inside-box.png">
        </div>
        <div class="inside_content-right">
          <div class="inside_content-right-title">ЧТО ВНУТРИ ПОДПИСКИ?</div>
          <div class="inside_content-right-content">
            <div class="inside_content-right-item">
              <div class="inside_content-right-item-name">Две пачки отборного кофе</div>
              <div class="inside_content-right-item-description">Каждый месяц — два лота из разных городов и стран,
                обжаренных специально под фильтр. Подходят для любого метода заваривания: от классической воронки и
                кемекса до турки и аэропресса.</div>
            </div>
            <div class="inside_content-right-item">
              <div class="inside_content-right-item-name">Secret Lot — скрытый гость подписки.</div>
              <div class="inside_content-right-item-description">Третья, дополнительная упаковка кофе, которая всегда
                остаётся загадкой. Мы не анонсируем этот лот заранее — он раскрывается только при получении. Внутри —
                кофе с особым характером и вкусовой историей.</div>
            </div>
            <div class="inside_content-right-item">
              <div class="inside_content-right-item-name">Открытка с QR-кодом и деталями</div>
              <div class="inside_content-right-item-description">В каждой коробке — фирменная открытка с QR-кодом. По
                нему — рецепты, описание вкусов, информация об обжарщиках и регионах, включая секретный лот.</div>
            </div>
          </div>
          <button class="button button_inside">
            <span class="button-text button-inside-text">к продукции</span>
          </button>
        </div>
      </div>
    </div>
    </div>
  </section>
  <section class="partners">
    <div class="container">
      <div class="partners_title">НАШИ ПАРТНЕРЫ В РОССИИ,<br> ГЕРМАНИИ, КАЗАХСТАНЕ, БЕЛАРУСИ</div>
      <div class="partners_content">
        <div class="partners_swiper swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="<?php echo get_template_directory_uri(); ?>/images/partner.png" alt="Partner 1">
            </div>
            <div class="swiper-slide">
              <img src="<?php echo get_template_directory_uri(); ?>/images/partner.png" alt="Partner 2">
            </div>
            <div class="swiper-slide">
              <img src="<?php echo get_template_directory_uri(); ?>/images/partner.png" alt="Partner 3">
            </div>
            <div class="swiper-slide">
              <img src="<?php echo get_template_directory_uri(); ?>/images/partner.png" alt="Partner 4">
            </div>
          </div>
          <div class="swiper-scrollbar"></div>

        </div>
      </div>
    </div>
  </section>
  <article class="subscribe">
    <div class="container container_subscribe">
      <div class="subscribe_left">
        <img src="<?php echo get_template_directory_uri(); ?>/images/subscribe-bg.png">
      </div>
      <div class="subscribe_right">
        <div class="subscribe_content">
          <div class="subscribe_title">ВСЕ ПРОСТО - <br>ОФОРМИТЬ ПОДПИСКУ <br>GO BREW</div>
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
