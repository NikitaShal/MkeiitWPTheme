# [Mkeiit](mcesii.ru)
[![forthebadge](http://forthebadge.com/images/badges/60-percent-of-the-time-works-every-time.svg)](http://forthebadge.com)
[![forthebadge](http://forthebadge.com/images/badges/you-didnt-ask-for-this.svg)](http://forthebadge.com)

## Введение 

MkeiitWPTheme - тема созданая студентами колледжа Экономики и Информационных технологий г. Мурманска. Тема создана и заточена под использование только в рамках нашего учереждения, однако для удобства эксплуатирования, она легко настраивается, благодаря чему вы так же можете использовать данную тему в своих целях, бесплатно. Исходный код находиться под лицензией MIT, что позваляет вам использовать тему как угодно, но не в коммерческих целях.

## Все не так просто. Продвинутая разработка front-end благодаря:

* [Sass](http://sass-lang.com) компилируемый в css язык стилей
* [ES6 JavaScript](http://es6-features.org) - javascript давно за пределами вашего понимания
* [Webpack](https://webpack.github.io/) для сборки, оптимизации изображений и минификации файлов
* [Browsersync](http://www.browsersync.io/) для паралелльной разработке на разных устройствах
* [Laravel Blade](https://laravel.com/docs/5.3/blade) как движок шаблонов
* [Controller](https://github.com/soberwp/controller) для управления данными в фреймворке Laravel
* [Bootstrap 4](http://getbootstrap.com/) - адаптивная сетка
* [Font Awesome](https://fontawesome.com) - иконки

## Зависимости

Прежде чем начать убедитесь что все пакеты установлены:

* [WordPress](https://wordpress.org/) >= 4.7
* [PHP](http://php.net/manual/en/install.php) >= 7.0
* [Composer](https://getcomposer.org/download/)
* [Node.js](http://nodejs.org/) >= 6.9.x
* [Yarn](https://yarnpkg.com/en/docs/install)

## Установка и сборка темы для своего сайта на Wordpress

Как основа сборки темы исапользуется разработка от команды Roots. Sage 9 это отличный шаблон для старта создания своей темы, отличная документация и большое активное сообщество помогут вам, знание английского обязательно.

Документация по Roots/Sage - https://roots.io/sage/

### Подготовка к работе

1. Клонируем репозиторий темы в папку с темами Wordpress "../Wordpress/wp-content/themes"

```shell
 $ git clone https://github.com/NikitaShal/MkeiitWPTheme.git @название папки вашей темы на латинице@ 
 ```

2. Переходим в папку с темой

```shell
$ cd @название папки вашей темы@ 
```

3. Устанавливаем пакеты для front-end и сборки(убедитесь что nodejs и yarn установелны)

```shell
 $ yarn 
 ```

Для разработки и сборки темы все готово!

## Структура темы 

```shell
themes/your-theme-name/   # → Корневая папка
├── app/                  # → ПХП файлы
│   ├── controllers/      # → Файлы контроллера
│   ├── admin.php         # → Настройка Customizer
│   ├── filters.php       # → Фильтры темы
│   ├── helpers.php       # → Вспомогательные функции
│   └── setup.php         # → Установки темы
├── composer.json         # → Автозагрузка файлов в  `app/`
├── composer.lock         # → Composer lock файл (не изменять)
├── dist/                 # → Конечная сборка файлов темы (не изменять)
├── node_modules/         # → Node.js пакеты (не изменять)
├── package.json          # → Node.js зависимости и скрипты
├── resources/            # → Шаблоны и файлы темы
│   ├── assets/           # → Front-end файлы
│   │   ├── config.json   # → Настройки для компилируемых файлов
│   │   ├── build/        # → Webpack и ESLint настройки
│   │   ├── fonts/        # → Шрифты темы
│   │   ├── images/       # → Изображения темы
│   │   ├── scripts/      # → Javascript скрипты темы
│   │   └── styles/       # → Файлы стилей темы
│   ├── functions.php     # → Автозагрузка Composer, зависимости темы
│   ├── index.php         # → Никогда не редактируйте вручную
│   ├── screenshot.png    # → Скриншот темы для Wp-Admin
│   ├── style.css         # → Мета данные темы для Wp-Adminb
│   └── views/            # → Шаблоны темы
│       ├── layouts/      # → Базовые шаблоны
│       └── partials/     # → Шаблонные части
└── vendor/               # → Пакеты Composer (не изменять)

```

