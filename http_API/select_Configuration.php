<?php

include_once 'config.php';

$select_configuration_sql = "SELECT `system_status` FROM `configuration`";

$result_array = array();

if (!$select_configuration_result = $aria2_remote_connection->query($select_configuration_sql)) {
    array_push($result_array, array("error_status" => "1", "error" => $aria2_remote_connection->error, "error_number" => $aria2_remote_connection->errorno));
} else {
    if ($select_configuration_result->num_rows === 0) {
        array_push($result_array, array("error_status" => "1", "error" => "Empty result set", "error_number" => "N/A"));
    } else {
        array_push($result_array, array("error_status" => "0"));
        $result_array[] = $select_configuration_result->fetch_assoc();
    }
}

echo json_encode($result_array);



