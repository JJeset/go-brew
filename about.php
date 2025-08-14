<?php

/**
 * Template Name: О нас
 * Description: A custom template for a specific page.
 */
get_header(); ?>

<article class="breadcrumbs-art">
  <div class="container">
    <?php mytheme_breadcrumbs(); ?>
  </div>
</article>

<main id="primary" class="about-main">

  <section class="about_intro-section">
    <div class="container cointainer_about">

      <div class="about_intro">
        <div class="about_intro-left">
          <h1 class="about_intro-title">
            <?php the_title(); ?> </h1>
          <div class="about_intro-text">
            Как это часто бывает с вещами, которые становятся по-настоящему важными — всё началось почти случайно.
            Одно
            утро в кофейне в Омске, первые шаги за стойкой бариста, первые глотки чёрного кофе, за которыми стояли
            слова вроде «Эфиопия», «натуральная обработка» и «ягоды в послевкусии». Тогда я этого почти не понимал:
            любой кофе казался просто насыщенным и горьковатым. Но спустя пару лет поймал себя на мысли, что уже не
            различаю, где заканчивается работа и начинается личное. Кофе стал не просто частью повседневности — он
            стал
            её смыслом, её ритмом, её стилем.

            <p class="gap10">
              Меня зовут Влад. Я в кофе с 2014 года. За это время успел поработать тренеромбариста, обучить более
              500
              человек в самых разных проектах — от маленьких кофеен до крупных сетей. Участвовал в чемпионатах,
              выходил
              в финалы, поднимался на пьедестал. Потом перешёл на сторону судей — чтобы лучше слышать и точнее
              понимать.
              В 2023 году получил международную сертификацию Q Grader — и с тех пор имею право профессионально
              оценивать
              кофе и говорить о нём на одном языке с кофейными специалистами со всего мира.
            </p>
          </div>
        </div>
        <div class="about_intro-right">
          <div class="about_intro-img">
            <div class="about_intro-img-front"><img
                src="<?php echo get_template_directory_uri(); ?>/images/about_intro-img-front.png" alt="Стенд с кофе">
            </div>
            <div class="about_intro-img-back"><img
                src="<?php echo get_template_directory_uri(); ?>/images/about_intro-img-back.png"
                alt="Рисунок на латте">
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <div class="container"><span class="sepparator-about"></span></div>
  <section class="about_born">
    <div class="container container_born">
      <div class="about_born-left">
        <div class="about_born-img">
          <div class="about_born-img-front">
            <img src="<?php echo get_template_directory_uri(); ?>/images/about_born-img-front.png"
              alt="Пачки кофе на прилавке">
          </div>
          <div class="about_born-img-back"><img
              src="<?php echo get_template_directory_uri(); ?>/images/about_born-img-back.png" alt="Прилавок с кофе">
          </div>

        </div>
      </div>
      <div class="about_born-right">
        <h2 class="about_born-title">
          Так родился Go Brew
        </h2>
        <div class="about_born-text">
          За последние пять лет я побывал более чем в 30 городах России и в десятках стран — от Германии и Франции до
          Гватемалы, Турции и США. Где бы я ни оказывался, первым делом шёл в кофейни. Искал. Пробовал. Сравнивал.
          Наставил сотни меток в Google Maps. Разговаривал с бариста, управляющими, обжарщиками — с теми, кто живёт
          кофе, кто вкладывает в него свою экспертизу и свою душу. В итоге в голове сложилась огромная картотека
          вкусов, подходов, ароматов, имён и историй. Настолько большая, что ей захотелось выйти наружу.
          <p class="gap10">
            Подписка, в которую собирается лучшее из того, что я встречаю. Кофе, который по-настоящему зацепил. Кофе, за
            которым стоит не просто логотип, а идея, ремесло, характер. Тут нет зависимости от брендов и громких имён.
            Есть только вкус. Только те зёрна, которые я хочу пить сам. Которые хочется открывать утром. Которые
            остаются в памяти.
          </p>
          <p class="gap10">
            Каждое издание подписки — это маленькое кофейное путешествие. Отдалённые фермы, разные стили обжарки,
            неожиданные страны. Мы не просто собираем зёрна — мы собираем атмосферу. Потому что кофе — это не только
            напиток. Это мост между людьми.
          </p>
          <p class="gap10">
            Спасибо, что заглянули. Добро пожаловать в Go Brew — проект, к которому я шёл много лет. Уверен, впереди нас
            ждёт много выдающихся чашек.
          </p>
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
