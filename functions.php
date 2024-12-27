<?php

function get_cda_env()
{
    return [
        'mode' => 'development',
    ];
}

function enqueue_styles()
{
    $dir = get_cda_env()['mode'] === 'development' ? '/assets/css/style.css' : '/dist/style.css';
    wp_register_style('cda-style', get_template_directory_uri() . $dir, array(), false);
    wp_enqueue_style('cda-style');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function load_js()
{
    $dir = get_cda_env()['mode'] === 'development' ? '/assets/js/index.js' : '/dist/index.min.js';
    $scripts = array(
        'main' => $dir,
        'fabrand' => '/assets/fontawesome/js/brands.min.js',
        'fasolid' => '/assets/fontawesome/js/solid.min.js',
        'fa' => '/assets/fontawesome/js/fontawesome.min.js'
    );

    foreach ($scripts as $key => $s) {
        wp_register_script($key, get_template_directory_uri() . $s, array('jquery'), false, true);
        wp_enqueue_script($key);
    }
}
add_action('wp_enqueue_scripts', 'load_js');

function register_menus()
{
    register_nav_menus(
        array(
            'primary' => 'Header Menu',
            'secondary' => 'Footer Menu',
            'home_slide_menu' => 'Home Slide Menu',
        )
    );
}
add_action('init', 'register_menus');

function cda_sidebar()
{
    register_sidebar(
        array(
            'name' => 'Primary Sidebar',
            'id' => 'main-sidebar',
            'description' => 'sidebar sebelah kiri'
        )
    );

    register_sidebar(
        array(
            'name' => 'Secondary Sidebar',
            'id' => 'secondary-sidebar',
            'description' => 'sidebar sebelah kanan'
        )
    );

    register_sidebar(
        array(
            'name' => 'Home Sidebar',
            'id' => 'home-sidebar',
            'description' => 'sidebar sebelah kanan home'
        )
    );
}

add_action('widgets_init', 'cda_sidebar');

function my_theme_excerpt_more($more)
{
    global $post;
    return '&hellip;' . '<a href="' . get_permalink($post->ID) . '">' . __('Baca selengkapnya') . '</a>';
}
add_filter('excerpt_more', 'my_theme_excerpt_more');

function cda_fallback_category_menu_home()
{
    echo '<ul>';
    wp_list_categories(
        array(
            'depth'     => 3,
            'title_li'  => '',
            'hide_empty' => 0,
            'exclude'    => array(1)
        )
    );

    echo '</ul>';
}

function cda_register_member_menu()
{
    if (current_user_can('administrator')) {
        $cap = 'manage_options';
        $parentSlug = 'member-management';

        add_menu_page('Member Management', 'Members', $cap, $parentSlug, '', 'dashicons-groups');
        add_submenu_page($parentSlug,'Member','Member',$cap, $parentSlug, 'cda_member_page');
        add_submenu_page($parentSlug,'Payment','Payment',$cap, 'my-menu-2', 'cda_member_page');
    }
}
add_action('admin_menu', 'cda_register_member_menu');

function cda_member_page()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'members';

    // Handle form submissions
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'add_member') {
            $wpdb->insert($table_name, [
                'name' => sanitize_text_field($_POST['name']),
                'email' => sanitize_email($_POST['email']),
            ]);
        } elseif ($_POST['action'] == 'delete_member') {
            $wpdb->delete($table_name, ['id' => intval($_POST['id'])]);
        }
    }

    // Retrieve members
    $members = $wpdb->get_results("SELECT * FROM $table_name");

    echo '<div class="wrap"><h1 class="wp-heading-inline">Member Management</h1>';
    echo '<form method="post" class="form-add-member">';
    wp_nonce_field('cda_create_member_action');
    echo '<input type="hidden" name="action" value="add_member">';
    echo '<input type="text" name="name" placeholder="Name" required>';
    echo '<input type="email" name="email" placeholder="Email" required>';
    echo '<button type="submit" class="button">Add Member</button>';
    echo '</form>';

    echo '<h2>Members</h2>';
    echo '<table class="wp-list-table striped widefat" id="memberTable">';
    echo '<thead><tr><th class="no-sort">No.</th><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr></thead><tbody>';
    if (count($members) <= 0) {
        echo '<tbody><tr>';
        echo '<td colspan="4" style="text-align:center;">Data Kosong</td>';
        echo '</tr></tbody>';
    }
    $i = 1;
    foreach ($members as $member) {
        echo '<tr>';
        echo '<td>' . $i . '</td>';
        echo '<td>' . esc_html($member->id) . '</td>';
        echo '<td>' . esc_html($member->name) . '</td>';
        echo '<td>' . esc_html($member->email) . '</td>';
        echo '<td>';
        echo '<form method="post" style="display:inline" id="formDeleteMember">';
        wp_nonce_field('cda_delete_member_action');
        echo '<input type="hidden" name="action" value="delete_member">';
        echo '<input type="hidden" name="id" value="' . intval($member->id) . '">';
        echo '<button type="submit" class="button button-secondary button-small hover-red-color">Delete</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
        $i++;
    }
    echo '</tbody></table></div>';
}

function cda_create_members_table()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'members';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id int NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

add_action('after_switch_theme', 'cda_create_members_table');


function cda_admin_css_js()
{
    wp_enqueue_style('cda-wp-admin-datatable', get_template_directory_uri() . '/assets/dt/datatables.min.css');
    wp_enqueue_script('cda-wp-admin-datatables', get_template_directory_uri() . '/assets/dt/datatables.min.js', array('jquery'), false, true);

    wp_enqueue_style('cda-wp-admin', get_template_directory_uri() . '/assets/css/admin.css');
    wp_enqueue_script('cda-wp-admin', get_template_directory_uri() . '/assets/js/admin.js', array('jquery'), false, true);
}
add_action('admin_enqueue_scripts', 'cda_admin_css_js');
