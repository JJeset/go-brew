<?php

/**
 * Template Name: Главная
 * Description: A custom template for a specific page.
 */
get_header(); ?>

<main id="primary" class="site-main">

  <div class="intro">
    <div class="container">
      <div class="intro-up"></div>
      <h1 class="intro-title">Каждый месяц — <br>новое кофейное <br>открытие</h1>

    </div>
    <img class="intro-wave" src="<?php echo get_template_directory_uri(); ?>/images/wave-effect.svg">
  </div>

  <?php the_content(); ?>
</main>

<?php get_sidebar();
get_footer();
