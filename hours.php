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


           
            <h1 style="margin-left: 20px;">Design Hours</h1>
            <br>
                <div style="float:left;">
                <a  href="hours-report.php"><button class="btn btn-primary" style="margin-left: 20px;"><span class="glyphicon glyphicon-list-alt" style="margin-right: 10px; color: white;"></span>Reports</button></a>
                <button class="btn btn-primary" type="submit" style="margin-left: 20px;"><span class="glyphicon glyphicon-user" style="margin-right: 10px; color: white;"></span>Designers</button>
                <a  href="upload-hours.php"><button class="btn btn-primary" style="margin-left: 100px; background-color: grey;"><span class="glyphicon glyphicon-upload" style="margin-right: 10px; color: white;"></span>Upload Data File</button></a>
      
                </div>
            <br><br>

            <h1 style="margin-left: 50px; color: #f4b342; font-size: 18px;"> ________________________________________</h1>
           <h1 style="margin-left: 50px; color: #f4b342; font-size: 18px;"> <span style="color: red;">!</span> This page is currently under construction <span style="color: red;">!</span></h1>
           <h1 style="margin-left: 50px; color: #f4b342; font-size: 18px;"> ________________________________________</h1>
           <br><br>

            <hr>
      <div style ="float: right; margin-right: 100px; margin-top:50px; border-style: solid; border-width: 1px; border-radius: 5px; border-color: grey; ">
            <canvas id="myChart" width="1400px"></canvas>

    <?php

    //$design_list2 = "SELECT * FROM HOURS LIMIT 100";
    //$design_list2 = "SELECT Activity_Name, SUM(Hours), COUNT(Distinct MPN) From HOURS WHERE (Work_Date between '$newdate1' AND '$newdate2') Group by Activity_Name";  
    
    $name_list = "SELECT Full_Name From HOURS Group by Full_Name Order by Full_Name";     
    $design_list2 = "SELECT AVG(Hours) From HOURS Group by Full_Name Order by Full_Name";   
    
    $name_query = mysqli_query($db, $name_list);
    $task_query = mysqli_query($db, $design_list2);
    
    
    $name_data = array();
    foreach ($name_query as $row){
        $name_data[] = array_values((array)$row);
    }

    $task_data = array();
    foreach ($task_query as $row){
        $task_data[] = array_values((array)$row);
    }

    
    //$task_data2 = array_values($task_query);
    //print(json_encode($name_data));
    //print(json_encode($task_data));

   //json_encode($task_data);
   //$design_lables = $task_query['Full_Name'];
   //console.log($task_query['Full_Name']);
   //rint($task_query['Full_Name']);


     ?>


            <script>
            
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?=json_encode(array_values($name_data));?>,
                    //labels: ['Test'],
                    datasets: [{
                        label: 'Average Designer Hours',
                        data: <?=json_encode($task_data);?>,
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderColor: 'rgba(255, 159, 64, 1)',
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
        </div>

        <div class = "table-responsive" style="width: 300px; margin-left: 20px; font-size: 12px;">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Designer</th>
                <th>Avg Hours</th>
            </tr>
            </thead>
            <tbody>
           

            <?php

            $design_list = "SELECT Full_Name, AVG(Hours) From HOURS Group by Full_Name Order by Full_Name";          
            $design_query = mysqli_query($db, $design_list);

  
                while($designrow = mysqli_fetch_array($design_query,MYSQLI_ASSOC)) {
                

                echo '<tr>
                      <td>' . $designrow['Full_Name'] . '</td>
                      <td>' . $designrow['AVG(Hours)'] . '</td>
                      </tr>' ;}

            ?>
            </tbody>
            </table>
          </div>

          <br><br><br><br><br>
              <hr>
              <h2 style="margin-left: 20px;">Design Hours Data</h2>
              <hr>
              <div style="float: left;">
                <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Search..." style="width: 500px;" />
                </form>
              </div>



<!---MPNS*******************************************************-->

 <?php
$mpn_list = "SELECT * FROM HOURS LIMIT 100";
$mpn_query = mysqli_query($db, $mpn_list);
//$hoursrow=mysqli_fetch_array($mpn_query,MYSQLI_ASSOC);
?>

<div style="margin-left: 50px;"> 
<br><br><br><br>


<div class = "table-responsive" style="font-size: 12px; margin-left: -30px;">
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
while($hoursrow = mysqli_fetch_array($mpn_query,MYSQLI_ASSOC)){

  // $mpn_sql = "SELECT * FROM projects";
  // $mpn_query2 = mysqli_query($db, $mpn_sql);
  // $mpn_fetch = mysqli_fetch_array($mpn_query2,MYSQLI_ASSOC);

  $searchurl="'mpn.php?fetchid=" . $hoursrow['MPN']  . "'";

  $proj=$hoursrow['Project_Name'];

$proDateB4=$hoursrow['Project_Date'];
$proDate= date('m/d/Y', $proDateB4);

$cust=$hoursrow['Customer'];
$custBill=$hoursrow['Customer_Bill_To'];
$salesp=$hoursrow['Salesperson_Name'];
$activ=$hoursrow['Activity_Name'];
$locName=$hoursrow['Location_Name'];
$designer=$hoursrow['Full_Name'];

$workdate=$hoursrow['Work_Date'];

$moddate=$hoursrow['Modified_Date'];
//$moddate= $moddateB4->format('Y-m-d H:i:s');

$hrs=$hoursrow['Hours'];
$region=$hoursrow['Region'];

  // echo
  //     '<a href=' . $searchurl . '><div class = "Test" style="border-style: solid; border-width: 2px;" >' .
  //       $mpnprofile['MPN'].

  //     '</div></a>'
  //     ;
  //       }
      

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

?>
</tbody>
</table>
</div>

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