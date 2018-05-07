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

<div style="margin-left: 150px;">

<?php

  if(!empty($_FILES['file']))
  {
    $filename = addslashes($_FILES['file']['tmp_name']);


    $query = <<<eof
    LOAD DATA LOCAL INFILE '$filename' 
    INTO TABLE hours2
     FIELDS TERMINATED BY ',' 
     OPTIONALLY ENCLOSED BY '"'
     LINES TERMINATED BY '\r\n'
     IGNORE 1 LINES
    (MPN, Project_Name, @Project_Date, Customer, Customer_Bill_To, Salesperson_Name, Activity_Name, Location_Name, Full_Name, @Work_Date, @Modified_Date, Hours, Region)
    SET Project_Date = DATE_FORMAT(STR_TO_DATE(@Project_Date, '%m/%d/%Y'),'%Y-%m-%d'), Work_Date = DATE_FORMAT(STR_TO_DATE(@Work_Date, '%m/%d/%Y'),'%Y-%m-%d'), Modified_Date = DATE_FORMAT(STR_TO_DATE(@Modified_Date, '%m/%d/%Y'),'%Y-%m-%d');
eof;

//SET Project_Date = date_format(STR_TO_DATE(@Project_Date, "%m-%d-%Y"),"%Y-%m-%d")

mysqli_query($db, $query);

echo "<div style='font-size: 8px;'>" . ($_FILES['file']['name']) . "</div>";
echo "Upload Complete!";

    }else{

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