<?php

/**
 * Шаблон одиночной статьи
 * Замените существующий single.php или создайте новый
 */

get_header(); ?>

<article class="breadcrumbs-art">
  <div class="container">
    <?php mytheme_breadcrumbs(); ?>
  </div>
</article>

<?php if (has_post_thumbnail()) : ?>
  <div class="featured-image">
    <?php the_post_thumbnail('full'); ?>
  </div>
<?php endif; ?>
<section class="single-post">
  <div class="single-article-container container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


        <!-- Основное содержимое статьи -->

        <!-- Блок "Смотрите также" -->
        <div class="related-articles">
          <div class="container">
            <article class="single-article">


              <!-- Заголовок статьи -->
              <div class="article-name">

                <div class="article-meta">
                  <time class="article-date-single" datetime="<?php echo get_the_date('c'); ?>">
                    <?php echo get_the_date('j M Y'); ?>
                  </time>

                  <h1 class="article-title-sigle"><?php the_title(); ?></h1>


                </div>
              </div>

              <!-- Содержимое статьи -->
              <div class="article-content">
                <div class="content-wrapper">
                  <?php the_content(); ?>

                  <!-- Пагинация для многостраничных статей -->
                  <?php
                  wp_link_pages(array(
                    'before' => '<div class="page-links">',
                    'after' => '</div>',
                  ));
                  ?>

                  <!-- Теги статьи -->
                  <?php if (has_tag()) : ?>
                    <div class="article-tags">
                      <strong>Теги:</strong>
                      <?php the_tags('', ', ', ''); ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>

              <!-- Навигация между статьями -->



            </article>

            <a onclick="history.back()" class="button button_back">Вернуться</a>
            <h2 class="section-title-single">СМОТРИТЕ ТАКЖЕ</h2>

            <?php
            echo do_shortcode('[custom_articles_grid posts_per_page="4" columns="4" show_load_more="false"]');
            ?>
          </div>
        </div>

    <?php endwhile;
    endif; ?>
  </div>
</section>

<script>
  // function shareArticle() {
  //   if (navigator.share) {
  //     navigator.share({
  //       title: document.title,
  //       url: window.location.href
  //     });
  //   } else {
  //     // Fallback - копируем ссылку в буфер обмена
  //     navigator.clipboard.writeText(window.location.href).then(function() {
  //       alert('Ссылка скопирована в буфер обмена!');
  //     });
  //   }
  // }
</script>

<?php get_footer(); ?>