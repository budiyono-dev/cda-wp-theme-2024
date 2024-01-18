<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php 
        $title;
        if (is_home()) {
            $title = 'Home';
        } else if (is_category()) {
            $title = get_the_category()[0]->name;
        } else if (is_tag()) {
            $title = get_the_tags()[0]->name;
        } else if (is_archive()) {
            $title = strip_tags(get_the_archive_title());
        }else {
            $title = get_the_title();
        }
        // var_dump($title);
        if (is_null($title)) {
            $title = '';
        }
        $title = $title.' - '.get_bloginfo('name') . ' - '.get_bloginfo('description');
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <meta name="robots" content="index, follow, max-image-preview:large">
    <title><?php echo $title ?></title>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="container">
        <header class="main-header">
            <div class="brand-menu">
            <?php if (is_home()) : ?>
                <h1 class="brand">
                    <a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a>
                </h1>
            <?php else : ?>
                <p class="brand">
                    <a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a>
                </p>
            <?php endif; ?>
            <div class="menu-toggle">
                <div class="bar-ham"></div>
                <div class="bar-ham"></div>
                <div class="bar-ham"></div>
            </div>
            </div>
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

