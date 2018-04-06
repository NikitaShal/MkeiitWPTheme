<!doctype html>
<html @php(language_attributes())>
  @include('partials.head')
  <body @php(body_class())>
    @php(do_action('get_header'))
    @include('partials.header')
    @include('partials.nav')
    <div class="wrap" role="document">
      <div class="content">
        <main class="main">
          @yield('content')
        </main>
        @if (App\display_sidebar())
<!--           <aside class="sidebar">
            @include('partials.sidebar')
          </aside> -->
        @endif
      </div>
    </div>

<!--     <div class="fab-container">
      <a href="" target="_blank">
        <div class="profile fab" tooltip="Расписание">
        </div>
      </a>
    </div> -->

    @php(do_action('get_footer'))
    @include('partials.footer')
    @php(wp_footer())
  </body>
</html>
