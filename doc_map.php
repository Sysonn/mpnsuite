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


$server = 'NTDEV0102\SQLCORP';
$dbName = 'MD_DesignDoc_DEV';
$uid = 'dds_user';
$pwd = 'pgDS!11*';

$conn = new PDO("sqlsrv:server=$server; database = $dbName", $uid, $pwd);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  

//$docquery = 0;

 $ajaxdoc = $_POST['doc2']; 
 $ajaxcust= $_POST['cust']; 
 $ajaxcell = $_POST['tdCellID']; 
 $varID = $_POST['varID']; 
 //$docquery = "SELECT * FROM dbo.Doc_Library WHERE DocName = '$ajaxdoc'";   
 $docquery = "INSERT INTO dbo.Doc_Maps (MapID, DocID, DocName, Customer, tdNum, VariableID, VariableName, VariableType) VALUES ((SELECT ISNULL(MAX(MapID) + 1, 1) FROM dbo.Doc_Maps), (SELECT DocID FROM dbo.Doc_Library WHERE DocName = '$ajaxdoc'), '$ajaxdoc', '$ajaxcust', '$ajaxcell', '$varID', '$varID', 'customerMap')";

$conn->query($docquery);


$docSuccess = "SELECT * FROM dbo.Doc_Library";
//$docSuccess = "SELECT * FROM dbo.Doc_Library WHERE DocName = '$ajaxdoc'"; 
$docstmt = $conn->query( $docSuccess);  
$docrow = $docstmt->fetch( PDO::FETCH_ASSOC );
 echo json_encode($docrow);  // pass array in json_encode  


?>
