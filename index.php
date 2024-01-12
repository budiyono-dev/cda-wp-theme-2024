<?php get_header(); ?>
<main class="content">
    <?php get_template_part('inc/content','side-left');?>
    <section class="main-content">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="card-post" <?php post_class(); ?>>
                    <?php the_title('<h2 class="title-list"><a href="' . get_permalink() . '">', '</a></h2>'); ?>
                    <p class="excerpt">
                        <?php echo get_the_excerpt() ?>
                    </p>
                    <p class="time-post">
                        <time datetime="<?php the_time('Y-m-d') ?>">
                            Di buat pada : <?php the_time('d F Y') ?>,
                        </time>
                        <time datetime="<?php the_modified_time('Y-m-d') ?>">
                            di sunting pada : <?php the_modified_time('d F Y') ?>,
                        </time>
                            Oleh : <?php the_author(); ?>
                    </p>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <h2>Opps... Hasil Tidak Ditemukan...</h2>
        <?php endif; ?>
    </section>
    <?php get_template_part('inc/content','side-right');?>
</main>
<?php the_posts_pagination(array('mid_size' => 2)); ?>
<?php get_footer(); ?>