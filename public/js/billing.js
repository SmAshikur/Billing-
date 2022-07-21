
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });

    $(".pro").click(function(e){
      e.preventDefault();
    $(this).hide();
      var id = $(this).val();


    $.ajax({
        url:'/get-product/'+id,
        type:"get",
        dataType: 'json',
        success:function (resp) {
            $('#proTable').append('<tr class="productRow">\
            <td>'+resp.name+'</td>\
            <td>'+resp.rate+'</td><input name="rate" value="'+resp.rate+'" type="hidden">\
            <td><input pro_id="'+id+'" rate="'+resp.rate+'" name="qty" id="qty" type="text" class="form-control col-3 mx-5 qty"></td>\
            <td class="total'+id+'">00</td>\
            <td><input proo_id="'+id+'" rate="'+resp.rate+'" name="discount" id="dis" type="text" class="form-control col-3 mx-5 dis"></td>\
            <td  class="netTotal'+id+'"> </td>\
            </tr>');
    //console.log(resp.rate )
        },error:function(){
            alert("error");
        }
    }) });


    $(document).on('keyup','.qty' ,function () {
        var id = $(this).attr('pro_id')
            var rate = $(this).attr('rate')
            var qunatity= parseInt($(this).val());
            var total= parseInt(qunatity*rate)
            $('.total'+id+'').html(qunatity*rate)
            $('.netTotal'+id+'').html(total);
            $('.dis').html('0');
            $(document).on('keyup','.dis' ,function () {
                var idd = $(this).attr('proo_id')
                    var discount= parseInt($(this).val());
                    var totalDiscount= parseInt((total/100)*discount);
                    var netTotal= parseInt(total-totalDiscount)
                        $('.netTotal'+idd+'').html(netTotal);

                    $('.productRow').each(function(index , value){
                        $('#total').val(netTotal);
                        $('#dis_total').val(totalDiscount);
                    })
                    $(document).on('keyup','#paid_amount' ,function () {
                        var paid= parseInt($(this).val());
                        var due= parseInt(netTotal-paid)
                        $('#due_amount').val(due);
                    })
            });


    });









  //$('#proTable').DataTable();
});

