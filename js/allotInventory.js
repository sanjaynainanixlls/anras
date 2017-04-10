$(document).ready(function(){
    var totalItemCount = parseInt($('#matressCount').text()) + parseInt($('#bedsheetCount').text()) + parseInt($('#pillowCount').text()) + parseInt($('#quiltCount').text()) + parseInt($('#lockNKeyCount').text()) + parseInt($('#dasCardsCount').text());
    var totalAmount = parseInt($('#matressCount').text())*100 + parseInt($('#bedsheetCount').text())*100 + parseInt($('#pillowCount').text())*50 + parseInt($('#quiltCount').text())*100 + parseInt($('#lockNKeyCount').text())*100 + parseInt($('#dasCardsCount').text())*50;
    $('#totalItems').text(totalItemCount);
    $('#hiddenTotalItemCount').val(totalItemCount);
    $('#totalAmount').text(totalAmount);
    $('#hiddenTotalAmount').val(totalAmount);
    
    
    $('#check').on('click', function(){
        var printContents = document.getElementById('printTable').innerHTML;
         w=window.open();
         w.document.write(printContents);
         w.print();
         w.close();
    });
    
        var roomNumber = $('#roomNumberCell').text();
        if(roomNumber=='100'){
            $('#roomNumberCell').text('Veranda Ground Floor D Block');
            $('#floorCell').text('Ground Floor');
            $('#bedStoreNumber').text('G11');
        }

        if(roomNumber=='200'){
            $('#roomNumberCell').text('Veranda Ground Floor Main Block');
            $('#floorCell').text('Ground Floor');
            $('#bedStoreNumber').text('G11');
        }
    
        if(roomNumber=='300'){
            $('#roomNumberCell').text('Veranda Ground Floor A Block');
            $('#floorCell').text('Ground Floor');
            $('#bedStoreNumber').text('G11');
        }

        if(roomNumber=='1001'){
            $('#roomNumberCell').text('Veranda First Floor A Block');
            $('#floorCell').text('First Floor');
            $('#bedStoreNumber').text('123');
        }

        if(roomNumber=='1002'){
            $('#roomNumberCell').text('Veranda First Floor D Block');
            $('#floorCell').text('First Floor');
            $('#bedStoreNumber').text('123');
        }

        if(roomNumber=='1003'){
            $('#roomNumberCell').text('Veranda First Floor Main Block');
            $('#floorCell').text('First Floor');
            $('#bedStoreNumber').text('123');
        }

        if(roomNumber=='2001'){
            $('#roomNumberCell').text('Veranda Second Floor A Block');
            $('#floorCell').text('Second Floor');
            $('#bedStoreNumber').text('223');
        }

        if(roomNumber=='2002'){
            $('#roomNumberCell').text('Veranda Second Floor D Block');
            $('#floorCell').text('Second Floor');
            $('#bedStoreNumber').text('223');
        }

        if(roomNumber=='2003'){
            $('#roomNumberCell').text('Veranda Second Floor Main Block');
            $('#bedStoreNumber').text('223');
        }

        if(roomNumber=='3001'){
            $('#roomNumberCell').text('Veranda Third Floor Main Block');
            $('#floorCell').text('Third Floor');
            $('#bedStoreNumber').text('312');
        }

        if(roomNumber=='4001'){
            $('#roomNumberCell').text('Veranda Fourth Floor Main Block');
            $('#floorCell').text('Fourth Floor');
        }
    
        if(roomNumber >= 4 && roomNumber <= 35){
            $('#floorCell').text('Ground Floor');
            $('#roomNumberCell').prepend('G-')
            $('#bedStoreNumber').text('G11');
        }
        if(roomNumber >= 101 && roomNumber <= 129){
            $('#floorCell').text('First Floor');
            $('#bedStoreNumber').text('123');
        }
        if(roomNumber >= 201 && roomNumber <= 241){
            $('#floorCell').text('Second Floor');
            $('#bedStoreNumber').text('223');
        }
        if(roomNumber >= 301 && roomNumber <= 314){
            $('#floorCell').text('Third Floor');
            $('#bedStoreNumber').text('312');
        }
        if(roomNumber >= 401 && roomNumber <= 413){
            $('#floorCell').text('Fourth Floor');
            $('#bedStoreNumber').text('312');
        }
        if(roomNumber == 576 || roomNumber == 577){
            $('#floorCell').text('First Floor');
            $('#bedStoreNumber').text('Anand Vihar 3');
        }
    
    $("#allotInventoryForm").submit(function () {
        $("#allotNow").attr("disabled", true);
        return true;
    });
        
    
    
});

