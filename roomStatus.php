<?php
    include 'includeSession.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Room Status</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.jsp">S.S.D.N.</a>
            </div>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.jsp"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="Register"><i class="fa fa-fw fa-plus"></i> Allot A New Room</a>
                    </li>
                    <li>
                        <a href="Checkout"><i class="fa fa-fw fa-minus"></i> Checkout A Room</a>
                    </li>
                    <li>
                        <a href="EditInformation"><i class="fa fa-fw fa-pencil"></i> Edit Information</a>
                    </li>
                    <li>
                        <a href="CompleteStatus"><i class="fa fa-fw fa-list"></i> Complete Status</a>
                    </li>
                    <li>
                         <a href="RoomStatus"><i class="fa fa-fw fa-th-list"></i> Room Status</a>
                    </li>
                    <li>
                         <a href="floorPlans.html"><i class="fa fa-fw fa-map-marker"></i> Floor Plans</a>
                    </li>
                    <li>
                         <a href="TodaysCheckouts"><i class="fa fa-fw fa-calendar"></i> Today's Checkouts</a>
                    </li>
                    <li>
                         <a href="AllCheckouts"><i class="fa fa-fw fa-calendar"></i> All Checkouts</a>
                    </li>
                    <li>
                         <a href="NotCheckedOut"><i class="fa fa-fw fa-calendar"></i> Not Checked Out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Complete Status Of Rooms
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Complete Status Of Rooms
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                	<div class="col-md-12">
                		<div class="col-lg-6 text-center" style="padding-bottom: 20px;">
                			<div class="form-group">
                				<input class="form-control" type="text" id="searchByRoom" placeholder="Search by Room Number" />
                			</div>
                		</div>
                		<div class="col-lg-6 text-center" style="padding-bottom: 20px;">
                			<div class="form-group">
                				<input class="form-control" type="text" id="searchByCity" placeholder="Search by City" />
                			</div>
                		</div>
                	</div>
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-md-4">
                		<div style="padding:10px;">
                			<button class="btn btn-lg btn-info">Total Rooms: <span id="totalRooms"></span></button>
                		</div>
                	</div>
                	<div class="col-md-4">
                		<div style="padding:10px;">
                			<button class="btn btn-lg btn-info">Total Capacity: <span id="totalCapacity"></span></button>
                		</div>
                	</div>
                	<div class="col-md-4">
                		<div style="padding:10px;">
                			<button class="btn btn-lg btn-info">Total Occupancy: <span id="totalOccupancy"></span></button>
                		</div>
                	</div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="roomStatusTable">
                                <thead>
                                    <tr>
                                    	<th>Bhawan</th>
                                        <th>Room Number</th>
                                        <th>Capacity</th>
                                        <th>Number Of People Staying</th>
                                        <th>Cities</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
             <tr class="roomStatusTableRow">
             <td>Anand Niwas</td>
             <td class="roomNumberClass"><strong>200</strong></td>
             <td class="roomCapacityClass"><strong>10</strong></td>
             <td class="numberOfPeopleStayingClass">5</strong></td>
             <td class="cities"><strong>Jaipur,Delhi</strong></td>
             </tr>
             
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
    
    <script src="js/roomStatus.js"></script>

</body>

</html>
