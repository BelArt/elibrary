var lazyLoad_1 = false;
var lazyLoad_2 = false;
var lazyLoad_iframes = false;
var lazyload_initial_device = false;

var lazyloadProccess = function(){
    if (isMobile())
    {
        lazyLoad_1 = new LazyLoad({
            elements_selector: '.i-lazy:not([data-src-mobile]):not([data-bg-mobile])',
            data_src: 'src',
            data_bg: 'bg',
            threshold: 1200
        });

        lazyLoad_2 = new LazyLoad({
            elements_selector: '.i-lazy[data-src-mobile]:not(.has-webp),.i-lazy[data-bg-mobile]',
            data_src: 'src-mobile',
            data_srcset: 'srcset-mobile',
            data_bg: 'bg-mobile',
            threshold: 1200
        });
    }
    else
    {
        if (isMid())
        {
            lazyLoad_1 = new LazyLoad({
                elements_selector: '.i-lazy:not([data-src-mid])',
                data_src: 'src',
                data_bg: 'bg',
                threshold: 900
            });

            lazyLoad_2 = new LazyLoad({
                elements_selector: '.i-lazy[data-src-mid]',
                data_src: 'src-mid',
                data_bg: 'bg-mid',
                threshold: 900
            });
        }
        else
        {
            lazyLoad_1 = new LazyLoad({
                elements_selector: '.i-lazy',
                data_src: 'src',
                data_bg: 'bg',
                threshold: 900
            });
        }
    }
};

var updateLazyload = function(parent){
    lazyLoad_1.update();

    if (lazyLoad_2)
    {
        lazyLoad_2.update();
    }
};

(function($) {
    $.fn.inputFilter = function(inputFilter) {
        return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            }
        });
    };
}(jQuery));

$(document).ready(function(){
    /* Lazyloading */
    lazyLoad_1 = false;
    lazyLoad_2 = false;
    lazyload_initial_device = isMobile()?-1:1;

    lazyloadProccess();

    $(window).resize(function(e){
        var svp = false;
        var lazyload_current_device = isMobile()?-1:1;

        if (lazyload_initial_device != lazyload_current_device)
        {
            if (lazyload_current_device == -1 && screen.width <= 736)
            {
                svp = document.getElementById('site-viewport');
                svp.setAttribute('content','width=device-width, initial-scale=1');
            }
            else
            {
                svp = document.getElementById('site-viewport');
                svp.setAttribute('content','width=1200');
            }

            $('.i-lazy').removeAttr('data-was-processed');
            lazyload_initial_device = lazyload_current_device;

            setTimeout(function(){
                lazyloadProccess();
            }, 500);
        }
    });
    /* Lazyloading */

    /* Save position */
    var last_position = 0;
    /* \Save position */

    /* Detect Tablets for forms */
    var md = new MobileDetect(window.navigator.userAgent);
    if (md.tablet())
    {
        $('html').addClass('i-tablet');
    }
    else
    {
        $('html').addClass('i-not-tablet');
    }

    if (isMobile())
    {
        $('html').addClass('i-cellphone');
    }
    else
    {
        $('html').addClass('i-not-cellphone');
    }

    if (!isMobile() && !md.tablet())
    {
        $('html').addClass('i-desktop');
    }
    else
    {
        $('html').addClass('i-not-desktop');
    }
    /* \Detect Tablets for forms */

    /* Scroll */
    var last_scroll_position = 0;

    $(document).on('click', '.i-scroll', function(e){
        e.preventDefault();

        var correct_top = (isMobile() ? 0 : $('.block-navigation').height() + ($(this).attr('href') != '#products' ? 20 : 0));

        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top - correct_top
        }, 1000);
    });
    /* \Scroll */

    $('.paginator__total').text($('.gallery__figure').length);

    $(document).on('click', '.gallery__link', function(e){
        e.preventDefault();
    });

    var zoom_levels = [50, 100, 150, 200, 250, 300, 350, 400];

    var max_image_width = 0;
    $('.gallery__image').each(function(index){
        max_image_width = ($('.gallery__image').width() > max_image_width ? $('.gallery__image').width() : max_image_width);
    });

    if (max_image_width > $(window).width())
    {
        $(window).scrollLeft(($(document).width() - $(window).width()) / 2);
    }

    $(document).on('click', '.control-panel__element_plus, .control-panel__element_minus', function(e){
        var current_zoom = parseInt($('body').attr('data-zoom'), 0);
        var current_zoom_index = zoom_levels.findIndex(function(element){
            return element == current_zoom;
        });
        var new_zoom_index = ($(this).hasClass('control-panel__element_plus') ? current_zoom_index+1 : current_zoom_index-1);
        var new_zoom = zoom_levels[new_zoom_index];

        var current_scroll_position = $(window).scrollTop() + ($(window).height() / 2);
        var new_scroll_position = (current_scroll_position / current_zoom * new_zoom) - ($(window).height() / 2);

        if (current_zoom != new_zoom && new_zoom !== undefined)
        {
            $('.scale__value').text(new_zoom);
            $('body').attr('data-zoom', new_zoom);
            $(window).scrollTop(new_scroll_position);

            var max_image_width = 0;
            $('.gallery__image').each(function(index){
                max_image_width = ($('.gallery__image').width() > max_image_width ? $('.gallery__image').width() : max_image_width);
            });


            if (max_image_width > $(window).width())
            {
                $(window).scrollLeft(($(document).width() - $(window).width()) / 2);
            }
        }
    });

    $('.paginator__current').inputFilter(function(value) {
        return /^\d*$/.test(value);
    });

    $('.paginator__current').on('keypress', function(e){
        var page_height = $('.gallery__figure:first').outerHeight();
        var input_page_number = parseInt($(this).val(), 0);
        var max_pages = $('.gallery__figure').length;

        if (input_page_number > max_pages)
        {
            input_page_number = max_pages;
        }

        if (e.which == 13)
        {
            if (isMobile())
            {
                if ($('.gallery__figure').eq(input_page_number - 1).find('.gallery__image').hasClass('loaded'))
                {
                    $('html, body').animate({
                        scrollTop: $('.gallery__figure').eq(input_page_number - 1).offset().top
                    }, 0);
                }
                else
                {
                    $('.gallery__figure').eq(input_page_number - 1).addClass('gallery__figure_search');
                    $('html, body').animate({
                        scrollTop: (page_height * $('.gallery__figure').length)
                    }, ($('.gallery__figure').length - parseInt($(this).attr('data-last'), 0)) * 200);
                }
            }
            else
            {
                $('html, body').animate({
                    scrollTop: (page_height * (input_page_number - 1))
                }, 0);
            }
        }
    });

    $(window).scroll(function(e){
        var page_height = $('.gallery__figure').outerHeight();
        var current_scroll_position = $(window).scrollTop() + ($(window).height() / 2);

        if (isMobile())
        {
            $('.gallery__figure').each(function(e){
                if ($(this).offset().top < current_scroll_position && $(this).offset().top + $(this).height() > current_scroll_position)
                {
                    $('.paginator__current').val($(this).index() + 1);
                    $('.paginator__current').attr('data-last', $(this).index() + 1)
                }
            });

            if ($('.gallery__figure_search').length)
            {
                if ($('.gallery__figure_search .gallery__image').hasClass('loaded') || $('.gallery__figure_search .gallery__image').hasClass('loading'))
                {
                    $('html, body').stop();

                    $('html, body').animate({
                        scrollTop: $('.gallery__figure_search').offset().top
                    }, 0);

                    $('.gallery__figure_search').removeClass('gallery__figure_search');
                }
            }
        }
        else
        {
            $('.paginator__current').val(Math.ceil(current_scroll_position / page_height));
            $('.paginator__current').attr('data-last', Math.ceil(current_scroll_position / page_height));
        }
    });

    window.onload = function () { $('.preloader').removeClass('preloader_active'); };

    setTimeout(function(){
        $('.preloader').removeClass('preloader_active');
    }, 2000);

    var clicking = false;
    var previousX;
    var previousY;

    $(document).mousedown(function(e) {
        previousX = e.clientX;
        previousY = e.clientY;

        if ($(e.target).parents('.control-panel').length < 1 && !$(e.target).hasClass('control-panel'))
        {
            e.preventDefault();
            clicking = true;
        }
    });

    $(document).mouseup(function() {
        clicking = false;
    });

    $(document).mousemove(function(e) {
        if (clicking) {
            e.preventDefault();
            var directionX = (previousX - e.clientX) > 0 ? 1 : -1;
            var directionY = (previousY - e.clientY) > 0 ? 1 : -1;
            $(document).scrollLeft($(document).scrollLeft() + (previousX - e.clientX));
            $(document).scrollTop($(document).scrollTop() + (previousY - e.clientY));
            previousX = e.clientX;
            previousY = e.clientY;
        }
    });

    $(document).mouseleave(function(e) {
        clicking = false;
    });
});

function isMobile()
{
    return ($('.i-check-mobile').css('display') == 'block');
}

function isMid()
{
    return ($('.i-check-mid').css('display') == 'block');
}

function isIE()
{
    var ua = window.navigator.userAgent;

    var msie = ua.indexOf('MSIE ');
    if (msie > 0) {
        // IE 10 or older => return version number
        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    }

    var trident = ua.indexOf('Trident/');
    if (trident > 0) {
        // IE 11 => return version number
        var rv = ua.indexOf('rv:');
        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
    }

    var edge = ua.indexOf('Edge/');
    if (edge > 0) {
        // Edge (IE 12+) => return version number
        return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
    }

    return false;
}

function isMSEdge()
{
    return typeof CSS !== 'undefined' && CSS.supports("(-ms-ime-align:auto)");
}

function numberFormat(number, decimals, dec_point, thousands_sep)
{
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + (Math.round(n * k) / k)
                .toFixed(prec);
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
        .split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '')
        .length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1)
            .join('0');
    }
    return s.join(dec);
}

var tippy_params_fields = {
    arrow: true,
    interactive: true,
    placement: 'left',
    size: 'small',
    distance: (isMobile() ? 0 : 10),
    interactiveBorder: 0,
    interactiveDebounce: 0
};

function formatMoney(n, c, d, t)
{
    var c = isNaN(c = Math.abs(c)) ? 0 : c,
        d = d == undefined ? "" : d,
        t = t == undefined ? " " : t,
        s = n < 0 ? "-" : "",
        i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
        j = (j = i.length) > 3 ? j % 3 : 0;

    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}

function findGetParameter(parameterName) {
    var result = null,
        tmp = [];
    var items = location.search.substr(1).split("&");
    for (var index = 0; index < items.length; index++) {
        tmp = items[index].split("=");
        if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
    }
    return result;
}