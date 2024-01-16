<div class="footer">
    <nav class="footer-categories">
    <?php wp_list_categories(
        array(
            'depth'     => 3,
            'title_li'  => '',
            'hide_empty' => 0,
            'exclude'    => array( 1 )
        )); 
    ?>
    </nav>
    <footer class="copy">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
        </footer>
    </div>

</div>
    <?php wp_footer(); ?>
</body>

</html>