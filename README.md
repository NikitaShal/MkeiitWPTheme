# [Mkeiit](mcesii.ru)
[![forthebadge](http://forthebadge.com/images/badges/60-percent-of-the-time-works-every-time.svg)](http://forthebadge.com)
[![forthebadge](http://forthebadge.com/images/badges/you-didnt-ask-for-this.svg)](http://forthebadge.com)

MkeiitWPTheme - тема созданая студентами колледжа Экономики и Информационных технологий г. Мурманска. Тема создана и заточена под использование только в рамках нашего учереждения, однако для удобства эксплуатирования, она легко настраивается, благодаря чему вы так же можете использовать данную тему в своих целях, бесплатно. Исходный код находиться под лицензией MIT, что позваляет вам использовать тему как угодно, но не в коммерческих целях.

## Преимущества

* Sass для стилей
* ES6 JavaScript
* [Webpack](https://webpack.github.io/) для сборки, оптимизации изображений и минификации файлов
* [Browsersync](http://www.browsersync.io/) для паралелльной разработке на разных устройствах
* [Laravel Blade](https://laravel.com/docs/5.3/blade) как движок шаблонов
* [Controller](https://github.com/soberwp/controller) для управления данными в фреймворке Laravel
* [Bootstrap 4](http://getbootstrap.com/) - сетка
* Font Awesome - иконки

## Зависимости

Прежде чем начать убедитесь что все пакеты установлены:

* [WordPress](https://wordpress.org/) >= 4.7
* [PHP](http://php.net/manual/en/install.php) >= 7.0
* [Composer](https://getcomposer.org/download/)
* [Node.js](http://nodejs.org/) >= 6.9.x
* [Yarn](https://yarnpkg.com/en/docs/install)

## Установка темы

Установка темы для разработки:



Edit `app/setup.php` to enable or disable theme features, setup navigation menus, post thumbnail sizes, and sidebars.

## Theme development

* Run `yarn` from the theme directory to install dependencies
* Update `resources/assets/config.json` settings:
  * `devUrl` should reflect your local development hostname
  * `publicPath` should reflect your WordPress folder structure (`/wp-content/themes/sage` for non-[Bedrock](https://roots.io/bedrock/) installs)

### Build commands

* `yarn run start` — Compile assets when file changes are made, start Browsersync session
* `yarn run build` — Compile and optimize the files in your assets directory
* `yarn run build:production` — Compile assets for production

## Documentation

Sage 8 documentation is available at [https://roots.io/sage/docs/](https://roots.io/sage/docs/).

Sage 9 documentation is currently in progress and can be viewed at [https://github.com/roots/docs/tree/sage-9/sage](https://github.com/roots/docs/tree/sage-9/sage).

Controller documentation is available at [https://github.com/soberwp/controller#usage](https://github.com/soberwp/controller#usage).

## Contributing

Contributions are welcome from everyone. We have [contributing guidelines](https://github.com/roots/guidelines/blob/master/CONTRIBUTING.md) to help you get started.

## Community

Keep track of development and community news.

* Participate on the [Roots Discourse](https://discourse.roots.io/)
* Follow [@rootswp on Twitter](https://twitter.com/rootswp)
* Read and subscribe to the [Roots Blog](https://roots.io/blog/)
* Subscribe to the [Roots Newsletter](https://roots.io/subscribe/)
* Listen to the [Roots Radio podcast](https://roots.io/podcast/)
