<?php
include 'includeSession.php';
include dirname(dirname(__FILE__)) . '/anandniwas.com/config/config.php';
$postParams = Functions::getPostParams();
$userDataHandlerObj = new userDataHandler();
if ($postParams['action'] == 'completeStatus' || $postParams['action'] == 'editInformation') {
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
                    <?php
                        if($postParams['action'] == 'editInformation' && !isset($result[0])){
                            ?>
                                <div class="alert alert-success fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong style="font-size:16px">There is no user with this ID. Please Make a new user.</strong>
                                </div>
                            <?php 
                        } 
                        if($postParams['action'] == 'editInformation' && isset($result[0]) && $data['isCheckout']==1){
                            ?>
                                <div class="alert alert-success fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong style="font-size:16px">This user is already checked out. Please make a new user.</strong>
                                </div>
                            <?php 
                        } else {
                    ?>
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
                                <input type="hidden" name="oldRoomNumber" value="<?php if(isset($data['roomNumberAllotted']))echo $data['roomNumberAllotted'];else echo '';?>">
                                <input type="hidden" name="oldNumberOfPeople" value="<?php if(isset($data['numberOfPeople']))echo $data['numberOfPeople']; echo '';?>">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text"  class="form-control" name="name" value="<?php if (isset($data['name'])) echo $data['name']; ?>" required="required">
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
              <option <?php if(isset($data['city']) && $data['city']=="BILASPUR") { ?> selected <?php } ?> value="BILASPUR">BILASPUR</option>
              <option <?php if(isset($data['city']) && $data['city']=="BUNDI") { ?> selected <?php } ?> value="BUNDI">BUNDI</option>
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
                                    <option value="5">Anand Vihar</option>
                                </select>
                            </div>
                            
                            <div class="form-group" id="groundFloorRooms">
                                <label>Select Room</label>
                                   <select class="form-control" id="groundFloorRoomsSelect">
                                      <option value="100">Veranda Ground Floor D Block</option>
                                      <option value="200">Veranda Ground Floor Main Block</option>
                                      <option value="4">G-4</option>
                                    <option value="5">G-5</option>
                                    <option value="12">G-12</option>
                                    <option value="13">G-13</option>
                                    <option value="14">G-14</option>
                                    <option value="15">G-15</option>
                                    <option value="16">G-16</option>
                                    <option value="17">G-17</option>
                                    <option value="24">G-24</option>
                                    <option value="26">G-26</option>
                                    <option value="27">G-27</option>
                                    <option value="28">G-28</option>
                                    <option value="29">G-29</option>
                                    <option value="30">G-30</option>
                                    <option value="31">G-31</option>
                                    <option value="32">G-32</option>
                                    <option value="33">G-33</option>
                                    <option value="34">G-34</option>
                                    <option value="35">G-35</option>
                                </select>
                            </div>
                            
                            <div class="form-group" id="firstFloorRooms">
                                <label>Select Room</label>
                                <select class="form-control" id="firstFloorRoomsSelect">
                                	<option value="1001">Veranda First Floor A Block</option>
                                	<option value="1002">Veranda First Floor D Block</option>
                                	<option value="1003">Veranda First Floor Main Block</option>
                                	
                                    <option value="101">101</option>
                                    <option value="102">102</option>
                                    <option value="103">103</option>
                                    <option value="104">104</option>
                                    <option value="105">105</option>
                                    <option value="106">106</option>
                                    <option value="107">107</option>
                                    <option value="108">108</option>
                                    <option value="109">109</option>
                                    <option value="110">110</option>
                                    <option value="111">111</option>
                                    <option value="112">112</option>
                                    <option value="113">113</option>
                                    <option value="114">114</option>
                                    <option value="115">115</option>
                                    <option value="116">116</option>
                                    <option value="117">117</option>
                                    <option value="118">118</option>
                                    <option value="119">119</option>
                                    <option value="120">120</option>
                                    <option value="121">121</option>
                                    <option value="122">122</option>
                                    <option value="124">124</option>
                                    <option value="125">125</option>
                                    <option value="126">126</option>
                                    <option value="127">127</option>
                                    <option value="128">128</option>
                                    <option value="129">129</option>
                                    
                                </select>
                            </div>
                            
                            <div class="form-group" id="secondFloorRooms">
                                <label>Select Room</label>
                                <select class="form-control" id="secondFloorRoomsSelect">
                                	<option value="2001">Veranda Second Floor A Block</option>
                                	<option value="2002">Veranda Second Floor D Block</option>
                                	<option value="2003">Veranda Second Floor Main Block</option>
                                
                                    <option value="201">201</option>
                                    <option value="202">202</option>
                                    <option value="203">203</option>
                                    <option value="204">204</option>
                                    <option value="205">205</option>
                                    <option value="206">206</option>
                                    <option value="207">207</option>
                                    <option value="208">208</option>
                                    <option value="209">209</option>
                                    <option value="210">210</option>
                                    <option value="211">211</option>
                                    <option value="212">212</option>
                                    <option value="213">213</option>
                                    <option value="214">214</option>
                                    <option value="215">215</option>
                                    <option value="216">216</option>
                                    <option value="217">217</option>
                                    <option value="218">218</option>
                                    <option value="219">219</option>
                                    <option value="220">220</option>
                                    <option value="221">221</option>
                                    <option value="222">222</option>
                                    <option value="224">224</option>
                                    <option value="225">225</option>
                                    <option value="226">226</option>
                                    <option value="227">227</option>
                                    <option value="228">228</option>
                                    <option value="229">229</option>
                                    <option value="230">230</option>
                                    <option value="231">231</option>
                                    <option value="232">232</option>
                                    <option value="233">233</option>
                                    <option value="234">234</option>
                                    <option value="235">235</option>
                                    <option value="236">236</option>
                                    <option value="237">237</option>
                                    <option value="238">238</option>
                                    <option value="239">239</option>
                                    <option value="240">240</option>
                                    <option value="241">241</option>
                                </select>
                            </div>
                            
                            <div class="form-group" id="thirdFloorRooms">
                                <label>Select Room</label>
                                <select class="form-control" id="thirdFloorRoomsSelect">
                                    <option value="3001">Veranda Third Floor Main Block</option>
                                    
                                    <option value="301">301</option>
                                    <option value="302">302</option>
                                    <option value="303">303</option>
                                    <option value="304">304</option>
                                    <option value="305">305</option>
                                    <option value="306">306</option>
                                    <option value="307">307</option>
                                    <option value="308">308</option>
                                    <option value="309">309</option>
                                    <option value="310">310</option>
                                    <option value="311">311</option>
                                    <option value="313">313</option>
                                    <option value="314">314</option>
                                </select>
                            </div>
                            
                            <div class="form-group"  id="fourthFloorRooms">
                                <label>Select Room</label>
                                <select class="form-control" id="fourthFloorRoomsSelect">
                                    <option value="4001">Veranda Fourth Floor Main Block</option>
                                    
                                    <option value="401">401</option>
                                    <option value="402">402</option>
                                    <option value="403">403</option>
                                    <option value="404">404</option>
                                    <option value="405">405</option>
                                    <option value="406">406</option>
                                    <option value="407">407</option>
                                    <option value="408">408</option>
                                    <option value="409">409</option>
                                    <option value="410">410</option>
                                    <option value="411">411</option>
                                    <option value="412">412</option>
                                    <option value="413">413</option>
                                    
                                </select>
                            </div>
                            
                            <div class="form-group"  id="anandViharRooms" style="display:none">
                                <label>Select Room</label>
                                <select class="form-control" id="anandViharRoomsSelect">
                                    <option value="576">576</option>
                                    <option value="577">577</option>
                                </select>
                            </div>    
                            
                            <div class="form-group">
                            	<input name="roomNumberAlloted" id="roomNumberAlloted" type="number" value="<?php if(isset($data['roomNumberAllotted']))echo $data['roomNumberAllotted'];else echo '';?>" readonly="readonly"><span class="text-danger"> check if this is the room number to be alloted</span>
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
                    <?php } ?>
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
