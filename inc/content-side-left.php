<section class="side-left-content">
    <ul>
    <?php if (is_active_sidebar('main-sidebar')) : ?>
        <?php dynamic_sidebar('main-sidebar'); ?>
    <?php endif; ?>
    </ul>
</section>