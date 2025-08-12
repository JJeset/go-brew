<?php

/**
 * Template Name: Блог
 * 
 */

get_header(); ?>
<article class="breadcrumbs-art">
  <div class="container">
    <?php mytheme_breadcrumbs(); ?>
  </div>
</article>
<section class="blog">

  <div class="container">


    <div class="blog_content-header">
      <h1 class="blog_content-title">кофейный кружок GO BREW!</h1>
      <div class="blog_content-description">
        Здесь делимся всем, что накапливается между чашками: историями партнёров, заметками о кофе, рецептами,
        наблюдениями, новостями и просто хорошими словами. Устраивайтесь поудобнее — впереди много вкусного.
      </div>

    </div>
    <div class="blog_grid">


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


<?php get_footer(); ?>