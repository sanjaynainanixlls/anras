

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
		var idCellText = $(this).find('.completeStatusTableRowName').text();
		if(idCellText.indexOf(searchText.toUpperCase())>-1){
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
		var idCellText = $(this).find('.completeStatusTableRowCity').text();
		if(idCellText.indexOf(searchText.toUpperCase())>-1){
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
        
