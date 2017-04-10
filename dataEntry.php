<?php
session_start();
include 'includeSession.php';
include dirname(dirname(__FILE__)) . '/anandniwas.com/config/config.php';
$postParams = Functions::getPostParams();
$userDataHandlerObj = new userDataHandler();
$roomData = $userDataHandlerObj->allRoomStatus();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Register</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!--Bootstrap DatePicker-->
        <link href="css/bootstrap-datepicker3.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">
            <?php include_once 'leftSidebar.php'; ?>
            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Register
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-edit"></i> Register
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
                    <?php if (isset($_SESSION['message']) && $_SESSION['message'] != '') { ?>
                        <div class="alert alert-success fade in">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong style="font-size:16px"><?php echo $_SESSION['message']; ?></strong>
                        </div>
                    <?php } unset($_SESSION['message']); ?>
                    <div class="row">
                        <div class="col-lg-6">

                            <form role="form" action="action/action.php" method="post">
                                <input type="hidden" name="action" value='registerUser'>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" id="name" class="form-control" name="name" required="required" placeholder="Name">
                                </div>

                                <div class="form-group">
                                    <label>City</label>
                                    <select id="city" name="city" class="form-control" required>
              <option <?php if(!isset($data['city']) || $data['city']=="") { ?> selected <?php } ?> value="">Please Select City</option>
              <option <?php if(isset($data['city']) && $data['city']=="ABU ROAD") { ?> selected <?php } ?> value="ABU ROAD">ABU ROAD</option>
              <option <?php if(isset($data['city']) && $data['city']=="AGRA") { ?> selected <?php } ?> value="AGRA">AGRA</option>
              <option <?php if(isset($data['city']) && $data['city']=="AHEMDABAD") { ?> selected <?php } ?> value="AHEMDABAD">AHEMDABAD</option>
              <option <?php if(isset($data['city']) && $data['city']=="AJMER") { ?> selected <?php } ?> value="AJMER">AJMER</option>
              <option <?php if(isset($data['city']) && $data['city']=="ALLAHBAD") { ?> selected <?php } ?> value="ALLAHBAD">ALLAHBAD</option>
              <option <?php if(isset($data['city']) && $data['city']=="AMRITSAR") { ?> selected <?php } ?> value="AMRITSAR">AMRITSAR</option>
              <option <?php if(isset($data['city']) && $data['city']=="BANDA") { ?> selected <?php } ?> value="BANDA">BANDA</option>
              <option <?php if(isset($data['city']) && $data['city']=="BANGKOK") { ?> selected <?php } ?> value="BANGKOK">BANGKOK</option>
              <option <?php if(isset($data['city']) && $data['city']=="BANGALORE") { ?> selected <?php } ?> value="BANGALORE">BANGALORE</option>
              <option <?php if(isset($data['city']) && $data['city']=="BAREILY") { ?> selected <?php } ?> value="BAREILY">BAREILY</option>
              <option <?php if(isset($data['city']) && $data['city']=="BEAWAR") { ?> selected <?php } ?> value="BEAWAR">BEAWAR</option>
              <option <?php if(isset($data['city']) && $data['city']=="BHARUCH") { ?> selected <?php } ?> value="BHARUCH">BHARUCH</option>
              <option <?php if(isset($data['city']) && $data['city']=="BHAVNAGAR") { ?> selected <?php } ?> value="BHAVNAGAR">BHAVNAGAR</option>
              <option <?php if(isset($data['city']) && $data['city']=="BHAWANI MANDI") { ?> selected <?php } ?> value="BHAWANI MANDI">BHAWANI MANDI</option>
              <option <?php if(isset($data['city']) && $data['city']=="BHILWARA") { ?> selected <?php } ?> value="BHILWARA">BHILWARA</option>
              <option <?php if(isset($data['city']) && $data['city']=="BHOPAL") { ?> selected <?php } ?> value="BHOPAL">BHOPAL</option>
              <option <?php if(isset($data['city']) && $data['city']=="BIJAPUR") { ?> selected <?php } ?> value="BIJAPUR">BIJAPUR</option>
              <option <?php if(isset($data['city']) && $data['city']=="BUNDI") { ?> selected <?php } ?> value="BUNDI">BUNDI</option>
              <option <?php if(isset($data['city']) && $data['city']=="BILASPUR") { ?> selected <?php } ?> value="BILASPUR">BILASPUR</option>
              <option <?php if(isset($data['city']) && $data['city']=="CHHADVEL") { ?> selected <?php } ?> value="CHHADVEL">CHHADVEL</option>
              <option <?php if(isset($data['city']) && $data['city']=="CHALISGAON") { ?> selected <?php } ?> value="CHALISGAON">CHALISGAON</option>
              <option <?php if(isset($data['city']) && $data['city']=="CHENNAI") { ?> selected <?php } ?> value="CHENNAI">CHENNAI</option>
              <option <?php if(isset($data['city']) && $data['city']=="COLLEGE PARK") { ?> selected <?php } ?> value="COLLEGE PARK">COLLEGE PARK</option>
              <option <?php if(isset($data['city']) && $data['city']=="DAHOD") { ?> selected <?php } ?> value="DAHOD">DAHOD</option>
              <option <?php if(isset($data['city']) && $data['city']=="DELHI") { ?> selected <?php } ?> value="DELHI">DELHI</option>
              <option <?php if(isset($data['city']) && $data['city']=="DEWAS") { ?> selected <?php } ?> value="DEWAS">DEWAS</option>
              <option <?php if(isset($data['city']) && $data['city']=="DHULE") { ?> selected <?php } ?> value="DHULE">DHULE</option>
              <option <?php if(isset($data['city']) && $data['city']=="DHOND") { ?> selected <?php } ?> value="DHOND">DHOND</option>
              <option <?php if(isset($data['city']) && $data['city']=="DUBAI") { ?> selected <?php } ?> value="DUBAI">DUBAI</option>
              <option <?php if(isset($data['city']) && $data['city']=="ETAWAH") { ?> selected <?php } ?> value="ETAWAH">ETAWAH</option>
              <option <?php if(isset($data['city']) && $data['city']=="FAIZABAD") { ?> selected <?php } ?> value="FAIZABAD">FAIZABAD</option>
              <option <?php if(isset($data['city']) && $data['city']=="GANDHIDHAM") { ?> selected <?php } ?> value="GANDHIDHAM">GANDHIDHAM</option>
              <option <?php if(isset($data['city']) && $data['city']=="GODHARA") { ?> selected <?php } ?> value="GODHARA">GODHARA</option>
              <option <?php if(isset($data['city']) && $data['city']=="GORAKHPUR") { ?> selected <?php } ?> value="GORAKHPUR">GORAKHPUR</option>
              <option <?php if(isset($data['city']) && $data['city']=="GWALIOR") { ?> selected <?php } ?> value="GWALIOR">GWALIOR</option>
              <option <?php if(isset($data['city']) && $data['city']=="HAMILTON") { ?> selected <?php } ?> value="HAMILTON">HAMILTON</option>
              <option <?php if(isset($data['city']) && $data['city']=="HAROA") { ?> selected <?php } ?> value="HAROA">HAROA</option>
              <option <?php if(isset($data['city']) && $data['city']=="HONG KONG") { ?> selected <?php } ?> value="HONG KONG">HONG KONG</option>
              <option <?php if(isset($data['city']) && $data['city']=="HYDERABAD") { ?> selected <?php } ?> value="HYDERABAD">HYDERABAD</option>  
              <option <?php if(isset($data['city']) && $data['city']=="INDORE") { ?> selected <?php } ?> value="INDORE">INDORE</option>
              <option <?php if(isset($data['city']) && $data['city']=="JABALPUR") { ?> selected <?php } ?> value="JABALPUR">JABALPUR</option>
              <option <?php if(isset($data['city']) && $data['city']=="JAIPUR") { ?> selected <?php } ?> value="JAIPUR">JAIPUR</option>
              <option <?php if(isset($data['city']) && $data['city']=="JAMNAGAR") { ?> selected <?php } ?> value="JAMNAGAR">JAMNAGAR</option>
              <option <?php if(isset($data['city']) && $data['city']=="JHANSI") { ?> selected <?php } ?> value="JHANSI">JHANSI</option>
              <option <?php if(isset($data['city']) && $data['city']=="JODHPUR") { ?> selected <?php } ?> value="JODHPUR">JODHPUR</option>
              <option <?php if(isset($data['city']) && $data['city']=="JUNAGARH") { ?> selected <?php } ?> value="JUNAGARH">JUNAGARH</option>
              <option <?php if(isset($data['city']) && $data['city']=="KALOL") { ?> selected <?php } ?> value="KALOL">KALOL</option>
              <option <?php if(isset($data['city']) && $data['city']=="KANPUR") { ?> selected <?php } ?> value="KANPUR">KANPUR</option>
              <option <?php if(isset($data['city']) && $data['city']=="KATNI") { ?> selected <?php } ?> value="KATNI">KATNI</option>
              <option <?php if(isset($data['city']) && $data['city']=="KHAIRTHAL") { ?> selected <?php } ?> value="KHAIRTHAL">KHAIRTHAL</option>
              <option <?php if(isset($data['city']) && $data['city']=="KHANDWA") { ?> selected <?php } ?> value="KHANDWA">KHANDWA</option>
              <option <?php if(isset($data['city']) && $data['city']=="KOLKATA") { ?> selected <?php } ?> value="KOLKATA">KOLKATA</option>
              <option <?php if(isset($data['city']) && $data['city']=="KOTA") { ?> selected <?php } ?> value="KOTA">KOTA</option>
              <option <?php if(isset($data['city']) && $data['city']=="LOS ANGELES") { ?> selected <?php } ?> value="LOS ANGELES">LOS ANGELES</option>
              <option <?php if(isset($data['city']) && $data['city']=="LUCKNOW") { ?> selected <?php } ?> value="LUCKNOW">LUCKNOW</option>
              <option <?php if(isset($data['city']) && $data['city']=="MAIHAR") { ?> selected <?php } ?> value="MAIHAR">MAIHAR</option>
              <option <?php if(isset($data['city']) && $data['city']=="MALEGAON") { ?> selected <?php } ?> value="MALEGAON">MALEGAON</option>
              <option <?php if(isset($data['city']) && $data['city']=="MANDSOR") { ?> selected <?php } ?> value="MANDSOR">MANDSOR</option>
              <option <?php if(isset($data['city']) && $data['city']=="MANILA") { ?> selected <?php } ?> value="MANILA">MANILA</option>
              <option <?php if(isset($data['city']) && $data['city']=="MASSACHUSETTS") { ?> selected <?php } ?> value="MASSACHUSETTS">MASSACHUSETTS</option>
              <option <?php if(isset($data['city']) && $data['city']=="MUMBAI") { ?> selected <?php } ?> value="MUMBAI">MUMBAI</option>
              <option <?php if(isset($data['city']) && $data['city']=="NASHIK") { ?> selected <?php } ?> value="NASHIK">NASHIK</option>
              <option <?php if(isset($data['city']) && $data['city']=="NAUSARI") { ?> selected <?php } ?> value="NAUSARI">NAUSARI</option>
              <option <?php if(isset($data['city']) && $data['city']=="NEW YORK") { ?> selected <?php } ?> value="NEW YORK">NEW YORK</option>
              <option <?php if(isset($data['city']) && $data['city']=="NIMBAHEDA") { ?> selected <?php } ?> value="NIMBAHEDA">NIMBAHEDA</option>
              <option <?php if(isset($data['city']) && $data['city']=="ORAI") { ?> selected <?php } ?> value="ORAI">ORAI</option>
              <option <?php if(isset($data['city']) && $data['city']=="OTHER") { ?> selected <?php } ?> value="OTHER">OTHER</option>
              <option <?php if(isset($data['city']) && $data['city']=="PACHORA") { ?> selected <?php } ?> value="PACHORA">PACHORA</option>
              <option <?php if(isset($data['city']) && $data['city']=="PANNA") { ?> selected <?php } ?> value="PANNA">PANNA</option>    
              <option <?php if(isset($data['city']) && $data['city']=="PIMPRI") { ?> selected <?php } ?> value="PIMPRI">PIMPRI</option>
              <option <?php if(isset($data['city']) && $data['city']=="PUNE") { ?> selected <?php } ?> value="PUNE">PUNE</option>
              <option <?php if(isset($data['city']) && $data['city']=="RAIGARH") { ?> selected <?php } ?> value="RAIGARH">RAIGARH</option>
              <option <?php if(isset($data['city']) && $data['city']=="RAJKOT") { ?> selected <?php } ?> value="RAJKOT">RAJKOT</option>
              <option <?php if(isset($data['city']) && $data['city']=="RATLAM") { ?> selected <?php } ?> value="RATLAM">RATLAM</option>
              <option <?php if(isset($data['city']) && $data['city']=="REWA") { ?> selected <?php } ?> value="REWA">REWA</option>
              <option <?php if(isset($data['city']) && $data['city']=="SATNA") { ?> selected <?php } ?> value="SATNA">SATNA</option>
              <option <?php if(isset($data['city']) && $data['city']=="SECUNDRABAD") { ?> selected <?php } ?> value="SECUNDRABAD">SECUNDRABAD</option>
              <option <?php if(isset($data['city']) && $data['city']=="SHAHADRA") { ?> selected <?php } ?> value="SHAHADRA">SHAHADRA</option>
              <option <?php if(isset($data['city']) && $data['city']=="SINDH") { ?> selected <?php } ?> value="SINDH">SINDH</option>
              <option <?php if(isset($data['city']) && $data['city']=="SINGAPORE") { ?> selected <?php } ?> value="SINGAPORE">SINGAPORE</option>
              <option <?php if(isset($data['city']) && $data['city']=="SOLAPUR") { ?> selected <?php } ?> value="SOLAPUR">SOLAPUR</option>
              <option <?php if(isset($data['city']) && $data['city']=="SUGAR LAND") { ?> selected <?php } ?> value="SUGAR LAND">SUGAR LAND</option>
              <option <?php if(isset($data['city']) && $data['city']=="SURAT") { ?> selected <?php } ?> value="SURAT">SURAT</option>
              <option <?php if(isset($data['city']) && $data['city']=="UJJAIN") { ?> selected <?php } ?> value="UJJAIN">UJJAIN</option>
              <option <?php if(isset($data['city']) && $data['city']=="ULHAS NAGAR") { ?> selected <?php } ?> value="ULHAS NAGAR">ULHAS NAGAR</option>
              <option <?php if(isset($data['city']) && $data['city']=="UMARIA") { ?> selected <?php } ?> value="UMARIA">UMARIA</option>
              <option <?php if(isset($data['city']) && $data['city']=="VADODRA") { ?> selected <?php } ?> value="VADODRA">VADODRA</option>
              <option <?php if(isset($data['city']) && $data['city']=="VALSAD") { ?> selected <?php } ?> value="VALSAD">VALSAD</option>
              <option <?php if(isset($data['city']) && $data['city']=="VARANASI") { ?> selected <?php } ?> value="VARANASI">VARANASI</option>
              <option <?php if(isset($data['city']) && $data['city']=="VIDISHA") { ?> selected <?php } ?> value="VIDISHA">VIDISHA</option>
    </select>
                                </div>

                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="tel" id="phoneNumber" class="form-control" name="phoneNumber" required="required" placeholder="Mobile" minlength="10" maxlength="10">
                                </div>

                                <div class="form-group">
                                    <label>Total Number of Bhagats</label>
                                    <input id="headCount" type="number" class="form-control" name="numberOfPeople" required="required" placeholder="Head Count">
                                </div>

                                <div class="form-group">
                                    <label>Date of Arrival</label>
                                    <input id="comingDate" type="date" class="form-control" name="comingDate" required="required">
                                </div>

                                <div class="form-group">
                                    <label>Date of Return</label>
                                    <input type="date" id="returnDate" class="form-control" name="returnDate" required="required">

                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-warning">Reset</button>

                            </form>

                        </div>

                        <div class="col-lg-6">
                            <div class="table-responsive">
                                <table id="roomStatusTable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 100px;">Room Number</th>
                                            <th style="width: 100px;">Capacity</th>
                                            <th style="width: 100px;">Number Of People Staying</th>
                                            <th>Cities</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php for ($i = 0; $i < count($roomData); $i++) { ?>
                                            <tr class="roomStatusTableRow">
                                                <td class="roomNumberClass"><strong><?php echo $roomData[$i]['roomNumber']; ?></strong></td>
                                                <td class="roomCapacityClass"><strong><?php echo $roomData[$i]['capacity']; ?></strong></td>
                                                <td class="numberOfPeopleStayingClass"><strong><?php echo $roomData[$i]['occupied']; ?></strong></td>
                                                <td class="cities"><strong><?php echo $roomData[$i]['city']; ?></strong></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Additional JavaScript -->
        <script src="js/script.js"></script>
        <script src='js/registerUser.js'></script>
        <script src="js/roomStatus.js"></script>

    </body>

</html>
