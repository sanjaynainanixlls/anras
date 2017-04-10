$(document).ready(function(){
    var totalMattressGiven = 0;
    var totalPillowsGiven = 0;
    var totalBedsheetsGiven = 0;
    var totalQuiltsGiven = 0;
    var totalKeysGiven = 0;
    var totalDasCardsGiven = 0;
    var grandTotal = 0;
    $('.inventoryStatusTableRow').each(function(index){
        var mattressCount = $(this).find('.inventoryStatusTableRowMattress').text();
        var pillowCount = $(this).find('.inventoryStatusTableRowPillow').text();
        var bedsheetCount = $(this).find('.inventoryStatusTableRowBedsheet').text();
        var quiltCount = $(this).find('.inventoryStatusTableRowQuilt').text();
        var keyCount = $(this).find('.inventoryStatusTableRowKey').text();
        var dasCardsCount = $(this).find('.inventoryStatusTableRowDasCards').text();
        var totalAmount = $(this).find('.inventoryStatusTableRowTotalAmount').text();
        totalMattressGiven = parseInt(totalMattressGiven) + parseInt(mattressCount);
        totalPillowsGiven = parseInt(totalPillowsGiven) + parseInt(pillowCount);
        totalBedsheetsGiven = parseInt(totalBedsheetsGiven) + parseInt(bedsheetCount);
        totalQuiltsGiven = parseInt(totalQuiltsGiven) + parseInt(quiltCount);
        totalKeysGiven = parseInt(totalKeysGiven) + parseInt(keyCount);
        totalDasCardsGiven = parseInt(totalDasCardsGiven) + parseInt(dasCardsCount);
        grandTotal = parseInt(grandTotal) + parseInt(totalAmount);
    });
    $('#totalMattressGiven').text(totalMattressGiven);
    $('#totalPillowsGiven').text(totalPillowsGiven);
    $('#totalBedsheetsGiven').text(totalBedsheetsGiven);
    $('#totalQuiltsGiven').text(totalQuiltsGiven);
    $('#totalKeysGiven').text(totalKeysGiven);
    $('#totalDasCardsGiven').text(totalDasCardsGiven);
    $('#totalAmountGiven').text(grandTotal);
    
    $('#searchById').on('keyup', function(){
	var searchText = parseInt($(this).val(), 10);
	$('.inventoryStatusTableRow').each(function(index){
		var idCellText = parseInt($(this).find('.inventoryStatusTableRowGuestId').text(), 10);
		if(searchText==idCellText){
			$(this).show();
		}
		else{
			$(this).hide();
		}
	});
	if($(this).val()==""){
		$('.inventoryStatusTableRow').each(function(item){
			$(this).show();
		});
	}
});
});