<?php get_header(); ?>

<section>
    <h2>Latest Posts</h2>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php the_excerpt(); ?></p>
            <p><a href="<?php the_permalink(); ?>">Read more</a></p>
        </article>
    <?php endwhile; else : ?>
        <p>No posts found</p>
    <?php endif; ?>
</section>

<?php get_footer(); ?>
