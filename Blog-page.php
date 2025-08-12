<?php

/**
 * Template Name: Статьи (сетка)
 * 
 */

get_header(); ?>

<section class="blog">
  <div class="blog-container">
    <div class="container">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <div class="page-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <?php if (get_the_content()) : ?>
              <div class="page-description">
                <?php the_content(); ?>
              </div>
            <?php endif; ?>
          </div>
      <?php endwhile;
      endif; ?>

      <!-- Вызов шорткода для отображения статей -->
      <?php
      // Различные варианты использования шорткода:

      // Базовый вариант - показать последние 8 статей
      // echo do_shortcode('[custom_articles_grid]');

      // Можно указать количество статей и колонок
      echo do_shortcode('[custom_articles_grid posts_per_page="12" columns="4"]');

      // Можно показать статьи определенной категории
      // echo do_shortcode('[custom_articles_grid category="coffee" posts_per_page="8"]');

      // Можно отключить кнопку "Показать еще"
      // echo do_shortcode('[custom_articles_grid show_load_more="false"]');
      ?>

    </div>
  </div>
</section>

<!-- <style>
  .articles-page-container {
    padding: 40px 0;
    background: #f8f9fa;
    min-height: 70vh;
  }

  .page-header {
    text-align: center;
    margin-bottom: 40px;
  }

  .page-title {
    font-size: 2.5em;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
  }

  .page-description {
    font-size: 1.1em;
    color: #7f8c8d;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
  }

  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
  }

  @media (max-width: 768px) {
    .page-title {
      font-size: 2em;
    }

    .page-description {
      font-size: 1em;
    }

    .articles-page-container {
      padding: 20px 0;
    }
  }
</style> -->

<?php get_footer(); ?>