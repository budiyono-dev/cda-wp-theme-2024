<?php get_header(); ?>
<main class="content">
    <?php get_template_part('inc/content','side-left');?>
    <section class="main-content">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php if (is_singular()) : ?>
                    <article class="cda-single-post" <?php post_class(); ?>>
                        <div class="blok-title">
                        <?php the_title('<h1 class="title-article">', '</h1>'); ?>
                        </div>
                        <?php the_content(); ?>
                    </article>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    <?php get_template_part('inc/content','side-right');?>
</main>
<?php the_posts_pagination(array('mid_size' => 2)); ?>
<?php get_footer(); ?>
