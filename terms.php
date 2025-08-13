<?php

/**
 * Template Name: Пользовательское соглашение
 * Description: A custom template for a specific page.
 */
get_header(); ?>

<article class="breadcrumbs-art">
  <div class="container">
    <?php mytheme_breadcrumbs(); ?>
  </div>
</article>

<main id="primary" class="privacy-policy">

  <section class="privacy-policy_section">
    <div class="container">
      <h1 class="how-works_title"><?php the_title(); ?></h1>
    </div>
  </section>
  <?php the_content(); ?>
</main>

<?php get_sidebar();
get_footer();
