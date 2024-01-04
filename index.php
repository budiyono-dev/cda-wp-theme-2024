<?php get_header(); ?>

<section>
    <h2>Blog Posts</h2>
    <div class="main-content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php the_content(); ?>
            </article>
        <?php endwhile; else : ?>
            <p>No posts found</p>
        <?php endif; ?>
    </div>
    <?php get_template_part('navbar'); ?>
</section>

<?php get_footer(); ?>
