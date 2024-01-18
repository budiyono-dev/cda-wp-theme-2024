<?php get_header(); ?>
<main class="content">
    <section class="not-found">
        <h2>Opps... Hasil Tidak Ditemukan...</h2>
    </section>
</main>
<?php the_posts_pagination(array('mid_size' => 2)); ?>
<?php get_footer(); ?>