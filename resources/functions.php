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


function wpb_widgets_init() {
register_sidebar( array(
'name' => 'Текст внутри блока "уже поступил"',
'id' => 'header-widget',
'before_widget' => '<div class="hw-widget">',
'after_widget' => '</div>',
'before_title' => '<h2 class="hw-title">',
'after_title' => '</h2>',
) );

}
add_action( 'widgets_init', 'wpb_widgets_init' );

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
    'description'=> 'Тут можно поменять фоновые картинки и названия специальностей ',
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

$wp_customize->add_setting( 'setting_spec1_image' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image1', array(
    'label'    => __( 'Фоновая картинка специальности 1', 'section1_spec1_image' ),
    'section'  => 'section_spec1',
    'settings' => 'setting_spec1_image',
) ) );

$wp_customize->add_setting( 'setting_kurs1_name' );
$wp_customize->add_control('contrl_kurs1_name',array(
    'label'=>'Название направления 1',
    'type'=>'text',
    'section'=>'section_spec1',
    'settings'=>'setting_kurs1_name',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_kurs1_spec1_name' );
$wp_customize->add_control('contrl_kurs1_spec1_name',array(
    'label'=>'Название специальности 1',
    'type'=>'text',
    'section'=>'section_spec1',
    'settings'=>'setting_kurs1_spec1_name',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_kurs1_spec1_date' );
$wp_customize->add_control('contrl_kurs1_spec1_date',array(
    'label'=>'Время обучения',
    'type'=>'text',
    'section'=>'section_spec1',
    'settings'=>'setting_kurs1_spec1_date',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_kurs1_spec2_name' );
$wp_customize->add_control('contrl_kurs1_spec2_name',array(
    'label'=>'Название специальности 2',
    'type'=>'text',
    'section'=>'section_spec1',
    'settings'=>'setting_kurs1_spec2_name',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_kurs1_spec2_date' );
$wp_customize->add_control('contrl_kurs1_spec2_date',array(
    'label'=>'Время обучения',
    'type'=>'text',
    'section'=>'section_spec1',
    'settings'=>'setting_kurs1_spec2_date',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_kurs1_spec3_name' );
$wp_customize->add_control('contrl_kurs1_spec3_name',array(
    'label'=>'Название специальности 3',
    'type'=>'text',
    'section'=>'section_spec1',
    'settings'=>'setting_kurs1_spec3_name',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_kurs1_spec3_date' );
$wp_customize->add_control('contrl_kurs1_spec3_date',array(
    'label'=>'Время обучения',
    'type'=>'text',
    'section'=>'section_spec1',
    'settings'=>'setting_kurs1_spec3_date',
)); add_action('customize_register','panel_spec');

/**
 * Направление 1 Конец
 */

/**
 * Направление 2
 */
$wp_customize->add_section('section_spec2',array(
    'title'=>'направление 2',
    'priority'=>10,
    'panel'=>'panel_spec',
));

$wp_customize->add_setting( 'setting_spec2_image' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image2', array(
    'label'    => __( 'Фоновая картинка специальности 2', 'section2_spec1_image' ),
    'section'  => 'section_spec2',
    'settings' => 'setting_spec2_image',
) ) );

$wp_customize->add_setting( 'setting_kurs2_name' );
$wp_customize->add_control('contrl_kurs2_name',array(
    'label'=>'Название направления 2',
    'type'=>'text',
    'section'=>'section_spec2',
    'settings'=>'setting_kurs2_name',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_kurs2_spec1_name' );
$wp_customize->add_control('contrl_kurs2_spec1_name',array(
    'label'=>'Название специальности 1',
    'type'=>'text',
    'section'=>'section_spec2',
    'settings'=>'setting_kurs2_spec1_name',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_kurs2_spec1_date' );
$wp_customize->add_control('contrl_kurs2_spec1_date',array(
    'label'=>'Время обучения',
    'type'=>'text',
    'section'=>'section_spec2',
    'settings'=>'setting_kurs2_spec1_date',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_kurs2_spec2_name' );
$wp_customize->add_control('contrl_kurs2_spec2_name',array(
    'label'=>'Название специальности 2',
    'type'=>'text',
    'section'=>'section_spec2',
    'settings'=>'setting_kurs2_spec2_name',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_kurs2_spec2_date' );
$wp_customize->add_control('contrl_kurs2_spec2_date',array(
    'label'=>'Время обучения',
    'type'=>'text',
    'section'=>'section_spec2',
    'settings'=>'setting_kurs2_spec2_date',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_kurs2_spec3_name' );
$wp_customize->add_control('contrl_kurs2_spec3_name',array(
    'label'=>'Название специальности 3',
    'type'=>'text',
    'section'=>'section_spec2',
    'settings'=>'setting_kurs2_spec3_name',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_kurs2_spec3_date' );
$wp_customize->add_control('contrl_kurs2_spec3_date',array(
    'label'=>'Время обучения',
    'type'=>'text',
    'section'=>'section_spec2',
    'settings'=>'setting_kurs2_spec3_date',
)); add_action('customize_register','panel_spec');

/**
 * Направление 2 Конец
 */

/**
 * Направление 3
 */
$wp_customize->add_section('section_spec3',array(
    'title'=>'направление 3',
    'priority'=>10,
    'panel'=>'panel_spec',
));

$wp_customize->add_setting( 'setting_spec3_image' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image3', array(
    'label'    => __( 'Фоновая картинка специальности 3', 'section3_spec1_image' ),
    'section'  => 'section_spec3',
    'settings' => 'setting_spec3_image',
) ) );

$wp_customize->add_setting( 'setting_kurs3_name' );
$wp_customize->add_control('contrl_kurs3_name',array(
    'label'=>'Название направления 3',
    'type'=>'text',
    'section'=>'section_spec3',
    'settings'=>'setting_kurs3_name',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_kurs3_spec1_name' );
$wp_customize->add_control('contrl_kurs3_spec1_name',array(
    'label'=>'Название специальности 1',
    'type'=>'text',
    'section'=>'section_spec3',
    'settings'=>'setting_kurs3_spec1_name',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_kurs3_spec1_date' );
$wp_customize->add_control('contrl_kurs2_spec1_date',array(
    'label'=>'Время обучения',
    'type'=>'text',
    'section'=>'section_spec3',
    'settings'=>'setting_kurs3_spec1_date',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_kurs3_spec2_name' );
$wp_customize->add_control('contrl_kurs2_spec2_name',array(
    'label'=>'Название специальности 2',
    'type'=>'text',
    'section'=>'section_spec3',
    'settings'=>'setting_kurs3_spec2_name',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_kurs3_spec2_date' );
$wp_customize->add_control('contrl_kurs2_spec2_date',array(
    'label'=>'Время обучения',
    'type'=>'text',
    'section'=>'section_spec3',
    'settings'=>'setting_kurs3_spec2_date',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_kurs3_spec3_name' );
$wp_customize->add_control('contrl_kurs3_spec3_name',array(
    'label'=>'Название специальности 3',
    'type'=>'text',
    'section'=>'section_spec3',
    'settings'=>'setting_kurs3_spec3_name',
)); add_action('customize_register','panel_spec');

$wp_customize->add_setting( 'setting_kurs3_spec3_date' );
$wp_customize->add_control('contrl_kurs2_spec3_date',array(
    'label'=>'Время обучения',
    'type'=>'text',
    'section'=>'section_spec3',
    'settings'=>'setting_kurs3_spec3_date',
)); add_action('customize_register','panel_spec');

/**
 * Направление 3 Конец
 */

}
add_action( 'customize_register', 'spec_theme_customizer' );

/**
 * Add carousel customization
 */
function links_theme_customizer( $wp_customize ) {
    $wp_customize->add_section( 'links_settings' , array(
        'title'       => __( 'Ссылки', 'carousel_images' ),
        'priority'    => 10,
        'description' => 'Настройка ссылок на главной',
    ) );
    $wp_customize->add_setting( 'about_url_settings');
    $wp_customize->add_control( 'about_url_settings', array(
      'type' => 'url',
      'section' => 'links_settings', // Add a default or your own section
      'label' => __( 'Ссылка "подробнее"' ),
      'description' => __( 'Ссылка на страницу подробнее' ),
      'input_attrs' => array(
        'placeholder' => __( 'Да прямо сюда' ),
      ),
    ) );
    $wp_customize->add_setting( 'f1_course_url_settings');
    $wp_customize->add_control( 'f1_course_url_settings', array(
      'type' => 'url',
      'section' => 'links_settings', // Add a default or your own section
      'label' => __( 'Ссылка подробнее о направлении 1"' ),
      'description' => __( 'Давай сюда ссылку' ),
      'input_attrs' => array(
        'placeholder' => __( 'Да прямо сюда' ),
      ),
    ) );
    $wp_customize->add_setting( 'f2_course_url_settings');
    $wp_customize->add_control( 'f2_course_url_settings', array(
      'type' => 'url',
      'section' => 'links_settings', // Add a default or your own section
      'label' => __( 'Ссылка подробнее о направлении 2"' ),
      'description' => __( 'Давай сюда ссылку' ),
      'input_attrs' => array(
        'placeholder' => __( 'Да прямо сюда' ),
      ),
    ) );
    $wp_customize->add_setting( 'f3_course_url_settings');
    $wp_customize->add_control( 'f3_course_url_settings', array(
      'type' => 'url',
      'section' => 'links_settings', // Add a default or your own section
      'label' => __( 'Ссылка подробнее о направлении 3"' ),
      'description' => __( 'Давай сюда ссылку' ),
      'input_attrs' => array(
        'placeholder' => __( 'Да прямо сюда' ),
      ),
    ) );
    $wp_customize->add_setting( 'contacts_url_settings');
    $wp_customize->add_control( 'contacts_url_settings', array(
      'type' => 'url',
      'section' => 'links_settings', // Add a default or your own section
      'label' => __( 'Ссылка на страницу с контактами"' ),
      'description' => __( 'Давай сюда ссылку' ),
      'input_attrs' => array(
        'placeholder' => __( 'Да прямо сюда' ),
      ),
    ) );
    function themeslug_sanitize_url( $url ) {
      return esc_url_raw( $url );
    }
}
add_action( 'customize_register', 'links_theme_customizer' );
