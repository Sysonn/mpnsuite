<!-- <?php
// session_start();
// include ("includes/constants.php");
// include ("classes/mpnloader.php");

// $mpnurl="mpn.php?fetchid=" . $mpn;
// $xlurl="cwm.php?fetchid=" . $mpn;



?> -->

<?php
session_start(); 
$_SESSION['mpn'] = $_GET['fetchid'];
include ("includes/constants.php");
include ("classes/mpnloader.php");

$mpn = $_SESSION['mpn'];

$cwmurl="cwm-page.php?fetchid=" . $mpn;
$mpnurl="mpn.php?fetchid=" . $mpn;
$xlurl="cwm.php?fetchid=" . $mpn;


// $mpnsql="SELECT * FROM MPN_Master WHERE MPN='$mpn'";
// $mpnresult=mysqli_query($db,$mpnsql);
// $mpnrow=mysqli_fetch_array($mpnresult,MYSQLI_ASSOC);


$server = 'NTDEV0102\SQLCORP';
$dbName = 'MD_DesignDoc_DEV';
$uid = 'dds_user';
$pwd = 'pgDS!11*';

$conn = new PDO("sqlsrv:server=$server; database = $dbName", $uid, $pwd);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  

$mpnquery = 'select * from dbo.MPN_Master WHERE MPN=' . $mpn;  
  
// simple query  
$mpnstmt = $conn->query( $mpnquery );  
$mpnrow = $mpnstmt->fetch( PDO::FETCH_ASSOC );

//$cat=$mpnrow[''];
$cf=$mpnrow['CF_ID'];
//$bc=$mpnrow['Brandcode'];
//$desc=$mpnrow['Desc'];
$mpn2=$mpnrow['MPN'];
$conc=$mpnrow['Concept'];
$tempID=$mpnrow['Template_ID'];
$proDate=$mpnrow['Create_Date'];

////////////////////////////////////

$cfId = 'CF-' . $cf;

$cfquery = "SELECT * FROM dbo.CFData WHERE CF_ID = 'CF-$cf'";   
  
// simple query  
$cfstmt = $conn->query( $cfquery );  
$cfrow = $cfstmt->fetch( PDO::FETCH_ASSOC );

$cat=$cfrow['Subsector_Name'];
$desc=$cfrow['FPC_Name'];
$bc=$cfrow['FPC_Id'];

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

       <!-- jQuery Modal -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    
        <!-- Custom styles for this template -->
        <link href="style/dashboard.css" rel="stylesheet">
    
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">

      <script>

$(document).ready(function () {

  // console.log('<?php echo $cfquery; ?>');

  console.log('start');
  var iframe = $('#iFrame');

  iframe.load(function () {
    console.log('iframe loaded');

    var frame = iframe.contents().find('frame');
    console.log('frame src = ' + frame.attr('src'));
   
    var doc =  $(frame[0].contentWindow.document);
    var tdid = 0;
    doc.find('TD'). 
      each(function (index, node) {
        //console.log('found an ' + node.nodeName + "index: " + index);
        tdid++;
        $(this).attr('id', 'td'+tdid)
      });

      doc.find('td').click(function(){

          if ($('#modal').is(":visible")){
            alert("Please close menu before selecting a new cell.");
              return;
          }

         

          //$('body').bind('click', function (event) {
          $('#modal').css('left',event.pageX + 220);      // <<< use pageX and pageY
          $('#modal').css('top',event.pageY + 10);
          $('#modal').css('display','inline');     
          $("#modal").css("position", "absolute");  // <<< also make it absolute!
         // });

        $("#selectdb").val("");  

        tdCell = 0;
          //console.log("column: " + $(this).closest('td').index());
          //console.log("row: " + $(this).parent().index());

          oldColor = $(this).css("background-color");
          $(this).css("background-color", "rgba(102, 198, 249, 0.51)", "color", "white");
           ///$(this).text("<?php echo $desc ?>");
           //$(this).text($(this).attr('id'));
           //$(this).html('<p><a href="#ex1" rel="modal:open">Open Modal</a></p>');
          tdCell = $(this);
          $('#modal').show();
          $('#modalText').text('Cell: ' + $(this).attr('id'));

         //tdCellid = "'#" + tdCell + "'";


          $('#closeModal').click(function(){
            console.log(oldColor);
            tdCell.css("background-color", oldColor, "color", "white");
            //oldolor = 0;
            //tdCell.text($("#selectdb").val());

          $('#modal').hide();
      });
      

      $('#okModal').click(function(){
            console.log(oldColor);
            tdCell.css("background-color", "#9bffc8", "color", "white");
            tdCell.text($("#selectdb").val());

          $('#modal').hide();
      });
      //tdCell

});
 
      });

   

  });



      </script>

              <style>
                   #modal {
                          display: none;
                          width: 300px;
                          height: 225px;
                          position: absolute;
                          left: 50%;
                          top: 50%; 
                          margin-left: -150px;
                          margin-top: -150px;
                          background-color: white;
                          z-index: 999;
                          box-shadow: 4px 4px 4px rgba(0, 0, 0, .5);
                          border-radius: 5px;
                          padding: 10px;
                          border-style: solid;
                          border-color: grey;
                          border-width: 2px;
                        }
                      
                      #closeModal{
                        cursor: pointer;
                        font-size: 18px;
                        background-color: grey;
                        color: white;
                        border-radius: 20px;
                        width: 25px;
                        height: 25px;
                        margin-left: 270px;
                        margin-top: -20px;
                        position: absolute;
                        text-align: center;
                        line-height: 20px;
                        border-style: solid;
                        border-color: #262626;
                        border-width: 1px;
                        /* right: 2px; */
                      }

                      #okModal{
                        cursor: pointer;
                        font-size: 18px;
                        width: 80px;
                        background-color: #2679c7;
                        color: white;
                        text-align: center;
                        border-radius: 10px;
                      }
                
                   </style>

    </head>

    <body>
               <!------------------------------------------------------------------------------------------------------------------->
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
                        <li><a href=<?php echo ''.$mpnurl .''?>> <span class="glyphicon glyphicon-home" style="margin-right: 10px; color: grey;"></span>MPN Home<span class="sr-only">(current)</span></a></li>
                        <li class="active"><a href="cwm-page.php"><span class="glyphicon glyphicon-scale" style="margin-right: 10px; color: white;"></span>CWM</a></li>
                        <li><a href="#"><img src="img/icons/pal-icon.png" width="20px" style="margin-right: 8px;">PAL</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-th" style="margin-right: 10px; color: grey;"></span>PPOG</a></li>
                        <li><a href="#"><img src="img/icons/poa-icon.png" width="20px" style="margin-right: 8px;">POA</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-list-alt" style="margin-right: 10px; color: #808080;"></span>BOM</a></li>
                        <li><a href="#"><img src="img/icons/ship-icon.png" width="20px" style="margin-right: 8px;">Ship Test</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-check" style="margin-right: 10px; color: #808080;"></span>SV Form</a></li>
                        <li><a href="#"><img src="img/icons/pi-icon.png" width="20px" style="margin-right: 8px;">PI</a></li>
                        <li><a href="upload-doc.php"><div style="background-color: grey; color: white; border-radius: 10px; height: 30px; font-weight: bold; text-align: center; line-height: 30px;">+ Add Doc</div></a></li>
                        <li><a href="doc.php?fetchid=<?php echo $mpn ?>&doc=Test Sheet 2&cust=PG"><div style="background-color: grey; color: white; border-radius: 10px; height: 30px; font-weight: bold; text-align: center; line-height: 30px;">Generic Doc</div></a></li>
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
               <!------------------------------------------------------------------------------------------------------------------->   

                  <div id="modal">
                  
                  <div id="closeModal">x</div>
                     <div id="modalText"></div>
                     <div>Customer: Procter & Gamble</div>
                     <br><br>
                     <div>Populate with:</div>
                     <br>
                     <select id="selectdb" style="width: 200px;">
                        <option value=""> </option>
                        <option value="<?php echo $mpn2 ?>">MPN</option>
                        <option value="<?php echo $conc ?>">Concept Letter</option>
                        <option value="<?php echo $cf ?>">CF</option>
                        <option value="<?php echo $bc ?>">Brandcode</option>
                        <option value="<?php echo $desc ?>">Description</option>
                        <option value="<?php echo $proDate ?>">Project Date</option>
                        <option value="<?php echo $tempID ?>">Template ID</option>
                      </select>
                     
                     <br><br><br>
                    <div id="okModal">Ok</div>

                  </div>
                    

                    <iframe id="iFrame" class="cwm" name="cwmFrame" src="<?php echo $xlurl ?>">
                    
                    </iframe>

                    <!-- Modal HTML embedded directly into document -->
                  
            
     

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