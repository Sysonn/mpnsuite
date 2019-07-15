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
$_SESSION['doc'] = $_GET['doc'];
$_SESSION['cust'] = $_GET['cust'];


include ("includes/constants.php");
include ("classes/mpnloader.php");

$mpn = $_SESSION['mpn'];
$doc = $_SESSION['doc'];
$cust = $_SESSION['cust'];

$cwmurl="cwm-page.php?fetchid=" . $mpn;
$mpnurl="mpn.php?fetchid=" . $mpn;
$xlurl= $doc . ".php?fetchid=" . $mpn;



  // $ajaxdoc = $_POST['doc']; 
  // $docquery = "SELECT * FROM dbo.Doc_Library WHERE DocName = '$ajaxdoc'";   
  // $docstmt = $conn->query( $docquery );  
  // $docrow = $docstmt->fetch( PDO::FETCH_ASSOC );
  // echo json_encode($docrow);  // pass array in json_encode  


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

////////////////////////////////////



$docquery = "SELECT * FROM dbo.Doc_Library WHERE Customer = '$cust'";   
  
// simple query  
//$docstmt = $conn->query( $docquery );  
// $docrow = $docstmt->fetch( PDO::FETCH_ASSOC );

// $docName=$docrow['DocName'];

$maps = array(); 

$mapquery = "SELECT * FROM dbo.Doc_Maps WHERE DocName = '$doc'";   

$mapstmt = $conn->query( $mapquery );  
                        
        while ( $maprow = $mapstmt->fetch( PDO::FETCH_ASSOC ) ){ 
          
          //$maps[] = $maprow['tdNum'];
          $maps[] = $maprow;
        }



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

  console.log(<?php echo json_encode($maps) ?>);

  console.log('doc ready.');
  var iframe = $('#iFrame');

  iframe.load(function () {

    console.log('iframe loaded.');
    var frame = iframe.contents().find('frame');
    console.log('frame src = ' + frame.attr('src'));

    var doc =  $(frame[0].contentWindow.document);
    var tdid = 0;
    doc.find('TD'). 
      each(function (index, node) {
        tdid++;
        $(this).attr('id', 'td'+tdid);
        

        maparray = <?php echo json_encode($maps)?>;
        if ($.inArray( $(this).attr('id'), <?php echo json_encode($maps)?> ) != -1){

          console.log( $(this).attr('id'));
         // $(this).text(<?php echo $maprow['Customer'] ?>);
         //$("#list option[value='2']").text()
          $(this).text('test');
        }



        var theIndex = -1;
        for (var i = 0; i < maparray.length; i++) {
          if (maparray[i].tdNum == $(this).attr('id')) {
            theIndex = i;
            break;
          }
        }
        console.log(theIndex);

        if(theIndex != -1 ){
          $(this).text(  $('#selectdb option').filter(function () { return $(this).html() == maparray[i].VariableName ; }).val()  );
          //$(this).text($("#selectdb option[text='"+maparray[i].VariableName+"']").val());
          //$(this).text(maparray[i].VariableName);
        }
    

      });
      
    

    
    $('#edit').click(function () {

      
        $('#editMode').slideDown(300);
        $('#cancel').css("display", "block"); 
        $('#save').css("display", "block"); 
        $('#edit').css("display", "none"); 

        // var doc =  $(frame[0].contentWindow.document);
        // var tdid = 0;
        // doc.find('TD'). 
        //   each(function (index, node) {
        //     tdid++;
        //     $(this).attr('id', 'td'+tdid)
        //   });

        doc.find('td').click(function(){

            if ($('#modal').is(":visible")){
              alert("Please close menu before selecting a new cell.");
                return;
            }
        
            $('#modal').css('left',event.pageX + 0);     
            $('#modal').css('top',event.pageY + 100);
            $("#modal").fadeIn(150);
            $("#modal").draggable();
        

            $("#selectdb").val("");  
            $("#calcOp").val("");  
            $("#calc1").val("");
            $("#calc2").val("");  

            tdCell = 0;

              oldColor = $(this).css("background-color");
              $(this).css("background-color", "rgba(102, 198, 249, 0.51)", "color", "white");
              tdCell = $(this);
              $('#modal').show();
              $('#modalText').text('Cell: ' + $(this).attr('id'));

            //tdCellid = "'#" + tdCell + "'";


              $('#closeModal').click(function(){
                console.log(oldColor);
                tdCell.css("background-color", oldColor, "color", "white");
                $("#modal").fadeOut(150);
              });
          
          $('#okModal').unbind('click');
          $('#okModal').click(function(){
                console.log(oldColor);
                tdCell.css("background-color", "#9bffc8", "color", "white");

                if(($("#selectdb").val() != "") && ($("#calc1").val() === "")){
                  tdCell.text($("#selectdb").val());
                  
                  var variableID = $("#selectdb option:selected").text();
                  //var variableName = $("#selectdb").val();
                  var tdCellID = tdCell.attr('id');
                  var doc = "<?php echo $doc ?>";
                  var cust = "<?php echo $cust ?>";
                  var mpn = "<?php echo $mpn ?>";
                
                  // <?php
                  // $mapquery = "INSERT INTO dbo.Doc_Maps (MapID, DocID, DocName, Customer, tdNum, VariableID, VariableName, VariableType, Enter_Date, Update_Date ) VALUES ((SELECT ISNULL(MAX(MapID) + 1, 1) FROM dbo.Doc_Maps), (SELECT DocID FROM dbo.Doc_Library WHERE DocName = '$doc'), '$doc', '$cust', '$tdCell', '$variableID', '$variableID', 'customerMap')";  
                  // $conn->query($mapquery);
                  // ?>

                 //console.log("INSERT INTO dbo.Doc_Maps (MapID, DocID, DocName, Customer, tdNum, VariableID, VariableName, VariableType, Enter_Date, Update_Date ) VALUES ((SELECT ISNULL(MAX(MapID) + 1, 1) FROM dbo.Doc_Maps), (SELECT DocID FROM dbo.Doc_Library WHERE DocName = '"+doc+"'), '"+doc+"', '"+cust+"', '"+tdCellID+"', '"+variableID+"', '"+variableID+"', 'customerMap')");  
                 
                 //$('#okModal').attr('disabled', 'disabled');
                 $.ajax({
                      url: 'doc_map.php?fetchid=' + mpn + '&doc=' + doc + '&cust=' + cust , //This is the current doc
                      type: 'POST',
                      dataType:'json', // add json datatype to get json
                      data: ({doc2: doc, cust: cust, tdCellID: tdCellID, varID: variableID }),
                      success: function(data){
                          console.log(data);
                          //$('#bokModal').removeAttr('disabled');
                      },
                      error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                      }
                  });  
                  
                  

                }else if(($("#calc1").val() != "") && ($("#calc2").val() != "")) {

                      if($("#calcOp").val() === "+"){
                        tdCell.text( parseInt($("#calc1").val()) + parseInt($("#calc2").val()) );
                      }else if($("#calcOp").val() === "-"){
                        tdCell.text( $("#calc1").val() - $("#calc2").val()  );
                      }else{
                        tdCell.text("Error: Failed to calculate.");
                      
                      }
                    
                }else{
              };
              $("#modal").fadeOut(150);
            
          });

      });

    });
 
  });


    $('#cancel').click(function () {
      $('#editMode').slideUp(300);
      $('#cancel').css("display", "none"); 
      $('#save').css("display", "none"); 
      $('#edit').css("display", "block"); 
      location.reload();
    });
    

    $('#save').click(function () {
      
      //Save Data






      $('#editMode').slideUp(300);
      $('#cancel').css("display", "none"); 
      $('#save').css("display", "none"); 
      $('#edit').css("display", "block"); 
      location.reload();
    });
  

});



      </script>

              <style>
                   #modal {
                          display: none;
                          width: 300px;
                          height: 525px;
                          position: absolute;
                          left: 50%;
                          top: 50%; 
                          margin-left: -150px;
                          margin-top: -150px;
                          background-color: white;
                          z-index: 9999;
                          box-shadow: -8px 10px 20px rgba(0, 0, 0, .4);
                          border-radius: 5px;
                          padding: 10px;
                          border-style: solid;
                          border-color: white;
                          border-width: 2px;
                        }
                      
                      #closeModal{
                        cursor: pointer;
                        font-size: 12px;
                        background-color: #ed6200;
                        color: white;
                        border-radius: 20px;
                        width: 25px;
                        height: 25px;
                        margin-left: 270px;
                        margin-top: -22px;
                        position: absolute;
                        text-align: center;
                        line-height: 20px;
                        border-style: solid;
                        border-color: white;
                        border-width: 1.5px;
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
                        <?php
                        $docstmt = $conn->query( $docquery );  
                        
                        while ( $docrow = $docstmt->fetch( PDO::FETCH_ASSOC ) ){ 
                         
                          echo "<li><a href='doc.php?fetchid=" . $mpn . "&doc=" . $docrow['DocName'] . "&cust=" . $cust . "'</a> <img src='img/icons/pi-icon.png' width='20px' style='margin-right: 8px;'>" . $docrow['DocName'] . "</li>";
                        }

                        ?>
                        <li><a href="upload-doc.php"><div style="background-color: grey; color: white; border-radius: 10px; height: 30px; font-weight: bold; text-align: center; line-height: 30px;">+ Add Doc</div></a></li>
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

                  <div id="modal" style="zindex: 1000;">
                  
                  <div id="closeModal"><span class="glyphicon glyphicon-remove" style="color: white; margin-top: 3px;"></span></div>
                    <div style="font-size: 18px; background-color: #2679c7; color: white; font-weight: bold; padding: 10px;  margin: -12px; border-top-left-radius: 5px;">Populate</div>
                    <br>
                     <div>Customer: PG</div>
                     <div id="modalText" style="font-size: 9px; float: right;"></div>
          
                     <br>
                     <div>Project Info</div>
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
                      <br><br>

                      <div>Calculate</div>
                      <select id="calc1" style="width: 100px;">
                        <option value=""> </option>
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                        <option value=4>4</option>
                      </select>

                      <select id="calcOp" style="width: 50px; margin-left: 150; background-color: #2679c7; color: white;">
                        <option value=""> </option>
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">x</option>
                      </select>
                      
                      <select id="calc2" style="width: 100px; margin-left: 200;">
                        <option value=""> </option>
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                        <option value=4>4</option>
                      </select>

                     <br><br><br>
                    <div id="okModal">Ok</div>

                  </div>
                    
                    <br>
                    <div id="editMode" style="display: none; width: 100%; height: 50px; margin-top: 12px; background-color: #00cc00"><h1 style="margin-left: 220px; padding-top: 10px; color: white; margin-top: 0px;">Edit Mode</h1></div>
                    <div id="edit" style="border-radius: 10px; width: 200px; height: 20px; background-color: grey;  margin-top: 30px; margin-left: 220px; text-align: center; font-size: 16px; color: white; line-height: 20px; margin-bottom: -30px; cursor: pointer;">Edit Document Map</div>
                    <div id="cancel" style="display: none; border-radius: 10px; width: 100px; height: 20px; background-color: grey;  margin-top: 30px; margin-left: 220px; text-align: center; font-size: 16px; color: white; line-height: 20px; margin-bottom: -30px; cursor: pointer;">Cancel</div>
                    <div id="save" style="display: none; border-radius: 10px; width: 100px; height: 20px; background-color: #2679c7;  margin-top: 10px; margin-left: 350px; text-align: center; font-size: 16px; color: white; line-height: 20px; margin-bottom: -30px; cursor: pointer;">Save</div>
                    
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

    <!-- jQuery UI -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>

</body>
</html>