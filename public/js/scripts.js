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

    $('.activate').click(function (){
        var row = $(this).parents('tr');
        var id = row.data('id');
        var form = $('#form-activate')
        var url = form.attr('action').replace(':SURVEY_ID', id)
        var data = form.serialize();
        $(this).parents('tbody').find('tr').find('.activate').each(function(){
            $(this).prop('checked', false);
        });
        $(this).prop('checked', true);
        $.post(url, data);
    });

    var rangeSlider = function(){
    var slider = $('.range-slider'),
    range = $('.range-slider__range'),
    value = $('.range-slider__value');

    slider.each(function(){

        value.each(function(){
            var value = $(this).prev().attr('value');
            $(this).html(value);
            });

            range.on('input', function(){
            $(this).next(value).html(this.value);
                });
        });
    };

    rangeSlider();

    $('.counter-num').counterUp({
        delay: 10,
        time: 1000
    });

    $('.btn-view-more').click(function(e) {
        e.preventDefault();
        $('.view-more').toggle();
        var form = $('#form-provider')
        var provider_id = form.attr('provider_id');
        var url = form.attr('action').replace(':PROVIDER_ID', provider_id);
        var data = form.serialize();
        $.post(url, data);
        $(this).fadeOut();
    });

    $(document).on('click','#view-more-home',function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var form = $('#form-load-more');
            var data = form.serialize();
            var url = form.attr('action');
            $("#view-more-home").html("Cargando....");
            $.ajax({
               url : url,
               method : "POST",
               data : data,
               success : function (data)
               {
                  if(data != ''){
                    $('#remove-row').remove();
                    $('#load-data').append(data);
                  }else{
                    $(this).hide();
                  }
                }
        });
    });

    $(document).on('click','#view-more-providers',function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var form = $('#form-providers');
            var data = form.serialize();
            console.log(data);
            var url = form.attr('action');
            $("#view-more-providers").html("Cargando....");
            $.ajax({
               url : url,
               method : "POST",
               data : data,
               success : function (data)
               {
                  if(data != '')
                  {
                      $('#remove-row-provider').remove();
                      $('#load-providers').append(data);
                  }
                  else
                  {
                       $(this).hide();
                  }
               }
       });
    });
});

