<nav id="menu">
  <header>
    <h2>Меню</h2>
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'depth' => 2, 'menu_class' => 'navigation']) !!}
    @endif
  </header>
</nav>