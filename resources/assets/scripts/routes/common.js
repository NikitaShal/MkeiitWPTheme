export default {
  init() {
    // JavaScript to be fired on all pages
    $( "li.menu-item" ).hover(function() {  // mouse enter
        $( this ).find( ".sub-menu" ).show(); // display child

    }, function(){ // mouse leave
        if ( !$(this).hasClass("current_page_item") ) {  // check if current page
            $( this ).find( ".sub-menu" ).hide(); // hide if not current page
        }
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
