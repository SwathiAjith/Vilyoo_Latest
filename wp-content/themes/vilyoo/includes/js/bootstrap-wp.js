jQuery( document ).ready( function( $ ) {

    $( 'input.search-field' ).addClass( 'form-control' );

    // here for each comment reply link of wordpress
    $( '.comment-reply-link' ).addClass( 'btn btn-primary' );

    // here for the submit button of the comment reply form
    $( '#commentsubmit' ).addClass( 'btn btn-primary' );

    // The WordPress Default Widgets
    // Now we'll add some classes for the wordpress default widgets - let's go

    // the search widget
    $( 'input.search-field' ).addClass( 'form-control' );
    $( 'input.search-submit' ).addClass( 'btn btn-default' );

    $( '.widget_rss ul' ).addClass( 'media-list' );

    $( '.widget_meta ul, .widget_recent_entries ul, .widget_archive ul, .widget_categories ul, .widget_nav_menu ul, .widget_pages ul' ).addClass( 'nav' );

    $( '.widget_recent_comments ul#recentcomments' ).css( 'list-style', 'none').css( 'padding-left', '0' );
    $( '.widget_recent_comments ul#recentcomments li' ).css( 'padding', '5px 15px');

    $( 'table#wp-calendar' ).addClass( 'table table-striped');

    var featuredBoxHeight = $( '#home-featured-seller-right' ).height();
    featuredBoxHeight = featuredBoxHeight - 14;
    $( '#home-featured-seller-left' ).height( featuredBoxHeight );

    // Make all the add to cart button bootstrap combatible and our custom red button class
    $( '.add_to_cart_button' ).addClass( 'btn btn-cart' );

    /*
    "Hovernav" navbar dropdown on hover
    Uses jQuery Media Query - see http://www.sitepoint.com/javascript-media-queries/
    */
    var mq = window.matchMedia('(min-width: 768px)');
    if (mq.matches) {
      $('ul.navbar-nav > li').addClass('hovernav');
    } else {
      $('ul.navbar-nav > li').removeClass('hovernav');
    };
    /*
    The addClass/removeClass also needs to be triggered
    on page resize <=> 768px
    */
    if (matchMedia) {
      var mq = window.matchMedia('(min-width: 768px)');
      mq.addListener(WidthChange);
      WidthChange(mq);
    }
    function WidthChange(mq) {
      if (mq.matches) {
        $('ul.navbar-nav > li').addClass('hovernav');
        // Restore "clickable parent links" in navbar
        $('.hovernav a').click(function () {
          window.location = this.href;
        });
      } else {
        $('ul.navbar-nav > li').removeClass('hovernav');
      }
    };
    // Restore "clickable parent links" in navbar
    $('.hovernav a').click(function () {
      window.location = this.href;
    });
} );