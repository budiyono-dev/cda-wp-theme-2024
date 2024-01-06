<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="container">
        <header class="main-header">
            <?php if (is_home()) : ?>
                <h1 class="brand">
                    <a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a>
                </h1>
            <?php else : ?>
                <p class="brand">
                    <a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a>
                </p>
            <?php endif; ?>
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container_id'   => 'main-navbar',
                'container'      => 'nav',
                'fallback_cb'    => '__return_false',
                'depth'          => 1,
            ]);
            ?>
        </header>

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
                                    <time datetime="<?php echo the_time('Y-m-d') ?>">
                                        Di buat pada :  <?php echo the_time('d F Y') ?>,
                                    </time>
                                    <time datetime="<?php echo the_modified_time('Y-m-d') ?>">
                                        di sunting pada : <?php echo the_modified_time('d F Y') ?>
                                    </time>
                                </p>
                                </div>
                                <?php the_content(); ?>
                                <?php wp_link_pages(); ?>
                            </article>
                        <?php else : ?>
                            <article class="card-post" <?php post_class(); ?>>
                                <?php the_title('<h2 class="title-list"><a href="' . get_permalink() . '">', '</a></h2>'); ?>
                                <p class="excerpt">
                                    <?php echo get_the_excerpt() ?>
                                </p>
                                <p class="time-post">
                                    <time datetime="<?php echo the_time('Y-m-d') ?>">
                                        Di buat pada :  <?php echo the_time('d F Y') ?>,
                                    </time>
                                    <time datetime="<?php echo the_modified_time('Y-m-d') ?>">
                                        di sunting pada : <?php echo the_modified_time('d F Y') ?>
                                    </time>
                                </p>

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
        <footer class="footer">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
        </footer>
    </div>
    <?php wp_footer(); ?>
</body>

</html>
