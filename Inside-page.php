<?php

/**
 * Template Name: Внутри бокса
 * Description: A custom template for a specific page.
 */
get_header(); ?>

<main id="primary" class="inside-main">
  <article class="breadcrumbs-art">
    <div class="container">
      <?php mytheme_breadcrumbs(); ?>
    </div>
  </article>
  <section class="lots">
    <div class="container">
      <div class="lots_title">
        МЫ ВЫБРАЛИ СЛЕДУЮЩИЕ ЛОТЫ
      </div>
      <div class="lots_list">
        <div class="lots_item">
          <img class="lots_item-img" src="<?php echo get_template_directory_uri(); ?>/images/cup_cofee1.png" alt="">
          <div class="lots_item-right">
            <div class="lots_item-title">Из мелочей складывается картина
            </div>
            <div class="lots_item-text">Мы отбираем только те лоты, в качестве которых уверены. В подборке — как
              известные
              обжарщики, так и небольшие производства из России и мира. Всё — через строгий отбор сертифицированного
              Q-грейдера.
            </div>
          </div>

        </div>
        <div class="lots_item">
          <img class="lots_item-img" src="<?php echo get_template_directory_uri(); ?>/images/cup_cofee2.png" alt="">
          <div class="lots_item-right">
            <div class="lots_item-title">Из мелочей складывается картина
            </div>
            <div class="lots_item-text"> Мы отбираем только те лоты, в качестве которых уверены. В подборке — как
              известные обжарщики, так и небольшие производства из России и мира. Всё — через строгий отбор
              сертифицированного Q-грейдера.
            </div>
          </div>
        </div>
      </div>
      <div class="manufacturer_content">
        <div class="manufacturer_item">
          <h1 class="manufacturer_title">
            Производитель номер 1 складывается картина
          </h1>
          <div class="manufacturer_text">
            Каждый месяц — два лота из разных городов и стран, обжаренных специально под фильтр. Подходят для любого
            метода заваривания: от классической воронки и кемекса до турки и аэропресса.Каждый месяц — два лота из
            разных городов и стран, обжаренных специально под фильтр. Подходят для любого метода заваривания: от
            классической воронки и кемекса до турки и аэропресса.
          </div>
        </div>
        <div class="manufacturer_item">
          <h1 class="manufacturer_title">
            Производитель номер 2 складывается картина
          </h1>
          <div class="manufacturer_text">
            Каждый месяц — два лота из разных городов и стран, обжаренных специально под фильтр. Подходят для любого
            метода заваривания: от классической воронки и кемекса до турки и аэропресса.Каждый месяц — два лота из
            разных городов и стран, обжаренных специально под фильтр. Подходят для любого метода заваривания: от
            классической воронки и кемекса до турки и аэропресса.
          </div>
        </div>
      </div>
      <button class="manufacturer_button button">
        <div class="manufacturer_button-text">SECRET LOT</div>

      </button>



    </div>

  </section>
  <div class="container"><span class="sepparator"></span></div>
  <section class="how-works">
    <div class="container">
      <div class="how-works_title">
        Как это работает?
      </div>
      <div class="how-works_list">
        <div class="how-works_item">
          <span class="how_works-step"><img class="how_works-img"
              src="<?php echo get_template_directory_uri(); ?>/images/step1.svg" alt=""></span>
          <div class="how-works_item-title">
            Оформляете подписку
          </div>
          <div class="how-works_item-text">
            Регистрируетесь на сайте, выбираете подписку и оплачиваете 3000 ₽ в месяц. Подключается автоплатёж — каждый
            месяц 15-го числа с вашей карты будет списываться сумма подписки. Отключить её можно в личном кабинете, в
            разделе «Настройки».
          </div>
        </div>
        <div class="how-works_item">
          <span class="how_works-step"><img class="how_works-img"
              src="<?php echo get_template_directory_uri(); ?>/images/step2.svg" alt=""></span>
          <div class="how-works_item-title">
            Получаете посылку
          </div>
          <div class="how-works_item-text">
            17-го числа каждого месяца мы отправляем ваш бокс с кофе транспортной компанией до ближайшего к вам
            отделения. Уведомление об отправке придёт вам заранее.
          </div>
        </div>
        <div class="how-works_item">
          <span class="how_works-step"><img class="how_works-img"
              src="<?php echo get_template_directory_uri(); ?>/images/step3.svg" alt=""></span>
          <div class="how-works_item-title">
            Завариваете, пробуете, открываете новое
          </div>
          <div class="how-works_item-text">
            Внутри — два отборных лота, плюс один — секретный. Каждый месяц вас ждёт новое вкусовое приключение, новая
            обжарка и новая кофейная история. Также есть система лояльности - Если вы наш подписчик 6 месяцев подряд, мы
            дарим скидку 10%, если 12 месяцев подряд то 20%. Ваша история подписок сохраняется в личном кабинете.
          </div>
        </div>
      </div>
    </div>
  </section>
  <article class="formalize">
    <div class="container container_formalize">
      <div class="formalize_price">
        3000 ₽
      </div>
      <button class="button_formalize button">
        <span>Оформить</span>
      </button>
  </article>
  <section class="faq">
    <div class="container">
      <div class="faq_title">
        Вопросы и ответы
      </div>
      <div class="faq_list">
        <div class="faq_item">
          <div class="faq_item-title">
            Cтоимость доставки входит в стоимость подписки?
          </div>

          <div class="faq_item-text">
            Нет, стоимость доставки не включена. География у нас широкая, и невозможно установить единую фиксированную
            цену на доставку. Это решение позволяет нам сосредоточиться на главном — отборе по-настоящему
            качественных кофейных зёрен.
          </div>
        </div>
        <div class="faq_item">
          <div class="faq_item-title">
            Можно ли временно заморозить или отменить подписку?
          </div>
          <div class="faq_item-text">
            Конечно. В личном кабинете можно поставить подписку на паузу или отменить её в любой момент. Перерыв до 1
            месяца не повлияет на вашу лояльность — при возвращении всё продолжит накапливаться, как прежде.
          </div>
        </div>
        <div class="faq_item">
          <div class="faq_item-title">
            Когда отправляется кофе?
          </div>

        </div>
        <div class="faq_item">
          <div class="faq_item-title">
            Куда вы доставляете?
          </div>

        </div>
        <div class="faq_item">
          <div class="faq_item-title">
            Сколько кофе я получу?
          </div>

        </div>
        <div class="faq_item">
          <div class="faq_item-title">
            Кофе приходит в зёрнах?
          </div>

        </div>

  </section>
  <section class="contact">
    <div class="container container_contact">
      <div class="contact_title">
        Остались вопросы?
      </div>
      <div class="contact_text">
        С радостью ответим и проконсультируем
      </div>
      <button class="contact_button button">
        <span>Контакты</span>
      </button>
    </div>


  </section>
  <section class="around">
    <div class="container">
      <div class="around-up">
        <div class="around-up-title">
          Наш кофейный кружок GO BREW
        </div>
        <button href="/Blog-page.php" class="around-blog-button button">
          Все блоги
        </button>
      </div>
      <div class="around_content">
        <?php
        // Различные варианты использования шорткода:

        // Базовый вариант - показать последние 8 статей
        // echo do_shortcode('[custom_articles_grid]');

        // Можно указать количество статей и колонок
        echo do_shortcode('[custom_articles_grid posts_per_page="4" columns="4" show_load_more="false"]');

        // Можно показать статьи определенной категории
        // echo do_shortcode('[custom_articles_grid category="coffee" posts_per_page="8"]');

        // Можно отключить кнопку "Показать еще"
        // echo do_shortcode('[custom_articles_grid show_load_more="false"]');
        ?>
      </div>
    </div>
  </section>

  <?php the_content(); ?>
</main>

<?php get_sidebar();
get_footer();
