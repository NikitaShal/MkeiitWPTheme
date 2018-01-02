<section class="last_news container">

  <h1><span>последние новости</span></h1>

  <div class="cardM card">

    <div class="container">

      <div class="row news">
      <?php query_posts( 'posts_per_page=4' ); ?>
        @while (have_posts()) @php(the_post())
          @include('partials.content-'.get_post_type())
        @endwhile
      </div>

    </div>

    <a class="allnews" href="<?php echo home_url(); ?>/news">Все новости</a>

  </div>

</section>
