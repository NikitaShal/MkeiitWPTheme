<header class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <div class="brand">
          <div class="gosty">
            <?php echo do_shortcode( '[bvi text="Версия для слабовидящих"]' ); ?>
            <div class="agerestricted">6+</div>
          </div>
<!--           <a class="brand__img" href="<?= esc_url(home_url('/')); ?>">
            <img src="@asset('images/MkeiitLogoOptimazed.png')" alt="">
          </a> -->
          <a class="brandname" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
          <!-- <i onclick="copyToClipboard('.brandname')" data-toggle="tooltip" data-placement="bottom" title="Скопировать название" class="fa fa-files-o copyname" data-clipboard-text='ГАПОУ МО "Мурманский колледж экономики и информационных технологий"' aria-hidden="true"></i> -->
        </div>
      </div>

      <div class="col-md-1"></div>

      <div class="col-md-4">
        <div class="ad">
          <div class="enter">
            <h3>Планируте поступать?</h3>
            <a href="<?php echo get_theme_mod( 'about_url_settings' ); ?>">Узнать подробнее</a>
          </div>
          <a data-toggle="modal" data-target=".modal" class="already">Уже зачислен!</a>
        </div>
      </div>

      <div id="" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Отлично! Мы всегда рады новым студентам!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php
              if ( is_active_sidebar( 'header-widget' ) ) : ?>
                  <div id="header-widget-area" class="hw-widget widget-area" role="complementary">
                <?php dynamic_sidebar( 'header-widget' ); ?>
                  </div>
                
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</header>
