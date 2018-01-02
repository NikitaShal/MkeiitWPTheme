<section class="spec">

  <div class="container">

    <?php $detect = new Mobile_Detect; ?>

    <h1><span>список специальностей</span></h1>

    <? if ( $detect->isMobile() ): ?>
      @include('partials.specmobile')
    <? else: ?>
      @include('partials.specdesktop')
    <? endif; ?>

  </div>

</section>
