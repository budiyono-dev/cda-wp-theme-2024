<div class="footer">
    <?php
    wp_nav_menu([
        'theme_location' => 'secondary',
        'container_id'   => 'secondary-navbar',
        'container'      => 'nav',
        'fallback_cb'    => '__return_false',
        'depth'          => 3,
    ]);
    ?>
    <footer class="copy">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
        </footer>
    </div>

</div>
    <?php wp_footer(); ?>
</body>

</html>