<?php

/**
 * Шаблон одиночной статьи
 * Замените существующий single.php или создайте новый
 */

get_header(); ?>

<div class="single-article-container">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <!-- Хлебные крошки (опционально) -->


      <!-- Основное содержимое статьи -->
      <article class="single-article">
        <div class="container">

          <!-- Заголовок статьи -->
          <div class="article-name">
            <?php if (has_post_thumbnail()) : ?>
              <div class="featured-image">
                <?php the_post_thumbnail('large', array('class' => 'hero-image')); ?>
              </div>
            <?php endif; ?>

            <div class="article-meta">
              <time class="article-date" datetime="<?php echo get_the_date('c'); ?>">
                <?php echo get_the_date('j M Y'); ?>
              </time>

              <h1 class="article-title"><?php the_title(); ?></h1>


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
          <nav class="post-navigation">
            <div class="nav-links">
              <?php
              $prev_post = get_previous_post();
              $next_post = get_next_post();

              if ($prev_post) : ?>
                <div class="nav-previous">
                  <a href="<?php echo get_permalink($prev_post); ?>" rel="prev">
                    <span class="nav-subtitle">← Предыдущая статья</span>
                    <span class="nav-title"><?php echo get_the_title($prev_post); ?></span>
                  </a>
                </div>
              <?php endif;

              if ($next_post) : ?>
                <div class="nav-next">
                  <a href="<?php echo get_permalink($next_post); ?>" rel="next">
                    <span class="nav-subtitle">Следующая статья →</span>
                    <span class="nav-title"><?php echo get_the_title($next_post); ?></span>
                  </a>
                </div>
              <?php endif; ?>
            </div>
          </nav>

        </div>
      </article>

      <!-- Блок "Смотрите также" -->
      <section class="related-articles">
        <div class="container">
          <h2 class="section-title">СМОТРИТЕ ТАКЖЕ</h2>

          <?php
          // Получаем похожие статьи
          $categories = get_the_category();
          if ($categories) {
            $category_ids = array();
            foreach ($categories as $category) {
              $category_ids[] = $category->term_id;
            }

            $args = array(
              'category__in' => $category_ids,
              'post__not_in' => array(get_the_ID()),
              'posts_per_page' => 4,
              'ignore_sticky_posts' => 1
            );

            $related_posts = new WP_Query($args);

            if ($related_posts->have_posts()) : ?>
              <div class="related-posts-grid">
                <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                  <div class="related-post-card">
                    <div class="related-post-date">
                      <?php echo get_the_date('j M Y'); ?>
                    </div>
                    <div class="related-post-content">
                      <h3 class="related-post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      </h3>
                      <div class="related-post-excerpt">
                        <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
                      </div>
                      <a href="<?php the_permalink(); ?>" class="related-read-more">
                        ЧИТАТЬ ПОДРОБНЕЕ
                      </a>
                    </div>
                    <?php if (has_post_thumbnail()) : ?>
                      <div class="related-post-image">
                        <a href="<?php the_permalink(); ?>">
                          <?php the_post_thumbnail('medium', array('class' => 'related-thumb')); ?>
                        </a>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endwhile; ?>
              </div>
          <?php wp_reset_postdata();
            endif;
          }
          ?>
        </div>
      </section>

  <?php endwhile;
  endif; ?>
</div>

<script>
  function shareArticle() {
    if (navigator.share) {
      navigator.share({
        title: document.title,
        url: window.location.href
      });
    } else {
      // Fallback - копируем ссылку в буфер обмена
      navigator.clipboard.writeText(window.location.href).then(function() {
        alert('Ссылка скопирована в буфер обмена!');
      });
    }
  }
</script>

<?php get_footer(); ?>