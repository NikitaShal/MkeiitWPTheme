<header class="header">
  <div class="container">

      <div class="ad">
        <div class="enter">
          <h3>Планируте поступать?</h3>
          <a href="<?php echo home_url(); ?>/about">Узнать подробнее</a>
        </div>
        <a data-toggle="modal" data-target=".modal" class="already">Уже зачислен!</a>
      </div>

      <div class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Отлично! Мы всегда рады новым овощам!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Вот пара ссылок которые помогут тебе быстрее стать "своим"</p>
            </div>
          </div>
        </div>
      </div>

    <div class="brand">
      <a class="brand__img" href="<?= esc_url(home_url('/')); ?>">
        <object type="image/svg+xml" data="@asset('images/Logo.svg')">
          Ваш браузер не поддерживает SVG, пора обновляться :(
        </object>
      </a>
      <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
      <i data-toggle="tooltip" data-placement="bottom" title="Скопировать название" class="fa fa-files-o copyname" data-clipboard-text='ГАПОУ МО "Мурманский колледж экономики и информационных технологий"' aria-hidden="true"></i>
    </div>

  </div>
</header>

<div class="image__carousel">
  <div><img src="<?php the_field('sliderpic1', 35); ?>"></div>
  <div><img src="<?php the_field('sliderpic2', 35); ?>"></div>
  <div><img src="<?php the_field('sliderpic3', 35); ?>"></div>
</div>
