<?php
include_once("..\connect.php");
$stmt_find= $connect->prepare("SELECT id_trai, id_client, type, date_debut_trait , temp FROM traitement LIMIT 20");
$stmt_find->execute();
$calendar = array();


  
while ($find_row = $stmt_find->fetch()) {	
	// convert  date to milliseconds
	$start = strtotime($find_row['date_debut_trait']) * 1000;
	//$end = strtotime($rows['temp']) * 1000;	
	$calendar[] = array(
        'id' =>$find_row['id_client'],
        'type' => $find_row['type'],
        'date' => $find_row['date_debut_trait'],
        'temp' => $find_row['temp'],
      
    );
}
$calendarData = array(
	"success" => 1,	
    "result"=>$calendar);
echo json_encode($calendarData);
exit;
?>