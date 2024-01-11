<?php get_header(); ?>
<main class="content">
    <section class="side-left-content">
        <p>PENCARIAN</p>
    </section>
    <section class="main-content">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php if (is_singular()) : ?>
                    <article class="cda-single-post" <?php post_class(); ?>>
                        <div class="blok-title">
                        <?php the_title('<h1 class="title-article">', '</h1>'); ?>
                        <p class="time-post">
                            Oleh : <i><?php the_author(); ?></i>,
                            <time datetime="<?php the_time('Y-m-d') ?>">
                                Di buat pada :  <?php the_time('d F Y') ?>,
                            </time>
                            <time datetime="<?php the_modified_time('Y-m-d') ?>">
                                di sunting pada : <?php the_modified_time('d F Y') ?>
                            </time>
                        </p>
                        </div>
                        <?php the_content(); ?>
                    </article>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    <section class="side-right-content">
        <P>DAFTAR ISI</P>
    </section>
</main>
<?php the_posts_pagination(array('mid_size' => 2)); ?>
<?php get_footer(); ?>