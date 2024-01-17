<?php get_header(); ?>
<main class="content">
    <section class="home-page">
        <div class="header-home-page">
            <h2>Artikel</h2>
            <div class="search-form-container">
                <?php get_search_form(); ?>
            </div>
            <nav class="categories">
                <?php wp_list_categories(
                    array(
                        'depth'     => 3,
                        'title_li'  => '',
                        'hide_empty' => 0,
                        'exclude'    => array( 1 )
                    )); 
                ?>
            </nav>
        </div>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="card-post" <?php post_class(); ?>>
                    <?php the_title('<h2 class="title-list"><a href="' . get_permalink() . '">', '</a></h2>'); ?>
                    <p class="excerpt">
                        <?php echo get_the_excerpt();?>
                    </p>
                    
                    <?php
                    the_tags(
                        '<div class="tags"><span class="dashicons dashicons-tag"></span>',
                        ' ',
                        '</div>'
                    );
                    ?>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <h2>Opps... Hasil Tidak Ditemukan...</h2>
        <?php endif; ?>
    </section>
</main>
<?php the_posts_pagination(array('mid_size' => 2)); ?>
<?php get_footer(); ?>