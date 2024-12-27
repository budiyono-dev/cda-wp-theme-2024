<?php

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
    
    ?>
    <div class="wrap">
        <h1 class="wp-heading-inline">Member Management</h1>
        <form method="post" class="form-add-member">
            <?php wp_nonce_field('cda_create_member_action'); ?>
            <input type="hidden" name="action" value="add_member">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit" class="button">Add Member</button>
        </form>
        <h2>Members</h2>
        <table class="wp-list-table striped widefat" id="memberTable">
            <thead>
                <tr>
                    <th class="no-sort">No.</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($members) <= 0): ?>
                <tr>
                    <td colspan="4" style="text-align:center;">Data Kosong</td>
                </tr>
                <?php endif; ?>

                <?php $i = 1; foreach ($members as $member) : ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo esc_html($member->id); ?></td>
                    <td><?php echo esc_html($member->name); ?></td>
                    <td><?php echo esc_html($member->email);?></td>
                    <td>
                        <form method="post" style="display:inline" id="formDeleteMember">
                            <?php wp_nonce_field('cda_delete_member_action'); ?>
                            <input type="hidden" name="action" value="delete_member">
                            <input type="hidden" name="id" value="' . intval($member->id) . '">
                            <button type="submit" class="button button-secondary button-small hover-red-color">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $i++; endforeach;  ?>
            </tbody>
        </table>
    </div>
    <?php
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