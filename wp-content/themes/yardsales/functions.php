<?php

function vk_assets()
{
    wp_register_style(
        "google-font",
        "https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700",
        array(),
        false,
        "all"
    );
    wp_register_style(
        "google-font2",
        "https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500;700&display=swap",
        array(),
        false,
        "all"
    );
    wp_register_style(
        "boostrap",
        "https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css",
        array(),
        '5-1',
        "all"
    );

    wp_enqueue_style(
        'estilos',
        get_template_directory_uri() . '/assets/css/style.css',
        array("google-font", "google-font2", "boostrap")
    );

    wp_enqueue_script(
        "yardsale-js",
        get_template_directory_uri() . "/assets/js/script.js"
    );
}

add_action("wp_enqueue_scripts", 'vk_assets');

function vk_analytics()
{
?>
    <h1>ANALYTICS</h1>
<?
}

// add_action("wp_body_open", "vk_analytics");
function vk_theme_supports()
{
    add_theme_support("title-tag");
    add_theme_support('post-thumbnails');
    add_theme_support(
        'custom-logo',
        array("height" => 35, "width" => 170, 'floex-width' => true, 'flex-height' => true)
    );
}

add_action("after_setup_theme", "vk_theme_supports");

function vk_add_menus(){
    register_nav_menus(
        array(
            'menu-principal' => "Menu principal",
            'menu-responsive' => 'Menu responsive'
        )
    );
}

add_action("after_setup_theme","vk_add_menus");

function vk_add_sidebar(){
    register_sidebar(
        array(
            'name' => 'Pie de página',
            'id' => 'pie-pagina',
            'before_widget' => '',
            'after_widget' => '',
        ));
}

add_action("widgets_init", "vk_add_sidebar");

function vk_add_custom_post_type(){

    $labels = array(
        'name' => 'Producto',
        'singular_name' => 'Producto',
        'all_items' => 'Todos los productos',
        'add_new' => 'Añadir producto'
    );
        
    $args = array(
        'labels'             => $labels,
        'description'        => 'Productos para listar en un catálogos.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'producto' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'taxonomies'         => array('category'),
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-cart'
    );


    register_post_type('producto',$args);
}

add_action("init","vk_add_custom_post_type");

function vk_add_to_sign_in_menu(){
    $current_user = wp_get_current_user();
    $msg = is_user_logged_in()? $current_user->user_email : "sign_in" ;
    echo($msg);
}

add_action('vk_sign_in','vk_add_to_sign_in_menu');