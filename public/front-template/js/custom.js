(function($) {

    "use strict"

    jQuery(window).on('load', function() {
        $(".activity-lodge__description ol, .block-lodge-intro__list-highlights ol").addClass("list-highlights__list");
        $(".activity-lodge__description ol li, .block-lodge-intro__list-highlights ol li").addClass("list-highlights__list-item");
        $(".activity-lodge__description ol li span, .activity-lodge__description ol li b, .block-lodge-intro__list-highlights ol li span").addClass("list-highlights__body");
        $(".activity-lodge__description ol li").prepend('<svg class="list-highlights__list-style" width="4" height="14" viewBox="0 0 4 14" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 0v2h1V0h-1zm1 12v2h-1v-2h1zM2 5a2 2 0 110 4 2 2 0 010-4z" fill="#FC6220" fill-rule="nonzero"></path></svg>');
        $(".block-lodge-intro__list-highlights ol li").prepend('<svg class="list-highlights__list-style" width="4" height="14" viewBox="0 0 4 14" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 0v2h1V0h-1zm1 12v2h-1v-2h1zM2 5a2 2 0 110 4 2 2 0 010-4z" fill="#FC6220" fill-rule="nonzero"></path></svg>');

        // $(".block-itinerary-intro__list-highlights ol").addClass("list-highlights__list");
        $(".block-itinerary-intro__list-highlights li").addClass("list-highlights__list-item");
        $(".block-itinerary-intro__list-highlights ol li").prepend('<svg class="list-highlights__list-style" width="4" height="14" viewBox="0 0 4 14" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 0v2h1V0h-1zm1 12v2h-1v-2h1zM2 5a2 2 0 110 4 2 2 0 010-4z" fill="#FC6220" fill-rule="nonzero"></path></svg>');
    });

})(jQuery);
