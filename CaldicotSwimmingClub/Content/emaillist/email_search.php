<?php
	require ('../../connect.inc.php');
	$search_term = $_POST['search_term'];
	$upper = $_POST['upper'];
	$lower = $_POST['lower'];
	$upper = 60*60*24*365.25*$upper;
	$lower = 60*60*24*365.25*$lower;
	
	
	$time = time();
	$earlier = $time-$upper;
	$later = $time-$lower;
	
	
	/*echo ($upper." upper<br>"); 
	echo ($lower." lower<br>"); 
	echo ($time." time<br>"); 
	echo ($earlier." earlier<br>"); 
	echo ($later." later<br>"); */
	$earlier_date = date("Y-m-d",$earlier);
	$later_date = date("Y-m-d",$later);
	
	
	$sql = "select email_address, dob
from swimming_members
 WHERE dob <='$later_date'
AND dob >='$earlier_date'";

	if(strlen($search_term)>0){
		$sql .= " and name like '%$search_term%'";
	}
	
 if($_POST['m']=="false"){
 	$sql .= " and gender<>'m'";
 }
 
 if($_POST['f']=="false"){
 	$sql .= " and gender<>'f'";
 }
 
 if($_POST['b']=="false"){
 	$sql .= " and type<>'b'";
 }
 
 if($_POST['s']=="false"){
 	$sql .= " and type<>'s'";
 }
 
 if($_POST['o']=="false"){
 	$sql .= " and type<>'o'";
 }
 
 if($_POST['c']=="false"){
 	$sql .= " and type<>'c'";
 }
 

 
 
 $sql .= " order by name asc";


$results = mysql_query($sql);
	
$string = '';

if (mysql_num_rows($results) > 0){
  while($row = mysql_fetch_object($results)){
  
	if(strpos($string,$row->email_address) == false){
    $string .= $row->email_address.";";
    $string .= "\n";
	}
  }

}else{
  $string = "No matches!";
} 

echo $string;


?><!--

dob >='$earlier'
AND dob <='$later'


dob >='$upper'
AND dob <='$lower' -->