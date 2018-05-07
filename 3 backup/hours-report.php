<?php
session_start();
include ("includes/constants.php");
include ("classes/mpnloader.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
    
       <link rel="stylesheet" media="screen" href ="static/bootstrap.min.css">
       <link rel="stylesheet" href="static/bootstrap-theme.min.css">
       <meta name="viewport" content = "width=device-width, initial-scale=1.0">

       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       
       <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
       <link rel="stylesheet" href="style/custom.css">

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

        <!-- Custom styles for this template -->
        <link href="style/dashboard.css" rel="stylesheet">
    
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">

    </head>

    <body>
            
                <nav class="navbar navbar-inverse navbar-fixed-top">
                  <div class="container-fluid">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="index.php"><img src="img/West-Rock-Logo.png" width="200px"></a>
                      <div style="margin-top: 27px; float: left; font-size: 20px; color:grey;">MPN Suite</div>
                  
                    </div>


                    <div id="navbar" class="navbar-collapse collapse">
                      <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Help</a></li>
                      </ul>
                     
                    </div>
                  </div>
                </nav>

                <br><br>
                <div style="float:left;">
              
                </div>


           
            <h1 style="margin-left: 20px;">Hourly Reports</h1>
            <br>
                <div style="float:left;">
                <a  href="hours.php"><button class="btn btn-primary" style="margin-left: 20px;">Hours</button></a>
                <button class="btn btn-primary" type="submit" style="margin-left: 20px;">Designers</button>
                <a  href="upload-hours.php"><button class="btn btn-primary" style="margin-left: 100px; background-color: grey;">Upload Data File</button></a>
      
                </div>
            <br><br>
            <hr>
        

            <div style="float: left; margin-left: 30px;">
            <form id="reportForm" action="hours-report.php" method="post">    
            
                <h2>Start Date:</h2>
                <select id="startSelectM" class="form-control" name="startMonth" style="width: 100px; margin-left: 0px; float: left;">
                    <option>Select</option>
                    <option value="01">Jan</option>
                    <option value="02">Feb</option>
                    <option value="03">Mar</option>
                    <option value="04">Apr</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">Aug</option>
                    <option value="09">Sep</option>
                    <option value="10">Oct</option>
                    <option value="11">Nov</option>
                    <option value="12">Dec</option>
                </select>

                <div style="float: left;">
                <select id="startSelectY" class="form-control" name="startYear" style="width: 100px; margin-left: 10px;">
                    <option>Select</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
                </div>
            

                <div style="float: left; margin-left: 50px; margin-top: -50px;">
                <h2>End Date:</h2>
                <div style="float: left;">
                <select id="endSelectM" class="form-control" name="endMonth" style="width: 100px; margin-left: 0px; float: left;">
                    <option>Select</option>
                    <option value="01">Jan</option>
                    <option value="02">Feb</option>
                    <option value="03">Mar</option>
                    <option value="04">Apr</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">Aug</option>
                    <option value="09">Sep</option>
                    <option value="10">Oct</option>
                    <option value="11">Nov</option>
                    <option value="12">Dec</option>
                </select>
                </div>

                <div style="float: left;">
                <select id="endSelectY" class="form-control" name="endYear" style="width: 100px; margin-left: 10px;">
                    <option value="Select" >Select</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
                </div>
                </div>
                   
                  <!---Form PHP*******************************************************-->  
                <div style="float: left; margin-left: 50px; margin-top: -50px;">
                <h2>Designer:</h2>
                <select id="designerSelect" class="form-control" name="designer" style="width: 200px;">
                    <option> Select </option>
                    <option> - All Designers -</option>
                <?php

                    $design_list = "SELECT DISTINCT Full_Name From HOURS Full_Name Order by Full_Name";          
                    $design_query = mysqli_query($db, $design_list);

        
                        while($designrow = mysqli_fetch_array($design_query,MYSQLI_ASSOC)) {

                        echo '<option>' . $designrow['Full_Name'] . '</option>';}

                ?>
                </select>
                </div>
               

                <br><br><br>
                <button type="submit" class="btn btn-default">Run Report</button> 

            <?php 
            $designerCheck = $_POST["designer"];
            $year1Check = $_POST["startYear"];
            $year2Check = $_POST["endYear"];
            
             if($year1Check == "Select"){
                echo "<br><br><div style='margin-left: 0px; color: red; font-size: 14px;'> Please Select Start Date!</div>";
            } elseif($year2Check == "Select") {
                echo "<br><br><div style='margin-left: 0px; color: red; font-size: 14px;'> Please Select End Date!</div>";
            } elseif($designerCheck == "Select") {
                echo "<br><br><div style='margin-left: 0px; color: red; font-size: 14px;'> Please Select Designer!</div>";
            }
                
            ?>
            
            </form>

                <script>
                var selectedItem1 = sessionStorage.getItem("SelectedItem1");  
                var selectedItem2 = sessionStorage.getItem("SelectedItem2");  
                var selectedItem3 = sessionStorage.getItem("SelectedItem3");  
                var selectedItem4 = sessionStorage.getItem("SelectedItem4");  
                var selectedItem5 = sessionStorage.getItem("SelectedItem5");  

                    $('#startSelectM').val(selectedItem1);
                    $('#startSelectM').change(function() { 
                        var dropVal1 = $(this).val();
                        sessionStorage.setItem("SelectedItem1", dropVal1);
                    });
                    $('#startSelectY').val(selectedItem2);
                    $('#startSelectY').change(function() { 
                        var dropVal2 = $(this).val();
                        sessionStorage.setItem("SelectedItem2", dropVal2);
                    });
                    $('#endSelectM').val(selectedItem3);
                    $('#endSelectM').change(function() { 
                        var dropVal3 = $(this).val();
                        sessionStorage.setItem("SelectedItem3", dropVal3);
                    });
                    $('#endSelectY').val(selectedItem4);
                    $('#endSelectY').change(function() { 
                        var dropVal4 = $(this).val();
                        sessionStorage.setItem("SelectedItem4", dropVal4);
                    });
                    $('#designerSelect').val(selectedItem5);
                    $('#designerSelect').change(function() { 
                        var dropVal5 = $(this).val();
                        sessionStorage.setItem("SelectedItem5", dropVal5);    
                    });

                </script>

            </div>

       
      <br><br><br>
      <br><br><br>
      <br><br>

       

          <br>
          <hr>  
        <!---Search Bar*******************************************************-->
              <!-- <div style="float: left;">
                <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Search..." style="width: 500px;">
                </form>
              </div> -->
        <!---*******************************************************-->


           
                    <!---Results PHP*******************************************************-->
            <?php

                $month1 = $_POST["startMonth"];
                $year1 = $_POST["startYear"];
                $month2 = $_POST["endMonth"];
                $year2 = $_POST["endYear"];

                $designer = $_POST["designer"];

                $date1 = $year1.'-'.$month1.'-01';
                $date2 = $year2.'-'.$month2.'-31';
                $newdate1 = date('Y-m-d', strtotime($date1));
                $newdate2 = date('Y-m-d', strtotime($date2));  

            //$design_list = "SELECT Full_Name, AVG(Hours) From HOURS WHERE Full_Name = '$designer' AND (Work_Date between '$newdate1' AND '$newdate2') Group by Full_Name ";

            if($designer == "- All Designers -"){
                $design_list = "SELECT Full_Name, SUM(Hours), COUNT(Distinct MPN) From HOURS WHERE (Work_Date between '$newdate1' AND '$newdate2') AND MPN <> 'No MPN' Group by Full_Name";   

            }  else {
                $design_list = "SELECT Full_Name, SUM(Hours), COUNT(Distinct MPN) From HOURS WHERE Full_Name = '$designer' AND (Work_Date between '$newdate1' AND '$newdate2') AND MPN <> 'No MPN' Group by Full_Name ";   
            }

            $design_query = mysqli_query($db, $design_list);
            

            if($designer == "- All Designers -"){

                echo '<h4 style="font-size: 20px; margin-left: 20px; color: #2679c7;"> Results </h4>
    
                    <div class = "table-responsive" style="width: 500px; margin-left: 20px; font-size: 14px;">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="color: grey;">Name</th>
                                    <th style="color: grey;">Average Hours</th>
                                    <th><th>
                                    <th style="color: grey;">Total Projects</th>
                                </tr>
                                </thead>
                                <tbody>';

                while($designrow = mysqli_fetch_array($design_query,MYSQLI_ASSOC)){

                     
                    $designAvg = ($designrow['SUM(Hours)']) / ($designrow['COUNT(Distinct MPN)']);
                    
            
                    echo'
                    
                            <tr>
                          <td>' . $designrow['Full_Name']. '</td>
                          <td style="text-align: center;">' . round($designAvg, 3) . '</td>
                          <td></td>
                          <td></td>
                          <td style="text-align: center;">' . $designrow['COUNT(Distinct MPN)'] . '</td>
                          </tr>' ;
                };

            }else{

            while($designrow = mysqli_fetch_array($design_query,MYSQLI_ASSOC)){

                $designAvg = ($designrow['SUM(Hours)']) / ($designrow['COUNT(Distinct MPN)']);
            
                echo '<h4 style="font-size: 20px; margin-left: 20px; color: #2679c7;"> Results </h4>

                <div class = "table-responsive" style="width: 500px; margin-left: 20px; font-size: 14px;">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="color: grey;">Name</th>
                                <th style="color: grey;">Average Hours</th>
                                <th><th>
                                <th style="color: grey;">Total Projects</th>
                            </tr>
                            </thead>
                            <tbody>
                
                            <tr>
                            <td>' . $designrow['Full_Name']. '</td>
                            <td style="text-align: center;">' . round($designAvg, 3) . '</td>
                            <td></td>
                            <td></td>
                            <td style="text-align: center;">' . $designrow['COUNT(Distinct MPN)'] . '</td>
                            </tr>' ;
                  
            };

        }

        

            ?>
            </tbody>
            </table>
          </div>



<!--**************************************-->

              <hr>
              <br>
              <h2  style="margin-left: 20px; color: #2679c7;">Design Hours Data</h2>
              <hr>
<!---MPNS*******************************************************-->



<div style="margin-left: 50px;"> 
<div class = "table-responsive" style="font-size: 12px; margin-left: -30px; max-height: 700px; border-color: grey; border-style: solid; border-radius: 5px; border-width: 1px;">
        <table class="table table-striped">


            <thead>
            <tr>
                <th>MPN</th>
                <th>Project Name</th>
                <th>Project Date</th>
                <th>Customer</th>
                <th>Customer Bill To</th>
                <th>Salesperson</th>
                <th>Activity Name</th>
                <th>Location Name</th>
                <th>Full Name</th>
                <th>Work Date</th>
                <th>Modified Date</th>
                <th>Hours</th>
                <th>Region</th>
            </tr>
            </thead>
            <tbody>


<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
reportSearch();
}

function reportSearch(){

    include ("includes/constants.php");
    include ("classes/mpnloader.php");
    
    $month1 = $_POST["startMonth"];
    $year1 = $_POST["startYear"];
    $month2 = $_POST["endMonth"];
    $year2 = $_POST["endYear"];

    $designer = $_POST["designer"];

    $date1 = $year1.'-'.$month1.'-01';
    $date2 = $year2.'-'.$month2.'-31';
    $newdate1 = date('Y-m-d', strtotime($date1));
    $newdate2 = date('Y-m-d', strtotime($date2));  

    if($designer == "- All Designers -"){
        $mpn_list = "SELECT * FROM HOURS WHERE Work_Date between '$newdate1' AND '$newdate2'";
    }  else {
        $mpn_list = "SELECT * FROM HOURS WHERE (Work_Date between '$newdate1' AND '$newdate2') AND (Full_Name = '$designer')";
    }

    $mpn_query = mysqli_query($db, $mpn_list);


    while($hoursrow = mysqli_fetch_array($mpn_query,MYSQLI_ASSOC)){


        $searchurl="'mpn.php?fetchid=" . $hoursrow['MPN']  . "'";
      
        $proj=$hoursrow['Project_Name'];
      
      $proDateB4=$hoursrow['Project_Date'];
      $proDate = date('m-d-Y', strtotime($proDateB4));
      
      $cust=$hoursrow['Customer'];
      $custBill=$hoursrow['Customer_Bill_To'];
      $salesp=$hoursrow['Salesperson_Name'];
      $activ=$hoursrow['Activity_Name'];
      $locName=$hoursrow['Location_Name'];
      $designer=$hoursrow['Full_Name'];
      
      $workdate1=$hoursrow['Work_Date'];
      $workdate = date('m-d-Y', strtotime($workdate1));

      $workdate2=$hoursrow['MONTH(Work_Date)'];
      
      $moddate1=$hoursrow['Modified_Date'];
      $moddate = date('m-d-Y', strtotime($moddate1));
      
      $hrs=$hoursrow['Hours'];
      $region=$hoursrow['Region'];
      
      echo
      
                 '<tr>
                      <td><a href=' . $searchurl . '>' . $hoursrow['MPN'] . '</a></td>
                      <td>'.$proj.'</td>
                      <td>'.$proDate.'</td>
                      <td>'.$cust.'</td>
                      <td>'.$custBill.'</td>
                      <td>'.$salesp.'</td>
                      <td>'.$activ.'</td>
                      <td>'.$locName.'</td>
                      <td>'.$designer.'</td>
                      <td>'.$workdate.'</td>
                      <td>'.$moddate.'</td>
                      <td>'.$hrs.'</td>
                      <td>'.$region.'</td>
                  </tr>'
          ;}
}

?>

</tbody>
</table>
</div>
<hr>
<br><br>
<div style="font-size: 10px; text-align: center;"><img src="img/West-Rock-Logo.png" width="100px" style="margin-right: 20px;">&copy; 2018 WestRock Company. All Rights Reserved.</div>
<br><hr>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>