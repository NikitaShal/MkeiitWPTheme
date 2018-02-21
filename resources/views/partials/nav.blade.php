<nav class="nav-wrapper">

  <div class="searchbox">
    <div class="search-container">
      <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
          <span class="icon"><i class="fa fa-search"></i></span>
          <input type="search" class="search-field" value="" name="s" id="search" placeholder="Поиск..." />
          <input style="position: absolute; height: 0px; width: 0px; border: none; padding: 0px;"
        hidefocus="true" tabindex="-1" type="submit" class="submit button invisible" name="submit" value="Search" />
      </form>
    </div>
  </div>

  <div class="scroll">
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'depth' => 2, 'menu_class' => 'navigation']) !!}
    @endif
  </div>
</nav>
