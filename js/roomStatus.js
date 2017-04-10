var totalRooms=0;
var totalCapacity=0;
var totalOccupancy=0;
var verandaCapacity=0;
var roomOccupancy=0;
var verandaOccupancy=0;
$('#roomStatusTable').find('tr').each(function () {
	var roomCapacity = $(this).find('.roomCapacityClass').text();
	var numberOfPeople = $(this).find('.numberOfPeopleStayingClass').text();
    var roomNumber = $(this).find('.roomNumberClass').text();
    
    if(roomNumber=='100'){
        $(this).find('.roomNumberClass').text('Veranda Ground Floor D Block');
    }
    
    if(roomNumber >= 4 && roomNumber <= 35){
            $(this).find('.roomNumberClass').prepend('G-')
    }
    
    if(roomNumber=='200'){
        $(this).find('.roomNumberClass').text('Veranda Ground Floor Main Block');
    }
    
    if(roomNumber=='300'){
        $(this).find('.roomNumberClass').text('Veranda Ground Floor A Block');
    }
    
    if(roomNumber=='1001'){
        $(this).find('.roomNumberClass').text('Veranda First Floor A Block');
    }
    
    if(roomNumber=='1002'){
        $(this).find('.roomNumberClass').text('Veranda First Floor D Block');
    }
    
    if(roomNumber=='1003'){
        $(this).find('.roomNumberClass').text('Veranda First Floor Main Block');
    }
    
    if(roomNumber=='2001'){
        $(this).find('.roomNumberClass').text('Veranda Second Floor A Block');
    }
    
    if(roomNumber=='2002'){
        $(this).find('.roomNumberClass').text('Veranda Second Floor D Block');
    }
    
    if(roomNumber=='2003'){
        $(this).find('.roomNumberClass').text('Veranda Second Floor Main Block');
    }
    
    if(roomNumber=='3001'){
        $(this).find('.roomNumberClass').text('Veranda Third Floor Main Block');
    }
    
    if(roomNumber=='4001'){
        $(this).find('.roomNumberClass').text('Veranda Fourth Floor Main Block');
    }
    
	if(roomCapacity != "" ){
		totalRooms++;
        if(roomNumber=='4001' || roomNumber=='3001' || roomNumber=='2003' || roomNumber=='2002' || roomNumber=='2001' || roomNumber=='1003' ||              roomNumber=='1002' || roomNumber=='1001' || roomNumber=='100' || roomNumber=='200' || roomNumber=='300'){
            
            verandaCapacity = parseInt(roomCapacity,10) + parseInt(verandaCapacity,10);
            verandaOccupancy = parseInt(numberOfPeople,10) + parseInt(verandaOccupancy,10);
        }
        else{
            totalCapacity = parseInt(roomCapacity,10) + parseInt(totalCapacity);
            totalOccupancy= parseInt(numberOfPeople,10) + parseInt(totalOccupancy);
        }
	}
    
    if(parseInt(roomNumber)>=305 && parseInt(roomNumber)<=310){
        $(this).find('.roomNumberClass').css('background-color','#85C1E9');
    }
    if(parseInt(roomNumber)==122 || parseInt(roomNumber)==222 || parseInt(roomNumber)==311){
        $(this).find('.roomNumberClass').css('background-color','#85C1E9');
    }
    
    if(parseInt(roomNumber)>=13 && parseInt(roomNumber)<=17){
        $(this).find('.roomNumberClass').css('background-color','#85C1E9');
    }

	//yellow colored rows
	if(parseInt(numberOfPeople,10)>parseInt(roomCapacity,10) && parseInt(numberOfPeople,10)<=parseInt(roomCapacity,10)+2 ){
		$(this).css('background-color', '#f0ad4e');
	}
	
	//red colored rows
	else if(parseInt(numberOfPeople,10)>parseInt(roomCapacity,10)+2){
		$(this).css('background-color', '#d9534f');
	}
	
	//green colored rows
	else if(parseInt(numberOfPeople,10)> 0 && parseInt(numberOfPeople,10)<=parseInt(roomCapacity,10)){
		$(this).css('background-color', '#5cb85c');
	}
	
	$('#totalRooms').text(totalRooms);
	$('#totalCapacity').text(totalCapacity);
	$('#totalOccupancy').text(totalOccupancy);
    $('#totalCapacityVeranda').text(verandaCapacity);
    $('#totalOccupancyVeranda').text(verandaOccupancy);
});

if(totalCapacity >= totalOccupancy){
    $('#totalOccupancy').css('background-color', '#5cb85c');
}
else if(totalCapacity < totalOccupancy){
    $('#totalOccupancy').css('background-color', '#d9534f');
}


if(verandaCapacity >= verandaOccupancy){
    $('#totalOccupancyVeranda').css('background-color', '#5cb85c');
}
else if(verandaCapacity < verandaOccupancy) {
    $('#totalOccupancyVeranda').css('background-color', '#d9534f');
}
$('#searchByRoom').on('keyup', function(){
	var searchText = parseInt($(this).val(), 10);
	$('.roomStatusTableRow').each(function(index){
		var idCellText = parseInt($(this).find('.roomNumberClass').text(), 10);
		if(idCellText==searchText){
			$(this).show();
		}
		else{
			$(this).hide();
		}
	});
	if($(this).val()==""){
		$('.roomStatusTableRow').each(function(item){
			$(this).show();
		});
	}
});

$('#searchByCity').on('keyup', function(){
	var searchText = $(this).val();
	$('.roomStatusTableRow').each(function(index){
		var idCellText = $(this).find('.cities').text().toLowerCase();
		if(idCellText.indexOf(searchText.toUpperCase())>-1 || idCellText.indexOf(searchText.toLowerCase())>-1){
			$(this).show();
		}
		else{
			$(this).hide();
		}
	});
	if($(this).val()==""){
		$('.roomStatusTableRow').each(function(item){
			$(this).show();
		});
	}
});