<?php
session_start();

include ("includes/constants.php");

// $email = $_SESSION['username'];
$mpn = '100001';

/*---------------------------------------------------*/
/* First and Last Name*/
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

// $_SESSION['sessionProfileID'] = $profileidprofile;

/* Location */
// $profilelocation = $namerow['profilelocation'];


// /* Profile Image */
// $profilesql="SELECT * FROM ProfileImages WHERE profileID='$profileidprofile'";
// $profileresult=mysqli_query($db,$profilesql);
// $profilerow=mysqli_fetch_array($profileresult,MYSQLI_ASSOC);
// $profileid=$profilerow['profileID'];
// $profilesource=$profilerow['imgSource'];
// $profileimgname=$profilerow['imgName'];

// /* Cover Image */

// $coversource=$profilerow['coverSource'];
// $coverimgname=$profilerow['coverName'];

// /* Profile Description */

// $descsql="SELECT * FROM ProfileDesc WHERE profileID='$profileidprofile'";
// $descresult=mysqli_query($db,$descsql);
// $descrow=mysqli_fetch_array($descresult,MYSQLI_ASSOC);
// $descid=$descrow['profileID'];
// $desccontent=$descrow['Description'];

/* other profile functions */
	
?>
