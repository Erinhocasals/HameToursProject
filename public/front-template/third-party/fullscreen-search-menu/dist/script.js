$(document).ready(function (){

    var open_btn = $('.menu_btn');
    var close_btn = $('.close_btn');

    var panels = $('.panel');
    var links = $('.litem');
    var lines = $('.line');
    var data_content = $('.data__content');
    var data_search = $('.data__search');
    var data_sub = $('.data__sub');
    var footer = $('.footer');

    var tl = new TimelineLite({paused:true});

    tl.to(panels, 0.5, {/*width: '50%'*/})
        .to(open_btn, 0.5, {opacity: 0, visibility: 'hidden', 'z-index':0}, "-=0.5")
        .to(data_content, 0.5, {y:0, opacity: 1})
        .to(data_search, 0.5, {y:0, opacity: 1})
        .to(data_sub, 0.5, {y:0, opacity: 1}, "-=0.25")
        .staggerTo(links, 0.3, {y:0}, 0.05, "-=0.75")
        .to(lines, 0.5, {opacity: 1})
        .to(footer, 0.5, {opacity: 1}, "-=0.5");

    open_btn.on('click', function (e){
        e.preventDefault();
        tl.play();
        // $(".navigation-filter").css('z-index', '10');

        $(".navigation-filter").fadeIn();
        $(".navigation-filter").css('display', 'flex');
    });

    close_btn.on('click', function (e){
        e.preventDefault();
        tl.reverse();
        // $(".navigation-filter").delay(2000).animate({ zIndex: 0 });
        $(".navigation-filter").delay(2000).fadeOut();
    });

    $(".litem").on("click", function (e) {
        $(this).toggleClass('active');

        let id = $(this).data('id');
        $('#filter_' + id).click();
    });

    $(".btn__search").on("click", function() {
        $.blockUI({
            message: '<div class="lds-ring"><div></div><div></div><div></div><div></div></div> <h2>Cargando datos ...</h2>',
            css: {
                backgroundColor: 'transparent',
                color: 'white',
                cursor: 'wait',
                border: 'none'
            }
        });

        var array = [];
        $('input:checkbox.filter-checkboxes:checked').each(function() {
            array.push($(this).val());
        });

        axios.get($("#baseUrl").val() + "/search",
            {
                params: {
                    filters: JSON.stringify(array),
                    q: $("#input__search").val(),
                    start: $("#input__start").val(),
                    end: $("#input__end").val()
                }
            })
            .then(function (response) {
                if(response.status == 200) {
                    var html = document.getElementById('filter__content').innerHTML.replaceAll("load-animation", "");
                    document.getElementById('filter__content').innerHTML = response.data;

                    $.unblockUI();
                }
            })
            .catch(function (error) {
                console.log(error);
                $.unblockUI();
            })
    })

});
