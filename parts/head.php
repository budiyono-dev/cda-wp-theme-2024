<head>
    <?php
        $title;
        if (is_home()) {
            $title = 'Home';
        } elseif (is_category()) {
            $title = get_the_category()[0]->name;
        } elseif (is_tag()) {
            $title = get_the_tags()[0]->name;
        } elseif (is_archive()) {
            $title = strip_tags(get_the_archive_title());
        } else {
            $title = get_the_title();
        }
        
        if (is_null($title)) {
            $title = '';
        }
        $title = $title.' - '.get_bloginfo('name') . ' - '.get_bloginfo('description');
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?></title>
    <?php wp_head(); ?>
</head>
