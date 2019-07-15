<?php
session_start();
// include ("includes/constants.php");
// include ("classes/mpnloader.php");
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
                      <a class="navbar-brand" href="#"><img src="img/West-Rock-Logo.png" width="200px"></a>
                      <div style="margin-top: 27px; float: left; font-size: 20px; color:grey;">Project Suite</div>
                  
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
                <h1 style="margin-left: 20px;">Recent Projects</h1>
                <hr>
                
                <!-- <div style="float:left;">
                <a  href="hours.php"><button class="btn btn-primary" style="margin-left: 20px;"><span class="glyphicon glyphicon-time" style="margin-right: 10px; color: white;"></span>Hours</button></a>
                <button class="btn btn-primary" type="submit" style="margin-left: 20px;">POG Log</button>
                <button class="btn btn-primary" type="submit" style="margin-left: 20px;">Trackers</button>
                </div> -->

           <br><br><br><br>
              <div style="float: left;">
                <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Search..." style="width: 500px;">
                </form>
              </div>



<!---MPNS*******************************************************-->
<?php
// $server = 'serverName';
// $dbName = 'databaseName';
// $uid = 'yourUserName';
// $pwd = 'yourPassword';

// $conn = new PDO("sqlsrv:server=$server; database = $dbName", $uid, $pwd);
// $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  

// $query = 'select * from Person.ContactType';  
  
// // simple query  
// $stmt = $conn->query( $query );  
// while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){  
//    print_r( $row['Name'] ."\n" );  
// }  
?>

<div style="margin-left: 50px;"> 
<br><br><br><br>


<div class = "table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>MPN</th>
                <th>C&F</th>
                <th>Designer</th>
                <th>Template</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
<?php


$server = 'NTDEV0102\SQLCORP';
$dbName = 'MD_DesignDoc_DEV';
$uid = 'dds_user';
$pwd = 'pgDS!11*';

$conn = new PDO("sqlsrv:server=$server; database = $dbName", $uid, $pwd);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  


//$query = 'SELECT * FROM dbo.MPN_Master JOIN dbo.CFData ON CF_ID';  
$query = 'SELECT * FROM dbo.MPN_Master ORDER by Create_Date DESC';  

// simple query  
$stmt = $conn->query( $query );  
while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){  
   
  //print_r( $row['Name'] ."\n" );  

$customer = "PG";
$searchurl="mpn.php?fetchid=" .  $row['MPN'] . "&cust=" . $customer ;

echo

           '<tr>
                <td><a href=' . $searchurl . '>' . $row['MPN'] . '</a></td>
                <td>'.$row['CF_ID'].'</td>
                <td>'.$row['Designer'].'</td>
                <td>'.$row['Template_ID'].'</td>
                <td>'.$row['Create_Date'].'</td>
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