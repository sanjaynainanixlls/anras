$('.completeStatusTableRow').each(function(index){
		var roomNumber = $(this).find('.completeStatusTableRowRoomAlloted').text();
        if(roomNumber=='100'){
            $(this).find('.completeStatusTableRowRoomAlloted').text('Veranda Ground Floor D Block');
        }

        if(roomNumber=='200'){
            $(this).find('.completeStatusTableRowRoomAlloted').text('Veranda Ground Floor Main Block');
        }

        if(roomNumber=='1001'){
            $(this).find('.completeStatusTableRowRoomAlloted').text('Veranda First Floor A Block');
        }

        if(roomNumber=='1002'){
            $(this).find('.completeStatusTableRowRoomAlloted').text('Veranda First Floor D Block');
        }

        if(roomNumber=='1003'){
            $(this).find('.completeStatusTableRowRoomAlloted').text('Veranda First Floor Main Block');
        }

        if(roomNumber=='2001'){
            $(this).find('.completeStatusTableRowRoomAlloted').text('Veranda Second Floor A Block');
        }

        if(roomNumber=='2002'){
            $(this).find('.completeStatusTableRowRoomAlloted').text('Veranda Second Floor D Block');
        }

        if(roomNumber=='2003'){
            $(this).find('.completeStatusTableRowRoomAlloted').text('Veranda Second Floor Main Block');
        }

        if(roomNumber=='3001'){
            $(this).find('.completeStatusTableRowRoomAlloted').text('Veranda Third Floor Main Block');
        }

        if(roomNumber=='4001'){
            $(this).find('.completeStatusTableRowRoomAlloted').text('Veranda Fourth Floor Main Block');
        }
	});

$('#searchById').on('keyup', function(){
	var searchText = parseInt($(this).val(), 10);
	$('.completeStatusTableRow').each(function(index){
		var idCellText = parseInt($(this).find('.completeStatusTableRowId').text(), 10);
		if(searchText==idCellText){
			$(this).show();
		}
		else{
			$(this).hide();
		}
	});
	if($(this).val()==""){
		$('.completeStatusTableRow').each(function(item){
			$(this).show();
		});
	}
});

$('#searchByName').on('keyup', function(){
	var searchText = $(this).val();
	$('.completeStatusTableRow').each(function(index){
		var idCellText = $(this).find('.completeStatusTableRowName').text().toLowerCase();
		if(idCellText.indexOf(searchText.toUpperCase())>-1 || idCellText.indexOf(searchText.toLowerCase())>-1){
			$(this).show();
		}
		else{
			$(this).hide();
		}
	});
	if($(this).val()==""){
		$('.completeStatusTableRow').each(function(item){
			$(this).show();
		});
	}
});

$('#searchByCity').on('keyup', function(){
	var searchText = $(this).val();
	$('.completeStatusTableRow').each(function(index){
		var idCellText = $(this).find('.completeStatusTableRowCity').text().toLowerCase();
		if(idCellText.indexOf(searchText.toUpperCase())>-1 || idCellText.indexOf(searchText.toLowerCase())>-1){
			$(this).show();
		}
		else{
			$(this).hide();
		}
	});
	if($(this).val()==""){
		$('.completeStatusTableRow').each(function(item){
			$(this).show();
		});
	}
});

$('#searchByRoom').on('keyup', function(){
	var searchText = parseInt($(this).val(), 10);
	$('.completeStatusTableRow').each(function(index){
		var idCellText = parseInt($(this).find('.completeStatusTableRowRoomAlloted').text(), 10);
		if(idCellText==searchText){
			$(this).show();
		}
		else{
			$(this).hide();
		}
	});
	if($(this).val()==""){
		$('.completeStatusTableRow').each(function(item){
			$(this).show();
		});
	}
});
$("#edit").click(function(){
    var dataToSend = {};
    dataToSend['id'] = $("#edit").val();
    $.ajax({
        url:"common/ajax.function.php",
        type:"POST",
        data:dataToSend,
        success:function(data){
            console.log(data);
        }
        
    });
});