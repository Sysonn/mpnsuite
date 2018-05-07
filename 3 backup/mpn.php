<?php
session_start(); 
$_SESSION['mpn'] = $_GET['fetchid'];
include ("includes/constants.php");
include ("classes/mpnloader.php");

$mpn = $_SESSION['mpn'];

$cwmurl="cwm-page.php?fetchid=" . $mpn;
$mpnurl="mpn.php?fetchid=" . $mpn;


$mpnsql="SELECT * FROM projects WHERE MPN='$mpn'";
$mpnresult=mysqli_query($db,$mpnsql);
$mpnrow=mysqli_fetch_array($mpnresult,MYSQLI_ASSOC);

$cat=$mpnrow['Category'];
$cf=$mpnrow['CF'];
$bc=$mpnrow['Brandcode'];
$desc=$mpnrow['Desc'];
$mpn2=$mpnrow['MPN'];
$conc=$mpnrow['Concept'];
$tempID=$mpnrow['Template ID'];

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

       <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>



    
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
                        <li class="active"><a href="#"><span class="glyphicon glyphicon-home" style="margin-right: 10px; color: white;"></span>MPN Home<span class="sr-only">(current)</span></a></li>
                        <li><a href= <?php echo '"' .$cwmurl .'"'?> > <span class="glyphicon glyphicon-scale" style="margin-right: 10px; color: grey;"></span>CWM</a></li>
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

            
            
                  
        <div id="proInfo">
            <h1><?php echo $mpn . " - " . $desc  ?></h1>
            <hr>
        <table>
        <tbody>
        <tr>

            <td>
            <div class="table-responsive" style="width: 400px">
                    <h2 class="sub-header">Project Information</h2>
                    <table class="table table-striped">
                
                        <tbody>
                        <tr>
                            <td width="150px"><b>Category:</b></td>
                            <td ><?php echo $cat ?></td>
                        </tr>
                        <tr>
                            <td><b>C&F:</b></td>
                            <td><?php echo $cf ?></td>
                        </tr>
                        <tr>
                            <td><b>Brandcode:</b></td>
                            <td><?php echo $bc ?></td>
                        </tr>
                        <tr>
                            <td><b>Description:</b></td>
                            <td><?php echo $desc ?></td>
                        </tr>
                        <tr>
                            <td><b>MPN (Supplier #):</b></td>
                            <td><?php echo $mpn ?></td>
                        </tr>
                        <tr>
                            <td><b>Concept:</b></td>
                            <td><?php echo $conc ?></td>
                        </tr>
                        <tr>
                            <td><b>Reference MPN:</b></td>
                            <td><input></td>
                        </tr>
                          <tr>
                            <td><b>Template Ref. - P&G:</b></td>
                            <td><input></td>
                        </tr>
                          <tr>
                            <td><b>Template:</b></td>
                            <td><input></td>
                        </tr>
                          <tr>
                            <td><b>Template Weight:</b></td>
                            <td><input></td>
                        </tr>
                          <tr>
                            <td><b>Estimated Filler Weight:</b></td>
                            <td><input></td>
                        </tr>
                          <tr>
                            <td><b>--</b></td>
                            <td>--</td>
                        </tr>
                          <tr>
                            <td><b>IPS #:</b></td>
                            <td><input></td>
                        </tr>
                          <tr>
                            <td><b>PI GCAS #:</b></td>
                            <td><input></td>
                        </tr>
                        </tbody>
                    </table>
            </div>
            </td>

        </div>

        <td> 
        <h2 style="margin-left: 100px; margin-top: -100px;">Template Name</h2>
        <img class="temp" src="img/template/PDQ30(12.1D-10.3H).png" width= "400px">
            <br>
        <div class="table-responsive" style="width: 400px; margin-top: 0px; margin-left:100px">
                <h2 class="sub-header"> <span class="glyphicon glyphicon-exclamation-sign" style="margin-right: 5px; color: blue;"></span>Label Information</h2>
                <table class="table table-striped">
            
                    <tbody>
                    <tr>
                        <td width="200px"><b>Required Aerosol:</b></td>
                        <td ><input></td>
                    </tr>
                    <tr>
                        <td><b>Limited Qty Label:</b></td>
                        <td><input></td>
                    </tr>
                    <tr>
                        <td><b>Product Not Available:</b></td>
                        <td><input></td>
                    </tr>
                    </tbody>
                </table>
        </div>

        </td> 

        <!-- <td>
            <div class="table-responsive" style="width: 400px; margin-top: -345px;">
                    <h2 class="sub-header">Label Information</h2>
                    <table class="table table-striped">
                
                        <tbody>
                        <tr>
                            <td width="200px"><b>Required Aerosol:</b></td>
                            <td ><input></td>
                        </tr>
                        <tr>
                            <td><b>Limited Qty Label:</b></td>
                            <td><input></td>
                        </tr>
                        <tr>
                            <td><b>Product Not Available:</b></td>
                            <td><input></td>
                        </tr>
                        </tbody>
                    </table>
            </div>
            </td> -->
</tr>
</tbody>
</table>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="margin-left: -30px; width: 100%;">
        <hr>

        <div class="table-responsive">
        <h2 class="sub-header">Components</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1,001</td>
                <td>Lorem</td>
                <td>ipsum</td>
                <td>dolor</td>
                <td>sit</td>
            </tr>
            <tr>
                <td>1,002</td>
                <td>amet</td>
                <td>consectetur</td>
                <td>adipiscing</td>
                <td>elit</td>
            </tr>
            <tr>
                <td>1,003</td>
                <td>Integer</td>
                <td>nec</td>
                <td>odio</td>
                <td>Praesent</td>
            </tr>
            <tr>
                <td>1,003</td>
                <td>libero</td>
                <td>Sed</td>
                <td>cursus</td>
                <td>ante</td>
            </tr>
            <tr>
                <td>1,004</td>
                <td>dapibus</td>
                <td>diam</td>
                <td>Sed</td>
                <td>nisi</td>
            </tr>
            <tr>
                <td>1,005</td>
                <td>Nulla</td>
                <td>quis</td>
                <td>sem</td>
                <td>at</td>
            </tr>
            <tr>
                <td>1,006</td>
                <td>nibh</td>
                <td>elementum</td>
                <td>imperdiet</td>
                <td>Duis</td>
            </tr>
            <tr>
                <td>1,007</td>
                <td>sagittis</td>
                <td>ipsum</td>
                <td>Praesent</td>
                <td>mauris</td>
            </tr>
            <tr>
                <td>1,008</td>
                <td>Fusce</td>
                <td>nec</td>
                <td>tellus</td>
                <td>sed</td>
            </tr>
            <tr>
                <td>1,009</td>
                <td>augue</td>
                <td>semper</td>
                <td>porta</td>
                <td>Mauris</td>
            </tr>
            <tr>
                <td>1,010</td>
                <td>massa</td>
                <td>Vestibulum</td>
                <td>lacinia</td>
                <td>arcu</td>
            </tr>
            <tr>
                <td>1,011</td>
                <td>eget</td>
                <td>nulla</td>
                <td>Class</td>
                <td>aptent</td>
            </tr>
            <tr>
                <td>1,012</td>
                <td>taciti</td>
                <td>sociosqu</td>
                <td>ad</td>
                <td>litora</td>
            </tr>
            <tr>
                <td>1,013</td>
                <td>torquent</td>
                <td>per</td>
                <td>conubia</td>
                <td>nostra</td>
            </tr>
            <tr>
                <td>1,014</td>
                <td>per</td>
                <td>inceptos</td>
                <td>himenaeos</td>
                <td>Curabitur</td>
            </tr>
            <tr>
                <td>1,015</td>
                <td>sodales</td>
                <td>ligula</td>
                <td>in</td>
                <td>libero</td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
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