export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    $(".showmaps").click(function(){
      $(".maps__container").slideToggle();
      function openMaps() {
        $("html, body").animate({ scrollTop: $(document).height() }, "slow");
      }
      setTimeout(openMaps, 100);
    });

    $('[data-toggle="tooltip"]').tooltip()

    $( ".creatorsBtn" ).click(function() {
      $(".creators").toggleClass( "showCreators" );
      $(".allWrapper").toggleClass( "hideAllWrapper" );
    });
  },
};
