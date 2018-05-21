$(document).ready(function () {
    $('.btn-destroy').click(function (e){
        e.preventDefault();
        var row = $(this).parents('tr');
        var id = row.data('id');
        var form = $('#form-destroy')
        var url = form.attr('action').replace(':SURVEY_ID', id)
        var data = form.serialize();
        console.log(url);

        $.post(url, data, function(result){
            row.fadeOut();
        }).fail(function(){
            row.show();
        });
    });

    $('.btn-activate').click(function (e){
        e.preventDefault();
        var row = $(this).parents('tr');
        var id = row.data('id');
        var form = $('#form-activate')
        var url = form.attr('action').replace(':SURVEY_ID', id)
        var data = form.serialize();
        $(this).parents('tbody').find('tr').find('#active').each(function(){
                $(this).addClass('d-none');
            });
        $(this).parents('tbody').find('tr').find('.btn-activate').each(function(){
            $(this).removeClass('d-none');
        });
        $(this).parents('tr').find('#active').removeClass('d-none');
        $(this).parents('tr').find('.btn-activate').addClass('d-none');
        $.post(url, data);
    });
});