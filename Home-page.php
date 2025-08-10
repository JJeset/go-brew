<?php

/**
 * Template Name: Главная
 * Description: A custom template for a specific page.
 */
get_header(); ?>

<main id="primary" class="site-main">

  <div class="intro">
    <div class="container main-container">
      <div class="intro-text">
        <h1 class="intro-title">Каждый месяц — <br>новое кофейное <br>открытие</h1>
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
  </div>

  <?php the_content(); ?>
</main>

<?php get_sidebar();
get_footer();
