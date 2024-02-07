<?php get_header(); ?>
<main class="content">
    <?php get_template_part('inc/content', 'side-left'); ?>
    <section class="main-content">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php if (is_singular()) : ?>
                    <article class="cda-single-post" <?php post_class(); ?>>
                        <?php the_title('<h1 class="title-article">', '</h1>'); ?>
                        <?php the_content(); ?>

                        <div class="footer-article">
                            <?php if (has_category()) : ?>
                                <div class="categories">
                                    <span>Kategori : </span><?php the_category(', '); ?>
                                </div>
                            <?php endif; ?>
                            <?php
                            the_tags(
                                '<div class="tags"><span>Tags : </span>',
                                ', ',
                                '</div>'
                            );
                            ?>
                            <div class="post-properties">
                                <span>
                                    Oleh : <?php the_author(); ?>, 
                                    diterbitkan : <time datetime="<?php the_time('Y-m-d') ?>"><?php the_time('d F Y') ?></time>
                                    disunting : <time datetime="<?php the_modified_time('Y-m-d') ?>"><?php the_modified_time('d F Y') ?></time>
                                </span>
                            </div>
                        </div>
                        <div class="pagination-single-post">
                            <?php previous_post_link('<div class="next-prev-flex prev-post">Sebelumnya%link</div>'); ?>
                            <?php next_post_link('<div class="next-prev-flex next-post">Berikutnya%link</div>'); ?>
                        </div>
                    </article>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    <?php get_template_part('inc/content', 'side-right'); ?>
</main>
<?php the_posts_pagination(array('mid_size' => 2)); ?>
<?php get_footer(); ?>