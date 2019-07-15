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


           
            <h1 style="margin-left: 20px;">Workable Hours</h1>
            <br>
                <div style="float:left;">
                <a  href="hours.php"><button class="btn btn-primary" style="margin-left: 20px;"><span class="glyphicon glyphicon-time" style="margin-right: 10px; color: white;"></span>Hours</button></a>
                <button class="btn btn-primary" type="submit" style="margin-left: 20px;"><span class="glyphicon glyphicon-user" style="margin-right: 10px; color: white;"></span>Designers</button>
                <a  href="upload-hours.php"><button class="btn btn-primary" style="margin-left: 100px; background-color: grey;"><span class="glyphicon glyphicon-upload" style="margin-right: 10px; color: white;"></span>Upload Data File</button></a>
      
                </div>
            <br><br>
            <hr>
        

            <div style="float: left; margin-left: 20px;">
            <form id="reportForm" action="hours-report.php" method="post">    
            
        
                   
                  <!---Form PHP*******************************************************-->  
                <div style="float: left; margin-left: 50px; margin-top: -20px;">
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
               
               
            
                <h2>Time Period:</h2>
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
                
                <br><br>
                <div style="float: left;">
                <h2>Workable Hours:</h2>
                 <input type="text" class="form-control">
                </div>

                </div>
                
            
                <br><br><br><br><br><br><br><br><br><br><br><br><br>
                <button type="submit" class="btn btn-default" style="border-width: 2px; margin-left: 50px "><span class="glyphicon glyphicon-play-circle" style="margin-left: 2px; color: black;"></span> Submit Hours</button> 

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
      <br><br><br>
      <br><br><br><br>
      <br>

      
    

    <?php 

    $month1 = $_POST["startMonth"];
    $year1 = $_POST["startYear"];
    $month2 = $_POST["endMonth"];
    $year2 = $_POST["endYear"];

    $date1 = $year1.'-'.$month1.'-01';
    $date2 = $year2.'-'.$month2.'-31';
    $newdate1 = date('Y-m-d', strtotime($date1));
    $newdate2 = date('Y-m-d', strtotime($date2));  
    
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
    <hr>
    <h4 style="margin-left: 20px; font-size: 20px; width: 800px;">Average Hours / Project 
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
        Total Projects  
        </h4>
    <div class = "table-responsive" style="width: 800px; margin-left: 20px; font-size: 18px;">
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

<div class = "table-responsive" style="width: 90%; margin-left: 20px; font-size: 14px;">
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

    
                $date1 = $year1.'-'.$month1.'-01';
                $date2 = $year2.'-'.$month2.'-31';
                $newdate1 = date('Y-m-d', strtotime($date1));
                $newdate2 = date('Y-m-d', strtotime($date2));  

            //$design_list = "SELECT Full_Name, AVG(Hours) From HOURS WHERE Full_Name = '$designer' AND (Work_Date between '$newdate1' AND '$newdate2') Group by Full_Name ";

        
            $design_list = "SELECT Full_Name, SUM(Hours), COUNT(Distinct MPN) From HOURS WHERE MPN <> 'No MPN' Group by Full_Name";   

            $design_query = mysqli_query($db, $design_list);
            

   

                echo '<h4 style="font-size: 20px; margin-left: 20px; color: #2679c7;"> <span class="glyphicon glyphicon-user"></span> Designers </h4>
    
                    <div class = "table-responsive" style="width: 550px; margin-left: 20px; font-size: 14px;">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="color: grey;">Name</th>
                                    <th style="color: grey;">Worked Hrs</th>
                                    <th style="color: grey;">Workable Hrs</th>
                                </tr>
                                </thead>
                                <tbody>';

                while($designrow = mysqli_fetch_array($design_query,MYSQLI_ASSOC)){

                     
                    $designAvg = ($designrow['SUM(Hours)']) / ($designrow['COUNT(Distinct MPN)']);
                    
            
                    echo'
                    
                            <tr>
                          <td>' . $designrow['Full_Name']. '</td>
                          <td style="text-align: center;">' . $designrow['SUM(Hours)']. '</td>
                          <td></td>
                          <td></td>
                        <td></td>
                          </tr>' ;
                };

        

        

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