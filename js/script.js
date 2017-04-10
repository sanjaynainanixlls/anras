$('#floorSelect').on('change', function(){
	if(this.value=='0'){
		$('#groundFloorRooms').show();
		$('#firstFloorRooms').hide();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').hide();
        $('#anandViharRooms').hide();
		$('#roomNumberAlloted').val('100');
		
	}
	else if(this.value=='1'){
		$('#groundFloorRooms').hide();
		$('#firstFloorRooms').show();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').hide();
        $('#anandViharRooms').hide();
		$('#roomNumberAlloted').val('1001');
		
	}
	else if(this.value=='2'){
		$('#groundFloorRooms').hide();
		$('#firstFloorRooms').hide();
		$('#secondFloorRooms').show();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').hide();
        $('#anandViharRooms').hide();
		$('#roomNumberAlloted').val('2001');
		
	}
	else if(this.value=='3'){
		$('#groundFloorRooms').hide();
		$('#firstFloorRooms').hide();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').show();
		$('#fourthFloorRooms').hide();
        $('#anandViharRooms').hide();
		$('#roomNumberAlloted').val('3001');
		
	}
	else if(this.value=='4'){
		$('#groundFloorRooms').hide();
		$('#firstFloorRooms').hide();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').hide();
        $('#anandViharRooms').hide();
		$('#fourthFloorRooms').show();
		$('#roomNumberAlloted').val('4001');
		
	}
    else if(this.value=='5'){
		$('#groundFloorRooms').hide();
		$('#firstFloorRooms').hide();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').hide();
        $('#anandViharRooms').show();
		$('#roomNumberAlloted').val('576');
		
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

$('#anandViharRoomsSelect').change(function(){
	var roomValue = $(this).find('option:selected').val();
	$('#roomNumberAlloted').val(roomValue);
});

$(document).ready(function () {
    document.getElementById('comingDate').valueAsDate = new Date();

});

var roomNumberAllotted = $('#roomNumberAlloted').val();
if(parseInt(roomNumberAllotted) == 100 || parseInt(roomNumberAllotted) == 200 || parseInt(roomNumberAllotted) == 300 || parseInt(roomNumberAllotted) == 5 || parseInt(roomNumberAllotted) == 24 || (parseInt(roomNumberAllotted) >= 12 && parseInt(roomNumberAllotted) <= 17) || (parseInt(roomNumberAllotted) >= 26 && parseInt(roomNumberAllotted) <= 35)){
    $('#floorSelect').val('0');
    $('#groundFloorRooms').show();
		$('#firstFloorRooms').hide();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').hide();
    $('#groundFloorRoomsSelect').val(parseInt(roomNumberAllotted));
}

if(parseInt(roomNumberAllotted) == 1001 || parseInt(roomNumberAllotted) == 1002 || parseInt(roomNumberAllotted) == 1003 || parseInt(roomNumberAllotted) == 5 || parseInt(roomNumberAllotted) == 24 || (parseInt(roomNumberAllotted) >= 101 && parseInt(roomNumberAllotted) <= 122) || (parseInt(roomNumberAllotted) >= 124 && parseInt(roomNumberAllotted) <= 129)){
    $('#floorSelect').val('1');
    $('#groundFloorRooms').hide();
		$('#firstFloorRooms').show();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').hide();
    $('#anandViharRooms').hide();
    $('#firstFloorRoomsSelect').val(parseInt(roomNumberAllotted));
}

if(parseInt(roomNumberAllotted) == 2001 || parseInt(roomNumberAllotted) == 2002 || parseInt(roomNumberAllotted) == 2003 || (parseInt(roomNumberAllotted) >= 201 && parseInt(roomNumberAllotted) <= 241)){
    $('#floorSelect').val('2');
    $('#groundFloorRooms').hide();
		$('#firstFloorRooms').hide();
		$('#secondFloorRooms').show();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').hide();
    $('#secondFloorRoomsSelect').val(parseInt(roomNumberAllotted));
}

if(parseInt(roomNumberAllotted) == 3001 || (parseInt(roomNumberAllotted) >= 301 && parseInt(roomNumberAllotted) <= 314)){
    $('#floorSelect').val('3');
    $('#groundFloorRooms').hide();
		$('#firstFloorRooms').hide();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').show();
		$('#fourthFloorRooms').hide();
    $('#anandViharRooms').hide();
    $('#thirdFloorRoomsSelect').val(parseInt(roomNumberAllotted));
}

if(parseInt(roomNumberAllotted) == 4001 || (parseInt(roomNumberAllotted) >= 401 && parseInt(roomNumberAllotted) <= 414)){
    $('#floorSelect').val('4');
    $('#groundFloorRooms').hide();
		$('#firstFloorRooms').hide();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').show();
    $('#anandViharRooms').hide();
    $('#fourthFloorRoomsSelect').val(parseInt(roomNumberAllotted));
}

if(parseInt(roomNumberAllotted) == 576 || parseInt(roomNumberAllotted) == 577){
    $('#floorSelect').val('5');
    $('#groundFloorRooms').hide();
		$('#firstFloorRooms').hide();
		$('#secondFloorRooms').hide();
		$('#thirdFloorRooms').hide();
		$('#fourthFloorRooms').hide();
    $('#anandViharRooms').show();
    $('#anandViharRoomsSelect').val(parseInt(roomNumberAllotted));
}

$('#printButton').bind('click', function () {
    $(this).hide();
    $('#closeButton').hide();
    $('#wrapper').hide();
    window.print();
    $(this).show();
    $('#closeButton').show();
    $('#wrapper').show();
});

$('#numberOfPeople').on('change', function () {
    var nop = $(this).val();
    $('#totalAmountCard').val(nop * 50);
});

$(document).ready(function () {
    var nop = $("#numberOfPeople").val();
    $('#totalAmountCard').val(nop * 50);
});
