<?php get_header(); ?>
<main class="content">
    <section class="home-page">
        <div class="header-home-page">
            <h2>Artikel</h2>
            <div class="search-form-container">
                <?php get_search_form(); ?>
            </div>
            <nav class="categories">
                <?php
                wp_nav_menu([
                    'theme_location' => 'home_slide_menu',
                    'container_id'   => '',
                    'container'      => '', 
                    'fallback_cb'    => 'cda_fallback_category_menu_home',
                    'depth'          => 1,
                ]);
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
                    
                    <div class="tags">
                        <div class="icon-tag">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M0 80V229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7H48C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/>
                                </svg>
                            </span>
                        </div>
                        <?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <h2>Opps... Hasil Tidak Ditemukan...</h2>
        <?php endif; ?>
    </section>
</main>
<?php the_posts_pagination(array('mid_size' => 2)); ?>
<?php get_footer(); ?>