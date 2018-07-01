# [MkeiitWPTheme](mcesii.ru)
[![forthebadge](http://forthebadge.com/images/badges/60-percent-of-the-time-works-every-time.svg)](http://forthebadge.com)
[![forthebadge](http://forthebadge.com/images/badges/you-didnt-ask-for-this.svg)](http://forthebadge.com)

## Введение 

MkeiitWPTheme - тема созданая студентами колледжа Экономики и Информационных технологий г. Мурманска. Тема создана и заточена под использование только в рамках нашего учереждения, однако для удобства эксплуатирования, она легко настраивается, благодаря чему вы так же можете использовать данную тему в своих целях, бесплатно. Исходный код находиться под лицензией MIT, что позваляет вам использовать тему как угодно, но не в коммерческих целях.

## Внимание!

Прежде чем читать дальше, вам нужно иметь представление о разработке сайтов, минимальные знания разработки для Wordpress и иметь в доте не меньше 1000 часов. Если хоть один из этих пунктов не соблюден уходи и не возвращайся пока не прокачаешься. А если тебе нравиться delphi, чтоб я больше тебя здесь не видел ты меня понял?!

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

## Плагины Wordpress
* [Ajax Load More](https://ru.wordpress.org/plugins/ajax-load-more/)
* [Archives Calendar Widget](https://ru.wordpress.org/plugins/archives-calendar-widget/)
* [Button visually impaired](https://ru.wordpress.org/plugins/button-visually-impaired/)

## Установка и сборка темы для своего сайта на Wordpress

Как основа сборки темы используется разработка от команды Roots. Sage 9 это отличный шаблон для старта создания своей темы, отличная документация и большое активное сообщество помогут вам, знание английского обязательно.

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

3. Устанавливаем зависимости Composer
```shell
 $ composer install 
 ```

4. Устанавливаем пакеты для front-end и сборки(убедитесь что nodejs и yarn установелны)

```shell
 $ yarn 
 ```

Для разработки и сборки темы все готово. Yeah science, bitch!

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

# В заключение

Данная тема была создана на энтузиазме студентов, а конкретно, кодил [Никита Шаломыгин](https://vk.com/nikitashal), а за дизайн отвечал [Максим Смирнов](https://vk.com/bandle). Мы не профессионалы и для нас это был отличный опыт, надеюсь найдется студент который рискнет это все установить и возможно даже доработает(лучше перепишите весь этот говнокод).
Сподвигнул нас к этому преподаватель Ларри Жозе, а поддержал разработу ваш любимый сисадмин Юрий Юрьевич. 

<p align="center">
  <img src="https://habrastorage.org/getpro/habr/post_images/ba6/55f/00e/ba655f00ed60949158bbb7c1ba1f394b.jpg">
  Есть люди, которые любят программировать. Я их не понимаю.» - Расмус Лердорф, создатель языка PHP
</p>