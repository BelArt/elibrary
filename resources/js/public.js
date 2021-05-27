require('./bootstrap');

import 'bootstrap/js/dist/tooltip';

window.alertify = require('alertifyjs');
alertify.set('notifier','position', 'top-bottom');

(function(search, $, undefined) {
    "use strict";
    search.helper = search.helper || {
        sendAjax: function(datas, url, callback) {
            $.ajax({
                url: url,
                type: "POST",
                dataType: "json",
                data: datas,
                success: function (data) {
                    callback(data);
                },
                error: function(data) {
                    let errors = [];
                    if (undefined !== data.responseJSON.message) {
                        alertify.error(data.responseJSON.message);
                        return ;
                    }
                    for(let i in data.responseJSON.errors) {
                        data.responseJSON.errors[i].forEach(a => {
                            errors.push('<div>' + a + '</div>')
                        });
                    }
                    alertify.error(errors.join(''));
                }
            });
        },
        request: function() {
            return {
                '_token': $('meta[name="csrf-token"]').attr('content'),
            };
        },
    };
    search.controller = search.controller || {
        funds: function(t) {
            var datas = search.helper.request();
            datas.text = t.val();
            search.helper.sendAjax(datas, '/search/fund', search.view.funds);
        },
        cases: function(t) {
            var datas = search.helper.request();
            datas.text = t.val();
            datas.id = $('input[name="fund_id"]').val();
            search.helper.sendAjax(datas, '/search/cases', search.view.cases);
        },
        search: function() {
            var datas = search.helper.request();
            datas.year = $('[name="search-year"]').val();
            datas.inventory = $('[name="search-inventory"]').val();
            datas.id = $('input[name="fund_id"]').val();
            search.helper.sendAjax(datas, '/search/search', search.view.search);
        },

    };
    search.view = search.view || {
        init: function() {
            if ($('div').is('.search-case')) {

            }

            $('body').on('keyup', '.name-number-fund', function() {
                search.controller.funds($(this));
            });
            $('body').on('keyup', '.name-number-case', function() {
                search.controller.cases($(this));
            }).on('input', '.search_by_year_inventory', function() {
                search.controller.search();
            });;
        },
        funds: function(datas) {
            var t = $('.name-number-fund:first');
            $('.rows-results').stop().remove();
            if (datas.length) {
                t.removeClass('no-results-input').parents('div:first').append('<div class="rows-results"></div>');
                datas.forEach(e => {
                    $('.rows-results').append('<a href="/fund/' + e.id + '" class="result_link">' + e.number + '</a>');
                });
            } else {
                t.addClass('no-results-input');
            }
        },
        cases: function(datas) {
            var t = $('.name-number-case:first');
            $('.rows-results').stop().remove();
            if (datas.length) {
                t.removeClass('no-results-input').parents('div:first').append('<div class="rows-results"></div>');
                datas.forEach(e => {
                    $('.rows-results:first').append('<a href="/case/' + e.id + '" class="result_link">' + e.number + '</a>');
                });
            } else {
                t.addClass('no-results-input');
            }
        },
        search: function(datas) {
            $('#cases-list').html(datas.html);
        },
    };
    $(document).ready(search.view.init);
})(window.search = window.search || {}, jQuery);


