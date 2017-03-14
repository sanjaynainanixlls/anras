<?php
include 'includeSession.php';
include dirname(dirname(__FILE__)) . '/anras/config/config.php';
$postParams = Functions::getPostParams();
$userDataHandlerObj = new userDataHandler();
if ($postParams['action'] == 'completeStatus') {
    $id = $postParams['userId'];
    $result = $userDataHandlerObj->getCompleteStatusById($id);
}
$roomData = $userDataHandlerObj->allRoomStatus();
isset($result[0]) ? $data = $result[0] : '';
?>
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
            <?php include_once 'leftSidebar.php'; ?>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Room Allotment
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-edit"></i> Room Allotment
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-6">

                            <form role="form" action="action/action.php" method="post">
                                <input type="hidden" name="action" value='roomAllocation'>
                                <?php if (!isset($data)) { ?>
                                    <input type="hidden" name="status" value="newGuest">
                                <?php } ?>
                                <input type="hidden" name="id" value="<?php if (isset($data['id']))
                                    echo $data['id'];
                                else
                                    echo '';
                                ?>">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text"  class="form-control" name="name" value="<?php if (isset($data['name'])) echo $data['name']; ?>" required="required">
                                </div>

                            <div class="form-group">
                                <label>City</label>
                                <input type="text"  class="form-control" name="city" value="<?php if(isset($data['city']))echo $data['city'];else echo '';?>" required="required">
                            </div>
                            
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="tel"  class="form-control" name="phoneNumber" value="<?php if(isset($data['phoneNumber']))echo $data['phoneNumber']; else echo '';?>" required="required">
                            </div>
                            
                            <div class="form-group">
                                <label>Total Number of Bhagats</label>
                                <input type="number" class="form-control" id="numberOfPeople" name="numberOfPeople" value="<?php if(isset($data['numberOfPeople']))echo $data['numberOfPeople']; echo '';?>" required="required">
                            </div>
 							
                            <div class="form-group">
                                <label>Date of Arrival</label>
                                <input id="comingDate" type="date" class="form-control" name="comingDate" value="<?php if(isset($data['dateOfArrival']))echo $data['dateOfArrival'];else echo '';?>" required="required">
                            </div>
 							                           
                            <div class="form-group">
                                <label>Date of Return</label>
                                <input type="date" class="form-control" name="returnDate" value="<?php if(isset($data['dateOfDeparture']))echo $data['dateOfDeparture'];else echo '';?>" required="required">
                            </div>
                            
                                                        
                            <div class="form-group">
                                <label>Select Floor</label>
                                <select class="form-control" id="floorSelect">
                                    <option value="0">Ground Floor</option>
                                    <option value="1">First Floor</option>
                                    <option value="2">Second Floor</option>
                                    <option value="3">Third Floor</option>
                                    <option value="4">Fourth Floor</option>
                                </select>
                            </div>
                            
                            <div class="form-group" id="groundFloorRooms">
                                <label>Select Room</label>
                                <select class="form-control" id="groundFloorRoomsSelect">
                                    <option value="100">Veranda Ground Floor D Block</option>
                                    <option value="200">Veranda Ground Floor Main Block</option>
                                    <option value="24">G-24</option>
                                    <option value="25">G-25</option>
                                    <option value="26">G-26</option>
                                    <option value="27">G-27</option>
                                    <option value="28">G-28</option>
                                    <option value="29">G-29</option>
                                    <option value="30">G-30</option>
                                    <option value="31">G-31</option>
                                    <option value="42">G-42</option>
                                    <option value="43">G-43</option>
                                    <option value="44">G-44</option>
                                    <option value="45">G-45</option>
                                    <option value="46">G-46</option>
                                </select>
                            </div>
                            
                            <div class="form-group" id="firstFloorRooms">
                                <label>Select Room</label>
                                <select class="form-control" id="firstFloorRoomsSelect">
                                	<option value="1001">Veranda First Floor A Block</option>
                                	<option value="1002">Veranda First Floor D Block</option>
                                	<option value="1003">Veranda First Floor Main Block</option>
                                	
                                    <option>101</option>
                                    <option>102</option>
                                    <option>103</option>
                                    <option>104</option>
                                    <option>105</option>
                                    <option>106</option>
                                    <option>107</option>
                                    <option>108</option>
                                    <option>109</option>
                                    <option>110</option>
                                    <option>111</option>
                                    <option>113</option>
                                    <option>114</option>
                                    <option>115</option>
                                    <option>116</option>
                                    <option>117</option>
                                    <option>118</option>
                                    <option>119</option>
                                    <option>120</option>
                                    <option>121</option>
                                    <option>122</option>
                                    <option>137</option>
                                    <option>138</option>
                                    <option>139</option>
                                    <option>140</option>
                                    <option>141</option>
                                    <option>142</option>
                                    
                                </select>
                            </div>
                            
                            <div class="form-group" id="secondFloorRooms">
                                <label>Select Room</label>
                                <select class="form-control" id="secondFloorRoomsSelect">
                                	<option value="2001">Veranda Second Floor A Block</option>
                                	<option value="2002">Veranda Second Floor D Block</option>
                                	<option value="2003">Veranda Second Floor Main Block</option>
                                
                                    <option>201</option>
                                    <option>202</option>
                                    <option>203</option>
                                    <option>204</option>
                                    <option>205</option>
                                    <option>206</option>
                                    <option>207</option>
                                    <option>208</option>
                                    <option>209</option>
                                    <option>210</option>
                                    <option>211</option>
                                    <option>213</option>
                                    <option>214</option>
                                    <option>215</option>
                                    <option>216</option>
                                    <option>217</option>
                                    <option>218</option>
                                    <option>219</option>
                                    <option>220</option>
                                    <option>221</option>
                                    <option>222</option>
                                    <option>224</option>
                                    <option>225</option>
                                    <option>226</option>
                                    <option>227</option>
                                    <option>228</option>
                                    <option>229</option>
                                    <option>230</option>
                                    <option>231</option>
                                    <option>232</option>
                                    <option>233</option>
                                    <option>234</option>
                                    <option>235</option>
                                    <option>236</option>
                                    <option>237</option>
                                    <option>238</option>
                                    <option>239</option>
                                    <option>240</option>
                                    <option>241</option>
                                </select>
                            </div>
                            
                            <div class="form-group" id="thirdFloorRooms">
                                <label>Select Room</label>
                                <select class="form-control" id="thirdFloorRoomsSelect">
                                    <option value="3001">Veranda Third Floor Main Block</option>
                                    
                                    <option>301</option>
                                    <option>302</option>
                                    <option>303</option>
                                    <option>304</option>
                                    <option>305</option>
                                    <option>306</option>
                                    <option>307</option>
                                    <option>308</option>
                                    <option>309</option>
                                    <option>310</option>
                                    <option>311</option>
                                    <option>313</option>
                                    <option>314</option>
                                </select>
                            </div>
                            
                            <div class="form-group"  id="fourthFloorRooms">
                                <label>Select Room</label>
                                <select class="form-control" id="fourthFloorRoomsSelect">
                                    <option value="4001">Veranda Fourth Floor Main Block</option>
                                    
                                    <option>401</option>
                                    <option>402</option>
                                    <option>403</option>
                                    <option>404</option>
                                    <option>405</option>
                                    <option>406</option>
                                    <option>407</option>
                                    <option>408</option>
                                    <option>409</option>
                                    <option>410</option>
                                    <option>411</option>
                                    <option>412</option>
                                    <option>413</option>
                                    
                                </select>
                            </div>
                            
                            <div class="form-group">
                            	<input name="roomNumberAlloted" id="roomNumberAlloted" type="number" value="" readonly="readonly"><span class="text-danger">Please check if this is the room number to be alloted</span>
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
        <script src="js/roomStatus.js"></script>

    </body>

</html>
