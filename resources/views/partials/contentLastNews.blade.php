<div class="col-md-5 col-xs-12">
  <article @php(post_class())>
    <header>
    <?php if ( has_post_thumbnail() ) {
        the_post_thumbnail('medium', array( 'class'  => 'img-fluid' ));
      }
      else {?>
      <img class="img-fluid" width="300" src="@asset('images/noneimage.png')" alt="<?php the_title(); ?>" />
      <?php }?>
    <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    </header>
    <div class="entry-summary">
    @php(the_excerpt())
    </div>
    @include('partials.entry-meta')
  </article>
</div>
<div class="col-md-1 kostyl"></div>