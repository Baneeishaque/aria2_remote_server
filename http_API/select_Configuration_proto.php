<?php

include_once 'config.php';

$select_configuration_sql = "SELECT `system_status` FROM `configuration`";
$select_configuration_result = $aria2_remote_connection->query($select_configuration_sql);

//$result_array = array();
//$result_array[] = mysqli_fetch_assoc($select_configuration_result);
//echo json_encode($result_array);

$configuration=new \Aria2_remote\Configuration();
if (mysqli_num_rows($select_configuration_result) != 0) {
    
    $configuration_row = mysqli_fetch_assoc($select_configuration_result);
    
//    array_push($emptyarray, array("error_status" => "0"));
//    array_push($emptyarray, array("system_status" => $configuration_row["system_status"]));
    
    $configuration->setErrorStatus(FALSE);
    $configuration->setSystemStatus($configuration_row["system_status"]);
    
} else {
//    array_push($emptyarray, array("error_status" => "1"));
    $configuration->setErrorStatus(TRUE);
}

echo $configuration->serializeToString();
//echo $configuration_row["system_status"];
    
