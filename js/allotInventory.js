$(document).ready(function(){
    $('.form-group').on('click','#allotNow',function(){
        var totalParticularCount = parseInt($('#mattress').val())+parseInt($('#pillow').val())+parseInt($('#bedsheet').val())+parseInt($('#blanket').val())+parseInt($('#lock').val()); 
        var amountToCollect = parseInt(parseInt(totalParticularCount) * 100 );
        $('#totalAmount').val(amountToCollect);
    });
});