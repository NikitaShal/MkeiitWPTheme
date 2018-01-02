<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__.'/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__).'/config/assets.php',
            'theme' => require dirname(__DIR__).'/config/theme.php',
            'view' => require dirname(__DIR__).'/config/view.php',
        ]);
    }, true);

/**
 * Add carousel customization
 */
function carousel_theme_customizer( $wp_customize ) {
    $wp_customize->add_section( 'carousel_images' , array(
        'title'       => __( 'Настройка карусели', 'carousel_images' ),
        'priority'    => 30,
        'description' => 'Загрузка изображений для карусели в шапке сайта',
    ) );
    $wp_customize->add_setting( 'carousel_image1' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'carousel_image1', array(
        'label'    => __( 'Картинка 1', 'carousel_image1' ),
        'section'  => 'carousel_images',
        'settings' => 'carousel_image1',
    ) ) );
    $wp_customize->add_setting( 'carousel_image2' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'carousel_image2', array(
        'label'    => __( 'Картинка 2', 'carousel_image2' ),
        'section'  => 'carousel_images',
        'settings' => 'carousel_image2',
    ) ) );
    $wp_customize->add_setting( 'carousel_image3' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'carousel_image3', array(
        'label'    => __( 'Картинка3', 'carousel_image3' ),
        'section'  => 'carousel_images',
        'settings' => 'carousel_image3',
    ) ) );
}
add_action( 'customize_register', 'carousel_theme_customizer' );

/**
 * Add spec customization
 */
function spec_theme_customizer( $wp_customize ) {
$wp_customize->add_panel('panel_spec',array(
    'title'=>'Список специальностей',
    'description'=> 'Тут можно поменять фоновые картинки и названия ',
    'priority'=> 40,
));

/**
 * Направление 1
 */
$wp_customize->add_section('section_spec1',array(
    'title'=>'направление 1',
    'priority'=>10,
    'panel'=>'panel_spec',
));

$wp_customize->add_setting( 'setting_kurs_name1' );
$wp_customize->add_control('contrl_kurs_name',array(
    'label'=>'Название направления',
    'type'=>'text',
    'section'=>'section_spec1',
    'settings'=>'setting_kurs_name1',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_spec1_name' );
$wp_customize->add_control('contrl_spec1_name',array(
    'label'=>'Название специальности 1',
    'type'=>'text',
    'section'=>'section_spec1',
    'settings'=>'setting_spec1_name',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_spec1_date' );
$wp_customize->add_control('contrl_spec1_date',array(
    'label'=>'Время обучения',
    'type'=>'text',
    'section'=>'section_spec1',
    'settings'=>'setting_spec1_date',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_spec1_image' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image1', array(
    'label'    => __( 'Фоновая картинка специальности 1', 'section1_spec1_image' ),
    'section'  => 'section_spec1',
    'settings' => 'setting_spec1_image',
) ) );

$wp_customize->add_setting( 'setting_spec2_name' );
$wp_customize->add_control('contrl_spec2_name',array(
    'label'=>'Название специальности 2',
    'type'=>'text',
    'section'=>'section_spec1',
    'settings'=>'setting_spec2_name',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_spec2_date' );
$wp_customize->add_control('contrl_spec2_date',array(
    'label'=>'Время обучения',
    'type'=>'text',
    'section'=>'section_spec1',
    'settings'=>'setting_spec2_date',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_spec2_image' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image2', array(
    'label'    => __( 'Фоновая картинка специальности 2', 'section1_spec2_image' ),
    'section'  => 'section_spec1',
    'settings' => 'setting_spec2_image',
) ) );

$wp_customize->add_setting( 'setting_spec3_name' );
$wp_customize->add_control('contrl_spec3_name',array(
    'label'=>'Название специальности 3',
    'type'=>'text',
    'section'=>'section_spec1',
    'settings'=>'setting_spec3_name',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_spec3_date' );
$wp_customize->add_control('contrl_spec3_date',array(
    'label'=>'Время обучения',
    'type'=>'text',
    'section'=>'section_spec1',
    'settings'=>'setting_spec3_date',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_spec3_image' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image3', array(
    'label'    => __( 'Фоновая картинка специальности 3', 'section1_spec3_image' ),
    'section'  => 'section_spec1',
    'settings' => 'setting_spec3_image',
) ) );
/**
 * Направление 1 Конец
 */

}
add_action( 'customize_register', 'spec_theme_customizer' );


/**
 * Register a book post type, with REST API support
 *
 * Based on example at: https://codex.wordpress.org/Function_Reference/register_post_type
 */
add_action( 'init', 'schedule_cpt' );
function schedule_cpt() {
  $labels = array(
    'name'               => _x( 'Расписание', 'post type general name', 'your-plugin-textdomain' ),
    'singular_name'      => _x( 'Расписание', 'post type singular name', 'your-plugin-textdomain' ),
    'menu_name'          => _x( 'Расписания', 'admin menu', 'your-plugin-textdomain' ),
    'name_admin_bar'     => _x( 'Расписание', 'add new on admin bar', 'your-plugin-textdomain' ),
    'add_new'            => _x( 'Добавить', 'book', 'your-plugin-textdomain' ),
    'add_new_item'       => __( 'Добавить расписание', 'your-plugin-textdomain' ),
    'new_item'           => __( 'Новое расписание', 'your-plugin-textdomain' ),
    'edit_item'          => __( 'Редактировать расписание', 'your-plugin-textdomain' ),
    'view_item'          => __( 'Посмотреть расписание', 'your-plugin-textdomain' ),
    'all_items'          => __( 'Все', 'your-plugin-textdomain' ),
    'search_items'       => __( 'Поиск', 'your-plugin-textdomain' ),
    'parent_item_colon'  => __( 'Parent Books:', 'your-plugin-textdomain' ),
    'not_found'          => __( 'Расписаний не найдено.', 'your-plugin-textdomain' ),
    'not_found_in_trash' => __( 'В корзине пусто.', 'your-plugin-textdomain' )
  );

  $args = array(
    'labels'             => $labels,
    'description'        => __( 'Описание', 'your-plugin-textdomain' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'schedule' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'show_in_rest'       => true,
    'rest_base'          => 'schedules',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'supports'           => array( 'title', 'editor', 'author', ),
  );
  flush_rewrite_rules( false );
  register_post_type( 'schedule', $args );
}
