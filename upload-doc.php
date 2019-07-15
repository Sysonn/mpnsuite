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
                <div style="float:left;">
              
                </div>


           
            <h1 style="margin-left: 20px;">Upload Document</h1>

            <hr>

<br>     

<div style="border-style: solid; border-width: 1px; border-radius: 10px; border-color: grey; background-color: lightgrey; margin: 0 auto; padding-bottom: 20px; width: 50%;">
<form action="upload-doc.php" method="post" id="form1" enctype="multipart/form-data" style="margin-left: 150px;">
    <br>
    <h2>Select html page to upload:</h2>
    <br>
    <div style="border-style: solid; border-color: grey; border-width: 1px; padding: 5px; width: 500px; background-color: white;">
    <input type="file" name="file" id="file">
    </div>
    <br><br>
    <!-- <input type="submit" name="submit" value="Submit"> -->
    <h2>Select folder files to upload:</h2>
    <br>
    <div style="border-style: solid; border-color: grey; border-width: 1px; padding: 5px; width: 500px; background-color: white;">
    <input type="file" name="files[]" id="files" multiple>
    </div>
    <br><br>
    <br><br>
    <input type="submit" name="submit" value="Submit" id="submit" style="width: 180px; height: 35px; font-size: 18px; font-weight: bold; border-radius: 5px; background-color: #2679c7;; color: white;">
</form>
<br>

<div style="margin-left: 150px;">

<?php

$server = 'NTDEV0102\SQLCORP';
$dbName = 'MD_DesignDoc_DEV';
$uid = 'dds_user';
$pwd = 'pgDS!11*';

$conn = new PDO("sqlsrv:server=$server; database = $dbName", $uid, $pwd);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  

  if(!empty($_FILES['file']))
  {
    $filename = basename($_FILES['file']['name']);
    $newFileName = substr($filename, 0 , (strrpos($filename, ".")));

    //$folderName = extension($_FILES['file']['name']);

    $target_dir = "./";
    $target_file = $target_dir . $filename;
    
    move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
      
      echo "<script>
            document.getElementById('submit').style.display = 'none';
            document.getElementById('form1').style.display = 'none';
            document.getElementById('files').style.display = 'none';
      
            </script>
            <div style='font-size: 36px; margin-left: 20px; font-weight: bold;'>" . ($newFileName) . "</div><br>";
            
            $cust = 'PG';
            $user = 'dtsisson';
            
            $docquery = "INSERT INTO dbo.Doc_Library (DocID, DocName, Upload_Date, Upload_User, Customer, DocType, FileType, DocPath ) VALUES ((SELECT ISNULL(MAX(DocID) + 1, 1) FROM dbo.Doc_Library), '$newFileName', '3/7/2019', '$user', '$cust', 'CustomerRequired', '.xlsx', './$newFileName.php')";  
            
           //if ($conn->query($docquery) === TRUE) {
            $conn->query($docquery);
            echo "<div style='background-color: #00cc00; color: white; font-size: 18px; padding: 10px; width: 300px; border-radius: 20px; text-align: center;'>
              Upload Complete!
              </div>";

            // } else {
            //     echo "Error: " . $conn->error;
            // }
            
     
    }else{
      
    }


    rename("./". $filename, "./" . $newFileName . ".php");
    

// Count # of uploaded files in array
$total = count($_FILES['files']['name']);


// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {

  //Get the temp file path
  $tmpFilePath = $_FILES['files']['tmp_name'][$i];

  //Make sure we have a file path
  if ($tmpFilePath != ""){
    //Setup our new file path
    mkdir("./" . $newFileName . "_files");
    $newFilePath = "./" . $newFileName . "_files/" . $_FILES['files']['name'][$i];

    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {

      //Handle other code here

    }
  }
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