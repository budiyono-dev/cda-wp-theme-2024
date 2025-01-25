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
            <svg xmlns="http://www.w3.org/2000/svg" width="30px" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/></svg>
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

