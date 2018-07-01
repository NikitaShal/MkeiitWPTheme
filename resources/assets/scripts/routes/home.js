export default {
  init() {
    // JavaScript to be fired on the home page
    // init carousel
    $('.image__carousel').slick({
      //lazyLoad: 'ondemand',
      infinite: true,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 1500,
      zIndex: 5,
    });
    // only for mobile carousel
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      $( ".post" ).addClass( "text-center" )
      $( ".links" ).removeClass( "container" )
      $('.links_carousel').slick({
        centerMode: true,
        centerPadding: '30px',
        slidesToShow: 1,
        dots: true,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1,
            },
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '10px',
              slidesToShow: 1,
            },
          },
        ],
      });
      $( ".kostyl" ).remove();
      $( ".last_news" ).removeClass( "container" )
      $('.news').slick({
        centerMode: true,
        centerPadding: '30px',
        slidesToShow: 1,
        dots: true,
        adaptiveHeight: true,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1,
              adaptiveHeight: true,
            },
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '10px',
              slidesToShow: 1,
              adaptiveHeight: true,
            },
          },
        ],
      });
    }
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
    $(document).scrollTop(0);
  },
};
