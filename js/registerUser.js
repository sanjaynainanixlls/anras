$(document).ready(function(){
    $('#headCount').keyup(function(){
        //say user pays 50 INR per person
        var personCount = $('#headCount').val();
        if( personCount >= 1){
            $('#totalAmountCard').val($('#headCount').val() * 50);
        }
           
    });
})