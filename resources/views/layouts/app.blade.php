<!doctype html>
<html @php(language_attributes())>
  @include('partials.head')
  <body @php(body_class())>
    <div class="creators">
      test kek
    </div>
    <div class="allWrapper">
    @php(do_action('get_header'))
    @include('partials.header')
    <?php $detect = new Mobile_Detect; ?>
    <? if ( $detect->isMobile() ): ?>
      @include('partials.navMobile')
    <? else: ?>
      @include('partials.navDesktop')
    <? endif; ?>
    <div class="wrap" role="document">
      <div class="content">
        <main class="main">
          @yield('content')
        </main>
      </div>
    </div>
    @php(do_action('get_footer'))
    @include('partials.footer')
    @php(wp_footer())
    </div>
  </body>
</html>
