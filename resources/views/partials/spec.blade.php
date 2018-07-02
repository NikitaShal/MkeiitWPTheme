<section class="spec">

  <div class="container">

    <?php $detect = new Mobile_Detect; ?>

    <h1><span>список специальностей</span></h1>

    <?php if ( $detect->isMobile() ): ?>
      @include('partials.specmobile')
    <?php else: ?>
      @include('partials.specdesktop')
    <?php endif; ?>

  </div>

</section>
