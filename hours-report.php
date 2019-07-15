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


    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css">
    <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script> -->
<script type='text/javascript' src=" https://code.jquery.com/ui/1.12.1/jquery-ui.js "></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    
    


        <!-- Custom styles for this template -->
        <link href="style/dashboard.css" rel="stylesheet">
    
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">

    </head>

    <body>

    <!-- <div id="overlay" style="width: 100%; margin: 0 auto; margin-top: 50px;">
     <img src="img/loading.gif" alt="Loading" style="margin: 0 auto;" />
    </div> -->


            
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
                <a  href="hours.php"><button class="btn btn-primary" style="margin-left: 20px;"><span class="glyphicon glyphicon-time" style="margin-right: 10px; color: white;"></span>Hours</button></a>
                <button class="btn btn-primary" type="submit" style="margin-left: 20px;"><span class="glyphicon glyphicon-user" style="margin-right: 10px; color: white;"></span>Designers</button>
                <a  href="upload-hours.php"><button class="btn btn-primary" style="margin-left: 100px; background-color: grey;"><span class="glyphicon glyphicon-upload" style="margin-right: 10px; color: white;"></span>Upload Data File</button></a>
      
                </div>
            <br><br>
            <hr>
        

             <div style="float: left; margin-left: 30px;">
             
         

           
           

            <form id="reportForm" action="hours-report.php" method="post">    
            
              
               
                <h2>Start Date:</h2>
                <div class="input-group date">
                <input class="datepicker" data-provide="datepicker" name="startDate" id="startDate" placeholder="Select" style="border-radius: 5px; height: 35px; text-align: center;">
                </div>
                <!-- <select id="startSelectM" class="form-control" name="startMonth" style="width: 100px; margin-left: 0px; float: left;">
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
                </div> -->
            

                <div style="float: left; margin-left: 200px; margin-top: -85px;">
                <h2>End Date:</h2>
                <div style="float: left;">
                <div class="input-group date">
                <input class="datepicker" data-provide="datepicker" name="endDate" id="endDate" placeholder="Select" style="border-radius: 5px; height: 35px; text-align: center;">
                </div>

                <!-- <select id="endSelectM" class="form-control" name="endMonth" style="width: 100px; margin-left: 0px; float: left;">
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
                </select> -->
                </div>
                </div>

                 <script>
                $('.datepicker').datepicker({
                    dateFormat: 'yy-mm-dd',
                    startDate: '-3d'
                });
                </script>
                    
                  <!---Form PHP*******************************************************-->  
                <div style="float: left; margin-left: 400px; margin-top: -85px;">
                <h2>Designer:</h2>
                <select id="designerSelect" class="form-control" name="designer" style="width: 200px;">
                    <option> Select </option>
                    <option style=" font-weight: bold;"> - All Designers -</option>
                <?php

                    $design_list = "SELECT DISTINCT Full_Name From HOURS Full_Name Order by Full_Name";          
                    $design_query = mysqli_query($db, $design_list);

        
                        while($designrow = mysqli_fetch_array($design_query,MYSQLI_ASSOC)) {

                        echo '<option>' . $designrow['Full_Name'] . '</option>';}

                ?>
                </select>
                </div>
               

                <br><br>
                <button type="submit" class="btn btn-default" style="border-width: 2px; "><span class="glyphicon glyphicon-play-circle" style="margin-right: 10px; color: black;"></span>Run Report</button> 
                
                            
            <?php 
            $designerCheck = $_POST["designer"];
            $year1Check = $_POST["startDate"];
            $year2Check = $_POST["endDate"];
            
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
                var selectedItem5 = sessionStorage.getItem("SelectedItem5");  
                var selectedItemA = sessionStorage.getItem("SelectedItemA");  
                var selectedItemB = sessionStorage.getItem("SelectedItemB");  

                    $('#designerSelect').val(selectedItem5);
                    $('#designerSelect').change(function() { 
                        var dropVal5 = $(this).val();
                        sessionStorage.setItem("SelectedItem5", dropVal5);    
                    });

                    $('#startDate').val(selectedItemA);
                    $('#startDate').change(function() { 
                        var dropValA = $(this).val();
                        sessionStorage.setItem("SelectedItemA", dropValA);
                    });
                    $('#endDate').val(selectedItemB);
                    $('#endDate').change(function() { 
                        var dropValB = $(this).val();
                        sessionStorage.setItem("SelectedItemB", dropValB);    
                    });


                </script>


                <br>
                <div style="margin-left: 150px; margin-top: -56px;">
                <a href="#" id="test" onClick="javascript:fnExcelReport();"><button type="submit" class="btn btn-default" style="border-width: 2px;"><span class="glyphicon glyphicon-download" style="margin-right: 10px; color: black;"></span>Download Report</button></a> 
                </div>
            
                
                <script>
                
                        function fnExcelReport() {
                            var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
                            tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';

                            tab_text = tab_text + '<x:Name>Test Sheet</x:Name>';

                            tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
                            tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';

                            //tab_text = tab_text + "<table>";
                            tab_text = tab_text + '<br>';
                            tab_text = tab_text + 'Average Hours per Project:';
                            tab_text = tab_text + $('#table1').html();
                            tab_text = tab_text + '</table></body></html>';


                            var data_type = 'data:application/vnd.ms-excel';
                            
                            var ua = window.navigator.userAgent;
                            var msie = ua.indexOf("MSIE ");
                            
                            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
                                if (window.navigator.msSaveBlob) {
                                    var blob = new Blob([tab_text], {
                                        type: "application/csv;charset=utf-8;"
                                    });
                                    navigator.msSaveBlob(blob, 'Test file.xls');
                                }
                            } else {
                                $('#test').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
                                $('#test').attr('download', 'Test file.xls');
                            }

                        }
                </script>
                


            </div>

       
      <br><br><br>
      <br><br><br>
     

      
    

    <?php 

    $month1 = $_POST["startMonth"];
    $year1 = $_POST["startYear"];
    $month2 = $_POST["endMonth"];
    $year2 = $_POST["endYear"];

    $date1 = $year1.'-'.$month1.'-01';
    $date2 = $year2.'-'.$month2.'-31';


    $newdate1 = $_POST["startDate"];
    $newdate2 = $_POST["endDate"];
    
    // Overall Total Hours
    $region_list = "SELECT SUM(Hours) From HOURS WHERE (Work_Date between '$newdate1' AND '$newdate2') AND MPN <> 'No MPN' AND Region IS NOT NULL";
    $region_query = mysqli_query($db, $region_list);   
    $regionrow = mysqli_fetch_array($region_query,MYSQLI_ASSOC);
    
    // US Total Hours
    $us_list = "SELECT SUM(Hours) From HOURS WHERE (Work_Date between '$newdate1' AND '$newdate2') AND MPN <> 'No MPN' AND Region = 'US' ";
    $us_query = mysqli_query($db, $us_list);   
    $usrow = mysqli_fetch_array($us_query,MYSQLI_ASSOC);
    
    // CA Total Hours
    $ca_list = "SELECT SUM(Hours) From HOURS WHERE (Work_Date between '$newdate1' AND '$newdate2') AND MPN <> 'No MPN' AND Region = 'CA' ";
    $ca_query = mysqli_query($db, $ca_list);   
    $carow = mysqli_fetch_array($ca_query,MYSQLI_ASSOC);
    
    // Overall Total Projects
    $pro_list = "SELECT COUNT(Distinct MPN) From HOURS WHERE (Work_Date between '$newdate1' AND '$newdate2') AND MPN <> 'No MPN' AND Region IS NOT NULL";
    $pro_query = mysqli_query($db, $pro_list);   
    $prorow = mysqli_fetch_array($pro_query,MYSQLI_ASSOC);
    
    // US Total Projects
    $uspro_list = "SELECT COUNT(Distinct MPN) From HOURS WHERE (Work_Date between '$newdate1' AND '$newdate2') AND MPN <> 'No MPN' AND Region = 'US'";
    $uspro_query = mysqli_query($db, $uspro_list);   
    $usprorow = mysqli_fetch_array($uspro_query,MYSQLI_ASSOC);

    // CA Total Projects
    $capro_list = "SELECT COUNT(Distinct MPN) From HOURS WHERE (Work_Date between '$newdate1' AND '$newdate2') AND MPN <> 'No MPN' AND Region = 'CA'";
    $capro_query = mysqli_query($db, $capro_list);   
    $caprorow = mysqli_fetch_array($capro_query,MYSQLI_ASSOC);

    if ($_POST["designer"] == "- All Designers -"){   
    echo '
    <br><br>
    <hr>
    <h4 style="margin-left: 20px; font-size: 20px; width: 800px;">Average Hours / Project 
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
        Total Projects  
        </h4>
    <div class = "table-responsive" id="table1" style="width: 800px; margin-left: 20px; font-size: 18px;">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="color: grey;">Region</th>
                                <th style="color: grey;">Avg Hours</th>
                                <th style="color: grey;">Total Hours</th>
                                <th style="color: grey;">Qty</th>
                                <th style="color: grey;"></th>
                                <th style="color: grey;"></th>
                                <th style="color: grey;"></th>
                            </tr>
                            </thead>

                            <tbody>

                            

                            <tr>
                            <td style="color:#3f4fe2; font-size: 15px;"><img src="img/icons/us.png">&nbsp; US</td>
                            <td>'. round(($usrow['SUM(Hours)'] / $usprorow['COUNT(Distinct MPN)']), 3) .'</td>
                            <td>' . $usrow['SUM(Hours)'] . '</td>
                            <td>' . $usprorow['COUNT(Distinct MPN)']. '</td>
                            </tr>
                            
                            <tr>
                            <td style="color: #d10224; font-size: 15px;"><img src="img/icons/ca.png">&nbsp; CA</td>
                            <td>'. round(($carow['SUM(Hours)'] / $caprorow['COUNT(Distinct MPN)']), 3) .'</td>
                            <td>' . $carow['SUM(Hours)'] . '</td>
                            <td>' . $caprorow['COUNT(Distinct MPN)']. '</td>

                            </tr>

                            <tr>
                            <td>Total</td>
                            <td>'. round(($regionrow['SUM(Hours)'] / $prorow['COUNT(Distinct MPN)']), 3) .'</td>
                            <td>' . $regionrow['SUM(Hours)'] . '</td>
                            <td>' . $prorow['COUNT(Distinct MPN)']. '</td>                         
                            </tr>

                            </tbody>
                        </table>
        </div><br><br>';
    }
       ?>
        
          <br>
          <hr>  
        <!---Search Bar*******************************************************-->
              <!-- <div style="float: left;">
                <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Search..." style="width: 500px;">
                </form>
              </div> -->
        <!---*******************************************************-->

<div class = "table-responsive" style="width: 100%; margin-left: 20px; font-size: 14px;">
    <table class="table table-striped">
           <thead>
           <tr>

           <th style="vertical-align:top">
        
        <!---Results PHP*******************************************************-->
            <?php

                $month1 = $_POST["startMonth"];
                $year1 = $_POST["startYear"];
                $month2 = $_POST["endMonth"];
                $year2 = $_POST["endYear"];

                $designer = $_POST["designer"];

                $date1 = $year1.'-'.$month1.'-01';
                $date2 = $year2.'-'.$month2.'-31';

                $newdate1 = $_POST["startDate"];
                $newdate2 = $_POST["endDate"];



            if($designer == "- All Designers -"){
                $design_list = "SELECT Full_Name, SUM(Hours), COUNT(Distinct MPN) From HOURS WHERE (Work_Date between '$newdate1' AND '$newdate2') AND MPN <> 'No MPN' Group by Full_Name";   

            }  else {
                $design_list = "SELECT Full_Name, SUM(Hours), COUNT(Distinct MPN) From HOURS WHERE Full_Name = '$designer' AND (Work_Date between '$newdate1' AND '$newdate2') AND MPN <> 'No MPN' Group by Full_Name ";   
            }

            $design_query = mysqli_query($db, $design_list);
            
           

            if($designer == "- All Designers -"){

                echo '<h4 style="font-size: 20px; margin-left: 20px; color: #2679c7;"> <span class="glyphicon glyphicon-user"></span> Designers </h4>
    
                    <div class = "table-responsive" style="width: 550px; margin-left: 20px; font-size: 14px;">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="color: grey;">Name</th>
                                    <th style="color: grey; text-align: center;">Average Hours</th>
                                    <th><th>
                                    <th style="color: grey; text-align: center;">Total Projects</th>
                                    <th style="color: grey;">Worked Hrs</th>
                                    <th style="color: grey;"><a href="workable.php">Workable Hrs</a></th>
                                </tr>
                                </thead>
                                <tbody>';

                while($designrow = mysqli_fetch_array($design_query,MYSQLI_ASSOC)){
                    
                   $fullname = $designrow['Full_Name'];
                   $workable = "SELECT Full_Name, SUM(Workable) From Workable_Hours WHERE (Date between '$newdate1' AND '$newdate2') And Full_Name = '$fullname'";
                   $work_query = mysqli_query($db, $workable);
                   $workrow = mysqli_fetch_array($work_query,MYSQLI_ASSOC);
                    
                    $designAvg = ($designrow['SUM(Hours)']) / ($designrow['COUNT(Distinct MPN)']);
                    
            
                    echo'
                    
                            <tr>
                          <td>' . $designrow['Full_Name']. '</td>
                          <td style="text-align: center;">' . round($designAvg, 3) . '</td>
                          <td></td>
                          <td></td>
                          <td style="text-align: center;">' . $designrow['COUNT(Distinct MPN)'] . '</td>
                          <td>' . $designrow['SUM(Hours)'] . '</td>
                          <td>'. $workrow['SUM(Workable)']. '</td>
                          </tr>' ;
                };

            }else{

            while($designrow = mysqli_fetch_array($design_query,MYSQLI_ASSOC)){

                $fullname = $designrow['Full_Name'];
                $workable = "SELECT Full_Name, SUM(Workable) From Workable_Hours WHERE (Date between '$newdate1' AND '$newdate2') And Full_Name = '$fullname'";
                $work_query = mysqli_query($db, $workable);
                $workrow = mysqli_fetch_array($work_query,MYSQLI_ASSOC);

                $designAvg = ($designrow['SUM(Hours)']) / ($designrow['COUNT(Distinct MPN)']);
            
                echo '<h4 style="font-size: 20px; margin-left: 20px; color: #2679c7;"> <span class="glyphicon glyphicon-user"></span> Designer </h4>

                <div class = "table-responsive" style="width: 550px; margin-left: 20px; font-size: 14px;">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="color: grey;">Name</th>
                                <th style="color: grey; text-align: center;">Average Hours</th>
                                <th><th>
                                <th style="color: grey; text-align: center;">Total Projects</th>
                                <th style="color: grey;">Worked Hrs</th>
                                <th style="color: grey;"><a href="workable.php">Workable Hrs</a></th>
                            </tr>
                            </thead>
                            <tbody>
                
                            <tr>
                            <td>' . $designrow['Full_Name']. '</td>
                            <td style="text-align: center;">' . round($designAvg, 3) . '</td>
                            <td></td>
                            <td></td>
                            <td style="text-align: center;">' . $designrow['COUNT(Distinct MPN)'] . '</td>
                            <td>' . $designrow['SUM(Hours)'] . '</td>
                            <td>'. $workrow['SUM(Workable)'] . '</td>
                            </tr>' ;
                  
            };

        }

        

            ?>
            </tbody>
            </table>
          </div>

</th>

<th style="vertical-align:top">

<!---****************************************************************-->
<!---Hours PHP ******************************************************-->
<!---****************************************************************-->

<?php

$month1 = $_POST["startMonth"];
$year1 = $_POST["startYear"];
$month2 = $_POST["endMonth"];
$year2 = $_POST["endYear"];

$designer = $_POST["designer"];

$date1 = $year1.'-'.$month1.'-01';
$date2 = $year2.'-'.$month2.'-31';

$newdate1 = $_POST["startDate"];
$newdate2 = $_POST["endDate"];

//$design_list = "SELECT Full_Name, AVG(Hours) From HOURS WHERE Full_Name = '$designer' AND (Work_Date between '$newdate1' AND '$newdate2') Group by Full_Name ";

if($designer == "- All Designers -"){
    $design_list2 = "SELECT Full_Name, SUM(Hours), COUNT(Distinct MPN) From HOURS WHERE (Work_Date between '$newdate1' AND '$newdate2') AND MPN <> 'No MPN' Group by Full_Name";
    $workable = "SELECT Full_Name, SUM(Workable) From Workable_Hours WHERE (Date between '$newdate1' AND '$newdate2') Group by Full_Name";
                  

}  else {
    $design_list2 = "SELECT Full_Name, SUM(Hours), COUNT(Distinct MPN) From HOURS WHERE Full_Name = '$designer' AND (Work_Date between '$newdate1' AND '$newdate2') AND MPN <> 'No MPN' Group by Full_Name ";   
    $workable = "SELECT Full_Name, SUM(Workable) From Workable_Hours WHERE (Date between '$newdate1' AND '$newdate2') And Full_Name = '$designer'";
               
}

    
               

$task_query = mysqli_query($db, $design_list2);
$hour_query = mysqli_query($db, $design_list2);

$work_query = mysqli_query($db, $workable);
//$workrow = mysqli_fetch_array($work_query,MYSQLI_ASSOC);


$name_data = array();
foreach ($task_query as $row){
    $name_data[] = array_values((array)$row['Full_Name']);
    
}


$hour_data = array();
foreach ($hour_query as $row){
    $designAvg1 = $row['SUM(Hours)'];
    $designAvg2 = ($row['SUM(Hours)']) / ($row['COUNT(Distinct MPN)']);
    $designAvg3 = round($designAvg2, 3);
    $hour_data[] = array_values((array)$designAvg3);
    $Totalhour_data[] = array_values((array)$designAvg1);
}

$work_data = array();
foreach ($work_query as $row){
  
    $work_data[] = array_values((array)$row['SUM(Workable)']);

}

echo'<br><br>';

?>

<!---****************************************************************-->
<!---Avg Hours Chart.JS ******************************************************-->
<!---****************************************************************-->

<canvas id="myChart" width="900px" height="400px"></canvas>

<script>
            
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: <?=json_encode(array_values($name_data));?>,
        //labels: ['Test'],
        datasets: [{
            label: 'Average Designer Hours',
            data: <?=json_encode(array_values($hour_data));?>,
            backgroundColor: 'rgba(47, 152, 222, 0.5)',
            borderColor: 'rgba(47, 152, 222, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

</script>

<br><br><br><br>

<!---WORKABLE Hours Chart.JS ******************************************************-->
<!---******************************************************************************-->

<canvas id="workableChart" width="700px" height="300px"></canvas>

<script>
            
var ctx = document.getElementById("workableChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: <?=json_encode(array_values($name_data));?>,
        //labels: ['Test'],
        datasets: [
            {
            label: 'Workable Hours',
            data: <?=json_encode(array_values($work_data));?>,
            backgroundColor: 'rgba(47, 152, 222, 0.5)',
            borderColor: 'rgba(47, 152, 222, 1)',
            borderWidth: 1
        },
        {
            label: 'Worked Hours',
            data: <?=json_encode(array_values($Totalhour_data));?>,
            backgroundColor: 'rgba(140, 140, 140, 0.5)',
            borderColor: 'rgba(140, 140, 140, 1)',
            borderWidth: 1 
            
        }
        
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});



</script>




</th>
<th style="vertical-align:top">


<?php
/////Unique MPNs//////////////////////////


echo '</th>';

?>

</tr>
</thead>
</table>
</div>

<!--//// - TASKS - //////////////////////////////////////////-->
<table>
<thead>
<tr>
<th style="vertical-align: top;">

<?php

$month1 = $_POST["startMonth"];
$year1 = $_POST["startYear"];
$month2 = $_POST["endMonth"];
$year2 = $_POST["endYear"];

$designer = $_POST["designer"];

$date1 = $year1.'-'.$month1.'-01';
$date2 = $year2.'-'.$month2.'-31';
//$newdate1 = date('Y-m-d', strtotime($date1));
//$newdate2 = date('Y-m-d', strtotime($date2));  
$newdate1 = $_POST["startDate"];
$newdate2 = $_POST["endDate"];

//$design_list = "SELECT Full_Name, AVG(Hours) From HOURS WHERE Full_Name = '$designer' AND (Work_Date between '$newdate1' AND '$newdate2') Group by Full_Name ";

if($designer == "- All Designers -"){
$design_list = "SELECT Activity_Name, SUM(Hours), COUNT(Distinct MPN) From HOURS WHERE (Work_Date between '$newdate1' AND '$newdate2') Group by Activity_Name Order by SUM(Hours) desc";   

}  else {
$design_list = "SELECT Activity_Name, SUM(Hours), COUNT(Distinct MPN) From HOURS WHERE Full_Name = '$designer' AND (Work_Date between '$newdate1' AND '$newdate2') Group by Activity_Name Order by SUM(Hours) desc";   
}

$design_query = mysqli_query($db, $design_list);
$task_query = mysqli_query($db, $design_list);

$task_data = array();
foreach ($task_query as $row){
    $task_data[] = $row;
}

json_encode($task_data);

////////////////////////////////////////

$activity_query = mysqli_query($db, $design_list);
$a_hour_query = mysqli_query($db, $design_list);


                    


$activity_data = array();
foreach ($activity_query as $row){
    $activity_data[] = array_values((array)$row['Activity_Name']);
    
}


$a_hour_data = array();
foreach ($a_hour_query as $row){
    $taskhours = ($row['SUM(Hours)']);
    //$designAvg3 = round($designAvg2, 3);
    $a_hour_data[] = array_values((array)$taskhours);
}


////////////////////////////////////////////////

if($designer == "- All Designers -"){

echo '

    <div class = "table-responsive" style="width: 500px; margin-left: 40px;  font-size: 14px;">
    <h4 style="font-size: 20px; margin-left: 10px; color: #2679c7;"> <span class="glyphicon glyphicon-th-list"></span> Tasks </h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="color: grey;">Activity Name</th>
                    <th style="color: grey;">Hours</th>
                    <th><th>
                    <th style="color: grey;">Qty</th>
                </tr>
                </thead>
                <tbody>';

while($designrow = mysqli_fetch_array($design_query,MYSQLI_ASSOC)){

    echo'
    
            <tr>
          <td>' . $designrow['Activity_Name']. '</td>
          <td style="text-align: center;">' . $designrow['SUM(Hours)'] . '</td>
          <td></td>
          <td></td>
          <td style="text-align: center;">' . $designrow['COUNT(Distinct MPN)'] . '</td>
          </tr>' ;
};

}else{

    echo '

    <div class = "table-responsive" style="width: 500px; margin-left: 40px; font-size: 14px;">
    <h4 style="font-size: 20px; margin-left: 10px; color: #2679c7;"> <span class="glyphicon glyphicon-th-list"></span> Tasks </h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="color: grey;">Activity Name</th>
                    <th style="color: grey;">Hours</th>
                    <th><th>
                    <th style="color: grey;">Qty</th>
                </tr>
                </thead>
                <tbody>';

while($designrow = mysqli_fetch_array($design_query,MYSQLI_ASSOC)){
    

    echo'
    
            <tr>
          <td>' . $designrow['Activity_Name']. '</td>
          <td style="text-align: center;">' . $designrow['SUM(Hours)']. '</td>
          <td></td>
          <td></td>
          <td style="text-align: center;">' . $designrow['COUNT(Distinct MPN)'] . '</td>
          </tr>' ;
};
}

echo'

</tbody>
</table>
</div>
';

?>
</th>

<th>

<!---****************************************************************-->
<!---Task Hours Chart.JS ******************************************************-->
<!---****************************************************************-->

<canvas id="myChart2" width="900px" height = "800px"style="margin-left: 100px; top: -200px;"></canvas>

<script>
            
var ctx = document.getElementById("myChart2").getContext('2d');
var myChart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: <?=json_encode(array_values($activity_data));?>,
        //labels: ['Test'],
        datasets: [{
            label: 'Task Hours',
            data: <?=json_encode(array_values($a_hour_data));?>,
            backgroundColor: 'rgba(255, 102, 0, 0.5)',
            borderColor: 'rgba(255, 102, 0, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }],
            xAxes: [{
                ticks: {
                    autoSkip: false
                }
            }]
        }
    }
});



</script>

</th>
</tr>
</thead>
</table>

<hr style="size: 30">
<br><br>
<?php
/////Unique MPNs//////////////////////////

if($designer == "- All Designers -"){
    $uniq_list = "SELECT Distinct MPN, SUM(HOURS) AS TotalHours From HOURS WHERE (Work_Date between '$newdate1' AND '$newdate2') AND MPN <> 'No MPN' Group by MPN Order by TotalHours desc ";   
    
    }  else {
    $uniq_list = "SELECT Distinct MPN, SUM(HOURS) AS TotalHours From HOURS WHERE Full_Name = '$designer' AND (Work_Date between '$newdate1' AND '$newdate2') AND MPN <> 'No MPN' Group by MPN Order by TotalHours desc";   
    }
    
    $uniq_query = mysqli_query($db, $uniq_list);

if($designer == "- All Designers -"){

    echo '
    
        <div class = "table-responsive" style="width: 400px; margin-left: 40px;  font-size: 14px;">
        <hr>
        <h4 style="font-size: 20px; margin-left: 10px; color: #2679c7;"><span class="glyphicon glyphicon-file"></span> Unique MPNs</h4>
          
            <table class="table table-striped">
                    <thead style="width: 200px; display: block;">
                    <tr>
                        <th style="color: grey; width: 100px;">MPN</th>
                        <th style="color: grey;">Hours</th>
                        <th><th>
                    </tr>
                    </thead> 
                    <tbody style="display: block; overflow-y: auto; height: 600px; width: 200px;">';
    
    while($uniqrow = mysqli_fetch_array($uniq_query,MYSQLI_ASSOC)){
    
        echo'
        
                <tr>
              <td>' . $uniqrow['MPN']. '</td>
              <td style="text-align: center; width: 100px;">' . $uniqrow['TotalHours']. '</td>
              <td style="text-align: center;">' . '</td>
              </tr>' ;
    };
    
    }else{
    
        echo '
    
        <div class = "table-responsive" style="width: 400px; margin-left: 40px;  font-size: 14px;">
        <h4 style="font-size: 20px; margin-left: 10px; color: #2679c7;"> <span class="glyphicon glyphicon-file"></span> Unique MPNs</h4>
          
            <table class="table table-striped">
                    <thead style="width: 200px; display: block;">
                    <tr>
                        <th style="color: grey; width: 100px;">MPN</th>
                        <th style="color: grey;">Hours</th>
                        <th><th>
                    </tr>
                    </thead> 
                    <tbody style="display: block; overflow-y: auto; height: 600px; width: 200px;">';
    
    while($uniqrow = mysqli_fetch_array($uniq_query,MYSQLI_ASSOC)){
        
    
        echo'
        
                 <tr>
              <td>' . $uniqrow['MPN']. '</td>
              <td style="text-align: center; width: 100px;">' . $uniqrow['TotalHours']. '</td>
              <td style="text-align: center;">' . '</td>
              </tr>' ;
    };
    }

echo'
</tbody>
</table>
</div>
</th>';



?>


<!--**************************************-->

              <hr>
              <br>
              <h2  style="margin-left: 20px; color: #2679c7;"><span class="glyphicon glyphicon-stats"></span> Design Hours Data</h2>
              <hr>
<!---MPNS*******************************************************-->



<div style="margin-left: 50px;"> 


<div id="loadModal" class="modal">
      <div style="
      background-color: white; 
      width: 100%; 
      height: 100%; 
      border-radius: 20px;
      margin:0 auto;
      margin-top: -50px;
      ">

      <div style="
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      ">
        <br>
        
        <img src="img/loading.gif" alt="Loading" style="margin: 0 auto;" />

        </div>
        
      </div>
  </div>

  <script>
  // Get the LOAD modal
  var modal2 = document.getElementById('loadModal');

  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");

  $(window).on('load',function(){
      modal2.style.display = "none";


  });
  </script>



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
    //$newdate1 = date('Y-m-d', strtotime($date1));
    //$newdate2 = date('Y-m-d', strtotime($date2));  
    $newdate1 = $_POST["startDate"];
    $newdate2 = $_POST["endDate"];

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

<script>
// $(document).ready(function() {
//     if ($("#designerSelect").val == '')
//         $("#myChart").style.display = "none";
// });

//var designerBox = document.getElementById('designerSelect');
  var chart1 = document.getElementById('myChart');
  var chart2 = document.getElementById('myChart2');
  var chart3 = document.getElementById('workableChart');
  var designerValue = '<?php echo $designer;?>';
  $(window).on('load',function(){
      alert(designerValue);

if (desigerValue.value = '- All Designers -'){
    alert("Designer is not selected");
    //   chart1.style.display = "none";
    //   chart2.style.display = "none";
    //   chart3.style.display = "none";
      }

  });
</script>

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