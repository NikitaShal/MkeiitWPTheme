<!doctype html>
<html @php(language_attributes())>
  @include('partials.head')
  <body @php(body_class())>
    <?php $detect = new Mobile_Detect; ?>
    <?php if ( $detect->isMobile() ): ?>
      @include('partials.navMobile')
    <?php endif; ?>
    <div id="panel">
    @php(do_action('get_header'))
    @include('partials.header')
    @include('partials.navDesktop')
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
