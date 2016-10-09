$(document).ready(function () {
    
    $("#checkoutSubmit").click(function () {
        var dataArr = {};
        dataArr['checkoutId'] = $("#checkoutID").val();
        dataArr['pageKey'] = $('#checkout').val();
        $.ajax({
            url: "common/ajax.function.php",
            data: dataArr,
            method: "POST",
            success: function (data) {
                var checkoutData = JSON.parse(data);
                createCheckoutTable(checkoutData);
            }
        });
    });
});

function createCheckoutTable(data) {
    var response = '';
    response += '<div class="container-fluid">';
    response += '<div class="row">';
    response += '<div class="col-lg-12">';
    response += '<h1 class="page-header">Checkout</h1>';
    response += '<ol class="breadcrumb">';
    response += '<li><i class="fa fa-dashboard"></i>  <a href="home.php">Dashboard</a></li>';
    response += '<li class="active"><i class="fa fa-table"></i> Checkout</li>';
    response += '</ol>';
    response += '</div>';
    response += '</div>';
    response += '<div class="row">';
    response += '<div class="col-lg-12">';
    response += '<div class="table-responsive">';
    response += '<form method="Post" action="action/action.php" id="formId">';
    response += '<input type="hidden" name="action"  value="checkoutData">';
    response += '<input type="hidden" name="userId"  value="'+ data[0]['id'] +'">';
    response += '<input type="hidden" name="roomNum"  value="'+ data[0]['roomNumberAlloted'] +'">';
    response += '<table class="table table-bordered table-hover">';
    response += '<thead><tr>';
    response += '<th>Id</th><th>Name</th><th>Phone Number</th><th>City</th><th>Coming Date</th><th>Return Date</th><th>Number Of People</th><th>Room Number Alloted</th>';
    response += '</tr></thead>';
    response += '<tbody><tr id="checkoutDetail" name="checkoutDetail">';
    response += '<td id="checkoutId" name="checkoutId" value="'+data[0]['id']+'">' + data[0]['id'] + '</td>';
    response += '<td id="name" name="name" value="'+data[0]['name']+'">' + data[0]['name'] + '</td>';
    response += '<td id="contact" name="contact" value="'+data[0]['phoneNumber']+'">' + data[0]['phoneNumber'] + '</td>';
    response += '<td id="city" name="city" value="'+data[0]['city']+'">' + data[0]['city'] + '</td>';
    response += '<td id="coming_date" name="coming_date" value="'+data[0]['dateOfArrival']+'">' + data[0]['dateOfArrival'] + '</td>';
    response += '<td id="return_date" name="return_date" value="'+data[0]['dateOfDeparture']+'">' + data[0]['dateOfDeparture'] + '</td>';
    response += '<td id="head_count" name="head_count" value="'+data[0]['numberOfPeople']+'">' + data[0]['numberOfPeople'] + '</td>';
    response += '<td id="room_alloted" name="room_alloted" value="'+data[0]['roomNumberAllotted']+'">' + data[0]['roomNumberAllotted'] + '</td>';
    response += '</tr></tbody></table>';
    response += '<button type="submit" class="btn btn-success" id="checkout_now"> Checkout Now </button>';
    response += '</form>';
    response += '<a href ="checkout.php"> <button class="btn btn-warning text-center" style="margin-top:20px;"> Search Again </button></a >';
    response += '</div></div></div></div>';

    $('#page-wrapper').html(response);
}
//$(document).on("click", '#checkout_now', function (data) {
//    var id = $('#checkoutId').val();
//    
//    });

