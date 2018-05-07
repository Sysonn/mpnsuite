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


           
            <h1 style="margin-left: 20px;">Upload Hours Data</h1>
            <br>
                <div style="float:left;">
                <a  href="hours.php"><button class="btn btn-primary" style="margin-left: 20px;">Hours</button></a>
                <a  href="hours-report.php"><button class="btn btn-primary" style="margin-left: 20px;">Reports</button></a>
                <button class="btn btn-primary" type="submit" style="margin-left: 20px;">Designers</button>
               
      
                </div>
            <br><br>
            <hr>

<br>     

<div style="border-style: solid; border-width: 1px; border-radius: 10px; border-color: grey; background-color: lightgrey; margin: 0 auto; padding-bottom: 20px; width: 50%;">
<form action="upload-hours.php" method="post" enctype="multipart/form-data" style="margin-left: 150px;">
    <h2>Select file to upload:</h2>
    <br>
    <input type="file" name="file" id="file">
    <br>
    <input type="submit" name="submit" value="Submit">
</form>
<br>

<!-- <form action="upload-hours.php" method="post"
        enctype="multipart/form-data">
<table>
    <tr>
        <td>
            Filename:
        </td>
        <td>
            <input type="file" name="file" id="file">
        </td>
    </tr>
    <tr>
        <td colspan="2" align="right">
            <input type="submit" name="submit" value="Submit">
        </td>
    </tr>
</table>
</form> -->

<div style="margin-left: 150px;">
<?php
if ($_FILES["file"]["error"] > 0)
{
    echo "Error: " . $_FILES["file"]["error"] . "<br>";
}
else
{
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br>";
    //echo "Stored in: " . $_FILES["file"]["tmp_name"];
	$a=$_FILES["file"]["tmp_name"];
	//echo $a;
	
	$connect = mysql_connect('localhost','root','');
if (!$connect) {
die('Could not connect to MySQL: ' . mysql_error());
}	
//your database name
$cid =mysql_select_db('mpndb',$connect);

// path where your CSV file is located
//define('CSV_PATH','C:/xampp/htdocs/');
//<!-- C:\\xampp\\htdocs -->
// Name of your CSV file
$csv_file = $a;

if (($getfile = fopen($csv_file, "r")) !== FALSE) {
         $data = fgetcsv($getfile, 1000, ",");
   while (($data = fgetcsv($getfile, 1000, ",")) !== FALSE) {
     //$num = count($data);
	   //echo $num;
        //for ($c=0; $c < $num; $c++) {
            $result = $data;
        	$str = implode(",", $result);
        	$slice = explode(",", $str);

            $col1 = $slice[0];
            $col2 = $slice[1];
            $col3 = $slice[2];
            $col4 = $slice[3];
            $col5 = $slice[4];
            $col6 = $slice[5];
            $col7 = $slice[6];
            $col8 = $slice[7];
            $col9 = $slice[8];
            $col10 = $slice[9];
            $col11 = $slice[10];
            $col12 = $slice[11]; 
            $col13 = $slice[12];

$query = "INSERT INTO newHours(MPN, Project_Name, Customer, Customer_Bill_To, Salesperson_Name, Activity_Name, Locaiton_Name, Full_Name, Work_Date, Modified_Date, Hours, Region) VALUES('".$col1."','".$col2."','".$col3."','".$col4."','".$col5."','".$col6."','".$col7."','".$col8."','".$col9."','".$col10."','".$col11."','".$col12."','".$col13."')";
$s=mysql_query($query, $connect );
}
}
echo "<script>alert('Record successfully uploaded.');window.location.href='horus.php';</script>";
//echo "File data successfully imported to database!!";
mysql_close($connect);
}
?>
</div>           
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