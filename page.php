
<?php get_header(); ?>

<section>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article>
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </article>
    <?php endwhile; else : ?>
        <p>No pages found</p>
    <?php endif; ?>
</section>

<?php get_footer(); ?>
