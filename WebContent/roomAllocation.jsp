<%@page import="com.model.Rooms"%>
<%@page import="java.util.Iterator"%>
<%@page import="java.util.List"%>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Room Allocation</title>

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
                            Room Allotment
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Room Allotment
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                        <form role="form" action="Register" method="post">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"  class="form-control" name="name" required="required">
                            </div>

                            <div class="form-group">
                                <label>City</label>
                                <input type="text"  class="form-control" name="city" required="required">
                            </div>
                            
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="tel"  class="form-control" name="phoneNumber" required="required">
                            </div>
                            
                            <div class="form-group">
                                <label>Total Number of Bhagats</label>
                                <input type="number" class="form-control" name="numberOfPeople" required="required">
                            </div>
 							
 							<div class="form-group">
                                <label>Date of Arrival</label>
                                <input id="comingDate" type="date" class="form-control" name="comingDate" required="required">
                            </div>
 							                           
                            <div class="form-group">
                                <label>Date of Return</label>
                                <input type="date" class="form-control" name="returnDate" required="required">
                            </div>
                            
                            <div class="form-group">
                            	<label>Select Bhawan</label>
                            	<select class="form-control" id="bhawanSelect">
                            		<option value="AN">Anand Niwas</option>
                            		<option value="AS">Ashish Sadan</option>
                            	</select>
                            </div>
                            
                                                        
                            <div class="form-group">
                                <label>Select Floor</label>
                                <select class="form-control" id="ANFloorSelect">
                                    <option value="0">Ground Floor</option>
                                    <option value="1">First Floor</option>
                                    <option value="2">Second Floor</option>
                                </select>
                                
                                <select class="form-control" id="ASFloorSelect" style="display:none">
                                    <option value="1">First Floor</option>
                                    <option value="2">Second Floor</option>
                                    <option value="3">Third Floor</option>
                                    <option value="4">Fourth Floor</option>
                                </select>
                            </div>
                            
                            <div class="form-group" id="groundFloorRooms">
                                <label>Select Room</label>
                                <select class="form-control" id="ANGroundFloorRoomsSelect">
                                    <option value="1">G-1</option>
                                    <option value="2">G-2</option>
                                    <option value="4">G-4</option>
                                    <option value="5">G-5</option>
                                    <option value="6">G-6</option>
                                    <option value="7">G-7</option>
                                    <option value="8">G-8</option>
                                </select>
                            </div>
                            
                            <div class="form-group" id="firstFloorRooms">
                                <label>Select Room</label>
                                <select class="form-control" id="ANFirstFloorRoomsSelect">
                                	<option>101</option>
                                	<option>102</option>
                                	<option>103</option>
                                	<option>104</option>
                                	<option>105</option>
                                	<option>106</option>
                                	<option>107</option>
                                	<option>108</option>
                                </select>
                                
                                <select class="form-control" id="ASFirstFloorRoomsSelect">
                                	<option>511</option>
                                	<option>512</option>
                                	<option>513</option>
                                	<option>514</option>
                                	<option>515</option>
                                	<option>516</option>
                                	<option>517</option>
                                	<option>518</option>
                                	<option>519</option>
                                	<option>611</option>
                                	<option>612</option>
                                	<option>613</option>
                                	<option>614</option>
                                	<option>615</option>
                                	<option>616</option>
                                	<option>617</option>
                                	<option>618</option>
                                	<option>619</option>
                                	<option>620</option>
                                </select>
                                
                                
                            </div>
                            
                            <div class="form-group" id="secondFloorRooms">
                                <label>Select Room</label>
                                <select class="form-control" id="ANSecondFloorRoomsSelect">
                                    <option>201</option>
                                    <option>202</option>
                                    <option>203</option>
                                    <option>204</option>
                                    <option>205</option>
                                    <option>206</option>
                                    <option>207</option>
                                    <option>208</option>
                                </select>
                                
                                <select class="form-control" id="ASSecondFloorRoomsSelect">
                                    <option>521</option>
                                    <option>522</option>
                                    <option>523</option>
                                    <option>524</option>
                                    <option>525</option>
                                    <option>526</option>
                                    <option>527</option>
                                    <option>528</option>
                                    <option>529</option>
                                    <option>621</option>
                                    <option>622</option>
                                    <option>623</option>
                                    <option>624</option>
                                    <option>625</option>
                                    <option>626</option>
                                    <option>627</option>
                                    <option>628</option>
                                    <option>629</option>
                                    <option>630</option>
                                </select>
                                
                            </div>
                            
                            <div class="form-group" id="thirdFloorRooms">
                                <label>Select Room</label>
                                <select class="form-control" id="ASThirdFloorRoomsSelect">
                                    <option>531</option>
                                    <option>532</option>
                                    <option>533</option>
                                    <option>534</option>
                                    <option>535</option>
                                    <option>536</option>
                                    <option>537</option>
                                    <option>538</option>
                                    <option>539</option>
                                    <option>631</option>
                                    <option>632</option>
                                    <option>633</option>
                                    <option>634</option>
                                    <option>635</option>
                                    <option>636</option>
                                    <option>637</option>
                                    <option>638</option>
                                    <option>639</option>
                                    <option>640</option>
                                </select>
                            </div>
                            
                            <div class="form-group"  id="fourthFloorRooms">
                                <label>Select Room</label>
                                <select class="form-control" id="ASFourthFloorRoomsSelect">
                                    <option>541</option>
                                    <option>542</option>
                                    <option>543</option>
                                    <option>544</option>
                                    <option>545</option>
                                    <option>546</option>
                                    <option>547</option>
                                    <option>548</option>
                                    <option>549</option>
                                    <option>641</option>
                                    <option>642</option>
                                    <option>643</option>
                                    <option>644</option>
                                    <option>645</option>
                                    <option>646</option>
                                    <option>647</option>
                                    <option>648</option>
                                    <option>649</option>
                                    <option>650</option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                            	<input name="roomNumberAlloted" id="roomNumberAlloted" type="number" value="" readonly="readonly"><span class="text-danger">Please check if this is the room number to be alloted</span>
                            </div>
							
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>

                        </form>

                    </div>
                    
                    <%List roomList =  (List) request.getAttribute("roomList");%>
                    <div class="col-lg-6">
						<div class="table-responsive">
                            <table id="roomStatusTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                    	<th style="width: 100px;">Bhawan</th>
                                        <th style="width: 100px;">Room Number</th>
                                        <th style="width: 100px;">Capacity</th>
                                        <th style="width: 100px;">Number Of People Staying</th>
                                        <th>Cities</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <%  for (Iterator iterator = 
                    		roomList.iterator(); iterator.hasNext();){
             Rooms room = (Rooms) iterator.next(); 
             %>
             <tr class="roomRows">
             <td><%if(room.getType().equals("AN")){
            	 %>
            	 Anand Niwas
            	 <%
             }
             else if(room.getType().equals("AS")){
            	 %>Ashish Sadan<%
             }%></td>
             <td  class="roomNumberClass"><%= room.getRoomNumber() %></td>
             <td  class="roomCapacityClass"><%= room.getCapacity() %></td>
             <td  class="numberOfPeopleStayingClass"><%= room.getNumberOfPeopleStaying() %></td>
             <td class="cities"><%= room.getCityString() %></td>
             </tr>
             <%
          }%>
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
	
	<script src="js/roomStatus.js"></script>

</body>

</html>
