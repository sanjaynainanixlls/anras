$('#floorSelect').on('change', function(){
	if(this.value=='0'){
		$('#groundFloorRooms').show();
		$('#firstFloorRooms').hide();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').hide();
		$('#roomNumberAlloted').val('100');
		
	}
	else if(this.value=='1'){
		$('#groundFloorRooms').hide();
		$('#firstFloorRooms').show();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').hide();
		$('#roomNumberAlloted').val('1001');
		
	}
	else if(this.value=='2'){
		$('#groundFloorRooms').hide();
		$('#firstFloorRooms').hide();
		$('#secondFloorRooms').show();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').hide();
		$('#roomNumberAlloted').val('2001');
		
	}
	else if(this.value=='3'){
		$('#groundFloorRooms').hide();
		$('#firstFloorRooms').hide();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').show();
		$('#fourthFloorRooms').hide();
		$('#roomNumberAlloted').val('3001');
		
	}
	else if(this.value=='4'){
		$('#groundFloorRooms').hide();
		$('#firstFloorRooms').hide();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').show();
		$('#roomNumberAlloted').val('4001');
		
	}
});

$('#groundFloorRoomsSelect').change(function(){
	var roomValue = $(this).find('option:selected').val();
	$('#roomNumberAlloted').val(roomValue);
});

$('#firstFloorRoomsSelect').change(function(){
	var roomValue = $(this).find('option:selected').val();
	$('#roomNumberAlloted').val(roomValue);
});

$('#secondFloorRoomsSelect').change(function(){
	var roomValue = $(this).find('option:selected').val();
	$('#roomNumberAlloted').val(roomValue);

});

$('#thirdFloorRoomsSelect').change(function(){
	var roomValue = $(this).find('option:selected').val();
	$('#roomNumberAlloted').val(roomValue);
});

$('#fourthFloorRoomsSelect').change(function(){
	var roomValue = $(this).find('option:selected').val();
	$('#roomNumberAlloted').val(roomValue);
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


