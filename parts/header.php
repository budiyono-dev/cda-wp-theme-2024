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
    <i class="fa-solid fa-bars fa-2xl"></i>
<!--    <div class="menu-toggle">
        <div class="bar-ham"></div>
        <div class="bar-ham"></div>
        <div class="bar-ham"></div>
    </div>
    </div> -->
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

