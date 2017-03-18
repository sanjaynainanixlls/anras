$('#bhawanSelect').on('change', function(){
	if(this.value=="AN"){
		$('#ANFloorSelect').show();
		$('#ASFloorSelect').hide();
		$('#groundFloorRooms').show();
		$('#firstFloorRooms').hide();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').hide();
		$('#ANGroundFloorRoomsSelect').show();
		$('#ANFirstFloorRoomsSelect').hide();
		$('#ANSecondFloorRoomsSelect').hide();
		$('#ASFirstFloorRoomsSelect').hide();
		$('#ASSecondFloorRoomsSelect').hide();
		$('#ASThirdFloorRoomsSelect').hide();
		$('#ASFourthFloorRoomsSelect').hide();
		$('#roomNumberAlloted').val('1');
	}
	else if(this.value=="AS"){
		$('#ASFloorSelect').show();
		$('#ANFloorSelect').hide();
		$('#groundFloorRooms').hide();
		$('#firstFloorRooms').show();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').hide();
		$('#ANGroundFloorRoomsSelect').hide();
		$('#ANFirstFloorRoomsSelect').hide();
		$('#ANSecondFloorRoomsSelect').hide();
		$('#ASFirstFloorRoomsSelect').show();
		$('#ASSecondFloorRoomsSelect').hide();
		$('#ASThirdFloorRoomsSelect').hide();
		$('#ASFourthFloorRoomsSelect').hide();
		$('#roomNumberAlloted').val('511');
	}
});

$('#ANFloorSelect').on('change', function(){
	console.log(this.value);
	if(this.value=='0'){
		$('#groundFloorRooms').show();
		$('#firstFloorRooms').hide();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').hide();
		$('#ANGroundFloorRoomsSelect').show();
		$('#ANFirstFloorRoomsSelect').hide();
		$('#ANSecondFloorRoomsSelect').hide();
		$('#ASFirstFloorRoomsSelect').hide();
		$('#ASSecondFloorRoomsSelect').hide();
		$('#ASThirdFloorRoomsSelect').hide();
		$('#ASFourthFloorRoomsSelect').hide();
		$('#roomNumberAlloted').val('1');
		
	}
	else if(this.value=='1'){
		$('#groundFloorRooms').hide();
		$('#firstFloorRooms').show();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').hide();
		$('#ANGroundFloorRoomsSelect').hide();
		$('#ANFirstFloorRoomsSelect').show();
		$('#ANSecondFloorRoomsSelect').hide();
		$('#ASFirstFloorRoomsSelect').hide();
		$('#ASSecondFloorRoomsSelect').hide();
		$('#ASThirdFloorRoomsSelect').hide();
		$('#ASFourthFloorRoomsSelect').hide();
		$('#roomNumberAlloted').val('101');
		
	}
	else if(this.value=='2'){
		$('#groundFloorRooms').hide();
		$('#firstFloorRooms').hide();
		$('#secondFloorRooms').show();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').hide();
		$('#ANGroundFloorRoomsSelect').hide();
		$('#ANFirstFloorRoomsSelect').hide();
		$('#ANSecondFloorRoomsSelect').show();
		$('#ASFirstFloorRooms').hide();
		$('#ASSecondFloorRooms').hide();
		$('#ASThirdFloorRooms').hide();
		$('#ASFourthFloorRooms').hide();
		$('#roomNumberAlloted').val('101');
		
	}
});

$('#ASFloorSelect').on('change', function(){
	if(this.value=='1'){
		$('#groundFloorRooms').hide();
		$('#firstFloorRooms').show();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').hide();
		$('#ANGroundFloorRoomsSelect').hide();
		$('#ANFirstFloorRoomsSelect').hide();
		$('#ANSecondFloorRoomsSelect').hide();
		$('#ASFirstFloorRoomsSelect').show();
		$('#ASSecondFloorRoomsSelect').hide();
		$('#ASThirdFloorRoomsSelect').hide();
		$('#ASFourthFloorRoomsSelect').hide();
		$('#roomNumberAlloted').val('511');
		
	}
	else if(this.value=='2'){
		$('#groundFloorRooms').hide();
		$('#firstFloorRooms').hide();
		$('#secondFloorRooms').show();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').hide();
		$('#ANGroundFloorRoomsSelect').hide();
		$('#ANFirstFloorRoomsSelect').hide();
		$('#ANSecondFloorRoomsSelect').hide();
		$('#ASFirstFloorRoomsSelect').hide();
		$('#ASSecondFloorRoomsSelect').show();
		$('#ASThirdFloorRoomsSelect').hide();
		$('#ASFourthFloorRoomsSelect').hide();
		$('#roomNumberAlloted').val('521');
		
	}
	else if(this.value=='3'){
		$('#groundFloorRooms').hide();
		$('#firstFloorRooms').hide();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').show();
		$('#fourthFloorRooms').hide();
		$('#ANGroundFloorRoomsSelect').hide();
		$('#ANFirstFloorRoomsSelect').hide();
		$('#ANSecondFloorRoomsSelect').hide();
		$('#ASFirstFloorRoomsSelect').hide();
		$('#ASSecondFloorRoomsSelect').hide();
		$('#ASThirdFloorRoomsSelect').show();
		$('#ASFourthFloorRoomsSelect').hide();
		$('#roomNumberAlloted').val('531');
	}
	else if(this.value=='4'){
		$('#groundFloorRooms').hide();
		$('#firstFloorRooms').hide();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').show();
		$('#ANGroundFloorRoomsSelect').hide();
		$('#ANFirstFloorRoomsSelect').hide();
		$('#ANSecondFloorRoomsSelect').hide();
		$('#ASFirstFloorRoomsSelect').hide();
		$('#ASSecondFloorRoomsSelect').hide();
		$('#ASThirdFloorRoomsSelect').hide();
		$('#ASFourthFloorRoomsSelect').show();
		$('#roomNumberAlloted').val('541');
	}
});

$('#ANGroundFloorRoomsSelect').change(function(){
	var roomValue = $(this).find('option:selected').val();
	$('#roomNumberAlloted').val(roomValue);
});

$('#ANFirstFloorRoomsSelect').change(function(){
	var roomValue = $(this).find('option:selected').val();
	$('#roomNumberAlloted').val(roomValue);
});

$('#ANSecondFloorRoomsSelect').change(function(){
	var roomValue = $(this).find('option:selected').val();
	$('#roomNumberAlloted').val(roomValue);

});

$('#ASFirstFloorRoomsSelect').change(function(){
	var roomValue = $(this).find('option:selected').val();
	$('#roomNumberAlloted').val(roomValue);
});

$('#ASSecondFloorRoomsSelect').change(function(){
	var roomValue = $(this).find('option:selected').val();
	$('#roomNumberAlloted').val(roomValue);

});

$('#ASThirdFloorRoomsSelect').change(function(){
	var roomValue = $(this).find('option:selected').val();
	$('#roomNumberAlloted').val(roomValue);
});

$('#ASFourthFloorRoomsSelect').change(function(){
	var roomValue = $(this).find('option:selected').val();
	$('#roomNumberAlloted').val(roomValue);
});

$(document).ready(function(){
	document.getElementById('comingDate').valueAsDate = new Date();

});

$('#printButton').bind('click', function(){
	$(this).hide();
	$('#closeButton').hide();
	$('#wrapper').hide();
	window.print();
	$(this).show();
	$('#closeButton').show();
	$('#wrapper').show();
});

$('#numberOfPeople').on('change', function(){
    var nop = $(this).val();
    $('#totalAmountCard').val(nop*50);
    
    });


