<header>
    <h1><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></h1>
    <p><?php bloginfo('description'); ?></p>
    <nav>
        <?php wp_nav_menu(array('theme_location' => 'header-menu')); ?>
    </nav>
</header>
