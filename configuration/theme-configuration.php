<?php

// Register the required plugins for this theme
function essence_register_required_plugins() {
    $plugins = array( // Include the One Click Demo Import plugin from the WordPress repo
        array(
            'name' => 'One Click Demo Import',
            'slug' => 'one-click-demo-import',
            'required' => true,
        ) ,
        array(
            'name' => 'Typed',
            'slug' => 'typed',
            'required' => true,
        ) ,
    );
    $config = array(
        'id'           => 'essence',       // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                    // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );
    tgmpa($plugins, $config);
}

// Import all the files
function ocdi_import_files() {
    return array(
        array(
            'import_file_name' => 'Essence',
            'import_file_url' => 'http://dev.werespawn.com/files/werespawn_content.xml',
            //'import_widget_file_url' => 'YOUR_URL/widgets.wie',
            'import_customizer_file_url' => 'http://dev.werespawn.com/files/werespawn-customizer.dat',
            //'import_preview_image_url' => 'YOUR_URL/screenshot.png',
            'import_notice' => __( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'essence' ),
        ),
    );
}
add_filter('pt-ocdi/import_files', 'ocdi_import_files');

// Reset the standard WordPress widgets
function ocdi_before_widgets_import($selected_import) {
    if (!get_option('acme_cleared_widgets')) {
        update_option('sidebars_widgets', array());
        update_option('acme_cleared_widgets', true);
    }
}
add_action('pt-ocdi/before_widgets_import', 'ocdi_before_widgets_import');

function ocdi_after_import_setup() {
  $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
    $secondary_menu = get_term_by( 'name', 'Secondary Menu', 'nav_menu' );
    set_theme_mod( 'nav_menu_locations', array(
'primary-menu' => $main_menu->term_id,
'secondary-menu' => $secondary_menu->term_id,
        )
    );
        // Assign home page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );

// Disable plugin branding
add_filter('pt-ocdi/disable_pt_branding', '__return_true');
