export default {
  init() {
    // JavaScript to be fired on all pages
    $(window).scroll(function(){
      $(".brandnameShort").css("opacity", 0 + $(window).scrollTop() / 130);
    });

      $('.search-field').focus(function(){

        $(".brandnameShort").hide("slow");

      }).blur(function(){

        $(".brandnameShort").show("slow");

      });

      $(".brandnameShort").click(function() {
         $("html, body").animate({ scrollTop: 0 }, "slow");
         return false;
      });
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

    /*eslint-disable no-undef*/
    var slideout = new Slideout({
      'panel': document.getElementById('panel'),
      'menu': document.getElementById('menu'),
      'padding': 256,
      'tolerance': 70,
      'side': 'right',
    });

    $('.menuOpen').on('click', function() {
      slideout.toggle();
    });

    function close(eve) {
      eve.preventDefault();
      slideout.close();
    }

    slideout
      .on('beforeopen', function() {
        this.panel.classList.add('panel-open');
      })
      .on('open', function() {
        this.panel.addEventListener('click', close);
      })
      .on('beforeclose', function() {
        this.panel.classList.remove('panel-open');
        this.panel.removeEventListener('click', close);
      });
    /*eslint-enable no-undef*/
  },
};
