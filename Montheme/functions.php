<?php

function montheme_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'en tête du menu');
    register_nav_menu('footer', 'pied du page');
}

function montheme_resgister_assets()
{
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js',['popper', 'jquery'],[], false, true);
    wp_deregister_style('jquerr');
    wp_register_style('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' ,[], false, true);
    wp_register_style('jquery', 'https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js',[], false, true);
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_script('pootstrap');

}

function montheme_title_separator()
{
 return '|';
}



function montheme_menu_class($classes)
{
      $classes[] = 'nav-item';
       return $classes;
}

function montheme_menu_link_class($attrs)
{
    $attrs['class'] = 'nav-link';
    return $attrs;
}

// function montheme_pagination()
// {
// $pages = paginate_links(['type'=>'array']);
// if ($pages === null) {
//     return;
// }
// echo '<nav aria-label="pagination" class="my-4">';

// echo '<u class="pagination">';

// foreach ($pages as $page) {
//     $active = strpos($page, 'curent') !==false;
//     $class = 'page-item';
//     if ($active) {
//         $class .= 'active';
//         echo '<li class"' . $class . '">';
//         echo str_replace('page-number', 'page-link', $page);
//         echo '</li>';
//     }

// }
// echo '</ul>';
// echo '</nav>';

// }

function montheme_menu_add_custom_box()
{
    add_meta_box('montheme_sponso', 'Sponsoring', 'montheme_render_sponso_box', 'post');
}

function montheme_render_sponso_box()
{
    ?>
    <input type="hidden" value="0" name="montheme_sponso">
    <input type="checkbox" value="1" name="montheme_sponso">
    <label for="monthemesponso">Cet article est sponsorisé</label>

    <?php

}

function montheme_init()
{
    register_taxonomy('sport', 'post', [
        'labels' => [
            'name' => 'sport',
            'singular_name' => 'Sport',
            'plural_name' => 'Sport',
            'search_item' => 'Recherche des sports',
            'all_item' => 'Tous les sport',
            'edit_item' => 'Editer le sport',
            'update_item' => 'Mettre à jour le sport',
            'add_new_item' => 'Ajouter un nouveau sport',
            'new_item_name' => 'Ajouter un nouveau sport',
            'menu_item' => 'Sport',
    
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true,

    ]);
    register_post_type('bien', [
        'label' => 'bien',
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-building',
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
        'has_archive' => true,





    ]);
} 

add_action('init','montheme_init');
add_action('after_setup_theme', 'montheme_supports');
add_action('wp_enqueue_scripts', 'montheme_resgister_assets');
add_filter('document_title_separator', 'montheme_title_separator');
add_filter('nav_menu_css_class', 'montheme_menu_class');
add_filter('nav_menu_link_attributes', 'montheme_menu_link_class');
add_action('add_meta_boxes', 'montheme_menu_add_custom_box');