<?php
// session_start();
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
                      <div style="margin-top: 27px; float: left; font-size: 20px; color:grey;">MPN Suite</div>
                  
                    </div>


                    <div id="navbar" class="navbar-collapse collapse">
                      <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Help</a></li>
                      </ul>
                      <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Search...">
                      </form>
                    </div>
                  </div>
                </nav>
            
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-sm-3 col-md-2 sidebar">
                      <ul class="nav nav-sidebar">
                        <li><a href="mpn.php"><span class="glyphicon glyphicon-home" style="margin-right: 10px; color: grey;"></span>MPN Home<span class="sr-only">(current)</span></a></li>
                        <li class="active"><a href="cwm-page.php"><span class="glyphicon glyphicon-scale" style="margin-right: 10px; color: white;"></span>CWM</a></li>
                        <li><a href="#"><img src="img/icons/pal-icon.png" width="20px" style="margin-right: 8px;">PAL</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-th" style="margin-right: 10px; color: grey;"></span>PPOG</a></li>
                        <li><a href="#"><img src="img/icons/poa-icon.png" width="20px" style="margin-right: 8px;">POA</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-list-alt" style="margin-right: 10px; color: #808080;"></span>BOM</a></li>
                        <li><a href="#"><img src="img/icons/ship-icon.png" width="20px" style="margin-right: 8px;">Ship Test</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-check" style="margin-right: 10px; color: #808080;"></span>SV Form</a></li>
                        <li><a href="#"><img src="img/icons/pi-icon.png" width="20px" style="margin-right: 8px;">PI</a></li>
                      </ul>
                      <br><br>
                      <!-- ----------------------- -->
                      <!-- <ul class="nav nav-sidebar">
                        <li><a href="">Nav item</a></li>
                        <li><a href="">Nav item again</a></li>
                        <li><a href="">One more nav</a></li>
                        <li><a href="">Another nav item</a></li>
                        <li><a href="">More navigation</a></li>
                      </ul>
                      <ul class="nav nav-sidebar">
                        <li><a href="">Nav item again</a></li>
                        <li><a href="">One more nav</a></li>
                        <li><a href="">Another nav item</a></li>
                      </ul> -->
                    </div>
                

                    <iframe class="cwm" src="cwm.php"></iframe>
            
            
     

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