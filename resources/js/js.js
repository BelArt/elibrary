window.alertify = require('alertifyjs');
alertify.set('notifier','position', 'top-bottom');

(function(app, $, undefined) {
    "use strict";
    app.helper = app.helper || {
        sendAjax: function(datas, url, callback) {
            $.ajax({
                url: '/admin' + url,
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
        prepareRightForm: function() {
            if (!$('div').is('#rightForm')) {
                $('body').append('<div id="rightForm"></div><div id="rightFormFon"></div>');
            }
        },
        showRightForm: function(noForm = null) {
            if (!noForm || noForm != 'no-right') {
                $('#rightForm').stop().show().css('right', '0px');
            }

            $('#rightFormFon').stop().fadeIn(150).on('click', function() {
                alertify.confirm('Подтверждение действия', 'Закрыть данное окно?', function(){
                    app.helper.closeRightForm();
                }, function(){ return ;});
            });
            if (!$('body').hasClass('noscroll'))
                $('body').addClass('noscroll');
        },
        closeRightForm: function() {
            if ($('div').is('#rightFormFon')) {
                $('#rightForm').stop().fadeOut(250, function() {
                    $(this).remove();
                });
                $('#rightFormFon').stop().fadeOut(250, function() {
                    $(this).remove();
                });
                $('#comments').stop().fadeOut(250, function() {
                    $(this).remove();
                });
            }
            $('body').removeClass('noscroll');
        },
        request: function() {
            return {
                '_token': $('meta[name="csrf-token"]').attr('content'),
            };
        },
    };
    app.fund = app.fund || {
        init: function() {
            $('body').on('keyup', '#inputFund', function() {
                app.fund.find();
            });
            $('#inputFund').keyup();

            $('body').on('click', '.link_edit', function(e) {
                app.fund.edit($(this).data('id'));
                e.preventDefault();
                return false;
            });
            $('body').on('submit', '#edit_fund', function(e) {
                app.fund.save();
                e.preventDefault();
                return false;
            });
        },
        find: function() {
            let datas = app.helper.request();
            datas.name =  $('#inputFund').val();
            app.helper.sendAjax(datas, '/fund/find', app.fund.showFund);
        },
        save: function(id) {
            let datas = $('#edit_fund').serialize();
            app.helper.sendAjax(datas, '/fund/save', app.fund.afterSave);
        },
        afterSave: function(data) {
            app.helper.closeRightForm();
            alertify.success(data.message);
            app.fund.find();
        },
        edit: function(id) {
            let datas = app.helper.request();
            datas.id =  id;
            app.helper.sendAjax(datas, '/fund/edit/' + id, app.fund.showEdit);
        },
        showEdit: function(datas) {
            app.helper.prepareRightForm();
            $('#rightForm').html(datas.html);
            $('#desc_fund').summernote({
                height: 100,
                toolbar: false,
            });
            app.helper.showRightForm();
        },
        showFund: function(data) {
            $('#fundsItems').html(data.html);
            $('[data-toggle="tooltip"]').tooltip();
        },
    };
    app.inventory = app.inventory || {
        init: function() {
            $('body').on('keyup', '#inputInventory', function() {
                app.inventory.find();
            }).on('change', '#select_fund_id', function() {
                app.inventory.find();
            });
            $('#inputInventory').keyup();

            $('body').on('click', '.link_edit_inventory', function(e) {
                app.inventory.edit($(this).data('id'));
                e.preventDefault();
                return false;
            });
            $('body').on('submit', '#edit_inventory', function(e) {
                app.inventory.save();
                e.preventDefault();
                return false;
            });

        },
        find: function() {
            let datas = app.helper.request();
            datas.name =  $('#inputInventory').val();
            datas.fund =  $('#select_fund_id').val();
            app.helper.sendAjax(datas, '/inventory/find', app.inventory.showInventory);
        },
        save: function(id) {
            let datas = $('#edit_inventory').serialize();
            app.helper.sendAjax(datas, '/inventory/save', app.inventory.afterSave);
        },
        afterSave: function(data) {
            app.helper.closeRightForm();
            alertify.success(data.message);
            app.inventory.find();
        },
        edit: function(id) {
            let datas = app.helper.request();
            datas.id =  id;
            app.helper.sendAjax(datas, '/inventory/edit/' + id, app.inventory.showEdit);
        },
        showEdit: function(datas) {
            app.helper.prepareRightForm();
            $('#rightForm').html(datas.html);
            $('#desc_inventory').summernote({
                height: 100,
                toolbar: false,
            });
            app.helper.showRightForm();
        },
        showInventory: function(data) {
            $('#inventoryItems').html(data.html);
            $('[data-toggle="tooltip"]').tooltip();
        },
    };
    app.case = app.case || {
        init: function() {
            $('body').on('keyup', '#inputCase', function() {
                app.case.find();
            }).on('change', '#select_fund_id_case', function() {
                app.case.find();
            }).on('change', '#select_inventory_case', function() {
                app.case.find();
            });

            $('#inputCase').keyup();

            $('body').on('click', '.link_edit_case', function(e) {
                app.case.edit($(this).data('id'));
                e.preventDefault();
                return false;
            });
            $('body').on('submit', '#edit_case', function(e) {
                app.case.save();
                e.preventDefault();
                return false;
            });

        },
        find: function() {
            let datas = app.helper.request();
            datas.name =  $('#inputCase').val();
            datas.fund =  $('#select_fund_id_case').val();
            datas.inventory =  $('#select_inventory_case').val();
            app.helper.sendAjax(datas, '/case/find', app.case.showCase);
        },
        save: function(id) {
            let datas = $('#edit_case').serialize();
            app.helper.sendAjax(datas, '/case/save', app.case.afterSave);
        },
        afterSave: function(data) {
            app.helper.closeRightForm();
            alertify.success(data.message);
            app.case.find();
        },
        edit: function(id) {
            let datas = app.helper.request();
            datas.id =  id;
            app.helper.sendAjax(datas, '/case/edit/' + id, app.case.showEdit);
        },
        showEdit: function(datas) {
            app.helper.prepareRightForm();
            $('#rightForm').html(datas.html);
            $('#desc_case').summernote({
                height: 100,
                toolbar: false,
            });
            app.helper.showRightForm();
        },
        showCase: function(data) {
            $('#caseItems').html(data.html);
            $('[data-toggle="tooltip"]').tooltip();
        },
    };
    app.page = app.page || {
        init: function() {
            $('body').on('keyup', '#inputPage', function() {
                app.page.find();
            }).on('change', '#select_fund_page', function() {
                app.page.find();
            }).on('change', '#select_inventory_page', function() {
                app.page.find();
            }).on('change', '#select_case_page', function() {
                app.page.find();
            });
            $('#inputPage').keyup();

            $('body').on('click', '.link_edit_page', function(e) {
                app.page.edit($(this).data('id'));
                e.preventDefault();
                return false;
            });
            $('body').on('submit', '#edit_page', function(e) {
                app.page.save();
                e.preventDefault();
                return false;
            });

        },
        find: function() {
            let datas = app.helper.request();
            datas.name =  $('#inputCase').val();
            datas.fund =  $('#select_fund_page').val();
            datas.inventory =  $('#select_inventory_page').val();
            datas.case =  $('#select_case_page').val();
            app.helper.sendAjax(datas, '/page/find', app.page.showCase);
        },
        showCase: function(data) {
            $('#pageItems').html(data.html);
            $('[data-toggle="tooltip"]').tooltip();
        },
    };
    app.comments = app.comments || {
        load: function(id, type) {
            let datas = app.helper.request();
            datas.id =  id;
            datas.type =  type;
            app.helper.sendAjax(datas, '/comments/show/' + id + '/' + type, app.comments.show);
        },
        show: function(datas) {
            app.helper.prepareRightForm();
            $('body').append(datas.html);
            $('#text_comment').summernote({
                height: 100,
                toolbar: false,
            });
            app.helper.showRightForm('no-right');
            $('#form_comment').on('submit', function(e) {
                e.preventDefault();
                app.helper.sendAjax($(this).serialize(), '/comments/save', app.comments.added);
            });
            $('.close_comments').on('click', function() {
                app.helper.closeRightForm();
            });
        },
        added: function(datas) {
            alertify.success(datas.message);

        },
        close: function() {
            app.helper.closeRightForm();

        },
    };
    app.view = app.view || {
        init: function() {
            if ($('div').is('#funds')) {
                app.fund.init();
            }

            if ($('div').is('#inventory')) {
                app.inventory.init();
            }

            if ($('div').is('#case')) {
                app.case.init();
            }

            if ($('div').is('#page')) {
                app.page.init();
            }

            $('body').on('keyup', function(e) {
                if (e.keyCode == 27 && $('div').is('#comments')) {
                    app.comments.close();
                }
            }).on('click', '.comments', function() {
                app.comments.load($(this).data('id'), $(this).data('type'));
            });

        },
    };
    $(document).ready(function() {
        app.view.init();
    });
})(window.app = window.app || {}, jQuery);